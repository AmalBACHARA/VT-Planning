<?php

        session_start();
	include('../config/config.php');
	
	$salles = array();
        
	if (isset($_POST['code']))
	{
		if ($_POST['code'] == "all")
		{
			// 'TOUS' EST SELECTIONNE
                        include('getAllSallesInfo.php');
			foreach ($allSalles as $salle)
			{
				array_push($salles, implode('#', array($salle['codeSalle'], $salle['nom'], $salle['code_zone'])));
			}
                       // $salle = array('codeSalle' => $resSalles['codeSalle'], 'nom' => $resSalles['nom_salle'], 'code_zone' => $resSalles['code_zone']);
		}
		else
		{
			$sql="SELECT ressources_salles.codeZoneSalle as codeZoneSalle, ressources_salles.codeSalle as codeSalle, ressources_salles.nom AS nom_salle, ressources_salles.commentaire AS commentaire_salle FROM ressources_salles WHERE deleted='0' and codeZoneSalle=".$_POST['code']."  ORDER BY nom";
                        //"SELECT * FROM ressources_groupes WHERE deleted='0' and codeNiveau=".$_POST['code']."  ORDER BY nom";
			$req_salle=$dbh->prepare($sql);
			$req_salle->execute();
			while($ligne = $req_salle->fetch())
			{
				array_push($salles, implode('#', array($ligne['codeSalle'], $ligne['nom_salle'], $ligne['codeZoneSalle'])));
			}
		}
		echo implode('~', $salles);
	}
?>