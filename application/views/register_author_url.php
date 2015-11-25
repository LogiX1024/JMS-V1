<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register as an Author</title>

    <!-- Form Wizard -->

    <link href="<?php echo base_url('assets/') ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/') ?>/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/') ?>/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/') ?>/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/') ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/') ?>/css/style.css" rel="stylesheet">


</head>

<body>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Applied eJournal</h5><br><br>
                            <br><br>

                        </div>
                        <div class="ibox-content">
                            <h2>
                                Register Author
                            </h2>

                            <form id="form" action="<?= base_url('/index.php/users/authorRegistration') ?>"
                                  class="wizard-big" method="post">
                                <h1>Personal Info</h1>
                                <fieldset>
                                    <h2>Personal Information</h2>


                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <select id="title" class="form-control">
                                                    <option value="Mr">Mr.</option>
                                                    <option value="Mrs.">Mrs.</option>
                                                    <option value="Miss.">Miss.</option>
                                                    <option value="Dr.">Dr.</option>
                                                    <option value="Prof.">Prof.</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>First Name *</label>
                                                <input type="text" name="first_name" placeholder="Enter First Name"
                                                       class="form-control "/>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Last Name *</label>
                                                <input type="text" name="last_name" placeholder="Enter Last Name"
                                                       class="form-control"/>
                                            </div>
                                        </div>

                                    </div>

                                </fieldset>
                                <h1>Contact Info</h1>
                                <fieldset>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Email *</label>
                                                    <input type="email" name="email" placeholder="Enter Email Address"
                                                           class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="address1" class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name="city" placeholder="Enter city"
                                                           class="form-control"/>
                                                </div>
                                                

                                            </div>
                                            <div class="col-lg-6">
                                                 <div class="form-group">
                                                    <label>Country</label>
                                                    <input type="text" name="country" placeholder="Enter country"
                                                           class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address Line 2</label>
                                                    <input type="text" name="address2" class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <input type="text" name="postal_code"
                                                           placeholder="Enter postal code" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1>Role & Confirm</h1>
                                <fieldset>
                                    <h2>Personal Information</h2>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input id="name" name="role" type="hidden" placeholder="Enter Role"
                                                           value="Author" class="form-control ">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password"
                                                           placeholder="Enter password" class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Security Question</label>
                                                    <input type="text" name="sec_question"
                                                           placeholder="Enter security question" class="form-control"/>
                                                </div>


                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">


                                                </div>
                                                <div class="form-group">
                                                    <label>Confirm password</label>
                                                    <input type="password" name="password2"
                                                           placeholder="Re-Enter password" class="form-control"
                                                           id="confirm"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Answer</label>
                                                    <input type="text" name="sec_answer" placeholder="Enter Answer"
                                                           class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1>Finish</h1>
                                <fieldset>
                                    <h2>Terms and Conditions</h2>
                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label
                                        for="acceptTerms">I agree with the Terms and Conditions.</label>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>

</div>


<!-- Mainly scripts -->
<script src="<?php echo base_url('assets/') ?>/js/jquery-2.1.1.js"></script>
<script src="<?php echo base_url('assets/') ?>/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/') ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url('assets/') ?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets/') ?>/js/inspinia.js"></script>
<script src="<?php echo base_url('assets/') ?>/js/plugins/pace/pace.min.js"></script>

<!-- Steps -->
<script src="<?php echo base_url('assets/') ?>/js/plugins/staps/jquery.steps.min.js"></script>

<!-- Jquery Validate -->
<script src="<?php echo base_url('assets/') ?>/js/plugins/validate/jquery.validate.min.js"></script>


<script>
    $(document).ready(function () {
        $("#wizard").steps();
        $("#form").steps({
            bodyTag: "fieldset",
            onStepChanging: function (event, currentIndex, newIndex) {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex) {
                    return true;
                }

                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18) {
                    return false;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex) {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3) {
                    $(this).steps("previous");
                }
            },
            onFinishing: function (event, currentIndex) {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                var form = $(this);

                // Submit form input
                form.submit();
            }
        }).validate({
            errorPlacement: function (error, element) {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
    });
</script>

</body>

</html>
