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
		$this -> db -> select('a.*,b.sno FROM services_report_tab a LEFT JOIN services_workorder_tab b ON a.ssid=b.sid WHERE (a.sstatus=1 OR a.sstatus=0 OR a.sstatus=3) AND a.sid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_services_report_detail($id) {
		$this -> db -> select('a.* FROM services_report_tab a WHERE (a.sstatus=1 OR a.sstatus=0 OR a.sstatus=3) AND a.sid=' . $id);
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
		if (preg_match('/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/', $keyword)) {
			$keyword = date('Y-m-d',strtotime(str_replace('/','-',$keyword)));
			$this -> db -> select("a.*,b.sno,c.bname FROM services_report_tab a left join services_workorder_tab b ON a.ssid=b.sid left join branch_tab c ON b.sbid=c.bid WHERE (a.sstatus=1 or a.sstatus=0 OR a.sstatus=3)".$bid." AND from_unixtime(a.sdate,'%Y-%m-%d')='".$keyword."' ORDER BY a.sid DESC", FALSE);
		}
		else
			$this -> db -> select("a.*,b.sno,c.bname FROM services_report_tab a left join services_workorder_tab b ON a.ssid=b.sid left join branch_tab c ON b.sbid=c.bid WHERE (a.sstatus=1 or a.sstatus=0 OR a.sstatus=3)".$bid." AND (b.sno LIKE '%".$keyword."%' OR (SELECT GROUP_CONCAT(d.tname, \" \") FROM technical_tab d JOIN services_tecnical_tab e ON d.tid=e.stid WHERE e.ssid=a.sid) LIKE '%".$keyword."%') ORDER BY a.sid DESC", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_qty($sid,$id,$type) {
		if ($type == 1)
			$this -> db -> select('sqty FROM services_report_product_tab WHERE sstatus=1 AND spid='.$id.' AND ssid=' . $sid);
		else
			$this -> db -> select('sqty FROM services_report_sparepart_tab WHERE sstatus=1 AND sssid='.$id.' AND ssid=' . $sid);
		return $this -> db -> get() -> result();
	}
	
	function __check_wo($wo) {
		$this -> db -> select('* FROM services_report_tab WHERE (sstatus=1 OR sstatus=0 OR sstatus=3) AND ssid=' . $wo);
		return $this -> db -> get() -> result();
	}
	
	function __get_total_point($id) {
		$this -> db -> select('SUM(b.sqty*c.ppoint) as total FROM services_report_tab a JOIN services_report_product_tab b ON a.sid=b.ssid JOIN products_tab c ON b.spid=c.pid WHERE a.sid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
}
