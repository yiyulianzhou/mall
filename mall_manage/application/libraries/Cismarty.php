<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
//加载smarty模板引擎 Release 3.1.30
require(APPPATH . 'libraries/smarty/Smarty.class.php');

/**
 * @Author:      Kevin
 * @DateTime:    2016-09-13 11:44:47
 * @Description: CI集成smarty模版引擎库
 */
class Cismarty extends Smarty
{
    protected $ci;
    public function  __construct(){
        parent::__construct();
        //获取CI全局超级对象
        $ci = &get_instance();
        //加载smarty的配置文件
        $ci->load->config('smarty');

        //获取相关的配置项
        $this->template_dir    = $ci->config->item('template_dir');
        $this->compile_dir     = $ci->config->item('compile_dir');
        $this->cache_dir       = $ci->config->item('cache_dir');
        $this->config_dir      = $ci->config->item('config_dir');
        $this->plugins_dir     = $ci->config->item('plugins_dir');
        $this->caching         = $ci->config->item('caching');
        $this->cache_lifetime  = $ci->config->item('lefttime');
        $this->left_delimiter  = "<{";
        $this->right_delimiter = "}>";

        $ci->load->config('config');
        $this->assign('base_url',$ci->config->item('base_url'));
    }

}

?>