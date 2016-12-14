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
            <h5>Return Order <?php //echo "$id $scid";?></h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>

	 <form  id="form1" class="form-horizontal" action="<?php echo site_url("retur_order_detail/home/retur_order_detail_add/$id/$scid"); ?>" method="post">
	<table border=0 width=90% ><tr><td width=50%>
	<input type=hidden name=sbid value="<?php echo $detailx[0]->sbid; ?>">



                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Reff No.</label>

                    <div class="col-lg-4">
                       
					   <input type=text value="<?php echo $detailx[0]->sreff; ?>" class="form-control" disabled>
                    </div>
                </div>
				
	                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Return No.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->snoro; ?>" class="form-control" disabled>
                    </div>
                </div>			
				
				
<div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sending Date.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo __get_date(strtotime($detailx[0]->scdate),1); ?>" class="form-control" disabled>
                    </div>
                </div>					

	<div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Receiving Date.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
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

                	
	</td><td width=40% valign=top >
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
          
          <th>Code</th>
          <th>Name</th>
          <th>Qty/Pcs</th>
          <th>Accept</th>
          <th>Reject </th>
		  <th>Return Type </th>
		   <th>Price</th>
		   <th>Total </th>
		 
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
          
          <td><?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
		  <td><?php echo $v -> pname; ?><input type=hidden name="pname[]" value="<?php echo $v -> pname; ?>"></td>
          <td><?php echo $v -> sqty; ?></td>
          <td><?php echo $v -> saccept; ?><input type=hidden name="saccept[]" value="<?php echo $v -> saccept; ?>"></td>
		  <?php $sum_sprice= $v -> saccept * $sprice;?>
          <td><?php echo $v -> sreject; ?></td>
		  <td><?=$v -> srtype;?></td>
		  <td><?php echo __get_rupiah($sprice,2); ?></td>
		  <td><?php echo __get_rupiah($sum_sprice,2);?></td>	
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
          
          <td colspan=7>TOTAL</td>
          <td><?php echo __get_rupiah($total,2);?></td>	
		  </tr>		
        
                                    </tbody>
                                </table>

	 </form>
			<a href="<?php echo site_url('retur_order_detail/home/retur_order_report/'.$id.'/'.$scid.'?tg=0'); ?>" target="_blank"><input class="btn text-muted text-center btn-danger" type=button value=PRINT></a>
			
			<a href="<?php echo site_url('retur_order_detail/home/retur_order_report/'.$id.'/'.$scid.'?tg=1'); ?>" target="_blank"><input class="btn text-muted text-center btn-primary" type=button value=PRINT></a>
			  
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
