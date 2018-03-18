<?php
class Services_sparepart_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_services_sparepart($bid="") {
		if ($bid != "") $bid = " AND b.sbid=" . $bid;
		else $bid = "";
		return 'SELECT a.*,b.sno,b.sdate,c.bname FROM services_sparepart_tab a left join services_workorder_tab b ON a.ssid=b.sid left join branch_tab c ON b.sbid=c.bid WHERE (a.sstatus=1 or a.sstatus=0 OR a.sstatus=3)'.$bid.' ORDER BY a.sid DESC';
	}
	
	function __get_services_sparepart_detail($id) {
		$this -> db -> select('* FROM services_sparepart_tab WHERE (sstatus=1 OR sstatus=0 OR sstatus=3) AND sid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_services_sparepart_detail_print($id) {
		$this -> db -> select('a.*,b.sno FROM services_sparepart_tab a LEFT JOIN services_workorder_tab b ON a.ssid=b.sid WHERE a.sstatus=3 AND a.sid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_services_sparepart($data) {
        return $this -> db -> insert('services_sparepart_tab', $data);
	}
	
	function __update_services_sparepart($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('services_sparepart_tab', $data);
	}
	
	function __delete_services_sparepart($id) {
		return $this -> db -> query('update services_sparepart_tab set sstatus=2 where sid=' . $id);
	}
	
	function __delete_services_sparepart_by_wo($id) {
		return $this -> db -> query('update services_sparepart_tab set sstatus=2 where ssid=' . $id);
	}
	
	function __insert_services_sparepart_det($data) {
        return $this -> db -> insert('services_sparepart_detail_tab', $data);
	}
	
	function __update_services_sparepart_det($sid,$ssid,$data) {
        $this -> db -> where('ssid', $sid);
        $this -> db -> where('sssid', $ssid);
        return $this -> db -> update('services_sparepart_detail_tab', $data);
	}
	
	function __get_sparepart_services_det_r($id) {
		$this -> db -> select('sid FROM services_sparepart_tab WHERE sstatus=3 AND ssid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_sparepart_services_det($id) {
		$this -> db -> select('sssid FROM services_sparepart_detail_tab WHERE sstatus=1 AND ssid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __check_sparepart_services($id,$sid) {
		$this -> db -> select('sssid FROM services_sparepart_detail_tab WHERE sstatus=1 AND sssid=' . $sid . ' AND ssid=' . $id);
		return  $this -> db -> get() -> result();
	}
	
	function __delete_sparepart_services_det($id,$ssid) {
		return $this -> db -> query('update services_sparepart_detail_tab set sstatus=2 where ssid='.$id.' and sssid=' . $ssid);
	}
	
	function __get_search($keyword, $bid="") {
		if ($bid != "") $bid = " AND b.sbid=" . $bid;
		else $bid = "";
		$this -> db -> select("a.*,b.sno,c.bname FROM services_sparepart_tab a left join services_workorder_tab b ON a.ssid=b.sid left join branch_tab c ON b.sbid=c.bid WHERE (a.sstatus=1 or a.sstatus=0 OR a.sstatus=3)".$bid." AND b.sno LIKE '%".$keyword."%' ORDER BY a.sid DESC");
		return $this -> db -> get() -> result();
	}
}
