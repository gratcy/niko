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
            <h5>Sales Order</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg();?>
	<?php
	$caddrx=explode("*",$detailc[0]->caddr); 
	$cphonex=explode("*",$detailc[0]->cphone); 
	?>

<form id="form1" class="form-horizontal"  method="post">

<table width=80% border=0><tr><td width=40% >
                <div class="form-group" id="sbranch">
                    <label for="text1" class="control-label col-lg-4">Cabang</label>

                    <div class="col-lg-4">
                        <!--input type="text" placeholder="sales Order Code" name="sbid" class="form-control" /-->
						
						<select name="sbid" data-placeholder="Cabang" class="form-control chzn-select"><?php echo $sbid; ?></select>						
						
                    </div>
                </div>
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No SO</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="No SO" name="snoso" value="<?php echo $detailx[0]->snoso; ?>"  class="form-control" />
                    </div>
                </div>
   

            <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Reff</label>
					<div class="col-lg-4">
						<input  name="sreff" type="text" placeholder="reff"  value="<?php echo $detailx[0]->sreff; ?>" class="form-control"  >
					</div>
       		</div>
   
	


            <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Tanggal</label>
					<div class="col-lg-4">
						<input  name="stgl" type="text" placeholder="click to show datepicker"  
						value="<?php echo date('d/m/Y',strtotime($detailx[0]->stgl)); ?>" 
						id="example1" class="form-control"  >
					</div>
       		</div>
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer</label>

                    <div class="col-lg-4">
					<input  name=cname type="text" id="search" class="form-control"  
					value="<?php echo $detailx[0]->cname; ?>" />
					<input  name=ccash type="hidden" id="theTopcash" class="form-control"  value="<?php echo $detailc[0]->ccash; ?>" />
					<input  name=ccredit type="hidden" id="theTopcredit" class="form-control"  value="<?php echo $detailc[0]->ccredit; ?>" />
					<input  name=cdeliver type="hidden" id="theDeliver" class="form-control"   />
					<input  name=ccat type="hidden" id="theCat" class="form-control" value="<?php echo $detailc[0]->ccat; ?>"  />
					<input  name=cid type="hidden" id="theCid" class="form-control"  value="<?php echo $detailc[0]->cid; ?>" />
					<input  name=csid type="hidden" id="theSid" class="form-control"  value="<?php echo $detailc[0]->csid; ?>" />
					<input  name=cpkp type="hidden" id="thePkp" class="form-control" value="<?php echo $detailc[0]->cpkp; ?>"  />
					<input  name=stype type="hidden"  class="form-control"   />
					<input  name=scurrency type="hidden"  class="form-control"  value="IDR"  />
					<input  name=skurs type="hidden"  class="form-control"   />
					<input  name=snopo type="hidden"  class="form-control"   />
                        				
						
                    </div>
                </div>				
				
		

	


                        <input  type="hidden" id="theTopxx" class="form-control"   disabled />
						<input  name=topx type="hidden" id="theTopx" class="form-control"   />
      	
	

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Term Of Payment Cash</label>

                    <div class="col-lg-4">
                        <input  type="text" id="theTopcashx" class="form-control" value="<?php echo $detailc[0]->ccash; ?>"  disabled/>
						
                    </div>
                </div>			


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Term Of Payment Credit</label>

                    <div class="col-lg-4">
                        <input   type="text" id="theTopcreditx" class="form-control"  value="<?php echo $detailc[0]->ccredit; ?>" disabled  />
						
                    </div>
                </div>					

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Address</label>
                    <div class="col-lg-4">					
                   <textarea  name=caddr type="text" id="theAddr" class="form-control" ><?php echo $caddrx[1];?></textarea>
                    </div>
                </div>	
	
				
		</td><td width=40% >

			
		
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Telp</label>

                    <div class="col-lg-4">
                        <input  name=cphone type="text" id="thePhone" value="<?php echo $cphonex[1]; ?>" class="form-control"   />
                    </div>
                </div>			
		
		
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sales</label>

                    <div class="col-lg-4">
					<input  name=csname type="text" id="theSname" class="form-control"  value="<?php echo $detailc[0]->sname; ?>"  />
	
                    </div>
                </div>

				

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">NPWP</label>

                    <div class="col-lg-4">
                        <input type="text" id="theNpwp" placeholder="Npwp" name="cnpwp" value="<?php echo $detailc[0]->cnpwp; ?>" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sisa Plafon</label>

                    <div class="col-lg-4">
                        <input  id="theClimitx"  type="text" placeholder="sisa plafon"  class="form-control" 
						value="<?php echo $detailc[0]->climit; ?>" disabled/>
						<input  id="theClimit" name="climit" type="hidden" placeholder="sisa plafon"  value="<?php echo $detailc[0]->climit; ?>"			class="form-control" />
                    </div>
                </div>
               <div class="form-group">
							<label for="status" class="control-label col-lg-4">FREE PPN</label>
                    <div class="col-lg-4">
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_ppn($detailx[0] -> sfreeppn,2); ?>
                            </div>
					</div>
				</div>	
               
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">payment Type</label>

                    <div class="col-lg-4">
                       	<select name=stypepay class="form-control chzn-select">
						<?php echo "<option>".$detailx[0]->stypepay."</option>"; ?>
						<option>Auto</option>
						<option>Credit</option>
						<option>Cash</option>						
						</select>

                    </div>
                </div>					
	


	
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Keterangan</label>

                    <div class="col-lg-4">
                        <textarea placeholder="Keterangan" name="sketerangan" class="form-control" />
						<?php echo $detailx[0]->sketerangan;?>
						</textarea>						
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
<?php if (__get_roles('ExecuteAllBranchSalesOrder') <> 1) : ?>
<script type="text/javascript">
$('select[name="sbid"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
$('#sbranch').css('display','none');
</script>
<?php endif; ?>
