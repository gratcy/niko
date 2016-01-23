<?php
class Inventory_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_inventory_main($type) {
		if ($type == 1 || $type == 3 || $type == 4 || $type == 6)
			return 'SELECT pid as id,pcode as code,pname as name FROM products_tab WHERE (pstatus=1 OR pstatus=0)';
		else
			return 'SELECT sid as id, scode as code,sname as name FROM sparepart_tab WHERE (sstatus=1 OR sstatus=0)';
	}
	
	function __get_branch_inventory() {
		$this -> db -> select('bid,bname FROM branch_tab WHERE bstatus=1');
		return $this -> db -> get() -> result();
	}
	
	function __get_inventory($type, $bid) {
		$bid = " AND ibid=" . $bid;
		if ($type == 1 || $type == 3 || $type == 4 || $type == 6)
			return 'SELECT a.*,b.bname,c.pname as name,c.pcode as code FROM inventory_tab a left join branch_tab b ON a.ibid=b.bid left join products_tab c on a.iiid=c.pid WHERE (c.pstatus=1 or c.pstatus=0) AND a.istatus=1'.$bid.' and a.itype='.$type.' ORDER BY a.iid DESC';
		else
			return 'SELECT a.*,b.bname,c.sname as name,c.scode as code FROM inventory_tab a left join branch_tab b ON a.ibid=b.bid left join sparepart_tab c on a.iiid=c.sid WHERE (c.sstatus=1 or c.sstatus=0) AND a.istatus=1'.$bid.' and a.itype='.$type.' ORDER BY a.iid DESC';
	}
	
	function __get_total_inventory_branches($id,$bid,$type) {
		$this -> db -> select('istock FROM inventory_tab WHERE (istatus=1 OR istatus=0) AND itype='.$type.' AND ibid='.$bid.' AND iiid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_inventory_detail($type,$id, $bid) {
		if ($bid != "") $bid = " AND ibid=" . $bid;
		else $bid = "";
		$this -> db -> select('* FROM inventory_tab WHERE (istatus=1 OR istatus=0) AND itype='.$type.$bid.' AND iid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_inventory($data) {
        return $this -> db -> insert('inventory_tab', $data);
	}
	
	function __update_inventory($id, $data,$type) {
        $this -> db -> where('iid', $id);
        $this -> db -> where('itype', $type);
        return $this -> db -> update('inventory_tab', $data);
	}
	
	function __delete_inventory($id, $bid) {
		if ($bid != "") $bid = "ibid=" . $bid . ' AND ';
		else $bid = "";
		return $this -> db -> query('update inventory_tab set istatus=2 where '.$bid.'iid=' . $id);
	}
	
	function __get_search($keyword, $type, $bid,$main) {
		if ($main == 1) {
			if ($type == 1 || $type == 3 || $type == 4 || $type == 6)
				$this -> db -> select("pid as id,pcode as code,pname as name FROM products_tab WHERE (pname LIKE '%".$keyword."%' OR pcode LIKE '%".$keyword."%') AND (pstatus=1 OR pstatus=0)", FALSE);
			else
				$this -> db -> select("sid as id, scode as code,sname as name FROM sparepart_tab WHERE (sname LIKE '%".$keyword."%' OR scode LIKE '%".$keyword."%') AND (sstatus=1 OR sstatus=0)", FALSE);
		}
		else {
			if ($bid != "") $bid = " AND ibid=" . $bid;
			else $bid = "";
			if ($type == 1 || $type == 3 || $type == 4 || $type == 6)
				$this -> db -> select("a.*,b.bname,c.pname as name,c.pcode as code FROM inventory_tab a left join branch_tab b ON a.ibid=b.bid left join products_tab c on a.iiid=c.pid WHERE (c.pstatus=1 or c.pstatus=0) AND a.istatus=1".$bid." and a.itype=".$type." AND (c.pname LIKE '%".$keyword."%' OR c.pcode LIKE '%".$keyword."%') ORDER BY a.iid DESC", FALSE);
			else
				$this -> db -> select("a.*,b.bname,c.sname as name,c.scode as code FROM inventory_tab a left join branch_tab b ON a.ibid=b.bid left join sparepart_tab c on a.iiid=c.sid WHERE (c.sstatus=1 or c.sstatus=0) AND a.istatus=1".$bid." and a.itype=".$type." AND (c.sname LIKE '%".$keyword."%' OR c.scode LIKE '%".$keyword."%') ORDER BY a.iid DESC", FALSE);
		}
		return $this -> db -> get() -> result();
	}
	
	function __check_inventory($type,$branch,$pid) {
		$this -> db -> select('* FROM inventory_tab WHERE itype='.$type.' and ibid='.$branch.' and iiid=' . $pid, FALSE);
		return $this -> db -> get() -> result();
	}
}
