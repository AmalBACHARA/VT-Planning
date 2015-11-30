<?php /* Smarty version Smarty-3.1.18, created on 2015-11-30 11:27:12
         compiled from "template\include\calendar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16484565bfad512bcd0-00940612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6304817a5733636ad006c7a91f1bffdec9371cbb' => 
    array (
      0 => 'template\\include\\calendar.tpl',
      1 => 1448879230,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16484565bfad512bcd0-00940612',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_565bfad5262302_63501662',
  'variables' => 
  array (
    'code' => 0,
    'formations' => 0,
    'formation' => 0,
    'groupes' => 0,
    'groupe' => 0,
    'composantes' => 0,
    'composante' => 0,
    'profs' => 0,
    'prof' => 0,
    'salles' => 0,
    'salle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565bfad5262302_63501662')) {function content_565bfad5262302_63501662($_smarty_tpl) {?><!--
div id="panelFilter">
</div>
-->

<?php echo $_smarty_tpl->getSubTemplate ('template/index_others.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="col-lg-2 col-sm-2">
    <button class="btn btn-primary" id="monPlanning" type="submit" onClick='reset(<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
)'>Mon planning</button>
 <!--</form>-->
    <div class="col-md-12 col-centered">
	<div class="panel panel-default" id="premierGroupeFiltre">
	    <div class="panel-heading"> 
                <form class="form-horizontal" role="form">
		    <div class="form-group">
			<label for="groupesFilter" class="col-md-12">Groupes</label>
			    <div class="col-md-12">
				<select name="groupesFilter" class="form-control" id="groupesFilter" required="" onChange="loadGroupesListFilter()">
				    <option value="all" selected>TOUS</option>
                                    <?php  $_smarty_tpl->tpl_vars['formation'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['formation']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['formations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['formation']->key => $_smarty_tpl->tpl_vars['formation']->value) {
$_smarty_tpl->tpl_vars['formation']->_loop = true;
?>
                                        <option value=<?php echo $_smarty_tpl->tpl_vars['formation']->value['codeNiveau'];?>
><?php echo $_smarty_tpl->tpl_vars['formation']->value['nom'];?>
</option>
                                    <?php } ?>
				</select>
                            </div>
			</div>
                </form>                                     
	    </div>
	    <div class="panel-body">
		<form class="form-horizontal" role="form">
		    <div class="form-group">
			<div class="col-md-12">
			    <select name="groupesFormationsFilter" class="form-control" id="groupesFormationsFilter" required="" onChange="updateCalendar()">
				<option value="all" selected>TOUS</option>
                                <?php  $_smarty_tpl->tpl_vars['groupe'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['groupe']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groupes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['groupe']->key => $_smarty_tpl->tpl_vars['groupe']->value) {
$_smarty_tpl->tpl_vars['groupe']->_loop = true;
?>
                                    <option value=<?php echo $_smarty_tpl->tpl_vars['groupe']->value['codeGroupe'];?>
><?php echo $_smarty_tpl->tpl_vars['groupe']->value['nom'];?>
</option>
				<?php } ?>
			    </select>
			</div>
		    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-12 col-centered">
	<div class="panel panel-default">
	    <div class="panel-heading"> 
                <form class="form-horizontal" role="form">
		    <div class="form-group">
			<label for="profsComposantesFilter" class="col-md-12">Profs</label>
			    <div class="col-md-12">
				<select name="profsComposantesFilter" class="form-control" id="profsComposantesFilter" required="" onChange='loadProfsListFilter(<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
)'>
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
                </form>                                     
	    </div>
	    <div class="panel-body">
		<form class="form-horizontal" role="form">
		    <div class="form-group">
			<div class="col-md-12">
			    <select name="profsFilter" class="form-control" id="profsFilter" required="" onChange="updateCalendar()">
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
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-12 col-centered">
	<div class="panel panel-default">
	<label for="departementFilter" class="col-md-12">Salles</label>
	    
              
	    <div class="panel-body">
		<form class="form-horizontal" role="form">
		    <div class="form-group">
			<div class="col-md-12">
			    <select name="salleFilter" class="form-control" id="salleFilter" required="" onChange="updateCalendar()">
				<option value="all" selected>TOUS</option>
                                <?php  $_smarty_tpl->tpl_vars['salle'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['salle']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['salles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['salle']->key => $_smarty_tpl->tpl_vars['salle']->value) {
$_smarty_tpl->tpl_vars['salle']->_loop = true;
?>
                                    <option value=<?php echo $_smarty_tpl->tpl_vars['salle']->value['codeSalle'];?>
><?php echo $_smarty_tpl->tpl_vars['salle']->value['nom'];?>
</option>
				<?php } ?>
			    </select>
			</div>
		    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
			<h4 class="" id="petitH4Bis"></h4>
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
