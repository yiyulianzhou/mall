<?php
/* Smarty version 3.1.30, created on 2018-03-14 16:19:54
  from "D:\wamp64\www\mall_manage\application\views\goods\cateInfo.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa8db2a116418_90004148',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8608bd442f43d50946f6e9c29ac3e80d834e3ac0' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\goods\\cateInfo.html',
      1 => 1521015580,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa8db2a116418_90004148 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="CateInfo_modal" class="modal fade">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">分类信息详情</h5>
            </div>
            <form action="#" class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">商品类型</label>
                        <div class="col-sm-9 form-control-static">{{fullData.name}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">介绍</label>
                        <div class="col-sm-9 form-control-static">{{fullData.info}}</div>
                    </div>

                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">商品数</label>
                        <div class="col-sm-9 form-control-static">{{fullData.goods_num}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">商铺数</label>
                        <div class="col-sm-9 form-control-static">{{fullData.shop_num}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">状态</label>
                        <div class="col-sm-9 form-control-static">{{fullData.state | StateDesc}}</div>
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
