<?php

class BuyerModel extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @DateTime  2017-12-19
     * @copyright 买家列表
     * @return    [type]      [description]
     */
    public function buyerList( $status,$username,$page ){
        $this->db->select('*');
        $this->db->from('user');
        if(!empty($username)){
            $this->db->like( 'username', $username );
        }
        if($status >= 0){
            $this->db->where( 'status', $status );
        }
        $this->db->where( 'id > ', '10' );
        $total_rows = $this->db->count_all_results('', false);

        $pager = $this->setPager($total_rows, $page);
        $this->db->limit($pager['per_page'], $pager['start_page']);
        $this->db->order_by('id', 'DESC');

        $res['list'] = $this->db->get()->result_array();
        $res['pager_links'] = $this->pagination->create_links();
        return $res;
    }
    /**
     * @DateTime  2017-12-20
     * @copyright 买家禁言与解禁
     * @param     [type]      $id     [description]
     * @param     [type]      $status [description]
     * @return    [type]              [description]
     */
    public function buyerLock( $id, $status ){
        $status = ($status == '0') ? '2' : '0';
        $res = $this->db->update('user',array( 'status'=>$status ),array( 'id'=>$id ));
        if($res){
            return true;
        }
    }
    /**
     * @DateTime  2017-12-20
     * @copyright 买家详情
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */
    public function buyerDetail( $id )
    {
        $res = $this->db->get_where( 'user', array('id'=>$id) )->row_array();
        return $res;
    }
}
