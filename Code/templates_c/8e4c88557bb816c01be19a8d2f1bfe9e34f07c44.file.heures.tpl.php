<?php /* Smarty version Smarty-3.1.18, created on 2015-11-29 12:16:54
         compiled from "template\heures.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2566565adea68f4411-01171285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e4c88557bb816c01be19a8d2f1bfe9e34f07c44' => 
    array (
      0 => 'template\\heures.tpl',
      1 => 1448743984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2566565adea68f4411-01171285',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'annees' => 0,
    'annee' => 0,
    'composantes' => 0,
    'composante' => 0,
    'code' => 0,
    'allCSTeachers' => 0,
    'csTeacher' => 0,
    'codeProf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_565adea6a43581_55697625',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565adea6a43581_55697625')) {function content_565adea6a43581_55697625($_smarty_tpl) {?><html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
		<meta charset="utf-8">
		<title>VT Calendar - Mes heures</title>
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css"/>
		<link href="API/footable/css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="js/loadPage.js"></script>
		<script type="text/javascript" src="API/jquery/jquery.js"></script>
		<script type="text/javascript" src="API/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="js/filterTable.js"></script>
		<script type="text/javascript" src="API/googleCharts/googleCharts.js"></script>
		<script type="text/javascript" src="js/heure.js"></script>
		<script type="text/javascript" src="API/footable/js/footable.js"></script>
		<script src="API/footable/js/footable.sort.js?v=2-0-1" type="text/javascript"></script>
		<script type="text/javascript" src="API/tableExport/tableExport.js"></script>
		<script type="text/javascript" src="API/tableExport/jquery.base64.js"></script>
		<link rel="stylesheet" href="css/common.css"/>
		<link rel="stylesheet" href="css/login.css"/>
	</head>

	<body>
		<?php echo $_smarty_tpl->getSubTemplate ('template/include/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div class="container">
			<div class="col-md-4 col-centered">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong class="">Afficher mes Heures</strong>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form" name="form" id="form" method="get" >

							<input type="hidden" name="page" value="heure" />
							<label>Année scolaire :</label>
							<select class="form-control" name="annee_scolaire">
								<?php  $_smarty_tpl->tpl_vars['annee'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['annee']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['annees']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['annee']->key => $_smarty_tpl->tpl_vars['annee']->value) {
$_smarty_tpl->tpl_vars['annee']->_loop = true;
?>
									<option><?php echo $_smarty_tpl->tpl_vars['annee']->value;?>
</option>
								<?php } ?>
							</select><br>

							<label>Tri par Département :</label>
							<select class="form-control" name="composante" onchange="document.form.submit();">
								<option value="all">TOUS</option>
								<?php  $_smarty_tpl->tpl_vars['composante'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['composante']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['composantes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['composante']->key => $_smarty_tpl->tpl_vars['composante']->value) {
$_smarty_tpl->tpl_vars['composante']->_loop = true;
?>
									<option <?php if ($_smarty_tpl->tpl_vars['composante']->value['codeComposante']==$_smarty_tpl->tpl_vars['code']->value) {?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['composante']->value['codeComposante'];?>
"><?php echo $_smarty_tpl->tpl_vars['composante']->value['nom'];?>
</option>
								<?php } ?>
							</select><br>

							<label>Choix du professeur :</label>
							<select name="prof" class="form-control" id="prof" required="">
								<?php  $_smarty_tpl->tpl_vars['csTeacher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['csTeacher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allCSTeachers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['csTeacher']->key => $_smarty_tpl->tpl_vars['csTeacher']->value) {
$_smarty_tpl->tpl_vars['csTeacher']->_loop = true;
?>
									<option <?php if ($_smarty_tpl->tpl_vars['csTeacher']->value['codeProf']==$_smarty_tpl->tpl_vars['codeProf']->value) {?>selected="selected"<?php }?>  value="<?php echo $_smarty_tpl->tpl_vars['csTeacher']->value['codeProf'];?>
"><?php echo $_smarty_tpl->tpl_vars['csTeacher']->value['nom'];?>
   <?php echo $_smarty_tpl->tpl_vars['csTeacher']->value['prenom'];?>
</option>
								<?php } ?>
							</select><br>
						</form>
					</div>
					<div class="panel-footer">
							<a download="seances.csv" onClick ="this.href = $('#hiddenTableSeance').tableExportInline({type:'csv',escape:'false',separator:';',consoleLog:true}); return true;">Exporter vers Excel</a>
					</div>
				</div>
			</div>


			<table class="table-striped table center-table footable" id="tableSeance" >
				<thead>
					<tr>
						<th data-sort-ignore="true">Formation</th>
						<th data-hide="phone,tablet">Code apogée</th>
						<th>Matière</th>
						<th data-hide="phone,tablet" data-sort-ignore="true" class="date_column">Date</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Heure début</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Heure fin</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Horaire réparti / nb profs</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Forfait</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Type</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">Durée</th>
						<th data-hide="phone,tablet" data-sort-ignore="true">EqTD</th>
						<th data-sort-ignore="true">Effectuée</th>
					</tr>
				</thead>

				<tbody id="tableContent">
					<?php echo $_smarty_tpl->getSubTemplate ('template/include/heures_tab.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				</tbody>
			</table>

			<table id="hiddenTableSeance" style="position: absolute; top: -10000px;">
				<thead>
					<tr>
						<th>Formation</th>
						<th>Code apogée</th>
						<th>Matière</th>
						<th>Date</th>
						<th>Heure début</th>
						<th>Heure fin</th>
						<th>Horaire réparti / nb profs</th>
						<th>Forfait</th>
						<th>Type</th>
						<th>Durée</th>
						<th>EqTD</th>
						<th>Effectuée</th>
					</tr>
				</thead>
				<tbody id="hiddenTableContent">
					<?php echo $_smarty_tpl->getSubTemplate ('template/include/heures_tab.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				</tbody>
			</table>


			<div id="chart_div" class="hidden-xs hidden-sm"></div>

		</div>

		<?php echo $_smarty_tpl->getSubTemplate ('template/include/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	</body>

</html>
<?php }} ?>
