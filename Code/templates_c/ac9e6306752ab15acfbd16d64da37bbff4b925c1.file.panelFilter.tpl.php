<?php /* Smarty version Smarty-3.1.18, created on 2015-11-30 08:40:36
         compiled from "template\include\panelFilter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18128565bfc0d72d889-89581702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac9e6306752ab15acfbd16d64da37bbff4b925c1' => 
    array (
      0 => 'template\\include\\panelFilter.tpl',
      1 => 1448869227,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18128565bfc0d72d889-89581702',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_565bfc0d835956_40666940',
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
<?php if ($_valid && !is_callable('content_565bfc0d835956_40666940')) {function content_565bfc0d835956_40666940($_smarty_tpl) {?><div id="panelFilter">
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
</div><?php }} ?>
