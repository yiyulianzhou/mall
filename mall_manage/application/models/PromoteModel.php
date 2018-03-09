<?php

class PromoteModel extends MY_Model
{
    // 数据库表名,表前缀已在database配置中设置

    public $_table = 'red_bag';

    // 主键
    public $primary_key = 'id';


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @DateTime  2017-3-2
     * @copyright 活动列表
     * @return    [type]      [description]
     */
    public function getPromoteList()
    {
        $this->db->select('a.id,a.uid,a.name,a.money,a.desc,a.use_user,a.use_money,a.pd_user,a.pd_money,a.create_time,a.end_time,a.status');

        $this->db->from('red_bag a');

        //计算总记录条数
        $total_rows = $this->db->count_all_results('',false);

        $this->db->join('user b','b.id = a.uid','left');

        $this->db->join('goods c','c.uid = a.uid','left');


        // 翻页设置
        $per_page   = isset($this->data['base']['per_page']) ? $this->data['base']['per_page'] : $this->data['common']['per_page'];
        $uri_segment = isset($this->data['base']['uri_segment']) ? $this->data['base']['uri_segment'] : $this->data['common']['uri_segment'];

        $curpage     = $this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 1;

        $start_page  = ($curpage && is_numeric($curpage) && $curpage > 1) ? ($curpage - 1) * $per_page : 0;


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
     * @DateTime  2017-3-6
     * @copyright 活动详情
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */
    public function PormoteDetail( $id )
    {
        $this->db->select('a.id,a.uid,a.name,a.money,a.desc,a.use_user,a.use_money,a.pd_user,a.pd_money,a.create_time,a.end_time,a.status,a.con_money');

        $this->db->from('red_bag a');

        $this->db->where( 'a.id', $id );

        $res = $this->db->get()->row_array();

        return $res;
    }

    /**
     * @DateTime  2017-3-8
     * @copyright 活动顶部统计
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function countPromote()
    {
        //今日数据成功拆包
        $this->db->select('count(id) num');
        $this->db->from('red_bag');
        $today = strtotime(date('Y-m-d'),time());
        $this->db->where('create_time >=',$today);
        $tmp = $this->db->get()->row_array();
        $data['red_bag_num'] = $tmp['num'];
        $tmp = [];
        $this->db->reset_query();

        //累计发放金额
        $this->db->select('sum(pd_money) mon');
        $this->db->from('red_bag');
        $today = strtotime(date('Y-m-d'),time());
        $this->db->where('create_time >=',$today);
        $tmp = $this->db->get()->row_array();

        if (!empty($tmp['mon'])){
            $data['red_bag_mon'] = $tmp['mon'];
        }else{
            $data['red_bag_mon'] = 0;
        }

        $tmp = [];
        $this->db->reset_query();

        return $data;
    }
    /**
     * @DateTime  2017-3-8
     * @copyright 红包发放金额统计
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */
    public function getPromoteMoney($search)
    {
        $this->db->select('money,create_time');

        $this->db->from('red_bag');
        //自选时间
        if (isset($search['s_start_time2']) && isset($search['s_end_time2']) && !empty($search['s_start_time2']) && !empty($search['s_end_time2']) ){
            $search['s_day2'] = '';
            $start_time = $search['s_start_time2'];
            $end_time = $search['s_end_time2'];
            $today = !empty($end_time) ? strtotime(str_replace('／', '-', $end_time)) : strtotime(date("Y-m-d"));
            $start = !empty($start_time) ? strtotime(str_replace('／', '-', $start_time)) : ($today - 86400);
        }

        //按固定时间搜索
        if (isset($search['s_day2']) && !empty($search['s_day2'])) {
            $day = $search['s_day2'];
            switch ($day) {
                //今日
                case 'day2':
                    $today = strtotime(date('Y-m-d'),time());
                    $start = $today - 86400;
                    break;
                //本周
                case 'week2':
                    $today = strtotime(date('Y-m-d'),time());
                    $start = $today - (6*86400);
                    break;
                //本月
                case 'month2':
                    $today = strtotime(date('Y-m-d'),time());
                    //本月第一天
                    $start = strtotime(date('Y-m-01'));
                    break;
            }
        }

        $result = $this->db->get()->result_array();

        foreach($result as $key=>$val) {
            $result[$key]['create_time'] = strtotime(date('Y-m-d',$val['create_time']));
        }

        $keyvalue = [];

        array_filter(
            $result,
            function ($item) use (&$keyvalue) {
                if (array_key_exists($item['create_time'], $keyvalue)) {
                    $keyvalue[$item['create_time']] = [
                        'create_time' => $item['create_time'],
                        'money' => $item['money'] + $keyvalue[$item['create_time']]['money']
                    ];
                    return false;
                } else {
                    $keyvalue[$item['create_time']] = [
                        'create_time' => $item['create_time'],
                        'money' => $item['money']
                    ];
                    return true;
                }
            });

        $money = array_column($keyvalue,'money','create_time');

        $res = $this->getDaysData($start,$today,$money);

        return $res;

    }


    //按选择天获取图表数据的方法

    public function getDaysData($start,$today,$money){
        // 连续的最近日期数据数组
        $res = array();
        for($i=$start; $i<=$today;)
        {
            // 当前日期递减的数据，作为数组key
            $key = date('m-d', $i);

            // 日期
            $res['days'][] = $key;

            // 订单金额，查询的数据中如果有该日期的数据则赋值，没有则为0
            $res['mons'][] = isset($money[$i]) ? $money[$i] : 0;


            $i += 86400;

        }
        return $res;
    }

    public function getRedBags($search)
    {
        $this->db->select('money,create_time');

        $this->db->from('red_bag');

        //自选时间
        if (isset($search['s_start_time']) && isset($search['s_end_time']) && !empty($search['s_start_time']) && !empty($search['s_end_time']) ){
            $search['s_day'] = '';
            $start_time = $search['s_start_time'];
            $end_time = $search['s_end_time'];
            $today = !empty($end_time) ? strtotime(str_replace('／', '-', $end_time)) : strtotime(date("Y-m-d"));
            $start = !empty($start_time) ? strtotime(str_replace('／', '-', $start_time)) : ($today - 86400);
        }

        //按固定时间搜索
        if (isset($search['s_day']) && !empty($search['s_day'])) {
            $day = $search['s_day'];
            switch ($day) {
                //今日
                case 'day':
                    $today = strtotime(date('Y-m-d'),time());
                    $start = $today - 86400;
                    break;
                //本周
                case 'week':
                    $today = strtotime(date('Y-m-d'),time());
                    $start = $today - (6*86400);
                    break;
                //本月
                case 'month':
                    $today = strtotime(date('Y-m-d'),time());
                    //本月第一天
                    $start = strtotime(date('Y-m-01'));
                    break;
            }
        }

        $result = $this->db->get()->result_array();

        foreach($result as $key=>$val) {
            $result[$key]['create_time'] = strtotime(date('Y-m-d',$val['create_time']));
        }

        $keyvalue = [];

        array_filter(
            $result,
            function ($item) use (&$keyvalue) {
                if (array_key_exists($item['create_time'], $keyvalue)) {
                    $keyvalue[$item['create_time']] = [
                        'create_time' => $item['create_time'],
                        'money' => $item['money'] + $keyvalue[$item['create_time']]['money']
                    ];
                    return false;
                } else {
                    $keyvalue[$item['create_time']] = [
                        'create_time' => $item['create_time'],
                        'money' => $item['money']
                    ];
                    return true;
                }
            });

        $money = array_column($keyvalue,'money','create_time');

        $res = $this->getDaysData($start,$today,$money);


        return $res;
    }
}