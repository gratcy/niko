        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Sales Commision</h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('SalesCommisionAdd')) : ?>
                <a href="<?php echo site_url('sales_commision/sales_commision_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Sales Commision</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sales
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Branch</th>
          <th>Category</th>
          <th>Cash Com A (%)</th>
          <th>Cash Com B (%)</th>
          <th>Cash Com C (%)</th>
          <th>Cash Com D (%)</th>
          <th>Cash Com E (%)</th>
          <th>Credit Com A (%)</th>
          <th>Credit Com B (%)</th>
          <th>Credit Com C (%)</th>
          <th>Credit Com D (%)</th>
          <th>Credit Com E (%)</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($sales_commision as $k => $v) :
		  ?>
          <tr>
          <td><?php echo $v -> bname; ?></td>
          <td><?php echo $v -> cname; ?></td>
          <td style="text-align:right;"><?php echo $v -> scoma; ?></td>
          <td style="text-align:right;"><?php echo $v -> scomb; ?></td>
          <td style="text-align:right;"><?php echo $v -> scomc; ?></td>
          <td style="text-align:right;"><?php echo $v -> scomd; ?></td>
          <td style="text-align:right;"><?php echo $v -> scome; ?></td>
          <td style="text-align:right;"><?php echo $v -> scredita; ?></td>
          <td style="text-align:right;"><?php echo $v -> screditb; ?></td>
          <td style="text-align:right;"><?php echo $v -> screditc; ?></td>
          <td style="text-align:right;"><?php echo $v -> screditd; ?></td>
          <td style="text-align:right;"><?php echo $v -> scredite; ?></td>
          <td><?php echo __get_status($v -> sstatus,1); ?></td>
		  <td>
				<?php if (__get_roles('SalesCommisionUpdate')) : ?>
              <a href="<?php echo site_url('sales_commision/sales_commision_update/' . $v -> sid); ?>"><i class="icon-pencil"></i></a>
                <?php endif; ?>
				<?php if (__get_roles('SalesCommisionDelete')) : ?>
              <a href="<?php echo site_url('sales_commision/sales_commision_delete/' . $v -> sid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
