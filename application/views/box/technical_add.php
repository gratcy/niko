<html>
<head>
<title>Technical Add</title>
    <link rel="stylesheet" href="<?php echo site_url('application/views/assets/plugins/bootstrap/css/bootstrap.css');?>" />
    <link rel="stylesheet" href="<?php echo site_url('application/views/assets/css/main.css');?>" />
    <link rel="stylesheet" href="<?php echo site_url('application/views/assets/css/theme.css');?>" />
    <link rel="stylesheet" href="<?php echo site_url('application/views/assets/css/MoneAdmin.css');?>" />
    <link rel="stylesheet" href="<?php echo site_url('application/views/assets/css/suggestions.css');?>" />
    <link rel="stylesheet" href="<?php echo site_url('application/views/assets/plugins/Font-Awesome/css/font-awesome.css');?>" />
    <!--END GLOBAL STYLES --> 
    <script src="<?php echo site_url('application/views/assets/plugins/jquery.min.js');?>"></script>
    <script src="<?php echo site_url('application/views/assets/js/js.js');?>"></script>
</head>
<body>
<div style="padding:5px;width: 99%;">
<section class="content-header">
<h1>Add Technician</h1>
</section>
	<?php echo __get_error_msg(); ?>
                    <div class="row">
						<form action="<?php echo site_url('services_wo/technical_search/'); ?>" method="post">
						<input type="hidden" name="type" value="<?php echo $type; ?>">
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-1" style="float:left;">Name/Code</label>
                        <div class="col-xs-6">
                        <input type="text" style="width:200px!important;display:inline!important;" placeholder="Search !!!" name="keyword" class="form-control" autocomplete="off" />
                        <button class="btn text-muted text-center btn-danger" type="submit">Go!</button>
                        <span id="sg1"></span>
                        <input type="hidden" name="id" />
						</div>
						</div>
						</form>
						</div>
						<br />
<form action="<?php echo site_url('services_wo/technical_add/'.$type.'?id=' . $id); ?>" method="post">
<div class="box-body">
<table class="table table-bordered">
<thead>
<tr>
<th style="width:50px;"></th>
<th>Branch</th>
<th>Code</th>
<th>Name</th>
</tr>
</thead>
<tbody>
<?php foreach($technical as $k => $v) : ?>
<tr>
<td style="text-align:center;"><input type="checkbox" name="tid[]" value="<?php echo $v -> tid?>"></td>
<td><?php echo $v -> bname; ?></td>
<td><?php echo $v -> tcode; ?></td>
<td><?php echo $v -> tname; ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<div class="box-footer">
	<button type="submit" class="btn btn-primary" value="save"> <i class="fa fa-save"></i> Submit</button>
</div>
</form>
<div class="box-footer clearfix">
	<ul class="pagination pagination-sm no-margin pull-right">
		<?php echo $pages; ?>
	</ul>
</div>
</div>
</body>
</html>
<script type="text/javascript">
$(function(){
	$('input[name="keyword"]').sSuggestion('span#sg1','<?php echo site_url('technical/get_suggestion'); ?>', 'tid');
});
</script>
