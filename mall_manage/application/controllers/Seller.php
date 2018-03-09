<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class seller extends MY_Controller
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
     * @copyright 卖家详情
     * @return    [type]      [description]
     */
    public function getSellerInfo($id='')
    {
        $this->validationId($id);

        $this->response['item'] = $this->model->sellerDetail($id);

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取卖家详情成功';
        }
       $this->returnResponse();

    }
    /**
     * @copyright 店铺实名和健康审核
     * @return    [type]      [description]
     */
    public function verify($id='')
    {
        $this->validationId($id);

        if ($this->input->post()) {
            $input = $this->input->post();
            $input['id'] = $id;
            // 更新商品信息
            $res = $this->model->update($input);
            if ($res){
                $this->response['msg_type'] = 'success';
                $this->response['message'] = '审核商铺成功';
            }
        }
        $this->returnResponse();
    }

    /**
     * @copyright 卖家顶部统计数据
     * @return    [type]      [description]
     */

    public function countSeller()
    {
        $this->response['count'] = $this->model->countSeller();

        if ($this->response['count']){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取卖家顶部统计成功';
        }
        $this->returnResponse();
    }



    /**
     * @copyright 卖家列表数据
     * @return    [type]      [description]
     */

    public function getSellerList()
    {
        $this->response = $this->model->getSellerList();

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取卖家列表成功';
        }
        $this->returnResponse();
    }

    /**
     * @copyright 卖家销售额统计数据
     * @return    [type]      [description]
     */

    public function getSellerSales()
    {
        $search = $this->input->post();

        $this->response['echarts_data'] = $this->model->getSellerSales($search);

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取卖家销售统计成功';
        }
        $this->returnResponse();

    }

    /**
     * @copyright 卖家用户统计数据
     * @return    [type]      [description]
     */

    public function getSellerUsers()
    {
        $search = $this->input->post();

        $this->response['echarts_data'] = $this->model->getSellerUsers($search);

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取卖家订单统计成功';
        }
        $this->returnResponse();
    }

    /**
     * @copyright 封禁和解封卖家状态
     * @return    [type]      [description]
     */

    public function changeLock($id = '')
    {
        $this->validationId($id);
        $con = $this->input->post();
        $this->response = $this->model->lockSeller($con);

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '修改卖家封禁状态成功';
        }
        $this->returnResponse();
    }

}