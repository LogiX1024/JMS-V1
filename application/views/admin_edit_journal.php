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
        <?php $this->load->view('partial/admin_navigation'); ?>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">

                <?php $this->load->view('partial/top_bar'); ?>

            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2><span class="fa fa-user"></span> Edit Journal</h2>
                    <ol class="breadcrumb">
                        <li>
                            Journal
                        </li>
                        <li class="active">
                            <strong>Edit Journal</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"> 
                                <h5>Create Journal
                                    <small>Create Journal to the system</small>
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
                                <form name="create_jurnal" method="post" id="add_cad_user" class="form-horizontal"
                                      action="<?= base_url('/index.php/Journal/update_journal') ?>">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" >Name</label>
                                                <div class="col-sm-9">
                                                    <input name="name" required="" type="text" value="<?php echo $JournalData->name; ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Issue</label>
                                                <div class="col-sm-9">
                                                    <input name="issue" required="" type="text" value="<?php echo $JournalData->issue; ?>" class="form-control"  >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Volume</label>
                                                <div class="col-sm-9">
                                                    <input name="volume" required="" type="text" value="<?php echo $JournalData->volume; ?>"class="form-control"  >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Aim</label>
                                                <div class="col-sm-9">
                                                    <textarea name="aim" class="form-control" ><?php echo $JournalData->aim; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Objective</label>
                                                <div class="col-sm-9">
                                                    <textarea name="objective" class="form-control"  ><?php echo $JournalData->objective; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Scope</label>
                                                <div class="col-sm-9">
                                                    <textarea name="scope" class="form-control"  ><?php echo $JournalData->scope; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Category</label>
                                                <div class="col-sm-9">
                                                    <select name="category" id="journals"
                                                            class="chosen-select form-control">
                                                                <?php
                                                                foreach ($categories as $category):
                                                                    if ($category->category == $JournalData->category) {
                                                                        ?>
                                                                <option selected="selected" value="<?= $category->id ?>"><?= $category->category ?></option>
                                                            <?php } else {
                                                                ?>
                                                                <option value="<?= $category->id ?>"><?= $category->category ?></option>
                                                                <?php
                                                            }
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Journal Image</label>

                                                <div class="col-sm-9">
                                                    <input type="file" name="jurnal_img" value="<?php echo $JournalData->id; ?>.jpg" />
                                                    * Upload .jpg image only. 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" panel-body">
                                                    <input value="<?php echo $JournalData->id; ?>" type="hidden" name="hdnID" id="hdnID">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Keywords</label>
                                                <div class="col-sm-9">
                                                    <input name="keywords" required="" type="text" value="<?php
                                                    $str = '';
                                                    foreach ($JournalData->keywords as $value) {
                                                        $str = $str . $value->keyword . ", ";
                                                    }
                                                    echo substr($str, 0, -2);
                                                    ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Deadline for paper submissions</label>

                                                <div class="col-sm-9">
                                                    <div id="submition_date">
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i
                                                                    class="fa fa-calendar"></i></span>
                                                            <input name="submition_date" type="text"
                                                                   class="form-control" value="<?php
                                                                   if ($JournalData->collection_date != "0000-00-00 00:00:00") {
                                                                       echo $JournalData->collection_date;
                                                                   }
                                                                   ?>"
                                                                   placeholder="Deadline for paper submissions">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                           
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Camera Ready Submission Date</label>

                                                <div class="col-sm-9">
                                                    <div id="camera_ready_date">
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i
                                                                    class="fa fa-calendar"></i></span>
                                                            <input name="camera_ready_date" type="text"
                                                                   class="form-control" value="<?php
                                                                   if ($JournalData->camera_ready_date != "0000-00-00 00:00:00") {
                                                                       echo $JournalData->camera_ready_date;
                                                                   }
                                                                   ?>"
                                                                   placeholder="Camera Ready Submission Date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Publication Date</label>

                                                <div class="col-sm-9">
                                                    <div id="publish_date">
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i
                                                                    class="fa fa-calendar"></i></span>
                                                            <input name="publish_date" type="text" value="<?php
                                                            if ($JournalData->publishing_date != "0000-00-00 00:00:00") {
                                                                echo $JournalData->publishing_date;
                                                            }
                                                            ?>"
                                                                   class="form-control" placeholder="Publication Date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Chief Editor</label>

                                                <div class="col-sm-9">
                                                    <select name="chief_editor" id="journals"
                                                            class="chosen-select form-control">
                                                                <?php
                                                                foreach ($editors as $editor):
                                                                    if ($editor->id == $JournalData->chief_editor_id) {
                                                                        ?>
                                                                <option selected="selected" value="<?= $editor->id ?>"><?= $editor->first_name . " " . $editor->last_name ?></option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?= $editor->id ?>"><?= $editor->first_name . " " . $editor->last_name ?></option>
                                                                <?php
                                                            }
                                                        endforeach;
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Editors</label>

                                                <div class="col-sm-9">
                                                    <select name="editors" id="journals"
                                                            class="chosen-select form-control" multiple="multiple">
                                                                <?php
                                                                foreach ($editors as $editor):
                                                                    ?>
                                                            <option
                                                                value="<?= $editor->id ?>"><?= $editor->first_name . " " . $editor->last_name ?></option>
                                                                <?php
                                                            endforeach;
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 ">
                                            <button class="btn btn-primary pull-right" type="submit">Update <span class="fa fa-plus"></span></button>
                                        </div>
                                    </div>
                                </form>
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

    <script src="<?php echo base_url('assets'); ?>/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#submition_date .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
            $('#camera_ready_date .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
            $('#publish_date .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
        });
    </script>

</body>
</html>
