<?php

	session_start();

	error_reporting(E_ALL);

	include('../config/config.php');

	// tableau suivant l'état de la connexion
	$droits = array();

	// script
	if (isset($_POST['code']) && !empty($_POST['code']))
	{
		$find = FALSE;

		// si tout les champs sont remplis alors on regarde si le nom de compte rentré existe bien dans la base de données.
		$sql = "SELECT * FROM login_prof WHERE codeProf = ".$_POST['code'];
		$req = $dbh->prepare($sql);
		$req->execute();
			   
		// Si oui, on continue le script...
		while($find == FALSE && $ligne = $req->fetch())
		{    
			$droits['admin'] 			 = $ligne['admin'];
			$droits['giseh']			 = $ligne['giseh'];
			$droits['salle']			 = $ligne['salle'];
			$droits['bilan_heure_global']= $ligne['bilan_heure_global'];
			$droits['bilan_formation']	 = $ligne['bilan_formation'];
			$droits['mes_droits']		 = $ligne['mes_droits'];
			$droits['bilan_heure']		 = $ligne['bilan_heure'];
			$droits['pdf']		 		 = $ligne['pdf'];
			$droits['rss']				 = $ligne['rss'];
			$droits['configuration']	 = $ligne['configuration'];
			$droits['reservation']		 = $ligne['reservation'];
			$droits['module']		 	 = $ligne['module'];
			$droits['dialogue']		  	 = $ligne['dialogue'];
			
			$find = TRUE;
		}

		$req->closeCursor();	
	}
		
	echo json_encode($droits);

?>