
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Private Messages</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5><?php echo $detail[0] -> psubject;?></h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
            <form class="form-horizontal">

                <div class="form-group">
                    <label for="text1" class="col-lg-12">From &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?php echo $detail[0] -> ufrom; ?></label>
                </div>
                <div class="form-group">
                    <label for="text1" class="col-lg-12">To &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?php echo $detail[0] -> uto; ?></label>
                </div>
                <div class="form-group">
                    <label for="text1" class="col-lg-12">Subject &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?php echo $detail[0] -> psubject; ?></label>
                </div>
                <div class="form-group">
                    <label for="text1" class="col-lg-12">Message &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?php echo $detail[0] -> pmsg; ?></label>
                </div>
                <div class="form-group">
                    <div class="col-lg-4">
				<?php if (!preg_match('/outbox/i', $_SERVER['HTTP_REFERER'])) : ?>
				<button class="btn text-muted text-center btn-primary" type="button" onclick="location.href='<?php echo site_url('pm/pm_reply/' . $id); ?>'">Reply</button>
				<?php endif; ?>
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
