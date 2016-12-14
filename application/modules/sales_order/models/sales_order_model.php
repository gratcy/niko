<?php
class sales_order_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_sales_order_select() {
		$this -> db -> select('bid,bname FROM sales_order_tab WHERE sstatus=1 ORDER BY bname ASC');
		return $this -> db -> get() -> result();
	}
	
	function __get_limit_before($sid,$scid) {
		$this -> db -> select("sototal,scid,
(SELECT climit FROM customers_tab WHERE scid=cid) AS climit
 FROM sales_order_tab WHERE sid='".$sid."' AND scid='".$scid."'");

		$sql= $this -> db -> get() -> result();
		 print_r($sql);
		 $sototal=$sql[0]->sototal;
		 $climit=$sql[0]->climit;
		 $limitx=$sototal+$climit;
		 return $limitx;
		 //die;
	}
	
	function __get_sales_order() {
		
		if(!isset($_POST['sisa'])){ $_POST['sisa']="x";}
		if(!isset($_POST['sreff'])){ $_POST['sreff']="";}
		if(!isset($_POST['cid'])){ $_POST['cid']="";}

		if($_POST['cid']==""){ 
			$wcid="";
		}else{
			$wcid=" and a.scid = '".$_POST['cid']."' ";
		}


		if($_POST['sreff']==""){ 
			$wsreff="";
		}else{
			$wsreff=" and sreff = '".$_POST['sreff']."' ";
		}
		if($_POST['sisa']=="x"){ 
			$wsisa="";
			$wdo ="";
			$wtabdo="";
				$seldo="(select d.dstatus from delivery_order_detail_tab d where d.ssid=a.sid and d.sid=0 limit 1)as dstatus,";
		
		}elseif($_POST['sisa']=='0'){
			$wsisa=" and a.sstatus = '3'  and b.ssisa>0 ";
			$wtabdo=" ,sales_order_detail_tab ";
				//$seldo="(select dstatus from delivery_order_detail_tab where delivery_order_detail_tab.ssid=sales_order_tab.sid and  delivery_order_detail_tab.dstatus!='3' and delivery_order_detail_tab.sid=0 limit 1)as dstatus,";
		$seldo="";
		}elseif($_POST['sisa']=='1'){
			
			$wsisa=" and a.sstatus = '3' and b.ssisa=0 ";
			$wtabdo=" ,delivery_order_detail_tab ";
			$seldo="(select dstatus from delivery_order_detail_tab where delivery_order_detail_tab.ssid=sales_order_tab.sid and delivery_order_detail_tab.sid=0 limit 1)as dstatus,";
		}elseif($_POST['sisa']=='2'){
			$seldo="";
			$wsisa=" and a.sstatus = '1' and b.ssisa>0 ";
			$wtabdo="";
		}
		if($_POST['cid']==""){ 
			$wcid="";
			$seldox="";
		}else{
			$wcid=" and sales_order_tab.scid = '".$_POST['cid']."' ";
			$seldox=" (select dstatus from delivery_order_detail_tab where delivery_order_detail_tab.ssid=sales_order_tab.sid and delivery_order_detail_tab.sid=0 limit 1)as dstatus, ";
		}	



	
/*
		return " select distinct(a.sid),a.*,
                (select sum(b.ssisa) from sales_order_detail_tab b where b.sid=a.ssid) as ssisa,
		(select sname from sales_tab st where st.sid=a.ssid) as sname,
		(select bname from branch_tab c where c.bid=a.sbid) as bname,
		(select cname from customers_tab d where d.cid=a.scid) as cname
		 from sales_order_tab a where 1 $wsisa $wcid  and a.sstatus!='2' order by a.sid desc";
*/
		

return " SELECT DISTINCT(a.sid),a.*,
                SUM(b.ssisa) as ssisa,
		(SELECT sname FROM sales_tab st WHERE st.sid=a.ssid) AS sname,
		(SELECT bname FROM branch_tab c WHERE c.bid=a.sbid) AS bname,
		(SELECT cname FROM customers_tab d WHERE d.cid=a.scid) AS cname
		 FROM sales_order_tab a , sales_order_detail_tab b WHERE 1 $wsisa $wcid AND b.ssid=a.sid   AND a.sstatus!='2' AND ssisa>0 GROUP BY a.sid
		  ORDER BY a.sid DESC ";
		
		
		
		
		
		
		
	}



	function __get_sales_orderz() {
		
		if(!isset($_POST['sisa'])){ $_POST['sisa']="x";}
		if(!isset($_POST['sreff'])){ $_POST['sreff']="";}
		if(!isset($_POST['cid'])){ $_POST['cid']="";}

		if($_POST['cid']==""){ 
			$wcid="";
		}else{
			$wcid=" and a.scid = '".$_POST['cid']."' ";
		}


		if($_POST['sreff']==""){ 
			$wsreff="";
		}else{
			$wsreff=" and sreff = '".$_POST['sreff']."' ";
		}
		if($_POST['sisa']=="x"){ 
			$wsisa="";
			$wdo ="";
			$wtabdo="";
				$seldo="(select dstatus from delivery_order_detail_tab d where d.ssid=a.sid and d.sid=0 limit 1)as dstatus,";
		
		}elseif($_POST['sisa']=='0'){
			$wsisa=" and a.sstatus = '3'  and b.ssisa>0 ";
			$wtabdo=" ,sales_order_detail_tab ";
				//$seldo="(select dstatus from delivery_order_detail_tab where delivery_order_detail_tab.ssid=sales_order_tab.sid and  delivery_order_detail_tab.dstatus!='3' and delivery_order_detail_tab.sid=0 limit 1)as dstatus,";
		$seldo="";
		}elseif($_POST['sisa']=='1'){
			
			$wsisa=" and a.sstatus = '3' and b.ssisa=0 ";
			$wtabdo=" ,delivery_order_detail_tab ";
			$seldo="(select dstatus from delivery_order_detail_tab where delivery_order_detail_tab.ssid=sales_order_tab.sid and delivery_order_detail_tab.sid=0 limit 1)as dstatus,";
		}elseif($_POST['sisa']=='2'){
			$seldo="";
			$wsisa=" and a.sstatus = '1' and b.ssisa>0 ";
			$wtabdo="";
		}
		if($_POST['cid']==""){ 
			$wcid="";
			$seldox="";
		}else{
			$wcid=" and a.scid = '".$_POST['cid']."' ";
			$seldox=" (select dstatus from delivery_order_detail_tab where delivery_order_detail_tab.ssid=sales_order_tab.sid and delivery_order_detail_tab.sid=0 limit 1)as dstatus, ";
		}		


		
	$this -> db ->SELECT (" DISTINCT(a.sid),a.*,
                SUM(b.ssisa) as ssisa,
	(select sname from sales_tab st where st.sid=a.ssid) as sname,
	(select bname from branch_tab c where c.bid=a.sbid) as bname,
	(select cname from customers_tab d where d.cid=a.scid) as cname
	 from sales_order_tab a, sales_order_detail_tab b where a.sid=b.ssid $wsisa $wcid  and a.sstatus!=2  group by a.sid order by a.sid desc");	
	
	return $this -> db -> get() -> result();
		
		
	}


	
	function __get_total_sales_order() {
		$sql = $this -> db -> query('SELECT * FROM sales_order_tab WHERE sstatus=1');
		return $sql -> num_rows();
	}

	
	
	function __get_total_sales_order_monthly($month,$year,$id) {
	//$year=date('Y');
	
	$sql = $this -> db -> query("SELECT * FROM sales_order_tab WHERE YEAR(stgl) = '$year' AND MONTH(stgl) = '$month' ");
	$jum= $sql -> num_rows();
	$sqlx=$this -> db -> query("UPDATE sales_order_tab set snoso='$jum' WHERE sid='$id' ");
	}	
	
	
	function __get_sales_order_detail($id) {
		$this -> db -> select('*,sales_order_tab.sbid as sbid,(select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid)as bname,
		(select cname from customers_tab where customers_tab.cid=sales_order_tab.scid)as cname,
		(select caddr from customers_tab where customers_tab.cid=sales_order_tab.scid)as caddr,
		(select ccat from customers_tab where customers_tab.cid=sales_order_tab.scid)as ccat,
		(select ctop from customers_tab where customers_tab.cid=sales_order_tab.scid)as toplimit,
		(select climit from customers_tab where customers_tab.cid=sales_order_tab.scid)as sisaplafon,
		(select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid)as sname,
		(select dstatus from delivery_order_detail_tab where delivery_order_detail_tab.ssid=sales_order_tab.sid and delivery_order_detail_tab.spid=0 limit 1 )as dstatus 
		FROM sales_order_tab WHERE (sstatus=0 OR sstatus=1 OR sstatus=3) AND sid=' . $id);
		return $this -> db -> get() -> result();
	}
	function __get_customers_detail($id) {
		$this -> db -> select('*,
		(select sname from sales_tab where sales_tab.sid=customers_tab.csid)as sname
		FROM customers_tab WHERE  cid=' . $id);
		return $this -> db -> get() -> result();
	}	
	
	function __get_duration($stype,$stypepay,$cid) {
		if(($stype==0)AND ($stypepay=="Credit")){
			$stp='ccredit';
		}elseif(($stype==0)AND ($stypepay=="Cash")){
			$stp='ccash';
		}else if(($stype==1)AND ($stypepay=="Credit")){
			$stp='ccreditnico';
		}else if(($stype==1)AND ($stypepay=="Cash")){
			$stp='ccashnico';
		}
		$this -> db -> select(" $stp as sduration
		FROM customers_tab WHERE  cid=" . $cid );
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
	
	function __get_suggestion() {
		$this -> db -> select('sref as name FROM sales_order_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY name ASC');
		$name = $this -> db -> get() -> result();
		$this -> db -> select('snoso as name FROM sales_order_tab WHERE (sstatus=1 OR sstatus=0) ORDER BY name ASC');
		$pnobukti = $this -> db -> get() -> result();
		return array_merge($name, $pnobukti);
	}
	
	function __get_search($keyword) {
		
		$this -> db -> select("*,(select bname from branch_tab where branch_tab.bid=sales_order_tab.sbid) as bname, 
		(select dstatus from delivery_order_detail_tab where delivery_order_detail_tab.ssid=sales_order_tab.sid and delivery_order_detail_tab.sid=0 limit 1)as dstatus,
		(select cname from customers_tab where customers_tab.cid=sales_order_tab.scid) as cname, 
		(select sname from sales_tab where sales_tab.sid=sales_order_tab.ssid) as sname FROM sales_order_tab,customers_tab WHERE 
		(sstatus<>2 ) AND (sreff LIKE '%".$keyword."%' OR snoso LIKE '%".$keyword."%' OR customers_tab.cname LIKE '%".$keyword."%') 
		AND customers_tab.cid=sales_order_tab.scid ORDER BY sid DESC");
		return $this -> db -> get() -> result();
	}
}
