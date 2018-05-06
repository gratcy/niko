<html>
<head>
<title>Print Service Report</title>
</head>
<style type="text/css">
body p, body h1, body h3, body b {
	font-family: Verdana, Geneva, sans-serif;
}

table.gridtable {
	font-family: Verdana, Geneva, sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	font-family: Verdana, Geneva, sans-serif;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	font-family: Verdana, Geneva, sans-serif;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>
<body>
<div style="padding:10px;width: 800px;">
	<div style="text-align:center;"><h1 style="margin: 0;font-size:28px">SERVICE WORK ORDER</h1></div>
	<div style="margin-bottom: 20px;"></div>
	<table border="0" style="width:600px">
	<tr><td width="120"><b>WO No.</b></td><td style="width: 100%"><b>:</b> <?php echo $detail[0] -> sno; ?></td></tr>
	<tr><td><b>Date</b></td><td><b>:</b>  <?php echo __get_date($detail[0] -> sdate,1); ?></td></tr>
	<tr><td><b>Duration</b></td><td><b>:</b>  <?php echo __get_date($detail[0] -> sdatefrom,1) . ' &raquo; ' . __get_date($detail[0] -> sdateto,1); ?></td></tr>
	<tr><td><b>Description</b></td><td><b>:</b>  <?php echo $detail[0] -> sdesc; ?></td></tr>
	<?php foreach($technical as $k => $v) : ?>
	<tr><td>Technician</td><td>: <?php echo $v -> tname; ?></td></tr>
	<?php endforeach; ?>
	</table>	<br />
	<h3>List Product</h3>
	<table border="0" class="gridtable" width="780">
                                    <thead>
	<tr><th>Code</th><th>Name</th><th>Group Product</th><th>QTY</th><th>QTY Finished</th><th>Point</th></tr>
                                    </thead>
                                    <tbody>
	<?php
	$tpoint = 0;
	foreach($product as $k => $v) :
$qty = $this -> services_report_model -> __get_qty($sid,$v -> pid, 1);
	$tpoint += $qty[0] -> sqty*$v -> ppoint;
	?>
	<tr><td><?php echo $v -> pcode; ?></td><td><?php echo $v -> pname; ?></td><td><?php echo $v -> cname; ?></td><td style="text-align:right;"><?php echo $v -> sqty; ?></td><td style="text-align:right;"><?php echo $qty[0] -> sqty; ?></td><td style="text-align:center;"><?php echo $qty[0] -> sqty*$v -> ppoint; ?></td></tr>
	<?php endforeach; ?>
                                    </tbody>
     <tfoot>
     <tr>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td style="text-align:center;"><b>TOTAL</b></td>
     <td style="text-align:center;"><?php echo $tpoint; ?></td>
     </tr>
     </tfoot>
	</table>
	<br />
	<h3>List Sparepart</h3>
	<table border="0" class="gridtable" width="780">
                                    <thead>
	<tr><th>Group Product</th><th>Code</th><th>Name</th><th>QTY</th><th>QTY Used</th></tr>
                                    </thead>
                                    <tbody>
	<?php foreach($sparepart as $k => $v) :
$qty = $this -> services_report_model -> __get_qty($sid,$v -> sid, 2);
	?>
	<tr><td><?php echo $v -> cname; ?></td><td><?php echo $v -> scode; ?></td><td><?php echo $v -> sname; ?></td><td style="text-align:right;"><?php echo $v -> sqty; ?></td><td style="text-align:right;"><?php echo $qty[0] -> sqty; ?></td></tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	
	<br />
	<br />
	
	<table border="0" style="width:800px;">
	<tr><td style="width:270px"><b>HEAD TECHNICIAN</b></td><td style="text-align:center;"><b>TECHNICIAN</b></td><td style="text-align:right;padding-right:35px;"><b>ADMIN</b></td></tr>
	</table>
</div>
</body>
</html>
