<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>JmS | Login</title>

        <link href="<?php echo base_url('assets'); ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets'); ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="<?php echo base_url('assets'); ?>/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url('assets'); ?>/css/style.css" rel="stylesheet">

    </head>
    <body class="gray-bg">

        <div class="middle-box text-center loginscreen  animated fadeInDown">
            <div>
                <div>

                    <h1 class="logo-name">
        <!--                <img class="img-responsive m-t-xl"-->
                        <!--                                       src="--><?php //echo base_url('assets');      ?><!--/img/CADLogo.png" alt="CAD Logo"/>-->
                        JmS
                    </h1>

                </div>
                <h3 class="m-t-md">Applied Journal Management System</h3>

                <p class="m-t-md">Forgot Password</p>



                <form id="fogot_pw_form" action="<?= base_url('/index.php/users/forgot_pw') ?>" method="POST">
                    <div class="form-group">
                        <input name="username" type="email" required="required" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary block full-width m-b" type="submit" name="submit" value="Send Reset Link"/>
                    </div>            
                </form>



            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/bootstrap.min.js"></script>

        <!-- Jquery Validate -->
        <script src="<?php echo base_url('assets'); ?>/js/plugins/validate/jquery.validate.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#fogot_pw_form").validate({
                    rules: {
                        email: {
                            required: true,                            
                            minlength: 3
                        }                       
                    }
                });
            });
        </script>
    </body>
</html>
