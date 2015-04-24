        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Private Messages - <?php echo($type == 2 ? 'Outbox' : 'Inbox'); ?> </h2>
                    </div>
                </div>

                <hr />
                <a href="<?php echo site_url('pm/pm_new'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> New Private Message</a>
                <br />
                <br />
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Private Messages
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Date</th>
          <th>From</th>
          <th>Subject</th>
          <th>Messages</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($pm as $k => $v) :
		  ?>
          <tr style="<?php echo ($v -> pstatus == 0 && $type == 1 ? 'background:#F0F0F0;' : '');?>">
          <td><a href="<?php echo site_url('pm/pm_read/' . $v -> pid);?>"><?php echo __get_date($v -> pdate,1); ?></a></td>
          <td><a href="<?php echo site_url('pm/pm_read/' . $v -> pid);?>"><?php echo $v -> ufrom; ?></a></td>
          <td><a href="<?php echo site_url('pm/pm_read/' . $v -> pid);?>"><?php echo $v -> psubject; ?></a></td>
          <td><a href="<?php echo site_url('pm/pm_read/' . $v -> pid);?>"><?php echo substr($v -> pmsg,0,30); ?></a></td>
		  <td style="text-align:center;">
              <a href="<?php echo site_url('pm/pm_delete/' . $v -> pid .'/' . $type); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
