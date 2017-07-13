 
<script>
$(function() {
$("#search").autocomplete({
delay:0, 
cacheLength: 0,
minLength: 1,
    source: '<?php echo site_url('sales_order/home/source'); ?>',
     select: function(event, ui) { 
	    $("#theCid").val(ui.item.cid),
        $("#theCat").val(ui.item.ccat),
		$("#theClimit").val(ui.item.climit),
		$("#theClimitx").val(formatharga2(ui.item.climit)),
		$("#theNpwp").val(ui.item.cnpwp),
		$("#theDeliver").val(ui.item.cdeliver),
		$("#theTopcash").val(ui.item.ccash),
		$("#theTopcredit").val(ui.item.ccredit),
		$("#theTopcashx").val(ui.item.ccash),
		$("#theTopcashxnico").val(ui.item.ccashnico),
		$("#theTopcreditx").val(ui.item.ccredit),
		$("#theTopcreditxnico").val(ui.item.ccreditnico),
		$("#theAddr").val(ui.item.caddr),
		$("#thePkp").val(ui.item.cpkp),
		$("#theSid").val(ui.item.csid),
		$("#theSname").val(ui.item.csname),
		$("#thePhone").val(ui.item.cphone),
		$("#theTopx").val(ui.item.topx),
		$("#theTopxx").val(ui.item.topx)
	
		
    }
	

})

});
</script>



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
        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Payment </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('PaymentOrderExecute')) : ?>
                <a href="<?php echo site_url('pembayaran/home/pembayaran_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Payment</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
	
	
	

<form method="POST" action="?search=1" class="form-horizontal" >
					<input  name="cid" type="hidden" id="theCid"  **/>
					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<div class="col-lg-6">
									Customer <input name="cname" type="text" id="search" class="form-control" />
							</div>
							<div class="col-lg-2"><br>
								
							</div>
						</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<div class="col-lg-6">
								
								Date/Year <br>
									<select name=monthh class="form-control"  >
									    <option value="0" >Pilih</option>
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
							</div>
							<div class="col-lg-2">
							<br>
							<select name=years class="form-control"  >
				
				<?php 				
					$thisyear=date('Y')+1;
					for($t=2009;$t< $thisyear;$t++){
					echo "<option value='$t' >$t</option>";
					}
				?>
				
				</select>
							
							
							
								
							</div>
						</div>
						</div>
					</div>
					
					

					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<div class="col-lg-6">
									Payment No.<input type="text" name="pno_pm" class="form-control"  >
								</div>

							</div>
						</div>
					</div>						

					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<div class="col-lg-6">
									Reff No.<input type="text" name="sreff" class="form-control"  >
								</div>
								<div class="col-lg-2"><br>
									
								</div>
							</div>
						</div>
					</div>
			 
					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
								<div class="col-lg-6">
								   Status<select name="sisa" class="form-control">
								   <option value="x">ALL</option>
								   
								   <option value="0">Pending</option>
								   <option value="1">Active</option>
								   <option value="3">Done</option>
								   </select>
								</div>
								<div class="col-lg-2">
									<br>
									<input type="submit" value="Search" class="btn btn-default btn-grad">
								</div>
							</div>
						</div>
					</div>
				</form>	
	
	
	
	
	
	
	
	
	
	
            <div class="row">
			
			
			
			
			
			
			
			
			
			
			
			
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Payment
                <div class="searchTable">
                <form action="<?php echo current_url();?>" method="post">
					<div class="sLeft"><input type="text" placeholder="<?php echo ($keyword == '' ? 'Search !!!' : $keyword)?>" name="keyword" class="form-control" autocomplete="off" /></div>
					<div class="sRight"><button class="btn text-muted text-center btn-danger" type="submit">Go</button></div>
                        <span id="sg1"></span>
                </form>
                </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Reff No.</th>
          <th>Payment No.</th>
    
          <th>Date</th>
          
            <th>Customer</th>
			<th>Total Invoice </th> 
          <th>Total Return </th> 		
		<th>Total Tagihan </th>
		<th>Total Terima </th>
		<th>Pembayaran Pending </th>
		<th>Sisa Tagihan </th>
          <th>Status</th>
		  <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($pembayaran as $k => $v) :

		  ?>
                                        <tr>
		  <td><?php echo $v -> preff; ?></td>
          <td><?php echo $v -> pno_pm; ?>- <?php echo $v -> pcid; ?></td>
          <td><?php echo __get_date(strtotime($v -> pdate),1); ?></td>
         
          <td><?php echo $v -> pcname; ?></td>
		  <td><?php echo __get_rupiah($v -> ptotal_inv); ?> </td>
          <td><?php echo __get_rupiah($v -> ptotal_retur); ?> </td>		  
		  <td><?php echo __get_rupiah($v -> ptotal_tagihan); ?></td>
		  <td><?php echo __get_rupiah($v -> ptotal_terima); ?> </td>
		  <td><?php echo __get_rupiah($v -> ptotal_pending); ?> </td>
		  <td><?php $sisa=$v -> ptotal_tagihan-$v -> ptotal_terima;
		  echo __get_rupiah($sisa); ?></td>

          <td><?php 
		  $sstatus=$v -> pstatus;
		  if($sstatus==0){
		  $st="Pending";
		  }elseif($sstatus==1){
		  $st="Active";
		  }if($sstatus==2){
		  $st="Delete";
		  }if($sstatus==3){
		  $st="Done";
		  }
		  // if($sstatus==4){
		  // $st="Done";
		  // }
		  echo $st; 
		  ?></td>
		
		
		  <td>
		  <a href="<?php echo site_url('pembayaran_detail/home/pembayaran_detail_addz/'.$v->pcid.'/' . $v -> pno_pm ); ?>"><i class="icon-book"></i></a>
		  
		  <?php if(($v->jumb==0)AND($st=="Done")){ ?>
		  <a href="<?php echo site_url('komisi/home/add_komisi/'.$v -> pno_pm ); ?>"><i class="icon-pencil"></i></a>
		  <?php } ?>
          </td>
		
		
										</tr>
        <?php endforeach; ?>
                                    </tbody>
                                </table>
    <?php echo $pages; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
       <!--END PAGE CONTENT -->
