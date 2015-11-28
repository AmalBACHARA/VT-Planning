<?php /* Smarty version Smarty-3.1.18, created on 2015-11-28 11:14:27
         compiled from "template\droits.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3215156577edb142c23-15283261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45bfe79778dc305fecda2014ff2f32ef1d9fe809' => 
    array (
      0 => 'template\\droits.tpl',
      1 => 1448705665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3215156577edb142c23-15283261',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56577edb2e0d81_75009676',
  'variables' => 
  array (
    'droits' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56577edb2e0d81_75009676')) {function content_56577edb2e0d81_75009676($_smarty_tpl) {?><html>
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
		<?php echo $_smarty_tpl->getSubTemplate ('template/index_others.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('template/include/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div class="container">
		<div class="table-responsive" id="vueDroits">
			<table class="table-striped center-table">
				<tr >
				   <th style="background:#BDBDBD" id="thdroittable">Droits</th>
				   <th style="background:#BDBDBD">Activation</th>
				</tr>
			    <tr>
				   <td id="thdroittable">Administrateur</td>
				   <td>
						<?php if ($_smarty_tpl->tpl_vars['droits']->value['admin']==1) {?>
							<span class="glyphicon glyphicon-ok-circle"></span>
						<?php } else { ?>
							<span class="glyphicon glyphicon-ban-circle"></span>
						<?php }?>
					</td>
			    </tr>
			    <tr>
				   <td id="thdroittable">Dialogue de gestion</td>
				   <td>
						<?php if ($_smarty_tpl->tpl_vars['droits']->value['dialogue']==1) {?>
							<span class="glyphicon glyphicon-ok-circle"></span>
						<?php } else { ?>
							<span class="glyphicon glyphicon-ban-circle"></span>
						<?php }?>
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Export PDF</td>
				   <td>
						<?php if ($_smarty_tpl->tpl_vars['droits']->value['pdf']==1) {?>
							<span class="glyphicon glyphicon-ok-circle"></span>
						<?php } else { ?>
							<span class="glyphicon glyphicon-ban-circle"></span>
						<?php }?>
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Faire le bilan de l'occupation des salles</td>
				   <td>
						<?php if ($_smarty_tpl->tpl_vars['droits']->value['salle']==1) {?>
							<span class="glyphicon glyphicon-ok-circle"></span>
						<?php } else { ?>
							<span class="glyphicon glyphicon-ban-circle"></span>
						<?php }?>
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Faire le bilan de ses heures</td>
				   <td>
						<?php if ($_smarty_tpl->tpl_vars['droits']->value['bilan_heure']==1) {?>
							<span class="glyphicon glyphicon-ok-circle"></span>
						<?php } else { ?>
							<span class="glyphicon glyphicon-ban-circle"></span>
						<?php }?>
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Faire le bilan des heures de tout le monde</td>
				   <td>
						<?php if ($_smarty_tpl->tpl_vars['droits']->value['bilan_heure_global']==1) {?>
							<span class="glyphicon glyphicon-ok-circle"></span>
						<?php } else { ?>
							<span class="glyphicon glyphicon-ban-circle"></span>
						<?php }?>
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Faire le bilan des heures des formations</td>
				   <td>
						<?php if ($_smarty_tpl->tpl_vars['droits']->value['bilan_formation']==1) {?>
							<span class="glyphicon glyphicon-ok-circle"></span>
						<?php } else { ?>
							<span class="glyphicon glyphicon-ban-circle"></span>
						<?php }?>
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Flux RSS</td>
				   <td>
						<?php if ($_smarty_tpl->tpl_vars['droits']->value['rss']==1) {?>
							<span class="glyphicon glyphicon-ok-circle"></span>
						<?php } else { ?>
							<span class="glyphicon glyphicon-ban-circle"></span>
						<?php }?>
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Modifier sa configuration</td>
				   <td>
						<?php if ($_smarty_tpl->tpl_vars['droits']->value['configuration']==1) {?>
							<span class="glyphicon glyphicon-ok-circle"></span>
						<?php } else { ?>
							<span class="glyphicon glyphicon-ban-circle"></span>
						<?php }?>
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Se placer des réservations</td>
				   <td>
						<?php if ($_smarty_tpl->tpl_vars['droits']->value['reservation']==1) {?>
							<span class="glyphicon glyphicon-ok-circle"></span>
						<?php } else { ?>
							<span class="glyphicon glyphicon-ban-circle"></span>
						<?php }?>
					</td>
			    </tr>
				<tr>
				   <td id="thdroittable">Séances clicables</td>
				   <td>
						<?php if ($_smarty_tpl->tpl_vars['droits']->value['seance_clicable']==1) {?>
							<span class="glyphicon glyphicon-ok-circle"></span>
						<?php } else { ?>
							<span class="glyphicon glyphicon-ban-circle"></span>
						<?php }?>
					</td>
			    </tr>
			</table>
		</div>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ('template/include/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
