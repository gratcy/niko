<?php
class retur_order_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_retur_order_select() {
		$branchid=$this -> memcachedlib -> sesresult['ubid'];
		$this -> db -> select('bid,bname FROM retur_order_tab,branch_tab  WHERE 
		branch_tab.bid=retur_order_tab.sbid AND
		sstatus=1 AND bid='.$branchid.' ORDER BY bname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_retur_order() {
		$branchid=$this -> memcachedlib -> sesresult['ubid'];
		return "SELECT retur_order_tab.*,	
		sum(retur_order_detail_tab.ssisa) as ssisa,
		(select sum(sprice*saccept) from retur_order_detail_tab where retur_order_detail_tab.ssid=retur_order_tab.sid ) as totretur,
		(select sum(retur_order_detail_tab.saccept) from retur_order_detail_tab where retur_order_detail_tab.ssid=retur_order_tab.sid 
		and retur_order_detail_tab.srtype='Tukar Guling') as tgaccept,
		(select sum(retur_order_detail_tab.sqty) from retur_order_detail_tab where retur_order_detail_tab.ssid=retur_order_tab.sid 
		and retur_order_detail_tab.srtype='Tukar Guling') as tgqty,
		(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid) as bname,
        (select cname from customers_tab where customers_tab.cid=retur_order_tab.scid) as cname,
		(select ctyperetur from customers_tab where customers_tab.cid=retur_order_tab.scid) as ctyperetur,
		(select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid) as sname
		FROM retur_order_tab, retur_order_detail_tab 
		WHERE 
		retur_order_tab.sbid='".$branchid."' AND 
		retur_order_detail_tab.ssid=retur_order_tab.sid AND
		retur_order_tab.sstatus<>2  
		group by retur_order_detail_tab.ssid 
		ORDER BY retur_order_tab.stgl DESC";
	}


	function __get_retur_order_tg() {
		$branchid=$this -> memcachedlib -> sesresult['ubid'];
		return "SELECT retur_order_tab.*, retur_order_detail_tab.srtype, 
		sum(ssisa) as jumacep,
		(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid) as bname, 
		(select cname from customers_tab where customers_tab.cid=retur_order_tab.scid) as cname, 
		(select ctyperetur from customers_tab where customers_tab.cid=retur_order_tab.scid) as ctyperetur, 
		(select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid) as sname 
		FROM retur_order_tab, retur_order_detail_tab 
		WHERE retur_order_detail_tab.ssid=retur_order_tab.sid 
		AND retur_order_tab.sbid='$branchid'
		AND retur_order_detail_tab.srtype ='Tukar Guling' 
		AND retur_order_tab.sstatus=4 
		group by retur_order_detail_tab.ssid 
		ORDER BY retur_order_tab.stgl DESC ";
		
		// HAVING SUM(retur_order_detail_tab.saccept) > 0
		// ORDER BY retur_order_tab.sid DESC 
	}	
	
	
	function __get_retur_orderz() {
		$branchid=$this -> memcachedlib -> sesresult['ubid'];
		if(!isset($_POST['status'])){ $_POST['status']="x";}
		if(!isset($_POST['sreff'])){ $_POST['sreff']="";}
		if(!isset($_POST['cid'])){ $_POST['cid']="";}

		if($_POST['cid']==""){ 
			$wcid="";
		}else{
			$wcid=" and retur_order_tab.scid = '".$_POST['cid']."' ";
		}

		if($_POST['sreff']==""){ 
			$wsreff="";
		}else{
			$wsreff=" and sreff = '".$_POST['sreff']."' ";
		}
		$wsisa="";
		if($_POST['status']=="x"){ 
			$wsisa="";
		}elseif($_POST['status']=='0'){
			$wsisa=" and retur_order_tab.sstatus = '3' ";
		}elseif($_POST['status']=='1'){
			
			$wsisa=" and retur_order_tab.sstatus = '4' ";
		}elseif($_POST['status']=='2'){
			
			$wsisa=" and retur_order_tab.sstatus = '4' and retur_order_tab.pno_pm>0";
		}elseif($_POST['status']=='3'){
			
			$wsisa=" and retur_order_tab.sstatus = '4' AND retur_order_detail_tab.srtype ='Tukar Guling' and retur_order_detail_tab.ssisa = '0' ";
		}
		
		
		
		
		
		$this -> db ->SELECT (' *,retur_order_tab.sid as sid,
		retur_order_detail_tab.ssisa as ssisa,
		(select sum(sprice*saccept) from retur_order_detail_tab where retur_order_detail_tab.ssid=retur_order_tab.sid ) as totretur,
		(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid) as bname,
        (select cname from customers_tab where customers_tab.cid=retur_order_tab.scid) as cname,
		(select ctyperetur from customers_tab where customers_tab.cid=retur_order_tab.scid) as ctyperetur,
		(select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid) as sname
		FROM retur_order_tab, retur_order_detail_tab WHERE 1 AND
		retur_order_tab.sbid='.$branchid.' AND 
		retur_order_detail_tab.ssid=retur_order_tab.sid ' .$wsisa.$wsreff.$wcid. ' GROUP BY retur_order_detail_tab.ssid 
		ORDER BY retur_order_tab.stgl  DESC');
		
		return $this -> db -> get() -> result();
	}
	
	
	
	function __get_retur_orderzz() {
		$branchid=$this -> memcachedlib -> sesresult['ubid'];
		if(!isset($_POST['sisa'])){ $_POST['sisa']="x";}
		if(!isset($_POST['sreff'])){ $_POST['sreff']="";}
		if(!isset($_POST['cid'])){ $_POST['cid']="";}

		if($_POST['cid']==""){ 
			$wcid="";
		}else{
			$wcid=" and retur_order_tab.scid = '".$_POST['cid']."' ";
		}

		if($_POST['sreff']==""){ 
			$wsreff="";
		}else{
			$wsreff=" and sreff = '".$_POST['sreff']."' ";
		}
		$wsisa="";
		
		if($_POST['sisa']=="x"){ 
			$wsisa="";
		}elseif($_POST['sisa']=='0'){
			$wsisa=" and retur_order_detail_tab.ssisa = '0' ";
		}elseif($_POST['sisa']=='1'){
			
			$wsisa=" and retur_order_detail_tab.ssisa >'0' ";
		}

		
		// $this -> db ->SELECT (' *,retur_order_tab.sid as sid,
		// (select sum(sprice*saccept) from retur_order_detail_tab where retur_order_detail_tab.ssid=retur_order_tab.sid ) as totretur,
		// (select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid) as bname,
        // (select cname from customers_tab where customers_tab.cid=retur_order_tab.scid) as cname,
		// (select ctyperetur from customers_tab where customers_tab.cid=retur_order_tab.scid) as ctyperetur,
		// (select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid) as sname
		// FROM retur_order_tab, retur_order_detail_tab WHERE 1 AND
		// retur_order_detail_tab.ssid=retur_order_tab.sid ' .$wsisa.$wsreff.$wcid. ' GROUP BY retur_order_detail_tab.ssid 
		// ORDER BY retur_order_tab.sid  DESC');
		
		
		
		
		$this -> db ->SELECT (" retur_order_tab.*, retur_order_detail_tab.srtype, 
		sum(retur_order_detail_tab.ssisa) as jumacep,
		(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid) as bname, 
		(select cname from customers_tab where customers_tab.cid=retur_order_tab.scid) as cname, 
		(select ctyperetur from customers_tab where customers_tab.cid=retur_order_tab.scid) as ctyperetur, 
		(select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid) as sname 
		FROM retur_order_tab, retur_order_detail_tab 
		WHERE retur_order_detail_tab.ssid=retur_order_tab.sid 
		AND retur_order_tab.sbid ='".$branchid."'
		AND retur_order_detail_tab.srtype ='Tukar Guling' 
		AND retur_order_tab.sstatus=4 ".$wsisa.$wsreff.$wcid."
		group by retur_order_detail_tab.ssid 
		ORDER BY retur_order_tab.stgl DESC");		
		
		
		// echo " retur_order_tab.*, retur_order_detail_tab.srtype, 
		// sum(retur_order_detail_tab.ssisa) as jumacep,
		// (select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid) as bname, 
		// (select cname from customers_tab where customers_tab.cid=retur_order_tab.scid) as cname, 
		// (select ctyperetur from customers_tab where customers_tab.cid=retur_order_tab.scid) as ctyperetur, 
		// (select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid) as sname 
		// FROM retur_order_tab, retur_order_detail_tab 
		// WHERE retur_order_detail_tab.ssid=retur_order_tab.sid 
		// AND retur_order_detail_tab.srtype ='Tukar Guling' 
		// AND retur_order_tab.sstatus=4 ".$wsisa.$wsreff.$wcid."
		// group by retur_order_detail_tab.ssid 
		// ORDER BY retur_order_tab.sid DESC";die;
		
		
		
		
		
		
		return $this -> db -> get() -> result();
	}	
	
	function __get_retur_order_by_pno_pm($pno_pm,$scid) {
		
		$this -> db -> select("sum(sprice * sqty) as sprice,stgl,snoro FROM retur_order_tab, retur_order_detail_tab 
		 WHERE retur_order_tab.sid=retur_order_detail_tab.ssid and scid='$scid' and pno_pm='$pno_pm' and status_potong='1' group by retur_order_detail_tab.ssid");

		return $this -> db -> get() -> result();
	}		
	
	
	function __get_total_retur_order() {
		$sql = $this -> db -> query('SELECT * FROM retur_order_tab WHERE sstatus=1');
		return $sql -> num_rows();
	}

	
	
	function __get_total_retur_order_monthly($month,$year,$id) {
	//$year=date('Y');
	
	$sql = $this -> db -> query("SELECT * FROM retur_order_tab WHERE YEAR(stgl) = '$year' AND MONTH(stgl) = '$month' ");
	$jum= $sql -> num_rows();
	$sqlx=$this -> db -> query("UPDATE retur_order_tab set snoro='$jum' WHERE sid='$id' ");
	}	
	
	
	function __get_retur_order_detail($id) {
		$this -> db -> select('*,(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=retur_order_tab.scid)as cname,
		(select caddr from customers_tab where customers_tab.cid=retur_order_tab.scid)as caddr,
		(select ccat from customers_tab where customers_tab.cid=retur_order_tab.scid)as ccat,
		(select climit from customers_tab where customers_tab.cid=retur_order_tab.scid)as sisaplafon,
		(select ctyperetur from customers_tab where customers_tab.cid=retur_order_tab.scid)as ctyperetur,		
		(select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid)as sname
		FROM retur_order_tab WHERE retur_order_tab.sstatus<=4 AND retur_order_tab.sid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	
	function __get_retur_order_detail_approve($id) {
		$this -> db -> select('*,(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=retur_order_tab.scid)as cname,
		(select caddr from customers_tab where customers_tab.cid=retur_order_tab.scid)as caddr,
		(select ccat from customers_tab where customers_tab.cid=retur_order_tab.scid)as ccat,
		(select climit from customers_tab where customers_tab.cid=retur_order_tab.scid)as sisaplafon,
		(select ctyperetur from customers_tab where customers_tab.cid=retur_order_tab.scid)as ctyperetur,
		(select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid)as sname
		FROM retur_order_tab WHERE  sstatus<=4 AND sid=' . $id);
		return $this -> db -> get() -> result();
	}	


	function __get_retur_order_detail_approve_tg($id,$snodo) {

		$this -> db -> select("*,(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=retur_order_tab.scid)as cname,
		(select caddr from customers_tab where customers_tab.cid=retur_order_tab.scid)as caddr,
		(select ccat from customers_tab where customers_tab.cid=retur_order_tab.scid)as ccat,
		(select climit from customers_tab where customers_tab.cid=retur_order_tab.scid)as sisaplafon,
		(select ctyperetur from customers_tab where customers_tab.cid=retur_order_tab.scid)as ctyperetur,
		(select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid)as sname
		FROM retur_order_tab,delivery_order_detail_tab WHERE  
		retur_order_tab.sid=delivery_order_detail_tab.ssid AND
		retur_order_tab.sstatus<=4 AND retur_order_tab.sid='" . $id . "' AND 
		delivery_order_detail_tab.snodo = '$snodo'");
		return $this -> db -> get() -> result();
	}

	
	function __get_customers_detail($id) {
		$this -> db -> select('*,
		(select sname from sales_tab where sales_tab.sid=customers_tab.csid)as sname
		FROM customers_tab WHERE  cid=' . $id);
		return $this -> db -> get() -> result();
	}	
	
	
	function __insert_retur_order($data) {
	
        return $this -> db -> insert('retur_order_tab', $data);
	}
	
	function __update_retur_order($id, $data) {
	//print_r($data);die;
	//echo $id;die;
        $this -> db -> where('sid', $id);
        return $this -> db -> update('retur_order_tab', $data);
		// return $this -> db -> query('update retur_order_tab set sstatus='.$data[0].',spotong='.$data[1].' where sid=' . $id);
	}


	
	function __delete_retur_order($id) {
		return $this -> db -> query('update retur_order_tab set sstatus=2 where sid=' . $id);
	}
	
	function __get_suggestion() {
		$this -> db -> select('sreff as name FROM retur_order_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY name ASC');
		$name = $this -> db -> get() -> result();
		$this -> db -> select('snoro as name FROM retur_order_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY name ASC');
		$pnobukti = $this -> db -> get() -> result();
		return array_merge($name, $pnobukti);
	}
	
	function __get_search($keyword) {
		//$this -> db -> select("*,(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid) as bname, (select cname from customers_tab where customers_tab.cid=retur_order_tab.scid) as cname, (select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid) as sname FROM retur_order_tab WHERE (sstatus=0 OR sstatus=1 OR sstatus=2) AND (sreff LIKE '%".$keyword."%' OR snoro LIKE '%".$keyword."%') ORDER BY sid DESC");
		
		$this -> db -> select("*,(select bname from branch_tab where branch_tab.bid=retur_order_tab.sbid) as bname, 
		(select dstatus from delivery_order_detail_tab where delivery_order_detail_tab.ssid=retur_order_tab.sid and delivery_order_detail_tab.sid=0 limit 1)as dstatus,
		(select cname from customers_tab where customers_tab.cid=retur_order_tab.scid) as cname, 
		(select sname from sales_tab where sales_tab.sid=retur_order_tab.ssid) as sname FROM retur_order_tab,customers_tab WHERE 
		(sstatus<>2 ) AND (sreff LIKE '%".$keyword."%' OR snoro LIKE '%".$keyword."%' OR customers_tab.cname LIKE '%".$keyword."%') 
		AND customers_tab.cid=retur_order_tab.scid ORDER BY stgl DESC");
		return $this -> db -> get() -> result();		
		
		
		return $this -> db -> get() -> result();
	}
}
