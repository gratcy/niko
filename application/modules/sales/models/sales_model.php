<?php
class Sales_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_sales($bid="") {
		if ($bid != "") $bid = " AND sbid=" . $bid;
		else $bid = "";
		return 'SELECT a.*,b.bname FROM sales_tab a left join branch_tab b ON a.sbid=b.bid WHERE (a.sstatus=1 or a.sstatus=0)'.$bid.' ORDER BY a.sid DESC';
	}
    
    function __get_sales_select() {
		$this -> db -> select('sid,sname FROM sales_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY sname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_sales_detail($id, $bid="") {
		if ($bid != "") $bid = " AND sbid=" . $bid;
		else $bid = "";
		$this -> db -> select('* FROM sales_tab WHERE (sstatus=1 OR sstatus=0)'.$bid.' AND sid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_sales($data) {
        return $this -> db -> insert('sales_tab', $data);
	}
	
	function __update_sales($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('sales_tab', $data);
	}
	
	function __delete_sales($id, $bid="") {
		if ($bid != "") $bid = "sbid=" . $bid . ' AND ';
		else $bid = "";
		return $this -> db -> query('update sales_tab set sstatus=2 where '.$bid.'sid=' . $id);
	}
}
