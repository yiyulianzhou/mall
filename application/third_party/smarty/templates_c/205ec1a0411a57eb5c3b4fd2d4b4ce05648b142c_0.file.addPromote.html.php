<?php
/* Smarty version 3.1.30, created on 2018-03-14 11:33:13
  from "D:\wamp64\www\mall_manage\application\views\promote\addPromote.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa897f9e36716_35918324',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '205ec1a0411a57eb5c3b4fd2d4b4ce05648b142c' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\promote\\addPromote.html',
      1 => 1520998388,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa897f9e36716_35918324 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="add_modal" class="modal fade">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">新建活动</h5>
            </div>
            <form action="#" class="form-horizontal" onsubmit="return false">

                <div class="modal-body">
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">活动名称：</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="name" ng-model="name">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">需要人数：</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="user" ng-model="user">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">单个红包金额：</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="bag_money" ng-model="bag_money">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">红包总个数：</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="number" ng-model="number">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">可使用红包数：</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="use_number" ng-model="use_number">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">拆分人数:</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="use_user" ng-model="use_user">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">拆分方式:</label>
                        <div class="col-sm-9 form-control-static">
                            <select class="form-control" name="split_type" id="" ng-model="split_type">
                                <option value="">请选择拆分方式...</option>
                                <option value="1">等分</option>
                                <option value="2">随机</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">红包使用限制:</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="con_money" ng-model="con_money">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">是否在首页展示:</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="is_display" ng-model="is_display">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">红包有效期截止时间:</label>
                        <div class="col-sm-9 form-control-static">
                            <div class="input-group" style="color:#666">
                                <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                <input type="text" name="bet" ng-model="bet" class="form-control pickadate"  placeholder="请选择红包有效期截止时间">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">活动结束时间:</label>
                        <div class="col-sm-9 form-control-static">
                            <div class="input-group" style="color:#666">
                                <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                <input type="text" name="aet" ng-model="aet" class="form-control pickadate"  placeholder="请选择活动结束时间">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">规则描述:</label>
                        <div class="col-sm-9 form-control-static">
                            <textarea class="form-control" ng-model='desc' style="height:80px">

                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" style="color: white;" ng-click="save()">添加</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">返回</button>
                </div>
            </form>

        </div>
    </div>
</div>
<?php }
}
