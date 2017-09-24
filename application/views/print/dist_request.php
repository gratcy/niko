<html>
<head>
<title>Print Distribution Request</title>
<style>
html,body{margin:0;padding:0;}
</style>
</head>
<body style="font-size:18px;">
<div style="width:850px;padding:3px 3px 3px 5px;">
		<h3><?php echo $detail[0] -> dtitle;?></h3>
		<div style="clear:both;"></div>
		<div style="width:500px;">
		<table border="0" width="500" style="border-collapse: collapse;">
		<thead>
		<tr><td>Request No.</td><td><?php echo 'R0'.$detail[0] -> dtype.str_pad($id, 4, "0", STR_PAD_LEFT); ?></td></tr>
		<tr><td>Request Type</td><td><?php echo __get_request_type($detail[0] -> dtype,1);?></td></tr>
		<tr><td>Date</td><td><?php echo __get_date($detail[0] -> ddate,2);?></td></tr>
		<tr><td>From</td><td><?php echo $detail[0] -> fbname;?></td></tr>
		<tr><td>To</td><td><?php echo ($detail[0] -> dtype == 3 ? $detail[0] -> tcname : $detail[0] -> tbname);?></td></tr>
		<tr><td>Title</td><td><?php echo $detail[0] -> dtitle;?></td></tr>
		<tr><td>Description</td><td><?php echo $detail[0] -> ddesc;?></td></tr>
		</thead>
		</table>
		</div>
		<?php if ($items[0] && count($items[0]) > 0) : ?>
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
			<td style="border:1px solid #000;padding:3px;"><?php echo $v -> dqty; ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
		<?php endif; ?>
		<?php if ($items[1]) : ?>
		<h3>List Sparepart</h3>
		
		<table border="0" width="850" style="border-collapse: collapse;">
		<thead>
		<tr style="border:1px solid #000;padding:3px;"><th style="border:1px solid #000;padding:3px;">Code</th><th style="border:1px solid #000;padding:3px;">Name</th><th style="border:1px solid #000;padding:3px;">No. Component</th><th style="border:1px solid #000;padding:3px;">Return</th><th style="border:1px solid #000;padding:3px;">QTY</th></tr>
		</thead>
		<tbody>
		<?php foreach($items[1] as $k => $v) : ?>
			<tr style="border:1px solid #000;padding:3px;">
			<td style="border:1px solid #000;padding:3px;"><?php echo $v -> scode; ?></td>
			<td style="border:1px solid #000;padding:3px;"><?php echo $v -> sname; ?></td>
			<td style="border:1px solid #000;padding:3px;"><?php echo $v -> snocomponent; ?></td>
			<td style="border:1px solid #000;padding:3px;"><?php echo __get_customers_spec($v -> sspecial,1, 'special'); ?></td>
			<td style="border:1px solid #000;padding:3px;"><?php echo $v -> dqty; ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
		<?php endif; ?>
		</div>
                                    </body>
                                    </html>
