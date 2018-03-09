<?php
if(!defined('BASEPATH')) exit();

// 模块URL
$config['base']['module_url']  = "buyer/";

// 模块名
$config['base']['module_name'] = '买家管理';

// 列表数据访问链接
$config['url']['buyer_url']               = $config['base']['module_url'].'buyer/';

//买家顶部统计数据
$config['url']['count_buyer']               = $config['base']['module_url'].'countBuyer/';

//买家列表数据
$config['url']['get_buyer_list']               = $config['base']['module_url'].'getBuyerList/';

//买家销售统计报表
$config['url']['get_buyer_cost']               = $config['base']['module_url'].'getBuyerCost/';

//买家分布统计报表
$config['url']['get_buyer_orders']               = $config['base']['module_url'].'getBuyerOrders/';

// 操作链接
$config['url']['get_buyer_info'] = $config['base']['module_url'] . 'getBuyerInfo/';

//修改买家禁言状态
$config['url']['change_lock']               = $config['base']['module_url'].'changeLock/';