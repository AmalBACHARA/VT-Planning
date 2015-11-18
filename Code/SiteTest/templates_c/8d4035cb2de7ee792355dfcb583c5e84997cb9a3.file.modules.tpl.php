<?php /* Smarty version Smarty-3.1.18, created on 2015-11-18 21:40:04
         compiled from "template\modules.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2552564cdb617218a1-61037693%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d4035cb2de7ee792355dfcb583c5e84997cb9a3' => 
    array (
      0 => 'template\\modules.tpl',
      1 => 1447879200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2552564cdb617218a1-61037693',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_564cdb61a4a2e5_59787607',
  'variables' => 
  array (
    'loginStudy' => 0,
    'annees' => 0,
    'liste_enseignement' => 0,
    'enseignement' => 0,
    'composantes' => 0,
    'composante' => 0,
    'profs' => 0,
    'prof' => 0,
    'code' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564cdb61a4a2e5_59787607')) {function content_564cdb61a4a2e5_59787607($_smarty_tpl) {?><html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
		<meta charset="utf-8">
		<title>VT Agenda - Mes modules</title>
		<link rel="icon" type="image/png" href="img/glyphicons_calendar_title.png"/>


		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/common.css"/>
		<link href="API/footable/css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="js/loadPage.js"></script>
		<script src="API/jquery/jquery.js"></script>
		<script type="text/javascript" src="API/footable/js/footable.js"></script>
		<script src="API/footable/js/footable.sort.js?v=2-0-1" type="text/javascript"></script>
		<script src="js/module.js"></script>
		<script type="text/javascript" src="API/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="API/tableExport/tableExport.js"></script>
		<script type="text/javascript" src="API/tableExport/jquery.base64.js"></script>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ('template/index_others.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('template/include/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div class="container">
		<?php if (isset($_smarty_tpl->tpl_vars['loginStudy']->value)) {?>
			<!-- PARTIE ETUDIANT -->
			<div class="col-md-4 col-centered">
				<div class="panel panel-default">
					<div class="panel-heading"> 
						<strong class="">Afficher mes modules</strong>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="annee" class="col-sm-3 control-label">Annee scolaire </label>
								<div class="col-sm-9">
									<select name="annee" class="form-control" id="annee" required="">
										<?php  $_smarty_tpl->tpl_vars['annee'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['annee']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['annees']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['annee']->key => $_smarty_tpl->tpl_vars['annee']->value) {
$_smarty_tpl->tpl_vars['annee']->_loop = true;
?>
											<option value=0><?php echo $_smarty_tpl->tpl_vars['annees']->value[0];?>
</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="module" class="col-sm-3 control-label">Modules </label>
								<div class="col-sm-9">
									<select name="module" class="form-control" id="module" required="" onChange="loadSeanceList()">
										<?php  $_smarty_tpl->tpl_vars['enseignement'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['enseignement']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['liste_enseignement']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['enseignement']->key => $_smarty_tpl->tpl_vars['enseignement']->value) {
$_smarty_tpl->tpl_vars['enseignement']->_loop = true;
?>
											<option><?php echo $_smarty_tpl->tpl_vars['enseignement']->value;?>
</option>
										<?php } ?>
									</select>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="col-md-4 col-centered">
				<div class="panel panel-default">
					<div class="panel-heading"> 
						<strong class="">Afficher mes modules</strong>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="anneeProf" class="col-sm-3 control-label">Annee scolaire </label>
								<div class="col-sm-9">
									<select name="anneeProf" class="form-control" id="anneeProf" required="">
										<?php  $_smarty_tpl->tpl_vars['annee'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['annee']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['annees']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['annee']->key => $_smarty_tpl->tpl_vars['annee']->value) {
$_smarty_tpl->tpl_vars['annee']->_loop = true;
?>
											<option value=0 selected><?php echo $_smarty_tpl->tpl_vars['annees']->value[0];?>
</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="departements" class="col-sm-3 control-label">Departement </label>
								<div class="col-sm-9">
									<select name="departements" class="form-control" id="departements" required="" onChange="loadProfsList()">
										<option value="all" selected>TOUS</option>
										<?php  $_smarty_tpl->tpl_vars['composante'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['composante']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['composantes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['composante']->key => $_smarty_tpl->tpl_vars['composante']->value) {
$_smarty_tpl->tpl_vars['composante']->_loop = true;
?>
											<option value=<?php echo $_smarty_tpl->tpl_vars['composante']->value['codeComposante'];?>
><?php echo $_smarty_tpl->tpl_vars['composante']->value['nom'];?>
</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="profs" class="col-sm-3 control-label">Profs </label>
								<div class="col-sm-9">
									<select name="profs" class="form-control" id="profs" required="" onChange="loadModuleList()">
										<?php  $_smarty_tpl->tpl_vars['prof'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['prof']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['profs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['prof']->key => $_smarty_tpl->tpl_vars['prof']->value) {
$_smarty_tpl->tpl_vars['prof']->_loop = true;
?>
											<option value=<?php echo $_smarty_tpl->tpl_vars['prof']->value['codeProf'];?>
 <?php if ($_smarty_tpl->tpl_vars['prof']->value['codeProf']==$_smarty_tpl->tpl_vars['code']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['prof']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['prof']->value['prenom'];?>
</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="module" class="col-sm-3 control-label">Modules </label>
								<div class="col-sm-9">
									<select name="module" class="form-control" id="module" required="" onChange="loadSeanceList()">
									</select>
								</div>
							</div>
						</form>
					</div>
					<div class="panel-footer">
						
							<a download="module.csv" onClick ="this.href = $('#hiddenTableModule').tableExportInline({type:'csv',escape:'false',separator:';',consoleLog:true}); return true;">Export vers Excel</a>
						
					</div>
				</div>
			</div>
		<?php }?>
		
		<table class="table-striped table center-table footable" id="tableModule">
			<thead>
				<tr>
					<th>Date</th>
					<th>Groupes</th>
					<th data-hide="phone,tablet" data-sort-ignore="true">Type</th>
					<th data-hide="phone,tablet">Enseignement</th>
					<th data-hide="phone,tablet" data-sort-ignore="true">Profs</th>
					<th data-hide="phone,tablet" data-sort-ignore="true">Salles</th>
					<th data-sort-ignore="true">Heure de début</th>
					<th data-hide="phone,tablet" data-sort-ignore="true">Durée</th>
					<th data-hide="phone,tablet" data-sort-ignore="true">Effectuée</th>
				</tr>
			</thead>
			<tbody id="tableContent">
			</tbody>
		</table>
		
		<table id="hiddenTableModule" style="position: absolute; top: -10000px;">
			<thead>
				<tr>
					<th>Date</th>
					<th>Groupes</th>
					<th>Type</th>
					<th>Enseignement</th>
					<th>Profs</th>
					<th>Salles</th>
					<th>Heure de début</th>
					<th>Durée</th>
					<th>Effectuée</th>
				</tr>
			</thead>
			<tbody id="hiddenTableContent">
			</tbody>
		</table>
		
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ('template/include/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
