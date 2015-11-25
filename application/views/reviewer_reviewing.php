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
        <?php $this->load->view('partial/reviewer_navigation'); ?>

        <div id="page-wrapper" class="gray-bg">

            <div class="row border-bottom">
                <?php $this->load->view('partial/top_bar'); ?>
            </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2><span class="fa fa-user"></span> Reviewing</h2>
                    <ol class="breadcrumb">
                        <li>
                            Reviewer
                        </li>
                        <li class="active">
                            <strong>Reviewing</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="ibox">
                <div class="ibox-title">
                    <h3>
                        Article Name
                    </h3>
                </div>
                <div class="ibox ibox-content">
                    <form name="reviews" method="post" action="<?= base_url('/index.php/reviews/submit_review') ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" name="article_id" value="1">
                                <div class="col-sm-3">
                                    <label class="control-label">Title Acceptable : <br/></label>             
                                </div>
                                <div class="col-sm-9">
                                    <div class="radio i-checks"><label> <input type="radio" value="1" name="title"> <i></i> Acceptable </label></div>
                                    <div class="radio i-checks"><label> <input type="radio" value="2" name="title"> <i></i> Need Modification </label></div>
                                </div>                            
                                <div class="col-sm-3">
                                    <label class="control-label">Suggestions :<br/></label>             
                                </div>
                                <div class="col-sm-9">
                                    <textarea name="title_sug" cols="60" rows="3"></textarea>
                                </div>                            

                                <div class="col-sm-3">
                                    <label class="control-label">Introduction : <br/></label>             
                                </div>
                                <div class="col-sm-9">
                                    <div class="radio i-checks"><label> <input type="radio" value="1" name="intro"> <i></i> Adequate and Relevant </label></div>
                                    <div class="radio i-checks"><label> <input type="radio" value="2" name="intro"> <i></i> Inadequate and/or irrelevant </label></div>
                                </div>                            
                                <div class="col-sm-3">
                                    <label class="control-label">Suggestions <br/></label>             
                                </div>
                                <div class="col-sm-9">
                                    <textarea name="intro_sug" cols="60" rows="3"></textarea>
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
                                                <td><div class="radio i-checks"> <input type="radio" required="" value="1" name="originality"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="2" name="originality"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="3" name="originality"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="4" name="originality"></div></td>                                            
                                            </tr>
                                            <tr>
                                                <td>Clarity</td>
                                                <td><div class="radio i-checks"> <input type="radio" required="" value="1" name="clarity"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="2" name="clarity"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="3" name="clarity"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="4" name="clarity"></div></td> 
                                            </tr>
                                            <tr>
                                                <td>Completeness of Data</td>
                                                <td><div class="radio i-checks"> <input type="radio" required="" value="1" name="completeness"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="2" name="completeness"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="3" name="completeness"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="4" name="completeness"></div></td> 
                                            </tr>
                                            <tr>
                                                <td>Interpretation</td>
                                                <td><div class="radio i-checks"> <input type="radio" required="" value="1" name="interpretation"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="2" name="interpretation"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="3" name="interpretation"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="3" name="interpretation"></div></td> 
                                            </tr>
                                            <tr>
                                                <td>Importance of the Field</td>
                                                <td><div class="radio i-checks"> <input type="radio" required="" value="1" name="importance"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="2" name="importance"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="3" name="importance"></div></td>
                                                <td><div class="radio i-checks"> <input type="radio" value="4" name="importance"></div></td> 
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label">Materials and Methods : <br/></label>             
                                </div>
                                <div class="col-sm-9">
                                    <div class="radio i-checks"><label> <input type="radio" value="1" name="materials"> <i></i> Acceptable </label></div>
                                    <div class="radio i-checks"><label> <input type="radio" value="2" name="materials"> <i></i> Need Modification </label></div>
                                </div> 
                                <div class="col-sm-3">
                                    <label class="control-label">Suggestions <br/></label>             
                                </div>
                                <div class="col-sm-9">
                                    <textarea name="materials_sug" cols="60" rows="3"></textarea>
                                </div>

                                <div class="col-sm-3">
                                    <label class="control-label">Result and Discussion : <br/></label>             
                                </div>
                                <div class="col-sm-9">
                                    <div class="radio i-checks"><label> <input type="radio" value="1" name="result"> <i></i> Acceptable </label></div>
                                    <div class="radio i-checks"><label> <input type="radio" value="2" name="result"> <i></i> Need Modification </label></div>
                                </div> 
                                <div class="col-sm-3">
                                    <label class="control-label">Suggestions <br/></label>             
                                </div>
                                <div class="col-sm-9">
                                    <textarea name="result_sug" cols="60" rows="3"></textarea>
                                </div>

                                <div class="col-sm-3" style="margin-top: 10px;">
                                    <label class="control-label">Decision : <br/></label>             
                                </div>
                                <div class="col-sm-9" style="margin-top: 10px;">
                                    <select class="form-control m-b" style="max-width: 500px" name="decision">
                                        <option value="1">Accepted</option>
                                        <option value="2">Accept with Miner corrections</option>
                                        <option value="3">Rejected</option>
                                    </select>
                                </div>

                                <div class="col-sm-3" style="margin-top: 10px;">
                                    <label class="control-label">Upload Review : <br/></label>             
                                </div>
                                <div class="col-sm-9">
                                    <input name="upload_file" required="" type="file" class="form-control" style="max-width: 500px;"/>
                                </div>

                                <div class="col-sm-3">

                                </div>
                                <div class="col-sm-9" style="margin-top: 20px;">
                                    <input name="submit" type="submit" class="btn btn-w-m btn-primary" />
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
                radioClass: 'iradio_square-green',
            });
        });
    </script>

</body>
</html>