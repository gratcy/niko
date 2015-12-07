<!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Distribution Receiving Update</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Distribution Receiving Update</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('receiving/receiving_update'); ?>" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group" id="pbranch">
                    <label for="text1" class="control-label col-lg-4">Branch</label>
                    <div class="col-lg-4">
						<select name="branch" data-placeholder="Branch" class="form-control chzn-select"><?php echo $branch; ?></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Receiving Type</label>
                    <div class="col-lg-4">
						<select name="rtype" class="form-control"><?php echo __get_receiving_type($detail[0] -> rtype,2); ?></select>
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
                        <input type="text" placeholder="Doc No." name="docno" class="form-control" value="<?php echo $detail[0] -> rdocno;?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>
                    <div class="input-group col-lg-4">
                        <input type="text" placeholder="Date Transfer" name="waktu" class="form-control" autocomplete="off" value="<?php echo date('d/m/Y',$detail[0] -> rdate);?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
                        <textarea name="desc" class="form-control" placeholder="Description"><?php echo $detail[0] -> rdesc;?></textarea>
                    </div>
                </div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Status</label>
                    <div class="col-lg-4">
						
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_status($detail[0] -> rstatus,2); ?>
                            </div>
					</div>
				</div>
                    <div id="Items"></div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
                    <div class="col-lg-4">
   <a class="btn btn-info" href="<?php echo site_url('receiving/receiving_list_items/2/' . $id); ?>" id="addItem">Add Item</a>
   <button type="button" id="approve" class="btn btn-warning"> <i class="fa fa-save"></i> Approved</button>
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
	$('div#Items').load('<?php echo site_url('receiving/receiving_items/' . $id); ?>');
	$("#addItem").fancybox({
		'width'				: '75%',
		'height'			: '100%',
		'autoScale'			: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
	});
	
	$('a#fancybox-close').click(function(){
		$('div#Items').load('<?php echo site_url('receiving/receiving_items/' . $id); ?>');
	});
	
	$.fancybox.originalClose = $.fancybox.close;
	$.fancybox.close = function() {
		$('div#Items').load('<?php echo site_url('receiving/receiving_items/' . $id); ?>');
		$.fancybox.originalClose();
	}
	$('select[name="rtype"]').change(function(){
		$('span#bp').load('<?php echo site_url('receiving/receiving_types'); ?>/'+$(this).val() + '/<?php echo ($detail[0] -> rtype == 1 ? $detail[0] -> riid : $id);?>');
	});
	
	$('select[name="rtype"]').change();
	
	$('#approve').click(function(){
		$('form.form-horizontal').append('<input type="hidden" name="app" value="1">');
		$('form.form-horizontal').submit();
	});
	$( document ).ajaxComplete(function() {
		$('select#rid').val(<?php echo $detail[0] -> riid;?>);
	});
	$('input[name="waktu"]').datepicker({format: 'dd/mm/yyyy'});
	
	$('select[name="branch"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
	$('#pbranch').css('display','none');
});
</script>
