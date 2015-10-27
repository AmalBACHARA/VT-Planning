<?php

$sql="SELECT distinct (ressources_salles.codeZoneSalle), zones_salles.nom AS nom_zone,zones_salles.codeZoneSalle AS code_zone   FROM ressources_salles LEFT JOIN zones_salles ON (ressources_salles.codeZoneSalle=zones_salles.codeZoneSalle) WHERE ressources_salles.deleted='0' AND zones_salles.deleted='0' order by zones_salles.nom";
$req_departement=$dbh->prepare($sql);
$req_departement->execute(array());
$res_departement=$req_departement->fetchAll();
$allDepartements = array();
foreach($res_departement as $resDepartements)
{
	$departement = array('codeZoneSalle' => $resDepartements['codeZoneSalle'], 'nom_zone' => $resDepartements['nom_zone'], 'code_zone' => $resDepartements['code_zone']);
	array_push($allDepartements, $departement);
}

?>