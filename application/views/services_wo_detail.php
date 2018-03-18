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
        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Service Work Order Detail </h2>
                    </div>
                </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Service Work Order Detail
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
		<thead>
		<tr><td>WO No.</td><td><?php echo $detail[0] -> sno; ?></td></tr>
		<!-- <tr><td>Branch</td><td><?php echo $detail[0] -> bname; ?></td></tr> -->
    <tr><td>Date</td><td><?php echo __get_date($detail[0] -> sdate,1); ?></td></tr>
		<tr><td>Duration</td><td><?php echo __get_date($detail[0] -> sdatefrom,1) . ' s/d ' .__get_date($detail[0] -> sdatefrom,1); ?></td></tr>
		<tr><td>Description</td><td><?php echo ($detail[0] -> sdesc ? $detail[0] -> sdesc : '-');?></td></tr>
		<tr><td>Status</td><td>Approve</td></tr>
		</thead>
		</tbody>
                                </table>
                            </div>
  <br />
                            <div class="table-responsive">

  <h3>Product</h3>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
  <tr><th>Code</th><th>Name</th><th>Group</th><th>QTY</th></tr>
                                    </thead>
                                    <tbody>
  <?php foreach($product as $k => $v) : ?>
  <tr><td style="width: 30%"><?php echo $v -> pcode; ?></td><td style="width: 40%"><?php echo $v -> pname; ?></td><td><?php echo $v -> cname; ?></td><td style="text-align:right;"><?php echo $v -> sqty; ?></td></tr>
  <?php endforeach; ?>
                                    </tbody>
  </table>
  <br />
  <h3>Sparepart</h3>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
  <tr><th>Code</th><th>Name</th><th>QTY</th></tr>
                                    </thead>
                                    <tbody>
  <?php foreach($sparepart as $k => $v) : ?>
  <tr><td style="width: 30%"><?php echo $v -> scode; ?></td><td style="width: 40%"><?php echo $v -> sname; ?></td><td><?php echo $v -> sqty; ?></td></tr>
  <?php endforeach; ?>
                                    </tbody>
  </table>
  <br />
  <h3>Technician</h3>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
  <tr><th>Code</th><th>Name</th></tr>
                                    </thead>
                                    <tbody>
  <?php foreach($technical as $k => $v) : ?>
  <tr><td style="width: 30%"><?php echo $v -> tcode; ?></td><td><?php echo $v -> tname; ?></td></tr>
  <?php endforeach; ?>
                                    </tbody>
  </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
       <!--END PAGE CONTENT -->

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
</script>
