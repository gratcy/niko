<html>
<title>Stock Card | <?php echo __get_inventory_type($type); ?></title>
<body>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
<div class="box box-primary">

                                <!-- form start -->
                                    <div class="box-body">
									<h2>PT. Niko Elektronik Indonesia</h2>
									<table border="0">
									<tr><td><b>Stock Card ( <?php echo __get_inventory_type($type); ?> )</b></td><td></td></tr>
									<tr><td>Date</td><td>: <?php echo date('d  M  Y');?></td></tr>
									<tr><td>Code</td><td>: <?php echo $book[0]->code; ?></td></tr>
									<tr><td>Item</td><td>: <?php echo $book[0]->name; ?></td></tr>
									<tr><td>Stock Begining</td><td>: <?php echo $book[0] -> istockbegining; ?></td></tr>
									</table>
									<br />
                                        <div class="form-group">
						<table width="100%" border="0" style="border-collapse: collapse;">
						<thead>
						<tr style="border:1px solid #000;padding:3px;">
						<th style="border:1px solid #000;padding:3px;">Date</th>
						<th style="border:1px solid #000;padding:3px;">Transaction No.</th>
						<th style="border:1px solid #000;padding:3px;">Customer</th>
						<th style="border:1px solid #000;padding:3px;">Stock In</th>
						<th style="border:1px solid #000;padding:3px;">Stock Out</th>
						<th style="border:1px solid #000;padding:3px;">Proccess</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$tgl = '';
						$totalkeluar = 0;
						$proccess = 0;
						$tproccess = 0;
						$tmasuk = 0;
						$tkeluar = 0;
						$sbegining = (int) $book[0] -> istockbegining;
						$i = 1;
						foreach($detail as $k ) :
						
							if ($i == 1) $sisa = $sbegining;
							if ($k -> approved == 1) {
								$masuk = ($k -> ttypetrans == 1 ? $k -> tqty : 0);
								$keluar = ($k -> ttypetrans == 2 ? $k -> tqty : 0);

								$proccess = 0;
							}
							else {
								$masuk = 0;
								$keluar = 0;
								$proccess = $k -> tqty;
								$tproccess += $k -> tqty;
							}
						?>
						<tr style="border:1px solid #000;">
						<td style="border:1px solid #000;padding:3px;"><?php
						$date = __get_date(strtotime($k -> ttanggal),1);
						if($tgl <> $date){
							$tgl = $date;
							echo $tgl;
						}
						?>
						</td>
						<td style="border:1px solid #000;padding:3px;"><?php echo $k->tno; ?></td>
						<td style="border:1px solid #000;padding:3px;"><?php echo $k->cname; ?></td>
						<td style="border:1px solid #000;text-align:center;padding:3px;"><?php echo ($masuk ? $masuk : '-');?></td>
						<td style="border:1px solid #000;text-align:center;padding:3px;"><?php echo ($keluar ? $keluar : '-');?></td>
						<td style="border:1px solid #000;text-align:center;padding:3px;"><?php echo ($proccess ? $proccess : '-');?></td>
						</tr>
						<?php
						$tmasuk += $masuk;
						$tkeluar += $keluar;
						++$i;
						endforeach;
						?>
						</tbody>
						<tfoot>
						<tr style="border:1px solid #000;">
							<th colspan="3" style="border:1px solid #000;padding:3px;">Total</th>
							<th style="border:1px solid #000;padding:3px;"><?php echo $tmasuk; ?></th>
							<th style="border:1px solid #000;padding:3px;"><?php echo $tkeluar; ?></th>
							<th style="border:1px solid #000;padding:3px;"><?php echo $tproccess; ?></th>
						</tr>
						</tfoot>
						</table>
                                        </div>
                            </div>
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
</body>
</html>
