<?php

if(!defined('BASEPATH')) exit();

// 模块URL
$config['base']['module_url']  = "promote/";

// 模块名
$config['base']['module_name'] = '活动管理';


//活动顶部统计数据
$config['url']['count_promote']               = $config['base']['module_url'].'countPromote/';

//活动列表数据
$config['url']['promote_list']               = $config['base']['module_url'].'promoteList/';

//红包统计数据
$config['url']['red_bags']               = $config['base']['module_url'].'redBags/';

//活动金额统计
$config['url']['promote_money']               = $config['base']['module_url'].'promoteMoney/';

//活动详情
$config['url']['promote_info']               = $config['base']['module_url'].'promoteInfo/';
