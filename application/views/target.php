        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Sales Target </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('TargetOmsetExecute')) : ?>
                <a href="<?php echo site_url('target/target_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Revenue</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sales Target
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
<!--
          <th>Branch</th>
-->
          <th style="width: 350px;">Sales</th>
          <th>Month / Year</th>
          <th style="width: 250px;">Target</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($target as $k => $v) :
		  ?>
                                        <tr>
<!--
          <td><?php echo $v -> bname; ?></td>
-->
          <td><?php echo $v -> sname; ?></td>
          <td><?php echo $v -> tmy; ?></td>
          <td style="text-align:right;"><?php echo __get_rupiah($v -> ttarget,1); ?></td>
          <td><?php echo __get_status($v -> tstatus,1); ?></td>
		  <td>
				<?php if (__get_roles('TargetOmsetExecute')) : ?>
              <a href="<?php echo site_url('target/target_update/' . $v -> tid); ?>"><i class="icon-pencil"></i></a>
                <?php endif; ?>
				<?php if (__get_roles('TargetOmsetExecute')) : ?>
              <a href="<?php echo site_url('target/target_delete/' . $v -> tid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
