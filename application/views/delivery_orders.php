        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Delivery Order </h2>
                    </div>
                </div>

                <hr />
                <a href="<?php echo site_url('sales_order/home/sales_order_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Delivery Order</a>
                <br />
                <br />
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Delivery Order
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Cabang</th>
          <th>No so</th>
          <th>Type</th>
          <th>Tanggal</th>
          <th>Sales</th>
          <th>Customer </th>
          <th>Keterangan</th>
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
          <td><?php echo $v -> stype; ?></td>
          <td><?php echo $v -> stgl; ?></td>
          <td><?php echo $v -> sname; ?></td>
          <td><?php echo $v -> cname; ?></td>
          <td><?php echo $v -> sketerangan; ?></td>
		
		
		  <td>
              <a href="<?php //echo site_url('sales_order/home/sales_order_update/' . $v -> sid); ?>"><i class="icon-pencil"></i></a>
			  <a href="<?php echo site_url('sales_order_detail/home/delivery_order_details/' . $v -> sid .'/' . $v -> scid ); ?>"><i class="icon-book"></i></a>
              <a hnopo="<?php echo site_url('sales_order/home/sales_order_delete/' . $v -> sid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
