<?php
/* Smarty version 3.1.30, created on 2018-01-31 11:29:26
  from "D:\wamp64\www\mall_manage\application\views\user\edit.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a71a8966056a0_82634774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7af74429adff6dd38f9b1a97e591cb92a710bf72' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\user\\edit.html',
      1 => 1517297828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/left.html' => 1,
    'file:../public/footer_page.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5a71a8966056a0_82634774 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_smarty_tpl->tpl_vars['data']->value['common']['site_title'];?>
</title>
    <!-- Global stylesheets -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/fileinput.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/dev/css/advert.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <!-- Core JS files -->
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/core/libraries/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/core/libraries/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/dev/libraries/angular.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/dev/libraries/ui-bootstrap-tpls.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/dev/libraries/ui-bootstrap-tpls-0.13.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/loaders/blockui.min.js"><?php echo '</script'; ?>
>
    <!-- /core JS files -->
    <!-- Theme JS files -->
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/forms/styling/uniform.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/forms/selects/bootstrap_multiselect.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/ui/moment/moment.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/pickers/daterangepicker.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/pickers/pickadate/picker.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/pickers/pickadate/picker.date.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/forms/selects/select2.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/notifications/sweet_alert.min.js"><?php echo '</script'; ?>
>

    <!-- global -->
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/core/app.js"><?php echo '</script'; ?>
>
    <!-- /global -->

    <!-- angularjsfiles -->
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/dev/angularjs_app_module.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
		app.value('common',<?php echo $_smarty_tpl->tpl_vars['data']->value['json_urls'];?>
);
		app.value('userinfo',<?php echo $_smarty_tpl->tpl_vars['user_info']->value;?>
);
		<?php if (isset($_smarty_tpl->tpl_vars['permission']->value)) {?>app.value('permission',<?php echo $_smarty_tpl->tpl_vars['permission']->value;?>
);<?php }?>
	<?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/dev/angularjs_app_factory.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/dev/angularjs_app_service.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/dev/angularjs_header.js"><?php echo '</script'; ?>
>
    <!-- /angularjsfiles -->
</head>

<body ng-app="myApp">

    <!-- Main navbar -->
    <div class="navbar navbar-inverse" ng-controller="headerCtrl">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/images/logo_light.png" alt=""></a>
            <ul class="nav navbar-nav visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>
        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/images/placeholder_user.jpg" alt=""> <span> yangxun</span> <i class="caret"></i> </a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
my/info"><i class="icon-cog5"></i> 帐号信息</a></li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
my/passwd"><i class="icon-cog5"></i> 密码修改</a></li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
login/logout"><i class="icon-switch2"></i> 退出</a></li>
					</ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/core/libraries/jquery_ui/core.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/core/libraries/jquery_ui/effects.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/core/libraries/jquery_ui/interactions.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/trees/fancytree_all.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/trees/fancytree_childcounter.js"><?php echo '</script'; ?>
>

    <!-- Page container -->
    <div class="page-container" ng-controller="appCtrl">
        <!-- Page content -->
        <div class="page-content">
            <!-- Main sidebar -->
            <!-- Main sidebar -->
				<?php $_smarty_tpl->_subTemplateRender("file:../public/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <!-- /main sidebar -->
            <!-- Main content -->
            <div class="content-wrapper">    
                <!-- Content area -->
                <div class="content">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">编缉用户</h5>
                            <div class="heading-elements"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
user" class="btn btn-primary">返回用户列表</a></div>
                        </div>
                        <ul id="stepy-1-header" class="stepy-header" ng-if="step1">
                          <li id="stepy-1" class="stepy-active" style="cursor: default;"><div>基本信息</div><span>基本信息</span></li>
                          <li id="stepy-2" style="cursor: default;"><div>2</div><span>权限设置</span></li>
                        </ul>
                        <ul id="stepy-2-header" class="stepy-header"  ng-if="step2">
                          <li id="stepy-3" class="" style="cursor: default;"><div>基本信息</div><span>基本信息</span></li>
                          <li id="stepy-4" style="cursor: default;" class="stepy-active"><div>权限设置</div><span>权限设置</span></li>
                        </ul>
                        <ng-form class="stepy-basic" name="userEditForm">
                            <fieldset title="基本信息" class="stepy-step" ng-show="step1">
								<legend class="text-semibold">基本信息</legend>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>用户名: <span ng-show="userEditForm.username.$invalid">
														<span class="text-danger" ng-show="userEditForm.username.$error.required">必填项</span>
														<span class="text-danger" ng-show="userEditForm.username.$error.minlength || userEditForm.username.$error.maxlength">长度不正确  <span class="ml-10  help">4-10个字符</span></span>
													</span>
											</label>
											<input name="username" ng-model="username" ng-minlength="4" ng-maxlength="10" type="text" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>真实姓名: <span ng-show="userEditForm.real_name.$invalid">
												<span class="text-danger"  ng-show="userEditForm.real_name.$error.required">必填项</span>
												<span class="text-danger" ng-show="userEditForm.real_name.$error.minlength || userEditForm.real_name.$error.maxlength">长度不正确 <span class="ml-10 help">2-20个汉字</span></span>
											</span></label>
											<input name="real_name" ng-model="real_name" ng-minlength="2" ng-maxlength="20" type="text" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>输入密码:
											<span class="text-danger" ng-show="password_required_invalid"></span>
											<span ng-show="userEditForm.password.$invalid">
												<span class="text-danger" ng-show="userEditForm.password.$error.minlength || userEditForm.password.$error.maxlength">长度不正确 <span class="ml-10 help">6-12位</span></span>
											</span></label>
											<input name="password" ng-model="password" ng-minlength="6" ng-maxlength="12"  type="password" placeholder="" class="form-control" value="" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>确认密码: <span ng-show="userEditForm.password_comfirm.$invalid">
												<span class="text-danger" ng-show="userEditForm.password_comfirm.$error.minlength || userEditForm.password_comfirm.$error.maxlength">长度不正确 <span class="ml-10 help">6-12位</span></span>
											</span>
											<span ng-show="(password || password_comfirm) && password != password_comfirm">
												<span class="text-danger  ml-10" >两次密码输入不一致</span>
											</span></label>
											<input name="password_comfirm" ng-model="password_comfirm" ng-minlength="6" ng-maxlength="12" type="password" placeholder="" class="form-control" value="">
										</div>
									</div>
								</div>
							</fieldset>
                            <fieldset title="权限设置" class="stepy-step" ng-show="step2">
								<legend class="text-semibold">权限设置</legend>
								<div class="row">
									<div class="col-md-6 col-md-offset-3">
										<div class="form-group">
											<label>是否超级管理员：<input name="data" ng-model="data" ng-checked="data==1" class="ng-pristine ng-untouched ng-valid ng-not-empty" type="checkbox"></label>
										</div>
										<div class="form-group">
											<label>权限分配：</label>
											<div class="tree-checkbox-hierarchical well" id="permission_tree">
												<ul>
													<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['money'])) {?>
													<li class="folder" id="10000">财务管理
														<ul>
															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['money']['seller'])) {?>
															<li id="23">卖家提现</li>
															<?php }?>
															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['money']['buyer'])) {?>
															<li id="24">买家提现</li>
															<?php }?>
														</ul>
													</li>
													<?php }?>

													<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['goods'])) {?>
													<li class="folder" id="20000">商品管理
														<ul>
															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['goods']['index'])) {?>
															<li id="6">商品列表</li>
															<?php }?>

															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['goods']['detail'])) {?>
															<li id="7">商品详情</li>
															<?php }?>
															
															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['goods']['verify'])) {?>
															<li id="8">审核商品</li>
															<?php }?>

															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['goods']['nosales'])) {?>
															<li id="9">商品下架</li>
															<?php }?>
														</ul>
													</li>
													<?php }?>

													<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['order'])) {?>
													<li class="folder" id="30000">订单管理
														<ul>
															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['order']['index'])) {?>
															<li id="11">订单列表</li>
															<?php }?>

															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['order']['detail'])) {?>
															<li id="12">订单详情</li>
															<?php }?>

															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['order']['delete'])) {?>
															<li id="13">删除订单</li>
															<?php }?>
														</ul>
													</li>
													<?php }?>

													<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['seller'])) {?>
													<li class="folder" id="40000">卖家管理
														<ul>
															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['seller']['index'])) {?>
															<li id="15">卖家列表</li>
															<?php }?>

															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['seller']['verify'])) {?>
															<li id="16">卖家审核</li>
															<?php }?>

															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['seller']['lock'])) {?>
															<li id="17">卖家封禁</li>
															<?php }?>
														</ul>
													</li>
													<?php }?>

													<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['buyer'])) {?>
													<li class="folder" id="50000">买家管理
														<ul>
															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['buyer']['index'])) {?>
															<li id="18">买家列表</li>
															<?php }?>

															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['buyer']['lock'])) {?>
															<li id="30">买家详情</li>
															<?php }?>

															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['buyer']['detail'])) {?>
															<li id="19">买家禁言</li>
															<?php }?>
														</ul>
													</li>
													<?php }?>

													<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user'])) {?>
													<li class="folder" id="60000">用户管理
														<ul>
															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user']['index'])) {?>
															<li id="2">用户列表</li>
															<?php }?>

															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user']['create'])) {?>
															<li id="3">新增用户</li>
															<?php }?>

															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user']['lock'])) {?>
															<li id="4">封禁用户</li>
															<?php }?>

															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user']['detail'])) {?>
															<li id="29">编辑用户</li>
															<?php }?>
														</ul>
													</li>
													<?php }?>

													<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['bulletin'])) {?>
													<li class="folder" id="70000">公告管理
														<ul>
															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['bulletin']['create'])) {?>
															<li id="27">新增公告</li>
															<?php }?>

															<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['bulletin']['detail'])) {?>
															<li id="28">公告详情</li>
															<?php }?>
														</ul>
													</li>
													<?php }?>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</fieldset>

                            <input type="hidden" value="0" ng-init="edit(0)">
                            <div class="stepy-navigator">
                              <button class="button-next btn btn-primary" ng-if="step1" ng-click="nextAction()"
                                                                      ng-disabled="userEditForm.username.$invalid ||
                                                                                    userEditForm.real_name.$invalid ||
                                                                                    userEditForm.password.$invalid ||
                                                                                    userEditForm.password_comfirm.$invalid ||
                                                                                    password != password_comfirm">下一步 <i class="icon-arrow-right14 position-right"></i>
                              </button>
                              <button class="button-back btn btn-default" ng-if="step2" ng-click="backAction()"><i class="icon-arrow-left13 position-left"></i> 上一步</button>
                              <button type="button"  ng-click="save()"  ng-if="step2"  class="btn btn-primary stepy-finish">保存 <i class="icon-check position-right"></i></button>
                            </div>
                        </ng-form>
                    </div>
                </div>
                <!-- /content area -->
                <div class="row">
					<?php $_smarty_tpl->_subTemplateRender("file:../public/footer_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				</div>
            </div>
            <!-- /main content -->
        </div>
        <!-- /page content -->
    </div>
    <!-- /page container -->

	<?php $_smarty_tpl->_subTemplateRender("file:../public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
