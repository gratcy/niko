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
                        <h2> Supplier </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('SuplierAdd')) : ?>
                <a href="<?php echo site_url('suplier/suplier_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Suplier</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Supplier
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
          <th>Code</th>
          <th>Name</th>
          <th>Address</th>
          <th>City</th>
          <th>Province</th>
          <th>Phone I</th>
          <th>Phone II</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($suplier as $k => $v) :
		  $phone = explode('*', $v -> sphone);
		  $addr = explode('*', $v -> saddr);
		  ?>
                                        <tr>
          <td><?php echo $v -> scode; ?></td>
          <td><?php echo $v -> sname; ?></td>
          <td><?php echo $addr[0]; ?></td>
          <td><?php echo __get_cities($v -> scity,1); ?></td>
          <td><?php echo __get_province($v -> sprov,1); ?></td>
          <td><?php echo $phone[0]; ?></td>
          <td><?php echo $phone[1]; ?></td>
          <td><?php echo __get_status($v -> sstatus,1); ?></td>
		  <td>
				<?php if (__get_roles('SuplierUpdate')) : ?>
              <a href="<?php echo site_url('suplier/suplier_update/' . $v -> sid); ?>"><i class="icon-pencil"></i></a>
                <?php endif; ?>
				<?php if (__get_roles('SuplierDelete')) : ?>
              <a href="<?php echo site_url('suplier/suplier_delete/' . $v -> sid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
