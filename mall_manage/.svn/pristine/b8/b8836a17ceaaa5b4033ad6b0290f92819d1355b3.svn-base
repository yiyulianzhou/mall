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
    	$status = ($this->input->get('status')== '0' || ($this->input->get('status') == '2' )? $this->input->get('status') : -1);
    	$username = empty($this->input->get('username')) ? '' : $this->input->get('username');
    	$page = $this->input->get('per_page') > 1 ? $this->input->get('per_page') : 1;
    	$searchbtn = "筛选 －";
		$searchbox = "display:''";
    	if($status == -1 && empty($username))
		{
			$searchbtn = "筛选 ＋";
			$searchbox = "display:none";
		}
    	$res = $this->model->buyerList( $status,$username,$page );
        $this->assign('username', $username);
        $this->assign('status', $status);
        $this->assign('page', $page);
        $this->assign('searchbtn', $searchbtn);
        $this->assign('searchbox', $searchbox);
        $this->assign('buyerList', $res['list']);
		$this->assign('permission_tree', $this->data['permission_tree'][$this->router->class]);
        $this->assign('pager_links', $res['pager_links']);
		$this->display($this->data['file_path']);
    }
    /**
     * @DateTime  2017-12-20
     * @copyright 买家禁言与解禁
     * @return    [type]      [description]
     */
    public function lock()
    {
    	$id = $this->input->get('id');
        $status = $this->input->get('status');
    	$username = $this->input->get('username');
    	$page = $this->input->get('per_page');
    	$res = $this->model->buyerLock( $id, $status );
    	redirect("buyer/index?per_page=$page&username=$username");
    }
    /**
     * @DateTime  2017-12-20
     * @copyright 买家详情
     * @return    [type]      [description]
     */
    public function detail(){
        $id = $this->input->get( 'id' );
        $username = $this->input->get( 'username' );
    	$status = $this->input->get( 'status' );
        $page = $this->input->get('per_page');
        $res = $this->model->buyerDetail( $id );
        $this->assign('detail',$res);
        $this->assign('page',$page);
        $this->assign('username',$username);
        $this->assign('status',$status);
        $this->display($this->data['file_path']);
    }
}