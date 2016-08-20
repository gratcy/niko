<?php
$phone = explode('*', $detail[0] -> cphone);
$addr = explode('*', $detail[0] -> caddr);
?>
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Customer Update</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Customer Update</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('customers/customers_update'); ?>" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group" id="pbranch">
                    <label for="text1" class="control-label col-lg-4">Branch</label>

                    <div class="col-lg-4">
						<select name="branch"  class="form-control chzn-select"><?php echo $branch; ?></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Category</label>

                    <div class="col-lg-8">
                        <?php echo __get_customer_category($detail[0] -> ccat,2); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Name</label>

                    <div class="col-lg-4">
                        <input type="text"  name="name" class="form-control" value="<?php echo $detail[0] -> cname; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">PIC</label>

                    <div class="col-lg-4">
                        <input type="text"  name="contactname" class="form-control" value="<?php echo $detail[0] -> ccontactname; ?>" />
                    </div>
                </div>


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">FKP / SP</label>

                    <div class="col-lg-4">
						<?php echo __get_fkp_sp($detail[0] -> cfkp); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Join Date</label>

                    <div class="col-lg-4">
                        <input data-date-format="dd/mm/yyyy" type="text"  name="joindate" class="form-control" value="<?php echo ($detail[0] -> cjoindate ? date('d/m/Y',$detail[0] -> cjoindate) : ''); ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Address I</label>

                    <div class="col-lg-4">
                        <textarea name="addr" class="form-control" ><?php echo $addr[0]; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Address II</label>

                    <div class="col-lg-4">
                        <textarea name="addr2" class="form-control" ><?php echo $addr[1]; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">City</label>

                    <div class="col-lg-4">
                        <select name="city"  class="form-control chzn-select"><?php echo __get_cities($detail[0] -> ccity,2); ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Province</label>

                    <div class="col-lg-4">
                        <select name="prov"  class="form-control chzn-select"><?php echo __get_province($detail[0] -> cprov,2); ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Phone I</label>

                    <div class="col-lg-4">
                        <input type="text"  name="phone1" class="form-control" value="<?php echo $phone[0]; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Phone II</label>

                    <div class="col-lg-4">
                        <input type="text"  name="phone2" class="form-control" value="<?php echo $phone[1]; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Fax</label>

                    <div class="col-lg-4">
                        <input type="text"  name="fax" class="form-control" value="<?php echo $phone[2]; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Email</label>

                    <div class="col-lg-4">
                        <input type="text"  name="email" class="form-control" value="<?php echo $detail[0] -> cemail; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sales</label>

                    <div class="col-lg-4">
						<select name="sales"  class="form-control chzn-select"><?php echo $sales; ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">TOP Cash</label>

                    <div class="col-lg-4">
                        <input type="text" name="cash" class="form-control" value="<?php echo __get_rupiah($detail[0] -> ccash,2); ?>" onkeyup="formatharga(this.value,this)" style="text-align:right;" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">TOP Credit</label>

                    <div class="col-lg-4">
                        <input type="text" name="credit" class="form-control" value="<?php echo __get_rupiah($detail[0] -> ccredit,2); ?>" onkeyup="formatharga(this.value,this)" style="text-align:right;" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">TOP Cash Nico</label>

                    <div class="col-lg-4">
                        <input type="text" name="cashnico" class="form-control" value="<?php echo $detail[0] -> ccashnico; ?>" style="text-align:right;" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">TOP Credit Nico</label>

                    <div class="col-lg-4">
                        <input type="text" name="creditnico" class="form-control" value="<?php echo $detail[0] -> ccreditnico; ?>" style="text-align:right;" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">TOP Credit Limit</label>

                    <div class="col-lg-4">
                        <input type="text" name="ctop" class="form-control" value="<?php echo __get_rupiah($detail[0] -> ctop,2); ?>" onkeyup="formatharga(this.value,this)" style="text-align:right;" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Credit Current</label>

                    <div class="col-lg-4">
                        <input type="text" name="limit" class="form-control" value="<?php echo __get_rupiah($detail[0] -> climit,2); ?>" onkeyup="formatharga(this.value,this)" style="text-align:right;" />
                    </div>
                </div>

<!--
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">NPWP</label>

                    <div class="col-lg-4">
                        <input type="text"  name="npwp" class="form-control" value="<?php echo $detail[0] -> cnpwp; ?>" />
                    </div>
                </div>
-->

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">PKP</label>

                    <div class="col-lg-4">
                        <input type="text"  name="pkp" class="form-control" value="<?php echo $detail[0] -> cpkp; ?>" />
                    </div>
                </div>
			    <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Return Type</label>

                    <div class="col-lg-4">
                        <?php echo __get_customer_retur($detail[0] -> ctyperetur,2);?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer Commission</label>

                    <div class="col-lg-4">
                      <?php echo $customer_check; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Delivery</label>

                    <div class="col-lg-4">
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_customers_spec($detail[0] -> cdeliver,2); ?>
                    </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Special Attention</label>

                    <div class="col-lg-4">
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_customers_spec($detail[0] -> cspecial,2,'special'); ?>
                            </div>
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

<script type="text/javascript">
$('select[name="branch"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
$('#pbranch').css('display','none');
</script>

<script type="text/javascript">
	$('input[name="joindate"]').datepicker({
		dateFormat: 'dd/mm/yy'
	});
</script>
