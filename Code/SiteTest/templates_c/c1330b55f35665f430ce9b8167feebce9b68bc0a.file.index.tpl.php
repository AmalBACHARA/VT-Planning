<?php /* Smarty version Smarty-3.1.18, created on 2015-11-18 21:42:02
         compiled from "template\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22793562f4d355151a5-04900617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1330b55f35665f430ce9b8167feebce9b68bc0a' => 
    array (
      0 => 'template\\index.tpl',
      1 => 1447879057,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22793562f4d355151a5-04900617',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_562f4d355ccb48_48977177',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562f4d355ccb48_48977177')) {function content_562f4d355ccb48_48977177($_smarty_tpl) {?><html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
		<meta charset="utf-8">
		<title>VT Agenda - Accueil</title>
		<link rel="icon" type="image/png" href="img/glyphicons_calendar_title.png"/>
		<link rel="stylesheet" href="css/MyCalendar.css">
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css">
		<link href='css/noty_theme_default.css' rel='stylesheet'>
		<link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
   		<link rel="stylesheet" href="API/bootstrap/css/bootstrap-theme.min.css">
		<link href='css/noty_theme_default.css' rel='stylesheet'>
   		<link rel="stylesheet" href="API/bootstrap/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="API/bootstrap-calendar-master/css/calendar.css">
		<link rel="stylesheet" href="css/common.css"/>

		<script type="text/javascript" src="js/loadPage.js"></script>
		<script type="text/javascript" src="API/bootstrap-calendar-master/components/underscore/underscore-min.js"></script>
		<script type="text/javascript" src="API/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="API/bootstrap-calendar-master/components/jstimezonedetect/jstz.min.js"></script>
		<script type="text/javascript" src="API/bootstrap-calendar-master/js/calendar.js"></script>
		<script type="text/javascript" src="API/bootstrap-calendar-master/js/app.js"></script>
		<script type="text/javascript" src="API/hammer.js-master/hammer.js"></script>
		<script type="text/javascript" src="API/hammer.js-master/jquery.hammer.js"></script>
		<script type="text/javascript" src="js/MobileSwipeCalendar.js"></script>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ('template/include/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('template/include/calendar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('template/include/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html>
<?php }} ?>
