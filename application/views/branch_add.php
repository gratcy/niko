
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Branch Add</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Branch Add</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('branch/branch_add'); ?>" method="post">

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Name</label>

                    <div class="col-lg-4">
                        <input type="text"  name="name" class="form-control" />
                    </div>
                </div>

<!--
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">NPWP</label>

                    <div class="col-lg-4">
                        <input type="text"  name="npwp" class="form-control" />
                    </div>
                </div>
-->

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Address</label>

                    <div class="col-lg-4">
                        <textarea name="addr" class="form-control" ></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Address II</label>

                    <div class="col-lg-4">
                        <textarea name="addr2" class="form-control" ></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">City</label>

                    <div class="col-lg-4">
                        <select name="city"  class="form-control chzn-select"><?php echo __get_cities('',2); ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Province</label>

                    <div class="col-lg-4">
                        <select name="prov"  class="form-control chzn-select"><?php echo __get_province('',2); ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Phone I</label>

                    <div class="col-lg-4">
                        <input type="text"  name="phone1" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Phone II</label>

                    <div class="col-lg-4">
                        <input type="text"  name="phone2" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Fax</label>

                    <div class="col-lg-4">
                        <input type="text"  name="fax" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Email</label>

                    <div class="col-lg-4">
                        <input type="text"  name="email" class="form-control" />
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
