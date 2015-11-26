<?php /* Smarty version Smarty-3.1.18, created on 2015-11-18 21:42:25
         compiled from "template\rss.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5021564ce2b1a12624-68229220%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73d0a8f924fa70b1533abfccfb5f40c34d7f6df5' => 
    array (
      0 => 'template\\rss.tpl',
      1 => 1447879290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5021564ce2b1a12624-68229220',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'xml' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_564ce2b1a6c3c3_48813901',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564ce2b1a6c3c3_48813901')) {function content_564ce2b1a6c3c3_48813901($_smarty_tpl) {?><html>
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
		<?php echo $_smarty_tpl->getSubTemplate ('template/index_others.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('template/include/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		
		<div class="container">
			<div class="panel panel-default">
			  <div class="panel-body">
				<p><?php echo $_smarty_tpl->tpl_vars['xml']->value;?>
</p>
			  </div>
			</div>
		</div>
		
		<?php echo $_smarty_tpl->getSubTemplate ('template/include/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
