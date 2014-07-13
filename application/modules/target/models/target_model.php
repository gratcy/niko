<?php
class Target_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_target() {
		return 'SELECT a.*,b.bname,c.sname FROM target_tab a left join branch_tab b ON a.tbid=b.bid left join sales_tab c ON a.tsid=c.sid WHERE (a.tstatus=1 or a.tstatus=0) ORDER BY a.tid DESC';
	}
    
    function __get_target_select() {
		$this -> db -> select('tid,sname FROM target_tab WHERE (tstatus=1 OR tstatus=0) ORDER BY tid ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_target_detail($id) {
		$this -> db -> select('* FROM target_tab WHERE (tstatus=1 OR tstatus=0) AND tid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_target($data) {
        return $this -> db -> insert('target_tab', $data);
	}
	
	function __update_target($id, $data) {
        $this -> db -> where('tid', $id);
        return $this -> db -> update('target_tab', $data);
	}
	
	function __delete_target($id) {
		return $this -> db -> query('update target_tab set tstatus=2 where tid=' . $id);
	}
}
