<?php
/* Smarty version 3.1.30, created on 2018-02-09 03:15:11
  from "D:\wamp64\www\mall_manage\application\views\home\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a7d123f61fc12_70819247',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83953f9449604e194698da463e3f8182eda029a7' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\home\\index.html',
      1 => 1518146109,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/left.html' => 1,
    'file:../public/breadcrumb.html' => 1,
    'file:../public/page.html' => 1,
    'file:../public/page2.html' => 1,
    'file:../public/footer_page.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5a7d123f61fc12_70819247 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Page container -->
<div class="page-container" ng-controller="appCtrl">

	<!-- Page content -->
	<div class="page-content" >

		<?php $_smarty_tpl->_subTemplateRender("file:../public/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


		<!-- Main content -->
		<div class="content-wrapper">

			<?php $_smarty_tpl->_subTemplateRender("file:../public/breadcrumb.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<!-- Content area -->
			<div class="content">
				<div class="row">
					<div class=" col-md-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h6 class="panel-title">今日数据<span class="pull-right"><?php echo date('Y-m-d');?>
</span></h6>
							</div>
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-3">
										<div class="panel bg-teal-400">
											<div class="panel-body pb20 homgicon-01">
												<h4 class="no-margin">新增买家</h4>
												<h2 class="mv10"><?php echo $_smarty_tpl->tpl_vars['list']->value['buyer'];?>
个</h2>
											</div>
										</div>
									</div>

									<div class="col-md-3">
										<div class="panel bg-pink-400 ">
											<div class="panel-body pb20 homgicon-02">
												<h4 class="no-margin">新增卖家</h4>
												<h2 class="mv10"><?php echo $_smarty_tpl->tpl_vars['list']->value['seller'];?>
个</h2>
											</div>
										</div>
									</div>

									<div class="col-md-3">
										<div class="panel bg-blue-400">
											<div class="panel-body pb20 homgicon-03">
												<h4 class="no-margin">新增订单</h4>
												<h2 class=" mv10"><?php echo $_smarty_tpl->tpl_vars['list']->value['order'];?>
个</h2>
											</div>
										</div>
									</div>

									<div class="col-md-3">
										<div class="panel bg-brown-400">
											<div class="panel-body pb20 homgicon-04">
												<h4 class="no-margin">新增商品</h4>
												<h2 class="mv10"><?php echo $_smarty_tpl->tpl_vars['list']->value['goods'];?>
个</h2>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="panel panel-primary col-md-6">
						<div class="panel-heading">
							<span class="panel-title">您有{{total_rows}}条用户反馈请及时处理</span>
						</div>
						<div class="panel-body" >

							<ul ng-repeat="item in list track by $index">
								<li>
									<div class="col-md-10 pt5">{{item.time}}&nbsp;&nbsp;{{item.username}}申请提现{{item.body}}</div>
									<div class="col-md-2 "><a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
money/buyer">处理</a></div>
								</li>
							</ul>
						</div>
						<div class="panel-footer">
							<?php $_smarty_tpl->_subTemplateRender("file:../public/page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

						</div>
					</div>
					<div class="panel panel-primary col-md-6">
						<div class="panel-heading">
							<span class="panel-title">您有{{total_rows2}}条提现申请请及时处理</span>
						</div>
						<div class="panel-body" >
							<ul ng-repeat="item in applylist track by $index">
								<li>
									<div class="col-md-10 pt5">{{item.create_time}}&nbsp;&nbsp;{{item.username}}申请提现{{item.money}}元</div>
									<div class="col-md-2 "><a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
money/buyer">处理</a></div>
								</li>
							</ul>

						</div>
						<div class="panel-footer">
							<?php $_smarty_tpl->_subTemplateRender("file:../public/page2.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="panel panel-danger col-md-6">

						<div class="panel-heading">
							<span class="panel-title">卖家Top5</span>
						</div>
						<div class="panel-body br-t" >

							<div class="chart-container">
								<div class="chart has-fixed-height" id="stacked_lines"></div>
							</div>
						</div>
					</div>
					<div class="panel panel-danger col-md-6">
						<div class="panel-heading">
							<span class="panel-title">买家Top5</span>
						</div>
						<div class="panel-body br-t" >
							<div class="chart-container">
								<div class="chart has-fixed-height" id="stacked2_lines"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="panel panel-warning col-md-6">
						<div class="panel-heading">
							<span class="panel-title">商品Top5</span>
						</div>
						<div class="panel-body br-t" >
							<div class="chart-container">
								<div class="chart has-fixed-height" id="stacked3_lines"></div>
							</div>
						</div>
					</div>
					<div class="panel panel-warning col-md-6">
						<div class="panel-heading">
							<span class="panel-title">活跃小区Top5</span>
						</div>
						<div class="panel-body br-t" >
							<div class="chart-container">
								<div class="chart has-fixed-height" id="stacked4_lines"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
			
			<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/visualization/echarts/echarts.js"><?php echo '</script'; ?>
>
		</div>
		<?php $_smarty_tpl->_subTemplateRender("file:../public/footer_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<!-- /page content -->
	</div>
	<!-- /page container -->
</div>

<?php $_smarty_tpl->_subTemplateRender("file:../public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
