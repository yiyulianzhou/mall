<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BulletinModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
	

	public function get($id)
	{
		$this->db->select("*");
        $this->db->from('admin_bulletin');
		$this->db->where('id', $id);
		return $this->db->get()->row_array();
	}

    /*
     *  保存新公告
     */
    public function save($title, $content, $type, $uid)
    {
		$data = ['admin_id'=>$uid, 'title'=>$title, 'content'=>$content, 'type'=>$type, 'create_time'=>time()];
		$this->db->insert('admin_bulletin', $data);

        if($this->db->insert_id())
        {
			if($type == 1)
			{
				$buyer = self::buyerList();
				if(!empty($buyer['id']))
				{
					$this->sendToUser($buyer['id'], $title, $content, 1);
				}
				$seller = self::sellerList();
				if(!empty($seller['id']))
				{
					$this->sendToUser($seller['id'], $title, $content, 2);
				}
			}elseif($type == 2)
			{
				$buyer = self::buyerList();
				if(!empty($buyer['id']))
				{
					$this->sendToUser($buyer['id'], $title, $content, 1);
				}
			}elseif($type == 3)
			{
				$seller = self::sellerList();
				if(!empty($seller['id']))
				{
					$this->sendToUser($seller['id'], $title, $content, 2);
				}
			}
        }
    }

	private function sendToUser($user, $title, $content, $to_type)
	{
		$list = explode(',', $user);

		if(!empty($list))
		{
			foreach($list as $to_user)
			{
				$this->db->select("id");
				$this->db->from('message_list');
				$this->db->where('from_user', 1);
				$this->db->where('from_type', -1);
				$this->db->where('to_user', $to_user);
				$this->db->where('to_type', $to_type);
				$history = $this->db->get()->row_array();
				//print_r($history);

				if(!empty($history))
				{
					$this->db->set('msg_number', 'msg_number + 1', FALSE);
					$this->db->set('last_message', $title);
					$this->db->set('last_time', time());
					$this->db->where('id', $history['id']);
					$this->db->update('message_list');
				}else{
					$data = ['to_user'=>$to_user, 'to_type'=>$to_type, 'from_user'=>1, 'from_type'=>-1, 'last_message'=>$title, 'last_time'=>time(), 'msg_number'=>1];
					$this->db->insert('message_list', $data);
				}

				$data = ['to_user'=>$to_user, 'to_type'=>$to_type, 'from_user'=>1, 'from_type'=>-1, 'contents'=>$content, 'create_time'=>date('Y-m-d H:i:s')];
				$this->db->insert('message', $data);
			}
		}
	}

	private function sellerList()
	{
		$this->db->select("group_concat(uid) as id");
        $this->db->from('user_shop');
		$this->db->where('uid > ', 10);
		return $this->db->get()->row_array();
	}

	private function buyerList()
	{
		$this->db->select("group_concat(id) as id");
        $this->db->from('user');
		$this->db->where('id > ', 10);
		return $this->db->get()->row_array();
	}


    /**
     * 列表
     */
    public function msgList($title, $page)
    {
        $this->db->select("a.id,a.title,a.create_time,a.type,b.username");
        $this->db->from('admin_bulletin a');
		$this->db->join('admin b', 'a.admin_id = b.id', 'left');

        if(!empty($title)) $this->db->like('a.title', $title);

        $total_rows = $this->db->count_all_results('', false);

        $pager = $this->setPager($total_rows, $page);

        $this->db->limit($pager['per_page'], $pager['start_page']);
        $this->db->order_by('id', 'DESC');

        // 获取结果集
        $data['list'] = $this->db->get()->result_array();

        // 创建翻页html代码
        $data['pager_links'] = $this->pagination->create_links();

        return $data;
    }
}