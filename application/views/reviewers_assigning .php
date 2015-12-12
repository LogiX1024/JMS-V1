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
                    <h2><span class="fa fa-user"></span> Submissions</h2>
                    <ol class="breadcrumb">
                        <li>
                            Editor
                        </li>
                        <li class="active">
                            <strong>Reviewer's Assigning</strong>
                        </li>
                    </ol>
                </div>

            </div>

            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ibox-content">
                            <div id="error-div" class="row m-b-md">
                                <center>
                                    <div class="col-sm-12 error"><span class="alert alert-danger text-center"></span></div>
                                </center>
                            </div>
                            <form role="form" id="assigned_review_form" name="assigned" method="post"
                                  action="<?= base_url('/index.php/reviews/assigned_review') ?>"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row">


                                        <div class="col-sm-12">
                                            <label class="control-label">Article Details <br/></label>
                                        </div>

                                        <br/><br/>
                                        <?php foreach ($article as $reviewer_data): { ?> 
                                                <div class="col-sm-3">
                                                    <label class="control-label">Article Title : <br/></label>
                                                </div>
                                                <input type="hidden" name="article_id" value="<?= $reviewer_data->id ?>">     

                                                <div class="col-sm-9">
                                                    <div class="form-control"> 
                                                        <?php echo $reviewer_data->title; ?> 
                                                    </div> <br/>

                                                </div>

                                            <?php } endforeach; ?>
                                        <br/><br/> 

                                        <div class="col-sm-3">
                                            <label class="control-label">Reviewer's Assigning : <br/></label>
                                        </div>
                                        <div class="col-sm-9">
                                            <table class="table" style="max-width: 600px;">
                                                <thead>
                                                    <tr>
                                                        <th>Reviewer Name</th>

                                                        <th>R1</th>
                                                        <th>R2</th>
                                                        <th>R3</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($reviewer as $reviewer_data): { ?>
                                                            <tr>
                                                                <td><?php echo$reviewer_data->first_name . " " . $reviewer_data->last_name; ?></td>
 
                                                                <td>
                                                                    <div class="radio i-checks"><input type="radio" value="<?php echo$reviewer_data->id ?>"
                                                                                                       name="R1"></div>
                                                                </td>
                                                                <td>
                                                                    <div class="radio i-checks"><input type="radio" value="<?php echo$reviewer_data->id ?>"
                                                                                                       name="R2"></div>
                                                                </td>
                                                                <td>
                                                                    <div class="radio i-checks"><input type="radio" value="<?php echo$reviewer_data->id ?>"
                                                                                                       name="R3"></div>
                                                                </td>

                                                            </tr>
                                                        <?php } endforeach; ?>




                                                </tbody>
                                            </table>
                                        </div>




                                        <div class="col-sm-3">

                                        </div>
                                        <div class="col-sm-9" style="margin-top: 20px;">
                                            <input name="submit" type="submit" class="btn btn-w-m btn-primary"/>
                                        </div>

                                    </div>
                                </div>
                            </form>
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

    <!-- iCheck -->
    <script src="<?php echo base_url('assets'); ?>/js/plugins/iCheck/icheck.min.js"></script>

    <!-- Jquery Validate -->
    <script src="<?php echo base_url('assets'); ?>/js/plugins/validate/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            $("div.error").hide();


            $("#review_form").validate({
                rules: {
                    title: {
                        required: true
                    },
                    introduction: {
                        required: true
                    },
                    originality: {
                        required: true
                    },
                    clarity: {
                        required: true
                    },
                    completeness: {
                        required: true
                    },
                    interpretation: {
                        required: true
                    },
                    importance: {
                        required: true
                    },
                    materials: {
                        required: true
                    },
                    result: {
                        required: true
                    },
                    decision: {
                        required: true
                    },
                    upload_file: {
                        required: true
                    }
                },
                messages: {
                    title: "",
                    introduction: "",
                    originality: "",
                    clarity: "",
                    completeness: "",
                    interpretation: "",
                    importance: "",
                    materials: "",
                    result: "",
                    decision: ""
                },
                invalidHandler: function (event, validator) {
                    // 'this' refers to the form
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        var message = errors == 1
                                ? 'You missed 1 field. It has been highlighted'
                                : 'You missed ' + errors + ' fields.';
                        $("div.error span").html(message);
                        $("div.error").show();
                    } else {
                        $("div.error").hide();
                    }
                }
            });
        });
    </script>
</body>
</html>