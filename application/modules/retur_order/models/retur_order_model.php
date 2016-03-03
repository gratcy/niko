<?php
class retur_order_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_retur_order_select() {
		$this -> db -> select('bid,bname FROM retur_order_tab WHERE sstatus=1 ORDER BY bname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_retur_order() {
		return 'SELECT retur_order_tab.*,	
		(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid) as bname,
        (select cname from customers_tab where customers_tab.cid=retur_order_tab.scid) as cname,
		(select ctyperetur from customers_tab where customers_tab.cid=retur_order_tab.scid) as ctyperetur,
		(select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid) as sname
		FROM retur_order_tab
		WHERE retur_order_tab.sstatus<>2  ORDER BY retur_order_tab.sid DESC';
	}
	
	function __get_total_retur_order() {
		$sql = $this -> db -> query('SELECT * FROM retur_order_tab WHERE sstatus=1');
		return $sql -> num_rows();
	}

	
	
	function __get_total_retur_order_monthly($month,$year,$id) {
	//$year=date('Y');
	
	$sql = $this -> db -> query("SELECT * FROM retur_order_tab WHERE YEAR(stgl) = '$year' AND MONTH(stgl) = '$month' ");
	$jum= $sql -> num_rows();
	$sqlx=$this -> db -> query("UPDATE retur_order_tab set snoro='$jum' WHERE sid='$id' ");
	}	
	
	
	function __get_retur_order_detail($id) {
		$this -> db -> select('*,(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=retur_order_tab.scid)as cname,
		(select caddr from customers_tab where customers_tab.cid=retur_order_tab.scid)as caddr,
		(select ccat from customers_tab where customers_tab.cid=retur_order_tab.scid)as ccat,
		(select climit from customers_tab where customers_tab.cid=retur_order_tab.scid)as sisaplafon,
		(select ctyperetur from customers_tab where customers_tab.cid=retur_order_tab.scid)as ctyperetur,		
		(select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid)as sname
		FROM retur_order_tab WHERE retur_order_tab.sstatus<=4 AND retur_order_tab.sid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	
	function __get_retur_order_detail_approve($id) {
		$this -> db -> select('*,(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=retur_order_tab.scid)as cname,
		(select caddr from customers_tab where customers_tab.cid=retur_order_tab.scid)as caddr,
		(select ccat from customers_tab where customers_tab.cid=retur_order_tab.scid)as ccat,
		(select climit from customers_tab where customers_tab.cid=retur_order_tab.scid)as sisaplafon,
		(select ctyperetur from customers_tab where customers_tab.cid=retur_order_tab.scid)as ctyperetur,
		(select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid)as sname
		FROM retur_order_tab WHERE  sstatus<=4 AND sid=' . $id);
		return $this -> db -> get() -> result();
	}	
	
	function __get_customers_detail($id) {
		$this -> db -> select('*,
		(select sname from sales_tab where sales_tab.sid=customers_tab.csid)as sname
		FROM customers_tab WHERE  cid=' . $id);
		return $this -> db -> get() -> result();
	}	
	
	
	function __insert_retur_order($data) {
	
        return $this -> db -> insert('retur_order_tab', $data);
	}
	
	function __update_retur_order($id, $data) {
	//print_r($data);die;
	//echo $id;die;
        $this -> db -> where('sid', $id);
        return $this -> db -> update('retur_order_tab', $data);
		// return $this -> db -> query('update retur_order_tab set sstatus='.$data[0].',spotong='.$data[1].' where sid=' . $id);
	}


	
	function __delete_retur_order($id) {
		return $this -> db -> query('update retur_order_tab set sstatus=2 where sid=' . $id);
	}
	
	function __get_suggestion() {
		$this -> db -> select('sreff as name FROM retur_order_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY name ASC');
		$name = $this -> db -> get() -> result();
		$this -> db -> select('snoro as name FROM retur_order_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY name ASC');
		$pnobukti = $this -> db -> get() -> result();
		return array_merge($name, $pnobukti);
	}
	
	function __get_search($keyword) {
		$this -> db -> select("*,(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid) as bname, (select cname from customers_tab where customers_tab.cid=retur_order_tab.scid) as cname, (select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid) as sname FROM retur_order_tab WHERE (sstatus=0 OR sstatus=1 OR sstatus=2) AND (sreff LIKE '%".$keyword."%' OR snoro LIKE '%".$keyword."%') ORDER BY sid DESC");
		return $this -> db -> get() -> result();
	}
}
