        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Delivery Order </h2>
                    </div>
                </div>

                <hr />
				<?php 
				$ssisa= $ssisa[0]->sisa;
				if($ssisa >'0'){
				$statusdo="Aktif";
				?>
                <a href="<?php 	echo site_url('sales_order_detail/home/delivery_order_add/'.$id.'/'.$sbid); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Delivery Order</a>
				<?php  }else{$statusdo="DONE";} ?>
                <br />
                <br />
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <?php echo $statusdo;?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Branch</th>
          <th>SO No.</th>
         
          <th>Date</th>
          <th>Sales</th>
          <th>Customer </th>
         
		  <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($sales_order as $k => $v) :
	
		  ?>
                                        <tr>
          <td><?php echo $v -> bname; ?></td>
          <td><?php echo $v -> snoso; ?></td>
         
          <td><?php echo __get_date(strtotime($v -> stgldo),1); ?></td>
          <td><?php echo $v -> sname; ?></td>
          <td><?php echo $v -> cname; ?></td>
          
		
		
		  <td> <?php 
		  if($v -> sno_invoice <>""){
		  ?>
		  <a href="javascript:void(0);" onclick="print_data('<?php echo site_url('sales_order_detail/home/invoice_report/' . $id .'/' . $v -> scid.'/'.$v -> snodo ); ?>', 'Print Invoice');">
		  <i class="icon-book"></i>Invoice</a><br>
		  &nbsp;
		  <a href="<?php echo site_url('sales_order_detail/home/delivery_order_details/' . $id .'/' . $v -> scid.'/'.$v -> snodo ); ?>"><i class="icon-book"></i>Delivery Order</a>
		  <?php
		  }else{
			if($statusdo=="DONE"){ ?>
              <a href="<?php echo site_url('sales_order_detail/home/invoice_order_add/' . $id .'/' . $v -> scid.'/'.$v -> snodo ); ?>"><i class="icon-pencil"></i></a>
			  
			  <a href="<?php echo site_url('sales_order_detail/home/delivery_order_details/' . $id .'/' . $v -> scid.'/'.$v -> snodo ); ?>"><i class="icon-book"></i></a>			  
			  <?php } ?>
			  
			<?php	
			// echo $statusdo;die;
			if($statusdo=="Aktif"){ ?>
			<a href="<?php echo site_url('sales_order_detail/home/invoice_order_add/' . $id .'/' . $v -> scid.'/'.$v -> snodo ); ?>"><i class="icon-pencil"></i></a>
			   
			  <a href="<?php echo site_url('sales_order_detail/home/delivery_order_details/' . $id .'/' . $v -> scid.'/'.$v -> snodo ); ?>"><i class="icon-book"></i></a>
              <a hnopo="<?php echo site_url('sales_order/home/sales_order_delete/' . $v -> sid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
			  <?php } ?>		  
			  

		<?php }?>
          </td>		
		
		
										</tr>
        <?php endforeach; ?>
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
