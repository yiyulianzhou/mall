<?php
/* Smarty version 3.1.30, created on 2018-03-12 16:14:46
  from "D:\wamp64\www\mall_manage\application\views\my\info.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa636f6cdee93_45667003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b72ebf7f1bb37eca5c590bb1b23d6f4090fcf754' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\my\\info.html',
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
function content_5aa636f6cdee93_45667003 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- /main navbar --> 

<!-- Page container -->
<div class="page-container"> 
  
  <!-- Page content -->
  <div class="page-content"> 
      <?php $_smarty_tpl->_subTemplateRender("file:../public/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Content area -->
      <div class="content">
        <div class="row">
          <div class="col-md-8 col-md-offset-2"> 
            <form class="form-horizontal">
              <div class="panel panel-flat">
                <div class="panel-heading pv10 mb20 br-b">
                  <h5 class="panel-title">个人信息</h5>
                  </div>
                <div class="panel-body">
                  <div class=" form-group">
                    <label class="col-sm-2 control-label">登录账号:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['username'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">真实姓名:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="readonly" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['realname'];?>
">
                    </div>
                  </div>
                  <div class="text-center">
                    <input type="button" name="submit" class="btn btn-primary"  onclick="javascript:history.back(-1);" value="返回" />
                  </div>
                </div>
              </div>
            </form>
            <!-- /basic layout --> 
            
          </div>
        </div>
        
        <!-- Footer -->
        <?php $_smarty_tpl->_subTemplateRender("file:../public/footer_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <!-- /footer --> 
        
      </div>
      <!-- /content area --> 
      
    </div>
    <!-- /main content --> 
    
  </div>
  <!-- /page content --> 
  
</div>
<!-- /page container -->

<?php $_smarty_tpl->_subTemplateRender("file:../public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
