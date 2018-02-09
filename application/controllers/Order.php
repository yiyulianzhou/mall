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
        $orderStatus = $this->config->item('order')['status'];//订单状态列表
        $status = (empty($this->input->get('status') || ($this->input->get('status') == '-1' ))? -1 : $this->input->get('status'));
    	$page = $this->input->get('per_page') > 1 ? $this->input->get('per_page') : 1;
    	$searchbtn = "筛选 －";
		$searchbox = "display:''";
    	if( $status == -1 )
		{
			$searchbtn = "筛选 ＋";
			$searchbox = "display:none";
		}
    	$res = $this->model->orderList( $status,$page );
        $this->assign('status', $status);
        $this->assign('orderStatus', $orderStatus);
        $this->assign('page', $page);
        $this->assign('searchbtn', $searchbtn);
        $this->assign('searchbox', $searchbox);
        $this->assign('orderList', $res['list']);
		$this->assign('permission_tree', $this->data['permission_tree'][$this->router->class]);
        $this->assign('pager_links', $res['pager_links']);
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
    public function delete()
    {
        $id = $this->input->get( 'id' );
        $page = $this->input->get( 'per_page' );
        $res = $this->model->delete( $id );
        redirect("order/index?&per_page=$page");
    }
}