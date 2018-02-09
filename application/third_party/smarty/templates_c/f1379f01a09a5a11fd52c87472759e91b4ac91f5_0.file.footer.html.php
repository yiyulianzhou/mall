<?php
/* Smarty version 3.1.30, created on 2018-02-07 13:48:08
  from "D:\wamp64\www\mall_manage\application\views\public\footer.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a7a931814f882_62457424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1379f01a09a5a11fd52c87472759e91b4ac91f5' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\public\\footer.html',
      1 => 1517981988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a7a931814f882_62457424 (Smarty_Internal_Template $_smarty_tpl) {
?>
	<!-- page JS files -->
	<?php if (isset($_smarty_tpl->tpl_vars['data']->value['base']['page_angularjs_url']) && !empty($_smarty_tpl->tpl_vars['data']->value['base']['page_angularjs_url'])) {?>
    	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base']['page_angularjs_url'];?>
"><?php echo '</script'; ?>
>
    <?php }?>
    <!-- /page JS files -->
  </body>
</html>
<?php }
}
