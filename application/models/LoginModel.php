<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Shanghai');
    }
    
    public function login( $data_array ){
    	$username = $data_array['username'];
    	$password = sha1($data_array['password']);
    	$res = $this->db->get_where( 'admin', array('username'=>$username,'password'=>$password,'status'=>'1'),1 )->row_array();
    	if(!empty($res)){
    		$admin_id = $res['id'];
            $sql = " select b.name as name,b.slug as slug,b.parent_id as parent_id,b.id as id from shop_admin_permission as a left join shop_permission as b on a.permission_id = b.id where a.admin_id = '$admin_id'";
    		$response = $this->db->query($sql)->result_array();
            $refer = array();  
            $tree = array();
            foreach ($response as $k => $v) {
                $refer[$v['id']] =& $response[$k];
            }
            foreach($response as $k => $v){  
                $parent_id = $v['parent_id'];   //获取当前分类的父级id  
                if($parent_id == '0'){  
                    $tree[] =& $response[$k];   //顶级栏目  
                }else{  
                    if(isset($refer[$parent_id])){  
                        $refer[$parent_id]['subcat'][] =& $response[$k];  //如果存在父级栏目，则添加进父级栏目的子栏目数组中  
                    }  
                }  
            }
    		return array('response'=>$tree,'res'=>$res);
    	}else{
            //判断登录失败的原因
            $lose_name = $this->db->get_where( 'admin', array('username'=>$username,'status'=>'1'),1 )->row_array();
            if(!empty($lose_name)){
                return '1';
            }
            $lose_psw = $this->db->get_where( 'admin', array('password'=>$password,'status'=>'1'),1 )->row_array();
            if(!empty($lose_psw)){
                return '1';
            }
    		return false;
    	}
    }
}