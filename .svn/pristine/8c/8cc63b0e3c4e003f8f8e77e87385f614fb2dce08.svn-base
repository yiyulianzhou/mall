<?php

/**
 * 订单管理
 */
class OrderModel extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @copyright 订单列表
     * @param     [type]      $status  [description]
     * @param     [type]      $comment [description]
     * @param     [type]      $page    [description]
     * @return    [type]               [description]
     */
    public function orderList( $status,$page  )
    {
        $this->db->select( 'a.*,b.username,d.name,e.name as goodsName' );
        $this->db->from( 'order a' );
        $this->db->join('user b','b.id = a.buyer_id','left');
        $this->db->join('goods_model d','d.id = a.geid','left');
        $this->db->join('goods e','e.id = d.gid','left');
        if($status > -1){
            $this->db->where( 'a.status', $status );
        }
        // $this->db->where( 'a.status !=', '11');
        $total_rows = $this->db->count_all_results('', false);
        $pager = $this->setPager($total_rows, $page);
        $this->db->limit($pager['per_page'], $pager['start_page']);
        $this->db->order_by('id', 'DESC');
        $res['list'] = $this->db->get()->result_array();
        $res['pager_links'] = $this->pagination->create_links();
        return $res;
    }
    /**
     * @copyright 订单详情
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */
    public function orderDetail( $id )
    {
        $this->db->select( 'a.*,b.username as buyerName,c.name as shipName,c.phone as shipPhone,d.name,e.name as goodsName,f.name as sellerName,g.address' );
        $this->db->from( 'order a' );
        $this->db->join('user b','b.id = a.buyer_id','left');
        $this->db->join('user_address c','c.id = a.address_id','left');
        $this->db->join('goods_model d','d.id = a.geid','left');
        $this->db->join('goods e','e.id = d.gid','left');
        $this->db->join('user_shop f','f.id = a.sellers_id','left');
        $this->db->join('building g','g.id = c.address_id','left');
        $this->db->where( 'a.id', $id );
        $res = $this->db->get()->row_array();
        return $res;
    }
    /**
     * @copyright 删除订单
     * @param     [type]      $id [description]
     * @return    [type]          [description]
     */
    public function delete( $id )
    {
        $res = $this->db->update('order',array('status'=>'11'),array('id'=>$id));
        if($res){
            return true;
        }
    }
}
