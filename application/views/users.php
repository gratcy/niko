        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Users </h2>
                    </div>
                </div>

                <hr />
                <a href="<?php echo site_url('users/users_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add User</a>
                <br />
                <br />
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Users
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Group</th>
          <th>Branch</th>
          <th>Email</th>
          <th>History IP Address</th>
          <th>History Date</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($users as $k => $v) :
		  $hist = explode('*', $v -> ulastlogin);
		  ?>
                                        <tr>
          <td><?php echo $v -> gname; ?></td>
          <td><?php echo $v -> bname; ?></td>
          <td><?php echo $v -> uemail; ?></td>
          <td><?php echo (isset($hist[0]) && $hist[0] != '' ? long2ip($hist[0]) : ''); ?></td>
          <td><?php echo (isset($hist[1]) && $hist[1] != '' ? __get_date($hist[1],1) : ''); ?></td>
          <td><?php echo __get_status($v -> ustatus,1); ?></td>
											<td>
	<?php if ($v -> uid <> 1) : ?>
              <a href="<?php echo site_url('users/users_update/' . $v -> uid); ?>"><i class="icon-pencil"></i></a>
              <a href="<?php echo site_url('users/users_delete/' . $v -> uid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
		<?php endif; ?></td>
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
