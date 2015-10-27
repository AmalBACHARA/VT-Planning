<html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
		<meta charset="utf-8">
		<title>VT Agenda - Qui sommes nous</title>
		<link rel="icon" type="image/png" href="img/glyphicons_calendar_title.png"/>
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/common.css"/>
		<link rel="stylesheet" href="css/infosDev.css"/>
		<script src="API/jquery/jquery.js"></script>
		<script type="text/javascript" src="API/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="js/loadPage.js"></script>
	</head>
	
	<body>
		<div class="page-header">
				<h2>
					<a onClick="loadIndex()">
						<span class="glyphicon glyphicon-calendar"></span>
						VT CALENDAR 
					</a>
					<small>consultation des emplois du temps faits avec VT</small><br>
				</h2>
		</div>
		
		<div class="container">
			<!-- description du projet -->
			<h3>DESCRIPTION DU PROJET</h3>
			<p>Cet outil a été mis à jour par le biais d'un projet de master 2 MIAGE à l'université d'EVRY. L'objectif de ce projet était de faire une refonte graphique de VTAgenda afin de l'adapter aux téléphones et tablettes</p>
			<br><br><br>
			
			<!-- LISTE DES INTERVENANTS -->
			<h3>LISTE DES INTERVENANTS</h3>
			<br>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Bruno MILLION & Gaëtan COLOMBIER</h3>
				</div>
				<div class="panel-body">
					<ul>
						<li>Réalisation des premières versions de VTAgenda</li>
					</ul>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Didier COURTAUD</h3>
				</div>
				<div class="panel-body">
					<ul>
						<li>Encadrement du projet VT2</li>
					</ul>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Luis BRAGA - Apprenti M2 MIAGE</h3>
				</div>
				<div class="panel-body">
					<ul>
						<li>Réalisation du calendrier avec la librairie bootstrap-calendar</li>
						<li>Insertion des données dans le calendrier</li>
						<li>Système de filtrage</li>
						<li>Optimisation CSS des pages</li>
						<li>Page index</li>
						<li></li>
					</ul>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Pierrick MOREAU  - Apprenti M2 MIAGE</h3>
				</div>
				<div class="panel-body">
					<ul>
						<li>Architecture du projet</li>
						<li>Réalisation des templates de pages</li>
						<li>Page Modules, QuiSommesNous, Login, DialogueGestion, Droits, Admin, Config, mesDS, OccupationSalle</li>
						<li>Entretien du Github</li>
					</ul>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edmond S'NADANE  - Apprenti M2 MIAGE</h3>
				</div>
				<div class="panel-body">
					<ul>
						<li>Réalisation de la page de consultation des heures</li>
						<li>Développement de la page versions de VTAgenda</li>
						<li>Developpement de la page d'export PDF</li>
						<li>Script d'export EXCEL</li>
					</ul>
				</div>
			</div>
		</div>
		
		{include file='template/include/footer.tpl'}
	</body>
</html>