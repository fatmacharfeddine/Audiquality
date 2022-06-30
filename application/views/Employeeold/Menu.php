<div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="<?php echo base_url() ?>/Department" class="logo">
                    <img src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/img/logo.png" width="35" height="35" alt="" style="border-radius: 50%;"> <span>Audit Quality</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">

                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/img/user.jpg" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span>
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">My Profile</a>
						<!--a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
						<a class="dropdown-item" href="settings.html">Settings</a-->
                        <a class="dropdown-item" href="<?php echo site_url('LoginAccount/Logout') ?>">Logout</a>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!--a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a-->
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <!--li class="active">
                            <a href="index-2.html"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li-->

                    <li class="submenu">
                        <a href="#"><i class="fa fa-user"></i> <span> Diagnostics </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="<?php echo site_url('Employee/Chapters') ?>">Chapters</a></li>
                            <li><a href="<?php echo site_url('Employee/Subjects') ?>">Subjects</a></li>
                            <li><a href="<?php echo site_url('Employee/Questions') ?>">Questions</a></li>
                            <li><a href="<?php echo site_url('Employee/Responses') ?>">Responses</a></li>
                        </ul>
                    </li>


                    <li class="submenu">
                        <a href="#"><i class="fa fa-user"></i> <span> Documents </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="<?php echo site_url('Employee/Requests') ?>">Requests</a></li>
                            <li><a href="<?php echo site_url('Employee/doc_by_department') ?>">Documents by department</a></li>
                            <li><a href="<?php echo site_url('Employee/List_Requests') ?>">List of Requests</a></li>
                            <li><a href="<?php echo site_url('Employee/Document_Status') ?>">Documents Status</a></li>
                            <li><a href="<?php echo site_url('Employee/Document_validation') ?>">Validation Documents</a></li>
                            <li><a href="<?php echo site_url('Employee/#') ?>">Status Validation Documents</a></li>

                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-user"></i> <span> Internal Audit </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="<?php echo site_url('Employee/Intern_audit') ?>">Audit</a></li>
                            <li><a href="<?php echo site_url('Auditor/#') ?>">Audit Reports</a></li>

                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-user"></i> <span> Organizational Chart </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="<?php echo site_url('Employee/Department') ?>">Department</a></li>
                            <li><a href="<?php echo site_url('Employee/Employee') ?>">Employee</a></li>

                        </ul>
                    </li>


                    <li class="submenu">
                        <a href="#"><i class="fa fa-user"></i> <span> Risks & Actions </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="<?php echo site_url('Employee/Action') ?>">Actions</a></li>
                            <li><a href="<?php echo site_url('Employee/Risk') ?>">Risks</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo site_url('Employee/Year') ?>"><i class="fa fa-user-md"></i> <span>Audit Year</span></a>
                    </li>

                    </ul>
                </div>
            </div>
        </div>
    </body>