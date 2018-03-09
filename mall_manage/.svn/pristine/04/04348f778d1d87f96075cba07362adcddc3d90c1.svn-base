<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends MY_Controller
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
     * [login 登录操作]
     * @return [type] [成功：跳转；错误：提示错误信息]
     */
	public function login()
	{
		if ($this->input->post(null, true)) {

			$this->response['msg_type'] = $this->data['common']['msg_type'][1];
			$this->response['message'] = $this->data['base']['password_error_msg'];


            // 用户提交的信息
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // 账号及密码检验
            $result = $this->model->getItemByData('admin', ['username'=>$username], 'id,password,is_admin,status');

			if(!empty($result) && sha1($password) == $result['password'] && $result['status'] == 1)
			{
				$this->response['redirect'] = site_url('home');

                // 设置用户session信息
                $session_data = array(
                    "uid"       => $result['id'],
                    "is_admin"  => $result['is_admin'],
                    "username"  => $username,
                );

                $this->session->set_userdata($session_data);

                //登录后跳转
                $this->response['msg_type'] = $this->data['common']['msg_type'][2];
                $this->response['message'] = $this->data['base']['login_success_msg'];
			}

            $this->returnResponse();
        }

        $this->display($this->data['file_path']);
	}

	/**
	 * @copyright 退出
	 */
	public function logout(){
		$this->session->sess_destroy();
        redirect(site_url());
	}
}
