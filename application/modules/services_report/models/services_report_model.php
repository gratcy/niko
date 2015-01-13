<?php
class Services_report_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_services_report($bid="") {
		if ($bid != "") $bid = " AND b.sbid=" . $bid;
		else $bid = "";
		return 'SELECT a.*,b.sno,c.bname FROM services_report_tab a left join services_workorder_tab b ON a.ssid=b.sid left join branch_tab c ON b.sbid=c.bid WHERE (a.sstatus=1 or a.sstatus=0 OR a.sstatus=3)'.$bid.' ORDER BY a.sid DESC';
	}
	
	function __get_services_report_detail_print($id) {
		$this -> db -> select('a.*,b.sno,b.sqty FROM services_report_tab a LEFT JOIN services_workorder_tab b ON a.ssid=b.sid WHERE (a.sstatus=1 OR a.sstatus=0 OR a.sstatus=3) AND a.sid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_services_report_detail($id) {
		$this -> db -> select('a.*,b.sqty FROM services_report_tab a LEFT JOIN services_workorder_tab b ON a.ssid=b.sid WHERE (a.sstatus=1 OR a.sstatus=0 OR a.sstatus=3) AND a.sid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_services_report($data) {
        return $this -> db -> insert('services_report_tab', $data);
	}
	
	function __insert_services_report_sparepart($data) {
        return $this -> db -> insert('services_report_sparepart_tab', $data);
	}
	
	function __check_sparepart($id) {
		$this -> db -> select('* FROM services_report_sparepart_tab WHERE (sstatus=1 OR sstatus=0 OR sstatus=3) AND ssid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_detail_sparepart($id, $sid) {
		$this -> db -> select('* FROM services_report_sparepart_tab WHERE (sstatus=1 OR sstatus=0 OR sstatus=3) AND ssid=' . $id . ' AND sssid=' . $sid);
		return $this -> db -> get() -> result();
	}
	
	function __delete_services_report_sparepart($id) {
		return $this -> db -> query('update services_report_sparepart_tab set sstatus=2 where ssid=' . $id);
	}
	
	function __insert_services_report_product($data) {
        return $this -> db -> insert('services_report_product_tab', $data);
	}
	
	function __update_services_report_product($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('services_report_product_tab', $data);
	}
	
	function __get_services_report_product($id) {
		$this -> db -> select('* FROM services_report_product_tab WHERE sstatus=1 AND ssid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __update_services_report($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('services_report_tab', $data);
	}
	
	function __delete_services_report($id) {
		return $this -> db -> query('update services_report_tab set sstatus=2 where sid=' . $id);
	}
	
	function __get_search($keyword, $bid="") {
		if ($bid != "") $bid = " AND b.sbid=" . $bid;
		else $bid = "";
		$this -> db -> select("a.*,b.sno,c.bname FROM services_report_tab a left join services_workorder_tab b ON a.ssid=b.sid left join branch_tab c ON b.sbid=c.bid WHERE (a.sstatus=1 or a.sstatus=0 OR a.sstatus=3)".$bid." AND b.sno LIKE '%".$keyword."%' ORDER BY a.sid DESC");
		return $this -> db -> get() -> result();
	}
	
	function __check_wo($wo) {
		$this -> db -> select('* FROM services_report_tab WHERE (sstatus=1 OR sstatus=0 OR sstatus=3) AND ssid=' . $wo);
		return $this -> db -> get() -> result();
	}
}
