<?php /* Smarty version Smarty-3.1.18, created on 2015-11-29 14:51:41
         compiled from "template\dialogueGestion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19742565b02ed76fe02-91199148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'beddffc8401e38f28cda7742019fc6a9b9b3b944' => 
    array (
      0 => 'template\\dialogueGestion.tpl',
      1 => 1448743984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19742565b02ed76fe02-91199148',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'composantes' => 0,
    'composante' => 0,
    'grade' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_565b02ed89ff28_75539509',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565b02ed89ff28_75539509')) {function content_565b02ed89ff28_75539509($_smarty_tpl) {?><html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
		<meta charset="utf-8">
		<title>VT Agenda - Dialogue de gestion</title>
		<link rel="icon" type="image/png" href="img/glyphicons_calendar_title.png"/>
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/common.css"/>
		<link rel="stylesheet" href="css/dialogueGestion.css"/>
		<link href="API/footable/css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="API/jquery/jquery.js"></script>
		<script type="text/javascript" src="API/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/loadPage.js"></script>
		<script type="text/javascript" src="API/footable/js/footable.js"></script>
		<script src="API/footable/js/footable.sort.js?v=2-0-1" type="text/javascript"></script>
		<script type="text/javascript" src="js/filterTable.js"></script>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ('template/include/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div class="container">
		<?php  $_smarty_tpl->tpl_vars['composante'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['composante']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['composantes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['composante']->key => $_smarty_tpl->tpl_vars['composante']->value) {
$_smarty_tpl->tpl_vars['composante']->_loop = true;
?>
			<h2><?php echo $_smarty_tpl->tpl_vars['composante']->value['nom'];?>
</h2>
			<table class="table center-table col-sm-9 footable">
				<thead>
					<tr>
						<th>Grade</th>
						<th data-hide="phone,tablet">Nom des enseignants</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Horaires statuaires</th>
						<th data-sort-ignore="true">Nombre</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Potentiel enseignement en heure</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['grade'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['grade']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['composante']->value['grades']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['grade']->key => $_smarty_tpl->tpl_vars['grade']->value) {
$_smarty_tpl->tpl_vars['grade']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['grade']->value['nom'];?>
</td>
							<td class="resource_cell"><?php echo $_smarty_tpl->tpl_vars['grade']->value['resources'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['grade']->value['heure_vol_stat'];?>
h<?php echo $_smarty_tpl->tpl_vars['grade']->value['minutes_vol_stat'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['grade']->value['nb_prof'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['grade']->value['nb_heure'];?>
</td>
						</tr>
					<?php } ?>
					<tr class="success">
						<td colspan="4" class="potentielLabel">Potentiel Enseignement total</td>
						<td><?php echo $_smarty_tpl->tpl_vars['composante']->value['nbHeure'];?>
</td>
					</tr>
				</tbody>
			</table>
		<?php } ?>
		</div>
		
		<?php echo $_smarty_tpl->getSubTemplate ('template/include/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
