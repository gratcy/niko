
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
            <form class="form-horizontal" action="<?php echo site_url('purchase_order_detail/home/penerimaan_update'); ?>" method="post">

<?php //print_r($id);die;?>


              
 <input type="hidden" name="pid" class="form-control"  value="<?php echo $detail[0] -> pid; ?>"   />		
   <input type="hidden" name="ppid" class="form-control"  value="<?php echo $detail[0] -> ppid; ?>"   />		                 

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Mata Uang</label>

                    <div class="col-lg-4">
                        <input type="text" name="pcurrency" class="form-control"  value="<?php echo $detail[0] -> pcurrency; ?>"   />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Qty</label>

                    <div class="col-lg-4">
                        <input type="text" name="pqty" class="form-control" data-placeholder="Point" value="<?php echo $detail[0] -> pqty; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Harga</label>

                    <div class="col-lg-4">
                        <input type="text" name="pharga" class="form-control" data-placeholder="Point" 
						onkeyup="formatharga(this.value,this)" value="<?php echo $detail[0] -> pharga; ?>" />
                    </div>
                </div>
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Discount</label>
                    <div class="col-lg-4">
                        <input type="text" name="pdisc" class="form-control" data-placeholder="Point" 
						value="<?php echo $detail[0] -> pdisc; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Keterangan</label>

                    <div class="col-lg-4">
                        <textarea name="pketerangan" class="form-control" placeholder="Description" ><?php echo $detail[0] -> pketerangan; ?></textarea>
                    </div>
                </div>				
				
                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Status</label>
                    
                    <div class="col-lg-4">
						<select name="pstatus" data-placeholder="gudang" class="form-control chzn-select">
						<option value=0>Pending</option>
						<option value=1>Ok</option>
						</select>
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
