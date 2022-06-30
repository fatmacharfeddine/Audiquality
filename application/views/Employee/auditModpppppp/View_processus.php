<!--?php include "/../Header.php"; ?-->

<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="<?php echo base_url() ?>/uploads/Plan/Audit-Interne.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <?php if (isset($infoaudit)) { ?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"><?php echo $Name_department; ?></h3>
                                                <small class="text-muted"><i class="fa fa-building"></i>
                                                    <?php echo $Name_rerencial; ?>
                                                </small>
                                                <div class="staff-id">Version : <?php echo $Version_rerencial; ?></div>

                                                <?php if (isset($infoaudit)) {
                                                    if ($Result_audit == null) { ?>
                                                        <div class="staff-msg">
                                                            <a href="<?php echo base_url() ?>/Employee_Account/Form_add_processus?ID_audit=<?php echo $ID_audit ?>&ID_department=<?php echo $ID_department ?>" class="btn btn-primary">Add Process</a>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="staff-msg" style=" margin-top: 70px;">

                                                        </div>
                                                <?php      }
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Audit mission :</span>
                                                    <span class="text"><?php echo $Mission_audit; ?></span>

                                                </li>
                                                <li>
                                                    <span class="title">Team :</span>
                                                    <span class="text"><?php echo $Name_team; ?></span>
                                                </li>

                                                <li>
                                                    <span class="title">Date :</span>
                                                    <span class="text"><?php echo $planned_date_audit; ?></span>
                                                </li>

                                                <li style="margin-top: 20px;">
                                                    <?php if (isset($infoaudit)) {
                                                        if ($Result_audit == null) { ?>
                                                            <span class="title"> <a href="<?php echo base_url(); ?>Employee_Account/View_Edit_audit?ID_audit=<?php echo $ID_audit; ?>&ID_department=<?php echo $ID_department; ?>" class="btn btn-primary btn-primary-three float-right"><i class="fa fa-pencil m-r-5"></i>Update</a>
                                                            </span>
                                                            <span class="title"><a href="<?php echo base_url(); ?>Employee_Account/Delete_audit?ID_audit=<?php echo $ID_audit; ?>&ID_audit_plan=<?php echo $ID_audit_plan; ?>" class="btn btn-primary btn-primary-four float-right" onclick="return confirm('Are you Sure?')"><i class="fa fa-trash-o m-r-5"> Delete</i>
                                                                </a></span>
                                                    <?php } else {
                                                        }
                                                    } ?>
                                                </li>

                                            </ul>
                                        </div>
                                    </div><?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--div class="profile-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Sectors</a></li>
                    <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Statistics</a></li>
                    <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">All Risks</a></li>
                </ul-->
            <div class="profile-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <?php if (isset($infoaudit)) {
                        if ($Result_audit == null) { ?>
                            <li class="nav-item"><a class="nav-link active show" href="#about-cont" data-toggle="tab">preparation</a></li>
                            <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Mission</a></li>
                    <?php } else {
                        }
                    } ?>
                    <?php if (isset($infoaudit)) { ?>

                        <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Generate Report</a></li>
                    <?php
                    } else { ?>
                        <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">View Report</a></li>
                    <?php }
                    ?>
                </ul>

                <div class="tab-content">

                    <?php if (isset($infoaudit)) {
                        if ($Result_audit == null) { ?>
                            <div class="tab-pane show active" id="about-cont">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-box">
                                            <ul class="latest-posts">
                                                <?php if (isset($infoprocessus)) {
                                                    if (($infoprocessus) == false) {
                                                        echo "there are no processes";
                                                    } else {
                                                        foreach ($infoprocessus as $row) {

                                                ?>
                                                            <li>
                                                                <div class="post-thumb">
                                                                    <a href="<?php echo base_url(); ?>Employee_Account/preparation?ID_processus=<?php echo $row['ID_processus'] ?>&ID_audit=<?php echo $row['ID_audit'] ?>">
                                                                        <?php
                                                                        if (($row['Photo_processus']) == null) {
                                                                        ?>
                                                                            <img src="<?= base_url() ?>/uploads/process/default.png" class="img-fluid" alt="" style="border-radius:50%;height: 80px;width: 80px;">


                                                                        <?php } else { ?>
                                                                            <img style="border-radius:50%;height: 80px;width: 80px;" class="img-fluid" src="<?php echo base_url() ?>/uploads/process/<?php echo $row['Photo_processus'] ?>" alt="">

                                                                        <?php } ?>
                                                                    </a>
                                                                </div>
                                                                <div style="margin-top: 2.2%;" class="post-info">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <a href="<?php echo base_url(); ?>Employee_Account/preparation?ID_processus=<?php echo $row['ID_processus'] ?>&ID_audit=<?php echo $row['ID_audit'] ?>">
                                                                                <span style="text-decoration: underline; font-family: Arial, Helvetica, sans-serif;" class="blog-author-name"><?php echo $row['Title_processus'] ?></span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <a href="<?php echo base_url(); ?>Employee_Account/Form_edit_processus?ID_processus=<?php echo $row['ID_processus'] ?>">
                                                                                <button class="btn btn-primary btn-primary-three float-right"><i class="fa fa-pencil m-r-5"></i>Update</button>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <a href="<?php echo base_url(); ?>Employee_Account/Delete_processus?ID_processus=<?php echo $row['ID_processus'] ?>&ID_audit=<?php echo $row['ID_audit'] ?>&ID_department=<?php echo $row['ID_department'] ?>" onclick="return confirm('Are you Sure?')">
                                                                                <button class="btn btn-primary btn-primary-four float-right"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                                            </a>
                                                                        </div>

                                                                    </div>
                                                                </div>





                                                            </li>
                                                <?php }
                                                    }
                                                } ?>
                                            </ul>



                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="bottom-tab2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-box">
                                            <ul class="latest-posts">
                                                <?php if (isset($infoprocessus)) {
                                                    if (($infoprocessus) == false) {
                                                        echo "there are no processes";
                                                    } else {
                                                        foreach ($infoprocessus as $row) {
                                                ?>
                                                            <li>
                                                                <div class="post-thumb">

                                                                    <?php
                                                                    if (($row['Photo_processus']) == null) {
                                                                    ?>
                                                                        <img src="<?= base_url() ?>/uploads/process/default.png" class="img-fluid" alt="" style="border-radius:50%;height: 80px;width: 80px;">


                                                                    <?php } else { ?>
                                                                        <img style="border-radius:50%;height: 80px;width: 80px;" class="img-fluid" src="<?php echo base_url() ?>/uploads/process/<?php echo $row['Photo_processus'] ?>" alt="">

                                                                    <?php } ?>

                                                                </div>
                                                                <div style="margin-top: 2.2%;" class="post-info">
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <span style=" font-family: Arial, Helvetica, sans-serif;" class="blog-author-name"><?php echo $row['Title_processus'] ?></span>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <a href="<?php echo base_url(); ?>Employee_Account/mission?ID_processus=<?php echo $row['ID_processus'] ?>">
                                                                                <button class="btn btn-primary btn-primary-three float-right"><i class="fa fa-pencil m-r-5"></i>Mission</button>
                                                                            </a>
                                                                        </div>


                                                                    </div>
                                                                </div>





                                                            </li>
                                                <?php }
                                                    }
                                                } ?>
                                            </ul>



                                        </div>


                                    </div>
                                </div>
                            </div>
                    <?php } else {
                        }
                    } ?>

                    <?php if (isset($infoaudit)) {
                        if ($Result_audit == null) {
                    ?>
                            <!------Generate report------>
                            <div class="tab-pane" id="bottom-tab3">

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="card-box">
                                            <?php if ($Result_audit == null) {
                                                if ($infoprocessus == null) {
                                                    echo "there are no processes";
                                                } else {     ?>


                                                    <div class="row">

                                                        <div class="col-md-4">

                                                        </div>
                                                        <div class="col-md-4" style="text-align: center;">
                                                            <a href="<?php echo base_url(); ?>Employee_Account/generate?ID_audit=<?php echo $_GET['ID_audit'] ?>" class="btn btn-success btn-block" style="    background-color: #e31e1e;   padding: 3%;    border-color: #e31e1e;"> Generate </a>

                                                        </div>

                                                        <div class="col-md-4">
                                                        </div>
                                                    </div>

                                            <?php }
                                            } ?>

                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-----End generate report------>
                        <?php
                        } else { ?>
                            <!-----view report ----->

                            <div class="tab-pane" id="bottom-tab3">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-box">
                                            <div class="row">

                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4" style="text-align: center;">
                                                    <a href="<?php echo base_url(); ?>Employee_Account/viewReport?ID_audit=<?php echo $_GET['ID_audit'] ?>" class="btn btn-success btn-block" style="    background-color: #e31e1e;   padding: 3%;    border-color: #e31e1e;"> View </a>

                                                </div>

                                                <div class="col-md-4">
                                                </div>
                                            </div>



                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!----------End view report ------>
                    <?php }
                    } ?>
                </div>
            </div>

        </div>
    </div>
    <!--?php include "/../Footer.php"; ?-->