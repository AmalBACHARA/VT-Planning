<?php

	$sql="SELECT *  FROM composantes WHERE deleted='0' and typeComposante='2' order by nom";
	$req_composante=$dbh->prepare($sql);	
	$req_composante->execute(array());
	$res_composante=$req_composante->fetchAll();
	$composantes = array();
	
	foreach($res_composante as $composante)
	{
		array_push($composantes, array("codeComposante" => $composante['codeComposante'], "nom"  => $composante['nom']));
	}
	
	$req_composante->closeCursor();

?>