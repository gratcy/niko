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
$branchid=$this -> memcachedlib -> sesresult['ubid'];
$req = "SELECT sid,sname "
	."FROM sales_tab  "
	."WHERE   sstatus='1' AND sbid= '".$branchid."' AND sname LIKE '%".$_REQUEST['term']."%'"; 

	//echo "$req".$database;
	//echo "$req";die;
	
$query = mysql_query($req);

while($row = mysql_fetch_array($query))
{
	

	$results[] = array('label' => $row['sname'],'sid' => $row['sid'],'sname' => $row['sname']);
}

echo json_encode($results);
flush();
?>
