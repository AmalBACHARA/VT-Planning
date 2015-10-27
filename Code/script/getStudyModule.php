<?php

	$annee = $annee_scolaire[0];
	
	$sql="SELECT *,ressources_etudiants.nom AS nom, ressources_groupes.nom AS nom_groupe FROM ressources_etudiants LEFT JOIN ressources_groupes_etudiants USING (codeEtudiant) LEFT JOIN ressources_groupes USING (codeGroupe) WHERE ressources_etudiants.codeEtudiant=:current_student AND ressources_etudiants.deleted='0' AND ressources_groupes_etudiants.deleted='0' AND ressources_groupes.deleted='0' ";
	$req_groupes2=$dbh->prepare($sql);
	$req_groupes2->execute(array(':current_student'=>$userCode));
	$res_groupe=$req_groupes2->fetchAll();

	$critere=" (";
	foreach($res_groupe as $res_groupes)
	{
		$critere .= "seances_groupes.codeRessource='".$res_groupes['codeGroupe']."' OR ";
	}
	$critere .= "0)";
	$req_groupes2->closeCursor();

	$sql="SELECT * FROM seances_groupes WHERE  deleted='0' and ".$critere;	
	$req_seance_groupe=$dbh->prepare($sql);
	$req_seance_groupe->execute();
	$condition1="";
	while($res_seance_groupe = $req_seance_groupe->fetch())
	{
		$condition1=$condition1." codeSeance='".$res_seance_groupe['codeSeance']."' or";
	}
	$condition1=$condition1." codeSeance='bidon' and";

	$sql="SELECT distinct (codeEnseignement)  FROM seances WHERE ".$condition1." deleted='0'";
	$req_seance_groupe2=$dbh->prepare($sql);
	$req_seance_groupe2->execute();
	$liste_enseignement = array();
	
	while($res_seance_groupe2 = $req_seance_groupe2->fetch())
	{
		$enseignement=$res_seance_groupe2['codeEnseignement'];
		$sql="SELECT * FROM enseignements WHERE  deleted='0' and codeEnseignement=".$enseignement;
		$req_seance_groupe3=$dbh->prepare($sql);
		$req_seance_groupe3->execute();
		while($res_seance_groupe3 = $req_seance_groupe3->fetch())
		{
			$enseignement_explode=explode("_", $res_seance_groupe3['nom']);
			$nom_enseignement=$enseignement_explode[0]."_".$enseignement_explode[1];
			if(!in_array($nom_enseignement,$liste_enseignement))
			{
				array_push($liste_enseignement, $nom_enseignement);
			}
		}
	}
	
asort($liste_enseignement);

?>