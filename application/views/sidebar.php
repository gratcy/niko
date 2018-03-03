	<!-- MENU SECTION -->
       <div id="left" >
            <div class="media user-media well-small">
                <div class="media-body">
                    <h5 class="media-heading" style="color:#ed9c28;"> Branch, <?php echo $this -> memcachedlib -> sesresult['ubranch']; ?></h5>
                    <h5 class="media-heading"> <?php echo $this -> memcachedlib -> sesresult['uemail']; ?></h5>
                    <ul class="list-unstyled user-info">
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                        </li>
                    </ul>
                    <?php
        if ($this -> memcachedlib -> sesresult['uid'] == 6 || $this -> memcachedlib -> sesresult['uid'] == 13 || $this -> memcachedlib -> sesresult['uid'] == 23 || $this -> memcachedlib -> sesresult['uid'] == 1) {
            ?>
                    <div style="padding: 10px 0">
                    <select class="form-control" name="switchbranch">
                        <?php echo __get_branch($this -> memcachedlib -> sesresult['ubid'],2); ?>
                    </select>
                    </div>
                    <?php } ?>
                </div>
                <br />
            </div>
            <ul id="menu" class="collapse">
                <li class="panel active">
                    <a href="<?php echo site_url('/'); ?>" >
                        <i class="icon-table"></i> Dashboard
                    </a>                   
                </li>
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-tasks"> </i> Master
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-danger">12</span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-nav">
						<?php if (__get_roles('BranchView') || __get_roles('BranchViewAsBranch')) : ?>
                        <li class=""><a href="<?php echo site_url('branch'); ?>"><i class="icon-angle-right"></i> Branch </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('CustomersView')) : ?>
                         <li class=""><a href="<?php echo site_url('customers'); ?>"><i class="icon-angle-right"></i> Customer </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('ProductsView') || __get_roles('ProductViewAsBranch')) : ?>
                        <li class=""><a href="<?php echo site_url('products'); ?>"><i class="icon-angle-right"></i> Product </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('PackagingView')) : ?>
                        <li class=""><a href="<?php echo site_url('packaging'); ?>"><i class="icon-angle-right"></i> Packaging </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('GroupProductView')) : ?>
                        <li class=""><a href="<?php echo site_url('group_product'); ?>"><i class="icon-angle-right"></i> Group Product </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('CategoriesProductView')) : ?>
                        <li class=""><a href="<?php echo site_url('categories'); ?>"><i class="icon-angle-right"></i> Category Product </a></li>
                         <?php endif; ?>
						 
						 <?php if (__get_roles('TechnicalView')) : ?>
                          <li class=""><a href="<?php echo site_url('technical'); ?>"><i class="icon-angle-right"></i> Technician </a></li>
                         <?php endif; ?>
						 
						<?php if (__get_roles('SparepartView')) : ?>
                         <li class=""><a href="<?php echo site_url('sparepart'); ?>"><i class="icon-angle-right"></i> Sparepart </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('SalesView')) : ?>
                        <li class=""><a href="<?php echo site_url('sales'); ?>"><i class="icon-angle-right"></i> Sales </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('TargetOmsetView')) : ?>
                        <li class=""><a href="<?php echo site_url('target'); ?>"><i class="icon-angle-right"></i> Sales Target </a></li>
                         <?php endif; ?>
						
						
						<?php //if (__get_roles('SuplierView')) : ?>
                        <!--li class=""><a href="<?php //echo site_url('suplier'); ?>"><i class="icon-angle-right"></i> Supplier </a></li-->
                         <?php //endif; ?>
                        <li class=""><a href="<?php echo site_url('city'); ?>"><i class="icon-angle-right"></i> City </a></li>
                        <li class=""><a href="<?php echo site_url('province'); ?>"><i class="icon-angle-right"></i> Province </a></li>
                    </ul>
                </li>
				<?php if (__get_roles('DistributionRequest') || __get_roles('DistributionTransfer') || __get_roles('ItemReceiving')) : ?>
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#distribution">
                        <i class="icon-link"> </i> Distribution
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-danger">3</span>&nbsp;
                    </a>
                    <ul class="collapse" id="distribution">
						<?php if (__get_roles('DistributionRequest')) : ?>
                         <li class=""><a href="<?php echo site_url('request'); ?>"><i class="icon-angle-right"></i> Request </a></li>
						<?php endif; ?>
						<?php if (__get_roles('DistributionTransfer')) : ?>
                         <li class=""><a href="<?php echo site_url('transfer'); ?>"><i class="icon-angle-right"></i> Transfer </a></li>
						<?php endif; ?>
						<?php if (__get_roles('ItemReceiving')) : ?>
                         <li class=""><a href="<?php echo site_url('receiving'); ?>"><i class="icon-angle-right"></i> Receiving </a></li>
						<?php endif; ?>
                    </ul>
                </li>
				<?php endif; ?>
				<?php if (__get_roles('InventoryProductView') || __get_roles('InventorySparepartView') || __get_roles('InventoryRejectProductView') || __get_roles('InventoryRejectSparepartView') || __get_roles('InventoryReturnView')) : ?>
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#inventory">
                        <i class="icon-barcode"> </i> Inventory
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-danger">4</span>&nbsp;
                    </a>
                    <ul class="collapse" id="inventory">
							<?php if (__get_roles('InventoryProductView')) : ?>
								<li class=""><a href="<?php echo site_url('inventory/1'); ?>"><i class="icon-angle-right"></i> Product </a></li>
							<?php endif; ?>
							<?php if (__get_roles('InventorySparepartView')) : ?>
								<li class=""><a href="<?php echo site_url('inventory/2'); ?>"><i class="icon-angle-right"></i> Sparepart </a></li>
							<?php endif; ?>
							<?php if (__get_roles('InventoryReturnView')) : ?>
								<li class=""><a href="<?php echo site_url('inventory/4'); ?>"><i class="icon-angle-right"></i> Return </a></li>
							<?php endif; ?>
							<?php if (__get_roles('InventoryRejectSparepartView')) : ?>
								<li class=""><a href="<?php echo site_url('inventory/5'); ?>"><i class="icon-angle-right"></i> Sparepart (Reject) </a></li>
							<?php endif; ?>
							<!--
							<?php if (__get_roles('InventoryServiceView')) : ?>
								<li class=""><a href="<?php echo site_url('inventory/6'); ?>"><i class="icon-angle-right"></i> Service </a></li>
							<?php endif; ?>
							<?php if (__get_roles('InventoryRejectProductView') || __get_roles('InventoryRejectSparepartView')) : ?>
								<li class="">
									<a href="javascript:void(0);"><i class="icon-angle-down"></i> Reject </a>
									
									<ul>
									<?php if (__get_roles('InventoryRejectProductView')) : ?>
									<li><a href="<?php echo site_url('inventory/3'); ?>"><i class="icon-angle-right"></i> Service</a></li>
									<?php endif; ?>
									<?php if (__get_roles('InventoryRejectSparepartView')) : ?>
									<li><a href="<?php echo site_url('inventory/5'); ?>"><i class="icon-angle-right"></i> Sparepart</a></li>
									<?php endif; ?>
									</ul>
									</li>
							<?php endif; ?>
								</li>
								-->
                    </ul>
                </li>
			   <?php endif; ?>
			   <?php if (__get_roles('OpnameProductView') || __get_roles('OpnameSparepartView') || __get_roles('OpnameReturnView')) : ?>
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#inventoryOpname">
                        <i class="icon-magic"> </i> Inventory Opname
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-danger">4</span>&nbsp;
                    </a>
                    <ul class="collapse" id="inventoryOpname">
							<?php if (__get_roles('OpnameProductView')) : ?>
								<li><a href="<?php echo site_url('opname/1'); ?>"><i class="icon-angle-right"></i> Product </a></li>
							<?php endif; ?>
							<?php if (__get_roles('OpnameSparepartView')) : ?>
								<li><a href="<?php echo site_url('opname/2'); ?>"><i class="icon-angle-right"></i> Sparepart </a></li>
							<?php endif; ?>
							<?php if (__get_roles('OpnameReturnView')) : ?>
								<li><a href="<?php echo site_url('opname/4'); ?>"><i class="icon-angle-right"></i> Return </a></li>
							<?php endif; ?>
							<?php if (__get_roles('InventoryRejectSparepartView')) : ?>
								<li><a href="<?php echo site_url('opname/5'); ?>"><i class="icon-angle-right"></i> Sparepart (Reject) </a></li>
							<?php endif; ?>
							<!--
							<?php if (__get_roles('OpnameServiceView')) : ?>
								<li><a href="<?php echo site_url('opname/6'); ?>"><i class="icon-angle-right"></i> Service </a></li>
							<?php endif; ?>
							<?php if (__get_roles('OpnameRejectProductView') || __get_roles('InventoryRejectSparepartView')) : ?>
								<li>
									<a href="javascript:void(0);"><i class="icon-angle-down"></i> Reject </a>
									<ul>
									<?php if (__get_roles('OpnameRejectProductView')) : ?>
									<li><a href="<?php echo site_url('opname/3'); ?>"><i class="icon-angle-right"></i> Service</a></li>
									<?php endif; ?>
									<?php if (__get_roles('InventoryRejectSparepartView')) : ?>
									<li><a href="<?php echo site_url('opname/5'); ?>"><i class="icon-angle-right"></i> Sparepart</a></li>
									<?php endif; ?>
									</ul>
								</li>
							<?php endif; ?>
							-->
                    </ul>
                </li>
			   <?php endif; ?>
				<?php if (__get_roles('DeliveryOrderView') || __get_roles('SalesOrderView') || __get_roles('ReturnOrderView') || __get_roles('InvoiceOrderView') || __get_roles('PaymentOrderView')) : ?>
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#sales">
                        <i class="icon-shopping-cart"> </i> Transaction
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-danger">6</span>&nbsp;
                    </a>
                    <ul class="collapse" id="sales">
						<?php if (__get_roles('SalesOrderView')) : ?>
                        <li class=""><a href="<?php echo site_url('sales_order/home/'); ?>"><i class="icon-angle-right"></i> Sales Order </a></li>
						<?php endif; ?>
						<?php if (__get_roles('DeliveryOrderView')) : ?>
                         <li class=""><a href="<?php echo site_url('delivery_order/home/'); ?>"><i class="icon-angle-right"></i> Delivery Order </a></li>
						 <?php endif; ?>

						<?php if (__get_roles('ReturnOrderView')) : ?>
						<li class=""><a href="<?php echo site_url('retur_order/home/'); ?>"><i class="icon-angle-right"></i> Return Order </a></li>
						<?php endif; ?>
						
						 <?php if (__get_roles('DeliveryOrderReturnView')) : ?>
						 <li class=""><a href="<?php echo site_url('retur_order/home/retur_order_tg'); ?>"><i class="icon-angle-right"></i> Delivery Order Return</a></li>
						<?php endif; ?>						
						
						<?php if (__get_roles('InvoiceOrderView')) : ?>
						<li class=""><a href="<?php echo site_url('delivery_order/home/invoice_order/1'); ?>"><i class="icon-angle-right"></i> Invoice </a></li>
						<?php endif; ?>
						<?php if (__get_roles('PaymentOrderView')) : ?>
						<li class=""><a href="<?php echo site_url('pembayaran/home'); ?>"><i class="icon-angle-right"></i> Payment </a></li>
						<?php endif; ?>
                    </ul>
                </li>
			   <?php endif; ?>
											
                <!--li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#report">
                        <i class="icon-link"> </i> Report
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-danger">3</span>&nbsp;
                    </a>
                    <ul class="collapse" id="report">
                         <li class=""><a href="<?php echo site_url('delivery_order/home/invoice_order_report/1'); ?>"><i class="icon-angle-right"></i> Invoice Report </a></li>
                    </ul>
                </li-->	

<?php if (__get_roles('ServicesWOView') || __get_roles('ServicesSparepartView') || __get_roles('ServicesReportView')) : ?>
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#services">
                        <i class="icon-cogs"> </i> Service
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-danger">3</span>&nbsp;
                    </a>
                    <ul class="collapse" id="services">
						<?php if (__get_roles('ServicesWOView')) : ?>
                         <li class=""><a href="<?php echo site_url('services_wo'); ?>"><i class="icon-angle-right"></i> Work Order </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('ServicesSparepartView')) : ?>
                         <li class=""><a href="<?php echo site_url('services_sparepart'); ?>"><i class="icon-angle-right"></i> Sparepart </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('ServicesReportView')) : ?>
                         <li class=""><a href="<?php echo site_url('services_report'); ?>"><i class="icon-angle-right"></i> Report </a></li>
                         <?php endif; ?>
                    </ul>
                </li>
			   <?php endif; ?>
	
				<?php if (__get_roles('COAView') || __get_roles('JournalView')) : ?>
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#accounting">
                        <i class="icon-book"> </i> Accounting
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-danger">5</span>&nbsp;
                    </a>
                    <ul class="collapse" id="accounting">
                       
				<?php if (__get_roles('COAView')) : ?>
                        <li class=""><a href="<?php echo site_url('coa'); ?>"><i class="icon-angle-right"></i> COA </a></li>
                        <li class=""><a href="<?php echo site_url('coagroup'); ?>"><i class="icon-angle-right"></i> COA Group </a></li>
			   <?php endif; ?>
				<?php if (__get_roles('JournalView')) : ?>
                         <li class=""><a href="<?php echo site_url('journal'); ?>"><i class="icon-angle-right"></i> Journal </a></li>
			   <?php endif; ?>
                        <li class=""><a href="<?php echo site_url('generalledger'); ?>"><i class="icon-angle-right"></i> General Ledger </a></li>
                        <li class=""><a href="<?php echo site_url('closingperiod'); ?>"><i class="icon-angle-right"></i> Closing Period </a></li>
                    </ul>
                </li>
			   <?php endif; ?>
				<?php if (__get_roles('ReportInvoice') || __get_roles('ReportSalesCommision') || __get_roles('ReportTechnicalCommision') || __get_roles('ReportOpname')) : ?>
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#Report">
                        <i class="icon-list-alt"> </i> Report
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-danger">4</span>&nbsp;
                    </a>
                    <ul class="collapse" id="Report">

                         <?php if (__get_roles('ReportTechnicalCommision')) : ?>
                        <!-- <li class=""><a href="<?php echo site_url('technical_commision'); ?>"><i class="icon-angle-right"></i> SO Pending </a></li> -->
						<?php endif; ?>

						<?php if (__get_roles('ReportInvoice')) : ?>
                       <li class=""><a href="<?php echo site_url('delivery_order/home/invoice_order_report/1'); ?>"><i class="icon-angle-right"></i> Invoice </a></li>
						<?php endif; ?>
						<?php if (__get_roles('ReportSalesCommision')) : ?>
						<li class=""><a href="<?php echo site_url('komisi/home'); ?>"><i class="icon-angle-right"></i> Sales Commission </a></li>
						<?php endif; ?>
						
						<?php if (__get_roles('ReportOpname')) : ?>
                        <li class=""><a href="javascript:void(0);"><i class="icon-angle-right"></i> Opname </a>
                        <ul>
								<li><a href="<?php echo site_url('reportopname/1'); ?>"><i class="icon-angle-right"></i> Product</a></li>
								<li><a href="<?php echo site_url('reportopname/2'); ?>"><i class="icon-angle-right"></i> Sparepart</a></li>
								<li><a href="<?php echo site_url('reportopname/4'); ?>"><i class="icon-angle-right"></i> Return</a></li>
<!--
								<li><a href="<?php echo site_url('reportopname/6'); ?>"><i class="icon-angle-right"></i> Services</a></li>
-->
								<li><a href="<?php echo site_url('reportopname/5'); ?>"><i class="icon-angle-right"></i> Sparepart (Reject)</a></li>
						</ul>
						</li>
			   <?php endif; ?>
                    </ul>
                </li>
			   <?php endif; ?>
<!--
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#PM">
                        <i class="icon-envelope"> </i> Private Messages
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-danger">3</span>&nbsp;
                    </a>
                    <ul class="collapse" id="PM">
                       
                        <li class=""><a href="<?php echo site_url('pm/pm_new'); ?>"><i class="icon-angle-right"></i> New Private Message </a></li>
                        <li class=""><a href="<?php echo site_url('pm'); ?>"><i class="icon-angle-right"></i> Inbox </a></li>
                        <li class=""><a href="<?php echo site_url('pm/outbox'); ?>"><i class="icon-angle-right"></i> Outbox </a></li>
                    </ul>
                </li>
-->
				<?php if (__get_roles('UsersView') || __get_roles('UsersGroupView')) : ?>
                <li class="panel">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#SUsers">
                        <i class="icon-group"></i> Users
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-danger">2</span>&nbsp;
                    </a>
                    <ul class="collapse" id="SUsers">
				<?php if (__get_roles('UsersView')) : ?>
                        <li><a href="<?php echo site_url('users'); ?>"><i class="icon-angle-right"></i> Users </a></li>
			   <?php endif; ?>
				<?php if (__get_roles('UsersGroupView')) : ?>
                        <li><a href="<?php echo site_url('users/users_group'); ?>"><i class="icon-angle-right"></i> Group</a></li>
			   <?php endif; ?>
                    </ul>
                </li>
			   <?php endif; ?>
                <li><a href="<?php echo site_url('login/logout'); ?>" onclick="return confirm('<?php echo $this -> memcachedlib -> sesresult['uemail']; ?>, are you sure you want to logout?');"><i class="icon-signin"></i> Logout </a></li>
            </ul>

        </div>
        <!--END MENU SECTION -->
<script type="text/javascript">
	$('ul#menu > li > ul').removeClass('in');
	if (/\/users/.test(window.location.href) === true) {
		$('ul#SUsers').addClass('in');
		$('ul#menu > li').removeClass('active');
		$('ul#SUsers').parent().addClass('active');
	}
	else if (/\/pm/.test(window.location.href) === true) {
		$('ul#PM').addClass('in');
	}
	else if (/\/services/.test(window.location.href) === true) {
		$('ul#services').addClass('in');
		$('ul#menu > li').removeClass('active');
		$('ul#services').parent().addClass('active');
	}
	else if (/\/inventory/.test(window.location.href) === true) {
		$('ul#inventory').addClass('in');
		$('ul#menu > li').removeClass('active');
		$('ul#inventory').parent().addClass('active');
	}
	else if (/\/opname/.test(window.location.href) === true) {
		$('ul#inventoryOpname').addClass('in');
		$('ul#menu > li').removeClass('active');
		$('ul#inventoryOpname').parent().addClass('active');
	}
	else if (/\/komisi\/home|detail_komisi\/home|technical_commision|reportopname|invoice_order_report/.test(window.location.href) === true) {
		$('ul#Report').addClass('in');
		$('ul#menu > li').removeClass('active');
		$('ul#Report').parent().addClass('active');
	}
	else if (/\/sales_order|delivery_order|retur_order|pembayaran/.test(window.location.href) === true) {
		$('ul#sales').addClass('in');
		$('ul#menu > li').removeClass('active');
		$('ul#sales').parent().addClass('active');
	}
	else if (/\/coa|coagroup|journal|generalledger|closingperiod/.test(window.location.href) === true) {
		$('ul#accounting').addClass('in');
		$('ul#menu > li').removeClass('active');
		$('ul#accounting').parent().addClass('active');
	}
	else if (/\/request|transfer|receiving/.test(window.location.href) === true) {
		$('ul#distribution').addClass('in');
		$('ul#menu > li').removeClass('active');
		$('ul#distribution').parent().addClass('active');
	}
	else if (/\/branch|customers|products|packaging|group_product|categories|sparepart|target|sales|sales_commision|technical|city|province/.test(window.location.href) === true) {
		$('ul#component-nav').addClass('in');
		$('ul#menu > li').removeClass('active');
		$('ul#component-nav').parent().addClass('active');
	}
</script>
