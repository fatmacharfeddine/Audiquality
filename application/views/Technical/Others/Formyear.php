<?php include "Header.php"; ?>

<body>

    <div class="main-wrapper">

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <!--li class="active">
                            <a href="index-2.html"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li-->
                        <div class="header">
                            <div class="header-left">
                                <a href="<?php echo base_url() ?>/Technical" class="logo">
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
                        <li>
                            <a href="<?php echo site_url('Technical/Department') ?>"><i class="fa fa-user-md"></i> <span>Departments</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Technical/Chapters') ?>"><i class="fa fa-user-md"></i> <span>Chapters</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Technical/Subjects') ?>"><i class="fa fa-user-md"></i> <span>Subjects</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Technical/Questions') ?>"><i class="fa fa-user-md"></i> <span>Questions</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Technical/Responses') ?>"><i class="fa fa-user-md"></i> <span>Responses</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Technical/Year') ?>"><i class="fa fa-user-md"></i> <span>Audit Year</span></a>
                        </li>
                        <!--li class="submenu">
                            <a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="invoices.html">Invoices</a></li>
                                <li><a href="payments.html">Payments</a></li>
                                <li><a href="expenses.html">Expenses</a></li>
                                <li><a href="taxes.html">Taxes</a></li>
                                <li><a href="provident-fund.html">Provident Fund</a></li>
                            </ul>
                        </li-->

                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="card-title">Audit Year Form</h4>
                            <form action="<?= base_url() ?>/Technical/edit_year" method="post">
                                <input type="hidden" id="ID_company" name="ID_company" value="<?= $ID_company ?>">

                                <div class="form-group row">
                                    <label class="col-form-label col-md-4">Please choose audit year</label>
                                    <div class="col-md-4">
                                        <select id="ID_year" name="ID_year" class="form-control">

                                            <?php
                                            if (isset($audityear)) {
                                                foreach ($audityear as $row) {
                                                    if ($row['ID_year'] == $ID_year) {
                                            ?>
                                                        <option value="<?= $row['ID_year'] ?>" selected=""><?= $row['Audit_year'] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $row['ID_year'] ?>"> <?= $row['Audit_year'] ?> </option>

                                            <?php }
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
</body>



<?php include "Footer.php"; ?>