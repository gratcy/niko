<!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Accounting Closing Period</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Closing Period</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('closingperiod'); ?>" method="post">
	<input type="hidden" name="periodid" value="<?php echo $pactive[0] -> aid; ?>">
                <div class="form-group">
							<label for="status" class="control-label col-lg-2"></label>
                    <div class="col-lg-8" style="text-align: center;">
	<h1>Closing Period | <?php echo $pactive[0] -> aname; ?></h1>	
	</div>
	</div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-2"></label>
                    <div class="col-lg-8" style="text-align: center;">
				<button class="btn text-muted text-center btn-danger" type="submit">Closing Period</button>
				<button class="btn text-muted text-center btn-primary" type="button" onclick="location.href='javascript:history.go(-1);'">Back</button>
					</div>
				</div>
				<?php if (isset($history)) : ?>
				<p>&nbsp;</p>
                            <div class="table-responsive">
	<h3>AHistory Closing Period</h3>	
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Name</th>
<th>Start</th>
<th>End</th>
</tr>
</thead>
<tbody>
	<?php foreach($history as $k => $v) : ?>
<tr>
	<td><?php echo $v['aname']; ?></td>
	<td><?php echo __get_date($v['astart'],2); ?></td>
	<td><?php echo __get_date($v['aend'],2); ?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
          </div>
				<p>&nbsp;</p>
				<?php endif; ?>
				<p><b><i>Note: Jika anda menekan tombol "Closing Period", itu berarti anda sudah melakukan tutup buku (Akunting). dan transaksi dapat dilakukan keesokan harinya.</i></b></p>
            </form>
        </div>
    </div>
</div>
    </div>
                    </div>
                  </div>
        </div>
        </div>
<!-- END PAGE CONTENT -->
