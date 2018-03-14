<?php

class SellerModel extends MY_Model
{
    // 数据库表名,表前缀已在database配置中设置
    public $_table = 'user_shop';

    // 主键
    public $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @DateTime  2017-3-2
     * @copyright 卖家列表
     * @return    [type]      [description]
     */
    public function getSellerList()
    {
        $this->db->select('a.id,a.uid,a.shop,a.name,a.pic,a.phone,a.is_real,a.is_health,a.create_time,a.lock,a.money,count(c.id) goods_num');

        $this->db->from('user_shop a');

        //10以内系统用户
        $this->db->where('a.uid >',10);
        //计算总记录条数
        $total_rows = $this->db->count_all_results('',false);

        $this->db->join('user b','b.id = a.uid','left');

        $this->db->join('goods c','c.uid = a.uid','left');


        // 翻页设置
        $per_page   = isset($this->data['base']['per_page']) ? $this->data['base']['per_page'] : $this->data['common']['per_page'];
        $uri_segment = isset($this->data['base']['uri_segment']) ? $this->data['base']['uri_segment'] : $this->data['common']['uri_segment'];

        $curpage     = $this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 1;

        $start_page  = ($curpage && is_numeric($curpage) && $curpage > 1) ? ($curpage - 1) * $per_page : 0;

        $this->db->group_by('a.uid');

        $this->db->order_by('a.create_time','DESC');

        $this->db->limit($per_page, $start_page);

        $data['list'] = $this->db->get()->result_array();

        // 启始页
        $data['start_page'] = $start_page;
        // 总条数
        $data['total_rows'] = $total_rows;
        // 每页多少条
        $data['per_page'] = $per_page;
        // 当前页
        $data['curpage'] = $curpage;
        // 当前页查询结果总条数
        $data['list_count'] = count($data['list']);
        // 总页数，有小数进1
        $data['pages'] = ceil($total_rows / $per_page);

        return $data;
    }


    /**
     * @DateTime  2017-12-20
     * @copyright 卖家详情
     * @param     [type]      $id [description]
     * @return    [type]      array  $data   结果集
     */

    public function sellerDetail( $id )
    {
        $this->db->select('a.id,a.uid,a.shop,a.com_id,a.address_id,a.pic,a.bg_img,a.name,a.phone,a.is_real,a.is_health,a.lock,a.money,a.money1,a.money2,a.img1,a.img2,a.img3,a.lock,a.create_time,b.address,c.title com_address');
        $this->db->from('user_shop a');
        $this->db->join('building b','b.id = a.address_id','left');
        $this->db->join('community c','c.id = a.com_id','left');
        $this->db->where( 'a.id', $id );

        $res = $this->db->get()->row_array();

        return $res;
    }


    /**
     * @copyright 卖家顶部统计数据
     * @param     [type]      $id        [description]
     * @return    array       $data      结果集
     */

    public function countSeller()
    {
        //新增卖家
        $this->db->select('count(id) as num');
        $this->db->from('user_shop');

        $today = strtotime(date('Y-m-d'));

        $this->db->where('create_time >=',$today);
        //10以内是系统用户
        $this->db->where('uid >',10);
        $tmp = $this->db->get()->row_array();
        $data['new_sellers'] = $tmp['num'];
        $tmp =[];
        $this->db->reset_query();

        //卖家总数
        $this->db->select('count(id) as total');
        $this->db->from('user_shop');

        //10以内是系统用户
        $this->db->where('uid >',10);
        $tmp = $this->db->get()->row_array();
        $data['total_sellers'] = $tmp['total'];
        $tmp =[];
        $this->db->reset_query();
        return $data;
    }

    /**
     * @copyright 卖家销售统计
     * @param     [type]      $id        [description]
     * @return    [type]                 [description]
     */

    public function getSellerSales($search)
    {
        $this->db->select('sum(a.money) mon,a.sellers_id,b.name realname');

        $this->db->from('order a');

        $this->db->join('user_shop b','b.uid = a.sellers_id');
        //自选时间
        if (isset($search['s_start_time']) && isset($search['s_end_time']) && !empty($search['s_start_time']) && !empty($search['s_end_time'])){
            $search['s_day'] = '';
            $start_time = $search['s_start_time'];
            $end_time = $search['s_end_time'];
            $today = !empty($end_time) ? strtotime(str_replace('／', '-', $end_time)) : strtotime(date("Y-m-d"));
            $start = !empty($start_time) ? strtotime(str_replace('／', '-', $start_time)) : ($today - 86400);
        }
        //固定时间区间

        if (isset($search['s_day']) && !empty($search['s_day'])) {
            $day = $search['s_day'];

            switch ($day) {
                //今日
                case 'day':
                    $today = strtotime(date('Y-m-d H:i:s'), time());
                    $start = $today - 86400;
                    break;
                //本周
                case 'week':
                    $today = strtotime(date('Y-m-d H:i:s'), time());
                    $start = $today - (6 * 86400);
                    break;
                //本月
                case 'month':
                    $today = strtotime(date('Y-m-d H:i:s'), time());
                    //本月第一天
                    $start = strtotime(date('Y-m-01'));
                    break;
            }

        }
        //时间
        $this->db->where('a.create_time >=',$start);
        $this->db->where('a.create_time <=',$today);

        //订单金额按卖家分组
        $this->db->group_by('a.sellers_id');
        $this->db->order_by('mon','DESC');
        $this->db->limit(10);

        $res = $this->db->get()->result_array();
        $res['names'] = array_column($res,'realname');
        $res['mons'] = array_column($res,'mon');

        return $res;
    }

    /**
     * @copyright 卖家订单数统计
     * @param     [type]    $id        [description]
     * @return    array     $data      结果集
     */

    public function getSellerUsers($search)
    {
        $this->db->select('count(a.id) mon,a.sellers_id,b.name realname');

        $this->db->from('order a');

        $this->db->join('user_shop b','b.uid = a.sellers_id');

        //自选时间
        if (isset($search['s_start_time2']) && isset($search['s_end_time2'])  && !empty($search['s_start_time2']) && !empty($search['s_end_time2'])){
            $search['s_day2'] = '';
            $start_time = $search['s_start_time2'];
            $end_time = $search['s_end_time2'];
            $today = !empty($end_time) ? strtotime(str_replace('／', '-', $end_time)) : strtotime(date("Y-m-d"));
            $start = !empty($start_time) ? strtotime(str_replace('／', '-', $start_time)) : ($today - 86400);
        }
        //固定时间区间
        if (isset($search['s_day2']) && !empty($search['s_day2'])) {
            $day = $search['s_day2'];
            switch ($day) {
                //今日
                case 'day2':
                    $today = strtotime(date('Y-m-d H:i:s'), time());
                    $start = $today - 86400;
                    break;
                //本周
                case 'week2':
                    $today = strtotime(date('Y-m-d H:i:s'), time());
                    $start = $today - (6 * 86400);
                    break;
                //本月
                case 'month2':
                    $today = strtotime(date('Y-m-d H:i:s'), time());
                    //本月第一天
                    $start = strtotime(date('Y-m-01'));
                    break;
            }
        }
        //时间
        $this->db->where('a.create_time >=',$start);
        $this->db->where('a.create_time <=',$today);

        //订单金额按卖家分组
        $this->db->group_by('a.sellers_id');
        $this->db->order_by('mon','DESC');
        $this->db->limit(10);
        $res = $this->db->get()->result_array();
        $res['names'] = array_column($res,'realname');
        $res['mons'] = array_column($res,'mon');

        return $res;
    }

    /**
     * @copyright 封禁或解封卖家
     * @param     [type]        $id         [description]
     * @return    array         $res        结果集
     */

    public function lockSeller($con)
    {
        $lock = $con['lock'];
        $id = $con['id'];
        $res['list'] = $this->db->update('user_shop',array( 'lock'=>$lock ),array( 'id'=>$id ));

        return $res;
    }

    /**
     * @copyright 卖家实名和健康认证
     * @param     [type]      $id        [description]
     * @return    [type]                 [description]
     */

    public function update($data)
    {
        //商铺状态
        $id = $data['id'];

        if (isset($data['is_real']) && $data['is_real'] !=''){
            $update['is_real'] = $data['is_real'];
        }
        if (isset($data['is_health']) && $data['is_health'] !=''){
            $update['is_health'] = $data['is_health'];
        }

        $res = $this->db->update($this->_table, $update, array($this->primary_key => $id));
        return $res;
    }
}