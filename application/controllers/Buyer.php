<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buyer extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
		$this->display($this->data['file_path']);
    }


    /**
     * @copyright 卖家顶部统计数据
     * @return    [type]      [description]
     */

    public function countBuyer()
    {
        $this->response['count'] = $this->model->countBuyer();

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取买家顶部统计成功';
        }
        $this->returnResponse();
    }



    /**
     * @copyright 买家列表数据
     * @return    [type]    [description]
     */

    public function getBuyerList()
    {
        $this->response = $this->model->getBuyerList();

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取买家列表成功';
        }
        $this->returnResponse();
    }

    /**
     * @copyright 买家消费统计数据
     * @return    [type]      [description]
     */

    public function getBuyerCost()
    {
        $search = $this->input->post();

        $this->response['echarts_data'] = $this->model->getBuyerCost($search);

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取买家消费统计成功';
        }
        $this->returnResponse();
    }

    /**
     * @copyright 买家订单排行
     * @return    [type]      [description]
     */

    public function getBuyerOrders()
    {
        $search = $this->input->post();

        $this->response['echarts_data'] = $this->model->getBuyerOrders($search);

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取买家订单排行成功';
        }
        $this->returnResponse();
    }

    /**
     * @copyright 买家详情
     * @return    [type]      [description]
     */

    public function getBuyerInfo($id='')
    {
        $this->validationId($id);
        $this->response['item'] = $this->model->buyerDetail($id);

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取买家详情成功';
        }

        $this->returnResponse();
    }

    /**
     * @copyright 封禁和解封买状态
     * @return    [type]      [description]
     */

    public function changeLock($id = '')
    {
        $this->validationId($id);
        $con = $this->input->post();
        $this->response = $this->model->lockBuyer($con);

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '修改卖家封禁状态成功';
        }
        $this->returnResponse();
    }
}