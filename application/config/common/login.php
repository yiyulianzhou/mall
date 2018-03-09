<?php
if(!defined('BASEPATH')) exit();

// 模块URL
$config['base']['module_url']  = "login/";

// 模块名
$config['base']['module_name'] = '权限';

// 列表数据访问链接
$config['url']['login_url'] = $config['base']['module_url'].'login/';

/*
 * 增删改查结果提示信息或其它的提示信息
*/
// 提示信息前缀
$config['base']['msg_prefix'] = '';

// 提示信息后缀
$config['base']['msg_suffix'] = '';

// 用户名密码错误提示
$config['base']['password_error_msg'] = $config['base']['msg_prefix'].'用户名或密码错误'.$config['base']['msg_suffix'];
$config['base']['login_success_msg'] = $config['base']['msg_prefix'].'登录成功!'.$config['base']['msg_suffix'];


