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
                enseignements.codeTypeSalle, types_activites.codeTypeActivite, types_activites.alias,
                matieres.couleurFond, matieres.nom                 
FROM   
    enseignements,
    matieres, 
    seances_groupes,
    ressources_groupes,
    ressources_groupes_etudiants,
    ressources_etudiants,                    
    seances
        LEFT OUTER JOIN seances_salles ON ( seances_salles.deleted = 0 AND seances_salles.codeSeance = seances.codeSeance)
        LEFT OUTER JOIN ressources_salles ON (  ressources_salles.deleted = 0 AND seances_salles.codeRessource = ressources_salles.codeSalle)
        LEFT OUTER JOIN zones_salles ON (   zones_salles.deleted = 0 AND zones_salles.codeZoneSalle = ressources_salles.codeZoneSalle)
        LEFT OUTER JOIN seances_profs ON (  seances_profs.deleted = 0 AND seances.codeSeance = seances_profs.codeSeance)
        LEFT OUTER JOIN ressources_profs ON (   ressources_profs.deleted = 0 AND seances_profs.codeRessource = ressources_profs.codeProf)       
WHERE   
    ressources_etudiants.deleted = 0
    AND seances.deleted = 0
    AND enseignements.deleted = 0               
    AND matieres.deleted = 0 
    AND seances.diffusable = 1
    AND seances_groupes.deleted = 0 
    AND ressources_groupes.deleted = 0 
    AND ressources_groupes_etudiants.deleted = 0                 
    AND seances.codeEnseignement = enseignements.codeEnseignement AND enseignements.codeMatiere = matieres.codeMatiere 
    AND seances.codeSeance = seances_groupes.codeSeance  AND seances_groupes.codeRessource = ressources_groupes.codeGroupe  
    AND ressources_groupes.codeGroupe = ressources_groupes_etudiants.codeGroupe
    AND ressources_groupes_etudiants.codeEtudiant = ressources_etudiants.codeEtudiant
    AND ressources_etudiants.nom='..$dbh->quote($loginUtilisateur, PDO::PARAM_STR).'ORDER BY dateSeance');
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

?>