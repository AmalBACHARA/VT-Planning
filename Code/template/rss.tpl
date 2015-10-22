<html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
		<meta charset="utf-8">
		<title>VT Agenda - RSS</title>
		<link rel="icon" type="image/png" href="img/glyphicons_calendar_title.png"/>
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/common.css"/>

		<script type="text/javascript" src="js/loadPage.js"></script>
		<script type="text/javascript" src="API/bootstrap-calendar-master/components/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="API/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		{include file='template/include/header.tpl'}
		
		<div class="container">
			<div class="panel panel-default">
			  <div class="panel-body">
				<p>{$xml}</p>
			  </div>
			</div>
		</div>
		
		{include file='template/include/footer.tpl'}
	</body>
</html>