<?php
/* Smarty version 4.3.4, created on 2023-12-13 21:50:56
  from '/var/www/ch90848625/www/mykhailov.partners/manager/templates/default/dashboard/updates.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_657a0b209d55e0_67533344',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '166b895a4eaa95d995f86b9360871f6e82d731f7' => 
    array (
      0 => '/var/www/ch90848625/www/mykhailov.partners/manager/templates/default/dashboard/updates.tpl',
      1 => 1702469793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657a0b209d55e0_67533344 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="modx-grid-updates" class="updates-widget">
    <div class="table-wrapper">
        <table class="table">
            <thead>
            <tr>
                <th><?php echo $_smarty_tpl->tpl_vars['_lang']->value['updates_type'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['_lang']->value['updates_status'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['_lang']->value['updates_action'];?>
</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><span class="updates-title">MODX</span></td>
                <?php if ($_smarty_tpl->tpl_vars['modx']->value['updateable']) {?>
                    <td><span class="updates-available"><?php echo $_smarty_tpl->tpl_vars['modx']->value['full_version'];?>
</span></td>
                    <td><a href="https://modx.com/download" class="dashboard-button"
                           target="_blank"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['updates_update'];?>
</a></td>
                <?php } else { ?>
                    <td><span class="updates-ok"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['updates_ok'];?>
</span></td>
                    <td><button class="dashboard-button" disabled><?php echo $_smarty_tpl->tpl_vars['_lang']->value['updates_update'];?>
</button></td>
                <?php }?>
            </tr>
            <tr>
                <?php if ($_smarty_tpl->tpl_vars['packages']->value['updateable']) {?>
                    <td>
                        <span class="updates-title"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['updates_extras'];?>
</span>
                        <span class="updates-updateable">
                            <?php if ($_smarty_tpl->tpl_vars['packages']->value['updateable'] > 10) {?>10+<?php } else {
echo $_smarty_tpl->tpl_vars['packages']->value['updateable'];
}?>
                        </span>
                    </td>
                    <td><span class="updates-available"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['updates_available'];?>
</span></td>
                    <td>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
?a=workspaces"
                           class="dashboard-button"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['updates_update'];?>
</a>
                    </td>
                <?php } else { ?>
                    <td><span class="updates-title"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['updates_extras'];?>
</span></td>
                    <td><span class="updates-ok"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['updates_ok'];?>
</span></td>
                    <td><button class="dashboard-button" disabled><?php echo $_smarty_tpl->tpl_vars['_lang']->value['updates_update'];?>
</button></td>
                <?php }?>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<?php }
}
