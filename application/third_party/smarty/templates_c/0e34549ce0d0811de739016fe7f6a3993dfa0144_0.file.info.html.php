<?php
/* Smarty version 3.1.30, created on 2018-03-15 13:38:17
  from "D:\wamp64\www\mall_manage\application\views\buyer\info.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aaa06c9b275a7_44217263',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e34549ce0d0811de739016fe7f6a3993dfa0144' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\buyer\\info.html',
      1 => 1521081615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aaa06c9b275a7_44217263 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="info_modal" class="modal fade">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">买家信息详情</h5>
            </div>
            <form action="#" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">昵称：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.username}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">小区：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.con_address}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">头像:</label>
                        <div class="col-sm-9 form-control-static">
                            <img ng-src="{{fullData.avatarUrl}}"style="width:60px;height:60px;">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">性别:</label>
                        <div class="col-sm-9 form-control-static">
                            {{fullData.gender| SexDesc}}
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">手机</label>
                        <div class="col-sm-9 form-control-static">
                            {{fullData.phone}}
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">真实姓名:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.name}}</div>
                    </div>

                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">账户余额:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.money}}</div>
                    </div>

                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">状态:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.status|StatusDesc}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">注册时间:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.create_time*1000|date:'yyyy-MM-dd HH:mm'}}</div>
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
