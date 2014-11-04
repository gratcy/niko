<?php
class Technical_model extends CI_Model {
    function __construct() {
        parent::__construct();
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
	
	function __delete_technical($id, $bid="") {
		if ($bid != "") $bid = "tbid=" . $bid . ' AND ';
		else $bid = "";
		return $this -> db -> query('update technical_tab set tstatus=2 where '.$bid.'tid=' . $id);
	}
}
