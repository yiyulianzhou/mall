<?php
/* Smarty version 3.1.30, created on 2018-02-01 10:43:52
  from "D:\wamp64\www\mall_manage\application\views\pager.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a72ef683bc3e8_16559465',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ebe8d9343bffe93f3dea0fb2200ef7bd376a310c' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\pager.html',
      1 => 1517481823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a72ef683bc3e8_16559465 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div ng-if="total_rows > 0">
    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">显示 {{start_page + 1}} 至 {{start_page+list_count}} ，全部 {{total_rows}} 条数据</div>
    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
        <button type="button" class="paginate_button previous" ng-disabled="curpage <= 1" ng-class="{disabled:curpage <= 1}" ng-click="changePager((curpage-1),$event)">←</button>
        <span><a href="javascript:;" class="paginate_button current" >{{curpage}}</a></span>
        <button type="button" class="paginate_button next" id="DataTables_Table_0_next" ng-disabled="curpage >= pages" ng-class="{disabled:curpage  >= pages}" ng-click="changePager((curpage+1),$event)">→</button>
    </div>
</div>
<?php }
}
