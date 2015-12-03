<?php $this->load->view('partial/header'); ?>

<link href="<?php echo base_url('assets'); ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/animate.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php //$this->load->view('partial/admin_navigation', array('user' => $user, 'position' => $position));   ?>
        <?php $this->load->view('partial/author_navigation'); ?>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <?php $this->load->view('partial/top_bar'); ?>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><span class="fa fa-users"> </span> Profile</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>

                        <li class="active">
                            <strong>Author's Profile</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeIn">         
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Author's Profile</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>

                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <form method="post" id="add_cad_user" class="form-horizontal"
                                      action="<?= base_url('/index.php/users/update_profile_author') ?>">
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><h5 class="panel-title">

                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" >

                                                            <button class="btn btn-info">
                                                            Personal Information <span class="fa fa-plus"></span>
                                                            </button>
                                                        </a></h5>

                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Title</label>
                                                                        <div class="col-sm-9">
                                                                            <select id="title" class="form-control">
                                                                                <option value="Mr">Mr.</option>
                                                                                <option value="Mrs.">Mrs.</option>
                                                                                <option value="Miss.">Miss.</option>
                                                                                <option value="Dr.">Dr.</option>
                                                                                <option value="Prof.">Prof.</option>
                                                                            </select>
                                                                        </div>  
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">First Name</label>

                                                                        <div class="col-sm-9">
                                                                            <input name="first_name" required="" type="text" class="form-control"
                                                                                   placeholder="First Name">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="form-group">


                                                                    <div class="col-sm-9">

                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Last Name</label>

                                                                    <div class="col-sm-9">
                                                                        <input name="last_name" required="" type="text" class="form-control"
                                                                               placeholder="Last Name">
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div> 
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">


                                                            <button class="btn btn-info">Contact Information <span class="fa fa-plus"></span>
                                                            </button>
                                                        </a></h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">E-Mail Address</label>

                                                                    <div class="col-sm-9">
                                                                        <input name="email" required="" type="email" class="form-control"
                                                                               placeholder="E-Mail Address">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Address Line1</label>

                                                                    <div class="col-sm-9">
                                                                        <input name="address1" required="" type="text" class="form-control"
                                                                               placeholder="Address Line 1">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Address Line2</label>

                                                                    <div class="col-sm-9">
                                                                        <input name="address2" required="" type="text" class="form-control"
                                                                               placeholder="Address Line 2">
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">City</label>

                                                                    <div class="col-sm-9">
                                                                        <input name="city" required="" type="text" class="form-control"
                                                                               placeholder="Enter City">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Country</label>

                                                                    <div class="col-sm-9">
                                                                        <input name="country" required="" type="text" class="form-control"
                                                                               placeholder="Enter Country">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Postal Code</label>

                                                                    <div class="col-sm-9">
                                                                        <input name="postal_code" required="" type="text" class="form-control"
                                                                               placeholder="Postal Code">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">

                                                            <button class="btn btn-info">Change Password <span class="fa fa-plus"></span></button>


                                                        </a></h4>
                                                </div>

                                                <div id="collapseThree" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Password</label>

                                                                    <div class="col-sm-9">
                                                                        <input name="password" required="" type="password" class="form-control"
                                                                               placeholder="Enter password">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Confirm Password</label>

                                                                    <div class="col-sm-9">
                                                                        <input name="password2" required="" type="password" class="form-control"
                                                                               placeholder="Re-Enter password">
                                                                    </div>
                                                                </div>




                                                            </div>
                                                            <div class="col-sm-6 col-md-6">


                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Security Question</label>

                                                                    <div class="col-sm-9">
                                                                        <input name="sec_question" required="" type="text" class="form-control"
                                                                               placeholder="Enter security question">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Answer</label>

                                                                    <div class="col-sm-9">
                                                                        <input name="sec_answer" required="" type="text" class="form-control"
                                                                               placeholder="Enter Answer">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 ">
                                            <button class="btn btn-primary pull-right" type="submit">Save <span
                                                    class="fa fa-save"></span></button>

                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
            <div class="footer">
                <?php $this->load->view('partial/footer'); ?>
            </div>

        </div>
    </div>


    <!-- Mainly scripts -->
    <script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>


</body>

</html>
