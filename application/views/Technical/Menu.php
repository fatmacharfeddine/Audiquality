<div class="main-wrapper">
    <div class="header">
        <div class="header-left">
            <a href="<?php echo base_url() ?>/Technical_Account" class="logo">
                <img src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/img/logo.png" width="35" height="35" alt="" style="border-radius: 50%;"> <span>Audit Quality</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">

            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="<?= base_url() ?>/uploads/Company/default_profile.jpg" width="24" alt="Admin">
                        <span class="status online"></span>
                    </span>
                    <span><?php echo $Name_technical ?></span>
                </a>
                <div class="dropdown-menu">
                    <!--a class="dropdown-item" href="#">My Profile</a-->
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
                    <li class="active">
                            <a href="index-2.html"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li-->

                    <!--li class="submenu">
                        <a href="#"><i class="fa fa-user"></i> <span> Diagnostics </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="<?php echo site_url('Technical/Chapters') ?>">Chapters</a></li>
                            <li><a href="<?php echo site_url('Technical/Subjects') ?>">Subjects</a></li>
                            <li><a href="<?php echo site_url('Technical/Questions') ?>">Questions</a></li>
                            <li><a href="<?php echo site_url('Technical/Responses') ?>">Responses</a></li>
                        </ul>
                    </li>

                   


                    <li class="submenu">
                        <a href="#"><i class="fa fa-user"></i> <span> Posts & Skills </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="<?php echo site_url('Technical_Account/List_skills') ?>">Skills</a></li>
                            <li><a href="<?php echo site_url('Technical_Account/List_posts') ?>">Positions</a></li>
                            <li><a href="<?php echo site_url('Technical_Account/List_Employee') ?>">Employee Skills</a></li>

                        </ul>
                    </li>


                    <li-- class="submenu">
                        <a href="#"><i class="fa fa-user"></i> <span> Organizational Chart </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="<?php echo site_url('Technical_Account/List_departments') ?>">Department</a></li>
                            <li><a href="<?php echo site_url('Technical_Account/List_employee_new') ?>">Employee</a></li>
                            <li><a href="<?php echo site_url('Technical/Department') ?>">Department //</a></li>
                            <li><a href="<?php echo site_url('Technical/Employee') ?>">Employee</a></li>

                        </ul>
                    </li-->

                    <li class="submenu">
                        <a href="#"><i class="fa fa-user"></i> <span> Documents </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                        <li><a href="<?php echo site_url('Technical_Account/Uploaded_documents') ?>">Uploaded documents</a></li>

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-user"></i> <span> Access </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                        <li><a href="<?php echo site_url('Technical_Account/List_access_group') ?>">Access Groups</a></li>
                        <li><a href="<?php echo site_url('Technical_Account/List_function') ?>">Functions</a></li>

                            <!--li><a href="<?php echo site_url('Technical/Access_group') ?>">Access Group</a></li>
                            <li><a href="<?php echo site_url('Technical/Functions') ?>">Functions</a></li>
                            <li><a href="<?php echo site_url('Technical/Function_access') ?>">Access List</a></li>
                            <li><a href="<?php echo site_url('Technical/Functions_access') ?>">Functions Access</a></li-->

                        </ul>
                    </li>


                </ul>
            </div>
        </div>
    </div>
    </body>