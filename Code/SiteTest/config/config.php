<?php
$user='root';
$pass='';
$serveur='localhost';

$base=array();
$annee_scolaire=array();
$base[0]='vt_agenda';
$annee_scolaire[0]='2013-2014';
$nbdebdd='1';

//recuperation de la date du jour pour l'afficher au dessus du tableau ( Mes heures)
date_default_timezone_set('Europe/Paris');
$date_actuelle=date("Y-m-d");
$jour=date('d');
$mois=date('m');
$annee=date('y');
$heure=date('H');
$minute=date('i');

//url du site (utile pour la g�n�ration des pdf)(pas de / � la fin)
$url_site="http://ufrsitec.u-paris10.fr/edt";

//heure du d�but et de fin de  journ�e (pour 8h30 par exemple, il faut mettre 08.50)
$heure_debut_journee=08.00;
$heure_fin_journee=19.50;

//heure du d�but et de fin de la pause du matin (pour 11h30 par exemple, il faut mettre 11.50)
$heure_debut_pause_matin=10.25;
$heure_fin_pause_matin=10.50;

//heure du d�but et de fin de la pause de midi (pour 11h30 par exemple, il faut mettre 11.50)
$heure_debut_pause_midi=12.50;
$heure_fin_pause_midi=13.75;

//heure du d�but et de fin de la pause de l'apr�s-midi (pour 15h30 par exemple, il faut mettre 15.50)
$heure_debut_pause_apresmidi=15.75;
$heure_fin_pause_apresmidi=16.00;

//Code de l'identifiant des DS dans la base de donn�es de VT (par d�faut 9 sauf si vous l'avez chang�)
$identifiant_DS=9;

$k=$nbdebdd-1;
$dernierebase=$base[$k];

try
{
	$dbh=new PDO("mysql:host=$serveur;dbname=$dernierebase;",$user,$pass);
}
catch(PDOException $e)
{
	die("erreur ! : " .$e->getMessage());
}

?>
