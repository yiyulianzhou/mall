<?php
/* Smarty version 3.1.30, created on 2018-03-12 16:01:21
  from "D:\wamp64\www\mall_manage\application\views\promote\addPromote.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa633d113e022_66311483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '205ec1a0411a57eb5c3b4fd2d4b4ce05648b142c' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\promote\\addPromote.html',
      1 => 1520841674,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa633d113e022_66311483 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="add_modal" class="modal fade">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">新建活动</h5>
            </div>
            <form action="#" class="form-horizontal">

                <div class="modal-body">

                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">活动名称：</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="name" ng-model="name">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">单个红包金额：</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="money" ng-model="money">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">拆分人数:</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="use_user" ng-model="use_user">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">红包使用条件:</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="con_money" ng-model="con_money">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">活动开始时间:</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="start_time" ng-model="start_time">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">活动结束时间:</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="close_time" ng-model="close_time">
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
