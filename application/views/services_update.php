
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Services Update</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Services Update</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('services/services_update'); ?>" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="form-group" id="pbranch">
                    <label for="text1" class="control-label col-lg-4">Branch</label>

                    <div class="col-lg-4">
						<select name="branch"  class="form-control chzn-select"><?php echo $branch; ?></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer</label>

                    <div class="col-lg-4">
						<select name="scid"  class="form-control chzn-select"><?php echo $customers; ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Product</label>

                    <div class="col-lg-4">
						<select name="product"  class="form-control chzn-select"><?php echo $products; ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">QTY</label>

                    <div class="col-lg-4">
                        <input type="text"  name="qty" class="form-control" value="<?php echo $detail[0] -> sqty; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No Seri</label>

                    <div class="col-lg-4">
                        <input type="text"  name="noseri" class="form-control" value="<?php echo $detail[0] -> snoseri; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Condition</label>

                    <div class="col-lg-4">
                        <?php echo __get_condition_services($detail[0] -> scondition,2); ?>
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
							<label for="status" class="control-label col-lg-4">Status</label>
                    <div class="col-lg-4">
						
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_status($detail[0] -> sstatus,2); ?>
                            </div>
					</div>
				</div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
                    <div class="col-lg-4">
				<?php if (__get_roles('ServicesApproval')) : ?>
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
        <!-- END PAGE CONTENT -->
<script type="text/javascript">
	$('input[name="dfrom"],input[name="dto"]').datepicker({
		dateFormat: 'dd/mm/yy'
	});
	
	$('#approve').click(function(){
		$('form.form-horizontal').append('<input type="hidden" name="appsev" value="3">');
		$('form.form-horizontal').submit();
	});
</script>

<script type="text/javascript">
$('select[name="branch"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
$('#pbranch').css('display','none');
</script>
