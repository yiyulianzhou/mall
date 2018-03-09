<?php
/* Smarty version 3.1.30, created on 2018-02-07 05:51:22
  from "D:\wamp64\www\mall_manage\application\views\public\page2.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a7a93da708d68_21082726',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b11ea2027f09369cbfd37be0ebd0e5d199b8611' => 
    array (
      0 => 'D:\\wamp64\\www\\mall_manage\\application\\views\\public\\page2.html',
      1 => 1517981988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a7a93da708d68_21082726 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div ng-if="total_rows2 > 0">
    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">显示 {{start_page2 + 1}} 至 {{start_page2+list_count2}} ，全部 {{total_rows2}} 条数据</div>
    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
        <button type="button" class="paginate_button previous" ng-disabled="curpages <= 1" ng-class="{disabled:curpage2 <= 1}" ng-click="changePager((curpage2-1),'apply')">←</button>
        <span><a href="javascript:;" class="paginate_button current" >{{curpage2}}</a></span>
        <button type="button" class="paginate_button next" id="DataTables_Table_0_next" ng-disabled="curpage2 >= pages2" ng-class="{disabled:curpage2  >= pages2}" ng-click="changePager((curpage2+1),'apply')">→</button>
    </div>
</div><?php }
}
