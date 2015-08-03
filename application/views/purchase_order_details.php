
        <!-- Load jQuery and bootstrap datepicker scripts -->
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
    
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
              
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Purchase Order Add</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('purchase_order_detail/home/purchase_order_detail_add'); ?>" method="post">
<p align=center><table width=800 ><tr><td>
<?php  //print_r($detailx);?>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Branch</label>

                    <div class="col-lg-4">	
					<input type=text value="<?php echo $detailx[0]->bname; ?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Type PO</label>

                    <div class="col-lg-4">	
					<input type=text value="<?php echo $detailx[0]->ptype; ?>" class="form-control" disabled>
                    </div>
                </div>				
				
 
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Bukti No.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->pnobukti; ?>" class="form-control" disabled>
                    </div>
                </div>
				
				
	</td><td>			



                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Ref</label>

                    <div class="col-lg-4">
                       <input type=text value="<?php echo $detailx[0]->pref; ?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $detailx[0]->ptgl; ?>" class="form-control" disabled>
                    </div>
       					
					
                </div>

                

				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Address</label>

                    <div class="col-lg-4">
						<input type=text value="<?php echo $detailx[0]->pgudang; ?>" class="form-control" disabled>
                    </div>
                </div>       
				
				</td></tr>
				
				
	<?php 
		  if($detailx[0]->pstatus==0){
		  $postatus= "Cancel";
		  }elseif($detailx[0]->pstatus==1){
		  $postatus= "Active";
		  }elseif($detailx[0]->pstatus==2){
		  $postatus= "Delete";
		  }elseif($detailx[0]->pstatus==3){
		  $postatus= "Approve";
		  }elseif($detailx[0]->pstatus==4){
		  $postatus= "Done";
		  }
		  //echo $postatus; 
		  
?>					
				
				
				
				<tr><td>
				
		        <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Status</label>

                    <div class="col-lg-4">
						<input type=text value="<?php echo $postatus; ?>" class="form-control" disabled>
                    </div>
                </div>		
				</td></tr>
				
				
				
				
				
				
				
				
				</table></p>
				
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>

				</div>
            </form>

	
	
			
		<?php if($detailx[0]->pstatus<'3'){ ?>			
		<a href= "<?php echo site_url('purchase_order/home/purchase_order_update/' . $id); ?>" ><button class="btn text-muted text-center btn-primary" type="submit">EDIT</button></a>	
		<a href= "<?php echo site_url('purchase_order_detail/home/purchase_order_detail_add/' . $id); ?>" ><button class="btn text-muted text-center btn-danger" type="submit">ADD ITEM</button></a>
		<?php }?>
        </div>
    </div>
</div>










  <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
          <th>Product Name</th>
          <th>Currency</th>
          <th>Qty</th>
          <th>Price</th>
          <th>Discount </th>
		  <th>Description</th>
          <th>Status</th>
		  <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  
		
		  foreach($detail as $k => $v) :	
	
		  ?>
          <tr>
          
          <td><?php echo $v -> pname; ?></td>
          <td><?php echo $v -> pcurrency; ?></td>
          <td><?php echo $v -> pqty; ?></td>
          <td><?php echo __get_rupiah($v -> pharga); ?></td>
          <td><?php echo $v -> pdisc; ?></td>
		  <td><?php echo $v -> pketerangan; ?></td>
          <td><?php 
		  if($v -> pstatus==0){
		  $status= "Cancel";
		  }elseif($v -> pstatus==1){
		  $status= "Active";
		  }elseif($v -> pstatus==2){
		  $status= "Delete";
		  }elseif($v -> pstatus==3){
		  $status= "Approve";
		  }elseif($v -> pstatus==4){
		  $status= "Done";
		  }
		  echo $status; ?></td>
		
		
		  <td>
		  <?php if($detailx[0]->pstatus<'3'){ ?>
             
              <a href="<?php echo site_url('purchase_order_detail/home/purchase_order_detail_delete/' . $v -> pid .'/'.$id); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
			<?php }else { echo "DONE";}?>  
          </td>		
		
		
										</tr>
        <?php endforeach; ?>
                                    </tbody>
                                </table>
								
		<?php if($detailx[0]->pstatus<'3'){ ?>
		<a href= "<?php echo site_url('purchase_order/home/purchase_order_approve/' . $id); ?>" ><button class="btn text-muted text-center btn-primary" type="submit">APPROVED</button></a> &nbsp;

		<a href= "<?php echo site_url('purchase_order/home/purchase_order_cancel/' . $id); ?>" ><button class="btn text-muted text-center btn-primary" type="submit">CANCEL</button></a> &nbsp;
		
		<?php }elseif($detailx[0]->pstatus=='3'){ ?>
		<a href= "<?php echo site_url('purchase_order_detail/home/purchase_order_report/' . $id); ?>" ><button class="btn text-muted text-center btn-danger" type="submit">CETAK PO</button></a>											
								
    <?php } ?>
                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
