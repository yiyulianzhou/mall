<?php
/* Smarty version 3.1.30, created on 2018-03-09 13:45:13
  from "D:\wamp64\www\mall_manage\application\views\bulletin\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa21f69879911_87858862',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0c76d54c3c45fc73d84e03c0af83b578b0ccddb' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\bulletin\\index.html',
      1 => 1520574308,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/left.html' => 1,
    'file:../public/breadcrumb.html' => 1,
    'file:../public/pager.html' => 1,
    'file:../public/footer_page.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5aa21f69879911_87858862 (Smarty_Internal_Template $_smarty_tpl) {
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

			<?php $_smarty_tpl->_subTemplateRender("file:../public/breadcrumb.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


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
							<a href='<?php echo site_url("bulletin/create");?>
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
									<input type="text" name="name" class="form-control" placeholder="标题" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
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
								<th>编号</th>
								<th>标题</th>
								<th>创建者</th>
								<th style="margin-left:20px;">创建时间</th>
								<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['bulletin']['view'])) {?>
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
								<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
</td>
								<td><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['item']->value['create_time']);?>
</td>
								<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['bulletin']['view'])) {?>
								<td class="text-center">
									<a href='<?php echo site_url("bulletin/view?id=".((string)$_smarty_tpl->tpl_vars['item']->value['id']));?>
'>详情</a>
								</td>
								<?php }?>
							</tr>
							<?php
}
} else {
?>

                            <tr style="text-align:center;">
								<?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['bulletin']['view'])) {?>
								<td colspan="5">暂无数据</td>
								<?php } else { ?>
								<td colspan="4">暂无数据</td>
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
