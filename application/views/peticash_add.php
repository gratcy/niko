<!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Petty Cash</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>New Transaction</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('peticash/peticash_add'); ?>" method="post">

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Category</label>

                    <div class="col-lg-4">
                        <select name="category"  class="form-control chzn-select"><?php echo $category; ?></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>
                    <div class="input-group col-lg-4">
                        <input type="text" name="waktu" class="form-control" autocomplete="off" value="<?php echo date('d/m/Y'); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Transaction Type</label>

                    <div class="col-lg-4">
                        <?php echo __get_peticash_type(0, 2); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Nominal</label>

                    <div class="col-lg-4">
                        <input type="text" name="nominal" class="form-control" autocomplete="off" style="text-align:right;" onkeyup="formatharga(this.value,this)" value="0" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No. Reference</label>

                    <div class="col-lg-4">
                        <input type="text" name="refno" class="form-control" autocomplete="off" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
                        <textarea name="desc" class="form-control" ></textarea>
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
<script type="text/javascript">
    $('input[name="waktu"]').datepicker({format: 'dd/mm/yyyy'});
</script>
