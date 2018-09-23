
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users Group Add</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>User Group Add</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('users/users_group_add'); ?>" method="post">

                <div class="form-group">
                    <label class="control-label col-lg-4">Group Name</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Group Name" name="name" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
                        <textarea name="desc" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Status</label>
                    <div class="col-lg-4">
						
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_status(0,2); ?>
                            </div>
					</div>
				</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Group Permission
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead>
		<tr>
		<th>Name</th>
		<th>Access</th>
		</tr>
      </thead>
      <tbody>
        <?php foreach($permission as $k => $v) : ?>
		<tr>
        <td><?php echo ($v -> pparent != 0 ? '-- '.$v -> pname.'' : $v -> pname); ?></td>
        <td><label>Yes <input type="radio" class="uniform" value="1" name="perm[<?php echo $v -> pid?>]"></label><label> No <input class="uniform" type="radio" value="0" name="perm[<?php echo $v -> pid?>]" checked></label></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      </table>
      </div>
				</div>
				</div>
				</div>
				</div>
                <div class="form-group">
				<label for="status" class="control-label col-lg-4"></label>
				<div class="col-lg-4">
				<button class="btn text-muted text-center btn-danger" type="submit">Submit</button>
				<button class="btn text-muted text-center btn-primary" type="button" onclick="location.href='javascript:history.go(-1);'">Back</button>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
