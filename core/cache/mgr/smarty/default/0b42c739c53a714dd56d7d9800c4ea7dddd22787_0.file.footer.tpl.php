<?php
/* Smarty version 4.3.4, created on 2023-12-13 21:50:56
  from '/var/www/ch90848625/www/mykhailov.partners/manager/templates/default/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_657a0b20c97536_85146963',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b42c739c53a714dd56d7d9800c4ea7dddd22787' => 
    array (
      0 => '/var/www/ch90848625/www/mykhailov.partners/manager/templates/default/footer.tpl',
      1 => 1702469793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657a0b20c97536_85146963 (Smarty_Internal_Template $_smarty_tpl) {
?>    </div>
    <!-- #modx-content-->
    <div id="modx-footer">
        <?php if ($_smarty_tpl->tpl_vars['_search']->value) {?>
            <div class="modx-subnav" id="modx-manager-search-icon-submenu">
                <div class="modx-subnav-arrow"></div>
                <div id="modx-manager-search" role="search"></div>
            </div>
        <?php }?>
        <?php $_template = new Smarty_Internal_Template('eval:'.$_smarty_tpl->tpl_vars['navb_submenus']->value, $_smarty_tpl->smarty, $_smarty_tpl);echo $_template->fetch(); ?>
        <?php $_template = new Smarty_Internal_Template('eval:'.$_smarty_tpl->tpl_vars['userNav_submenus']->value, $_smarty_tpl->smarty, $_smarty_tpl);echo $_template->fetch(); ?>
    </div>
</div>
<!-- #modx-container -->

</body>
</html><?php }
}
