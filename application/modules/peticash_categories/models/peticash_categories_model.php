<?php
class Peticash_categories_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
	function __get_peticash_categories($type=1) {
		if ($type == 1) {
			return 'SELECT * FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=5 ORDER BY cid DESC';
		}
		else {
			$this -> db -> select('* FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=5 ORDER BY cid DESC');
			return $this -> db -> get() -> result();
		}
	}

	function __get_peticash_categories_select() {
		$this -> db -> select('cid,cname FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=5 ORDER BY cname ASC');
		return $this -> db -> get() -> result();
	}

	function __get_peticash_categories_detail($id) {
		$this -> db -> select('* FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=5 AND cid=' . $id);
		return $this -> db -> get() -> result();
	}

	function __insert_peticash_categories($data) {
        return $this -> db -> insert('categories_tab', $data);
	}

	function __update_peticash_categories($id, $data) {
        $this -> db -> where('cid', $id);
        $this -> db -> where('ctype', 5);
        return $this -> db -> update('categories_tab', $data);
	}
	
	function __delete_peticash_categories($id) {
		return $this -> db -> query('UPDATE categories_tab SET cstatus=2 WHERE ctype=5 AND cid=' . $id);
	}
}
