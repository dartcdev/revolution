<?php
/* Smarty version 4.3.4, created on 2023-12-13 21:54:06
  from '/var/www/ch90848625/www/mykhailov.partners/manager/templates/default/error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_657a0bde849956_91541371',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2719a117e86ce322c4b4677ce7e06eccac91173' => 
    array (
      0 => '/var/www/ch90848625/www/mykhailov.partners/manager/templates/default/error.tpl',
      1 => 1702469793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657a0bde849956_91541371 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/ch90848625/www/mykhailov.partners/core/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<div class="modx_error">
    <h2><i class="icon icon-exclamation-triangle"></i> An error occurred...</h2>

    <div class="error_container<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['_e']->value['errors']) > 0) {?> multiple<?php }?>">
        <p><?php echo $_smarty_tpl->tpl_vars['_e']->value['message'];?>
</p>

        <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['_e']->value['errors']) > 0) {?>
        <p>&nbsp;</p>
        <p><strong>Errors:</strong></p>
        <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_e']->value['errors'], 'error');
$_smarty_tpl->tpl_vars['error']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->do_else = false;
?>
            <li><i class="icon icon-angle-right"></i> <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
        <?php }?>
    </div>
</div><?php }
}
