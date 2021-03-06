﻿    <style>
    #txtHint{width:94%!important;}
    </style>
 <link href="<?php echo site_url('application/views/assets/css/layout.css');?>" rel="stylesheet" />
 <link href="<?php echo site_url('application/views/assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css');?>" rel="stylesheet" />
     <script src="<?php echo site_url('application/views/assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js');?>"></script>
    <script src="<?php echo site_url('application/views/assets/plugins/bootstrap-wysihtml5-hack.js');?>"></script>
    <script src="<?php echo site_url('application/views/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js');?>"></script>
    <script src="<?php echo site_url('application/views/assets/js/editorInit.js'); ?>"></script>
    <script>
        $(function () { formWysiwyg(); });
        </script>
        <!--PAGE CONTENT -->
        <div id="content">
             
            <div class="inner" style="margin-top:0px!important;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1> Dashboard </h1>
                    </div>
                </div>
                  <hr />
                 <!--BLOCK SECTION -->
                 <div class="row">
                    <div class="col-lg-12">
                        <div style="text-align: center;">
                            <a class="quick-btn" href="<?php echo site_url('customers');?>">
                                <i class="icon-male icon-2x"></i>
                                <span>Customers</span>
                            </a>
                            <a class="quick-btn" href="<?php echo site_url('products');?>">
                                <i class="icon-check icon-2x"></i>
                                <span> Products</span>
                            </a>
<!--
                            <a class="quick-btn" href="<?php echo site_url('services_wo');?>">
                                <i class="icon-wrench icon-2x"></i>
                                <span>Services</span>
                            </a>
-->
<!--
                            <a class="quick-btn" href="<?php echo site_url('sparepart');?>">
                                <i class="icon-cogs icon-2x"></i>
                                <span>Spareparts</span>
                            </a>
-->
<!--
                            <a class="quick-btn" href="<?php echo site_url('journal');?>">
                                <i class="icon-th icon-2x"></i>
                                <span>Journal</span>
                            </a>
                            <a class="quick-btn" href="<?php echo site_url('trialbalance');?>">
                                <i class="icon-th-list icon-2x"></i>
                                <span>Trial Balance</span>
                            </a>
                            <a class="quick-btn" href="<?php echo site_url('generalledger');?>">
                                <i class="icon-list-alt icon-2x"></i>
                                <span>GL</span>
                            </a>
-->
                        </div>
                    </div>
                </div>
                <hr />
                
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
						<div class="btn-group pull-right" style="padding:7px 10px;">
                                <button type="button" data-toggle="dropdown"> <i class="icon-chevron-down"></i> </button>
                                <ul class="dropdown-menu slidedown">
                                    <li> <a href="<?php echo site_url('customers/customers_add');?>"> <i class="icon-pencil"></i> Add </a> </li>
                                    <li> <a href="<?php echo site_url('customers');?>"> <i class="icon-arrow-right"></i> Go to Customers </a> </li>
                                </ul>
                            </div>
                        <div class="panel-heading">
                            Customers
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Category</th>
          <th>Name</th>
          <th>PIC</th>
          <th>Sales</th>
          <th>TOP Cash</th>
		  <th>TOP Credit</th>
		  <th>TOP Credit Limit</th>
		  <th>Credit Current</th>
		  <th>Receivable</th>
		  <th>Special Attention</th>
		  <th>Status</th>
          
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  // echo '<pre>';
		  // print_r($customers);die;
		  foreach($customers as $k => $v) :
		  $phone = explode('*', $v -> cphone);
		  ?>
                                        <tr>
          <td><?php echo __get_customer_category($v -> ccat,1); ?></td>
          <td><?php echo $v -> cname; ?></td>
          <td><?php echo $v -> ccontactname; ?></td>
          <td><?php echo $v -> sname; ?></td>
          <td><?php echo __get_rupiah($v -> ccash,2); ?></td>
          <td><?php echo __get_rupiah($v -> ccredit,2); ?></td>
		  <td><?php echo __get_rupiah($v -> ctop,2); ?></td>
		  <td><?php echo __get_rupiah($v -> climit,2); ?></td>
		  <td><?php //echo __get_rupiah($v -> rcvb,2); ?></td>
		  <td><?php echo ($v -> cspecial == 0 ? 'NO' : 'YES'); ?></td>
		  <td>
				<?php if (__get_roles('CustomersExecute')) : ?>
              <a href="<?php echo site_url('customers/customers_update/' . $v -> cid); ?>"><i class="icon-pencil"></i></a>
                <?php endif; ?>
				<?php if (__get_roles('CustomersExecute')) : ?>
              <a href="<?php echo site_url('customers/customers_delete/' . $v -> cid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
                <?php endif; ?>
          </td>
										</tr>
        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-danger">
						<div class="btn-group pull-right" style="padding:7px 10px;">
                                <button type="button" data-toggle="dropdown"> <i class="icon-chevron-down"></i> </button>
                                <ul class="dropdown-menu slidedown">
                                    <li> <a href="<?php echo site_url('products/products_add');?>"> <i class="icon-pencil"></i> Add </a> </li>
                                    <li> <a href="<?php echo site_url('products');?>"> <i class="icon-arrow-right"></i> Go to Products </a> </li>
                                </ul>
                            </div>

                        <div class="panel-heading">
                            Products
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
								<div style="overflow:auto;">
                                <table class="table table-striped table-bordered table-hover" style="width: 1400px;">
                                    <thead>
                                        <tr>
          <th>Code</th>
          <th>Name</th>
          <th>Volume/Pcs</th>
          <th>Packaging</th>
          <th>Price Distributor</th>
          <th>Price Semi</th>
          <th>Price Agent</th>
          <th>Price Store</th>
          <th>Price Consumer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($products as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> pcode; ?></td>
          <td><?php echo $v -> pname; ?></td>
          <td><?php echo $v -> pvolume; ?></td>
          <td><?php echo $v -> ppname; ?></td>
          <td><?php echo __get_rupiah($v -> pdist,1); ?></td>
          <td><?php echo __get_rupiah($v -> psemi,1); ?></td>
          <td><?php echo __get_rupiah($v -> pkey,1); ?></td>
          <td><?php echo __get_rupiah($v -> pstore,1); ?></td>
          <td><?php echo __get_rupiah($v -> pconsume,1); ?></td>
										</tr>
        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--            
                <div class="col-lg-12">
                    <div class="panel panel-warning">
						<div class="btn-group pull-right" style="padding:7px 10px;">
                                <button type="button" data-toggle="dropdown"> <i class="icon-chevron-down"></i> </button>
                                <ul class="dropdown-menu slidedown">
                                    <li> <a href="<?php echo site_url('services_wo/services_wo_add');?>"> <i class="icon-pencil"></i> Add </a> </li>
                                    <li> <a href="<?php echo site_url('services_wo');?>"> <i class="icon-arrow-right"></i> Go to Services WO </a> </li>
                                </ul>
                            </div>
                        <div class="panel-heading">
                            Services
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>WO No.</th>
          <th>Date</th>
          <th>Duration</th>
          <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($services as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> sno; ?></td>
          <td><?php echo __get_date($v -> sdate); ?></td>
          <td><?php echo __get_date($v -> sdatefrom,1) . ' &raquo; ' . __get_date($v -> sdateto,1); ?></td>
          <td><?php echo __get_status($v -> sstatus,3); ?></td>
										</tr>
        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            -->
<!--
                <div class="col-lg-12">
                    <div class="panel panel-info">
						<div class="btn-group pull-right" style="padding:7px 10px;">
                                <button type="button" data-toggle="dropdown"> <i class="icon-chevron-down"></i> </button>
                                <ul class="dropdown-menu slidedown">
                                    <li> <a href="<?php echo site_url('sparepart/sparepart_add');?>"> <i class="icon-pencil"></i> Add </a> </li>
                                    <li> <a href="<?php echo site_url('sparepart');?>"> <i class="icon-arrow-right"></i> Go to Sparepart </a> </li>
                                </ul>
                            </div>
                        <div class="panel-heading">
                            Spareparts
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Group Product</th>
          <th>Name</th>
          <th>Price Agent</th>
          <th>Price Retail</th>
          <th>Return</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($sparepart as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> cname; ?></td>
          <td><?php echo $v -> sname; ?></td>
          <td><?php echo __get_rupiah($v -> spriceagent,4); ?></td>
          <td><?php echo __get_rupiah($v -> spriceretail,4); ?></td>
          <td><?php echo __get_customers_spec($v -> sspecial,1, 'special'); ?></td>
										</tr>
        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
-->
                    <div class="row">
<!--
                        <div class="col-lg-6">
                            <div class="box">
                                <header>
                                    <div class="icons"><i class="icon-envelope"></i></div>
                                    <h5>Quick Email</h5>
                                </header>
                                <div id="div-1" class="body collapse in">
                                    <form action="<?php echo site_url('email'); ?>" method="post">
										<label>To</label>
                                        <input type="text" class="form-control" name="to" autocomplete="off" />
                                                                <span id="sg2"></span>
                                        <br />
										<label>Subject</label>
                                        <input type="text" class="form-control" name="subject" />
                                        <br />
                                        <textarea id="wysihtml5" class="form-control" rows="10" name="msg"></textarea>

                                        <div class="form-actions">
                                            <br />
                                            <input type="submit" value="Send" class="btn btn-primary" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
-->
<!--
                        <div class="col-lg-6">
                            <div class="box">
                                <header>
                                    <div class="icons"><i class="icon-envelope"></i></div>
                                    <h5>Quick Private Message</h5>
                                </header>
                                <div id="div-2" class="body collapse in">
                                    <form action="<?php echo site_url('pm/pm_new'); ?>" method="post">
										<label>To</label>
                                        <input type="text" class="form-control" name="to" autocomplete="off" />
                                                                <span id="sg1"></span>
                        <input type="hidden" name="pto" />

                                        <br />
										<label>Subject</label>
                                        <input type="text" class="form-control" name="subject" />
                                        <br />
                                        <textarea class="form-control" rows="10" name="msg"></textarea>

                                        <div class="form-actions">
                                            <br />
                                            <input type="submit" value="Send" class="btn btn-primary" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
-->
                        </div>
            </div>
        </div>
        <!--END PAGE CONTENT -->
         <!-- RIGHT STRIP  SECTION -->
<!--
        <div id="right">
            <div class="well well-small">
                <ul class="list-unstyled">
                    <li>Products &nbsp; : <span><?php echo $total_product; ?></span></li>
                    <li>Branch &nbsp; : <span><?php echo $total_branch; ?></span></li>
                </ul>
            </div>
            <div class="well well-small">
                <button class="btn btn-success btn-block" onclick="location.href='<?php echo site_url('users');?>'"> Users </button>
                <button class="btn btn-warning btn-block" onclick="location.href='<?php echo site_url('sales');?>'"> Sales </button>
                <button class="btn btn-danger btn-block" onclick="location.href='<?php echo site_url('services_wo');?>'"> Services WO </button>
                <button class="btn btn-inverse btn-block" onclick="location.href='<?php echo site_url('inventory/1');?>'"> Inventory Product </button>
                <button class="btn btn-primary btn-block" onclick="location.href='<?php echo site_url('inventory/2');?>'"> Inventory Sparepart </button>
            </div>
        </div>
-->
        </div>
         <!-- END RIGHT STRIP  SECTION -->
<script type="text/javascript">
$(function(){
	$('div#div-2 > form > input[name="to"]').sSuggestion('span#sg1','<?php echo site_url('pm/get_suggestion'); ?>', 'pto');
	$('div#div-1 > form > input[name="to"]').sSuggestion('span#sg2','<?php echo site_url('pm/get_suggestion'); ?>', '');
});
</script>
