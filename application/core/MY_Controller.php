<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

		$this->load->config('common/' . $this->router->class);
		$this->load->config('common/base');
		$this->data['base'] = $this->config->item('base');
		$this->data['common'] = $this->config->item('common');

		$this->load->model($this->router->class.'Model', 'model');

		$this->data['base']['class_name']  = $this->router->class;
        $this->data['base']['method_name'] = $this->router->method;
		$page_angularjs_path =  'assets/dev/pages/'.$this->data['base']['class_name'].'/'.$this->data['base']['method_name'].'.js';

		$this->data['file_path'] = $this->router->class . '/' . $this->router->method;
		$urls                   = $this->config->item('url');
		$this->data['page_url'] = $urls;

		//echo $page_angularjs_path;

        // 页面 angularjs 文件是否存在
        if(file_exists(FCPATH.$page_angularjs_path))
        {
            $this->data['base']['page_angularjs_url'] = site_url($page_angularjs_path);
        }

		// 当前模块页面中 angluarjs 异步请求所需要的链接
		$new_urls = array();
		$urls = $this->config->item('url');
		if(isset($urls) && $urls)
		{
			foreach ($urls as $key => $value)
			{
				$new_urls[$key] = site_url($value);
			}
		}
		if(!isset($new_urls['base_url'])) $new_urls['base_url'] = BASEURL;
        $this->data['json_urls'] = json_encode($new_urls);

		if($this->router->class != 'login')
        {
			$this->user_session = $this->session->all_userdata();
			self::permission();
		}
		$this->defaultMessage($mgsType = 1, $msg = 3);
        //print_r($this->data);
        //exit;
        $this->assign('data', $this->data);
    }

    /**
     * @copyright 用户是否登录以及登陆之后的权限获取
     * @return    [type]      [description]
     */
    protected function permission()
    {
		unset($this->user_session['__ci_last_regenerate']);
		// 判断是否登录
		if(empty($this->user_session))
		{
			//开发测试阶段，输出文字
			//echo "请登录";
			//exit;
			$this->session->sess_destroy();
			redirect(site_url());
		}

        $this->data['base']['username'] = $this->user_session['username'];
        $this->data['base']['admin'] = $this->user_session['is_admin'];

		// 判断是否有权限操作
		// 首页和我的不做权限校验
		if($this->router->class != 'home' && $this->router->class != 'my')
		{
			$tmp = $this->model->permission_varify($this->user_session['uid'], $this->router->class, $this->router->method);
			if(empty($tmp))
			{
				//开发测试阶段，输出文字
				echo "您无权进行此操作";
				exit;
				//$this->session->sess_destroy();
				//redirect(site_url());
			}
		}

		// 生成权限树
		$permission_tree = [];
		$permission_temp = $this->model->get_permission($this->user_session['uid']);
		if(!empty($permission_temp))
		{
			foreach($permission_temp as $value)
			{
				$permission_tree[$value['controller_name']][$value['model_name']] = $value['model_name'];
			}
		}
		$this->data['permission_tree'] = $permission_tree;
		//print_r($this->data['permission_tree']);
		//exit;
    }


    /**
     * @function returnResponse 返回请求结果
     * @return   json数据
     */
    protected function returnResponse()
    {
        echo json_encode($this->response, JSON_UNESCAPED_UNICODE);
        exit;
    }

    /**
     * @function defaultMessage 请求默认返回信息
     * @param    提示信息类型
     * @param    提示信息文字
     * @return   $this->response 赋值
     */
    protected function defaultMessage($msgType, $msg)
    {
        $this->response['msg_type'] = $this->data['common']['msg_type'][$msgType];
        $this->response['message']  = $this->data['common']['msg'][$msg];
    }

	/**
     * @function assign 修改默认cismarty调用方式，在controller中可以直接使用$this->assign
     * @param    $key
     * @param    $val
     */
    protected function assign($key, $val)
    {
        $this->cismarty->assign($key, $val);
    }

    /**
     * @function display  修改默认cismarty调用方式，在controller中可以直接使用$this->display
     * @param    静态文件路径
     */
    protected function display($html)
    {
        $this->cismarty->display($html.'.html');
    }

	/**
	 * @function validationId 验证ID是否存在或是否数字
	 * @param    $id 数据ID
	 * @return   错误消息
	 */
	protected function validationId($id)
	{
		if (!$id && !is_numeric($id)) {
			// 提示信息：错误：ID错误
			$this->defaultMessage($msgType = 1, $msg = 2);
			$this->returnResponse();
		}
	}

}