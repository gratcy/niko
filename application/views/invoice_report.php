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
<td width="10%" align=left  >Kepada</td><td width="30%" ><?php echo $detailx[0]->cname; ?></td>
<td width="10%">No INVOICE</td><td  valign=top width=30% ><?php echo $detailx[0]->sno_invoice; ?></td>
</tr>
<tr>
<td width="10%" align=left  >Alamat</td><td  ><?php 
$caddr=explode("*",$detailx[0]->caddr);
echo $caddr[1]; ?></td>
<td width="10%">Tanggal</td><td  valign=top width=30% ><?php echo date('d-m-Y',strtotime($detailx[0]->stgl_invoice)); ?></td>
</tr>
<tr>
<td width="10%" align=left  >Kode</td><td ><?php echo $detailx[0]->snomor; ?></td>
<td width="10%">No Pol</td><td  valign=top width=30% ><?php echo $detailx[0]->snopol; ?></td>
</tr>
</table>


<table class="gridtablex" border=1 width=800px >


<tr>
<td width="10%" align=left  >Driver</td><td width="20%" ><?php echo $detailx[0]->driver; ?></td>
<td width="10%">No </td><td  valign=top width=20% ><?php echo $detailx[0]->snodo; ?></td>
<td width="10%">Tanggal </td><td  valign=top width=20% ><?php //echo date('d-m-Y',strtotime($nextdate)); ?>
<?php echo date('d-m-Y',strtotime($detailx[0]->sduedate_invoice)); ?>
</td>
</tr>
</table>
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
          
          <th>Kode Product</th>
          <th>Nama Product</th>
          <th>Qty</th>
		  <th>Discount</th>
		  <th>Harga</th>
		  <th>Total Harga</th>

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
			//print_r($v);
			$sqtyx=$v -> sqty;
			$sdiscx=$v -> sdisc;
			$harga=$v -> sprice;
			$totalharga=$sqtyx * ($harga - ($harga * $sdiscx/100));
	
    ?>
          <tr>
          
          <td><?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
		  <td><?php echo $v -> pname; ?></td>
          <td align=center ><?php echo $v -> sqty; ?></td>
		  <td align=center ><?php echo $v -> sdisc; ?></td>
		  <td align=center ><?php echo __get_rupiah($v -> sprice); ?></td>
		<td align=center ><?php echo __get_rupiah($totalharga); ?></td>
		  </tr>
        <?php 
	
		$totalqty=$sqtyx+$totalqty;
		$total=$total+$subtotal;
		$subtotal=$subtotal+$totalharga;
		

		$totalppn=$total * 10/100;
		if($freeppn==1){
		$totalall= $subtotal;
		}else{
		$totalall= $subtotal + $totalppn;
		}		
		
		
		endforeach; ?>
		
        <tr>          
		<th>SUB TOTAL</th>
        <th></th>
        <th><?php echo $totalqty; ?></th>
		<th></th>
		<th></th>
		<th><?php echo __get_rupiah($subtotal); ?></th>

		 </tr>	

<tr>          
          <td>PPN</td>
          <td><?php if($freeppn==0){ echo 10;}else{echo 0;}?>%</td>
          <td></td>
		<td></td>
		<td></td>
          <td align=center ><?php 
		  if($freeppn==0){ echo __get_rupiah($totalppn); }else{echo __get_rupiah(0);}?>
		  </td>
		 </tr>			
         <tr>          
          <th>TOTAL</th>
          <th></th>
          <th></th>
		  <th></th>
		  <th></th>
          <th><?php echo __get_rupiah($totalall); 
		  
		 
		  
		  mysql_select_db("distribution_db");
		  $snodo=$detailx[0]->sno_invoice;
		  mysql_query("update delivery_order_detail_tab set samount='$totalall' where snodo='$snodo'");
		  ?>
		  
		  </th>
		 </tr>		 
         <tr>          
          <th>Terbilang</th>

          <td align=center colspan=5 ><b><?php echo terbilang($totalall). 'rupiah'; ?></b></td>
		 </tr>			 
         
                                    </tbody>
                                </table>

</p>	




<p align=center>
<table  width=800px border=0 >
<tr>
	<td width=25% ><font  face="arial" size="2px">Tanda Terima</font></td><td colspan=2 rowspan=3 width=50% ></td><td width=25% ><font  face="arial" size="2px">Hormat kami, <br> PT Niko Elektronik</font></td>
</tr>
<tr>
	<td><br><br><br></td><td></td>
</tr>

<tr>
	<td><font  face="arial" size="2px">Nama</font></td><td><font  face="arial" size="2px">Admin</font></td>
</tr>


</table>

</p>	