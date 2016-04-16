    <html>
    <head>
    <style>
    @page { size 8.5in 28in; margin: 0 cm }
    div.page { page-break-after: always }
    </style>
	
	<style type="text/css">
/* Print. */
@media print {
  /* cssclsNoPrint class. */
  .cssclsNoPrint {display:none}
}

/* Screen. */
@media screen {
  /* cssclsNoScreen class. */
  .cssclsNoScreen {display:none}
}
</style>
<style type="text/css">
p.pos1 {
    position: fixed;
    top: 20px;
	left:80px;
	right:350px;
}

p.posqty {
    position: fixed;
    top: 480px;
	left:520px;
}

img.ex2 {
    position: fixed;
    top: 500px;
	left:300px;
}
p.pos_fixed {
    position: fixed;
    top: 20px;
    right: 210px;
    color: red;
	left:360px;
}
p.pos_fixedx {
    position: fixed;
    top: 50px;
    right: 210px;
    color: red;
	left:360px;
}

p.pos_info {
    position: fixed;
    top: 50px;
    right: 4px;
    color: red;
	left:670px;
	
}

p.pos_faktur {
    position: fixed;
    top: 15px;
    right: 4px;
    color: red;
	left:670px;
	
}

p.pos_tgl {
    position: fixed;
    top: 35px;
    right: 4px;
    color: red;
	left:670px;
	
}

p.pos_user {
    position: fixed;
    top: 620px;
    right: 4px;
    color: red;
	left:700px;
	
}

p.pos_kondisi {
    position: fixed;
    top: 620px;
    right: 4px;
    color: red;
	left:610px;
	
}


table.pos_fixedz {
    position: fixed;
    top: 0px;

}
table.pos_fixedzz {
    position: fixed;
    bottom: 300px;

}

h2 {
    position: relative;
    left: 100px;
    top: 150px;
}
</style>
<script>
function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>
<style type="text/css">
body p {
	font-family: Verdana, Geneva, sans-serif;
}
.ax {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	text-align: right;
}
.axb {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 9px;
	text-align: right;
}
.axx {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	text-align: left;
}

body p {
	text-align: center;
}
body p {
	text-align: left;
	font-size: 10px;
}

.xxx {
	font-size: 9px;
}
body p {
	font-family: Verdana, Geneva, sans-serif;
}

.yes {
	color: #999;
}
.puthh {
	color: #FFF;
}
</style>	
 
 
 
 
 
 <meta http-equiv="content-type" content="text/html; charset=windows-1252"><style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:12px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 4px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 4px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>

<style type="text/css">
table.gridtablex {
	font-family: verdana,arial,sans-serif;
	font-size:12px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtablex th {
	border-width: 0px;
	padding: 4px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtablex td {
	border-width: 0px;
	padding: 4px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>
 
<?php
$caddr=explode("*",$detailx[0]->caddr);
$drv=explode("-",$detailx[0]->driver);
?> 
 
	
<?php
$tnet=0;
$tot_netto=0;
$tot_brutto=0;
$tot_disc=0; 

$mysql_server = $hostname;
$mysql_login = $username;
$mysql_password = $password;
$mysql_database = $database;

$con=mysqli_connect($mysql_server, $mysql_login, $mysql_password,$mysql_database);
$jum_baris="9";
$ttqty=0;
$pg=0;	
//$sqlx="select * FROM sales_order_detail_tab a,products_tab b WHERE   a.spid=b.pid AND a.ssid='$id'";
$sqlx="select *,(select sprice FROM sales_order_detail_tab c where c.sid=a.sid) as sprice,
		(select spromodisc FROM sales_order_detail_tab c where c.sid=a.sid) as spromodisc,
		(select sdisc FROM sales_order_detail_tab c where c.sid=a.sid) as sdisc	FROM 
		delivery_order_detail_tab a,products_tab b WHERE   a.sqty!=0 and  a.spid=b.pid AND a.ssid=" . $id ." 
		AND a.snodo='". $snodo . "'";
		
		//echo $sqlx;die;


$tampilx=mysqli_query($con,$sqlx);


$jum_data=mysqli_num_rows($tampilx);
$jum_page=ceil($jum_data/$jum_baris);

$datx=mysqli_fetch_array($tampilx);
//echo "$jum_data $jum_page";
$jx=0;
$b=0;
for($p=1; $p<= $jum_page; $p++){
$c=$p*$jum_baris;


//echo "xxxx $p $c <br>";

//print_r(mysqli_fetch_array($tampilx));//die;
$cx=$c-$jum_baris;
//$sql="select * FROM sales_order_detail_tab a,products_tab b WHERE   a.spid=b.pid AND a.ssid='$id' limit $cx,$jum_baris";

$sql="select *,(select sprice FROM sales_order_detail_tab c where c.sid=a.sid) as sprice,
		(select spromodisc FROM sales_order_detail_tab c where c.sid=a.sid) as spromodisc,
		(select sdisc FROM sales_order_detail_tab c where c.sid=a.sid) as sdisc	FROM 
		delivery_order_detail_tab a,products_tab b WHERE   a.sqty!=0 and a.spid=b.pid AND a.ssid=" . $id ." 
		AND a.snodo='". $snodo . "' limit $cx,$jum_baris";

$tampil=mysqli_query($con,$sql);


?>

<div class='page'>
<body>

<div  ><p class="pos_fixed">	

</p></div>
<div class="axx"><p class="pos_fixedx">

</p></div>	

	
<p align="center">
<table class="gridtablex" align="center" border="0" width="900">
  
  

<tbody><tr>
<td rowspan="2" colspan="6" align="center">
<h1>DELIVERY ORDER</h1></td>
</tr>
<tr>
<td></td><td></td>
</tr>







<tr>
<td align="left" width="10%"><b>Reff No.</b></td><td width="20%"><?=$detailx[0]->sreff;?></td>
<td width="10%"></td><td  valign="top" width="30%"></td>


<td align="left" width="10%"><b>Sales</b></td><td align="left" width="20%">
<?php echo $detailx[0]->sname; ?></td>
</tr>


<tr>
<td align="left" width="10%"><b>DO No.</b></td><td width="20%"><?= $detailx[0]->snodo; ?></td>
<td width="10%"></td><td rowspan="4" valign="top" width="30%"></td>


<td align="left" width="10%"><b>Driver</b></td><td align="left" width="20%">
						
<?php echo $drv[0]; ?></td>

</tr>
<tr>

</tr><tr>
<td align="left" width="10%"><b>Date</b></td><td width="20%"><?=date('d/m/Y',strtotime($detailx[0]->stgldo));?></td>
<td width="10%"></td>
<td align="left"><b>A. Driver</b></td><td align="left"><?php echo $drv[1]; ?></td>
</tr>
<tr>
<td align="left" width="10%"><b>Customer</b></td><td width="20%" ><?=$detailx[0]->cname;?></td>
<td width="10%"></td>
<td align="left"><b>Car Number</b></td><td align="left"><?php echo $detailx[0]->snopol; ?></td>
</tr>
<tr><td align="left" width="10%"><b>Address</b></td><td width="20%"><?php echo trim($caddr[0]).' , '.$detailx[0]->ccity; ?></td>
<td width="10%"></td><td rowspan="3" valign="top" width="30%"></td>
</tr>
<tr>


</tr></tbody></table>

	
	
	
	
	
	
		
	
<div class="gridtable" align=center >

							                                <table class="gridtable" border="1" width="900">
	
	

                                    <thead>
                                        <tr>
          
          <th width="11%">Code</th>
          <th width="35%">Name</th>
          <th width="10">Qty/ Coly</th>
	  <th width="10">Qty/ Pcs</th>

                                        </tr>
                                    </thead>
	
  

<?php
$r=0;$rt=0;
$jjx=0;
$stot=0;
$ttqty=0;
$stotz=0;
//$tot_brutto=0;
while ($data=mysqli_fetch_array($tampil)){
		
	$jx=$jx+1;
	$jjx=$jjx+1;

if($detailx[0]->sfreeppn==1) { $data['sprice']=$data['sprice']/1.1;}else{ $data['sprice']=$data['sprice']*1;}
$branch=$this -> memcachedlib -> sesresult['ubid'];
// echo '<pre>';
// print_r($data);
// echo '</pre>';

$qtycoly=$data['sqty']/$data['pvolume'];
$qtc= number_format($qtycoly,2,'.',',');
?>
	
	
	
	
	
	<tbody>
              <tr>
          
          <td><?=$data['pcode'];?></td>
          <td><?=$data['pname'];?></td>
		  <td align=center ><?echo str_replace('.00','',$qtc);?></td>
          <td align=center ><?=$data['sqty'];?></td>
	
		  </tr>
	  
<?php
if(!isset($stotx)){$stotx=0;}
if(!isset($qtyy)){$qtyy=0;}
	$stotx=$stotx+$stot;
	$stotz=$stotz+$stot;
	$ttqty=$data['sqty']+$ttqty;
	$qtyy=$data['sqty']+$qtyy;
	$rr=2;
	$pjs=0;
	$pjs=strlen($data[7]);

	$tnet=0;
	$tot_brutto=0;
	$tot_netto =0;
	$tot_disc=0;
	$r=0;
	$rt=$rt+1;
	//echo $r.'-'.$rt.'-'.$rr.'xx';
}

$f=(8-($r+$rt))/3;
//echo $f;
for($z=0;$z<$f;$z++){
?>
              <tr>
          
          <td>&nbsp;</td>
          <td>&nbsp;</td>
		  <td>&nbsp;</td>
          <td>&nbsp;</td>
		
		  </tr>
	  

<?php 
}

$pg=$pg+1;
 ?> 
	
         
         <tr>          
          <th>TOTAL</th>
          <th></th>
          <th></th>
          <th><?=$qtyy;?></th>
		  
		 </tr>		 
                                    </tbody>
                                </table>
<br>
<table align=center class="gridtable" width="900px">
<tbody><tr>
	<th valign="top" width="20%">H. WAREHOUSE <br><br><br><br><br></th><th valign="top" width="20%">A. WAREHOUSE</th>
	<th valign="top" width="20%">DRIVER</th><th valign="top" width="20%">A. DRIVER</th><th valign="top" width="20%">CUSTOMER</th>
</tr>




</tbody></table>
</p>
<br>
<?php

echo "</div>";

}
?>	
