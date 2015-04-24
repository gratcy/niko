<?php
class Reportopname_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
	function __get_reportopname($type, $from='', $to='') {
		$from = ($from == '' ? date('Y-m-d', strtotime('-1 month', time())) : date('Y-m-d',$from));
		$to = ($to == '' ? date('Y-m-d') : date('Y-m-d',$to));
		if ($type == 1 || $type == 3 || $type == 4)
			return "SELECT a.*,c.pname as name,c.pcode as code,d.bname FROM opname_tab a LEFT JOIN inventory_tab b ON a.oidid=b.iid AND b.istatus=1 LEFT JOIN products_tab c ON b.iiid=c.pid LEFT JOIN branch_tab d ON b.ibid=d.bid WHERE a.otype=".$type." AND FROM_UNIXTIME(a.odate, '%Y-%m-%d') >= '".$from."' AND FROM_UNIXTIME(a.odate, '%Y-%m-%d') <= '".$to."' ORDER BY a.oid DESC";
		else
			return "SELECT a.*,c.sname as name,c.scode as code,d.bname FROM opname_tab a LEFT JOIN inventory_tab b ON a.oidid=b.iid AND b.istatus=1 LEFT JOIN sparepart_tab c ON b.iiid=c.sid LEFT JOIN branch_tab d ON b.ibid=d.bid WHERE a.otype=".$type." AND FROM_UNIXTIME(a.odate, '%Y-%m-%d') >= '".$from."' AND FROM_UNIXTIME(a.odate, '%Y-%m-%d') <= '".$to."' ORDER BY a.oid DESC";
	}
}
