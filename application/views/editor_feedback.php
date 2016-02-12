<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php $this->load->view('partial/header'); ?>




<link href="<?php echo base_url('assets'); ?>/css/plugins/iCheck/custom.css" rel="stylesheet">

</head>
<body>
    <div id="wrapper">
        <?php $this->load->view('partial/editor_navigation'); ?>

        <div id="page-wrapper" class="gray-bg">

            <div class="row border-bottom">
                <?php $this->load->view('partial/top_bar'); ?>
            </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2><span class="fa fa-user"></span> Feedback</h2>
                    <ol class="breadcrumb">
                        <li>
                            Editor
                        </li>
                        <li class="active">
                            <strong>Feedback</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <?php
            if (isset($message) && ($message != "")):
                ?>
                <div class="alert alert-<?= $type ?> alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?= $message ?>.
                </div>
                <?php
            endif;
            ?>

            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">
                    <form>
                        <div class="col-lg-12 ibox-content">

                            <div class="form-group">
                                <div class="form-group"><label class="col-sm-2 control-label">Title</label></div>
                                <div class="form-group col-sm-10"><input type="text" readonly="readonly" class="form-control" value="Title" ></div>
                            </div>
                            <div class="form-group">
                                <div class="form-group"><label class="col-sm-2 control-label">Author</label></div>
                                <div class="form-group col-sm-10"><input type="text" readonly="readonly" class="form-control" value="Author" ></div>
                            </div>

                            <div class="form-group">
                                <div class="form-group"><label class="col-sm-2 control-label">Journal</label></div>
                                <div class="form-group col-sm-10"><input type="text" readonly="readonly" class="form-control" value="Journal" ></div>
                            </div>


                            <div class="form-group">
                                <div class="form-group"><label class="col-sm-2 control-label">Submitted Date</label></div>
                                <div class="form-group col-sm-10"><input type="text" readonly="readonly" class="form-control" value="Submitted Date" ></div>
                            </div>
                            <div class="form-group">
                                <div class="form-group"><label class="col-sm-2 control-label">Feedback</label></div>                             
                                <div class="form-group col-sm-10">
                                    <textarea class="form-control" name="feedback" cols="80" rows="3"></textarea>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <div class="form-group col-sm-2"><label class="col-sm-2 control-label">Overall Decision</label></div>
                                <div class="form-group col-sm-10">
                                    <div class="col-sm-3">
                                        <div class="radio i-checks"><label class="h5"> <input type="radio" value="1" name="response"><i></i> Accept </label></div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="radio i-checks"><label class="h5"> <input type="radio" value="2" name="response"><i></i> Reject </label></div>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-3">
                                    <input name="submit" type="submit" class="btn btn-w-m btn-primary "/>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>




    <?php $this->load->view('partial/common_js'); ?>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="<?php echo base_url('assets'); ?>/js/plugins/iCheck/icheck.min.js"></script>


    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });
        });
    </script>

</body>
</html>