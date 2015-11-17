
<html>
    <head>
        <link href="<?php echo base_url('assets'); ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets'); ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Toastr style -->
        <link href="<?php echo base_url('assets'); ?>/css/plugins/toastr/toastr.min.css" rel="stylesheet">

        <link href="<?php echo base_url('assets'); ?>/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url('assets'); ?>/css/style.css" rel="stylesheet">
    </head>
    <body class="gray-bg">
        <div class="middle-box text-center loginscreen   animated fadeInDown">
            <div>
                <div>

                    <h1 class="logo-name">JMS</h1>

                </div><br>
                <h3>Thank you for the participation of Applied JMS registration process.<?php $first_name; ?>. <br>
                    Your request will be moderated and the activation link will be send through the mail.</h3>
                <p></p>
                <div></div> 

            </div>
        </div>
    </body>
    <!-- Mainly scripts -->
    <script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>

    <!-- Toastr script -->
    <script src="<?php echo base_url('assets'); ?>/js/plugins/toastr/toastr.min.js"></script>

    <script type="text/javascript">
        if ($Success = 1) {
            toastr.success('', 'Thanks!')

        } else {
            toastr.error('', 'Error Occered!')

        }


    </script>
</html>
