        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> City </h2>
                    </div>
                </div>

                <hr />
                <a href="<?php echo site_url('city/city_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add City</a>
                <br />
                <br />
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            City
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
		  foreach($city as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> cname; ?></td>
          <td style="width:150px;"><?php echo __get_status($v -> cstatus,1); ?></td>
		  <td>
              <a href="<?php echo site_url('city/city_update/' . $v -> cid); ?>"><i class="icon-pencil"></i></a>
              <a href="<?php echo site_url('city/city_delete/' . $v -> cid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
