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
<td rowspan=1 colspan=6 width="40%" align="center"><h1>RETURN ORDER</h1></td>
</tr>
</table>
<table class="gridtablex" width=800px >
<tr>
	<td width=20% ><b>Return No.</b></td><td width=90% align=left ><?php echo $detailx[0]->snoro; ?></td><td width=50%>&nbsp;</td>
</tr>
<tr>
<td><b>Date</b></td><td><?php echo date('d/m/Y',strtotime($detailx[0]->stgl)); ?></td>
</tr>
<tr>
<td width="10%" align=left><b>Customer</b></td><td  ><?php echo $detailx[0]->cname; ?></td><td></td>
</tr>

<tr>
<td width="10%" align=left><b>Sales</b></td><td  ><?php echo $detailx[0]->sname; ?></td><td></td>
</tr>
	<?php 
		
		$ccats= $detailx[0] ->ctyperetur; 
		if($ccats==0){
			$cname="Tukar Barang";
		}elseif($ccats==1){
			$cname="Potong Piutang";
		}

		?>	
<tr>
<td width="10%" align=left><b>Return Type</b></td><td  ><?php echo $cname; ?></td><td></td>
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
          
          <th width=15% >Code</th>
          <th>Name</th>
          <th>Qty/Pcs</th>
          <th>Accept</th>
          <th>Reject</th>
          <th>Price</th>
          <th>Total </th>
		  <th>Notes</th>
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
		  <td align=center ><?php echo $v -> sqty; ?></td>
		  <td align=center ><?php echo $v -> saccept; ?></td>
		  <td align=center ><?php echo $v -> sreject; ?></td>
          <td align=center ><?php echo __get_rupiah($v -> sprice); ?></td>
          <td align=center ><?php echo __get_rupiah($v -> sprice*$v -> saccept); ?></td>
		  <td align=center > <?php echo $v -> note; ?> </td>		
		  </tr>
        <?php 
		$accepted= $v -> saccept;
		$total=$subtotal+$total;
		$totalqty=$accepted+$totalqty;
		$totalppn=$total * 10/100;
		$totalall += ($v -> sprice*$v -> saccept);
		endforeach; ?>
			
         <tr>          
          <th>TOTAL</th>
          <th></th>
          <th></th>
          <th></th>
		  <th></th>
		  <th></th>
          <th><?php echo __get_rupiah($totalall); ?></th>
		  <th></th>
		 </tr>		 
                                    </tbody>
                                </table>
</p>	

<p align=center><br>
<table class="gridtable" width=800px >
<tr>
	<th width="25%">SALES </th><th width="25%">ADMIN 1</th><th width="25%">ADMIN 2</th><th width="25%" >CUSTOMER</th>
</tr>
<tr>
	<td><br><br></td><td></td><td></td><td></td>
</tr>
<tr>
	<td></td><td></td><td></td><td></td>
</tr>


</table>
</p>	
