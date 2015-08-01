        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Delivery Order </h2>
                    </div>
                </div>

                <hr />

               
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
          <th>Branch</th>
          <th>SO No.</th>
          <th>Date</th>
          <th>Sales</th>
          <th>Customer </th>
          <th>Description</th>
		  <th>Status</th>
		  <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($sales_order as $k => $v) :
	      $sisa= $v->sisa;
		  if($sisa==0){ $statt="DONE";}else{ $statt="AKTIF"; }
		  ?>
                                        <tr>
          <td><?php echo $v -> bname; ?></td>
          <td><?php echo $v -> snoso; ?></td>
          <td><?php echo __get_date(strtotime($v -> stgl),1); ?></td>
          <td><?php echo $v -> sname; ?></td>
          <td><?php echo $v -> cname; ?></td>
          <td><?php echo $v -> sketerangan; ?></td>
		  <td><?php echo $statt; ?></td>
		
		  <td>
              
			  <a href="<?php echo site_url('delivery_order/home/delivery_order_sub/' . $v -> sid .'/' . $v -> scid ); ?>"><i class="icon-book"></i></a>
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
