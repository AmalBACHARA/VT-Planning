<?php

$sql="SELECT * FROM login_prof left join ressources_profs on (ressources_profs.codeProf=login_prof.codeProf) WHERE ressources_profs.deleted='0' order by ressources_profs.nom,ressources_profs.prenom Asc";
$req=$dbh->query($sql);

$allTeachers = array();

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
		'dialogue' 		  	 => $ligne['dialogue'],
		'agendas_ics'		 => 1
	);

	$teacher = array(
		'codeProf' 	=> $ligne['codeProf'],
		'prenom' 	=> $ligne['prenom'],
		'nom' 	 	=> $ligne['nom'],
		'droits' 	=> $droits);

	array_push($allTeachers, $teacher);
}

$req->closeCursor();

?>
