<?php

	session_start();
	include('../config/config.php');
	
	$liste_enseignement = array();

	if (isset($_POST['code']))
	{
		$annee = $annee_scolaire[0];
		
		$sql="SELECT * FROM seances_profs WHERE  deleted='0' and codeRessource=:codeRessource";
		$req_seance_groupe=$dbh->prepare($sql);
		$req_seance_groupe->execute(array(':codeRessource'=>$_POST['code']));

		$condition1 = "";
		while($res_seance_groupe = $req_seance_groupe->fetch())
		{
			$condition1=$condition1." codeSeance='".$res_seance_groupe['codeSeance']."' or";
		}
		$condition1=$condition1." codeSeance='bidon' and";

		$sql="SELECT distinct (codeEnseignement)  FROM seances WHERE ".$condition1." deleted='0'";
		$req_seance_groupe2=$dbh->prepare($sql);
		$req_seance_groupe2->execute();
		
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
	}
	
	asort($liste_enseignement);
		
	echo implode('~', $liste_enseignement);
?>