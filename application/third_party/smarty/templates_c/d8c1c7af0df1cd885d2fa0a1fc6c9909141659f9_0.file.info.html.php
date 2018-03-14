<?php
/* Smarty version 3.1.30, created on 2018-03-14 10:06:22
  from "D:\wamp64\www\mall_manage\application\views\promote\info.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa8839ea6d6f5_58168617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8c1c7af0df1cd885d2fa0a1fc6c9909141659f9' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\promote\\info.html',
      1 => 1520993179,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa8839ea6d6f5_58168617 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="info_modal" class="modal fade">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">活动详情</h5>
            </div>
            <form action="#" class="form-horizontal">

                <div class="modal-body">

                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">活动名称：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.name}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">红包总额：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.money}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">红包总个数：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.number}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">可使用红包数：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.use_number}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">需要人数：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.user}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">单个红包金额：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.bag_money}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">拆分方式：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.split_type | SplitDesc}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">使用限制：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.con_money}}</div>
                    </div>

                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">红包有效截止时间:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.bet*1000|date:'yyyy-MM-dd HH:mm'}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">活动结束时间:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.aet*1000|date:'yyyy-MM-dd HH:mm'}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">是否在首页显示:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.is_display | DisplayDesc}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">已领取人数:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.pd_user}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">已领取金额:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.pd_money}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">已使用人数:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.use_user}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">已使用金额:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.use_money}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">创建时间:</label>
                        <div class="col-sm-9 form-control-static">
                            {{fullData.create_time*1000|date:'yyyy-MM-dd HH:mm'}}
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">手工关闭时间:</label>
                        <div class="col-sm-9 form-control-static" ng-if="fullData.close_time == null">
                        </div>
                        <div class="col-sm-9 form-control-static" ng-if="fullData.close_time != null">
                            {{fullData.close_time*1000|date:'yyyy-MM-dd HH:mm'}}
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">删除时间:</label>
                        <div class="col-sm-9 form-control-static" ng-if="fullData.del_time == null">
                        </div>
                        <div class="col-sm-9 form-control-static" ng-if="fullData.del_time != null">
                            {{fullData.del_time*1000|date:'yyyy-MM-dd HH:mm'}}
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">状态:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.status | StatusDesc}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">规则描述:</label>
                        <div class="col-sm-9 form-control-static">
                            <textarea class="form-control" style="height:80px">
                                {{fullData.desc}}
                            </textarea>
                        </div>
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
