<?php

	require('./API/Smarty/Smarty.class.php'); // On inclut la classe Smarty
	include('./config/config.php');

	$smarty = new Smarty();
	
    $smarty->template_dir = dirname(__FILE__).'/gabarit_pdf';

	/* TODO On récupère les informations du PDF à afficher */
	
	$format=$_POST['formatPDF'];
	
	//recuperation des dates
	if (isset($_POST['beginDate']))
	{
		$beginDate = explode("-", $_POST['beginDate']);
		$annee_debut = $beginDate[2];
		$mois_debut = $beginDate[1];
		$jour_debut = $beginDate[0];
		$semaine_debut=date('W',mktime(0,0,0,$mois_debut,$jour_debut,$annee_debut));
		$jour_annee_debut=date('z',mktime(0,0,0,$mois_debut,$jour_debut,$annee_debut));
	}
	else
	{
		$annee_debut=date("Y");
		$mois_debut=date("m");
		$jour_debut=date("d");
		$semaine_debut=date("W");
		$jour_annee_debut=date("z");
	}
	
	if (isset($_POST['datefin']))
	{
		$endDate = explode("-", $_POST['endDate']);
		$annee_fin = $endDate[2];
		$mois_fin = $endDate[1];
		$jour_fin = $endDate[0];
		$semaine_fin=date('W',mktime(0,0,0,$mois_fin,$jour_fin,$annee_fin));
		$jour_annee_fin=date('z',mktime(0,0,0,$mois_fin,$jour_fin,$annee_fin));
	}
	else
	{
		$annee_fin=date("Y");
		$mois_fin=date("m");
		$jour_fin=date("d");
		$semaine_fin=date("W");
		$jour_annee_fin=date("z");
	}
	

	/* Assignation des données */
	$smarty->assign(array(
		'tpl_dir' => $smarty->template_dir.'invoice/',
		'infos_facture' => $infos,
		'total_facture' => $invoice->getTotal($id_facture),
		'infos_societe' => $societe,
		'logo' => 'logo.png'
	));

	/* Affichage des templates */
	$smarty->display('invoice/css/style.tpl');

	// On récupère le contenu de la page en sortie
	$content_html = ob_get_clean();

	/* On génère le PDF */
	require(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
	
	try
	{
		$marges = array(2, 2, 2, 2);
		$html2pdf = new HTML2PDF('P', $format, 'fr', false, 'ISO-8859-1', $marges);
		$html2pdf->setDefaultFont('times');
		$html2pdf->pdf->SetAuthor("VTAgenda");
		$html2pdf->writeHTML($content_html);
		
		//nom du fichier
		$jour=date('d');
		$mois=date('m');
		$annee=date('y');
		$nom_fichier.=$jour."_".$mois."_".$annee.".pdf";
		$html2pdf->Output($nom_fichier);
	}
	catch(HTML2PDF_exception $catch)
	{
		die('Impossible de générer la facture demandée');
	}
?>