        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Distribution Transfer </h2>
                    </div>
                </div>

                <hr />
			<?php if (__get_roles('DistributionTransferExecute')) : ?>
                <a href="<?php echo site_url('transfer/transfer_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Distribution Transfer</a>
                <br />
                <br />
			<?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Distribution Transfer
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Doc No.</th>
          <th>Request No.</th>
          <th>Request Type</th>
          <th>Date</th>
          <th>Branch From</th>
          <th>Branch To</th>
          <th>Title</th>
          <th>Description</th>
          <th>Status</th>
          <th style="width: 80px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($transfer as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> ddocno; ?></td>
          <td><?php echo ($v -> dtype == 1 ? 'R01' : 'R02').str_pad($v -> ddrid, 4, "0", STR_PAD_LEFT); ?></td>
          <td><?php echo __get_request_type($v -> dtype,1); ?></td>
          <td><?php echo __get_date($v -> ddate); ?></td>
          <td><?php echo $v -> fbname; ?></td>
          <td><?php echo $v -> tbname; ?></td>
          <td><?php echo $v -> dtitle; ?></td>
          <td><?php echo $v -> ddesc; ?></td>
          <td><?php echo ($v -> dstatus == 3 ? '<span style="color:#9e3;font-weight:bold;">Approve</span>' : __get_status($v -> dstatus,1)); ?></td>
		  <td style="text-align:center;">
			<?php if (__get_roles('DistributionTransferExecute')) : ?>
			  <?php if ($v -> dstatus != 3) : ?>
              <a href="<?php echo site_url('transfer/transfer_update/' . $v -> did); ?>"><i class="icon-pencil"></i></a>
              <a href="<?php echo site_url('transfer/transfer_delete/' . $v -> did); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
              <?php else: ?>
              <a href="<?php echo site_url('transfer/transfer_detail/' . $v -> did); ?>"><i class="icon-book"></i></a>
			   <a href="<?php echo site_url('transfer/export/excel_detail/' . $v -> did); ?>"><i class="icon-file"></i></a>
              <a href="javascript:void(0);" onclick="print_data('<?php echo site_url('printpage/dist_transfer/' . $v -> did); ?>');"><i class="icon-print"></i></a>
              <?php endif; ?>
			<?php endif; ?>
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
