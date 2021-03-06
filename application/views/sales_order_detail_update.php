<?php
// $mysql_server = $this->db->hostname;
// $mysql_login =$this->db->username;
// $mysql_password = $this->db->password;
// $mysql_database = $this->db->database;
?>

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
    source: '<?php echo site_url('sales_order/home/source'); ?>',
     select: function(event, ui) { 
	    $("#theCid").val(ui.item.cid),
        $("#theCat").val(ui.item.ccat),
		$("#theClimit").val(ui.item.climit),
		$("#theClimitx").val(ui.item.climit),
		$("#theNpwp").val(ui.item.cnpwp),
		$("#theDeliver").val(ui.item.cdeliver),
		$("#theTopcash").val(ui.item.ccash),
		$("#theTopcredit").val(ui.item.ccredit),
		$("#theTopcashx").val(ui.item.ccash),
		$("#theTopcreditx").val(ui.item.ccredit),		
		$("#theAddr").val(ui.item.caddr),
		$("#thePkp").val(ui.item.cpkp),
		$("#theSid").val(ui.item.csid),
		$("#theSname").val(ui.item.csname),
		$("#thePhone").val(ui.item.cphone),
		$("#theTopx").val(ui.item.topx),
		$("#theTopxx").val(ui.item.topx)
	
		
    }
	

})

});
</script>



</head>







  
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
               
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Sales Order Add</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>

<form id="form1" class="form-horizontal" action="<?php echo site_url('sales_order/home/sales_order_add'); ?>" method="post">

<table width=80% border=0><tr><td width=40% >
                <div class="form-group" id="sbranch">
                    <label for="text1" class="control-label col-lg-4">Branch</label>

                    <div class="col-lg-4">
                        <!--input type="text" placeholder="sales Order Code" name="sbid" class="form-control" /-->
						
						<select name="sbid" data-placeholder="Branch" class="form-control chzn-select"><?php echo $sbid; ?></select>						
						
                    </div>
                </div>
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">SO No.</label>

                    <div class="col-lg-4">
                        <input type=text value="<?php echo $detailx[0]->snoso; ?>" class="form-control" disabled>
                    </div>
                </div>
   

            <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Reff</label>
					<div class="col-lg-4">
						<input type=text value="<?php echo $detailx[0]->sreff; ?>" class="form-control">
					</div>
       		</div>
   
	


            <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Date</label>
					<div class="col-lg-4">
						<input  name="stgl" type="text" placeholder="click to show datepicker" 
						value="<?php echo $detailx[0]->stgl; ?>"	id="example1" class="form-control"  >
					</div>
       		</div>
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer</label>

                    <div class="col-lg-4">
					<input  name=cname type="text" id="search" class="form-control"  value="<?php echo $detailx[0]->cname; ?>"  />
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
                    <label for="text1" class="control-label col-lg-4">Term Of Payment</label>

                    <div class="col-lg-4">
                        <input  type="text" id="theTopxx" class="form-control"   disabled />
						<input  name=topx type="hidden" id="theTopx" class="form-control"   />
                    </div>
                </div>		
	

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Term Of Payment Cash</label>

                    <div class="col-lg-4">
                        <input  type="text" id="theTopcashx" class="form-control"   disabled/>
						
                    </div>
                </div>			


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Term Of Payment Credit</label>

                    <div class="col-lg-4">
                        <input   type="text" id="theTopcreditx" class="form-control"  disabled  />
						
                    </div>
                </div>					

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Address</label>

                    <div class="col-lg-4">
                        <textarea  name=caddr type="text" id="theAddr" class="form-control"   /></textarea>
                    </div>
                </div>	
	
				
	

			
		
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Phone</label>

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
                    <label for="text1" class="control-label col-lg-4">Current Credit Limit</label>

                    <div class="col-lg-4">
                        <input  id="theClimitx"  type="text" placeholder="sisa plafon"  class="form-control" disabled/>
						<input  id="theClimit" name="climit" type="hidden" placeholder="sisa plafon"  class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">PPN</label>

                    <div class="col-lg-4">
                        <select name="sfreeppn">
						<option value="0">No</option>
						<option value="1">Yes</option>
						</select>
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Payment Type</label>

                    <div class="col-lg-4">
                       	<select name=stypepay class="form-control chzn-select">
						<option>Auto</option>
						<option>Credit</option>
						<option>Cash</option>						
						</select>

                    </div>
                </div>					
	


	
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Keterangan" name="sketerangan" class="form-control" />
						<input type="hidden"  name="sstatus" value="1" />
                    </div>
                </div>
                		


                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Status</label>
                    <div class="col-lg-4">
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_status($detailx[0] -> sstatus,2); ?>
                            </div>
					</div>
				</div>
						

                <div class="form-group">
					<label for="status" class="control-label col-lg-4"></label>                 
					<button class="btn text-muted text-center btn-danger" type="submit">Submit</button>
					<button class="btn text-muted text-center btn-primary" type="button" onclick="location.href='javascript:history.go(-1);'">Back</button>
					
				</div>				
				</td></tr></table>
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
$('select[name="sbid"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
$('#sbranch').css('display','none');
</script>



