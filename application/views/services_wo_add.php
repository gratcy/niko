
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Service Add</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Services Add</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('services_wo/services_wo_add'); ?>" method="post">

                <div class="form-group" id="pbranch">
                    <label for="text1" class="control-label col-lg-4">Branch</label>

                    <div class="col-lg-4">
						<select name="branch"  class="form-control chzn-select"><?php echo $branch; ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Product</label>

                    <div class="col-lg-4">
						<a href="<?php echo site_url('services_wo/product_add/1'); ?>" class="btn text-muted text-center btn-info" id="addProduct">Add Product</a>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>

                    <div class="col-lg-2">
						From <input type="text" data-date-format="dd/mm/yyyy" name="dfrom" class="form-control" value="<?php echo date('d/m/Y'); ?>" autocomplete="off" />
                    </div>
                    <div class="col-lg-2">
						To <input type="text" data-date-format="dd/mm/yyyy" name="dto" class="form-control" value="<?php echo date('d/m/Y', strtotime('+1 month')); ?>" autocomplete="off" />
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
                    <div class="col-lg-8" id="ProductTMP" style="margin:0 auto;float:none;"> </div>
				</div>
                <div class="form-group">
                    <div class="col-lg-8" id="TechnicalTMP" style="margin:0 auto;float:none;"> </div>
				</div>
				<div style="clear:both;"></div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
                    <div class="col-lg-4">
				<a href="<?php echo site_url('services_wo/technical_add/1'); ?>" class="btn text-muted text-center btn-info" id="technical">Add Technical</a>
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
        <!-- END PAGE CONTENT -->
<script type="text/javascript">
	$('input[name="dfrom"],input[name="dto"]').datepicker({
		dateFormat: 'dd/mm/yy'
	});
</script>

<script type="text/javascript">
<?php if (__get_roles('ExecuteAllBranchServices') <> 1) : ?>
$('select[name="branch"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
$('#pbranch').css('display','none');
<?php endif; ?>
$(function(){
	$('div#TechnicalTMP').load('<?php echo site_url('services_wo/technical_tmp/1');?>');
	$('div#ProductTMP').load('<?php echo site_url('services_wo/product_tmp/1');?>');
	$("#technical, #addProduct").fancybox({
		'width'				: '65%',
		'height'			: '100%',
		'autoScale'			: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
	});
	$('a#fancybox-close').click(function(){
		$('div#TechnicalTMP').load('<?php echo site_url('services_wo/technical_tmp/1');?>');
		$('div#ProductTMP').load('<?php echo site_url('services_wo/product_tmp/1');?>');
	});
	$.fancybox.originalClose = $.fancybox.close;
	$.fancybox.close = function() {
		$('div#TechnicalTMP').load('<?php echo site_url('services_wo/technical_tmp/1');?>');
		$('div#ProductTMP').load('<?php echo site_url('services_wo/product_tmp/1');?>');
		$.fancybox.originalClose();
	}
});
</script>
