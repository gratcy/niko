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

	<input type=hidden name=sbid value="<?php echo $detailx[0]->sbid; ?>">


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2" style="text-align:left!important;">Return No.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->snoro; ?>" class="form-control" disabled>
                    </div>
                </div>

				
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2" style="text-align:left!important;">Customer</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->cname; ?>" class="form-control" disabled>
                    </div>
                </div>
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2" style="text-align:left!important;">Sales</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->sname; ?>" class="form-control" disabled>
                    </div>
                </div>				
				
			
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-2" style="text-align:left!important;">Date</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $detailx[0]->stgl; ?>" class="form-control" disabled>
                    </div>   							
                </div>
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
          <th style="width:250px;">Name </th>
          <th>Qty/Pcs</th>
          <th>Accept</th>
          <th>Reject </th>
		   <th style="width:150px;">Price </th>
		   <th style="width:150px;">Total Price  </th>
		 
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
			$spricez = str_replace(',','',$_POST['sprice'][$k]);	
			//print_r($_POST);
			$sprice=$spricez;
			if($sprice==""){$sprice=str_replace(',','',$v -> sprice);}
			}else{
			$sprice=str_replace(',','',$v -> sprice);
			}
			
			$sqtyx=$v -> sqty;
			$spricex=str_replace(',','',$v -> sprice);
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
		  <td><input type="text" name="sprice[]" value="<?php echo __get_rupiah($sprice,2); ?>" class="form-control" onkeyup="formatharga(this.value,this)"></td>
		  <td><input type="text" name="sum_sprice[]" value="<?php echo __get_rupiah($sum_sprice,2);?>" class="form-control" disabled ></td>	
		  </tr>
        <?php 
		$stat = $detailx[0] -> sstatus;
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
          <td><?php echo __get_rupiah($total,2);?>
		  <input type=hidden name="spotong" value="<?php echo $total; ?>">
		  
		  </td>	
		  </tr>		
        
                                    </tbody>
                                </table>
							
	<?php if($stat==3){?>		
		
    <?php if($_POST['input']<>""){ ?>
	<input type=submit name="approve" value="Complete Approval" class="btn text-muted text-center btn-danger">
	<input type=submit value="Edit" class="btn text-muted text-center btn-primary">
     <?php }else{ ?>	
     <input type=submit name=input value="Input" class="btn text-muted text-center btn-primary">
	 <?php } ?>
	 </form>
			<!--a href="javascript:void(0);" onclick="print_data('<?php echo site_url('retur_order_detail/home/retur_order_report/'.$id.'/'.$scid); ?>', 'Print SO');"><input class="btn text-muted text-center btn-danger" type=button value=PRINT></a-->
			   <?php }else{?>
				<!--a href="javascript:void(0);" onclick="print_data('<?php echo site_url('retur_order_detail/home/retur_order_report/'.$id.'/'.$scid); ?>', 'Print Retur Order');"><input class="btn text-muted text-center btn-danger" type=button value=PRINT></a-->		
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
