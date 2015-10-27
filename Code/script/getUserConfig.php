<?php

	$userConfs = array();
	$heuresDebut = array();
	$heuresFin = array();
	$heuresBouton = array();
	
	$sql = "SELECT * FROM login_prof WHERE login= ".$dbh->quote($loginUtilisateur, PDO::PARAM_STR);   
	$req = $dbh->prepare($sql);
	$req->execute();
	
	// Si oui, on continue le script...      
	while($ligne = $req->fetch())
	{
		$confs = array('weekend' => $ligne['weekend'], 'heureDebut' => $ligne['heureDebut'], 'heureFin' => $ligne['heureFin'], 'bouton1Debut' => $ligne['bouton1Debut'], 'bouton1Fin' => $ligne['bouton1Fin'], 'bouton2Debut' => $ligne['bouton2Debut'], 'bouton2Fin' => $ligne['bouton2Fin'], 'bouton3Debut' => $ligne['bouton3Debut'], 'bouton3Fin' => $ligne['bouton3Fin'], 'bouton4Debut' => $ligne['bouton4Debut'], 'bouton4Fin' => $ligne['bouton4Fin']);
		
		for ($i=0;$i<=$heure_debut_journee;$i+=0.25)
		{
			$heure=floor($i);
			$minute=($i-$heure)*60;
			if ($heure == '24')
			{
				$heure = '0';
			}
			if($minute=='0')
			{
				$minute='00';
			}
			
			array_push($heuresDebut, array("codeHeure" => $i, "heure" => $heure, "minute" => $minute));
		}
		
		for ($i=$heure_fin_journee;$i<=24;$i+=0.25)
		{
			$heure=floor($i);
			$minute=($i-$heure)*60;
			if ($heure == '24')
			{
				$heure = '0';
			}
			if($minute=='0')
			{
				$minute='00';
			}
			array_push($heuresFin, array("codeHeure" => $i, "heure" => $heure, "minute" => $minute));
		}
		
		for ($i=$heure_debut_journee;$i<=$heure_fin_journee;$i+=0.25)
		{
			$heure=floor($i);
			$minute=($i-$heure)*60;
			if ($heure == '24')
			{
				$heure = '0';
			}
			if($minute=='0')
			{
				$minute='00';
			}
			array_push($heuresBouton, array("codeHeure" => $i, "heure" => $heure, "minute" => $minute));	
		}
					
		$userConfs = array("confs" => $confs, "listHeuresDebut" => $heuresDebut, "listHeuresFin" => $heuresFin, "listHeuresBouton" => $heuresBouton);
	}
	
	$req->closeCursor();
?>