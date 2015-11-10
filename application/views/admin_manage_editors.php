<!-- 
go to index.php/test/test2/admin_manage_editors to view this page
go to index.php/users/new_editor to view this page
Data needed to this view.
user => { Object containing the name, title. gender, role, profile_picture_URL} of the logged in user
users => set of registered editors {role= editor deleted = 0 banned = 0} {name, id and email address }
functions in the controller
get_single_user() should accept id of the user as POST request and return a JSON array of data about the user {first name, last name, title, mobile no, address1, address2, city, postal code, country, email, aand id}
delete_user() should accept the id of the user to be deleted and password of the logged in user as POST. then verify the passwod. then set the value deleted of the user to 1
add_editor() inserts an editor account, with a random generated p/w from random_string('alnum',8) method. email the password and login details to the newly created user.
!-->

<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

<link href="<?php echo base_url('assets'); ?>/css/plugins/chosen/chosen.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <!--    --><?php //$this->load->view('partial/admin_navigation', array('user' => $user, 'position' => $position)); ?>
    <?php $this->load->view('partial/admin_navigation'); ?>
    <?php // $this->load->view('partial/chefEditor_navigation'); ?>
    <?php // $this->load->view('partial/editor_navigation'); ?>
    <?php // $this->load->view('partial/author_navigation'); ?>
    <?php // $this->load->view('partial/reviewer_navigation'); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

            <?php $this->load->view('partial/top_bar'); ?>

        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2><span class="fa fa-user"></span> Manage Editors</h2>
                <ol class="breadcrumb">
                    <li>
                        Users
                    </li>
                    <li class="active">
                        <strong>Manage Editors</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title"> 
                            <h5>Add Editors
                                <small>Add Editors to the system</small>
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
                            <form method="post" id="add_cad_user" class="form-horizontal"
                                  action="<?= base_url('/index.php/users/add_editor') ?>">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" >First Name</label>

                                            <div class="col-sm-9">
                                                <input name="first_name" required="" type="text" class="form-control"
                                                       placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">E-Mail Address</label>

                                            <div class="col-sm-9">
                                                <input name="email" required="" type="email" class="form-control"
                                                       placeholder="E-Mail Address">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Last Name</label>

                                            <div class="col-sm-9">
                                                <input name="last_name" required="" type="text" class="form-control"
                                                       placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Add to Journals</label>

                                            <div class="col-sm-9">
                                                <select name="journals[]" id="journals"
                                                        class="chosen-select form-control" multiple>
                                                    <option value="1">2015 Applied Journal</option>
                                                    <option value="2">Biodiversity & Conservation Conference</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 ">
                                        <button class="btn btn-primary pull-right" type="submit">Add <span class="fa fa-plus"></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Manage Editors
                                <small>Manage Registered Editors on the system</small>
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
                                    <th style="width: 150px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>First Name Last Name</td>
                                    <td>someone@example.com</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-sm btn-default btn-outline view" data-user-id="1">
                                                View
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-outline delete" data-user-id="1">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                 <?php  foreach ($users as $user): ?>
                                 <tr> 
                                 <td> 
                                <?= $user->first_name . " " . $user->last_name ?> </td> 
                                 <td><?= $user->email_address?></td> 
                                 <td class="text-center"> 
                                 <div class="btn-group btn-group-sm"> 
                                 <button class="btn btn-sm btn-default btn-outline view" data-user-id="<?= $user->id ?>">View </button> 
                                 <button class="btn btn-sm btn-danger delete" data-user-id="<?= $user->id ?>">Delete </button> 
                                 </div> 
                                 </td> 
                                 </tr> 
                                 <?php  endforeach; ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php $this->load->view('partial/footer'); ?>
        </div>

    </div>
</div>

<!-- Model Editor -->
<?php
$this->load->view('partial/modals/editor');
?>

<div class="modal inmodal" id="modelDelete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated fadeIn tada">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user-times modal-icon"></i>
                <h4 id="cad-modal-title" class="modal-title">Delete User</h4>
            </div>
            <form action="<?php echo base_url('users/delete_user') ?>" method="POST">
                <input type="text" id="delete-user-id" name="id" value="" hidden="hidden" class="hidden"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <p class="text-danger text-center">Do you really want to delete the user?<br/>This cannot be
                                reversed.</p>

                            <div class="form-group">
                                <label class="text-center" for="password">Please enter your password to continue</label>
                                <input id="delete-user-password" type="password" class="form-control" name="password"
                                       value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="delete-user-delete" type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Mainly scripts -->
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

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url('/index.php/users/get_single_user/'); ?>",
                data: {
                    user_id: userId
                }, success: function (data) {
                    show_user_modal('admin_manage_users', data, 'editor');
                }
            });
            var data = null;
            show_user_modal('admin_manage_users', data, 'editor');

        });
        $('.delete').click(function (e) {
            e.preventDefault();
            var userId = $(this).data('user-id');
            $('#delete-user-id').val(userId);
            $('#modelDelete').modal('show');
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
