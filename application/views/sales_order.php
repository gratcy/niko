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
        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Sales Order </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('SalesOrderExecute')) : ?>
                <a href="<?php echo site_url('sales_order/home/sales_order_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Sales Order</a>
                <br />
                <br />
                <?php endif; ?>
				
				
				
				
				
				<div class="row">
			<div class="col-lg-12">
				<form method="POST">
			   Customer					<input  name=cname type="text" id="search"   />

					<input  name=cid type="hidden" id="theCid"    />
			   <input type=submit value=cari >
			   </form>
			   </div>
            </div><br>

			<div class="row">
			<div class="col-lg-12">
				<form method="POST">
			   Reff No.<input type=text name="sreff"  >
			   <input type=submit value=cari >
			   </form>
			   </div>
            </div><br>

			<div class="row">
			<div class="col-lg-12">
				<form method=POST >
			   Status<select name=sisa >
			   <option value="x">ALL</option>
			   <option value="2">Active</option>			   
			   <option value="0">Approve</option>
			   <option value="1">Done</option>
			   <input type=submit value=cari >
			   </form>
			   </div>
            </div><br>			
				
				
				
				
				
				
				
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sales Order
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
<!--
          <th>Branch</th>
-->			
		  <th>Reff. No.</th>
          <th>SO No.</th>    
          <th>Date</th>
		  <th>Expiry Date</th>
          <th>Customer </th>
          <th>Sales</th>
          <th>Payment Type</th>
		  <th>PPN</th>
		  <th>Status</th>
		  <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($sales_order as $k => $v) :
		  ?>
                                        <tr>
<!--
          <td><?php echo $v -> bname; ?></td>
-->
          <td><?php echo $v -> sreff; ?></td>
		  <td><?php echo $v -> snoso; ?></td>      
          <td><?php echo date('d/m/Y',strtotime($v -> stgl)); ?></td>
		  <td><?php $stgl_invoice= $v -> stgl; 
		  echo date( "d/m/Y", strtotime( "$stgl_invoice + 30 day" ) ); ?></td>
          <td><?php echo $v -> cname; ?></td>
          <td><?php echo $v -> sname; ?></td>
		  <td><?php echo ucfirst($v -> stypepay); ?></td>
		  <td><?php if($v -> sfreeppn ==1){ echo 'Yes';}else{ echo 'No';} ; ?></td>
          <td><?php 
		  $sstatus=$v -> sstatus;
		  if(!isset($v -> dstatus)){$v -> dstatus="";}
		  if($sstatus==0){
		  $st="Pending";
		  }elseif($sstatus==1){
		  $st="Active";
		  }if($sstatus==2){
		  $st="Delete";
		  }if($sstatus==3){
		  $st="Approved";
		  }if($v -> dstatus==3){
		  $st="Done";
		  }
		  echo $st; ?></td>
		
		
		  <td>
				<?php if (__get_roles('SalesOrderExecute')) : ?>
				<?php if($sstatus<3){?>
              <a href="<?php echo site_url('sales_order/home/sales_order_update/' . $v -> sid . '/' . $v -> scid); ?>"><i class="icon-pencil"></i></a>
			  <?php }?>
                <?php endif; ?>
				<?php if (__get_roles('SalesOrderExecute')) : ?>
			  <a href="<?php echo site_url('sales_order_detail/home/sales_order_details/' . $v -> sid . '/' . $v -> scid); ?>"><i class="icon-book"></i></a>
                <?php endif; ?>
				<?php if (__get_roles('SalesOrderExecute')) : ?>
				<?php if($sstatus<3){?>
              <a href="<?php echo site_url('sales_order/home/sales_order_delete/' . $v -> sid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
			  <?php } ?>
			  
			  <?php if(($sstatus==3)and ($v -> dstatus<>3)){?>
              <a href="<?php echo site_url('sales_order/home/sales_order_cancel/' . $v -> sid.'/'.$v ->scid); ?>" onclick="return confirm('Are you sure you want to cancel this item?');"><i class="icon-remove"></i></a>
			  <?php } ?>
                <?php endif; ?>
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

<script type="text/javascript">
$(function(){
	$('div.searchTable > form > div.sLeft > input[name="keyword"]').sSuggestion('span#sg1','<?php echo current_url();?>/get_suggestion', 'keyword');
});
</script>
