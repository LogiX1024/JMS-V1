<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-responsive" src="<?php echo base_url('assets'); ?>/img/logo9.png" width="170px"/>
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
<!--                                        --> 
                                    </strong>
                             </span> <span class="text-muted text-xs block">
<!--                                    --><!-- -->
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
<!--            <li>
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>-->
            <li>
                <a href="<?php echo base_url() ?>index.php/create_journal"><i class="fa fa-th-large"></i> <span class="nav-label">Create Journal</span></a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>index.php/Journal/journal_manager"><i class="fa fa-th-large"></i> <span class="nav-label">Journal Manager</span></a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>index.php/Users/new_editor"><i class="fa fa-th-large"></i> <span class="nav-label">Editors</span><span
                        class="fa arrow"></span></a>
<!--                <ul class="nav nav-second-level">
                    <li><a href="<?php // echo base_url() ?>index.php/Users/new_editor">Add</a></li>
                    
                </ul>-->
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>index.php/Journal/category/"><i class="fa fa-th-large"></i> <span class="nav-label">Category</span></a>
            </li>
            
        </ul>

    </div>
</nav>