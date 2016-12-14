
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Service Report Add</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Service Report Add</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('services_report/services_report_add'); ?>" method="post">

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Work Order No.</label>

                    <div class="col-lg-4">
						<select name="wo"  class="form-control chzn-select"><?php echo $wo; ?></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
                        <textarea name="desc" class="form-control" ></textarea>
                    </div>
                </div>

                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Status</label>
                    <div class="col-lg-4">
						
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_status(0,2); ?>
                            </div>
					</div>
				</div>
                <div class="form-group">
                    <div class="col-lg-8" id="productTMP" style="margin:0 auto;float:none;"> </div>
                    <div class="col-lg-8" id="sparepartTMP" style="margin:0 auto;float:none;"> </div>
                    <div class="col-lg-8" id="technicalTMP" style="margin:0 auto;float:none;"> </div>
				</div>
				<div style="clear:both;"></div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
                    <div class="col-lg-4">
				<button class="btn text-muted text-center btn-danger" type="submit">Submit</button>
				<button class="btn text-muted text-center btn-primary" type="button" onclick="location.href='javascript:history.go(-1);'">Back</button>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
    </div>
                    </div>
                  </div>
        </div>
        </div>
<script type="text/javascript">
$(function(){
	$('select[name="wo"]').change(function(){
		$('div#productTMP').load('<?php echo site_url('services_wo/product_tmp');?>/2?r=1&id='+$(this).val());
		$('div#technicalTMP').load('<?php echo site_url('services_wo/technical_tmp');?>/2?r=1&id='+$(this).val());
		$('div#sparepartTMP').load('<?php echo site_url('services_sparepart/sparepart_tmp');?>/2?r=1&id='+$(this).val());
	});
});
</script>
