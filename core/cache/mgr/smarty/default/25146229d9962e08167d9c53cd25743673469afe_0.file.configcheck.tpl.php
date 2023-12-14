<?php
/* Smarty version 4.3.4, created on 2023-12-13 21:50:53
  from '/var/www/ch90848625/www/mykhailov.partners/manager/templates/default/dashboard/configcheck.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_657a0b1d583582_90017223',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25146229d9962e08167d9c53cd25743673469afe' => 
    array (
      0 => '/var/www/ch90848625/www/mykhailov.partners/manager/templates/default/dashboard/configcheck.tpl',
      1 => 1702469793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657a0b1d583582_90017223 (Smarty_Internal_Template $_smarty_tpl) {
if (count($_smarty_tpl->tpl_vars['warnings']->value)) {?>
    <h4><?php echo $_smarty_tpl->tpl_vars['_lang']->value['configcheck_notok'];?>
</h4>
    <ul class="configcheck">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['warnings']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
            <li>
                <h5 class="warn"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</h5>
                <p><i class="icon icon-info-circle"></i> <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</p>
            </li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
<?php }
}
}
