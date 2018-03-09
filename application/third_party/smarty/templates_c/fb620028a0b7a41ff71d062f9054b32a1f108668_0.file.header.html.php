<?php
/* Smarty version 3.1.30, created on 2018-02-07 15:45:30
  from "D:\wamp64\www\mall_manage\application\views\public\header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a7aae9a89ddf6_62220621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb620028a0b7a41ff71d062f9054b32a1f108668' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\public\\header.html',
      1 => 1517989527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a7aae9a89ddf6_62220621 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $_smarty_tpl->tpl_vars['data']->value['common']['site_title'];?>
</title>
<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/custom.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/pickers/daterangepicker.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
<!-- Core JS files -->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/loaders/pace.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/core/libraries/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/dev/libraries/angular.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/core/libraries/bootstrap.min.js"><?php echo '</script'; ?>
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
<!-- Core JS files -->


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/pages/laydate.js"><?php echo '</script'; ?>
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

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/core/app.js"><?php echo '</script'; ?>
>
<!-- angularjsfiles -->

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/dev/angularjs_app_module.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    app.value('common',<?php echo $_smarty_tpl->tpl_vars['data']->value['json_urls'];?>
);
    <?php if (isset($_smarty_tpl->tpl_vars['permission']->value)) {?>app.value('permission',<?php echo $_smarty_tpl->tpl_vars['permission']->value;?>
);<?php }
echo '</script'; ?>
>
<!-- angularjsfiles -->
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
</head>

<body ng-app="myApp">

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header"> <a class="navbar-brand" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
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
				<a class="dropdown-toggle" data-toggle="dropdown"> 
					<img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/images/placeholder_user.jpg" >
					<span><?php echo $_smarty_tpl->tpl_vars['data']->value['base']['username'];?>
</span>
					<i class="caret"></i> 
				</a>
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
<!-- /main navbar --><?php }
}
