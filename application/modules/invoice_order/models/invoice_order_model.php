<?php
class invoice_order_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_sales_order_select() {
		$this -> db -> select('bid,bname FROM sales_order_tab WHERE sstatus=1 ORDER BY bname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_sales_order() {
		return 'SELECT *,(select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=sales_order_tab.scid)as cname,
        (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid)as sname,
		(select sum(ssisa) from sales_order_detail_tab where sales_order_detail_tab.ssid=sales_order_tab.sid)as sisa
		FROM sales_order_tab WHERE (sstatus=3) ORDER BY sales_order_tab.sid DESC';
	}

	function __get_do($snodo) {
		return 'SELECT *,(select (select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as bname,		
		(select (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as cname,
		(select (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sname,		
		(select snoso from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as snoso,
		(select scid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as scid	,
		(select sbid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sbid
		FROM delivery_order_detail_tab WHERE (sid=0) AND snodo='.$snodo.' ORDER BY did DESC';
	}	

	function __get_sisa_so($id) {
		$this -> db -> SELECT ('sum(sales_order_detail_tab.ssisa) as sisa
		FROM sales_order_tab,sales_order_detail_tab where   sales_order_tab.sid=sales_order_detail_tab.ssid
		AND sales_order_tab.sid='.$id);
return $this -> db -> get() -> result();
	}	 	
	
	function __get_do_list($id) {
		return 'SELECT *,(select (select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as bname,		
		(select (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as cname,
		(select (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sname,		
		(select snoso from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as snoso,
		(select scid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as scid	,
		(select sbid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sbid
		FROM delivery_order_detail_tab WHERE (sid=0) AND ssid='.$id.' ORDER BY did DESC';
	}		
	
    function __get_do_select($id) {
		$this -> db -> select('*,(select (select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as bname,		
		(select (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as cname,
		(select (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sname,		
		(select snoso from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as snoso,
		(select scid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as scid	,
		(select sbid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sbid
		FROM delivery_order_detail_tab WHERE (sid=0) AND snodo='.$id.' ORDER BY did DESC');
		return $this -> db -> get() -> result();
	}	
	
	
	function __get_total_sales_order() {
		$sql = $this -> db -> query('SELECT * FROM sales_order_tab WHERE sstatus=1');
		return $sql -> num_rows();
	}

	
	
	function __get_total_sales_order_monthly($month,$year,$id) {
	//$year=date('Y');
	
	$sql = $this -> db -> query("SELECT * FROM sales_order_tab WHERE YEAR(stgl) = '$year' AND MONTH(stgl) = '$month' ");
	$jum= $sql -> num_rows();
	$sqlx=$this -> db -> query("UPDATE sales_order_tab set snoso='$jum' WHERE sid='$id' ");
	}	
	
	
	function __get_sales_order_detail($id) {
		$this -> db -> select('*,(select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=sales_order_tab.ssid)as cname,
		(select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid)as sname
		FROM sales_order_tab WHERE (sstatus=1 OR sstatus=0) AND sid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_sales_order($data) {
	
        return $this -> db -> insert('sales_order_tab', $data);
	}
	
	function __update_sales_order($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('sales_order_tab', $data);
	}
	
	function __delete_sales_order($id) {
		return $this -> db -> query('update sales_order_tab set sstatus=2 where sid=' . $id);
	}
}
