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
		$this->display($this->data['file_path']);
    }
    /**
     * @copyright 商品详情
     * @return    [state]      [description]
     */
	public function verify($id = '')
	{
		$this->validationId($id);

		$this->response['item'] = $this->model->getItemById($id);
		if ($this->response['item']){
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取单条商品信息成功';
		}
		$this->returnResponse();
	}

	public function verifys($id = '')
	{
		$this->validationId($id);

		if ($this->input->post()) {
			$input = $this->input->post();
			$input['id'] = $id;
			$input['verify_time']   = time();
			$input['verify_user'] = $this->user_session['uid'];
			// 更新商品信息
			$res = $this->model->update($input);
			if ($res){
				$this->response['msg_type'] = 'success';
				$this->response['message'] = '审核商品成功';
			}
		}
		$this->returnResponse();
	}

	/**
	 * @copyright 商品顶部统计信息
	 * @return    [state]      [description]
	 */
	public function countGoods()
	{
		$this->response = $this->model->countGoodsData();
		if ($this->response){
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取商品顶部统计信息成功';
		}

		$this->returnResponse();
	}

	/**
	 * @copyright 商品列表信息
	 * @return    [state]      [description]
	 */
	public function getGoods()
	{
		$search = $this->input->post();

		$this->response = $this->model->getGoodsList($search);

		if ($this->response){
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取商品列表信息成功';
		}

		$this->returnResponse ();
	}

	/**
	 * @copyright 单品销售信息
	 * @return    [state]      [description]
	 */
	public function getSales()
	{
		$search = $this->input->post();
		$this->response['echarts_data'] = $this->model->getSalesData($search);
		if ($this->response){
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取单品销售信息成功';
		}

		$this->returnResponse();

	}

	/**
	 * @copyright 类目销售信息
	 * @return    [state]      [description]
	 */
	public function getCates()
	{
		$search = $this->input->post();
		$this->response['echarts_data'] = $this->model->getCatesData($search);
		if ($this->response){
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取类目销售信息成功';
		}

		$this->returnResponse();
	}

	/**
	 * @copyright 单品访问排行
	 * @return    [state]      [description]
	 */
	public function getVisit()
	{
		$search = $this->input->post();
		$this->response['echarts_data'] = $this->model->getVisitData($search);
		if ($this->response){
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取单品访问排行成功';
		}

		$this->returnResponse();
	}

	/**
	 * @copyright 单品分享排行
	 * @return    [state]      [description]
	 */
	public function getShare()
	{
		$search = $this->input->post();
		$this->response['echarts_data'] = $this->model->getShareData($search);
		if ($this->response){
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取单品分享排行成功';
		}

		$this->returnResponse();
	}

	/**
	 * @copyright 商品分类页
	 * @return    [state]      [description]
	 */

	public function category()
	{
		$this->display($this->data['file_path']);
	}


	/**
	 * @copyright 分类列表
	 * @return    [state]      [description]
	 */

	public function getCategory()
	{
		$search = $this->input->post();

		$this->response = $this->model->getCategoryList($search);

		if ($this->response){
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取类目列表成功';
		}

		$this->returnResponse();
	}

	/**
	 * @copyright 查看条目详情
	 * @return    [state]      [description]
	 */

	public function cateDetail($id = '')
	{
		$this->validationId($id);
		$this->response['item'] = $this->model->getCateItem($id);

		if ($this->response){
			$this->response['msg_type'] = 'success';
			$this->response['message'] = '获取类目详情成功';
		}
		$this->returnResponse();
	}

	/**
	 * @copyright 添加条目
	 * @return    [state]      [description]
	 */
	public function addCate()
	{
		$data = $this->input->post();

		$id = $this->model->addCatedata($data);
		if ($id){
			$this->response['msg_type']='success';
			$this->response['message'] = '添加分类成功';
		} else{
			$this->response['msg_type']='failure';
			$this->response['message'] = '添加分类失败';
		}
		$this->returnResponse();
	}

}