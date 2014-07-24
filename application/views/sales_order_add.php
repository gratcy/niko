<head>
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
  
<link rel="stylesheet" href="<?php echo site_url('application/views/assets/jqjason/jquery-ui-1.css'); ?>">  
  
<script>
$(function() {
$("#search").autocomplete({
delay:0, 
cacheLength: 0,
minLength: 1,
    source: '<?php echo site_url('application/views/assets/source.php'); ?>',
     select: function(event, ui) { 
	    $("#theCid").val(ui.item.cid),
        $("#theCat").val(ui.item.ccat),
		$("#theLimit").val(ui.item.climit),
		$("#theNpwp").val(ui.item.cnpwp),
		$("#theDeliver").val(ui.item.cdeliver),
		$("#theTopcash").val(ui.item.ccash),
		$("#theTopcredit").val(ui.item.ccredit),
		$("#theAddr").val(ui.item.caddr),
		$("#thePkp").val(ui.item.cpkp),
		$("#theSid").val(ui.item.csid),
		$("#theSname").val(ui.item.csname),
		$("#thePhone").val(ui.item.cphone)
	
		
    }
	

})

});
</script>



</head>








  
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">sales Order Add</h1>
					<?php echo site_url('application/views/assets/source.php'); ?>
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
            <form id="form1" class="form-horizontal" action="<?php echo site_url('sales_order/home/sales_order_add'); ?>" method="post">


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
                <label for="text1" class="control-label col-lg-4">Reff</label>
					<div class="col-lg-4">
						<input  name="sreff" type="text" placeholder="reff"  class="form-control"  >
					</div>
       		</div>
   
	            <!--div class="form-group">
						<label for="status" class="control-label col-lg-4">Type SO</label>
                    
                    <div class="col-lg-4">
						<select name="stype" data-placeholder="gudang" class="form-control chzn-select">
						<option value="penjualan">Penjualan</option>
						<option value="retur">Retur</option>
						<option value="adj">Adj</option>
						</select>
                    </div>
				</div-->			


            <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Tanggal</label>
					<div class="col-lg-4">
						<input  name="stgl" type="text" placeholder="click to show datepicker"  id="example1" class="form-control"  >
					</div>
       		</div>
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer</label>

                    <div class="col-lg-4">
					<input  name=cname type="text" id="search" class="form-control"   />
					<input  name=ccash type="hidden" id="theTopcash" class="form-control"   />
					<input  name=ccredit type="hidden" id="theTopcredit" class="form-control"   />
					<input  name=cdeliver type="hidden" id="theDeliver" class="form-control"   />
					<input  name=ccat type="hidden" id="theCat" class="form-control"   />
					<input  name=cid type="hidden" id="theCid" class="form-control"   />
					<input  name=csid type="hidden" id="theSid" class="form-control"   />
					<input  name=cpkp type="hidden" id="thePkp" class="form-control"   />
					<input  name=stype type="hidden"  class="form-control"   />
					<input  name=scurrency type="hidden"  class="form-control"   />
					<input  name=skurs type="hidden"  class="form-control"   />
					<input  name=snopo type="hidden"  class="form-control"   />
                        <!--input type="text" placeholder="sales Order Code" name="sbid" class="form-control" /-->
						
						<!--select id=search name="scid" data-placeholder="Customer" class="form-control chzn-select"><?php //echo $scid; ?></select-->						
						
                    </div>
                </div>				
				
		
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Address</label>

                    <div class="col-lg-4">
                        <input  name=caddr type="text" id="theAddr" class="form-control"   />
                    </div>
                </div>		
	

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Telp</label>

                    <div class="col-lg-4">
                        <input  name=cphone type="text" id="thePhone" class="form-control"   />
                    </div>
                </div>		
				


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sales</label>

                    <div class="col-lg-4">
					<input  name=csname type="text" id="theSname" class="form-control"   />
                        <!--select name="ssid" data-placeholder="sales" class="form-control chzn-select"><?php //echo $ssid; ?></select-->		
                    </div>
                </div>

				

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">NPWP</label>

                    <div class="col-lg-4">
                        <input type="text" id="theNpwp" placeholder="Npwp" name="cnpwp" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sisa Plafon</label>

                    <div class="col-lg-4">
                        <input  id="theLimit" name=ssisaplafon type="text" placeholder="sisa plafon" name="climit" class="form-control" />
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
