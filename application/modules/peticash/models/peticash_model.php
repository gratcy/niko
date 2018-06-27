<?php
class Peticash_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_current_saldo() {
    	$this -> db -> select("psaldo FROM `peticash_tab` WHERE pstatus=1 ORDER BY pid DESC LIMIT 0,1", FALSE);
		return $this -> db -> get() -> result();
    }

	function __get_peticash($bid, $from, $to) {
		$this -> db -> select('a.*,b.cname FROM peticash_tab a JOIN categories_tab b ON a.pcid=b.cid WHERE (FROM_UNIXTIME(a.pdate, "%Y-%m-%d" )>=\''.date('Y-m-d', $from).'\' AND FROM_UNIXTIME(a.pdate, "%Y-%m-%d")<=\''.date('Y-m-d', $to).'\') AND a.pbid='.$bid.' AND a.pstatus=1 ORDER BY FROM_UNIXTIME(a.pdate, "%Y-%m-%d" ) ASC, a.pid ASC', FALSE);
		return $this -> db -> get() -> result();
	}

	function __insert_peticash($data) {
        return $this -> db -> insert('peticash_tab', $data);
	}
}
