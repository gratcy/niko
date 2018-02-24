<?php
class Technical_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_technical_services($ids) {
		if ($ids) {
			$this -> db -> select("a.tid,a.tcode,a.tname,b.bname FROM technical_tab a LEFT JOIN branch_tab b ON a.tbid=b.bid WHERE (a.tstatus=1 OR a.tstatus=0) AND a.tid IN (".$ids.") ORDER BY a.tname DESC", FALSE);
			return $this -> db -> get() -> result();
		}
		return 'SELECT a.tid,a.tcode,a.tname,b.bname FROM technical_tab a LEFT JOIN branch_tab b ON a.tbid=b.bid WHERE (a.tstatus=1 OR a.tstatus=0) ORDER BY a.tname DESC';
	}
	
	function __get_technical($bid="") {
		if ($bid != "") $bid = " AND tbid=" . $bid;
		else $bid = "";
		return 'SELECT a.*,b.bname FROM technical_tab a left join branch_tab b ON a.tbid=b.bid WHERE (a.tstatus=1 or a.tstatus=0)'.$bid.' ORDER BY a.tid DESC';
	}
	
	function __get_technical_detail($id, $bid="") {
		if ($bid != "") $bid = " AND tbid=" . $bid;
		else $bid = "";
		$this -> db -> select('* FROM technical_tab WHERE (tstatus=1 OR tstatus=0)'.$bid.' AND tid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_technical($data) {
        return $this -> db -> insert('technical_tab', $data);
	}
	
	function __update_technical($id, $data) {
        $this -> db -> where('tid', $id);
        return $this -> db -> update('technical_tab', $data);
	}
	
	function __get_suggestion($bid="") {
		if ($bid != "") $bid = " AND tbid=" . $bid;
		else $bid = "";
		$this -> db -> select('tid as id,tname as name FROM technical_tab WHERE (tstatus=1 OR tstatus=0) '.$bid.' ORDER BY name ASC');
		$name = $this -> db -> get() -> result();
		$this -> db -> select('tid as id,tcode as name FROM technical_tab WHERE (tstatus=1 OR tstatus=0) '.$bid.' ORDER BY name ASC');
		$code = $this -> db -> get() -> result();
		return array_merge($name, $code);
	}
	
	function __get_search($keyword,$bid) {
		if ($bid != "") $bid = " AND tbid=" . $bid;
		else $bid = "";
		$this -> db -> select("a.*,b.bname FROM technical_tab a left join branch_tab b ON a.tbid=b.bid WHERE (a.tstatus=1 OR a.tstatus=0)".$bid." AND (a.tname LIKE '%".$keyword."%' OR a.tcode LIKE '%".$keyword."%') ORDER BY a.tname ASC");
		return $this -> db -> get() -> result();
	}
	
	function __delete_technical($id, $bid="") {
		if ($bid != "") $bid = "tbid=" . $bid . ' AND ';
		else $bid = "";
		return $this -> db -> query('update technical_tab set tstatus=2 where '.$bid.'tid=' . $id);
	}
}
