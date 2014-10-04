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
<?php //print_r($detailx);?>
<p align=center>
<table class="gridtablex" border=0 width=800px >
<tr>
<td  colspan=4 width="40%" align=center  ><h1>DELIVERY ORDER</h1></td>
</tr>

<tr>
<td width="10%" align=left  >Kepada</td><td width="30%" ><?php echo $detailx[0]->cname; ?></td>
<td width="10%">No DO</td><td  valign=top width=30% ><?php echo $detailx[0]->snodo; ?></td>
</tr>
<tr>
<td width="10%" align=left  >Alamat</td><td  ><?php echo $detailx[0]->caddr; ?></td>
<td width="10%">Tanggal</td><td  valign=top width=30% ><?php echo $detailx[0]->stgldo; ?></td>
</tr>
<tr>
<td width="10%" align=left  >Kode</td><td ><?php echo $detailx[0]->snomor; ?></td>
<td width="10%">No Pol</td><td  valign=top width=30% ><?php echo $detailx[0]->snopol; ?></td>
</tr>
</table>


<table class="gridtablex" border=1 width=800px >


<tr>
<td width="10%" align=left  >Referensi</td><td width="20%" ></td>
<td width="10%">No </td><td  valign=top width=20% ><?php echo $detailx[0]->snodo; ?></td>
<td width="10%">Tanggal </td><td  valign=top width=20% ><?php echo $detailx[0]->stgldo; ?></td>
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
		
         <tr>          <td></td>
          <td>SUB TOTAL</td>
          <td><?php echo $totalqty; ?></td>
          <td></td>
          <td></td>
          <td><?php echo $total; ?></td>
		 </tr>		
         
                                    </tbody>
                                </table>

</p>	




<p align=center>
<table class="gridtable" width=800px >
<tr>
	<th width=25% >Kepala Gudang </th><th width=25% >Security</th><th width=25% >Pengirim</th><th width=25% >Penerima</th>
</tr>
<tr>
	<td><br><br></td><td></td><td></td><td></td>
</tr>

<tr>
	<td></td><td></td><td>Nama</td><td>Nama</td>
</tr>
<tr>
	<td></td><td></td><td>Tanggal</td><td>Tanggal</td>
</tr>

</table>
</p>	