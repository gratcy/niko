<?php
error_reporting(0);
header('Content-type:application/javascript');
$mysql_server = $hostname;
$mysql_login = $username;
$mysql_password = $password;
$mysql_database = $database;

if(!isset($_REQUEST['term'])){$_REQUEST['term']="";}


$conn = mysql_connect($mysql_server, $mysql_login, $mysql_password);
$db = mysql_select_db($mysql_database, $conn);

$req = "SELECT cid,cbid,ccat, cname 
	FROM customers_tab a,branch_tab b 
	WHERE a.cbid=b.bid     AND  a.cstatus='1' AND a.cname LIKE '%".$_REQUEST['term']."%'"; 

	//echo "$req".$database;
	//echo "$req";die;
	
$query = mysql_query($req);

while($row = mysql_fetch_array($query))
{
if($row['ccat'] == 3){
$topx=$row['ccash'];

}else{
$topx=$row['ccredit'];
}	
// if($row['ctax']==0){$ctx="InTaxable";}
// else if($row['ctax']==1){$ctx="Taxable";}
$phone=explode('*',$row['cphone']);
$addr=explode('*',$row['caddr']);
	$results[] = array('label' => $row['cname'],'cid' => $row['cid'],'cbid' => $row['cbid'],
	'ccat' => $row['ccat']);
}

echo json_encode($results);
flush();
?>
