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
<td rowspan=3 colspan=2 width="40%" align=center  ><h3>RECEIVABLE ITEM</h3></td><td></td><td></td>
</tr>
<tr>
<td><b>Branch</b></td><td><?php echo $detailx[0]->bname; ?></td>
</tr>
<tr>
<td></td><td></td>
</tr>
<tr>
<td width="10%" align=left  ><b>No PO</b></td><td width="40%" align="left" ><?php echo $detailx[0]->pnobukti; ?></td><td width="10%"><b>Reff</b></td><td  valign=top width=30% ><?php echo $detailx[0]->pref; ?></td>
</tr>
<tr>
<td width="10%" align="left" ><b>Date</b></td><td width=30%  ><?php echo date('d/m/Y',strtotime($detailx[0]->ptgl)); ?></td><td width="10%"><b>Address</b></td><td valign=top  ><?php echo $detailx[0]->pgudang; ?></td>
</tr>
<tr>
<td width="20%" align=left  ></td><td  ></td><td width="10%"></td><td  valign=top width=30% ></td>
</tr>
</table>
</p>

<div class="gridtable">
<p align=center>
 <table class="gridtable" width=800px >
                                    <thead>
                                        <tr>
          
          <th>Product</th>
          <th>Currency</th>
          <th>Qty</th>
          <th>Price</th>       
		  <th>Total </th>
		  

                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  $total=0;
		  $totalPrice=0;
		  $totqty=0;
		  foreach($detail as $k => $v) :	
		  $total= ($v -> pPrice* $v -> pqty)-($v -> pPrice * $v -> pdisc *0.01 * $v -> pqty );
		  ?>
          <tr>
          
          <td><?php echo $v -> pname; ?></td>
          <td><?php echo $v -> pcurrency; ?></td>
          <td><?php echo $v -> pqty; ?></td>
          <td><?php echo __get_rupiah($v -> pPrice); ?></td>        
		  <td><?php echo __get_rupiah($total); ?></td>
		  


		
		
										</tr>
        <?php 
		$totqty=$v -> pqty+$totqty;
		$totalPrice=$total+$totalPrice;
		endforeach; ?>
                                    </tbody>
                               
		
         <tr>          
          <td>SUB TOTAL</td>
		  <td></td>
		  <td></td>
		  <td></td>         
       
          <td><?php echo __get_rupiah($totalPrice); ?></td>	          
		 </tr>		
         <tr>          
          <td>PPN</td>
          <td>10%</td>
          <td></td>
		  <td></td>
		  <td></td>               
		 </tr>			
         <tr>          
          <th>TOTAL</th>
          <th></th>
		  <th><?php echo $totqty;?></th>
		  <th></th>        
		  <th><?php echo __get_rupiah($totalPrice); ?></th>
          
		 </tr>		 
                                    </tbody>
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
