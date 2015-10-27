<?php

session_start();

include('../config/config.php');

error_reporting(E_ALL);

// tableau suivant l'état de la connexion
$tableau = array("message"	 => "En attente",
				"connexion" => false);

if (isset($_POST['studyLogin']) && !empty($_POST['studyLogin']))
{
	$find = FALSE;
	$sql = "SELECT * FROM ressources_etudiants WHERE identifiant=".$dbh->quote($_POST['studyLogin'], PDO::PARAM_STR)." AND deleted=0";
	$req = $dbh->prepare($sql);
	$req->execute();

	// Si oui, on continue le script...
	while($find == FALSE && $ligne = $req->fetch())
	{
		$find = TRUE;
		$sql="UPDATE compteur SET valeur=valeur+1 WHERE id_compteur='1'";
		$dbh->exec($sql);
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
		$_SESSION['studyLogin'] = $_POST['studyLogin'];
		$tableau["message"]	  	= "Connexion en cours";
		$tableau["connexion"] 	= true;
	}
}
else
{
	$tableau["message"]	  = "informations incorrectes";
	$tableau["connexion"] = false;
}

echo json_encode($tableau);

?>