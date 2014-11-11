
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
  

<script>
$(function() {
$("#search").autocomplete({
delay:0, 
cacheLength: 0,
minLength: 1,
    source: '<?php echo site_url('purchase_order_detail/home/source_po'); ?>',
     select: function(event, ui) { 
	    $("#thePid").val(ui.item.pid),
        $("#thePhpp").val(ui.item.phpp)
	
		
    }
	

})

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
            <h5>Purchase Order Add</h5>
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
                    <label for="text1" class="control-label col-lg-4">No bukti</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->pnobukti; ?>" class="form-control" disabled>
                    </div>
                </div>

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
				
				
	</td><td>			

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Kode Barang</label>

                    <div class="col-lg-4">
<input  name=pname type="text" id="search" class="form-control"   />
<input  name=pppid type="hidden" id="thePid" class="form-control"   />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Mata Uang</label>

                    <div class="col-lg-4">
                        <input type="text" name="pcurrency" class="form-control"  value="IDR"   />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Qty</label>

                    <div class="col-lg-4">
                        <input type="text" name="pqty" class="form-control" data-placeholder="Point" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Harga</label>

                    <div class="col-lg-4">
<input  name=pharga type="text" id="thePhpp" class="form-control"   />
                    </div>
                </div>
				

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Keterangan</label>

                    <div class="col-lg-4">
                        <textarea name="pketerangan" class="form-control" placeholder="Description"></textarea>
                    </div>
                </div>				
				
                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Status</label>
                    
                    <div class="col-lg-4">
					
					         <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_status(0,2); ?>
                            </div>
						<!--select name="pstatus" data-placeholder="gudang" class="form-control chzn-select">
						<option value=0>Pending</option>
						<option value=1>Ok</option>
						</select-->
                    </div>
				</div>
				
				</td></tr></table></p>
				
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
                    <div class="col-lg-4">
				<a href= "<?php echo site_url('purchase_order/home/purchase_order_update/' . $id); ?>" ><button class="btn text-muted text-center btn-primary" type="button">EDIT</button></a>	
				<button class="btn text-muted text-center btn-danger" type="submit">ADD ITEM</button>
				
					</div>
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
       
		  <th>Total </th>
		  <th>Keterangan</th>
          <th>Status</th>
		  <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  $totalharga=0;
		
		  foreach($detail as $k => $v) :	
	
		  ?>
         <tr>
          
          <td><?php echo $v -> pname; ?></td>
          <td><?php echo $v -> pcurrency; ?></td>
          <td><?php echo $v -> pqty; ?></td>
          <td><?php echo $v -> pharga; ?></td>
          		  
		<?php
		$total= ($v -> pharga* $v -> pqty)-($v -> pharga * $v -> pdisc *0.01 * $v -> pqty );
		?>
		<td><?php echo $total; ?></td>
		
		  
		  
		  <td><?php echo $v -> pketerangan; ?></td>
          <td><?php echo $v -> pstatus; ?></td>
		
		
		  <td>
            
              <a href="<?php echo site_url('purchase_order_detail/home/purchase_order_detail_delete/' . $v -> pid.'/'. $v -> ppid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
          </td>		
		</tr>
		<?php 
		$totalharga=$totalharga+$total;
		?>
        <?php endforeach; ?>
		
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
					
		
			
<a href= "<?php echo site_url('purchase_order_detail/home/purchase_order_details/' . $id); ?>" ><button class="btn text-muted text-center btn-danger" type="submit">SAVE</button></a>			
								
								
    <?php //echo $pages; ?>
                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
