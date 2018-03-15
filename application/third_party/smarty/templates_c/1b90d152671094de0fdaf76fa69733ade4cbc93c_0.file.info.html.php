<?php
/* Smarty version 3.1.30, created on 2018-03-14 18:30:59
  from "D:\wamp64\www\mall_manage\application\views\money\info.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa8f9e320bc97_59003922',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b90d152671094de0fdaf76fa69733ade4cbc93c' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\money\\info.html',
      1 => 1521023452,
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
function content_5aa8f9e320bc97_59003922 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="page-container"> 
  
  <!-- Page content -->
  <div class="page-content"> 
      <?php $_smarty_tpl->_subTemplateRender("file:../public/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="content-wrapper"> 
      <!-- Content area -->
      <div class="content">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 form-horizontal"> 
            <!-- <form class="form-horizontal"> -->
              <?php echo form_open('money/verify');?>

              <div class="panel panel-flat">
                <div class="panel-heading pv10 mb20 br-b">
                  <?php if ($_smarty_tpl->tpl_vars['detail']->value['status'] == 1) {?>
                  <h5 class="panel-title">充值详情</h5>
                  <input name="verify" value="verify"  style="display:none" >
                  <?php } elseif ($_smarty_tpl->tpl_vars['detail']->value['status'] == 12) {?>
                  <h5 class="panel-title">确认打款</h5>
                  <input name="verify" value="pay"  style="display:none" >
                  <?php } else { ?>
                  <h5 class="panel-title">充值详情</h5>
                  <?php }?>
                  </div>
                <div class="panel-body">
                  <input name="id" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['id'];?>
"  style="display:none" >
                  <input name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"  style="display:none" >
                  <input name="state" value="<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
"  style="display:none" >
                  <input name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
"  style="display:none" >
                  <div class=" form-group">
                    <label class="col-sm-2 control-label">用户姓名:</label>
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
                    <label class="col-sm-2 control-label">充值金额:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['money'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">充值时间:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['detail']->value['create_time']);?>
">
                    </div>
                  </div>
                  <?php if ($_smarty_tpl->tpl_vars['detail']->value['status'] == 3 || $_smarty_tpl->tpl_vars['detail']->value['status'] == 13) {?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">操作人:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['realname'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">操作时间:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['detail']->value['verify_time']);?>
">
                    </div>
                  </div>
                  <?php } elseif ($_smarty_tpl->tpl_vars['detail']->value['status'] == 12) {?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">操作人:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['realname'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">操作时间:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['detail']->value['verify_time']);?>
">
                    </div>
                  </div>
                  <?php }?>
                  <div class="text-right" style="text-align: center !important">
                    <input type="button" name="submit" class="btn btn-primary"  onclick="javascript:history.back(-1);" value="返回" />
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
