<?php
class Services_wo_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_recent_services_wo($bid="") {
		if ($bid != "") $bid = " AND a.sbid=" . $bid;
		else $bid = "";
		$this -> db -> select('a.*,b.bname FROM services_workorder_tab a left join branch_tab b ON a.sbid=b.bid WHERE (a.sstatus=1 or a.sstatus=0 OR a.sstatus=3)'.$bid.' ORDER BY a.sid DESC LIMIT 5');
		return $this -> db -> get() -> result();
	}
	
	function __get_services_wo($bid="") {
		if ($bid != "") $bid = " AND a.sbid=" . $bid;
		else $bid = "";
		return 'SELECT a.*,b.bname FROM services_workorder_tab a left join branch_tab b ON a.sbid=b.bid WHERE (a.sstatus=1 or a.sstatus=0 OR a.sstatus=3)'.$bid.' ORDER BY a.sid DESC';
	}
	
	function __get_services_wo_detail_print($id, $bid="") {
		if ($bid != "") $bid = " AND a.sbid=" . $bid;
		else $bid = "";
		$this -> db -> select('a.*,b.bname FROM services_workorder_tab a LEFT JOIN branch_tab b ON a.sbid=b.bid WHERE (a.sstatus=1 OR a.sstatus=0 OR a.sstatus=3)'.$bid.' AND a.sid=' . $id);
		return $this -> db -> get() -> result();
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
		
		
		$this -> db -> select('ssid FROM services_report_tab WHERE sstatus>=1');
		$sid = $this -> db -> get() -> result();
		$sdone = array();
		foreach($sid as $k => $v)
			$sdone[] = $v -> ssid;
		if (count($sdone) > 0)
			$this -> db -> select('sid,sno FROM services_workorder_tab WHERE sid NOT IN ('.implode(',',$sdone).') AND sstatus=3'.$bid, FALSE);
		else
			$this -> db -> select('sid,sno FROM services_workorder_tab WHERE sstatus=3'.$bid, FALSE);
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
	
	function __insert_services_wo_product($data) {
        return $this -> db -> insert('services_products_tab', $data);
	}
	
	function __update_services_wo_product($id, $pid, $data) {
        $this -> db -> where('ssid', $id);
        $this -> db -> where('spid', $pid);
        return $this -> db -> update('services_products_tab', $data);
	}
	
	function __get_technical_services($id) {
		$this -> db -> select('stid FROM services_tecnical_tab WHERE sstatus=1 AND ssid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_product_services_r($id) {
		$this -> db -> select('sid FROM services_products_tab WHERE sstatus=1 AND spid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_product_services($id) {
		$this -> db -> select('spid FROM services_products_tab WHERE sstatus=1 AND ssid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __check_technical_services($id,$tid) {
		$this -> db -> select('stid FROM services_tecnical_tab WHERE sstatus=1 AND stid=' . $tid . ' AND ssid=' . $id);
		return  $this -> db -> get() -> result();
	}
	
	function __check_product_services($id,$pid) {
		$this -> db -> select('spid FROM services_products_tab WHERE sstatus=1 AND spid=' . $pid . ' AND ssid=' . $id);
		return  $this -> db -> get() -> result();
	}
	
	function __delete_technical_services($id,$tid) {
		return $this -> db -> query('update services_tecnical_tab set sstatus=2 where ssid='.$id.' and stid=' . $tid);
	}
	
	function __delete_product_services($id,$tid) {
		return $this -> db -> query('update services_products_tab set sstatus=2 where ssid='.$id.' and spid=' . $tid);
	}
	
	function __get_search($keyword, $bid="") {
		if ($bid != "") $bid = " AND a.sbid=" . $bid;
		else $bid = "";
		
		if (preg_match('/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/', $keyword)) {
			$keyword = date('Y-m-d',strtotime(str_replace('/','-',$keyword)));
			$this -> db -> select("a.*,b.bname FROM services_workorder_tab a left join branch_tab b ON a.sbid=b.bid WHERE (a.sstatus=1 or a.sstatus=0 or a.sstatus=3)".$bid." AND from_unixtime(a.sdate,'%Y-%m-%d')='".$keyword."' ORDER BY a.sid DESC", FALSE);
		}
		else
			$this -> db -> select("a.*,b.bname FROM services_workorder_tab a left join branch_tab b ON a.sbid=b.bid WHERE (a.sstatus=1 or a.sstatus=0 or a.sstatus=3)".$bid." AND (a.sno LIKE '%".$keyword."%' OR (SELECT GROUP_CONCAT(c.tname, \" \") FROM technical_tab c JOIN services_tecnical_tab d ON c.tid=d.stid WHERE d.ssid=a.sid) LIKE '%".$keyword."%') ORDER BY a.sid DESC", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __check_nowo($bid) {
		$this -> db -> select("* FROM services_workorder_tab WHERE FROM_UNIXTIME(sdate, '%Y-%m') >= '".date('Y-m')."' AND sbid=" . $bid, false);
		return $this -> db -> get() -> num_rows();
	}
}
