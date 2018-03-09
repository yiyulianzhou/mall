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
    	$lock = ($this->input->get('lock')== '0' || ($this->input->get('lock') == '1' )? $this->input->get('lock') : -1);
        $shop = empty($this->input->get('shop')) ? '' : $this->input->get('shop');
    	$title = empty($this->input->get('title')) ? '' : $this->input->get('title');
    	$page = $this->input->get('per_page') > 1 ? $this->input->get('per_page') : 1;
    	$searchbtn = "筛选 －";
		$searchbox = "display:''";
    	if($lock == -1 && empty($shop) && empty($title))
		{
			$searchbtn = "筛选 ＋";
			$searchbox = "display:none";
		}
    	$res = $this->model->sellerList( $lock,$shop,$page,$title );
        $this->assign('shop', $shop);
        $this->assign('title', $title);
        $this->assign('lock', $lock);
        $this->assign('page', $page);
        $this->assign('searchbtn', $searchbtn);
        $this->assign('searchbox', $searchbox);
        $this->assign('sellerList', $res['list']);
		$this->assign('permission_tree', $this->data['permission_tree'][$this->router->class]);
        $this->assign('pager_links', $res['pager_links']);
		$this->display($this->data['file_path']);
    }
    /**
     * @DateTime  2017-12-20
     * @copyright 卖家解封与封禁
     * @return    [type]      [description]
     */
    public function lock()
    {
    	$id = $this->input->get('id');
        $lock = $this->input->get('lock');
        $shop = $this->input->get('shop');
    	$title = $this->input->get('title');
    	$page = $this->input->get('per_page');
    	$res = $this->model->sellerLock( $id, $lock );
    	redirect("seller/index?per_page=$page&shop=$shop&title=$title");
    }
    /**
     * @copyright 卖家详情
     * @return    [type]      [description]
     */
    public function detail(){
    	$id = $this->input->get( 'id' );
        $page = $this->input->get('per_page');
        $shop = $this->input->get('shop');
        $title = $this->input->get('title');
        $lock = $this->input->get('lock');
        $res = $this->model->sellerDetail( $id );
        $this->assign('detail',$res);
        $this->assign('page',$page);
        $this->assign('shop',$shop);
        $this->assign('title',$title);
        $this->assign('lock',$lock);
        $this->display($this->data['file_path']);
    }
    /**
     * @copyright 店铺审核
     * @return    [type]      [description]
     */
    public function verify()
    {
        $page = $this->input->post('page');
        $id = $this->input->post('id');
        $is_real = $this->input->post('is_real');
        $is_health = $this->input->post('is_health');
        $shop = $this->input->post('shop');
        $title = $this->input->post('title');
        $lock = $this->input->post('lock');
        $res = $this->model->sellerVerify( $id, $is_real, $is_health );
        redirect("seller/index?per_page=$page&shop=$shop&title=$title&lock=$lock");
    }
}