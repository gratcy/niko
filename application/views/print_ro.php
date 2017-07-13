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
$noto=0;
function Terbilang($satuan){  
$huruf = array ("", "satu", "dua", "tiga", "empat", "lima", "enam",   
"tujuh", "delapan", "sembilan", "sepuluh","sebelas");  
if ($satuan < 12)  
 return " ".$huruf[$satuan];  
elseif ($satuan < 20)  
 return Terbilang($satuan - 10)." belas";  
elseif ($satuan < 100)  
 return Terbilang($satuan / 10)." puluh".  
 Terbilang($satuan % 10);  
elseif ($satuan < 200)  
 return "seratus".Terbilang($satuan - 100);  
elseif ($satuan < 1000)  
 return Terbilang($satuan / 100)." ratus".  
 Terbilang($satuan % 100);  
elseif ($satuan < 2000)  
 return "seribu".Terbilang($satuan - 1000);   
elseif ($satuan < 1000000)  
 return Terbilang($satuan / 1000)." ribu".  
 Terbilang($satuan % 1000);   
elseif ($satuan < 1000000000)  
 return Terbilang($satuan / 1000000)." juta".  
 Terbilang($satuan % 1000000);   
elseif ($satuan >= 1000000000)  
 echo "Angka terlalu Besar";  
}  
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

// mysql_connect("localhost","root","");
// mysql_select_db("niaga_swadaya_db");
$con=mysqli_connect($mysql_server, $mysql_login, $mysql_password,$mysql_database);
//mysql_select_db($mysql_database);
$jum_baris="6";
$ttqty=0;
$pg=0;	
$sqlx="select * FROM retur_order_detail_tab a,products_tab b WHERE   a.spid=b.pid AND a.ssid='$id'";
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
$sql="select * FROM retur_order_detail_tab a,products_tab b WHERE   a.spid=b.pid AND a.ssid='$id' limit $cx,$jum_baris";
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
<h1>RETURN ORDER</h1></td>
</tr>
<tr>
<td></td><td></td>
</tr>









<tr>
<td align="left" width="15%"><b>Reff No.</b></td><td width="15%"><?=$detailx[0]->sreff;?></td>
<td width="28%"><b>Return No</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$detailx[0]->snoro;?></td>
<td rowspan="3"  width="5%"></td>
<td align="left" width="15%"><b>Customer</b></td><td><?=$detailx[0]->cname;?></td>
</tr>
<tr>
</tr>



<tr>
<td align="left" width="10%"><b>Sending Date</b></td><td width="15%"><?php echo __get_date(strtotime($detailx[0]->scdate),1); ?>

<td><b>Return Type</b> &nbsp;&nbsp; <?php 

		if($_GET['tg']==1){
			$rtp="Potong Piutang";
		}else{
			$rtp="Tukar Guling";
		}
		
		
		$ccats= $detailx[0] ->ctyperetur; 
		if($ccats==0){
			$ctr="Tukar Barang";
		}elseif($ccats==1){
			$ctr="Potong Piutang";
		}

		?>
<?=$rtp;?>		</td>

<td align="left" width="15%"><b>Salesman</b></td><td align="left" width="20%">
						
<?=$detailx[0]->sname;?></td>

</tr>
<tr>

</tr>



<tr>
<td align="left" width="10%"><b>Receiving Date</b></td><td><?php echo __get_date(strtotime($detailx[0]->stgl),1); ?></td>
<td></td><td></td>
<td align="left" width="15%"><b></b></td><td align="left" width="15%">
	<?php 

		if($_GET['tg']==1){
			$rtp="Potong Piutang";
		}else{
			$rtp="Tukar Guling";
		}
		
		
		$ccats= $detailx[0] ->ctyperetur; 
		if($ccats==0){
			$ctr="Tukar Barang";
		}elseif($ccats==1){
			$ctr="Potong Piutang";
		}

		?>
<?php //echo $rtp;?>		
<?php //=$ctr; ?></td>
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
          <th width="9%">Normal Price</th>
          <th>Accept </th>
		  <th>Reject</th>
		  <th width="10%">Net Price </th>
		  <th width="16%">Total</th>
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

if($detailx[0]->sfreeppn==1) { $data['sprice']=$data['sprice'];}else{ $data['sprice']=$data['sprice']*1;}
$branch=$this -> memcachedlib -> sesresult['ubid'];
// echo '<pre>';
// print_r($data);
// echo '</pre>';

if($_GET['tg']=='1'){
	if($data['sprice']!="0"){
?>
	
	
	
	
	
	<tbody>
              <tr>
          
          <td><?=$data['pcode'];?><input name="id[]" value="76" type="hidden"></td>
          <td><?=$data['pname'];?></td>
		  <td><?=round(($data['sqty']/$data['pvolume']),3);?></td>
          <td><?=$data['sqty'];?></td>
          <td align="right"><?=number_format($data['sprice']);?></td>          
		  <td align="right"><?=$data['saccept'];?></td>
		  <td align="right"><?=$data['sreject'];?>
		 </td>
		  <td align="right">
		  <?php
		  $netprice=$data['sprice'];
		  	if($detailx[0]->sfreeppn== 1){
				$netprice=$netprice/1.1;
			}else{
				$netprice=$netprice;
			}
			echo __get_rupiah($netprice,2);
			$stot=$data['sqty']*$netprice;
		  ?></td>
		  <td align="right"><?=number_format($stot);?></td>		
		  </tr>

<?php } }else{  if($data['sprice']=="0"){?>
	
	<tbody>
              <tr>
          
          <td><?=$data['pcode'];?><input name="id[]" value="76" type="hidden"></td>
          <td><?=$data['pname'];?></td>
		  <td><?=$data['sqty']/$data['pvolume'];?></td>
          <td><?=$data['sqty'];?></td>
          <td align="right"><?=number_format($data['sprice']);?></td>          
		  <td align="right"><?=$data['saccept'];?></td>
		  <td align="right"><?=$data['sreject'];?>
		 </td>
		  <td align="right">
		  <?php
		  $netprice=$data['sprice'];
		  	if($detailx[0]->sfreeppn== 1){
				$netprice=$netprice/1.1;
			}else{
				$netprice=$netprice;
			}
			echo __get_rupiah($netprice,2);
			$stot=$data['sqty']*$netprice;
		  ?></td>
		  <td align="right"><?=number_format($stot);?></td>		
		  </tr>	
<?php
}}
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
          <td align="right">&nbsp;</td>
          <td align="right">&nbsp;</td>
		  <td align="right">&nbsp;</td>
		  <td align="right">&nbsp;</td>
		  <td align="right"> &nbsp; </td>		
		  </tr>
	  

<?php 
}

$pg=$pg+1;
 ?> 
    <tr>          
          <th>SUB TOTAL</th>
		  <th></th>
		  <th></th>
          <th><?=$ttqty;?></th>
          <th></th>
          <th></th>
		  <th></th>
		  <th></th>		  
          <th align="right">Rp. <?=number_format($stotz);?></th>
		 </tr>		
         <tr>          
          <td align="center">PPN</td>
          <td align="center">
		  <?php
		
		if($detailx[0]->sfreeppn==0){
		$totalppn=0;	
		$totalall= $stotx;
		echo "0%";
		}else{
		$totalppn=$stotz * 10/100;	
		$totalall= $stotz + $totalppn;
		echo "10%";
		}
		 ?> 
		  
		  
		  
		  
		  
		  
		  </td>
          <td></td>
          <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
          <td align="right"> <?=__get_rupiah($totalppn);?>		  </td>
		 </tr>			
         <tr>          
          <th>TOTAL</th>
          <th></th>
          <th></th>
          <th><?=$qtyy;?></th>
		  <th></th>
		  <th></th>
		  <th></th>
		  <th></th>
          <th align="right">Rp. <?=number_format($totalall);?></th>
		 </tr>	








		 <tr>          
          <th>Terbilang</th>

          <td align=center colspan=8 ><b>
		  <?php 
		  $trb=terbilang($totalall);
		  if( $totalall==0 ){$trbx=" nol ";}else{ $trbx=$trb;}
		  echo $trbx. 'rupiah'; ?></b></td>
		 </tr>






		 
                                    </tbody>
                                </table>
<br>
<table align=center class="gridtable" width="900px">
<tbody><tr>
	<th valign="top" width="25%">DRIVER <br><br><br><br><br></th><th valign="top" width="25%">H. WAREHOUSE</th><th valign="top" width="25%">ADMIN </th><th valign="top" width="25%">CUSTOMER</th>
</tr>




</tbody></table>
</p>
<?php

echo "</div>";

}
?>	
