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
<table class="gridtablex" border=0 width=90% align=center >
<tr>
<td rowspan=2 colspan=6  align=center  >
<h2>SALES ORDER</h2></td>
</tr>
<tr>
<td></td><td></td>
</tr>

<tr>
<td width="10%" align=left  ><b>SO No.</b></td><td width="30%" ><?php //echo $detailx[0]->ssid; ?><?php echo $detailx[0]->snoso; ?></td><td width="10%"></td><td rowspan=3 valign=top width=30% ></td>
</tr>
<tr>

<tr>
<td width="10%" align=left  ><b>Date</b></td><td width="30%" ><?php echo date('d-m-Y',strtotime($detailx[0]->stgl)); ?><?php //echo $detailx[0]->sname; ?></td><td width="10%"></td><td rowspan=3 valign=top width=30% ></td>
</tr>
<tr>
<tr>
<td width="10%" align=left  ><b>Customer</b></td><td  ><?php echo $detailx[0]->cname; ?></td><td></td>
</tr>
<td width="10%" align=left  ><b>Sales</b></td><td width="30%" ><?php //echo $detailx[0]->ssid; ?><?php echo $detailx[0]->sname; ?></td><td width="10%"></td><td rowspan=3 valign=top width=30% ></td>
</tr>
<tr>


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
          
          <th>Code</th>
          <th>Name</th>
          <th>Qty/Pcs</th>
          <th>Price</th>
          <th>Discount </th>
		  <th>Total</th>
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
			if($freeppn==1){
			$spricex=$v -> sprice/1.1;
			}else{
			$spricex=$v -> sprice;	
			}	
			$sdiscx=$v -> sdisc;
			$qtyx=$v -> sqty;
			$subtotal=$sqtyx * ($spricex - ($spricex * $sdiscx/100));
	
    ?>
          <tr>
          
          <td><?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
          <td><?php echo $v -> pname; ?></td>
		  <td align=center ><?php echo $v -> sqty; ?></td>
          <td align=right ><?php echo __get_rupiah($spricex); ?></td>
          <td align=center ><?php echo $v -> sdisc; ?></td>
		  <td align=right > <?php echo __get_rupiah($subtotal); ?> </td>		
		  </tr>
        <?php 
		$total=$subtotal+$total;
		$totalqty=$qtyx+$totalqty;
		$totalppn=$total * 10/100;
		if($freeppn==0){
		$totalall= $total;
		}else{
		$totalall= $total + $totalppn;
		}
		endforeach; ?>
		
         <tr>          
          <th>SUB TOTAL</th>
		  <th></th>
          <th ><?php echo $totalqty; ?></th>
          <th></th>
          <th></th>
		  
          <th align=right ><?php echo __get_rupiah($total); ?></th>
		 </tr>		
         <tr>          
          <td align=center >PPN</td>
          <td align=center ><?php if($freeppn==1){ echo 10;}else{echo 0;}?>%</td>
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
          <th align=right ><?php echo __get_rupiah($totalall); ?></th>
		 </tr>		 
                                    </tbody>
                                </table>
</p>	
<p align=center>
<table class="gridtablex" border=0 width=800px >
<tr>
<td  width=20% align=left  ><b>TERM OF PAYMENT</b></td><td align=left width=20%>
						<?php
						$ccats= $detailx[0]->ccat; 
						$stypepay=$detailx[0]->stypepay;
						if($stypepay == "auto"){
						if($ccats==3){ 	$stype="CASH";	}else{ $stype="CREDIT";}
						}else{ $stype=$stypepay ;}
						?>

<?php echo strtoupper($stype); ?></td><td width=20% align=right ><b>NOTES</b></td>
<td valign=top  align=left rowspan=2 width=40%><?php echo $detailx[0]->sketerangan; ?></td>
</tr>
<tr>
<td  align=left  ><b>DUE DATE</b></td><td align=left ><?php echo date('d-m-Y',strtotime($detailx[0]->sduedate)); ?></td><td></td>
</tr>

</table>
</p>

<p align=center>
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
