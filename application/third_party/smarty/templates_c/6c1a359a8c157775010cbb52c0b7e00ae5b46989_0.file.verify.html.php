<?php
/* Smarty version 3.1.30, created on 2018-03-07 14:11:25
  from "D:\wamp64\www\mall_manage\application\views\goods\verify.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9f828de442e7_25768232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c1a359a8c157775010cbb52c0b7e00ae5b46989' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\goods\\verify.html',
      1 => 1520403077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a9f828de442e7_25768232 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="verify_modal" class="modal fade">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 ng-show='fullData.state == 1' class="modal-title">商品信息审核</h5>
                <h5 ng-show='fullData.state == 2' class="modal-title">商品上架</h5>
            </div>
            <form action="#" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">商品名称</label>
                        <div class="col-sm-9 form-control-static">{{fullData.name}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">商品图片</label>
                        <div class="col-sm-9 form-control-static"><img ng-src="<?php echo $_smarty_tpl->tpl_vars['data']->value['common']['upload_images'];?>
{{fullData.img}}" width=60px,height=60px /></div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">销售方式</label>
                        <div class="col-sm-9 form-control-static">{{fullData.sales_type | salesTypeDesc}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">商品介绍</label>
                        <div class="col-sm-9 form-control-static">{{fullData.info}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">商品分类</label>
                        <div class="col-sm-9 form-control-static">{{fullData.category | CateDesc}}</div>
                    </div>

                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">是否产地直销</label>
                        <div class="col-sm-9 form-control-static">{{fullData.direct_sales | salesTypeDesc}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">配送方式</label>
                        <div class="col-sm-9 form-control-static">{{fullData.logistics | logisticsDesc}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">状态</label>
                        <div class="col-sm-9 form-control-static">{{fullData.state | StateDesc}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">申请时间</label>
                        <div class="col-sm-9 form-control-static">{{fullData.add_time*1000|date:'yyyy-MM-dd HH:mm'}}</div>
                    </div>

                    <div class="form-group mn pv10 br-b" ng-show="fullData.state == 1">
                        <label class="control-label col-sm-3">审核备注</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="verify_remark" ng-model="verify_remark" style="height:80px"></textarea>
                            <span class="text-danger">必填项</span>
                        </div>
                    </div>
                    <div class="form-group mn pv10 br-b">
                        <label class="control-label col-sm-3">审核结果</label>
                        <div class="col-sm-9" style="padding-top:8px">
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input  type="radio"  ng-model="verify_state" value="{{fullData.verify_value}}" checked="checked"> 审核通过
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input type="radio" ng-model="verify_state" value="3"> 审核未通过
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">返回</button>
                    <button type="button" class="btn btn-primary" ng-click="save()">保存</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }
}
