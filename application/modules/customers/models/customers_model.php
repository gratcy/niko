<?php
class Customers_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
 
    function __get_customers_select() {
		if (__get_roles('ExecuteAllBranchCustomers')) $cid = '';
		else $cid = ' AND cbid=' . $this -> memcachedlib -> sesresult['ubid'];

		$this -> db -> select('cid,cname FROM customers_tab WHERE cstatus=1'.$cid.' ORDER BY cname ASC');
		return $this -> db -> get() -> result();
	}
 
	function __get_customers($bid="") {
		if ($bid != "") $bid = " AND a.cbid=" . $bid;
		else $bid = "";
		return "SELECT a.*,b.bname,c.sname,(select sum(d.dototal) FROM delivery_order_detail_tab d WHERE d.sid=0 and d.scid=a.cid AND (d.pstatus<2) AND d.sno_invoice!='') as rcvb 
		FROM customers_tab a left join branch_tab b ON a.cbid=b.bid LEFT JOIN sales_tab c ON a.csid=c.sid WHERE (a.cstatus=1 or a.cstatus=0)".$bid." ORDER BY cname ASC";
	}
    
	function __get_recent_customers($bid) {
		if ($bid != "") $bid = " AND a.cbid=" . $bid;
		else $bid = "";
		$this -> db -> select('a.*,b.bname,c.sname FROM customers_tab a left join branch_tab b ON a.cbid=b.bid LEFT JOIN sales_tab c ON a.csid=c.sid WHERE (a.cstatus=1 or a.cstatus=0)'.$bid.' ORDER BY cname ASC LIMIT 0,5', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_customers_detail($id, $bid="") {
		if ($bid != "") $bid = " AND cbid=" . $bid;
		else $bid = "";
		$this -> db -> select('* FROM customers_tab WHERE (cstatus=1 OR cstatus=0)'.$bid.' AND cid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_customers($data) {
        return $this -> db -> insert('customers_tab', $data);
	}
	
	function __update_customers($id, $data) {
        $this -> db -> where('cid', $id);
        return $this -> db -> update('customers_tab', $data);
	}
	
	function __delete_customers($id, $bid="") {
		if ($bid != "") $bid = "cbid=" . $bid . ' AND ';
		else $bid = "";
		return $this -> db -> query('update customers_tab set cstatus=2 where '.$bid.'cid=' . $id);
	}
	
	function __get_suggestion($bid='') {
		if ($bid != "") $bid = " AND cbid=" . $bid;
		else $bid = "";
		$this -> db -> select('cid as id,cname as name FROM customers_tab WHERE (cstatus=1 OR cstatus=0)'.$bid.' ORDER BY name ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_search($keyword, $bid="") {
		if ($bid != "") $bid = " AND a.cbid=" . $bid;
		else $bid = "";
		$this -> db -> select("a.*,b.bname,c.sname, ,(select sum(d.dototal) FROM delivery_order_detail_tab d WHERE d.sid=0 and d.scid=a.cid AND (d.pstatus<2) AND d.sno_invoice!='') as rcvb
		FROM customers_tab a left join branch_tab b ON a.cbid=b.bid LEFT JOIN sales_tab c ON a.csid=c.sid WHERE (a.cstatus=1 or a.cstatus=0)".$bid." AND a.cname LIKE '%".$keyword."%' ORDER BY cid DESC");
		return $this -> db -> get() -> result();
	}
}
