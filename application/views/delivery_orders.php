 
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
                        <h2>Delivery Order </h2>
						
						
                    </div>
                </div>

                <hr />			
			 	
				
			<div class="row">
			<div class="col-lg-12">
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
								   <option value="1">Active</option>
								   <option value="0">Done</option>
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
			   </div>
            </div><br>
			
               
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Delivery Order
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
        
          <th>Reff No.</th>
		  <th>SO No.</th>
          <th>Date</th>
          <th>Customer</th>
          <th>Sales </th>      
		  <th>Status</th>
		  <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($sales_order as $k => $v) :
	      $sisa= $v->sisa;
		  
		  
		  		if(!isset($_POST['sisa'])){ $_POST['sisa']="x";}
if($sisa==0){ $statt="Done";}else{ $statt="Active"; }
		 
			?>  
			  
			   <tr>
         
          <td><?php echo $v -> sreff; ?></td>
		  <td><?php echo $v -> snoso; ?></td>
          <td><?php echo __get_date(strtotime($v -> stgl),1); ?></td>
          <td><?php echo $v -> cname; ?></td>
          <td><?php echo $v -> sname; ?></td>
         
		  <td><?php echo $statt; ?></td>
		
		  <td>
              
			  <a href="<?php echo site_url('delivery_order/home/delivery_order_sub/' . $v -> ssid .'/' . $v -> scid ); ?>"><i class="icon-book"></i></a>
          </td>		
		
		
										</tr>
			  
			
        <?php 
		  
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
