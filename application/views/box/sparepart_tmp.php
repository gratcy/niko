<h3>List Spareparts</h3>
<table class="table table-bordered">
<thead>
<tr>
<th>Group Product</th>
<th>Name</th>
<th>QTY Request</th>
<?php if ($report != 1) : ?>
<th></th>
<?php endif; ?>
<?php if ($report == 1) : ?>
<th>QTY Used</th>
<?php endif; ?>
</tr>
</thead>
<tbody>
<?php foreach($sparepart as $k => $v) : ?>
<tr id="sparepart_id_<?php echo $v -> sid?>">
<input type="hidden" name="sid[]" value="<?php echo $v -> sid;?>">
<td><?php echo $v -> cname; ?></td>
<td><?php echo $v -> sname; ?></td>
<td><input type="text" style="width:60px!important;" name="sqty[<?php echo $v -> sid;?>]" value="<?php echo ($type == 2 ? (int) $v -> sqty : 0); ?>" class="form-control"></td>
<?php if ($report != 1) : ?>
<td style="text-align:center;"><a href="javascript:void(0);" id="Delsparepart" sid="<?php echo $v -> sid; ?>"><i class="icon-remove"></i></a></td>
<?php endif; ?>
<?php if ($report == 1) : ?>
<?php
if ($sid) {
$qty = $this -> services_report_model -> __get_qty($sid,$v -> sid, 2);
}
?>
<td><input type="text" name="suqty[<?php echo $v -> sid; ?>]" value="<?php echo isset($qty[0] -> sqty) ? $qty[0] -> sqty : 0; ?>" style="width:60px!important;" class="form-control"></td>
<?php endif; ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<script type="text/javascript">
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
</script>
