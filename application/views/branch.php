        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Branch </h2>
                    </div>
                </div>

                <hr />
                <a href="<?php echo site_url('branch/branch_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Branch</a>
                <br />
                <br />
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Branch
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Branch</th>
          <th>NPWP</th>
          <th>Address</th>
          <th>City</th>
          <th>Province</th>
          <th>Phone I</th>
          <th>Phone II</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($branch as $k => $v) :
		  $phone = explode('*', $v -> bphone);
		  ?>
                                        <tr>
          <td><?php echo $v -> bname; ?></td>
          <td><?php echo $v -> bnpwp; ?></td>
          <td><?php echo $v -> baddr; ?></td>
          <td><?php echo __get_cities($v -> bcity,1); ?></td>
          <td><?php echo __get_province($v -> bprovince,1); ?></td>
          <td><?php echo $phone[0]; ?></td>
          <td><?php echo $phone[1]; ?></td>
          <td><?php echo __get_status($v -> bstatus,1); ?></td>
		  <td>
	<?php if ($v -> bid <> 1) : ?>
              <a href="<?php echo site_url('branch/branch_update/' . $v -> bid); ?>"><i class="icon-pencil"></i></a>
              <a href="<?php echo site_url('branch/branch_delete/' . $v -> bid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
