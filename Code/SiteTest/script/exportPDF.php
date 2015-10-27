<?php

	// TODO : REFAIRE SCRIPT A L'AIDE DE HTML2PDF 
	session_start();
	
	require('../API/fpdf/fpdf.php');
	include("../config/config.php");

	$pdf=new FPDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->SetFont('Times','',10);
	$pdf->SetTitle('Emploi du temps - version du '.date("d/m/Y"));
	$pdf->SetAuthor('Bruno Million (bruno.million@u-paris10.fr)');
	$pdf->SetCreator('VT agenda');
	
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
	
	//préparation requetes
	$sql="SELECT * FROM ressources_groupes WHERE codeGroupe=:codeRessource and deleted=0";
	$req_nom_groupe=$dbh->prepare($sql);
	$sql="SELECT * FROM ressources_profs WHERE codeProf=:codeRessource and deleted=0";
	$req_nom_prof=$dbh->prepare($sql);
	$sql="SELECT * FROM ressources_salles WHERE codeSalle=:codeRessource and deleted=0";
	$req_nom_salle=$dbh->prepare($sql);
	$sql="SELECT * FROM ressources_materiels WHERE codeMateriel=:codeRessource and deleted=0";
	$req_nom_materiel=$dbh->prepare($sql);
	
	//définition de l'image à afficher
	$nom_image="";
	//emplacement
	$nom_image=$url_site;

	//date de génération
	$jour_gene=date('d');
	$mois_gene=date('m');
	$annee_gene=date('y');
	$date_generation=$jour_gene."/".$mois_gene."/".$annee_gene;


	if(strlen($semaine_debut)==1)
	{
		$semaine_debut="0".$semaine_debut;
	}
	if(strlen($semaine_fin)==1)
	{
		$semaine_fin="0".$semaine_fin;
	}

	$debut=$annee_debut.$mois_debut.$jour_debut;

	$fin=$annee_fin.$mois_fin.$jour_fin;


	if ($debut<=$fin)
	{
		if ($annee_debut==$annee_fin)
		{
			$memoire_mois="";
			for($i=$semaine_debut;$i<=$semaine_fin;$i++)
			{
				if ($format=="A4")
				{
					$pdf->AddPage('P','A4');
					$pdf->Image($nom_image.'&'.'current_year='.$annee_debut.'&'.'current_week='.$i,10,20,190,'PNG');
				}
				else
				{
					$pdf->AddPage('P','A3');
					$pdf->Image($nom_image.'&'.'current_year='.$annee_debut.'&'.'current_week='.$i,10,20,277, 'PNG');
				}
				$pdf->Cell(0,2.5,$titre,0,0,'C');
				$pdf->Cell(0,2.5,"Généré le ".$date_generation,0,1,'R');
				$pdf->SetFont('Times','',8);
				$pdf->Cell(0,2.5,'Semaine '.$i." de ".$annee_debut,0,1,'C');
						
				$pdf->Cell(0,2.5,$nom_ressource,0,1,'C');
				$pdf->SetFont('Times','',6);
				if ($hideprobleme==1 && $hideprivate==1)
				{
					$pdf->Cell(0,2.5,'Les éventuels conflits et les réservations ne sont pas affichés sur ce planning',0,1,'C');
				}
				elseif ($hideprobleme==0 && $hideprivate==1)
				{
					$pdf->Cell(0,2.5,'Les réservations ne sont pas affichées sur ce planning',0,1,'C');
				}
				elseif ($hideprobleme==1 && $hideprivate==0)
				{
					$pdf->Cell(0,2.5,'Les éventuels conflits ne sont pas affichés sur ce planning',0,1,'C');
				}
				else
				{
					$pdf->Cell(0,2.5,'Les éventuels conflits et les réservations sont affichés sur ce planning',0,1,'C');
				}
			}			
		}
		else
		{
			for($j=$annee_debut;$j<=$annee_fin;$j++)
			{
				$memoire_mois="";
				if($j==$annee_debut)
				{
					for($i=$semaine_debut;$i<=52;$i++)
					{
						if ($format=="A4")
						{
							$pdf->AddPage('P','A4');
							$pdf->Image($nom_image.'&'.'current_year='.$annee_debut.'&'.'current_week='.$i,10,20,190, 'PNG');
						}
						else
						{
							$pdf->AddPage('P','A3');
							$pdf->Image($nom_image.'&'.'current_year='.$annee_debut.'&'.'current_week='.$i,10,20,277, 'PNG');
						}
						$pdf->Cell(0,2.5,$titre,0,0,'C');
						$pdf->Cell(0,2.5,"Généré le ".$date_generation,0,1,'R');
						$pdf->SetFont('Times','',8);
						$pdf->Cell(0,2.5,'Semaine '.$i." de ".$j,0,1,'C');
								
						$pdf->Cell(0,2.5,$nom_ressource,0,1,'C');
						$pdf->SetFont('Times','',6);
						if ($hideprobleme==1 && $hideprivate==1)
						{
							$pdf->Cell(0,2.5,'Les éventuels conflits et les réservations ne sont pas affichés sur ce planning',0,1,'C');
						}
						elseif ($hideprobleme==0 && $hideprivate==1)
						{
							$pdf->Cell(0,2.5,'Les réservations ne sont pas affichées sur ce planning',0,1,'C');
						}
						elseif ($hideprobleme==1 && $hideprivate==0)
						{
							$pdf->Cell(0,2.5,'Les éventuels conflits ne sont pas affichés sur ce planning',0,1,'C');
						}
						else
						{
							$pdf->Cell(0,2.5,'Les éventuels conflits et les réservations sont affichés sur ce planning',0,1,'C');
						}						
					}
				}
				elseif($j!=$annee_debut && $j!=$annee_fin)
				{
					for($i=1;$i<=52;$i++)
					{	
						if ($format=="A4")
						{
							$pdf->AddPage('P','A4');
							$pdf->Image($nom_image.'&'.'current_year='.$j.'&'.'current_week='.$i,10,20,190, 'PNG');
						}
						else
						{
							$pdf->AddPage('P','A3');
							$pdf->Image($nom_image.'&'.'current_year='.$j.'&'.'current_week='.$i,10,20,277, 'PNG');
						}
						$pdf->Cell(0,2.5,$titre,0,0,'C');
						$pdf->Cell(0,2.5,"Généré le ".$date_generation,0,1,'R');
						$pdf->SetFont('Times','',8);
						$pdf->Cell(0,2.5,'Semaine '.$i." de ".$j,0,1,'C');
						$pdf->Cell(0,2.5,$nom_ressource,0,1,'C');
						$pdf->SetFont('Times','',6);
						if ($hideprobleme==1 && $hideprivate==1)
						{
							$pdf->Cell(0,2.5,'Les éventuels conflits et les réservations ne sont pas affichés sur ce planning',0,1,'C');
						}
						elseif ($hideprobleme==0 && $hideprivate==1)
						{
							$pdf->Cell(0,2.5,'Les réservations ne sont pas affichées sur ce planning',0,1,'C');
						}
						elseif ($hideprobleme==1 && $hideprivate==0)
						{
							$pdf->Cell(0,2.5,'Les éventuels conflits ne sont pas affichés sur ce planning',0,1,'C');
						}
						else
						{
							$pdf->Cell(0,2.5,'Les éventuels conflits et les réservations sont affichés sur ce planning',0,1,'C');
						}
					}
				}
				else
				{
					for($i=1;$i<=$semaine_fin;$i++)
					{
						if ($format=="A4")
						{
							$pdf->AddPage('P','A4');
							$pdf->Image($nom_image.'&'.'current_year='.$j.'&'.'current_week='.$i,10,20,190, 'PNG');
						}
						else
						{
							$pdf->AddPage('P','A3');
							$pdf->Image($nom_image.'&'.'current_year='.$j.'&'.'current_week='.$i,10,20,277, 'PNG');
						}
						$pdf->Cell(0,2.5,$titre,0,0,'C');
						$pdf->Cell(0,2.5,"Généré le ".$date_generation,0,1,'R');
						$pdf->SetFont('Times','',8);
						$pdf->Cell(0,2.5,'Semaine '.$i." de ".$j,0,1,'C');
						$pdf->Cell(0,2.5,$nom_ressource,0,1,'C');
						$pdf->SetFont('Times','',6);
						if ($hideprobleme==1 && $hideprivate==1)
						{
							$pdf->Cell(0,2.5,'Les éventuels conflits et les réservations ne sont pas affichés sur ce planning',0,1,'C');
						}
						elseif ($hideprobleme==0 && $hideprivate==1)
						{
							$pdf->Cell(0,2.5,'Les réservations ne sont pas affichées sur ce planning',0,1,'C');
						}
						elseif ($hideprobleme==1 && $hideprivate==0)
						{
							$pdf->Cell(0,2.5,'Les éventuels conflits ne sont pas affichés sur ce planning',0,1,'C');
						}
						else
						{
							$pdf->Cell(0,2.5,'Les éventuels conflits et les réservations sont affichés sur ce planning',0,1,'C');
						}
					}
				}
			}
		}
	}
	else
	{
		// redirection avec message d'erreur
	}

	//nom du fichier
	$jour=date('d');
	$mois=date('m');
	$annee=date('y');
	$nom_fichier="";
	
	$nom_fichier.=$jour."_".$mois."_".$annee.".pdf";
	$pdf->Output($nom_fichier,'D');
?>