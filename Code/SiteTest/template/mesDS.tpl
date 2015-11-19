<html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no" charset="utf-8"/>
		<title>VT Agenda - Mes DS</title>
		<link rel="icon" type="image/png" href="img/glyphicons_calendar_title.png"/>
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/common.css"/>
		<link href="API/footable/css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css">
		
		<script src="API/jquery/jquery.js"></script>
		<script type="text/javascript" src="API/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/loadPage.js"></script>
		<script type="text/javascript" src="API/footable/js/footable.js"></script>
		<script type="text/javascript" src="js/filterTable.js"></script>
	</head>
	<body>
		
		{include file='template/include/header.tpl'}
		
		<div class="container">
				<table class="table center-table col-sm-9 footable">
					<tr>
						<th>Date</th>
						<th data-hide="phone,tablet">Groupes</th>
						<th data-hide="phone,tablet">Type</th>
						<th>Enseignement</th>
						<th data-hide="phone,tablet">Profs</th>
						<th data-hide="phone,tablet">Salles</th>
						<th data-hide="phone,tablet">Heure de début</th>
						<th data-hide="phone,tablet">Durée</th>
						<th data-hide="phone,tablet">Effectué</th>
					</tr>
					{foreach from=$mesDS item=ds}
						<tr>
							<td>{$ds.dateDS}</td>
							<td>{$ds.groupeDS}</td>
							<td class="danger">DS</td>
							<td>{$ds.enseignementDS}</td>
							<td>{$ds.profs}</td>
							<td>{$ds.salles}</td>
							<td>{$ds.heureDS}</td>
							<td>{$ds.dureeDS}</td>
							<td>{$ds.passe}</td>
						</tr>
					{/foreach}
				</table>
		</div>
		
		{include file='template/include/footer.tpl'}
	
	</body>
</html>