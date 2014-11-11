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
            <!--form class="form-horizontal" action="<?php echo site_url('sales_order_detail/home/sales_order_detail_add'); ?>" method="post"-->
<?php //echo site_url('application/views/assets/sourcex.php?scid='.$scid); ?>	
<?php  
//print_r($detailx);
//print_r($detail);die;
?>


 <form  id="form1" class="form-horizontal" action="<?php echo site_url("sales_order_detail/home/sales_order_detail_add/$id/$scid"); ?>" method="post">
<table border=0 width=90% ><tr><td width=50%>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Cabang</label>

                    <div class="col-lg-4">	
					<input type=text value="<?php echo $detailx[0]->bname; ?>" class="form-control" disabled>
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
                    </div>
                </div>
				
			
				
</td><td width=40%>

 <?php 
			$stgldos=$detailx[0]->stgldo;			
			$stgldox = explode("-",$stgldos);			
			$stgldo="$stgldox[2]/$stgldox[1]/$stgldox[0]";
			
?>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Tanggal</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $stgldo; ?>" class="form-control" disabled>
                    </div>   							
                </div>

              
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No Pol</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->snopol; ?>" class="form-control" disabled>
                    </div>
                </div>	


				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Keterangan</label>

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

<input type=hidden value="<?php echo $detailx[0]->scid; ?>" name=scid class="form-control" >
<input type=hidden value="<?php echo $stgldo; ?>" name=stgldo class="form-control" >
<input type=hidden value="<?php echo $detailx[0]->scid; ?>" name=scid class="form-control" >
<input type=hidden value="<?php echo $detailx[0]->snodo; ?>" name=snodo class="form-control" >
<input type=hidden value="<?php echo $detailx[0]->snopol; ?>" name=snopol class="form-control" >
<input type=hidden value="<?php echo $detailx[0]->snomor; ?>" name=snomor class="form-control" >
<div class="panel-body">
                            <div class="table-responsive">
							<?php 	$freeppn=$detailx[0]->sfreeppn;		?>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
          <th>Kode Product</th>
          <th>Nama Product</th>
          <th>Qty</th>

                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
		$totalqty=0;  
		$total=0;
		$totalppn=0;
		$totalall=0;
		
		foreach($details as $l => $m) :	
		?>
		<input type=hidden name="qty[]" value="<?php echo $m -> sqty; ?>">
		<?php
		endforeach;
		foreach($detail as $k => $v) :	
			
			$sqtyx=$v -> sqty;
			$qtyx=$v -> sqty;
			$subtotal=$sqtyx;
	
    ?>
          <tr>
          
          <td>
		  <input type=hidden name="spid[]" value="<?php echo $v -> spid; ?>">
		  <input type=hidden name="sid[]" value="<?php echo $v -> sid; ?>">
		  <input type=hidden name="sqty[]" value="<?php echo $v -> sqty; ?>">
		  <?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
		  <td><?php echo $v -> pname; ?></td>
          <td><?php echo $v -> sqty; ?></td>

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
		
         <tr>          
          <td>SUB TOTAL</td>
		  <td></td>
          <td><?php echo $totalqty; ?></td>
          
		 </tr>		
        
                                    </tbody>
                                </table>
								<br>
		<table border=0>
        <tr><td>		
								
		<?php 	if ($detailx[0]->dstatus==1){?>						
			<input class="btn text-muted text-center btn-danger" type=submit value="POSTING DO">
		<?php }?>						
			</form></td><td>
		<?php 
		if ($detailx[0]->dstatus==1){?>						
		<form action="<?php echo site_url('sales_order_detail/home/delivery_order_details_add/'.$id.'/'.$scid.'/'.$snodo); ?>" ><input class="btn text-muted text-center btn-primary" type=submit value="EDIT DO" ></form>	
		<?php }else{?>
		<form action="<?php echo site_url('sales_order_detail/home/delivery_order_report/'.$id.'/'.$scid.'/'.$snodo); ?>" ><input class="btn text-muted text-center btn-danger" type=submit value="CETAK" ></form>	
		<?php }?></td></tr></table>

                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
