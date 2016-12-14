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

        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>komisi </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('SalesOrderExecute')) : ?>
           
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
			
		 <div class="col-lg-12">	
				
			
			
               
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         
                <div>
                <form action="<?php echo current_url();?>" method="post">
					
					<table><tr>

				<td>
                   
					<input  name=sname type="text" id="search" class="form-control"   />
					<input  name=sid type="hidden" id="theSid" class="form-control"   />
                </td>
				<td>
				<select name=monthh class="form-control"  >
				<option value=1 >Januari</option>
				<option value=2 >Februari</option>
				<option value=3 >Maret</option>
				<option value=4 >April</option>
				<option value=5 >Mei</option>
				<option value=6 >Juni</option>
				<option value=7 >Juli</option>
				<option value=8 >Agustus</option>
				<option value=9 >September</option>
				<option value=10 >Oktober</option>
				<option value=11 >November</option>
				<option value=12 >Desember</option>
				</select>
				</td>
				<td>
				<select name=years class="form-control"  >
				<option value=2010 >2010</option>
				<option value=2011 >2011</option>
				<option value=2012 >2012</option>
				<option value=2013 >2013</option>
				<option value=2014 >2014</option>
				<option value=2015 >2015</option>
				<option value=2016 >2016</option>
				<option value=2017 >2017</option>
				<option value=2018 >2018</option>
				<option value=2019 >2019</option>
				<option value=2020 >2020</option>
				
				</select>
				</td>
				
				<td>
				<input type=submit value=Submit class="form-control" >
				</td>
				<td>
				<input type=reset class="form-control" >
				</td>				
</tr>
</table>				
                        <span id="sg1"></span>
                </form>
                </div>
                        </div>
                        <div class="panel-body">
						
						
	<br><br>
                         
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
				<input type=text name=starget class="form-control"  >
				
				</td>
				
				<td>
				<input type=submit value=Submit class="form-control" >
				</td>
				<td>
				<input type=reset class="form-control" >
				</td>				
</tr>

<tr>

				<td>
                   
					TOTAL SALES
                </td>
				<td>
<input type=text name=tsales class="form-control"  >
				</td>
				<td>
				&nbsp;
				
				</td>
				
				<td>
				<input type=submit value=Submit class="form-control" >
				</td>
				<td>
				<input type=reset class="form-control" >
				</td>				
</tr>

<tr>

				<td>
                   
					TOTAL RETURN
                </td>
				<td>
<input type=text name=treturn class="form-control"  >
				</td>
				<td>
				&nbsp;
				
				</td>
				
				<td>
				<input type=submit value=Submit class="form-control" >
				</td>
				<td>
				<input type=reset class="form-control" >
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
				<input type=text name=tsalesafter class="form-control"  >
				
				</td>
				
				<td>
				
				</td>
				<td>
				
				</td>				
</tr>

<tr>

				<td>
                   
			
                </td>
				<td>
					PROSENTASE
				</td>
				<td>
				<input type=text name=prosentase class="form-control"  >
				
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
                   
			TOTAL PAYMENT
                </td>
				<td>
					<input type=text name=tpaymentt class="form-control"  >
				</td>
				<td>
				
				
				</td>
				
				<td>
				<input type=submit value=Submit class="form-control" >
				</td>
				<td>
				<input type=reset class="form-control" >
				</td>				
</tr>

<tr>

				<td>
                   
					TOTAL RETURN
                </td>
				<td>
<input type=text name=treturnn class="form-control"  >
				</td>
				<td>
				&nbsp;
				
				</td>
				
				<td>
			
				</td>
				<td>
			
				</td>				
</tr>

<tr>

				<td>
                   
					TOTAL DISCOUNT
                </td>
				<td>
<input type=text name=tdiscc class="form-control"  >
				</td>
				<td>
				&nbsp;
				
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

					<table border=1 class="gridtable" >
					<tr>
					<td>No</td>
					<!--td>CCIDD</td-->
					<td>Nama Sales</td>
					<td>No Invoice</td>
					<td>Nama Customer</td>
					<td>Tgl Invoice</td>					
					<td>Tgl Lunas</td>
					<td>Tgl Bayar</td>
					<td>Kategori</td>
					<td>Produk</td>
					<td>Amount</td>
					<td>Type Bayar</td>
					<td>Persen</td>
					<td>Duration</td>
					<td>Limit</td>
					<td>Type Com</td>
					<td>Komisi</td>
					
					</tr>
					
					<?php 
					$i=0;
					foreach( $komisi_all  as $k=>$v ){  
					$i++;
			$pcid = $v -> pcid;		
			$cid = $v -> ccidd;
			
			
			$lmt=0;
			$uncid=unserialize($cid);
			
            //echo count($uncid).$pcid.'<br>';
			//echo $pcid.'<br>';//die;
			$par=array('0','0','0','0','0');
			if($pcid>0){
			$par=$uncid[$pcid];

			
			// echo '<pre>';
			// print_r($par);
			//die;
			
			if($v -> stypepay=="cash"){
				$lmt=$par['3'];
			}elseif($v -> stypepay=="credit"){
				$lmt=$par['4'];
			}
			
		 }else{
			 $lmt=0;
				
			}
			//}
			//die;
					
		//$denda= -0.175;
		$denda= $par['2'];		
		if($v -> catname == 'NC'){
			if($v -> stypepay == "cash"){
				$persenn= $par['0'];
				$dur=$v -> days - $lmt;
				if($dur>3){
					$typer="A4";
					$comm=$v -> tamount*$denda /100;
				}elseif($dur<1){
					$typer="A1";
					$comm=$v -> tamount*$persenn /100;
				}else{
					$typer="A3";
					$comm=0;
				}
			}elseif($v -> stypepay == "credit"){
				$persenn= $par['1'];
				$dur=$v -> days - $lmt;
			    if($dur > 5){
					$typer="B4";
					$comm=$v -> tamount*$denda /100;
				}elseif($dur < 1){
					$typer="B1";
					$comm=$v -> tamount*$persenn /100;
				}else{
					$typer="B3";
					$comm=0;
				}
			}elseif($v -> stypepay == "denda"){
				$persenn= $par['2'];
			}
		}elseif($v -> catname == 'K1'){
			if($v -> stypepay == "cash"){
				$persenn= $par['0'];
				$dur=$v -> days - $lmt;
			    if($dur>10){
					$typer="A4";
					$comm=$v -> tamount*$denda /100;
				}elseif($dur>5 AND $dur <= 10){
					$typer="A3";
					$comm=0;
				}elseif($dur<1){
					$typer="A1";
					$comm=$v -> tamount*$persenn /100;
				}else{
					$typer="A2";
					$comm=$v -> tamount* ($persenn /100)*0.5;					
				}
			}elseif($v -> stypepay == "credit"){
				$persenn= $par['1'];
			    $dur=$v -> days - $lmt;
			    if($dur>20){
					$typer="B4";
					$comm=$v -> tamount*$denda /100;
				}elseif($dur>10 AND $dur <= 20){
					$typer="B3";
					$comm=0;
				}elseif($dur>0 AND $dur <= 10){
					$typer="B2";
					$comm=$v -> tamount*($persenn /100) * 0.5;
				}else{
					$typer="B1";
					$comm=$v -> tamount*$persenn /100;
				}
			}elseif($v -> stypepay == "denda"){
				$persenn= $par['2'];
			}			
		}elseif($v -> catname == 'K2'){
			if($v -> stypepay == "cash"){
				$persenn= $par['0'];
				$dur=$v -> days - $lmt;
			    if($dur>10){
					$typer="A4";
					$comm=$v -> tamount*$denda /100;
				}elseif($dur>5 AND $dur <= 10){
					$typer="A3";
					$comm=0;
				}elseif($dur<1){
					$typer="A1";
					$comm=$v -> tamount*$persenn /100;
				}elseif($dur<=5 AND $dur > 0){
					$typer="A2";
					$comm=$v -> tamount* ($persenn /100)*0.5;					
				}
			}elseif($v -> stypepay == "credit"){
				$persenn= $par['1'];
				$dur=$v -> days - $lmt;
			    if($dur>20){
					$typer="B4";
					$comm=$v -> tamount*$denda /100;
				}elseif($dur>10 AND $dur <= 20){
					$typer="B3";
					$comm=0;
				}elseif($dur>0 AND $dur <= 10){
					$typer="B2";
					$comm=$v -> tamount*($persenn /100) * 0.5;
				}else{
					$typer="B1";
					$comm=$v -> tamount*$persenn /100;
				}			
			}elseif($v -> stypepay == "denda"){
				$persenn= $par['2'];
			}			
		}		

if($v -> sname!=""){		
					?>
					<tr>
					<td><?=$i;?></td>
					<!--td><?php echo $v -> ccidd; ?></td-->
					<td><?php echo $v -> sname; ?></td>
					<td><?php echo $v -> sno_invoice; ?></td>
					<td><?php echo $v -> cname; ?></td>
					<td><?php echo $v -> stgl_invoice; ?></td>					
					<td><?php echo $v -> sdate_lunas; ?></td>
					<td><?php echo $v -> sdate_pay; ?></td>
					<td><?php echo $v -> catname; ?></td>
					<td><?php echo $v -> pname; ?></td>
					<td><?php echo $v -> tamount; ?></td>
					<td><?php echo $v -> stypepay; ?></td>
					<td><?php echo $persenn; ?></td>
					<td><?php echo $v -> days; ?></td>
					<td><?php echo $lmt; ?></td>
					<td><?php echo $typer; ?></td>
					<td><?php echo $comm; ?></td>
					
					</tr>
					
					<?php }  } ?>
					
					</table>

						

                        </div>
                    </div>
					
					
					

					
					
                </div>
            </div>
        </div>
        </div>
        </div>
       <!--END PAGE CONTENT -->

<script type="text/javascript">
$(function(){
	$('div.searchTable > form > div.sLeft > input[name="keyword"]').sSuggestion('span#sg1','<?php echo current_url();?>/get_suggestion', 'keyword');
});
</script>
