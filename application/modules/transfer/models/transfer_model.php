<?php
class Transfer_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_transfer($bid="") {
		if ($bid) $bid = ' AND (b.dbfrom='.$bid.' OR b.dbto='.$bid.')';
		else $bid = '';
		return 'SELECT a.did,a.dtype,a.ddrid,a.ddocno,a.ddate,a.dtitle,a.ddesc,a.dstatus,c.bname as fbname,d.bname as tbname,f.cname as tcname, (SELECT count(*) FROM distribution_item_tab e WHERE e.ddrid=a.did) as total_items FROM distribution_tab a LEFT JOIN distribution_request_tab b ON a.ddrid=b.did LEFT JOIN branch_tab c ON b.dbfrom=c.bid LEFT JOIN branch_tab d ON b.dbto=d.bid LEFT JOIN customers_tab f ON b.dbto=f.cid WHERE (a.dstatus=1 OR a.dstatus=0 OR a.dstatus=3)'.$bid.' ORDER BY a.did DESC';
	}
    
    function __get_transfer_search($keyword, $bid="") {
		if ($bid) $bid = ' AND (b.dbfrom='.$bid.' OR b.dbto='.$bid.')';
		else $bid = '';
		
		if (preg_match('/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/', $keyword)) {
			$keyword = date('Y-m-d',strtotime(str_replace('/','-',$keyword)));
			$this -> db -> select("a.did,a.dtype,a.ddrid,a.ddocno,a.ddate,a.dtitle,a.ddesc,a.dstatus,c.bname as fbname,d.bname as tbname,f.cname as tcname, (SELECT count(*) FROM distribution_item_tab e WHERE e.ddrid=a.did) as total_items FROM distribution_tab a LEFT JOIN distribution_request_tab b ON a.ddrid=b.did LEFT JOIN branch_tab c ON b.dbfrom=c.bid LEFT JOIN branch_tab d ON b.dbto=d.bid LEFT JOIN customers_tab f ON b.dbto=f.cid WHERE (a.dstatus=1 OR a.dstatus=0 OR a.dstatus=3)".$bid." AND from_unixtime(a.ddate,'%Y-%m-%d')='".$keyword."' ORDER BY a.did DESC", FALSE);
		}
		else
			$this -> db -> select("a.did,a.dtype,a.ddrid,a.ddocno,a.ddate,a.dtitle,a.ddesc,a.dstatus,c.bname as fbname,d.bname as tbname,f.cname as tcname, (SELECT count(*) FROM distribution_item_tab e WHERE e.ddrid=a.did) as total_items FROM distribution_tab a LEFT JOIN distribution_request_tab b ON a.ddrid=b.did LEFT JOIN branch_tab c ON b.dbfrom=c.bid LEFT JOIN branch_tab d ON b.dbto=d.bid LEFT JOIN customers_tab f ON b.dbto=f.cid WHERE (a.dstatus=1 OR a.dstatus=0 OR a.dstatus=3)".$bid." AND (CONCAT('R0',b.dtype,LPAD(b.did, 4, 0))='".$keyword."' OR a.ddocno='".$keyword."') ORDER BY a.did DESC", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __export($bid) {
		$sql = $this -> db -> query(self::__get_transfer($bid));
		return $sql -> result(); 
	}
	
	function __get_transfer_detail($id) {
		$this -> db -> select('* FROM distribution_tab WHERE (dstatus=1 OR dstatus=0 OR dstatus=3) AND did=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_transfer_items_detail($id) {
		$this -> db -> select('a.did,a.dtype,a.ddocno,a.ddrid,a.ddate,a.dtitle,a.ddesc,a.dstatus,c.bname as fbname,d.bname as tbname,e.cname as tcname FROM distribution_tab a LEFT JOIN distribution_request_tab b ON a.ddrid=b.did LEFT JOIN branch_tab c ON b.dbfrom=c.bid LEFT JOIN branch_tab d ON b.dbto=d.bid LEFT JOIN customers_tab e ON b.dbto=e.cid WHERE (a.dstatus=1 OR a.dstatus=0 OR a.dstatus=3) AND a.did=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_transfer($data) {
        return $this -> db -> insert('distribution_tab', $data);
	}
	
	function __update_transfer($id, $data) {
        $this -> db -> where('did', $id);
        return $this -> db -> update('distribution_tab', $data);
	}
	
	function __delete_transfer($id) {
		return $this -> db -> query('update distribution_tab set dstatus=2 where did=' . $id);
	}
	
	function ___get_maxid_transfer() {
		$this -> db -> select('max(did) as maxid FROM distribution_tab');
		return $this -> db -> get() -> result();
	}
}
