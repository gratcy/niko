<?php
class Group_sparepart_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_group_sparepart() {
		return 'SELECT * FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=5 ORDER BY cid DESC';
	}
	
	function __get_group_sparepart_select() {
		$this -> db -> select('cid,cname FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=5 ORDER BY cname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_group_sparepart_detail($id) {
		$this -> db -> select('* FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=5 AND cid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_group_sparepart($data) {
        return $this -> db -> insert('categories_tab', $data);
	}
	
	function __update_group_sparepart($id, $data) {
        $this -> db -> where('cid', $id);
        $this -> db -> where('ctype', 5);
        return $this -> db -> update('categories_tab', $data);
	}
	
	function __delete_group_sparepart($id) {
		return $this -> db -> query('UPDATE categories_tab SET cstatus=2 WHERE ctype=5 AND cid=' . $id);
	}
}
