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
// alert(3);
var goodColor = "#66cc66";
var badColor = "#ff6666";



 var messagea = document.getElementById('confirmMessagea');
 var a=document.forms["myForm"]["pname"].value;

 //var messageb = document.getElementById('confirmMessageb');
 var b=parseInt(document.forms["myForm"]["qtyx"].value);

 var messagec = document.getElementById('confirmMessagec');
 var c=document.forms["myForm"]["sqty"].value;


 
 
 
 //var messaged = document.getElementById('confirmMessaged');
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
	  // alert(2);
	   messagea.innerHTML = "";  
	  }  


	if( k==0 || k== 2){  
		if( c==null || c=="" || c <= b )
		  {
		    alert(k);
		  messagec.style.color = badColor;
		  messagec.innerHTML  = "Qty masih kosong atau dibawah batas qty";  
		  }else{
		   // alert(6);
		   messagec.innerHTML = "";  
		  }  
	}else{
		   // alert(6);
		   messagec.innerHTML = "";  
		  } 

 
	if(e==null || e=="" || e <= d )
	  {
	  //alert('Harga masih kosong atau dibawah batas harga');
	  messagee.style.color = badColor;
	  messagee.innerHTML  = " .";  
	  }else{
	  // alert(10);
	   messagee.innerHTML = "";  
	  }  
	  
 if(  messagea.innerHTML==""   &&  messagec.innerHTML==""   )
 {
// alert(11);
  return true;
 } else{
// alert(20);
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
            <h5>Sales Order Add <?php //echo "$id $scid";?></h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <!--form class="form-horizontal" action="<?php echo site_url('sales_order_detail/home/sales_order_detail_add'); ?>" method="post"-->
<?php //echo site_url('application/views/assets/sourcex.php?scid='.$scid); ?>	
<?php  
//print_r($detailx);
//print_r($detail);die;
?>


 <form  id="form1" name="myForm" class="form-horizontal" action="<?php echo site_url("sales_order_detail/home/sales_order_detail_add/$id/$scid"); ?>" method="post">
<table border=0 width=90% ><tr><td width=50%>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Cabang</label>

                    <div class="col-lg-4">	
					<input type=text value="<?php echo $detailx[0]->bname; ?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No SO</label>

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
                    <label for="text1" class="control-label col-lg-4">Tanggal</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $detailx[0]->stgl; ?>" class="form-control" disabled>
                    </div>   							
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">FREE PPN</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php 
						if($detailx[0]->sfreeppn=='1'){
						echo "YES";
						}else{
						echo "NO";
						}						
						//echo $detailx[0]->sfreeppn; 
						?>" class="form-control" disabled>
							<input type=hidden value="<?php echo $detailx[0]->sfreeppn; ?>" class="form-control" >
                    </div>
                </div>


				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sisa Plafon</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $detailx[0]->sisaplafon; ?>" class="form-control"  disabled >
                        <input type=hidden value="<?php echo $detailx[0]->sisaplafon; ?>" class="form-control" name="sisaplafon" >
                    </div>
                </div>			
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Type Pay</label>

                    <div class="col-lg-4">                      
					   <input type=text value="<?php echo $detailx[0]->stypepay; ?>" class="form-control" disabled>
					   <input type=hidden value="<?php echo $detailx[0]->stypepay; ?>" name="stypepay">
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
                    <label for="text1" class="control-label col-lg-4">Product</label>

                    <div class="col-lg-4">
                        <input  name=pname type="text" id="search" class="form-control"   />
						&nbsp;&nbsp;<span id="confirmMessagea"></span>
                    </div>
                </div>	
		

		
						<input type=hidden  id="theKey" class="form-control" name="pricekey" >
						<input type=hidden  id="theDist" class="form-control" name="pricedist" >
						<input type=hidden  id="thePricex" class="form-control" name=pricex >
<?php 
$ccats= $detailx[0]->ccat; 
if($ccats==0){
?>	

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Harga Distributor</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theDistt" class="form-control" disabled>
						
						
						
                    </div>
                </div>				
<?php }elseif($ccats==1){ ?>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Harga Kunci</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theKeyy" class="form-control" disabled>
						
						
						
                    </div>
                </div>	
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Harga Toko</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theStoree" class="form-control" disabled>
						
						<input type=hidden  id="theStore" class="form-control" name="pricestore" >
						
                    </div>
                </div>	
<?php }elseif($ccats==2){ ?>			
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Harga Semi</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theSemii" class="form-control" disabled>
						
						<input type=hidden  id="theSemi" class="form-control" name="pricesemi" >
						
                    </div>
                </div>	

<?php }elseif($ccats==3){ ?>					
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Harga Konsumen</label>

                    <div class="col-lg-4">
                       	<input type=text  id="theConsumee" class="form-control" disabled>
						
						<input type=hidden  id="theConsume" class="form-control" name="priceconsume" >
						
                    </div>
                </div>					
				
<?php }?>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Batas QTY</label>

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
						<?php }else{?>	
						<input type=text  id="theDisc" class="form-control" name=ddisc  >
						<?php }?>
                    </div>
                </div>					

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">QTY</label>

                    <div class="col-lg-4">
                       	<input type=text   class="form-control" name=sqty  >
						&nbsp;&nbsp;<span id="confirmMessagec"></span>
                    </div>
                </div>	
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Harga</label>

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
						<?php } ?>
						&nbsp;&nbsp;<span id="confirmMessagee"></span>
                    </div>
                </div>					
		
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
                    
				<button onclick="return validateForm();" class="btn text-muted text-center btn-danger" type="submit">Submit</button>
				<button class="btn text-muted text-center btn-primary" type="button" onclick="location.href='javascript:history.go(-1);'">Back</button>
					
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
          
          <th>Kode Product</th>
          
          <th>Qty</th>
          <th>Harga</th>
          <th>Discount </th>
		  <th>Jumlah</th>
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
          <td><?php echo $v -> sqty; ?></td>
          <td><?php echo $v -> sprice; ?></td>
          <td><?php echo $v -> sdisc; ?></td>
		  <td> <?php echo $subtotal; ?> </td>		
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
          <td><?php echo $totalqty; ?></td>
          <td></td>
          <td></td>
          <td><?php echo $total; ?></td>
		 </tr>		
         <tr>          
          <td>PPN</td>
          <td>10%</td>
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
		<form action="<?php echo site_url('sales_order/home'); ?>" ><input type=submit value=Complete></form>						
    <?php //echo $pages; ?>
                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
