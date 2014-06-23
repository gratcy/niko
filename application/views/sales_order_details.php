
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
                <div class="col-lg-12">
                    <h1 class="page-header">sales Order Add</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>sales Order Add <?php echo "$id $scid";?></h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('sales_order_detail/home/sales_order_detail_add'); ?>" method="post">

<?php  //print_r($detailx);?>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Cabang</label>

                    <div class="col-lg-4">	
					<input type=text value="<?php echo $detailx[0]->sbid; ?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">No SO</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->snoso; ?>" class="form-control" disabled>
                    </div>
                </div>

				
	            <div class="form-group">
						<label for="status" class="control-label col-lg-4">Type SO</label>
                    
                    <div class="col-lg-4">
						<select name="stype" data-placeholder="Type SO" class="form-control chzn-select">
						<option value="<?php echo $detailx[0]->stype; ?>"><?php echo $detailx[0]->stype; ?></option>
						<option value="penjualan">Penjualan</option>
						<option value="retur">Retur</option>
						<option value="adj">Adj</option>
						</select>
                    </div>
				</div>					
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Customer</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->scid; ?>" class="form-control" disabled>
                    </div>
                </div>
				

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sales</label>

                    <div class="col-lg-4">
                       	<input type=text value="<?php echo $detailx[0]->ssid; ?>" class="form-control" disabled>
                    </div>
                </div>				
				

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Tanggal</label>

                    <div class="col-lg-4">
					<input type=text value="<?php echo $detailx[0]->stgl; ?>" class="form-control" disabled>
                    </div>   				
					
					
                </div>



				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Currency</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Currency" value="<?php echo $detailx[0]->scurrency; ?>" class="form-control" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Kurs</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Kurs" value="<?php echo $detailx[0]->skurs; ?>" class="form-control" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">NPWP</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Npwp" value="<?php echo $detailx[0]->snpwp; ?>" class="form-control" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Sisa Plafon</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="sisa plafon" value="<?php echo $detailx[0]->ssisaplafon; ?>" class="form-control" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">FREE PPN</label>

                    <div class="col-lg-4">
                        <select name="sfreeppn">
						<option value="<?php echo $detailx[0]->sfreeppn; ?>"><?php echo $detailx[0]->sfreeppn; ?></option>
						<option value="0">No</option>
						<option value="1">Yes</option>
						</select>
                    </div>
                </div>
               
				
	
				

				
				
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Keterangan</label>

                    <div class="col-lg-4">
                        <textarea name="sketerangan" class="form-control" placeholder="Description" disabled ><?php echo $detailx[0]->sketerangan; ?></textarea>
                    </div>
                </div>				
				
                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Status</label>
                    
                    <div class="col-lg-4">
						<select name="pstatus" data-placeholder="status" class="form-control chzn-select">
						<option value="<?php echo $detailx[0]->sstatus; ?>"><?php echo $detailx[0]->sstatus; ?></option>
						<option value=0>Pending</option>
						<option value=1>Ok</option>
						</select>
                    </div>
				</div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
                    <div class="col-lg-4">
				<!--button class="btn text-muted text-center btn-danger" type="submit">Submit</button>
				<button class="btn text-muted text-center btn-primary" type="button" onclick="location.href='javascript:history.go(-1);'">Back</button-->
					</div>
				</div>
            </form>
        </div>
    </div>
</div>





 <form class="form-horizontal" action="<?php echo site_url("sales_order_detail/home/sales_order_detail_add/$id/$scid"); ?>" method="post">

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
		  
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  
		
		  foreach($detail as $k => $v) :	
	
		  ?>
          <tr>
          
          <td><?php echo $v -> pppid; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
          <td><?php echo $v -> pcurrency; ?></td>
          <td><?php echo $v -> pqty; ?></td>
          <td><?php echo $v -> pharga; ?></td>
          <td><?php echo $v -> pdisc; ?></td>
		  <td><?php echo $v -> pketerangan; ?></td>
          <td><?php echo $v -> pstatus; ?></td>
		
		
		
		
		
										</tr>
        <?php endforeach; ?>
		
	
                                    </tbody>
                                </table>
		</form>						
    <?php //echo $pages; ?>
                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
