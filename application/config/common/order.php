<?php
if(!defined('BASEPATH')) exit();

// 模块URL
$config['base']['module_url']  = "order/";

// 模块名
$config['base']['module_name'] = '订单';

// 列表数据访问链接
$config['url']['order_url']               = $config['base']['module_url'].'order/';

//订单状态
$config['order']['status']  = array(
								"4"=>"待发货",
								"7"=>"待收货",
								"8"=>"待评价",
								"9"=>"交易完成",
								"10"=>"待付款",
								"11"=>"已删除",
								"14"=>"已取消"
							);