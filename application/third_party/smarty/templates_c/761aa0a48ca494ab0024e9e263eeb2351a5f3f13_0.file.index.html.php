<?php
/* Smarty version 3.1.30, created on 2018-02-08 07:29:32
  from "D:\wamp64\www\mall_manage\application\views\buyer\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a7bfc5ce8e297_17887592',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '761aa0a48ca494ab0024e9e263eeb2351a5f3f13' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\buyer\\index.html',
      1 => 1517981988,
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
function content_5a7bfc5ce8e297_17887592 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- /main navbar --> 
<!-- Page container -->
<div class="page-container"> 
  
  <!-- Page content -->
  <div class="page-content"> 
      <?php $_smarty_tpl->_subTemplateRender("file:../public/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="content-wrapper">
      <!-- Content area -->
      <div class="content">
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h5 class="panel-title">买家管理<span class="ml10">
              <input name="" type="button"  value="<?php echo $_smarty_tpl->tpl_vars['searchbtn']->value;?>
"  class="btn btn-xs bg-grey-100 text-xg flitbtn" id="searchbtn" onclick="btn()" >
              </span></h5>
            <!--<div class="heading-elements"><a href="#adduser" class="btn btn-primary" data-toggle="modal" data-target="#adduser"><i class="icon-plus-circle2"></i> 新增用户</a></div>-->
            <div class="heading-elements"></div>
          </div>
          <form action="" method="GET" class="form-container">
            <div class="panel-body br-t pt20" id="searchbox" style="<?php echo $_smarty_tpl->tpl_vars['searchbox']->value;?>
">
              <div class="row">
                <div class="col-md-2 col-sm-4 m-ss">
                  <input type="text" class="form-control" placeholder="用户名" name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">
                </div>
                <div class="col-md-1 col-sm-4 m-ss">
                  <select name="status" class="form-control">
                    <option value="-1"<?php if ($_smarty_tpl->tpl_vars['status']->value == -1) {?> selected="selected"<?php }?>>状态</option>
                    <option value="0"<?php if ($_smarty_tpl->tpl_vars['status']->value == 0) {?> selected="selected"<?php }?>>正常</option>
                    <option value="2"<?php if ($_smarty_tpl->tpl_vars['status']->value == 2) {?> selected="selected"<?php }?>>禁言</option>
                  </select>
                </div>
                <div class="col-md-1 m-ss">
                  <input type="submit" class=" btn btn-block bg-grey-300" value="筛选">
                </div>
              </div>
            </div>
          </form>
          <table class="table datatable-basic table-hover">
            <thead class="bg-grey-100">
              <tr>
                <th>昵称</th>
                <th>头像</th>
                <th>手机</th>
                <th>邮箱</th>
                <th>性别</th>
                <th>状态</th>
                <?php if (isset($_smarty_tpl->tpl_vars['permission_tree']->value['detail']) || isset($_smarty_tpl->tpl_vars['permission_tree']->value['lock'])) {?>
                <th class="text-center">操作</th>
                <?php }?>
              </tr>
            </thead>
            <tbody><!-- danger -->
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['buyerList']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
              <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</td>
                <td> <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['avatarUrl'];?>
" style="width:60px;height:60px;"></td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['phone'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['email'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['gender'] == '1' ? '男' : ($_smarty_tpl->tpl_vars['v']->value['gender'] == '2' ? '女' : '未知');?>
</td>
                <td><span class="label label-<?php echo $_smarty_tpl->tpl_vars['v']->value['status'] == '0' ? 'success' : 'danger';?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['status'] == '0' ? '正常' : '禁言';?>
</span></td>
                <?php if (isset($_smarty_tpl->tpl_vars['permission_tree']->value['detail']) || isset($_smarty_tpl->tpl_vars['permission_tree']->value['lock'])) {?>
                <td class="text-center">
                  <ul class="icons-list">
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-menu9"></i> </a>
                      <ul class="dropdown-menu dropdown-menu-right mnw100">
                        <?php if (isset($_smarty_tpl->tpl_vars['permission_tree']->value['lock'])) {?>
                        <li><a href='<?php echo site_url("buyer/lock?id=".((string)$_smarty_tpl->tpl_vars['v']->value['id'])."&username=".((string)$_smarty_tpl->tpl_vars['username']->value)."&status=".((string)$_smarty_tpl->tpl_vars['v']->value['status']));?>
&per_page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
' ><i class="icon-compose"></i> <?php echo $_smarty_tpl->tpl_vars['v']->value['status'] == '0' ? '禁言' : '解禁';?>
</a> 
                        </li>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['permission_tree']->value['detail'])) {?>
                        <li>
                          <a href='<?php echo site_url("buyer/detail?id=".((string)$_smarty_tpl->tpl_vars['v']->value['id'])."&per_page=".((string)$_smarty_tpl->tpl_vars['page']->value)."&username=".((string)$_smarty_tpl->tpl_vars['username']->value)."&status=".((string)$_smarty_tpl->tpl_vars['v']->value['status']));?>
'><i class="icon-inbox"></i> 详情</a>
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
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </tbody>
          </table>
          <?php $_smarty_tpl->_subTemplateRender("file:../public/pager.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>
        
        <?php $_smarty_tpl->_subTemplateRender("file:../public/footer_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        
      </div>
      <!-- /content area --> 
      
    </div>
    <!-- /main content --> 
    
  </div>
  <!-- /page content --> 
  
</div>
</div>
<!-- /page container --> 
<!-- /page JS files -->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/pages/modals_option.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/forms/styling/uniform.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/forms/styling/switch.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
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
?>

<?php }
}
