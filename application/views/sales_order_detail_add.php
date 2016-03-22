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
		<?php $stypid=$detailx[0]->stype;
		//print_r($detailx[0]);
		//echo $sbidx.'-'.$stypid;die;
		?>
<script>
$(function() {
$("#search").autocomplete({
delay:0, 
cacheLength: 0,
minLength: 1,
    source: '<?php echo site_url('sales_order_detail/home/sourcex/'.$scid.'/'.$sbidx.'/'.$stypid); ?>',
     select: function(event, ui) { 
	    $("#theId").val(ui.item.pid),
        $("#theCid").val(ui.item.pcid),
		$("#thePpid").val(ui.item.ppid),
		$("#theCode").val(ui.item.pcode),
		$("#theHpp").val(ui.item.phpp),
		$("#theDist").val(ui.item.pdist),
		$("#theDistt").val(formatharga2(ui.item.pdist)),
		$("#theDisttt").val(formatharga2(ui.item.pdist)),
		$("#theSemi").val(formatharga2(ui.item.psemi)),
		$("#theSemii").val(formatharga2(ui.item.psemi)),
		$("#theSemiii").val(formatharga2(ui.item.psemi)),
		$("#theKey").val(ui.item.pkey),
		$("#theKeyy").val(ui.item.pkey),
		$("#theStore").val(ui.item.pstore),
		$("#theStoree").val(ui.item.pstore),
		$("#theConsume").val(ui.item.pconsume),
		$("#theConsumee").val(ui.item.pconsume),
		$("#theConsumeee").val(ui.item.pconsume),
		$("#theConsumeeee").val(ui.item.pconsume),
		$("#theCash").val(ui.item.pcash),
		$("#theCashh").val(ui.item.pcash),
		$("#thePoint").val(ui.item.ppoint),
		$("#thePdisc").val(ui.item.pdisc),
		$("#thePdiscnew").val(ui.item.pdisc),
		$("#thePdiscDatenew").val(ui.item.cdiscdate),
                $("#thePdiscDate").val(ui.item.cdiscdate),
		$("#theDisc").val(ui.item.ddisc),
		$("#theDiscnew").val(ui.item.ddisc),
		$("#thePrice").val(ui.item.price),
		$("#thePricex").val(ui.item.price),
		$("#theQty").val(ui.item.mqty),
		$("#theQtyx").val(ui.item.mqty),
		$("#theStatus").val(ui.item.pstatus),
		$("#thePriceq").val(ui.item.priceq),
		$("#thePriceqq").val(ui.item.priceq),
		$("#theCcat").val(ui.item.ccat),
		$("#theCcatt").val(ui.item.ccat),
		$("#theNamecat").val(ui.item.namecat),
		$("#thePvolumePcs").val(ui.item.pvolumepcs),
		$("#thePvolumePck").val(ui.item.pvolumepck),
		$("#thePvolumePckk").val(ui.item.pvolumepck)
	
		
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
	//alert( c );
	//if((c==null || c=="") || c < b )
		if(c=='' || c== 0 )	
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
	<?php echo __get_error_msg();
$discdate= $this->uri->segment(6);
	?>
							

 <form  id="form1" name="myForm" class="form-horizontal" action="<?php echo site_url("sales_order_detail/home/sales_order_detail_add/$id/$scid/$discdate"); ?>" method="post">
<table border=0 width=100% ><tr><td width=40% valign=top >
<input type=hidden name="discdate" value="<?=$discdate;?>">
                <!--div class="form-group" style="display:none">
                    <label for="text1" class="control-label col-lg-4">Branch  </label>

                    <div class="col-lg-4">	
					<input type=text value="<?php //echo $detailx[0]->bname; ?>" class="form-control" disabled>
					<input type=hidden value="<?php //echo $detailx[0]->sbid; ?>" class="form-control" disabled>
                    </div>
                </div-->
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Reff No.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->sreff; ?>" class="form-control" disabled>
                    </div>
                </div>
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
                    <label for="text1" class="control-label col-lg-4">Expire Date</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo __get_date(strtotime($detailx[0]->sduedate),1); ?>" class="form-control" disabled>
                    </div>   							
                </div>				
				
				
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->cname; ?>" class="form-control" disabled>
                    </div>
                </div>
				

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Category Customer</label>
		<?php 
		$ccats= $detailx[0]->ccat; 
		$cname = __get_customer_category($ccats,1);
		//print_r($detailx[0]);
		?>
                    <div class="col-lg-4">
                       	<!--input type=text  id="theNamecat" class="form-control" disabled-->
						<input type=text   class="form-control" value="<?php echo $cname; ?>" disabled >
						<input type=hidden  value="<?php echo $ccats; ?>" class="form-control" name="ccat" >
						
                    </div>
                </div>					
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sales</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->sname; ?>" class="form-control" disabled>
                    </div>
                </div>						
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Receivable</label>

                    <div class="col-lg-4">
					<input type=text value="<?php 
					
					$curlimit=$detailx[0]->toplimit - $detailx[0]->sisaplafon;
					echo __get_rupiah($curlimit,2); ?>" class="form-control"  disabled >
                        <input type=hidden value="<?php echo $detailx[0]->sisaplafon; ?>" class="form-control" name="sisaplafon" >
                    </div>
                </div>		

               <div class="form-group">
							<label for="status" class="control-label col-lg-4">PPN</label>
                    <div class="col-lg-4">
					<input type=text value="<?php echo __get_ppn($detailx[0] -> sfreeppn,1); ?>" class="form-control" disabled>
					</div>
				</div>	

				<div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Payment Type</label>

                    <div class="col-lg-4">           
						<?php
						$stypepay=$detailx[0]->stypepay;
						if($stypepay == "auto"){
							if($ccats==3){ 	$stype="cash";	}else{ $stype="credit";}
						}else{ $stype=$stypepay ;}
						?>
					   <input type=text value="<?php echo ucfirst($stype); ?>" class="form-control" disabled>
					   <input type=hidden value="<?php echo $detailx[0]->stypepay; ?>" name="stypepay">
                    </div>
                </div>

		
		</td><td width=70% >              

               <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Product</label>

                    <div class="col-lg-4">
                        <input  name=pname type="text" id="search" class="form-control"   />
						<span id="confirmMessagea"></span>
                    </div>
                </div>	
		

						<!--input type=hidden  id="theStoree" class="form-control" name="pricestore" >
						<input type=hidden  id="theKeyy" class="form-control" name="pricekey" >
						<input type=hidden  id="theDist" class="form-control" name="pricedist" >
						<input type=hidden  id="thePricex" class="form-control" name="pricex" >
						<input type=hidden  id="theSemi" class="form-control" name="pricesemi" >
						<input type=hidden  id="theConsume" class="form-control" name="priceconsume" >
						<input type=hidden  id="thePpid" class="form-control" name="ppid" -->
						<input type=hidden  id="thePricex" class="form-control" name="pricex" >
		<?php 
		$ccats= $detailx[0]->ccat; 
		if($ccats==0){
		?>	

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Price Distributor</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theDistt" class="form-control" disabled>
				<?php $prc="<input type=text onkeyup=\"formatharga(this.value,this)\" id='theDist' class='form-control' name='price' onkeyup=\"formatharga(this.value,this)\">";?>
                    </div>
                </div>				
		<?php }elseif($ccats==1){ ?>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Price Semi</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theSemii" class="form-control" disabled>
				<?php $prc="<input onkeyup=\"formatharga(this.value,this)\" type=text  id='theSemi' class='form-control' name='price'>";?>
						
                    </div>
                </div>
				
<?php }elseif($ccats==2){ ?>			
				
	
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Price Agent</label>
                    <div class="col-lg-4">
                       	<input type=text  id="theKey" class="form-control" disabled><?php $prc="<input onkeyup=\"formatharga(this.value,this)\" type=text  id='theKeyy' class='form-control' name='price'>";?>						
                    </div>
                </div>					
				

<?php }elseif($ccats==3){ ?>					

				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Price Store</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theStore" class="form-control" disabled>
						
					<?php $prc="<input onkeyup=\"formatharga(this.value,this)\" type=text  id='theStoree' class='form-control' name='price'>";?>	
						
                    </div>
                </div>					
				

<?php }elseif($ccats==4){ ?>					

				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Price Consumer</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theConsumee" class="form-control" disabled>
					<?php $prc="<input onkeyup=\"formatharga(this.value,this)\" type=text  id='theConsume' class='form-control' name='price'>";?>	
						
						
                    </div>
                </div>					
				

<?php }elseif($ccats==5){ ?>					

				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Price Cash</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theCash" class="form-control" disabled>
						
					<?php $prc="<input onkeyup=\"formatharga(this.value,this)\" type=text  id='theCashh' class='form-control' name='price'>";?>	
						
                    </div>
                </div>					
				
<?php }


?>
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Discount</label>

                    <div class="col-lg-4">
                       	<?php
						if($detailx[0]->stypepay=="cash"){ ?>
							<input type=text  id="thePdiscnew" class="form-control" disabled  >
							<input type=hidden  id="thePdisc" class="form-control" name=ddisc  >
						<?php }elseif(($detailx[0]->stypepay=="credit")AND($discdate==1)){ ?>  
							<div style="display:none">
							<input type=text  id="thePdiscDatenew" class="form-control" name="ddisc"  >
                                                        </div>
							<input type=text  id="thePdiscDate" class="form-control"  disabled >
						<?php }else{?>
						<input type=text  id="theDiscnew" class="form-control"   disabled  >	
			                         <div style="display:none">
						<input type=text   id="theDisc" class="form-control" name=ddisc >
                                                 </div>
						<?php }?>
                    </div>
                </div>	
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">MOQ</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theQty" class="form-control" disabled>
							<input type=hidden  id="theId" class="form-control" name=spid  >
							<input type=hidden  id="theQtyx" class="form-control" name=qtyx  >
							
                    </div>
                </div>	

								

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Qty/Coly</label>

                    <div class="col-lg-4">
					<input type=text   id="thePvolumePckk" class="form-control" disabled  >
					<input type=hidden   id="thePvolumePck" class="form-control" name=sqtykol   >
                       	
						<input type=hidden  value=0 name="add_plafon" >
						&nbsp;&nbsp;<span id="confirmMessagec"></span>
                    </div>
                </div>	

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Qty Coly</label>

                    <div class="col-lg-4">
                       	<input type=text    class="form-control" name=sqtykoli  >
						<input type=hidden  value=0 name="add_plafon" >
						&nbsp;&nbsp;<span id="confirmMessagec"></span>
                    </div>
                </div>					
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Qty Pcs</label>

                    <div class="col-lg-4">
                       	<input type=hidden  id="thePvolumePcs" class="form-control"   >
						<input type=text   class="form-control" name=sqtypcs  >
						<input type=hidden  value=0 name="add_plafon" >
						&nbsp;&nbsp;<span id="confirmMessagec"></span>
                    </div>
                </div>					
				
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4"  >Price</label>

                    <div class="col-lg-4">
					<!--input type="text" name="price[]" value="" class="form-control" onkeyup="formatharga(this.value,this)" -->
                       	<?php
					
						echo $prc;
						?>
						&nbsp;&nbsp;<span id="confirmMessagee"></span>
                    </div>
                </div>	


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4"  >Promo Discount</label>

                    <div class="col-lg-4">
					<input type="text" name="promodisc" value="" class="form-control" onkeyup="formatharga(this.value,this)" >
                       	
                    </div>
                </div>					
	
<?php $z= site_url("sales_order/home/sales_order_update/$id/$scid"); ?>
	
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>

                 <div class="col-lg-4">   
				<button onclick="return validateForm();" class="btn text-muted text-center btn-danger" type="submit">Submit</button>
				<a href="<?php echo $z; ?>" class="btn text-muted text-center btn-primary">Edit Header</a>
				</div>
				<!--a href="<?php //echo site_url("sales_order/home/sales_order_update/$id/$scid"); ?>"   -->
					<!--/a-->				
				</div>
				</td></tr></table>
            </form>
			
			<?php //echo $z;die;?>
			
			<script language = "javascript" type = "text/javascript">
 
function dLoad()
{
location.href = "<?php echo $z; ?>" // file to download
 
//window.setTimeout("", 60000) // wait 60 seconds
 
location.reload() //reload the doc (should happen whether download is in progress or not)
}
</script>
			

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
          
          <th>Code</th>
          <th>Name</th>
          <th>Qty/Coly</th>
		  <th>Qty/Pcs</th>
          <th>Normal Price</th>
          <th>Promo Discount </th>
		  <th>Payment Discount </th>
		  <th>Net Price </th>
		  <th>Total</th>
		  <th style="width:50px;">Action</th>
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
			// if($freeppn==0){
				// $spricex=$v -> sprice;
			// }else{
			// $spricex=$v -> sprice/1.1;
			// }
			$sdiscx=$v -> sdisc;
			$qtyx=$v -> sqty;
			
			$subtotal=$sqtyx * ($spricex - ($spricex * $sdiscx/100));
			
			$colyy=number_format(($v -> sqty/$v -> pvolume),2);
	
			$colyyx= str_replace('.00','',$colyy);
				
	
    ?>
          <tr>
          
          <td><?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
		  <td><?php echo $v -> pname; ?></td>
		  <td><?php echo $colyyx; ?></td>
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
		  <td><a href="<?php echo site_url('sales_order_detail/home/sales_order_detail_delete/' . $v -> sid .'/'.$id.'/'.$scid ); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a></td>
		  </tr>
        <?php 
		$total=$subtotal+$total;
		$totalqty=$qtyx+$totalqty;
		$totalppn=$total * 10/100;
		if($freeppn==0){
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
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
          <td><?php echo $totalqty; ?></td>          
          <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
          <td align=right ><?php echo __get_rupiah($total,2); ?></td>
          <td></td>
		 </tr>		
         <tr>          
          <td>PPN</td>		  
          <td><?php echo $persen;?> % </td>
          <td>&nbsp;</td>
		  <td></td>
          <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
          <td align=right  ><?php echo __get_rupiah($totalppn,2); ?></td>
          <td></td>
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
          <td align=right ><?php echo __get_rupiah($totalall,2); ?></td>
          <td></td>
		 </tr>		 
                                    </tbody>
                                </table>
		<?php 
		$sisaplafon=$detailx[0]->sisaplafon;
		
		// print_r($detailx);
		
		if($totalall <=	$sisaplafon	){	
		$sisaplafon_after= $sisaplafon -$totalall;

		?>	
		<form method="POST" action="<?php echo site_url('sales_order_detail/home/sales_order_details/'.$id.'/'.$scid); ?>" >
		<input type=hidden name="totalso" value="<?=$totalall;?>" >
		<input type=hidden  value="<?php echo $id;?>" name="id" >
		<input type=hidden  value="<?php echo $scid;?>" name="scid" >
		<input type=hidden  value="<?php echo $sisaplafon_after;?>" name="sisaplafon_after" >
		<input type=hidden  value=1 name="approve" >
		<input type=hidden  value=0 name="add_plafon" >		
		<input class="btn text-muted text-center btn-danger" type=submit value="Complete Approval" >
			
		</form>	
		<?php }else{ ?>
		<font color=red >Credit Limit!</font> <br> 
	
		
    <?php } ?>
                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
