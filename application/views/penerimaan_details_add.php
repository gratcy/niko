
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
            <h5>Penerimaan Barang</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" >
<p align=center><table width=800 ><tr><td>
<?php  //print_r($detailx);?>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Cabang</label>

                    <div class="col-lg-4">	
					<input type=text value="<?php echo $detailx[0]->bname; ?>" class="form-control" disabled>
					
					<input type=hidden value="<?php echo $id; ?>" class="form-control" name=id >
                    </div>
                </div>


				<div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No bukti</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->pnobukti; ?>" class="form-control" disabled>
                    </div>
                </div>
	
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No Penerimaan</label>

                    <div class="col-lg-4">	
					<input type=text  class="form-control" name=pno_penerimaan  value="<?php echo $pno; ?>" >
                    </div>
                </div>


	
				
	</td><td>			



                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Ref</label>

                    <div class="col-lg-4">
                       <input type=text value="<?php echo $detailx[0]->pref; ?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Tanggal</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $detailx[0]->ptgl; ?>" class="form-control" disabled>
                    </div>
       					
					
                </div>


				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Alamat</label>

                    <div class="col-lg-4">
						<input type=text value="<?php echo $detailx[0]->pgudang; ?>" class="form-control" disabled>
                    </div>
                </div>       
				
				</td></tr></table></p>
				
                <div class="form-group">
	

				</div>
            </form>

			
        </div>
    </div>
</div>


<?php //echo site_url('purchase_order_detail/home/penerimaan_details_add/'.$id); ?>




<form class="form-horizontal" action="<?php echo site_url('purchase_order_detail/home/penerimaan_details_add/'.$id); ?>" method="post">


  <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
          <th>Nama Product</th>
          <th>Currency</th>
          <th>Qty</th>
          <th>Harga</th>
          <th>Discount </th>
		  <th>Total</th>
		  <th>Keterangan</th>
          <th>Status</th>
	
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  $totalharga=0;
		
		  foreach($detail as $k => $v) :	
		  $total= ($v -> pharga* $v -> pqty)-($v -> pharga * $v -> pdisc *0.01 * $v -> pqty );
		  ?>
          <tr>
          
          <td><?php echo $v -> pname; ?></td>
          <td><?php echo $v -> pcurrency; ?> </td>
          <td>
		  <input type=hidden value="<?php echo $detailx[0]->pbid; ?>" name=pbid[] class="form-control" >
		  <input type=hidden name=pid[] value="<?php echo $v -> pid; ?>">
		  <input type=hidden name=ppid[] value="<?php echo $v -> ppid; ?>">
		  <input type=hidden name=pppid[] value="<?php echo $v -> pppid; ?>">
		  <input type=hidden name=pcurrency[] value="<?php echo $v -> pcurrency; ?>">
		  <input type=hidden name=pharga[] value="<?php echo $v -> pharga; ?>">
		  <input type=hidden name=pdisc[] value="<?php echo $v -> pdisc; ?>">
		  <input type=hidden name=pketerangan[] value="<?php echo $v -> pketerangan; ?>">
		  <input type=hidden name=pstatus[] value="<?php echo $v -> pstatus; ?>">
		  <input type=hidden name=pqtyz[] value="<?php echo $v -> psisa; ?>">
		  <input type=hidden name=pno_penerimaan[] value="<?php echo $pno; ?>">
		  <select name="pqty[]" >
		  
		  
		  <?php $psisa= $v -> psisa;
				for($i=$psisa;$i>=0;$i--){
					echo "<option value=$i >$i</option>";
				}		  
		  ?></select></td>
          <td><?php echo $v -> pharga; ?></td>
          <td><?php echo $v -> pdisc; ?></td>
		  <td><?php echo $total; ?></td>
		  <td><?php echo $v -> pketerangan; ?></td>
          <td><?php echo $v -> pstatus; ?></td>
		
		
	
		
		
										</tr>
        <?php 
		$totalharga=$totalharga+$total;
		endforeach; ?>
		
		
<form>
		         <tr>
          
          <td>DPP</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
		  <td></td>
          <td></td>
		
		
		  <td>
              
          </td>		
		</tr>
		         <tr>
          
          <td>PPN</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
		  <td></td>
          <td></td>
		
		
		  <td>
              
          </td>		
		</tr>	
		         <tr>
          
          <td>TOTAL</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
		  <td><?php echo $totalharga;?></td>
          <td></td>
		
		
		  <td>
              
          </td>		
		</tr>	
  </tbody>
                                </table>
<br><input class="btn text-muted text-center btn-primary" type=submit value="APPROVE PENERIMAAN" >		
		</form>		
		
	<a href= "<?php echo site_url('purchase_order_detail/home/purchase_order_details/' . $id); ?>" ><button class="btn text-muted text-center btn-danger" type="submit">LIHAT PO</button></a>								
											

                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
