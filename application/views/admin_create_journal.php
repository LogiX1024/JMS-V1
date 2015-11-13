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
                    <h2><span class="fa fa-user"></span>Create Journal</h2>
                    <ol class="breadcrumb">
                        <li>
                            Journal
                        </li>
                        <li class="active">
                            <strong>Create Journal</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"> 
                                <h5>Create Journal
                                    <small>Create Journal to the system</small>
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
                                      action="<?= base_url('/index.php/users/add_editor') ?>">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" >Name</label>
                                                <div class="col-sm-9">
                                                    <input name="name" required="" type="text" class="form-control" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Issue</label>
                                                <div class="col-sm-9">
                                                    <input name="issue" required="" type="text" class="form-control" placeholder="Issue">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Volume</label>
                                                <div class="col-sm-9">
                                                    <input name="volume" required="" type="text" class="form-control" placeholder="Volume">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Aim</label>
                                                <div class="col-sm-9">
                                                    <textarea name="aim" class="form-control" placeholder="Aim"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Objective</label>
                                                <div class="col-sm-9">
                                                    <textarea name="objective" class="form-control" placeholder="Objective"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Scope</label>
                                                <div class="col-sm-9">
                                                    <textarea name="scope" class="form-control" placeholder="Scope"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Category</label>
                                                <div class="col-sm-9">
                                                    <select name="category" id="journals" class="chosen-select form-control" >
                                                        <option value="1">2015 Applied Journal</option>
                                                        <option value="2">Biodiversity & Conservation Conference</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Keywords</label>
                                                <div class="col-sm-9">
                                                    <input name="keywords" required="" type="text" class="form-control" placeholder="Keywords">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">End of Paper Submition Date</label>
                                                <div class="col-sm-9">
                                                    <input name="submition_date" required="" type="date" class="form-control" placeholder="End of Paper Submition date">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Camera Ready Date</label>
                                                <div class="col-sm-9">
                                                    <input name="camera_ready_date" required="" type="date" class="form-control" placeholder="camera_ready_date">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Publish Date</label>
                                                <div class="col-sm-9">
                                                    <input name="publish_date" required="" type="date" class="form-control" placeholder="Publish Date">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Chief Eeditor</label>
                                                <div class="col-sm-9">
                                                    <select name="chief_editor" id="journals" class="chosen-select form-control">
                                                        <option value="1">2015 Applied Journal</option>
                                                        <option value="2">Biodiversity & Conservation Conference</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Editors</label>
                                                <div class="col-sm-9">
                                                    <select name="editors[]" id="journals" class="chosen-select form-control" multiple="multiple">
                                                        <option value="1">2015 Applied Journal</option>
                                                        <option value="2">Biodiversity & Conservation Conference</option>
                                                    </select>
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
