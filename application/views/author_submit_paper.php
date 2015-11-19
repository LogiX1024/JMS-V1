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
        <?php $this->load->view('partial/author_navigation'); ?>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">

                <?php $this->load->view('partial/top_bar'); ?>

            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2><span class="fa fa-user"></span> Submit Paper</h2>
                    <ol class="breadcrumb">
                        <li>
                            Author
                        </li>
                        <li class="active">
                            <strong>Submit Paper</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"> 
                                <h5>Submit Paper
                                    <small>Submit Paper for the Journal</small>
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

                            <?php
                            $user = $this->session->userdata("user");

                            if (isset($error)) {
                                echo $error;
                            }
                            if (isset($success)) {
                                echo $success;
                            }
                            
                            ?>

                            <div class="ibox-content">
                                <div class="row">
                                    <form name="create_jurnal" method="post" enctype="multipart/form-data" id="add_cad_user" class="form-horizontal"
                                          action="<?= base_url('/index.php/articles/submit_article') ?>">

                                        <div class="col-lg-8 col-md-8">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" >Title</label>
                                                <div class="col-sm-9">
                                                    <input name="title" required="" type="text" class="form-control" placeholder="Title">
                                                    <input name="journal_id"  type="hidden" class="form-control" value="4562">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Chief Author</label>
                                                    <!--<input name="chief_author" required="" type="text" readonly="readonly" class="form-control" placeholder="chief_author">-->
                                                <!--<div class="col-sm-12 ">-->
                                                <!--<span class="input-group-btn">  <button class="btn btn-primary pull-right" type="submit">Edit</button></span>-->
                                                <!--</div>-->
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="chief_author" readonly="readonly" value="<?=$user->first_name . " " . $user->last_name ?>" > 
                                                        <span class="input-group-btn"> 
                                                            <button type="button" class="btn btn-primary">Change</button> 
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Sub Author 1</label>
                                                <div class="col-sm-9">
                                                    <input name="sub_auth_1" required="" type="text" class="form-control" placeholder="Sub Author1">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Sub Author 2</label>
                                                <div class="col-sm-9">
                                                    <input name="sub_auth_2" required="" type="text" class="form-control" placeholder="Sub Author2">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Keywords</label>
                                                <div class="col-sm-9">
                                                    <input name="keywords" required="" type="text" class="form-control" placeholder="Keywords">
                                                    * Separated by commas
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Upload File</label>
                                                <div class="col-sm-9">
                                                    <input name="upload_file" required="" type="file" class="form-control" placeholder="Upload">
                                                    * Upload Document files only
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-sm-11 ">
                                                    <button class="btn btn-primary pull-right" type="submit">Create <span class="fa fa-plus"></span></button>
                                                </div>
                                            </div>  
                                        </div>
                                    </form>

                                    <div class="col-sm-4">
                                        <div>
                                            <label>Dowlands</label>
                                        </div>
                                        <div>
                                            <a href=""><button type="button" class="btn btn-primary">Paper Format</button></a>
                                        </div>
                                        <div>
                                            <a href=""><button type="button" class="btn btn-primary">Guideline</button></a>
                                        </div>
                                        <!--<div class="widget navy-bg p-lg text-left">-->
                                        <div>
                                            <br/>
                                            <br/>
                                            <br/>
                                        </div>
                                        <div class="ibox-content">
                                            <h1><b>Timeline</b></h1>
                                            <h3>Paper submit Deadline</h3>
                                            <p>2015/12/12</p>
                                            <h3>Camera Ready Deadline</h3>
                                            <p>2015/12/12</p>
                                        </div>
                                        <!--</div>-->
                                    </div>
                                </div>
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
