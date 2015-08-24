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
                        <h2>Payment </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('SalesOrderAdd')) : ?>
                <a href="<?php echo site_url('pembayaran/home/pembayaran_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Payment</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Payment
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
          
          <th>Payment No.</th>
    
          <th>Date</th>
       
            <th>Customer</th>
          <th>Sales </th>       
          <th>Status</th>
		  <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($pembayaran as $k => $v) :
			  // echo "<pre>";
	 //print_r($pembayaran);
	 // echo "</pre>";
		  ?>
                                        <tr>
          <td><?php echo $v -> pno_pm; ?>- <?php echo $v -> pcid; ?></td>
          <td><?php echo $v -> pm_tgl; ?></td>
      
                 <td>Customer</td>
          <td>Sales </td>

          <td><?php 
		  $sstatus=$v -> status;
		  if($sstatus==0){
		  $st="Pending";
		  }elseif($sstatus==1){
		  $st="Aktif";
		  }if($sstatus==2){
		  $st="Delete";
		  }if($sstatus==3){
		  $st="Approve";
		  }if($sstatus==4){
		  $st="Done";
		  }
		  echo $st; ?></td>
		
		
		  <td>
		  <a href="<?php echo site_url('pembayaran/home/pembayaran_update/' . $v -> pno_pm ); ?>"><i class="icon-pencil"></i></a>
		  <a href="<?php echo site_url('pembayaran_detail/home/pembayaran_detail_add/'.$v->pcid.'/' . $v -> pno_pm.'/'.$v->type_bayar ); ?>"><i class="icon-book"></i></a>
		  
		  
		  
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
