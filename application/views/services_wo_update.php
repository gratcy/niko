
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Service Work Order Update</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Service Work Order Update</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('services_wo/services_wo_update'); ?>" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="sparepart_id" value="<?php echo $detail[0] -> sparepart_id; ?>">

                <div class="form-group" id="pbranch">
                    <label for="text1" class="control-label col-lg-4">Branch</label>

                    <div class="col-lg-4">
						<select name="branch"  class="form-control chzn-select"><?php echo $branch; ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Product</label>

                    <div class="col-lg-4">
						<a href="<?php echo site_url('services_wo/product_add/2?id=' . $id); ?>" class="btn btn-info" id="addProduct">Add Product</a>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sparepart</label>
                    <div class="col-lg-4">
                <a href="<?php echo site_url('services_sparepart/sparepart_add/2?id=' . $detail[0] -> sparepart_id); ?>" class="btn text-muted text-center btn-info" id="addSparepart">Add Sparepart</a>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Technician</label>

                    <div class="col-lg-4">
				<a href="<?php echo site_url('services_wo/technical_add/2?id=' . $id); ?>" class="btn btn-info" id="addTechnical">Add Technician</a>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>

                    <div class="col-lg-2">
						From <input type="text" data-date-format="dd/mm/yyyy" name="dfrom" class="form-control" value="<?php echo date('d/m/Y', $detail[0] -> sdatefrom); ?>" autocomplete="off" />
                    </div>
                    <div class="col-lg-2">
						To <input type="text" data-date-format="dd/mm/yyyy" name="dto" class="form-control" value="<?php echo date('d/m/Y', $detail[0] -> sdateto); ?>" autocomplete="off" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
                        <textarea name="desc" class="form-control" ><?php echo $detail[0] -> sdesc; ?></textarea>
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
                    <div class="col-lg-8" id="ProductTMP" style="margin:0 auto;float:none;"> </div>
				</div>
                <div class="form-group">
                    <div class="col-lg-8" id="sparepartTMP" style="margin:0 auto;float:none;"> </div>
				</div>
                <div class="form-group">
                    <div class="col-lg-8" id="TechnicalTMP" style="margin:0 auto;float:none;"> </div>
                </div>
				<div style="clear:both;"></div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
                    <div class="col-lg-4">
				<?php if (__get_roles('ServicesWOApproval')) : ?>
				<button class="btn text-muted text-center btn-danger" id="approve" type="button">Approve</button>
				<?php endif; ?>
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
        <!-- END PAGE CONTENT -->
<script type="text/javascript">
	$('input[name="dfrom"],input[name="dto"]').datepicker({
		dateFormat: 'dd/mm/yy'
	});
</script>

<script type="text/javascript">
$('select[name="branch"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
$('#pbranch').css('display','none');
$(function(){
		$('#approve').click(function(){
		$('form.form-horizontal').append('<input type="hidden" name="appsev" value="3">');
		$('form.form-horizontal').submit();
	});
	
	$('div#TechnicalTMP').load('<?php echo site_url('services_wo/technical_tmp/2?id=' . $id);?>');
    $('div#ProductTMP').load('<?php echo site_url('services_wo/product_tmp/2?id=' . $id);?>');
    $('div#sparepartTMP').load('<?php echo site_url('services_sparepart/sparepart_tmp/2?id=' . $detail[0] -> sparepart_id);?>');
	$("#addTechnical, #addProduct, #addSparepart").fancybox({
		'width'				: '65%',
		'height'			: '100%',
		'autoScale'			: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
	});
	$('a#fancybox-close').click(function(){
		$('div#TechnicalTMP').load('<?php echo site_url('services_wo/technical_tmp/2?id=' . $id);?>');
		$('div#ProductTMP').load('<?php echo site_url('services_wo/product_tmp/2?id=' . $id);?>');
        $('div#sparepartTMP').load('<?php echo site_url('services_sparepart/sparepart_tmp/2?id=' . $detail[0] -> sparepart_id);?>');
	});
	$.fancybox.originalClose = $.fancybox.close;
	$.fancybox.close = function() {
		$('div#TechnicalTMP').load('<?php echo site_url('services_wo/technical_tmp/2?id=' . $id);?>');
		$('div#ProductTMP').load('<?php echo site_url('services_wo/product_tmp/2?id=' . $id);?>');
        $('div#sparepartTMP').load('<?php echo site_url('services_sparepart/sparepart_tmp/2?id=' . $detail[0] -> sparepart_id);?>');
		$.fancybox.originalClose();
	}
});
</script>
