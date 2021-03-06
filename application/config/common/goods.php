<?php
if(!defined('BASEPATH')) exit();

// 模块URL
$config['base']['module_url']  = "goods/";

// 模块名
$config['base']['module_name'] = '商品';

// 列表数据访问链接
$config['url']['goods_url']               = $config['base']['module_url'].'goods/';

// 列表数据访问链接
$config['url']['count_goods_data']               = $config['base']['module_url'].'countGoods/';

// 列表数据访问链接
$config['url']['get_goods']               = $config['base']['module_url'].'getGoods/';

// 列表数据访问链接
$config['url']['get_category']               = $config['base']['module_url'].'getCategory/';

// 商品分类
$config['goods']['category']  = array(
								"1"=>"新鲜水果",
								"2"=>"时令蔬菜",
								"3"=>"精选肉类",
								"4"=>"活鲜水产",
								"5"=>"粮油副食",
								"6"=>"中式点心",
								"7"=>"西餐西点",
								"8"=>"禽蛋乳品",
								"9"=>"南北干货",
								"10"=>"滋补养生",
								"11"=>"坚果炒货",
								"12"=>"酱料酱菜",
								"13"=>"槽卤腌制",
								"14"=>"日韩美食",
								"15"=>"小吃零食"
							);

//商品状态
$config['goods']['state'] = array(
								"1"=>"待审核",
								"2"=>"已下架",
								"3"=>"审核未通过",
								"5"=>"销售中",
								"90"=>"团购中",
								"91"=>"团购结束"
							);

// 操作链接
$config['url']['action_url'] = $config['base']['module_url'] . 'verify/';

// 单品销售访问链接
$config['url']['get_sales']               = $config['base']['module_url'].'getSales/';

// 类目销售访问链接
$config['url']['get_cates']               = $config['base']['module_url'].'getCates/';

// 单品访问统计访问链接
$config['url']['get_visit']               = $config['base']['module_url'].'getVisit/';

// 单品分享统计访问链接
$config['url']['get_share']               = $config['base']['module_url'].'getShare/';

// 操作链接
$config['url']['action_url'] = $config['base']['module_url'] . 'detail/';

// 操作链接
$config['url']['verify_url'] = $config['base']['module_url'] . 'verify/';
$config['url']['verifys_url'] = $config['base']['module_url'] . 'verifys/';
$config['url']['cate_detail_url'] = $config['base']['module_url'] . 'cateDetail/';

//添加分类
$config['url']['addCate_url'] = $config['base']['module_url'] . 'addCate/';
