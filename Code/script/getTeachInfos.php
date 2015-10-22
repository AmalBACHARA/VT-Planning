<?php

	$loginUtilisateur = "";
	
	$loginUtilisateur = $_SESSION['teachLogin'];

	$userName= "";
	$firstName= "";

	// on récupere le codeProf reliés au login de l'enseignant
	$sql = "SELECT * FROM login_prof WHERE login= ".$dbh->quote($loginUtilisateur, PDO::PARAM_STR);   
	$req = $dbh->prepare($sql);
	$req->execute();
	$codeProf = 0;
		  
	// Si oui, on continue le script...      
	while($ligneCode = $req->fetch())
	{
		$codeProf = $ligneCode['codeProf'];
	}
	$req->closeCursor();
	
	/* en fonction du code Prof, on recupere le nom et prenom de l'enseignant */
	$sql = "SELECT * FROM ressources_profs WHERE codeProf=".$codeProf;   
	$req = $dbh->prepare($sql);
	$req->execute();
		      
	while($ligneTeach = $req->fetch())
	{
		$userName = $ligneTeach['nom'];
		$firstName = $ligneTeach['prenom'];
		$userCode = $ligneTeach['codeProf'];
	}

	$req->closeCursor();

?>