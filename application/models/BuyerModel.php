<?php

class BuyerModel extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @DateTime  2018-3-2
     * @copyright 买家顶部统计
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function countBuyer()
    {
        //新增买家
        $this->db->select('count(id) as num');
        $this->db->from('user');
        //买家
        $today = strtotime(date('Y-m-d'));

        $this->db->where('create_time >=',$today);
        //10以内为系统用户
        $this->db->where('id >',10);

        $tmp = $this->db->get()->row_array();
        $data['new_buyers'] = $tmp['num'];
        $tmp =[];
        $this->db->reset_query();
        //买家总数
        $this->db->select('count(id) as total');
        $this->db->from('user');

        //10以内为系统用户
        $this->db->where('id >',10);

        $tmp = $this->db->get()->row_array();
        $data['total_buyers'] = $tmp['total'];
        $tmp =[];
        $this->db->reset_query();

        return $data;
    }


    /**
     * @DateTime  2018-3-5
     * @copyright 买家列表
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function getBuyerList()
    {
        $this->db->select('a.id,a.username,a.avatarUrl,c.title con_address,a.gender,a.create_time,a.phone,a.money,a.consum_money,a.username,a.status,count(b.id) order_num');

        $this->db->from('user a');

        //10以内系统用户
        $this->db->where('a.id >',10);

        //计算总记录条数
        $total_rows = $this->db->count_all_results('',false);

        $this->db->join('order b','b.buyer_id = a.id','left');

        $this->db->join('building c','c.id = a.districtId','left');


        // 翻页设置
        $per_page   = isset($this->data['base']['per_page']) ? $this->data['base']['per_page'] : $this->data['common']['per_page'];
        $uri_segment = isset($this->data['base']['uri_segment']) ? $this->data['base']['uri_segment'] : $this->data['common']['uri_segment'];

        $curpage     = $this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 1;

        $start_page  = ($curpage && is_numeric($curpage) && $curpage > 1) ? ($curpage - 1) * $per_page : 0;

        $this->db->group_by('a.id');

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
     * @DateTime  2018-3-2
     * @copyright 买家消费金额统计
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function getBuyerCost($search)
    {
        $this->db->select('sum(a.money) mon,b.username');

        $this->db->from('order a');

        $this->db->join('user b','b.id = a.buyer_id','left');

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
        //已完成的订单
        $this->db->where('a.status = ',9);

        $this->db->group_by('a.buyer_id');
        $this->db->order_by('mon','DESC');
        $this->db->limit(10);
        $res = $this->db->get()->result_array();
        $res['mons'] = array_column($res,'mon');
        $res['names'] = array_column($res,'username');
        return $res;
    }

    /**
     * @DateTime  2018-3-2
     * @copyright 买家订单数量排行
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function getBuyerOrders($search)
    {
        $this->db->select('count(a.id) num, b.username');
        $this->db->from('order a');
        $this->db->where('a.id >',10);

        $this->db->join('user b','b.id = a.buyer_id','left');

        //自选时间
        if (isset($search['s_start_time2']) && isset($search['s_end_time2']) && !empty($search['s_start_time2']) && !empty($search['s_end_time2'])){
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

        $this->db->group_by('a.buyer_id');

        $this->db->order_by('num','DESC');

        $this->db->limit(5);

        $res = $this->db->get()->result_array();

        $res['mons'] = array_column($res,'num');

        $res['names'] = array_column($res,'username');

        return $res;
    }

    /**
     * @copyright 封禁或解封买家
     * @param     [type]      $id        [description]
     * @return    [type]                 [description]
     */

    public function lockBuyer($con)
    {
        $status = $con['status'];
        $id = $con['id'];
        $res['list'] = $this->db->update('user',array( 'status'=>$status ),array( 'id'=>$id ));

        return $res;
    }

    /**
     * @DateTime  2017-3-5
     * @copyright 买家详情
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function buyerDetail( $id )
    {
        $this->db->select('a.id,a.username,a.avatarUrl,a.districtId,a.gender,a.create_time,a.phone,a.money,a.status,b.title con_address');

        $this->db->from('user a');

        $this->db->join('building b','b.id = a.districtId','left');

        $this->db->where( 'a.id', $id );

        $res = $this->db->get()->row_array();

        return $res;
    }
}
