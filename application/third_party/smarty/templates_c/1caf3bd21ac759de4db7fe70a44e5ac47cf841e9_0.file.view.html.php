<?php
/* Smarty version 3.1.30, created on 2018-01-31 11:29:52
  from "D:\wamp64\www\mall_manage\application\views\bulletin\view.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a71a8b08fd2d6_62806912',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1caf3bd21ac759de4db7fe70a44e5ac47cf841e9' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\bulletin\\view.html',
      1 => 1517372559,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/left.html' => 1,
    'file:../public/footer_page.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5a71a8b08fd2d6_62806912 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!-- Page container -->
<div class="page-container">

	<!-- Page content -->
	<div class="page-content">

		<?php $_smarty_tpl->_subTemplateRender("file:../public/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <!-- Main content -->
            <div class="content-wrapper">    
                <!-- Content area -->
                <div class="content">                       
					<div class="panel panel-flat">
						<div class="panel-heading pv10 mb20 br-b">
						  <h5 class="panel-title">公告详情</h5>
						</div>
						<div class="panel-body">
							<div class=" form-group">
								<label class="col-sm-2 control-label">标题:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>
">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">内容:</label>
								<div class="col-sm-10">
									<textarea class="form-control" style="height:300px;" name="content"><?php echo $_smarty_tpl->tpl_vars['info']->value['content'];?>
</textarea>
								</div>
							</div>	
							<div class="form-group">
								<label class="col-sm-2 control-label">通知用户</label>
								<div class="col-sm-10">
									<?php if ($_smarty_tpl->tpl_vars['info']->value['type'] == 1) {?><input type="text" class="form-control" value="全部"><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['info']->value['type'] == 2) {?><input type="text" class="form-control" value="买家"><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['info']->value['type'] == 3) {?><input type="text" class="form-control" value="卖家"><?php }?>
								</div>
							</div>
							<div class="text-right" style="text-align: center !important;">
								<a href='<?php echo site_url("bulletin/index");?>
' class="btn btn-primary" style="margin-top:20px;">返回</a>
							</div>
						</div>
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
