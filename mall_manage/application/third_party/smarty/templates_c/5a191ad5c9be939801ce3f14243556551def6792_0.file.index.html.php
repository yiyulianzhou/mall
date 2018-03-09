<?php
/* Smarty version 3.1.30, created on 2018-02-07 13:52:07
  from "D:\wamp64\www\mall_manage\application\views\login\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a7a9407229019_70065223',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a191ad5c9be939801ce3f14243556551def6792' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\login\\index.html',
      1 => 1517981988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/auth_header.html' => 1,
    'file:../public/bottom.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5a7a9407229019_70065223 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../public/auth_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<!-- Page container -->
	<div class="page-container login-container" ng-controller="appCtrl">
		<!-- Page content -->
		<div class="page-content">
			<div class="content-wrapper">
				<div class="content">
					<ng-form name="userLoginForm">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">用户登录 <small class="display-block">请输入您的身份信息</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" name="username" ng-model="username" placeholder="用户名" required>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" name="password" ng-model="password" placeholder="密码" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="button" ng-click="save()" ng-disabled="userLoginForm.username.$invalid ||userLoginForm.password.$invalid" class="btn btn-primary btn-block">登录 <i class="icon-circle-right2 position-right"></i></button>
							</div>

						</div>
					</ng-form>
				</div>
				<!-- Footer -->
                <?php $_smarty_tpl->_subTemplateRender("file:../public/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <!-- /footer -->
            </div>
        </div>
    </div>
    <!-- /page container -->
<!-- Footer -->
<?php $_smarty_tpl->_subTemplateRender("file:../public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- /footer -->

<?php }
}
