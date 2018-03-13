<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

	/**
	 *	修改用户信息
	 */
	public function edit()
	{
		$get  = $this->input->get(null, true);
		$post = $this->input->post(null, true);

		if(empty($get) || !isset($get['id']))
		{
			redirect(site_url('home'));
		}

		if(!empty($post))
		{
        	$this->response['msg_type'] = 'failure';
        	$this->response['message'] = $this->data['base']['data_exist_error_msg'];

        	$permission = $this->createNewPermission($this->input->post('permission'));

        	$my_permission = $this->model->my_permission($this->user_session['uid']);

        	$result = array_diff($permission, $my_permission);
        	if(empty($result))
        	{
	            $input['username'] = $this->input->post('username');

	            $tmp = $this->model->getItemByData('admin', ['username'=>$input['username'], 'id != '=>$get['id']], 'id');

	            // 校验用户名是否已存在
	            if(empty($tmp))
	            {
	            	$input['realname'] = $this->input->post('real_name');
		            if(!empty($this->input->post('password'))) $input['password']  = sha1($this->input->post('password'));
		            $input['is_admin'] = $this->input->post('data');

		        	if($this->model->updateUser($get['id'], $this->user_session['uid'], $this->user_session['is_admin'], $input, $permission))
		        	{
						$this->response['msg_type'] = 'success';
		            	$this->response['message'] = '';
		        	}
		        }
	        }
	        $this->returnResponse();
		}

		$info = $this->model->userInfo($get['id'], $this->user_session['uid'], $this->user_session['is_admin']);
		if(empty($info))
		{
			redirect(site_url('home'));
		}
		$this->assign('page', $this->input->get('page'));
		$this->assign('name', $this->input->get('name'));
		$this->assign('state', $this->input->get('state'));
		$this->assign('user_info', json_encode($info, JSON_UNESCAPED_UNICODE));
		$this->display($this->data['file_path']);
	}

	/**
	 * 封禁用户
	 */
	public function lock()
	{
		$page  = $this->input->get('page');
		$state = $this->input->get('state');
		$name  = $this->input->get('name');
		$id    = $this->input->get('id');
		$lock  = $this->input->get('lock');

		$this->model->lockUser($id, $this->user_session['uid'], $this->user_session['is_admin'], $lock);

		$url = site_url("user?name={$name}&state={$state}&page={$page}");
		redirect($url);
	}

	/**
	 * 新增用户
	 */
	public function create()
	{
		if ($this->input->post(null, true))
        {
        	$permission = $this->createNewPermission($this->input->post('permission'));

        	$my_permission = $this->model->my_permission($this->user_session['uid']);

        	$result = array_diff($permission, $my_permission);

        	if(empty($result))
        	{
        		$input['username']  = $this->input->post('username');

        		$tmp = $this->model->getItemByData('admin', ['username'=>$input['username']], 'id');

	            // 校验用户名是否已存在
	            if(empty($tmp))
	            {
	            	$input['realname'] = $this->input->post('real_name');
		            $input['password']  = sha1($this->input->post('password'));
		            $input['parent_id'] = $this->user_session['uid'];
		            $input['parent_admin'] = $this->user_session['username'];
		            $input['is_admin']     = $this->input->post('data');
		            $input['create_time']   = time();
	            	$id = $this->model->insert('admin', $input);
	            	if($id)
	            	{
	            		foreach($permission as $val)
	            		{
	            			$data = ['admin_id'=>$id,'permission_id'=>$val];

	            			$this->model->insert('admin_permission', $data);
	            		}
            			$this->response['msg_type'] = 'success';
            			$this->response['message'] = '添加成功';
	                	$this->returnResponse();
	            	}
	            }
        	}
        	$this->response['msg_type'] = 'failure';
        	$this->response['message'] = $this->data['base']['data_exist_error_msg'];
			$this->returnResponse();
		}
		$this->display($this->data['file_path']);
	}


	/**
     * @function recursion 遍历传入权限参数
     * @param    前台提交的权限数据
     */
	
    private function createNewPermission($permission_data)
    {
    	$res = [];
        if (!empty($permission_data) && isset($permission_data['children']) && is_array($permission_data['children']))
        {
            foreach ($permission_data['children'] as $value)
            {
            	if (!empty($value) && isset($value['children']) && is_array($value['children']))
        		{
        			foreach ($value['children'] as $val)
            		{
            			if(isset($val['selected']) && $val['selected'] == 'true')
            			{
            				$res[] = $val['key'];
            			}
            		}
        		}
            }
        }
        return $res;
    }

	/**
	 * 用户列表
	 */
	public function index()
	{
		$searchbtn = "筛选 ＋";
		$searchbox = "display:none";
		$page  = $this->input->get('per_page') > 1 ? $this->input->get('per_page') : 1;

		$state = $this->input->get('status');

		$name = $this->input->get('name');

		$state =  isset($state) ? $this->input->get('status') : -1;

		$name  = isset($name) ? $this->input->get('name') : '';

		if($state != -1 || !empty($name))
		{
			$searchbtn = "筛选 －";
			$searchbox = "display:''";
		}
		$res = $this->model->userList($name, $state, $page, $this->user_session['uid'], $this->user_session['is_admin']);
		$this->assign('page', $page);
		$this->assign('name', $name);
		$this->assign('state', $state);
		$this->assign('searchbtn', $searchbtn);
		$this->assign('searchbox', $searchbox);
		$this->assign('list', $res['list']);
        $this->assign('pager_links', $res['pager_links']);
		$this->display($this->data['file_path']);
	}
}
