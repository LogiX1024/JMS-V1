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
        <?php $this->load->view('partial/reviewer_navigation'); ?>

        <div id="page-wrapper" class="gray-bg">

            <div class="row border-bottom">
                <?php $this->load->view('partial/top_bar'); ?>
            </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2><span class="fa fa-user"></span> Review Dashboard</h2>
                    <ol class="breadcrumb">
                        <li>
                            Reviewer
                        </li>
                        <li class="active">
                            <strong>Review Dashboard</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox-content">

                            <div class="panel-heading">
                                <!--<div class="panel-title m-b-md"><h4>Blank Panel with text tabs</h4></div>-->
                                <div class="panel-options">

                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#tab-1">All</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-2">Pending Reviews</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-3">Reviewed</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">

                                        <div class="media well">
                                            <div class="media-body">
                                                <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/one.jpg" class="media-object"></a>
                                                <div class="col-lg-8" >
                                                    <div class="ibox-content">
                                                        <h3 class="media-heading">
                                                            Seeking efficacy in L-asparaginase to combat acute lymphoblastic leukemia (ALL): A review
                                                        </h3> 

                                                        <span>Author : </span><br/>
                                                        <span>Sub Authors : </span><br/>
                                                        <span>Keywords : </span><br/>

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 pull-right">
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-danger pull-right">Pending Review</button></a>
                                                    <button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Due Date : 10/12/2015</button>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Download as PDF</button></a>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Upload Review</button></a>
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="media well">
                                            <div class="media-body">
                                                <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/one.jpg" class="media-object"></a>
                                                <div class="col-lg-8" >
                                                    <div class="ibox-content">
                                                        <h3 class="media-heading">
                                                            Seeking efficacy in L-asparaginase to combat acute lymphoblastic leukemia (ALL): A review
                                                        </h3> 

                                                        <span>Author : </span><br/>
                                                        <span>Sub Authors : </span><br/>
                                                        <span>Keywords : </span><br/>

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 pull-right">
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-danger pull-right">Pending Review</button></a>
                                                    <button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Due Date : 10/12/2015</button>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Download as PDF</button></a>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Upload Review</button></a>
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="media well">
                                            <div class="media-body">
                                                <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/one.jpg" class="media-object"></a>
                                                <div class="col-lg-8" >
                                                    <div class="ibox-content">
                                                        <h3 class="media-heading">
                                                            Seeking efficacy in L-asparaginase to combat acute lymphoblastic leukemia (ALL): A review
                                                        </h3> 

                                                        <span>Author : </span><br/>
                                                        <span>Sub Authors : </span><br/>
                                                        <span>Keywords : </span><br/>

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 pull-right">
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-danger pull-right">Pending Review</button></a>
                                                    <button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Due Date : 10/12/2015</button>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Download as PDF</button></a>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Upload Review</button></a>
                                                </div>
                                            </div>
                                        </div> 


                                    </div>

                                    <div id="tab-2" class="tab-pane">

                                        <div class="media well">
                                            <div class="media-body">
                                                <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/two.jpg" class="media-object"></a>
                                                <div class="col-lg-8" >
                                                    <div class="ibox-content">
                                                        <h3 class="media-heading">
                                                            Seeking efficacy in L-asparaginase to combat acute lymphoblastic leukemia (ALL): A review
                                                        </h3> 

                                                        <span>Author : </span><br/>
                                                        <span>Sub Authors : </span><br/>
                                                        <span>Keywords : </span><br/>

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 pull-right">
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-danger pull-right">Pending Review</button></a>
                                                    <button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Due Date : 10/12/2015</button>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Download as PDF</button></a>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Upload Review</button></a>
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="media well">
                                            <div class="media-body">
                                                <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/two.jpg" class="media-object"></a>
                                                <div class="col-lg-8" >
                                                    <div class="ibox-content">
                                                        <h3 class="media-heading">
                                                            Seeking efficacy in L-asparaginase to combat acute lymphoblastic leukemia (ALL): A review
                                                        </h3> 

                                                        <span>Author : </span><br/>
                                                        <span>Sub Authors : </span><br/>
                                                        <span>Keywords : </span><br/>

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 pull-right">
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-danger pull-right">Pending Review</button></a>
                                                    <button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Due Date : 10/12/2015</button>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Download as PDF</button></a>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Upload Review</button></a>
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="media well">
                                            <div class="media-body">
                                                <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/two.jpg" class="media-object"></a>
                                                <div class="col-lg-8" >
                                                    <div class="ibox-content">
                                                        <h3 class="media-heading">
                                                            Seeking efficacy in L-asparaginase to combat acute lymphoblastic leukemia (ALL): A review
                                                        </h3> 

                                                        <span>Author : </span><br/>
                                                        <span>Sub Authors : </span><br/>
                                                        <span>Keywords : </span><br/>

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 pull-right">
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-danger pull-right">Pending Review</button></a>
                                                    <button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Due Date : 10/12/2015</button>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Download as PDF</button></a>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Upload Review</button></a>
                                                </div>
                                            </div>
                                        </div> 

                                    </div>
                                    <div id="tab-3" class="tab-pane">

                                         <div class="media well">
                                            <div class="media-body">
                                                <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/five.jpg" class="media-object"></a>
                                                <div class="col-lg-8" >
                                                    <div class="ibox-content">
                                                        <h3 class="media-heading">
                                                            Seeking efficacy in L-asparaginase to combat acute lymphoblastic leukemia (ALL): A review
                                                        </h3> 

                                                        <span>Author : </span><br/>
                                                        <span>Sub Authors : </span><br/>
                                                        <span>Keywords : </span><br/>

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 pull-right">
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-danger pull-right">Pending Review</button></a>
                                                    <button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Due Date : 10/12/2015</button>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Download as PDF</button></a>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Upload Review</button></a>
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="media well">
                                            <div class="media-body">
                                                <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/five.jpg" class="media-object"></a>
                                                <div class="col-lg-8" >
                                                    <div class="ibox-content">
                                                        <h3 class="media-heading">
                                                            Seeking efficacy in L-asparaginase to combat acute lymphoblastic leukemia (ALL): A review
                                                        </h3> 

                                                        <span>Author : </span><br/>
                                                        <span>Sub Authors : </span><br/>
                                                        <span>Keywords : </span><br/>

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 pull-right">
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-danger pull-right">Pending Review</button></a>
                                                    <button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Due Date : 10/12/2015</button>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Download as PDF</button></a>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Upload Review</button></a>
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="media well">
                                            <div class="media-body">
                                                <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/fivejpg" class="media-object"></a>
                                                <div class="col-lg-8" >
                                                    <div class="ibox-content">
                                                        <h3 class="media-heading">
                                                            Seeking efficacy in L-asparaginase to combat acute lymphoblastic leukemia (ALL): A review
                                                        </h3> 

                                                        <span>Author : </span><br/>
                                                        <span>Sub Authors : </span><br/>
                                                        <span>Keywords : </span><br/>

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 pull-right">
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-danger pull-right">Pending Review</button></a>
                                                    <button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Due Date : 10/12/2015</button>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Download as PDF</button></a>
                                                    <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px;color: #000" class="btn btn-w-m btn-default pull-right">Upload Review</button></a>
                                                </div>
                                            </div>
                                        </div> 

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