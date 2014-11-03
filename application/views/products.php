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
		  <?php if (__get_roles('ProductViewAsBranch')) : ?>
          <th>Code</th>
          <th>Name</th>
          <th>Type</th>
          <th>Packaging</th>
          <th style="text-align:center;">Distributor Price</th>
          <th style="text-align:center;">Semi Price</th>
          <th style="text-align:center;">Key Price</th>
          <th style="text-align:center;">Store Price</th>
          <th style="text-align:center;">Consume Price</th>
          <th style="text-align:center;">MOQ</th>
          <th style="text-align:center;">Cash Discount</th>
          <?php else : ?>
          <th>Code</th>
          <th>Name</th>
          <th>Type</th>
          <th>Packaging</th>
          <th>Isi / Volume</th>
          <th>Basic Price</th>
          <th style="text-align:center;">Cash Discount</th>
          <th>Point</th>
          <th>Status</th>
          <?php endif; ?>
		  <?php if (__get_roles('ProductsUpdate') || __get_roles('ProductsDelete')) : ?>
          <th style="width: 50px;"></th>
          <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($products as $k => $v) :
		  ?>
          <tr>
		  <?php if (__get_roles('ProductViewAsBranch')) : ?>
          <td><?php echo $v -> pcode; ?></td>
          <td><?php echo $v -> pname; ?></td>
          <td><?php echo __get_product_type($v -> ptype,1); ?></td>
          <td><?php echo $v -> ppname; ?></td>
          <td style="text-align:right;"><?php echo __get_rupiah($v -> pdist,4); ?></td>
          <td style="text-align:right;"><?php echo __get_rupiah($v -> psemi,4); ?></td>
          <td style="text-align:right;"><?php echo __get_rupiah($v -> pkey,4); ?></td>
          <td style="text-align:right;"><?php echo __get_rupiah($v -> pstore,4); ?></td>
          <td style="text-align:right;"><?php echo __get_rupiah($v -> pconsume,4); ?></td>
          <td><?php echo $v -> mqty; ?></td>
          <td><?php echo $v -> pdisc; ?>%</td>
          <?php else : ?>
          <td><?php echo $v -> pcode; ?></td>
          <td><?php echo $v -> pname; ?></td>
          <td><?php echo __get_product_type($v -> ptype,1); ?></td>
          <td><?php echo $v -> ppname; ?></td>
          <td><?php echo $v -> pvolume; ?></td>
          <td><?php echo __get_rupiah($v -> phpp,4); ?></td>
          <td><?php echo $v -> pdisc; ?>%</td>
          <td><?php echo $v -> ppoint; ?></td>
          <td><?php echo __get_status($v -> pstatus,1); ?></td>
          <?php endif; ?>
		  <?php if (__get_roles('ProductsUpdate') || __get_roles('ProductsDelete')) : ?>
		  <td>
				<?php if (__get_roles('ProductsUpdate')) : ?>
              <a href="<?php echo site_url('products/products_update/' . $v -> pid); ?>"><i class="icon-pencil"></i></a>
                <?php endif; ?>
				<?php if (__get_roles('ProductsDelete')) : ?>
              <a href="<?php echo site_url('products/products_delete/' . $v -> pid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
                <?php endif; ?>
          </td>
          <?php endif; ?>
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
