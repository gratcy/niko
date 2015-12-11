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
                        <h2> Customers </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('CustomersAdd')) : ?>
                <a href="<?php echo site_url('customers/customers_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Customer</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Customers
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
          <th>Category</th>
          <th>Name</th>
          <th>PIC</th>
          <th>Sales</th>
          <th>TOP Cash</th>
          <th>TOP Credit</th>
          <th>TOP Credit Limit</th>
          <th>Credit Current</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($customers as $k => $v) :
		  $addr = explode('*', $v -> caddr);
		  ?>
                                        <tr>
          <td><?php echo __get_customer_category($v -> ccat,1); ?></td>
          <td><?php echo $v -> cname; ?></td>
          <td><?php echo $v -> ccontactname; ?></td>
          <td><?php echo $v -> sname; ?></td>
          <td><?php echo __get_rupiah($v -> ccash,2); ?></td>
          <td><?php echo __get_rupiah($v -> ccredit,2); ?></td>
          <td><?php echo __get_rupiah($v -> climit,2); ?></td>
          <td><?php echo __get_rupiah($v -> ctop,2); ?></td>
          <td><?php echo __get_status($v -> cstatus,1); ?></td>
		  <td>
				<?php if (__get_roles('CustomersUpdate')) : ?>
              <a href="<?php echo site_url('customers/customers_update/' . $v -> cid); ?>"><i class="icon-pencil"></i></a>
                <?php endif; ?>
				<?php if (__get_roles('CustomersDelete')) : ?>
              <a href="<?php echo site_url('customers/customers_delete/' . $v -> cid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
