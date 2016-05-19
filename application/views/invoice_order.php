   
<script>
$(function() {
$("#search").autocomplete({
delay:0, 
cacheLength: 0,
minLength: 1,
    source: '<?php echo site_url('sales_order/home/source'); ?>',
     select: function(event, ui) { 
	    $("#theCid").val(ui.item.cid),
        $("#theCat").val(ui.item.ccat),
		$("#theClimit").val(ui.item.climit),
		$("#theClimitx").val(formatharga2(ui.item.climit)),
		$("#theNpwp").val(ui.item.cnpwp),
		$("#theDeliver").val(ui.item.cdeliver),
		$("#theTopcash").val(ui.item.ccash),
		$("#theTopcredit").val(ui.item.ccredit),
		$("#theTopcashx").val(ui.item.ccash),
		$("#theTopcashxnico").val(ui.item.ccashnico),
		$("#theTopcreditx").val(ui.item.ccredit),
		$("#theTopcreditxnico").val(ui.item.ccreditnico),
		$("#theAddr").val(ui.item.caddr),
		$("#thePkp").val(ui.item.cpkp),
		$("#theSid").val(ui.item.csid),
		$("#theSname").val(ui.item.csname),
		$("#thePhone").val(ui.item.cphone),
		$("#theTopx").val(ui.item.topx),
		$("#theTopxx").val(ui.item.topx)
	
		
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

				<div class="row">
			<div class="col-lg-12">
				<form method="POST"  action="?search=1" >
			   Customer					<input  name=cname type="text" id="search"   />

					<input  name=cid type="hidden" id="theCid"    />
			   <input type=submit value=cari >
			   </form>
			   </div>
            </div><br>

			<div class="row">
			<div class="col-lg-12">
				<form method="POST" action="?search=1" >
			   Inv No.<input type=text name="sno_invoice"  >
			   <input type=submit value=cari >
			   </form>
			   </div>
            </div><br>			
			


			<div class="row">
			<div class="col-lg-12">
				<form method=POST action="?search=1" >
			   Status<select name=sisa >
			   <option value="x">ALL</option>
			   <option value="1">Paid</option>
			   <option value="0">Pending</option>
			   <input type=submit value=cari >
			   </form>
			   </div>
            </div><br>			
				
                <br />
				
				
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <?php //echo $statusdo;?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <!--th>Branch</th-->
          <th>DO No.</th>
		  <th>Inv No.</th>         
          <th>Inv Date</th>
		  <th>Customer </th>
          <th>Sales</th>
		  <th>Due Date </th>
          <th>Payment </th>
          <th>Total </th>
		  <th>Status </th>
		  <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  // echo '<pre>';
		  // print_r($sales_order);
		  // echo '</pre>';
		  foreach($sales_order as $k => $v) :
	$id=$v -> ssid;
	//if($v -> sno_invoice <>""){
		  ?>
                                        <tr>
          <!--td><?php //echo $v -> bname; ?></td-->
          <td><?php echo $v -> snodo; ?></td>
          <td><?php echo $v -> sno_invoice; ?></td>
          <td><?php echo __get_date(strtotime($v -> stgl_invoice),1); ?></td>
          <td><?php echo $v -> cname; ?></td>
		  <td><?php echo $v -> sname; ?></td>
          <td><?php 
		   $dy=$v->sdur;
		  //echo __get_date(strtotime($v -> stgl_invoice),1); 
		  echo date('d/m/Y',strtotime($v -> stgl_invoice ." + $dy day"));
		  ?>
		  
		  
		  
  
		  
		  
		  
		  
		  
		  
		  
		  </td>
          <td><?php echo $v ->stypepay;?></td>
		  <td><?php echo number_format($v ->dototal);?></td>
		  <td><?php 
		  if($v ->pstatus == '3'){ $stt="Paid";}else{ $stt="Pending";}
		  echo $stt;?></td>
		
		
		  <td> <?php 
		  if($v -> sno_invoice <>""){
		  ?>
		  <a href="<?php echo site_url('sales_order_detail/home/invoice_report/' . $id .'/' . $v -> scid.'/'.$v -> snodo ); ?>" target="blank" >
		  <i class="icon-print"></i></a>
		  &nbsp;
		  <a href="<?php echo site_url('sales_order_detail/home/delivery_order_details/' . $id .'/' . $v -> scid.'/'.$v -> snodo ); ?>"><i class="icon-book"></i></a>
		  <?php
		  }else{ }?>
          </td>		
		
		</tr>
										
    <?php 
//	}
		endforeach; ?>
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
