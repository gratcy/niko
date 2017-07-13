<html>
<head>
<title>Print Distribution Receiving</title>
<style>
html,body{margin:0;padding:0;}
</style>
</head>
<body style="font-size:18px;">
<div style="width:850px;padding:3px 3px 3px 5px;">
		<h3><?php echo ($detail[0] -> rtype == 1 ? __get_receiving_name($detail[0] -> riid, $detail[0] -> rtype) : $detail[0] -> rvendor);?></h3>
		<div style="clear:both;"></div>
		<div style="width:500px;">
		<table border="0" width="500" style="border-collapse: collapse;">
		<thead>
		<tr><td>Doc No.</td><td><?php echo $detail[0] -> rdocno;?></td></tr>
		<tr><td>Type</td><td><?php echo __get_receiving_type($detail[0] -> rtype,1);?></td></tr>
		<tr><td>Request No. / Vendor / Customer</td><td><?php echo (__get_receiving_name($detail[0] -> riid, $detail[0] -> rtype) ? __get_receiving_name($detail[0] -> riid, $detail[0] -> rtype) : $detail[0] -> rvendor);?></td></tr>
		<tr><td>Date</td><td><?php echo __get_date($detail[0] -> rdate,2);?></td></tr>
		<tr><td>Description</td><td><?php echo $detail[0] -> rdesc;?></td></tr>
		<tr><td>Status</td><td>Approve</td></tr>
		</thead>
		</table>
		</div>
		<h3>List Product</h3>
		
		<table border="0" width="850" style="border-collapse: collapse;">
		<thead>
		<tr style="border:1px solid #000;padding:3px;"><th style="border:1px solid #000;padding:3px;">Packaging</th><th style="border:1px solid #000;padding:3px;">Code</th><th style="border:1px solid #000;padding:3px;">Name</th><th style="border:1px solid #000;padding:3px;">Volume</th><th style="border:1px solid #000;padding:3px;">QTY</th></tr>
		</thead>
		<tbody>
		<?php foreach($items[0] as $k => $v) : ?>
			<tr style="border:1px solid #000;padding:3px;">
			<td style="border:1px solid #000;padding:3px;"><?php echo $v -> cname; ?></td>
			<td style="border:1px solid #000;padding:3px;"><?php echo $v -> pcode; ?></td>
			<td style="border:1px solid #000;padding:3px;"><?php echo $v -> pname; ?></td>
			<td style="border:1px solid #000;padding:3px;"><?php echo $v -> pvolume; ?></td>
			<td style="border:1px solid #000;padding:3px;"><?php echo $v -> rqty; ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
		<?php if ($items[1]) : ?>
		<h3>List Sparepart</h3>
		
		<table border="0" width="850" style="border-collapse: collapse;">
		<thead>
		<tr style="border:1px solid #000;padding:3px;"><th style="border:1px solid #000;padding:3px;">Code</th><th style="border:1px solid #000;padding:3px;">Name</th><th style="border:1px solid #000;padding:3px;">No. Component</th><th style="border:1px solid #000;padding:3px;">QTY</th></tr>
		</thead>
		<tbody>
		<?php foreach($items[1] as $k => $v) : ?>
			<tr style="border:1px solid #000;padding:3px;">
			<td style="border:1px solid #000;padding:3px;"><?php echo $v -> scode; ?></td>
			<td style="border:1px solid #000;padding:3px;"><?php echo $v -> sname; ?></td>
			<td style="border:1px solid #000;padding:3px;"><?php echo $v -> snocomponent; ?></td>
			<td style="border:1px solid #000;padding:3px;"><?php echo $v -> rqty; ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
		<?php endif; ?>
		</div>
                                    </body>
                                    </html>
