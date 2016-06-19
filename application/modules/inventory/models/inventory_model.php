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
			return 'SELECT a.*,b.bname,c.pname as name,c.pcode as code FROM inventory_tab a left join branch_tab b ON a.ibid=b.bid left join products_tab c on a.iiid=c.pid WHERE (c.pstatus=1 or c.pstatus=0) AND a.istatus=1'.$bid.' and a.itype='.$type.' ORDER BY c.pname ASC';
		else
			return 'SELECT a.*,b.bname,c.sname as name,c.scode as code FROM inventory_tab a left join branch_tab b ON a.ibid=b.bid left join sparepart_tab c on a.iiid=c.sid WHERE (c.sstatus=1 or c.sstatus=0) AND a.istatus=1'.$bid.' and a.itype='.$type.' ORDER BY c.sname ASC';
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
	
	function __get_product($pid,$branch,$type) {
		if ($type == 1 || $type == 3 || $type == 4 || $type == 6)
			$this -> db -> select('a.istockbegining,b.pcode as code,b.pname as name FROM inventory_tab a LEFT JOIN products_tab b ON a.iiid=b.pid WHERE a.itype='.$type.' and a.ibid='.$branch.' and a.iiid=' . $pid, FALSE);
		else
			$this -> db -> select('a.istockbegining,b.scode as code,b.sname as name FROM inventory_tab a LEFT JOIN sparepart_tab b ON a.iiid=b.sid WHERE a.itype='.$type.' and a.ibid='.$branch.' and a.iiid=' . $pid, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_stock_process($branch,$iid,$type) {
		$total = 0;
		if ($type == 1 || $type == 2) {
			if ($type == 1) {
				$this -> db -> select('SUM(b.sqty) as total FROM retur_order_tab a LEFT JOIN retur_order_detail_tab b ON a.sid=b.ssid WHERE a.sbid='.$branch.' AND a.sstatus < 3 AND b.spid=' . $iid);
				$pr = $this -> db -> get() -> result();

				$this -> db -> select('SUM(b.sqty) as total FROM sales_order_tab a LEFT JOIN sales_order_detail_tab b ON a.sid=b.ssid LEFT JOIN delivery_order_detail_tab c ON a.sid=c.ssid WHERE a.sbid='.$branch.' AND c.dstatus < 3 AND b.spid=' . $iid);
				$pr2 = $this -> db -> get() -> result();
			}
			$this -> db -> select('SUM(b.rqty) as total FROM receiving_tab a LEFT JOIN receiving_item_tab b ON a.rid=b.rrid WHERE a.rbid='.$branch.' AND b.rtype='.$type.' AND a.rstatus=1 AND b.riid=' . $iid);
			$pr3 = $this -> db -> get() -> result();
			
			if ($type == 2)
				$total = ($pr3[0] -> total ? $pr3[0] -> total : 0);
			else
				$total = $pr[0] -> total + $pr2[0] -> total + $pr3[0] -> total;
		}
		return $total;
	}
	
	function __get_return_order($iid, $branch, $type, $stype) {
		$this -> db -> select("b.sqty as tqty,a.stgl as ttanggal, a.sreff as tno, ".($stype == 1 ? 1 : 0)." as approved, c.cname as cname, 1 as ttypetrans FROM retur_order_tab a LEFT JOIN retur_order_detail_tab b ON a.sid=b.ssid LEFT JOIN customers_tab c ON a.scid=c.cid WHERE a.sbid=".$branch." AND ".($stype == 1 ? "a.sstatus >= 3" : "a.sstatus < 3")." AND b.spid=" . $iid, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_sales_order($iid, $branch, $type, $stype) {
		$this -> db -> select("".($stype == 1 ? "b.sqty" : "c.sqty")." as tqty,".($stype == 1 ? "a.stgl as ttanggal" : "c.stgldo as ttanggal").", ".($stype == 1 ? "a.snoso" : "c.snodo")." as tno, ".($stype == 1 ? 0 : 1)." as approved, d.cname as cname, 2 as ttypetrans FROM sales_order_tab a LEFT JOIN sales_order_detail_tab b ON a.sid=b.ssid LEFT JOIN delivery_order_detail_tab c ON a.sid=c.ssid AND b.spid=c.spid LEFT JOIN customers_tab d ON a.scid=d.cid WHERE a.sbid=".$branch." AND ".($stype == 1 ? "c.dstatus < 3" : "c.dstatus >= 3")." AND ".($stype == 1 ? "b.sqty" : "c.sqty")." > 0 AND b.spid=" . $iid, FALSE);
		return $this -> db -> get() -> result();
	}
}
