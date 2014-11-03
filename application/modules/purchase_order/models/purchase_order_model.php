<?php
class Purchase_order_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_purchase_order_select() {
		$this -> db -> select('bid,bname FROM purchase_order_tab WHERE pstatus=1 ORDER BY bname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_purchase_order() {
		return 'SELECT *,
        (select bname from branch_tab where branch_tab.bid= purchase_order_tab.pbid) as bname,
		(select sname from sales_tab where sales_tab.sid= purchase_order_tab.psid) as sname
		FROM purchase_order_tab  ORDER BY pid DESC';
	}

	function __get_purchase_orderp() {
		return 'SELECT *,
        (select bname from branch_tab where branch_tab.bid= purchase_order_tab.pbid) as bname,
		(select sname from sales_tab where sales_tab.sid= purchase_order_tab.psid) as sname
		FROM purchase_order_tab where pstatus=3 ORDER BY pid DESC';
	}	
	
	function __insert_penerimaan_detail($data) {	 
        return $this -> db -> insert('penerimaan_detail_tab', $data);
	}	

	function __get_penerimaan($id) {
		return 'SELECT distinct(penerimaan_detail_tab.pno_penerimaan),purchase_order_tab.pid,
purchase_order_tab.pbid,
purchase_order_tab.pref,
purchase_order_tab.ptgl,
purchase_order_tab.pnobukti,
purchase_order_tab.pgudang,
purchase_order_tab.pstatus,
purchase_order_tab.pcdate,
purchase_order_tab.pcid,
purchase_order_tab.ptype,
purchase_order_tab.pssid,
purchase_order_tab.psid,
        (select bname from branch_tab where branch_tab.bid= purchase_order_tab.pbid) as bname,
		(select sname from sales_tab where sales_tab.sid= purchase_order_tab.psid) as sname
		FROM purchase_order_tab,penerimaan_detail_tab where  penerimaan_detail_tab.ppid=purchase_order_tab.pid  
		AND purchase_order_tab.pid='.$id.' 
ORDER BY purchase_order_tab.pid DESC ';
	}	
	
	
	function __approve_purchase($id) {
	//echo 'update purchase_order_detail_tab set pstatus=0 where pid=' . $id;die;
		return $this -> db -> query('update purchase_order_tab set pstatus=3 where pid=' . $id);
	}
	
	function __cancel_purchase($id) {
	//echo 'update purchase_order_detail_tab set pstatus=0 where pid=' . $id;die;
		return $this -> db -> query('update purchase_order_tab set pstatus=0 where pid=' . $id);
	}	
	function __get_total_purchase_order() {
		$sql = $this -> db -> query('SELECT * FROM purchase_order_tab WHERE pstatus=1');
		return $sql -> num_rows();
	}

	
	
	function __get_total_purchase_order_monthly($month,$year,$id) {
	//$year=date('Y');
	
	$sql = $this -> db -> query("SELECT * FROM purchase_order_tab WHERE YEAR(ptgl) = '$year' AND MONTH(ptgl) = '$month' ");
	$jum= $sql -> num_rows();
	$sqlx=$this -> db -> query("UPDATE purchase_order_tab set pnobukti='$jum' WHERE pid='$id' ");
	}	
	
	
	function __get_purchase_order_detail($id) {
		$this -> db -> select('*,(select bname from branch_tab where branch_tab.bid= purchase_order_tab.pbid)as bname,
(select sname from sales_tab where sales_tab.sid= purchase_order_tab.psid)as sname,	
(select sname from suplier_tab where suplier_tab.sid= purchase_order_tab.pssid)as ssname	
FROM purchase_order_tab WHERE (pstatus<> 2 ) AND pid=' . $id);
		return $this -> db -> get() -> result();
	}


	function __get_purchase_order_detailzz($id,$pno) {
		$this -> db -> select('*,(select bname from branch_tab where branch_tab.bid= purchase_order_tab.pbid)as bname,
(select sname from sales_tab where sales_tab.sid= purchase_order_tab.psid)as sname,	
(select sname from suplier_tab where suplier_tab.sid= purchase_order_tab.pssid)as ssname,
(select pno_penerimaan from penerimaan_detail_tab where penerimaan_detail_tab.ppid= purchase_order_tab.pid AND penerimaan_detail_tab.pno_penerimaan ='. $pno .')as pno_penerimaan		
FROM purchase_order_tab  WHERE (purchase_order_tab.pstatus<> 2 ) AND purchase_order_tab.pid=' . $id  );
		return $this -> db -> get() -> result();
	}
	
	function __insert_purchase_order($data) {
	
        return $this -> db -> insert('purchase_order_tab', $data);
	}
	
	function __update_purchase_order($id, $data) {
        $this -> db -> where('pid', $id);
        return $this -> db -> update('purchase_order_tab', $data);
	}
	
	function __delete_purchase_order($id) {
		return $this -> db -> query('update purchase_order_tab set pstatus=2 where pid=' . $id);
	}
	
	function __get_suggestion() {
		$this -> db -> select('pref as name FROM purchase_order_tab WHERE (pstatus=1 OR pstatus=0) ORDER BY name ASC');
		$name = $this -> db -> get() -> result();
		$this -> db -> select('pnobukti as name FROM purchase_order_tab WHERE (pstatus=1 OR pstatus=0) ORDER BY name ASC');
		$pnobukti = $this -> db -> get() -> result();
		return array_merge($name, $pnobukti);
	}
	
	function __get_search($keyword) {
		$this -> db -> select("*, (select bname from branch_tab where branch_tab.bid= purchase_order_tab.pbid) as bname, (select sname from sales_tab where sales_tab.sid= purchase_order_tab.psid) as sname FROM purchase_order_tab WHERE (pstatus=0 OR pstatus=1 OR pstatus=2) AND (pref LIKE '%".$keyword."%' OR pnobukti LIKE '%".$keyword."%') ORDER BY pid DESC");
		return $this -> db -> get() -> result();
	}
}
