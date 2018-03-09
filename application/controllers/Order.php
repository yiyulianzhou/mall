<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @copyright 订单列表
     * @return    [state]      [description]
     */
    public function index()
    {
		$this->display($this->data['file_path']);
    }
    /**
     * @copyright 订单详情
     * @return    [state]      [description]
     */
    public function detail()
    {
        $orderStatus = $this->config->item('order')['status'];//订单状态列表
    	$id = $this->input->get( 'id' );
    	$status = $this->input->get( 'status' );
    	$page = $this->input->get( 'per_page' );
    	$res = $this->model->orderDetail( $id );
    	$this->assign('detail', $res);
    	$this->assign('page', $page);
    	$this->assign('status', $status);
        $this->assign('orderStatus', $orderStatus);
        $this->assign('data', $this->data);
		$this->display($this->data['file_path']);
    }
    /**
     * @copyright 删除订单
     * @return    [type]      [description]
     */
    public function delete($id = '')
    {
        $this->validationId($id);

        $res = $this->model->delete( $id );
        if ($res)  {
            redirect("order/index");
        } else{
            redirect("order/index");
        }


    }

    /**
     * @copyright 订单列表
     * @return    [type]      [description]
     */
    public function getOrder()
    {
        $search = $this->input->post();

        $this->response = $this->model->getOrderList($search);

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取订单列表成功';
        }
        $this->returnResponse();
    }

    /**
     * @copyright 订单金额日期统计报表
     * @return    [type]      [description]
     */
    public function getOrderData()
    {
        $search = $this->input->post();
        $this->response['echarts_data'] = $this->model->getOrderData($search);

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取订单金额前10报表成功';
        }
        $this->returnResponse();
    }

    /**
     * @copyright 获取订单详情
     * @return    [type]      [description]
     */

    public function getOrderInfo($id = '')
    {
        $this->validationId($id);

        $this->response['item'] = $this->model->getOrderInfo($id);

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取订单详情成功';
        }
        $this->returnResponse();
    }
}