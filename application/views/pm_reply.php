
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Reply Private Message</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Reply Private Message</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('pm/pm_new'); ?>" method="post">

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">To</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="To" value="<?php echo $detail[0] -> ufrom; ?>" name="to" class="form-control" autocomplete="off" />
                        <span id="sg1"></span>
                        <input type="hidden" name="pto" value="<?php echo $detail[0] -> pfrom; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Subject</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Subject" name="subject" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Message</label>

                    <div class="col-lg-4">
                        <textarea name="msg" class="form-control" placeholder="Message" rows="8">


-------
<?php echo $detail[0] -> psubject;?>

<?php echo $detail[0] -> pmsg;?>
                        </textarea>
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
<script type="text/javascript">
$(function(){
	$('input[name="to"]').sSuggestion('span#sg1','<?php echo site_url('pm/get_suggestion'); ?>', 'pto');
});
</script>
