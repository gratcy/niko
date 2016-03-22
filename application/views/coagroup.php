        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Chart of Account Group</h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('COAExecute')) : ?>
                <a href="<?php echo site_url('coagroup/coagroup_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Chart of Account Group</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Chart of Account Group
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Class</th>
          <th>Name</th>
          <th>Description</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php foreach($coagroup as $k => $v) : ?>
<tr>
<td><?php echo __get_coa_class($v -> cclass,1); ?></td>
<td><?php echo $v -> cname; ?></td>
<td><?php echo $v -> cdesc; ?></td>
<td><?php echo __get_status($v -> cstatus,1); ?></td>
<td>
              <a href="<?php echo site_url('coagroup/coagroup_update/' . $v -> cid); ?>"><i class="icon-pencil"></i></a>
              <a href="<?php echo site_url('coagroup/coagroup_delete/' . $v -> cid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
              </td>
</tr>
<?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
       <!--END PAGE CONTENT -->
