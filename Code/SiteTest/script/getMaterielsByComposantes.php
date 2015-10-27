<?php

        session_start();
	include('../config/config.php');
	
	$materielsBis = array();
        
	if (isset($_POST['code']))
	{
		if ($_POST['code'] == "all")
		{
			// 'TOUS' EST SELECTIONNE
                        include('getAllSallesInfo.php');
			foreach ($allMaterielsBis as $materielBis)
			{
				array_push($materielsBis, implode('#', array($materielBis['codeMateriel'], $materielBis['nom'], $materielBis['codeComposante'])));
			}
		}
		else
		{
			$sql="SELECT * FROM ressources_materiels WHERE deleted='0' and codeComposante=".$_POST['code']."  ORDER BY nom";
			$req_salle=$dbh->prepare($sql);
			$req_salle->execute();
			while($ligne = $req_salle->fetch())
			{
				array_push($materielsBis, implode('#', array($materielBis['codeMateriel'], $materielBis['nom'], $materielBis['codeComposante'])));
			}
		}
		echo implode('~', $materielsBis);
	}

?>