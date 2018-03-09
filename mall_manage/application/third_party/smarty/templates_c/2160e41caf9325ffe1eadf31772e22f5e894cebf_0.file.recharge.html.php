<?php
/* Smarty version 3.1.30, created on 2018-03-06 13:55:34
  from "D:\wamp64\www\mall_manage\application\views\money\recharge.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9e2d56ca8563_80755825',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2160e41caf9325ffe1eadf31772e22f5e894cebf' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\money\\recharge.html',
      1 => 1520315729,
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
function content_5a9e2d56ca8563_80755825 (Smarty_Internal_Template $_smarty_tpl) {
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
                          <h4 class="no-margin">买家充值总额</h4>
                          <h2 class="mv10">{{lists.totalMoney}}元</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                      <div class="panel bg-pink-400 ">
                        <div class="panel-body pb20 homgicon-02">
                          <h4 class="no-margin">买家充值总次数</h4>
                          <h2 class="mv10">{{lists.totalTimes}}次</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                      <div class="panel bg-blue-400">
                        <div class="panel-body pb20 homgicon-03">
                          <h4 class="no-margin">买家充值总人数</h4>
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
                    <div class="col-md-6 pt10">充值金额统计
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
                      充值买家统计
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
                    <button class="col-md-2 btn btn-success ml10">全部</button>
                  </div>
                </div>
                <div class="panel-body">
                  <table class="table datatable datatable-basic table-hover">
                    <thead class="bg-grey-100">
                    <tr>
                      <th>用户名</th>
                      <th>头像</th>
                      <th>充值金额</th>
                      <th>充值时间</th>
                      <?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['money']['info'])) {?>
                      <th>操作</th>
                      <?php }?>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="item in alllist track by $index" id="tr_{{item.id}}">
                      <td>{{item.username}}</td>
                      <td> <img ng-src="{{item.avatarUrl}}" width=60px,height=60px /></td>
                      <td>{{item.money}}</td>
                      <td>{{item.create_time*1000|date:'yyyy-MM-dd HH:mm'}}</td>
                      <?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['money']['info'])) {?>
                      <td><a href="<?php echo site_url($_smarty_tpl->tpl_vars['data']->value['page_url']['info_url']);?>
{{item.id}}"><i class="icon-list3"></i> 详情</a></td>
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
          </div>
      </div>
      <?php $_smarty_tpl->_subTemplateRender("file:../public/footer_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
