<html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
		<meta charset="utf-8">
		<title>VT Agenda - Mes Droits</title>
		<link rel="icon" type="image/png" href="img/glyphicons_calendar_title.png"/>
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/common.css"/>
		<link rel="stylesheet" href="css/droits.css"/>
		<script type="text/javascript" src="API/bootstrap-calendar-master/components/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="API/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="js/loadPage.js"></script>
	</head>
	<body>
		
		{include file='template/include/header.tpl'}
		<div class="container">
		<div class="table-responsive" id="vueDroits">
			<table class="table-striped center-table">
				<tr>
				   <th id="thdroittable">Droits</th>
				   <th>Activation</th>
				</tr>
			    <tr>
				   <td id="thdroittable">Administrateur</td>
				   <td>
						{if $droits.admin == 1}
							<span class="glyphicon glyphicon-ok-circle"></span>
						{else}
							<span class="glyphicon glyphicon-ban-circle"></span>
						{/if}
					</td>
			    </tr>
			    <tr>
				   <td id="thdroittable">Dialogue de gestion</td>
				   <td>
						{if $droits.dialogue == 1}
							<span class="glyphicon glyphicon-ok-circle"></span>
						{else}
							<span class="glyphicon glyphicon-ban-circle"></span>
						{/if}
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Export PDF</td>
				   <td>
						{if $droits.pdf == 1}
							<span class="glyphicon glyphicon-ok-circle"></span>
						{else}
							<span class="glyphicon glyphicon-ban-circle"></span>
						{/if}
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Faire le bilan de l'occupation des salles</td>
				   <td>
						{if $droits.salle == 1}
							<span class="glyphicon glyphicon-ok-circle"></span>
						{else}
							<span class="glyphicon glyphicon-ban-circle"></span>
						{/if}
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Faire le bilan de ses heures</td>
				   <td>
						{if $droits.bilan_heure == 1}
							<span class="glyphicon glyphicon-ok-circle"></span>
						{else}
							<span class="glyphicon glyphicon-ban-circle"></span>
						{/if}
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Faire le bilan des heures de tout le monde</td>
				   <td>
						{if $droits.bilan_heure_global == 1}
							<span class="glyphicon glyphicon-ok-circle"></span>
						{else}
							<span class="glyphicon glyphicon-ban-circle"></span>
						{/if}
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Faire le bilan des heures des formations</td>
				   <td>
						{if $droits.bilan_formation == 1}
							<span class="glyphicon glyphicon-ok-circle"></span>
						{else}
							<span class="glyphicon glyphicon-ban-circle"></span>
						{/if}
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Flux RSS</td>
				   <td>
						{if $droits.rss == 1}
							<span class="glyphicon glyphicon-ok-circle"></span>
						{else}
							<span class="glyphicon glyphicon-ban-circle"></span>
						{/if}
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Modifier sa configuration</td>
				   <td>
						{if $droits.configuration == 1}
							<span class="glyphicon glyphicon-ok-circle"></span>
						{else}
							<span class="glyphicon glyphicon-ban-circle"></span>
						{/if}
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Se placer des réservations</td>
				   <td>
						{if $droits.reservation == 1}
							<span class="glyphicon glyphicon-ok-circle"></span>
						{else}
							<span class="glyphicon glyphicon-ban-circle"></span>
						{/if}
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Séances clicables</td>
				   <td>
						{if $droits.seance_clicable == 1}
							<span class="glyphicon glyphicon-ok-circle"></span>
						{else}
							<span class="glyphicon glyphicon-ban-circle"></span>
						{/if}
					</td>
			    </tr>
			</table>
		</div>
		</div>
		{include file='template/include/footer.tpl'}
	</body>
</html>