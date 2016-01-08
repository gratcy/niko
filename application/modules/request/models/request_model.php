<?php
class Request_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_request($bid="") {
		if ($bid) $bid = ' AND (a.dbfrom='.$bid.' OR a.dbto='.$bid.')';
		else $bid = '';
		return 'SELECT a.did,a.dtype,a.ddate,a.dtitle,a.ddesc,a.dstatus,b.bname as fbname,c.bname as tbname, (SELECT count(*) FROM distribution_item_tab d WHERE d.ddrid=a.did) as total_item FROM distribution_request_tab a LEFT JOIN branch_tab b ON a.dbfrom=b.bid LEFT JOIN branch_tab c ON a.dbto=c.bid WHERE (a.dstatus=1 OR a.dstatus=0 OR a.dstatus=3)'.$bid.' ORDER BY a.did DESC';
	}
	
	function __get_request_select($bid='',$type) {
		if ($type == 3) {
			$bid = ' AND (dbto='.$bid.' OR dbfrom='.$bid.')';
			$type = '';
		}
		else {
			if ($bid) $bid = ($type == 1 ? ' AND dbto='.$bid : ' AND dbfrom='.$bid);
			else $bid = '';
			if ($type == 1 || $type == 2) $type = ' AND dtype='.$type;
			else $type = '';
		}
		
		$this -> db -> select('did,dtype,dtitle FROM distribution_request_tab WHERE dstatus=3'.$bid.$type.' order by did desc');
		return $this -> db -> get() -> result();
	}
	
	function __export($bid) {
		$sql = $this -> db -> query(self::__get_request($bid));
		return $sql -> result(); 
	}
	
	function __get_request_detail($id) {
		$this -> db -> select('* FROM distribution_request_tab WHERE (dstatus=1 OR dstatus=0 OR dstatus=3) AND did=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_request_status($id) {
		$this -> db -> select('dstatus FROM distribution_request_tab WHERE did=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_request_items_detail($id) {
		$this -> db -> select('a.dtype,a.ddate,a.dtitle,a.ddesc,a.dstatus,b.bname as fbname,c.bname as tbname FROM distribution_request_tab a LEFT JOIN branch_tab b ON a.dbfrom=b.bid LEFT JOIN branch_tab c ON a.dbto=c.bid WHERE (a.dstatus=1 OR a.dstatus=0 OR a.dstatus=3) AND a.did=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_request_item($data) {
        return $this -> db -> insert('distribution_item_tab', $data);
	}
	
	function __update_request_item($did, $data) {
        $this -> db -> where('did', $did);
        return $this -> db -> update('distribution_item_tab', $data);
	}
	
	function __delete_request_item($did, $iid, $type) {
		return $this -> db -> query('update distribution_item_tab set dstatus=2 WHERE ditype='.$type.' AND ddrid='.$did.' and diid=' . $iid);
	}
	
	function __insert_request($data) {
        return $this -> db -> insert('distribution_request_tab', $data);
	}
	
	function __update_request($id, $data) {
        $this -> db -> where('did', $id);
        return $this -> db -> update('distribution_request_tab', $data);
	}
	
	function __delete_request($id) {
		return $this -> db -> query('update distribution_request_tab set dstatus=2 where did=' . $id);
	}
	
	function __get_items($id,$type,$rtype) {
		if ($rtype == 1) {
			if ($type == 1) $this -> db -> select('a.pid as did,a.pcode,a.pname,a.pvolume,b.cname FROM products_tab a LEFT JOIN categories_tab b ON a.ppid=b.cid WHERE b.ctype=3 AND a.pstatus=1 AND a.pid IN ('.$id.')', false);
			else $this -> db -> select('a.sid as did,a.scode,a.sname,a.snocomponent,a.sspecial,b.cname FROM sparepart_tab a LEFT JOIN categories_tab b ON a.sgroupproduct=b.cid WHERE a.sstatus=1 and a.sid IN ('.$id.')', false);
		}
		else {
			if ($type == 1) $this -> db -> select('a.pid,a.pcode,a.pname,a.pvolume,b.cname,c.dqty,c.did FROM distribution_item_tab c LEFT JOIN products_tab  a ON a.pid=c.diid LEFT JOIN categories_tab b ON a.ppid=b.cid WHERE c.dstatus=1 AND c.ditype=1 AND b.ctype=3 AND a.pstatus=1 AND c.ddrid=' . $id, false);
			else $this -> db -> select('a.sid,a.scode,a.sname,a.snocomponent,a.sspecial,c.dqty,c.did,d.cname FROM distribution_item_tab c LEFT JOIN sparepart_tab a ON a.sid=c.diid LEFT JOIN categories_tab d ON a.sgroupproduct=d.cid WHERE c.dstatus=1 AND c.ditype=2 AND a.sstatus=1 AND c.ddrid=' . $id, false);
		}
		return $this -> db -> get() -> result();
	}
	
	function __get_request_items($type) {
		if ($type == 1) $this -> db -> select('a.pid,a.pcode,a.pname,a.pvolume,b.cname FROM products_tab a LEFT JOIN categories_tab b ON a.ppid=b.cid WHERE b.ctype=3 AND a.pstatus=1');
		else $this -> db -> select('a.sid,a.scode,a.sname,a.snocomponent,a.sspecial,b.cname FROM sparepart_tab a LEFT JOIN categories_tab b ON a.sgroupproduct=b.cid WHERE a.sstatus=1');
		return $this -> db -> get() -> result();
	}
}
