
    <link rel="stylesheet" href="<?php echo site_url('application/views/assets/plugins/bootstrap/css/bootstrap.css');?>" />
    <link rel="stylesheet" href="<?php echo site_url('application/views/assets/css/main.css');?>" />
    <link rel="stylesheet" href="<?php echo site_url('application/views/assets/css/theme.css');?>" />
    <link rel="stylesheet" href="<?php echo site_url('application/views/assets/css/MoneAdmin.css');?>" />
    <script src="<?php echo site_url('application/views/assets/plugins/jquery.min.js');?>"></script>
        <div class="box-body">
	<?php echo __get_error_msg(); ?>
						  <div class="tabber">
						  <ul class="tabList">
						  <li class="on"><a href="#tcid_1" rel="tcid_1">Product</a></li>
						  <li class=""><a href="#tcid_2" rel="tcid_2">Sparepart</a></li>
						  </ul>
						  	</div>
			<form action="<?php echo site_url('request/request_items_add/' . $type); ?>" method="post">
		<div class="active tcid_1">
			<input type="hidden" name="did" value="<?php echo $did; ?>">
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
          <th></th>
          <th>Pcs</th>
          <th>Code</th>
          <th>Name</th>
          <th>Volume</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($items[0] as $k => $v) :
		  ?>
          <tr>
          <td><input type="checkbox" value="<?php echo $v -> pid; ?>" name="pid[]"></td>
          <td><?php echo $v -> cname; ?></td>
          <td><?php echo $v -> pcode; ?></td>
          <td><?php echo $v -> pname; ?></td>
          <td><?php echo $v -> pvolume; ?></td>
			</tr>
        <?php endforeach; ?>
                                    </tbody>
                                    </table>
                                    </div>
		<div class="inactive tcid_2">
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
          <th></th>
          <th>Code</th>
          <th>Name</th>
          <th>No. Component</th>
          <th>Return</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($items[1] as $k => $v) :
		  ?>
          <tr>
          <td><input type="checkbox" value="<?php echo $v -> sid; ?>" name="sid[]"></td>
          <td><?php echo $v -> scode; ?></td>
          <td><?php echo $v -> sname; ?></td>
          <td><?php echo $v -> snocomponent; ?></td>
          <td><?php echo __get_customers_spec($v -> sspecial,1, 'special'); ?></td>
			</tr>
        <?php endforeach; ?>
                                    </tbody>
                                    </table>
                                    </div>
<button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save</button>
</form>
                                    </div>

<script>
$(document).ready(function(){
	$('ul.tabList > li > a').click(function(){
		if ($('div.'+$(this).attr('rel')).hasClass('active')) return false;
		$('div.active').addClass('inactive');
		$('div.active').removeClass('active');
		$('h3.active').addClass('inactive');
		$('h3.active').removeClass('active');
		$('div.'+$(this).attr('rel')).addClass('active');
		$('h3.'+$(this).attr('rel')).addClass('active');
		$('ul.tabList > li').removeClass('on');
		$(this).parent().addClass('on');
	});
});
</script>
