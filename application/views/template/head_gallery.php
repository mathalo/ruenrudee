<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title><?php if($this->session->logged_in['permission']!=''){ echo 'Administrator'; }else{ echo 'Ruenrudee'; }?> </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="icon" href="<?php echo base_url(); ?>uploads/mario.ico" type="image/x-icon" />
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tagsinput/jquery.tagsinput.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/switch/static/stylesheets/bootstrap-switch.css" />

    <!--END GLOBAL STYLES -->


    <!-- PAGE LEVEL STYLES -->
    <link href="<?php  echo base_url(); ?>assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/css/bootstrap-fileupload.min.css" />


    <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/uniform/themes/default/css/uniform.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/chosen/chosen.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/css/datepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />


    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gallery/css/bootstrap.min.css">
    <!-- Generic page styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gallery/css/style.css">
    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gallery/css/blueimp-gallery.min.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gallery/css/jquery.fileupload.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gallery/css/jquery.fileupload-ui.css">
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gallery/css/jquery.fileupload-noscript.css">
    </noscript>
    <noscript>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gallery/css/jquery.fileupload-ui-noscript.css">
    </noscript>

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="padTop53 " >