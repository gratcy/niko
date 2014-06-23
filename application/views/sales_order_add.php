
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
                    <h1 class="page-header">sales Order Add</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>sales Order Add</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('sales_order/home/sales_order_add'); ?>" method="post">


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Cabang</label>

                    <div class="col-lg-4">
                        <!--input type="text" placeholder="sales Order Code" name="sbid" class="form-control" /-->
						
						<select name="sbid" data-placeholder="Cabang" class="form-control chzn-select"><?php echo $sbid; ?></select>						
						
                    </div>
                </div>
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No SO</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="No SO" name="snoso" class="form-control" />
                    </div>
                </div>
                								
	            <div class="form-group">
						<label for="status" class="control-label col-lg-4">Type SO</label>
                    
                    <div class="col-lg-4">
						<select name="stype" data-placeholder="gudang" class="form-control chzn-select">
						<option value="penjualan">Penjualan</option>
						<option value="retur">Retur</option>
						<option value="adj">Adj</option>
						</select>
                    </div>
				</div>			
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer</label>

                    <div class="col-lg-4">
                        <!--input type="text" placeholder="sales Order Code" name="sbid" class="form-control" /-->
						
						<select name="scid" data-placeholder="Cabang" class="form-control chzn-select"><?php echo $scid; ?></select>						
						
                    </div>
                </div>				
				
		
				
	

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Tanggal</label>

                    <div class="col-lg-4">
                  

                <input  name="stgl" type="text" placeholder="click to show datepicker"  id="example1" class="form-control"  >
            </div>
       				
					
					
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sales</label>

                    <div class="col-lg-4">
                        <select name="ssid" data-placeholder="sales" class="form-control chzn-select"><?php echo $ssid; ?></select>		
                    </div>
                </div>

				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Currency</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Currency" name="scurrency" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Kurs</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Kurs" name="skurs" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">NPWP</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Npwp" name="snpwp" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sisa Plafon</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="sisa plafon" name="ssisaplafon" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">FREE PPN</label>

                    <div class="col-lg-4">
                        <select name="sfreeppn">
						<option value="0">No</option>
						<option value="1">Yes</option>
						</select>
                    </div>
                </div>
               
				
	
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Keterangan</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Keterangan" name="sketerangan" class="form-control" />
                    </div>
                </div>
                		
				
                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Status</label>
                    
                    <div class="col-lg-4">
						<select name="sstatus" data-placeholder="status" class="form-control chzn-select">
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
