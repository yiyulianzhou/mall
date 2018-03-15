<?php
/* Smarty version 3.1.30, created on 2018-03-15 12:47:11
  from "D:\wamp64\www\mall_manage\application\views\seller\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa9facfe94e25_98122135',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ede464dc70397393773fe4dc95cc8bda857efb7a' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\seller\\index.html',
      1 => 1521089156,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/left.html' => 1,
    'file:../public/breadcrumb.html' => 1,
    'file:../public/page.html' => 1,
    'file:seller/info.html' => 1,
    'file:seller/verify.html' => 1,
    'file:../public/footer_page.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5aa9facfe94e25_98122135 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php $_smarty_tpl->_subTemplateRender("file:../public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
            <div class=" col-md-12">
              <div class="panel panel-flat">
                <div class="panel-heading">
                  <h6 class="panel-title">今日数据<span class="pull-right"><?php echo date('Y-m-d');?>
</span></h6>
                </div>
                <div class="container-fluid">
                  <div class="row col-md-offset-2">

                        <div class="col-md-3">
                          <div class="panel bg-teal-400">
                            <div class="panel-body pb20 homgicon-01">
                              <h4 class="no-margin">新增卖家</h4>
                              <h2 class="mv10">{{lists.new_sellers}}人</h2>
                            </div>
                          </div>
                        </div>
                      <div class="col-md-3 col-md-offset-3">
                        <div class="panel bg-pink-400 ">
                          <div class="panel-body pb20 homgicon-02">
                            <h4 class="no-margin">卖家总数</h4>
                            <h2 class="mv10">{{lists.total_sellers}}人</h2>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        <div class="row">
            <div class="col-md-12">
              <div class="panel panel-info col-md-6">

                <div class="panel-heading" >
                  <div class="panel-title row">
                    <div class="col-md-6 pt10">卖家销售统计
                      <button  ng-click="getDateList('day')" ng-class="day ? 'btn btn-success' : 'btn'">今日</button>
                      <button  ng-click="getDateList('week')" ng-class="week ? 'btn btn-success' : 'btn'">本周</button>
                      <button  ng-click="getDateList('month')" ng-class="month ? 'btn btn-success' : 'btn'">本月</button>
                    </div>
                    <div class="col-md-4 col-sm-4 m-ss" >
                      指定日期
                      <div class="input-group" style="color:#666"> <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                        <input type="text" name="s_start_time" ng-model="s_start_time" class="form-control pickadate"  placeholder="请选择开始时间">
                      </div>
                      <div class="input-group" style="color:#666"> <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                        <input type="text" name="s_end_time" ng-model="s_end_time" class="form-control pickadate"  placeholder="请选择结束时间">
                      </div>

                    </div>
                    <div class="col-md-2 pt20">
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
              <div class="panel panel-info col-md-6">
                <div class="panel-heading">
                  <div class="panel-title row">
                    <div class="col-md-6 pt10">
                      卖家订单统计
                      <button  ng-click="getSellerList('day2')" ng-class="day2 ? 'btn btn-success' : 'btn'">今日</button>
                      <button  ng-click="getSellerList('week2')" ng-class="week2 ? 'btn btn-success' : 'btn'">本周</button>
                      <button  ng-click="getSellerList('month2')" ng-class="month2 ? 'btn btn-success' : 'btn'">本月</button>
                    </div>
                    <div class="col-md-4 col-sm-4 m-ss" >
                      指定日期
                      <div class="input-group" style="color:#666"> <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                        <input type="text" name="s_start_time2" ng-model="s_start_time2" class="form-control pickadate"  placeholder="请选择开始时间">
                      </div>
                      <div class="input-group" style="color:#666"> <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                        <input type="text" name="s_end_time2" ng-model="s_end_time2" class="form-control pickadate"  placeholder="请选择结束时间">
                      </div>

                    </div>
                    <div class="col-md-2 pt20">
                      <button class="btn btn-success" ng-click="searchAction2()">筛选</button>
                    </div>
                  </div>

                </div>
                <div class="panel-body br-t" >
                  <div class="chart-container">
                    <div class="chart has-fixed-height" id="stacked2_lines"></div>
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
                </div>
              </div>
              <div class="panel-body">
                <table class="table datatable datatable-basic table-hover">
                  <thead class="bg-grey-100">
                  <tr>
                    <th>商铺名</th>
                    <th>头像</th>
                    <th>商品数</th>
                    <th>真实姓名</th>
                    <th>手机</th>
                    <th>开通时间</th>
                    <th>资格认证(实名/健康)</th>
                    <th>账户余额</th>
                    <?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['seller']['changeLock'])) {?>
                    <th>状态</th>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['seller']['getSellerInfo']) || isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['seller']['verify'])) {?>
                    <th>操作</th>
                    <?php }?>
                  </tr>
                  </thead>
                  <tbody>
                  <tr ng-repeat="item in alllist track by $index" id="tr_{{item.id}}">
                    <td>{{item.shop}}</td>
                    <td>
                        <img ng-src="{{item.pic}}" width=60px,height=60px />
                    </td>
                    <td>{{item.goods_num}}</td>
                    <td>{{item.name}}</td>

                    <td>{{item.phone}}</td>
                    <td>{{item.create_time*1000|date:'yyyy-MM-dd HH:mm'}}</td>
                    <td>{{item.is_real | RealDesc}}/{{item.is_health | HealthDesc}}</td>
                    <td>{{item.money}}</td>
                    <?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['seller']['changeLock'])) {?>
                    <td>
                      <div class="checkbox checkbox-slider--b checkbox-slider-lg" ng-show="item.lock ==1">
                        <label>
                          <input type="checkbox"><span ng-click="changeLock(item.id,item.lock)"></span>
                        </label>
                      </div>
                      <div class="checkbox checkbox-slider--b checkbox-slider-lg" ng-show="item.lock ==0">
                        <label>
                          <input type="checkbox"  checked ><span ng-click="changeLock(item.id,item.lock)"></span>
                        </label>
                      </div>
                    </td>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['seller']['verify']) || isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['seller']['getSellerInfo'])) {?>
                    <td>
                      <a ng-if="item.is_real != 2 && item.is_health !=2" href="#info_modal" data-toggle="modal" data-target="#info_modal" ng-click="getData(item.id)"><i class="icon-task"></i> 详情</a>
                      <a ng-if="item.is_real == 2 || item.is_health == 2" href="#verify_modal" data-toggle="modal" data-target="#verify_modal" ng-click="getData(item.id)"><i class="icon-task"></i> 审核</a>
                    </td>
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
          <?php $_smarty_tpl->_subTemplateRender("file:seller/info.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          <?php $_smarty_tpl->_subTemplateRender("file:seller/verify.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
