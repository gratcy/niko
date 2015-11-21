<?php
class pembayaran_detail_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_pembayaran_detail_select() {
		$this -> db -> select('bid,bname FROM sales_order_tab WHERE sstatus=1 ORDER BY bname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __insert_inventory($data) {
        return $this -> db -> insert('log_inventory_tab', $data);
	}
	
	function __get_total_pembayaran_detail() {
		$sql = $this -> db -> query('SELECT * FROM sales_order_tab WHERE sstatus=1');
		return $sql -> num_rows();
	}

function __update_invoicez($noinv,$arr){
        $this -> db -> where('sno_invoice', $noinv);
        return $this -> db -> update('delivery_order_detail_tab', $arr);	
	
}
	function __get_potongan($scid) {
		$sql = $this -> db -> query("SELECT a.sid,sum(b.sqty * b.sprice)as potongan FROM retur_order_tab a, retur_order_detail_tab b 
		WHERE a.sid=b.ssid and a.scid='".$scid."'   group by (b.ssid)");
		return $sql -> result();
	}
	function __get_pembayaran_detail($id) {
		$this -> db -> select("* FROM pembayaran_detail_tab WHERE   pembayaran_detail_tab.pno_pm='$id'" );
		// print_r($this -> db -> get() -> result());die;
		return $this -> db -> get() -> result();
	}

	function __get_pembayaran_inv($id) {
		$this -> db -> select("SUM(tamount) AS tamount, `sduedate_invoice`, `sno_invoice` AS no_invoice, `stgl_invoice` 
FROM delivery_order_detail_tab WHERE delivery_order_detail_tab.pno_pm='$id' 
AND delivery_order_detail_tab.sid<>0
GROUP BY sno_invoice");
		 //print_r($this -> db -> get() -> result());die;
		return $this -> db -> get() -> result();
	}	
	
	function __get_pembayaran_ro($id) {
		$this -> db -> select(" SUM(tamount) AS tamount, `sduedate_invoice`, `sno_invoice` AS no_invoice, `stgl_invoice` 
FROM delivery_order_detail_tab WHERE delivery_order_detail_tab.pno_pm='$id' 
AND delivery_order_detail_tab.sid<>0
GROUP BY sno_invoice");
		 //print_r($this -> db -> get() -> result());die;
		return $this -> db -> get() -> result();
	}		
	

	

	function __get_delivery_order_detail($id,$snodo) {
	
		$this -> db -> select("*,		
		(select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=sales_order_tab.scid)as cname,
		(select caddr from customers_tab where customers_tab.cid=sales_order_tab.scid)as caddr,
		(select ccat from customers_tab where customers_tab.cid=sales_order_tab.scid)as ccat,
		(select climit from customers_tab where customers_tab.cid=sales_order_tab.scid)as sisaplafon,
		(select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid)as sname,
		delivery_order_detail_tab.snodo as snodo
		FROM sales_order_tab,delivery_order_detail_tab WHERE  sales_order_tab.sid=delivery_order_detail_tab.ssid AND (sstatus=1 OR sstatus=3) AND sales_order_tab.sid='" . $id . "' AND delivery_order_detail_tab.snodo='" .$snodo ."'");
		return $this -> db -> get() -> result();
	}	
	
function __bayar_lunas($pno_pm,$tots,$scid) {
	
$this -> db-> query("update delivery_order_detail_tab 
	set pstatus='3' where pno_pm='$pno_pm'");	
	
$this -> db-> query("update customers_tab 
	set climit=(climit + $tots ) where cid='$scid'");		

return $this -> db-> query("update pembayaran_tab 
	set pstatus='3' where pno_pm='$pno_pm'");


}	
	function __get_pembayaran_detail_inv($scid,$pno_pm) {
	$pn="''";
		$this -> db -> select("c.* ,sum( c.tamount ) AS sum_inv, b.scid FROM sales_order_tab b, delivery_order_detail_tab c WHERE b.sid = c.ssid AND (c.pno_pm='' or c.pno_pm is NULL) AND b.scid = '".$scid."' group by (c.snodo)");
		return $this -> db -> get() -> result();
	}		
	
function __update_terima($pno_pm,$amount) {	

	return $this -> db-> query("update pembayaran_tab 
	set ptotal_terima=(ptotal_terima+'$amount'),ptotal_pending=(ptotal_pending-'$amount') where pno_pm='$pno_pm'");
}

	function __sum_inv($pno_pm) {
		 $this -> db -> select(" sum(tamount) as tamount FROM delivery_order_detail_tab WHERE pno_pm='$pno_pm' and sid<>0");
		return $this -> db -> get() -> result();
	}
	
	function __sum_ret($pno_pm) {
		 $this -> db -> select(" sum(sprice) as sprice FROM retur_order_tab, retur_order_detail_tab WHERE retur_order_tab.sid=retur_order_detail_tab.ssid and pno_pm='$pno_pm' and status_potong='1'");
		return $this -> db -> get() -> result();
	}	


	function __sum_bayar_pending($pno_pm) {
		 $this -> db -> select(" sum(pamount) as spamount FROM pembayaran_detail_tab WHERE pno_pm='$pno_pm' and pstatus='1'");
		return $this -> db -> get() -> result();
	}

	function __sum_bayar_terima($pno_pm) {
		$this -> db -> select(" sum(pamount) as spamount FROM pembayaran_detail_tab WHERE pno_pm='$pno_pm' and pstatus='3'");
		return $this -> db -> get() -> result();
	}
	
	function __update_statd($pmdid, $arr) {
       // $this -> db -> where('pmdid', $pmdid);
        //return $this -> db -> update('pembayaran_detail_tab', $arr);
return $this -> db-> query("update pembayaran_detail_tab set pstatus='3' where pmdid='$pmdid'");		
		
	}
	
	function __insert_pembayaran($data) {
	
        return $this -> db -> insert('pembayaran_tab', $data);
	}	
	
	function __get_delivery_order_detail_prod($id,$snodo) {
		$this -> db -> select("*,(select sprice FROM sales_order_detail_tab c where c.sid=a.sid) as sprice,
		(select sdisc FROM sales_order_detail_tab c where c.sid=a.sid) as sdisc	FROM delivery_order_detail_tab a,products_tab b WHERE   a.spid=b.pid AND a.ssid=" . $id ." AND a.snodo='". $snodo . "'");
		
		//echo "select * FROM sales_order_detail_tab a,products_tab b WHERE   a.spid=b.pid AND a.sid= $id";die;
		return $this -> db -> get() -> result();
	}		



	function __del_do_item($snodo) {
	     return $this->db -> query("delete from delivery_order_detail_tab  WHERE snodo='".$snodo."' AND spid >0 ");
        
	}
	
	function __update_invoice($snoinv, $data) {
        $this -> db -> where('sno_invoice', $snoinv);
        return $this -> db -> update('delivery_order_detail_tab', $data);
	}		
	function __update_ro($snoro, $data) {
        $this -> db -> where('snoro', $snoro);
        return $this -> db -> update('retur_order_tab', $data);
	}

	function __update_giro($pno_pm, $data) {
        $this -> db -> where('pno_pm', $pno_pm);
        return $this -> db -> update('pembayaran_tab', $data);
	}
	
	function __update_pembayaran_detail($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('pembayaran_detail_tab', $data);
	}
	
	function __update_pembayaranx($pmid, $data) {
	//print_r($data);die;
        $this -> db -> where('pmid', $pmid);
        return $this -> db -> update('pembayaran_tab', $data);
	}
	
	function __update_ro_status($sid,$data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('retur_order_tab', $data);
	}	
	
	function __update_delivery_order($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('sales_order_tab', $data);
	}	
	function __insert_pembayaran_detail($data) {
	
        return $this -> db -> insert('pembayaran_detail_tab', $data);
	}
	function __insert_delivery_order_detail($data) {
	
        return $this -> db -> insert('delivery_order_detail_tab', $data);
	}	

	function __update_invoice_order($snoinv, $data) {
        $this -> db -> where('sno_invoice', $snoinv);
        return $this -> db -> update('delivery_order_detail_tab', $data);
	}		
	
	function __delete_pembayaran_detail($id) {
		return $this -> db -> query('Delete FROM sales_order_detail_tab where sid=' . $id);
	}
}
