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
            <h5>Delivery Order  <?php //echo "$id $scid";?></h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <!--form class="form-horizontal" action="<?php //echo site_url('sales_order_detail/home/sales_order_detail_add'); ?>" method="post"-->


 <form  id="form1" class="form-horizontal"  method="post">

<table border=0 width=90% ><tr><td width=50%>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Branch</label>

                    <div class="col-lg-4">	
					<input type=text value="<?php echo $detailx[0]->bname; ?>" class="form-control" disabled>
					<input type=hidden value="<?php echo $detailx[0]->sbid; ?>"  name=sbid class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">DO No.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->snodo; ?>" class="form-control" disabled>
                    </div>
                </div>

				
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->cname; ?>" class="form-control" disabled>
                    </div>
                </div>
				
			
				
</td><td width=40%>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>

                    <div class="col-lg-4">
					<input type=text value="<?php 
					$stgldos=$detailx[0]->stgldo;
					$stgldox = explode("-",$stgldos);			
					$stgldo="$stgldox[2]-$stgldox[1]-$stgldox[0]";	
					echo $stgldo;
					 ?>" class="form-control" disabled>
                    </div>   							
                </div>

              
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Pol No.</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->snopol; ?>" class="form-control" disabled>
                    </div>
                </div>	


				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
                        <textarea name="sketerangan" class="form-control" placeholder="Description" disabled ><?php echo $detailx[0]->sketerangan; ?></textarea>
                    </div>
                </div>				
		


				</td></tr></table>
            </form>
        </div>
    </div>
</div>





 <form  id="form1" class="form-horizontal" action="<?php echo site_url("sales_order_detail/home/delivery_order_details_add/$id/$scid/$snodo"); ?>" method="post">
	 <?php 
				$stgldos=$detailx[0]->stgldo;
				$stgldox = explode("-",$stgldos);			
				$stgldo="$stgldox[2]-$stgldox[1]-$stgldox[0]";
				
	?>
<input type=hidden value="<?php echo $detailx[0]->scid; ?>" name=scid class="form-control" >
<input type=hidden value="<?php echo $stgldo; ?>" name=stgldo class="form-control" >
<input type=hidden value="<?php echo $detailx[0]->scid; ?>" name=scid class="form-control" >
<input type=hidden value="<?php echo $detailx[0]->snodo; ?>" name=snodo class="form-control" >
<input type=hidden value="<?php echo $detailx[0]->snopol; ?>" name=snopol class="form-control" >
<input type=hidden value="<?php echo $detailx[0]->snomor; ?>" name=snomor class="form-control" >
  <div class="panel-body">
                            <div class="table-responsive">
							<?php 
							$freeppn=$detailx[0]->sfreeppn;
							//echo $freeppn; 
							?>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
          <th>Kode Product</th>
          <th>Name Product</th>
          <th>Qty</th>

                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
		$totalqty=0;  
		$total=0;
		$totalppn=0;
		$totalall=0;
		
		foreach($detail as $k => $v) :	
			//print_r($detail[0]);

			$qtyy= $detail[$k]->sqty;
			echo $qtyy;
			if($qtyy>0){
    ?>
          <tr>
          
          <td><?php echo $v -> pcode; ?>
		  <input type=hidden name="spid[]" value="<?php echo $v -> spid; ?>">
		  <input type=hidden name="sid[]" value="<?php echo $v -> sid; ?>">
		  <input type=hidden name="qty[]" value="<?php echo $v -> sqty; ?>">
		  </td>
		  <td><?php echo $v -> pname; ?></td>
          <td><select name="sqty[]">
		  
		  <?php 
		  echo "<option>$qtyy</option>";	
		  
		  ?>
		  </select>
		  </td>

		  </tr>
        <?php 
		
		$totalqty=$qtyy+$totalqty;
		

		}
		endforeach; ?>
		
         <tr>          
          <td>SUB TOTAL</td>
		  <td></td>
          <td><?php echo $totalqty; ?></td>
          
		 </tr>		
        
                                    </tbody>
                                </table>
								
		<?php $stat= $detailx[0]->dstatus; 
		//echo $stat;
		?>						
		<br>
		<?php if($stat < 3){ ?>
		<a href="<?php echo site_url('sales_order_detail/home/delivery_order_details_add/'.$id.'/'.$scid.'/'.$snodo); ?>" >
		<input type=button  class="btn text-muted text-center btn-primary" value="EDIT DO" ></a>
		<?php } ?>
		<input type=submit  class="btn text-muted text-center btn-danger" value="DO DONE" >						
		</form>						

                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
