<?php
class Products_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_products() {
		return 'SELECT a.*,b.cname,c.cname as ppname FROM products_tab a left join categories_tab b ON a.pcid=b.cid and b.ctype=1 left join categories_tab c ON a.ppid=c.cid and c.ctype=3 WHERE (a.pstatus=1 or a.pstatus=0) ORDER BY a.pid DESC';
	}
	
	function __get_products_select() {
		$this -> db -> select('pid,pname FROM products_tab WHERE pstatus=1 ORDER BY pname ASC');
		return $this -> db -> get() -> result();
	}

	function __get_recent_products() {
		$this -> db -> select('a.*,b.cname,c.cname as ppname FROM products_tab a left join categories_tab b ON a.pcid=b.cid and b.ctype=1 left join categories_tab c ON a.ppid=c.cid and c.ctype=3 WHERE (a.pstatus=1 or a.pstatus=0) ORDER BY a.pid DESC LIMIT 0,5', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_total_product() {
		$sql = $this -> db -> query('SELECT * FROM products_tab WHERE pstatus=1');
		return $sql -> num_rows();
	}
	
	function __get_products_detail($id) {
		$this -> db -> select('* FROM products_tab WHERE (pstatus=1 OR pstatus=0) AND pid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_products($data) {
        return $this -> db -> insert('products_tab', $data);
	}
	
	function __update_products($id, $data) {
        $this -> db -> where('pid', $id);
        return $this -> db -> update('products_tab', $data);
	}
	
	function __delete_products($id) {
		return $this -> db -> query('update products_tab set pstatus=2 where pid=' . $id);
	}
	
	function __get_moq($id) {
		$this -> db -> select('mbid,mqty FROM moq_tab WHERE mpid='.$id.' ORDER BY mbid ASC');
		return $this -> db -> get() -> result();
	}
	
	function __insert_moq($data) {
        return $this -> db -> insert('moq_tab', $data);
	}
	
	function __update_moq($pid, $bid, $data) {
        $this -> db -> where('mbid', $bid);
        $this -> db -> where('mpid', $pid);
        return $this -> db -> update('moq_tab', $data);
	}
	
	function __get_suggestion() {
		$this -> db -> select('pname as name FROM products_tab WHERE (pstatus=1 OR pstatus=0) ORDER BY name ASC');
		$name = $this -> db -> get() -> result();
		$this -> db -> select('pcode as name FROM products_tab WHERE (pstatus=1 OR pstatus=0) ORDER BY name ASC');
		$code = $this -> db -> get() -> result();
		return array_merge($name, $code);
	}
	
	function __get_search($keyword) {
		$this -> db -> select("a.*,b.cname,c.cname as ppname FROM products_tab a left join categories_tab b ON a.pcid=b.cid and b.ctype=1 left join categories_tab c ON a.ppid=c.cid and c.ctype=3 WHERE (a.pstatus=1 or a.pstatus=0) AND (a.pname LIKE '%".$keyword."%' OR a.pcode LIKE '%".$keyword."%') ORDER BY a.pid DESC");
		return $this -> db -> get() -> result();
	}
}