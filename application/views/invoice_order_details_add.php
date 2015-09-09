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
					<input type=hidden value="<?php echo $detailx[0]->sbid; ?>" class="form-control" name=sbid >

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">DO No.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->snodo; ?>" class="form-control" disabled>
                    </div>
                </div>

		<?php 
			$stgldos=$detailx[0]->stgldo;			
			$stgldox = explode("-",$stgldos);			
			$stgldo="$stgldox[2]/$stgldox[1]/$stgldox[0]";
			
		?>	
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $stgldo; ?>" class="form-control" disabled>
                    </div> 
                </div>				
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->cname; ?>" class="form-control" disabled>
						<input type=hidden value="<?php echo $detailx[0]->juminv; ?>" name=juminv class="form-control" >
                    </div>
                </div>
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Address</label>

                    <div class="col-lg-4">
					<?php 
$caddr=explode("*",$detailx[0]->caddr);
 ?>
                       	<input type=text value="<?php echo trim($caddr[1].' , '.$detailx[0]->ccity); ?>" class="form-control" disabled>
                    </div>
                </div>				
				
</td><td width=40% valign=top >

 <?php 
 			$stgldos=$detailx[0]->stgldo;
			$stgldox = explode("-",$stgldos);			
			$stgldo="$stgldox[2]/$stgldox[1]/$stgldox[0]";	
?>			

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Invoice No</label>

                    <div class="col-lg-4">	
					<?php
					$nodo=$id.'-'.date('dmyhis');
					?>
					<input type=text value="<?php echo 'INV-'.$detailx[0]->snodo;?>" class="form-control" disabled>
					<input type=hidden value="<?php echo 'INV-'.$detailx[0]->snodo;?>" name=sno_invoice class="form-control" >
                    </div>
                </div>	




		 <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Invoice Date</label>

					<div class="col-lg-4">
						<input  name="stgl_invoice" value="<?php echo date('d/m/Y');?>" type="text" placeholder="click to show datepicker"  id="example1" class="form-control"  >
					</div> 							
                </div>
				
				
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">&nbsp;</label>

                    <div class="col-lg-4">
                       <input class="btn text-muted text-center btn-primary" type=submit value ="Create" > 
                    </div>
                </div>					
				
				
				
                <!--div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Keterangan</label>

                    <div class="col-lg-4">
                        <textarea name="sketerangan" class="form-control" placeholder="Description" disabled ><?php //echo $detailx[0]->sketerangan; ?></textarea>
                    </div>
                </div-->				
		


				</td></tr></table>
				<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
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
