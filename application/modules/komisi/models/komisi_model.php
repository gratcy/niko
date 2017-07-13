<?php
class komisi_model extends CI_Model {
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
	//$year=date('Y');
	
	$sql = $this -> db -> query("SELECT * FROM sales_order_tab WHERE YEAR(stgl) = '$year' AND MONTH(stgl) = '$month' ");
	$jum= $sql -> num_rows();
	$sqlx=$this -> db -> query("UPDATE sales_order_tab set snoso='$jum' WHERE sid='$id' ");
	}	
	
	
	function __get_pembayaran_detail($id) {
		$this -> db -> select('*,
		(select cname from customers_tab where customers_tab.cid=pembayaran_tab.pcid)as cname
		FROM pembayaran_tab WHERE (status<=3) AND pno_pm=' . $id);
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
		(select sname from sales_tab where sales_tab.sid=delivery_order_detail_tab.sssid)as sname,
		 sno_invoice,sum(tamount) as tamount FROM delivery_order_detail_tab group by sno_invoice");	
		return $sql -> result();
	}		




	function __get_komisi_header() {
		if(!isset($_GET['no_invoice'])){ $_GET['no_invoice']="";}
		$winv="";
		if($_GET['no_invoice']!=""){
		$winv= " AND a.sno_invoice='".$_GET['no_invoice']."'"; 
		}
			
		$sql = $this -> db -> query("SELECT a.* ,sum(a.amount_com)as tamount_com,sum(a.p_amount)as tp_amount,
		            (SELECT SUM(e.pamount) FROM pembayaran_detail_tab e WHERE  
					 (e.pno_pm >0 AND (e.ptype<>'transfer') ) AND
					  (e.pno_pm >0 AND (e.ptype<>'giro') ) AND
					 (e.pno_pm >0 AND (e.ptype<>'cash') )
					 AND e.pno_pm=a.pno_pm)as totdisc,
					(select b.sname from sales_tab b where a.sssid=b.sid ) as sname,
					(select c.cname from customers_tab c where c.cid=a.scid)as cname,
					(SELECT d.pname FROM products_tab d WHERE d.pid=a.spid)AS pname
					from komisi_tab a  group by a.sno_invoice  ");

		return $sql -> result();
	}	

		function __get_sales_target($sid,$my) {		
	
	
	//echo "SELECT ttarget FROM target_tab WHERE tsid = '14' AND tmy = '2/2017' AND tstatus = 1";
	
	//echo "SELECT ttarget FROM target_tab WHERE tsid = '$sid' AND tmy = '$my' AND tstatus = 1";
		$sql = $this -> db -> query("SELECT ttarget FROM target_tab WHERE tsid = '$sid' AND tmy = '$my' AND tstatus = 1");

		return $sql -> result();
	}

	function __get_tot_inv($sid,$datea,$dateb) {		
	
		$sql = $this -> db -> query("SELECT DISTINCT a.sno_invoice ,a.dototal FROM delivery_order_detail_tab a 
								where  a.sssid='$sid' 
								AND a.stgl_invoice BETWEEN '$datea' AND '$dateb'");

		return $sql -> result();
	}

	
	function __get_komisi_selheader($sid,$datea,$dateb) {
		
		
	
		$sql = $this -> db -> query("SELECT a.* ,sum(a.amount_com)as tamount_com,sum(a.p_amount)as tp_amount,
					(select b.sname from sales_tab b where a.sssid=b.sid ) as sname,
					(select c.cname from customers_tab c where c.cid=a.scid)as cname,
					(SELECT d.pname FROM products_tab d WHERE d.pid=a.spid)AS pname
					from komisi_tab a  
					where  a.sssid='$sid' 
					AND a.date_bayar BETWEEN '$datea' AND '$dateb'
					group by a.sno_invoice  ");

		return $sql -> result();
	}		
	
	function __get_komisi_retur($sid,$datea,$dateb) {

		$sql = $this -> db -> query("SELECT DISTINCT a.pno_pm,
		  (SELECT SUM(pamount) FROM pembayaran_detail_tab b WHERE  
		  (b.pno_pm >0 AND (b.ptype<>'transfer') ) AND
		  (b.pno_pm >0 AND (b.ptype<>'giro') ) AND
		  (b.pno_pm >0 AND (b.ptype<>'cash') )
		  AND b.pno_pm=a.pno_pm)AS totdisc,
		(SELECT c.ptotal_retur FROM pembayaran_tab c WHERE c.pno_pm=a.pno_pm)AS totretur
		  FROM komisi_tab a 
		  WHERE a.sssid='$sid' AND a.date_bayar BETWEEN '$datea' AND '$dateb' ");
		
		return $sql -> result();			
					
	}
	
	
	
	function __get_komisi_disc($sid,$datea,$dateb) {

		$sql = $this -> db -> query("SELECT DISTINCT a.pno_pm,
		  (SELECT SUM(pamount) FROM pembayaran_detail_tab b WHERE  
		  (b.pno_pm >0 AND (b.ptype<>'transfer') ) AND
		  (b.pno_pm >0 AND (b.ptype<>'giro') ) AND
		  (b.pno_pm >0 AND (b.ptype<>'cash') )
		  AND b.pno_pm=a.pno_pm)AS totdisc
		  FROM komisi_tab a 
		  WHERE a.sssid='$sid' AND a.date_bayar BETWEEN '$datea' AND '$dateb' ");
		
		return $sql -> result();	
					
	}	
	
	
	function __get_komisi_all() {
	if(!isset($_GET['no_invoice'])){ $_GET['no_invoice']="";}
	$winv="";
	if($_GET['no_invoice']!=""){
	$winv= " AND a.sno_invoice='".$_GET['no_invoice']."'"; 
	}
	
	$sql = $this -> db -> query("SELECT a.* ,
				(select b.sname from sales_tab b where a.sssid=b.sid ) as sname,
				(select c.cname from customers_tab c where c.cid=a.scid)as cname,
				(SELECT d.pname FROM products_tab d WHERE d.pid=a.spid)AS pname
		from komisi_tab a  where 1 $winv");	

		return $sql -> result();
	}
	
	function __get_komisi_all_page() {
		return 'SELECT a.* ,
				(select b.sname from sales_tab b where a.sssid=b.sid ) as sname,
				(select c.cname from customers_tab c where c.cid=a.scid)as cname,
				(SELECT d.pname FROM products_tab d WHERE d.pid=a.spid)AS pname
		from komisi_tab a';
	}	
	
	
	
	function __get_komisi_zz($pno_pm) {
	

// $tdiscount="SELECT SUM(pamount) FROM pembayaran_detail_tab WHERE  
 // (pembayaran_detail_tab.pno_pm >0 AND (pembayaran_detail_tab.ptype<>'transfer') ) AND
  // (pembayaran_detail_tab.pno_pm >0 AND (pembayaran_detail_tab.ptype<>'giro') ) AND
 // (pembayaran_detail_tab.pno_pm >0 AND (pembayaran_detail_tab.ptype<>'cash') )";
 
 	// ( SELECT ptotal_retur FROM pembayaran_tab WHERE  pembayaran_tab.pno_pm=delivery_order_detail_tab.pno_pm)AS tretur,
	// ( $tdiscount AND pembayaran_detail_tab.pno_pm=delivery_order_detail_tab.pno_pm)AS tdisc,


		
	$sql = $this -> db -> query("SELECT *,
			(SELECT ccid FROM customers_tab WHERE customers_tab.cid=delivery_order_detail_tab.scid)AS ccidd,	
			(SELECT sname FROM sales_tab WHERE sales_tab.sid=delivery_order_detail_tab.sssid)AS sname,
			(SELECT pname FROM products_tab WHERE products_tab.pid=delivery_order_detail_tab.spid)AS pname,
			(SELECT pcode FROM products_tab WHERE products_tab.pid=delivery_order_detail_tab.spid)AS pcode,
			(SELECT pcid FROM products_tab WHERE products_tab.pid=delivery_order_detail_tab.spid)AS pcid,
			(SELECT 
			(SELECT cname FROM categories_tab WHERE products_tab.pcid=categories_tab.cid)
			 FROM products_tab WHERE products_tab.pid=delivery_order_detail_tab.spid)AS catname,
			(SELECT stypepay FROM sales_order_tab WHERE sales_order_tab.sid=delivery_order_detail_tab.ssid)AS stypepay,
			(SELECT ccat FROM customers_tab WHERE customers_tab.cid=delivery_order_detail_tab.scid)AS ccat,
			(SELECT cname FROM customers_tab WHERE customers_tab.cid=delivery_order_detail_tab.scid)AS cname,
			(SELECT DATEDIFF(sdate_lunas,stgl_invoice)) AS days
			 FROM delivery_order_detail_tab WHERE sno_invoice IS NOT NULL AND pno_pm='$pno_pm'");	
			//AND sssid='13' 
			//AND sdate_pay BETWEEN '2016-01-05' AND '2016-05-30'	
	
			// echo '<pre>';
			// print_r($sql -> result());die;
	
			//$this -> db -> select('sssid, tamount FROM delivery_order_detail_tab '  );
		return $sql -> result();
	}	
	
	function __insert_komisi($data) {
		// echo '<pre>';
		// print_r($data);
		$did= $data['did'];
		$scom= $data['amount_com'];
		
		
		$sql = $this -> db -> query("SELECT * FROM komisi_tab WHERE did = '$did'  ");
		$jum= $sql -> num_rows();
		//echo $did.'--'.$jum;
		
		if($jum==0){
			if($this -> db -> insert('komisi_tab', $data)){
			
			return $this -> db -> query("UPDATE delivery_order_detail_tab set samount_com='$scom' WHERE did='$did' ");
			
			}
		}else{
				return FALSE;
		}
	}
	
	
	
}
