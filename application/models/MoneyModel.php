<?php

/**
 * 财富管理
 */
class MoneyModel extends MY_Model
{
	public static $rsa_temp = '/var/www/admin/rsa_temp.pem';
	public static $rsa_file = '/var/www/admin/rsa.pem';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @copyright 提现卖家列表
     * @param     [type]      $search 		[description]
     * @return    [type]                	[description]
     */

	public function sellerCash($search)
	{
		//查询每日结果表
		$this->db->select('a.id,a.money,a.create_time,a.verify_user,a.verify_time,a.pay_user,a.pay_time,a.status,b.name,b.pic,c.realname verify_name,d.realname pay_name');
		$this->db->from('user_money a');
		$this->db->join('user_shop b','b.uid=a.uid','left');
		$this->db->join('admin c','c.id=a.verify_user','left');
		$this->db->join('admin d','d.id=a.pay_user','left');

		//按状态进行筛选
		if (!empty($search['status'])){
			$state = $search['status'];
			$this->db->where('a.status',$state);
		}

		//卖家
		$this->db->where('a.user_type','2');
		//提现
		$this->db->where('a.type','1');

		$this->db->order_by('a.create_time', 'DESC');

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
     * @copyright 买家提现列表
     * @param     [type]      $username [description]
     * @param     [type]      $page     [description]
     * @return    [type]                [description]
     */
	public function buyerCash($search)
	{
		$this->db->select('a.id,a.name,a.money,a.create_time,a.verify_user,a.verify_time,a.pay_user,a.pay_time,a.status,b.username,b.avatarUrl,c.realname verify_name,d.realname pay_name');

		$this->db->from('user_money a');
		$this->db->join('user b','b.id=a.uid','left');
		$this->db->join('admin c','c.id=a.verify_user','left');
		$this->db->join('admin d','d.id=a.pay_user','left');

		//按状态进行筛选
		if (!empty($search['status'])){
			$state = $search['status'];
			$this->db->where('a.status',$state);
		}

		//买家
		$this->db->where('a.user_type','1');
		//提现
		$this->db->where('a.type','1');

		$this->db->order_by('a.create_time', 'DESC');

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
     * @copyright 提现审核
     * @param     [type]      $id  [description]
     * @return    [type]           [description]
     */

    public function verify( $id, $status, $verify )
    {
    	if( $verify == 'verify' ){
    		$data['verify_user'] = $this->user_session['uid'];
    		$data['verify_time'] = time();
    		$data['status'] = $status;

			$res = $this->db->update('user_money',$data,array('id'=>$id));
			if($res){
				return true;
			}
    	}else{
            if(strpos(BASEURL, 'testadmin')!==false)
            {
                $data['pay_user'] = $this->user_session['uid'];
                $data['pay_time'] = time();
                $data['status']   = 13;
                $data['order_id'] = 'testadmin';
                $data['trade_no'] = 'testadmin';
                $data['pay_code'] = 'SUCCESS';
                $this->db->update('user_money', $data, ['id'=>$id]);
                return true;
            }
			$this->db->select('a.money,a.user_type,a.name as buyer_name,a.account as buyer_account,a.pay_code,a.order_id,b.bank_id,b.account,c.name,d.openId');
			$this->db->from('user_money a');
			$this->db->join('user_account b','b.id = a.account_id','left');
			$this->db->join('user_shop c','c.uid = a.uid','left');
			$this->db->join('user d','d.id = a.uid','left');
			$this->db->where('a.id', $id);
			$this->db->where('a.status', 12);
			$tmp = $this->db->get()->row_array();

			// 此条记录有效
			if(!empty($tmp))
			{
				// 第一次支付
				if(empty($tmp['pay_code']))
				{
					// 买家提现
					if($tmp['user_type'] == 1)
					{
						return self::payToWx($id, $tmp['openId'], $tmp['money'], $tmp['buyer_name']);
					}else{
						// 微信
						if($tmp['bank_id'] == 0)
						{
							return self::payToWx($id, $tmp['openId'], $tmp['money'], $tmp['name']);
						}
						// 银行卡
						else{
							return self::payToBank($id, $tmp['bank_id'], $tmp['account'], $tmp['name'], $tmp['money']);
						}
					}
				}
				elseif($tmp['pay_code'] == 'SYSTEMERROR'){
					//网络繁忙重新支付
					if($tmp['user_type'] == 1)
					{
						return self::payToWx($id, $tmp['openId'], $tmp['money'], $tmp['buyer_name'], $tmp['order_id']);
					}else{
						return self::payToWx($id, $tmp['openId'], $tmp['money'], $tmp['name'], $tmp['order_id']);
					}
				}
			}
    	}
    }


	/*
	 *	打款到微信
	 */
	private function payToWx($id, $openid, $money, $name, $order_id = '')
	{
		$this->load->config('common/wx_pay');
		$wx_config = $this->config->item('wx');

		$order_id = empty($order_id) ? self::createOrderId() : $order_id;
		$post['amount'] = $money * 100;
		$post['check_name'] = 'FORCE_CHECK';
		$post['desc'] = '众邻市集提现';
		$post['mch_appid'] = $wx_config['appid'];
		$post['mchid'] = $wx_config['mchid'];
		$post['nonce_str'] = md5($order_id);
		$post['openid'] = $openid;
		$post['partner_trade_no'] = $order_id;
		$post['re_user_name'] = $name;
		$post['spbill_create_ip'] = self::getIP();
		//print_r($post);
		//exit;

		$sign_string = '';
		$xml = '<xml>';
		foreach($post as $column=>$val)
		{
			$sign_string .= "{$column}={$val}&";
			$xml .= "<{$column}>{$val}</{$column}>";
		}
		$sign_string .= "key={$wx_config['key']}";
		$sign = strtoupper(md5($sign_string));
		$xml .= "<sign>{$sign}</sign></xml>";

        $url = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers';

        $dataxml = self::http_post($url, $xml);
        $objectxml = (array)simplexml_load_string($dataxml, 'SimpleXMLElement', LIBXML_NOCDATA);

        if($objectxml['result_code'] == 'SUCCESS'){
            if($objectxml['return_code'] == 'SUCCESS')
            {
				$data['pay_user'] = $this->user_session['uid'];
				$data['pay_time'] = time();
				$data['status']   = 13;
				$data['order_id'] = $post['partner_trade_no'];
				$data['trade_no'] = $objectxml['payment_no'];
				$data['pay_code'] = $objectxml['return_code'];
				$data['pay_data'] = json_encode($post, JSON_UNESCAPED_UNICODE);
                $this->db->update('user_money', $data, ['id'=>$id]);
				return true;
            }elseif($objectxml['return_code'] == 'SYSTEMERROR'){
				$data['order_id'] = $post['partner_trade_no'];
				$data['pay_code'] = $objectxml['return_code'];
				$data['pay_data'] = json_encode($post, JSON_UNESCAPED_UNICODE);
                $this->db->update('user_money', $data, ['id'=>$id]);
			}
        }
        return false;
	}

	/*
	 *	打款到银行卡
	 */
	private function payToBank($id, $bank_id, $account, $name, $money)
	{
		// rsa加密公钥
		if(!file_exists(self::$rsa_file))
		{
			self::getpublickey();
		}

		$this->load->config('common/wx_pay');
		$wx_config = $this->config->item('wx');

		$order_id = self::createOrderId();

		$post['amount'] = $money * 100;
		$post['bank_code'] = $bank_id;
		$post['desc'] = '众邻市集提现';
		$post['enc_bank_no'] = self::encrypt($account);
		$post['enc_true_name'] = self::encrypt($name);
		$post['mch_id'] = $wx_config['mchid'];
		$post['nonce_str'] = md5($order_id);
		$post['partner_trade_no'] = $order_id;

		$sign_string = '';
		$xml = '<xml>';
		foreach($post as $column=>$val)
		{
			$sign_string .= "{$column}={$val}&";
			$xml .= "<{$column}>{$val}</{$column}>";
		}
		$sign_string .= "key={$wx_config['key']}";
		$sign = strtoupper(md5($sign_string));
		$xml .= "<sign>{$sign}</sign></xml>";

        $url = 'https://api.mch.weixin.qq.com/mmpaysptrans/pay_bank';

        $dataxml = self::http_post($url, $xml);
        $objectxml = (array)simplexml_load_string($dataxml, 'SimpleXMLElement', LIBXML_NOCDATA);

        if($objectxml['result_code'] == 'SUCCESS'){
            if($objectxml['return_code'] == 'SUCCESS')
            {
				$data['pay_user'] = $this->user_session['uid'];
				$data['pay_time'] = time();
				$data['status']   = 13;
				$data['order_id'] = $post['partner_trade_no'];
				$data['trade_no'] = $objectxml['payment_no'];
				$data['pay_code'] = $objectxml['return_code'];
				$data['pay_data'] = json_encode($post, JSON_UNESCAPED_UNICODE);
                $this->db->update('user_money', $data, ['id'=>$id]);
				return true;
            }elseif($objectxml['return_code'] == 'SYSTEMERROR'){
				$data['order_id'] = $post['partner_trade_no'];
				$data['pay_code'] = $objectxml['return_code'];
				$data['pay_data'] = json_encode($post, JSON_UNESCAPED_UNICODE);
                $this->db->update('user_money', $data, ['id'=>$id]);
			}
        }
        return false;
	}

	/*
	 *	银行卡号和真实姓名加密
	 */
	private function encrypt($data)
    {
		$pubKey = file_get_contents(self::$rsa_file);
        openssl_public_encrypt($data, $result, $pubKey, OPENSSL_PKCS1_OAEP_PADDING);
        $ret = base64_encode($result);
        return $ret;
    }

	/*
	 *	获取RSA公钥
	 */
	private function getpublickey()
	{
		$url = 'https://fraud.mch.weixin.qq.com/risk/getpublickey';

		$this->load->config('common/wx_pay');
		$wx_config = $this->config->item('wx');

		$order_id = self::createOrderId();
		$nonce_str = md5($order_id);

		$sign_string = "mch_id={$wx_config['mchid']}&nonce_str={$nonce_str}&sign_type=MD5&key={$wx_config['key']}";
		$sign = strtoupper(md5($sign_string));

		$xml = "<xml><mch_id>{$wx_config['mchid']}</mch_id><nonce_str>{$nonce_str}</nonce_str><sign>{$sign}</sign><sign_type>MD5</sign_type></xml>";

		$dataxml = self::http_post($url, $xml);
        $objectxml = (array)simplexml_load_string($dataxml, 'SimpleXMLElement', LIBXML_NOCDATA);

		if($objectxml['result_code'] == 'SUCCESS'){
            if($objectxml['return_code'] == 'SUCCESS')
            {
				file_put_contents(self::$rsa_temp, $objectxml['pub_key']);
				exec("openssl rsa -RSAPublicKey_in -in ".self::$rsa_temp." -pubout", $output, $status);
				if(!empty($output))
				{
					$key = '';
					foreach($output as $val)
					{
						$key .= $val."\r\n";
					}
					file_put_contents(self::$rsa_file, $key);
				}
			}
		}
	}

	/*
	 *	订单号
	 */
    private function createOrderId()
    {
        $order_date = date('Y-m-d');

        //订单号码主体（YYYYMMDDHHIISSNNNNNNNN）
        $order_id_main = date('YmdHis') . rand(10000000,99999999);

        //订单号码主体长度
        $order_id_len = strlen($order_id_main);

        $order_id_sum = 0;

        for($i=0; $i<$order_id_len; $i++){
            $order_id_sum += (int)(substr($order_id_main,$i,1));
        }

        //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
        $order_id = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100,2,'0',STR_PAD_LEFT);
        return $order_id;
    }

	/*
	 *	发送请求
	 */
    public function http_post($url, $post){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_TIMEOUT, 30);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch,CURLOPT_SSLCERT, '/var/www/api/apiclient_cert.pem');
        curl_setopt($ch,CURLOPT_SSLKEY, '/var/www/api/apiclient_key.pem');
        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $post);
        $data = curl_exec($ch);
        if($data){
            curl_close($ch);
            return $data;
        }
        else {
            $error = curl_errno($ch);
            echo "call faild, errorCode:$error\n";
            curl_close($ch);
            return false;
        }
    }

	/*
	 *	当前用户客户端IP地址
	 */
	public function getIP() {
        $ip = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        }
        elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        }
        elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        }
        elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        }
        elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        }
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    /**
     * @copyright 买家充值列表
     * @param     [type]      $username [description]
     * @param     [type]      $page     [description]
     * @return    [type]                [description]
     */
    public function buyerRecharge()
    {
		$this->db->select('a.id,a.money,a.create_time,b.username,b.avatarUrl');

		$this->db->from('user_money a');

		$this->db->join('user b','b.id=a.uid','left');

		//充值
		$this->db->where('a.type = ','2');
		//充值成功
		$this->db->where('a.status = ','13');

		$this->db->order_by('a.create_time', 'DESC');

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
     * @copyright 提现详情
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
		$this->db->select('money,create_time',FALSE);

		$this->db->from('user_money');

		$this->db->where('user_type = ',2);

		$this->db->where('type = ',1);

		//提现完成
		$this->db->where('status = ',13);

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

		//计算提现金额
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


	/**
	 * @copyright 买家提现金额统计
	 * @param     [type]      		[description]
	 * @return    [type]          	[description]
	 */
	public function getBuyerCash ($search)
	{
		//提现金额统计
		$this->db->select('money,create_time',FALSE);

		$this->db->from('user_money');
		//用户类型为买家
		$this->db->where('user_type = ',1);
		//操作为提现
		$this->db->where('type = ',1);

		//提现完成
		$this->db->where('status = ',13);

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

		//计算提现金额
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

			// 提现金额，查询的数据中如果有该日期的数据则赋值，没有则为0
			$res['mons'][] = isset($money[$i]) ? $money[$i] : 0;


			$i += 86400;

		}
		return $res;
	}

	/**
	 * @copyright 提现卖家数据图表
	 * @param     [type]       		[description]
	 * @return    [type]        	[description]
	 */
	public function getCashSeller ($search){
		//提现卖家数据
		$this->db->select('sum(a.money) as mon,b.username',FALSE);

		$this->db->from('user_money a');

		$this->db->join('user b','b.id = a.uid','left');
		//用户类型卖家
		$this->db->where('user_type = ',2);
		//方式为提现
		$this->db->where('type = ',1);
		//提现完成
		$this->db->where('a.status = ',13);

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
					$today = strtotime(date('Y-m-d H:i:s'),time());
					//昨天0点
					$start = strtotime(date('Y-m-d'.'00:00:00',time()-3600*24));
					break;
				//本周
				case 'week2':
					$today = strtotime(date('Y-m-d H:i:s'),time());
					//本周第一天
					$start = strtotime(date('Y-m-d', strtotime("this week Monday", time())));
					break;
				//本月
				case 'month2':
					$today = strtotime(date('Y-m-d H:i:s'),time());
					//本月第一天
					$start = strtotime(date('Y-m-01'));
					break;
			}
		}
		//按时间筛选
		$this->db->where('a.create_time >= ', $start);
		$this->db->where('a.create_time <= ', $today);

		$this->db->group_by('a.uid');
		//计算提现金额卖家
		$this->db->order_by('mon','desc');

		$res = $this->db->get()->result_array();

		$res['mon'] = array_column($res,'mon');

		$res['username'] = array_column($res,'username');
		return $res;
	}

	/**
	 * @copyright 提现买家数据图表
	 * @param     [type]       		[description]
	 * @return    [type]        	[description]
	 */
	public function getCashBuyer ($search){
		//提现卖家数据
		$this->db->select('sum(a.money) as mon,b.username',FALSE);

		$this->db->from('user_money a');
		$this->db->join('user b','b.id = a.uid','left');
		//用户类型为买家
		$this->db->where('user_type = ',1);
		//提现
		$this->db->where('type = ',1);

		//提现完成
		$this->db->where('a.status = ',13);

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
		$this->db->where('a.create_time >= ', $start);
		$this->db->where('a.create_time <= ', $today);

		$this->db->group_by('a.uid');

		//买家提现金额
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
		//充值金额统计
		$this->db->select('money,create_time',FALSE);

		$this->db->from('user_money');

		//用户类型为买家
		$this->db->where('user_type = ',1);
		//充值
		$this->db->where('type = ',2);

		//充值成功
		$this->db->where('status = ','13');

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


		//计算提现金额
		$result = $this->db->get()->result_array();

		foreach($result as $key=>$val) {
			$result[$key]['create_time'] = strtotime(date('Y-m-d',$val['create_time']));
		}

		foreach($result as $key=>$val){
			$result[$key] += $val;
		}

		$money = array_column($result,'money','create_time');

		$res = $this->getDaysData($start,$today,$money);

		return $res;
	}

	/**
	 * @copyright 买家充值详情数据
	 * @param     [type]       		[description]
	 * @return    [type]        	[description]
	 */
	public function getRechargeBuyer ($search){
		//充值买家数据
		$this->db->select('sum(a.money) as mon,b.username',FALSE);

		$this->db->from('user_money a');

		$this->db->join('user b','b.id = a.uid','left');

		//用户类型为买家
		$this->db->where('a.user_type = ',1);

		//充值
		$this->db->where('a.type = ',2);

		//充值成功
		$this->db->where('a.status = ','13');

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
		//充值时间
		$this->db->where('a.create_time >= ', $start);
		$this->db->where('a.create_time <= ', $today);

		$this->db->group_by('a.uid');
		//计算充值金额
		$this->db->order_by('mon','desc');

		$res = $this->db->get()->result_array();
		$res['mon'] = array_column($res,'mon');
		$res['username'] = array_column($res,'username');

		return $res;
	}
	/**
	 * @copyright 卖家提现顶部统计
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

		$this->db->where('create_time >= ',$today);
		//提现完成
		$this->db->where('status = ',13);

		$tmp = $this->db->get()->row_array();

		if (!empty($tmp['mon'])) {
			$data['totalMoney'] = $tmp['mon'];
		} else {
			$data['totalMoney'] = 0;
		}

		$tmp = [];
		$this->db->reset_query();

		//2.统计卖家提现的总次数
		$this->db->select('count(*) as times',FALSE);

		$this->db->from('user_money');
		//操作类型为提现
		$this->db->where('type = ' ,1);

		//用户类型为卖家
		$this->db->where('user_type = ',2);

		//今日数据
		$this->db->where('create_time >= ',$today);
		//提现完成
		$this->db->where('status = ',13);

		$tmp = $this->db->get()->row_array();

		$data['totalTimes'] = $tmp['times'];
		$tmp = [];
		$this->db->reset_query();

		//3.统计卖家提现的总人数
		$this->db->select('count(id) num',FALSE);
		$this->db->from('user_money');

		//操作类型为提现
		$this->db->where('type = ' ,1);

		//用户类型为卖家
		$this->db->where('user_type = ',2);
		//今日数据
		$this->db->where('create_time >= ',$today);

		//提现完成
		$this->db->where('status = ',13);

		$this->db->group_by('uid');

		$tmp = $this->db->get()->result_array();
		//买家提现人数
		$data['totalPeople'] = count($tmp);
		$tmp = [];
		$this->db->reset_query();
		return $data;

	}

	/**
	 * @copyright 买家提现顶部统计
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

		$this->db->where('create_time >= ',$today);

		$tmp = $this->db->get()->row_array();

		if (empty($tmp['mon'])) {
			$data['totalMoney'] = 0;
		}else{
			$data['totalMoney'] = $tmp['mon'];
		}

		$tmp = [];

		//2.统计卖家提现的总次数
		$this->db->select('count(*) as times',FALSE);

		$this->db->from('user_money');
		//操作类型为提现
		$this->db->where('type = ' ,1);

		//用户类型为买家
		$this->db->where('user_type = ',1);

		//今日数据
		$this->db->where('create_time >= ',$today);

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
		$this->db->where('create_time >= ',$today);

		$this->db->group_by('uid');

		$tmp = $this->db->get()->result_array();
		//买家提现人数
		$data['totalPeople'] = count($tmp);

		return $data;

	}


	/**
	 * @copyright 买家充值顶部统计
	 * @param     [type]       		[description]
	 * @return    [type]        	[description]
	 */

	public function countBuyerRecharge()
	{
		$data = ['totalMoney'=>0, 'totalTimes'=>0, 'totalPeople'=>0];

		//1.统计买家提现的总金额
		$this->db->select('sum(money) as mon',FALSE);

		$this->db->from('user_money');

		//操作类型为充值
		$this->db->where('type = ' ,2);

		//充值状态为成功
		$this->db->where('status = ' ,13);

		//用户类型为买家
		$this->db->where('user_type = ',1);
		//今日数据
		$today = strtotime(date('Y-m-d'));

		$this->db->where('create_time >= ',$today);

		$tmp = $this->db->get()->row_array();

		if (empty($tmp['mon'])){

			$data['totalMoney'] = 0;
		}else{
			$data['totalMoney'] = $tmp['mon'];
		}

		$tmp = [];

		//2.统计买家充值的总次数
		$this->db->select('count(*) as times',FALSE);

		$this->db->from('user_money');
		//操作类型为充值
		$this->db->where('type = ' ,2);

		//用户类型为买家
		$this->db->where('user_type = ',1);

		//充值状态为成功
		$this->db->where('status = ' ,13);

		//今日数据
		$this->db->where('create_time >= ',$today);

		$tmp = $this->db->get()->row_array();

		$data['totalTimes'] = $tmp['times'];
		$tmp = [];

		//3.统计买家充值的总人数
		$this->db->select('id',FALSE);
		$this->db->from('user_money');

		//操作类型为充值
		$this->db->where('type = ' ,2);

		//充值状态为成功
		$this->db->where('status = ' ,13);

		//今日数据
		$this->db->where('create_time >= ',$today);

		$this->db->group_by('uid');

		$tmp = $this->db->get()->result_array();
		//买家提现人数
		$data['totalPeople'] = count($tmp);

		return $data;
	}


}
