
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
            <form class="form-horizontal" action="<?php echo site_url('purchase_order/home/penerimaan_add/'.$id); ?>" method="post">
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

                    <div class="col-lg-4">	<?php $tg= date('his');  $pno=$detailx[0]->pnobukti . '-' . $tg; ?>
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
				<button class="btn text-muted text-center btn-danger" type="submit">Add Penerimaan</button>
							<label for="status" class="control-label col-lg-4"></label>

				</div>
            </form>

			
        </div>
    </div>
</div>

                    
    </div>
    </div>
    </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
