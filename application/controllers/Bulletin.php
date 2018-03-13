<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bulletin extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
    }	

	/**
	 * 详情
	 */
	public function view()
	{
		$data = $this->model->get($this->input->get('id'));
		$this->assign('info', $data);
		$this->display($this->data['file_path']);
	}

	/**
	 * 新增
	 */
	public function create()
	{
		if($this->input->post(null, true))
        {
			$title = $this->input->post('title', true);
			$content = $this->input->post('content', true);
			$type = $this->input->post('type', true);
			$this->model->save($title, $content, $type, $this->user_session['uid']);
			redirect("bulletin/index");
		}
		$this->display($this->data['file_path']);
	}

	/*
	 * 列表
	 */
	public function index()
	{
		$searchbtn = "筛选 ＋";
		$searchbox = "display:none";
		$page  = $this->input->get('per_page') > 1 ? $this->input->get('per_page') : 1;
		$title = !empty($this->input->get('name')) ? $this->input->get('name') : '';

		if(!empty($title))
		{
			$searchbtn = "筛选 －";
			$searchbox = "display:''";
		}
		$res = $this->model->msgList($title, $page);
		$this->assign('page', $page);
		$this->assign('name', $title);
		$this->assign('searchbtn', $searchbtn);
		$this->assign('searchbox', $searchbox);
		$this->assign('list', $res['list']);
        $this->assign('pager_links', $res['pager_links']);
		$this->display($this->data['file_path']);
	}
}
