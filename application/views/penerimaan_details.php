
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
            <form class="form-horizontal" action="<?php echo site_url('purchase_order/home/penerimaan_add'); ?>" method="post">
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
					<input type=text value="<?php echo date('d/m/Y',strtotime($detailx[0]->ptgl)); ?>" class="form-control" disabled>
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
				
							<label for="status" class="control-label col-lg-4"></label>

				</div>
            </form>

			
        </div>
    </div>
</div>










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
          <td><?php echo $v -> pcurrency; ?></td>
          <td><?php echo $v -> pqty; ?></td>
          <td><?php echo $v -> pharga; ?></td>
          <td><?php echo $v -> pdisc; ?></td>
		  <td><?php echo $total; ?></td>
		  <td><?php echo $v -> pketerangan; ?></td>
         
		
		
	
		
		
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
		</form>		
		
		
		
		
		
		
		
		
		
                                    </tbody>
                                </table>

		<a href= "<?php echo site_url('purchase_order_detail/home/purchase_order_report/' . $id); ?>" ><button class="btn text-muted text-center btn-danger" type="submit">LIHAT PO</button></a>								
		<a href= "<?php echo site_url('purchase_order_detail/home/penerimaan_report/' . $id .'/'.$pno); ?>" ><button class="btn text-muted text-center btn-primary" type="submit">CETAK PENERIMAAN</button></a>											
								
    <?php //echo $pages; ?>
                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
