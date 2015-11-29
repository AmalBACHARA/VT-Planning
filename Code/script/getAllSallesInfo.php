<?php

$sql="SELECT ressources_salles.codeSalle as codeSalle,ressources_salles.nom AS nom_salle, ressources_salles.commentaire AS commentaire_salle   FROM ressources_salles WHERE ressources_salles.deleted='0' order by ressources_salles.nom";
$req_salle=$dbh->prepare($sql);
$req_salle->execute(array());
$res_salle=$req_salle->fetchAll();
$allSalles = array();
foreach($res_salle as $resSalles)
{
	$salle = array('codeSalle' => $resSalles['codeSalle'], 'nom' => $resSalles['nom_salle']);
	array_push($allSalles, $salle);
}
?>