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
            <h5>Sales Order <?php //echo "$id $scid";?></h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>

	 <form  id="form1" class="form-horizontal" action="<?php echo site_url("sales_order_detail/home/sales_order_detail_add/$id/$scid"); ?>" method="post">
	<table border=0 width=90% ><tr><td width=50%>
	<input type=hidden name=sbid value="<?php echo $detailx[0]->sbid; ?>">


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">SO No.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->snoso; ?>" class="form-control" disabled>
                    </div>
                </div>

				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo __get_date(strtotime($detailx[0]->stgl),1); ?>" class="form-control" disabled>
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
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Status</label>

                    <div class="col-lg-4">
					<?php
					// echo '<pre>';
					// print_r($detailx[0]);
					// echo '</pre>';
					$stat=$detailx[0]->sstatus;
					if($stat==0){
					$sstatuss="Not Active";					
					}
					if($stat==1){
					$sstatuss="Active";					
					}
					if($stat==2){
					$sstatuss="Remove";					
					}
					if($stat==3){
					$sstatuss="Approved";					
					}
					
					if($detailx[0]->dstatus==3){
					$sstatuss="Done";					
					}
					
					?>
                       	<input type=text value="<?php echo $sstatuss; ?>" class="form-control" disabled>
                    </div>
                </div>		
               <div class="form-group">
							<label for="status" class="control-label col-lg-4">PPN</label>
                    <div class="col-lg-4">
						<?php if ($stat == 3) : ?>
                               <input type=text value="<?php echo __get_ppn($detailx[0] -> sfreeppn,1); ?>" class="form-control" disabled>
						<?php else :?>
                            <!--div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php //echo __get_ppn($detailx[0] -> sfreeppn,2); ?>
                            </div-->
							<input type=text value="<?php echo __get_ppn($detailx[0] -> sfreeppn,1); ?>" class="form-control" disabled>
                            <?php endif; ?>
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





 <!--form  id="form1" class="form-horizontal" action="<?php //echo site_url("sales_order_detail/home/sales_order_detail_add/$id/$scid"); ?>" method="post"-->

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
		  <th>Qty/Coly</th>
		  <th>Qty/Pcs</th>
          <th>Normal Price</th>
          <th>Promo Discount </th>
		  <th>Payment Discount </th>
		  <th>Net Price </th>
		  <th>Total</th>
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
			if($freeppn==0){
				$spricex=$v -> sprice;
			}else{
			$spricex=$v -> sprice/1.1;
			}
			$sdiscx=$v -> sdisc;
			$qtyx=$v -> sqty;			
			$subtotal=$sqtyx * ($spricex - ($spricex * $sdiscx/100));
	
    ?>
          <tr>
          
          <td><?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
		  <td><?php echo $v -> pname; ?></td>
		  <td><?php echo $v -> sqty/$v -> pvolume; ?></td>
          <td><?php echo $v -> sqty; ?></td>
          <td align=right ><?php echo __get_rupiah($spricex,2); ?></td>
          <td align=right ><?php echo __get_rupiah($v -> spromodisc,2); ?></td>
		  <td align=right ><?php 
		  $promod=$v -> sdisc*($spricex -$v -> spromodisc)/100;
		  echo __get_rupiah($promod,2); ?></td>
		  <td align=right ><?php 
		  $netprice=$spricex-($v -> spromodisc + $promod);
		  
			if($freeppn==0){
				$netprice=$netprice;
			}else{
			$netprice=$netprice/1.1;
			}	  

		  
		  echo __get_rupiah($netprice,2); ?></td>
		  <td align=right> <?php 
		  $subtotal=$sqtyx * $netprice;
		  echo __get_rupiah($subtotal,2); ?> </td>		
		  </tr>
        <?php 
		$total=$subtotal+$total;
		$totalqty=$qtyx+$totalqty;
		$totalppn=$total * 10/100;
		if($freeppn==0){
		$totalall= $total;
		}else{
		$totalall= $total + $totalppn;
		}
		endforeach; ?>
		
         <tr>          
          <td>SUB TOTAL</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
          <td><?php echo $totalqty; ?></td>          
          <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
          <td align=right  ><?php echo __get_rupiah($total,2); ?></td>
		 </tr>		
         <tr>          
          <td>PPN</td>		  
          <td><?php if($freeppn==1){ echo 10;}else{echo 0;}?>%</td>
          <td>&nbsp;</td>
		  <td></td>
          <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
          <td align=right ><?php 
		  if($freeppn==1){ echo __get_rupiah($totalppn,2); }else{echo 0;}?></td>
		 </tr>			
         <tr>          
          <td>TOTAL</td>
		  <td>&nbsp;</td>
          <td></td>
          <td></td>
          <td></td>
		  <td></td>
		  <td></td>
		  <td></td>	
          <td align=right  ><?php echo __get_rupiah($totalall,2); ?></td>
		 </tr>		 
                                    </tbody>
                                </table>
	<?php if($stat==3){?>				

			<!--a href="javascript:void(0);" onclick="print_data('<?php //echo site_url('sales_order_detail/home/sales_order_report/'.$id.'/'.$scid); ?>', 'Print SO');"><input class="btn text-muted text-center btn-danger" type=button value=PRINT></a-->
			
			<a href="<?php echo site_url('sales_order_detail/home/sales_order_report/'.$id.'/'.$scid); ?>"  target=blank ><input class="btn text-muted text-center btn-danger" type=button value=PRINT></a>
			
			
			
			
			
			   <?php }else{?>
			<a href="<?php echo site_url('sales_order_detail/home/sales_order_detail_add/'.$id.'/'.$scid); ?>"><input type=button class="btn text-muted text-center btn-danger" value="APPROVE / EDIT"></a>		
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
