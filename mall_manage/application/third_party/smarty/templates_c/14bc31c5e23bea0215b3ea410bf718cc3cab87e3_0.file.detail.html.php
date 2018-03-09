<?php
/* Smarty version 3.1.30, created on 2018-02-24 15:54:15
  from "D:\wamp64\www\mall_manage\application\views\buyer\detail.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a911a270b4614_92937291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14bc31c5e23bea0215b3ea410bf718cc3cab87e3' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\buyer\\detail.html',
      1 => 1517981988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/left.html' => 1,
    'file:../public/footer_page.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5a911a270b4614_92937291 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="page-container"> 
  
  <!-- Page content -->
  <div class="page-content"> 
      <?php $_smarty_tpl->_subTemplateRender("file:../public/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="content-wrapper"> 
      
      <!-- Page header -->
      <div class="page-header">
        <div class="page-header-content hide">
          <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">首页</span></h4>
          </div>
        </div>
      </div>
      <!-- /page header --> 
      
      <!-- Content area -->
      <div class="content">
        <div class="row">
          <div class="col-md-8 col-md-offset-2"> 
            <form class="form-horizontal">
              <div class="panel panel-flat">
                <div class="panel-heading pv10 mb20 br-b">
                  <h5 class="panel-title">买家信息</h5>
                  </div>
                <div class="panel-body">
                  <div class=" form-group">
                    <label class="col-sm-2 control-label">昵称:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['username'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">头像:</label>
                    <div class="col-sm-10">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['detail']->value['avatarUrl'];?>
" style="width:60px;height:60px;">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">性别:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['gender'] == '1' ? '男' : ($_smarty_tpl->tpl_vars['detail']->value['gender'] == '2' ? '女' : '未知');?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">联系电话:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['phone'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">QQ:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['qq'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">邮箱:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['email'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">所在城市:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['city'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">账户余额:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['money'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">累计消费金额:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['consum_money'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">状态:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['status'] == '0' ? '正常' : '禁言';?>
">
                    </div>
                  </div>
                  
                  <div class="text-right" style="text-align: center !important">
                    <p class="btn btn-primary"><a href='<?php echo site_url("buyer/index?per_page=".((string)$_smarty_tpl->tpl_vars['page']->value)."&username=".((string)$_smarty_tpl->tpl_vars['username']->value)."&status=".((string)$_smarty_tpl->tpl_vars['status']->value));?>
' style="color: white;">返回</a></p>
                  </div>
                </div>
              </div>
            </form>
            <!-- /basic layout --> 
            
          </div>
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
<?php $_smarty_tpl->_subTemplateRender("file:../public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
