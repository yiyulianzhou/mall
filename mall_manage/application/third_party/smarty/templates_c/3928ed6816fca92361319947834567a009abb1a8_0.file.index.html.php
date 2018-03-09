<?php
/* Smarty version 3.1.30, created on 2018-03-07 13:48:29
  from "D:\wamp64\www\mall_manage\application\views\goods\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9f7d2dae9eb7_68395761',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3928ed6816fca92361319947834567a009abb1a8' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\goods\\index.html',
      1 => 1520401707,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/left.html' => 1,
    'file:../public/breadcrumb.html' => 1,
    'file:../public/page.html' => 1,
    'file:goods/verify.html' => 1,
    'file:goods/info.html' => 1,
    'file:goods/up.html' => 1,
    'file:../public/footer_page.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5a9f7d2dae9eb7_68395761 (Smarty_Internal_Template $_smarty_tpl) {
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
                          <h4 class="no-margin">新增商品</h4>
                          <h2 class="mv10">{{lists.new_goods}}个</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                      <div class="panel bg-pink-400 ">
                        <div class="panel-body pb20 homgicon-02">
                          <h4 class="no-margin">商品总数</h4>
                          <h2 class="mv10">{{lists.goods_total}}个</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                      <div class="panel bg-blue-400">
                        <div class="panel-body pb20 homgicon-03">
                          <h4 class="no-margin">商品类目</h4>
                          <h2 class=" mv10">{{lists.goods_item}}条</h2>
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
                    <div class="col-md-6 pt10">单品销售统计
                      <button  ng-click="getSalesList('day')" ng-class="day ? 'btn btn-success' : 'btn'">今日</button>
                      <button  ng-click="getSalesList('week')" ng-class="week ? 'btn btn-success' : 'btn'">本周</button>
                      <button  ng-click="getSalesList('month')" ng-class="month ? 'btn btn-success' : 'btn'">本月</button>
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
                      类目销售统计
                      <button  ng-click="getCatesList('day2')" ng-class="day2 ? 'btn btn-success' : 'btn'">今日</button>
                      <button  ng-click="getCatesList('week2')" ng-class="week2 ? 'btn btn-success' : 'btn'">本周</button>
                      <button  ng-click="getCatesList('month2')" ng-class="month2 ? 'btn btn-success' : 'btn'">本月</button>
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
          <div class="col-md-12">
            <div class="panel panel-info col-md-6">

              <div class="panel-heading" >
                <div class="panel-title row">
                  <div class="col-md-6 pt10">单品访问统计
                    <button  ng-click="getVisitList('day3')" ng-class="day3 ? 'btn btn-success' : 'btn'">今日</button>
                    <button  ng-click="getVisitList('week3')" ng-class="week3 ? 'btn btn-success' : 'btn'">本周</button>
                    <button  ng-click="getVisitList('month3')" ng-class="month3 ? 'btn btn-success' : 'btn'">本月</button>
                  </div>
                  <div class="col-md-4 col-sm-4 m-ss" >
                    指定日期
                    <div class="input-group" style="color:#666"> <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                      <input type="text" name="s_start_time3" ng-model="s_start_time3" class="form-control pickadate"  placeholder="请选择开始时间">
                    </div>
                    <div class="input-group" style="color:#666"> <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                      <input type="text" name="s_end_time3" ng-model="s_end_time3" class="form-control pickadate"  placeholder="请选择结束时间">
                    </div>

                  </div>
                  <div class="col-md-2 pt20">
                    <button class="btn btn-success" ng-click="searchAction3()">筛选</button>
                  </div>
                </div>

              </div>
              <div class="panel-body br-t" >
                <div class="chart-container">
                  <div class="chart has-fixed-height" id="stacked3_lines"></div>
                </div>
              </div>
            </div>
            <div class="panel panel-info col-md-6">
              <div class="panel-heading">
                <div class="panel-title row">
                  <div class="col-md-6 pt10">
                    单品分享统计
                    <button  ng-click="getShareList('day4')" ng-class="day4 ? 'btn btn-success' : 'btn'">今日</button>
                    <button  ng-click="getShareList('week4')" ng-class="week4 ? 'btn btn-success' : 'btn'">本周</button>
                    <button  ng-click="getShareList('month4')" ng-class="month4 ? 'btn btn-success' : 'btn'">本月</button>
                  </div>
                  <div class="col-md-4 col-sm-4 m-ss" >
                    指定日期
                    <div class="input-group" style="color:#666"> <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                      <input type="text" name="s_start_time4" ng-model="s_start_time4" class="form-control pickadate"  placeholder="请选择开始时间">
                    </div>
                    <div class="input-group" style="color:#666"> <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                      <input type="text" name="s_end_time4" ng-model="s_end_time4" class="form-control pickadate"  placeholder="请选择结束时间">
                    </div>

                  </div>
                  <div class="col-md-2 pt20">
                    <button class="btn btn-success" ng-click="searchAction4()">筛选</button>
                  </div>
                </div>

              </div>
              <div class="panel-body br-t" >
                <div class="chart-container">
                  <div class="chart has-fixed-height" id="stacked4_lines"></div>
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
                  <button  class='col-md-2 ml20' ng-click="filterList('sale')" ng-class="sale ? 'btn btn-success' : 'btn'">在售</button>
                  <button  class='col-md-2 ml20' ng-click="filterList('down')" ng-class="down ? 'btn btn-success' : 'btn'">已下架</button>
                </div>
              </div>
              <div class="panel-body">
                <table class="table datatable datatable-basic table-hover">
                  <thead class="bg-grey-100">
                  <tr>
                    <th>商品名</th>
                    <th>图像</th>
                    <th>规格</th>
                    <th>售价</th>
                    <th>所属商铺</th>
                    <th>发布时间</th>
                    <th>分类</th>
                    <th>销售方式</th>
                    <th>配送</th>
                    <th>状态</th>
                    <?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['goods']['verify']) || isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['goods']['verifys'])) {?>
                    <th>操作</th>
                    <?php }?>
                  </tr>
                  </thead>
                  <tbody>
                  <tr ng-repeat="item in alllist track by $index" id="tr_{{item.id}}">
                    <td>{{item.name}}</td>
                    <td><img ng-src="<?php echo $_smarty_tpl->tpl_vars['data']->value['common']['upload_images'];?>
{{item.img}}" width=60px,height=60px /></td>
                    <td>{{item.cname}}</td>
                    <td>{{item.sales_price}}</td>
                    <td>{{item.shop}}</td>
                    <td>{{item.add_time*1000|date:'yyyy-MM-dd HH:mm'}}</td>
                    <td>{{item.category | CateDesc}}</td>
                    <td>{{item.sales_type | salesTypeDesc}}</td>
                    <td>{{item.logistics | logisticsDesc}}</td>
                    <td>{{item.state | StateDesc}}</td>
                    <?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['goods']['verify']) || isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['goods']['verifys'])) {?>
                    <td>
                      <a ng-if="item.state == 1" href="#verify_modal" data-toggle="modal" data-target="#verify_modal" ng-click="getData(item.id)"><i class="icon-task"></i> 审核</a>
                      <a ng-if="item.state != 1" href="#info_modal" data-toggle="modal" data-target="#info_modal" ng-click="getData(item.id)"><i class="icon-task"></i> 详情</a>
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
          <?php $_smarty_tpl->_subTemplateRender("file:goods/verify.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          <?php $_smarty_tpl->_subTemplateRender("file:goods/info.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          <?php $_smarty_tpl->_subTemplateRender("file:goods/up.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
