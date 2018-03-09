<?php
/* Smarty version 3.1.30, created on 2018-03-07 10:25:31
  from "D:\wamp64\www\mall_manage\application\views\seller\info.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9f4d9b6a5e57_66910815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4aad1f000fcd4e25fc7fff06bf5eab4116179491' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\seller\\info.html',
      1 => 1520389513,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a9f4d9b6a5e57_66910815 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="info_modal" class="modal fade">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">卖家信息详情</h5>
            </div>
            <form action="#" class="form-horizontal">

                <div class="modal-body">

                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">店铺名称：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.shop}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">店铺小区：</label>
                        <div class="col-sm-9 form-control-static">{{fullData.com_address}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">店铺地址:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.address}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">头像:</label>
                        <div class="col-sm-9 form-control-static">
                            <img ng-src="{{fullData.pic}}" alt="图片链接已失效" onerror="this.style.display='none'" style="width:60px;height:60px;">
                            </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">背景图:</label>
                        <div class="col-sm-9 form-control-static">
                            <img ng-src="{{fullData.bg_img}}" alt="图片链接已失效" onerror="this.style.display='none'" style="width:60px;height:60px;">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">真实姓名:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.name}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">联系电话:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.phone}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">正面:</label>
                        <div class="col-sm-9 form-control-static">
                            <img ng-src="<?php echo $_smarty_tpl->tpl_vars['data']->value['common']['upload_images'];?>
{{fullData.img1}}" alt="图片链接已失效" onerror="this.style.display='none'" style="width:60px;height:60px;">
                        </div>
                    </div>

                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">反面:</label>
                        <div class="col-sm-9 form-control-static">
                            <img ng-src="<?php echo $_smarty_tpl->tpl_vars['data']->value['common']['upload_images'];?>
{{fullData.img2}}" alt="图片链接已失效" onerror="this.style.display='none'" style="width:60px;height:60px;">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">健康证:</label>
                        <div class="col-sm-9 form-control-static">
                            <img ng-src="<?php echo $_smarty_tpl->tpl_vars['data']->value['common']['upload_images'];?>
{{fullData.img3}}" alt="图片链接已失效" onerror="this.style.display='none'" style="width:60px;height:60px;">
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">实名认证状态:</label>
                        <div class="col-sm-9 form-control-static">
                            {{fullData.is_real | RealDesc}}
                        </div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">健康认证状态:</label>
                        <div class="col-sm-9 form-control-static">
                            {{fullData.is_health | HealthDesc}}
                        </div>
                    </div>

                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">账户余额:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.money}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">未出货订单:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.money1}}</div>
                    </div>
                    <div class="form-group mn br-b">
                        <label class="control-label col-sm-3">已提现金额:</label>
                        <div class="col-sm-9 form-control-static">{{fullData.money2}}</div>
                    </div>
                    <div class="form-group mn br-b">

                        <label class="control-label col-sm-3">封禁状态:</label>
                        <div class="col-sm-9 form-control-static">
                            {{fullData.lock | LockDesc}}
                        </div>
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
