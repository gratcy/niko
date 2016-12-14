<?php
class delivery_order_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_sales_order_select() {
		$this -> db -> select('bid,bname FROM sales_order_tab WHERE sstatus=1 ORDER BY bname ASC');
		return $this -> db -> get() -> result();
	}


	function __get_search($keyword) {
		if(!isset($_POST['sisa'])){ $_POST['sisa']="x";}
		if(!isset($_POST['sreff'])){ $_POST['sreff']="";}
		if(!isset($_POST['cid'])){ $_POST['cid']="";}

		if($_POST['cid']==""){ 
			$wcid="";
		}else{
			$wcid=" and sales_order_tab.scid = '".$_POST['cid']."' ";
		}

		if($_POST['sreff']==""){ 
			$wsreff="";
		}else{
			$wsreff=" and sreff = '".$_POST['sreff']."' ";
		}
		if($_POST['sisa']=="x"){ 
			$wsisa="";
		}elseif($_POST['sisa']=='0'){
			$wsisa=" and ssisa = '0' ";
		}elseif($_POST['sisa']=='1'){
			
			$wsisa=" and ssisa > '0' ";
		}		
		$this -> db -> select(" *,(select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=sales_order_tab.scid)as cname,
        (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid)as sname,
        (select sum(ssisa) from sales_order_detail_tab where sales_order_detail_tab.ssid=sales_order_tab.sid $wsisa )as sisa
		FROM sales_order_tab, sales_order_detail_tab,customers_tab WHERE (sales_order_tab.sstatus=3) AND 
		sales_order_detail_tab.ssid=sales_order_tab.sid  
 AND (sales_order_tab.sreff LIKE '%".$keyword."%' OR sales_order_tab.snoso LIKE '%".$keyword."%' OR customers_tab.cname LIKE '%".$keyword."%') 
		AND customers_tab.cid=sales_order_tab.scid ORDER BY sales_order_tab.sid  DESC");
		return $this -> db -> get() -> result();
		
		
		
		
	}
	
	function __get_sales_order() {
		if(!isset($_POST['sisa'])){ $_POST['sisa']="x";}
		if(!isset($_POST['sreff'])){ $_POST['sreff']="";}
		if(!isset($_POST['cid'])){ $_POST['cid']="";}

		if($_POST['cid']==""){ 
			$wcid="";
		}else{
			$wcid=" and sales_order_tab.scid = '".$_POST['cid']."' ";
		}

		if($_POST['sreff']==""){ 
			$wsreff="";
		}else{
			$wsreff=" and sreff = '".$_POST['sreff']."' ";
		}
		if($_POST['sisa']=="x"){ 
			$wsisa="";
		}elseif($_POST['sisa']=='0'){
			$wsisa=" and ssisa = '0' ";
		}elseif($_POST['sisa']=='1'){
			
			$wsisa=" and ssisa > '0' ";
		}
		return 'SELECT *,(select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=sales_order_tab.scid)as cname,
        (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid)as sname,
        (select sum(ssisa) from sales_order_detail_tab where sales_order_detail_tab.ssid=sales_order_tab.sid ' .$wsisa. ')as sisa
		FROM sales_order_tab, sales_order_detail_tab WHERE (sales_order_tab.sstatus=3) AND 
		sales_order_detail_tab.ssid=sales_order_tab.sid ' .$wsisa.$wsreff.$wcid. ' GROUP BY sales_order_detail_tab.ssid ORDER BY sales_order_tab.sid  DESC';

	}

	
	function __get_sales_orderz() {
		if(!isset($_POST['sisa'])){ $_POST['sisa']="x";}
		if(!isset($_POST['sreff'])){ $_POST['sreff']="";}
		if(!isset($_POST['cid'])){ $_POST['cid']="";}

		if($_POST['cid']==""){ 
			$wcid="";
		}else{
			$wcid=" and sales_order_tab.scid = '".$_POST['cid']."' ";
		}

		if($_POST['sreff']==""){ 
			$wsreff="";
		}else{
			$wsreff=" and sreff = '".$_POST['sreff']."' ";
		}
		if($_POST['sisa']=="x"){ 
			$wsisa="";
		}elseif($_POST['sisa']=='0'){
			$wsisa=" and ssisa = '0' ";
		}elseif($_POST['sisa']=='1'){
			
			$wsisa=" and ssisa > '0' ";
		}
		$this -> db ->SELECT (' *,(select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=sales_order_tab.scid)as cname,
        (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid)as sname,
        (select sum(ssisa) from sales_order_detail_tab where sales_order_detail_tab.ssid=sales_order_tab.sid ' .$wsisa. ')as sisa
		FROM sales_order_tab, sales_order_detail_tab WHERE (sales_order_tab.sstatus=3) AND 
		sales_order_detail_tab.ssid=sales_order_tab.sid ' .$wsisa.$wsreff.$wcid. ' GROUP BY sales_order_detail_tab.ssid ORDER BY sales_order_tab.sid  DESC');
		return $this -> db -> get() -> result();
	}
	
	
	
	
	function __get_do($snodo) {
		return 'SELECT *,(select (select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as bname,		
		(select (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as cname,
		(select (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sname,		
		(select snoso from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as snoso,
		(select scid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as scid	,
		(select sbid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sbid
		FROM delivery_order_detail_tab WHERE (sid=0) AND snodo='.$snodo.' ORDER BY did DESC';
	}	

	function __get_sisa_so($id) {
		$this -> db -> SELECT ('sum(sales_order_detail_tab.ssisa) as sisa
		FROM sales_order_tab,sales_order_detail_tab where   sales_order_tab.sid=sales_order_detail_tab.ssid
		AND sales_order_tab.sid='.$id);
return $this -> db -> get() -> result();
	}	 	
	
	function __get_do_list($id) {
		return 'SELECT *,(select (select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as bname,		
		(select (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as cname,
		(select (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sname,	
        (select (select sreff from sales_tab where sales_tab.sid=sales_order_tab.ssid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sreff,			
		(select snoso from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as snoso,
		(select scid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as scid	,
		(select sbid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sbid
		FROM delivery_order_detail_tab WHERE (sid=0) AND ssid='.$id.' ORDER BY did DESC';
	}		

	function __get_inv_listz() {
		$sbid= $this -> memcachedlib -> sesresult['ubid'];
		//$sbid=2;

		
		// return "SELECT *,sales_order_tab.sduration as sdur, delivery_order_detail_tab.sid as sid,delivery_order_detail_tab.ssid as ssid,(select stypepay from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as stypepay,
		// (select (select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as bname,		
		// (select (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as cname,
		// (select (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sname,		
		// (select snoso from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as snoso,
		// (select scid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as scid	,
		// (select sales_order_tab.sbid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sbid
		// FROM delivery_order_detail_tab,sales_order_tab WHERE (delivery_order_detail_tab.sid=0) 
        // AND sales_order_tab.sid=delivery_order_detail_tab.ssid	and sales_order_tab.sbid='$sbid' 
		// AND delivery_order_detail_tab.sno_invoice<>'' ORDER BY did DESC";
		
		if(!isset($_POST['sisa'])){ $_POST['sisa']="x";}
		if(!isset($_POST['sreff'])){ $_POST['sreff']="";}
		if(!isset($_POST['cid'])){ $_POST['cid']="";}
		if(!isset($_POST['sno_invoice'])){ $_POST['sno_invoice']="";}

		if($_POST['sno_invoice']==""){ 
			$wsno="";
		}else{
			$wsno=" and delivery_order_detail_tab.sno_invoice = '".$_POST['sno_invoice']."' ";
		}		

		if($_POST['cid']==""){ 
			$wcid="";
		}else{
			$wcid=" and sales_order_tab.scid = '".$_POST['cid']."' ";
		}

		if($_POST['sreff']==""){ 
			$wsreff="";
		}else{
			$wsreff=" and sreff = '".$_POST['sreff']."' ";
		}
		if($_POST['sisa']=="x"){ 
			$wsisa="";
		}elseif($_POST['sisa']=='0'){
			$wsisa=" and pstatus = '0' ";
		}elseif($_POST['sisa']=='1'){
			
			$wsisa=" and pstatus = '3' ";
		}
		$this -> db ->SELECT (" *,sales_order_tab.sduration as sdur, delivery_order_detail_tab.sid as sid,delivery_order_detail_tab.ssid as ssid,(select stypepay from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as stypepay,
		(select (select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as bname,		
		(select (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as cname,
		(select (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sname,		
		(select snoso from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as snoso,
		(select scid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as scid	,
		(select sales_order_tab.sbid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sbid
		FROM delivery_order_detail_tab,sales_order_tab WHERE (delivery_order_detail_tab.sid=0) 
        AND sales_order_tab.sid=delivery_order_detail_tab.ssid	and sales_order_tab.sbid='$sbid' 
		AND delivery_order_detail_tab.sno_invoice<>'' ".$wsisa.$wsreff.$wcid.$wsno. "ORDER BY did DESC ");
		return $this -> db -> get() -> result();		
		
		
		
	}


	function __get_inv_list_search($keyword) {
		$sbid= $this -> memcachedlib -> sesresult['ubid'];
		//$sbid=2;

		
		$this -> db ->SELECT (" *,sales_order_tab.sduration as sdur, delivery_order_detail_tab.sid as sid,delivery_order_detail_tab.ssid as ssid,(select stypepay from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as stypepay,
		(select (select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as bname,		
		(select (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as cname,
		(select (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sname,		
		(select snoso from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as snoso,
		(select scid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as scid	,
		(select sales_order_tab.sbid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sbid
		FROM delivery_order_detail_tab,sales_order_tab,customers_tab WHERE (delivery_order_detail_tab.sid=0) 
        AND sales_order_tab.sid=delivery_order_detail_tab.ssid	and sales_order_tab.sbid='$sbid' 
		AND delivery_order_detail_tab.sno_invoice<>'' AND customers_tab.cid=sales_order_tab.scid
		AND (sales_order_tab.sreff LIKE '%".$keyword."%' OR sales_order_tab.snoso LIKE '%".$keyword."%' OR customers_tab.cname LIKE '%".$keyword."%') 
		ORDER BY did DESC");
		
		return $this -> db -> get() -> result();	
	}		
	
	function __get_inv_list() {
		$sbid= $this -> memcachedlib -> sesresult['ubid'];
		//$sbid=2;

		
		return "SELECT *,sales_order_tab.sduration as sdur, delivery_order_detail_tab.sid as sid,delivery_order_detail_tab.ssid as ssid,(select stypepay from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as stypepay,
		(select (select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as bname,		
		(select (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as cname,
		(select (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sname,		
		(select snoso from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as snoso,
		(select scid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as scid	,
		(select sales_order_tab.sbid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sbid
		FROM delivery_order_detail_tab,sales_order_tab WHERE (delivery_order_detail_tab.sid=0) 
        AND sales_order_tab.sid=delivery_order_detail_tab.ssid	and sales_order_tab.sbid='$sbid' 
		AND delivery_order_detail_tab.sno_invoice<>'' ORDER BY did DESC";
	}	
	
	function __get_inv_list_detail() {
		$sbid= $this -> memcachedlib -> sesresult['ubid'];
		//$sbid=2;
		//print_r($_POST);
		
		$sno_invoice=$this->input->post('sno_invoice');
		$scid=$this->input->post('scid');
		$ssid=$this->input->post('ssid');
		$pstatus=$this->input->post('pstatus');
		$astgl=$this->input->post('astgl_invoice');
		$bstgl=$this->input->post('bstgl_invoice');
		

		if (($astgl<>"")OR($bstgl<>"")){
			$wstgl=" and delivery_order_detail_tab.stgldo between '".$astgl."' AND '".$bstgl."' ";
		}else{
			$wstgl="";
		}		

		if ($sno_invoice<>""){
			$winv=" and delivery_order_detail_tab.sno_invoice='".$sno_invoice."' ";
		}else{
			$winv="";
		}
		
		if ($scid<>""){
			$wcust=" and delivery_order_detail_tab.scid='".$scid."' ";
		}else{
			$wcust="";
		}
		
		if ($ssid<>""){
			$wsales=" and sales_order_tab.ssid='".$ssid."' ";
		}else{
			$wsales="";
		}
		
		if($pstatus==0){ $pstatus="";}
		if ($pstatus<>""){
			$wstatus=" and pstatus='".$pstatus."' ";
		}else{
			$wstatus="";
		}		
		
		return "SELECT *,sales_order_tab.sduration as sdur,
		(select stypepay from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as stypepay,
		(select (select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as bname,		
		(select (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as cname,
		(select (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid ".$wsales.")as sname,		
		(select snoso from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as snoso,
		(select scid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as scid	,
		(select sbid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sbid
		FROM delivery_order_detail_tab,sales_order_tab WHERE (delivery_order_detail_tab.sid=0) ".$winv.$wcust.$wstatus.$wstgl." AND sales_order_tab.sid=delivery_order_detail_tab.ssid	and sales_order_tab.sbid='".$sbid."' ORDER BY did DESC";
	}	
	
	
	
	
	
	function __get_inv_list_detailk() {
		$sbid= $this -> memcachedlib -> sesresult['ubid'];
		//$sbid=2;
		//print_r($_POST);die;

		$sno_invoice=$this->input->post('sno_invoice');
		$scid=$this->input->post('scid');
		$scidx=$this->input->post('scidx');
		$ssid=$this->input->post('ssid');
		$pstatus=$this->input->post('pstatus');

		//echo $astgla[0];die;

		
		if(($this->input->post('astgl_invoice')!="")or($this->input->post('bstgl_invoice')!="")){	

		$astgla=explode('/',$this->input->post('astgl_invoice'));
		$bstgla=explode('/',$this->input->post('bstgl_invoice'));
		
		$astgl=$astgla[2].'-'.$astgla[1].'-'.$astgla[0];
		$bstgl=$bstgla[2].'-'.$bstgla[1].'-'.$bstgla[0];
		//echo $astgl.$bstgl;die;
	    }
		else{
				$astgl="";
			    $bstgl="";
		}
		//echo $pstatus;//die;
		$tsales="";

		if (($astgl<>"")OR($bstgl<>"")){
			$wstgl=" and delivery_order_detail_tab.stgl_invoice between '".$astgl."' AND '".$bstgl."' ";
		}else{
			$wstgl="";
		}		
//echo $wstgl;die;
		if ($sno_invoice<>""){
			$winv=" and delivery_order_detail_tab.sno_invoice='".$sno_invoice."' ";
		}else{
			$winv="";
		}
		
		if ($scidx<>""){
			$wcust=" and delivery_order_detail_tab.scid='".$scid."' ";
		}else{
			$wcust="";
		}
		
		if ($ssid<>""){
			$wsales=" and sales_order_tab.ssid='".$ssid."' AND sales_tab.sid=sales_order_tab.ssid";
			$tsales=" , sales_tab ";
		}else{
			$wsales=" AND sales_tab.sid=sales_order_tab.ssid";
			$tsales=" , sales_tab ";
		}
		$datecurrent=date('Y-m-d');
		//$ddate=date("Y-m-d",strtotime("$stgl + 30 days"));	
		if($pstatus==0){ $pstatus=""; $wstatus="";}
		if ($pstatus<>""){
			$wstatus=" and pstatus='".$pstatus."' ";

			if ($pstatus==4){
			$wstatus=" and ((NOW() >= (sduedate_invoice - INTERVAL 2 DAY)) AND  (NOW()<=sduedate_invoice)) AND sdate_lunas IS NULL";
		    }elseif ($pstatus==5){				
			$wstatus=" and NOW() > sduedate AND sdate_lunas IS NULL";
		    }			
			
			
		}else{

			$wstatus="";
		}		
		

		
		$this -> db -> select(" *,sales_order_tab.sduration as sdur,delivery_order_detail_tab.ssid as ssidx,
		(select stypepay from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as stypepay,
		(select (select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as bname,		
		(select (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as cname,		
		(select snoso from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as snoso,
		(select scid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as scid	,
		(select sbid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sbid
		FROM delivery_order_detail_tab,sales_order_tab ".$tsales." WHERE (delivery_order_detail_tab.sid=0) ".$winv.$wcust.$wstatus.$wstgl.$wsales." AND sales_order_tab.sid=delivery_order_detail_tab.ssid	
		and sales_order_tab.sbid='".$sbid."' AND delivery_order_detail_tab.sno_invoice!='' ORDER BY delivery_order_detail_tab.stgl_invoice DESC");
		return $this -> db -> get() -> result();
	}	
		
	
	
	
	
	
	
    function __get_do_select($id) {
		$this -> db -> select('*,(select (select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as bname,		
		(select (select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as cname,
		(select (select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sname,		
		(select snoso from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as snoso,
		(select scid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as scid	,
		(select sbid from sales_order_tab where sales_order_tab.sid=delivery_order_detail_tab.ssid)as sbid
		FROM delivery_order_detail_tab WHERE (sid=0) AND snodo='.$id.' ORDER BY did DESC');
		return $this -> db -> get() -> result();
	}	
	
	
	function __get_total_sales_order() {
		$sql = $this -> db -> query('SELECT * FROM sales_order_tab WHERE sstatus=1');
		return $sql -> num_rows();
	}

	
	
	function __get_total_sales_order_monthly($month,$year,$id) {
	$sql = $this -> db -> query("SELECT * FROM sales_order_tab WHERE YEAR(stgl) = '$year' AND MONTH(stgl) = '$month' ");
	$jum= $sql -> num_rows();
	$sqlx=$this -> db -> query("UPDATE sales_order_tab set snoso='$jum' WHERE sid='$id' ");
	}	
	
	
	function __get_sales_order_detail($id) {
		$this -> db -> select('*,(select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=sales_order_tab.ssid)as cname,
		(select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid)as sname
		FROM sales_order_tab WHERE (sstatus=1 OR sstatus=0) AND sid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_sales_order($data) {
	
        return $this -> db -> insert('sales_order_tab', $data);
	}
	
	function __update_sales_order($id, $data) {
        $this -> db -> where('sid', $id);
        return $this -> db -> update('sales_order_tab', $data);
	}
	
	function __delete_sales_order($id) {
		return $this -> db -> query('update sales_order_tab set sstatus=2 where sid=' . $id);
	}
}
