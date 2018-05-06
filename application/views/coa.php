        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Accounting Chart of Account </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('COAExecute')) : ?>
                <a href="<?php echo site_url('coa/coa_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Chart of Account</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Chart of Account
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Account Type</th>
          <th style="width:100px;">Activa/Pasiva</th>
          <th>Code</th>
          <th>Name</th>
          <th style="text-align:right;">Saldo</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  echo $coa;
		  ?>
                                    </tbody>
                                </table>
    <?php echo $pages; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
       <!--END PAGE CONTENT -->
