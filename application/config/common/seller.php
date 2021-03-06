<?php

if(!defined('BASEPATH')) exit();

// 模块URL
$config['base']['module_url']  = "seller/";

// 模块名
$config['base']['module_name'] = '卖家管理';

// 列表数据访问链接
$config['url']['suller_url']               = $config['base']['module_url'].'suller/';

//卖家顶部统计数据
$config['url']['count_seller']               = $config['base']['module_url'].'countSeller/';

//卖家列表数据
$config['url']['get_seller_list']               = $config['base']['module_url'].'getSellerList/';

//卖家销售统计报表
$config['url']['get_seller_sales']               = $config['base']['module_url'].'getSellerSales/';

//卖家用户统计报表
$config['url']['get_seller_users']               = $config['base']['module_url'].'getSellerUsers/';

//卖家详情
$config['url']['get_seller_info']               = $config['base']['module_url'].'getSellerInfo/';

//修改卖家封禁状态
$config['url']['change_lock']               = $config['base']['module_url'].'changeLock/';

//店铺审核
$config['url']['verify_url']               = $config['base']['module_url'].'verify/';