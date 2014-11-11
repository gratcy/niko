
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Update</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>User Update</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('users/users_update'); ?>" method="post">
	<input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Email</label>

                    <div class="col-lg-4">
                        <input type="text" value="<?php echo $users[0] -> uemail; ?>" name="uemail" class="form-control" readonly />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Branch</label>

                    <div class="col-lg-4">
						<select name="branch" data-placeholder="Branch" class="form-control chzn-select"><?php echo $branch; ?></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Division</label>

                    <div class="col-lg-4">
                        <input type="text" data-placeholder="Division" value="<?php echo $users[0] -> udivision; ?>" name="division" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Position</label>

                    <div class="col-lg-4">
                        <input type="text" data-placeholder="Position" value="<?php echo $users[0] -> uposition; ?>" name="position" class="form-control" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">User Group</label>

                    <div class="col-lg-4">
						<select name="group" data-placeholder="User Group" class="form-control chzn-select"><?php echo $groups; ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-4">Password </label>

                    <div class="col-lg-4">
                        <input class="form-control" type="password" name="newpass" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-4">Confirm Password</label>

                    <div class="col-lg-4">
                        <input class="form-control" type="password" name="confpass"/>
                    </div>
                </div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Status</label>
                    <div class="col-lg-4">
						
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_status($users[0] -> ustatus,2); ?>
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
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
        <p>Note: (*) leave it blank if you won't change your password</p>
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

<script type="text/javascript">
<?php if (__get_roles('ExecuteAllBranchUsers') <> 1) : ?>
$('select[name="branch"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
$('#pbranch').css('display','none');
<?php endif; ?>
</script>
