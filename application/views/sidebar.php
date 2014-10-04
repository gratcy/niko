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
						<?php if (__get_roles('BranchView')) : ?>
                        <li class=""><a href="<?php echo site_url('branch'); ?>"><i class="icon-angle-right"></i> Branch </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('CustomersView')) : ?>
                         <li class=""><a href="<?php echo site_url('customers'); ?>"><i class="icon-angle-right"></i> Customers </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('ProductsView')) : ?>
                        <li class=""><a href="<?php echo site_url('products'); ?>"><i class="icon-angle-right"></i> Products </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('PackagingView')) : ?>
                        <li class=""><a href="<?php echo site_url('packaging'); ?>"><i class="icon-angle-right"></i> Packaging </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('GroupProductView')) : ?>
                        <li class=""><a href="<?php echo site_url('group_product'); ?>"><i class="icon-angle-right"></i> Groups Product </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('GroupSparepartView')) : ?>
                        <li class=""><a href="<?php echo site_url('group_sparepart'); ?>"><i class="icon-angle-right"></i> Groups Sparepart </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('CategoriesProductView')) : ?>
                        <li class=""><a href="<?php echo site_url('categories'); ?>"><i class="icon-angle-right"></i> Categories Product </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('SparepartView')) : ?>
                         <li class=""><a href="<?php echo site_url('sparepart'); ?>"><i class="icon-angle-right"></i> Sparepart </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('TargetOmsetView')) : ?>
                        <li class=""><a href="<?php echo site_url('target'); ?>"><i class="icon-angle-right"></i> Target Omset </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('SalesView')) : ?>
                        <li class=""><a href="<?php echo site_url('sales'); ?>"><i class="icon-angle-right"></i> Sales </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('SalesCommisionView')) : ?>
                        <li class=""><a href="<?php echo site_url('sales_commision'); ?>"><i class="icon-angle-right"></i> Sales Commision </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('TechnicalView')) : ?>
                          <li class=""><a href="<?php echo site_url('technical'); ?>"><i class="icon-angle-right"></i> Technical </a></li>
                         <?php endif; ?>
						<?php if (__get_roles('SuplierView')) : ?>
                        <li class=""><a href="<?php echo site_url('suplier'); ?>"><i class="icon-angle-right"></i> Suplier </a></li>
                         <?php endif; ?>
                    </ul>
                </li>
				<?php if (__get_roles('ServicesView')) : ?>
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#services">
                        <i class="icon-cogs"> </i> Services
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-danger">1</span>&nbsp;
                    </a>
                    <ul class="collapse" id="services">
						<?php if (__get_roles('ServicesView')) : ?>
                         <li class=""><a href="<?php echo site_url('services'); ?>"><i class="icon-angle-right"></i> Services </a></li>
						<?php endif; ?>
                    </ul>
                </li>
			   <?php endif; ?>
				<?php if (__get_roles('InventoryProductView') || __get_roles('InventorySparepartView') || __get_roles('InventoryServicesView') || __get_roles('InventoryReturnView') || __get_roles('OpnameProductView') || __get_roles('OpnameSparepartView') || __get_roles('OpnameServicesView') || __get_roles('OpnameReturnView')) : ?>
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#inventory">
                        <i class="icon-barcode"> </i> Inventory
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-primary">5</span>&nbsp;
                    </a>
                    <ul class="collapse" id="inventory">
							<?php if (__get_roles('InventoryProductView')) : ?>
								<li class=""><a href="<?php echo site_url('inventory/1'); ?>"><i class="icon-angle-right"></i> Inventory Product </a></li>
							<?php endif; ?>
							<?php if (__get_roles('InventorySparepartView')) : ?>
								<li class=""><a href="<?php echo site_url('inventory/2'); ?>"><i class="icon-angle-right"></i> Inventory Sparepart </a></li>
							<?php endif; ?>
							<?php if (__get_roles('InventoryServicesView')) : ?>
								<li class=""><a href="<?php echo site_url('inventory/3'); ?>"><i class="icon-angle-right"></i> Inventory Services </a></li>
							<?php endif; ?>
							<?php if (__get_roles('InventoryReturnView')) : ?>
								<li class=""><a href="<?php echo site_url('inventory/4'); ?>"><i class="icon-angle-right"></i> Inventory Return </a></li>
							<?php endif; ?>
							<?php if (__get_roles('OpnameProductView') || __get_roles('OpnameSparepartView') || __get_roles('OpnameServicesView') || __get_roles('OpnameReturnView')) : ?>
								<li class=""><a href="javascript:void(0);"><i class="icon-angle-down"></i> Inventory Opname </a>
							<?php endif; ?>
								<ul>
							<?php if (__get_roles('OpnameProductView')) : ?>
								<li><a href="<?php echo site_url('opname/1'); ?>"><i class="icon-angle-right"></i> Product Opname</a></li>
							<?php endif; ?>
							<?php if (__get_roles('OpnameSparepartView')) : ?>
								<li><a href="<?php echo site_url('opname/2'); ?>"><i class="icon-angle-right"></i> Sparepart Opname</a></li>
							<?php endif; ?>
							<?php if (__get_roles('OpnameServicesView')) : ?>
								<li><a href="<?php echo site_url('opname/3'); ?>"><i class="icon-angle-right"></i> Services Opname</a></li>
							<?php endif; ?>
							<?php if (__get_roles('OpnameReturnView')) : ?>
								<li><a href="<?php echo site_url('opname/4'); ?>"><i class="icon-angle-right"></i> Return Opname</a></li>
							<?php endif; ?>
								</ul>
								</li>
                    </ul>
                </li>
			   <?php endif; ?>
				
				<?php if (__get_roles('PurchaseOrderView')) : ?>
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#purchase">
                        <i class="icon-money"> </i> Purchase &amp; Sales
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-primary">2</span>&nbsp;
                    </a>
                    <ul class="collapse" id="purchase">
						<?php if (__get_roles('PurchaseOrderView')) : ?>
                        <li class=""><a href="<?php echo site_url('purchase_order/home/'); ?>"><i class="icon-angle-right"></i> Purchase Order </a></li>
						<?php endif; ?>
                         <li class=""><a href="<?php echo site_url('penerimaan'); ?>"><i class="icon-angle-right"></i> Penerimaan </a></li>
                    </ul>
                </li>
			   <?php endif; ?>
				<?php if (__get_roles('DeliveryOrderView') || __get_roles('SalesOrderView')) : ?>
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#sales">
                        <i class="icon-shopping-cart"> </i> Sales
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-primary">2</span>&nbsp;
                    </a>
                    <ul class="collapse" id="sales">
						<?php if (__get_roles('SalesOrderView')) : ?>
                        <li class=""><a href="<?php echo site_url('sales_order/home/'); ?>"><i class="icon-angle-right"></i> Sales Order </a></li>
						<?php endif; ?>
						<?php if (__get_roles('DeliveryOrderView')) : ?>
                         <li class=""><a href="<?php echo site_url('delivery_order/home/'); ?>"><i class="icon-angle-right"></i> Delivery Order </a></li>
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
                       &nbsp; <span class="label label-info">5</span>&nbsp;
                    </a>
                    <ul class="collapse" id="accounting">
                       
				<?php if (__get_roles('COAView') || __get_roles('COAView')) : ?>
                        <li class=""><a href="<?php echo site_url('coa'); ?>"><i class="icon-angle-right"></i> COA </a></li>
			   <?php endif; ?>
				<?php if (__get_roles('COAView') || __get_roles('JournalView')) : ?>
                         <li class=""><a href="<?php echo site_url('journal'); ?>"><i class="icon-angle-right"></i> Journal </a></li>
			   <?php endif; ?>
                        <li class=""><a href="<?php echo site_url('generalledger'); ?>"><i class="icon-angle-right"></i> General Ledger </a></li>
                        <li class=""><a href="<?php echo site_url('closingperiod'); ?>"><i class="icon-angle-right"></i> Closing Period </a></li>
                    </ul>
                </li>
			   <?php endif; ?>
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#Report">
                        <i class="icon-list-alt"> </i> Report
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-success">3</span>&nbsp;
                    </a>
                    <ul class="collapse" id="Report">
                       
                        <li class=""><a href="<?php echo site_url('sales_commision'); ?>"><i class="icon-angle-right"></i> Sales Commision </a></li>
                        <li class=""><a href="<?php echo site_url('technical_commision'); ?>"><i class="icon-angle-right"></i> Technical Commision </a></li>
                        <li class=""><a href="javascript:void(0);"><i class="icon-angle-right"></i> Stock Opname </a>
                        <ul>
								<li><a href="<?php echo site_url('reportopname/1'); ?>"><i class="icon-angle-right"></i> Product Opname</a></li>
								<li><a href="<?php echo site_url('reportopname/2'); ?>"><i class="icon-angle-right"></i> Sparepart Opname</a></li>
								<li><a href="<?php echo site_url('reportopname/3'); ?>"><i class="icon-angle-right"></i> Services Opname</a></li>
								<li><a href="<?php echo site_url('reportopname/4'); ?>"><i class="icon-angle-right"></i> Return Opname</a></li>
                        </ul>
                        </li>
                    </ul>
                </li>
                <li class="panel ">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#PM">
                        <i class="icon-envelope"> </i> Private Messages
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-info">3</span>&nbsp;
                    </a>
                    <ul class="collapse" id="PM">
                       
                        <li class=""><a href="<?php echo site_url('pm/pm_new'); ?>"><i class="icon-angle-right"></i> New Private Message </a></li>
                        <li class=""><a href="<?php echo site_url('pm'); ?>"><i class="icon-angle-right"></i> Inbox </a></li>
                        <li class=""><a href="<?php echo site_url('pm/outbox'); ?>"><i class="icon-angle-right"></i> Outbox </a></li>
                    </ul>
                </li>
                <li class="panel">
                    <a href="javascript:void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav">
                        <i class="icon-group"></i> Users
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-warning">2</span>&nbsp;
                    </a>
                    <ul class="collapse" id="chart-nav">
                        <li><a href="<?php echo site_url('users'); ?>"><i class="icon-angle-right"></i> Users </a></li>
                        <li><a href="<?php echo site_url('users/users_group'); ?>"><i class="icon-angle-right"></i> User Group</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo site_url('login/logout'); ?>" onclick="return confirm('<?php echo $this -> memcachedlib -> sesresult['uemail']; ?>, are you sure you want to logout?');"><i class="icon-signin"></i> Logout </a></li>
            </ul>

        </div>
        <!--END MENU SECTION -->
