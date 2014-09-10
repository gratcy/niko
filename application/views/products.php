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
                        <h2> Products </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('ProductsAdd')) : ?>
                <a href="<?php echo site_url('products/products_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Product</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Products
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
          <th>Code</th>
          <th>Packaging</th>
          <th>Category</th>
          <th>Name</th>
          <th>Description</th>
          <th style="text-align:center;">Basic Price</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($products as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> pcode; ?></td>
          <td><?php echo $v -> ppname; ?></td>
          <td><?php echo $v -> cname; ?></td>
          <td><?php echo $v -> pname; ?></td>
          <td><?php echo substr($v -> pdesc,0,150); ?></td>
          <td style="text-align:right;"><?php echo __get_rupiah($v -> phpp,4); ?></td>
          <td><?php echo __get_status($v -> pstatus,1); ?></td>
		  <td>
				<?php if (__get_roles('ProductsUpdate')) : ?>
              <a href="<?php echo site_url('products/products_update/' . $v -> pid); ?>"><i class="icon-pencil"></i></a>
                <?php endif; ?>
				<?php if (__get_roles('ProductsDelete')) : ?>
              <a href="<?php echo site_url('products/products_delete/' . $v -> pid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
       <!--END PAGE CONTENT -->
        </div>
        </div>
        </div>


<script type="text/javascript">
$(function(){
	$('div.searchTable > form > div.sLeft > input[name="keyword"]').sSuggestion('span#sg1','<?php echo current_url();?>/get_suggestion', 'keyword');
});
</script>