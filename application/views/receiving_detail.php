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
                        <h2> Distribution Receiving Detail </h2>
                    </div>
                </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Distribution Receiving Detail
                        </div>
                        <div class="panel-body">
                    <h2>
                        <?php echo ($detail[0] -> rtype == 1 ? __get_receiving_name($detail[0] -> riid, $detail[0] -> rtype) : $detail[0] -> rvendor);?>
                    </h2>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
		<thead>
		<tr><td>Doc No.</td><td><?php echo $detail[0] -> rdocno;?></td></tr>
		<tr><td>Type</td><td><?php echo __get_receiving_type($detail[0] -> rtype,1);?></td></tr>
		<tr><td>Name</td><td><?php echo (__get_receiving_name($detail[0] -> riid, $detail[0] -> rtype) ? __get_receiving_name($detail[0] -> riid, $detail[0] -> rtype) : ($detail[0] -> rtype == 3 ? $detail[0] -> cname : $detail[0] -> rvendor));?></td></tr>
		<tr><td>Date</td><td><?php echo __get_date($detail[0] -> rdate,2);?></td></tr>
		<tr><td>Description</td><td><?php echo $detail[0] -> rdesc;?></td></tr>
		<tr><td>Status</td><td>Approve</td></tr>
		</thead>
		</tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
						  <div class="tabber">
						  <ul class="tabList">
						  <li class="on"><a href="#tcid_1" rel="tcid_1">Product</a></li>
						  <li class=""><a href="#tcid_2" rel="tcid_2">Sparepart</a></li>
						  </ul>
						  	</div>
		<div class="active tcid_1">
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
          <th>Packaging</th>
          <th>Code</th>
          <th>Name</th>
          <th>Volume</th>
          <th>QTY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($items[0] as $k => $v) :
		  ?>
          <tr>
          <td><?php echo $v -> cname; ?></td>
          <td><?php echo $v -> pcode; ?></td>
          <td><?php echo $v -> pname; ?></td>
          <td><?php echo $v -> pvolume; ?></td>
			<td><?php echo $v -> rqty; ?></td>
			</tr>
        <?php endforeach; ?>
                                    </tbody>
                                    </table>
                                    </div>
		<div class="inactive tcid_2">
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
          <th>Code</th>
          <th>Name</th>
          <th>Component No.</th>
          <th>QTY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($items[1] as $k => $v) :
		  ?>
          <tr>
          <td><?php echo $v -> scode; ?></td>
          <td><?php echo $v -> sname; ?></td>
          <td><?php echo $v -> snocomponent; ?></td>
			<td><?php echo $v -> rqty; ?></td>
			</tr>
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
