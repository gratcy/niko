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
$caddr=explode("*",$detailx[0]->caddr);
$drv=explode("-",$detailx[0]->driver);
?>
<p align=center>
<table class="gridtablex" border=0 width=800px >
<tr>
<td colspan="4" width="40%" align="center"><h1>DELIVERY ORDER</h1></td>
</tr>
</table>
<div style="width:800px;margin:0 auto;">
<table class="gridtablex" border=0 width="500px" style="float:left;">
<tr><td><b>DO No.</b></td><td><?php echo $detailx[0]->snodo; ?></td></tr>
<tr><td><b>Date</b></td><td><?php echo __get_date(strtotime($detailx[0]->stgldo)); ?></td></tr>
<tr><td><b>Customer</b></td><td><?php echo $detailx[0]->cname; ?></td></tr>
<tr><td><b>Address</b></td><td><?php echo trim($caddr[0]).' , '.$detailx[0]->ccity; ?></td></tr>
</table>

<table class="gridtablex" border=0 width="300px" style="float:right;">
<tr><td><b>Sales</b></td><td><?php echo $detailx[0]->sname; ?></td></tr>
<tr><td><b>Driver</b></td><td><?php echo $drv[0]; ?></td></tr>
<tr><td><b>A. Driver</b></td><td><?php echo $drv[1]; ?></td></tr>
<tr><td><b>Car No.</b></td><td><?php echo $detailx[0]->snopol; ?></td></tr>
</table>
</div>
<div style="clear:both;"></div>
</p>
<p align="center" style="padding-top:10px;">



<?php 
							$freeppn=$detailx[0]->sfreeppn;
							//echo $freeppn; 
							?>
                                <table class="gridtable" width=800 >
                                    <thead>
                                        <tr>
          
          <th width="20%">Code</th>
          <th>Name</th>
		  <th width="20%">Qty/Coly</th>
          <th width="20%">Qty/Pcs</th>

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

			$qtyx=$v -> sqty;
           if($v -> sqty>0){
	
    ?>
          <tr>
          
          <td><?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
		  <td><?php echo $v -> pname; ?></td>
		  <td><?php echo $v -> sqty/$v -> pvolume; ?></td>
          <td align=center ><?php echo $v -> sqty; ?></td>
	
		  </tr>
        <?php 
		   }
		$totalqty=$qtyx+$totalqty;

		endforeach; ?>
		
         <tr>          <th>TOTAL</th>
          <th></th>
		  <th></th>
          <th><?php echo $totalqty; ?></th>

		 </tr>		
         
                                    </tbody>
                                </table>

</p>	

<br />
<p align=center>
<table class="gridtable" width=800px >
<tr>
	<th width=20% >H. WAREHOUSE </th><th width=20% >A. WAREHOUSE</th><th width=20% >DRIVER</th><th width=20% >A. DRIVER</th><th width=20% >CUSTOMER</th>
</tr>
<tr>
	<td><br><br></td><td></td><td></td><td></td><td></td>
</tr>

<tr>
	<td></td><td></td><td></td><td></td><td></td>
</tr>

</table>
</p>	
