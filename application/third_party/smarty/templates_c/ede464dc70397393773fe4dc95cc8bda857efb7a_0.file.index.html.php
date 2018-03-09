<?php
/* Smarty version 3.1.30, created on 2018-02-08 07:29:35
  from "D:\wamp64\www\mall_manage\application\views\seller\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a7bfc5f01b673_60299829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ede464dc70397393773fe4dc95cc8bda857efb7a' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\seller\\index.html',
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
function content_5a7bfc5f01b673_60299829 (Smarty_Internal_Template $_smarty_tpl) {
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
            <h5 class="panel-title">卖家管理<span class="ml10">
              <input name="" type="button"  value="<?php echo $_smarty_tpl->tpl_vars['searchbtn']->value;?>
"  class="btn btn-xs bg-grey-100 text-xg flitbtn" id="searchbtn" onclick="btn()" >
              </span></h5>
            <div class="heading-elements"></div>
          </div>
          <form action="" method="GET" class="form-container">
            <div class="panel-body br-t pt20" id="searchbox" style="<?php echo $_smarty_tpl->tpl_vars['searchbox']->value;?>
">
              <div class="row">
                <div class="col-md-2 col-sm-4 m-ss">
                  <input type="text" class="form-control" placeholder="店铺名称" name="shop" value="<?php echo $_smarty_tpl->tpl_vars['shop']->value;?>
">
                </div><div class="col-md-2 col-sm-4 m-ss">
                  <input type="text" class="form-control" placeholder="店铺小区" name="title" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
">
                </div>
                <div class="col-md-1 col-sm-4 m-ss">
                  <select name="lock" class="form-control">
                    <option value="-1"<?php if ($_smarty_tpl->tpl_vars['lock']->value == -1) {?> selected="selected"<?php }?>>状态</option>
                    <option value="0"<?php if ($_smarty_tpl->tpl_vars['lock']->value == 0) {?> selected="selected"<?php }?>>正常</option>
                    <option value="1"<?php if ($_smarty_tpl->tpl_vars['lock']->value == 1) {?> selected="selected"<?php }?>>已封</option>
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
                <th>店铺名称</th>
                <th>店铺小区</th>
                <th>手机</th>
                <th>实名认证</th>
                <th>健康认证</th>
                <th>状态</th>
                <th>创建时间</th>
                <?php if (isset($_smarty_tpl->tpl_vars['permission_tree']->value['detail']) || isset($_smarty_tpl->tpl_vars['permission_tree']->value['lock'])) {?>
                <th class="text-center">操作</th>
                <?php }?>
              </tr>
            </thead>
            <tbody><!-- danger -->
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sellerList']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
              <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['shop'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['phone'];?>
</td>
                <td>
                  <span class="<?php echo $_smarty_tpl->tpl_vars['v']->value['is_real'] == '0' ? '' : ($_smarty_tpl->tpl_vars['v']->value['is_real'] == '1' ? 'label-success' : ($_smarty_tpl->tpl_vars['v']->value['is_real'] == '2' ? 'label-info' : 'label-danger'));?>
"<?php if ($_smarty_tpl->tpl_vars['v']->value['is_real'] !== '0') {?> style="color:white;" <?php }?> ><?php echo $_smarty_tpl->tpl_vars['v']->value['is_real'] == '0' ? '未认证' : ($_smarty_tpl->tpl_vars['v']->value['is_real'] == '1' ? '审核通过' : ($_smarty_tpl->tpl_vars['v']->value['is_real'] == '2' ? '待审核' : '未通过'));?>

                  </span>
                </td>
                <td>
                  <span class="<?php echo $_smarty_tpl->tpl_vars['v']->value['is_health'] == '0' ? '' : ($_smarty_tpl->tpl_vars['v']->value['is_health'] == '1' ? 'label-success' : ($_smarty_tpl->tpl_vars['v']->value['is_health'] == '2' ? 'label-info' : 'label-danger'));?>
"  <?php if ($_smarty_tpl->tpl_vars['v']->value['is_health'] !== '0') {?> style="color:white;" <?php }?> ><?php echo $_smarty_tpl->tpl_vars['v']->value['is_health'] == '0' ? '未认证' : ($_smarty_tpl->tpl_vars['v']->value['is_health'] == '1' ? '审核通过' : ($_smarty_tpl->tpl_vars['v']->value['is_health'] == '2' ? '待审核' : '未通过'));?>

                  </span>
                </td>
                <td>
                  <span class="label label-<?php echo $_smarty_tpl->tpl_vars['v']->value['lock'] == '0' ? 'success' : 'danger';?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['lock'] == '0' ? '正常' : '已封';?>
</span>
                </td>
                <td><?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['v']->value['create_time']);?>
</td>
                <?php if (isset($_smarty_tpl->tpl_vars['permission_tree']->value['detail']) || isset($_smarty_tpl->tpl_vars['permission_tree']->value['lock'])) {?>
                <td class="text-center"><ul class="icons-list">
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-menu9"></i> </a>
                      <ul class="dropdown-menu dropdown-menu-right mnw100">
                        <?php if (isset($_smarty_tpl->tpl_vars['permission_tree']->value['lock'])) {?>
                        <li><a href='<?php echo site_url("seller/lock?id=".((string)$_smarty_tpl->tpl_vars['v']->value['id'])."&shop=".((string)$_smarty_tpl->tpl_vars['shop']->value)."&title=".((string)$_smarty_tpl->tpl_vars['title']->value)."&lock=".((string)$_smarty_tpl->tpl_vars['v']->value['lock']));?>
&per_page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
' ><i class="icon-compose"></i> <?php echo $_smarty_tpl->tpl_vars['v']->value['lock'] == '0' ? '封禁' : '解封';?>
</a> 
                        </li>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['permission_tree']->value['detail']) && ($_smarty_tpl->tpl_vars['v']->value['is_real'] == '2' || $_smarty_tpl->tpl_vars['v']->value['is_health'] == '2')) {?>
                        <li>
                          <a href='<?php echo site_url("seller/detail?id=".((string)$_smarty_tpl->tpl_vars['v']->value['id'])."&per_page=".((string)$_smarty_tpl->tpl_vars['page']->value)."&shop=".((string)$_smarty_tpl->tpl_vars['shop']->value)."&title=".((string)$_smarty_tpl->tpl_vars['title']->value)."&lock=".((string)$_smarty_tpl->tpl_vars['lock']->value));?>
'><i class="icon-inbox"></i> 审核</a>
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
