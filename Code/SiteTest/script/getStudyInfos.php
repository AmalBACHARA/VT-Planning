<?php

	$loginUtilisateur = "";

	$loginUtilisateur = $_SESSION['studyLogin'];

	$userName = "";

	// on récupere le nom et prenom reliés au login de l'étudiant
	$sql = "SELECT * FROM ressources_etudiants WHERE identifiant = ".$dbh->quote($loginUtilisateur, PDO::PARAM_STR);   
	$req = $dbh->prepare($sql);
	$req->execute();
		  
	// Si oui, on continue le script...      
	while($ligne = $req->fetch())
	{
		$userName = $ligne['nom'];
		$userCode = $ligne['codeEtudiant'];
	}

	$req->closeCursor();		

?>