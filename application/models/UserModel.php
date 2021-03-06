<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     *  修改用户信息
     */
    public function updateUser($id, $uid, $admin, $data, $permission)
    {
        $where = ['id'=>$id];
        if($admin != 1) $where['admin_id'] = $uid;

        if($this->db->update('admin', $data, $where))
        {
            $this->db->delete('admin_permission', ['admin_id'=>$id]);
            foreach($permission as $val)
            {
                $data = ['admin_id'=>$id, 'permission_id'=>$val];
                $this->model->insert('admin_permission', $data);
            }
            return true;
        }
        return false;
    }

    /*
     *  用户信息
     */
    public function userInfo($id, $uid, $admin)
    {
        $res = [];
        $this->db->select('id,username,realname,is_admin as data');
        $this->db->from('admin');
        $this->db->where('id', $id);
        if($admin != 1) $this->db->where('parent_id', $uid);
        $res = $this->db->get()->row_array();
        if(!empty($res))
        {
            $this->db->select('b.id,b.parent_id');
            $this->db->from('admin_permission a');
            $this->db->join('shop_permission b', 'b.id = a.permission_id', 'left');
            $this->db->where('a.admin_id', $id);
            $permission_temp = $this->db->get()->result_array();
            $permission_tree = array();
            foreach($permission_temp as $value)
            {
                $permission_tree[$value['parent_id']][$value['id']] = $value['id'];
            }
            $res['permission'] = $permission_tree;
        }
        return $res;
    }

    /*
     *  封禁用户信息
     */
    public function lockUser($id, $uid, $admin, $lock)
    {
        $data = ['status'=>$lock, 'lock_time'=>time(), 'lock_user'=>$uid];
        $old_lock = $lock == 1 ? 0 : 1;
        $where = ['id'=>$id, 'status'=>$old_lock];
        if($admin != 1) $where['parent_id'] = $uid;
        $this->db->update('admin', $data, $where);
    }


    /**
     * 用户列表
     * @param    int 管理员ID
     * @return   array
     */
    public function userList($name, $state, $page, $uid, $is_admin)
    {
        $this->db->select("id,username,realname,parent_admin,create_time,status");
        $this->db->from('admin');

        if($is_admin == 0) $this->db->where('parent_id', $uid);

        if(!empty($name)) $this->db->like('realname', $name);

        if($state >= 0) $this->db->where('status', $state);

        $this->db->where('id != ', $uid);

        $total_rows = $this->db->count_all_results('', false);

        $pager = $this->setPager($total_rows, $page);

        $this->db->limit($pager['per_page'], $pager['start_page']);

        $this->db->order_by('create_time', 'DESC');

        // 获取结果集
        $data['list'] = $this->db->get()->result_array();

        // 创建翻页html代码
        $data['pager_links'] = $this->pagination->create_links();
        return $data;
    }
}