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
                        <h2>Return Order </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('SalesOrderAdd')) : ?>
                <a href="<?php echo site_url('retur_order/home/retur_order_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Return Order</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Return Order
                <div class="searchTable">
                <form action="<?php echo current_url();?>" method="post">
					<div class="sLeft"><input type="text" placeholder="<?php echo ($keyword == '' ? 'Search !!!' : $keyword)?>" name="keyword" class="form-control" autocomplete="off" style="width:180px;"/></div>
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
          
          <th>Return No.</th>
    
          <th>Date</th>
		  <th>Customer </th>
		  <th>Sales </th>
          <th>Return Type</th>
          
          <th>Status</th>
		  <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($retur_order as $k => $v) :

		  ?>
                                        <tr>
<!--
          <td><?php echo $v -> bname; ?></td>
-->
          <td><?php echo $v -> snoro; ?></td>
      
          <td><?php echo __get_date(strtotime($v -> stgl,2)); ?></td>
          <td><?php echo $v -> cname; ?></td>
		  <td><?php echo $v -> sname; ?></td>
<?php 
		
		$ccats= $v ->ctyperetur; 
		if($ccats==0){
			$cname="Tukar Barang";
		}elseif($ccats==1){
			$cname="Potong Piutang";
		}

		?>		  
		  
		  
          <td><?php echo $cname; ?></td>
          <td><?php 
		  $sstatus=$v -> sstatus;
		  if($sstatus==0){
		  $st="Pending";
		  }elseif($sstatus==1){
		  $st="Active";
		  }if($sstatus==2){
		  $st="Delete";
		  }if($sstatus==3){
		  $st="Approved";
		  }if($sstatus==4){
		  $st="Done";
		  }
		  echo $st; ?></td>
		
		
		  <td>
				<?php if (__get_roles('SalesOrderUpdate')) : ?>
				<?php if($sstatus<3){?>
              <a href="<?php echo site_url('retur_order/home/retur_order_update/' . $v -> sid . '/' . $v -> scid); ?>"><i class="icon-pencil"></i></a>
			  <?php }?>
                <?php endif; ?>
				<?php if (__get_roles('SalesOrderUpdate')) : ?>
			  <!--a href="<?php echo site_url('retur_order_detail/home/retur_order_details/' . $v -> sid . '/' . $v -> scid); ?>"><i class="icon-book"></i></a-->
                <?php endif; ?>
				<?php if (__get_roles('SalesOrderDelete')) : ?>
				<?php if($sstatus<3){?>
              <a href="<?php echo site_url('retur_order/home/retur_order_delete/' . $v -> sid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
			  <?php } ?>
                <?php endif; ?>
			<?php if($sstatus==3){	?>
				<a href="<?php echo site_url('retur_order_detail/home/retur_order_details_approve/'.$v->sid.'/'.$v->scid); ?>"><i class="icon-book"></i> </a>
			<?php }?>

			<?php if($sstatus==4){	?>
				<a href="<?php echo site_url('retur_order_detail/home/retur_order_details_done/'.$v->sid.'/'.$v->scid); ?>"><i class="icon-book"></i> </a>
			<?php }?>
			
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
