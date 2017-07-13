<?php
class sales_order_detail_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_sales_order_detail_select() {
		$this -> db -> select('bid,bname FROM sales_order_tab WHERE sstatus=1 ORDER BY bname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __insert_inventory($data) {
        return $this -> db -> insert('log_inventory_tab', $data);
	}
	
	function __get_total_sales_order_detail() {
		$sql = $this -> db -> query('SELECT * FROM sales_order_tab WHERE sstatus=1');
		return $sql -> num_rows();
	}
	
	function __get_sales_order_detail($id) {
	
		$this -> db -> select('*,(select sbid from sales_order_tab where 
		sales_order_tab.sid=sales_order_detail_tab.ssid)as sbid 
		FROM sales_order_detail_tab WHERE  ssid=' . $id);
		return $this -> db -> get() -> result();
	}

	function __get_delivery_order_detail($id,$snodo) {
	
		$this -> db -> select("*,sum(delivery_order_detail_tab.dototal)as juminv,sales_order_tab.ssid as ssid_sales, delivery_order_detail_tab.ssid as ssid_so,			
		(select sduration from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sdurationx,
		
		(select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=sales_order_tab.scid)as cname,
		(select caddr from customers_tab where customers_tab.cid=sales_order_tab.scid)as caddr,
		(select 
		(select cname from city_tab where city_tab.cid=customers_tab.ccity)
		from customers_tab where customers_tab.cid=sales_order_tab.scid)as ccity,
		(select ccat from customers_tab where customers_tab.cid=sales_order_tab.scid)as ccat,
		(select climit from customers_tab where customers_tab.cid=sales_order_tab.scid)as sisaplafon,
		(select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid)as sname,
		delivery_order_detail_tab.snodo as snodo
		FROM sales_order_tab,delivery_order_detail_tab WHERE  
		sales_order_tab.sid=delivery_order_detail_tab.ssid AND (sstatus=1 OR sstatus=3) 
		AND delivery_order_detail_tab.snodo='" .$snodo ."'");
		return $this -> db -> get() -> result();
	}	
	
	
	function __get_delivery_order_detail_tg($id,$snodo) {
	
		$this -> db -> select(" *,SUM(delivery_order_detail_tab.dototal)AS juminv,retur_order_tab.ssid AS ssid_sales, 
		delivery_order_detail_tab.ssid AS ssid_so,			
		(SELECT sduration FROM retur_order_tab WHERE retur_order_tab.sid=delivery_order_detail_tab.ssid)AS sdurationx,		
		(SELECT bname FROM branch_tab WHERE branch_tab.bid=retur_order_tab.sbid)AS bname,
		(SELECT cname FROM customers_tab WHERE customers_tab.cid=retur_order_tab.scid)AS cname,
		(SELECT caddr FROM customers_tab WHERE customers_tab.cid=retur_order_tab.scid)AS caddr,
		(SELECT 
		(SELECT cname FROM city_tab WHERE city_tab.cid=customers_tab.ccity)
		FROM customers_tab WHERE customers_tab.cid=retur_order_tab.scid)AS ccity,
		(SELECT ccat FROM customers_tab WHERE customers_tab.cid=retur_order_tab.scid)AS ccat,
		(SELECT climit FROM customers_tab WHERE customers_tab.cid=retur_order_tab.scid)AS sisaplafon,
		(SELECT sname FROM sales_tab WHERE sales_tab.sid=retur_order_tab.ssid)AS sname,
		delivery_order_detail_tab.snodo AS snodo
		FROM retur_order_tab,delivery_order_detail_tab,retur_order_detail_tab WHERE  
		retur_order_detail_tab.ssid=delivery_order_detail_tab.ssid 
		AND retur_order_tab.sid= retur_order_detail_tab.ssid 
		AND delivery_order_detail_tab.snodo='" .$snodo ."'");
		return $this -> db -> get() -> result();
	}	
		
	
	
	
	function __get_sales_order_detail_prod($id) {
		$this -> db -> select('* FROM sales_order_detail_tab a,products_tab b WHERE   
		a.spid=b.pid AND a.ssid=' . $id);
		return $this -> db -> get() -> result();
	}		
	
	function __get_delivery_order_detail_prod($id,$snodo) {
		$this -> db -> select("*,
(SELECT o.ssisa	FROM sales_order_detail_tab o WHERE o.sid=a.sid)AS hqty,		
		(select sprice FROM sales_order_detail_tab c where c.sid=a.sid) as sprice,
		(select spromodisc FROM sales_order_detail_tab c where c.sid=a.sid) as spromodisc,
		(select sdisc FROM sales_order_detail_tab c where c.sid=a.sid) as sdisc	FROM delivery_order_detail_tab a,products_tab b WHERE   a.spid=b.pid AND a.ssid=" . $id ." AND a.snodo='". $snodo . "'
		 AND a.sqty!=0 ");
		
		return $this -> db -> get() -> result();
	}		


	
	function __get_delivery_order_detail_prod_tg($id,$snodo) {
		$this -> db -> select(" *,a.sqty as qtyy,
(SELECT o.ssisa	FROM retur_order_detail_tab o WHERE o.ssid=a.sid)AS hqty,		
		(SELECT sprice FROM retur_order_detail_tab c WHERE c.ssid=a.sid) AS sprice
		FROM 
		delivery_order_detail_tab a,products_tab b, retur_order_detail_tab d
		 WHERE   
		 d.sid=a.sid AND
		
		 a.spid=b.pid AND 
		a.ssid=" . $id ." AND
		a.snodo='". $snodo . "' AND
		a.sqty!=0 AND	
		d.srtype='Tukar Guling'  ");
		
		return $this -> db -> get() -> result();
	}			
	

	function __del_do_item($snodo) {
	     return $this->db -> query("delete from delivery_order_detail_tab  WHERE snodo='".$snodo."' AND spid >0 ");
        
	}
	
	function __update_sales_order_detail($id, $data) {
		//print_r($data);
        $this -> db -> where('sid', $id);
        return $this -> db -> update('sales_order_detail_tab', $data);
	}


	function __update_retur_order_detail($id, $data) {
		// print_r($data);
		// echo $id;die;
        $this -> db -> where('sid', $id);
        return $this -> db -> update('retur_order_detail_tab', $data);
	}


	
	function __update_do_status($snodo,$data) {
        $this -> db -> where('snodo', $snodo);
        return $this -> db -> update('delivery_order_detail_tab', $data);
	}	

	function __update_inventory($spid,$sbid,$data) {
		$istockout=$data['istockout'];
		//echo "update inventory_tab set istockout=(istockout + $istockout ), istock=(istock - $istockout) WHERE iiid='$spid' AND ibid='$sbid' AND itype='1' ";die;
        //return $this->db -> query("update inventory_tab set istockout=(istockout + $istockout ), istock=(istockbegining-istockout+istockin) WHERE iiid='$spid' AND ibid='$sbid' AND itype='1' ");
        return $this->db -> query("update inventory_tab set istockout=(istockout + $istockout ), istock=(istock - $istockout) WHERE iiid='$spid' AND ibid='$sbid' AND itype='1' ");
        
        
	}	
	function __update_inventoryin($spid,$sbid,$data) {
		$istockin=$data['istockin'];
       // return $this->db -> query("update inventory_tab set istockin='$istockin', istock=(istockbegining-istockout+istockin) WHERE iiid='$spid' AND ibid='$sbid' ");
        
	return $this->db -> query("update inventory_tab set istockin='$istockin', istock=(istock + $istockin) WHERE iiid='$spid' AND ibid='$sbid' ");
       

	}	
	function __update_amount_status($did,$data) {
        $this -> db -> where('did', $did);
        return $this -> db -> update('delivery_order_detail_tab', $data);
	}
	
	function __update_delivery_order($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('sales_order_tab', $data);
	}	
	function __insert_sales_order_detail($data) {
	
        return $this -> db -> insert('sales_order_detail_tab', $data);
	}
	function __insert_delivery_order_detail($data) {
	
        return $this -> db -> insert('delivery_order_detail_tab', $data);
	}	

	function __update_invoice_order($snodo, $data) {
        $this -> db -> where('snodo', $snodo);
        return $this -> db -> update('delivery_order_detail_tab', $data);
	}		
	
	function __delete_sales_order_detail($id) {
		return $this -> db -> query('Delete FROM sales_order_detail_tab where sid=' . $id);
	}
}
