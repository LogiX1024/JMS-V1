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

<link href="<?php echo base_url('assets'); ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/animate.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/style.css" rel="stylesheet">

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
//                                echo $success;
                        }
                        ?>

                        <div class="ibox-content">
                            <div class="row">
                                <form name="create_jurnal" method="post" enctype="multipart/form-data" id="add_cad_user"
                                      class="form-horizontal"
                                      action="<?= base_url('/index.php/articles/submit_article') ?>">

                                    <div class="col-lg-8 col-md-8">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Title</label>

                                            <div class="col-sm-9">
                                                <input name="title" required="" type="text" class="form-control"
                                                       placeholder="Title">
                                                <input name="journal_id" type="hidden" class="form-control"
                                                       value="4562">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Chief Author</label>
                                            <!--<input name="chief_author" required="" type="text" readonly="readonly" class="form-control" placeholder="chief_author">-->
                                            <!--<div class="col-sm-12 ">-->
                                            <!--<span class="input-group-btn">  <button class="btn btn-primary pull-right" type="submit">Edit</button></span>-->
                                            <!--</div>-->
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="chief_author"
                                                       readonly="readonly"
                                                       value="<?= $user->first_name . " " . $user->last_name ?>">
                                                <!--                                                    <div class="input-group">-->
                                                <!--                                                        <span class="input-group-btn">-->
                                                <!--                                                            <button type="button" class="btn btn-primary">Change</button>-->
                                                <!--                                                        </span>-->
                                                <!--                                                    </div>-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Sub Authors </label>

                                            <div class="col-sm-9">
                                                <button type="button" class="btn btn-white" data-toggle="modal"
                                                        data-target="#myModal">
                                                    Add Sub Author <span class="fa fa-plus"></span>
                                                </button>
                                                <table id="people" border="0" class="table table-striped table-hover ">
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                                <?php 
                                                $journal_id = $this->session->userdata('journal_id');
                                                ?>
                                                                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Journal</label>
                                                <div class="col-sm-9">
                                                    <select name="journal_id" id="journals"
                                                            class="chosen-select form-control">
                                                                <?php
                                                                foreach ($journals as $journal):


                                                                    if (isset($journal_id) && $journal_id == $journal->id) {
                                                                        ?>
                                                                <option selected=""
                                                                        value="<?= $journal->id ?>"><?= $journal->name ?></option>
                                                                        <?php } else {
                                                                        ?>
                                                                <option 
                                                                    value="<?= $journal->id ?>"><?= $journal->name ?></option>
                                                                    <?php
                                                                }
                                                                ?>


    <?php
endforeach;
?>
                                                    </select>
                                                </div>
                                            </div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Keywords</label>

                                            <div class="col-sm-9">
                                                <input name="keywords" required="" type="text" class="form-control"
                                                       placeholder="Keywords">
                                                * Separated by commas
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Upload File</label>

                                            <div class="col-sm-9">
                                                <input name="upload_file" required="" type="file" class="form-control"
                                                       placeholder="Upload">
                                                * Upload Document files only
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Suggest Reviewers</label>

                                            <div class="col-sm-9">
                                                <button type="button" class="btn btn-white" data-toggle="modal"
                                                        data-target="#suggestReviewerModal">
                                                    Add Suggested Reviewers <span class="fa fa-plus"></span>
                                                </button>
                                            </div>
                                        </div>

                                        <input type="text" name="suggestedReviewer1fname" id="suggestedReviewer1fname"
                                               hidden/>
                                        <input type="text" name="suggestedReviewer1lname" id="suggestedReviewer1lname"
                                               hidden/>
                                        <input type="text" name="suggestedReviewer1affiliation"
                                               id="suggestedReviewer1affiliation" hidden/>
                                        <input type="text" name="suggestedReviewer1email" id="suggestedReviewer1email"
                                               hidden/>
                                        <input type="text" name="suggestedReviewer2fname" id="suggestedReviewer2fname"
                                               hidden/>
                                        <input type="text" name="suggestedReviewer2lname" id="suggestedReviewer2lname"
                                               hidden/>
                                        <input type="text" name="suggestedReviewer2affiliation"
                                               id="suggestedReviewer2affiliation" hidden/>
                                        <input type="text" name="suggestedReviewer2email" id="suggestedReviewer2email"
                                               hidden/>
                                        <input type="text" name="suggestedReviewer3fname" id="suggestedReviewer3fname"
                                               hidden/>
                                        <input type="text" name="suggestedReviewer3lname" id="suggestedReviewer3lname"
                                               hidden/>
                                        <input type="text" name="suggestedReviewer3affiliation"
                                               id="suggestedReviewer3affiliation" hidden/>
                                        <input type="text" name="suggestedReviewer3email" id="suggestedReviewer3email"
                                               hidden/>

                                        <div class="form-group">
                                            <div class="col-sm-11 ">
                                                <button class="btn btn-primary pull-right" type="submit">Submit <span
                                                        class="fa fa-upload"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="col-sm-4">
                                    <div>
                                        <label>Downloads</label>
                                    </div>
                                    <div>
                                        <a href="<?php echo base_url(); ?>./handouts/PaperFormat_RUSL_E-JOURNAL.doc"
                                           target="_blank" class="btn btn-primary">Paper Format</a>
                                    </div>
                                    <div>
                                        <a href="<?php echo base_url(); ?>./handouts/Guideline - RUSL_E-JOURNAL.doc"
                                           target="_blank" class="btn btn-primary">Guideline</a>
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
<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <i class="fa fa-book modal-icon fa-2x"></i>
                <h4 class="modal-title">Add Sub Author</h4>
                <small class="font-bold">Add Sub Authors to the paper.</small>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label>First name: </label>
                    <input name="fname" id="fname" placeholder="Enter First Name" class="form-control">
                </div>
                <div class="form-group"><label>Last Name:</label>
                    <input name="lname" id="lname" placeholder="Enter Last Name" class="form-control">
                </div>
                <div class="form-group"><label>Affiliation:</label>
                    <input name="affiliation" id="affiliation" placeholder="Enter Affiliation" class="form-control">
                </div>
                <div class="form-group"><label>Email:</label>
                    <input name="email" id="email" placeholder="Enter Email" class="form-control">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary " id="addsubauthor">Add</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="suggestReviewerModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <i class="fa fa-book modal-icon fa-2x"></i>
                <h4 class="modal-title">Suggest Reviewers</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-4">
                        <H3>Reviewer 1</H3>

                        <div class="form-group">
                            <label>First name: </label>
                            <input name="fname" id="fname1" placeholder="Enter First Name" class="form-control">
                        </div>
                        <div class="form-group"><label>Last Name:</label>
                            <input name="lname" id="lname1" placeholder="Enter Last Name" class="form-control">
                        </div>
                        <div class="form-group"><label>Affiliation:</label>
                            <input name="affiliation" id="affiliation1" placeholder="Enter Affiliation"
                                   class="form-control">
                        </div>
                        <div class="form-group"><label>Email:</label>
                            <input name="email" id="email1" placeholder="Enter Email" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <H3>Reviewer 2</H3>

                        <div class="form-group">
                            <label>First name: </label>
                            <input name="fname" id="fname2" placeholder="Enter First Name" class="form-control">
                        </div>
                        <div class="form-group"><label>Last Name:</label>
                            <input name="lname" id="lname2" placeholder="Enter Last Name" class="form-control">
                        </div>
                        <div class="form-group"><label>Affiliation:</label>
                            <input name="affiliation" id="affiliation2" placeholder="Enter Affiliation"
                                   class="form-control">
                        </div>
                        <div class="form-group"><label>Email:</label>
                            <input name="email" id="email2" placeholder="Enter Email" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <H3>Reviewer 3</H3>

                        <div class="form-group">
                            <label>First name: </label>
                            <input name="fname" id="fname3" placeholder="Enter First Name" class="form-control">
                        </div>
                        <div class="form-group"><label>Last Name:</label>
                            <input name="lname" id="lname3" placeholder="Enter Last Name" class="form-control">
                        </div>
                        <div class="form-group"><label>Affiliation:</label>
                            <input name="affiliation" id="affiliation3" placeholder="Enter Affiliation"
                                   class="form-control">
                        </div>
                        <div class="form-group"><label>Email:</label>
                            <input name="email" id="email3" placeholder="Enter Email" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary " id="ok">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('partial/common_js'); ?>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>

<script>
    $(document).ready(function () {

        $('#addsubauthor').click(function (e) {
            e.preventDefault();
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var affiliation = $('#affiliation').val();
            var email = $('#email').val();

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url('/index.php/API/add_sub_author'); ?>",
                data: {fname: fname, lname: lname, affiliation: affiliation, email: email},
                success: function (data) {
                    update_table(data);
                    $('#fname').val("");
                    $('#lname').val("");
                    $('#affiliation').val("");
                    $('#email').val("");
                }
            });
            $('#myModal').modal('hide');
        });

        $('#ok').click(function () {
            $('#suggestedReviewer1fname').val($('#fname1').val());
            $('#suggestedReviewer1lname').val($('#lname1').val());
            $('#suggestedReviewer1affiliation').val($('#affiliation1').val());
            $('#suggestedReviewer1email').val($('#email1').val());
            $('#suggestedReviewer2fname').val($('#fname2').val());
            $('#suggestedReviewer2lname').val($('#lname2').val());
            $('#suggestedReviewer2affiliation').val($('#affiliation2').val());
            $('#suggestedReviewer2email').val($('#email2').val());
            $('#suggestedReviewer3fname').val($('#fname3').val());
            $('#suggestedReviewer3lname').val($('#lname3').val());
            $('#suggestedReviewer3affiliation').val($('#affiliation3').val());
            $('#suggestedReviewer3email').val($('#email3').val());

            $('#suggestReviewerModal').modal('hide');

        });


//        Delete button trigger
        $(".form-group").on("click", ".remove", function (e) {
            var key_index = $(this).data('key-index');
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url('/index.php/API/remove_sub_author'); ?>/" + key_index,
                success: function (data) {
                    update_table(data);
                }
            });
        });

        var update_table = function (data) {
            var peopleHTML = "";
            var index = 0;
            for (var key in data) {
                if (data.hasOwnProperty(key)) {
                    peopleHTML += "<tr>";
                    peopleHTML += "<td>" + data[key]["firstname"] + "</td>";
                    peopleHTML += "<td>" + data[key]["lastname"] + "</td>";
                    peopleHTML += "<td><center><button type='button' class='remove btn btn-danger btn-sm' data-key-index='" + key + "'><span class='fa fa-minus-circle'></span></button></center></td>";
                    peopleHTML += "</tr>";
                    index++;
                }
            }
            $("#people tbody").html(peopleHTML);
        }
    });
</script>

</body>
</html>
