<?php
//getGroupesByFormation

        session_start();
	include('../config/config.php');
	
	$groupes = array();
        
	if (isset($_POST['code']))
	{
		if ($_POST['code'] == "all")
		{
			// 'TOUS' EST SELECTIONNE
                        include('getAllGroupesInfo.php');
			foreach ($allGroupes as $groupe)
			{
				array_push($groupes, implode('#', array($groupe['codeGroupe'], $groupe['nom'], $groupe['alias'])));
			}
		}
		else
		{
			$sql="SELECT * FROM ressources_groupes WHERE deleted='0' and codeNiveau=".$_POST['code']."  ORDER BY nom";
			$req_groupe=$dbh->prepare($sql);
			$req_groupe->execute();
			while($ligne = $req_groupe->fetch())
			{
				array_push($groupes, implode('#', array($ligne['codeGroupe'], $ligne['nom'], $ligne['alias'])));
			}
		}
		echo implode('~', $groupes);
	}
?>