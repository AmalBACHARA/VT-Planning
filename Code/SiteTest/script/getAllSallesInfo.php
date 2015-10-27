<?php

$sql="SELECT zones_salles.nom AS nom_zone,zones_salles.codeZoneSalle AS code_zone, ressources_salles.codeSalle as codeSalle,ressources_salles.nom AS nom_salle, ressources_salles.commentaire AS commentaire_salle   FROM ressources_salles LEFT JOIN zones_salles ON (ressources_salles.codeZoneSalle=zones_salles.codeZoneSalle) WHERE ressources_salles.deleted='0' AND zones_salles.deleted='0' order by ressources_salles.nom";
$req_salle=$dbh->prepare($sql);
$req_salle->execute(array());
$res_salle=$req_salle->fetchAll();
$allSalles = array();
foreach($res_salle as $resSalles)
{
	$salle = array('codeSalle' => $resSalles['codeSalle'], 'nom' => $resSalles['nom_salle'], 'code_zone' => $resSalles['code_zone']);
	array_push($allSalles, $salle);
}
?>