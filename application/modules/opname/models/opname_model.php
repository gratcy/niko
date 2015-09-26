<?php
class Opname_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __insert_opname($data) {
        return $this -> db -> insert('opname_tab', $data);
	}
	
	function __get_opname_inventory($type, $bid) {
		if ($bid != "") $bid = " AND ibid=" . $bid;
		else $bid = "";
		
		if ($type == 1 || $type == 3 || $type == 4)
			return 'SELECT a.*,b.bname,c.pname as name,c.pcode as code FROM inventory_tab a left join branch_tab b ON a.ibid=b.bid left join products_tab c on a.iiid=c.pid WHERE a.istatus=1 AND b.bstatus=1 AND c.pstatus=1 and a.itype='.$type.$bid.' ORDER BY a.iid DESC';
		else
			return 'SELECT a.*,b.bname,c.sname as name,c.scode as code FROM inventory_tab a left join branch_tab b ON a.ibid=b.bid left join sparepart_tab c on a.iiid=c.sid WHERE a.istatus=1 AND b.bstatus=1 AND c.sstatus=1 and a.itype='.$type.$bid.' ORDER BY a.iid DESC';
	}
}
