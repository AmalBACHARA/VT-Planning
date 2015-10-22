<?php

	function translateDay($day)
	{
		if ($day=='Monday')
		{
			$day='Lundi';
		}
		else if ($day=='Tuesday')
		{
			$day='Mardi';
		}
		else if ($day=='Wednesday')
		{
			$day='Mercredi';
		}
		else if ($day=='Thursday')
		{
			$day='Jeudi';
		}
		else if ($day=='Friday')
		{
			$day='Vendredi';
		}
		else if ($day=='Saturday')
		{
			$day='Samedi';
		}
		else if ($day=='Sunday')
		{
			$day='Dimanche';
		}
		
		return $day;
	}
	
?>