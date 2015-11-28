<?php /* Smarty version Smarty-3.1.18, created on 2015-11-26 22:52:42
         compiled from "template\include\calendar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:324085657778a74d378-39903640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6304817a5733636ad006c7a91f1bffdec9371cbb' => 
    array (
      0 => 'template\\include\\calendar.tpl',
      1 => 1448574738,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '324085657778a74d378-39903640',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5657778a899444_38137417',
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
    'departements' => 0,
    'departement' => 0,
    'salles' => 0,
    'salle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5657778a899444_38137417')) {function content_5657778a899444_38137417($_smarty_tpl) {?><!--
div id="panelFilter">
</div>
-->

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>
	
	
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
	    <div class="panel-heading"> 
                <form class="form-horizontal" role="form">
		    <div class="form-group">
			<label for="departementFilter" class="col-md-12">Salles</label>
			    <div class="col-md-12">
				<select name="departementFilter" class="form-control" id="departementFilter" required="" onChange="loadSallesListFilter()">
				    <option value="all" selected>TOUS</option>
                                    <?php  $_smarty_tpl->tpl_vars['departement'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['departement']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['departements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['departement']->key => $_smarty_tpl->tpl_vars['departement']->value) {
$_smarty_tpl->tpl_vars['departement']->_loop = true;
?>
					<option value=<?php echo $_smarty_tpl->tpl_vars['departement']->value['codeZoneSalle'];?>
><?php echo $_smarty_tpl->tpl_vars['departement']->value['nom_zone'];?>
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


</div>
<div id="content" class="col-lg-10 col-sm-10">
	<div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-calendar"></i> Calendar</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">


                    <div id="calendar"></div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div><!--/row-->
	<br/><br/>
	

	
	
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

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>



<?php }} ?>
