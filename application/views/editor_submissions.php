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


<link href="<?php echo base_url('assets'); ?>/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

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
                        <strong>Submissions</strong>
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
                <div class="col-lg-12">
                    <div class="ibox-content">

                        <div class="panel-heading">
                            <!--<div class="panel-title m-b-md"><h4>Blank Panel with text tabs</h4></div>-->
                            <div class="panel-options">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1">All</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2">Manuscripts</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-3">Reviewed</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-4">Pending Reviews</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-5">Camera Ready Submitted</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <!--                                All Articles Tab-->
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <?php foreach ($articles as $article_data): ?>

                                        <div class="media well">
                                            <div class="media-body">
                                                <div class="col-lg-8">
                                                    <div class="ibox-content">
                                                        <h3 class="media-heading">
                                                            <?= $article_data->title ?>
                                                        </h3>
                                                        <?php
                                                        /**
                                                         * sub_authors() and keywords() helper functions are available in the helper class 'arraystring_helper'
                                                         */
                                                        ?>
                                                        <span>Status : <?= ucfirst($article_data->status) ?> </span><br/>
                                                        <span>Sub Authors : <?= sub_authors($article_data->sub_authors) ?> </span><br/>
                                                        <span>Keywords : <?= keywords($article_data->keyword) ?> </span><br/>
                                                    </div>
                                                </div>
                                                <?php
                                                if ($article_data->status == "published"):
                                                    ?>
                                                    <div class="col-lg-2 pull-right">
                                                        <a href="<?php echo base_url(); ?>./uploads/FreshCopy/<?= $article_data->id . '.docx' ?>"
                                                           target="_blank">
                                                            <button type="button" style="margin-bottom: 10px"
                                                                    class="btn btn-w-m btn-default pull-right">Download
                                                            </button>
                                                        </a>
                                                        <a href="downloads/3282E2E55115.pdf" target="_blank">
                                                            <button type="button" style="margin-bottom: 10px"
                                                                    class="btn btn-w-m btn-default pull-right">View in
                                                                Journal
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <?php
                                                endif;
                                                if ($article_data->status == "reviewed"):
                                                    ?>
                                                    <div class="col-lg-2 pull-right">
                                                        <a href="<?php echo base_url(); ?>./uploads/FreshCopy/<?= $article_data->id . '.docx' ?>"
                                                           target="_blank">
                                                            <button type="button" style="margin-bottom: 10px"
                                                                    class="btn btn-w-m btn-default pull-right">Download
                                                            </button>
                                                        </a>
                                                        <!--                                                        <a href="" target="_blank">-->
                                                        <button data-article-id="<?= $article_data->id ?>" type="button"
                                                                style="margin-bottom: 10px"
                                                                class="btn btn-w-m btn-default pull-right view_review">
                                                            View Review
                                                        </button>
                                                        <!--                                                        </a>-->

                                                        <button data-article-id="<?= $article_data->id ?>"
                                                                type="button" style="margin-bottom: 10px"
                                                                class="btn btn-w-m btn-default pull-right requestCR">
                                                            Request for Camera Ready
                                                        </button>

                                                    </div>
                                                    <?php
                                                endif;
                                                if ($article_data->status == "assigned" || $article_data->status == "pending"):
                                                    ?>
                                                    <div class="col-lg-2 pull-right">
                                                        <a href="<?php echo base_url(); ?>./uploads/FreshCopy/<?= $article_data->id . '.docx' ?>"
                                                           target="_blank">
                                                            <button type="button" style="margin-bottom: 10px"
                                                                    class="btn btn-w-m btn-default pull-right">Download
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <?php
                                                endif;
                                                if ($article_data->status == "draft"):
                                                    ?>
                                                    <div class="col-lg-2 pull-right">
                                                        <a href="<?php echo base_url(); ?>./uploads/FreshCopy/<?= $article_data->id . '.docx' ?>"
                                                           target="_blank">
                                                            <button type="button" style="margin-bottom: 10px"
                                                                    class="btn btn-w-m btn-default pull-right">Download
                                                            </button>
                                                        </a>
                                                        <button type="button" style="margin-bottom: 10px"
                                                                data-article-id="<?= $article_data->id ?>"
                                                                class="btn btn-w-m btn-default pull-right newVersion">
                                                            Upload New Version
                                                        </button>
                                                    </div>
                                                    <?php
                                                endif;
                                                ?>

                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <!--                                Published Articles-->
                                <div id="tab-2" class="tab-pane">

                                    <?php foreach ($articles as $article_data): ?>
                                        <?php if ($article_data->status == "published") { ?>
                                            <div class="media well">
                                                <div class="media-body">
                                                    <div class="col-lg-8">
                                                        <div class="ibox-content">
                                                            <h3 class="media-heading">
                                                                <?= $article_data->title ?>
                                                            </h3>

                                                            <span>Sub Authors : <?= sub_authors($article_data->sub_authors) ?> </span><br/>
                                                            <span>Keywords : <?= keywords($article_data->keyword) ?> </span><br/>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 pull-right">
                                                        <a href="<?php echo base_url(); ?>./uploads/FreshCopy/<?= $article_data->id . '.docx' ?>"
                                                           target="_blank">
                                                            <button type="button" style="margin-bottom: 10px"
                                                                    class="btn btn-w-m btn-default pull-right">Download
                                                            </button>
                                                        </a>
                                                        <a href="downloads/3282E2E55115.pdf" target="_blank">
                                                            <button type="button" style="margin-bottom: 10px"
                                                                    class="btn btn-w-m btn-default pull-right">View in
                                                                Journal
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    endforeach; ?>
                                </div>
                                <!--                                Reviewed Articles-->
                                <div id="tab-3" class="tab-pane">
                                    <?php foreach ($articles as $article_data): ?>
                                        <?php if ($article_data->status == "reviewed") { ?>
                                            <div class="media well">
                                                <div class="media-body">
                                                    <div class="col-lg-8">
                                                        <div class="ibox-content">
                                                            <h3 class="media-heading">
                                                                <?= $article_data->title ?>
                                                            </h3>
                                                            <span>Sub Authors : <?= sub_authors($article_data->sub_authors) ?> </span><br/>
                                                            <span>Keywords : <?= keywords($article_data->keyword) ?> </span><br/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 pull-right">
                                                        <a href="<?php echo base_url(); ?>./uploads/FreshCopy/<?= $article_data->id . '.docx' ?>"
                                                           target="_blank">
                                                            <button type="button" style="margin-bottom: 10px"
                                                                    class="btn btn-w-m btn-default pull-right">Download
                                                            </button>
                                                        </a>
                                                        <!--                                                        <a href="" target="_blank">-->
                                                        <button data-article-id="<?= $article_data->id ?>" type="button"
                                                                style="margin-bottom: 10px"
                                                                class="btn btn-w-m btn-default pull-right view_review">
                                                            View Review
                                                        </button>
                                                        <!--                                                        </a>-->
                                                        <a href="" target="_blank">
                                                            <button type="button" style="margin-bottom: 10px"
                                                                    class="btn btn-w-m btn-default pull-right">Submit
                                                                for Camera Ready
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    endforeach; ?>
                                </div>
                                <!--                                Assigned or Pending Articles-->
                                <div id="tab-4" class="tab-pane">
                                    <?php foreach ($articles as $article_data): ?>
                                        <?php if ($article_data->status == "assigned" || $article_data->status == "pending") { ?>
                                            <div class="media well">
                                                <div class="media-body">
                                                    <div class="col-lg-8">
                                                        <div class="ibox-content">
                                                            <h3 class="media-heading">
                                                                <?= $article_data->title ?>
                                                            </h3>

                                                            <span>Sub Authors : <?= sub_authors($article_data->sub_authors) ?> </span><br/>
                                                            <span>Keywords : <?= keywords($article_data->keyword) ?> </span><br/>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 pull-right">
                                                        <a href="<?php echo base_url(); ?>./uploads/FreshCopy/<?= $article_data->id . '.docx' ?>"
                                                           target="_blank">
                                                            <button type="button" style="margin-bottom: 10px"
                                                                    class="btn btn-w-m btn-default pull-right">Download
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    endforeach; ?>
                                </div>
                                <div id="tab-5" class="tab-pane">
                                    <?php foreach ($articles as $article_data): ?>
                                        <?php if ($article_data->status == "draft") { ?>
                                            <div class="media well">
                                                <div class="media-body">
                                                    <div class="col-lg-8">
                                                        <div class="ibox-content">
                                                            <h3 class="media-heading">
                                                                <?= $article_data->title ?>
                                                            </h3>

                                                            <span>Sub Authors : <?= sub_authors($article_data->sub_authors) ?> </span><br/>
                                                            <span>Keywords : <?= keywords($article_data->keyword) ?> </span><br/>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 pull-right">
                                                        <a href="<?php echo base_url(); ?>./uploads/FreshCopy/<?= $article_data->id . '.docx' ?>"
                                                           target="_blank">
                                                            <button type="button" style="margin-bottom: 10px"
                                                                    class="btn btn-w-m btn-default pull-right">Download
                                                            </button>
                                                        </a>
                                                        <button type="button" style="margin-bottom: 10px"
                                                                data-article-id="<?= $article_data->id ?>"
                                                                class="btn btn-w-m btn-default pull-right newVersion">
                                                            Upload New Version
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php }
                                    endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal inmodal" id="viewReviews" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <i class="fa fa-pencil modal-icon fa-2x"></i>
                <h4 class="modal-title">View Reviews</h4>

            </div>
            <div class="modal-body">

                <center>
                    <div class="btn-group">
                        <a href="<?= base_url('/index.php/') ?>" id="review-btn-1"
                           class="btn btn-default" target="_blank">Review 1</a>
                        <a href="<?= base_url('/index.php/') ?>" id="review-btn-2"
                           class="btn btn-default" target="_blank">Review 2</a>
                        <a href="<?= base_url('/index.php/') ?>" id="review-btn-3"
                           class="btn btn-default" target="_blank">Review 3</a>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="requestCameraReadyModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <i class="fa fa-camera modal-icon fa-2x"></i>
                <h4 class="modal-title">Request Camera Ready</h4>

            </div>
            <form action="<?= base_url('index.php/articles/request_camera_ready/') ?>" method="post">
                <div class="modal-body">
                    <input type="text" name="article_id" id="article_id" hidden/>

                    <div class="form-group">
                        <label for="CRnote">Note for the author:</label>

                        <div class="summernote">
                        </div>

                        <textarea name="CRNote" id="CRnote" hidden></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input style="margin-left: 20px" id="submit" type="submit" class="btn btn-primary pull-right"
                           value="Request"/>
                    <button data-dismiss="modal" type="button" class="btn btn-white pull-right">Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $this->load->view('partial/common_js'); ?>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>

<!-- SUMMERNOTE -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/summernote/summernote.min.js"></script>

<script>
    $(document).ready(function () {

        $('.summernote').summernote();

        $('#submit').click(function () {
            $('#CRnote').val($('.summernote').code());
        });


        $('.view_review').click(function (e) {
            var BASE_URL = "<?= base_url('/index.php/reviews/view/') ?>/";
            var article_id = $(this).data('article-id');
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url('/index.php/API/get_reviews'); ?>/" + article_id,
                success: function (data) {
                    $('#review-btn-1').attr("href", BASE_URL + data[0]['review_id']);
                    $('#review-btn-2').attr("href", BASE_URL + data[1]['review_id']);
                    $('#review-btn-3').attr("href", BASE_URL + data[2]['review_id']);
                }
            });
            $('#viewReviews').modal('show');
        });

        $('.requestCR').click(function () {
            var article_id = $(this).data('article-id');
            $('#article_id').val(article_id);
            $('#requestCameraReadyModal').modal('show');

        });
    });
</script>

</body>
</html>