<?php
class sales_order_detail_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_sales_order_detail_select() {
		$this -> db -> select('bid,bname FROM sales_order_tab WHERE sstatus=1 ORDER BY bname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __insert_inventory($data) {
        return $this -> db -> insert('log_inventory_tab', $data);
	}
	
	function __get_total_sales_order_detail() {
		$sql = $this -> db -> query('SELECT * FROM sales_order_tab WHERE sstatus=1');
		return $sql -> num_rows();
	}
	
	function __get_sales_order_detail($id) {
	
		$this -> db -> select('*,(select sbid from sales_order_tab where sales_order_tab.sid=sales_order_detail_tab.ssid)as sbid FROM sales_order_detail_tab WHERE  ssid=' . $id);
		return $this -> db -> get() -> result();
	}

	function __get_delivery_order_detail($id,$snodo) {
	
		$this -> db -> select("*,sales_order_tab.ssid as ssid_sales, delivery_order_detail_tab.ssid as ssid_so,			
		(select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=sales_order_tab.scid)as cname,
		(select caddr from customers_tab where customers_tab.cid=sales_order_tab.scid)as caddr,
		(select ccat from customers_tab where customers_tab.cid=sales_order_tab.scid)as ccat,
		(select climit from customers_tab where customers_tab.cid=sales_order_tab.scid)as sisaplafon,
		(select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid)as sname,
		delivery_order_detail_tab.snodo as snodo
		FROM sales_order_tab,delivery_order_detail_tab WHERE  sales_order_tab.sid=delivery_order_detail_tab.ssid AND (sstatus=1 OR sstatus=3) AND sales_order_tab.sid='" . $id . "' AND delivery_order_detail_tab.snodo='" .$snodo ."'");
		return $this -> db -> get() -> result();
	}	
	
	
	function __get_sales_order_detail_prod($id) {
		$this -> db -> select('* FROM sales_order_detail_tab a,products_tab b WHERE   a.spid=b.pid AND a.ssid=' . $id);
		return $this -> db -> get() -> result();
	}		
	
	function __get_delivery_order_detail_prod($id,$snodo) {
		$this -> db -> select("*,(select sprice FROM sales_order_detail_tab c where c.sid=a.sid) as sprice,
		(select sdisc FROM sales_order_detail_tab c where c.sid=a.sid) as sdisc	FROM delivery_order_detail_tab a,products_tab b WHERE   a.spid=b.pid AND a.ssid=" . $id ." AND a.snodo='". $snodo . "'");
		
		//echo "select * FROM sales_order_detail_tab a,products_tab b WHERE   a.spid=b.pid AND a.sid= $id";die;
		return $this -> db -> get() -> result();
	}		



	function __del_do_item($snodo) {
	     return $this->db -> query("delete from delivery_order_detail_tab  WHERE snodo='".$snodo."' AND spid >0 ");
        
	}
	
	function __update_sales_order_detail($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('sales_order_detail_tab', $data);
	}
	
	function __update_do_status($snodo,$data) {
        $this -> db -> where('snodo', $snodo);
        return $this -> db -> update('delivery_order_detail_tab', $data);
	}	

	function __update_amount_status($did,$data) {
        $this -> db -> where('did', $did);
        return $this -> db -> update('delivery_order_detail_tab', $data);
	}
	
	function __update_delivery_order($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('sales_order_tab', $data);
	}	
	function __insert_sales_order_detail($data) {
	
        return $this -> db -> insert('sales_order_detail_tab', $data);
	}
	function __insert_delivery_order_detail($data) {
	
        return $this -> db -> insert('delivery_order_detail_tab', $data);
	}	

	function __update_invoice_order($snodo, $data) {
		
		
        $this -> db -> where('snodo', $snodo);
        return $this -> db -> update('delivery_order_detail_tab', $data);
		
		//$sql="select sum(
	}		
	
	function __delete_sales_order_detail($id) {
		return $this -> db -> query('Delete FROM sales_order_detail_tab where sid=' . $id);
	}
}
