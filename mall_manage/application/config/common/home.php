<?php
if(!defined('BASEPATH')) exit();

// 模块URL
$config['base']['module_url']  = "home/";

// 模块名
$config['base']['module_name'] = '权限';

//顶部统计信息
$config['url']['top_count'] = $config['base']['module_url'] . 'topCount/';

//用户反馈待处理信息
$config['url']['show_tips'] = $config['base']['module_url'] . 'showTips/';


//用户提现申请信息
$config['url']['cash_apply'] = $config['base']['module_url'] . 'cashApply/';

// 获取卖家top5报表数据链接
$config['url']['show_line'] = $config['base']['module_url'] . 'showLine/';

// 获取买家top5报表数据链接
$config['url']['show_buyer'] = $config['base']['module_url'] . 'showBuyer/';

//商品top5报表数据连接
$config['url']['show_goods'] = $config['base']['module_url'] . 'showGoods/';

//商品类目top5报表数据连接
$config['url']['show_items'] = $config['base']['module_url'] . 'showItems/';

