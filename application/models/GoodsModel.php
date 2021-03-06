<?php

/**
 * 商品管理
 */

class GoodsModel extends MY_Model
{

    // 数据库表名,表前缀已在database配置中设置
    public $_table = 'goods';

    // 主键
    public $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @copyright 商品审核
     * @param     [type]      $id     [description]
     * @param     [type]      $state [description]
     * @return    [type]              [description]
     */

    public function goodsVarify( $id, $state, $verify_remark )
    {
        $verify_user = $this->user_session['uid'];
        $verify_time = time();
        $res = $this->db->update( 'goods', array('state'=>$state,'verify_user'=>$verify_user,'verify_time'=>$verify_time,'verify_remark'=>$verify_remark),array('id'=>$id) );
        if($res){
            return true;
        }
    }

    /**
     * @copyright 商品顶部统计信息
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function countGoodsData()
    {
        //新增商品
        $this->db->select('count(id) new_goods');
        $this->db->from('goods');
        $today = strtotime(date('Y-m-d'));
        $this->db->where('add_time >=',$today);
        $tmp = $this->db->get()->row_array();

        $res['list']['new_goods'] = $tmp['new_goods'];
        $tmp = [];
        $this->db->reset_query();

        //商品总数
        $this->db->select('count(id) total');
        $this->db->from('goods');
        $tmp = $this->db->get()->row_array();
        $res['list']['goods_total'] = $tmp['total'];
        $tmp = [];
        $this->db->reset_query();

        //商品类目新增

        $this->db->select('count(category) num');
        $this->db->from('goods');
        $today = strtotime(date('Y-m-d'));
        $this->db->where('add_time >=',$today);
        $this->db->group_by('category');
        $res1 = $this->db->get()->result_array();
        $tmp = count($res1);
        $res['list']['goods_item'] = $tmp;
        $tmp = [];
        $this->db->reset_query();
        return $res;

    }

    /**
     * @copyright 商品列表
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function getGoodsList($search)
    {
        $this->db->select('a.id,a.name,a.state,a.add_time,a.sales_type,a.logistics,a.category,c.name cname ,c.sales_price,d.shop,e.img');

        $this->db->from('goods a');

        //按状态进行筛选
        if (isset($search['state']) && $search['state'] !=''){
            $state = $search['state'];
            $this->db->where('a.state = ',$state);
        }

        $this->db->join('goods_model c','c.gid = a.id','left');
        $this->db->join('user_shop d','d.uid = a.uid','left');
        $this->db->join('goods_img e','e.gid = a.id','left');

        $this->db->where('e.number = ',1);
        $this->db->order_by('a.add_time', 'DESC');

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
     * @copyright 单品销售信息
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */
    public function getSalesData($search)
    {

        $this->db->select('a.amount,a.total_money,a.logdate,b.name');
        $this->db->from('goods_data a');
        $this->db->join('goods b','b.id = a.gid','left');
        //自选时间
        if (!empty($search['s_start_time']) && !empty($search['s_end_time']) && !empty($search['s_start_time']) && !empty($search['s_end_time'])) {
            $search['s_day'] = '';
            $start_time = $search['s_start_time'];
            $end_time = $search['s_end_time'];
            $today = !empty($end_time) ? strtotime(str_replace('／', '-', $end_time)) : strtotime(date("Y-m-d"));
            $start = !empty($start_time) ? strtotime(str_replace('／', '-', $start_time)) : ($today - 86400);

        }

        //按天搜索
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
        $this->db->where('logdate >=',$start);
        $this->db->where('logdate <=',$today);
        $this->db->order_by('total_money','DESC');
        $this->db->limit(10);
        $res = $this->db->get()->result_array();

        $res['names'] = array_column($res, 'name');
        $res['amount'] = array_column($res, 'amount');
        $res['mons'] = array_column($res, 'total_money');
        $res['logdate'] = array_column($res, 'logdate');
        return $res;

    }

    /**
     * @copyright 类目销售信息
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */
    public function getCatesData($search)
    {

        $this->db->select('sum(a.total_money) as mon,a.category,a.logdate,b.name cate_name');
        $this->db->from('goods_data a');
        $this->db->join('category b','b.id = a.category','left');
        //自选时间
        if (!empty($search['s_start_time2']) && !empty($search['s_end_time2'])) {
            $search['s_day2'] = '';
            $start_time = $search['s_start_time2'];
            $end_time = $search['s_end_time2'];
            $today = !empty($end_time) ? strtotime(str_replace('／', '-', $end_time)) : strtotime(date("Y-m-d"));
            $start = !empty($start_time) ? strtotime(str_replace('／', '-', $start_time)) : ($today - 86400);

        }

        //按天搜索
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
        $this->db->where('logdate >=',$start);
        $this->db->where('logdate <=',$today);
        $this->db->group_by('a.category');
        $this->db->order_by('mon','DESC');
        $this->db->limit(10);
        $res = $this->db->get()->result_array();
        $res['cates'] = array_column($res, 'cate_name');
        $res['mons'] = array_column($res, 'mon');
        $res['logdate'] = array_column($res, 'logdate');
        return $res;
    }

    /**
     * @copyright 单品访问排行信息
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */
    public function getVisitData($search)
    {
        $this->db->select('name,access');
        $this->db->from('goods');

        //自选时间
        if (!empty($search['s_start_time3']) && !empty($search['s_end_time3'])) {
            $search['s_day3'] = '';
            $start_time = $search['s_start_time3'];
            $end_time = $search['s_end_time3'];
            $today = !empty($end_time) ? strtotime(str_replace('／', '-', $end_time)) : strtotime(date("Y-m-d"));
            $start = !empty($start_time) ? strtotime(str_replace('／', '-', $start_time)) : ($today - 86400);
        }

        //按天搜索
        if (isset($search['s_day3']) && !empty($search['s_day3'])) {
            $day = $search['s_day3'];
            switch ($day) {
                //今日
                case 'day3':
                    $today = strtotime(date('Y-m-d'),time());
                    $start = $today - 86400;
                    break;
                //本周
                case 'week3':
                    $today = strtotime(date('Y-m-d'),time());
                    $start = $today - (6*86400);
                    break;
                //本月
                case 'month3':
                    $today = strtotime(date('Y-m-d'),time());
                    //本月第一天
                    $start = strtotime(date('Y-m-01'));
                    break;
            }
        }
        //$this->db->where('add_time >=',$start);
        //$this->db->where('add_time <=',$today);

        $this->db->order_by('access','DESC');
        $this->db->limit(5);
        $res = $this->db->get()->result_array();

        $res['names'] = array_column($res, 'name');
        $res['access'] = array_column($res, 'access');
        return $res;
    }

    /**
     * @copyright 单品分享统计信息
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function getShareData($search)
    {
        $this->db->select('name,share');
        $this->db->from('goods');

        //自选时间
        if (!empty($search['s_start_time4']) && !empty($search['s_end_time4'])) {
            $search['s_day4'] = '';
            $start_time = $search['s_start_time4'];
            $end_time = $search['s_end_time4'];
            $today = !empty($end_time) ? strtotime(str_replace('／', '-', $end_time)) : strtotime(date("Y-m-d"));
            $start = !empty($start_time) ? strtotime(str_replace('／', '-', $start_time)) : ($today - 86400);

        }

        //按天搜索
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
        //$this->db->where('add_time >=',$start);
        //$this->db->where('add_time <=',$today);
        $this->db->order_by('share','DESC');
        $this->db->limit(5);
        $res = $this->db->get()->result_array();
        $res['names'] = array_column($res, 'name');
        $res['shares'] = array_column($res, 'share');
        return $res;
    }

    /**
     * @copyright 单条商品详情
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function getItemById($id)
    {
        $this->db->select('a.id,a.name,a.state,a.info,a.direct_sales,a.add_time,a.sales_type,a.logistics,a.category,c.sales_price,d.shop,e.img');
        $this->db->from('goods a');
        $this->db->join('goods_model c','c.gid = a.id','left');
        $this->db->join('user_shop d','d.uid = a.uid','left');
        $this->db->join('goods_img e','e.gid = a.id','left');
        $this->db->where('a.id = ',$id);
        $res = $this->db->get()->row_array();
        return $res;
    }

    /**
     * @copyright 更新操作
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function update($data)
    {
        //商品状态
        //$config['goods']['state'] = [1=>"待审核",2=>"已下架",3=>"审核未通过",5=>"销售中",90=>"团购中",91=>"团购结束"];
        $id = $data['id'];
        $update['verify_time'] = $data['verify_time'];
        $update['verify_user'] = $data['verify_user'];
        $update['verify_remark'] = $data['verify_remark'];
        $update['state'] = $data['state'];
        $res = $this->db->update($this->_table, $update, array($this->primary_key => $id));
        return $res;
    }

    /**
     * @copyright 商品类目列表
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function getCategoryList($search)
    {
        $this->db->select('a.id,a.uid,a.name,a.info,a.state,count(b.goods_id) as goods_num');
        $this->db->from('category a');

        //按状态进行筛选
        if (isset($search['state']) && $search['state']!=''){
            $state = $search['state'];
            $this->db->where('a.state = ',$state);
        }
        //计算总记录条数
        $total_rows = $this->db->count_all_results('',false);
        $this->db->join('category_goods b','b.cate_id = a.id','left');

        // 翻页设置
        $per_page   = isset($this->data['base']['per_page']) ? $this->data['base']['per_page'] : $this->data['common']['per_page'];
        $uri_segment = isset($this->data['base']['uri_segment']) ? $this->data['base']['uri_segment'] : $this->data['common']['uri_segment'];

        $curpage     = $this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 1;

        $start_page  = ($curpage && is_numeric($curpage) && $curpage > 1) ? ($curpage - 1) * $per_page : 0;

        $this->db->group_by('a.id');

        $this->db->order_by('a.id','DESC');

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
     * @copyright 分类详情
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */
    public function getCateItem($id)
    {
        $this->db->select('a.id,a.uid,a.name,a.info,a.state,count(b.goods_id) as goods_num');
        $this->db->from('category a');
        $this->db->join('category_goods b','b.cate_id = a.id','left');
        $this->db->where('a.id = ',$id);
        $data = $this->db->get()->row_array();
        return $data;
    }

    //执行添加操作
    public function addCatedata($data)
    {
        $data['uid'] = 1;
        $res = $this->db->insert('category', $data);
        return $this->db->insert_id();

    }

}
