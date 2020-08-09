<!DOCTYPE html>
<!--
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.0.0
Author: Sunnyat Ahmmed
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        EMONEV | YANKES
    </title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>assets/smartadmin/css/vendors.bundle.css">
    <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>assets/smartadmin/css/app.bundle.css">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/smartadmin/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/smartadmin/img/favicon/favicon-32x32.png">
    <link rel="mask-icon" href="<?php echo base_url(); ?>assets/smartadmin/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <!-- Optional: page related CSS-->
    <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>assets/smartadmin/css/page-login.css">
</head>

<body>
    <div class="blankpage-form-field">
        <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
            <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                <img src="<?php echo base_url(); ?>assets/smartadmin/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                <span class="page-logo-text mr-1">EMONEV | YANKES</span>
                <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
            </a>
        </div>
        <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
            <?php
            $status_login = $this->session->userdata('status_login');
            if (empty($status_login)) {
                $message = "Silahkan login untuk masuk ke aplikasi";
            } else {
                $message = $status_login;
            }
            ?>
            <p class="login-box-msg"><?php echo $message; ?></p>
            <?php echo form_open('auth/cheklogin'); ?>
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input type="kode_satker" name="kode_satker" id="kode_satker" class="form-control" placeholder="Masukkan Kode Satker">
                <span class="help-block">
                    Your unique username to app
                </span>
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="password" value="password123">
                <span class="help-block">
                    Your password
                </span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">Secure login</button>
                <?php //echo anchor('#', '<i class="fal fa-eye" aria-hidden="true"></i> Lupa Password', array('class' => 'btn btn-outline-success btn-block waves-effect waves-themed'));
                ?>
            </div>
            </form>
        </div>
        <!-- <div class="blankpage-footer text-center">
            <a href="#"><strong>Recover Password</strong></a> | <a href="#"><strong>Register Account</strong></a>
        </div> -->
    </div>
    <div class="login-footer p-2">
        <div class="row">
            <div class="col col-sm-12 text-center">
                <i><strong>System Message:</strong> You were logged out from 198.164.246.1 on Saturday, March, 2017 at 10.56AM</i>
            </div>
        </div>
    </div>
    <video poster="<?php echo base_url(); ?>assets/smartadmin/img/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop>
        <source src="<?php echo base_url(); ?>assets/smartadmin/media/video/cc.webm" type="video/webm">
        <source src="<?php echo base_url(); ?>assets/smartadmin/media/video/cc.mp4" type="video/mp4">
    </video>
    <!-- base vendor bundle:
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
    <script src="<?php echo base_url(); ?>assets/smartadmin/js/vendors.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/smartadmin/js/app.bundle.js"></script>
    <!-- Page related scripts -->
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>

</body>

</html>