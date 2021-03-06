<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @Description: 首页
 */
class Home extends MY_Controller
{

    public function __construct ()
    {
        parent::__construct();
    }

    public function index ()
    {
        $this->assign('data', $this->data);

		$this->display($this->data['file_path']);

    }

    public function topCount()
    {
        $this->response = $this->model->getData();
        if($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取头部统计数据成功';
        }
        $this->returnResponse();
    }
    //获取卖家统计数据
    public function showLine ()
    {
        $this->response['echarts_data'] = $this->model->getSeller();

        if($this->response['echarts_data']){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取卖家统计数据成功';
        }
        $this->returnResponse ();
    }

    //获取买家统计数据
    public function showBuyer ()
    {
        $this->response['echarts_data'] = $this->model->getBuyer();

        if($this->response['echarts_data']){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取买家统计数据成功';
        }

        $this->returnResponse();
    }

    //获取商品统计数据
    public function showGoods ()
    {
        $this->response['echarts_data'] = $this->model->getGoods();

        if($this->response['echarts_data']){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取商品销售top5数据成功';
        }

        $this->returnResponse ();
    }

    //获取活跃小区排名
    public function showItems ()
    {
        $this->response['echarts_data'] = $this->model->getItems();

        if($this->response['echarts_data']){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取商品类目top5数据成功';
        }

        $this->returnResponse();
    }

    //用户的反馈信息
    public function showTips ()
    {

        $this->response = $this->model->showTips();

        if($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取用户反馈数据成功';
        }

        $this->returnResponse();
    }

    //用户提现申请
    public function cashApply ()
    {
        $this->response = $this->model->cashApply();

        if($this->response){
            $this->response['msg_type'] = 'success';
            $this->response['message'] = '获取用户提现数据成功';
        }

        $this->returnResponse();
    }

}