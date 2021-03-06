<?php
class Sales_commision_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_sales_commision($bid="") {
		if ($bid != "") $bid = " AND sbid=" . $bid;
		else $bid = "";
		return 'SELECT a.*,b.bname,c.cname FROM sales_commision_tab a left join branch_tab b ON a.sbid=b.bid left join categories_tab c ON a.scid=c.cid WHERE (a.sstatus=1 or a.sstatus=0)'.$bid.' ORDER BY a.sid DESC';
	}
    
    function __get_sales_commision_select() {
		if ($bid != "") $bid = " AND sbid=" . $bid;
		else $bid = "";
		$this -> db -> select('sid,sname FROM sales_commision_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY sname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_sales_commision_detail($id, $bid="") {
		$this -> db -> select('* FROM sales_commision_tab WHERE (sstatus=1 OR sstatus=0)'.$bid.' AND sid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_sales_commision($data) {
        return $this -> db -> insert('sales_commision_tab', $data);
	}
	
	function __update_sales_commision($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('sales_commision_tab', $data);
	}
	
	function __delete_sales_commision($id, $bid="") {
		if ($bid != "") $bid = "sbid=" . $bid . ' AND ';
		else $bid = "";
		return $this -> db -> query('update sales_commision_tab set sstatus=2 where '.$bid.'sid=' . $id);
	}
}
