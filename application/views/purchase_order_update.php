
        <!-- Load jQuery and bootstrap datepicker scripts -->
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
        </script>
    
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Purchase Order Add</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Purchase Order Add</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('purchase_order/home/purchase_order_update'); ?>" method="post">


                <div class="form-group" id="pbranch">
                    <label for="text1" class="control-label col-lg-4">Branch</label>
                    <div class="col-lg-4">
						<input type=hidden name=id value="<?php echo $id; ?>">						
						<select name="pbid" data-placeholder="pbid" class="form-control chzn-select"><?php echo $pbid; ?></select>								
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Bukti No.</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="No Bukti" name="pnobukti" class="form-control"
						 value="<?php echo $detail[0] -> pnobukti; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Ref</label>

                    <div class="col-lg-4">
                        <input type="text" name="pref" class="form-control" value="<?php echo $detail[0] -> pref; ?>"    />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>

                    <div class="col-lg-4">
                  

                <input  name="ptgl" type="text" placeholder="click to show datepicker"  id="example1" class="form-control" value="<?php echo date('d/m/Y',strtotime($detail[0] -> ptgl)); ?>" >
            </div>
       		</div>



                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Warehouse</label>

                    <div class="col-lg-4">
						<input type="text" name="pgudang" class="form-control" value="<?php echo $detail[0] -> pgudang; ?>"    />
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

<?php if (__get_roles('ExecuteAllBranchPurchaseOrder') <> 1) : ?>
<script type="text/javascript">
$('select[name="pbid"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
$('#pbranch').css('display','none');
</script>
<?php endif; ?>
