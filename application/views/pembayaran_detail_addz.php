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

        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                 
                $('#tglcash').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
        </script>


        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                 
                $('#tglcustom').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
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
            <h5>Payment Detail Add <?php //echo "$id $scid";?></h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg();
//print_r($detailx);	
	$pno_pm=$detailx[0]->pno_pm;
	//$type_pay=$detailx[0]->type_bayar;
	$type_pay="";
$jpm=count($pembayaran);
if($jpm==0){
	$pembayaran[0] = new stdClass();
	$pembayaran[0]->pstatuss=0;
	$pembayaran[0]->ptgl_giro="";
	$pembayaran[0]->ptgl_trans="";
	$pembayaran[0]->ptype="";
	$pembayaran[0]->pm_tgl="";
	$pembayaran[0]->prekto="";
	$pembayaran[0]->pamount="";
	$pembayaran[0]->pgiroacc="";
	$pembayaran[0]->pgirono="";
	$pembayaran[0]->pstatus="";
	}
$jpr=count($detailrr);
if($jpr==0){
	$detailrr[0] = new stdClass();
	$detailrr[0]->sprice=0;
	$detailrr[0]->snoro="";
	$detailrr[0]->stgl="";
}
	?>


 <form  id="form1" name="myForm" class="form-horizontal" method="POST" 
 action="<?php echo site_url('pembayaran_detail/home/pembayaran_detail_addz/'.$scid.'/'.$pno_pm); ?>" >
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
<?php 
$jpb=count($detailx);

// print_r($detailx);
if($jpb==0){
	//$totaltagihan=0;
	//$totalterima=0;
	// $totalpending=0;
	// $tinv=0;
	// $tret=0;
}else{
	
	//print_r($detailrr);
foreach($detailx as $m => $n) {
$totaltagihan=$n->ptotal_tagihan;
$totalterima=$n->ptotal_terima;
$totalpending=$n->ptotal_pending;
$totaltagihanx=$totaltagihan-$totalterima;
$tinv=$n->ptotal_inv;
//$tret=$n->ptotal_retur;

}
$tret=0;
$tr= count($detailrr);
for($d=0;$d<$tr;$d++){
$tret=$detailrr[$d]->sprice+$tret;
}
}
//echo $totaltagihanx;
?>

  <div class="panel-body">
                            <div class="table-responsive">
							
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <!--tr>
          <th>No.</th>
          <th>Invoice No.</th>
          <th>Invoice Date</th>
          <th>Price</th>
          <th>Insufficient Payment</th>
		 
		  
		
                                        </tr-->
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

          <!--tr>
          
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
          <td><?php echo __get_rupiah($v -> sum_inv); ?> </td>
          
		  <td><?php echo __get_rupiah($v -> kurang_bayar); ?></td>

		  </tr-->
		  
		  
        <?php 

		endforeach; 
		
		?>
		
				  
		
	<!--POTONGAN-->
		<!--tr><td colspan=5>Return Discount</td></tr>
                                    <thead>
                                        <tr>
          
          <th>No.</th>
          <th>Return No.</th>
          <th>Return Date</th>
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
		  <td>&nbsp;</td>
          <td>&nbsp;</td>
          
		  
		  <td></td>
		  </tr>
		  
	<?php } ?>  -->
	
	<?php	
	

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
    

		endforeach; ?>	
		
		
			
<tr>
          
          <th colspan=3>Total Invoice</th>
          <th><input type="text" id="totalcost"  value="<?=$tinv;?>" size="15" disabled />
		  <input type="hidden" id="totalcost" name="total" value="<?=$tinv;?>" size="15" />
		  </th>
		  
		  <th>Total Pembayaran Sebelumnya</th>
          <th>
		  <input type="text" id="totalcashx"  value="<?=$totalterima;?>" size="15" disabled />
		  <input type="hidden" id="totalcashx" name="totalcashx" value="<?=$totalterima;?>" size="15" onchange="UpdateCost()" />
		  </th>
		  
      </tr>
	  
	 <tr>
          
          <th colspan=3>Total Return</th>
          <th><input type="text" id="totalcut"  value="<?=$tret;?>" size="15" disabled />
		  <input type="hidden" id="totalcut" name="total" value="<?=$tret;?>" size="15" />
		  </th><th>Pembayaran Pending	 
		  </th>
          <th>
		  <input type="text" id="totalz"  value="<?=$totalpending;?>" size="15" disabled />
		  <input type="hidden" id="totalz" name="sisaz" value="<?=$totalpending;?>" size="15" />
		  </th>
		  
      </tr>	  
	  
	 <tr>
          
          <th colspan=3>Total Tagihan
		 
		  </th>
          <th>
		  <input type="text" id="totalz"  value="<?=$totaltagihan;?>" size="15" disabled />
		  <input type="hidden" id="totalz" name="totalz" value="<?=$totaltagihan;?>" size="15" />
		  </th><th>Sisa Tagihan	 
		  </th>
          <th>
		  <input type="text" id="totalz"  value="<?=$totaltagihanx;?>" size="15" disabled />
		  <input type="hidden" id="totalz" name="sisaz" value="<?=$totaltagihanx;?>" size="15" />
		  </th>
		  
      </tr>	 
 	  
		 <tr>
          
          <th colspan=3>&nbsp;</th>
          <th>
		  &nbsp;
		  </th><th></th><th></th>
		  
      </tr> 
	
	 <tr>
          
          <th colspan=3>Cash</th>
          <th>
		  <input type="text" id="totalcash" name="payment[0]" value="" size="15" onchange="UpdateCost()" />
		  </th><th>Date Cash</th><th><input type=text id="tglcash" name="date_cash" value="" size="15" ></th>
		  
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
		 
		  </th><th> Date Transfer</th><th><input type="text" id="example2" name="date_transfer" value="" size="15"  /></th>
		  
      </tr>

	  
	 <tr>
          
          <th colspan=3>Giro</th>
          <th>
		  <input type="text" id="totalgiro" name="payment[2]" value="" size="15" onchange="UpdateCost()" />
		  
		  </th><th> Nama Giro</th><th>
		   <input  name="accgiro" type="text" size="15"  ></th>
		  
      </tr>
	 <tr>
          
          <th colspan=3><input type="text"  name="custompaid" value="" size="30" /></th>
          <th > <input type="text" id="wo" name="payment[3]" value="" size="15" />
		  
		  &nbsp;</th><th>No Giro</th><th>
		   <input  name="nogiro" type="text" size="15"  ></th>
		  
      </tr>
	  <tr>
          
          <th colspan=3 >Date Custom</th>
          <th ><input  name="date_custom" type="text"   id="tglcustom" size="15"  ></th><th>
		   Date Giro</th><th><input  name="tglgiro" type="text"   id="example1" size="15"  >
		   </th>
		  
      </tr>
	  

	

     <input type="hidden" id="totalsisa" name="totalsisa" value="" size="15" />
	 
                                    </tbody>
                                </table>
		<?php 	if($pembayaran[0]->pstatuss<3){?>						
								<input class="btn text-muted text-center btn-danger" type=submit value="Submit" >
		<?php } ?>						
		</form>	
		<br><br>
		
	 <div class="form-group">
		 <div class="panel-body">
         <div class="table-responsive">
		
	<table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
         <th>Invoice No.</th>
         <th>Date</th>
         <th>Due Date</th>
         <th>Total Invoice</th>
		 
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($inv as $k => $v) :

		  ?>
                                        <tr>
          <td><?php echo $v -> no_invoice; ?></td>
          <td><?php echo __get_date(strtotime($v -> stgl_invoice),1); ?></td>	  
		  <td><?php echo __get_date(strtotime($v -> sduedate_invoice),1); ?></td>
		   <td><?php echo __get_rupiah($v -> tamount); ?></td>
		  
      		
										</tr>
																				
        <?php endforeach; ?>
                                    </tbody>
                                </table><br>



	<table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
         <th>Return No.</th>
         <th>Date</th>         
         <th>Total</th>
		 
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($detailrr as $m => $v) :

		  ?>
                                        <tr>
          <td><?php echo $v -> snoro; ?></td>
          <td><?php 
		  if($v -> stgl!=""){
		  echo __get_date(strtotime($v -> stgl,2));} ?></td>
          <td><?php echo __get_rupiah($v->sprice); ?></td>
		  
      		
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
          
          <th rowspan=2 >Payment Type</th>
          <th rowspan=2  >Date</th>
		  <th rowspan=2  >Amount</th>
		  <th colspan=2 >Transfer</th>
		  <th colspan=3 >Giro</th>
	      <th rowspan=2 valign=top >Status</th>
		  
                                        </tr>
										
										
                                        <tr>
          
		<th>Rekening Tujuan</th>
		<th>Tanggal Transfer</th> 
		<th>Nama Giro</th>		 
		<th>No. Giro</th>
		<th>Tanggal Giro</th>
		  
                                        </tr>										
										
                                    </thead>
                                    <tbody>
		  <?php
		  //if($jpm>0){
		  foreach($pembayaran as $k => $v) :

	 $pstatuss=$v->pstatuss;
	 
	 if($v -> ptgl_trans=="0000-00-00"){
		 $v -> ptgl_trans="";
	 }
	 if($v -> ptgl_giro=="0000-00-00"){
		 $v -> ptgl_giro="";
	 }
		  ?>
                                        <tr>
          <td><?php echo ucfirst($v -> ptype); ?></td>
          <td><?php 
		  if(($v -> pm_tgl!="")AND($v -> pm_tgl!="0000-00-00")){
		  echo __get_date(strtotime($v -> pm_tgl),1); }else{ }
		  
		// if($v -> ptgl_giro==""){			
			// echo "";
		// }else{ echo __get_date(strtotime($v -> ptgl_giro),1);}		  
		  
		// if($v -> ptgl_trans==""){			
			// echo "";
		// }else{ echo __get_date(strtotime($v -> ptgl_trans),1);}		  
		  
		  ?>
		  </td>
		  <td><?php 
		  if($v -> pamount>0){
		  echo __get_rupiah($v -> pamount); }?></td>

		<td><?php echo $v -> prekto; ?></td>
		<td><?php 
		if($v -> ptgl_trans==""){			
			echo "";
		}else{ echo __get_date(strtotime($v -> ptgl_trans),1);}
		
		 ?></td> 
		<td><?php echo $v -> pgiroacc; ?></td>
		<td><?php echo $v -> pgirono; ?></td>
		<td><?php 
		if($v -> ptgl_giro==""){			
			echo "";
		}else{ echo __get_date(strtotime($v -> ptgl_giro),1);}
		 ?></td>
		 
		
		  
          <td><?php 
		  //$noinv=$v -> no_invoice;
		  // $byrcash=$v -> pcash;
		  // $byrgiro=$v -> pgiro;
		  // $piutang=$v -> piutang;
		  $sstatus=$v -> pstatus;
		  $st="";
		  if($sstatus==1){
		  $st="Pending";
		  }elseif($sstatus==3){
		  $st="Done";
		  }if($sstatus==2){
		  $st="Delete";
		  }
		  ?>
		  <?php if($st=="Pending"){ ?>
		 <a href="<?php echo site_url('pembayaran_detail/home/pembayaran_terima/'.$v ->pno_pm.'/'.$scid.'/'.$v ->pmdid.'/'.$v -> pamount.'/'.$detailx[0]->pno_pm); ?>"><?=$st;?></a>
		  <?php } else { echo $st;}?>
          </td>		
		
		
										</tr>
																				
        <?php endforeach; 
		 // }
		//echo $totaltagihanx;
		?>
                                    </tbody>
                                </table><br>	
		
		
	<br>
	
	<form method=POST action="<?php echo site_url('pembayaran_detail/home/pembayaran_lunas/'.$scid.'/'.$pno_pm); ?>" >
<table>
	 <tr>
          
        <th colspan=3>
		 
		</th>
        <th>
		<input type="hidden" name="tots" id="totalcost"  value="<?=$totaltagihan;?>" size="15"  />
		<input type=hidden name=pno_pm value="<?=$pno_pm;?>">
		<input type=hidden name=scid value="<?=$scid;?>">
		<input type=hidden id="totalz" name="sisaz" value="<?=$totaltagihanx;?>" size="15" />
		</th><th>
		<?php if($pembayaran[0]->pstatuss<3){?>
		<input class="btn text-muted text-center btn-danger" type=submit value="PAID">
		<?php } ?>
		
		</th>
		  
      </tr>

</table>	
		</form>
		
	
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
