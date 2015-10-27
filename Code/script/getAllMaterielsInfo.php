<?php

$sql="SELECT distinct (ressources_materiels.codeComposante), composantes.nom AS nom_composante,composantes.codeComposante AS code_Composante   FROM ressources_materiels LEFT JOIN composantes ON (ressources_materiels.codeComposante=composantes.codeComposante) WHERE ressources_materiels.deleted='0' AND composantes.deleted='0' order by composantes.nom";
$req_materiel=$dbh->prepare($sql);
$req_materiel->execute(array());
$res_materiel=$req_materiel->fetchAll();
$allMateriels = array();
foreach($res_materiel as $resMateriels)
{
	$materiel = array('codeComposante' => $resMateriels['codeComposante'], 'nom_composante' => $resMateriels['nom_composante'], 'code_composante' => $resMateriels['code_Composante']);
	array_push($allMateriels, $materiel);
}

?>