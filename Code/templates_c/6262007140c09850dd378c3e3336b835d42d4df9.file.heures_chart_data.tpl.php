<?php /* Smarty version Smarty-3.1.18, created on 2015-11-30 08:36:09
         compiled from "template\include\heures_chart_data.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11643565bfc697b7e82-38471896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6262007140c09850dd378c3e3336b835d42d4df9' => 
    array (
      0 => 'template\\include\\heures_chart_data.tpl',
      1 => 1448743984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11643565bfc697b7e82-38471896',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'heuresParMois' => 0,
    'mois' => 0,
    'cumul' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_565bfc69863164_95228594',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565bfc69863164_95228594')) {function content_565bfc69863164_95228594($_smarty_tpl) {?>{
	"cols" : [
		{ "id" : "", "label" : "Mois", "type" : "string" } ,
		{ "id" : "", "label" : "Cumul", "type" : "number" }
	],
	"rows" : [
		<?php  $_smarty_tpl->tpl_vars['cumul'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cumul']->_loop = false;
 $_smarty_tpl->tpl_vars['mois'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['heuresParMois']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['cumul']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['cumul']->key => $_smarty_tpl->tpl_vars['cumul']->value) {
$_smarty_tpl->tpl_vars['cumul']->_loop = true;
 $_smarty_tpl->tpl_vars['mois']->value = $_smarty_tpl->tpl_vars['cumul']->key;
 $_smarty_tpl->tpl_vars['cumul']->index++;
 $_smarty_tpl->tpl_vars['cumul']->first = $_smarty_tpl->tpl_vars['cumul']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['data']['first'] = $_smarty_tpl->tpl_vars['cumul']->first;
?>
		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['data']['first']) {?><?php } else { ?>,<?php }?>
		{ "c" : [
			{ "v" : "<?php echo $_smarty_tpl->tpl_vars['mois']->value;?>
", "f" : "<?php echo $_smarty_tpl->tpl_vars['cumul']->value['mois'];?>
" } ,
			{ "v" : <?php echo $_smarty_tpl->tpl_vars['cumul']->value['num'];?>
, "f" : "<?php echo $_smarty_tpl->tpl_vars['cumul']->value['str'];?>
" }
		] }
		<?php } ?>
	]
}
<?php }} ?>
