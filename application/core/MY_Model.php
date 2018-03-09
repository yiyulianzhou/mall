<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    public function __construct()
    {
		parent::__construct();
    }

    /**
     * 获取翻页配置数据，在model中获取列表数据中使用
     * @param     $total_rows      int      总条数
     * @param     $per_page        int      当前页码
     */
    protected function setPager($total_rows, $per_page)
    {
        $this->load->library('pagination');
        // 分页设置

        $config['base_url']   = BASEURL. $this->router->class;
        $config['total_rows'] = $total_rows;
        // 每页显示数据数量
        $config['per_page'] = 10;
        // 0：只显示当前页码
        $config['num_links']            = 0;
        $config['enable_query_strings'] = true;
        $config['page_query_string']    = true;
        $config['reuse_query_string']   = true;
        $config['display_pages']        = true;
        $config['use_page_numbers']     = true;
        $config['prev_link']            = '&laquo;';
        $config['prev_tag_open']        = '<li>';
        $config['prev_tag_close']       = '</li>';
        $config['next_link']            = '&raquo;';
        $config['next_tag_open']        = '<li>';
        $config['next_tag_close']       = '</li>';
        $config['num_tag_open']         = '<li>';
        $config['num_tag_close']        = '</li>';
        $config['cur_tag_open']         = '<li class="active"><a>';
        $config['cur_tag_close']        = '</a></li>';
        $config['first_link']           = '';
        $config['last_link']            = '';

        // 需返回的数据 $pager
        $pager['per_page'] = $config['per_page'];
        // 从 URI 中 读取页码参数
        $pager['curpage'] = $per_page;
        // 查询从第几条数据开始 = 页码*每页数量
        $pager['start_page'] = ($pager['curpage'] && is_numeric($pager['curpage']) && $pager['curpage'] > 1) ? ($pager['curpage'] - 1) * $pager['per_page'] : 0;

        $this->pagination->initialize($config);

        return $pager;
    }


    /**
     * @DateTime  2017-12-18
     * @copyright 获取左侧菜单列表
     * @param     [type]      $admin_id [description]
     * @return    [type]                [description]
     */
    public function my_permission($uid)
    {
        $res = [];
        $this->db->select('permission_id');
        $this->db->from('admin_permission');
        $this->db->where('admin_id', $uid);
        $tmp = $this->db->get()->result_array();
        if(!empty($tmp))
        {
            foreach($tmp as $val)
            {
                $res[] = $val['permission_id'];
            }
        }
        return $res;
    }


    /**
     * @DateTime  2017-12-18
     * @copyright 获取左侧菜单列表
     * @param     [type]      $admin_id [description]
     * @return    [type]                [description]
     */
    public function get_permission($uid)
    {
    	$this->db->select('b.controller_name,b.model_name');
		$this->db->from('admin_permission a');
		$this->db->join('shop_permission b', 'b.id = a.permission_id', 'left');
		$this->db->where('a.admin_id', $uid);
		$res = $this->db->get()->result_array();
		return $res;
    }


    /**
     * @copyright 验证该用户是否有当前页面的权限
     * @param     [type]      $admin_id [description]
     * @return    [type]                [description]
     */
    public function permission_varify($uid, $controller, $method)
    {
		$this->db->select('a.id');
		$this->db->from('admin_permission a');
		$this->db->join('shop_permission b', 'b.id = a.permission_id', 'left');
		$this->db->where('a.admin_id', $uid);
		$this->db->where('b.controller_name', $controller);
		$this->db->where('b.model_name', $method);
		$res = $this->db->get()->row_array();
		return $res;
    }

	/**
     * @function getItemByData 根据条件取字段
     * @param    $table string 查询表
     * @param    $where array 查询条件
     * @param    $column string 结果字段
     * @return   array
     */
    public function getItemByData($table, $where, $column = '')
    {
        return $this->db->select($column)->get_where($table, $where)->row_array();
    }

    /**
     * 数据入库
     * @param    $table string 表明
     * @param    $data array 插入数据
     * @return   int    插入的ID
     */
    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
}