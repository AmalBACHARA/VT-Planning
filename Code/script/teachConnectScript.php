<?php

session_start();

error_reporting(E_ALL);

include('../config/config.php');

// tableau suivant l'état de la connexion
$tableau = array("message"	 => "En attente",
				 "connexion" => false);
$ligne = array();

// script
if (isset($_POST['teachLogin']) && isset($_POST['teachPwd']) && !empty($_POST['teachLogin']) && !empty($_POST['teachPwd']))
{
	$find = FALSE;

	// si tout les champs sont remplis alors on regarde si le nom de compte rentré existe bien dans la base de données.
	$sql = "SELECT * FROM login_prof WHERE login = ".$dbh->quote($_POST['teachLogin'], PDO::PARAM_STR);
	$req = $dbh->prepare($sql);
	$req->execute();

	// Si oui, on continue le script...
	while($find == FALSE && $ligne = $req->fetch())
	{
		// Si le mot de passe entré à la même valeur que celui de la base de données, on l'autorise a se connecter...
		// MD5 vers CRYTPT : https://github.com/edmondsnadane/Projet-R-D/issues/44
		if(md5($_POST['teachPwd']) == $ligne['motPasse'])
		{
			$find = TRUE;
			$sql="UPDATE compteur SET valeur=valeur+1 WHERE id_compteur='1'";
			$dbh->exec($sql);
		}
	}

	$req->closeCursor();

	// Sinon on lui affiche un message d'erreur.
	if($find == FALSE)
	{
		$tableau["message"]	  = "informations incorrectes";
		$tableau["connexion"] = false;
	}
	else
	{
		$_SESSION['teachLogin'] = $_POST['teachLogin'];
		$_SESSION['teachCodeProf'] = $ligne['codeProf'];

		$tableau["message"]	  	= "Connexion en cours";
		$tableau["connexion"] 	= true;
	}
	echo json_encode($tableau);
}
else
{
	$tableau["message"]	  = "informations incorrectes";
	$tableau["connexion"] = false;
	echo json_encode($tableau);
}

?>
