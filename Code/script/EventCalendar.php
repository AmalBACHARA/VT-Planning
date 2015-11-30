<?php
/*
*
* Avec connection a la bdd
*
*/
session_start();
include('../config/config.php');


$start = $_REQUEST['from'] / 1000;
$end   = $_REQUEST['to'] / 1000;
$loginUtilisateur = "";

$out = array();
//si l'utilisateur est un prof
if(isset($_SESSION['teachLogin']))
{
	$sql='SELECT distinct seances.dateSeance, seances.heureSeance, seances.dureeSeance,
                enseignements.nom, enseignements.couleurFond,enseignements.alias,
                enseignements.codeTypeSalle, types_activites.codeTypeActivite, types_activites.alias,
                matieres.couleurFond, matieres.nom, login_prof.login, ressources_salles.nom as salle, ressources_groupes.codeGroupe, ressources_salles.codeSalle
                FROM seances
                LEFT JOIN seances_profs ON seances.codeSeance = seances_profs.codeSeance
				LEFT JOIN seances_salles ON seances.codeSeance = seances_salles.codeSeance
				LEFT JOIN seances_groupes ON seances.codeSeance = seances_groupes.codeSeance
                LEFT JOIN enseignements ON seances.codeEnseignement = enseignements.codeEnseignement
                RIGHT JOIN matieres ON matieres.codeMatiere = enseignements.codeMatiere
                LEFT JOIN login_prof ON login_prof.codeprof = seances_profs.codeRessource
				LEFT JOIN ressources_salles ON ressources_salles.codeSalle = seances_salles.codeRessource
				LEFT JOIN ressources_groupes ON ressources_groupes.codeGroupe = seances_groupes.codeRessource
                INNER JOIN types_activites on enseignements.codeTypeActivite = types_activites.codeTypeActivite
                WHERE seances_profs.deleted =  "0"
                AND seances.deleted =  "0"
                AND matieres.deleted =  "0"
                AND seances.annulee =  "0"
				AND login_prof.codeProf = '.$dbh->quote($_GET['filterProf'], PDO::PARAM_STR);
	
	if (isset($_GET['filterGroupe']) && $_GET['filterGroupe'] != "all")
	{
		$sql += ' AND ressources_groupes.codeGroupe='.$_GET['filterGroupe'];
	}
	
	if (isset($_GET['filterSalle'])&& $_GET['filterSalle'] != "all")
	{
		$sql += ' AND ressources_salles.codeSalle='.$_GET['filterSalle'];
	}
}
//si l'utilisateur est un etudiant
else
{
    $sql=sprintf('SELECT distinct seances.dateSeance, seances.heureSeance, seances.dureeSeance,
                enseignements.nom, enseignements.couleurFond,enseignements.alias,
                enseignements.codeTypeSalle, types_activites.codeTypeActivite, types_activites.alias,
                matieres.couleurFond, matieres.nom
                FROM seances
                inner join seances_groupes on seances.codeSeance=seances_groupes.codeSeance
                inner join ressources_groupes on seances_groupes.codeRessource = ressources_groupes.codeGroupe
                inner join ressources_groupes_etudiants on ressources_groupes.codeGroupe = ressources_groupes_etudiants.codeGroupe
                inner join ressources_etudiants on ressources_groupes_etudiants.codeEtudiant = ressources_etudiants.codeEtudiant
                inner join enseignements ON seances.codeEnseignement = enseignements.codeEnseignement
                inner join matieres ON matieres.codeMatiere = enseignements.codeMatiere
                inner join types_activites on enseignements.codeTypeActivite = types_activites.codeTypeActivite
                WHERE seances.deleted =  "0"
                AND matieres.deleted =  "0"
                AND seances.annulee =  "0"
                AND seances_groupes.deleted = "0"
                AND ressources_groupes.deleted = "0"
                AND ressources_groupes_etudiants.deleted = "0"
                AND enseignements.deleted = "0"
                AND ressources_etudiants.deleted = "0"
                AND ressources_etudiants.nom = '.$dbh->quote($loginUtilisateur, PDO::PARAM_STR));
}

$req = $dbh->prepare($sql);
$req->execute();

$out = array();
while($ligneCode = $req->fetch())
{
    if(strlen($ligneCode['heureSeance']) > 3)
    {
        $debut = $ligneCode['dateSeance']." ".substr($ligneCode['heureSeance'],0,2).":".substr($ligneCode['heureSeance'],2,2).":00.0";
        $heureDebut = substr($ligneCode['heureSeance'],0,2).":".substr($ligneCode['heureSeance'],2,2).":00.0";
    }
    else
    {
        $debut = $ligneCode['dateSeance']." ".substr($ligneCode['heureSeance'],0,1).":".substr($ligneCode['heureSeance'],1,2).":00.0";
        $heureDebut = substr($ligneCode['heureSeance'],0,1).":".substr($ligneCode['heureSeance'],1,2).":00.0";
    }
    $heureDuree = ((int)substr($ligneCode['dureeSeance'],0,1)*60)*60+((int)substr($ligneCode['dureeSeance'],1,2)*60); //on convertie la durée en seconde
    
    $timeDebut = strtotime($debut); // on convertie la du date de debut en seconde
    $timeFin = $timeDebut + $heureDuree;

    if($ligneCode['codeTypeActivite'] == 1) //CM
    {
        $eventC = 'event-info';
    }
    else if($ligneCode['codeTypeActivite'] == 2) //TD
    {
        $eventC = 'event-warning';
    }
    else if($ligneCode['codeTypeActivite'] == 3) //TP
    {
        $eventC = 'event-success';
    }
    else if($ligneCode['codeTypeActivite'] == 4) //PRO
    {
       $eventC = 'event-simple';
    }
    else if($ligneCode['codeTypeActivite'] == 6) //STA
    {
        $eventC = 'event-info';
    }
    else if($ligneCode['codeTypeActivite'] == 7) //ADM
    {
        $eventC = 'event-special';
    }
    else if($ligneCode['codeTypeActivite'] == 8) //TUT
    {
        $eventC = 'event-inverse';
    }
    else if($ligneCode['codeTypeActivite'] == 9) //DS
    {
        $eventC = 'event-important';
    }
    else if($ligneCode['codeTypeActivite'] == 11) //TP APP
    {
        $eventC = 'event-success';
    }
       
    $out[] = array(
        'id' => $ligneCode['nom']." -TEST ". $ligneCode["salle"]. "et ".$ligneCode["codeGroupe"],
        'title' =>$ligneCode['alias'] ." - ". str_replace(" ", "h",date("H i",$timeDebut)) ." - ". str_replace(" ", "h",date("H i",$timeFin)) ." ". $ligneCode['nom']." (".$ligneCode['salle'].")",
        'url' => "",
        'class' => $eventC,
        'start' => $timeDebut*1000,
        'end' => $timeFin*1000
    );
}

echo json_encode(array('success' => 1, 'result' => $out));
$req->closeCursor();
exit;


/*
*
* Sans connection a la bdd
*
*/
/*
$out = array();
 
 for($i=1; $i<=15; $i++){ 	//from day 01 to day 15
	$data = date('Y-m-d', strtotime("+".$i." days"));
	$out[] = array(
     	'id' => $i,
		'title' => 'Event name '.$i,
		'url' => "",
		'class' => 'event-important',
		'start' => strtotime($data).'000',
		'end' => strtotime($data).'999'
	);
}
//print_r($out);
echo json_encode(array('success' => 1, 'result' => $out));
exit;
*/
?>