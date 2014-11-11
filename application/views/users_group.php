        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Users </h2>
                    </div>
                </div>
                <hr />
				<?php if (__get_roles('UsersGroupAdd')) : ?>
                <a href="<?php echo site_url('users/users_group_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add User Group</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Group
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Group Name</th>
          <th>Description</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php foreach($group as $k => $v) : ?>
        <tr>
          <td><?php echo $v -> gname; ?></td>
          <td><?php echo $v -> gdesc; ?></td>
          <td><?php echo __get_status($v -> gstatus,1); ?></td>
          <td>
			 <?php if ($v -> gid <> 1) : ?>
              <a href="<?php echo site_url('users/users_group_update/' . $v -> gid); ?>"><i class="icon-pencil"></i></a>
              <a href="<?php echo site_url('users/users_group_delete/' . $v -> gid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
