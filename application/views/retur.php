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
                        <h2>Retur Order </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('SalesOrderExecute')) : ?>
                <a href="<?php echo site_url('sales_order/home/sales_order_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Retur</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Retur Order
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
		  <th>No Retur</th>								
          <th>Produk</th>
          <th>Customer</th>
          <th>Type Retur</th>
          <th>Tanggal</th>
          <th>Status</th>
		  <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($sales_order as $k => $v) :
			  // echo "<pre>";
	// print_r($sales_order);
	 // echo "</pre>";
		  ?>
                                        <tr>
          <td><?php echo $v -> no_retur; ?></td>
          <td><?php echo $v -> pname; ?></td>
          <td><?php echo $v -> cname; ?></td>        
          <td><?php echo $v -> typeretur; ?></td>
          <td><?php echo $v -> tgl_retur; ?></td>
          <td><?php 
		  $sstatus=$v -> sstatus;
		  if($sstatus==0){
		  $st="Pending";
		  }elseif($sstatus==1){
		  $st="Aktif";
		  }if($sstatus==2){
		  $st="Delete";
		  }if($sstatus==3){
		  $st="Approve";
		  }
		  echo $st; ?></td>
		
		
		  <td>
				<?php if (__get_roles('SalesOrderExecute')) : ?>
              <a href="<?php //echo site_url('sales_order/home/sales_order_update/' . $v -> sid); ?>"><i class="icon-pencil"></i></a>
                <?php endif; ?>
				<?php if (__get_roles('SalesOrderExecute')) : ?>
			  <a href="<?php echo site_url('sales_order_detail/home/sales_order_details/' . $v -> sid . '/' . $v -> scid); ?>"><i class="icon-book"></i></a>
                <?php endif; ?>
				<?php if (__get_roles('SalesOrderExecute')) : ?>
              <a hnopo="<?php echo site_url('sales_order/home/sales_order_delete/' . $v -> sid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
