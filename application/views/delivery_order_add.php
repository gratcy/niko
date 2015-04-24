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
		
<script>
$(function() {
$("#search").autocomplete({
delay:0, 
cacheLength: 0,
minLength: 1,
    source: '<?php echo site_url('application/views/assets/sourcex.php?scid='.$scid); ?>',
     select: function(event, ui) { 
	    $("#theId").val(ui.item.pid),
        $("#theCid").val(ui.item.pcid),
		$("#theCode").val(ui.item.pcode),
		$("#theHpp").val(ui.item.phpp),
		$("#theDist").val(ui.item.pdist),
		$("#theSemi").val(ui.item.psemi),
		$("#theKey").val(ui.item.pkey),
		$("#theStore").val(ui.item.pstore),
		$("#theConsume").val(ui.item.pconsume),
		$("#thePoint").val(ui.item.ppoint),
		$("#theDisc").val(ui.item.ddisc),
		$("#thePrice").val(ui.item.price),
		$("#theQty").val(ui.item.mqty),
		$("#theStatus").val(ui.item.pstatus)
	
		
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
            <h5>Delivery Order Add <?php //echo "$id $scid";?></h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <!--form class="form-horizontal" action="<?php echo site_url('sales_order_detail/home/sales_order_detail_add'); ?>" method="post"-->
<?php //echo site_url('application/views/assets/sourcex.php?scid='.$scid); ?>	
<?php  
//print_r($detailx);
//print_r($detail);die;
?>


 <form  id="form1" class="form-horizontal"  method="post">
<table border=0 width=90% ><tr><td width=50%>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No DO</label>

                    <div class="col-lg-4">	
					<?php
					$nodo=$id.'-'.date('dmyhis');
					?>
					<input type=text value="<?php echo $nodo;?>" class="form-control" disabled>
					<input type=hidden value="<?php echo $nodo;?>" name=snodo class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Driver</label>

                    <div class="col-lg-4">                     
					   <input type=text name=driver class="form-control" >
                    </div>
                </div>				
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No Pol</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=hidden name=scid value="<?php echo $scid; ?>">
					   <input type=text name=snopol class="form-control" >
                    </div>
                </div>

				
						
				
			</td><td width=40%>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Tanggal</label>

					<div class="col-lg-4">
						<input  name="stgldo" type="text" placeholder="click to show datepicker"  id="example1" class="form-control"  >
					</div> 							
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Nomor</label>

                      <div class="col-lg-4">
					<input type=text name=snomor  class="form-control" >
                    </div> 
                </div>

	

				


				</td></tr></table>
				
				                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4"></label>
					<input class="btn text-muted text-center btn-danger" type=submit value=create>
                    <div class="col-lg-4">                        
                    </div>
                </div>	
				
            </form>
        </div>
    </div>
</div>

  <div class="panel-body">
                            <div class="table-responsive">
							
                               
		
                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
