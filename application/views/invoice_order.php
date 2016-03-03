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
          <td><?php echo __get_date(strtotime($v -> stgldo),1); ?></td>
          <td><?php echo $v -> cname; ?></td>
		  <td><?php echo $v -> sname; ?></td>
          <td><?php echo __get_date(strtotime($v -> sduedate_invoice),1); ?></td>
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
