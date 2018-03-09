<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class goods extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @copyright 商品列表
     * @return    [state]      [description]
     */
    public function index()
    {
        $categoryList = $this->config->item('goods')['category'];//商品分类列表
    	$goodsState = $this->config->item('goods')['state'];//商品状态列表
    	$state = ($this->input->get('state')== '0' || ($this->input->get('state') == '2' )? $this->input->get('state') : -1);
    	$name = empty($this->input->get('name')) ? '' : $this->input->get('name');
    	$sales_type = empty($this->input->get('sales_type')) ? '' : $this->input->get('sales_type');
    	$categoryId = empty($this->input->get('categoryId')) ? '' : $this->input->get('categoryId');
    	$orderBy = empty($this->input->get('orderBy')) ? '' : $this->input->get('orderBy');
    	$page = $this->input->get('per_page') > 1 ? $this->input->get('per_page') : 1;
    	$searchbtn = "筛选 －";
		$searchbox = "display:''";
    	if((empty($categoryId) || $categoryId == -1) && (empty($sales_type) || $sales_type == -1) && (empty($orderBy) || $orderBy == -1)&& (empty($name)))
		{
			$searchbtn = "筛选 ＋";
			$searchbox = "display:none";
		}
    	$res = $this->model->goodsList( $state,$sales_type,$page,$orderBy,$categoryId,$name );
        $this->assign('sales_type', $sales_type);
        $this->assign('state', $state);
        $this->assign('categoryId', $categoryId);
        $this->assign('orderBy', $orderBy);
        $this->assign('page', $page);
    	$this->assign('name', $name);
        $this->assign('searchbtn', $searchbtn);
        $this->assign('searchbox', $searchbox);
        $this->assign('categoryList', $categoryList);
        $this->assign('goodsState', $goodsState);
        $this->assign('goodsList', $res['list']);
		$this->assign('permission_tree', $this->data['permission_tree'][$this->router->class]);
        $this->assign('pager_links', $res['pager_links']);
		$this->display($this->data['file_path']);
    }
    /**
     * @copyright 商品详情
     * @return    [state]      [description]
     */
    public function detail()
    {
        $categoryList = $this->config->item('goods')['category'];//商品分类列表
        $goodsStatus = $this->config->item('goods')['state'];//商品状态
    	$type = $this->input->get('type');
    	$id = $this->input->get( 'id' );
    	$categoryId = $this->input->get( 'categoryId' );
    	$sales_type = $this->input->get( 'sales_type' );
    	$orderBy = $this->input->get( 'orderBy' );
    	$name = $this->input->get( 'name' );
    	$page = $this->input->get( 'per_page' );
    	$res = $this->model->goodsDetail( $id );
    	if($type == 1){
    		$title = "商品审核";
    	}else{
    		$title = "商品详情";
    	}
    	$this->assign('detail', $res);
    	$this->assign('page', $page);
        $this->assign('title', $title);
    	$this->assign('goodsStatus', $goodsStatus);
        $this->assign('categoryList', $categoryList);
    	$this->assign('categoryId', $categoryId);
    	$this->assign('sales_type', $sales_type);
    	$this->assign('orderBy', $orderBy);
    	$this->assign('name', $name);
    	$this->assign('type', $type);
        $this->assign('data', $this->data);
		$this->display($this->data['file_path']);
    }
    /**
     * @copyright 商品审核
     * @return    [state]      [description]
     */
    public function verify()
    {
    	$id = $this->input->post('id');
    	$state = $this->input->post('state');
    	$verify_remark = $this->input->post('verify_remark');
    	$page = $this->input->post('page');
    	$orderBy = $this->input->post('orderBy');
    	$categoryId = $this->input->post('categoryId');
    	$sales_type = $this->input->post('sales_type');
    	$name = $this->input->post('name');
    	$res = $this->model->goodsVarify( $id, $state, $verify_remark );
    	redirect( "goods/index?per_page=$page&categoryId=$categoryId&sales_type=$sales_type&orderBy=$orderBy&name=$name" );
    }
    /**
     * @copyright 商品下架
     * @return    [state]      [description]
     */
    public function nosales()
    {
    	$categoryId = $this->input->get( 'categoryId' );
    	$sales_type = $this->input->get( 'sales_type' );
    	$orderBy = $this->input->get( 'orderBy' );
    	$name = $this->input->get( 'name' );
    	$id = $this->input->get( 'id' );
    	$page = $this->input->get( 'per_page' );
    	$res = $this->model->goodsNosales( $id );
    	redirect("goods/index?per_page=$page&categoryId=$categoryId&sales_type=$sales_type&orderBy=$orderBy&name=$name");
    }
}