<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="<?php echo base_url('assets'); ?>/img/a4.jpg"
                             width="65px"/>
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
                                    <!--                                        --><? //= $user->first_name . " " . $user->last_name ?>
                                </strong>
                            </span> <span class="text-muted text-xs block">
                                <!--                                    --><? //= $position ?><!-- -->
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
                <a href="<?php echo base_url() ?>index.php/dashboard"><i class="fa fa-th-large"></i> <span
                        class="nav-label">Dashboard</span></a>
            </li>

            <li>
                <a href="<?php echo base_url() ?>index.php/submit_paper"><i class="fa fa-th-large"></i> <span
                        class="nav-label">Submit Papers</span></a>
            </li>

        </ul>

    </div>
</nav>