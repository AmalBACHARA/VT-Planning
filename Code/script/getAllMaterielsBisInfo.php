<?php

$sql="SELECT * FROM ressources_materiels WHERE deleted='0'";
$req_materielBis=$dbh->prepare($sql);
$req_materielBis->execute(array());
$res_materielBis=$req_materielBis->fetchAll();
$allMaterielsBis = array();
foreach($res_materielBis as $resMaterielsBis)
{
	$materielBis = array('codeMateriel' => $resMaterielsBis['codeMateriel'], 'nom' => $resMaterielsBis['nom'], 'codeComposante' => $resMaterielsBis['codeComposante']);
	array_push($allMaterielsBis, $materielBis);
}
/*
 SELECT ressources_materiels.codeMateriel as codeMateriel,composantes.nom AS nom_composante,composantes.codeComposante AS code_composante, ressources_materiels.nom AS nom_materiel  FROM ressources_materiels LEFT JOIN composantes ON (ressources_materiels.codeComposante=composantes.codeComposante) WHERE  ressources_materiels.deleted='0' AND composantes.deleted='0' and composantes.codeComposante="1" order by ressources_materiels.nom
*/
?>