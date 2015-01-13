<html>
<head>
<title>Print Service Report</title>
</head>
<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>
<body>
<div style="padding:10px;width: 800px;">
	<h1 style="margin: 0;">PT. Niko Electronik Indonesia</h1>
	<h3 style="margin: 0;">Services Report</h3>
	<div style="border-bottom:1px solid #000;margin-bottom: 10px;"></div>
	<table border="0">
	<tr><td width="160">No. Work Order</td><td>: <?php echo $detail[0] -> sno; ?></td></tr>
	<tr><td>QTY</td><td>: <?php echo $detail[0] -> sqty; ?></td></tr>
	<tr><td>Product Finished (QTY)</td><td>: <?php echo $detail[0] -> sqtypf; ?></td></tr>
	<tr><td>Product Unfinished (QTY)</td><td>: <?php echo $detail[0] -> sqtypu; ?></td></tr>
	<tr><td>Description</td><td>:  <?php echo $detail[0] -> sdesc; ?></td></tr>
	</table>
	<br />
	<table border="0" class="gridtable" width="780">
                                    <thead>
	<tr><th>No.</th><th>Serial No.</th><th>Total Sparepart</th><th>Sparepart</th><th>QTY</th></tr>
                                    </thead>
                                    <tbody>
	<?php
	$x=1;
	foreach($rlist as $k => $v) :
					$d  = $this -> services_report_model -> __get_detail_sparepart($detail[0] -> sid, $v -> sid);
	?>
	<tr><td><?php echo $x; ?>.</td><td><?php echo $v -> sno; ?></td><td><?php echo $v -> stsparepart; ?></td>
	<td>
	<?php
	for($i=0;$i<$v -> stsparepart;++$i) :
	$r = $this -> sparepart_model -> __get_sparepart_detail($d[$i] -> sspareid);
	?>
	<?php echo $r[0] -> sname . '<br />'; ?>
	<?php endfor; ?>
	</td>
	<td>
	<?php for($i=0;$i<$v -> stsparepart;++$i) :?>
	<?php echo $d[$i] -> sqty . '<br />'; ?>
	<?php endfor; ?>
	</td>
	</tr>
	<?php
	++$x;
	endforeach;
	?>
                                    </tbody>
	</table>
	
	<br />
	<br />
	
	<table border="0" style="width:800px;">
	<tr><td>Head Technical</td><td style="text-align:right;padding-right:15px;">Admin Staff</td></tr>
	<tr><td style="height:200px;">.........................</td><td style="text-align:right;">&nbsp;.........................</td></tr>
	</table>
</div>
</body>
</html>
