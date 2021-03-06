<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class money extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @copyright 卖家提现
     * 
     */
	public function getSeller() {
		// 查询条件
		$search = $this->input->post(null, true);

		$this->response = $this->model->sellerCash($search);

		if ($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取卖家提现列表成功';
		}
		$this->returnResponse ();
	}

	/**
	 * @copyright 买家提现
	 * 
	 */
	public function getBuyer() {
		// 查询条件
		$search = $this->input->post(null, true);

		$this->response = $this->model->buyerCash($search);

		if ($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取买家提现列表成功';
		}
		$this->returnResponse ();
	}

	/**
	 * @copyright 买家充值
	 * 
	 */
	public function getRecharge() {

		$this->response = $this->model->buyerRecharge();

		if ($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取买家充值列表成功';
		}
		$this->returnResponse ();
	}

    public function seller()
    {
		$this->display($this->data['file_path']);
    }

    /**
     * @copyright 买家提现
     * 
     */
    public function buyer()
    {
		$this->display($this->data['file_path']);
    }

    /**
     * @copyright 提现审核
     * 
     */
    public function verify()
    {
    	$id = $this->input->post( 'id' );
    	$status = $this->input->post( 'status' );
    	$type = $this->input->post( 'type' );

    	$verify = $this->input->post( 'verify' );
        $res = $this->model->verify( $id, $status, $verify );
        if( $type == 2 ){
        	redirect("money/seller");
        }else{
        	redirect("money/buyer");
        }        
    }

    /**
     * @copyright 充值列表
     * 
     */
    public function recharge()
    {
		$this->display($this->data['file_path']);
    }

    /**
     * @copyright 提现审核
     * 
     */
    public function detail($id = '')
    {
		//提现状态列表
    	$cashState = $this->config->item('money')['state'];

		$this->validationId($id);
		$this->data['id'] = $id;

    	$res = $this->model->detail( $id );

    	$this->assign('detail',$res);

        $this->assign('cashState', $cashState);
    	$this->display($this->data['file_path']);
    }

	/**
	 * @copyright 充值详情
	 * 
	 */
	public function info($id = '')
	{
		$cashState = $this->config->item('money')['state'];

		$this->validationId($id);
		$this->data['id'] = $id;
		$type = $this->input->get('type');
		$username = $this->input->get('username');
		$state = $this->input->get('state');
		$res = $this->model->detail( $id );
		$this->assign('detail',$res);
		$this->assign('type',$type);
		$this->assign('state',$state);
		$this->assign('username',$username);
		$this->assign('cashState', $cashState);
		$this->display($this->data['file_path']);
	}

	/**
	 * @copyright 获取卖家提现金额数据统计
	 * 
	 */
	public function getSellerCash ()
	{
		// 查询条件
		$search = $this->input->post(null, true);

		$this->response['echarts_data'] = $this->model->getSellerCash($search);
		if ($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取卖家提现金额成功';
		}
		$this->returnResponse ();
	}

	/**
	 * @copyright 获取买家充值金额统计
	 * 
	 */
	public function getBuyerRecharge ()
	{
		// 查询条件
		$search = $this->input->post(null, true);

		$this->response['echarts_data'] = $this->model->getBuyerRecharge($search);
		if ($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取买家充值金额成功';
		}
		$this->returnResponse ();
	}

	/**
	 * @copyright 获取买家提现金额数据统计
	 */
	public function getBuyerCash ()
	{
		// 查询条件
		$search = $this->input->post(null, true);

		$this->response['echarts_data'] = $this->model->getBuyerCash($search);
		if ($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取买家提现金额成功';
		}
		$this->returnResponse ();
	}

	/**
	 * @copyright 获取提现卖家的人数统计
	 */
	public function getCashSeller ()
	{
		// 查询条件
		$search = $this->input->post(null, true);
		$this->response['echarts_data'] = $this->model->getCashSeller($search);
		if($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取提现卖家详情成功';
		}
		$this->returnResponse ();
	}

	/**
	 * @copyright 获取提现买家的人数统计
	 */
	public function getCashBuyer ()
	{
		// 查询条件
		$search = $this->input->post(null, true);
		$this->response['echarts_data'] = $this->model->getCashBuyer($search);
		if($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取提现买家详情成功';
		}
		$this->returnResponse ();
	}


	/**
	 * @copyright 获取买家充值人数统计
	 */
	public function getRechargeBuyer ()
	{
		// 查询条件
		$search = $this->input->post(null, true);

		$this->response['echarts_data'] = $this->model->getRechargeBuyer($search);
		if($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取买家充值详情成功';
		}
		$this->returnResponse ();
	}


	/**
	 * @copyright 统计头部提现卖家的数据
	 */
	public function countSellerCash ()
	{
		
		$this->response['count'] = $this->model->countSellerCash();
		if ($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取卖家头部统计成功';
		}
		$this->returnResponse ();
	}

	/**
	 * @copyright 统计头部提现买家的数据
	 */
	public function countBuyerCash ()
	{

		$this->response['count'] = $this->model->countBuyerCash();
		if ($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取买家头部统计成功';
		}
		$this->returnResponse ();
	}

	/**
	 * @copyright 统计头部充值买家的数据
	 */
	public function countBuyerRecharge ()
	{

		$this->response['count'] = $this->model->countBuyerRecharge();
		if ($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取买家充值统计成功';
		}
		$this->returnResponse ();
	}
}