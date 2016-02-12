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

                <p class="m-t-md">Reset Password</p>



                <form id="reset_pw_form" action="<?= base_url('/index.php/users/reset') ?>" method="POST">
                    <input type="hidden" name="username" value="<?=$emails["email"] ?>" />
                    <div class="form-group">
                        <input name="password1" id="p1" type="password" required="required" class="form-control" placeholder="New Password" >
                    </div>
                    <div class="form-group">
                        <input name="password2" id="p2" type="password" required="required" class="form-control" placeholder="New Password Again" >
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary block full-width m-b" type="submit" name="submit" value="Reset Password"/>
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
                $("#reset_pw_form").validate({
                    rules: {
                        password: {
                            required: true,
                            minlength: 3
                        }
                    }
                });
            });
        </script>
    </body>
</html>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
