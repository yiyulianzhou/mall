<?php
/* Smarty version 3.1.30, created on 2018-01-31 11:29:07
  from "D:\wamp64\www\mall_manage\application\views\order\detail.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a71a883a71f46_00971879',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '661e75435f8f7cd8951f7ec9c7e588948e123cda' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\order\\detail.html',
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
function content_5a71a883a71f46_00971879 (Smarty_Internal_Template $_smarty_tpl) {
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
          <div class="col-md-8 col-md-offset-2"> 
            <form class="form-horizontal">
              <div class="panel panel-flat">
                <div class="panel-heading pv10 mb20 br-b">
                  <h5 class="panel-title">订单详情</h5>
                  </div>
                <div class="panel-body">
                  <input name="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"  style="display:none" >
                  <input name="status" value="<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
"  style="display:none" >
                  <div class=" form-group">
                    <label class="col-sm-2 control-label">订单编号:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['order_id'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">买家:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['buyerName'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">卖家:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['sellerName'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">商品名称:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['goodsName'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">商品规格:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['name'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">数量:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['amount'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">订单总价:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['money'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">其他费用:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['money_other'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">红包:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['money_redbag'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">收货人姓名:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly"  placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['shipName'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">收货人电话:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly"  placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['shipPhone'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">收货地址:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly"  placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['address'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">下单时间:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['detail']->value['create_time']);?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">发货时间:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo empty($_smarty_tpl->tpl_vars['detail']->value['send_time']) ? '' : date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['detail']->value['send_time']);?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">状态:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['orderStatus']->value[$_smarty_tpl->tpl_vars['detail']->value['status']];?>
">
                    </div>
                  </div>
                  <div class="text-right" style="text-align: center !important">
                    <p class="btn btn-primary"><a href='<?php echo site_url("order/index?per_page=".((string)$_smarty_tpl->tpl_vars['page']->value)."&status=".((string)$_smarty_tpl->tpl_vars['status']->value));?>
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
