<?php
/* Smarty version 3.1.30, created on 2018-03-08 17:27:03
  from "D:\wamp64\www\mall_manage\application\views\promote\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa101e71d2162_28089423',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a89a7461ab052ac502e6bf227c3756319d047e0' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\promote\\index.html',
      1 => 1520501220,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/left.html' => 1,
    'file:../public/breadcrumb.html' => 1,
    'file:../public/page.html' => 1,
    'file:promote/info.html' => 1,
    'file:promote/addPromote.html' => 1,
    'file:../public/footer_page.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5aa101e71d2162_28089423 (Smarty_Internal_Template $_smarty_tpl) {
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
                  <button  class='col-md-offset-10 col-md-2 btn btn-warning' href="#add_modal" data-toggle="modal" data-target="#add_modal" ng-click="addCate()">发布新活动</button>
                  <div class="container-fluid">
                    <div class="row col-md-offset-2">
                      <div class="col-md-3">
                        <div class="panel bg-teal-400">
                          <div class="panel-body pb20 homgicon-01">
                            <h4 class="no-margin">成功拆包</h4>
                            <h2 class="mv10">{{lists.red_bag_num
                              }}个</h2>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-md-offset-3">
                        <div class="panel bg-pink-400 ">
                          <div class="panel-body pb20 homgicon-02">
                            <h4 class="no-margin">累计发放</h4>
                            <h2 class="mv10">{{lists.red_bag_mon
                              }}元</h2>
                          </div>
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
                    <div class="col-md-6 pt10">红包统计
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
                      金额统计
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
                  <button  class='col-md-2 ml10' ng-click="filterList('all')" ng-class="all ? 'btn btn-success' : 'btn'">活动列表</button>
                </div>
              </div>
              <div class="panel-body">
                <table class="table datatable datatable-basic table-hover">
                  <thead class="bg-grey-100">
                  <tr>
                    <th>互动标题</th>
                    <th>开放时间</th>
                    <th>结束时间</th>
                    <th>参与人数</th>
                    <th>成功拆包</th>
                    <th>累计金额</th>
                    <th>获益用户</th>
                    <th>状态</th>
                    <th>操作</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr ng-repeat="item in alllist track by $index" id="tr_{{item.id}}">
                    <td>{{item.name}}</td>
                    <td>{{item.create_time*1000|date:'yyyy-MM-dd HH:mm'}}</td>
                    <td>{{item.end_time*1000|date:'yyyy-MM-dd HH:mm'}}</td>
                    <td>{{item.use_user}}</td>
                    <td>{{item.pd_user}}</td>
                    <td>{{item.use_money}}</td>
                    <td>{{item.use_user}}</td>
                    <td>{{item.status | StatusDesc}}</td>
                    <td>
                      <a  href="#info_modal" data-toggle="modal" data-target="#info_modal" ng-click="getData(item.id)"><i class="icon-task"></i> 详情</a>
                    </td>
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
          <?php $_smarty_tpl->_subTemplateRender("file:promote/info.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          <?php $_smarty_tpl->_subTemplateRender("file:promote/addPromote.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
