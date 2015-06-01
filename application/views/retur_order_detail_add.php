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
    source: '<?php echo site_url('retur_order_detail/home/sourcex/'.$scid); ?>',
     select: function(event, ui) { 
	    $("#theId").val(ui.item.pid),
        $("#theCid").val(ui.item.pcid),
		$("#theCode").val(ui.item.pcode),
		$("#theHpp").val(ui.item.phpp),
		$("#theDist").val(ui.item.pdist),
		$("#theDistt").val(ui.item.pdist),
		$("#theDisttt").val(ui.item.pdist),
		$("#theSemi").val(ui.item.psemi),
		$("#theSemii").val(ui.item.psemi),
		$("#theSemiii").val(ui.item.psemi),
		$("#theKey").val(ui.item.pkey),
		$("#theKeyy").val(ui.item.pkey),
		$("#theStore").val(ui.item.pstore),
		$("#theStoree").val(ui.item.pstore),
		$("#theConsume").val(ui.item.pconsume),
		$("#theConsumee").val(ui.item.pconsume),
		$("#theConsumeee").val(ui.item.pconsume),
		$("#thePoint").val(ui.item.ppoint),
		$("#thePdisc").val(ui.item.pdisc),
		$("#theDisc").val(ui.item.ddisc),
		$("#thePrice").val(ui.item.price),
		$("#thePricex").val(ui.item.price),
		$("#theQty").val(ui.item.mqty),
		$("#theQtyx").val(ui.item.mqty),
		$("#theStatus").val(ui.item.pstatus),
		$("#thePriceq").val(ui.item.priceq),
		$("#thePriceqq").val(ui.item.priceq),
		$("#theCcat").val(ui.item.ccat),
		$("#theCcatt").val(ui.item.ccat),
		$("#theNamecat").val(ui.item.namecat)
	
		
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
            <h5>Retur Order Detail Add <?php //echo "$id $scid";?></h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>


 <form  id="form1" name="myForm" class="form-horizontal" action="<?php echo site_url("retur_order_detail/home/retur_order_detail_add/$id/$scid"); ?>" method="post">
<table border=0 width=90% ><tr><td width=50%>


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No Retur</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->snoro; ?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Reff</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->sreff; ?>" class="form-control" disabled>
                    </div>
                </div>
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->cname; ?>" class="form-control" disabled>
                    </div>
                </div>
				


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Tanggal</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $detailx[0]->stgl; ?>" class="form-control" disabled>
                    </div>   							
                </div>

   		
				
              
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Type Retur</label>
		<?php 
		
		$ccats= $detailx[0]->ctyperetur; 
		if($ccats==0){
			$cname="Tukar Barang";
		}elseif($ccats==1){
			$cname="Potong Piutang";
		}

		?>
                    <div class="col-lg-4">
                       	<!--input type=text  id="theNamecat" class="form-control" disabled-->
						<input type=text   class="form-control" value="<?php echo $cname; ?>" disabled >
						<input type=hidden  value="<?php echo $ccats; ?>" class="form-control" name="ccat" >
						
                    </div>
                </div>					
				
		
		</td><td width=40%>


               <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Product</label>

                    <div class="col-lg-4">
                        <input  name=pname type="text" id="search" class="form-control"   />
						&nbsp;&nbsp;<span id="confirmMessagea"></span>
                    </div>
                </div>	
		
<input type=hidden  id="theId" class="form-control" name=spid  >
						<input type=hidden  id="theStore" class="form-control" name="pricestore" >
						<input type=hidden  id="theKey" class="form-control" name="pricekey" >
						<input type=hidden  id="theDist" class="form-control" name="pricedist" >
						<input type=hidden  id="thePricex" class="form-control" name="pricex" >
						<input type=hidden  id="theSemi" class="form-control" name="pricesemi" >
						<input type=hidden  id="theConsume" class="form-control" name="priceconsume" >


    
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">QTY</label>

                    <div class="col-lg-4">
                       	<input type=text   class="form-control" name=sqty  >
						<input type=hidden  value=0 name="add_plafon" >
						&nbsp;&nbsp;<span id="confirmMessagec"></span>
                    </div>
                </div>	
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4"></label>

                    <div class="col-lg-4">
                       	<?php
						if($ccats==1){ ?> 
						<input type=hidden   name=price  class="form-control" >
						<?php }elseif($ccats==0){ ?>
						<input type=text  id="theDisttt" name=price  class="form-control" >
						<?php }elseif($ccats==2){ ?>
						<input type=text  id="theSemiii" name=price  class="form-control" >
						<?php } else{ ?>
						<input type=text  id="theConsumeee" name=price  class="form-control" >
						<?php }  ?>
						&nbsp;&nbsp;<span id="confirmMessagee"></span>
                    </div>
                </div>					
		
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
					<a href="<?php echo site_url("retur_order/home/retur_order_update/$id/$scid"); ?>">
					<button class="btn text-muted text-center btn-primary" >Edit Header</button>	
					</a>
                    
				<button onclick="return validateForm();" class="btn text-muted text-center btn-danger" type="submit">Submit</button>		
				</div>
				</td></tr></table>
            </form>
        </div>
    </div>
</div>


  <div class="panel-body">
                            <div class="table-responsive">
							<?php 
							$freeppn=$detailx[0]->sfreeppn;
							?>
							
		<form method="POST" action="<?php echo site_url('retur_order_detail/home/retur_order_details/'.$id.'/'.$scid); ?>" >
		<input type=hidden  value="<?php echo $id;?>" name="id" >
		<input type=hidden  value="<?php echo $scid;?>" name="scid" >

		<input type=hidden  value=1 name="approve" >
		<input type=hidden  value=0 name="add_plafon" >									
							
							
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
          <th>Kode Product</th>
          
          <th>Qty</th>
          <th>Reject</th>
		  <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
		$totalqty=0;  
		$total=0;
		$totalppn=0;
		$totalall=0;
		$persen=0;
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
		  <input type=hidden name="sid[]" value="<?php echo $v -> sid; ?>">
		  <input type=hidden name="sqty[]" value="<?php echo $v -> sqty; ?>">
		  </td>
          <td><?php echo $v -> sqty; ?></td>
          <td><select name="sreject[]" >
		  <?php 
		  echo "<option>" .$v -> sreject."</option>";
			for($i=$qtyx;$i>=0;$i--){
			echo "<option>$i</option>";
			}

		  ?></select></td>
		
		  <td><a href="<?php echo site_url('retur_order_detail/home/retur_order_detail_delete/' . $v -> sid .'/'.$id.'/'.$scid ); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a></td>
		  </tr>
        <?php 
		$total=$subtotal+$total;
		$totalqty=$qtyx+$totalqty;
		$totalppn=$total * 10/100;
		if($freeppn==1){
		$persen="0";
		$totalppn=0;		
		$totalall= $total;
		}else{
		$persen="10";
		$totalall= $total + $totalppn;
		}
		endforeach; ?>
		
         
                                    </tbody>
                                </table>
	

		<input class="btn text-muted text-center btn-danger" type=submit value="Complete Approval" >
		</form>	
		
                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
