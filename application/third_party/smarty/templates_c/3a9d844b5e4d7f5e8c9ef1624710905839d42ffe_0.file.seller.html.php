<?php
/* Smarty version 3.1.30, created on 2018-02-09 12:22:41
  from "D:\wamp64\www\mall_manage\application\views\money\seller.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a7d22111e8301_42247267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a9d844b5e4d7f5e8c9ef1624710905839d42ffe' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\money\\seller.html',
      1 => 1518150158,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/left.html' => 1,
    'file:../public/breadcrumb.html' => 1,
    'file:../public/page.html' => 1,
    'file:../public/footer_page.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5a7d22111e8301_42247267 (Smarty_Internal_Template $_smarty_tpl) {
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
            <div class=" col-md-12">
              <div class="panel panel-flat">
                <div class="panel-heading">
                  <h6 class="panel-title">今日数据<span class="pull-right"><?php echo date('Y-m-d');?>
</span></h6>
                </div>
                <div class="container-fluid">
                  <div class="row col-md-offset-1">
                    <div class="col-md-3">
                      <div class="panel bg-teal-400">
                        <div class="panel-body pb20 homgicon-01">
                          <h4 class="no-margin">卖家提现总额</h4>
                          <h2 class="mv10">{{lists.totalMoney}}元</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                      <div class="panel bg-pink-400 ">
                        <div class="panel-body pb20 homgicon-02">
                          <h4 class="no-margin">卖家提现总次数</h4>
                          <h2 class="mv10">{{lists.totalTimes}}次</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                      <div class="panel bg-blue-400">
                        <div class="panel-body pb20 homgicon-03">
                          <h4 class="no-margin">卖家提现总人数</h4>
                          <h2 class=" mv10">{{lists.totalPeople}}人</h2>
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
                    <div class="col-md-6 pt10">提现金额统计
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
                      提现卖家统计
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
                  <button  class='col-md-2 ml20' ng-click="filterList('verify')" ng-class="verify ? 'btn btn-success' : 'btn'">待审批</button>
                  <button  class='col-md-2 ml20' ng-click="filterList('pay')" ng-class="pay ? 'btn btn-success' : 'btn'">待付款</button>
                  <button  class='col-md-2 ml20' ng-click="filterList('done')" ng-class="done ? 'btn btn-success' : 'btn'">已付款</button>
                  <button  class='col-md-2 ml20' ng-click="filterList('fail')" ng-class="fail ? 'btn btn-success' : 'btn'">审核未通过</button>
                </div>
              </div>
              <div class="panel-body">
                <table class="table datatable datatable-basic table-hover">
                  <thead class="bg-grey-100">
                  <tr>
                    <th>编号</th>
                    <th>卖家姓名</th>
                    <th>头像</th>
                    <th>提现金额</th>
                    <th>申请时间</th>
                    <th>审批人</th>
                    <th>审批时间</th>
                    <th>付款人</th>
                    <th>付款时间</th>
                    <th>状态</th>
                    <th>操作</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr ng-repeat="item in alllist track by $index" id="tr_{{item.id}}">
                    <td>{{item.id}}</td>
                    <td>{{item.username}}</td>
                    <td><img ng-src="{{item.avatarUrl}}" width=60px,height=60px /></td>
                    <td>{{item.money}}</td>
                    <td>{{item.create_time}}</td>
                    <td>{{item.realname}}</td>
                    <td>{{item.verify_time}}</td>
                    <td>{{item.payName}}</td>
                    <td>{{item.pay_time}}</td>
                    <td>{{item.status | StatusDesc}}</td>
                    <td><a href="<?php echo site_url($_smarty_tpl->tpl_vars['data']->value['page_url']['action_url']);?>
{{item.id}}"><i class="icon-list3"></i> 审核</a></td>
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
