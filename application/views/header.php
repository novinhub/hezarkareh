<!doctype html>
<html lang="fa">
  
<!-- Mirrored from themerail.com/html/oficiona/home-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Mar 2019 09:17:17 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php if(isset($title)){echo $title;}?></title>

    <!-- Bootstrap CSS -->
  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('files/');?>assets/css/bootstrap.min.css">

    <!-- External Css -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('files/');?>assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('files/');?>assets/css/themify-icons.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('files/');?>assets/css/et-line.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('files/');?>assets/css/bootstrap-select.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('files/');?>assets/css/plyr.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('files/');?>assets/css/flag.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('files/');?>assets/css/slick.css" /> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('files/');?>assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('files/');?>assets/css/jquery.nstSlider.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('files/');?>css/rtl.css">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('files/');?>css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('files/');?>dashboard/css/dashboard.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('files/');?>images/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo base_url('files/');?>images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('files/');?>images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('files/');?>images/icon-114x114.png">
    <link rel="stylesheet" href="<?php echo base_url('files/');?>assets/persian_date/css/persianDatepicker-default.css" />

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <!-- Header -->
    <header >
      <nav class="navbar navbar-expand-xl absolute-nav transparent-nav cp-nav navbar-light bg-light fluid-nav ltr">
        <a class="navbar-brand" href="<?php echo base_url('home')?>"> 
          <img src="<?php echo base_url('files/');?>images/logo.png" class="img-fluid" alt="">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse rtl" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto main-nav">
          <?php if($this->session->has_userdata('e_login')){ ?> 
            <li class="menu-item post-job ml-3"><a href="<?php echo base_url('employer')?>">ورود به پنل</a></li>
          <?php }else if($this->session->has_userdata('a_login')){ ?> 
            <li class="menu-item post-job"><a href="<?php echo base_url('applicant')?>">ورود به پنل</a></li>
          <?php }else{ ?>
          <li class="menu-item post-job ml-3"><a href="<?php echo base_url('login/employer')?>"> ورود کارفرما</a></li>
          <li class="menu-item post-job"><a href="<?php echo base_url('login/applicant')?>">ورود کارجو</a></li>
          <?php } ?>
          <li class="menu-item active"><a  href="<?php echo base_url('home')?>">خانه</a></li>
          <li class="menu-item "><a  href="<?php echo base_url('jobs')?>">آگهی های استخدام</a></li>
          <li class="menu-item "><a  href="<?php echo base_url('test')?>"> تست خودشناسی</a></li>
          <li class="menu-item "><a  href="<?php echo base_url('blog')?>"> بلاگ</a></li>
          <li class="menu-item "><a  href="<?php echo base_url('about')?>"> درباره ما</a></li>
          <li class="menu-item "><a  href="<?php echo base_url('contact')?>"> تماس با ما</a></li>     
          </ul>
        </div>
      </nav>
		    