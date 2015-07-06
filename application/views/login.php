<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>PT. Niko Elektronik Indonesia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="<?php echo site_url('application/views/assets/plugins/bootstrap/css/bootstrap.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('application/views/assets/css/login.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('application/views/assets/plugins/magic/magic.css'); ?>" />
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="<?php echo site_url('application/views/assets/img/favicon.ico'); ?>" />
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="tab-content">
    <div class="text-center">
        <img src="<?php echo site_url('application/views/assets/img/logo.png'); ?>" id="logoimg" alt=" Logo" />
    </div>
        <div id="login" class="tab-pane active">
            <form action="<?php echo site_url('login/logging/'); ?>" class="form-signin" method="post">
                <?php echo __get_error_msg(); ?>
                <input type="text" placeholder="Email" name="uemail" class="form-control" />
                <input type="password" placeholder="Password" name="upass" class="form-control" />
                    
                    <div class="checkbox anim-checkbox">
            <input type="checkbox" name="remember" value="1"> 
            <label for="ch1">Remember me</label>
        </div>

                <button class="btn text-muted text-center btn-danger" type="submit">Sign in</button>
            </form>
        </div>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="<?php echo site_url('application/views/assets/plugins/jquery-2.0.3.min.js'); ?>"></script>
      <script src="<?php echo site_url('application/views/assets/plugins/bootstrap/js/bootstrap.js'); ?>"></script>
   <script src="<?php echo site_url('application/views/assets/js/login.js'); ?>"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
