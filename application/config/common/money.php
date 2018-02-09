<?php
if(!defined('BASEPATH')) exit();

// 模块URL
$config['base']['module_url']  = "money/";

// 模块名
$config['base']['module_name'] = '订单';

// 列表数据访问链接
$config['url']['money_url']               = $config['base']['module_url'].'money/';

//提现状态
$config['money']['state'] = array(
								"1"=>"待审核",
								"3"=>"审核未通过",
								"12"=>"待打款",
								"13"=>"提现完成"
							);
// 任务状态
$config['common']['Status'] = array(
	1 => array('label' => 'default', 'title' => '待审核'),
	3 => array('label' => 'success', 'title' => '审核未通过'),
	12 => array('label' => 'default', 'title' => '待打款'),
	13 => array('label' => 'default', 'title' => '提现完成'),
);

// 操作链接
$config['url']['action_url'] = $config['base']['module_url'] . 'detail/';

//卖家提现列表数据
$config['url']['get_seller'] = $config['base']['module_url'] . 'getSeller/';

//卖家提现列表数据
$config['url']['get_buyer'] = $config['base']['module_url'] . 'getBuyer/';

//统计头部卖家提现的相关数据连接
$config['url']['count_seller_cash'] = $config['base']['module_url'] . 'countSellerCash/';


//卖家提现金额报表数据连接
$config['url']['get_seller_cash'] = $config['base']['module_url'] . 'getSellerCash/';

//提现卖家人数报表数据连接
$config['url']['get_cash_seller'] = $config['base']['module_url'] . 'getCashSeller/';

//统计头部买家提现的相关数据连接
$config['url']['count_buyer_cash'] = $config['base']['module_url'] . 'countBuyerCash/';


//买家提现金额报表数据连接
$config['url']['get_buyer_cash'] = $config['base']['module_url'] . 'getBuyerCash/';

//提现买家人数报表数据连接
$config['url']['get_cash_buyer'] = $config['base']['module_url'] . 'getCashBuyer/';