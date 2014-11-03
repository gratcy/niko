<?php
class sales_order_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_sales_order_select() {
		$this -> db -> select('bid,bname FROM sales_order_tab WHERE sstatus=1 ORDER BY bname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_sales_order() {
		return 'SELECT *,(select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) as bname,
        (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) as cname,
		(select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) as sname
		FROM sales_order_tab WHERE (sstatus=0 OR sstatus=1 OR sstatus=2) ORDER BY sid DESC';
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
		(select cname from customers_tab where customers_tab.cid=sales_order_tab.scid)as cname,
		(select caddr from customers_tab where customers_tab.cid=sales_order_tab.scid)as caddr,
		(select climit from customers_tab where customers_tab.cid=sales_order_tab.scid)as sisaplafon,
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
	
	function __get_suggestion() {
		$this -> db -> select('sref as name FROM sales_order_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY name ASC');
		$name = $this -> db -> get() -> result();
		$this -> db -> select('snoso as name FROM sales_order_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY name ASC');
		$pnobukti = $this -> db -> get() -> result();
		return array_merge($name, $pnobukti);
	}
	
	function __get_search($keyword) {
		$this -> db -> select("*,(select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) as bname, (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) as cname, (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) as sname FROM sales_order_tab WHERE (sstatus=0 OR sstatus=1 OR sstatus=2) AND (sref LIKE '%".$keyword."%' OR snoso LIKE '%".$keyword."%') ORDER BY sid DESC");
		return $this -> db -> get() -> result();
	}
}
