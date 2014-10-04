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
<?php //print_r($detailx); ?>
<table class="gridtablex" border=0 width=800px >
<tr>
<td rowspan=2 colspan=2 width="40%" align=center  ><h1>SALES ORDER</h1></td><td>No SO</td><td><?php echo $detailx[0]->snoso; ?></td>
</tr>
<tr>
<td>Tanggal</td><td><?php echo $detailx[0]->stgl; ?></td>
</tr>
<tr>
<td width="20%" align=center  >Kode Sales</td><td width="30%" ><?php echo $detailx[0]->ssid; ?>-<?php echo $detailx[0]->sname; ?></td><td width="10%">Alamat</td><td rowspan=3 valign=top width=30% ><?php echo $detailx[0]->caddr; ?></td>
</tr>
<tr>
<td width="20%" align=center  >Kode Toko</td><td  ><?php echo $detailx[0]->scid; ?></td><td></td>
</tr>
<tr>
<td width="20%" align=center  >Nama Toko</td><td  ><?php echo $detailx[0]->cname; ?></td><td></td>
</tr>
</table>
</p>
<p align=center>






<div class="gridtable">
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
			$sqtyx=$v -> sqty;
			$spricex=$v -> sprice;
			$sdiscx=$v -> sdisc;
			$qtyx=$v -> sqty;
			$subtotal=$sqtyx * ($spricex - ($spricex * $sdiscx/100));
	
    ?>
          <tr>
          
          <td><?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
          <td><?php echo $v -> pname; ?></td>
		  <td><?php echo $v -> sqty; ?></td>
          <td><?php echo $v -> sprice; ?></td>
          <td><?php echo $v -> sdisc; ?></td>
		  <td> <?php echo $subtotal; ?> </td>		
		  </tr>
        <?php 
		$total=$subtotal+$total;
		$totalqty=$qtyx+$totalqty;
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
		  
          <th><?php echo $total; ?></th>
		 </tr>		
         <tr>          
          <td>PPN</td>
          <td>10%</td>
          <td></td>
          <td></td>
		  <td></td>
          <td><?php echo $totalppn; ?></td>
		 </tr>			
         <tr>          
          <td>TOTAL</td>
          <td></td>
          <td></td>
          <td></td>
		  <td></td>
          <td><?php echo $totalall; ?></td>
		 </tr>		 
                                    </tbody>
                                </table>


















</p>	


<p align=center>
<table class="gridtablex" border=0 width=800px >
<tr>
<td  width=20% align=left  >CARA BAYAR</td><td align=left width=20%><?php echo $detailx[0]->stypepay; ?></td><td width=20% align=right >CATATAN</td>
<td valign=top  align=left rowspan=2 width=40%><?php echo $detailx[0]->sketerangan; ?></td>
</tr>
<tr>
<td  align=left  >JATUH TEMPO</td><td align=left ><?php echo $detailx[0]->sduedate; ?></td><td></td>
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