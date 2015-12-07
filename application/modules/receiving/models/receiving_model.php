<?php
class Receiving_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    	
	function __get_receiving($bid=0) {
		return 'SELECT a.*, (SELECT COUNT(*) FROM receiving_item_tab b WHERE b.rrid=a.rid) as total_item FROM receiving_tab a WHERE (a.rstatus=1 OR a.rstatus=0 OR a.rstatus=3) AND a.rbid='.$bid.' ORDER BY a.rid DESC';
	}
	
	function __export($bid=0) {
		$sql = $this -> db -> query(self::__get_receiving($bid));
		return $sql -> result(); 
	}
	
	function __get_receiving_detail($id) {
		$this -> db -> select('* FROM receiving_tab WHERE (rstatus=1 OR rstatus=0 OR rstatus=3) AND rid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_receiving_item_detail($id) {
		$this -> db -> select('* FROM receiving_item_tab WHERE rstatus=1 AND rid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_receiving_vendor($id) {
		$this -> db -> select('rvendor FROM receiving_tab WHERE (rstatus=1 OR rstatus=0 OR rstatus=3) AND rid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_receiving_item($data) {
        return $this -> db -> insert('receiving_item_tab', $data);
	}
	
	function __update_receiving_item($rid, $data) {
        $this -> db -> where('rid', $rid);
        return $this -> db -> update('receiving_item_tab', $data);
	}
	
	function __delete_receiving_item($rid, $iid) {
		return $this -> db -> query('update receiving_item_tab set rstatus=2 where rrid='.$rid.' and riid=' . $iid);
	}
	
	function __insert_receiving($data) {
        return $this -> db -> insert('receiving_tab', $data);
	}
	
	function __update_receiving($id, $data) {
        $this -> db -> where('rid', $id);
        return $this -> db -> update('receiving_tab', $data);
	}
	
	function __update_inventory($id, $branch, $type, $data) {
        $this -> db -> where('iiid', $id);
        $this -> db -> where('ibid', $branch);
        $this -> db -> where('itype', $type);
        return $this -> db -> update('inventory_tab', $data);
	}
	
	function __delete_receiving($id) {
		return $this -> db -> query('update receiving_tab set rstatus=2 where rid=' . $id);
	}
	
	function __get_inventory_detail($id,$type,$branch) {
		$this -> db -> select('* FROM inventory_tab WHERE itype='.$type.' AND ibid='.$branch.' AND iiid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_items($id,$type,$rtype) {
		if ($rtype == 1) {
			if ($type == 1) $this -> db -> select('a.pid as did,a.pcode,a.pname,a.pvolume,b.cname FROM products_tab a LEFT JOIN categories_tab b ON a.ppid=b.cid WHERE b.ctype=3 AND a.pstatus=1 AND a.pid IN ('.$id.')', false);
			else $this -> db -> select('sid as did,scode,sname,snocomponent,sspecial FROM sparepart_tab WHERE sstatus=1 and sid IN ('.$id.')', false);
		}
		else {
			if ($type == 1) $this -> db -> select('a.pid as did,a.pcode,a.pname,a.pvolume,b.cname,c.rqty,c.rid FROM receiving_item_tab c LEFT JOIN products_tab a ON a.pid=c.riid LEFT JOIN categories_tab b ON a.ppid=b.cid WHERE c.ritype=1 AND c.rstatus=1 AND b.ctype=3 AND a.pstatus=1 AND c.rrid=' . $id, false);
			else $this -> db -> select('a.sid as did,a.scode,a.sname,a.snocomponent,a.sspecial,c.rqty,c.rid FROM receiving_item_tab c LEFT JOIN sparepart_tab a ON a.sid=c.riid WHERE c.ritype=2 AND a.sstatus=1 AND c.rstatus=1 AND c.rrid=' . $id, false);
		}
		return $this -> db -> get() -> result();
	}
}
