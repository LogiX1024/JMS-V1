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
                    JMS
                </div>
            </li>

            <li>
                <a href="<?php echo base_url() ?>index.php/Articles"><i class="fa fa-th-large"></i> <span class="nav-label">Submit Papers</span></a> 
            </li>
            <li>
                <a href="<?php echo base_url() ?>index.php/test/test2/author_dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">View Timeline</span></a>
            </li>
            
            
<!--            <li>
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Review for Submission</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Camera Ready Submission</span></a>
            </li>-->
            
            
<!--            <li>
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></span></a>
                <ul class="nav nav-second-level">
                    <li class="active"><a href="#">Dashboard v.1</a></li>
                    <li ><a href="#">Dashboard v.2</a></li>
                    <li ><a href="#">Dashboard v.3</a></li>
                    <li ><a href="#">Dashboard v.4</a></li>
                </ul>
            </li>-->


        </ul>

    </div>
</nav>