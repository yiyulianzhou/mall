<?php
/* Smarty version 3.1.30, created on 2018-02-24 13:47:00
  from "D:\wamp64\www\mall_manage\application\views\goods\detail.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a90fc5414dea1_76761439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad6f62e4fbfc2ad0cf062b53993d407a83e4abdf' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\goods\\detail.html',
      1 => 1519451202,
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
function content_5a90fc5414dea1_76761439 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="page-container"> 
  
  <!-- Page content -->
  <div class="page-content"> 
      <?php $_smarty_tpl->_subTemplateRender("file:../public/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="content-wrapper"> 
      <!-- Content area -->
      <div class="content">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 form-horizontal"> 
            <!-- <form class="form-horizontal"> -->
              <?php echo form_open('goods/verify');?>

              <div class="panel panel-flat">
                <div class="panel-heading pv10 mb20 br-b">
                  <h5 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h5>
                  </div>
                <div class="panel-body">
                  <input name="id" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['id'];?>
"  style="display:none" >
                  <input name="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"  style="display:none" >
                  <input name="categoryId" value="<?php echo $_smarty_tpl->tpl_vars['categoryId']->value;?>
"  style="display:none" >
                  <input name="sales_type" value="<?php echo $_smarty_tpl->tpl_vars['sales_type']->value;?>
"  style="display:none" >
                  <input name="orderBy" value="<?php echo $_smarty_tpl->tpl_vars['orderBy']->value;?>
"  style="display:none" >
                  <input name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"  style="display:none" >
                  <div class=" form-group">
                    <label class="col-sm-2 control-label">商品名称:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['name'];?>
">
                    </div>
                  </div>
                  <div class=" form-group">
                    <label class="col-sm-2 control-label">商品图片:</label>
                    <div class="col-sm-10">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['common']['upload_images'];
echo $_smarty_tpl->tpl_vars['detail']->value['img'];?>
" style="width:60px;height:60px;">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">销售方式:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['sales_type'] == '1' ? '普通' : '团购';?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">商品分类:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->tpl_vars['detail']->value['category']];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">商品介绍:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['info'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">是否产地直销:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['direct_sales'] == '1' ? '是' : '否';?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">物流方式:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['logistics'] == '1' ? '第三方快递' : '卖家送货上门';?>
">
                    </div>
                  </div>
                  <?php if ($_smarty_tpl->tpl_vars['detail']->value['logistics'] == '1') {?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">运费:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['ship_cost'];?>
">
                    </div>
                  </div>
                  <?php } else { ?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">配送范围:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['ship_cost'] == '0' ? '1公里内' : ($_smarty_tpl->tpl_vars['detail']->value['ship_cost'] == '1' ? '2公里内' : ($_smarty_tpl->tpl_vars['detail']->value['ship_cost'] == '2' ? '3公里内' : '不限'));?>
">
                    </div>
                  </div>
                  <?php }?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">状态:</label>
                    <?php if ($_smarty_tpl->tpl_vars['type']->value == 2) {?>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly"  placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['goodsStatus']->value[$_smarty_tpl->tpl_vars['detail']->value['state']];?>
">
                    </div>
                    <?php } else { ?>
                    <div class=" col-sm-4 ">
                      <select name="state" class="form-control">
                        <option value="1"<?php if ($_smarty_tpl->tpl_vars['detail']->value['state'] == 1) {?> selected="selected"<?php }?>>待审核</option>
                        <option value="5"<?php if ($_smarty_tpl->tpl_vars['detail']->value['state'] == 5) {?> selected="selected"<?php }?>>通过</option>
                        <option value="3"<?php if ($_smarty_tpl->tpl_vars['detail']->value['state'] == 3) {?> selected="selected"<?php }?>>不通过</option>
                      </select>
                    </div>
                    <?php }?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">申请时间:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['detail']->value['add_time']);?>
">
                    </div>
                  </div>
                  <?php if ($_smarty_tpl->tpl_vars['type']->value == 2) {?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">审核人:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['username'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">申请时间:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['detail']->value['verify_time']);?>
">
                    </div>
                  </div>
                  <?php }?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">审核备注:</label>
                    <div class="col-sm-10">
                    <input type="text" name="verify_remark" <?php if ($_smarty_tpl->tpl_vars['type']->value == '2') {?> readonly="readonly" <?php }?> class="form-control"  placeholder="可填写审核备注" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['verify_remark'];?>
">
                    </div>
                  </div>
                  <div class="text-right" style="text-align: center !important">
                    <?php if ($_smarty_tpl->tpl_vars['type']->value == 1) {?>
                    <button class="btn btn-primary" type="submit" style="color: white;">提交</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php }?>
                    <p class="btn btn-primary"><a href='<?php echo site_url("goods/index");?>
' style="color: white;">返回</a></p>
                  </div>
                </div>
              </div>
            </form>
            <!-- /basic layout --> 
            
          </div>
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
<?php $_smarty_tpl->_subTemplateRender("file:../public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
