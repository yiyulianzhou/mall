<?php
/* Smarty version 3.1.30, created on 2018-02-07 13:48:08
  from "D:\wamp64\www\mall_manage\application\views\public\left.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a7a93180f1c72_50832770',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22581e46f08c277a398b5efc5a9b4fe7e099497c' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\public\\left.html',
      1 => 1517981988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a7a93180f1c72_50832770 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- lef sidebar -->
<div class="sidebar sidebar-main">
	<div class="sidebar-content">
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion ptn">
					<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
home"><i class="icon-home4"></i> <span>首页</span></a></li>
					<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['money'])) {?>
					<li> <a href="javascript:void(0);"><i class="icon-price-tags"></i> <span>财务管理</span></a>
						<ul>
							<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['money']['seller'])) {?>
							<li<?php if ($_smarty_tpl->tpl_vars['data']->value['base']['class_name'] == 'money' && $_smarty_tpl->tpl_vars['data']->value['base']['method_name'] == 'seller') {?> class="active"<?php }?>>
								<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
money/seller">卖家提现</a>
							</li>
							<?php }?>
							<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['money']['buyer'])) {?>
							<li<?php if ($_smarty_tpl->tpl_vars['data']->value['base']['class_name'] == 'money' && $_smarty_tpl->tpl_vars['data']->value['base']['method_name'] == 'buyer') {?> class="active"<?php }?>>
								<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
money/buyer">买家提现</a>
							</li>
							<?php }?>
							<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['money']['recharge'])) {?>
							<li<?php if ($_smarty_tpl->tpl_vars['data']->value['base']['class_name'] == 'money' && $_smarty_tpl->tpl_vars['data']->value['base']['method_name'] == 'recharge') {?> class="active"<?php }?>>
								<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
money/recharge">充值列表</a>
							</li>
							<?php }?>
						</ul>
					</li>
					<?php }?>

					<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['goods'])) {?>					
					<li<?php if ($_smarty_tpl->tpl_vars['data']->value['base']['class_name'] == 'goods') {?> class="active"<?php }?>> 
						<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
goods"><i class="icon-pie-chart3"></i> <span>商品管理</span></a>
					</li>
					<?php }?>

					<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['order'])) {?>					
					<li<?php if ($_smarty_tpl->tpl_vars['data']->value['base']['class_name'] == 'order') {?> class="active"<?php }?>> 
						<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
order"><i class="icon-pie-chart3"></i> <span>订单管理</span></a>
					</li>
					<?php }?>

					<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['seller'])) {?>
					<li<?php if ($_smarty_tpl->tpl_vars['data']->value['base']['class_name'] == 'seller') {?> class="active"<?php }?>>
						<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
seller"><i class="icon-clipboard5"></i> <span>卖家管理</span></a>
					</li>
					<?php }?>

					<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['buyer'])) {?>
					
					<li<?php if ($_smarty_tpl->tpl_vars['data']->value['base']['class_name'] == 'buyer') {?> class="active"<?php }?>>
						<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
buyer"><i class="icon-user-block"></i> <span>买家管理</span></a>
					</li>
					<?php }?>

					<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user'])) {?>					
					<li<?php if ($_smarty_tpl->tpl_vars['data']->value['base']['class_name'] == 'user') {?> class="active"<?php }?>>
						<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
user"><i class="icon-users2"></i> <span>用户管理</span></a>
					</li>
					<?php }?>

					<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['bulletin'])) {?>					
					<li<?php if ($_smarty_tpl->tpl_vars['data']->value['base']['class_name'] == 'bulletin') {?> class="active"<?php }?>>
						<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
bulletin"><i class="icon-clipboard5"></i> <span>公告管理</span></a>
					</li>
					<?php }?>

				</ul>
			</div>
		</div>
	</div>
</div>
<!-- /left sidebar --><?php }
}
