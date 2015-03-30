
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Services Sparepart Update</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Services Sparepart Update</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('services_sparepart/services_sparepart_update'); ?>" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Work Order</label>
<input type="hidden" name="owo" value="<?php echo $detail[0] -> ssid; ?>">
                    <div class="col-lg-4">
						<select name="wo" data-placeholder="Work Order" class="form-control chzn-select"><?php echo $wo; ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
                        <textarea name="desc" class="form-control" placeholder="Description"><?php echo $detail[0] -> sdesc; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Status</label>
                    <div class="col-lg-4">
						
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_status($detail[0] -> sstatus,2); ?>
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
				<?php if (__get_roles('ServicesSparepartApproval')) : ?>
				<button class="btn text-muted text-center btn-info" id="approve" type="button">Approve</button>
				<?php endif; ?>
				<a href="<?php echo site_url('services_sparepart/sparepart_add/2?id=' . $id); ?>" class="btn text-muted text-center btn-info" id="sparepart">Add Sparepart</a>
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
	$('#approve').click(function(){
		$('form.form-horizontal').append('<input type="hidden" name="appsev" value="3">');
		$('form.form-horizontal').submit();
	});
	$('div#sparepartTMP').load('<?php echo site_url('services_sparepart/sparepart_tmp/2?id=' . $id);?>');
	$("#sparepart").fancybox({
		'width'				: '65%',
		'height'			: '100%',
		'autoScale'			: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
	});
	$('a#fancybox-close').click(function(){
		$('div#sparepartTMP').load('<?php echo site_url('services_sparepart/sparepart_tmp/2?id=' . $id);?>');
	});
	$.fancybox.originalClose = $.fancybox.close;
	$.fancybox.close = function() {
		$('div#sparepartTMP').load('<?php echo site_url('services_sparepart/sparepart_tmp/2?id=' . $id);?>');
		$.fancybox.originalClose();
	}
});
</script>
