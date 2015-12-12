
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Customer Add</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Customer Add</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('customers/customers_add'); ?>" method="post">

                <div class="form-group" id="pbranch">
                    <label for="text1" class="control-label col-lg-4">Branch</label>

                    <div class="col-lg-4">
						<select name="branch" data-placeholder="Branch" class="form-control chzn-select"><?php echo $branch; ?></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Category</label>

                    <div class="col-lg-8">
                        <?php echo __get_customer_category(0,2); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Name</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Customers Name" name="name" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">PIC</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Contact Name" name="contactname" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">FKP</label>

                    <div class="col-lg-4">
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_customers_spec(0,2,'fkp'); ?>
                            </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Join Date</label>

                    <div class="col-lg-4">
                        <input data-date-format="dd/mm/yyyy" type="text" placeholder="Join Date" name="joindate" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Address I</label>

                    <div class="col-lg-4">
                        <textarea name="addr" class="form-control" placeholder="Address I"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Address II</label>

                    <div class="col-lg-4">
                        <textarea name="addr2" class="form-control" placeholder="Address II"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">City</label>

                    <div class="col-lg-4">
                        <select name="city" data-placeholder="City" class="form-control chzn-select"><?php echo __get_cities('',2); ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Province</label>

                    <div class="col-lg-4">
                        <select name="prov" data-placeholder="Province" class="form-control chzn-select"><?php echo __get_province('',2); ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Phone I</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Phone I" name="phone1" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Phone II</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Phone II" name="phone2" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Fax</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Fax" name="fax" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Email</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Email" name="email" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sales</label>

                    <div class="col-lg-4">
						<select name="sales" data-placeholder="Sales" class="form-control chzn-select"><?php echo $sales; ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">TOP Cash</label>

                    <div class="col-lg-4">
                        <input type="text" name="cash" class="form-control" data-placeholder="TOP Cash" onkeyup="formatharga(this.value,this)" value="0" style="text-align:right;" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">TOP Credit</label>

                    <div class="col-lg-4">
                        <input type="text" name="credit" class="form-control" data-placeholder="TOP Credit" onkeyup="formatharga(this.value,this)" value="0" style="text-align:right;" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">TOP Cash Nico</label>

                    <div class="col-lg-4">
                        <input type="text" name="cashnico" class="form-control" data-placeholder="TOP Cash Nico" value="0" style="text-align:right;" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">TOP Credit Nico</label>

                    <div class="col-lg-4">
                        <input type="text" name="creditnico" class="form-control" data-placeholder="TOP Credit Nico" value="0" style="text-align:right;" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Credit Current</label>

                    <div class="col-lg-4">
                        <input type="text" name="limit" class="form-control" data-placeholder="Credit Current" onkeyup="formatharga(this.value,this)" value="0" style="text-align:right;" />
                    </div>
                </div>

<!--
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">NPWP</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="NPWP" name="npwp" class="form-control" />
                    </div>
                </div>
-->

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">PKP</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="PKP" name="pkp" class="form-control" />
                    </div>
                </div>

				
			    <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Return Type</label>

                    <div class="col-lg-4">
                        <?php echo __get_customer_retur(0,2);?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Delivery</label>

                    <div class="col-lg-4">
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_customers_spec(0,2); ?>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Special Attention</label>

                    <div class="col-lg-4">
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_customers_spec(0,2,'special'); ?>
                            </div>
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
<?php if (__get_roles('ExecuteAllBranchCustomers') <> 1) : ?>
<script type="text/javascript">
$('select[name="branch"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
$('#pbranch').css('display','none');
</script>
<?php endif; ?>

<script type="text/javascript">
	$('input[name="joindate"]').datepicker({
		dateFormat: 'dd/mm/yy'
	});
</script>
