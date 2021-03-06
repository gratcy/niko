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
                        <h2>Purchase Order </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('PurchaseOrderExecute')) : ?>
                <a href="<?php echo site_url('purchase_order/home/purchase_order_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Purchase Order</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Purchase Order
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
          <th>Branch</th>
          <th>Bukti No.</th>
          <th>Reff</th>
          <th>Date</th>                   
         <th>Status </th>
		  <th style="width: 80px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($purchase_order as $k => $v) :
	
		  ?>
                                        <tr>
          <td><?php echo $v -> bname; ?></td>
          <td><?php echo $v -> pnobukti; ?></td>
          <td><?php echo $v -> pref; ?></td>
          <td><?php echo __get_date(strtotime($v -> ptgl,2)); ?></td>
          
          <td><?php 
		  if($v -> pstatus==0){
		  $status= "Cancel";
		  }elseif($v -> pstatus==1){
		  $status= "Active";
		  }elseif($v -> pstatus==2){
		  $status= "Delete";
		  }elseif($v -> pstatus==3){
		  $status= "Approve";
		  }elseif($v -> pstatus==4){
		  $status= "Done";
		  }
		  echo $status; ?></td>
         
		
		
		  <td>
		  <?php if($v -> pstatus !=2){?>
				<?php if (__get_roles('PurchaseOrderExecute')) : ?>
				<?php if($v -> pstatus <3){?>
              <a href="<?php echo site_url('purchase_order/home/purchase_order_update/' . $v -> pid); ?>"><i class="icon-pencil"></i></a>
                <?php } endif; ?>
				
			<a href="<?php echo site_url('purchase_order_detail/home/purchase_order_details/' . $v -> pid); ?>"><i class="icon-book"></i></a>	
				
				
				<?php if (__get_roles('PurchaseOrderExecute')) : ?>
              <a href="<?php echo site_url('purchase_order/home/purchase_order_delete/' . $v -> pid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
			  
                <?php endif; }?>
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
