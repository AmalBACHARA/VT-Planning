<?php

$code = "all";

if(isset($_GET["composante"]) && $_GET["composante"] != "all") {
	$code = $_GET["composante"];

	$sql = "SELECT * FROM ressources_profs WHERE deleted='0' and codeComposante=:code  ORDER BY nom ASC,prenom  ";
	$req = $dbh->prepare($sql);
	$req->execute(array(':code' => $code));
} else {
	$sql = "SELECT * FROM login_prof left join ressources_profs on (ressources_profs.codeProf=login_prof.codeProf) WHERE ressources_profs.deleted='0' order by ressources_profs.nom Asc,ressources_profs.prenom ";
	$req = $dbh->query($sql);
}


$allCSTeachers = array();

while($ligne = $req->fetch())
{
	$csTeacher = array('codeProf' =>$ligne['codeProf'],'prenom' => $ligne['prenom'], 'nom' => $ligne['nom']);
	array_push($allCSTeachers, $csTeacher);
}

$req->closeCursor();

?>