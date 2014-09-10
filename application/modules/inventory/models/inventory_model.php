<?php
class Inventory_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_inventory($type, $bid) {
		if ($bid != "") $bid = " AND ibid=" . $bid;
		else $bid = "";
		if ($type == 1 || $type == 3 || $type == 4)
			return 'SELECT a.*,b.bname,c.pname as name,c.pcode as code FROM inventory_tab a left join branch_tab b ON a.ibid=b.bid left join products_tab c on a.iiid=c.pid WHERE (a.istatus=1 or a.istatus=0)'.$bid.' and a.itype='.$type.' ORDER BY a.iid DESC';
		else
			return 'SELECT a.*,b.bname,c.sname as name,c.scode as code FROM inventory_tab a left join branch_tab b ON a.ibid=b.bid left join sparepart_tab c on a.iiid=c.sid WHERE (a.istatus=1 or a.istatus=0)'.$bid.' and a.itype='.$type.' ORDER BY a.iid DESC';
	}
	
	function __get_inventory_detail($type,$id, $bid) {
		if ($bid != "") $bid = " AND ibid=" . $bid;
		else $bid = "";
		$this -> db -> select('* FROM inventory_tab WHERE (istatus=1 OR istatus=0)'.$bid.' AND itype='.$type.' AND iid=' . $id);
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
	
	function __get_search($keyword, $type, $bid) {
		if ($bid != "") $bid = " AND ibid=" . $bid;
		else $bid = "";
		if ($type == 1 || $type == 3 || $type == 4)
			$this -> db -> select("a.*,b.bname,c.pname as name,c.pcode as code FROM inventory_tab a left join branch_tab b ON a.ibid=b.bid left join products_tab c on a.iiid=c.pid WHERE (a.istatus=1 or a.istatus=0)".$bid." and a.itype=".$type." AND (c.pname LIKE '%".$keyword."%' OR c.pcode LIKE '%".$keyword."%') ORDER BY a.iid DESC", FALSE);
		else
			$this -> db -> select("a.*,b.bname,c.sname as name,c.scode as code FROM inventory_tab a left join branch_tab b ON a.ibid=b.bid left join sparepart_tab c on a.iiid=c.sid WHERE (a.istatus=1 or a.istatus=0)".$bid." and a.itype=".$type." AND (c.sname LIKE '%".$keyword."%' OR c.scode LIKE '%".$keyword."%') ORDER BY a.iid DESC", FALSE);
		return $this -> db -> get() -> result();
	}
}
