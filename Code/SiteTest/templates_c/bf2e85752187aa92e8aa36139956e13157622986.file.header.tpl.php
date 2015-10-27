<?php /* Smarty version Smarty-3.1.18, created on 2015-10-27 11:08:53
         compiled from "template\include\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1327562f4d358bea72-41330027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf2e85752187aa92e8aa36139956e13157622986' => 
    array (
      0 => 'template\\include\\header.tpl',
      1 => 1424040540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1327562f4d358bea72-41330027',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'teachLogin' => 0,
    'firstName' => 0,
    'userName' => 0,
    'droits' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_562f4d35a83ce2_90029381',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562f4d35a83ce2_90029381')) {function content_562f4d35a83ce2_90029381($_smarty_tpl) {?><nav class="navbar navbar-default" id="headerProjet" role="navigation">
  <div class="container-fluid">
    <?php if (isset($_smarty_tpl->tpl_vars['teachLogin']->value)) {?>
      <a class="navbar-brand" id="panelCalendar"><span class="glyphicon glyphicon-list"></span></a>
    <?php }?>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" id="boutonNavBar" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" onClick="loadIndex()"><span class="glyphicon glyphicon-calendar"></span> VT Calendar</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><span id="spanProfHeader"><?php if (isset($_smarty_tpl->tpl_vars['firstName']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['firstName']->value;?>
 <?php }?> <?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</span><span class="caret"></span></a>
			<?php if (isset($_smarty_tpl->tpl_vars['teachLogin']->value)) {?>
				<!-- l'utilisateur connecté est un enseignant -->
				<ul class="dropdown-menu" role="menu">

					<?php if ($_smarty_tpl->tpl_vars['droits']->value['admin']==1) {?>
						<li onClick="loadAdmin()"><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Gestion des droits</a></li>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['droits']->value['module']==1) {?>
						<li onClick="loadModule()"><a href="#"><span class="glyphicon glyphicon-th-large"></span> Mes Modules</a></li>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['droits']->value['mes_droits']==1) {?>
						<li onClick="loadDroits()"><a href="#"><span class="glyphicon glyphicon-lock"></span> Mes Droits</a></li>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['droits']->value['bilan_heure']==1) {?>
						<li onClick="loadHeures()"><a href="#"><span class="glyphicon glyphicon-time"></span> Mes Heures</a></li>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['droits']->value['dialogue']==1) {?>
						<li onClick="loadDialogue()"><a href="#"><span class="glyphicon glyphicon-comment"></span> Dialogue de gestion</a></li>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['droits']->value['salle']==1) {?>
						<li onClick="loadOccupationSalle()"><a href="#"><span class="glyphicon glyphicon-home"></span> Occupation de salles</a></li>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['droits']->value['pdf']==1) {?>
						<li onClick="loadExport()"><a href="#"><span class="glyphicon glyphicon-file"></span> Export </a></li>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['droits']->value['rss']==1) {?>
						<li onClick="loadRSS()"><a href="#"><span class="glyphicon glyphicon-transfer"></span> Flux RSS</a></li>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['droits']->value['configuration']==1) {?>
						<li onClick="loadConfig()"><a href="#"><span class="glyphicon glyphicon-cog"></span> Configuration</a></li>
					<?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['droits']->value['agendas_ics']==1) {?>
                        <li onClick="loadAgendasICS()"><a href="#"><span class="glyphicon glyphicon-calendar"></span> Les Agendas</a></li>
                    <?php }?>
				</ul>
			<?php } else { ?>
				<!-- l'utilisateur connecté est un étudiant -->
				<ul class="dropdown-menu" role="menu">
					<li onClick="loadExport()"><a href="#"><span class="glyphicon glyphicon-file"></span> Export </a></li>
					<li onClick="loadMesDS()"><a href="#"><span class="glyphicon glyphicon-pencil"></span> Mes DS</a></li>
					<li onClick="loadModule()"><a href="#"><span class="glyphicon glyphicon-th-large"></span> Mes Modules</a></li>
					<li onClick="loadRSS()"><a href="#"><span class="glyphicon glyphicon-transfer"></span> Flux RSS</a></li>
				</ul>
			<?php }?>
        </li>
      </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li onClick="loadIndex()"><a id="aAccueil"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
		<?php if (isset($_smarty_tpl->tpl_vars['teachLogin']->value)) {?>
			<li onClick="loadConfig()"><a id="aConfig"><span class="glyphicon glyphicon-wrench"></span> Configuration</a></li>
		<?php }?>
		<li onClick="loadHelp()"><a id="aAide"><span class="glyphicon glyphicon-question-sign"></span> Aide</a></li>
		<li onClick="deconnect()"><a><span class="glyphicon glyphicon-off"></span> Déconnexion</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php }} ?>
