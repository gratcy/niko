<?php
class Purchase_order_detail_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_purchase_order_detail_select() {
		$this -> db -> select('bid,bname FROM purchase_order_tab WHERE pstatus=1 ORDER BY bname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __insert_inventory($data) {
        return $this -> db -> insert('log_inventory_tab', $data);
	}
	
	function __get_total_purchase_order_detail() {
		$sql = $this -> db -> query('SELECT * FROM purchase_order_tab WHERE pstatus=1');
		return $sql -> num_rows();
	}
	
	function __get_purchase_order_detail($id) {
	//echo "select('* FROM purchase_order_detail_tab WHERE (pstatus=1 OR pstatus=0) AND ppid=' . $id)";die;
		$this -> db -> select('*,(select pname from products_tab where purchase_order_detail_tab.pppid= products_tab.pid)as pname FROM purchase_order_detail_tab WHERE (pstatus = 1)  AND ppid=' . $id);
		return $this -> db -> get() -> result();
	}


	function __get_penerimaan_detail($id,$pno) {
		$this -> db -> select("* ,(select pname from products_tab where penerimaan_detail_tab.pppid= products_tab.pid)as pname FROM penerimaan_detail_tab WHERE (pstatus=1) AND pqty<>0 AND ppid=" . $id . " AND pno_penerimaan= '$pno'" );
		return $this -> db -> get() -> result();
	}

	
	function __get_purchase_order_detail_cust($scid) {
		$this -> db -> select('* FROM purchase_order_tab a,purchase_order_detail_tab b WHERE  b.pstatus=0 AND a.pid=b.ppid AND pcid=' . $scid);
		return $this -> db -> get() -> result();
	}	
	
	function __get_purchase_order_details($scid) {
		$this -> db -> select('* FROM purchase_order_tab a,purchase_order_detail_tab b,sales_order_detail_tab c WHERE  (pstatus<>2) AND a.pid=b.ppid AND b.pid=c.spid AND pcid=' . $scid);
		return $this -> db -> get() -> result();
	}	
	
	function __get_purchase_order_detailx($id) {
	//echo "select('* FROM purchase_order_detail_tab WHERE (pstatus=1 OR pstatus=0) AND ppid=' . $id)";die;
		$this -> db -> select('* FROM purchase_order_detail_tab WHERE (pstatus<>2)  AND pid=' . $id);
		return $this -> db -> get() -> result();
	}	
	
	function __get_penerimaan_detailx($id) {
	//echo "select('* FROM purchase_order_detail_tab WHERE (pstatus=1 OR pstatus=0) AND ppid=' . $id)";die;
		$this -> db -> select('* FROM penerimaan_detail_tab WHERE (pstatus=1 OR pstatus=0) AND pid=' . $id);
		return $this -> db -> get() -> result();
	}	


	
	function __insert_purchase_order_detail($data) {	 
        return $this -> db -> insert('purchase_order_detail_tab', $data);
	}
	function __insert_penerimaan_detail($data) {	 
        return $this -> db -> insert('penerimaan_detail_tab', $data);
	}	
	function __update_purchase_order_detail($id, $data) {
	
        $this -> db -> where('pid', $id);
        return $this -> db -> update('purchase_order_detail_tab', $data);
	}

	function __update_penerimaan($id, $data) {
	
        $this -> db -> where('pid', $id);
        return $this -> db -> update('penerimaan_detail_tab', $data);
	}

	
	function __delete_purchase_order_detail($id) {
	//echo 'update purchase_order_detail_tab set pstatus=0 where pid=' . $id;die;
		return $this -> db -> query('update purchase_order_detail_tab set pstatus=0 where pid=' . $id);
	}
}
