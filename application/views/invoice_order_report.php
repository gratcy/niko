 <?php 
 if(!isset($_POST['xexcel'])){$_POST['xexcel']="";}
 if($_POST['xexcel']=="Excel"){
$filename ="excelreport.xls";
header('Content-type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename='.$filename);
header("Cache-Control: max-age=0");	 
 }
?>

        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
        </script>
		
		<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example2').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
        </script>

 <script>
$(function() {
$("#search").autocomplete({
delay:0, 
cacheLength: 0,
minLength: 1,
    source: '<?php echo site_url('sales_order/home/source'); ?>',
     select: function(event, ui) { 
	    $("#theCid").val(ui.item.cid)	
		
    }
	

})

});
</script>

  <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Report Invoice</h2>
                    </div>
                </div>

                <hr />

                <br />
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
	<?php if($_POST['xexcel']=="Excel"){		}else{ ?>				
						<form method="POST">
						<table>
						<tr><td style="width:150px">Invoice No.</td><td><input size=16 type=text name="sno_invoice" class="form-control"></td><td></td></tr>
						
						<tr><td>Customer</td><td><input size=16 type=text name="scidx" id="search" class="form-control" >
						
						<div style="display: none;">
						<input type="text" name="scid" id="theCid" class="form-control" >
						</div></td><td></td></tr>



						<tr><td>Sales</td><td >
						<select name="ssid" data-placeholder="Sales" class="form-control"  >
						<?php echo $sales; ?>
						</select>
						</td><td></td></tr>
						
						<tr><td>Status</td><td><select name="pstatus" class="form-control">
						<option value="0">ALL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</option>		
						<option value="6">Pending</option>
						<option value="4">Due Date</option>
						<option value="5">Over Date</option>
						<option value="3">Paid</option>
						
						</select>
						</td><td></td></tr>
						<tr><td>Period</td><td>
							<input size=16 type=text name="astgl_invoice" id="example1" class="form-control" value="<?php echo "01".date('/m/Y');?>" style="float:left;width:45%;">
							<div style="float:left;width:10%;text-align:center"> TO </div> 
							<input size=16 type=text name="bstgl_invoice" id="example2" class="form-control" value="<?php echo date('d/m/Y');?>" style="float:left;width:45%;">
						
						</td>
						<td>&nbsp;<input type=submit value="Search" class="btn btn-default btn-grad">&nbsp; <button class="btn btn-default btn-grad" type=submit name="xexcel" value="Excel"><i class="icon-book"></i> Export Excel</button></td>
					</tr>
						</table>
						</form>
 <?php }?>					
						
                          <?php //echo $statusdo;?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <!--th>Branch</th-->
		  <th>Reff No.</th>
          <th>DO No.</th>
		  <th>Invoice No.</th>         
          <th>Invoice Date</th>
		  <th>Customer </th>
          <th>Sales</th>
		  <th>Due Date </th>
		
          <th>Payment </th>		  
          <th>Total </th>
		  <th>Status </th>
		  <th>Payment Date </th>
		  <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  $totaldox=0;
		  
		  //print_r($sales_order);
		  foreach($sales_order as $k => $v) :
		  
		  
	$id=$v -> ssid;
	//if(($v -> sno_invoice <>"")AND($v -> sname<>"")){
		  ?>
                                        <tr>
          <!--td><?php //echo $v -> bname; ?></td-->
		  <td><?php echo $v -> sreff; ?></td>
          <td><?php echo $v -> snodo; ?></td>
          <td><?php echo $v -> sno_invoice; ?></td>
          <td><?php echo __get_date(strtotime($v -> stgl_invoice),1); ?></td>
          <td><?php echo $v -> cname; ?></td>
		  <td><?php echo $v -> sname; ?></td>
          <!--td><?php 
		  $dy=$v->sdur;		  
		  echo date('d/m/Y',strtotime($v -> stgl_invoice ." + $dy day"));
		   ?></td-->
		  
		  <td><?php 

		  echo date('d/m/Y',strtotime($v -> sduedate_invoice)); ?></td>
		  
          <td><?php echo $v ->stypepay;?></td>
		  <td><?php echo number_format($v ->dototal);?></td>
		  <td><?php 
		  
 $now = time(); // or your date as well
     $your_date = strtotime($v -> sduedate_invoice);
     $datediff = $now - $your_date;
     $numberDaysa= floor($datediff/(60*60*24));		  
		  
		  
		  if($v ->pstatus == '3'){ $stt="Paid";
		  
		  //else 
		  //$stt="";
	
 // $now = time(); // or your date as well
     // $your_date = strtotime($v -> sduedate_invoice);
     // $datediff = $now - $your_date;
     // $numberDaysa= floor($datediff/(60*60*24));
}
elseif(($numberDaysa>=-2)&&($numberDaysa<=0)){$stt= "Due Date";}	
else if($numberDaysa>0){ $stt= "<font color=red >Over Date</font>";} elseif(($numberDaysa< -2)){
			  $stt="Pending";
		  }
		  echo $stt;?></td>
		<td><?php 
		if($v->sdate_lunas==""){}else{
		echo date('d/m/Y',strtotime($v->sdate_lunas));}?> </td>
		
		  <td> <?php 
		  if($v -> sno_invoice <>""){
		  ?>
		  <a href="<?php echo site_url('sales_order_detail/home/invoice_report/' . $id .'/' . $v -> scid.'/'.$v -> snodo ); ?>" target="blank" >
		  <i class="icon-print"></i></a>
		  &nbsp;
		  <a href="<?php echo site_url('sales_order_detail/home/delivery_order_details/' . $v -> ssidx .'/' . $v -> scid.'/'.$v -> snodo ); ?>"><i class="icon-book"></i></a>
		  <?php
		  }else{ }?>
          </td>	
		
		
		</tr>
										
    <?php 
	$totaldox=$totaldox+$v ->dototal;
	//}
		endforeach; ?>
		
                                      <tr>
          <!--th>Branch</th-->
          <th>Total</th>
		  <th></th>         
          <th></th>
		  <th></th>
          <th></th>
		  <th> </th>
          <th></th>
		  <th> </th>
          <th><?=number_format($totaldox);?></th>
		  <th> </th>
		  <th> </th>
		  <th></th>
                                        </tr>		
		
		
                                    </tbody>
                                </table>
    <?php //echo $pages; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
       <!--END PAGE CONTENT -->
