<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/6
 * Time: 10:02
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Promote extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->display($this->data['file_path']);
    }

    public function countPromote()
    {
        $this->response['count'] = $this->model->countPromote();

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取活动顶部统计成功';
        }
        $this->returnResponse();
    }

    public function promoteList()
    {
        $this->response = $this->model->getPromoteList();
        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取活动列表成功';
        }
        $this->returnResponse();
    }

    public function getRedBags()
    {

    }
    /**
     * @copyright 发放金额统计
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function promoteMoney()
    {
        $search = $this->input->post();

        $this->response['echarts_data'] = $this->model->getPromoteMoney($search);

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取活动金额数据成功';
        }
        $this->returnResponse();
    }

    /**
     * @copyright 红包金额统计
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function redBags()
    {
        $search = $this->input->post();

        $this->response['echarts_data'] = $this->model->getRedBags($search);

        if ($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取活动金额数据成功';
        }
        $this->returnResponse();
    }

    /**
     * @copyright 活动详情
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */

    public function promoteInfo($id = '')
    {
        $this->validationId($id);

        $this->response['item'] = $this->model->promoteDetail($id);

        if ($this->response){
           $this->response['msg_type'] = 'success';
           $this->response['message'] = '获取单条活动详情成功';
        }
        $this->returnResponse();
    }
}