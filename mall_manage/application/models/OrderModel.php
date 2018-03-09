<?php

/**
 * 订单管理
 */
class OrderModel extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @copyright 订单详情
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */
    public function orderDetail( $id )
    {
        $this->db->select( 'a.*,b.username as buyerName,c.name as shipName,c.phone as shipPhone,d.name,e.name as goodsName,f.name as sellerName,g.address' );
        $this->db->from( 'order a' );
        $this->db->join('user b','b.id = a.buyer_id','left');
        $this->db->join('user_address c','c.id = a.address_id','left');
        $this->db->join('goods_model d','d.id = a.geid','left');
        $this->db->join('goods e','e.id = d.gid','left');
        $this->db->join('user_shop f','f.id = a.sellers_id','left');
        $this->db->join('building g','g.id = c.address_id','left');
        $this->db->where( 'a.id', $id );
        $res = $this->db->get()->row_array();
        return $res;
    }

    /**
     * @copyright 删除订单
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function delete( $id )
    {
        $res = $this->db->update('order',array('status'=>'11'),array('id'=>$id));

        if($res){
            return true;
        }

    }

    /**
     * @copyright 订单列表数据
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function getOrderList($search)
    {
        $this->db->select( 'a.*,b.username,d.name gname,e.name goods_name,f.shop' );
        $this->db->from( 'order a' );

        $this->db->join('user b','b.id = a.buyer_id','left');

        $this->db->join('goods_model d','d.id = a.geid','left');

        $this->db->join('goods e','e.id = d.gid','left');

        $this->db->join('user_shop f','f.uid = a.sellers_id','left');

        $this->db->order_by('a.create_time','DESC');

        if (isset($search['state']) && $search['state'] != ''){
            $status = $search['state'];
            $this->db->where('a.status = ',$status);
        }
        $this->db->where('a.status !=',11);

        //计算总记录条数
        $total_rows = $this->db->count_all_results('',false);
        // 翻页设置
        $per_page   = isset($this->data['base']['per_page']) ? $this->data['base']['per_page'] : $this->data['common']['per_page'];
        $uri_segment = isset($this->data['base']['uri_segment']) ? $this->data['base']['uri_segment'] : $this->data['common']['uri_segment'];
        $curpage     = $this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 1;

        $start_page  = ($curpage && is_numeric($curpage) && $curpage > 1) ? ($curpage - 1) * $per_page : 0;

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
     * @copyright 订单金额按日期统计
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function getOrderData ($search)

    {
        $this->db->select('a.money,a.create_time');
        $this->db->from('order a');
        //订单状态为已完成或待发货
        $where ='a.status =7 or a.status=9';
        $this->db->where($where);
        $this->db->join('goods b','b.id = a.gid','left');
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

        //按商品分类条件搜索
        if (isset($search['s_order_cate']) && !empty($search['s_order_cate'])){
            $cate = $search['s_order_cate'];
            $this->db->where('b.category =',$cate);
        }

        $this->db->where('a.create_time >=',$start);
        $this->db->where('a.create_time <=',$today);

        $this->db->order_by('a.money','DESC');


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
    public function getRedBags($search)
    {
        $this->db->select('a.money,a.create_time');
        $this->db->from('order a');
        //订单状态为已完成或待发货
        $where ='a.status =7 or a.status=9';
        $this->db->where($where);
        $this->db->join('goods b','b.id = a.gid','left');
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

        //按商品分类条件搜索
        if (isset($search['s_order_cate']) && !empty($search['s_order_cate'])){
            $cate = $search['s_order_cate'];
            $this->db->where('b.category =',$cate);
        }

        $this->db->where('a.create_time >=',$start);
        $this->db->where('a.create_time <=',$today);

        $this->db->order_by('a.money','DESC');


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

    /**
     * @copyright 订单单条详情数据
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function getOrderInfo($id)
    {

        $this->db->select( 'a.pay_type,a.money,a.money_other,a.money_redbag,a.amount,a.create_time,a.send_time,a.cont,a.order_id,a.logi,a.status,b.username,d.name gname,d.sales_price,e.name goods_name,f.shop,g.name receiver,h.address,g.phone,og.gid,og.geid,og.amount ogamout,og.money ogmoney' );

        $this->db->from( 'order a' );
        $this->db->join('order_goods og','og.order_id = a.id');
        $this->db->join('user b','b.id = a.buyer_id','left');

        $this->db->join('goods_model d','d.id = og.geid','left');
        $this->db->join('goods e','e.id = og.gid','left');
        $this->db->join('user_shop f','f.uid = a.sellers_id','left');
        $this->db->join('user_address g','g.uid = a.buyer_id','left');
        $this->db->join('building h','h.id = a.address_id','left');

        $this->db->where('a.id = ',$id);
        $data = $this->db->get()->result_array();
        return $data;
    }
}
