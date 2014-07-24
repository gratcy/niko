<?php
$mysql_server = 'localhost';
$mysql_login = 'root';
$mysql_password = '';
$mysql_database = 'distribution_db';
if(!isset($_REQUEST['term'])){$_REQUEST['term']="";}


mysql_connect($mysql_server, $mysql_login, $mysql_password);
mysql_select_db($mysql_database);

$req = "SELECT pid,pcid,ppid, pcode,pname,pdesc,phpp,pdist,psemi,pkey,pstore, pconsume,ppoint,pdisc,pstatus,mqty "
	."FROM products_tab  a, moq_tab b "
	." WHERE  a.pid=b.mpid and pname LIKE '%".$_REQUEST['term']."%'"; 

	//echo "$req";
	
$qq="select * from customers_tab where cid= '$_GET[scid]'";
$qr=mysql_query($qq);
$r=mysql_fetch_array($qr);
$ccat=$r['ccat'];	
	
	
$query = mysql_query($req);

while($row = mysql_fetch_array($query))
{


if($ccat==0){
	$price=$row['pdist'];
	$ddisc=0;
}elseif($ccat==1){
	$price=$row['pkey'];
	$ddisc=0;
}elseif($ccat==2){
	$price=$row['psemi'];
	$ddisc=0;
}elseif($ccat==3){
	$price=$row['pstore'];
	$ddisc=$row['pdisc'];
}


// if($row['ctax']==0){$ctx="InTaxable";}
// else if($row['ctax']==1){$ctx="Taxable";}
// $phone=explode('*',$row['cphone']);
// $addr=explode('*',$row['caddr']);
	$results[] = array('label' => $row['pname'],'pid' => $row['pid'],'pcid' => $row['pcid'],
	'ppid' => $row['ppid'],'pcode' =>$row['pcode'],'pdesc' => $row['pdesc'],'phpp' => $row['phpp'],
	'pdist' => $row['pdist'],'psemi' => $row['psemi'],'pkey' => $row['pkey'],'pstore' => $row['pstore'],
	'pconsume' => $row['pconsume'],'ppoint' => $row['ppoint'],'pdisc' => $row['pdisc'],'pstatus' => $row['pstatus'],
	'price'=>$price, 'mqty'=>$row['mqty'],'ddisc'=>$ddisc );
}

echo json_encode($results);
flush();
?>