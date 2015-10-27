<?php

	include('translateDay.php');
	session_start();
	include('../config/config.php');
	$seances = array();
	
	function pad_zero($value) {
		return sprintf("%02d", $value);
	}

	if (isset($_POST['module']) && !empty($_POST['module']))
	{
		$nom_module=$_POST['module'];
		$sql="SELECT *,  enseignements.nom as nom_enseignement,seances.dureeSeance as seanceDuree, seances.commentaire as seancesCommentaire FROM seances LEFT JOIN (enseignements) ON (seances.codeEnseignement=enseignements.codeEnseignement)   where seances.deleted='0' and seances.codeSeance!=''  AND enseignements.deleted='0' and enseignements.nom like ".$dbh->quote("%".$nom_module."%", PDO::PARAM_STR)." order by seances.dateSeance,seances.heureSeance ";		
		$req4=$dbh->prepare($sql);
		$req4->execute();
		while($res_4 = $req4->fetch())
		{
			$annee=substr($res_4['dateSeance'],0,4);
			$mois=substr($res_4['dateSeance'],5,2);
			$jour=substr($res_4['dateSeance'],8,2);
			$nom_jour=date("l", mktime(0, 0, 0, $mois, $jour, $annee));
			
			//traduction francais du nom du jour
			$nom_jour = translateDay($nom_jour);
			
			unset($req_type);
			$sqlType="SELECT * FROM types_activites WHERE codeTypeActivite=".$res_4['codeTypeActivite'];
			$req_type=$dbh->prepare($sqlType);	
			$req_type->execute();
			while($res_type = $req_type->fetch())
			{
				$nom_type_seance = $res_type['alias'];
			}
			$req_type->closeCursor();
			
			// enseignement
			$type=explode("_",$res_4['nom_enseignement']);
			$enseignement=$type[1];
			if ($enseignement == $nom_type_seance)
			{
				$enseignement = $type[0];
			}
		
			$duree = pad_zero(floor($res_4["seanceDuree"] / 100)).'h'.pad_zero(floor($res_4["seanceDuree"] % 100));
			$heure = pad_zero(floor($res_4["heureSeance"] / 100)).'h'.pad_zero(floor($res_4["heureSeance"] % 100));
			
			//recherche des profs associés à la seance
			$code_seance=$res_4['codeSeance'];
			$nom_prof="";
			
			$sql="SELECT nom, prenom from seances_profs left join ressources_profs on (seances_profs.codeRessource=ressources_profs.codeProf) WHERE seances_profs.codeSeance=".$code_seance." and seances_profs.deleted='0' and ressources_profs.deleted='0' order by ressources_profs.nom"; 
			$req5=$dbh->prepare($sql);
			$req5->execute();
			$premierProf = TRUE;
			
			while($res_5 = $req5->fetch())
			{
				$prenom=ucwords(strtolower($res_5['prenom'])) ;
				if($premierProf == FALSE)
				{
					$nom_prof .= " - ";
				}
				$nom_prof .= $prenom." ".$res_5['nom'];
				$premierProf = FALSE;
			}
			$req5->closeCursor();
			
			// recherche de la salle associée à la séance
			$nom_salle="";
			$sql="SELECT * from seances_salles left join ressources_salles on (seances_salles.codeRessource=ressources_salles.codeSalle)  WHERE seances_salles.codeSeance=".$code_seance." and seances_salles.deleted='0' and ressources_salles.deleted='0' order by ressources_salles.nom";
			$req7=$dbh->prepare($sql);	
			$req7->execute();
			while($res_7 = $req7->fetch())
			{
				$code_salle=$res_7['codeRessource'];
				$sql="SELECT * from ressources_salles WHERE codeSalle=".$code_salle." and deleted='0'"; 
				$req8=$dbh->prepare($sql);
				$req8->execute();
				while($res_8 = $req8->fetch())
				{
					$nom_salle=$nom_salle.$res_8['nom']." ";
				}
				$req8->closeCursor();
			}
			$req7->closeCursor();
			
			// recherche du groupe associé à la séance
			$nom_groupe="";
			$sql="SELECT * from seances_groupes left join ressources_groupes on (seances_groupes.codeRessource=ressources_groupes.codeGroupe) WHERE seances_groupes.codeSeance=".$code_seance." and seances_groupes.deleted='0' and ressources_groupes.deleted='0' order by ressources_groupes.nom" ;
			$req9=$dbh->prepare($sql);	
			$req9->execute();
			while($res_9 = $req9->fetch())
			{
				$code_groupe=$res_9['codeRessource'];
				$sql="SELECT * from ressources_groupes WHERE codeGroupe=".$code_groupe." and deleted='0'";
				$req10=$dbh->prepare($sql);	
				$req10->execute();
				while($res_10 = $req10->fetch())
				{
					$nom_groupe=$nom_groupe.$res_10['nom']." ";
				}
			}
			$req9->closeCursor();
			
			$date_actuelle=date('Y').date('m').date('d');
			$date_seance=$annee.$mois.$jour;
			
			array_push($seances, implode('#', array($nom_jour." ".$jour."-".$mois."-".$annee, $nom_groupe, $nom_type_seance, $enseignement, $nom_prof, $nom_salle, $heure, $duree, ($date_actuelle>$date_seance))));
		}
		$req4->closeCursor();
		
		echo implode('~', $seances);
	}
?>