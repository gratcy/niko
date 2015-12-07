<h3>List Technical</h3>
<table class="table table-bordered">
<thead>
<tr>
<th>Branch</th>
<th>Code</th>
<th>Name</th>
<?php if ($report != 1) : ?>
<th></th>
<?php endif; ?>
</tr>
</thead>
<tbody>
<?php foreach($technical as $k => $v) : ?>
<tr id="Technical_id_<?php echo $v -> tid?>">
<input type="hidden" name="tid[]" value="<?php echo $v -> tid;?>">
<td><?php echo $v -> bname; ?></td>
<td><?php echo $v -> tcode; ?></td>
<td><?php echo $v -> tname; ?></td>
<?php if ($report != 1) : ?>
<td style="text-align:center;"><a href="javascript:void(0);" id="DelTechnical" tid="<?php echo $v -> tid; ?>"><i class="icon-remove"></i></a></td>
<?php endif; ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<script type="text/javascript">
$('a#DelTechnical').click(function() {
	<?php if ($type == 1) : ?>
	var data = {'tid' : $(this).attr('tid')};
	<?php else : ?>
	var data = {'sid' : <?php echo $id; ?>,'tid' : $(this).attr('tid')};
	<?php endif; ?>
	$.post('<?php echo site_url('services_wo/technical_delete/' . $type); ?>', data).done(function(datas){
		$('div#TechnicalTMP').load('<?php echo site_url('services_wo/technical_tmp/' . $type . '?id=' . $id);?>');
	});
});
</script>
