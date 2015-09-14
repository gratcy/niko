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
            <h5>Retur Order <?php //echo "$id $scid";?></h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>

	 <form  id="form1" class="form-horizontal" action="<?php echo site_url("retur_order_detail/home/retur_order_detail_add/$id/$scid"); ?>" method="post">
	<table border=0 width=90% ><tr><td width=50%>
	<input type=hidden name=sbid value="<?php echo $detailx[0]->sbid; ?>">


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Return No.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->snoro; ?>" class="form-control" disabled>
                    </div>
                </div>

				
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->cname; ?>" class="form-control" disabled>
                    </div>
                </div>
				
			

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Status</label>

                    <div class="col-lg-4">
					<?php
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
                       	<input type=text value="<?php echo $sstatuss; ?>" class="form-control" disabled>
                    </div>
                </div>					
	</td><td width=40%>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $detailx[0]->stgl; ?>" class="form-control" disabled>
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





 <form  id="form1" class="form-horizontal" action="" method="POST">

  <div class="panel-body">
                            <div class="table-responsive">
							<?php 
							$freeppn=$detailx[0]->sfreeppn;
							?>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
          <th>Code </th>
          <th>Name </th>
          <th>Qty/Pcs</th>
          <th>Accept</th>
          <th>Reject </th>
		   <th>Price / pcs </th>
		   <th>Total Price  </th>
		 
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
	
		$totalqty=0;  
		$total=0;
		$totalppn=0;
		$totalall=0;
		
		foreach($detail as $k => $v) :	
			if(!isset($_POST['input'])){$_POST['input']="";}			
			if(!isset($_POST['sprice'][$k])){$_POST['sprice'][$k]="";}
			if($_POST){
			//print_r($_POST);
			$sprice=$_POST['sprice'][$k];
			if($sprice==""){$sprice=$v -> sprice;}
			}else{
			$sprice=$v -> sprice;
			}
			
			$sqtyx=$v -> sqty;
			$spricex=$v -> sprice;
			$sdiscx=$v -> sdisc;
			$qtyx=$v -> sqty;			
			$subtotal=$sqtyx * ($spricex - ($spricex * $sdiscx/100));
			
	
    ?>
	

          <tr>
          <input type=hidden name="sid[]" value="<?php echo $v -> sid; ?>">
          <td><?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
          <td><?php echo $v -> pname; ?></td>
		  <td><?php echo $v -> sqty; ?></td>
          <td><?php echo $v -> saccept; ?><input type=hidden name="saccept[]" value="<?php echo $v -> saccept; ?>"></td>
		  <?php $sum_sprice= $v -> saccept * $sprice;?>
          <td><?php echo $v -> sreject; ?></td>
		  <td><input type=text name="sprice[]" value="<?php echo $sprice; ?>"></td>
		  <td><input type=text name="sum_sprice[]" value="<?php echo $sum_sprice;?>" disabled ></td>	
		  </tr>
        <?php 
		
		$total=$sum_sprice+$total;
		$totalqty=$qtyx+$totalqty;
		$totalppn=$total * 10/100;
		if($freeppn==1){
		$totalall= $total;
		}else{
		$totalall= $total + $totalppn;
		}
		endforeach; ?>
          <tr>
          
          <td colspan=6>TOTAL</td>
          <td><?php echo $total;?>
		  <input type=hidden name="spotong" value="<?php echo $total; ?>">
		  
		  </td>	
		  </tr>		
        
                                    </tbody>
                                </table>
	<?php if($stat==3){?>			
    <?php if($_POST['input']<>""){ ?>
	<input type=submit name="approve" value="APPROVE" class="btn text-muted text-center btn-danger">
	<input type=submit value="CANCEL" class="btn text-muted text-center btn-danger">
     <?php }else{ ?>	
     <input type=submit name=input value="INPUT" class="btn text-muted text-center btn-danger">
	 <?php } ?>
	 </form>
			<!--a href="javascript:void(0);" onclick="print_data('<?php echo site_url('retur_order_detail/home/retur_order_report/'.$id.'/'.$scid); ?>', 'Print SO');"><input class="btn text-muted text-center btn-danger" type=button value=PRINT></a-->
			   <?php }else{?>
				<a href="javascript:void(0);" onclick="print_data('<?php echo site_url('retur_order_detail/home/retur_order_report/'.$id.'/'.$scid); ?>', 'Print Retur Order');"><input class="btn text-muted text-center btn-danger" type=button value=PRINT></a>		
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