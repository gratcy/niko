        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Journal </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('JournalAdd')) : ?>
                <a href="<?php echo site_url('journal/journal_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Journal</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Journal
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Date</th>
          <th>Post Date</th>
          <th>Type</th>
          <th>Title</th>
          <th>Description</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($journal as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo __get_date($v -> gdate,1); ?></td>
          <td><?php echo ($v -> gpdate ? __get_date($v -> gpdate,1) : '-'); ?></td>
          <td><?php echo __get_transaction_type($v -> gtype,1); ?></td>
          <td><?php echo $v -> gtitle; ?></td>
          <td><?php echo substr($v -> gdesc,0,150); ?></td>
          <td><?php echo __get_status($v -> gstatus,1); ?></td>
		  <td style="text-align:center;">
			  <?php if ($v -> gpdate) : ?>
			  <a href="#"><i class="icon-ok"></i></a>
			  <?php else : ?>
			<?php if (__get_roles('JournalUpdate')) : ?>
		  <a href="<?php echo site_url('journal/journal_update/' . $v -> gid); ?>"><i class="icon-pencil"></i></a>
			<?php endif; ?>
			<?php if (__get_roles('JournalDelete')) : ?>
		  <a href="<?php echo site_url('journal/journal_delete/' . $v -> gid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
