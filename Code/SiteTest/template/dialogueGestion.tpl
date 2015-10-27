<html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
		<meta charset="utf-8">
		<title>VT Agenda - Dialogue de gestion</title>
		<link rel="icon" type="image/png" href="img/glyphicons_calendar_title.png"/>
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/common.css"/>
		<link rel="stylesheet" href="css/dialogueGestion.css"/>
		<link href="API/footable/css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="API/jquery/jquery.js"></script>
		<script type="text/javascript" src="API/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/loadPage.js"></script>
		<script type="text/javascript" src="API/footable/js/footable.js"></script>
		<script src="API/footable/js/footable.sort.js?v=2-0-1" type="text/javascript"></script>
		<script type="text/javascript" src="js/filterTable.js"></script>
	</head>
	<body>
		{include file='template/include/header.tpl'}
		<div class="container">
		{foreach from=$composantes item=composante}
			<h2>{$composante.nom}</h2>
			<table class="table center-table col-sm-9 footable">
				<thead>
					<tr>
						<th>Grade</th>
						<th data-hide="phone,tablet">Nom des enseignants</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Horaires statuaires</th>
						<th data-sort-ignore="true">Nombre</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Potentiel enseignement en heure</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$composante.grades item=grade}
						<tr>
							<td>{$grade.nom}</td>
							<td class="resource_cell">{$grade.resources}</td>
							<td>{$grade.heure_vol_stat}h{$grade.minutes_vol_stat}</td>
							<td>{$grade.nb_prof}</td>
							<td>{$grade.nb_heure}</td>
						</tr>
					{/foreach}
					<tr class="success">
						<td colspan="4" class="potentielLabel">Potentiel Enseignement total</td>
						<td>{$composante.nbHeure}</td>
					</tr>
				</tbody>
			</table>
		{/foreach}
		</div>
		
		{include file='template/include/footer.tpl'}
	</body>
</html>