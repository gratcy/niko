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
if($stype==1){ $wpcid= " AND pcid='40' "; }else{ $wpcid= " AND pcid<>'40' ";}
$req = "SELECT pid,pcid,ppid, pcode,pname,pdesc,phpp,pdist,psemi,pkey,pstore, pconsume,ppoint,pstatus,mqty,pvolume,
(select g.cdiscountdate from categories_tab g where g.cid= a.pcid) as pdiscdate,
(select g.cdiscount from categories_tab g where g.cid= a.pcid) as pdisc
 "
	." FROM products_tab  a LEFT JOIN moq_tab b ON a.pid=b.mpid"
	." WHERE b.mbid='$bidx' $wpcid and a.pname LIKE '%".$_REQUEST['term']."%'"; 

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
$namecat="semi";
	$price=$row['psemi'];
	$ddisc=0;
}elseif($ccat==2){
$namecat="agent";
	$price=$row['pkey'];
	$ddisc=0;
}elseif($ccat==3){
$namecat="store";
	$price=$row['pstore'];
	$ddisc=0;
}elseif($ccat==4){
$namecat="consumer";
	$price=$row['pconsume'];
	$ddisc=0;
}elseif($ccat==5){
$namecat="cash";
	$price=$row['pconsume'];
	$ddisc=$row['pdisc'];
}

$label=$row['pcode'].' - '.$row['pname'];

if($row['ppid']=='3'){
	$pvolpcs= $row['pvolume'];
	$pvolpck= "";
}else{
	$pvolpcs= "";
	$pvolpck= $row['pvolume'];
	
}

$pricess= __get_rupiah($price,2); 

	$results[] = array('label' => $label,'pid' => $row['pid'],'pcid' => $row['pcid'],
	'ppid' => $row['ppid'],'pcode' =>$row['pcode'],'pdesc' => $row['pdesc'],'phpp' => $row['phpp'],
	'pdist' => __get_rupiah($row['pdist'],2),'psemi' => __get_rupiah($row['psemi'],2),'pkey' => __get_rupiah($row['pkey'],2),'pstore' => __get_rupiah($row['pstore'],2),
	'pconsume' => __get_rupiah($row['pconsume'],2),'ppoint' => $row['ppoint'],'pdisc' => $row['pdisc'],'cdiscdate' => $row['pdiscdate'],'pstatus' => $row['pstatus'],
	'price'=>__get_rupiah($price,2), 'mqty'=>$row['mqty'],'ddisc'=>$ddisc ,'ccat'=>$ccat,'namecat'=>$namecat , 'pvolumepcs' => $pvolpcs,'pvolumepck' => $pvolpck);
}

echo json_encode($results);
flush();
?>
