
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Services Report Update</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Services Report Update</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('services_report/services_report_update'); ?>" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="swo" value="<?php echo $detail[0] -> ssid; ?>">
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Work Order</label>

                    <div class="col-lg-4">
						<select name="wo" data-placeholder="Work Order" class="form-control chzn-select"><?php echo $wo; ?></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">QTY</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="QTY Workorder" name="wqty" class="form-control" value="<?php echo $detail[0] -> sqty;?>" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Product Finished (QTY)</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="QTY Finished" name="fqty" class="form-control" value="<?php echo $detail[0] -> sqtypf;?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Product Unfinished (QTY)</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="QTY Unfinished" name="uqty" class="form-control" value="<?php echo $detail[0] -> sqtypu;?>" />
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
                    <div class="col-lg-8" id="productTMP" style="margin:0 auto;float:none;"> </div>
				</div>
				<div style="clear:both;"></div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
                    <div class="col-lg-4">
				<?php if (__get_roles('ServicesReportApproval')) : ?>
				<button class="btn text-muted text-center btn-info" id="approve" type="button">Approve</button>
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
<script type="text/javascript">
$(function(){
	$('#approve').click(function(){
		$('form.form-horizontal').append('<input type="hidden" name="appsev" value="3">');
		$('form.form-horizontal').submit();
	});
	$('div#productTMP').load('<?php echo site_url('services_report/product_tmp/' . $detail[0] -> ssid);?>?id=<?php echo $id;?>&t=2');
	$('select[name="wo"]').attr('disabled', true);
	
	$(document).ajaxComplete(function(){
		$('input[name*="spr"]').change(function(){
			var spr = $(this).val();
			res = '';
			ras = '';
			for(var i=0; i<spr; i++) {
				res += '<input type="text" class="form-control" name="sqty['+$(this).attr('pl')+'][]">';
				ras += '<select name="spn['+$(this).attr('pl')+'][]" data-placeholder="Item Sparepart" class="form-control chzn-select">';
                ras += '<?php echo $sparepart; ?>';
                ras += '</select>';
			}
			$('tr[aw="'+$(this).attr('pl')+'"] > td:eq(4)').html(res);
			$('tr[aw="'+$(this).attr('pl')+'"] > td:eq(3)').html(ras);
		});
	});
});
</script>

