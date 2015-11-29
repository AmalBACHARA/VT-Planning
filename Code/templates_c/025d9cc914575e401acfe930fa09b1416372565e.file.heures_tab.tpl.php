<?php /* Smarty version Smarty-3.1.18, created on 2015-11-29 12:16:54
         compiled from "template\include\heures_tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18631565adea6a7b987-57534137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '025d9cc914575e401acfe930fa09b1416372565e' => 
    array (
      0 => 'template\\include\\heures_tab.tpl',
      1 => 1448743984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18631565adea6a7b987-57534137',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'allSeances' => 0,
    'seance' => 0,
    'date_actuelle' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_565adea6cbb983_47240568',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565adea6cbb983_47240568')) {function content_565adea6cbb983_47240568($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['seance'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['seance']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allSeances']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['seance']->key => $_smarty_tpl->tpl_vars['seance']->value) {
$_smarty_tpl->tpl_vars['seance']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['seance']->value['type']=='cumul') {?>
		<tr class="cumul">
			<td></td>
			<td></td>
			<td colspan="5"><?php echo $_smarty_tpl->tpl_vars['seance']->value['nomMatiere'];?>
 - cumul des seances : </td>
			<td colspan="3">
				<?php if ($_smarty_tpl->tpl_vars['seance']->value['cumulTP']!=0) {?><span><b>TP:</b> <?php echo $_smarty_tpl->tpl_vars['seance']->value['cumulTP'];?>
</span><?php } else { ?> <?php }?>
				<?php if ($_smarty_tpl->tpl_vars['seance']->value['cumulCM']!=0) {?><span><b>CM:</b> <?php echo $_smarty_tpl->tpl_vars['seance']->value['cumulCM'];?>
</span><?php } else { ?> <?php }?>
				<?php if ($_smarty_tpl->tpl_vars['seance']->value['cumulTD']!=0) {?><span><b>TD:</b> <?php echo $_smarty_tpl->tpl_vars['seance']->value['cumulTD'];?>
</span><?php } else { ?> <?php }?>
				<?php if ($_smarty_tpl->tpl_vars['seance']->value['cumulDS']!=0) {?><span><b>DS:</b> <?php echo $_smarty_tpl->tpl_vars['seance']->value['cumulDS'];?>
</span><?php } else { ?> <?php }?>
				<?php if ($_smarty_tpl->tpl_vars['seance']->value['cumulADM']!=0) {?><span><b>ADM:</b> <?php echo $_smarty_tpl->tpl_vars['seance']->value['cumulADM'];?>
</span><?php } else { ?> <?php }?>
			</td>
			<td><?php echo $_smarty_tpl->tpl_vars['seance']->value['eqTD'];?>
</td>
			<td></td>
		</tr>
	<?php } else { ?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['seance']->value['nomFormation'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['seance']->value['codeApogee'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['seance']->value['nomMatiere'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['seance']->value['dateSeance'];?>
  </td>
			<td><?php echo $_smarty_tpl->tpl_vars['seance']->value['heureDebut'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['seance']->value['heureFin'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['seance']->value['volumeReparti']==0) {?> NON <?php } else { ?> OUI <?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['seance']->value['forfaitaire']==0) {?> NON <?php } else { ?> OUI <?php }?> </td>
			<td class="<?php echo $_smarty_tpl->tpl_vars['seance']->value['typeEnsClass'];?>
"><?php echo $_smarty_tpl->tpl_vars['seance']->value['typeEnsName'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['seance']->value['dureeSeance'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['seance']->value['eqTD'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['date_actuelle']->value>=$_smarty_tpl->tpl_vars['seance']->value['dateSeanceFormatee']) {?> <span class='glyphicon glyphicon-ok-circle'></span><span class="hide">1</span><?php } else { ?><span class="hide">0</span> <?php }?></td>
		</tr>
	<?php }?>
<?php } ?>
<?php }} ?>
