        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Province </h2>
                    </div>
                </div>

                <hr />
                <a href="<?php echo site_url('province/province_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Province</a>
                <br />
                <br />
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Province
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Name</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($province as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> pname; ?></td>
          <td style="width:150px;"><?php echo __get_status($v -> pstatus,1); ?></td>
		  <td>
              <a href="<?php echo site_url('province/province_update/' . $v -> pid); ?>"><i class="icon-pencil"></i></a>
              <a href="<?php echo site_url('province/province_delete/' . $v -> pid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
