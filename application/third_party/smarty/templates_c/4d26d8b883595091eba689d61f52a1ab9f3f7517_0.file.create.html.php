<?php
/* Smarty version 3.1.30, created on 2018-02-01 09:36:04
  from "D:\wamp64\www\mall_manage\application\views\bulletin\create.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a72df849eba18_88222701',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d26d8b883595091eba689d61f52a1ab9f3f7517' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\bulletin\\create.html',
      1 => 1517297828,
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
function content_5a72df849eba18_88222701 (Smarty_Internal_Template $_smarty_tpl) {
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
					<form class="form-horizontal" method="post" action='<?php echo site_url("bulletin/create");?>
'>
						<div class="panel panel-flat">
							<div class="panel-heading pv10 mb20 br-b">
							  <h5 class="panel-title">新增公告</h5>
							</div>
							<div class="panel-body">
								<div class=" form-group">
									<label class="col-sm-2 control-label">标题:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="title">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">内容:</label>
									<div class="col-sm-10">
										<textarea class="form-control" style="height:300px;" name="content"></textarea>
									</div>
								</div>	
								<div class="form-group">
									<label class="col-sm-2 control-label">通知用户</label>
									<div class="col-sm-10">
										<select name="type" class="form-control">
											<option value="1">全部</option>
											<option value="2">买家</option>
											<option value="3">卖家</option>
										</select>
									  </div>
								</div>
								<div class="text-right" style="text-align: center !important">
									<button type="submit" class="btn btn-primary stepy-finish">提交</button>
								</div>
							</div>
						</div>
					</form>
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
