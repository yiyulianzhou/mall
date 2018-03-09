<?php

class MyModel extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @copyright 获取个人信息
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */
    public function myInfo( $id )
    {
    	$this->db->select('*');
    	$this->db->from('admin');
    	$this->db->where( 'id', $id );
    	$res = $this->db->get()->row_array();
    	return $res;
    }
    /**
     * @copyright 修改密码
     * @param     [type]      $oldpsw     [description]
     * @param     [type]      $newpsw     [description]
     * @param     [type]      $surenewpsw [description]
     * @return    [type]                  [description]
     */
    public function editPasswd( $oldpsw, $newpsw, $surenewpsw )
    {
        $this->db->select('*');
        $this->db->from('admin');
        $id = $this->user_session['uid'];
        $username = $this->user_session['username'];
        $this->db->where( 'id', $id );
        $this->db->where( 'username', $username );
        $this->db->where( 'password', sha1($oldpsw) );
        $res = $this->db->get()->row_array();
        if(empty($res)){
            return false;
        }else{
           $response = $this->db->update('admin',array('password'=>sha1($newpsw)),array('id'=>$id));
           return true;
        }
    }
}