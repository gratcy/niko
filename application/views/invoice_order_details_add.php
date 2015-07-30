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
            <h5>Invoice Order </h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>

 <form  id="form1" class="form-horizontal"  method="post">
 
<?php 
     $first_date = strtotime($detailx[0]->stgl);
    $second_date = strtotime($detailx[0]->sduedate);
    $offset = $second_date-$first_date; 
    $duedate= floor($offset/60/60/24);
 ?>
 
 <input type=hidden name=durationx value="<?php echo $duedate; ?>">
 
<table border=0 width=90% ><tr><td width=50%>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Cabang</label>

                    <div class="col-lg-4">	
					<input type=text value="<?php echo $detailx[0]->bname; ?>" class="form-control" disabled>
					<input type=hidden value="<?php echo $detailx[0]->sbid; ?>" class="form-control" name=sbid >
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No DO</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->snodo; ?>" class="form-control" disabled>
                    </div>
                </div>

				
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->cname; ?>" class="form-control" disabled>
						<input type=hidden value="<?php echo $detailx[0]->juminv; ?>" name=juminv class="form-control" >
                    </div>
                </div>
				
			
				
</td><td width=40%>

 <?php 
 			$stgldos=$detailx[0]->stgldo;
			$stgldox = explode("-",$stgldos);			
			$stgldo="$stgldox[2]/$stgldox[1]/$stgldox[0]";	
?>			

          <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Tanggal Invoice</label>

					<div class="col-lg-4">
						<input  name="stgl_invoice" value="<?php echo date('d/m/Y');?>" type="text" placeholder="click to show datepicker"  id="example1" class="form-control"  >
					</div> 							
                </div>

              
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No INVOICE</label>

                    <div class="col-lg-4">	
					<?php
					$nodo=$id.'-'.date('dmyhis');
					?>
					<input type=text value="<?php echo 'INV-'.$detailx[0]->snodo;?>" class="form-control" disabled>
					<input type=hidden value="<?php echo 'INV-'.$detailx[0]->snodo;?>" name=sno_invoice class="form-control" >
                    </div>
                </div>	


				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Keterangan</label>

                    <div class="col-lg-4">
                        <textarea name="sketerangan" class="form-control" placeholder="Description" disabled ><?php echo $detailx[0]->sketerangan; ?></textarea>
                    </div>
                </div>				
		


				</td></tr></table>
				<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input class="btn text-muted text-center btn-primary" type=submit value ="Create Invoice" >
            </form>
        </div>
    </div>
</div>

 </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
