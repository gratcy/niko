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
		
		        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                 
                $('#example2').datepicker({
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
   trans=document.getElementById('totaltrans');
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
    document.getElementById('totalcost').value = sum.toFixed(0);
	document.getElementById('totalcostz').value = sum.toFixed(0);
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
  
  


  document.getElementById('totalcut').value = sum.toFixed(0);
  document.getElementById('totalcutz').value = sum.toFixed(0);
  
  
  tot=document.getElementById('totalcost').value - document.getElementById('totalcut').value;
  totsisa= Number(tot) - (Number(cash.value) + Number(giro.value)+ Number(trans.value));
  document.getElementById('totalz').value = tot;
  document.getElementById('totalzz').value = tot;
  document.getElementById('totalsisa').value = totsisa;
  document.getElementById('totalsisaz').value = totsisa;
   document.getElementById('totalsisazz').value = totsisa;
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
	//$type_pay=$detailx[0]->type_bayar;
	$type_pay="";
	?>


 <form  id="form1" name="myForm" class="form-horizontal" method="post" 
 action="<?php echo site_url('pembayaran_detail/home/pembayaran_detail_addz/'.$scid.'/'.$pno_pm.'/'.$type_pay); ?>" >
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
		<input type=text value="<?php echo __get_date(strtotime($detailx[0]->pdate),1); ?>" class="form-control" disabled>
                    </div>   							
                </div>

		
				


				
                <!--div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Discount Return</label>

                    <div class="col-lg-4">
					<?php //if(!isset($potongan[0]->potongan)){ $potongan[0]->potongan=0;}?>
					<input type=text value="<?php //echo $potongan[0]->potongan; ?>" class="form-control"  disabled >
                        <input id=txtPot type=hidden value="<?php //echo $potongan[0]->potongan; ?>" name="potongan" >
                    </div>
                </div-->
<input id=txtPot type=hidden value="<?php //echo $potongan[0]->potongan; ?>" name="potongan" >
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

<?php 
$jpb=count($detailx);
if($jpb==0){
}else{
foreach($detailx as $m => $n) {
$totaltagihan=$n->ptotal_tagihan;
$totalterima=$n->ptotal_terima;
$totalpending=$n->ptotal_pending;
$totaltagihanx=$totaltagihan-$totalterima;
$tinv=$n->ptotal_inv;
$tret=$n->ptotal_retur;
}
}
?>

  <div class="panel-body">
                            <div class="table-responsive">
							
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
										<tr><td colspan=4 >Invoice </td></tr>
                                        <tr>
          <th>Check List</th>
          <th width=30% >Invoice No.</th>
          <th width=30% >Invoice Date</th>
          <th width=30% >Price</th>
   
		 
		  
		
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
		  <input style="opacity:0; position:absolute; left:9999px;" type=checkbox name="b[]" id='<?php echo "gamezz".$k;?>' value= "<?=$snoinv;?>"  <?=$dsb;?> >
		  <?php echo $snoinv; ?> </td>	
		  <td><?php echo __get_date(strtotime($v -> stgl_invoice),1); ?></td>
          <td><?php echo __get_rupiah($v -> sum_inv); ?> </td>
          
		 
		  </tr>
		  
		  
        <?php 

		endforeach; 
		
		?>
		
				  
		
	<!--POTONGAN-->
		<tr><td colspan=4>Return </td></tr>
                                    <thead>
                                        <tr>
          
          <th>Check List</th>
          <th>Return No.</th>
          <th>Return Date</th>
          <th>Total</th>
	
         
		  
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
		//print_r($detailr);
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
		  //echo $m;
		  $sum_inv=$v -> rpotong;
		  $snoro=$v -> snoro;
		  $sid=$v -> sid;
		  ?>
		  <input type=checkbox name="c[]" id='<?php echo "ge".$m;?>' value= "<?=$sum_inv;?>" onchange="UpdateCost()" <?=$dsbl;?> >
		  </td>
          <td> 
		  <input style="opacity:0; position:absolute; left:9999px;" type=checkbox name="d[]" id='<?php echo "gezz".$m;?>' value= "<?=$sid;?>"    >
		  <?php echo $snoro; ?> </td>	
		  <td><?php echo __get_date(strtotime($v -> stgl,2)); ?></td>
          <td><?php echo __get_rupiah($sum_inv); ?></td>
        
		  
		
		  </tr>
        <?php 

		endforeach; ?>	
		
		
		</table>
		<br>
		<table class="table table-striped table-bordered table-hover" >
		
		
		
		
	 <tr>
          
          <th colspan=3>Total Invoice</th>
          <th><input type="text" id="totalcostz"  value="<?=$tinv;?>" size="15" disabled />
		  <input type="hidden" id="totalcost" name="total" value="<?=$tinv;?>" size="15" />
		  
		  </th>
		  
		  
		  <th>Total Pembayaran Sebelumnya</th>
          <th>
		  <input type="text" id="totalcashxx"  value="<?=$totalterima;?>" size="15" onchange="UpdateCost()" disabled />
		  <input type="hidden" id="totalcashx" name="totalcashx" value="<?=$totalterima;?>" size="15" onchange="UpdateCost()" />
		  </th>
		  
		  
      </tr>
	  
	 <tr>
          
          <th colspan=3>Total Return</th>
          <th><input type="text" id="totalcutz"  value="<?=$tret;?>" size="15" disabled />
		  <input type="hidden" id="totalcut" name="total" value="<?=$tret;?>" size="15" />
		  </th>
		  
		      <th>Sisa Tagihan
		 
		  </th>
          <th>
		  <input type="text" id="totalsisazz" value="<?=$totaltagihanx;?>" size="15" disabled />
		  <input type="hidden"  name="sisaz" value="<?=$totaltagihanx;?>" size="15" />
		  </th>
		  
      </tr>	  
	  
	 <tr>
          
          <th colspan=3>Total Tagihan
		 
		  </th>
          <th>
		  <input type="text" id="totalzz"  value="<?=$totaltagihan;?>" size="15" disabled />
		  <input type="hidden" id="totalz" name="totalz" value="<?=$totaltagihan;?>" size="15" />
		  </th>
		  
		   <th>Pending Bayar
		 
		  </th>
          <th>
		  <input type="text" id="totalz"  value="<?=$totalpending;?>" size="15" disabled />
		  <input type="hidden" id="totalz" name="sisaz" value="<?=$totalpending;?>" size="15" />
		  </th>
		  
      </tr>	 
 	  
	 
	 <tr>
          
          <th colspan=3>&nbsp;</th>
          <th>&nbsp; </th>
		  <th></th>
		  <th></th>
		  
      </tr>		
	 <tr>
          
          <th colspan=3>Cash</th>
          <th>
		  <input type="text" id="totalcash" name="payment[0]" value="" size="15" onchange="UpdateCost()" />
		  </th><th></th>
		  
      </tr>	

		 <tr>
          
          <th colspan=3>Transfer</th>
          <th>
		  <input type="text" id="totaltrans" name="payment[1]" value="" size="15" onchange="UpdateCost()" />
		 
		  </th>
		  <th> Rekening Tujuan</th><th>
		  <select id="rek" name="rekto" />
		  <option value="">PILIH</option>
		  <option value="BCA Meiske A. - 7015152052">BCA Meiske A. - 7015152052</option>
		  <option value="BCA PT.NEI - 0093033369">BCA PT.NEI - 0093033369</option>
		  <option value="BCA L.T.Bing - 4090498199">BCA L.T.Bing - 4090498199</option>
		  </select>
		  </th>
		  
      </tr>

	 <tr>
          
          <th colspan=3></th>
          <th>
	&nbsp;
		 
		  </th><th> Tanggal Transfer</th><th><input type="text" id="example2" name="date_transfer" value="" size="15"  /></th>
		  
      </tr>

	  
	 <tr>
          
          <th colspan=3>Giro</th>
          <th>
		  <input type="text" id="totalgiro" name="payment[2]" value="" size="15" onchange="UpdateCost()" />
		  &nbsp;
		  </th><th> Nama Giro</th><th>
		   <input  name="accgiro" type="text" size="15"  ></th>
		  
      </tr>
	 <tr>
          
          <th colspan=3></th>
          <th >
		  
		  &nbsp;</th><th>No. Giro
		   </th><th><input  name="nogiro" type="text" size="15" ></th>
		  
      </tr>
	  <tr>
          
          <th colspan=3></th>
          <th >
		  
		  &nbsp;</th><th>
		   Tanggal Giro</th><th><input  name="tglgiro" type="text"  size="15" id="example1"   >
		   </th>
		  
      </tr>

		<input type="hidden" id="wo" name="payment[3]" value="" size="15" />
		<input type="hidden" id="totalsisaz" name="totalsisa" value="" size="15" />
	 
        </tbody>
             </table>
				<input class="btn text-muted text-center btn-danger" type=submit value="Submit" >
		</form>	
		<br><br>
			
	 <div class="form-group">
		 <div class="panel-body">
         <div class="table-responsive">
		
	<table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
          <th>No Invoice</th>
    
          <th>Date</th>
          
         <th>Due Date</th>

          <th>Total Invoice</th>
		  <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  
		  foreach($inv as $k => $v) :
			  // echo "<pre>";
			  // print_r($pembayaran);
			  // echo "</pre>";
		  ?>
                                        <tr>
          <td><?php echo $v -> no_invoice; ?></td>
          <td><?php echo __get_date(strtotime($v -> stgl_invoice),1); ?></td>	  
		  <td><?php echo $v -> sduedate_invoice; ?></td>
		   <td><?php echo __get_rupiah($v -> tamount); ?></td>
		  
      
		
		
		  <td>
		  &nbsp;
          </td>		
		
		
										</tr>
																				
        <?php endforeach; ?>
                                    </tbody>
                                </table><br>					
		
		
		
		</div></div></div>
		
		
		
		
		
		
		
		
		
		

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
          <th>Type Payment</th>
    
          <th>Date</th>
          
         <th>Amount</th>

          <th>Status</th>
		  <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($pembayaran as $k => $v) :

		  ?>
                                        <tr>
          <td><?php echo $v -> ptype; ?></td>
          <td><?php echo $v -> pm_tgl; ?></td>
      
          

		  
		  <td><?php echo $v -> pamount; ?></td>
		  
          <td><?php 

		  $sstatus=$v -> pstatus;
		  if($sstatus==1){
		  $st="Pending";
		  }elseif($sstatus==3){
		  $st="Done";
		  }if($sstatus==2){
		  $st="Delete";
		  }
		  ?>
		  <?php if($st=="Pending"){ ?>
		 <a href="<?php echo site_url('pembayaran_detail/home/pembayaran_terima/'.$v ->pno_pm.'/'.$scid.'/'.$v ->pmdid.'/'.$v -> pamount); ?>"><?=$st;?></a>
		  <?php } else { echo $st;}?>
          </td>		
		
		
										</tr>
																				
        <?php endforeach; ?>
                                    </tbody>
                                </table><br>	
		
		
		
		
		
		
		
		
		
		
                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
		
		
								
								
								
								
								
		                                			
								
								
								
								
								
								
   
                            </div>
                        </div>		
		
		
		
		
		
		
		
		
		
		
        <!-- END PAGE CONTENT -->
