<?php
require("fonctions_scripts.inc");
session_start();

$nom=$_SESSION["session_nom"];
$prenom=$_SESSION["session_prenom"];
?>


<?
// conrôle, vérification et réaffichage du formulaire html () (si nécessaire)

// les dates	  
//===============================================================================================
		
setlocale(LC_ALL, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');			
		
// on regarde si on a recu un parametre de date
if (ISSET($_GET["date"])) {	$dateParam = $_GET["date"];	} else {$dateParam = ""; }
		
$maintenantSecondes = date("U");
if ($dateParam != "") {	$maintenantSecondes = $dateParam;}

$maintenant = getdate($maintenantSecondes);
$jourMaintenant = $maintenant['mday'];
$moisMaintenant = $maintenant['mon'];
$anneeMaintenant = $maintenant['year'];

$jourDansSemaine=date("w", $maintenantSecondes);

$lundiSecondes = $maintenantSecondes - ($jourDansSemaine-1)*(24*3600);
$lundi = getDate($lundiSecondes);
$jourLundi = $lundi['mday'];
$moisLundi = $lundi['mon'];
$anneeLundi = $lundi['year'];
	
$samediSecondes = $maintenantSecondes + (6-$jourDansSemaine)*(24*3600);
$samedi = getDate($samediSecondes);
$jourSamedi = $samedi['mday'];
$moisSamedi = $samedi['mon'];
$anneeSamedi = $samedi['year'];
	
$lundiAvantSecondes = $lundiSecondes - 7*24*3600;
$lundiAvant = getDate($lundiAvantSecondes);
$jourLundiAvant = $lundiAvant['mday'];
$moisLundiAvant = $lundiAvant['mon'];
$anneeLundiAvant = $lundiAvant['year'];
		
$lundiApresSecondes = $lundiSecondes + 7*24*3600;
$lundiApres = getDate($lundiApresSecondes);
$jourLundiApres = $lundiApres['mday'];
$moisLundiApres = $lundiAvant['mon'];
$anneeLundiApres = $lundiApres['year'];

//connexion à la BD 

$host = getHost($etablissement);
$login = getLogin($etablissement);
$password = getPassword($etablissement);
$database = getDatabase($etablissement);

$idConnexion = mysql_connect($host, $login, $password) or die ("Impossible de se connecter à la BD.");
$result      = mysql_select_db($database)          or die ("Impossible de sélectionner la BD.");

// verification identite utilisateur
$requete = "SELECT 	* FROM ressources_materiels WHERE ressources_materiels.nom = '$nom ';";
$resultat = mysql_query($requete);
$mess="";
if($resultat) { // requete OK
    $user = mysql_fetch_assoc($resultat);
	if  ($user=='') {$mess = vers_page("Désolé, ce matériel n'est pas présent dans la base");}
	}
else { // requete pas OK
    $mess = vers_page("Echec de la requête..".mysql_error());
    }

if ($mess!="") {
	echo "<html> <head><title>ErreurBD</title></head>\n";
    echo "<body><br><br><div align=\"center\"><font color=\"red\"> $mess </font>\n";
    echo "<form><input type=\"button\" value=\"Retour\" onClick=\"self.history.back()\">";
    echo "</form></div></body></html>";
    exit; 
	}

// création de la requete SQL

$requeteSeances = "
SELECT  seances.dateSeance AS dateSeance, 
		seances.heureSeance AS heureSeance, 
		seances.dureeSeance AS dureeSeance, 
		seances.codeSeance AS codeSeance,
		matieres.nom AS nomMatiere,
		matieres.TYPE AS typeMatiere,     
		ressources_profs.nom AS nomProf,
		ressources_groupes.alias AS nomGroupe,
		seances.commentaire AS commentaire,
		ressources_salles.nom as nomSalle
		
FROM    enseignements,
		matieres,
		
		seances
			LEFT OUTER JOIN seances_materiels ON (	seances_materiels.deleted = 0 AND seances.codeSeance = seances_materiels.codeSeance )
			LEFT OUTER JOIN ressources_materiels ON (	ressources_materiels.deleted = 0 AND seances_materiels.codeRessource = ressources_materiels.codeMateriel )
			LEFT OUTER JOIN seances_profs ON (	seances_profs.deleted = 0 AND seances.codeSeance = seances_profs.codeSeance )
			LEFT OUTER JOIN ressources_profs ON (	ressources_profs.deleted = 0 AND seances_profs.codeRessource = ressources_profs.codeProf )
			LEFT OUTER JOIN seances_groupes ON (	seances_groupes.deleted = 0 AND seances.codeSeance = seances_groupes.codeSeance )
			LEFT OUTER JOIN ressources_groupes ON (	ressources_groupes.deleted = 0 AND seances_groupes.codeRessource = ressources_groupes.codeGroupe )
			LEFT OUTER JOIN seances_salles ON (	seances_salles.deleted = 0 AND seances.codeSeance = seances_salles.codeSeance )
			LEFT OUTER JOIN ressources_salles ON (	ressources_salles.deleted = 0 AND seances_salles.codeRessource = ressources_salles.codeSalle )

WHERE 	ressources_materiels.nom = '$nom' 
		AND seances.dateSeance >= '$anneeLundi-$moisLundi-$jourLundi'
		AND seances.dateSeance <= '$anneeSamedi-$moisSamedi-$jourSamedi'

		AND seances.deleted = 0
		AND seances.diffusable = 1
		AND enseignements.deleted = 0			    
		AND matieres.deleted = 0
		AND matieres.codeMatiere = enseignements.codeMatiere
		AND seances.codeEnseignement = enseignements.codeEnseignement

ORDER BY seances.heureSeance, seances.dateSeance";

$resultatSeances = mysql_query($requeteSeances);
$nbSeances = 0;
$seances=array();

if($resultatSeances) { // requete OK
    while ($seance = mysql_fetch_assoc($resultatSeances)) {
		// vérifier si la séance est déjà enregistrée
		// if (isset($seance['nomSalle'])) {
		
		$ok = 0;
		for ($i=0; $i<$nbSeances; $i++) {
			if ($seances[$i]['codeSeance'] == $seance['codeSeance']) {
				// mettre à jour la séance déjà enregistrée	
				if ( isset($seance['nomProf']) && (strrpos_string($seances[$i]['nomProf'],$seance['nomProf']) === false)) {
					$seances[$i]['nomProf'] = $seances[$i]['nomProf'].", ".$seance['nomProf'];
					}
				if (isset($seance['nomGroupe']) && (strrpos_string($seances[$i]['nomGroupe'],$seance['nomGroupe']) === false)) {
					$seances[$i]['nomGroupe'] = $seances[$i]['nomGroupe'].", ".$seance['nomGroupe'];
					}
				if (isset($seance['nomSalle']) && ($pos = strpos($seances[$i]['nomSalle'], $seance['nomSalle']) === false)) {
					$seances[$i]['nomSalle'] = $seances[$i]['nomSalle'].", ".$seance['nomSalle'];
				}
				$ok = 1;
				}
			}
		if ($ok == 0){ // enregistrer cette nouvelle séance
			$seances[] = $seance;
			++$nbSeances;
			}
		}
		// }
	}
   else { // requete pas OK
        $mess = vers_page("\nEchec de la reqête..".mysql_error());
        echo "<html> <head><title>ErreurBD</title></head>\n";
        echo "<body><br><br><div align=\"center\"><font color=\"red\"> $mess </font>\n";
        echo "<form><input type=\"button\" value=\"Retour\" onClick=\"self.history.back()\">";
        echo "</form></div></body></html>";
        exit; }
	
// echo "<pre>"; print_r($seances); echo "</pre>";	

// recherche des rservations pour cette semaine ...

$requeteReservations = "

SELECT 
	reservations.dateReservation AS dateReservation, 
    reservations.heureReservation AS heureReservation, 
    reservations.dureeReservation AS dureeReservation, 
    reservations.codeReservation as codeReservation,
	reservations.commentaire as commentaire,
	ressources_profs.nom as nomProf,
	ressources_groupes.nom as nomGroupe,
	ressources_salles.nom as nomSalle				
FROM   
	reservations
		LEFT OUTER JOIN reservations_materiels ON (	reservations_materiels.deleted = 0 AND reservations.codeReservation = reservations_materiels.codeReservation )
		LEFT OUTER JOIN ressources_materiels ON (	ressources_materiels.deleted = 0 AND reservations_materiels.codeRessource = ressources_materiels.codeMateriel )
		LEFT OUTER JOIN reservations_profs ON (	reservations_profs.deleted = 0 AND reservations.codeReservation = reservations_profs.codeReservation )
		LEFT OUTER JOIN ressources_profs ON (	ressources_profs.deleted = 0 AND reservations_profs.codeRessource = ressources_profs.codeProf )
		LEFT OUTER JOIN reservations_groupes ON (	reservations_groupes.deleted = 0 AND reservations.codeReservation = reservations_groupes.codeReservation )
		LEFT OUTER JOIN ressources_groupes ON (	ressources_groupes.deleted = 0 AND reservations_groupes.codeRessource = ressources_groupes.codeGroupe )
		LEFT OUTER JOIN reservations_salles ON (	reservations_salles.deleted = 0 AND reservations.codeReservation = reservations_salles.codeReservation )
		LEFT OUTER JOIN ressources_salles ON (	ressources_salles.deleted = 0 AND reservations_salles.codeRessource = ressources_salles.codeSalle )	
WHERE  	
	reservations.dateReservation >= '$anneeLundi-$moisLundi-$jourLundi'
	AND reservations.dateReservation <= '$anneeSamedi-$moisSamedi-$jourSamedi'
    AND ressources_materiels.nom = '$nom'             	      
    AND reservations.deleted = 0
    AND reservations.diffusable = 1

ORDER BY 
	heureReservation, 
	dateReservation" ;		
   
$resultatReservations = mysql_query($requeteReservations);
$nbReservations = 0;
$reservations=array();

if($resultatReservations) { // requete OK
    while ($reservation = mysql_fetch_assoc($resultatReservations)) {
		// vérifier si la séance est déjà enregistrée
		// if (isset($seance['nomSalle'])) {
		$ok = 0;
		for ($i=0; $i<$nbReservations; $i++) {
			if ($reservations[$i]['codeSeance'] == (-1)*$reservation['codeReservation']) {
				// mettre à jour la séance déjà enregistrée	
				if (isset($reservations['nomProf']) && (strrpos_string($reservations[$i]['nomProf'],$reservation['nomProf']) === false)) {
					$reservations[$i]['nomProf'] = $reservations[$i]['nomProf'].", ".$reservation['nomProf'];
					}
				if (isset($reservations['nomGroupe']) && (strrpos_string($reservations[$i]['nomGroupe'],$reservation['nomGroupe']) === false)) {
					$reservations[$i]['nomGroupe'] = $reservations[$i]['nomGroupe'].", ".$reservation['nomGroupe'];
					}
				if (isset($reservations['nomSalle']) && (strrpos_string($reservations[$i]['nomSalle'],$reservation['nomSalle']) === false)) {
					$reservations[$i]['nomSalle'] = $reservations[$i]['nomSalle'].", ".$reservation['nomSalle'];
					}
				$ok = 1;
				}
			}
		if ($ok == 0){ // enregistrer cette nouvelle séance
			$seance['dateSeance']   = $reservation['dateReservation'];
			$seance['heureSeance']  = $reservation['heureReservation'];
			$seance['dureeSeance']  = $reservation['dureeReservation'];
			$seance['codeSeance']   = (-1)*$reservation['codeReservation'];
			$seance['typeMatiere']  = 10;
			$seance['nomMatiere']   = "";
			$seance['commentaire']  = $reservation['commentaire'];
			$seance['nomProf']      = $reservation['nomProf'];
			$seance['nomGroupe']    = $reservation['nomGroupe'];
			$seance['nomSalle']    = $reservation['nomSalle'];
			$reservations[] 		= $seance;
			++$nbReservations;
			}
		}
		// }
	}
   else { // requete pas OK
        $mess = vers_page("\nEchec de la reqête..".mysql_error());
        echo "<html> <head><title>ErreurBD</title></head>\n";
        echo "<body><br><br><div align=\"center\"><font color=\"red\"> $mess </font>\n";
        echo "<form><input type=\"button\" value=\"Retour\" onClick=\"self.history.back()\">";
        echo "</form></div></body></html>";
        exit; }

// echo "<pre>"; print_r($reservations); echo "</pre>";	
	
// il faut maintenant ajouter toutes les réservations à la liste des séances mais en préservant l'ordre heure + date !!!
$idxSeances = 0;
$idxReservations = 0;
$nbEdt = 0; 
$edt=array();
	
while (($idxSeances < $nbSeances) && ($idxReservations < $nbReservations)) {
		$date1 = explode("-", $seances[$idxSeances]['dateSeance']);                                                    
      	$nb1 = mktime(0,0,0,$date1[1],$date1[2],$date1[0]); 
		$date2 = explode("-", $reservations[$idxReservations]['dateSeance']);                                                   
      	$nb2 = mktime(0,0,0,$date2[1],$date2[2],$date2[0]); 

		if ($seances[$idxSeances]['heureSeance'] < $reservations[$idxReservations]['heureSeance']) {
			$edt[] = $seances[$idxSeances];
			++$nbEdt;
			++$idxSeances;
			}
		elseif ($seances[$idxSeances]['heureSeance'] > $reservations[$idxReservations]['heureSeance']) {
			$edt[] = $reservations[$idxReservations];
			++$nbEdt;
			++$idxReservations;
			}
		elseif ($nb1 < $nb2) {
			$edt[] = $seances[$idxSeances];
			++$nbEdt;
			++$idxSeances;
			}
		elseif ($nb1 > $nb2) {
			$edt[] = $reservations[$idxReservations];
			++$nbEdt;
			++$idxReservations;
			}
		else {
			 }
		}
	
	while ($idxSeances < $nbSeances) {
		$edt[] = $seances[$idxSeances];
		++$nbEdt;
		++$idxSeances;
		}
	while ($idxReservations < $nbReservations) {
		$edt[] = $reservations[$idxReservations];
		++$nbEdt;
		++$idxReservations;
		}	

// echo "<pre>"; print_r($edt); echo "</pre>";
		
?>

<HTML>
	<HEAD> 
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<META NAME="GENERATOR" CONTENT="Mozilla/4.03 [fr] (WinNT; I) [Netscape]">
<TITLE>EMPLOI DU TEMPS MATERIEL</TITLE>
<link rel="stylesheet" type="text/css" href="style/style.css" />
</HEAD>

<BODY>

<CENTER>

<FONT face="Arial, Helvetica, sans-serif" COLOR="navy" size=+1 >
Emploi du temps du matériel: <? echo $prenom; echo " "; echo $nom;?>
</FONT>

<P>
<DIV ID="grille" type="text/css" style="position: absolute; left: 8;">
<table border="0" width="100%" style="background-color: #d9f0d0; color:#444466;">
	<tbody>
		<tr>
			<td align="center" nowrap="nowrap" valign="bottom">
				<? 
					$dateTemp = date("U");
					echo "<a href=\"traitement_materiels.php?date=$dateTemp\">"; 
				?>
				<img src="media/today.gif" border="0" alt="Aujourd'hui" title="Aujourd'hui"/><br/>Semaine courante</a> 
			</td>
			<td width="100%" align="center">
				<? echo "<a href=\"traitement_materiels.php?date=$lundiAvantSecondes\">"; ?>
				<img src="media/prev.gif" border="0" alt="Semaine précédente" title="Semaine précédente" hspace="2" /></a>
                <b>
					&#160;
                    <? echo "[";
					echo numero_semaine($jourLundi,$moisLundi,$anneeLundi);
					echo "]  "."$jourLundi/$moisLundi/$anneeLundi"." - "."$jourSamedi/$moisSamedi/$anneeSamedi"; ?>
					&#160;
                </b>
				<? echo "<a href=\"traitement_materiels.php?date=$lundiApresSecondes\">"; ?>
                <img src="media/next.gif" border="0" alt="Semaine suivante" title="Semaine suivante" hspace="2" />
                </a>
            </td>
			<td align="center" nowrap="nowrap" valign="middle">
				<a href="./index_materiel.html">Changer de matériel</a> 
			</td>			
		</tr>
	</tbody>
</table>

<table border="0" cellspacing="0" cellpadding="1" width="100%">

            <tr>
               <td width="1%" align="center" colspan="15" nowrap="nowrap"> </td>
            </tr>

<?
echo "<TR>";
echo "<TH WIDTH=\"5%\" CLASS=daylabel><br/></TH>";

$maintenant = getdate($lundiSecondes);
$jour = $maintenant['mday'];
echo "<TH WIDTH=\"10%\" CLASS=daylabel>Lundi $jour</TH>";

$maintenant = getdate($lundiSecondes+1*24*3600);
$jour = $maintenant['mday'];
echo "<TH WIDTH=\"10%\" CLASS=daylabel>Mardi $jour</TH>";

$maintenant = getdate($lundiSecondes+2*24*3600);
$jour = $maintenant['mday'];
echo "<TH WIDTH=\"10%\" CLASS=daylabel>Mercredi $jour</TH>";

$maintenant = getdate($lundiSecondes+3*24*3600);
$jour = $maintenant['mday'];
echo "<TH WIDTH=\"10%\" CLASS=daylabel>Jeudi $jour</TH>";

$maintenant = getdate($lundiSecondes+4*24*3600);
$jour = $maintenant['mday'];
echo "<TH WIDTH=\"10%\" CLASS=daylabel>Vendredi $jour</TH>";

$maintenant = getdate($lundiSecondes+5*24*3600);
$jour = $maintenant['mday'];
echo "<TH WIDTH=\"10%\" CLASS=daylabel>Samedi $jour</TH>";
echo "</TR>";

$idxEdt = 0;

$couleur1 = "#f3f3f3";
$couleur2 = "#e9e9e9";

for ($h = 0; $h < $nbh; $h++){
    $horaire = $horaires[$h];	
    $heure = floor($horaire / 100);
    $minute = ($horaire - (100 * floor($horaire / 100)));
    if ($h%2 == 0) 
		echo "<TR HEIGHT=1 style=\"background-color:$couleur1\">\n"; 
		else echo "<TR HEIGHT=1 style=\"background-color:$couleur2\">\n"; 
    echo "<TH WIDTH=\"2%\" class=varheures>"; 
    if (($minute == 0) || ($minute == 30)) {echo $heure; echo "h"; if ($minute != 0) {echo $minute;} else {echo "00"; } }
    echo "&nbsp;</TH>\n";
          
    for ($j = 0; $j < $nbj; $j++){   // $j = numero du jour 
        $jour = $jours[$j];		  
	    $horaireReel = $horairesReels[$j];	
        if ($idxEdt < $nbEdt) {
      	    $date = explode("-", $edt[$idxEdt]["dateSeance"]);	
      	    $jourSeance = strftime("%A", mktime(0,0,0,$date[1],$date[2],$date[0])); 
			$dateFrancais = $date[2]."/".$date[1]."/".$date[0];	
			
		// la seance se superpose avec la precedente: son jour est le jour d'hier, on passe à la suivante
		/*
		if ($idxEdt>0) {
			$heureSeanceAvant = $edt[$idxEdt-1]["heureSeance"];
			$dateSeanceAvant = $edt[$idxEdt-1]["dateSeance"];
			while (($idxEdt>0) && ($heureSeanceAvant == $edt[$idxEdt]["heureSeance"]) && ($dateSeanceAvant== $edt[$idxEdt]["dateSeance"]))  
				{ $idxEdt--; }}
		*/
        if (($jourSeance == $jour) && ($edt[$idxEdt]["heureSeance"]== $horaire)) { // on détient une séance qui commence à l'heure $horaire
			$typeCouleur = typeCouleur($edt[$idxEdt]["typeMatiere"]);
	        // on affiche la séance
            echo "<TD CLASS=$typeCouleur WIDTH=\"10%\" ROWSPAN="; echo nbQuarts($edt[$idxEdt]["dureeSeance"]); echo ">";
            echo "<SPAN class=varheures>"; 
            $hd = $heure; 
            $md = $minute;
            $heureFin = heureDecimalToHeure(heureToHeureDecimal($edt[$idxEdt]["heureSeance"]) + heureToHeureDecimal($edt[$idxEdt]["dureeSeance"]));
            $hf = floor($heureFin / 100);;
            $mf = ($heureFin - (100 * floor($heureFin / 100)));;
            echo "<b>";
			echo $hd."h"; if ($md==0) {echo "00";} else {echo $md;} 
            echo " - ";
            echo $hf."h"; if ($mf==0) {echo "00";} else {echo $mf;} 
            echo "</b>";
			echo "<BR>\n";
            echo $dateFrancais;
            echo "</SPAN>\n";
			echo "<BR>\n";
            echo "<BR>\n";
			echo "<b>";
			echo typeMatiereClair($edt[$idxEdt]['typeMatiere']); 
			echo "&#160;".$edt[$idxEdt]["nomMatiere"];
			echo "</b>";
			echo "<BR>\n"; 
			echo "<SPAN class=couleurPROFS>"; 
				echo "PROF: "; echo $edt[$idxEdt]["nomProf"]; echo "\n<BR>\n"; echo "<BR>\n";
				echo "</SPAN>\n";
			if (($edt[$idxEdt]["nomSalle"]=="") == false) {
				echo "<SPAN class=couleurSALLES>"; 
				echo "salle(s): "; echo $edt[$idxEdt]["nomSalle"]; echo "\n<BR>\n<BR>"; 
				echo "</SPAN>\n";
				}
				echo "<SPAN class=couleurGROUPES>"; 
				echo "GROUPE: "; echo $edt[$idxEdt]["nomGroupe"]; echo "\n</TD>\n";
				echo "</SPAN>\n";
	
			// on prépare l'horaire suivant
			$horairesReels[$j] = heureDecimalToHeure(heureToHeureDecimal($horairesReels[$j]) + heureToHeureDecimal($edt[$idxEdt]["dureeSeance"])); 
            $idxEdt++;  
			$fusionne[$horaire][$jour]=1;                     
            }         
			else { 
				if ($horaire == $horaireReel) { // on détient un créneau libre
					echo "<TD CLASS=varempty WIDTH=\"10%\">&nbsp;</TD>\n"; 
					$horairesReels[$j] = heureDecimalToHeure(heureToHeureDecimal($horairesReels[$j]) + 25);
					}
				}
			}
		else 
			if ($horaire == $horaireReel) { // on détient un créneau libre
				echo "<TD CLASS=varempty WIDTH=\"10%\">&nbsp;</TD>\n"; 
             	$horairesReels[$j] = heureDecimalToHeure(heureToHeureDecimal($horairesReels[$j]) + 25);
             	} 
        }
    }
	
echo "<TR>";
echo "<TH WIDTH=\"5%\" CLASS=daylabel><br/></TH>";

$maintenant = getdate($lundiSecondes);
$jour = $maintenant['mday'];
echo "<TH WIDTH=\"10%\" CLASS=daylabel>Lundi $jour</TH>";

$maintenant = getdate($lundiSecondes+1*24*3600);
$jour = $maintenant['mday'];
echo "<TH WIDTH=\"10%\" CLASS=daylabel>Mardi $jour</TH>";

$maintenant = getdate($lundiSecondes+2*24*3600);
$jour = $maintenant['mday'];
echo "<TH WIDTH=\"10%\" CLASS=daylabel>Mercredi $jour</TH>";

$maintenant = getdate($lundiSecondes+3*24*3600);
$jour = $maintenant['mday'];
echo "<TH WIDTH=\"10%\" CLASS=daylabel>Jeudi $jour</TH>";

$maintenant = getdate($lundiSecondes+4*24*3600);
$jour = $maintenant['mday'];
echo "<TH WIDTH=\"10%\" CLASS=daylabel>Vendredi $jour</TH>";

$maintenant = getdate($lundiSecondes+5*24*3600);
$jour = $maintenant['mday'];
echo "<TH WIDTH=\"10%\" CLASS=daylabel>Samedi $jour</TH>";
echo "</TR>";


      
?>

</TABLE>

<? // Menu haut ?>
<br/>
<table border="0" width="100%" style="background-color: #d9f0d0; color:#444466;">
					<tbody>
						<tr>
							<td align="center" nowrap="nowrap" valign="bottom">
								<? 
								$dateTemp = date("U");
								echo "<a href=\"traitement_materiels.php?date=$dateTemp\">"; 
								?><img src="media/today.gif" border="0" alt="Aujourd'hui" title="Aujourd'hui"/><br/>Semaine courante</a> 
							</td>
							
							<td width="100%" align="center">
								<? echo "<a href=\"traitement_materiels.php?date=$lundiAvantSecondes\">"; ?>
		<img src="media/prev.gif" border="0" alt="Semaine précédente" title="Semaine précédente" hspace="2" /></a>
                  <b>
		  
		  
		
<!-- premier jour -->
                   &#160;
                    <? 
			echo "$jourLundi/$moisLundi/$anneeLundi";
		?>

<!-- separation dates -->
                   -  
<!-- dernier jour -->
                   <? 
			echo "$jourSamedi/$moisSamedi/$anneeSamedi";
		?>
                  &#160;
                  </b>
				  
	<? echo "<a href=\"traitement_materiels.php?date=$lundiApresSecondes\">"; ?>
                     <img src="media/next.gif" border="0" alt="Semaine suivante" title="Semaine suivante" hspace="2" />
                  </a>
                  
							</td><!-- spacer -->
							
							<td align="center" nowrap="nowrap" valign="middle">
								<a href="./index_materiel.html">
								Changer de materiel</a> 
							</td>
							
							
						</tr>
					</tbody>
				</table>



<CENTER><P>Visual Timetabling sur le WEB</CENTER><P> 
<CENTER><P>(C) Y. Colmant et S. Piechowiak</CENTER><P> 
</DIV>
</P>
</CENTER>
</BODY>
</HTML>

