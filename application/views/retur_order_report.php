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

<p align=center>
<?php //print_r($detailx); 
$caddrx=explode("*",$detailx[0]->caddr);

?>
<table class="gridtablex" border=0 width=800px >
<tr>
<td rowspan=2 colspan=2 width="40%" align=center  ><h2>Retur Order</h2></td><td><b>No Retur</b></td><td><?php echo $detailx[0]->snoso; ?></td>
</tr>
<tr>
<td><b>Tanggal</b></td><td><?php echo date('d-m-Y',strtotime($detailx[0]->stgl)); ?></td>
</tr>
<tr>
<td width="10%" align=left  ><b>Sales</b></td><td width="30%" ><?php //echo $detailx[0]->ssid; ?><?php echo $detailx[0]->sname; ?></td><td width="10%"><b>Alamat</b></td><td rowspan=3 valign=top width=30% ><?php echo $caddrx[1]; ?></td>
</tr>
<tr>
<td width="10%" align=left  ><b>Kode Toko</b></td><td  ><?php echo $detailx[0]->scid; ?></td><td></td>
</tr>
<tr>
<td width="10%" align=left  ><b>Nama Toko</b></td><td  ><?php echo $detailx[0]->cname; ?></td><td></td>
</tr>
</table>
</p>

<div class="gridtable">
<p align=center>
							<?php 
							$freeppn=$detailx[0]->sfreeppn;
							//echo $freeppn; 
							?>
                                <table class="gridtable" width=800 border=1 >
                                    <thead>
                                        <tr>
          
          <th>Kode Product</th>
          <th>Nama Product</th>
          <th>Qty</th>
          <th>Harga</th>
          <th>Discount </th>
		  <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
		$totalqty=0;  
		$total=0;
		$totalppn=0;
		$totalall=0;
		
		foreach($detail as $k => $v) :	
			//print_r($v);
			$sqtyx=$v -> saccept;
			$spricex=$v -> sprice;
			$sdiscx=$v -> sdisc;
			$qtyx=$v -> sqty;
			$subtotal=$sqtyx * ($spricex - ($spricex * $sdiscx/100));
	
    ?>
          <tr>
          
          <td><?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
          <td><?php echo $v -> pname; ?></td>
		  <td align=center ><?php echo $v -> saccept; ?></td>
          <td align=center ><?php echo __get_rupiah($v -> sprice); ?></td>
          <td align=center ><?php echo $v -> sdisc; ?></td>
		  <td align=center > <?php echo __get_rupiah($subtotal); ?> </td>		
		  </tr>
        <?php 
		$accepted= $v -> saccept;
		$total=$subtotal+$total;
		$totalqty=$accepted+$totalqty;
		$totalppn=$total * 10/100;
		if($freeppn==1){
		$totalall= $total;
		}else{
		$totalall= $total + $totalppn;
		}
		endforeach; ?>
		
         <tr>          
          <th>SUB TOTAL</th>
		  <th></th>
          <th><?php echo $totalqty; ?></th>
          <th></th>
          <th></th>
		  
          <th><?php echo __get_rupiah($total); ?></th>
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
          <th><?php echo __get_rupiah($totalall); ?></th>
		 </tr>		 
                                    </tbody>
                                </table>
</p>	
<p align=center>
<table class="gridtablex" border=0 width=800px >
<tr>
<td  width=20% align=left  >CARA BAYAR</td><td align=left width=20%>
						<?php
						// $ccats= $detailx[0]->ccat; 
						// $stypepay=$detailx[0]->stypepay;
						// if($stypepay == "auto"){
						// if($ccats==3){ 	$stype="cash";	}else{ $stype="credit";}
						// }else{ $stype=$stypepay ;}
						?>

<?php //echo $stype; ?></td><td width=20% align=right >CATATAN</td>
<td valign=top  align=left rowspan=2 width=40%><?php echo $detailx[0]->sketerangan; ?></td>
</tr>
<tr>
<td  align=left  >JATUH TEMPO</td><td align=left ><?php echo date('d-m-Y',strtotime($detailx[0]->sduedate)); ?></td><td></td>
</tr>

</table>
</p>

<p align=center>
<table class="gridtable" width=800px >
<tr>
	<th>Admin </th><th>Manager</th><th>Salesman</th><th>Pemesan</th>
</tr>
<tr>
	<td><br><br></td><td></td><td></td><td></td>
</tr>
<tr>
	<td>Admin</td><td>Manager</td><td>Salesman</td><td>Pemesan</td>
</tr>


</table>
</p>	