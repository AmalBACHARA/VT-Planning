<html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
		<meta charset="utf-8">
		<title>VT Calendar - Mes heures</title>
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css"/>
		<link href="API/footable/css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="js/loadPage.js"></script>
		<script type="text/javascript" src="API/jquery/jquery.js"></script>
		<script type="text/javascript" src="API/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="js/filterTable.js"></script>
		<script type="text/javascript" src="API/googleCharts/googleCharts.js"></script>
		<script type="text/javascript" src="js/heure.js"></script>
		<script type="text/javascript" src="API/footable/js/footable.js"></script>
		<script src="API/footable/js/footable.sort.js?v=2-0-1" type="text/javascript"></script>
		<script type="text/javascript" src="API/tableExport/tableExport.js"></script>
		<script type="text/javascript" src="API/tableExport/jquery.base64.js"></script>
		<link rel="stylesheet" href="css/common.css"/>
		<link rel="stylesheet" href="css/login.css"/>
	</head>

	<body>
		{include file='template/include/header.tpl'}
		<div class="container">
			<div class="col-md-4 col-centered">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong class="">Afficher mes Heures</strong>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form" name="form" id="form" method="get" >

							<input type="hidden" name="page" value="heure" />
							<label>Année scolaire :</label>
							<select class="form-control" name="annee_scolaire">
								{foreach from=$annees item=annee}
									<option>{$annee}</option>
								{/foreach}
							</select><br>

							<label>Tri par Département :</label>
							<select class="form-control" name="composante" onchange="document.form.submit();">
								<option value="all">TOUS</option>
								{foreach from=$composantes item=composante}
									<option {if $composante.codeComposante == $code}selected="selected"{/if} value="{$composante.codeComposante}">{$composante.nom}</option>
								{/foreach}
							</select><br>

							<label>Choix du professeur :</label>
							<select name="prof" class="form-control" id="prof" required="">
								{foreach from=$allCSTeachers item=csTeacher}
									<option {if $csTeacher.codeProf == $codeProf}selected="selected"{/if}  value="{$csTeacher.codeProf}">{$csTeacher.nom}   {$csTeacher.prenom}</option>
								{/foreach}
							</select><br>
						</form>
					</div>
					<div class="panel-footer">
							<a download="seances.csv" {literal}onClick ="this.href = $('#hiddenTableSeance').tableExportInline({type:'csv',escape:'false',separator:';',consoleLog:true}); return true;"{/literal}>Exporter vers Excel</a>
					</div>
				</div>
			</div>


			<table class="table-striped table center-table footable" id="tableSeance" >
				<thead>
					<tr>
						<th data-sort-ignore="true">Formation</th>
						<th data-hide="phone,tablet">Code apogée</th>
						<th>Matière</th>
						<th data-hide="phone,tablet" data-sort-ignore="true" class="date_column">Date</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Heure début</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Heure fin</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Horaire réparti / nb profs</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Forfait</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Type</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Durée</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">EqTD</th>
						<th data-sort-ignore="true">Effectuée</th>
					</tr>
				</thead>

				<tbody id="tableContent">
					{include file='template/include/heures_tab.tpl'}
				</tbody>
			</table>

			<table id="hiddenTableSeance" style="position: absolute; top: -10000px;">
				<thead>
					<tr>
						<th>Formation</th>
						<th>Code apogée</th>
						<th>Matière</th>
						<th>Date</th>
						<th>Heure début</th>
						<th>Heure fin</th>
						<th>Horaire réparti / nb profs</th>
						<th>Forfait</th>
						<th>Type</th>
						<th>Durée</th>
						<th>EqTD</th>
						<th>Effectuée</th>
					</tr>
				</thead>
				<tbody id="hiddenTableContent">
					{include file='template/include/heures_tab.tpl'}
				</tbody>
			</table>


			<div id="chart_div" class="hidden-xs hidden-sm"></div>

		</div>

		{include file='template/include/footer.tpl'}

	</body>

</html>
