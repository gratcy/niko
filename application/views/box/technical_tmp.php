<table class="table table-bordered">
<thead>
<tr>
<th>Branch</th>
<th>Code</th>
<th>Name</th>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($technical as $k => $v) : ?>
<tr id="Technical_id_<?php echo $v -> tid?>">
<input type="hidden" name="tid[]" value="<?php echo $v -> tid;?>">
<td><?php echo $v -> bname; ?></td>
<td><?php echo $v -> tcode; ?></td>
<td><?php echo $v -> tname; ?></td>
<td style="text-align:center;"><a href="javascript:void(0);" id="DelTechnical" tid="<?php echo $v -> tid; ?>"><i class="icon-remove"></i></a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<script type="text/javascript">
$(function(){
	$('a#DelTechnical').click(function() {
		<?php if ($type == 1) : ?>
		var data = {'tid' : $(this).attr('tid')};
		<?php else : ?>
		var data = {'sid' : <?php echo $id; ?>,'tid' : $(this).attr('tid')};
		<?php endif; ?>
		$.post('<?php echo site_url('services_wo/technical_delete/' . $type); ?>', data,
		function(datas) {
			if (datas != '-1') {
				$('tr#Technical_id_' + $(this).attr('tid')).remove();
				$('div#TechnicalTMP').load('<?php echo site_url('services_wo/technical_tmp/' . $type . '?id=' . $id);?>');
			}
		});
	});
});
</script>
