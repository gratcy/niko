<h3>List Products</h3>
<table class="table table-bordered">
<thead>
<tr>
<th>Code</th>
<th>Name</th>
<th>Group Product</th>
<th>QTY Service</th>
<?php if ($report != 1) : ?>
<th></th>
<?php endif; ?>
<?php if ($report == 1) : ?>
<th>QTY Finished</th>
<?php endif; ?>
</tr>
</thead>
<tbody>
<?php foreach($product as $k => $v) : ?>
<tr id="product_id_<?php echo $v -> pid; ?>">
<input type="hidden" name="pid[]" value="<?php echo $v -> pid;?>">
<td><?php echo $v -> pcode; ?></td>
<td><?php echo $v -> pname; ?></td>
<td><?php echo $v -> cname; ?></td>
<td><input type="text" style="width:60px!important;" class="form-control" name="tqty[<?php echo $v -> pid; ?>]" value="<?php echo ($type == 1 ? '0' : (int) $v -> sqty); ?>"></td>
<?php if ($report != 1) : ?>
<td style="text-align:center;"><a href="javascript:void(0);" id="Delproduct" pid="<?php echo $v -> pid; ?>"><i class="icon-remove"></i></a></td>
<?php endif; ?>
<?php if ($report == 1) : ?>
<?php
if ($sid) {
$qty = $this -> services_report_model -> __get_qty($sid,$v -> pid, 1);
}
?>
<td><input type="text" name="fpqty[<?php echo $v -> pid; ?>]" value="<?php echo isset($qty[0] -> sqty) ? $qty[0] -> sqty : 0; ?>" style="width:60px!important;" class="form-control"></td>
<?php endif; ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<script type="text/javascript">
$('a#Delproduct').click(function() {
	<?php if ($type == 1) : ?>
	var data = {'pid' : $(this).attr('pid')};
	<?php else : ?>
	var data = {'sid' : <?php echo $id; ?>,'pid' : $(this).attr('pid')};
	<?php endif; ?>
	$.post('<?php echo site_url('services_wo/product_delete/' . $type); ?>', data).done(function(datas){
			$('div#ProductTMP').load('<?php echo site_url('services_wo/product_tmp/' . $type . '?id=' . $id);?>');
	});
});
</script>
