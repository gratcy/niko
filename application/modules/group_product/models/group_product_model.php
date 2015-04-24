<?php
class Group_product_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_group_product() {
		return 'SELECT * FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=4 ORDER BY cid DESC';
	}
	
	function __get_group_product_select() {
		$this -> db -> select('cid,cname FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=4 ORDER BY cname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_group_product_detail($id) {
		$this -> db -> select('* FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=4 AND cid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_group_product($data) {
        return $this -> db -> insert('categories_tab', $data);
	}
	
	function __update_group_product($id, $data) {
        $this -> db -> where('cid', $id);
        $this -> db -> where('ctype', 4);
        return $this -> db -> update('categories_tab', $data);
	}
	
	function __delete_group_product($id) {
		return $this -> db -> query('UPDATE categories_tab SET cstatus=2 WHERE ctype=4 AND cid=' . $id);
	}
}
