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
                        <h2> Technical </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('TechnicalAdd')) : ?>
                <a href="<?php echo site_url('technical/technical_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Technical</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Technical
                <div class="searchTable">
                <form action="<?php echo current_url();?>" method="post">
					<div class="sLeft"><input type="text" placeholder="<?php echo ($keyword == '' ? 'Name/Code' : $keyword)?>" name="keyword" class="form-control" autocomplete="off" style="width:180px;"/></div>
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
          <th>Email</th>
          <th>Phone I</th>
          <th>Phone II</th>
          <th>Join Date</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($technical as $k => $v) :
		  $phone = explode('*', $v -> tphone);
		  ?>
                                        <tr>
          <td><?php echo $v -> bname; ?></td>
          <td><?php echo $v -> tcode; ?></td>
          <td><?php echo $v -> tname; ?></td>
          <td><?php echo $v -> temail; ?></td>
          <td><?php echo $phone[0]; ?></td>
          <td><?php echo $phone[1]; ?></td>
          <td><?php echo __get_date($v -> tjoindate,1); ?></td>
          <td><?php echo __get_status($v -> tstatus,1); ?></td>
		  <td>
				<?php if (__get_roles('TechnicalUpdate')) : ?>
              <a href="<?php echo site_url('technical/technical_update/' . $v -> tid); ?>"><i class="icon-pencil"></i></a>
                <?php endif; ?>
				<?php if (__get_roles('TechnicalDelete')) : ?>
              <a href="<?php echo site_url('technical/technical_delete/' . $v -> tid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
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
