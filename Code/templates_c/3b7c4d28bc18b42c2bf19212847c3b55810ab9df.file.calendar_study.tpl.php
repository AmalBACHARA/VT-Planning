<?php /* Smarty version Smarty-3.1.18, created on 2015-11-30 08:48:56
         compiled from "template\include\calendar_study.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2188565bff68529d85-23943047%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b7c4d28bc18b42c2bf19212847c3b55810ab9df' => 
    array (
      0 => 'template\\include\\calendar_study.tpl',
      1 => 1448869536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2188565bff68529d85-23943047',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_565bff685355f5_42453030',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565bff685355f5_42453030')) {function content_565bff685355f5_42453030($_smarty_tpl) {?><!--
div id="panelFilter">
</div>
-->

<?php echo $_smarty_tpl->getSubTemplate ('template/index_others.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>




<div class="container" id="calendarContainer">
	<!-- Début navigation calendar -->
	<div id="content" class="col-lg-10 col-sm-10">
	<div class="page-header" id="groupeFiltre">
		<div class="row">
			<div class="col-sm-6" id="rowFiltreleft">
				<div class="btn-group btn-group-justified" id="filtreToday">
					<div class="btn-group" >
						<button class="btn btn-default" id="prevButton" data-calendar-nav="prev"> << </button>
					</div>	
					<div class="btn-group" >	
						<button class="btn btn-default" data-calendar-nav="today"> Aujourd'hui </button>
					</div>	
					<div class="btn-group" >	
						<button class="btn btn-default" id="nextButton" data-calendar-nav="next"> >> </button>
					</div>	
				</div>
			</div>		
			<div class="col-sm-6" id="rowFiltreRight">			
				<div class="btn-group btn-group-justified" id="filtreAnnee">
					<div class="btn-group" >	
						<button class="btn btn-default" data-calendar-view="year">Année</button>
					</div>
					<div class="btn-group" >		
						<button class="btn btn-default active" data-calendar-view="month">Mois</button>
					</div>
					<div class="btn-group" >
						<button class="btn btn-default" data-calendar-view="week">Semaine</button>
					</div>
					<div class="btn-group" >	
						<button class="btn btn-default" id="vueJour" data-calendar-view="day">Jour</button>
					</div>		
				</div>
			</div>
		</div>
			
		<div class="col-md-6" id="h3MoisAnnee">
			<h3 class=""></h3>
		</div>
	</div>
	<!-- Fin navigation calendar -->
	
	<!-- Début Calendar -->
	<div class="row">
		<div class="col-md-12">
			<div id="calendar"></div>
		</div>
	</div>
	<!-- Fin Calendar -->
	
	
	<!-- Début Modal -->
	<div class="clearfix"></div>
	<div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Event</h3>
				</div>
				<div class="modal-body" style="height: 400px">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fon Modal -->
</div>
<script>
</script>
<script type="text/javascript" src="API/bootstrap-calendar-master/js/app.js"></script>
<script type="text/javascript" src="js/CalendarResize.js"></script>
<script type="text/javascript" src="js/MobileSwipeCalendar.js"></script><?php }} ?>
