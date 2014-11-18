<table class="table table-bordered">
<thead>
<tr>
<th>Product</th>
<th>Code</th>
<th>Name</th>
<th>No Component</th>
<th style="width:100px;">QTY</th>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($sparepart as $k => $v) : ?>
<tr id="sparepart_id_<?php echo $v -> sid?>">
<input type="hidden" name="sid[]" value="<?php echo $v -> sid;?>">
<td><?php echo $v -> pname; ?></td>
<td><?php echo $v -> scode; ?></td>
<td><?php echo $v -> sname; ?></td>
<td><?php echo $v -> snocomponent; ?></td>
<td><input type="text" name="qty[<?php echo $v -> sid;?>]" value="<?php echo ($type == 2 ? $v -> sqty : 0); ?>" class="form-control"></td>
<td style="text-align:center;"><a href="javascript:void(0);" id="Delsparepart" sid="<?php echo $v -> sid; ?>"><i class="icon-remove"></i></a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<script type="text/javascript">
$(function(){
	$('a#Delsparepart').click(function() {
		<?php if ($type == 1) : ?>
		var data = {'ssid' : $(this).attr('sid')};
		<?php else : ?>
		var data = {'sid' : <?php echo $id; ?>,'ssid' : $(this).attr('sid')};
		<?php endif; ?>
		$.post('<?php echo site_url('services_sparepart/sparepart_delete/' . $type); ?>', data,
		function(datas) {
			if (datas != '-1') {
				$('tr#sparepart_id_' + $(this).attr('sid')).remove();
				$('div#sparepartTMP').load('<?php echo site_url('services_sparepart/sparepart_tmp/' . $type . '?id=' . $id);?>');
			}
		});
	});
});
</script>
