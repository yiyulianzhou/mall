<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
date_default_timezone_set('PRC');
// 网站标题
$config['common']['site_title'] = '众邻市集管理平台';

// 上传图片引用域名
$config['common']['upload_images'] = 'https://upload.yangxun.com/';

// 方法中文名，用于面包屑导航条
$config['common']['method_name'] = array(
    'list'       => '列表',
    'index'      => '数据概览',
    'recharge'   => '买家充值',
    'seller'     => '卖家提现',
    'buyer'      => '买家提现',
    'add'        => '新增',
    'delete'     => '删除',
    'edit'       => '编辑',
    'view'       => '查看',
    'account'    => '个人信息',
    'changepass' => '密码修改',
    'category' => '商品类目',
);

// 商品分类
$config['common']['category']  = array(
    "1"=>"新鲜水果",
    "2"=>"产地直供",
    "3"=>"车厘子",
    "4"=>"奇异果",
    "5"=>"菠萝凤梨",
    "6"=>"橙柑橘柚",
    "7"=>"蓝莓草莓",
    "8"=>"葡萄提子",
    "9"=>"桃李杏梅",
    "10"=>"热带水果",
    "11"=>"苹果香蕉梨"
);

/*
 * 全局翻页配置，可在单独模块配置中替换
 */
// 每页显示数据数量
$config['common']['per_page'] = 10;

// 分页方法自动检测你 URI 的哪一段包含页数，如果你的情况不一样，你可以明确指定它。
$config['common']['uri_segment'] = 3;

// 默认分页的 URL 中显示的是你当前正在从哪条记录开始分页，如果你希望显示实际的页数，将该参数设置为 TRUE 。
$config['common']['use_page_numbers'] = true;

// 放在你当前页码的前面和后面的“数字”链接的数量。比方说值为 2 就会在每一边放置两个数字链接， 就像此页顶端的示例链接那样。
$config['common']['num_links'] = 5;

// 每页显示数据数量
$config['common']['per_page1'] = 10;

/**
 * 全局数组
 */
// 账号状态
$config['common']['status'] = array(
    array('label' => 'danger', 'title' => '禁用'),
    array('label' => 'success', 'title' => '正常'),
);

// 消息状态
$config['common']['message_status'] = array(
    array('label' => 'warning', 'title' => '未读'),
    array('label' => 'success', 'title' => '已读'),
);

// 提示消息类型
$config['common']['msg_type'] = array(
    1 => 'error',
    2 => 'success',
    3 => 'warning',
    4 => 'info',
    5 => 'danger',
);

// 提示消息内容
$config['common']['msg'] = array(
    1 => '参数错误',
    2 => 'ID错误',
    3 => '未知请求',
    4 => '数据不存在',
    5 => '数据已存在',
    6 => '查询成功',
);

// 操作类型
$config['common']['action_type'] = array(
    0 => 'view',
    1 => 'create',
    2 => 'update',
    3 => 'delete',	
    4 => 'detail',
);