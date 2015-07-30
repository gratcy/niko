<?php
error_reporting(0);
header('Content-type:application/javascript');
$mysql_server = $hostname;
$mysql_login = $username;
$mysql_password = $password;
$mysql_database = $database;

if(!isset($_REQUEST['term'])){$_REQUEST['term']="";}


mysql_connect($mysql_server, $mysql_login, $mysql_password);
mysql_select_db($mysql_database);

$req = "SELECT pid,pcid,ppid, pcode,pname,pdesc,phpp,pdist,psemi,pkey,pstore, pconsume,ppoint,pdisc,pstatus,mqty "
	."FROM products_tab  a, moq_tab b "
	." WHERE  b.mbid='$bidx' and a.pid=b.mpid and pname LIKE '%".$_REQUEST['term']."%'"; 

	//echo "$req";
	
$qq="select * from customers_tab where cid= '$scid'";
$qr=mysql_query($qq);
$r=mysql_fetch_array($qr);
$ccat=$r['ccat'];	

	
$query = mysql_query($req);

while($row = mysql_fetch_array($query))
{


if($ccat==0){
$namecat="dist";
	$price=$row['pdist'];
	$ddisc=0;
}elseif($ccat==1){
$namecat="reg";
	$price=$row['pkey'];
	$ddisc=0;
}elseif($ccat==2){
$namecat="semi";
	$price=$row['psemi'];
	$ddisc=0;
}elseif($ccat==3){
$namecat="cash";
	$price=$row['pconsume'];
	$ddisc=$row['pdisc'];
}

$label=$row['pcode'].' - '.$row['pname'];

	$results[] = array('label' => $label,'pid' => $row['pid'],'pcid' => $row['pcid'],
	'ppid' => $row['ppid'],'pcode' =>$row['pcode'],'pdesc' => $row['pdesc'],'phpp' => $row['phpp'],
	'pdist' => $row['pdist'],'psemi' => $row['psemi'],'pkey' => $row['pkey'],'pstore' => $row['pstore'],
	'pconsume' => $row['pconsume'],'ppoint' => $row['ppoint'],'pdisc' => $row['pdisc'],'pstatus' => $row['pstatus'],
	'price'=>$price, 'mqty'=>$row['mqty'],'ddisc'=>$ddisc ,'ccat'=>$ccat,'namecat'=>$namecat );
}

echo json_encode($results);
flush();
?>
