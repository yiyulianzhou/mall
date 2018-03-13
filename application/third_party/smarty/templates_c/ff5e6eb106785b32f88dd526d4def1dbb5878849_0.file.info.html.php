<?php
/* Smarty version 3.1.30, created on 2018-03-13 09:33:58
  from "D:\wamp64\www\mall_manage\application\views\order\info.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa72a86410d40_75797549',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff5e6eb106785b32f88dd526d4def1dbb5878849' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\order\\info.html',
      1 => 1520904828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa72a86410d40_75797549 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="info_modal" class="modal fade">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">订单商品详情</h5>
            </div>
            <form action="#" class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group mn br-b">
                        <table class="table datatable table-hover">
                            <thead class="bg-grey-100">
                                <th>商品：</th>
                                <th>规格：</th>
                                <th>购买数量：</th>
                                <th>单价：</th>
                                <th>小计：</th>
                            </thead>
                            <tbody class="bg-grey-50">
                                <tr ng-repeat="item in orderDetail track by $index">
                                   <td>{{item.goods_name}}</td>
                                   <td>{{item.gname}}</td>
                                   <td>{{item.ogamout}}</td>
                                   <td>{{item.sales_price}}</td>
                                   <td>{{item.ogmoney}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">订单总价：</label>
                        <div class="col-sm-offset-7 col-sm-2 form-control-static">{{fullData.money}}元</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">订单号：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.order_id}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">红包：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.red_bag}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">优惠价格：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.money_other}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">收货人：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.receiver}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">电话：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.phone}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">收货地址：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.address}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">所属商铺：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.shop}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">买家：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.username}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">下单时间：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.create_time*1000|date:'yyyy-MM-dd HH:mm'}}</div>
                    </div>
                    <div class="form-group mn br-b" ng-if="fullData.send_time ==null">
                        <label class="control-label col-sm-3">发货时间：</label>
                        <div class="col-sm-9 form-control-static"></div>
                    </div>
                    <div class="form-group mn br-b" ng-if="fullData.send_time !=null">
                        <label class="control-label col-sm-3">发货时间：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.send_time*1000|date:'yyyy-MM-dd HH:mm'}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">配送方式：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.logi | logisticsDesc}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">运费：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.cont}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">订单状态：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.status | StateDesc}}</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">返回</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }
}
