<?php
class Branch_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_branch_select() {
	$bidd= $this -> memcachedlib -> sesresult['ubid']; 
		$this -> db -> select('bid,bname,baddr FROM branch_tab WHERE bstatus=1 AND bid='.$bidd.' ORDER BY bname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_branch($bid) {
		if ($bid != "") $bid = " AND bid=" . $bid;
		else $bid = "";
		return 'SELECT * FROM branch_tab WHERE (bstatus=1 OR bstatus=0)'.$bid.' ORDER BY bid DESC';
	}
	
	function __get_total_branch() {
		$sql = $this -> db -> query('SELECT * FROM branch_tab WHERE bstatus=1');
		return $sql -> num_rows();
	}
	
	function __get_branch_detail($id) {
		$this -> db -> select('* FROM branch_tab WHERE (bstatus=1 OR bstatus=0) AND bid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_branch($data) {
        return $this -> db -> insert('branch_tab', $data);
	}
	
	function __update_branch($id, $data) {
        $this -> db -> where('bid', $id);
        return $this -> db -> update('branch_tab', $data);
	}
	
	function __delete_branch($id) {
		return $this -> db -> query('update branch_tab set bstatus=2 where bid=' . $id);
	}
	
	function __get_suggestion() {
		$this -> db -> select('bname as name FROM branch_tab WHERE (bstatus=1 OR bstatus=0) ORDER BY name ASC');
		$name = $this -> db -> get() -> result();
		$this -> db -> select('baddr as name FROM branch_tab WHERE (bstatus=1 OR bstatus=0) ORDER BY name ASC');
		$baddr = $this -> db -> get() -> result();
		return array_merge($name, $baddr);
	}
	
	function __get_search($keyword,$bid) {
		if ($bid != "") $bid = " AND bid=" . $bid;
		else $bid = "";
		$this -> db -> select("* FROM branch_tab WHERE (bstatus=1 OR bstatus=0)".$bid." AND (bname LIKE '%".$keyword."%' OR baddr LIKE '%".$keyword."%') ORDER BY bname ASC");
		return $this -> db -> get() -> result();
	}
}
