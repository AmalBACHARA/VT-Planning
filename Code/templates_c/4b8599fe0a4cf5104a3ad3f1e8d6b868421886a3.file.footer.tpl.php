<?php /* Smarty version Smarty-3.1.18, created on 2015-11-29 17:17:56
         compiled from "template\include\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25226565ade985d1311-70910609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b8599fe0a4cf5104a3ad3f1e8d6b868421886a3' => 
    array (
      0 => 'template\\include\\footer.tpl',
      1 => 1448813861,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25226565ade985d1311-70910609',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_565ade985e0946_51055646',
  'variables' => 
  array (
    'compteur' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565ade985e0946_51055646')) {function content_565ade985e0946_51055646($_smarty_tpl) {?><footer>
	<div id="footerText">
		D&eacute;velopp&eacute; par <span style="font-weight:bold;">Amal BACHARA</span>, par <span style="font-weight:bold;">Sokhna Diarra DIOP</span> et par <span style="font-weight:bold;">Adrien MARDIL</span> (Master MIAGE) Université Paris Saclay - <span class="badge"><?php echo $_smarty_tpl->tpl_vars['compteur']->value;?>
 pages vues </span>
		<span class="btn badge" onClick="loadVersion()" role="button">Version 6.1.0</span> 
		<span class="btn badge" onClick="loadQuiSommesNous()" role="button">Qui sommes nous </span>			
		Site responsive <img src="img/responsive.png" id="logoResponsive" alt="logoResponsive">
	</div>
</footer>
<script type="text/javascript" src="js/loadSite.js"></script>
<script type="text/javascript" src="js/panelFilter.js"></script>
<script type="text/javascript" src="js/resetFilter.js"></script>





		
<?php }} ?>