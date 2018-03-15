<?php

/**
 * @Description: 首页模型
 */
class HomeModel extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @function getData        各表新增数据汇总
     * @return   array $data    结果集
     */
    public function getData()
    {
        $count = array('new_seller'=>0,'new_buyer'=>0,'new_order'=>0,'new_goods'=>0);

        // 新增买家
        $this->db->select('count(id) as buyers');
        $this->db->from('user');

        $today = strtotime(date('Y-m-d'));

        $this->db->where('create_time >= ', $today);
        $this->db->where('id >',10);
        $tmp = $this->db->get()->row_array();
        $count['new_buyer'] = $tmp['buyers'];
        $tmp = [];
        $this->db->reset_query();

    	// 新增卖家
    	$this->db->select('count(id) as sellers');
        $this->db->from('user_shop');

        $today = strtotime(date('Y-m-d'));

        $this->db->where('create_time >= ', $today);
        //10以内系统用户
        $this->db->where('uid >',10);
        $tmp = $this->db->get()->row_array();
        $count['new_seller'] = $tmp['sellers'];
        $tmp = [];
        $this->db->reset_query();



        //新增订单
        $this->db->select('count(id) as orders');
        $this->db->from('order');

        $today = strtotime(date('Y-m-d'));
        $this->db->where('create_time >= ', $today);
        $tmp = $this->db->get()->row_array();
        $count['new_order'] = $tmp['orders'];
        $tmp = [];
        $this->db->reset_query();

        //新增商品
        $this->db->select('count(id) as goods');
        $this->db->from('goods');
        $this->db->where('state !=',3);

        $today = strtotime(date('Y-m-d'));
        $this->db->where('add_time >= ', $today);

        $tmp = $this->db->get()->row_array();
        $count['new_goods'] = $tmp['goods'];
        $tmp = [];

        $res['list'] = $count;
        $this->db->reset_query();

        return $res;
    }

    /**
     * @function getSeller      获取商铺销售金额排行
     * @return   array $data    结果集
     */
    public function getSeller()
    {
        //卖家top5数据
        $this->db->select('sum(shop_order.money) as mon,user_shop.shop,user_shop.address_id',FALSE);
        $this->db->from('order');
        $today = strtotime(date('Y-m-d'));
        //$this->db->where('order.create_time >= ',$today);

        //查出卖家店铺的相关信息
        $this->db->join('user_shop','user_shop.uid = order.sellers_id','left');

        $this->db->group_by('order.sellers_id');
        //计算订单总金额前5的卖家
        $this->db->order_by('mon','desc')->limit(5);
        $res = $this->db->get()->result_array();
        $res['mon'] = array_column($res,'mon');
        $res['shop'] = array_column($res,'shop');
        return $res;
    }

    /**
     * @function getBuyer       获取买家消费金额排行
     * @return   array $data    结果集
     */

    public function getBuyer()
    {
        //买家top5数据
        $this->db->select('sum(shop_order.money) as mon,user.username,user.districtId',FALSE);
        $this->db->from('order');
        $today = strtotime(date('Y-m-d'));
        //$this->db->where('order.create_time >= ',$today);

        //查出买家的相关信息
        $this->db->join('user','user.id = order.buyer_id','left');
        $this->db->group_by('order.buyer_id');

        //计算订单消费总金额前5的买家
        $this->db->order_by('mon','desc')->limit(5);
        $res = $this->db->get()->result_array();

        $res['mon'] = array_column($res,'mon');
        $res['username'] = array_column($res,'username');
        return $res;
    }


    /**
     * @function getItems       获取商品类目销量排行
     * @return   array $data    结果集
     */
    public function getItems ()
    {
        //商品类目top5数据
        $this->db->select('sum(shop_goods_data.total_money) as mon,category.name',FALSE);
        $this->db->from('goods_data');
        $today = strtotime(date('Y-m-d'));
        //今日数据
        //$this->db->where('logdate >= ',$today);

        //查出商品的相关信息
        $this->db->join('category','goods_data.category = category.id','left');
        $this->db->group_by('goods_data.category');
        //计算销售总金额前5的商品类目
        $this->db->order_by('mon','desc')->limit(5);
        $res = $this->db->get()->result_array();
        $res['mons'] = array_column($res,'mon');
        $res['names'] = array_column($res,'name');
        return $res;
    }

    /**
     * @function getGoods       获取商品销售金额排行信息
     * @return   array $data    结果集
     */
    public function getGoods ()
    {
        $res = [];
        //商品销量top5数据
        $this->db->select('sum(a.amount) as total,sum(a.total_money) as mon,b.name',FALSE);
        $this->db->from('goods_data a');
        $this->db->join('goods b','b.id = a.gid','left');
        //查出有该商品订单的相关信息
        $today = strtotime(date('Y-m-d'));
        //今日数据
        //$this->db->where('a.logdate >= ',$today);

        $this->db->group_by('a.gid');

        //计算商品销量前5的商品，按销量
        $this->db->order_by('total','desc')->limit(5);
        $res = $this->db->get()->result_array();

        $res['mons'] = array_column($res,'mon');
        $res['names'] = array_column($res,'name');
        return $res;
    }

    /**
     * @function showTips       获取用户反馈记录
     * @return   array $data    结果集
     */

    public function showTips ()
    {
        $data = [];
        //查询用户反馈表
        $this->db->select('feedback.body,feedback.time,user.username ',FALSE);
        $this->db->from('feedback');
        $this->db->join('user','user.id = feedback.uid ','left');

        $today = strtotime(date('Y-m-d'));
        //$this->db->where('order.time >= ',$today);
        $this->db->order_by('time','DESC');

        $total_rows = $this->db->count_all_results('', false);


        // 翻页设置
        $per_page   = isset($this->data['base']['per_page1']) ? $this->data['base']['per_page1'] : $this->data['common']['per_page1'];
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
        // 总页数页码集合json数据
        $data['pageNumbers'] = $data['pages'] > 1 ? json_encode(range(1, $data['pages'])) : 1;

        return $data;
    }

    /**
     * @function cashApply          获取用户提现申请
     * @return   array $data        结果集
     */

    public function cashApply ()
    {
       //查询用户余额表
        $data = [];
        $this->db->select('user_money.id,user_money.uid,user_money.create_time,user_money.money,user.username',FALSE);
        $this->db->from('user_money');
        $this->db->join('user','user.id = user_money.uid','left');
        $today = strtotime(date('Y-m-d'));

        //$this->db->where('user_money.create_time >=',$today);
        $this->db->order_by('create_time','DESC');

        //审核状态为1,待处理
        $this->db->where('user_money.status = ',1);
        //计算总记录条数
        $total_rows = $this->db->count_all_results('',false);
        // 翻页设置
        $per_page   = isset($this->data['base']['per_page1']) ? $this->data['base']['per_page1'] : $this->data['common']['per_page1'];
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
        // 总页数页码集合json数据
        $data['pageNumbers'] = $data['pages'] > 1 ? json_encode(range(1, $data['pages'])) : 1;

        return $data;
    }

}
