<?php
/* Smarty version 3.1.30, created on 2018-03-14 14:52:03
  from "D:\wamp64\www\mall_manage\application\views\my\passwd.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa8c693707e32_34290293',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fb9ed26ad0b5084d6c69eacf370ec4a4da8fae0' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\my\\passwd.html',
      1 => 1521010320,
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
function content_5aa8c693707e32_34290293 (Smarty_Internal_Template $_smarty_tpl) {
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
assets/images/placeholder_user.jpg" alt=""> <span> <?php echo $_smarty_tpl->tpl_vars['data']->value['base']['username'];?>
</span> <i class="caret"></i> </a>
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
                            <h5 class="panel-title">修改密码</h5>
                            <div class="heading-elements"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
user" class="btn btn-primary">返回首页</a></div>
                        </div>
                        <ng-form class="stepy-basic" name="pswEditForm">
                            <div class="panel panel-body">
                                <div class="form-group has-feedback has-feedback-left">
                                    <label>输入原密码:
                                        <span class="text-danger" ng-show="password_required_invalid"></span>
                                        <span ng-show="pswEditForm.oldpsw.$invalid">
                                            <span class="text-danger" ng-show="pswEditForm.oldpsw.$error.minlength || pswEditForm.oldpsw.$error.maxlength"> <span class="ml-10 help">请输入6-12位原密码</span></span>
                                        </span>
                                    </label>
                                    <input type="password" class="form-control" name="oldpsw" ng-model="oldpsw" ng-minlength="6" ng-maxlength="12" placeholder="" required>
                                    <div class="form-control-feedback">
                                    </div>
                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    <label>输入新密码:
                                        <span class="text-danger" ng-show="password_required_invalid"></span>
                                        <span ng-show="pswEditForm.newpsw.$invalid">
                                            <span class="text-danger" ng-show="pswEditForm.newpsw.$error.minlength || pswEditForm.newpsw.$error.maxlength">长度不正确 <span class="ml-10 help">6-12位</span></span>
                                        </span>
                                    </label>
                                    <input type="password"  class="form-control" name="newpsw" ng-model="newpsw" ng-minlength="6" ng-maxlength="12" placeholder="" required>
                                    <div class="form-control-feedback">
                                    </div>
                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    <label>确认新密码:
                                        <span class="text-danger" ng-show="password_required_invalid"></span>
                                        <span ng-show="pswEditForm.surenewpsw.$invalid">
                                            <span class="text-danger" ng-show="pswEditForm.surenewpsw.$error.minlength || pswEditForm.surenewpsw.$error.maxlength">长度不正确 <span class="ml-10 help">6-12位</span></span>
                                        </span>
                                        <span ng-show="(newpsw || surenewpsw) && newpsw != surenewpsw">
                                            <span class="text-danger  ml-10" >两次密码输入不一致</span>
                                        </span>
                                    </label>
                                    <input type="password" class="form-control" name="surenewpsw" ng-model="surenewpsw" placeholder="" required>
                                    <div class="form-control-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" ng-click="save()" ng-disabled="pswEditForm.oldpsw.$invalid ||pswEditForm.newpsw.$invalid||pswEditForm.surenewpsw.$invalid || newpsw != surenewpsw" class="btn btn-primary btn-block">提交</button>
                                </div>
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
