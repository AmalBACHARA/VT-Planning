<?php
session_start();
require("fonctions_scripts.inc");

$nom			= valeur_saisie($_POST["nom"]); 
$prenom 		= valeur_saisie($_POST["prenom"]);
$login 			= valeur_saisie($_POST["login"]);
$password 		= valeur_saisie($_POST["password"]);
$visiteur 		= valeur_saisie($_POST["visiteur"]);
/* 
$etablissement 	= valeur_saisie($_POST["etablissement"]);
*/
$etablissement 	= 'ISTV';
$message 		= "";

$_SESSION["session_nom"] = $nom;
$_SESSION["session_prenom"] = $prenom;
$_SESSION["session_etablissement"] = $etablissement;



if ($message != "") { // erreur sur les données du formulaire

	$message = vers_page($message);
	echo "<html> <head><title>Erreur</title></head>\n";
	echo "<body><font color=\"red\"> $message </font>\n";
	echo "<form><input type=\"button\" value=\"Corriger\" onClick=\"self.history.back()\">";
	echo "</form></body></html>";
	exit;
	}
	
else {

	switch ($visiteur) {
		
		case "professeur" : 
			$idConnexion = mysql_connect( 	getHost($etablissement), 
											getLogin($etablissement), 
											getPassword($etablissement)) or die ("Impossible de se connecter à la BD.");
			$result      = mysql_select_db(getDatabase($etablissement))  or die ("Impossible de sélectionner la BD.");	

			$resultat = mysql_query("SELECT * FROM ressources_profs WHERE ressources_profs.nom = '$nom' AND ressources_profs.prenom = '$prenom';" );
			$mess 	  = "";
			if($resultat) 
				{ // requete OK
					$user = mysql_fetch_assoc($resultat);
					if  ($user=='') 
						{ $mess = vers_page("Désolé, cet enseignant n'est pas présent dans la base."); }	}
						else { $mess = vers_page("Echec de la requête."); }
					if ($mess == "") 
						{ redirection("./traitement_profs.php"); }
						else {
							echo "<html> <head><title>ErreurBD</title></head>\n";
							echo "<body><br><br><div align=\"center\"><font color=\"red\"> $mess </font>\n";
							echo "<form><input type=\"button\" value=\"Retour\" onClick=\"self.history.back()\">";
							echo "</form></div></body></html>";
							exit; 
							}
			break;
			
			case "etudiant" : 
				redirection("./traitement_etudiants.php"); 
				break;
			
			case "salle" : 
				redirection("./traitement_salles.php"); 
				break;
			case "materiel" : 
				redirection("./traitement_materiels.php"); 
				break;
		}
		}
?>

	
	
