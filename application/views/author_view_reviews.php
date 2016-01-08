<!DOCTYPE html>

<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

<link href="<?php echo base_url('assets'); ?>/css/plugins/iCheck/custom.css" rel="stylesheet">

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
                    <h2><span class="fa fa-user"></span> Author</h2>
                    <ol class="breadcrumb">
                        <li>
                            Author
                        </li>
                        <li class="active">
                            <strong>Reviews</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <?php
            echo $data->id;
            ?>

            <div class="ibox">
                <div class="ibox-title">
                    <h3>

                    </h3>
                </div>
                <div class="ibox ibox-content">
                    <!--                    <div id="error-div" class="row m-b-md">
                                            <center>
                                                <div id="error" class="col-sm-12 error"><span class="alert alert-danger text-center"></span></div>
                                            </center>
                                        </div>-->

                    <form role="form" id="review_form" name="review" method="post"
                          action="<?= base_url('/index.php/reviews/submit_review') ?>"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" name="article_id" value="">

                                <div class="col-sm-3">
                                    <label class="control-label">Title Acceptable : <br/></label>
                                </div>
                                <div class="col-sm-9">
                                    <?php
                                    if ($data->title_acceptable == 1) {
                                        ?>
                                        <div class="radio i-checks"><label> <input type="radio" checked="" readonly="" value="1" name="title"> <i></i>
                                                Acceptable </label></div>
                                        <div class="radio i-checks"><label> <input type="radio" value="2" readonly="" name="title"> <i></i>
                                                Need Modification </label></div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="radio i-checks"><label> <input type="radio" value="1" readonly="" name="title"> <i></i>
                                                Acceptable </label></div>
                                        <div class="radio i-checks"><label> <input type="radio" checked="" readonly="" value="2" name="title"> <i></i>
                                                Need Modification </label></div>
                                        <?php
                                    }
                                    ?>                                   
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Suggestions :<br/></label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="title_sug" readonly="" cols="60" rows="3"><?= $data->title_suggession ?></textarea>
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label">Introduction : <br/></label>
                                </div>
                                <div class="col-sm-9">
                                    <?php
                                    if ($data->introduction == 1) {
                                        ?>
                                        <div class="radio i-checks"><label> <input type="radio" readonly="" checked="" value="1" name="introduction">
                                                <i></i>
                                                Adequate and Relevant </label></div>
                                        <div class="radio i-checks"><label> <input type="radio" readonly="" value="2" name="introduction">
                                                <i></i>
                                                Inadequate and/or irrelevant </label></div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="radio i-checks"><label> <input type="radio" readonly="" value="1" name="introduction">
                                                <i></i>
                                                Adequate and Relevant </label></div>
                                        <div class="radio i-checks"><label> <input type="radio" readonly="" checked="" value="2" name="introduction">
                                                <i></i>
                                                Inadequate and/or irrelevant </label></div>
                                        <?php
                                    }
                                    ?>   
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Suggestions <br/></label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="intro_sug" readonly="" cols="60" rows="3"><?= $data->introduction_suggession ?></textarea>
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label">Quality of the paper : <br/></label>
                                </div>
                                <div class="col-sm-9">
                                    <table class="table" style="max-width: 600px;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Excellent</th>
                                                <th>Good</th>
                                                <th>Fair</th>
                                                <th>Poor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Originality</td>
                                                <td>
                                                    <?php
                                                    if ($data->originality == 1) {
                                                        ?>
                                                        <div class="radio i-checks"><input readonly="" checked="" type="radio" value="1" name="originality"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input readonly="" type="radio" value="1" name="originality"></div>
                                                        <?php
                                                    }
                                                    ?>   
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->originality == 2) {
                                                        ?>
                                                        <div class="radio i-checks"><input readonly="" checked="" type="radio" value="2" name="originality"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input readonly="" type="radio" value="2" name="originality"></div>
                                                        <?php
                                                    }
                                                    ?>   
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->originality == 3) {
                                                        ?>
                                                        <div class="radio i-checks"><input readonly="" checked="" type="radio" value="3" name="originality"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input readonly="" type="radio" value="3" name="originality"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->originality == 4) {
                                                        ?>
                                                        <div class="radio i-checks"><input readonly="" checked="" type="radio" value="4" name="originality"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input readonly="" type="radio" value="4" name="originality"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Clarity</td>
                                                <td>
                                                    <?php
                                                    if ($data->clarity == 1) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" checked="" value="1" name="clarity"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" value="1" name="clarity"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->clarity == 2) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" checked="" value="2" name="clarity"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" value="2" name="clarity"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->clarity == 3) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" checked="" value="3" name="clarity"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" value="3" name="clarity"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->clarity == 4) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" checked="" value="4" name="clarity"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" value="4" name="clarity"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Completeness of Data</td>
                                                <td>
                                                    <?php
                                                    if ($data->completeness == 1) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" checked="" value="1" name="completeness"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" value="1" name="completeness"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->completeness == 2) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" checked="" value="2" name="completeness"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" value="2" name="completeness"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->completeness == 3) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" checked="" value="3" name="completeness"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" value="3" name="completeness"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->completeness == 4) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" checked="" value="4" name="completeness"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" value="4" name="completeness"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Interpretation</td>
                                                <td>
                                                    <?php
                                                    if ($data->interpretation == 1) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" checked="" readonly="" value="1" name="interpretation"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" checked="" value="1" name="interpretation"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->interpretation == 2) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" checked="" readonly="" value="2" name="interpretation"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" checked="" value="2" name="interpretation"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->interpretation == 3) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" checked="" readonly="" value="3" name="interpretation"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" checked="" value="3" name="interpretation"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->interpretation == 4) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" checked="" readonly="" value="4" name="interpretation"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" checked="" value="4" name="interpretation"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Importance of the Field</td>
                                                <td>
                                                    <?php
                                                    if ($data->importance == 1) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" checked="" value="1" name="importance"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" value="1" name="importance"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->importance == 2) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" checked="" value="2" name="importance"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" value="2" name="importance"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->importance == 3) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" checked="" value="3" name="importance"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" value="3" name="importance"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($data->importance == 4) {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" checked="" value="4" name="importance"></div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="radio i-checks"><input type="radio" readonly="" value="4" name="importance"></div>
                                                        <?php
                                                    }
                                                    ?>  
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label">Materials and Methods : <br/></label>
                                </div>
                                <div class="col-sm-9">
                                    <?php
                                    if ($data->materials_and_methods == 1) {
                                        ?>
                                        <div class="radio i-checks"><label> <input type="radio" readonly="" checked="" value="1" name="materials"><i></i> Acceptable </label></div>
                                        <div class="radio i-checks"><label> <input type="radio" readonly="" value="2" name="materials"><i></i> Need Modification </label></div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="radio i-checks"><label> <input type="radio" readonly="" value="1" name="materials"><i></i> Acceptable </label></div>
                                        <div class="radio i-checks"><label> <input type="radio" readonly="" checked="" value="2" name="materials"><i></i> Need Modification </label></div>
                                        <?php
                                    }
                                    ?>  

                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Suggestions <br/></label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="materials_sug" readonly="" cols="60" rows="3"><?= $data->materials_and_methods_suggession ?></textarea>
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label">Result and Discussion : <br/></label>
                                </div>
                                <div class="col-sm-9">
                                    <?php
                                    if ($data->results_and_discussion == 1) {
                                        ?>
                                        <div class="radio i-checks"><label> <input type="radio" readonly="" checked="" value="1" name="result"> <i></i>Acceptable </label></div>
                                        <div class="radio i-checks"><label> <input type="radio" readonly="" value="2" name="result"> <i></i>Need Modification </label></div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="radio i-checks"><label> <input type="radio" readonly="" value="1" name="result"> <i></i>Acceptable </label></div>
                                        <div class="radio i-checks"><label> <input type="radio" readonly="" checked="" value="2" name="result"> <i></i>Need Modification </label></div>
                                        <?php
                                    }
                                    ?>  
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Suggestions <br/></label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="result_sug" cols="60" rows="3"><?= $data->results_and_discussion_suggession ?></textarea>
                                </div>

                                <div class="col-sm-3" style="margin-top: 10px;">
                                    <label class="control-label">Decision : <br/></label>
                                </div>
                                <div class="col-sm-9" style="margin-top: 10px;">
                                    <select class="form-control m-b" style="max-width: 500px" name="decision">
                                        <?php
                                        if ($data->decision == 1) {
                                            ?>
                                            <option selected="" value="1">Accepted</option>
                                            <?php
                                        } else if ($data->decision == 2) {
                                            ?>
                                            <option value="2">Accept with Miner corrections</option>
                                            <?php
                                        } else if ($data->decision == 2) {
                                            ?>  
                                            <option value="3">Rejected</option>
                                            <?php
                                        }
                                        ?>  
                                    </select>
                                </div>

                                <!--                                <div class="col-sm-3" style="margin-top: 10px;">
                                                                    <label class="control-label">Upload Review : <br/></label>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <input name="upload_file" type="file" class="form-control"
                                                                           style="max-width: 500px;"/>
                                                                </div>
                                
                                                                <div class="col-sm-3">
                                
                                                                </div>
                                                                <div class="col-sm-9" style="margin-top: 20px;">
                                                                    <input name="submit" type="submit" class="btn btn-w-m btn-primary"/>
                                                                </div>-->

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