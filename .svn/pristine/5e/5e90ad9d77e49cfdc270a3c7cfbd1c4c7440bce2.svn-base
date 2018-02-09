<?php

class SellerModel extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @DateTime  2017-12-19
     * @copyright 卖家列表
     * @return    [type]      [description]
     */
    public function sellerList( $lock,$shop,$page,$title ){
        $this->db->select('a.id,a.shop,a.pic,a.address_id,a.name,a.phone,a.is_real,a.is_health,a.create_time,a.lock,b.title');
        $this->db->from('user_shop a');
        $this->db->join( 'building b', 'b.id = a.address_id', 'left' );
        if(!empty($shop)){
            $this->db->like( 'a.shop', $shop );
        }
        if(!empty($title)){
            $this->db->like( 'b.title', $title );
        }
        if($lock >= 0){
            $this->db->where( 'lock', $lock );
        }
        $this->db->where( 'uid > ', '10' );
        $total_rows = $this->db->count_all_results('', false);

        $pager = $this->setPager($total_rows, $page);
        $this->db->limit($pager['per_page'], $pager['start_page']);
        $this->db->order_by('id', 'DESC');

        $res['list'] = $this->db->get()->result_array();
        $res['pager_links'] = $this->pagination->create_links();
        return $res;
    }
    /**
     * @copyright 卖家解封与封禁
     * @param     [type]      $id     [description]
     * @param     [type]      $lock [description]
     * @return    [type]              [description]
     */
    public function sellerLock( $id, $lock ){
        $lock = ($lock == '0') ? '1' : '0';
        $res = $this->db->update('user_shop',array( 'lock'=>$lock ),array( 'id'=>$id ));
        if($res){
            return true;
        }
    }
    /**
     * @DateTime  2017-12-20
     * @copyright 卖家详情
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */
    public function sellerDetail( $id )
    {
        $this->db->select('a.*,b.title,b.address');
        $this->db->from('user_shop a');
        $this->db->join( 'building b', 'b.id = a.address_id', 'left' );
        $this->db->where( 'a.id', $id );
        $res = $this->db->get()->row_array();
        return $res;
    }
    /**
     * @copyright 卖家审核
     * @param     [type]      $id        [description]
     * @param     [type]      $is_real   [description]
     * @param     [type]      $is_health [description]
     * @return    [type]                 [description]
     */
    public function sellerVerify( $id, $is_real, $is_health )
    {
        if(!empty($is_real) || $is_real == '0'){
            $data['is_real'] = $is_real;
        }
        $data['is_health'] = $is_health;
        $res = $this->db->update( 'user_shop', $data,array('id'=>$id) );
    }
}