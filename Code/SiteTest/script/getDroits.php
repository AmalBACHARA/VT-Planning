<?php

$sql="SELECT * FROM login_prof WHERE login=".$dbh->quote($loginUtilisateur, PDO::PARAM_STR);
$req = $dbh->prepare($sql);
$req->execute();
$droits = array();

//on récupère l'ensemble des droits associés à un enseignant
while($ligne = $req->fetch())
{
	$droits = array(
		'admin' 			 => $ligne['admin'],
		'giseh' 			 => $ligne['giseh'],
		'salle' 			 => $ligne['salle'],
		'bilan_heure_global' => $ligne['bilan_heure_global'],
		'bilan_formation' 	 => $ligne['bilan_formation'],
		'mes_droits' 		 => $ligne['mes_droits'],
		'bilan_heure' 		 => $ligne['bilan_heure'],
		'pdf' 				 => $ligne['pdf'],
		'rss'				 => $ligne['rss'],
		'configuration' 	 => $ligne['configuration'],
		'reservation' 		 => $ligne['reservation'],
		'module' 			 => $ligne['module'],
		'seance_clicable' 	 => $ligne['seance_clicable'],
		'dialogue' 		  	 => $ligne['dialogue'],
		'agendas_ics'		 => 1
	);
}

$req->closeCursor();

?>
