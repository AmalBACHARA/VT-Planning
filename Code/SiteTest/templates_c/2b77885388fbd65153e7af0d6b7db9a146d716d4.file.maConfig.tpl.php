<?php /* Smarty version Smarty-3.1.18, created on 2015-11-28 14:48:24
         compiled from "template\maConfig.tpl" */ ?>
<?php /*%%SmartyHeaderCode:920356597ef0d3ece7-63567256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b77885388fbd65153e7af0d6b7db9a146d716d4' => 
    array (
      0 => 'template\\maConfig.tpl',
      1 => 1448718070,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '920356597ef0d3ece7-63567256',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56597ef0e21618_96174904',
  'variables' => 
  array (
    'userConfs' => 0,
    'heureDebut' => 0,
    'heureFin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56597ef0e21618_96174904')) {function content_56597ef0e21618_96174904($_smarty_tpl) {?><html>
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
		<?php echo $_smarty_tpl->getSubTemplate ('template/index_others.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('template/include/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div class="container">
			<div class="col-md-6 col-centered">
			
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
										<?php  $_smarty_tpl->tpl_vars['heureDebut'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['heureDebut']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userConfs']->value['listHeuresDebut']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['heureDebut']->key => $_smarty_tpl->tpl_vars['heureDebut']->value) {
$_smarty_tpl->tpl_vars['heureDebut']->_loop = true;
?>
											<option value=<?php echo $_smarty_tpl->tpl_vars['heureDebut']->value['codeHeure'];?>
><?php echo $_smarty_tpl->tpl_vars['heureDebut']->value['heure'];?>
h<?php echo $_smarty_tpl->tpl_vars['heureDebut']->value['minute'];?>
</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="endTime" class="col-sm-3 control-label">Heure fin</label>
								<div class="col-sm-9">
									<select name="endTime" class="form-control" id="endTime" required="">
										<?php  $_smarty_tpl->tpl_vars['heureFin'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['heureFin']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userConfs']->value['listHeuresFin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['heureFin']->key => $_smarty_tpl->tpl_vars['heureFin']->value) {
$_smarty_tpl->tpl_vars['heureFin']->_loop = true;
?>
											<option value=<?php echo $_smarty_tpl->tpl_vars['heureFin']->value['codeHeure'];?>
><?php echo $_smarty_tpl->tpl_vars['heureFin']->value['heure'];?>
h<?php echo $_smarty_tpl->tpl_vars['heureFin']->value['minute'];?>
</option>
										<?php } ?>
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
		<?php echo $_smarty_tpl->getSubTemplate ('template/include/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
