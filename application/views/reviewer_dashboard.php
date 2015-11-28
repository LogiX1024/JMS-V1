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
                                    <li class="active"><a data-toggle="tab" href="#all">All</a></li>
                                    <li class=""><a data-toggle="tab" href="#pending">Pending Reviews</a></li>
                                    <li class=""><a data-toggle="tab" href="#reviewed">Reviewed</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="all" class="tab-pane active">
                                    <?php
                                    foreach ($assigned_articles as $article):
                                        ?>



                                        <div class="media well">
                                            <div class="media-body">
                                                <div class="col-lg-10">

                                                    <h3 class="media-heading">
                                                        <?= $article->title ?>
                                                    </h3>

                                                    <span>Journal: <?= $article->name ?></span><br/>
                                                    <span>Keywords: </span><br/>
                                                    <span>Assigned on: <?= $article->assigned_date ?></span><br/>
                                                    <span class="text-primary font-bold">Due on: 4-12-2015 (06 Days Remaining)</span>


                                                </div>
                                                <div class="col-lg-2">
                                                    <a href="<?= base_url('index.php/Download/blindcopy/' . $article->id) ?>"
                                                       target="_blank">
                                                    <button style="width: 100%" class="btn btn-primary"><span
                                                            class="glyphicon glyphicon-download"></span> Download
                                                    </button>
                                                    </a>
                                                    <button style="margin-top: 5px;width: 100%" class="btn btn-info">
                                                        <span class="glyphicon glyphicon-plus-sign"></span> Review
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    endforeach

                                    ?>
                                </div>

                                <div id="pending" class="tab-pane">


                                </div>
                                <div id="reviewed" class="tab-pane">


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