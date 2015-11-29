<?php /* Smarty version Smarty-3.1.18, created on 2015-11-29 17:06:21
         compiled from "template\occupationSalle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28064565b01d6cf3ae1-73356152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f2b7670bccd908a6561e5873ab163a6c903d72d' => 
    array (
      0 => 'template\\occupationSalle.tpl',
      1 => 1448813179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28064565b01d6cf3ae1-73356152',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_565b01d6e3ca26_34525299',
  'variables' => 
  array (
    'occupations' => 0,
    'occupation' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565b01d6e3ca26_34525299')) {function content_565b01d6e3ca26_34525299($_smarty_tpl) {?><html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
		<meta charset="utf-8">
		<title>VT Agenda - Occupation des salles</title>
		<link rel="icon" type="image/png" href="img/glyphicons_calendar_title.png"/>
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/common.css"/>
		<link rel="stylesheet" href="css/admin.css"/>
		<link href="API/footable/css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css">
		<script src="API/jquery/jquery.js"></script>
		<script type="text/javascript" src="API/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="js/loadPage.js"></script>
		<script type="text/javascript" src="API/googleCharts/googleCharts.js"></script>
		<script type="text/javascript" src="js/occupationSalle.js"></script>
		<script type="text/javascript" src="API/footable/js/footable.js"></script>
		<script src="API/footable/js/footable.sort.js?v=2-0-1" type="text/javascript"></script>
		<script type="text/javascript" src="js/filterTable.js"></script>
		<script type="text/javascript" src="API/tableExport/tableExport.js"></script>
		<script type="text/javascript" src="API/tableExport/jquery.base64.js"></script>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ('template/index_others.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('template/include/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		
		<div class="container">
			
				<a download="OccupationSalle.csv" onClick ="this.href = $('#hiddenTableOcc').tableExportInline({type:'csv',escape:'false',separator:';',consoleLog:true}); return true;">Exporter vers Excel</a>
			
			<br>
			<table class="table-striped table center-table footable" id="tableOccSalle">
				<thead>
					<tr style="background:#BDBDBD">
						<th>Salle</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Séance (en heure)</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Réservation (en heure)</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Total (en heure)</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Taux d'occupation</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['occupation'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['occupation']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['occupations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['occupation']->key => $_smarty_tpl->tpl_vars['occupation']->value) {
$_smarty_tpl->tpl_vars['occupation']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['nom_salle'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['heure'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['heureReserve'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['total'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['taux'];?>
</td>
						</tr>
						<?php if ($_smarty_tpl->tpl_vars['occupation']->value['cumul']==true) {?>
							<tr class="success" data-hide="phone,tablet">
								<td colspan="2">TOTAL</td>
								<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['total_seance'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['total_reserve'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['total_taux'];?>
</td>
							<tr>
						<?php }?>
					<?php } ?>
				</tbody>
			</table>
			
			<table id="hiddenTableOcc" style="position: absolute; top: -10000px;">
				<thead>
					<tr>
						<th>Salle</th>
						<th>Séance (en heure)</th>
						<th>Réservation (en heure)</th>
						<th>Total (en heure)</th>
						<th>Taux d'occupation</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['occupation'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['occupation']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['occupations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['occupation']->key => $_smarty_tpl->tpl_vars['occupation']->value) {
$_smarty_tpl->tpl_vars['occupation']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['nom_salle'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['heure'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['heureReserve'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['total'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['taux'];?>
</td>
						</tr>
						<?php if ($_smarty_tpl->tpl_vars['occupation']->value['cumul']==true) {?>
							<tr>
								<td colspan="2">TOTAL</td>
								<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['total_seance'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['total_reserve'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['occupation']->value['total_taux'];?>
</td>
							<tr>
						<?php }?>
					<?php } ?>
				</tbody>
			</table>
			<br>
			<div id="chart_div" class="hidden-xs hidden-sm"></div>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ('template/include/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
