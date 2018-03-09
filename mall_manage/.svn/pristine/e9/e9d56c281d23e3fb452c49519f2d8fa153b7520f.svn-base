<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class my extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @copyright 个人信息
     * @return    [type]      [description]
     */
    public function info()
    {
        $id = $this->user_session['uid'];
        $res = $this->model->myInfo( $id );
        $this->assign('res', $res);
        $this->display($this->data['file_path']);
    }
    /**
     * @copyright 修改密码
     * @return    [type]      [description]
     */
    public function passwd()
    {
        if ($this->input->post(null, true)) {
            $oldpsw = $this->input->post('oldpsw');
            $newpsw = $this->input->post('newpsw');
            $surenewpsw = $this->input->post('surenewpsw');
            $res = $this->model->editPasswd( $oldpsw, $newpsw, $surenewpsw );
            if( $res == true ){
                $this->response['redirect'] = site_url('login');
                $this->response['msg_type'] = $this->data['common']['msg_type'][2];
                $this->response['message'] = $this->data['base']['edit_success_msg'];
            }else{
                $this->response['msg_type'] = $this->data['common']['msg_type'][1];
                $this->response['message'] = $this->data['base']['edit_error_msg'];
            }
            $this->returnResponse();
        }
        $this->display($this->data['file_path']);
    }
}