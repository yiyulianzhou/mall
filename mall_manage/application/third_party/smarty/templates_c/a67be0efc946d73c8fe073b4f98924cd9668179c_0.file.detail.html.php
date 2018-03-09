<?php
/* Smarty version 3.1.30, created on 2018-03-02 18:25:51
  from "D:\wamp64\www\mall_manage\application\views\seller\detail.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9926afe9f782_28681863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a67be0efc946d73c8fe073b4f98924cd9668179c' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\seller\\detail.html',
      1 => 1517981988,
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
function content_5a9926afe9f782_28681863 (Smarty_Internal_Template $_smarty_tpl) {
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
              <?php echo form_open('seller/verify');?>

              <div class="panel panel-flat">
                <div class="panel-heading pv10 mb20 br-b">
                  <h5 class="panel-title">卖家信息</h5>
                  </div>
                <div class="panel-body">
                  <input name="id" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['id'];?>
"  style="display:none" >
                  <input name="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"  style="display:none" >
                  <input name="shop" value="<?php echo $_smarty_tpl->tpl_vars['shop']->value;?>
"  style="display:none" >
                  <input name="title" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
"  style="display:none" >
                  <input name="lock" value="<?php echo $_smarty_tpl->tpl_vars['lock']->value;?>
"  style="display:none" >
                  <div class=" form-group">
                    <label class="col-sm-2 control-label">店铺名称:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['shop'];?>
">
                    </div>
                  </div>
                  <div class=" form-group">
                    <label class="col-sm-2 control-label">店铺小区:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['title'];?>
">
                    </div>
                  </div>
                  <div class=" form-group">
                    <label class="col-sm-2 control-label">店铺地址:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['address'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">头像:</label>
                    <div class="col-sm-10">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['detail']->value['pic'];?>
" alt="图片链接已失效" onerror="this.style.display='none'" style="width:60px;height:60px;">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">背景图:</label>
                    <div class="col-sm-10">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['detail']->value['bg_img'];?>
" alt="图片链接已失效" onerror="this.style.display='none'" style="width:60px;height:60px;">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">真实姓名:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly" placeholder="暂无数据" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['name'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">联系电话:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly" placeholder="暂无数据" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['phone'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">正面:</label>
                    <div class="col-sm-10">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['common']['upload_images'];
echo $_smarty_tpl->tpl_vars['detail']->value['img1'];?>
" alt="图片链接已失效" onerror="this.style.display='none'" style="width:60px;height:60px;">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">反面:</label>
                    <div class="col-sm-10">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['common']['upload_images'];
echo $_smarty_tpl->tpl_vars['detail']->value['img2'];?>
" alt="图片链接已失效" onerror="this.style.display='none'" style="width:60px;height:60px;">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">健康证照片:</label>
                    <div class="col-sm-10">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['common']['upload_images'];
echo $_smarty_tpl->tpl_vars['detail']->value['img3'];?>
" alt="图片链接已失效" onerror="this.style.display='none'" style="width:60px;height:60px;">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">实名认证状态:</label>
                    <div class=" col-sm-4 ">
                      <select name="is_real" class="form-control" <?php if ($_smarty_tpl->tpl_vars['detail']->value['is_real'] !== '2') {?>  disabled="disabled" <?php }?>>
                        <option value="0"<?php if ($_smarty_tpl->tpl_vars['detail']->value['is_real'] == 0) {?> selected="selected"<?php }?>>未认证</option>
                        <option value="1"<?php if ($_smarty_tpl->tpl_vars['detail']->value['is_real'] == 1) {?> selected="selected"<?php }?>>通过</option>
                        <option value="2"<?php if ($_smarty_tpl->tpl_vars['detail']->value['is_real'] == 2) {?> selected="selected"<?php }?>>待审核</option>
                        <option value="3"<?php if ($_smarty_tpl->tpl_vars['detail']->value['is_real'] == 3) {?> selected="selected"<?php }?>>不通过</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">健康证状态:</label>
                    <div class=" col-sm-4 ">
                      <select name="is_health" class="form-control" <?php if ($_smarty_tpl->tpl_vars['detail']->value['is_health'] !== '2') {?>  disabled="disabled" <?php }?>>
                        <option value="0"<?php if ($_smarty_tpl->tpl_vars['detail']->value['is_health'] == 0) {?> selected="selected"<?php }?>>未认证</option>
                        <option value="1"<?php if ($_smarty_tpl->tpl_vars['detail']->value['is_health'] == 1) {?> selected="selected"<?php }?>>通过</option>
                        <option value="2"<?php if ($_smarty_tpl->tpl_vars['detail']->value['is_health'] == 2) {?> selected="selected"<?php }?>>待审核</option>
                        <option value="3"<?php if ($_smarty_tpl->tpl_vars['detail']->value['is_health'] == 3) {?> selected="selected"<?php }?>>不通过</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">账户余额:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['money'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">未出货订单:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['money1'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">出货待打款:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['money2'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">已体现金额:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['money3'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">状态:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['lock'] == '0' ? '正常' : '已封';?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">创建时间:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly" placeholder="" value="<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['detail']->value['create_time']);?>
">
                    </div>
                  </div>
                  <div class="text-right" style="text-align: center !important">
                    <button class="btn btn-primary" type="submit" style="color: white;">提交</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p class="btn btn-primary"><a href='<?php echo site_url("seller/index?per_page=".((string)$_smarty_tpl->tpl_vars['page']->value)."&shop=".((string)$_smarty_tpl->tpl_vars['shop']->value)."&title=".((string)$_smarty_tpl->tpl_vars['title']->value)."&lock=".((string)$_smarty_tpl->tpl_vars['lock']->value));?>
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
