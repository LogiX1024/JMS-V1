<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url('assets'); ?>/img/a4.jpg" width="65px"/>
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
<!--                                        --><?//= $user->first_name . " " . $user->last_name ?>
                                    </strong>
                             </span> <span class="text-muted text-xs block">
<!--                                    --><?//= $position ?><!-- -->
                                    <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInUp m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    CAD
                </div>
            </li>
            <li>
                <a href="dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/compose">Compose</a></li>
                    <li><a href="/inbox">Inbox <span class="label label-default pull-right">16</span></a></li>
                    <li><a href="/sentbox">Sent</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Users</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/users/create_CAD_user">Add CAD User</a></li>
                    <li><a href="/users/registration_request">Registration Requests</a></li>
                    <li><a href="/users/manage_users">Manage Users</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bank"></i> <span class="nav-label">School</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="admin_add_school">Add School</a></li>
                    <li><a href="admin_registered_schools">Registered Schools</a></li>
                    <li><a href="admin_manage_classes">Manage Classes</a></li>
                    <li><a href="admin_manage_subjects">Manage Subject</a></li>
                    <li><a href="admin_class_subject">Add Subjects to Class</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Funds </span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="admin_accept_funds">Accept Funds</a></li>
                    <li><a href="admin_transferred_funds">Transferred Funds</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-quote-left"></i> <span class="nav-label">Articles</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="admin_add_article">Add Article</a></li>
                    <li><a href="admin_manage_articles">Manage Articles</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Reports </span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="admin_test_reports">Tests Reports Summary</a></li>
                    <li><a href="admin_transaction_detailed">Transaction Detailed</a></li>
                    <li><a href="admin_transaction_summary">Transaction Summary</a></li>
                    <li><a href="admin_transaction_history">Transaction History</a></li>
                    <li><a href="admin_donor_birthday_list">Donors Birthday List</a></li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-cloud-download"></i> <span class="nav-label">Backup </span></a>
            </li>
        </ul>

    </div>
</nav>