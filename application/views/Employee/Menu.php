<div class="main-wrapper">
    <div class="header">
        <div class="header-left">
            <a href="<?php echo base_url() ?>/Employee_Account" class="logo">
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
                    <span><?php echo $Name_employee.' '. $Lastname_employee ?></span>
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
                    <!--li class="active">
                            <a href="index-2.html"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li-->
                    <?php
                    if (isset($access_account)) {
                        foreach ($access_account as $row) {
                            if ($row['ismain'] != 0) {
                    ?>

                                <li class="submenu">
                                    <a href="#"><i class="fa fa-user"></i> <span> <?php echo $row['Name_function']; ?> </span> <span class="menu-arrow"></span></a>

                                   
                                    <ul style="display: none;">
                                        <?php
                                        foreach ($access_account as $subrow) {
                                        ?><?php if (($subrow['parent'] == $row['ID_function'])) {
                                        ?>


                                        <li><a href="<?php echo base_url() ?>/Employee_Account/<?php echo $subrow['URL_function'] ?>" style="font-size: 13px;"> <?php echo $subrow['Name_function']; ?> </a></li>


                                    <?php  } ?>
                                <?php
                                        }
                                ?>
                                    </ul>
                                </li>





                    <?php
                            }
                        }
                    }
                    ?>


                </ul>
            </div>
        </div>
    </div>
    </body>