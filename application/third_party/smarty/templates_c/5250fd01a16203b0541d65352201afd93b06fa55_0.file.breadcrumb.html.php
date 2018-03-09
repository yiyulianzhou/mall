<?php
/* Smarty version 3.1.30, created on 2018-02-22 14:35:38
  from "D:\wamp64\www\mall_manage\application\views\public\breadcrumb.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a8e64ba4b7589_84742608',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5250fd01a16203b0541d65352201afd93b06fa55' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\public\\breadcrumb.html',
      1 => 1519281336,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a8e64ba4b7589_84742608 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="page-header">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
home"><i class="icon-home2 position-left"></i> 首页</a></li>
            <li ng-hide="'<?php echo $_smarty_tpl->tpl_vars['data']->value['base']['class_name'];?>
' == 'home'"><a href="<?php echo site_url($_smarty_tpl->tpl_vars['data']->value['base']['module_url']);?>
"> <?php echo $_smarty_tpl->tpl_vars['data']->value['base']['module_name'];?>
</a></li>
            <li class="active"><?php echo $_smarty_tpl->tpl_vars['data']->value['common']['method_name'][$_smarty_tpl->tpl_vars['data']->value['base']['method_name']];?>
</li>
        </ul>
    </div>
</div><?php }
}
