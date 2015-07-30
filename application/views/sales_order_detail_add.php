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
		<?php $sbidx=$detailx[0]->sbid;?>
<script>
$(function() {
$("#search").autocomplete({
delay:0, 
cacheLength: 0,
minLength: 1,
    source: '<?php echo site_url('sales_order_detail/home/sourcex/'.$scid.'/'.$sbidx); ?>',
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






<script type="text/javascript" >
function validateForm()
{
var goodColor = "#66cc66";
var badColor = "#ff6666";

 var messagea = document.getElementById('confirmMessagea');
 var a=document.forms["myForm"]["pname"].value;

 var b=parseInt(document.forms["myForm"]["qtyx"].value);

 var messagec = document.getElementById('confirmMessagec');
 var c=document.forms["myForm"]["sqty"].value;
 
 var d=parseInt(document.forms["myForm"]["pricex"].value);

 var messagee = document.getElementById('confirmMessagee');
 var e=document.forms["myForm"]["price"].value; 
  
 var k=document.forms["myForm"]["ccat"].value;  
  
	if(a=="" )
	  {
	  //alert(1);
	  messagea.style.color = badColor;
	  messagea.innerHTML =  "Product Tidak Boleh Kosong";  
	  }else{
	   messagea.innerHTML = "";  
	  }  


	if( k==0 || k== 2){  
	

		if((c==null || c=="") || c < b )
		  {
		    
		  messagec.style.color = badColor;
		  messagec.innerHTML  = "Qty masih kosong atau dibawah batas qty";  
		  }else{
		   messagec.innerHTML = "";  
		  }  
	}else{
		   messagec.innerHTML = "";  
		  } 

 
	if(e==null || e=="" || e <= d )
	  {
	  messagee.style.color = badColor;
	  messagee.innerHTML  = " .";  
	  }else{
	     messagee.innerHTML = "";  
	  }  
	  
 if(  messagea.innerHTML==""   &&  messagec.innerHTML==""   )
 {

  return true;
 } else{

  return false;
 } 
  
  
  }
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
            <h5>Sales Order Detail Add <?php //echo "$id $scid";?></h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
								<a href="<?php echo site_url("sales_order/home/sales_order_update/$id/$scid"); ?>">
					<button class="btn text-muted text-center btn-primary" >Edit Header</button>	
					</a>

 <form  id="form1" name="myForm" class="form-horizontal" action="<?php echo site_url("sales_order_detail/home/sales_order_detail_add/$id/$scid"); ?>" method="post">
<table border=0 width=90% ><tr><td width=50%>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Branch  </label>

                    <div class="col-lg-4">	
					<input type=text value="<?php echo $detailx[0]->bname; ?>" class="form-control" disabled>
					<input type=hidden value="<?php echo $detailx[0]->sbid; ?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sales Order No.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->snoso; ?>" class="form-control" disabled>
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
				

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $detailx[0]->stgl; ?>" class="form-control" disabled>
                    </div>   							
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Due Date</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $detailx[0]->sduedate; ?>" class="form-control" disabled>
                    </div>   							
                </div>				
				
               <div class="form-group">
							<label for="status" class="control-label col-lg-4">FREE PPN</label>
                    <div class="col-lg-4">
                            <div class="make-switch has-switch" data-on="danger" data-off="default"  >
                                <?php echo __get_ppn($detailx[0] -> sfreeppn,2); ?> 
                            </div>
					</div>
				</div>	


				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Current Plafon Limit</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $detailx[0]->sisaplafon; ?>" class="form-control"  disabled >
                        <input type=hidden value="<?php echo $detailx[0]->sisaplafon; ?>" class="form-control" name="sisaplafon" >
                    </div>
                </div>			
				

				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Category Customer</label>
		<?php 
		$ccats= $detailx[0]->ccat; 
		if($ccats==0){
			$cname="Dist";
		}elseif($ccats==1){
			$cname="Reguler";
		}elseif($ccats==2){
			$cname="Semi";
		}elseif($ccats==3){
			$cname="Cash";
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
                    <label for="text1" class="control-label col-lg-4">Payment Type</label>

                    <div class="col-lg-4">           
						<?php
						$stypepay=$detailx[0]->stypepay;
						if($stypepay == "auto"){
							if($ccats==3){ 	$stype="cash";	}else{ $stype="credit";}
						}else{ $stype=$stypepay ;}
						?>
					   <input type=text value="<?php echo $stype; ?>" class="form-control" disabled>
					   <input type=hidden value="<?php echo $detailx[0]->stypepay; ?>" name="stypepay">
                    </div>
                </div>


               <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Product</label>

                    <div class="col-lg-4">
                        <input  name=pname type="text" id="search" class="form-control"   />
						&nbsp;&nbsp;<span id="confirmMessagea"></span>
                    </div>
                </div>	
		

						<input type=hidden  id="theStore" class="form-control" name="pricestore" >
						<input type=hidden  id="theKey" class="form-control" name="pricekey" >
						<input type=hidden  id="theDist" class="form-control" name="pricedist" >
						<input type=hidden  id="thePricex" class="form-control" name="pricex" >
						<input type=hidden  id="theSemi" class="form-control" name="pricesemi" >
						<input type=hidden  id="theConsume" class="form-control" name="priceconsume" >
		<?php 
		$ccats= $detailx[0]->ccat; 
		if($ccats==0){
		?>	

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Price Distributor</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theDistt" class="form-control" disabled>

                    </div>
                </div>				
		<?php }elseif($ccats==1){ ?>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Price Kunci</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theKeyy" class="form-control" disabled>
                    </div>
                </div>	
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Price Store</label>
                    <div class="col-lg-4">
                       	<input type=text  id="theStoree" class="form-control" disabled>						
                    </div>
                </div>	
<?php }elseif($ccats==2){ ?>			
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Price Semi</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theSemii" class="form-control" disabled>
						
				
						
                    </div>
                </div>	

<?php }elseif($ccats==3){ ?>					
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Price Consumer</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theConsumee" class="form-control" disabled>
						
						
						
                    </div>
                </div>					
				
<?php }?>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Limit QTY</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theQty" class="form-control" disabled>
							<input type=hidden  id="theId" class="form-control" name=spid  >
							<input type=hidden  id="theQtyx" class="form-control" name=qtyx  >
							
                    </div>
                </div>	

				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Cash Discount</label>

                    <div class="col-lg-4">
                       	<?php
						if($detailx[0]->stypepay=="cash"){ ?>  
							<input type=text  id="thePdisc" class="form-control" name=ddisc  >
						<?php }elseif($detailx[0]->stypepay=="credit"){ ?>  
							<input type=text   class="form-control" name=ddisc value="0" >
						<?php }else{?>	
						<input type=text  id="theDisc" class="form-control" name=ddisc  >
						<?php }?>
                    </div>
                </div>					

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">QTY</label>

                    <div class="col-lg-4">
                       	<input type=text   class="form-control" name=sqty  >
						<input type=hidden  value=0 name="add_plafon" >
						&nbsp;&nbsp;<span id="confirmMessagec"></span>
                    </div>
                </div>	
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Price</label>

                    <div class="col-lg-4">
                       	<?php
						if($detailx[0]->stypepay=="cash"){ ?>  
                       	<input type=text  id="theConsumeee" name=price  class="form-control" >						
						<?php }elseif($ccats==1){ ?> 
						<input type=hidden   name=price  class="form-control" >
						<?php }elseif($ccats==0){ ?>
						<input type=text  id="theDisttt" name=price  class="form-control" >
						<?php }elseif($ccats==2){ ?>
						<input type=text  id="theSemiii" name=price  class="form-control" >
						<?php } elseif(($ccats==3) and ($detailx[0]->stypepay=="auto")){ ?>
						<input type=text  id="theConsumeee" name=price  class="form-control" >
						<?php } elseif(($ccats==3) and ($detailx[0]->stypepay=="credit")){ ?>
						<input type=hidden   name=price  class="form-control" >
						<?php } ?>
						&nbsp;&nbsp;<span id="confirmMessagee"></span>
                    </div>
                </div>					
		
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>

                    
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
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
          <th>Code Product</th>
          
          <th>Qty</th>
          <th>Harga</th>
          <th>Discount </th>
		  <th>Jumlah</th>
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
          
          <td><?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
          <td><?php echo $v -> sqty; ?></td>
          <td><?php echo $v -> sprice; ?></td>
          <td><?php echo $v -> sdisc; ?></td>
		  <td> <?php echo $subtotal; ?> </td>		
		  <td><a href="<?php echo site_url('sales_order_detail/home/sales_order_detail_delete/' . $v -> sid .'/'.$id.'/'.$scid ); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a></td>
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
		
         <tr>          
          <td>SUB TOTAL</td>
          <td><?php echo $totalqty; ?></td>
          <td></td>
          <td></td>
          <td><?php echo $total; ?></td>
		 </tr>		
         <tr>          
          <td>PPN</td>
          <td><?php echo $persen;?> % </td>
          <td></td>
          <td></td>
          <td><?php echo $totalppn; ?></td>
		 </tr>			
         <tr>          
          <td>TOTAL</td>
          <td></td>
          <td></td>
          <td></td>
          <td><?php echo $totalall; ?></td>
		 </tr>		 
                                    </tbody>
                                </table>
		<?php 
		$sisaplafon=$detailx[0]->sisaplafon;
		if($totalall <=	$sisaplafon	){	
		$sisaplafon_after= $sisaplafon -$totalall;

		?>	
		<form method="POST" action="<?php echo site_url('sales_order_detail/home/sales_order_details/'.$id.'/'.$scid); ?>" >
		<input type=hidden  value="<?php echo $id;?>" name="id" >
		<input type=hidden  value="<?php echo $scid;?>" name="scid" >
		<input type=hidden  value="<?php echo $sisaplafon_after;?>" name="sisaplafon_after" >
		<input type=hidden  value=1 name="approve" >
		<input type=hidden  value=0 name="add_plafon" >		
		<input class="btn text-muted text-center btn-danger" type=submit value="Complete Approval" >
		</form>	
		<?php }else{ ?>
		Sisa Plafon Anda Kurang <br> 
		<!--Silahkan Edit Item atau Tambah Plafon<br>
		<form method="POST"  >
		<input type=hidden  value="<?php //echo $scid;?>" name="scid" >
		<input type=hidden  value="<?php //echo $sisaplafon;?>" name="sisa" >
		<input type=text   name="plafon" >
		<input type=hidden  value=1 name="add_plafon" >
		<input class="btn text-muted text-center btn-danger" type=submit value="TAMBAH PLAFON"  >
		</form-->		
		
    <?php } ?>
                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
