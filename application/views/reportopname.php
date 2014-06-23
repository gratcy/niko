        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Report Opname <?php echo __get_inventory_type($type); ?></h2>
                    </div>
                </div>

                <hr />
	<?php echo __get_error_msg(); ?>
	<form class="form-horizontal" action="<?php echo site_url('reportopname/sortreport/' . $type); ?>" method="post">
		<div class="row">
			<div class="col-lg-8">
                <div class="form-group">
                <div class="col-lg-4">From <input type="text" data-date-format="dd/mm/yyyy" name="dfrom" class="form-control" value="<?php echo $from; ?>" /></div>
                <div class="col-lg-4">To <input type="text" data-date-format="dd/mm/yyyy" name="dto" class="form-control" value="<?php echo $to; ?>" /></div>
                <div class="col-lg-2"> <br /><button class="btn text-muted text-center btn-danger" type="submit">Sort</button></div>
				</div>
			</div>
		</div>
	</form>
<br />
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Report Opname <?php echo __get_inventory_type($type); ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Date</th>
          <th>Branch</th>
          <th>Code</th>
          <th>Name</th>
          <th>Stock Begining</th>
          <th>Stock In</th>
          <th>Stock Out</th>
          <th>Stock Final</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($reportopname as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo __get_date($v -> odate); ?></td>
          <td><?php echo $v -> bname; ?></td>
          <td><?php echo $v -> code; ?></td>
          <td><?php echo $v -> name; ?></td>
          <td style="text-align:right;"><?php echo $v -> ostockbegining; ?></td>
          <td style="text-align:right;"><?php echo $v -> ostockin; ?></td>
          <td style="text-align:right;"><?php echo $v -> ostockout; ?></td>
          <td style="text-align:right;"><?php echo $v -> ostock; ?></td>
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

        <!-- END PAGE CONTENT -->
<script type="text/javascript">
	$('input[name="dfrom"],input[name="dto"]').datepicker({
		dateFormat: 'dd/mm/yy'
	});
</script>
