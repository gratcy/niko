<?php
class pembayaran_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_pembayaran_select() {
		$this -> db -> select('bid,bname FROM sales_order_tab WHERE sstatus=1 ORDER BY bname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_pembayaran() {
		return 'SELECT * from pembayaran_tab';
	}
	
	function __get_total_pembayaran() {
		$sql = $this -> db -> query('SELECT * FROM sales_order_tab WHERE sstatus=1');
		return $sql -> num_rows();
	}

	
	
	function __get_total_pembayaran_monthly($month,$year,$id) {
	
	$sql = $this -> db -> query("SELECT * FROM sales_order_tab WHERE YEAR(stgl) = '$year' AND MONTH(stgl) = '$month' ");
	$jum= $sql -> num_rows();
	$sqlx=$this -> db -> query("UPDATE sales_order_tab set snoso='$jum' WHERE sid='$id' ");
	}	
	
	
	function __get_pembayaran_detail($id) {
		$this -> db -> select("*,
		(select cname from customers_tab where customers_tab.cid=pembayaran_tab.pcid)as cname
		FROM pembayaran_tab WHERE (status<=3) AND pno_pm='" . $id ."'");
		return $this -> db -> get() -> result();
	}
	function __get_customers_detail($id) {
		$this -> db -> select('*,
		(select sname from sales_tab where sales_tab.sid=customers_tab.csid)as sname
		FROM customers_tab WHERE  cid=' . $id);
		return $this -> db -> get() -> result();
	}	

	function __get_komisi() {
		
	$sql = $this -> db -> query("SELECT sssid,
		(select sname from sales_tab where sales_tab.sid=delivery_order_detail_tab.sssid)as sname,sno_invoice,sum(tamount) as tamount
		FROM delivery_order_detail_tab group by sno_invoice");	
		// $this -> db -> select('sssid,
		// (select sname from sales_tab where sales_tab.sid=delivery_order_detail_tab.sssid)as sname,sno_invoice,sum(tamount) as tamount
		// FROM delivery_order_detail_tab group by sno_invoice ');
		return $sql -> result();
	}		
	
	function __insert_pembayaran($data) {
	
        return $this -> db -> insert('pembayaran_tab', $data);
	}
	
	function __update_pembayaran($pno_pm, $data) {
	
        $this -> db -> where('pno_pm', $pno_pm);
        return $this -> db -> update('pembayaran_tab', $data);
	}
	
	function __update_dox($pno_pm, $data) {

	$dlunas=$data['sdate_lunas'];
	// echo $dlunas;
        //$this -> db -> where('pno_pmx', $pno_pm);
        //return $this -> db -> update('delivery_order_detail_tab', $data);
		return $this -> db -> query("update delivery_order_detail_tab set 
		sdate_lunas='$dlunas',sduration=DATEDIFF('$dlunas', stgl_invoice),samount_com=90,
		tamount= (samount - (samount*90/100))
		where pno_pm='$pno_pm'");
	}
	
	function __update_doxx($pno_pm, $data) {
	
        $this -> db -> where('pno_pm', $pno_pm);
        //return $this -> db -> update('delivery_order_detail_tab', $data);
		return $this -> db -> query('update delivery_order_detail_tab set 
		sdate_lunas=$data[0],sduration=DATEDIFF($data[0], stgl_invoice) where pno_pm=' . $pno_pm);
	}	
	
	function __delete_pembayaran($id) {
		return $this -> db -> query('update sales_order_tab set sstatus=2 where sid=' . $id);
	}
	
	function __get_suggestion() {
		$this -> db -> select('sref as name FROM sales_order_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY name ASC');
		$name = $this -> db -> get() -> result();
		$this -> db -> select('snoso as name FROM sales_order_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY name ASC');
		$pnobukti = $this -> db -> get() -> result();
		return array_merge($name, $pnobukti);
	}
	
	function __get_search($keyword) {
		$this -> db -> select("*,(select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) as bname, (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) as cname, (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) as sname FROM sales_order_tab WHERE (sstatus=0 OR sstatus=1 OR sstatus=2) AND (sref LIKE '%".$keyword."%' OR snoso LIKE '%".$keyword."%') ORDER BY sid DESC");
		return $this -> db -> get() -> result();
	}
}