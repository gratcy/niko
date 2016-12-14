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
		(select sname from sales_tab where sales_tab.sid=delivery_order_detail_tab.sssid)as sname,sno_invoice,sum(tamount) as tamount
		FROM delivery_order_detail_tab group by sno_invoice");	
		
		//$this -> db -> select('sssid, tamount FROM delivery_order_detail_tab '  );
		return $sql -> result();
	}		


	function __get_komisi_all() {
		
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
 FROM delivery_order_detail_tab WHERE sno_invoice IS NOT NULL   ");	
//AND sssid='13' 
//AND sdate_pay BETWEEN '2016-01-05' AND '2016-05-30'	
	
		//$this -> db -> select('sssid, tamount FROM delivery_order_detail_tab '  );
		return $sql -> result();
	}
	
}
