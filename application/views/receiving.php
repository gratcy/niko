        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Distribution Receiving </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('ItemReceivingExecute')) : ?>
                <a href="<?php echo site_url('receiving/receiving_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Distribution Receiving</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Distribution Receiving
                <div class="searchTable">
                <form action="<?php echo current_url();?>" method="post">
					<div class="sLeft"><input type="text" placeholder="<?php echo ($keyword == '' ? 'Search !!!' : $keyword)?>" name="keyword" class="form-control" autocomplete="off" /></div>
					<div class="sRight"><button class="btn text-muted text-center btn-danger" type="submit">Go</button></div>
                        <span id="sg1"></span>
                </form>
                </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Doc No.</th>
          <th>Type</th>
          <th>Request No. / Vendor</th>
          <th>Date</th>
          <th>Description</th>
          <th>Status</th>
          <th style="width: 80px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($receiving as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> rdocno; ?></td>
          <td><?php echo __get_receiving_type($v -> rtype,1); ?></td>
          <td><?php echo ($v -> rtype == 1 ? __get_receiving_name($v -> riid, $v -> rtype) : $v -> rvendor); ?></td>
          <td><?php echo __get_date($v -> rdate); ?></td>
          <td><?php echo $v -> rdesc; ?></td>
          <td><?php echo ($v -> rstatus == 3 ? '<span style="color:#9e3;font-weight:bold;">Approve</span>' : __get_status($v -> rstatus,1)); ?></td>
		  <td style="text-align:center;">
			<?php if (__get_roles('ItemReceivingExecute')) : ?>
				  <?php if ($v -> rstatus != 3) : ?>
				  <a href="<?php echo site_url('receiving/receiving_update/' . $v -> rid); ?>"><i class="icon-pencil"></i></a>
				  <a href="<?php echo site_url('receiving/receiving_delete/' . $v -> rid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-times"></i></a>
				  <?php else : ?>
				  <a href="<?php echo site_url('receiving/receiving_detail/' . $v -> rid); ?>"><i class="icon-book"></i></a>
				   <a href="<?php echo site_url('receiving/export/excel_detail/' . $v -> rid); ?>"><i class="icon-file"></i></a>
				  <a href="javascript:void(0);" onclick="print_data('<?php echo site_url('printpage/receiving/' . $v -> rid); ?>');"><i class="icon-print"></i></a>
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
