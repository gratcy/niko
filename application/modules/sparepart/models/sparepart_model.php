<?php
class Sparepart_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_sparepart() {
		return 'SELECT a.*,b.cname FROM sparepart_tab a left join categories_tab b ON a.sgroupproduct=b.cid WHERE (a.sstatus=1 or a.sstatus=0) AND b.ctype=4 ORDER BY a.sname DESC';
	}
	
	function __get_sparepart_services($ids,$sid) {
		if ($ids) {
			if ($sid)
				$this -> db -> select('a.sid,a.sname,a.scode,a.snocomponent,b.cname,c.sqty FROM sparepart_tab a left join categories_tab b ON a.sgroupproduct=b.cid LEFT JOIN services_sparepart_detail_tab c ON a.sid=c.sssid AND c.ssid='.$sid.' AND c.sstatus=1 WHERE (a.sstatus=1 or a.sstatus=0) AND b.ctype=4 AND a.sid IN ('.$ids.') ORDER BY a.sname ASC', FALSE);
			else
				$this -> db -> select('a.sid,a.sname,a.scode,a.snocomponent,b.cname FROM sparepart_tab a left join categories_tab b ON a.sgroupproduct=b.cid WHERE (a.sstatus=1 or a.sstatus=0) AND a.sid IN ('.$ids.') AND b.ctype=4 ORDER BY a.sname ASC', FALSE);
			return $this -> db -> get() -> result();
		}
		return "SELECT a.sid,a.sname,a.scode,a.snocomponent,b.cname FROM sparepart_tab a left join categories_tab b ON a.sgroupproduct=b.cid WHERE (a.sstatus=1 or a.sstatus=0) AND b.ctype=4 ORDER BY a.sname ASC";
	}
	
	function __get_sparepart_services_search($keyword) {
		return "SELECT a.sid,a.sname,a.scode,a.snocomponent,b.cname FROM sparepart_tab a left join categories_tab b ON a.sgroupproduct=b.cid WHERE (a.sstatus=1 or a.sstatus=0) AND (a.sname LIKE '%".$keyword."%' OR a.scode LIKE '%".$keyword."%') AND b.ctype=4 ORDER BY a.sname ASC";
	}
	
	function __get_recent_sparepart() {
		$this -> db -> select('a.*,b.cname FROM sparepart_tab a left join categories_tab b ON a.sgroupproduct=b.cid WHERE (a.sstatus=1 or a.sstatus=0) AND b.ctype=4 ORDER BY a.sname DESC LIMIT 0,5', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_sparepart_select() {
		$this -> db -> select('sid,sname FROM sparepart_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY sname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_sparepart_detail($id) {
		$this -> db -> select('* FROM sparepart_tab WHERE (sstatus=1 OR sstatus=0) AND sid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_sparepart($data) {
        return $this -> db -> insert('sparepart_tab', $data);
	}
	
	function __update_sparepart($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('sparepart_tab', $data);
	}
	
	function __delete_sparepart($id) {
		return $this -> db -> query('update sparepart_tab set sstatus=2 where sid=' . $id);
	}
	
	function __get_suggestion() {
		$this -> db -> select('sid as id,sname as name FROM sparepart_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY name ASC');
		$name = $this -> db -> get() -> result();
		$this -> db -> select('sid as id,scode as name FROM sparepart_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY name ASC');
		$code = $this -> db -> get() -> result();
		return array_merge($name, $code);
	}
	
	function __get_search($keyword) {
		$this -> db -> select("a.*,b.cname FROM sparepart_tab a left join categories_tab b ON a.sgroupproduct=b.cid WHERE (a.sstatus=1 or a.sstatus=0) AND (a.sname LIKE '%".$keyword."%' OR a.scode LIKE '%".$keyword."%') AND b.ctype=4 ORDER BY a.sname ASC");
		return $this -> db -> get() -> result();
	}
}
