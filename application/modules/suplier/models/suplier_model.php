<?php
class Suplier_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_suplier() {
		return 'SELECT * FROM suplier_tab WHERE (sstatus=1 or sstatus=0) ORDER BY sid DESC';
	}
	
    function __get_suplier_select() {
		$this -> db -> select('sid,sname FROM suplier_tab WHERE sstatus=1 ORDER BY sname ASC');
		return $this -> db -> get() -> result();
	}	
	
	function __get_suplier_detail($id) {
		$this -> db -> select('* FROM suplier_tab WHERE (sstatus=1 OR sstatus=0) AND sid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_suplier($data) {
        return $this -> db -> insert('suplier_tab', $data);
	}
	
	function __update_suplier($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('suplier_tab', $data);
	}
	
	function __delete_suplier($id) {
		return $this -> db -> query('update suplier_tab set sstatus=2 where sid=' . $id);
	}
	
	function __get_suggestion() {
		$this -> db -> select('sname as name FROM suplier_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY name ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_search($keyword) {
		$this -> db -> select("* FROM suplier_tab WHERE (sstatus=1 or sstatus=0) AND sname LIKE '%".$keyword."%' ORDER BY sid DESC");
		return $this -> db -> get() -> result();
	}
}
