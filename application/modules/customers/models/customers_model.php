<?php
class Customers_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
 
    function __get_customers_select() {
		$this -> db -> select('cid,cname FROM customers_tab WHERE cstatus=1 ORDER BY cname ASC');
		return $this -> db -> get() -> result();
	}
 
	function __get_customers($bid="") {
		if ($bid != "") $bid = " AND a.cbid=" . $bid;
		else $bid = "";
		return 'SELECT a.*,b.bname FROM customers_tab a left join branch_tab b ON a.cbid=b.bid WHERE (a.cstatus=1 or a.cstatus=0)'.$bid.' ORDER BY cid DESC';
	}
    
	function __get_recent_customers($bid) {
		if ($bid != "") $bid = " AND a.cbid=" . $bid;
		else $bid = "";
		$this -> db -> select('a.*,b.bname FROM customers_tab a left join branch_tab b ON a.cbid=b.bid WHERE (a.cstatus=1 or a.cstatus=0)'.$bid.' ORDER BY cid DESC LIMIT 0,5', FALSE);
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
}
