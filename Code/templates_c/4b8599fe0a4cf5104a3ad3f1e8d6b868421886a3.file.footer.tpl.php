<?php /* Smarty version Smarty-3.1.18, created on 2015-11-29 12:16:40
         compiled from "template\include\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25226565ade985d1311-70910609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b8599fe0a4cf5104a3ad3f1e8d6b868421886a3' => 
    array (
      0 => 'template\\include\\footer.tpl',
      1 => 1448743984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25226565ade985d1311-70910609',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'compteur' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_565ade985e0946_51055646',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565ade985e0946_51055646')) {function content_565ade985e0946_51055646($_smarty_tpl) {?><footer>
	<div id="footerText">
		D&eacute;velopp&eacute; par <span style="font-weight:bold;">Bruno MILLION</span> (IUT GMP) et par <span style="font-weight:bold;">Ga&euml;tan COLOMBIER</span> (IUT GMP) pour le PST de Ville d'Avray (Université Paris Ouest) - <span class="badge"><?php echo $_smarty_tpl->tpl_vars['compteur']->value;?>
 pages vues </span>
		<span class="btn badge" onClick="loadVersion()" role="button">Version 6.0.0</span> 
		<span class="btn badge" onClick="loadQuiSommesNous()" role="button">Qui sommes nous </span>			
		Site responsive <img src="img/responsive.png" id="logoResponsive" alt="logoResponsive">
	</div>
</footer>
<script type="text/javascript" src="js/loadSite.js"></script>
<script type="text/javascript" src="js/panelFilter.js"></script>
<script type="text/javascript" src="js/resetFilter.js"></script>





		
<?php }} ?>
