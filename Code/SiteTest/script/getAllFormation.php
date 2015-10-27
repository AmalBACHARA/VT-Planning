<?php

$sql="SELECT * FROM niveaux WHERE deleted='0' and typeElement='1' order by nom ";
$req_formation=$dbh->prepare($sql);
$req_formation->execute(array());
$res_formation=$req_formation->fetchAll();
$formations = array();
foreach($res_formation as $resFormations)
{
	$formation = array('codeNiveau' => $resFormations['codeNiveau'], 'nom' => $resFormations['nom'], 'alias' => $resFormations['alias']);
	array_push($formations, $formation);
}
	
?>