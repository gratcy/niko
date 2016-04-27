<script>
	var hs = window.location.hash;
	if (hs) {
	var ahs = hs.replace(/\#/g,'');
		if ($('div.'+ahs).hasClass('active') == false) {
	console.log(ahs);
			$('div.active').addClass('inactive');
			$('div.active').removeClass('active');
			$('h3.active').addClass('inactive');
			$('h3.active').removeClass('active');
			$('div.'+ahs).addClass('active');
			$('h3.'+ahs).addClass('active');
			$('ul.tabList > li').removeClass('on');
			$('div.'+ahs).addClass('on');
		}
	}
</script>

        <div class="box-body">
						  <div class="tabber">
						  <ul class="tabList">
						  <li class="on"><a href="#tcid_1" rel="tcid_1">Product</a></li>
						  <li class=""><a href="#tcid_2" rel="tcid_2">Sparepart</a></li>
						  </ul>
						  	</div>
		<div class="active tcid_1">
			<input type="hidden" name="did" value="<?php echo $did; ?>">
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
<!--
          <th></th>
-->
          <th>Packaging</th>
          <th>Code</th>
          <th>Name</th>
          <th>Volume</th>
          <th>QTY</th>
          <th style="width:35px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($items[0] as $k => $v) :
		  ?>
          <tr idnya="<?php echo $v -> did; ?>">
<!--
          <td><input type="checkbox" value="<?php echo $v -> did; ?>" name="pid[]"></td>
-->
          <td><?php echo $v -> cname; ?></td>
          <td><?php echo $v -> pcode; ?></td>
          <td><?php echo $v -> pname; ?></td>
          <td><?php echo $v -> pvolume; ?></td>
			<td><input type="number" value="<?php echo ($type == 1 ? '' : $v -> dqty); ?>" name="items[<?php echo $v -> did; ?>]" class="form-control" style="width:100px;"></td>
			<td style="text-align:center;"><a href="javascript:void(0);" class="dellist" idnya="<?php echo $v -> did; ?>" mid="<?php echo $v -> pid; ?>"><i class="icon-remove"></i></a></td>
			</tr>
        <?php endforeach; ?>
                                    </tbody>
                                    </table>
                                    </div>
		<div class="inactive tcid_2">
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
<!--
          <th></th>
-->
          <th>Code</th>
          <th>Name</th>
          <th>Component No.</th>
<!--
          <th>Return</th>
-->
          <th>QTY</th>
          <th style="width:35px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($items[1] as $k => $v) :
		  ?>
          <tr idnya2="<?php echo $v -> did; ?>">
<!--
          <td><input type="checkbox" value="<?php echo $v -> did; ?>" name="sid[]"></td>
-->
          <td><?php echo $v -> scode; ?></td>
          <td><?php echo $v -> sname; ?></td>
          <td><?php echo $v -> snocomponent; ?></td>
<!--
          <td><?php echo __get_customers_spec($v -> sspecial,1, 'special'); ?></td>
-->
			<td><input type="number" value="<?php echo ($type == 1 ? '' : $v -> dqty); ?>" name="items2[<?php echo $v -> did; ?>]" class="form-control" style="width:100px;"></td>
			<td style="text-align:center;"><a href="javascript:void(0);" class="dellist" idnya2="<?php echo $v -> did; ?>" mid2="<?php echo $v -> sid; ?>"><i class="icon-remove"></i></a></td>
			</tr>
        <?php endforeach; ?>
                                    </tbody>
                                    </table>
                                    </div>
                                    </div>

<script>
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

$('a.dellist').click(function(){
	var idnya = $(this).attr('idnya');
	var idnya2 = $(this).attr('idnya2');
	var mid = $(this).attr('mid');
	var mid2 = $(this).attr('mid2');
	$('tr[idnya='+idnya+']').remove();
	$('tr[idnya2='+idnya2+']').remove();
	<?php if ($type == 2) : ?>
	var data = {'pid' : mid, 'sid' : mid2, 'did' : <?php echo $did; ?>};
	<?php else : ?>
	var data = {'pid' : idnya, 'sid' : idnya2};
	<?php endif; ?>
	$.post('<?php echo site_url('request/request_items_delete/' . $type); ?>', data,
	function(datas) {
		
	});
});
</script>
