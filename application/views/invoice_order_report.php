 <?php 
 if(!isset($_POST['xexcel'])){$_POST['xexcel']="";}
 if($_POST['xexcel']=="Excel"){
$filename ="excelreport.xls";
header('Content-type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename='.$filename);
header("Cache-Control: max-age=0");	 
 }
?>

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
                        <h2>Invoice Order </h2>
                    </div>
                </div>

                <hr />

                <br />
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
 <?php if($_POST['xexcel']=="Excel"){		}else{?>				
						<form method="POST">
						<table>
						<tr><td>No Invoice</td><td><div class="col-lg-5"><input type=text name="sno_invoice"></div></td></tr>
						<tr><td>Sales</td><td ><div class="col-lg-8">
						<select name="ssid" data-placeholder="Sales" ><?php echo $sales; ?></select>
                    </div></td></tr>
						<tr><td>Customer</td><td><div class="col-lg-5"><input type=text name="scidx" id="search" ></div>
						
						<div style="display: none;">
						<input type="text" name="scid" id="theCid" >
						</div></td></tr>
						<tr><td>Status</td><td><div class="col-lg-5"><select name="pstatus">
						<option value="0">Pending</option>
						<option value="3">Paid</option>
						<option value="4">Due date</option>
						<option value="5">Over date</option>
						</select></div>
						</td></tr>
						<tr><td>Period</td><td><input type=text name="astgl_invoice">&nbsp;&nbsp; TO &nbsp;&nbsp; <input type=text name="bstgl_invoice">
						
						</td></tr>
						<tr><td><input type=submit value="Search"> <input type=submit name="xexcel" value="Excel"></td></tr>
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
		  <th>Inv No.</th>         
          <th>Inv Date</th>
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
		  if($v ->pstatus == '3'){ $stt="Paid";}
		  else{ 
		  $stt="Pending";
	
 $now = time(); // or your date as well
     $your_date = strtotime($v -> sduedate_invoice);
     $datediff = $now - $your_date;
     $numberDaysa= floor($datediff/(60*60*24));

if(($numberDaysa>=-2)&&($numberDaysa<=0)){$stt= "DUE DATE";}	
else if($numberDaysa>0){ $stt= "OVER DATE";}
		  }
		  echo $stt;?></td>
		<td><?=$v->sdate_lunas;?> </td>
		
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
          <th><?=number_format($totaldox);?></th>
		  <th> </th>
		  <th></th>
                                        </tr>		
		
		
                                    </tbody>
                                </table>
    <?php echo $pages; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
       <!--END PAGE CONTENT -->
