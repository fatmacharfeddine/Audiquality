<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() . "/includes/ext/"; ?>assets/template/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "/includes/ext/"; ?>assets/template/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "/includes/ext/"; ?>assets/template/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "/includes/ext/"; ?>assets/template/css/style.css">
    <!--[if lt IE 9]>
		<script src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">

                    <?php
                    $attributes = array('class' => 'form-signin');
                    echo form_open('LoginAccount/post_login', $attributes); ?>

                    <div class="account-logo">
                        <a href="index-2.html"><img src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/img/logo-dark.png" alt=""></a>
                    </div>
                    <div class="form-group">
                        <label>Username or Email</label>
                        <?php
                        $data = array(
                            'type'          => 'email',
                            'name'          => 'email',
                            'class'         => 'form-control',
                            'placeholder'   => 'Email',
                            'required'      => 'required'
                        );
                        echo form_input($data);
                        ?>
                        <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label>Password</label>

                        <?php
                        $data = array(
                            'name'          => 'password',
                            'class'         => 'form-control',
                            'placeholder'   => 'Password',
                            'required'      => 'required'
                        );
                        echo form_password($data);
                        ?>
                        <?php echo form_error('password'); ?>

                    </div>

             
                    <input type="hidden" name="radiologin" value="<?php echo $account ; ?>"> 


                    <div class="form-group text-center">
                        <?php
                        $data = array(
                            'class'         => 'btn btn-primary account-btn',
                            'value'      => 'Sign IN'
                        );
                        echo form_submit($data);
                        ?>

                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/js/popper.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/js/app.js"></script>
</body>


<!-- login23:12-->

</html>