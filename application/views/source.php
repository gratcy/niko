<?php
error_reporting(0);
header('Content-type:application/javascript');
$mysql_server = $hostname;
$mysql_login = $username;
$mysql_password = $password;
$mysql_database = $database;
$branchid=$this -> memcachedlib -> sesresult['ubid'];
if(!isset($_REQUEST['term'])){$_REQUEST['term']="";}


$conn = mysql_connect($mysql_server, $mysql_login, $mysql_password);
$db = mysql_select_db($mysql_database, $conn);

$req = "SELECT cid,cbid,ccat, cname,caddr,cdeliver,cphone,csid,ccash,ccredit,climit, cnpwp,cpkp,cspecial,bname,sname,ccashnico,ccreditnico "
	."FROM customers_tab a,branch_tab b,sales_tab c "
	."WHERE a.cbid=b.bid  AND a.cbid='$branchid' AND a.csid=c.sid   AND  cstatus='1' AND cname LIKE '%".$_REQUEST['term']."%'"; 

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
	'ccat' => $row['ccat'],'caddr' => trim($addr[0]),'cdeliver' => $row['cdeliver'],'cphone' => $phone[0],
	'csid' => $row['csid'],'ccash' => $row['ccash'],'ccashnico' => $row['ccashnico'],'ccredit' => $row['ccredit'],'ccreditnico' => $row['ccreditnico'],'climit' => $row['climit'],'cnpwp' => $row['cnpwp'],'cpkp' => $row['cpkp'],'cspecial' => $row['cspecial'],'bname' => $row['bname'],
	'csname' => $row['sname'],'topx'=>$topx );
}

echo json_encode($results);
flush();
?>
