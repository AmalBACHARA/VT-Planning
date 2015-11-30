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
    $sql='SELECT 
    seances.dateSeance AS dateSeance, 
    seances.heureSeance AS heureSeance, 
    seances.dureeSeance AS dureeSeance, 
    seances.codeSeance as codeSeance,
    seances.commentaire as commentaire,
    matieres.nom AS nomMatiere,
    matieres.type AS typeMatiere, 
    matieres.couleurFond as couleurMatiere,
    ressources_salles.nom AS nomSalle,
    ressources_salles.alias AS aliasSalle,
    ressources_groupes.nom AS nomGroupe,
    ressources_salles.codeSalle AS codeSalle,
    ressources_groupes.codeGroupe AS codeGroupe
                    
FROM   
    enseignements,
    matieres, 
    login_prof,
    seances
        LEFT OUTER JOIN seances_profs ON (  seances_profs.deleted = 0 AND seances.codeSeance = seances_profs.codeSeance )
        LEFT OUTER JOIN ressources_profs ON (   ressources_profs.deleted = 0 AND seances_profs.codeRessource = ressources_profs.codeProf )
        LEFT OUTER JOIN seances_salles ON ( seances_salles.deleted = 0 AND seances.codeSeance = seances_salles.codeSeance )
        LEFT OUTER JOIN ressources_salles ON (  ressources_salles.deleted = 0 AND seances_salles.codeRessource = ressources_salles.codeSalle )
        LEFT OUTER JOIN seances_groupes ON (    seances_groupes.deleted = 0 AND seances.codeSeance = seances_groupes.codeSeance )
        LEFT OUTER JOIN ressources_groupes ON ( ressources_groupes.deleted = 0 AND seances_groupes.codeRessource = ressources_groupes.codeGroupe )
        LEFT OUTER JOIN seances_materiels ON (  seances_materiels.deleted = 0 AND seances.codeSeance = seances_materiels.codeSeance )
        LEFT OUTER JOIN ressources_materiels ON (   ressources_materiels.deleted = 0 AND seances_materiels.codeRessource = ressources_materiels.codeMateriel )
                            
WHERE   seances.deleted = 0
    AND seances.diffusable = 1
    AND enseignements.deleted = 0               
    AND matieres.deleted = 0 
    AND seances.codeEnseignement = enseignements.codeEnseignement 
    AND enseignements.codeMatiere = matieres.codeMatiere 
    AND login_prof.codeprof = seances_profs.codeRessource
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
                enseignements.codeTypeSalle,
                matieres.couleurFond, matieres.nom
                FROM seances
                inner join seances_groupes on seances.codeSeance=seances_groupes.codeSeance
                inner join ressources_groupes on seances_groupes.codeRessource = ressources_groupes.codeGroupe
                inner join ressources_groupes_etudiants on ressources_groupes.codeGroupe = ressources_groupes_etudiants.codeGroupe
                inner join ressources_etudiants on ressources_groupes_etudiants.codeEtudiant = ressources_etudiants.codeEtudiant
                inner join enseignements ON seances.codeEnseignement = enseignements.codeEnseignement
                inner join matieres ON matieres.codeMatiere = enseignements.codeMatiere
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

    
       
    $out[] = array(
        'id' => $ligneCode['nomMatiere']." -TEST ". $ligneCode["nomSalle"]. "et ".$ligneCode["codeGroupe"],
        'title' =>$ligneCode['aliasSalle'] ." - ". str_replace(" ", "h",date("H i",$timeDebut)) ." - ". str_replace(" ", "h",date("H i",$timeFin)) ." ". $ligneCode['nomMatiere']." (".$ligneCode['nomSalle'].")",
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
 
 for($i=1; $i<=15; $i++){   //from day 01 to day 15
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
<script>
console.log("event");
</script>