<!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Distribution Request Add</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Distribution Request Add</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('request/request_add'); ?>" method="post">

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Request Type</label>

                    <div class="col-lg-4">
                                            <select class="form-control" name="rtype">
											<?php echo __get_request_type(0,2);?>
                                            </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Branch From</label>
                    <div class="input-group col-lg-4">
						<select class="form-control" name="bfrom">
							<?php echo $bfrom; ?>
						</select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Branch To</label>
                    <div class="input-group col-lg-4">
						<select class="form-control" name="bto">
							<?php echo $bto; ?>
						</select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Title</label>
                    <div class="input-group col-lg-4">
                        <input type="text" placeholder="Request Title" name="title" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
                        <textarea name="desc" class="form-control" placeholder="Description"></textarea>
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
   <a class="btn btn-info" href="<?php echo site_url('request/request_list_items/1'); ?>" id="addItem">Add Item</a>
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
$(function(){
	$('div#Items').load('<?php echo site_url('request/request_items'); ?>');
	$("#addItem").fancybox({
		'width'				: '75%',
		'height'			: '100%',
		'autoScale'			: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
	});
	
	$('a#fancybox-close').click(function(){
		$('div#Items').load('<?php echo site_url('request/request_items'); ?>');
	});
	
	$.fancybox.originalClose = $.fancybox.close;
	$.fancybox.close = function() {
		$('div#Items').load('<?php echo site_url('request/request_items'); ?>');
		$.fancybox.originalClose();
	}
	$('select[name="rtype"]').chosen({disable_search_threshold: 10});
	$('select[name="bfrom"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
	$('#pbranch').css('display','none');
});
</script>
