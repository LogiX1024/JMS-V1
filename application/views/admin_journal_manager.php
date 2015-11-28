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

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

            <?php $this->load->view('partial/top_bar'); ?>

        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2><span class="fa fa-user"></span> Journal Manager</h2>
                <ol class="breadcrumb">
                    <li>
                        Administrator
                    </li>
                    <li class="active">
                        <strong>Journal Manager</strong>
                    </li>
                </ol>
            </div>
        </div>

        <?php
        if (isset($success_creating) && ($success_creating == TRUE)):
            ?>
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                Journal created successfully.</a>.
            </div>
        <?php
        endif;
        ?>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Manage Journals
                                <small>Manage Journals on the system</small>
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
                                    <th>Issue</th>
                                    <th>Volume</th>
                                    <th style="width: 150px">Status</th>
                                    <th style="width: 150px">Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($journals as $journal): ?>
                                    <tr>
                                        <td><?= $journal->name ?> </td>
                                        <td><?= $journal->issue ?> </td>
                                        <td><?= $journal->volume ?></td>
                                        <td><?= $journal->status ?></td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-sm btn-default btn-outline view"
                                                        data-journal-id="<?= $journal->id ?>">View
                                                </button>
                                                <a href="<?php echo base_url() ?>index.php/Journal/edit_journal/<?= $journal->id ?>">
                                                    <button class="btn btn-sm btn-info"
                                                            data-journal-id="<?= $journal->id ?>">Edit
                                                    </button>
                                                </a>
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
        <div class="footer">
            <?php $this->load->view('partial/footer'); ?>
        </div>

    </div>
</div>

<!-- Model Editor -->
<?php
$this->load->view('partial/modals/journal');
?>



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
        };
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }


        $('.view').click(function (e) {
            e.preventDefault();
            var journalID = $(this).data('journal-id');

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url('/index.php/API/get_journal'); ?>/" + journalID,
                success: function (data) {
                    //alert(data.first_name);
                    $('#journal-name').text(data.id);
                    $('#journal-name-small').text("Volume: " + data.volume + " Issue: " + data.issue);
                    $('#created_on').val(data.started_date);
                    $('#url').text("<?=base_url()?>index.php/submit_paper?journal=" + data.id);
                    $('#chief-editor').val(data.first_name + " " +data.last_name);
                }
            });
            var data = null;
            $('#modelJournal').modal('show');

        });

        $('.dataTables-example').dataTable({
            responsive: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "<?php echo base_url('assets'); ?>/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }
        });

    });
</script>

</body>

</html>
