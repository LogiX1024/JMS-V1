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

                    </h3>
                </div>
                <div class="ibox ibox-content">
                    <div id="error-div" class="row m-b-md">
                        <center>
                            <div class="col-sm-12 error"><span class="alert alert-danger text-center"></span></div>
                        </center>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-2"><h4>Select Journal</h4></div>

                        <div class="col-sm-4">
                            <select class="form-control m-b" id="journal" name="journal">
                                <option value="1">Journal 1</option>
                                <option value="1">Journal 2</option>
                                <option value="1">Journal 3</option>
                                <option value="1">Journal 4</option>
                            </select>
                        </div>
                    </div>
                    
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Article ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Feedback</th>
                                <th>Proofread</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><span class="pie">0.52,1.041</span></td>
                                <td>Samantha</td>
                                <td class="text-navy"> <i class="fa fa-level-up"></i> 40% </td>
                                <td>Samantha</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><span class="pie">226,134</span></td>
                                <td>Jacob</td>
                                <td class="text-warning"> <i class="fa fa-level-down"></i> -20% </td>
                                <td>Samantha</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><span class="pie">0.52/1.561</span></td>
                                <td>Damien</td>
                                <td class="text-navy"> <i class="fa fa-level-up"></i> 26% </td>
                                <td>Samantha</td>
                            </tr>
                        </tbody>
                    </table>


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