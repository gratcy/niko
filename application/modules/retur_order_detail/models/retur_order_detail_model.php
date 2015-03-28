<?php
class retur_order_detail_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_retur_order_detail_select() {
		$this -> db -> select('bid,bname FROM retur_order_tab WHERE sstatus=1 ORDER BY bname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __insert_inventory($data) {
        return $this -> db -> insert('log_inventory_tab', $data);
	}
	
	function __get_total_retur_order_detail() {
		$sql = $this -> db -> query('SELECT * FROM retur_order_tab WHERE sstatus=1');
		return $sql -> num_rows();
	}
	
	function __get_retur_order_detail($id) {
	
		$this -> db -> select('*,(select sbid from retur_order_tab where retur_order_tab.sid=retur_order_detail_tab.ssid)as sbid FROM retur_order_detail_tab WHERE  ssid=' . $id);
		return $this -> db -> get() -> result();
	}


	function __get_retur_order_detail_by_cust($scid) {
		$this -> db -> select(' *,(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid) as bname,
        (select cname from customers_tab where customers_tab.cid=retur_order_tab.scid) as cname,
		(select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid) as sname
		FROM retur_order_tab WHERE sstatus<>2 AND scid='.$scid.' and status_potong=0 ORDER BY sid DESC');
		return $this -> db -> get() -> result();
	}	
	
	
	function __get_delivery_order_detail($id,$snodo) {
	
		$this -> db -> select("*,		
		(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=retur_order_tab.scid)as cname,
		(select caddr from customers_tab where customers_tab.cid=retur_order_tab.scid)as caddr,
		(select ccat from customers_tab where customers_tab.cid=retur_order_tab.scid)as ccat,
		(select climit from customers_tab where customers_tab.cid=retur_order_tab.scid)as sisaplafon,
		(select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid)as sname,
		delivery_order_detail_tab.snodo as snodo
		FROM retur_order_tab,delivery_order_detail_tab WHERE  retur_order_tab.sid=delivery_order_detail_tab.ssid AND (sstatus=1 OR sstatus=3) AND retur_order_tab.sid='" . $id . "' AND delivery_order_detail_tab.snodo='" .$snodo ."'");
		return $this -> db -> get() -> result();
	}	
	
	
	function __get_retur_order_detail_prod($id) {
		$this -> db -> select('* FROM retur_order_detail_tab a,products_tab b WHERE   a.spid=b.pid AND a.ssid=' . $id);
		return $this -> db -> get() -> result();
	}		
	
	function __get_delivery_order_detail_prod($id,$snodo) {
		$this -> db -> select("*,(select sprice FROM retur_order_detail_tab c where c.sid=a.sid) as sprice,
		(select sdisc FROM retur_order_detail_tab c where c.sid=a.sid) as sdisc	FROM delivery_order_detail_tab a,products_tab b WHERE   a.spid=b.pid AND a.ssid=" . $id ." AND a.snodo='". $snodo . "'");
		
		//echo "select * FROM retur_order_detail_tab a,products_tab b WHERE   a.spid=b.pid AND a.sid= $id";die;
		return $this -> db -> get() -> result();
	}		



	function __del_do_item($snodo) {
	     return $this->db -> query("delete from delivery_order_detail_tab  WHERE snodo='".$snodo."' AND spid >0 ");
        
	}
	
	function __update_retur_order_detail($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('retur_order_detail_tab', $data);
	}
	
	function __update_do_status($snodo,$data) {
        $this -> db -> where('snodo', $snodo);
        return $this -> db -> update('delivery_order_detail_tab', $data);
	}	
	
	function __update_delivery_order($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('retur_order_tab', $data);
	}	
	function __insert_retur_order_detail($data) {
	
        return $this -> db -> insert('retur_order_detail_tab', $data);
	}
	function __insert_delivery_order_detail($data) {
	
        return $this -> db -> insert('delivery_order_detail_tab', $data);
	}	

	
	function __delete_retur_order_detail($id) {
		return $this -> db -> query('Delete FROM retur_order_detail_tab where sid=' . $id);
	}
}