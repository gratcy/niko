       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Stock <?php echo __get_inventory_type($type); ?> Update</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Stock <?php echo __get_inventory_type($type); ?> Update</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('opname/opname_update'); ?>" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="type" value="<?php echo $type; ?>">
<input type="hidden" name="stockin2" value="<?php echo $detail[0] -> istockin; ?>">
<input type="hidden" name="stock2" value="<?php echo $detail[0] -> istock; ?>">
<input type="hidden" name="stockout2" value="<?php echo $detail[0] -> istockout; ?>">
<input type="hidden" name="stockbegining2" value="<?php echo $detail[0] -> istockbegining; ?>">
                <div class="form-group" id="pbranch">
                    <label for="text1" class="control-label col-lg-4">Branch</label>

                    <div class="col-lg-4">
						<select name="branch" data-placeholder="Branch" class="form-control chzn-select"><?php echo $branch; ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Item</label>

                    <div class="col-lg-4">
						<select name="item" data-placeholder="Stock Item" class="form-control chzn-select"><?php echo $items; ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Stock Begining</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Stock Begining" name="stockbegining" class="form-control" value="<?php echo $detail[0] -> istockbegining; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Stock In</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Stock In" name="stockin" class="form-control" value="<?php echo $detail[0] -> istockin; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Stock Out</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Stock Out" name="stockout" class="form-control" value="<?php echo $detail[0] -> istockout; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Stock Final</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Stock Final" name="stock" class="form-control" value="<?php echo $detail[0] -> istock; ?>" />
                    </div>
                </div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Status</label>
                    <div class="col-lg-4">
						
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_status($detail[0] -> istatus,2); ?>
                            </div>
					</div>
				</div>
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
<?php if (__get_roles('ExecuteAllBranchOpname') <> 1) : ?>
<script type="text/javascript">
$('select[name="branch"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
$('#pbranch').css('display','none');
</script>
<?php endif; ?>
