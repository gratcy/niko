        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Delivery Order </h2>
                    </div>
                </div>

                <hr />
				<?php //if (__get_roles('DeliveryOrderExecute')) : ?>
				<?php 
				$statusdo="Aktif";
				//echo '-----------------------'.$ssisa[0]->sisa;
				$ssisa= $ssisa[0]->sisa;
				if($ssisa >'0'){
				// $statusdo="Aktif";
				?>
                <a href="<?php 	echo site_url('sales_order_detail/home/delivery_order_add_tg/'.$id.'/'.$sbid); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Delivery Order</a>
				<?php  }else{$statusdo="DONE";} ?>
				<?php //endif; ?>
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
          <!--th>Branch</th-->
          <th>DO No.</th>
         
          <th>Date</th>
          <th>Sales</th>
          <th>Customer </th>
         
		  <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  // echo '<pre>';
		  // print_r($sales_order);die;
		  foreach($sales_order as $k => $v) :
	
		  ?>
                                        <tr>
          <!--td><?php //echo $v -> bname; ?></td-->
          <td><?php echo $v -> snodo; ?></td>
         
          <td><?php echo __get_date(strtotime($v -> stgldo),1); ?></td>
          <td><?php echo $snamex; ?></td>
          <td><?php echo $v -> cname; ?></td>
          
		
		
		  <td> <?php 
		  if($v -> sno_invoice <> ""){
		  ?>
		  <a href="<?php echo site_url('sales_order_detail/home/invoice_report/' . $id .'/' . $v -> scid.'/'.$v -> snodo ); ?>" target="blank" >
		  <i class="icon-print"></i></a>
		  &nbsp;
		  <a href="<?php echo site_url('sales_order_detail/home/delivery_order_details/' . $id .'/' . $v -> scid.'/'.$v -> snodo ); ?>"><i class="icon-book"></i></a>
		  <?php
		  }
		  else {
		  ?>
		
			 <a href="<?php echo site_url('sales_order_detail/home/delivery_order_details_tg/' . $id .'/' . $v -> scid.'/'.$v -> snodo ); ?>"><i class="icon-book"></i></a>
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
