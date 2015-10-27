<?php

session_start();

require('API/Smarty/Smarty.class.php'); // On inclut la classe Smarty

$smarty = new Smarty();

include('config/config.php');
					
//compteur de pages vues
$sql="SELECT valeur FROM compteur WHERE id_compteur='1'";
$compteur_req=$dbh->query($sql);
$compteur_res=$compteur_req->fetchAll();
$compteur=$compteur_res['0']['valeur'];
$smarty->assign("compteur", $compteur);

$smarty->assign("annees", $annee_scolaire);
$smarty->assign("date_actuelle", $date_actuelle);


/* l'utilisateur est connecté */
if (isset($_SESSION['studyLogin']) || isset($_SESSION['teachLogin']))
{
	/* l'utilisateur connecté est un étudiant */
	if (isset($_SESSION['studyLogin']))
	{
		include('script/getStudyInfos.php');
		$smarty->assign("loginStudy",$loginUtilisateur);
		$smarty->assign("userName",$userName);
		
	}
	else
	{
		/* l'utilisateur connecté est un enseignant */
		include('script/getTeachInfos.php');
		$smarty->assign("teachLogin",$loginUtilisateur);
		$smarty->assign("firstName",$firstName);
		$smarty->assign("userName",$userName);
		
		include('script/getAllFormation.php');
		$smarty->assign("formations", $formations);
		include('script/getAllGroupesInfo.php');
		$smarty->assign("groupes", $allGroupes);
		include('script/getComposantes.php');
		$smarty->assign("composantes", $composantes);
		include('script/getAllTeacherInfos.php');
		$smarty->assign("profs", $allTeachers);
		$smarty->assign("code", $codeProf);
		include('script/getAllDepartementInfo.php');
		$smarty->assign("departements", $allDepartements);
		include('script/getAllSallesInfo.php');
		$smarty->assign("salles", $allSalles);
		include('script/getAllMaterielsInfo.php');
		$smarty->assign("materiels", $allMateriels);
		include('script/getAllMaterielsBisInfo.php');
		$smarty->assign("materielsBis", $allMaterielsBis);
		
		include('script/getDroits.php');
		$smarty->assign("droits", $droits);
	}
	
	if (isset($_GET['page']))
	{
		// NAVIGATION ETUDIANT
		if (isset($_SESSION['studyLogin']))
		{
			if ($_GET['page'] == "deconnexion")
			{
				include('script/disconnect.php');
				$smarty->assign("successMsg", "Déconnexion reussie");
				$smarty->display("template/login.tpl");
			}
			else if ($_GET['page'] == "module")
			{
				include('script/getStudyModule.php');
				$smarty->assign("liste_enseignement", $liste_enseignement);
				$smarty->display("template/modules.tpl");
			}
			else if ($_GET['page' ] == "export")
			{
				include('script/getAllFormation.php');
				$smarty->assign("formations", $formations);
				$smarty->display("template/export.tpl");
			}
			else if ($_GET['page'] == "RSS")
			{
				include('RSSetudiant/rss.php');
				$smarty->assign("xml",$xml);
				$smarty->display("template/rss.tpl");
			}
			else if ($_GET['page'] == "mesDS")
			{
				include('script/getDS.php');
				$smarty->assign("mesDS", $mesDS);
				$smarty->display("template/mesDS.tpl");
			}
			else if ($_GET['page'] == "version")
			{
				$smarty->display("template/versions.tpl");
			}
			else if ($_GET['page'] == "nous")
			{
				$smarty->display("template/infosDev.tpl");
			}
			else if ($_GET['page'] == "agendas_ics")
			{
				$smarty->display("template/agendas_ics.tpl");
				//$smarty->display('');
			}
			else
			{
				$smarty->display("template/index.tpl");
			}
		}
		else
		{
			// NAVIGATION ENSEIGNANT
			if ($_GET['page'] == "deconnexion")
			{
				include('script/disconnect.php');
				$smarty->assign("successMsg", "Déconnexion reussie");
				$smarty->display("template/login.tpl");
			}
			else if ($_GET['page'] == "occupationSalle")
			{
				include('script/getOccupationSalle.php');
				$smarty->assign("occupations", $occupations);
				$smarty->display("template/occupationSalle.tpl");
			}
			else if ($_GET['page'] == "module")
			{
				include('script/getComposantes.php');
				$smarty->assign("composantes", $composantes);
				include('script/getAllTeacherInfos.php');
				$smarty->assign("profs", $allTeachers);
				$smarty->assign("code", $codeProf);
				$smarty->display("template/modules.tpl");
			}
			else if ($_GET['page' ] == "heure")
			{
				include('script/getComposantes.php');
				$smarty->assign("composantes", $composantes);
				include('script/getComputerScienceTeachers.php');
				$smarty->assign("allCSTeachers", $allCSTeachers);
				$smarty->assign("code", $code);
				include('script/getTeachersHours.php');
				$smarty->assign("allSeances", $allSeances);
				$smarty->assign("codeProf", $codeProf);
				$smarty->assign("heuresParMois", $heuresParMois);
				if(isset($_GET['ajax'])) {
					$smarty->display("template/include/heures_tab.tpl");
				} else if (isset($_GET['ajax_pdf'])) {
				    $smarty->display("template/include/heures_tab_pdf.tpl");
				} else if (isset($_GET['json'])) {
					$smarty->display("template/include/heures_chart_data.tpl");
				} else {
					$smarty->display("template/heures.tpl");
				}
			}
			else if ($_GET['page' ] == "export" && ($droits['pdf'] == 1 || $droits['giseh'] == 1))
			{
				include('script/getAllFormation.php');
				$smarty->assign("formations", $formations);
				$smarty->display("template/export.tpl");
			}
			else if ($_GET['page'] == "config")
			{
				include('script/getUserConfig.php');
				$smarty->assign("userConfs", $userConfs);
				if (isset($_GET['successId']))
				{
					$successMsg = "";
					if ($_GET['successId'] == 1)
					{
						$successMsg = "Modifications sauvegardées";
					}
					$smarty->assign("successMsg", $successMsg);
				}
				$smarty->display("template/maConfig.tpl");
			}
			else if ($_GET['page'] == "RSS")
			{
				include('RSS/rss.php');
				$smarty->assign("xml",$xml);
				$smarty->display("template/rss.tpl");
			}
			else if ($_GET['page'] == "droits")
			{
				$smarty->display("template/droits.tpl");
			}
			else if ($_GET['page'] == "dialogue" && $droits['dialogue'] == 1)
			{
				include('script/getComposantes.php');
				include('script/computeDialogueGestion.php');
				$smarty->assign("composantes", $composantesComplet);
				
				$smarty->display("template/dialogueGestion.tpl");
			}
			else if ($_GET['page'] == "admin" && $droits['admin'] == 1)
			{
				include('script/getAllTeacherInfos.php');
				$smarty->assign("allTeachers", $allTeachers);
				
				$smarty->display("template/admin.tpl");
			}
			else if ($_GET['page'] == "version")
			{
				$smarty->display("template/versions.tpl");
			}
			else if ($_GET['page'] == "nous")
			{
				$smarty->display("template/infosDev.tpl");
			}
			else if ($_GET['page'] == "agendas_ics")
			{
				$smarty->display("template/agendas_ics.tpl");
				//$smarty->display('');
			}
			else
			{
				$smarty->display("template/index.tpl");
			}
		}
	}
	else
	{
		$smarty->display("template/index.tpl");
	}
}
/* l'utilisateur n'est pas connecté */
else
{
	if (isset($_GET['page']) && $_GET['page'] == "version")
	{
		$smarty->display("template/versions.tpl");
	}
	else if (isset($_GET['page']) && $_GET['page'] == "nous")
	{
		$smarty->display("template/infosDev.tpl");
	}
	else
	{
		$smarty->display("template/login.tpl");
	}
}
?>