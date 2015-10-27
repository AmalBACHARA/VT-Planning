<?php

/*
 * Constituer une liste d'enseignants en JSON
 */

include( "../config/config.php" );

$deleteValue = 0;
$data        = array(':deleteValue'=>$deleteValue);

$sql           = "SELECT codeProf, nom, prenom FROM $dernierebase.ressources_profs WHERE deleted=:deleteValue;";
$req_listeProf = $dbh->prepare($sql);
$req_listeProf->execute($data);
$res_listeProf = $req_listeProf->fetchAll();

$data  = array("data" => $res_listeProf);

echo json_encode($data);
