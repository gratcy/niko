<?php
if ($type == 1)
$add = 'Product';
elseif ($type == 2)
$add = 'Sparepart';
elseif ($type == 3)
$add = 'RejectProduct';
elseif ($type == 4)
$add = 'Return';
else
$add = 'RejectSparepart';

?><style type="text/css">
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
                        <h2> Inventory <?php echo __get_inventory_type($type); ?></h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('Inventory'.$add.'Add')) : ?>
                <a href="<?php echo site_url('inventory/inventory_add/' . $type); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Stock <?php echo __get_inventory_type($type); ?></a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Inventory <?php echo __get_inventory_type($type); ?>
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
          <th>Branch</th>
          <th>Code</th>
          <th>Name</th>
          <th>Stock Begining</th>
          <th>Stock In</th>
          <th>Stock Out</th>
          <th>Stock Final</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($inventory as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> bname; ?></td>
          <td><?php echo $v -> code; ?></td>
          <td><?php echo $v -> name; ?></td>
          <td style="text-align:right;"><?php echo $v -> istockbegining; ?></td>
          <td style="text-align:right;"><?php echo $v -> istockin; ?></td>
          <td style="text-align:right;"><?php echo $v -> istockout; ?></td>
          <td style="text-align:right;"><?php echo $v -> istock; ?></td>
          <td><?php echo __get_status($v -> istatus,1); ?></td>
		  <td>
				<?php if (__get_roles('Inventory'.$add.'Update')) : ?>
              <a href="<?php echo site_url('inventory/inventory_update/' . $type.'/' . $v -> iid); ?>"><i class="icon-pencil"></i></a>
                <?php endif; ?>
				<?php if (__get_roles('Inventory'.$add.'Delete')) : ?>
              <a href="<?php echo site_url('inventory/inventory_delete/' . $type.'/' . $v -> iid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
