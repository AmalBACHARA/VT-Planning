<html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
		<meta charset="utf-8">
		<title>VT Agenda - Configuration</title>
		<link rel="icon" type="image/png" href="img/glyphicons_calendar_title.png"/>
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/common.css"/>
		<script type="text/javascript" src="API/jquery/jquery.js"></script>
		<script type="text/javascript" src="API/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="js/loadPage.js"></script>
		<script type="text/javascript" src="js/config.js"></script>
	</head>
	<body>
		{include file='template/include/header.tpl'}
		<div class="container">
			<div class="col-md-4 col-centered">
			
				<!-- div - retour login.js -->
					<div id="retourLoginJs"></div>
				<!-- ./div - retour login.js -->
				
				<div class="panel panel-default">
					<div class="panel-heading"> 
						<strong class="">Modifier votre configuration</strong>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" id="modifyConfigForm" role="form" method="post" action="#">
							<div class="form-group">
								<label for="weekend" class="col-sm-3 control-label">Weekend ?</label>
								<div class="col-sm-9">
									<select name="weekend" class="form-control" id="weekend" required="">
										<option value=2>Samedi et dimanche</option>
										<option value=1>Samedi</option>
										<option value=0>Ni samedi ni dimanche</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="beginTime" class="col-sm-3 control-label">Heure début</label>
								<div class="col-sm-9">
									<select name="beginTime" class="form-control" id="beginTime" required="">
										{foreach from=$userConfs.listHeuresDebut item=heureDebut}
											<option value={$heureDebut.codeHeure}>{$heureDebut.heure}h{$heureDebut.minute}</option>
										{/foreach}
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="endTime" class="col-sm-3 control-label">Heure fin</label>
								<div class="col-sm-9">
									<select name="endTime" class="form-control" id="endTime" required="">
										{foreach from=$userConfs.listHeuresFin item=heureFin}
											<option value={$heureFin.codeHeure}>{$heureFin.heure}h{$heureFin.minute}</option>
										{/foreach}
									</select>
								</div>
							</div>
							
							<div class="form-group last" id="teachButtons">
								<button type="submit" class="btn btn-success">Sauvegarder les modifications</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		{include file='template/include/footer.tpl'}
	</body>
</html>