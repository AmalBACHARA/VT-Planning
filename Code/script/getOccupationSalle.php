<?php

	
		$occupations = array();
		$total_seance=0;
		$total_reservation=0;
		$memoire_zone="";
		$premiere_ligne=0;
		$compteur_de_salle=0;

		//requete pour avoir la liste des salles

		$sql="SELECT ressources_salles.codeSalle AS codeSalle,ressources_salles.nom AS salle FROM ressources_salles   WHERE ressources_salles.deleted=0 and order by ressources_salles.nom asc";

		$req_liste_salle=$dbh->query($sql);
		$res_liste_salle=$req_liste_salle->fetchAll();	
		$i=0;
		$nb_de_salle=count($res_liste_salle);

		foreach ($res_liste_salle as $res_liste_salles)		
		{
			$i+=1;
			$cumul = FALSE;
			//requete pour avoir la durée des séances
			$sql="SELECT SUM(ROUND(dureeSeance/100)+100*(dureeSeance/100-ROUND(dureeSeance/100))/60) as heure FROM seances_salles  LEFT JOIN seances USING (codeSeance)  WHERE  seances_salles.deleted=0 AND seances.deleted=0 and seances_salles.codeRessource=".$res_liste_salles['codeSalle'];

			$req_salle=$dbh->query($sql);
			$res_salle=$req_salle->fetchAll();	

			foreach ($res_salle as $res_salles)	
			{
				$compteur_de_salle+=1;
				
				
				
				$premiere_ligne=1;	
	
				//requete pour avoir la durée des réservations
				$sql="SELECT SUM(ROUND(dureeReservation/100)+100*(dureeReservation/100-ROUND(dureeReservation/100))/60) as heure FROM reservations_salles  LEFT JOIN reservations USING (codeReservation)  WHERE  reservations_salles.deleted=0 AND reservations.deleted=0 and reservations_salles.codeRessource=".$res_liste_salles['codeSalle'];
				$req_reservation=$dbh->query($sql);
				$res_reservation=$req_reservation->fetchAll();	


				foreach ($res_reservation as $res_reservations)	
				{	
					$duree_reservation=	$res_reservations['heure'];
				}
				
				unset ($req_reservation);
				
				$total_seance+=round($res_salles['heure'],2);
				$total_reservation+=round($duree_reservation,2);
				
				//ligne bilan de la dernière zone
				if ($compteur_de_salle==$nb_de_salle)
				{
					$cumul = TRUE;
				}
			}
			unset ($req_salle);
			
			array_push($occupations, array("nom_salle" => $res_liste_salles['salle'], "heure" => round($res_salles['heure'],2), "heureReserve" => round($duree_reservation,2), "total" => round($res_salles['heure'],2)+round($duree_reservation,2) , "taux" => round(((round($res_salles['heure'],2)+round($duree_reservation,2))/1120)*100,2), "total_seance" => $total_seance, "total_reserve" => $total_reservation, "total_taux" => round(($total_seance+$total_reservation)/(1120*$nb_de_salle)*100,2), "cumul" => $cumul));	
		}	
			
?>