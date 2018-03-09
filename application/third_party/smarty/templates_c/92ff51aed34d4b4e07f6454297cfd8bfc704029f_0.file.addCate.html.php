<?php
/* Smarty version 3.1.30, created on 2018-02-28 10:24:06
  from "D:\wamp64\www\mall_manage\application\views\goods\addCate.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9612c60dc926_48843422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92ff51aed34d4b4e07f6454297cfd8bfc704029f' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\goods\\addCate.html',
      1 => 1519784643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a9612c60dc926_48843422 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="cate_modal" class="modal fade">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">新增分类</h5>
            </div>
            <form action="#" class="form-horizontal" onsubmit="return false">
                <div class="modal-body">
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">分类名称</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="name" ng-model="name">
                        </div>
                    </div>

                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">介绍</label>
                        <div class="col-sm-9 form-control-static">
                            <input class="form-control" type="text" name="info" ng-model="info">
                        </div>
                    </div>

                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">是否开放</label>
                        <div class="col-sm-9 form-control-static">
                            <select name="state" class="form-control" ng-model="state">
                                <option value="1" selected>开放</option>
                                <option value="0" >关闭</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right" style="text-align: center !important">
                    <button type="button" class="btn btn-link" data-dismiss="modal">取消</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-primary" type="submit" style="color: white;" ng-click="save()">添加</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }
}
