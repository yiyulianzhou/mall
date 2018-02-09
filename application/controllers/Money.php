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
     * @return    [type]      [description]
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
	 * @return    [type]      [description]
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
	 * @return    [type]      [description]
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
     * @return    [type]      [description]
     */
    public function buyer()
    {
		$this->display($this->data['file_path']);
    }
    /**
     * @copyright 提现审核
     * @return    [type]      [description]
     */
    public function verify()
    {
    	$id = $this->input->post( 'id' );
    	$username = $this->input->post( 'username' );
    	$status = $this->input->post( 'status' );
    	$type = $this->input->post( 'type' );
    	$verify = $this->input->post( 'verify' );
        $page = $this->input->post( 'per_page' );
        $res = $this->model->verify( $id, $status, $verify );
        if( $type == 1 ){
        	redirect("money/seller?per_page=$page&username=$username");
        }else{
        	redirect("money/buyer?per_page=$page&username=$username");
        }
        
    }
    /**
     * @copyright 充值列表
     * @return    [type]      [description]
     */
    public function recharge()
    {
		$this->display($this->data['file_path']);
    }
    /**
     * @copyright 详情
     * @return    [type]      [description]
     */
    public function detail($id = '')
    {
    	$cashState = $this->config->item('money')['state'];//提现状态列表

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
	 * @return    [type]      [description]
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
	 * @return    [type]      [description]
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
	 * @return    [type]      [description]
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
	 * @return    [type]      [description]
	 */
	public function getCashSeller ()
	{
		// 查询条件
		$search = $this->input->post(null, true);
		$this->response['echarts_data'] = $this->model->getCashSeller($search);
		if($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取提现卖家人数成功';
		}
		$this->returnResponse ();
	}

	/**
	 * @copyright 获取提现买家的人数统计
	 * @return    [type]      [description]
	 */
	public function getCashBuyer ()
	{
		// 查询条件
		$search = $this->input->post(null, true);
		$this->response['echarts_data'] = $this->model->getCashBuyer($search);
		if($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取提现卖家人数成功';
		}
		$this->returnResponse ();
	}


	/**
	 * @copyright 获取买家充值人数统计
	 * @return    [type]      [description]
	 */
	public function getRechargeBuyer ()
	{
		// 查询条件
		$search = $this->input->post(null, true);

		$this->response['echarts_data'] = $this->model->getRechargeBuyer($search);
		if($this->response) {
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取提现卖家人数成功';
		}
		$this->returnResponse ();
	}


	/**
	 * @copyright 统计头部提现卖家的数据
	 * @return    [type]      [description]
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
	 * @return    [type]      [description]
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
	 * @return    [type]      [description]
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