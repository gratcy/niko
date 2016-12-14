   
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

<form method="POST" action="?search=1" class="form-horizontal" >
						<input  name="cid" type="hidden" id="theCid" />
						<div class="row">
							<div class="col-lg-8">
								<div class="form-group">
									<div class="col-lg-6">
										Customer <input name="cname" type="text" id="search" class="form-control" />
								</div>
								<div class="col-lg-2"><br>
									
								</div>
							</div>
							</div>
						</div>

					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<div class="col-lg-6">
									Invoice No.<input type="text" name="sno_invoice" class="form-control"  >
								</div>

							</div>
						</div>
					</div>						

					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<div class="col-lg-6">
									Reff No.<input type="text" name="sreff" class="form-control"  >
								</div>
								<div class="col-lg-2"><br>
									
								</div>
							</div>
						</div>
					</div>
			 
					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<div class="col-lg-6">
								   Status<select name="sisa" class="form-control">
								   <option value="x">ALL</option>
								   <option value="1">Paid</option>
								   <option value="0">Pending</option>
								   </select>
								</div>
								<div class="col-lg-2">
									<br>
									<input type="submit" value="Search" class="btn btn-default btn-grad">
								</div>
							</div>
						</div>
					</div>
				</form>
					<br />

			
					<br />
				
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Invoice Order
				<div class="searchTable">
                <form action="<?php echo current_url();?>" method="post">
					<div class="sLeft"><input type="text" placeholder="<?php echo ($keyword == '' ? 'Search !!!' : $keyword)?>" name="keyword" class="form-control" autocomplete="off" /></div>
					<div class="sRight"><button class="btn text-muted text-center btn-danger" type="submit">Go</button></div>
                        <span id="sg1"></span>
                </form>
                </div>
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
          <td><?php echo $v -> sreff; ?></td>
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
          <td><?php echo ucfirst($v ->stypepay);?></td>
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
