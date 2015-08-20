<div class="modal inmodal" id="modelReviewer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user modal-icon"></i>
                <h4 class="modal-title" id="reviewer-modal-title">First Name Last Name</h4>
                <small id="reviewer-modal-title-small">Senior Lecturer - Title</small>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input id="reviewer-name" type="text" class="form-control disabled" name="name"
                                       value="First Name Last Name" disabled/>
                            </div>
                            <div class="form-group">
                                <label for="address">Address </label>
                                <input type="text" name="address1" id="reviewer-address1" class="form-control disabled"
                                       disabled
                                       value="Ihala Magama Rd"/>
                                <input type="text" name="address2" id="reviewer-address2" class="form-control disabled"
                                       disabled
                                       value="Nikawewa"/>
                                <input type="text" name="city" id="reviewer-city" class="form-control disabled" disabled
                                       value="Anuradhapura"/>
                                <input type="text" name="postal_code" id="reviewer-postal-code"
                                       class="form-control disabled" disabled
                                       value="50038"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="email-address">E-Mail Address </label>
                                <input name="email-address" id="reviewer-email-address" disabled type="email"
                                       class="form-control disabled"
                                       value="someone@example.com"/>
                            </div>
                            <div class="form-group">
                                <label for="contact_no">Contact Number </label>
                                <input name="contact_no" id="reviewer-contact_no" disabled type="text"
                                       class="form-control disabled"
                                       value="071-4232885"/>
                            </div>
                            <div class="form-group">
                                <label for="">Past Publications:</label>
                                <ul>
                                    <li><a href="#">The publications 1 - RUSL</a></li>
                                    <li><a href="#">The publications 2 - RUSL</a></li>
                                    <li><a href="#">The publications 3 - RUSL</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>