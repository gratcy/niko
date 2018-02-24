<style type="text/css">
div#txtHint{position: absolute;
width: 230px;
top: 40px;
max-height: 300px;
z-index: 9999;
border: 1px solid #999;
background: #fff;
cursor: default;
overflow: auto;
left:inherit!important;
}
</style>


<script>
$(function() {
$("#search").autocomplete({
delay:0, 
cacheLength: 0,
minLength: 1,
    source: '<?php echo site_url('sales_order/home/source_sales'); ?>',
     select: function(event, ui) { 
	    $("#theSid").val(ui.item.sid),
        $("#theSname").val(ui.item.sname)
	
		
    }
	

})

});
</script>


<script>
function displayname() {
//alert('zzz');
//var jobValue = document.getElementById('txtTotpay').value;
var ee=document.getElementById('result_ee').value;
// var tpm=document.getElementById('tpm').value;
// var tpc=document.getElementById('tpc').value;

document.getElementById('tpaymentt').value = document.getElementById('txtTotpay').value  -  document.getElementById('treturns').value  - document.getElementById('tdisc').value;
document.getElementById('tpaycom').value = document.getElementById('txtTotcom').value;

document.getElementById('result_b').value =0;
document.getElementById('result_c').value =0;
document.getElementById('result_d').value =0;
document.getElementById('result_e').value =parseInt(document.getElementById('tpaycom').value);
document.getElementById('result_g').value =0;
document.getElementById('rg').value =0;



ee=parseInt(document.getElementById('tpaycom').value);
ee= ee.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
document.getElementById('result_ee').value=ee;
document.getElementById('result_f').value =ee;
document.getElementById('result_ff').value =ee;


tpc=parseInt(document.getElementById('tpaycom').value);
tpc= tpc.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
document.getElementById('tpc').value=tpc;


tpm=parseInt(document.getElementById('tpaymentt').value);
tpm= tpm.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
document.getElementById('tpm').value=tpm;
//alert(ee);
}

function cala() {
	var ee=document.getElementById('result_ee').value;
	var rb=document.getElementById('rb').value;	

	document.getElementById('result_b').value = (document.getElementById('txtTotpay').value * document.getElementById('cal_a').value) / 100;	
	document.getElementById('result_e').value = parseFloat(document.getElementById('tpaycom').value) + parseFloat(document.getElementById('result_b').value) - parseFloat(document.getElementById('result_c').value)- parseFloat(document.getElementById('result_d').value);
	
	ee=parseInt(document.getElementById('result_e').value);
	ee= ee.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
	document.getElementById('result_ee').value=ee;
	document.getElementById('result_ff').value=ee;
	document.getElementById('result_f').value=ee;

	rb=parseInt(document.getElementById('result_b').value);
	rb= rb.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
	document.getElementById('rb').value=rb;	
	
}

function calb() {
	var ee=document.getElementById('result_ee').value;
	var rc=document.getElementById('rc').value;
	
	document.getElementById('result_c').value = (document.getElementById('treturns').value * document.getElementById('cal_b').value) / 100;
    document.getElementById('result_e').value = parseFloat(document.getElementById('tpaycom').value) + parseFloat(document.getElementById('result_b').value) - parseFloat(document.getElementById('result_c').value)- parseFloat(document.getElementById('result_d').value);
	ee=parseInt(document.getElementById('result_e').value);
	ee= ee.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
	document.getElementById('result_ee').value=ee;	
	document.getElementById('result_ff').value=ee;
	document.getElementById('result_f').value=ee;
	
	rc=parseInt(document.getElementById('result_c').value);
	rc= rc.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
	document.getElementById('rc').value=rc;	
}

function calc() {
	var ee=document.getElementById('result_ee').value;
	var rd=document.getElementById('rd').value;
	
	document.getElementById('result_d').value = (document.getElementById('tdisc').value * document.getElementById('cal_c').value) / 100;
	document.getElementById('result_e').value = parseFloat(document.getElementById('tpaycom').value) + parseFloat(document.getElementById('result_b').value) - parseFloat(document.getElementById('result_c').value)- parseFloat(document.getElementById('result_d').value);
	
	ee=parseInt(document.getElementById('result_e').value);
	ee= ee.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
	document.getElementById('result_ee').value=ee;
    document.getElementById('result_ff').value=ee;
    document.getElementById('result_f').value=ee;	
	
	rd=parseInt(document.getElementById('result_d').value);
	rd= rd.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
	document.getElementById('rd').value=rd;	
	
}




function calg() {
	var ee=document.getElementById('result_ee').value;
	var ff=document.getElementById('result_e').value;
	var rg=document.getElementById('rg').value;
	


	
	ee=parseInt(document.getElementById('result_e').value);
	ee= ee.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
	document.getElementById('result_ee').value=ee;
    document.getElementById('result_ff').value=ee;
    document.getElementById('result_f').value=ff;	


	document.getElementById('result_g').value = (document.getElementById('result_f').value * document.getElementById('cal_g').value) / 100;
	
	
	
	rg=parseInt(document.getElementById('result_g').value);
	rg= rg.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
	document.getElementById('rg').value=rg;	
	
}


function ekspor(){
	
	window.location='?xcl=1';
}

function repres(){
	
	window.location='?xcl=0';
}
</script>


<body onload="displayname()" >



<?php if(!isset($_POST['xcl'])){ $_POST['xcl']="";} ?>


<?php
if($_POST['xcl']=="Excel"){

$filename ="excelreport.xls";

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");
	
	
}

?>


        <!--PAGE CONTENT -->
        <div id="content">
		
<?php if($_POST['xcl']!="Excel"){ ?>		
		
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Commission </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('SalesOrderExecute')) : ?>
           
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         
             
                <form action="<?php echo current_url();?>" method="POST">
					
					<table><tr>
					<td>Sales Name &nbsp;&nbsp;</td>

				<td>
                   
					<input  name=sname type="text" id="search" class="form-control"   />
					<div  style="display: none;">
					<input  name=sid type="text" id="theSid" class="form-control"   **/>
					</div>
                </td>
				<td>
				<select name=monthh class="form-control"  >
				<option value="01" >Januari</option>
				<option value="02" >Februari</option>
				<option value="03" >Maret</option>
				<option value="04" >April</option>
				<option value="05" >Mei</option>
				<option value="06" >Juni</option>
				<option value="07" >Juli</option>
				<option value="08" >Agustus</option>
				<option value="09" >September</option>
				<option value="10" >Oktober</option>
				<option value="11" >November</option>
				<option value="12" >Desember</option>
				</select>
				</td>
				<td>
				<select name=years class="form-control"  >
				
				<?php 
				$thisyear=date('Y')+1;
				for($t=2016;$t< $thisyear;$t++){
				echo "<option value='$t' >$t</option>";
				}
				
				?>
				<!--option value=2011 >2011</option>
				<option value=2012 >2012</option>
				<option value=2013 >2013</option>
				<option value=2014 >2014</option>
				<option value=2015 >2015</option>
				<option value=2016 >2016</option>
				<option value=2017 >2017</option>
				<option value=2018 >2018</option>
				<option value=2019 >2019</option>
				<option value=2020 >2020</option-->
				
				</select>
				</td>
				
				<td>
				<input type=submit name="xcl" value=Submit class="form-control"  >
				</td>
				<td>
				<input type=reset class="form-control" onclick="repres()" >
				</td>	
				<td>
				<input type=submit name="xcl" class="form-control" value="Excel"  >
				</td>				
</tr>
</table>				
                        
                </form>
                </div>
                        </div>              
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
          
		<?php 
		
		//print_r($starget);
		$stargett=0;
		if(!isset($starget)){ $starget="";}	
		$cstarget=count($starget);
		//echo $cstarget.'-----<br>';
		if($cstarget>0){
			$stargett=$starget[0]->ttarget;
		}
		$ttdisc=0;
		$ttret=0;
		if(!isset($tretur)){ $tretur="";}	
		//print_r($tretur);
		
		if($tretur!=""){
			foreach( $tretur  as $x=>$y ){ 
				$ttdisc=$ttdisc+$y->totdisc;
				$ttret=$ttret+$y->totretur;
			}
		}


		
		$ttinv=0;
		if(!isset($totinv)){ $totinv="";}	
		//print_r($tretur);
		
		if($totinv!=""){
			foreach( $totinv  as $a=>$b ){ 
				
				$ttinv=$ttinv+$b->dototal;
				
				//echo $b->dototal.'--'.$ttinv.'<br>';
			}
		}

		//echo $ttinv;
		
		?>

                        <div class="panel-body">
						
	
	
                         
                <div>
                <form action="<?php echo current_url();?>" method="post">
					
		<table>
					
			<tr>

				<td>
                   
			SALES TARGET
                </td>
				<td>
					&nbsp;
				</td>
				<td>
				<input type=hidden name=starget class="form-control"  value="<?=$stargett;?>" >
				<input type=text  class="form-control"  value="<?=number_format($stargett);?>" >
				</td>
				
				<td>
				<!--input type=submit value=Submit class="form-control" -->
				</td>
				<td>
				<!--input type=reset class="form-control" -->
				</td>				
</tr>

<tr>

				<td>
                   
					TOTAL SALES
                </td>
				<td>
<input type=hidden name=tsales class="form-control"  id='tsales' value="<?=$ttinv;?>">
<input type=text  class="form-control"   value="<?=number_format($ttinv);?>">
				</td>
				<td>
				&nbsp;
				
				</td>
				
				<td>
				<!--input type=submit value=Submit class="form-control" -->
				</td>
				<td>
				<!--input type=reset class="form-control" -->
				</td>				
</tr>

<tr>

				<td>
                   
					TOTAL RETURN
                </td>
				<td>
<input type=hidden name=treturn class="form-control" value="<?=$ttret;?>" >
<input type=text  class="form-control" value="<?=number_format($ttret);?>" >
				</td>
				<td>
				&nbsp;
				
				</td>
				
				<td>
				<!--input type=submit value=Submit class="form-control" -->
				</td>
				<td>
				<!--input type=reset class="form-control" -->
				</td>					
</tr>


<tr>

				<td>
                   
			TOTAL SALES AFTER RETURN
                </td>
				<td>
					&nbsp;
				</td>
				<td>
				<?php $tsa= $ttinv- $ttret; ?>
				<input type=hidden name="tsalesafter" id="tsalesafter" value="<?=$tsa;?>" class="form-control"  >
				<input type=text  value="<?=number_format($tsa);?>" class="form-control"  >
				</td>
				
				<td>
				
				</td>
				<td>
				
				</td>				
</tr>

<tr>

				<td>
                   SALES PERFORMANCE 
			
                </td>
				<td>
					
				</td>
				<td>
				<?php if($stargett!=0){$sper= ($tsa/$stargett) * 100; }else{$sper=0;} ?>
				<input type=hidden name=prosentase class="form-control" value="<?=$sper;?> %"  >
				<input type=text  class="form-control" value="<?=number_format($sper);?> %"  >
				
				</td>
				
				<td>
				
				</td>
				<td>
				
				</td>				
</tr>


</table>				
                        <span id="sg1"></span>
                </form>
                </div>


<br><br>	
						



                         
                <div>
                <form action="<?php echo current_url();?>" method="post">
					
		<table>


			<tr>

				<td>                   
					SUB TOTAL COMISSION
                </td>
				<td>
					
				</td>
				<td>
				
				
				</td>
				
				<td>
				<!--input type=submit value=Submit class="form-control" -->
				</td>
				<td>
				   <input type=hidden id="tpaycom" name="tsubkomisi" class="form-control"  >
				   <input type=text  id="tpc" name="tpc" class="form-control"  >
				</td>				
			</tr>

		<input type=hidden  id="tpaymentt" name="tpaymentt" class="form-control"  >
					<input type=hidden  id="tpm" name="tpm" class="form-control"  >
					<!--select name="cal_a" id="cal_a" onchange="cala()" class="form-control">
						<option value="0">0 %</option>
						<option value="0.025">0.025 %</option>
						<option value="0.05">0.05 %</option>
						<option value="0.075">0.075 %</option>
						<option value="0.1">0.1 %</option>						
					</select-->
				<input type=hidden  value="0" id="cal_a" name="cal_a" class="form-control"  >	
<input type=hidden id="result_b" name="result_b" class="form-control"  >
				<input type=hidden id="rb" name="rb" class="form-control"  >					
					
			<!--tr>

				<td>                   
					TOTAL PAYMENT NETTO
                </td>
				<td>
					<input type=hidden  id="tpaymentt" name="tpaymentt" class="form-control"  >
					<input type=text  id="tpm" name="tpm" class="form-control"  >
				</td>
				<td>
				
					<select name="cal_a" id="cal_a" onchange="cala()" class="form-control">
						<option value="0">0 %</option>
						<option value="0.025">0.025 %</option>
						<option value="0.05">0.05 %</option>
						<option value="0.075">0.075 %</option>
						<option value="0.1">0.1 %</option>						
					</select>
				
				</td>
				
				<td>
					 
				</td>
				<td>
				<input type=hidden id="result_b" name="result_b" class="form-control"  >
				<input type=text id="rb" name="rb" class="form-control"  >
				</td>				
			</tr-->

			<tr>

				<td>
                   
					TOTAL RETURN
                </td>
				<td>
<input type=hidden name=treturns id="treturns" class="form-control" value="<?=$ttret;?>"  >
<input type=text  class="form-control" value="<?=number_format($ttret);?>"  >
				</td>
				<td>
				<select name="cal_b" id="cal_b" onchange="calb()" class="form-control">
						<option value="0">0 %</option>
						<option value="0.25">0.25 %</option>
						<option value="0.3">0.3 %</option>
						<option value="0.35">0.35 %</option>
						<option value="0.4">0.4 %</option>						
					</select>
				
				</td>
				
				<td>
			
				</td>
				<td>
					<input type=hidden id="result_c" name="result_c" class="form-control"  >
					<input type=text id="rc" name="rc" class="form-control"  >
				</td>				
</tr>

<tr>

				<td>
                   
					TOTAL DISCOUNT
                </td>
				<td>
						<input type=hidden name="tdiscc" id="tdisc" class="form-control" value="<?=$ttdisc;?>" >
						<input type=text  class="form-control" value="<?=number_format($ttdisc);?>" >
				</td>
				<td>
				<select name="cal_c" id="cal_c" onchange="calc()" class="form-control">
						<option value="0">0 %</option>
						<option value="0.25">0.25 %</option>
						<option value="0.3">0.3 %</option>
						<option value="0.35">0.35 %</option>
						<option value="0.4">0.4 %</option>						
					</select>
				
				</td>
				
				<td>
				
				</td>
				<td>
						<input type=hidden id="result_d" name="result_d" class="form-control"  > 
						<input type=text id="rd" name="rd" class="form-control"  > 
						
				</td>				
</tr>



<tr>

				<td>
                   
					TOTAL COMMISSION
                </td>
				<td>
						
				</td>
				<td>

				
				</td>
				
				<td>
				
				</td>
				<td>
						<input type=hidden id="result_e" name="result_e" class="form-control"  >
						<input type=text id="result_ee" name="result_ee" class="form-control"  >
				</td>				
</tr>



				<td>
                   
					PERFORMANCE COMISSION
                </td>
				<td>
						<input type=hidden name="result_f" id="result_f" class="form-control"  >
						<input type=text  class="form-control" name="result_ff" id="result_ff" >
				</td>
				<td>
				<select name="cal_g" id="cal_g" onchange="calg()" class="form-control">
						<option value="0">0 %</option>
						<option value="12.5">12.5 %</option>
						<option value="25">25 %</option>
						<option value="37.5">37.5 %</option>												
					</select>
				
				</td>
				
				<td>
				
				</td>
				<td>
						<input type=hidden id="result_g" name="result_g" class="form-control"  > 
						<input type=text id="rg" name="rg" class="form-control"  > 
						
				</td>				
</tr>

</table>				
                        <span id="sg1"></span>
                </form>
               
<?php } ?>

<br>
Detail Commission
<br>						

					<table border=1 class="table table-striped table-bordered table-hover"  >
					<tr>
					<td>No</td>
					<!--td>CCIDD</td-->
					<td>Sales Name</td>
					<td>Invoice No</td>
					<td>Customer</td>
					<td>Invoice Date</td>					
					<td>Payment Date</td>
					<td>Settlement Date</td>
					<td>Amount</td>
					<!--td>Kategori</td>
					<td>Produk</td>
					
					<td>Type Bayar</td>
					<td>Persen</td>
					<td>Duration</td>
					<td>Limit</td>
					<td>Type Com</td-->
					<td>Commission</td>
					
					</tr>
					
			<?php 
					$total_com=0;
					$persenn=0;
					$typer="";
					$comm=0;
					$i=0; //die;
					$totp_amount=0;
					
			foreach( $komisi  as $k=>$v ){ 
				
			$i++;

			?>
					<tr>
					<td><?=$i;?></td>					
					<td><?php echo $v -> sname; ?></td>
					<td><a href="<?php echo site_url();?>komisi/home/komisi_detail?no_invoice=<?=$v -> sno_invoice;?>" target=blank ><?php echo $v -> sno_invoice; ?></a></td>
					<td><?php echo $v -> cname; ?></td>
					<td><?php echo date('d/m/Y',strtotime($v -> date_inv)); ?></td>						
					<td><?php echo date('d/m/Y',strtotime($v->date_bayar));?></td>
					<td><?php echo date('d/m/Y',strtotime($v -> date_lunas)); ?></td>
					<td><?php echo number_format($v -> tp_amount); ?></td>
					<!--td><?php echo $v -> kategori; ?></td>
					<td><?php echo $v -> pname; ?></td>					
					<td><?php echo $v -> type_bayar; ?></td>
					<td><?php echo $v -> persen; ?></td>
					<td><?php echo $v -> duration; ?></td>
					<td><?php echo $v -> limit; ?></td>
					<td><?php echo $v -> type_com; ?></td-->
					<td><?php echo number_format($v -> tamount_com); ?></td>
					
					</tr>
					
				<?php 
					
					$total_com=$v -> tamount_com + $total_com;
				    $totp_amount=$totp_amount+$v -> tp_amount;
				}  					
				?>
					
					<tr>
					<td></td>					
					<td>Total</td>
					<td colspan=5 >&nbsp;</td>
					<td><?php echo number_format($totp_amount); ?>
					<td><?php echo number_format($total_com); ?>
					<input type=hidden id="txtTotcom" name="txtTotcom" value="<?=$total_com;?>" >
					<input type=hidden id="txtTotpay" name="txtTotpay" value="<?=$totp_amount;?>" >
					</td>
					
					</tr>	
					
				
					
					
					
					
					
					
					
					
					
					
					
					
					</table>
<?php //echo $pages; ?>
						

                        </div>
                    </div>
					
					
				</div>	

					
					
                </div>
            </div>
        </div>
        </div>
        </div>
       <!--END PAGE CONTENT -->
</body>

