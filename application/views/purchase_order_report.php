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
<td rowspan=3 colspan=2 width="40%" align=center  ><h3>PENERIMAAN BARANG</h3></td><td></td><td></td>
</tr>
<tr>
<td>Cabang</td><td><?php echo $detailx[0]->bname; ?></td>
</tr>
<tr>
<td>Suplier</td><td><?php echo $detailx[0]->ssname; ?></td>
</tr>
<tr>
<td width="20%" align=left  >No PO</td><td width="30%" ><?php echo $detailx[0]->pnobukti; ?></td><td width="10%">Reff</td><td  valign=top width=30% ><?php echo $detailx[0]->pref; ?></td>
</tr>
<tr>
<td width="20%" align=left  >Kode Sales</td><td  ><?php echo $detailx[0]->sname; ?></td><td width="10%">Gudang</td><td valign=top width=30% ><?php echo $detailx[0]->pgudang; ?></td>
</tr>
<tr>
<td width="20%" align=left  >Tanggal</td><td  ><?php echo $detailx[0]->ptgl; ?></td><td width="10%">Type PO</td><td  valign=top width=30% ><?php echo $detailx[0]->ptype; ?></td>
</tr>
</table>
</p>
<p align=center>






<div class="gridtable">
							<?php 
							//$freeppn=$detailx[0]->sfreeppn;
							//echo $freeppn; 
							?>
 <table class="gridtable" width=800px >
                                    <thead>
                                        <tr>
          
          <th>Kode Product</th>
          <th>Currency</th>
          <th>Qty</th>
          <th>Harga</th>
          <th>Discount </th>
		  <th>Keterangan</th>
          <th>Status</th>
		  <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  
		
		  foreach($detail as $k => $v) :	
	
		  ?>
          <tr>
          
          <td><?php echo $v -> pppid; ?></td>
          <td><?php echo $v -> pcurrency; ?></td>
          <td><?php echo $v -> pqty; ?></td>
          <td><?php echo $v -> pharga; ?></td>
          <td><?php echo $v -> pdisc; ?></td>
		  <td><?php echo $v -> pketerangan; ?></td>
          <td><?php echo $v -> pstatus; ?></td>
		
		
		  <td>
              <a href="<?php echo site_url('purchase_order_detail/home/purchase_order_detail_update/' . $v -> pid); ?>"><i class="icon-pencil"></i></a>
              <a href="<?php echo site_url('purchase_order_detail/home/purchase_order_detail_delete/' . $v -> pid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
          </td>		
		
		
										</tr>
        <?php endforeach; ?>
                                    </tbody>
                               
		
         <tr>          
          <th>SUB TOTAL</th>
		  <th></th>
		  <th></th>
		  <th></th>
          <th><?php // echo $totalqty; ?></th>
          <th></th>
          <th></th>
		  
          <th><?php //echo $total; ?></th>
		 </tr>		
         <tr>          
          <td>PPN</td>
          <td>10%</td>
          <td></td>
		  <td></td>
		  <td></td>
          <td></td>
		  <td></td>
          <td><?php //echo $totalppn; ?></td>
		 </tr>			
         <tr>          
          <td>TOTAL</td>
          <td></td>
		  <td></td>
		  <td></td>
          <td></td>
          <td></td>
		  <td></td>
          <td><?php //echo $totalall; ?></td>
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