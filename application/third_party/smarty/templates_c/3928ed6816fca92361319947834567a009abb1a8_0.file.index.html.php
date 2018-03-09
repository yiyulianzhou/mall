<?php
/* Smarty version 3.1.30, created on 2018-02-08 07:29:31
  from "D:\wamp64\www\mall_manage\application\views\goods\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a7bfc5b1d0087_92808635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3928ed6816fca92361319947834567a009abb1a8' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\goods\\index.html',
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
function content_5a7bfc5b1d0087_92808635 (Smarty_Internal_Template $_smarty_tpl) {
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
            <h5 class="panel-title">商品管理<span class="ml10">
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
                  <input type="text" class="form-control" placeholder="商品名称" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
                </div>
                <div class="col-md-2 col-sm-6 m-ss">
                  <select name="categoryId" class="form-control">
                    <option value="-1"<?php if ($_smarty_tpl->tpl_vars['categoryId']->value == -1) {?> selected="selected"<?php }?>>商品分类</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoryList']->value, 'category', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['category']->value) {
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['categoryId']->value == $_smarty_tpl->tpl_vars['key']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                  </select>
                </div>
                <div class="col-md-2 col-sm-6 m-ss">
                  <select name="sales_type" class="form-control">
                    <option value="-1"<?php if ($_smarty_tpl->tpl_vars['sales_type']->value == -1) {?> selected="selected"<?php }?>>销售方式</option>
                    <option value="1"<?php if ($_smarty_tpl->tpl_vars['sales_type']->value == 1) {?> selected="selected"<?php }?>>普通</option>
                    <option value="2"<?php if ($_smarty_tpl->tpl_vars['sales_type']->value == 2) {?> selected="selected"<?php }?>>团购</option>
                  </select>
                </div>
                <div class="col-md-2 col-sm-6 m-ss">
                  <select name="orderBy" class="form-control">
                    <option value="-1"<?php if ($_smarty_tpl->tpl_vars['orderBy']->value == -1) {?> selected="selected"<?php }?>>排序</option>
                    <option value="1"<?php if ($_smarty_tpl->tpl_vars['orderBy']->value == 1) {?> selected="selected"<?php }?>>销量从高到低</option>
                    <option value="2"<?php if ($_smarty_tpl->tpl_vars['orderBy']->value == 2) {?> selected="selected"<?php }?>>销量从低到高</option>
                    <option value="3"<?php if ($_smarty_tpl->tpl_vars['orderBy']->value == 3) {?> selected="selected"<?php }?>>活跃从高到低</option>
                    <option value="4"<?php if ($_smarty_tpl->tpl_vars['orderBy']->value == 4) {?> selected="selected"<?php }?>>活跃从低到高</option>
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
                <th>商品名称</th>
                <th>商品图片</th>
                <th>商品分类</th>
                <th>销售方式</th>
                <th>产地直销</th>
                <th>物流方式</th>
                <th>运费/配送范围</th>
                <th>状态</th>
                <?php if (isset($_smarty_tpl->tpl_vars['permission_tree']->value['detail']) || isset($_smarty_tpl->tpl_vars['permission_tree']->value['verify']) || isset($_smarty_tpl->tpl_vars['permission_tree']->value['nosales'])) {?>
                <th class="text-center">操作</th>
                <?php }?>
              </tr>
            </thead>
            <tbody><!-- danger -->
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['goodsList']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
              <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
                <td> <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['common']['upload_images'];
echo $_smarty_tpl->tpl_vars['v']->value['img'];?>
" style="width:60px;height:60px;"></td>
                <td><?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->tpl_vars['v']->value['category']];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['sales_type'] == '1' ? '普通' : '团购';?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['direct_sales'] == '1' ? '是' : '否';?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['logistics'] == '1' ? '第三方快递' : '卖家送货上门';?>
</td>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['logistics'] == '2') {?>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['ship_cost'] == '0' ? '1公里内' : ($_smarty_tpl->tpl_vars['v']->value['ship_cost'] == '1' ? '2公里内' : ($_smarty_tpl->tpl_vars['v']->value['ship_cost'] == '2' ? '3公里内' : '距离不限'));?>
</td>
                <?php } else { ?>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['ship_cost'];?>
</td>
                <?php }?>
                <td><?php echo $_smarty_tpl->tpl_vars['goodsState']->value[$_smarty_tpl->tpl_vars['v']->value['state']];?>
</td>
                <?php if (isset($_smarty_tpl->tpl_vars['permission_tree']->value['detail']) || isset($_smarty_tpl->tpl_vars['permission_tree']->value['verify']) || isset($_smarty_tpl->tpl_vars['permission_tree']->value['nosales'])) {?>
                <td class="text-center">
                  <ul class="icons-list">
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-menu9"></i> </a>
                      <ul class="dropdown-menu dropdown-menu-right mnw100">
                        <?php if (isset($_smarty_tpl->tpl_vars['permission_tree']->value['verify']) && $_smarty_tpl->tpl_vars['v']->value['state'] == '1') {?>
                        <li><a href='<?php echo site_url("goods/detail?id=".((string)$_smarty_tpl->tpl_vars['v']->value['id']));?>
&per_page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&categoryId=<?php echo $_smarty_tpl->tpl_vars['categoryId']->value;?>
&sales_type=<?php echo $_smarty_tpl->tpl_vars['sales_type']->value;?>
&orderBy=<?php echo $_smarty_tpl->tpl_vars['orderBy']->value;?>
&name=<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
&type=1' ><i class="icon-compose"></i> 商品审核</a> 
                        </li>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['permission_tree']->value['detail'])) {?>
                        <li>
                          <a href='<?php echo site_url("goods/detail?id=".((string)$_smarty_tpl->tpl_vars['v']->value['id'])."&per_page=".((string)$_smarty_tpl->tpl_vars['page']->value));?>
&categoryId=<?php echo $_smarty_tpl->tpl_vars['categoryId']->value;?>
&sales_type=<?php echo $_smarty_tpl->tpl_vars['sales_type']->value;?>
&orderBy=<?php echo $_smarty_tpl->tpl_vars['orderBy']->value;?>
&name=<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
&type=2'><i class="icon-inbox"></i> 商品详情</a>
                        </li>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['permission_tree']->value['nosales']) && $_smarty_tpl->tpl_vars['v']->value['state'] == '5') {?>
                        <li>
                          <a href='<?php echo site_url("goods/nosales?id=".((string)$_smarty_tpl->tpl_vars['v']->value['id'])."&state=".((string)$_smarty_tpl->tpl_vars['v']->value['state']));?>
&categoryId=<?php echo $_smarty_tpl->tpl_vars['categoryId']->value;?>
&sales_type=<?php echo $_smarty_tpl->tpl_vars['sales_type']->value;?>
&per_page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&orderBy=<?php echo $_smarty_tpl->tpl_vars['orderBy']->value;?>
&name=<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
'><i class="icon-inbox"></i> 商品下架</a>
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
