<?php
/* Smarty version 3.1.30, created on 2018-03-07 18:34:33
  from "D:\wamp64\www\mall_manage\application\views\order\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9fc03949f603_36797605',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65b72f959fe74de066b2867c4de1a83540d4792a' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\order\\index.html',
      1 => 1520418870,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/left.html' => 1,
    'file:../public/breadcrumb.html' => 1,
    'file:../public/page.html' => 1,
    'file:order/info.html' => 1,
    'file:../public/footer_page.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5a9fc03949f603_36797605 (Smarty_Internal_Template $_smarty_tpl) {
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

      <?php $_smarty_tpl->_subTemplateRender("file:../public/breadcrumb.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      <!-- Content area -->
      <div class="content" ng-controller="appCtrl">
        <div class="row">
            <div class="col-md-12">
              <div class="panel panel-info col-md-12">

                <div class="panel-heading" >
                  <div class="panel-title row">
                    <div class="col-md-1 col-sm-4 m-ss">订单统计</div>
                    <div class="col-md-2 pt10">
                      <button  ng-click="getSalesList('day')" ng-class="day ? 'btn btn-success' : 'btn'">今日</button>
                      <button  ng-click="getSalesList('week')" ng-class="week ? 'btn btn-success' : 'btn'">本周</button>
                      <button  ng-click="getSalesList('month')" ng-class="month ? 'btn btn-success' : 'btn'">本月</button>
                    </div>
                    <div class="col-md-1 col-sm-4 m-ss">指定日期</div>
                    <div class="col-md-2 col-sm-4 m-ss" >
                      <div class="input-group" style="color:#666"> <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                        <input type="text" name="s_start_time" ng-model="s_start_time" class="form-control pickadate"  placeholder="请选择开始时间">
                      </div>
                    </div>
                    <div class="col-sm-2 m-ss">
                      <div class="input-group" style="color:#666"> <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                        <input type="text" name="s_end_time" ng-model="s_end_time" class="form-control pickadate"  placeholder="请选择结束时间">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <select name="s_order_cate" ng-model="s_order_cate" class="form-control">
                        <option value="">请选择分类...</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['common']['category'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                      </select>
                    </div>
                    <div class="col-md-2">
                      <button class="btn btn-success" ng-click="searchAction()">筛选</button>
                    </div>
                  </div>

                </div>
                <div class="panel-body br-t" >
                  <div class="chart-container">
                    <div class="chart has-fixed-height" id="stacked_lines"></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-flat">
              <div class="panel-heading">
                <div class="row">
                  <button  class='col-md-2 ml10' ng-click="filterList('all')" ng-class="all ? 'btn btn-success' : 'btn'">全部</button>
                  <button  class='col-md-2 ml20' ng-click="filterList('toSend')" ng-class="toSend ? 'btn btn-success' : 'btn'">待发货</button>
                  <button  class='col-md-2 ml20' ng-click="filterList('toReceive')" ng-class="toReceive ? 'btn btn-success' : 'btn'">待收货</button>
                  <button  class='col-md-2 ml20' ng-click="filterList('done')" ng-class="done ? 'btn btn-success' : 'btn'">已完成</button>
                </div>
              </div>
              <div class="panel-body">
                <table class="table datatable datatable-basic table-hover">
                  <thead class="bg-grey-100">
                  <tr>
                    <th>订单号</th>
                    <th>商品名</th>
                    <th>规格</th>
                    <th>订单总价</th>
                    <th>所属商铺</th>
                    <th>买家</th>
                    <th>下单时间</th>
                    <th>发货时间</th>
                    <th>配送</th>
                    <th>状态</th>
                    <?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['order']['getOrderInfo']) || isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['order']['delete'])) {?>
                    <th class="text-center">操作</th>
                    <?php }?>
                  </tr>
                  </thead>
                  <tbody>
                  <tr ng-repeat="item in alllist track by $index" id="tr_{{item.id}}">
                    <td>{{item.order_id}}</td>
                    <td>{{item.goods_name}}</td>
                    <td>{{item.gname}}</td>
                    <td>{{item.money}}</td>
                    <td>{{item.shop}}</td>
                    <td>{{item.username}}</td>
                    <td>{{item.create_time*1000|date:'yyyy-MM-dd HH:mm'}}</td>
                    <td ng-show="item.send_time ==null"></td>
                    <td ng-show="item.send_time !=null">{{item.send_time*1000|date:'yyyy-MM-dd HH:mm'}}</td>
                    <td>{{item.logi | logisticsDesc}}</td>
                    <td>{{item.status | StateDesc}}</td>
                    <?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['order']['getOrderInfo']) || isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['order']['delete'])) {?>
                    <td class="text-center">
                      <a  href="#info_modal" data-toggle="modal" data-target="#info_modal" ng-click="getData(item.id)"><i class="icon-list2"></i> 详情</a><br>
                    <?php }?>
                  </tr>
                  </tbody>
                </table>
              </div>
              <div class="panel-footer">
                <?php $_smarty_tpl->_subTemplateRender("file:../public/page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

              </div>
            </div>
          </div>
          <?php $_smarty_tpl->_subTemplateRender("file:order/info.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/plugins/visualization/echarts/echarts.js"><?php echo '</script'; ?>
>
<!-- 日期范围选择配置 -->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/pages/picker_date.js"><?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:../public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
