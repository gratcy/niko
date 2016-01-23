<!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Distribution Receiving Add</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Distribution Receiving Add</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('receiving/receiving_add'); ?>" method="post">
                <div class="form-group" id="pbranch">
                    <label for="text1" class="control-label col-lg-4">Branch</label>
                    <div class="col-lg-4">
						<select name="branch"  class="form-control chzn-select"><?php echo $branch; ?></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Receiving Type</label>
                    <div class="col-lg-4">
						<select name="rtype" class="form-control"><?php echo __get_receiving_type(0,2); ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Request No. / Vendor</label>
                    <div class="input-group col-lg-4">
                        <span id="bp"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Doc No.</label>
                    <div class="input-group col-lg-4">
                        <input type="text" placeholder="Doc No." name="docno" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>
                    <div class="input-group col-lg-4">
                        <input type="text"  name="waktu" class="form-control" autocomplete="off" />
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
                    <div id="Items"></div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
                    <div class="col-lg-4">
   <a class="btn btn-info" href="<?php echo site_url('receiving/receiving_list_items/1'); ?>" id="addItem">Add Item</a>
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
$(document).ajaxComplete(function(){
	$('select[name="rid"]').change(function(){
		$('input[name="docno"]').val($('option:selected', this).text());
	});
});

$('select[name="rtype"]').change(function(){
	$('input[name="docno"]').val('');
});
$(function(){
	$('div#Items').load('<?php echo site_url('receiving/receiving_items'); ?>');
	$("#addItem").fancybox({
		'width'				: '75%',
		'height'			: '100%',
		'autoScale'			: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
	});
	
	$('a#fancybox-close').click(function(){
		$('div#Items').load('<?php echo site_url('receiving/receiving_items'); ?>');
	});
	
	$.fancybox.originalClose = $.fancybox.close;
	$.fancybox.close = function() {
		$('div#Items').load('<?php echo site_url('receiving/receiving_items'); ?>');
		$.fancybox.originalClose();
	}
	$('select[name="rtype"]').change(function(){
		$('span#bp').load('<?php echo site_url('receiving/receiving_types'); ?>/'+$(this).val()+'/0');
	});
	$('select[name="rtype"]').change();
	$('input[name="waktu"]').datepicker({format: 'dd/mm/yyyy'});
	
	$('select[name="branch"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
	$('#pbranch').css('display','none');
});
</script>
