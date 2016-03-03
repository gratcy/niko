<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
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
<!-- Table goes in the document BODY -->

<p align=center>
<?php //print_r($detailx); 
$caddrx=explode("*",$detailx[0]->caddr);

?>
<table class="gridtablex" border=0 width=900 align=center >
<tr>
<td rowspan=2 colspan=6  align=center  >
<h1>SALES ORDER</h1></td>
</tr>
<tr>
<td></td><td></td>
</tr>







<tr>
<td width="10%" align=left  ><b>Reff No.</b></td><td width="30%" ><?php //echo $detailx[0]->ssid; ?><?php echo $detailx[0]->sreff; ?></td><td width="10%"></td><td valign=top width=30% ></td>
</tr>


<tr>
<td width="10%" align=left  ><b>SO No.</b></td><td width="30%" ><?php //echo $detailx[0]->ssid; ?><?php echo $detailx[0]->snoso; ?></td><td width="10%"></td><td rowspan=3 valign=top width=30% ></td>


<td  width=20% align=left  ><b>Term Of Payment</b></td><td align=left width=20%>
						<?php
						$ccats= $detailx[0]->ccat; 
						$stypepay=$detailx[0]->stypepay;
						if($stypepay == "auto"){
						if($ccats==3){ 	$stype="Cash";	}else{ $stype="Credit";}
						}else{ $stype=$stypepay ;}
						?>

<?php echo ucwords($stype); ?></td>

</tr>
<tr>

<tr>
<td width="10%" align=left  ><b>Date</b></td><td width="30%" ><?php echo date('d/m/Y',strtotime($detailx[0]->stgl)); ?></td><td width="10%"></td>
<td  align=left  ><b>Expiry Date</b></td><td align=left ><?php echo date('d/m/Y',strtotime($detailx[0]->sduedate)); ?></td>
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
                                <table class="gridtable" width=900 border=1 >
                                    <thead>
                                        <tr>
          
          <th width=11% >Code</th>
          <th width=35% >Name</th>
          <th width=10 >Qty/ Coly</th>
	  <th width=10 >Qty/ Pcs</th>
          <th width=9% >Normal Price</th>
          <th>Promo Discount </th>
		  <th>Payment Discount </th>
		  <th width=10% >Net Price </th>
		  <th width=16% >Total</th>
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
			$spricex=$v -> sprice;
			}else{
			$spricex=$v -> sprice;	
			}	
			$sdiscx=$v -> sdisc;
			$qtyx=$v -> sqty;
			$subtotal=$sqtyx * ($spricex - ($spricex * $sdiscx/100));

			$subtotal=$sqtyx * ($spricex - ($spricex * $sdiscx/100));
			
			$colyy=number_format(($v -> sqty/$v -> pvolume),2);
	
			$colyyx= str_replace('.00','',$colyy);
				

			
    ?>
          <tr>
          
          <td><?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
          <td><?php echo $v -> pname; ?></td>
		  <td><?php echo $colyyx; ?></td>
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
		  <th></th>
          <th ><?php echo $totalqty; ?></th>
          <th></th>
          <th></th>
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
          <th align=right ><?php echo __get_rupiah($totalall); ?></th>
		 </tr>		 
                                    </tbody>
                                </table>
</p>	


<p align=center>
<table class="gridtable" width=900px >
<tr>
	<th width="25%" valign=top >SALES <br><br><br><br><br></th><th width="25%" valign=top >ADMIN 1</th><th width="25%" valign=top  >ADMIN 2</th><th width="25%" valign=top  >CUSTOMER</th>
</tr>




</table>
</p>	
