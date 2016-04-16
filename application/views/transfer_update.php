<!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Distribution Transfer Update</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Distribution Transfer Update</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('transfer/transfer_update'); ?>" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Request Type</label>
                    <div class="col-lg-4">
						<select class="form-control" name="rtype">
						<?php echo __get_request_type($detail[0] -> dtype,2);?>
						</select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Doc No.</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="Doc No." readonly name="docno" class="form-control" value="<?php echo $detail[0] -> ddocno;?>" />
                    </div>
                </div>

                <div class="form-group" id="rno">
                    <label for="text1" class="control-label col-lg-4">Request No.</label>
                    <div class="input-group col-lg-4">
                         <select name="rno232" class="form-control" disabled><?php echo $rno; ?></select>
                         <input type="hidden" name="rno" value="<?php echo $detail[0] -> ddrid?>">
                    </div>
                </div>
                <div class="form-group" id="rno2">
                    <label for="text1" class="control-label col-lg-4">Request No.</label>
                    <div class="input-group col-lg-4">
                         <select name="rno233" class="form-control chzn-select" disabled><?php echo $rno2; ?></select>
                         <input type="hidden" name="rno2" value="<?php echo $detail[0] -> ddrid?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>
                    <div class="input-group col-lg-4">
                        <input type="text"  name="waktu" value="<?php echo date('d/m/Y',$detail[0] -> ddate);?>" class="form-control" autocomplete="off" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Title</label>
                    <div class="input-group col-lg-4">
                        <input type="text"  name="title" class="form-control" value="<?php echo $detail[0] -> dtitle;?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
                        <textarea name="desc" class="form-control" ><?php echo $detail[0] -> ddesc;?></textarea>
                    </div>
                </div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Status</label>
                    <div class="col-lg-4">
						
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_status($detail[0] -> dstatus,2); ?>
                            </div>
					</div>
				</div>
                    <div id="Items"></div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
                    <div class="col-lg-4">
			<?php if (__get_roles('DistributionTransferApproval')) : ?>
				<button type="button" id="approve" class="btn btn-warning"> <i class="fa fa-save"></i> Approved</button>
			<?php endif; ?>
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
	$('div#Items').load('<?php echo site_url('transfer/transfer_request_items/' . $detail[0] -> ddrid); ?>');
	
	$('#approve').click(function(){
		$('form.form-horizontal').append('<input type="hidden" name="app" value="1">');
		$('form.form-horizontal').submit();
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
