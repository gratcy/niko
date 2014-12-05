<?php
class Services_wo_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_services_wo($bid="") {
		if ($bid != "") $bid = " AND a.sbid=" . $bid;
		else $bid = "";
		return 'SELECT a.*,b.bname,c.pname FROM services_workorder_tab a left join branch_tab b ON a.sbid=b.bid LEFT JOIN products_tab c ON a.spid=c.pid WHERE (a.sstatus=1 or a.sstatus=0 OR a.sstatus=3)'.$bid.' ORDER BY a.sid DESC';
	}
	
	function __get_services_wo_detail($id, $bid="") {
		if ($bid != "") $bid = " AND sbid=" . $bid;
		else $bid = "";
		$this -> db -> select('* FROM services_workorder_tab WHERE (sstatus=1 OR sstatus=0 OR sstatus=3)'.$bid.' AND sid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_services_wo_select($bid="") {
		if ($bid != "") $bid = " AND sbid=" . $bid;
		else $bid = "";
		$this -> db -> select('sid,sno FROM services_workorder_tab WHERE sstatus=1'.$bid);
		return $this -> db -> get() -> result();
	}
	
	function __insert_services_wo($data) {
        return $this -> db -> insert('services_workorder_tab', $data);
	}
	
	function __update_services_wo($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('services_workorder_tab', $data);
	}
	
	function __delete_services_wo($id, $bid="") {
		if ($bid != "") $bid = "sbid=" . $bid . ' AND ';
		else $bid = "";
		return $this -> db -> query('update services_workorder_tab set sstatus=2 where '.$bid.'sid=' . $id);
	}
	
	function __get_suggestion() {
		$this -> db -> select('sno as name FROM services_workorder_tab WHERE (sstatus=1 OR sstatus=0 OR sstatus=3) ORDER BY name ASC');
		return $this -> db -> get() -> result();
	}
	
	function __insert_services_wo_technical($data) {
        return $this -> db -> insert('services_tecnical_tab', $data);
	}
	
	function __get_technical_services($id) {
		$this -> db -> select('stid FROM services_tecnical_tab WHERE sstatus=1 AND ssid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __check_technical_services($id,$tid) {
		$this -> db -> select('stid FROM services_tecnical_tab WHERE sstatus=1 AND stid=' . $tid . ' AND ssid=' . $id);
		return  $this -> db -> get() -> result();
	}
	
	function __delete_technical_services($id,$tid) {
		return $this -> db -> query('update services_tecnical_tab set sstatus=2 where ssid='.$id.' and stid=' . $tid);
	}
	
	function __get_search($keyword, $bid="") {
		if ($bid != "") $bid = " AND a.sbid=" . $bid;
		else $bid = "";
		$this -> db -> select("a.*,b.bname,c.pname FROM services_workorder_tab a left join branch_tab b ON a.sbid=b.bid LEFT JOIN products_tab c ON a.spid=c.pid WHERE (a.sstatus=1 or a.sstatus=0)".$bid." AND a.sno LIKE '%".$keyword."%' ORDER BY a.sid DESC");
		return $this -> db -> get() -> result();
	}
	
	function __check_nowo($bid) {
		$this -> db -> select("* FROM services_workorder_tab WHERE FROM_UNIXTIME(sdate, '%Y-%m') >= '".date('Y-m')."' AND sbid=" . $bid, false);
		return $this -> db -> get() -> num_rows();
	}
}
