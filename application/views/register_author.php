<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">


</head>
<body>

    <div id="wrapper">
        <?php $this->load->view('partial/admin_navigation'); ?>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">

                <?php $this->load->view('partial/top_bar'); ?>

            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2><span class="fa fa-user"></span> Create Authors</h2>
                    <ol class="breadcrumb">
                        <li>
                            Journal
                        </li>
                        <li class="active">
                            <strong>Create Author</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"> 
                                <h5>Create Authors
                                    <small>Create Authors to the system</small>
                                </h5>
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
                                <form name="create_jurnal" method="post" id="add_cad_user" class="form-horizontal"
                                      action="<?= base_url('/index.php/Users/authorRegistration') ?>">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" >First Name</label>
                                                <div class="col-sm-9">
                                                    <input name="first_name" required="" type="text" class="form-control" placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Title</label>
                                                <div class="col-sm-9">
                                                    <input name="title" required="" type="text" class="form-control" placeholder="Issue">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Address1</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="address1" class="form-control" placeholder="Address1">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Address2</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="address2" class="form-control" placeholder="Address2">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">City</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="city" class="form-control" placeholder="City"> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Postal Code</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="postal_code" class="form-control" placeholder="Postal Code">  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Country</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="country" class="form-control" placeholder="Country">  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Last Name</label>
                                                <div class="col-sm-9">
                                                    <input name="last_name" required="" type="text" class="form-control" placeholder="Last Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input name="email" required=""  class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Mobile</label>
                                                <div class="col-sm-9">
                                                    <input name="mobile" required="" class="form-control" placeholder="Mobile">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input name="password" required="" type="password" class="form-control" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Confirm Password</label>
                                                <div class="col-sm-9">
                                                    <input name="password2" required="" type="password" class="form-control" >
                                                </div>
                                            </div>
                                             
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Security Question </label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="sec_question" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Answer </label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="sec_answer" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 ">
                                            <button class="btn btn-primary pull-right" type="submit">Create <span class="fa fa-plus"></span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php $this->load->view('partial/common_js'); ?>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>

</body>
</html>
