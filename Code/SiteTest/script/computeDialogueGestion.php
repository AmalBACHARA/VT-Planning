<?php

	$total_heure=0;
	$total_minute=0;
	
	$composantesComplet = array();
	$grades = array();
	$resources = array();
	$prof = array();
	
	foreach($composantes as $composante)
	{
		$grades = array();
		//preparation des requetes
		$sql="SELECT distinct grade FROM ressources_profs left join grades on ressources_profs.codeGrade=grades.codeGrade where ressources_profs.codeComposante=".$composante["codeComposante"]." and ressources_profs.deleted= '0' and grades.deleted= '0' order by grade";
		$req_grade=$dbh->prepare($sql);
		$req_grade->execute();
		$res_grades=$req_grade->fetchAll();
		$resources = array();
		$prof = array();
		
		foreach($res_grades as $res_grade)
		{
			$sql="SELECT * FROM grades where grade=".$dbh->quote($res_grade['grade'], PDO::PARAM_STR)." and deleted= '0'";
			$req_vol_stat=$dbh->prepare($sql);
			$req_vol_stat->execute();
			$res_vol_stats=$req_vol_stat->fetchAll();
			foreach($res_vol_stats as $res_vol_stat)
			{
				$heure_vol_stat=substr($res_vol_stat['heuresStatutaires'],0,-2);
				$minutes_vol_stat=substr($res_vol_stat['heuresStatutaires'],-2);
			}
			$req_vol_stat->closeCursor();
		
			//Recherche du nombre de profs par grade et de leurs noms
			$nb_prof=0;
			$nom_prof="";
			$premier_prof=0;
			
			$sql="SELECT nom, prenom FROM ressources_profs left join grades on ressources_profs.codeGrade=grades.codeGrade  where grades.grade=".$dbh->quote($res_grade['grade'], PDO::PARAM_STR)." and ressources_profs.codeComposante=".$composante["codeComposante"]." and ressources_profs.deleted= '0' and grades.deleted= '0' order by grade";
			$req_nb_prof=$dbh->prepare($sql);
			$req_nb_prof->execute();
			$res_nb_profs=$req_nb_prof->fetchAll();
			$resources = array();
			$prof = array();
			
			foreach($res_nb_profs as $res_nb_prof)
			{
				$prof = array();
				$nb_prof+=1;
				if ($premier_prof==0)
				{
					$nom_prof.=substr($res_nb_prof['prenom'],0,1).". ".$res_nb_prof['nom'];
					$premier_prof=1;
				}
				else
				{
					$nom_prof.=" / ".substr($res_nb_prof['prenom'],0,1).". ".$res_nb_prof['nom'];
				}
			}
			
			$req_nb_prof->closeCursor();
		
			//calcul du potentiel enseignement
			$minute=$minutes_vol_stat*$nb_prof+$heure_vol_stat*60*$nb_prof;
			$total_minute+=$minute;
			$nb_heure=round($minute/60,2);
		
			if ($nb_heure==0)
			{
				$nb_heure="00";
			}
			
			$grade = array("nom" => $res_grade['grade'], "minutes_vol_stat" => $minutes_vol_stat, "heure_vol_stat" => $heure_vol_stat, "nb_prof" => $nb_prof, "nb_heure" => $nb_heure, "resources" => $nom_prof);
			
			array_push($grades, $grade);
		}
		$req_grade->closeCursor();

		$nb_heure=round($total_minute/60,2);
		
		if ($nb_heure==0)
		{
			$nb_heure="00";
		}
		
		array_push($composantesComplet, array("codeComposante" => $composante['codeComposante'], "nom"  => $composante['nom'], "totalMin" => $total_minute, "nbHeure" => $nb_heure, "grades" => $grades));
	}
?>