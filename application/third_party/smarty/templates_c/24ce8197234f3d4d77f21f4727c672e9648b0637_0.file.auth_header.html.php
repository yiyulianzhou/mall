<?php
/* Smarty version 3.1.30, created on 2018-02-07 13:52:07
  from "D:\wamp64\www\mall_manage\application\views\public\auth_header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a7a940729a4b2_26763880',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24ce8197234f3d4d77f21f4727c672e9648b0637' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\public\\auth_header.html',
      1 => 1517981988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a7a940729a4b2_26763880 (Smarty_Internal_Template $_smarty_tpl) {
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
assets/css/custom.css" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->

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
assets/js/plugins/forms/selects/select2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/notifications/sweet_alert.min.js"><?php echo '</script'; ?>
>
<!-- /core JS files -->

<!-- Theme JS files -->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/core/app.js"><?php echo '</script'; ?>
>
<!-- /theme JS files -->

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
    <div class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo site_url();?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/images/logo_light.png" alt=""></a>

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">
                        <i class="icon-home4"></i> <span class="visible-xs-inline-block position-right"> 首页</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar --><?php }
}
