<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php $this->load->view('partial/header'); ?>

</head>
<body>
    <div id="wrapper">
        <?php $this->load->view('partial/reviewer_navigation'); ?>

        <div id="page-wrapper" class="gray-bg">

            <div class="row border-bottom">
                <?php $this->load->view('partial/top_bar'); ?>
            </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2><span class="fa fa-user"></span> Feedbacks</h2>
                    <ol class="breadcrumb">
                        <li>
                            Editor
                        </li>
                        <li class="active">
                            <strong>Feedbacks</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="ibox">
                <div class="ibox-title">
                    <h3>

                    </h3>
                </div>
                <div class="ibox ibox-content">
                    <div id="error-div" class="row m-b-md">
                        <center>
                            <div class="col-sm-12 error"><span class="alert alert-danger text-center"></span></div>
                        </center>
                    </div>

                    <?php
                        for($x=0;$x<3;$x++){
                    ?>
                        <div class="media well">
                            <div class="media-body">
                                <div class="col-lg-10">
                                    <div class="ibox-content">
                                        <h3 class="media-heading">
                                            <span>Title : </span>
                                        </h3>
                                        
                                        <span>Author : </span><br/>
                                        <span>Journal :  </span><br/>
                                        <span>Submitted Date :  </span><br/>
                                    </div>
                                </div>

                                <div class="col-lg-2 pull-right">
                                   
                                    <a href="" target="_blank">
                                        <button type="button" style="margin-bottom: 10px"
                                                class="btn btn-w-m btn-default pull-right">View Feedback
                                        </button>
                                    </a>
                                </div>

                            </div>
                        </div>
                    <?php
                        }
                    ?>




                </div>
            </div>


        </div>
    </div>


    <?php $this->load->view('partial/common_js'); ?>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>


    <!-- Jquery Validate -->
    <script src="<?php echo base_url('assets'); ?>/js/plugins/validate/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function () {
            $("div.error").hide();
        });
    </script>

</body>
</html>