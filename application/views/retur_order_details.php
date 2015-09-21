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
            <h5>retur order <?php //echo "$id $scid";?></h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>

	 <form  id="form1" class="form-horizontal" action="<?php echo site_url("retur_order_detail/home/retur_order_detail_add/$id/$scid"); ?>" method="post">
	<table border=0 width=90% ><tr><td width=50%>
	<input type=hidden name=sbid value="<?php echo $detailx[0]->sbid; ?>">


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Retur No.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->snoro; ?>" class="form-control" disabled>
                    </div>
                </div>

				
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $detailx[0]->stgl; ?>" class="form-control" disabled>
                    </div>   							
                </div>				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->cname; ?>" class="form-control" disabled>
                    </div>
                </div>
				
			<?php 			
				$ccats= $detailx[0]->ctyperetur; 
				if($ccats==0){
					$cname="Tukar Barang";
				}elseif($ccats==1){
					$cname="Potong Piutang";
				}
			?>	
			<div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Return Type</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $cname; ?>" class="form-control" disabled>
                    </div>   							
                </div>			

                <!--div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Status</label>

                    <div class="col-lg-4">
					<?php
					//print_r($detailx);
					
					$stat=$detailx[0]->sstatus;
					if($stat==0){
					$sstatuss="Not Active";					
					}elseif($stat==1){
					$sstatuss="Active";					
					}elseif($stat==2){
					$sstatuss="Remove";					
					}elseif($stat==3){
					$sstatuss="Approve";					
					}elseif($stat==4){
					$sstatuss="Done";					
					}
					
					?>
                       	<input type=text value="<?php //echo $sstatuss; ?>" class="form-control" disabled>
                    </div>
                </div-->					
	</td><td width=50%>
               




				
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





 <!--form  id="form1" class="form-horizontal" action="<?php //echo site_url("retur_order_detail/home/retur_order_detail_add/$id/$scid"); ?>" method="post"-->

  <div class="panel-body">
                            <div class="table-responsive">
							<?php 
							$freeppn=$detailx[0]->sfreeppn;
							//echo $freeppn; 
							?>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
          <th>Code</th>
          <th>Name</th>
          <th>Qty/Pcs</th>
          <th>Accept</th>
          <th>Reject </th>
		  <th>Note </th>
		 
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
          
          <td><?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
		  <td><?php echo $v -> pname; ?></td>
          <td><?php echo $v -> sqty; ?></td>
          <td><?php echo $v -> saccept; ?></td>
          <td><?php echo $v -> sreject; ?></td>
		  <td><?php echo $v -> note; ?></td>
		  	
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
	<?php 
	//echo $stat;
	if($stat>=3){?>				

			<a href="<?php echo site_url('retur_order_detail/home/retur_order_report/'.$id.'/'.$scid); ?>" target="_blank"><input class="btn text-muted text-center btn-danger" type=button value=PRINT></a>
			   <?php }else{?>
			<a href="<?php echo site_url('retur_order_detail/home/retur_order_detail_add/'.$id.'/'.$scid); ?>"><input type=button class="btn text-muted text-center btn-danger" value="APPROVE / EDIT SO"></a>		
    <?php } ?>
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
