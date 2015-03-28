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


	function __get_potongan($scid) {
		$sql = $this -> db -> query("SELECT a.sid,sum(b.sqty * b.sprice)as potongan FROM retur_order_tab a, retur_order_detail_tab b 
		WHERE a.sid=b.ssid and a.scid='".$scid."'   group by (b.ssid)");
		return $sql -> result();
	}
	function __get_pembayaran_detail($id) {
		$this -> db -> select('*,
		(select cname from customers_tab where customers_tab.cid=pembayaran_tab.pcid)as cname
		FROM pembayaran_tab WHERE (status<=3) AND pcid=' . $id);
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
	
	
	function __get_pembayaran_detail_inv($scid,$pno_pm) {
	$pn="''";
		$this -> db -> select("sum(c.sqty * d.sprice) as sum_inv, a.pmid, a.pno_pm, a.pm_tgl, b.sid,c.snodo, 
		c.sno_invoice , c.sqty , d.sid , d.sprice,c.sdate_pay ,c.sdate_lunas FROM pembayaran_tab a, sales_order_tab b, delivery_order_detail_tab c,sales_order_detail_tab d
		WHERE a.pcid = b.scid
		AND b.sid = c.ssid
		AND c.sid = d.sid
		AND b.scid = '".$scid."'
		AND a.pno_pm = '".$pno_pm."'
	
		group by (c.snodo)");
		return $this -> db -> get() -> result();
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
	
	function __update_invoice($snodo, $data) {
        $this -> db -> where('snodo', $snodo);
        return $this -> db -> update('delivery_order_detail_tab', $data);
	}		
	function __update_ro($snoso, $data) {
        $this -> db -> where('snoso', $snoso);
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
	
	function __update_ro_status($sid,$data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('retur_order_tab', $data);
	}	
	
	function __update_delivery_order($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('sales_order_tab', $data);
	}	
	function __insert_pembayaran_detail($data) {
	
        return $this -> db -> insert('sales_order_detail_tab', $data);
	}
	function __insert_delivery_order_detail($data) {
	
        return $this -> db -> insert('delivery_order_detail_tab', $data);
	}	

	function __update_invoice_order($snodo, $data) {
        $this -> db -> where('snodo', $snodo);
        return $this -> db -> update('delivery_order_detail_tab', $data);
	}		
	
	function __delete_pembayaran_detail($id) {
		return $this -> db -> query('Delete FROM sales_order_detail_tab where sid=' . $id);
	}
}
