
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>RUENRUDEE Template | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="icon" href="<?php echo base_url(); ?>assets/img/logo_ps.ico" type="image/x-icon" />
     
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/magic/magic.css" />
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript">
      var verifyCallback = function(response) {
        alert(response);
      };
      var widgetId1;
      var widgetId2;
      var onloadCallback = function() {
        // Renders the HTML element with id 'example1' as a reCAPTCHA widget.
        // The id of the reCAPTCHA widget is assigned to 'widgetId1'.
        widgetId1 = grecaptcha.render('example1', {
          'sitekey' : 'your_site_key',
          'theme' : 'light'
        });
        widgetId2 = grecaptcha.render(document.getElementById('example2'), {
          'sitekey' : 'your_site_key'
        });
        grecaptcha.render('login', {
          'sitekey' : 'your_site_key',
          'callback' : verifyCallback,
          'theme' : 'dark'
        });
      };
    </script>
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >

   <!-- PAGE CONTENT --> 
<div class="container">
    <!-- <div class="text-center">
        <img src="<?php echo base_url(); ?>assets/img/logo_ps.jpg" id="logoimg" alt=" Logo" />
    </div> -->
    
        <div class="tab-content">
            
            <div id="login" class="tab-pane active" >
                <center>
                        <img src="<?php echo base_url(); ?>assets/img/logo_ps.jpg" width="150" height="200" alt=" Logo" />
                        <!-- <img src="<?php echo base_url(); ?>assets/img/logo_ps.jpg" id="logoimg" alt=" Logo" /> -->
                </center>
                <?php echo form_open('Login/', 'class="form-signin" id="block-validate"'); ?>
                    <p class="text-muted text-center btn-block btn-primary">
                    เข้าสู่ระบบ
                    </p>
                    <input type="text" name="username" placeholder="Username" class="form-control" />
                    <?php echo form_error('username', '<div class="error"><label style="color: red;">', '</label></div>'); ?>

                    <input type="password" name="password" placeholder="Password" class="form-control" />
                    <?php echo form_error('password', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                    <button class="btn text-muted text-center btn-success" type="submit">เข้าสู่ระบบ</button>
                    <button class="btn text-muted text-center btn-danger" type="button" onclick="window.lo  cation='<?php echo base_url(); ?>search'">กลับสู่หน้าค้นหา</i></button>
                </form>
                <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
                    async defer>
                </script>
            </div>
            <!--
            <div id="forgot" class="tab-pane">
                <form action="index.html" class="form-signin">
                    <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid e-mail</p>
                    <input type="email"  required="required" placeholder="Your E-mail"  class="form-control" />
                    <br />
                    <button class="btn text-muted text-center btn-success" type="submit">Recover Password</button>
                </form>
            </div>
-->
        </div>
        <!-- <div class="text-center">
            <ul class="list-inline">
                <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
                <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
            </ul>
        </div> -->
</div>

	  <!--END PAGE CONTENT -->    
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="<?php echo base_url(); ?>assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
