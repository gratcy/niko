<?php
$mysql_server = $hostname;
$mysql_login = $username;
$mysql_password = $password;
$mysql_database = $database;
if(!isset($_REQUEST['term'])){$_REQUEST['term']="";}


mysql_connect($mysql_server, $mysql_login, $mysql_password);
mysql_select_db($mysql_database);

$req = "SELECT pid,pcode, pname,pdesc,phpp,pdist,psemi,pkey,pstore,pconsume,ppoint,pdisc,pvolume "
	."FROM products_tab "
	."WHERE pstatus=1 AND  pname LIKE '%".$_REQUEST['term']."%'"; 

	//echo "$req";
	
$query = mysql_query($req);

while($row = mysql_fetch_array($query))
{
// if($row['ctax']==0){$ctx="InTaxable";}
// else if($row['ctax']==1){$ctx="Taxable";}

	$results[] = array('label' => $row['pname'],'pid' => $row['pid'],'pcode' => $row['pcode'],
	'pdesc' => $row['pdesc'],'phpp' => $row['phpp'],'pdist' => $row['pdist'],'psemi' => $row['psemi'],
	'pkey' => $row['pkey'],'pstore' => $row['pstore'],'pconsume' => $row['pconsume'],'ppoint' => $row['ppoint'],
	'pdisc' => $row['pdisc'],'pvolume'=> $row['pvolume']);
}

echo json_encode($results);
flush();
?>