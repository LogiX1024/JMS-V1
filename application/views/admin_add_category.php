<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/datapicker/datepicker3.css" rel="stylesheet">


</head>
<body>

    <div id="wrapper">
        <?php $this->load->view('partial/admin_navigation'); ?>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">

                <?php $this->load->view('partial/top_bar'); ?>

            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <?php
                    $title = "";
                    $url = "";
                    if ($category == NULL) {
                        $title = "Create Category";
                        $url = base_url('/index.php/journal/add_category');
                    } else {
                        $title = "Update Category";
                        $url = base_url('/index.php/journal/update_category');
                    }
                    ?>
                    <h2><span class="fa fa-user"></span> <?= $title ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            Administrator
                        </li>
                        <li class="active">
                            <strong><?= $title ?></strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5><?= $title ?>
                                    <!--<small>Enter the details of the journal you want to create</small>-->
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
                                <form name="create_category" method="post" id="add_cad_user" class="form-horizontal"
                                      action="<?= $url ?>">                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Category Name : </label>
                                                <div class="col-sm-6">
                                                    <input type="hidden" name="id" value="<?php
                                                    if ($category != NULL) {
                                                        echo $category[0]->id;
                                                    }
                                                    ?>">
                                                    <input name="name" required="" type="text" class="form-control" value="<?php
                                                    if ($category != NULL) {
                                                        echo $category[0]->category;
                                                    }
                                                    ?>"
                                                           placeholder="Enter Category Name">
                                                </div>
                                                <div class="col-sm-3 ">
                                                    <button class="btn btn-primary" type="submit">Submit <span
                                                            class="fa fa-plus"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>
                                    Categories
                                    <!--<small>Enter the details of the journal you want to create</small>-->
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
                                <div class="row">
                                    <table class="table">
                                        <?php
                                        foreach ($categories as $value) {
                                            ?>
                                            <tr>
                                                <td> 
                                                    <div class="col-sm-8">
                                                        <input name="id" type="hidden" class="form-control" value="">
                                                        <h3 style="padding-left: 20px"><?= $value->category ?></h3>
                                                    </div>                                                        
                                                    <div class="col-sm-4">
                                                        <a href="<?= base_url('/index.php/journal/del_category') . "/" . $value->id ?>"><button class="btn btn-danger pull-right" style="margin-left: 5px;" type="button">Delete</button></a>
                                                        <a href="<?= base_url('/index.php/journal/category') . "/" . $value->id ?>"><button class="btn btn-default pull-right" type="button">Edit</button></a>
                                                    </div>
                                                </td>   
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>     
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
    <!--
         Peity 
        <script src="<?php echo base_url('assets'); ?>/js/plugins/peity/jquery.peity.min.js"></script>
         Peity 
        <script src="js/demo/peity-demo.js"></script>-->

    <!-- Toastr -->
    <script src="<?php echo base_url('assets'); ?>/js/plugins/toastr/toastr.min.js"></script>


    <?php
    if (isset($message)) {
        ?>
        <script>
            $(document).ready(function () {
                setTimeout(function () {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success('', '<?= $message ?>');

                }, 1300);
            });

        </script>
        <?php
    }
    ?>



</body>
