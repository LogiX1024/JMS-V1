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
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Reviewers
                                    <small>Accept Reviewers to the system</small>
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
                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>E-Mail</th>
                                            <th style="width: 200px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($reviewer as $reviewer_data): ?>
                                            <tr>
                                                <td>
                                                    <?= $reviewer_data->first_name . " " . $reviewer_data->last_name ?></td>
                                                <td>
                                                    <?= ucfirst($reviewer_data->email_address) ?></td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-sm btn-default btn-outline view"
                                                                data-user-id="<?= $reviewer_data->id ?>"
                                                                data-user-type="<?= $reviewer_data->id ?>">View
                                                        </button>
                                                        <button class="btn btn-sm btn-success btn-outline accept"
                                                                data-user-id="<?= $reviewer_data->id ?>">Assign
                                                        </button>
                                                         
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Model Editor -->
    <?php
    $this->load->view('partial/modals/reviewer');
    ?>

    <div class="modal inmodal" id="modelAccept" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content animated fadeIn tada">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-user-plus modal-icon"></i>
                    <h4 id="cad-modal-title" class="modal-title">Accept Reviewer</h4>
                </div>
                <form action="<?php echo base_url('index.php/users/accept_reviewer') ?>" method="POST">
                    <input type="text" id="accept-user-id" name="id" value="" hidden="hidden" class="hidden"/>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <p class="text-center">Do you really want to accept the reviewer?</p>

                                <div class="form-group">
                                    <label class="text-center" for="password">Please enter your password to continue</label>
                                    <input id="delete-user-password" type="password" class="form-control" name="password"
                                           value=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="accept-user-accept" type="submit" class="btn btn-success">Accept</button>
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    
    <?php $this->load->view('partial/common_js'); ?>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>
    
     <!-- Data Tables -->
    <script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.tableTools.min.js"></script>


        <!-- Chosen -->
    <script src="<?php echo base_url('assets'); ?>/js/plugins/chosen/chosen.jquery.js"></script>

    <script>
        $(document).ready(function () {

            var config = {
                '.chosen-select': {},
                '.chosen-select-deselect': {allow_single_deselect: true},
                '.chosen-select-no-single': {disable_search_threshold: 10},
                '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
                '.chosen-select-width': {width: "95%"}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }


            $('.view').click(function (e) {
                e.preventDefault();
                var userId = $(this).data('user-id');
                //alert(userId); 
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "<?php echo base_url('/index.php/API/get_reviewer'); ?>/" + userId,
                    success: function (data) {
                        var expertise = "";
                        $('#reviewer-name-large').text(data.first_name + " " + data.last_name);
                        $('#reviewer-name').val(data.first_name + " " + data.last_name);
                        $('#reviewer-address1').val(data.address_1);
                        $('#reviewer-address2').val(data.address_2);
                        $('#reviewer-city').val(data.city);
                        $('#reviewer-postal-code').val(data.postal_code);
                        $('#reviewer-email-address').val(data.email_address);
                        $.each(data.expertise, function () {
                            expertise += this.expertise + ", ";
                        });
                        $('#reviewer-expertise').val(expertise);
                    }
               
                });

                var data = null;
                $('#modelReviewer').modal('show');
                //show_user_modal('invite_reviewer', data, 'reviewer');

            });
            $('.accept').click(function (e) {
                e.preventDefault();
                var userId = $(this).data('user-id');
                $('#accept-user-id').val(userId);
                $('#modelAccept').modal('show');
            });

            $('.reject').click(function (e) {
                e.preventDefault();
                var userId = $(this).data('user-id');
                $('#reject-user-id').val(userId);
                $('#modelReject').modal('show');
            });

            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "<?php echo base_url('assets'); ?>/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            var success = <?= 'true' ?>;

            toastr.options = {
                "closeButton": true,
                "progressBar": true
            };

            switch (success) {
                case 1:
                    toastr.success('Successfully Deleted');
                    break;
                case 2:
                    toastr.error('Wrong Password.');
                    break;
                case 3:
                    toastr.success('Successfully Updated');
                    break;
            }

        });
    </script>
     
</body>
</html>