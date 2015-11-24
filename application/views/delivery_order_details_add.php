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
            <h5>Delivery Order </h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>

 <form  id="form1" class="form-horizontal"  method="POST">
<table border=0 width=90% ><tr><td width=50%>
                <!--div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Branch</label>

                    <div class="col-lg-4">	
					<input type=text value="<?php //echo $detailx[0]->bname; ?>" class="form-control" disabled>
					<input type=hidden value="<?php //echo $detailx[0]->sbid; ?>" class="form-control" name=sbid >
                    </div>
                </div-->

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
                    </div>
                </div>
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sales</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->sname; ?>" class="form-control" disabled>
                    </div>
                </div>			
				
</td><td width=40%>

<?php
$drv=explode("-",$detailx[0]->driver);
?> 



				<div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Driver</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $drv[0]; ?>" class="form-control" disabled>
                    </div>
                </div>


				<div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Assistant Driver</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $drv[1]; ?>" class="form-control" disabled>
                    </div>
                </div>					

              
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Car No.</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->snopol; ?>" class="form-control" disabled>
                    </div>
                </div>	


				
                <!--div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
                        <textarea name="sketerangan" class="form-control" placeholder="Description" disabled ><?php //echo $detailx[0]->sketerangan; ?></textarea>
                    </div>
                </div-->				
		


				</td></tr></table>
            </form>
        </div>
    </div>
</div>





 <form  id="form1" class="form-horizontal" 
 action="<?php echo site_url("sales_order_detail/home/delivery_order_details_add_confirm/$id/$scid/$snodo"); ?>" method="post">
<input type=hidden value="<?php echo $detailx[0]->scid; ?>" name=scid class="form-control" >
<input type=hidden value="<?php echo $stgldo; ?>" name=stgldo class="form-control" >
<?php //print_r($detailx[0]);?>
<input type=hidden value="<?php echo $detailx[0]->scid; ?>" name=scid class="form-control" >
<input type=hidden value="<?php echo $detailx[0]->snodo; ?>" name=snodo class="form-control" >
<input type=hidden value="<?php echo $detailx[0]->snopol; ?>" name=snopol class="form-control" >
<input type=hidden value="<?php echo $detailx[0]->snomor; ?>" name=snomor class="form-control" >
  <div class="panel-body">
                            <div class="table-responsive">
							<?php 
							$freeppn=$detailx[0]->sfreeppn;
							?>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
          <th>Code</th>
          <th>Name</th>
          <th>Qty/Pcs</th>

                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
		$totalqty=0;  
		$total=0;
		$totalppn=0;
		$totalall=0;
		
		foreach($detail as $k => $v) :	
			//print_r($v);
			$sqtyx=$v -> sqty;
			$spricex=$v -> sprice;
			$sdiscx=$v -> sdisc;
			$qtyx=$v -> sqty;
			$subtotal=$sqtyx * ($spricex - ($spricex * $sdiscx/100));
	
    ?>
          <tr>
          
          <td><?php echo $v -> pcode; ?> 
		  <input type=hidden name="spid[]" value="<?php echo $v -> spid; ?>">
		  <input type=hidden name="sid[]" value="<?php echo $v -> sid; ?>">
		  <input type=hidden name="qty[]" value="<?php echo $v -> sqty; ?>">
		  <input type=hidden name="samount[]" value="<?php echo $v -> sprice; ?>">
		  </td>
		  <td><?php echo $v -> pname; ?></td>
          <td><select name="sqty[]" class="form-control chzn-select">
		  
		  <?php $ssisa= $v -> ssisa; 
		  for($k=$ssisa;$k>=0;$k--){
		  echo "<option>$k</option>";	
		  }
		  ?>
		  </select>
		  </td>

		  </tr>
        <?php 
		$total=$subtotal+$total;
		$totalqty=$qtyx+$totalqty;
		$totalppn=$total * 10/100;
		if($freeppn==1){
		$totalall= $total;
		}else{
		$totalall= $total + $totalppn;
		}
		endforeach; ?>
		
                         </tbody>
                                </table>
								
							
		<input class="btn text-muted text-center btn-danger" type=submit value ="Create" >						
		</form>						

                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
