<style type="text/css">
div#txtHint{position: absolute;
width: 230px;
top: 40px;
max-height: 300px;
z-index: 9999;
border: 1px solid #999;
background: #fff;
cursor: default;
overflow: auto;
left:inherit!important;
}
</style>
        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Services Report </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('ServicesReportExecute')) : ?>
                <a href="<?php echo site_url('services_report/services_report_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Service Report</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Services Report
                <div class="searchTable">
                <form action="<?php echo current_url();?>" method="post">
					<div class="sLeft"><input type="text" placeholder="No. Work Order" name="keyword" class="form-control" autocomplete="off" /></div>
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
          <th>WO No.</th>
          <th>Date</th>
          <th>Desc</th>
          <th>Status</th>
          <th style="width: 80px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($services_report as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> sno; ?></td>
          <td><?php echo __get_date($v -> sdate); ?></td>
          <td><?php echo $v -> sdesc; ?></td>
          <td><?php echo __get_status($v -> sstatus,3); ?></td>
		  <td>
			  <?php if ($v -> sstatus == 3) : ?>
			  <a href="javascript:void(0);" onclick="print_data('<?php echo site_url('services_report/services_report_print/' . $v -> sid); ?>');" ><i class="icon-print"></i></a>
			  <?php endif; ?>
			  <?php if ($v -> sstatus <> 3) : ?>
				<?php if (__get_roles('ServicesReportExecute')) : ?>
              <a href="<?php echo site_url('services_report/services_report_update/' . $v -> sid); ?>"><i class="icon-pencil"></i></a>
                <?php endif; ?>
				<?php if (__get_roles('ServicesReportExecute')) : ?>
              <a href="<?php echo site_url('services_report/services_report_delete/' . $v -> sid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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

<script type="text/javascript">
$(function(){
	$('div.searchTable > form > div.sLeft > input[name="keyword"]').sSuggestion('span#sg1','services_wo/get_suggestion', 'keyword');
});
</script>
