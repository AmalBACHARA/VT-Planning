<?php

// TODO : put in config.php
$type_ens = array(   
	1 => "CM",
    2 => "TD",
    3 => "TP",
	4 => "4",
	5 => "5",
	6 => "6",
	7 => "ADM",
	8 => "8",
	9 => "DS",
	10 => "10",
	11 => "11",
	12 => "12",
	13 => "13",
	14 => "14",
	15 => "15"
);

$type_ens_class_table = array(
	1 => "info",
	2 => "success",
	3 => "warning",
	4 => "danger"
);

function type_ens_class($type_ens) {
	global $type_ens_class_table;
	if(0 < $type_ens && $type_ens < 4) {
		return $type_ens_class_table[$type_ens];
	} else {
		return $type_ens_class_table[4];
	}
}


$codeProf = 0;
if(isset($_GET["prof"]) && $_GET["prof"] != 0) {
	$codeProf = $_GET["prof"];
} else if (isset($_SESSION["teachCodeProf"])) {
	$codeProf = $_SESSION["teachCodeProf"];
}

$dateFilter = '0';
$minDate = '';
$maxDate = '';
if(isset($_GET["minDate"]) && isset($_GET["maxDate"])) {
	$minDate = $_GET["minDate"];
	$maxDate = $_GET["maxDate"];
	$dateFilter = '1';
}

if($codeProf != 0) {
	$sql = "
		SELECT
			seances.dureeSeance as seancesDureeSeance,
			GROUP_CONCAT(ressources_groupes.nom SEPARATOR ' / ') as nomFormation, 
			enseignements.identifiant as codeApogee, 
			matieres.nom as nomMatiere,
			seances.dateSeance,
			seances.heureSeance,
			codeTypeActivite,
			volumeReparti,
			forfaitaire
		FROM 
			seances_profs,
			seances,
			seances_groupes,
			ressources_groupes,
			enseignements,
			matieres
		WHERE 
			seances_profs.codeRessource=:codeProf AND 
			seances_profs.codeSeance=seances.codeSeance AND
			seances_groupes.codeSeance=seances.codeSeance AND
			seances_groupes.codeRessource=ressources_groupes.codeGroupe AND
			seances.codeEnseignement=enseignements.codeEnseignement AND
			matieres.codeMatiere=enseignements.codeMatiere AND 
			seances.deleted='0' AND 
			matieres.deleted='0' AND 
			enseignements.deleted='0' AND 
			seances.annulee='0' AND
			(:dateFilter='0' OR (:minDate <= seances.dateSeance AND seances.dateSeance <= :maxDate)) 
			GROUP BY seances.codeSeance
			ORDER BY seances.dateSeance	";
			
	$req = $dbh->prepare($sql);
	$req->execute(array(':codeProf' => $codeProf, ':dateFilter' => $dateFilter, ':minDate' => $minDate, ':maxDate' => $maxDate));
} 


$allSeances = array();

function pad_zero($value) {
	return sprintf("%02d", $value);
}

function add_int_hour($int_hour1, $int_hour2) {
	$minutes1 = $int_hour1 % 100;
	$heure1 = floor($int_hour1 / 100) + floor($minutes1 / 60);
	$minutes1 = $minutes1 % 60;
	
	$minutes2 = $int_hour2 % 100;
	$heure2 = floor($int_hour2 / 100) + floor($minutes2 / 60);
	$minutes2 = $minutes2 % 60;
	
	$heure = $heure1 + $heure2;
	$minutes = $minutes1 + $minutes2;
	
	$heure_result = $heure + floor($minutes / 60);
	$minutes_result = $minutes	% 60;
	
	return $heure_result * 100 + $minutes_result;
}

function pretty_hour($int_hour) {
	$minutes = $int_hour % 100;
	$heure = floor($int_hour / 100) + floor($minutes / 60);
	$minutes = $minutes % 60;
	if ($heure == 0 && $minutes == 0) {
		return "";
	} else {
		return pad_zero($heure).'h'.pad_zero($minutes);
	}
}

$cumuls = array();
$heuresParMois = array(9 => 0, 10 => 0, 11 => 0, 12 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0);
while($ligne = $req->fetch())
{
	// On retourne le sens de  la date de la séance
	$ligne["dateSeance"] = date("d-m-Y", strtotime($ligne["dateSeance"]));
	$ligne["dateSeanceFormatee"] = date("Y-m-d", strtotime($ligne["dateSeance"]));
	
	$currMonth = (int)date("m", strtotime($ligne["dateSeance"]));
	$heuresParMois[$currMonth] = add_int_hour($heuresParMois[$currMonth], $ligne["seancesDureeSeance"]);
	
	// Calcul heure Fin avec Heure Début et Durée 
	$heureFin = add_int_hour($ligne["heureSeance"], $ligne["seancesDureeSeance"]);
	
	$typeEnsCourant = $ligne["codeTypeActivite"];
	$ligne["heureFin"] = pretty_hour($heureFin);
	$ligne["heureDebut"] = pretty_hour($ligne["heureSeance"]);
	$ligne["typeEnsName"] = $type_ens[$typeEnsCourant];
	$ligne["typeEnsClass"] = type_ens_class($typeEnsCourant);
	
	$dureeSeance = $ligne["seancesDureeSeance"];
	$eqTD =  $typeEnsCourant == 1 && $dureeSeance > 0 ? $dureeSeance + 130 : $dureeSeance; 
	
	if(array_key_exists($ligne["nomMatiere"], $cumuls)) {
		if(array_key_exists($typeEnsCourant, $cumuls[$ligne["nomMatiere"]]) != true) {
			$cumuls[$ligne["nomMatiere"]][$typeEnsCourant] = $dureeSeance;
		} else { 
			$cumuls[$ligne["nomMatiere"]][$typeEnsCourant] = add_int_hour($cumuls[$ligne["nomMatiere"]][$typeEnsCourant], $dureeSeance);
		}
		$cumuls[$ligne["nomMatiere"]]["eqTD"] = add_int_hour($cumuls[$ligne["nomMatiere"]]["eqTD"], $eqTD);
	} else {
	    $cumuls[$ligne["nomMatiere"]] = array(
			"type" => "cumul",
			"nomMatiere" => $ligne["nomMatiere"],
			$typeEnsCourant => $dureeSeance,
			"eqTD" => $eqTD
		);
	}
	
	$ligne["dureeSeance"] = pretty_hour($dureeSeance);
	$ligne["eqTD"] = pretty_hour($eqTD);
	$ligne["type"] = "normal";
	
	array_push($allSeances, $ligne);
}

function extractCumul($typeEns, $cumul) {
	return 	pretty_hour(array_key_exists($typeEns, $cumul) ? $cumul[$typeEns] : 0);
}

foreach($cumuls as $cumul) {
	$cumul["cumulCM"] = extractCumul(1, $cumul);
	$cumul["cumulTD"] = extractCumul(2, $cumul);
	$cumul["cumulTP"] = extractCumul(3, $cumul);
	$cumul["cumulDS"] = extractCumul(9, $cumul);
	$cumul["cumulADM"] = extractCumul(7, $cumul);
	$cumul["eqTD"] = pretty_hour($cumul["eqTD"]);
	array_push($allSeances, $cumul);
}

foreach($heuresParMois as $month => $cumulHeures) {
	$strEngMois = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	$strFrMois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août',	'Septembre', 'Octobre', 'Novembre',	'Décembre');

	$strMonth = str_ireplace($strEngMois, $strFrMois, date('F', mktime(0, 0, 0, $month, 10)));
	
	//$heuresParMois["heure"]=pretty_hour($cumulHeures);
	$heuresParMois[$month] = array("num" => $cumulHeures, "str" => pretty_hour($cumulHeures), "mois" => $strMonth);
	
}

$req->closeCursor();


?>