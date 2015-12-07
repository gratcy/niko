<!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Distribution Transfer Add</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Distribution Transfer Add</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('transfer/transfer_add'); ?>" method="post">
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Request Type</label>
                    <div class="col-lg-4">
						<select class="form-control" name="rtype">
						<?php echo __get_request_type(0,2);?>
						</select>
                    </div>
                </div>

                <div class="form-group" id="rno">
                    <label for="text1" class="control-label col-lg-4">Request No.</label>
                    <div class="input-group col-lg-4">
                         <select name="rno" class="form-control"><?php echo $rno; ?></select>
                    </div>
                </div>
                <div class="form-group" id="rno2">
                    <label for="text1" class="control-label col-lg-4">Request No.</label>
                    <div class="input-group col-lg-4">
                         <select name="rno2" class="form-control chzn-select"><?php echo $rno2; ?></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>
                    <div class="input-group col-lg-4">
                        <input type="text" placeholder="Date Transfer" name="waktu" class="form-control" autocomplete="off" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Title</label>
                    <div class="input-group col-lg-4">
                        <input type="text" placeholder="Transfer Title" name="title" class="form-control" />
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
	$('select[name="rno"],select[name="rno2"]').change(function(){
		$('input[name="title"]').val($('option:selected', this).attr('dtitle'));
	});
	$('select[name="rno"]').change(function(){
		$('div#Items').load('<?php echo site_url('transfer/transfer_request_items/'); ?>'+'/'+$(this).val());
	});
	$('select[name="rtype"]').change(function(){
		if ($(this).val() == 1) {
			$('#rno2').css({'display':'none'});
			$('#rno').css({'display':'block'});
			$('#rno .chosen-container, #rno2 .chosen-container').css('width','100%');
		}
		else {
			$('#rno2').css({'display':'block'});
			$('#rno').css({'display':'none'});
			$('#rno .chosen-container, #rno2 .chosen-container').css('width','100%');
		}
	});
	
	$('select[name="rtype"]').chosen({disable_search_threshold: 10});
	$('select[name="rtype"]').change();
	$('input[name="waktu"]').datepicker({format: 'dd/mm/yyyy'});
});
</script>
