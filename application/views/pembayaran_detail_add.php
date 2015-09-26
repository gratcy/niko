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
    source: '<?php echo site_url('pembayaran_detail/home/sourcex/'.$scid); ?>',
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
		if( c==null || c=="" || c <= b )
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




<script type="text/javascript">
function UpdateCost() {
  var sum = 0;
  var gn, elem,num,gnz,elemen,pot,tot,totsisa,cash,giro,gna,gnza,elema,elemena,numa;
  num=document.getElementById('txtNum').value;
  numa=document.getElementById('txtNuma').value;
  pot=document.getElementById('txtPot').value;
  cash=document.getElementById('totalcash');
  giro=document.getElementById('totalgiro');
  for (i=0; i< num ; i++) {
    gn = 'game'+i;
	gnz= 'gamezz'+i;
    elem = document.getElementById(gn);
	elemen = document.getElementById(gnz);
    if (elem.checked == true) { 
	sum += Number(elem.value); 
	elemen.checked = true;
	}
	if (elem.checked == false)
    {
      elemen.checked = false;
    }	
	
	
  }
    document.getElementById('totalcost').value = sum.toFixed(2);
   sum=0; 
  for (j=0; j< numa ; j++) {
    gna = 'ge'+j;
	gnza= 'gezz'+j;
    elema = document.getElementById(gna);
	elemena = document.getElementById(gnza);
    if (elema.checked == true) { 
	sum += Number(elema.value); 
	elemena.checked = true;
	}
	if (elema.checked == false)
    {
      elemena.checked = false;
    }	
	
	
  }  
  
  


  document.getElementById('totalcut').value = sum.toFixed(2);
  
  
  tot=document.getElementById('totalcost').value - document.getElementById('totalcut').value;
  totsisa= Number(tot) - (Number(cash.value) + Number(giro.value));
  document.getElementById('totalz').value = tot;
  document.getElementById('totalsisa').value = totsisa;
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
            <h5>Payment Detail Add <?php //echo "$id $scid";?></h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); 
	$pno_pm=$detailx[0]->pno_pm;
	$type_pay=$detailx[0]->type_bayar;
	
	?>


 <form  id="form1" name="myForm" class="form-horizontal" method="post" 
 action="<?php echo site_url('pembayaran_detail/home/pembayaran_detail_add/'.$scid.'/'.$pno_pm.'/'.$type_pay); ?>" >
<table border=0 width=90% ><tr><td width=50%>


                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Payment No.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $detailx[0]->pmid; ?>">
					   <input type=text value="<?php echo $detailx[0]->pno_pm; ?>" class="form-control" disabled>
					    <input type=hidden value="<?php echo $detailx[0]->pno_pm; ?>" class="form-control" name="pno_pm" >
                    </div>
                </div>
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->cname; ?>" class="form-control" disabled>
                    </div>
                </div>
				

  

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $detailx[0]->pm_tgl; ?>" class="form-control" disabled>
                    </div>   							
                </div>

		
				


				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Discount Return</label>

                    <div class="col-lg-4">
					<?php //if(!isset($potongan[0]->potongan)){ $potongan[0]->potongan=0;}?>
					<input type=text value="<?php //echo $potongan[0]->potongan; ?>" class="form-control"  disabled >
                        <input id=txtPot type=hidden value="<?php //echo $potongan[0]->potongan; ?>" name="potongan" >
                    </div>
                </div>				
		
						<input type=hidden  id="theStore" class="form-control" name="sisaplafon" >
						<input type=hidden  id="theStore" class="form-control" name="pricestore" >
						<input type=hidden  id="theKey" class="form-control" name="pricekey" >
						<input type=hidden  id="theDist" class="form-control" name="pricedist" >
						<input type=hidden  id="thePricex" class="form-control" name="pricex" >
						<input type=hidden  id="theSemi" class="form-control" name="pricesemi" >
						<input type=hidden  id="theConsume" class="form-control" name="priceconsume" >

				
		
                <div class="form-group">
		
				</div>
				</td></tr></table>
            <!--/form-->
        </div>
    </div>
</div>

<!--form name="listForm"-->
  <div class="panel-body">
                            <div class="table-responsive">
							
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>No.</th>
          <th>Invoice No.</th>
          <th>Invoice Date</th>
          <th>Price</th>
          <th>Insufficient Payment</th>
		  
		
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
		$totalqty=0;  
		$total=0;
		$totalppn=0;
		$totalall=0;
		$persen=0;
		$freeppn=0;
		$nomor=0;
		
		foreach($detail as $k => $v) :	
$num= count($detail);
echo "<input type=hidden name=txtNum id=txtNum value=$num >";
	        $nomor=$nomor+1;
			
			//echo $k;
    ?>

          <tr>
          
          <td>
		  <?php 
		  $sum_inv=$v -> sum_inv;
		  $kurang_bayar=$v -> kurang_bayar;
		  $snoinv=$v -> sno_invoice;
		  $sdp= $v -> sdate_lunas; 
		  if($sdp==""){
		  $dsb="";
		  }else{
		  $dsb="disabled";
		  }
		  //echo $this->uri->segment(7);
		  $type_bayar=$this->uri->segment(7);
		  if($type_bayar==2){
			  $tipecek="radio";
		  }else{
			  $tipecek="checkbox";
			  
		  }
		  
		  ?>
		  
		  <input type="<?=$tipecek;?>" name="a[]" id='<?php echo "game".$k;?>' value= "<?=$kurang_bayar;?>" onchange="UpdateCost()" <?=$dsb;?> >
		  </td>
          <td> 
		  <input type=checkbox name="b[]" id='<?php echo "gamezz".$k;?>' value= "<?=$snoinv;?>"  <?=$dsb;?> >
		  <?php echo $snoinv; ?> </td>	
		  <td><?php echo $v -> stgl_invoice; ?></td>
          <td><?php echo $v -> sum_inv; ?> </td>
          
		  <td><?php echo $v -> kurang_bayar; ?></td>

		  </tr>
		  
		  
        <?php 

		endforeach; 
		
		?>
		
				  
		
	<!--POTONGAN-->
		<tr><td colspan=5>Return Discount</td></tr>
                                    <thead>
                                        <tr>
          
          <th>No.</th>
          <th>Invoice No.</th>
          <th>Invoice Date</th>
          <th>Price</th>
         
		  
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
		$totalqty=0;  
		$total=0;
		$totalppn=0;
		$totalall=0;
		$persen=0;
		$freeppn=0;
		$nomor=0;
		$numar= count($detailr);
	if($numar==0){
		//echo $numar;
		
	?>	
	
<tr>
          
          <td>
		  <?php
		  $mz=0;
		  $sum_invz=0;
		  $snoroz=0;
		  		  echo "<input type=hidden name=txtNuma id=txtNuma value=$numar >";
	        $nomor=$nomor+1;
		  ?>
		  
		  <input type=hidden name="c[]" id='<?php echo "ge".$mz;?>' value= "<?=$sum_invz;?>" onchange="UpdateCost()" disabled >
		  </td>
          <td> 
		  <input type=hidden name="d[]" id='<?php echo "gezz".$mz;?>' value= "<?=$snoroz;?>"    >
		  </td>	
		  <td>&nbsp;</td>
          <td>&nbsp;</td>
          
		  
		  <td></td>
		  </tr>
	
	<?php	
	}

		foreach($detailr as $m => $v) :	
		  $numa= count($detailr);
		  
		  $stp= $v -> status_potong; 
		  if($stp=='0'){
		  $dsbl="";
		  }else{
		  $dsbl="disabled";
		  }

		  echo "<input type=hidden name=txtNuma id=txtNuma value=$numa >";
	        $nomor=$nomor+1;
    ?>

          <tr>
          
          <td>
		  <?php
		  echo $m;
		  $sum_inv=$v -> status_potong;
		  $snoro=$v -> snoro;
		
		  ?>
		  <input type=checkbox name="c[]" id='<?php echo "ge".$m;?>' value= "<?=$sum_inv;?>" onchange="UpdateCost()" <?=$dsbl;?> >
		  </td>
          <td> 
		  <input type=checkbox name="d[]" id='<?php echo "gezz".$m;?>' value= "<?=$snoro;?>"    >
		  <?php echo $snoro; ?> </td>	
		  <td><?php echo __get_date(strtotime($v -> stgl,2)); ?></td>
          <td><?php echo $sum_inv; ?></td>
        
		  
		  <td></td>
		  </tr>
        <?php 

		endforeach; ?>	
		
		
		
		
		
		
		
	 <tr>
          
          <th colspan=3>Total Payment</th>
          <th><input type="text" id="totalcost" name="total" value="" size="15" />
		  
		  </th><th></th>
		  
      </tr>
	  
	 <tr>
          
          <th colspan=3>Total Discount</th>
          <th><input type="text" id="totalcut" name="total" value="" size="15" />
		  
		  </th><th></th>
		  
      </tr>	  
	  
	 <tr>
          
          <th colspan=3>Total Payment After Discount</th>
          <th>
		  <input type="text" id="totalz" name="totalz" value="" size="15" />
		  </th><th></th>
		  
      </tr>	 
 	  
	 <tr>
          
          <th colspan=3>Total Payment Before</th>
          <th>
		  <input type="text" id="totalcashx" name="totalcashx" value="" size="15" onchange="UpdateCost()" />
		  </th><th></th>
		  
      </tr>	 	  
	 <tr>
          
          <th colspan=3>Payment Cash</th>
          <th>
		  <input type="text" id="totalcash" name="totalcash" value="" size="15" onchange="UpdateCost()" />
		  </th><th></th>
		  
      </tr>	 
	 <tr>
          
          <th colspan=3>Payment Giro</th>
          <th>
		  <input type="text" id="totalgiro" name="totalgiro" value="" size="15" onchange="UpdateCost()" />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Giro
		  </th><th> <input  name="tglgiro" type="text" placeholder="click to show datepicker"  id="example1" class="form-control"  ></th>
		  
      </tr>


	 <tr>
          
          <th colspan=3>Write Off</th>
          <th>
		  <input type="text" id="wo" name="wo" value="" size="15" />
		  </th><th></th>
		  
      </tr>	


	  
	 <tr>
          
          <th colspan=3>Remaining Payment</th>
          <th>
		  <input type="text" id="totalsisa" name="totalsisa" value="" size="15" />
		  </th><th></th>
		  
      </tr>	 	  
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
		
		
		
		

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
          <th>Payment Date</th>
    
          <th>Date</th>
          
         <th>No Invoice</th>
		 <th>Total Cash</th>
		 <th>Total Giro</th>
		 <th>Date Giro</th>
          <th>Status</th>
		  <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($pembayaran as $k => $v) :
			  // echo "<pre>";
	// print_r($pembayaran);
	 // echo "</pre>";
		  ?>
                                        <tr>
          <td><?php echo $v -> pno_pm; ?></td>
          <td><?php echo $v -> pm_tgl; ?></td>
      
          

		  
		  <td><?php echo $v -> no_invoice; ?></td>
		  <td><?php echo $v -> pcash; ?></td>
		  <td><?php echo $v -> pgiro; ?></td>
		  <td><?php echo __get_date(strtotime($v -> ptgl_giro,2)); ?></td>
          <td><?php 
		  $noinv=$v -> no_invoice;
		  $byrcash=$v -> pcash;
		  $byrgiro=$v -> pgiro;
		  $piutang=$v -> piutang;
		  $sstatus=$v -> status_bayar;
		  if($sstatus==0){
		  $st="Pending";
		  }elseif($sstatus==1){
		  $st="Aktif";
		  }if($sstatus==2){
		  $st="Delete";
		  }if($sstatus==3){
		  $st="Approve";
		  }if($sstatus==4){
		  $st="Done";
		  }
		  echo $st; ?></td>
		
		
		  <td>
		  <a href="<?php echo site_url('pembayaran_detail/home/pembayaran_update/'. $v -> pmid.'/'. $v -> pcid.'/' . $v -> pno_pm.'/'. $type_pay.'/'. $byrcash.'/'. $piutang.'/'. $noinv ); ?>">App Cash</a>
		  <a href="<?php echo site_url('pembayaran_detail/home/pembayaran_update/'. $v -> pmid.'/'. $v -> pcid.'/' . $v -> pno_pm.'/'. $type_pay.'/'. $byrgiro.'/'. $piutang.'/'. $noinv ); ?>">App Giro</a>
          </td>		
		
		
										</tr>
        <?php endforeach; ?>
                                    </tbody>
                                </table>
   
                            </div>
                        </div>		
		
		
		
		
		
		
		
		
		
		
        <!-- END PAGE CONTENT -->
