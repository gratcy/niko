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
                        <h2>Komisi </h2>
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
				
			
		<?php	if(!isset($_GET['no_invoice'])){ $_GET['no_invoice']="";} ?>
               
                    <div class="panel panel-default">
                        <!--div class="panel-heading">
                         
             
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
						</div-->
                        <div class="panel-body">
						
		<?php				
	
     		echo '<table border=0 >';		
			echo '<tr><td>Sales Name </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $komisi[0]->sname.'</td></tr>';	
			echo '<tr><td>Customer </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $komisi[0]->cname.'</td></tr>';	
			if($_GET['no_invoice']!=""){
			echo '<tr><td>No Invoice </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$komisi[0]->sno_invoice.'</td></tr>';	
			}
			echo '<tr><td>Invoice Date </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. date('d/m/Y',strtotime($komisi[0]->date_inv)).'</td></tr>';	
			echo '<tr><td>Due Date </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. date('d/m/Y',strtotime($komisi[0]->date_lunas)).'</td></tr>';
			echo '<tr><td>Pay Date </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. date('d/m/Y',strtotime($komisi[0]->date_bayar)).'</td></tr>';
			echo '</table>';
			
?>			
               


<br>
<br>						

					<table border=1 class="table table-striped table-bordered table-hover"  >
					<tr>
					<td>No</td>
					<!--td>CCIDD</td-->
					<?php if($_GET['no_invoice']==""){ ?>
					<td>No Invoice</td>
					<?php } ?>
					<td>Produk</td>
					<td>Kategori</td>					
					<td>Amount</td>
					<td>Type Bayar</td>
					<td>Persen</td>
					<td>Duration</td>
					<td>Limit</td>
					<td>Type Com</td>
					<td>Komisi</td>
					
					</tr>
					
			<?php 
					$total_com=0;
					$persenn=0;
					$typer="";
					$comm=0;
					$i=0; //die;
					

					$zum= count($komisi_h);
					$ttotal=0;
for($j=0;$j<$zum;$j++){	
if($_GET['no_invoice']==""){
			$total_com=0;
}			
			$i=0;		
	foreach( $komisi  as $k=>$v ){  
			$i++;
			if($v -> sno_invoice == $komisi_h[$j]->sno_invoice){		
					
	
			?>
					<tr>
					<td><?=$i;?></td>
					<?php if($_GET['no_invoice']==""){ ?>
					<td><?php echo $v -> sno_invoice; ?></td>
					<?php } ?>
					<td><?php echo $v -> pname; ?></td>
					<td><?php echo $v -> kategori; ?></td>					
					<td><?php echo $v -> p_amount; ?></td>
					<td><?php echo $v -> type_bayar; ?></td>
					<td><?php echo $v -> persen; ?></td>
					<td><?php echo $v -> duration; ?></td>
					<td><?php echo $v -> limit; ?></td>
					<td><?php echo $v -> type_com; ?></td>
					<td><?php echo number_format($v -> amount_com); ?></td>
					
					</tr>
					
			<?php 
					
					$total_com=$v -> amount_com + $total_com;
			}	

	}
	
	if($_GET['no_invoice']==""){
	echo "<tr><td></td><td> TOTAL </td><td colspan=8>".number_format($komisi_h[$j]->tamount_com)."</td><td>".number_format($total_com)."</td>";
    }
$ttotal=$ttotal+$komisi_h[$j]->tamount_com;
}
		if($_GET['no_invoice']==""){	
			?>
					
					<tr>
					<td></td>					
					<td>Total</td>
					<td colspan=8 >&nbsp;</td>
					<td><?php echo $ttotal; ?></td>
					
					</tr>	
					
				<?php }else{ ?>
				
									<tr>
					<td></td>					
					<td>Total</td>
					<td colspan=7 >&nbsp;</td>
					<td><?php echo number_format($total_com); ?></td>
					
					</tr>	
					
					<?php } ?>
					
					
					
					
					
					
					
					
					
					
					
					
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


