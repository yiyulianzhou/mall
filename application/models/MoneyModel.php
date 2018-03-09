<?php
date_default_timezone_set('PRC');
/**
 * 财富管理
 */
class MoneyModel extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @copyright 提现卖家列表
     * @param     [type]      $username [description]
     * @param     [type]      $page     [description]
     * @return    [type]                [description]
     */
	public function sellerCash($search)
	{
		$this->db->select('a.*,b.username,b.avatarUrl,c.realname,d.realname as payName');
		$this->db->from('user_money a');
		$this->db->join('user b','b.id=a.uid','left');
		$this->db->join('admin c','c.id=a.verify_user','left');
		$this->db->join('admin d','d.id=a.pay_user','left');
		$this->db->where('b.is_sellers','1');

		//按状态进行筛选
		if (!empty($search['status'])){
			$state = $search['status'];
			$this->db->where('a.status',$state);
		}

		//卖家
		$this->db->where('a.user_type','2');
		//提现
		$this->db->where('a.type','1');

		$this->db->order_by('id', 'ASC');

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

		foreach ($data['list'] as $key=>$val)
		{

			$data['list'][$key]['create_time'] = date('Y年m月d日 H:i:s', $val['create_time']);
			if (!empty($data['list'][$key]['verify_time'] )) $data['list'][$key]['verify_time'] = date('Y年m月d日 H:i:s', $val['verify_time']);
			if (!empty($data['list'][$key]['pay_time'] )) $data['list'][$key]['pay_time'] = date('Y年m月d日 H:i:s', $val['pay_time']);

		}

		return $data;
	}
    /**
     * @copyright 买家提现
     * @param     [type]      $username [description]
     * @param     [type]      $page     [description]
     * @return    [type]                [description]
     */
	public function buyerCash($search)
	{
		$this->db->select('a.*,b.username,b.avatarUrl,c.realname,d.realname as payName');
		$this->db->from('user_money a');
		$this->db->join('user b','b.id=a.uid','left');
		$this->db->join('admin c','c.id=a.verify_user','left');
		$this->db->join('admin d','d.id=a.pay_user','left');
		//是否为卖家
		$this->db->where('b.is_sellers','0');

		//按状态进行筛选
		if (!empty($search['status'])){
			$state = $search['status'];
			$this->db->where('a.status',$state);
		}

		//买家
		$this->db->where('a.user_type','1');
		//提现
		$this->db->where('a.type','1');

		$this->db->order_by('id', 'ASC');

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

		foreach ($data['list'] as $key=>$val)
		{

			$data['list'][$key]['create_time'] = date('Y年m月d日 H:i:s', $val['create_time']);
			if (!empty($data['list'][$key]['verify_time'] )) $data['list'][$key]['verify_time'] = date('Y年m月d日 H:i:s', $val['verify_time']);
			if (!empty($data['list'][$key]['pay_time'] )) $data['list'][$key]['pay_time'] = date('Y年m月d日 H:i:s', $val['pay_time']);

		}

		return $data;
	}
    /**
     * @copyright 提现审核
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */
    public function verify( $id, $status, $verify )
    {
    	if( $verify == 'verify' ){
    		if( $status == 1 ){
    			return true;
    		}
            //审核不通过
            if($status == 3){
                $data['verify_user'] = $this->user_session['uid'];
                $data['verify_time'] = time();
                $data['status'] = $status;
                $this->db->select('money,uid');
                $this->db->from('user_money');
                $this->db->where('id',$id);
                $userMoney = $this->db->get()->row_array();
                $money=$userMoney['money'];
                $uid=$userMoney['uid'];
                $this->db->trans_begin();
                $sql = " update shop_user set money=money+$money where id = $uid  ";
                $update = $this->db->query($sql);
                $res = $this->db->update('user_money',$data,array('id'=>$id));
                if ($this->db->trans_status() === FALSE)
                {
                    $this->db->trans_rollback();
                }
                else
                {
                    $this->db->trans_commit();
                    return true;
                }

            }
    		$data['verify_user'] = $this->user_session['uid'];
    		$data['verify_time'] = time();
    		$data['status'] = $status;
    	}else{
    		if( $status == 12 ){
    			return true;
    		}
    		$data['pay_user'] = $this->user_session['uid'];
    		$data['pay_time'] = time();
    		$data['status'] = $status;
    	}
    	$res = $this->db->update('user_money',$data,array('id'=>$id));
    	if($res){
    		return true;
    	}
    }
    /**
     * @copyright 充值列表
     * @param     [type]      $username [description]
     * @param     [type]      $page     [description]
     * @return    [type]                [description]
     */
    public function buyerRecharge()
    {
		$this->db->select('a.*,b.username,b.avatarUrl');
		$this->db->from('user_money a');
		$this->db->join('user b','b.id=a.uid','left');

		//买家
		$this->db->where('a.user_type','1');

		//充值
		$this->db->where('a.type','2');

		$this->db->order_by('id', 'ASC');

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

		foreach ($data['list'] as $key=>$val)
		{

			$data['list'][$key]['create_time'] = date('Y年m月d日 H:i:s', $val['create_time']);
		}

		return $data;
    }
    /**
     * @copyright 详情
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */
    public function detail($id)
    {
    	$this->db->select('a.*,b.username,b.avatarUrl,c.realname,d.realname as payName,e.type as accountType,e.account');
    	$this->db->from('user_money a');
    	$this->db->join('user b','b.id=a.uid','left');
    	$this->db->join('admin c','c.id=a.verify_user','left');
    	$this->db->join('admin d','d.id=a.pay_user','left');
    	$this->db->join('user_account e','e.id=a.account_id','left');
    	$this->db->where('a.id',$id);
    	$res = $this->db->get()->row_array();
    	return $res;
    }

	/**
	 * @copyright 卖家提现金额统计
	 * @param     [type]      		[description]
	 * @return    [type]          	[description]
	 */
	public function getSellerCash ($search)
	{
		//提现金额统计
		$this->db->select('sum(money) as mon,logdate',FALSE);

		$this->db->from('user_money');
		$this->db->where('user_type = ',2);
		$this->db->where('type = ',1);
		//$this->db->where('create_time <= ',$today);
		if (!empty($search['s_start_time']) && !empty($search['s_end_time'])) {
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



		//按日期分组
		$this->db->group_by('logdate');

		//计算提现金额
		$result = $this->db->get()->result_array();

		$money = array_column($result,'mon','logdate');

		$res = $this->getDaysData($start,$today,$money);


		return $res;
	}


	/**
	 * @copyright 买家提现金额统计
	 * @param     [type]      		[description]
	 * @return    [type]          	[description]
	 */
	public function getBuyerCash ($search)
	{
		//提现金额统计
		$this->db->select('sum(money) as mon,logdate',FALSE);

		$this->db->from('user_money');
		//用户类型为买家
		$this->db->where('user_type = ',1);
		$this->db->where('type = ',1);
		//$this->db->where('create_time <= ',$today);
		if (!empty($search['s_start_time']) && !empty($search['s_end_time'])) {
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



		//按日期分组
		$this->db->group_by('logdate');

		//计算提现金额
		$result = $this->db->get()->result_array();

		$money = array_column($result,'mon','logdate');

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

			// 提现金额，查询的数据中如果有该日期的数据则赋值，没有则为0
			$res['mons'][] = isset($money[$i]) ? $money[$i] : 0;


			$i += 86400;

		}
		return $res;
	}

	/**
	 * @copyright 提现卖家人数数据统计
	 * @param     [type]       		[description]
	 * @return    [type]        	[description]
	 */
	public function getCashSeller ($search){
		//提现卖家数据
		$this->db->select('sum(shop_user_money.money) as mon,user.username',FALSE);

		$this->db->from('user_money');

		$this->db->where('user_type = ',2);
		$this->db->where('type = ',1);

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
		$this->db->where('user_money.create_time >= ', $start);
		$this->db->where('user_money.create_time <= ', $today);
		//查出卖家店铺的相关信息
		$this->db->join('user','user.id = user_money.uid','left');

		$this->db->group_by('user_money.uid');
		//计算提现金额卖家
		$this->db->order_by('mon','desc');
		$res = $this->db->get()->result_array();
		$res['mon'] = array_column($res,'mon');
		$res['username'] = array_column($res,'username');
		return $res;
	}

	/**
	 * @copyright 提现买家人数数据统计
	 * @param     [type]       		[description]
	 * @return    [type]        	[description]
	 */
	public function getCashBuyer ($search){
		//提现卖家数据
		$this->db->select('sum(shop_user_money.money) as mon,user.username',FALSE);

		$this->db->from('user_money');

		//用户类型为买家
		$this->db->where('user_type = ',1);
		//提现
		$this->db->where('type = ',1);

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
		$this->db->where('user_money.create_time >= ', $start);
		$this->db->where('user_money.create_time <= ', $today);
		//查出卖家店铺的相关信息
		$this->db->join('user','user.id = user_money.uid','left');

		$this->db->group_by('user_money.uid');
		//计算买家提现金额
		$this->db->order_by('mon','desc');
		$res = $this->db->get()->result_array();
		$res['mon'] = array_column($res,'mon');
		$res['username'] = array_column($res,'username');
		return $res;
	}

	/**
	 * @copyright 买家充值金额统计
	 * @param     [type]       		[description]
	 * @return    [type]        	[description]
	 */

	public function getBuyerRecharge($search)
	{
		//提现金额统计
		$this->db->select('sum(money) as mon,logdate',FALSE);

		$this->db->from('user_money');
		//用户类型为买家
		$this->db->where('user_type = ',1);

		$this->db->where('type = ',2);
		//$this->db->where('create_time <= ',$today);
		if (!empty($search['s_start_time']) && !empty($search['s_end_time'])) {
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



		//按日期分组
		$this->db->group_by('logdate');

		//计算提现金额
		$result = $this->db->get()->result_array();

		$money = array_column($result,'mon','logdate');

		$res = $this->getDaysData($start,$today,$money);

		return $res;
	}

	/**
	 * @copyright 买家充值人数统计
	 * @param     [type]       		[description]
	 * @return    [type]        	[description]
	 */
	public function getRechargeBuyer ($search){
		//充值买家数据
		$this->db->select('sum(shop_user_money.money) as mon,user.username',FALSE);

		$this->db->from('user_money');

		//用户类型为买家
		$this->db->where('user_type = ',1);
		//充值
		$this->db->where('type = ',2);

		if (!empty($search['s_start_time2']) && !empty($search['s_end_time2'])) {
			$search['s_day'] = '';
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
//		//充值时间
//		$this->db->where('user_money.create_time >= ', $start);
//		$this->db->where('user_money.create_time <= ', $today);
		//查出买家个人的相关信息
		$this->db->join('user','user.id = user_money.uid','left');

		$this->db->group_by('user_money.uid');
		//计算充值金额
		$this->db->order_by('mon','desc');

		$res = $this->db->get()->result_array();

		$res['mon'] = array_column($res,'mon');
		$res['username'] = array_column($res,'username');

		return $res;
	}
	/**
	 * @copyright 卖家头部统计数据
	 * @param     [type]       		[description]
	 * @return    [type]        	[description]
	 */

	public function countSellerCash ()
	{
		$data = ['totalMoney'=>0, 'totalTimes'=>0, 'totalPeople'=>0];

		//1.统计卖家提现的总金额
		$this->db->select('sum(money) as mon',FALSE);
		$this->db->from('user_money');

		//操作类型为提现
		$this->db->where('type = ' ,1);

		//用户类型为卖家
		$this->db->where('user_type = ',2);

		//今日数据
		$today = strtotime(date('Y-m-d'));

		$this->db->where('create_time <= ',$today);

		$tmp = $this->db->get()->row_array();

		$data['totalMoney'] = $tmp['mon'];
		$tmp = [];

		//2.统计卖家提现的总次数
		$this->db->select('count(*) as times',FALSE);

		$this->db->from('user_money');
		//操作类型为提现
		$this->db->where('type = ' ,1);

		//用户类型为卖家
		$this->db->where('user_type = ',2);

		//今日数据
		$this->db->where('create_time <= ',$today);

		$tmp = $this->db->get()->row_array();

		$data['totalTimes'] = $tmp['times'];
		$tmp = [];

		//3.统计卖家提现的总人数
		$this->db->select('id',FALSE);
		$this->db->from('user_money');

		//操作类型为提现
		$this->db->where('type = ' ,1);

		//用户类型为卖家
		$this->db->where('user_type = ',2);
		//今日数据
		$this->db->where('create_time <= ',$today);

		$this->db->group_by('uid');

		$tmp = $this->db->get()->result_array();
		//买家提现人数
		$data['totalPeople'] = count($tmp);

		return $data;

	}

	/**
	 * @copyright 买家头部统计数据
	 * @param     [type]       		[description]
	 * @return    [type]        	[description]
	 */

	public function countBuyerCash ()
	{
		$data = ['totalMoney'=>0, 'totalTimes'=>0, 'totalPeople'=>0];

		//1.统计买家提现的总金额
		$this->db->select('sum(money) as mon',FALSE);
		$this->db->from('user_money');
		//操作类型为提现
		$this->db->where('type = ' ,1);

		//用户类型为买家
		$this->db->where('user_type = ',1);
		//今日数据
		$today = strtotime(date('Y-m-d'));

		$this->db->where('create_time <= ',$today);

		$tmp = $this->db->get()->row_array();

		$data['totalMoney'] = $tmp['mon'];
		$tmp = [];

		//2.统计卖家提现的总次数
		$this->db->select('count(*) as times',FALSE);

		$this->db->from('user_money');
		//操作类型为提现
		$this->db->where('type = ' ,1);

		//用户类型为买家
		$this->db->where('user_type = ',1);

		//今日数据
		$this->db->where('create_time <= ',$today);

		$tmp = $this->db->get()->row_array();

		$data['totalTimes'] = $tmp['times'];
		$tmp = [];

		//3.统计买家提现的总人数
		$this->db->select('id',FALSE);
		$this->db->from('user_money');

		//操作类型为提现
		$this->db->where('type = ' ,1);

		//用户类型为买家
		$this->db->where('user_type = ',1);

		//今日数据
		$this->db->where('create_time <= ',$today);

		$this->db->group_by('uid');

		$tmp = $this->db->get()->result_array();
		//买家提现人数
		$data['totalPeople'] = count($tmp);

		return $data;

	}

	public function countBuyerRecharge()
	{
		$data = ['totalMoney'=>0, 'totalTimes'=>0, 'totalPeople'=>0];

		//1.统计买家提现的总金额
		$this->db->select('sum(money) as mon',FALSE);
		$this->db->from('user_money');
		//操作类型为充值
		$this->db->where('type = ' ,2);

		//用户类型为买家
		$this->db->where('user_type = ',1);
		//今日数据
		$today = strtotime(date('Y-m-d'));

		$this->db->where('create_time <= ',$today);

		$tmp = $this->db->get()->row_array();

		$data['totalMoney'] = $tmp['mon'];
		$tmp = [];

		//2.统计卖家提现的总次数
		$this->db->select('count(*) as times',FALSE);

		$this->db->from('user_money');
		//操作类型为充值
		$this->db->where('type = ' ,2);

		//用户类型为买家
		$this->db->where('user_type = ',1);

		//今日数据
		$this->db->where('create_time <= ',$today);

		$tmp = $this->db->get()->row_array();

		$data['totalTimes'] = $tmp['times'];
		$tmp = [];

		//3.统计买家提现的总人数
		$this->db->select('id',FALSE);
		$this->db->from('user_money');

		//操作类型为充值
		$this->db->where('type = ' ,2);

		//用户类型为买家
		$this->db->where('user_type = ',1);

		//今日数据
		$this->db->where('create_time <= ',$today);

		$this->db->group_by('uid');

		$tmp = $this->db->get()->result_array();
		//买家提现人数
		$data['totalPeople'] = count($tmp);

		return $data;
	}


}
