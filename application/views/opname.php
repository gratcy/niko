<?php
if ($type == 1)
$add = 'Product';
elseif ($type == 2)
$add = 'Sparepart';
elseif ($type == 3)
$add = 'RejectProduct';
else
$add = 'Return';
?>
<style type="text/css">
div#txtHint{position: absolute;
width: 200px;
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
                        <h2> Opname <?php echo __get_inventory_type($type); ?></h2>
                    </div>
                </div>

                <hr />
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Opname <?php echo __get_inventory_type($type); ?>
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
		  <?php if (!$perm) : ?>
<!--
          <th>Branch</th>
-->
          <?php endif; ?>
          <?php if ($type != 2 && $type != 5) : ?>
          <th>Code</th>
          <?php endif; ?>
          <th>Name</th>
          <th>Stock Begining</th>
          <th>Stock In</th>
          <th>Stock Out</th>
          <th>Stock Final</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($opname as $k => $v) :
		  ?>
                                        <tr>
		  <?php if (!$perm) : ?>
<!--
          <td><?php echo $v -> bname; ?></td>
-->
          <?php endif; ?>
          <?php if ($type != 2 && $type != 5) : ?>
          <td><?php echo $v -> code; ?></td>
          <?php endif; ?>
          <td><?php echo $v -> name; ?></td>
          <td style="text-align:right;"><?php echo $v -> istockbegining; ?></td>
          <td style="text-align:right;"><?php echo $v -> istockin; ?></td>
          <td style="text-align:right;"><?php echo $v -> istockout; ?></td>
          <td style="text-align:right;"><?php echo $v -> istock; ?></td>
		  <td>
				<?php if (__get_roles('Opname'.$add.'Update')) : ?>
              <a href="<?php echo site_url('opname/opname_update/' . $type.'/' . $v -> iid); ?>"><i class="icon-pencil"></i></a>
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
	$('div.searchTable > form > div.sLeft > input[name="keyword"]').sSuggestion('span#sg1','<?php echo site_url('opname');?>/get_suggestion/<?php echo $type; ?>', 'keyword');
});
</script>
