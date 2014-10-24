
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
            <form class="form-horizontal" action="<?php echo site_url('purchase_order_detail/home/purchase_order_detail_add'); ?>" method="post">
<p align=center><table width=800 ><tr><td>
<?php  //print_r($detailx);?>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Cabang</label>

                    <div class="col-lg-4">	
					<input type=text value="<?php echo $detailx[0]->bname; ?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Type PO</label>

                    <div class="col-lg-4">	
					<input type=text value="<?php echo $detailx[0]->ptype; ?>" class="form-control" disabled>
                    </div>
                </div>				
				
 

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Supplier</label>

                    <div class="col-lg-4">	
					<input type=text value="<?php echo $detailx[0]->ssname; ?>" class="form-control" disabled>
                    </div>
                </div>




				<div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No bukti</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->pnobukti; ?>" class="form-control" disabled>
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
                    <label for="text1" class="control-label col-lg-4">Sales</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->sname; ?>" class="form-control" disabled>
                    </div>
                </div>

				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Gudang</label>

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
          
          <th>Kode Product</th>
          <th>Currency</th>
          <th>Qty</th>
          <th>Harga</th>
          <th>Discount </th>
		  <th>Keterangan</th>
          <th>Status</th>
		  <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  
		
		  foreach($detail as $k => $v) :	
	
		  ?>
          <tr>
          
          <td><?php echo $v -> pppid; ?></td>
          <td><?php echo $v -> pcurrency; ?></td>
          <td><?php echo $v -> pqty; ?></td>
          <td><?php echo $v -> pharga; ?></td>
          <td><?php echo $v -> pdisc; ?></td>
		  <td><?php echo $v -> pketerangan; ?></td>
          <td><?php echo $v -> pstatus; ?></td>
		
		
		  <td>
              <a href="<?php echo site_url('purchase_order_detail/home/penerimaan_update/' . $v -> pid .'/'. $v -> ppid); ?>"><i class="icon-pencil"></i></a>
              <a href="<?php echo site_url('purchase_order_detail/home/penerimaan_delete/' . $v -> pid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
          </td>		
		
		
										</tr>
        <?php endforeach; ?>
                                    </tbody>
                                </table>
								
		<a href= "<?php echo site_url('purchase_order_detail/home/penerimaan_report/' . $id); ?>" ><button class="btn text-muted text-center btn-danger" type="submit">CETAK PENERIMAAN</button></a>											
								
    <?php //echo $pages; ?>
                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
