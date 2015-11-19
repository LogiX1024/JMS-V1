<?php $this->load->view('partial/header'); ?>
</head>

<body class="gray-bg">


<div class="middle-box text-center animated fadeInDown">
    <h1>401</h1>
    <h3 class="font-bold">Unauthorised Access</h3>

    <div class="error-desc">
        Sorry, but the function you are looking for is restricted.
        <a href="<?php echo base_url(); ?>" class="m-t-lg btn btn-primary btn-lg"><span class="fa fa-arrow-circle-left"></span> Back</a>
    </div>
</div>

<!-- Mainly scripts -->
<?php $this->load->view('partial/common_js'); ?>

</body>

</html>
