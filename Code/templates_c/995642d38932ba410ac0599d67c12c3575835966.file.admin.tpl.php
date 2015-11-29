<?php /* Smarty version Smarty-3.1.18, created on 2015-11-29 14:42:55
         compiled from "template\admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10851565b00dfe27031-60550461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '995642d38932ba410ac0599d67c12c3575835966' => 
    array (
      0 => 'template\\admin.tpl',
      1 => 1448743984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10851565b00dfe27031-60550461',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'allTeachers' => 0,
    'teacher' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_565b00dfea8616_54110189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565b00dfea8616_54110189')) {function content_565b00dfea8616_54110189($_smarty_tpl) {?><html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
		<meta charset="utf-8">
		<title>VT Agenda - Gestion des droits</title>
		<link rel="icon" type="image/png" href="img/glyphicons_calendar_title.png"/>
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/common.css"/>
		<link rel="stylesheet" href="css/admin.css"/>
		<script src="API/jquery/jquery.js"></script>
		<script type="text/javascript" src="API/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="js/loadPage.js"></script>
		<script type="text/javascript" src="js/admin.js"></script>
	</head>
	<body>
		
		<?php echo $_smarty_tpl->getSubTemplate ('template/include/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div class="container">
			<div class="col-md-6 col-centered">
			
				<!-- div - retour login.js -->
					<div id="retourLoginJs"></div>
				<!-- ./div - retour login.js -->
				
				
				<div class="panel panel-default">
					<form class="form-horizontal" role="form" id="modifyConfigForm">
						<div class="panel-body">
							<div class="form-group">
								<label for="profs" class="col-sm-3 control-label">Enseignent </label>
								<div class="col-sm-9">
									<select name="profs" class="form-control" id="profs" required="" onChange="displayDroits()">
										<?php  $_smarty_tpl->tpl_vars['teacher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['teacher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allTeachers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['teacher']->key => $_smarty_tpl->tpl_vars['teacher']->value) {
$_smarty_tpl->tpl_vars['teacher']->_loop = true;
?>
											<option value=<?php echo $_smarty_tpl->tpl_vars['teacher']->value['codeProf'];?>
><?php echo $_smarty_tpl->tpl_vars['teacher']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['teacher']->value['prenom'];?>
</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div data-toggle="buttons" id="userDroits">
								<label class="btn btn-primary col-xs-6 col-sm-4"  id="admin">
									<input type="checkbox"><span class="glyphicon glyphicon-eye-open"></span> Admin
								</label>
								<label class="btn btn-primary col-xs-6 col-sm-4" id="bilan_salle">
									<input type="checkbox"><span class="glyphicon glyphicon-home"></span> Salles
								</label>
								<label class="btn btn-primary col-xs-6 col-sm-4" id="bilan_heure">
									<input type="checkbox"><span class="glyphicon glyphicon-dashboard"></span> Bilan Heures
								</label>
								<label class="btn btn-primary col-xs-6 col-sm-4" id="droits">
									<input type="checkbox"><span class="glyphicon glyphicon-lock"></span> Droits
								</label>
								<label class="btn btn-primary col-xs-6 col-sm-4" id="heures">
									<input type="checkbox"><span class="glyphicon glyphicon-time"></span> Mes Heures
								</label>
								<label class="btn btn-primary col-xs-6 col-sm-4" id="pdf">
									<input type="checkbox"><span class="glyphicon glyphicon-file"></span> PDF
								</label>
								<label class="btn btn-primary col-xs-6 col-sm-4" id="rss">
									<input type="checkbox"><span class="glyphicon glyphicon-transfer"></span> RSS
								</label>
								<label class="btn btn-primary col-xs-6 col-sm-4" id="config">
									<input type="checkbox"><span class="glyphicon glyphicon-cog"></span> Config
								</label>
								<label class="btn btn-primary col-xs-6 col-sm-4" id="reservation">
									<input type="checkbox"><span class="glyphicon glyphicon-shopping-cart"></span> Reserver
								</label>
								<label class="btn btn-primary col-xs-6 col-sm-4" id="modules">
									<input type="checkbox"><span class="glyphicon glyphicon-th-large"></span> Module
								</label>
								<label class="btn btn-primary col-xs-6 col-sm-4" id="dialogue">
									<input type="checkbox"><span class="glyphicon glyphicon-comment"></span> Dialogue
								</label>
							</div>
						</div>
						<div class="panel-footer">
							<button type="submit" class="btn btn-success" name="modify" id="modify">Modifier les droits</button>
						</div>
					</form>
				</div>
			</div>
			
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title">
							<a id="collapseTitleLegende">Légende</a>
						</h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">   
							<div id="droitLegende">
								<div class="row">
									<div class="col-xs-6 col-md-2">
										<div class="cercleLegende" id="active"></div>
										<div class="textLegende">Activé</div>
									</div>
									<div class="col-xs-6 col-md-2">
										<div class="cercleLegende" id="nonactive"></div>
										<div class="textLegende">Désactivé</div>
									</div>
									<div class="col-xs-6 col-md-2">
										<div class="cercleLegende" id="disabled"></div>
										<div class="textLegende">Bloqué</div>
									</div>
								</div>
							</div>   
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ('template/include/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
