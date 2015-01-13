<html>
<head>
<title>Print Service Work Order</title>
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
	<h3 style="margin: 0;">Services Work Order</h3>
	<div style="border-bottom:1px solid #000;margin-bottom: 10px;"></div>
	<table border="0">
	<tr><td width="120">No. Work Order</td><td>: <?php echo $detail[0] -> sno; ?></td></tr>
	<tr><td>Branch</td><td>:  <?php echo $detail[0] -> bname; ?></td></tr>
	<tr><td>Product</td><td>:  <?php echo $detail[0] -> pname; ?></td></tr>
	<tr><td>QTY</td><td>:  <?php echo $detail[0] -> sqty; ?></td></tr>
	<tr><td>Date</td><td>:  <?php echo __get_date($detail[0] -> sdatefrom,1) . ' s/d ' .__get_date($detail[0] -> sdatefrom,1); ?></td></tr>
	<tr><td>Description</td><td>:  <?php echo $detail[0] -> sdesc; ?></td></tr>
	</table>
	<br />
	<table border="0" class="gridtable" width="780">
                                    <thead>
	<tr><th>Code</th><th>Name</th></tr>
                                    </thead>
                                    <tbody>
	<?php foreach($technical as $k => $v) : ?>
	<tr><td><?php echo $v -> tcode; ?></td><td><?php echo $v -> tname; ?></td></tr>
	<?php endforeach; ?>
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
