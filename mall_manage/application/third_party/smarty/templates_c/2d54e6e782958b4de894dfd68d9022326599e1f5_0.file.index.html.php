<?php
/* Smarty version 3.1.30, created on 2018-03-09 09:49:04
  from "D:\wamp64\www\mall_manage\application\views\user\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa1e810055f75_48242732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d54e6e782958b4de894dfd68d9022326599e1f5' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\user\\index.html',
      1 => 1520560137,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/left.html' => 1,
    'file:../public/pager.html' => 1,
    'file:../public/footer_page.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5aa1e810055f75_48242732 (Smarty_Internal_Template $_smarty_tpl) {
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
					<div class="panel-heading">
						<h5 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['data']->value['base']['module_name'];?>
管理
							<span class="ml10">
								<input type="button" value="<?php echo $_smarty_tpl->tpl_vars['searchbtn']->value;?>
" class="btn btn-xs bg-grey-100 text-xg flitbtn" id="searchbtn" onclick="btn()">
							</span>
						</h5>
						<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user']['create'])) {?>
						<div class="heading-elements">
							<a href='<?php echo site_url("user/create");?>
' class="btn btn-primary"><i class="icon-plus-circle2"></i> 新增<?php echo $_smarty_tpl->tpl_vars['data']->value['base']['module_name'];?>
</a>
						</div>
						<?php }?>
					</div>					
					<form action="" method="GET" class="form-container">
						<div class="panel-body br-t pt20" id="searchbox" style="<?php echo $_smarty_tpl->tpl_vars['searchbox']->value;?>
">
							<div class="row">
								<div class="col-md-2 col-sm-6 m-ss">
									<input type="text" name="name" class="form-control" placeholder="真名姓名" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
								</div>
								<div class="col-md-2 col-sm-6 m-ss">
									<select name="status" class="form-control">
									<option value="-1"<?php if ($_smarty_tpl->tpl_vars['state']->value == -1) {?> selected="selected"<?php }?>>全部</option>
									<option value="1"<?php if ($_smarty_tpl->tpl_vars['state']->value == 1) {?> selected="selected"<?php }?>>正常</option>
									<option value="0"<?php if ($_smarty_tpl->tpl_vars['state']->value == 0) {?> selected="selected"<?php }?>>禁用</option>
									</select>
								</div>
								<div class="col-md-2 m-ss">
									<input type="submit" class=" btn btn-block bg-grey-300" value="筛选">
								</div>
							</div>
						</div>
					</form>
					<table class="table datatable-basic table-hover">
						<thead class="bg-grey-100">
							<tr>
								<th>用户名</th>
								<th>真实姓名</th>
								<?php if ($_smarty_tpl->tpl_vars['data']->value['base']['admin'] == 1) {?><th>创建者</th><?php }?>
								<th style="margin-left:20px;">创建时间</th>
								<th class="text-center">状态</th>
								<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user']['edit']) || isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user']['lock'])) {?>
								<th class="text-center">操作</th>
								<?php }?>
							</tr>
						</thead>
						<tbody>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['item']->value['realname'];?>
</td>
								<?php if ($_smarty_tpl->tpl_vars['data']->value['base']['admin'] == 1) {?><td><?php echo $_smarty_tpl->tpl_vars['item']->value['parent_admin'];?>
</td><?php }?>
								<td><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['item']->value['create_time']);?>
</td>
								<?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 0) {?>
								<td class="text-center"><span class="label label-danger">禁用</span></td>
								<?php } else { ?>
								<td class="text-center"><span class="label label-info">正常</span></td>
								<?php }?>

								<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user']['edit']) || isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user']['lock'])) {?>
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown"> 
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-menu9"></i> </a>
											<ul class="dropdown-menu dropdown-menu-right mnw100">
												<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user']['edit'])) {?>
												<li>
													<a href='<?php echo site_url("user/edit?id=".((string)$_smarty_tpl->tpl_vars['item']->value['id'])."&name=".((string)$_smarty_tpl->tpl_vars['name']->value)."&state=".((string)$_smarty_tpl->tpl_vars['state']->value)."&page=".((string)$_smarty_tpl->tpl_vars['page']->value));?>
'>
														<i class="icon-compose"></i> 编辑
													</a>
												</li>
												<?php }?>

												<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user']['lock'])) {?>
												<li>
													<?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 1) {?>
													<a href='<?php echo site_url("user/lock?id=".((string)$_smarty_tpl->tpl_vars['item']->value['id'])."&name=".((string)$_smarty_tpl->tpl_vars['name']->value)."&state=".((string)$_smarty_tpl->tpl_vars['state']->value)."&page=".((string)$_smarty_tpl->tpl_vars['page']->value)."&lock=0");?>
'>
														<i class="icon-pause2"></i> 禁用
													</a>
													<?php } else { ?>
													<a href='<?php echo site_url("user/lock?id=".((string)$_smarty_tpl->tpl_vars['item']->value['id'])."&name=".((string)$_smarty_tpl->tpl_vars['name']->value)."&state=".((string)$_smarty_tpl->tpl_vars['state']->value)."&page=".((string)$_smarty_tpl->tpl_vars['page']->value)."&lock=1");?>
'>
														<i class="icon-pause2"></i> 解禁
													</a>
													<?php }?>
												</li>
												<?php }?>
											</ul>
										</li>
									</ul>
								</td>
								<?php }?>
							</tr>
							<?php
}
} else {
?>

                            <tr style="text-align:center;">
                                <?php if ($_smarty_tpl->tpl_vars['data']->value['base']['admin'] == 1) {?>								
								<td colspan="6">暂无数据</td>
								<?php } else { ?>
								<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user']['edit']) || isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['user']['lock'])) {?>
								<td colspan="5">暂无数据</td>
								<?php } else { ?>
								<td colspan="4">暂无数据</td>
								<?php }?>
								<?php }?>
                            </tr>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</tbody>
					</table>
					<?php $_smarty_tpl->_subTemplateRender("file:../public/pager.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				</div>

				<div class="row">
					<?php $_smarty_tpl->_subTemplateRender("file:../public/footer_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/forms/selects/bootstrap_multiselect.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/ui/moment/moment.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/pickers/daterangepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/forms/selects/select2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/pages/modals_option.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/pages/form_select.js"><?php echo '</script'; ?>
> 
<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/minified/components.css" rel="stylesheet" type="text/css">
<?php echo '<script'; ?>
>
var btn1=document.getElementById('searchbtn');
var box1=document.getElementById('searchbox');
function btn(){ 
	if(btn1.value=="筛选 －"){
		box1.style.display='none';
		btn1.value="筛选 ＋";
	}else{
		box1.style.display='';
		btn1.value="筛选 －";
	}
}
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:../public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
