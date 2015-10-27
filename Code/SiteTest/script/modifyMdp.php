<?php

error_reporting(E_ALL);

session_start();

include('../config/config.php');

// tableau suivant l'état de la connexion
$tableau = array("message"	 => "En attente",
				"connexion" => false);

if(isset($_POST['loginTeach']) && isset($_POST['oldMdp']) && isset($_POST['newMdp1']) && isset($_POST['newMdp2']) && !empty($_POST['loginTeach']) && !empty($_POST['oldMdp']) && !empty($_POST['newMdp1']) && !empty($_POST['newMdp2']))
{
	if ($_POST['newMdp1'] == $_POST['newMdp2'])
	{
		$login=$_POST['loginTeach'];
		// MD5 vers CRYTPT : https://github.com/edmondsnadane/Projet-R-D/issues/44
		$ancien_mot_passe=md5($_POST['oldMdp']);
		$nouveau_mot_passe=md5($_POST['newMdp1']);

		$sql="SELECT * FROM login_prof WHERE login=".$dbh->quote($login, PDO::PARAM_STR)." AND motPasse=".$dbh->quote($ancien_mot_passe, PDO::PARAM_STR);
		$req_login=$dbh->prepare($sql);
		$req_login->execute();
		$res_login=$req_login->fetchAll();

		if (count($res_login) > 0)
		{
			$sql="UPDATE login_prof SET motPasse=".$dbh->quote($nouveau_mot_passe, PDO::PARAM_STR)." WHERE login=".$dbh->quote($login, PDO::PARAM_STR)." AND motPasse=".$dbh->quote($ancien_mot_passe, PDO::PARAM_STR);
			$req_login_maj=$dbh->prepare($sql);
			$req_login_maj->execute();
			$tableau["message"]	  	= "Votre mot de passe a été modifié";
			$tableau["connexion"] 	= true;
		}
		else
		{
			$tableau["message"]	  = "informations incorrectes";
			$tableau["connexion"] = false;
		}
	}
	else
	{
		$tableau["message"]	  = "informations incorrectes";
		$tableau["connexion"] = false;
	}
}
else
{
	$tableau["message"]	  = "informations incorrectes";
	$tableau["connexion"] = false;
}

echo json_encode($tableau);
?>
