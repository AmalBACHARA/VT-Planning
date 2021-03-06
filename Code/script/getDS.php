<?php
	include('script/translateDay.php');
	
	// Pour tous les groupes dont l'etudiant fait partie
	$mesDS = array();

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

	$sql="SELECT *, enseignements.nom as nom_enseignement,seances.dureeSeance as seanceDuree, seances.commentaire as seancesCommentaire FROM seances LEFT JOIN (enseignements) ON (seances.codeEnseignement=enseignements.codeEnseignement) left join seances_groupes on seances_groupes.codeSeance=seances.codeSeance where seances.deleted='0' and seances.codeSeance!=''  AND enseignements.deleted='0' and ". $critere." and seances_groupes.deleted='0' order by seances.dateSeance,seances.heureSeance ";	
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
		
		$nom_type_seance = $res_4['alias'];
		
		// enseignement
		$type=explode("_",$res_4['nom_enseignement']);
		$enseignement=$type[1];
	
		//mise en forme de la duree des seances
			
		if (strlen($res_4['seanceDuree'])==4)
		{
			$heureduree=substr($res_4['seanceDuree'],0,2);
			$minduree=substr($res_4['seanceDuree'],2,2);
		}
		if (strlen($res_4['seanceDuree'])==3)
		{
			$heureduree=substr($res_4['seanceDuree'],0,1);
			$minduree=substr($res_4['seanceDuree'],1,2);
		}
		if (strlen($res_4['seanceDuree'])==2)
		{
			$heureduree=0;
			$minduree=$res_4['seanceDuree'];
		}
		if (strlen($heureduree)==1)
		{
			$heureduree="0".$heureduree;
		}	
		$duree=$heureduree."h".$minduree;
		
		//mise en forme de l'heure de d�but des seances
		if (strlen($res_4['heureSeance'])==4)
		{
			$heuredebut=substr($res_4['heureSeance'],0,2);
			$mindebut=substr($res_4['heureSeance'],2,2);
		}
		if (strlen($res_4['heureSeance'])==3)
		{
			$heuredebut=substr($res_4['heureSeance'],0,1);
			$mindebut=substr($res_4['heureSeance'],1,2);
		}
		if (strlen($res_4['heureSeance'])==2)
		{
			$heuredebut=0;
			$mindebut=$res_4['heureSeance'];
		}
		if (strlen($heuredebut)==1)
		{
			$heuredebut="0".$heuredebut;
		}
		$heure=$heuredebut."h".$mindebut;
		
		//recherche des profs associ�s � la seance
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
		
		// recherche de la salle associ�e � la s�ance
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
		
		// recherche du groupe associ� � la s�ance
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
		
		array_push($mesDS, array("dateDS" => $nom_jour." ".$jour."-".$mois."-".$annee, "dureeDS" => $duree, "heureDS" => $heure, "groupeDS" => $nom_groupe, "enseignementDS" => $enseignement, "profs" => $nom_prof, "salles" => $nom_salle, "passe" => ($date_actuelle>$date_seance)));
	}
	$req4->closeCursor();
?>