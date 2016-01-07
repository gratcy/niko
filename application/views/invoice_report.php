<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>

<style type="text/css">
table.gridtablex {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtablex th {
	border-width: 0px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtablex td {
	border-width: 0px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>
<!-- Table goes in the document BODY -->
<?php   
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
<p align=center>
<?php 
//print_r($detailx[0]);
$tgll=$detailx[0]->stgl_invoice;
    $first_date = strtotime($detailx[0]->stgl);
    $second_date = strtotime($detailx[0]->sduedate);
    $offset = $second_date-$first_date; 
    $duedate= floor($offset/60/60/24);
	$nextdate=date( "Y-m-d", strtotime( "$tgll + $duedate day" ) );
//echo $nextdate;

?>
<table class="gridtablex" border=0 width=800px >
<tr>
<td  colspan=4 width="40%" align=center  ><h1>INVOICE</h1></td>
</tr>

<tr>
<td width="10%" align=left><b>DO No.</b></td><td width=50% ><?php echo $detailx[0]->snodo; ?></td>
<td width="20%"><b>Invoice No.</b></td>
<td  valign=top width=20% ><?php echo $detailx[0]->sno_invoice; ?></td>
</tr>
		<?php 
			$stgldos=$detailx[0]->stgldo;			
			$stgldox = explode("-",$stgldos);			
			$stgldo="$stgldox[2]/$stgldox[1]/$stgldox[0]";
			
		?>
<tr>
<td width="10%" align=left  ><b>DO Date</b></td><td ><?php echo $stgldo; ?></td>
<td width="10%"><b>Invoice Date</b></td><td  valign=top width=30% ><?php echo date('d-m-Y',strtotime($detailx[0]->stgl_invoice)); ?></td>
</tr>


<tr>
<td width="10%" align=left  ><b>Customer</b></td><td  ><?php echo $detailx[0]->cname; ?></td>
<td width="10%"><b>Term Of Payment</b></td><td  valign=top width=30% ><?php
						$ccats= $detailx[0]->ccat; 
						$stypepay=$detailx[0]->stypepay;
						if($stypepay == "auto"){
						if($ccats==3){ 	$stype="Cash";	}else{ $stype="Credit";}
						}else{ $stype=$stypepay ;}
						echo ucwords($stype);
						?></td>
</tr>
<tr>
<td width="10%" align=left  ><b>Address</b></td><td  ><?php 
$caddr=explode("*",$detailx[0]->caddr);
echo $caddr[1].' , '.$detailx[0]->ccity; ?></td>
<td width="10%"><b>Due Date</b></td><td  valign=top width=30% ><?php echo date('d-m-Y',strtotime($detailx[0]->sduedate_invoice)); ?></td>
</tr>

</table>


<!--table class="gridtablex" border=1 width=800px >


<tr>
<td width="10%" align=left  >Driver</td><td width="20%" ><?php echo $detailx[0]->driver; ?></td>
<td width="10%">No </td><td  valign=top width=20% ><?php echo $detailx[0]->snodo; ?></td>
<td width="10%">Due Date </td><td  valign=top width=20% ><?php //echo date('d-m-Y',strtotime($nextdate)); ?>
<?php //echo date('d-m-Y',strtotime($detailx[0]->sduedate_invoice)); ?>
</td>
</tr>
</table-->
<br>
</p>
<p align=center>



<?php 
							$freeppn=$detailx[0]->sfreeppn;
							//echo $freeppn; 
							?>
                                <table class="gridtable" width=800 >
                                    <thead>
                                        <tr>
          
          <th>Code</th>
          <th>Name</th>
          <th>Qty/Coly</th>
		  <th>Qty/Pcs</th>
          <th>Normal Price</th>
          <th>Promo Discount </th>
		  <th>Payment Discount </th>
		  <th>Net Price </th>
		  <th>Total</th>

                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
		$totalqty=0;  
		$total=0;
		$totalppn=0;
		$totalall=0;
		$totalharga=0;
		$subtotal=0;
		
		foreach($detail as $k => $v) :	
			
			// $sqtyx=$v -> sqty;
			// $sdiscx=$v -> sdisc;
			// $harga=$v -> sprice;
			
			$sqtyx=$v -> sqty;
			if($freeppn==1){
			$spricex=$v -> sprice/1.1;
			}else{
			$spricex=$v -> sprice;	
			}	
			$sdiscx=$v -> sdisc;
			$qtyx=$v -> sqty;			
			$subtotal=$sqtyx * ($spricex - ($spricex * $sdiscx/100));
			
			//$totalharga=$sqtyx * ($harga - ($harga * $sdiscx/100));
			
    ?>
          <tr>
          
          <td><?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
		  <td><?php echo $v -> pname; ?></td>
          		  <td><?php echo $v -> sqty/$v -> pvolume; ?></td>
          <td><?php echo $v -> sqty; ?></td>
          <td align=right ><?php echo __get_rupiah($spricex,2); ?></td>
          <td align=right ><?php echo __get_rupiah($v -> spromodisc,2); ?></td>
		  <td align=right ><?php 
		  $promod=$v -> sdisc*($spricex -$v -> spromodisc)/100;
		  echo __get_rupiah($promod,2); ?></td>
		  <td align=right ><?php 
		  $netprice=$spricex-($v -> spromodisc + $promod);
		  
			if($freeppn==0){
				$netprice=$netprice;
			}else{
			$netprice=$netprice/1.1;
			}	  

		  
		  echo __get_rupiah($netprice,2); ?></td>
		  <td align=right> <?php 
		  $subtotal=$sqtyx * $netprice;
		  echo __get_rupiah($subtotal,2); ?> </td>
		  </tr>
        <?php 
	
		$totalqty=$sqtyx+$totalqty;
		$total=$total+$subtotal;
		$subtotal=$subtotal+$totalharga;
		

		$totalppn=$total * 10/100;
		if($freeppn==0){
		$totalall= $subtotal;
		}else{
		$totalall= $subtotal + $totalppn;
		}		
		
		
		endforeach; ?>
		
        <tr>          
		<th>SUB TOTAL</th>
        <th></th>
		<th></th>
        <th><?php echo $totalqty; ?></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th align=right ><?php echo __get_rupiah($subtotal); ?></th>

		 </tr>	

<tr>          
          <td align=center >PPN</td>
          <td align=center ><?php if($freeppn==1){ echo 10;}else{echo 0;}?>%</td>
          <td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
          <td align=right ><?php 
		  if($freeppn==1){ echo __get_rupiah($totalppn); }else{echo __get_rupiah(0);}?>
		  </td>
		 </tr>			
         <tr>          
          <th>TOTAL</th>
          <th></th>
          <th></th>
		  <th></th>
		  <th></th>
		  <th></th>
		  <th></th>
		  <th></th>
          <th align=right ><?php echo __get_rupiah($totalall); 
		  
		 
		  
		  mysql_select_db("distribution_db");
		  $snodo=$detailx[0]->sno_invoice;
		  mysql_query("update delivery_order_detail_tab set samount='$totalall' where snodo='$snodo'");
		  ?>
		  
		  </th>
		 </tr>		 
         <tr>          
          <th>Terbilang</th>

          <td align=center colspan=8 ><b><?php echo terbilang($totalall). 'rupiah'; ?></b></td>
		 </tr>			 
         
                                    </tbody>
                                </table>

</p>	




<p align=center><br>
<table  width=800px border=0 >
<tr>
	<td width=25% ><font  face="arial" size="2px">Tanda Terima</font></td><td colspan=2 rowspan=3 width=50% ></td><td width=25% ><font  face="arial" size="2px">Hormat Kami, <br> PT Niko Elektronik Indonesia</font></td>
</tr>
<tr>
	<td><br><br><br></td><td></td>
</tr>

<tr>
	<td><font  face="arial" size="2px"><br><b>CUSTOMER</b></font></td><td><font  face="arial" size="2px"><br><b>ADMIN</b></font></td>
</tr>
<?php 
if(!isset($_GET['ox'])){ $_GET['ox']="";}
if($_GET['ox']==1){?>
<form method=POST >

<tr>
	<td>
	<input type=hidden name="dototal" value="<?php echo $totalall; ?>">
	<input type=hidden name="snodo" value="<?php echo $detailx[0]->snodo; ?>">
	<input type=hidden name="scid" value="<?php echo $detailx[0]->scid; ?>">
	<input type=submit name="pst" value="POSTING" ></td>
	<td></td>
</tr>
</form>
<?php } ?>
</table>

</p>	