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
	<h3 style="margin: 0;">Services Work Order</h3>
	<div style="border-bottom:1px solid #000;margin-bottom: 10px;"></div>
	<table border="0">
	<tr><td width="120">No. Work Order</td><td>: <?php echo $detail[0] -> sno; ?></td></tr>
	<tr><td>Branch</td><td>:  <?php echo $detail[0] -> bname; ?></td></tr>
	<tr><td>Date</td><td>:  <?php echo __get_date($detail[0] -> sdate,1); ?></td></tr>
	<tr><td>Description</td><td>:  <?php echo $detail[0] -> sdesc; ?></td></tr>
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
	<tr><td><?php echo $v -> pcode; ?></td><td><?php echo $v -> pname; ?></td><td><?php echo $v -> cname; ?></td><td style="text-align:right;"><?php echo $v -> sqty; ?></td><td style="text-align:right;"><?php echo $qty[0] -> sqty; ?></td><td style="text-align:right;"><?php echo $qty[0] -> sqty*$v -> ppoint; ?></td></tr>
	<?php endforeach; ?>
                                    </tbody>
     <tfoot>
     <tr>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td>Total</td>
     <td style="text-align:right;"><?php echo $tpoint; ?></td>
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
	<tr><td>Head Technician</td><td style="text-align:center;">Technician</td><td style="text-align:right;padding-right:35px;">Admin</td></tr>
	<tr><td style="height:200px;">.........................</td><td style="height:200px;text-align:center;">.........................</td><td style="text-align:right;">&nbsp;.........................</td></tr>
	</table>
</div>
</body>
</html>
