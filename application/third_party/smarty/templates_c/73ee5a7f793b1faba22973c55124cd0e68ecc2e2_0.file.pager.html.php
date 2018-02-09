<?php
/* Smarty version 3.1.30, created on 2018-02-07 13:48:08
  from "D:\wamp64\www\mall_manage\application\views\public\pager.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a7a9318111074_35792810',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73ee5a7f793b1faba22973c55124cd0e68ecc2e2' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\public\\pager.html',
      1 => 1517981988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a7a9318111074_35792810 (Smarty_Internal_Template $_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['pager_links']->value)) {?>
<nav style="float:right;margin-top:20px;">
  <ul class="pagination">
  	<?php echo $_smarty_tpl->tpl_vars['pager_links']->value;?>

  </ul>
</nav>
<?php }
}
}
