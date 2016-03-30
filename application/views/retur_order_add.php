
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
    source: '<?php echo site_url('retur_order/home/source'); ?>',
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
            <h5>Return Order</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>

<form id="form1" class="form-horizontal" action="<?php echo site_url('retur_order/home/retur_order_add'); ?>" method="post">


                <div class="form-group" id="sbranch">
                    <label for="text1" class="control-label col-lg-4">Branch</label>

                    <div class="col-lg-4">
                        <!--input type="text" placeholder="sales Order Code" name="sbid" class="form-control" /-->
						
						<select name="sbid" data-placeholder="Branch" class="form-control chzn-select"><?php echo $sbid; ?></select>						
						
                    </div>
                </div>
				
				
                <!--div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Return No. </label>

                    <div class="col-lg-4">
                        <input  type="text" name="snoro" class="form-control" />
                    </div>
                </div-->
   
			<input type="hidden"  name="snoro" class="form-control" />
            <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Reff No.</label>
					<div class="col-lg-4">
						<input  name="sreff" type="text"   class="form-control"  >
					</div>
       		</div>
   
	


            <div class="form-group">
                <label for="text1" class="control-label col-lg-4">Date</label>
					<div class="col-lg-4">
						<input  name="stgl" type="text"   id="example1" class="form-control"  >
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
                        <!--input type="text" placeholder="retur order Code" name="sbid" class="form-control" /-->
						
						<!--select id=search name="scid" data-placeholder="Customer" class="form-control chzn-select"><?php //echo $scid; ?></select-->						
						
                    </div>
                </div>				
				

				


	
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
                        <textarea placeholder="Keterangan" name="sketerangan" class="form-control" /></textarea>
						<input type="hidden"  name="sstatus" value="1" />
                    </div>
                </div>
                		
				

                <div class="form-group">
					<label for="status" class="control-label col-lg-4"></label> 
					<div class="col-lg-4">                
						<button class="btn text-muted text-center btn-danger" type="submit">Submit</button>
						<!--button class="btn text-muted text-center btn-primary" type="button" onclick="location.href='javascript:history.go(-1);'">Back</button-->
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
$('select[name="sbid"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
$('#sbranch').css('display','none');
</script>


