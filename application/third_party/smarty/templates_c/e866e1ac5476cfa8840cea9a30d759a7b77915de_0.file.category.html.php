<?php
/* Smarty version 3.1.30, created on 2018-03-20 14:02:33
  from "D:\wamp64\www\mall_manage\application\views\goods\category.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ab0a3f9e75095_11768322',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e866e1ac5476cfa8840cea9a30d759a7b77915de' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\goods\\category.html',
      1 => 1521525751,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/left.html' => 1,
    'file:../public/breadcrumb.html' => 1,
    'file:../public/page.html' => 1,
    'file:goods/addCate.html' => 1,
    'file:goods/cateInfo.html' => 1,
    'file:../public/footer_page.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5ab0a3f9e75095_11768322 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <div class="row">
                                    <button  class='col-md-2 ml10' ng-click="filterList('all')" ng-class="all ? 'btn btn-success' : 'btn'">全部</button>
                                    <button  class='col-md-offset-5 col-md-2 btn btn-warning' href="#cate_modal" data-toggle="modal" data-target="#cate_modal" ng-click="addCate()">新增商品分类</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table datatable datatable-basic table-hover">
                                    <thead class="bg-grey-100">
                                    <tr>
                                        <th>商品类型</th>
                                        <th>介绍</th>
                                        <th>商品数</th>
                                        <?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['goods']['cateDetail'])) {?>
                                        <th>操作</th>
                                        <?php }?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="item in alllist track by $index" id="tr_{{item.id}}">
                                        <td>{{item.name}}</td>
                                        <td>{{item.info}}</td>
                                        <td>{{item.goods_num}}</td>
                                        <?php if (isset($_smarty_tpl->tpl_vars['data']->value['permission_tree']['goods']['cateDetail'])) {?>
                                        <td>
                                            <a href="#CateInfo_modal" data-toggle="modal" data-target="#CateInfo_modal" ng-click="getData(item.id)"><i class="icon-task"></i> 详情</a>
                                        </td>
                                        <?php }?>
                                        </tr>
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
                    <?php $_smarty_tpl->_subTemplateRender("file:goods/addCate.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                    <?php $_smarty_tpl->_subTemplateRender("file:goods/cateInfo.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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

<!-- 日期范围选择配置 -->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/pages/picker_date.js"><?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:../public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
