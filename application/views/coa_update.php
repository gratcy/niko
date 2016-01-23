
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chart of Account Update</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Chart of Account Update</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('coa/coa_update'); ?>" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Account Type</label>

                    <div class="col-lg-4">
                        <select name="atype" class="form-control"><?php echo $coagroup; ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Activa/Pasiva</label>

                    <div class="col-lg-4">
                        <?php echo __get_acpas($detail[0] -> ctype,2); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sub Account</label>

                    <div class="col-lg-4">
                        <select name="parent" class="form-control"><option value="0"></option><?php echo $scoa; ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Code</label>

                    <div class="col-lg-4">
                        <input type="text"  name="code" class="form-control" value="<?php echo $detail[0] -> ccode; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Name</label>

                    <div class="col-lg-4">
                        <input type="text"  name="name" class="form-control" value="<?php echo $detail[0] -> cname; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Saldo</label>

                    <div class="col-lg-4">
                        <input type="text"  name="saldo" style="text-align:right;" value="<?php echo __get_rupiah($detail[0] -> csaldo,2); ?>" onkeyup="formatharga(this.value,this)" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
						<textarea name="desc" class="form-control" ><?php echo $detail[0] -> cdesc; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Status</label>
                    <div class="col-lg-4">
						
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_status($detail[0] -> cstatus,2); ?>
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
