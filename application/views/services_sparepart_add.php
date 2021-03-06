
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Service Sparepart Add</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Service Sparepart Add</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('services_sparepart/services_sparepart_add'); ?>" method="post">

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sparepart</label>

                    <div class="col-lg-4">
				<a href="<?php echo site_url('services_sparepart/sparepart_add/1'); ?>" class="btn text-muted text-center btn-info" id="sparepart">Add Sparepart</a>
                    </div>
                </div>
                <div class="form-group" id="pbranch">
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
                    <div class="col-lg-8" id="sparepartTMP" style="margin:0 auto;float:none;"> </div>
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
	$('div#sparepartTMP').load('<?php echo site_url('services_sparepart/sparepart_tmp/1');?>');
	$("#sparepart").fancybox({
		'width'				: '65%',
		'height'			: '100%',
		'autoScale'			: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
	});
	$('a#fancybox-close').click(function(){
		$('div#sparepartTMP').load('<?php echo site_url('services_sparepart/sparepart_tmp/1');?>');
	});
	$.fancybox.originalClose = $.fancybox.close;
	$.fancybox.close = function() {
		$('div#sparepartTMP').load('<?php echo site_url('services_sparepart/sparepart_tmp/1');?>');
		$.fancybox.originalClose();
	}
});
</script>
