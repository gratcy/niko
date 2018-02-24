<head>
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
    source: '<?php echo site_url('application/views/assets/sourcex.php?scid='.$scid); ?>',
     select: function(event, ui) { 
	    $("#theId").val(ui.item.pid),
        $("#theCid").val(ui.item.pcid),
		$("#theCode").val(ui.item.pcode),
		$("#theHpp").val(ui.item.phpp),
		$("#theDist").val(ui.item.pdist),
		$("#theSemi").val(ui.item.psemi),
		$("#theKey").val(ui.item.pkey),
		$("#theStore").val(ui.item.pstore),
		$("#theConsume").val(ui.item.pconsume),
		$("#thePoint").val(ui.item.ppoint),
		$("#theDisc").val(ui.item.ddisc),
		$("#thePrice").val(ui.item.price),
		$("#theQty").val(ui.item.mqty),
		$("#theStatus").val(ui.item.pstatus)
	
		
    }
	

})

});
</script>		
		
</head>		
		
	
		
    
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
            <h5>Delivery Order<?php //echo "$id $scid";?></h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <!--form class="form-horizontal" action="<?php echo site_url('sales_order_detail/home/sales_order_detail_add'); ?>" method="post"-->
<?php //echo site_url('application/views/assets/sourcex.php?scid='.$scid); ?>	
<?php  
//print_r($detailx);
//print_r($detail);die;
?>


<form  id="form1" class="form-horizontal"  method="post">
<table border=0 width=90% ><tr><td width=50%>

<div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Reff No.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=text value="<?php echo $detailx[0]->sreff; ?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">DO No.</label>

                <div class="col-lg-4">	
					<?php
					$nodo=$id.'-'.$detailx[0]->snoro.'-R'.date('dmyhis');
					?>
					<input type=text value="<?php echo $nodo;?>" class="form-control" disabled>
					<input type=hidden value="<?php echo $nodo;?>" name=snodo class="form-control" >
                    </div>
                </div>
				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Date</label>

					<div class="col-lg-4">
						<input  name="stgldo" type="text" id="example1" class="form-control"  >
					</div> 							
                </div>				
				
				

                

				
						
				
			</td><td width=40%>
				<div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Driver</label>

                    <div class="col-lg-4">                     
					   <input type=text name=driver class="form-control" >
                    </div>
                </div>				


				<div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Assistant Driver</label>

                    <div class="col-lg-4">                     
					   <input type=text name=adriver class="form-control" >
                    </div>
                </div>				
				
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Car No.</label>

                    <div class="col-lg-4">
                       <input type=hidden name=id value="<?php echo $id; ?>">
					   <input type=hidden name=scid value="<?php echo $scid; ?>">
					   <input type=text name=snopol class="form-control" >
                    </div>
                </div>

                <!--div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Number</label>

                      <div class="col-lg-4">
					<input type=text name=snomor  class="form-control" >
                    </div> 
                </div-->

	<input type=hidden name=snomor  class="form-control" >

				


				</td></tr></table>
				
				                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4"></label>
					<input class="btn text-muted text-center btn-danger" type=submit value=Create >
                    <div class="col-lg-4">                        
                    </div>
                </div>	
				
            </form>
        </div>
		
		
		<br>
		


  <div class="panel-body">
                            <div class="table-responsive">
							<?php 
							$freeppn=$detailx[0]->sfreeppn;
							?>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
          <th>Code</th>
          <th>Name</th>
          <th>Qty/Pcs</th>
          <th>Accept</th>
          <th>Sisa</th>
		  <th>Return Type </th>

		 
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
	
		$totalqty=0;  
		$total=0;
		$totalppn=0;
		$totalall=0;
		
		foreach($detail as $k => $v) :	
			if(!isset($_POST['input'])){$_POST['input']="";}			
			if(!isset($_POST['sprice'][$k])){$_POST['sprice'][$k]="";}
			if($_POST){
			//print_r($_POST);
			$sprice=$_POST['sprice'][$k];
			if($sprice==""){$sprice=$v -> sprice;}
			}else{
			$sprice=$v -> sprice;
			}
			
			$sqtyx=$v -> sqty;
			$spricex=$v -> sprice;
			$sdiscx=$v -> sdisc;
			$qtyx=$v -> sqty;			
			$subtotal=$sqtyx * ($spricex - ($spricex * $sdiscx/100));
			
	
    ?>
	

          <tr>
          
          <td><?php echo $v -> pcode; ?><input type=hidden name="id[]" value="<?php echo $id; ?>"></td>
		  <td><?php echo $v -> pname; ?><input type=hidden name="pname[]" value="<?php echo $v -> pname; ?>"></td>
          <td><?php echo $v -> sqty; ?></td>
          <td><?php echo $v -> saccept; ?><input type=hidden name="saccept[]" value="<?php echo $v -> saccept; ?>"></td>
		  <?php $sum_sprice= $v -> saccept * $sprice;?>
          <td><?php //echo $v -> sreject; ?><?php echo $v ->ssisa; ?></td>
		  <td><?=$v -> srtype;?></td>
	
		  </tr>
        <?php 
		
		$total=$sum_sprice+$total;
		$totalqty=$qtyx+$totalqty;
		$totalppn=$total * 10/100;
		if($freeppn==1){
		$totalall= $total;
		}else{
		$totalall= $total + $totalppn;
		}
		endforeach; ?>
	
        
                                    </tbody>
                                </table>
		
		
    </div>
</div>

  <div class="panel-body">
                            <div class="table-responsive">
							
                               
		
                            </div>
                        </div>
                    
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
