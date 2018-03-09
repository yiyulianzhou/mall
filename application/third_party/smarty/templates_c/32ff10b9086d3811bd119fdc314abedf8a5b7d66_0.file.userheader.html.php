<?php
/* Smarty version 3.1.30, created on 2018-03-09 15:29:35
  from "D:\wamp64\www\mall_manage\application\views\public\userheader.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa237df6303f3_60677021',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32ff10b9086d3811bd119fdc314abedf8a5b7d66' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\public\\userheader.html',
      1 => 1520580478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa237df6303f3_60677021 (Smarty_Internal_Template $_smarty_tpl) {
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
><?php }
}
