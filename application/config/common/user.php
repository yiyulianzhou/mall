<?php
if(!defined('BASEPATH')) exit();

// 模块URL
$config['base']['module_url']  = "user/";

// 模块名
$config['base']['module_name'] = '用户';

// 首页
$config['url']['index']         = $config['base']['module_url'].'index';

// 锁定
$config['url']['lock']         = $config['base']['module_url'].'lock';

// 新增
$config['url']['create']       = $config['base']['module_url'].'create';

// 编辑
$config['url']['edit']         = $config['base']['module_url'].'edit';

// 提示词
$config['base']['create'] = '新增用户';
$config['base']['edit']   = '编辑用户';

// 操作成功
$config['base']['success'] = '成功';

// 操作失败
$config['base']['failure'] = '失败';

$config['base']['data_exist_error_msg']   = $config['base']['module_name'].'已存在';