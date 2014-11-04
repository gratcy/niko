<!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Profile</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>User Profile</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('settings/settings'); ?>" method="post">
	<input type="hidden" name="uid" value="<?php echo $this -> memcachedlib -> sesresult['uid']; ?>">
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Email</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Email" name="uemail" class="form-control" value="<?php echo $this -> memcachedlib -> sesresult['uemail']; ?>" readonly />
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-4">Old Password</label>

                    <div class="col-lg-4">
                        <input class="form-control" type="password" name="oldpass" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass1" class="control-label col-lg-4">New Password</label>

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
