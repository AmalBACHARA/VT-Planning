<?php

	session_start();
	include('../config/config.php');
	
	$sql="update login_prof set weekend=:weekend,heureDebut=:heureDebut,heureFin=:heureFin where login=:login ";
	$req_modif_config=$dbh->prepare($sql);
	$req_modif_config->execute(array(':weekend'=>$_POST['weekend'],':heureDebut'=>$_POST['beginTime'],':heureFin'=>$_POST['endTime'],':login'=>$_SESSION['teachLogin']));

	echo "configuration modifiée";
	
?>