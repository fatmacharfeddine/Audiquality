<body>



    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-12 col-12">
                    <center>

                        <h4 class="page-title"><i class="fa fa-asterisk" aria-hidden="true"></i>
                            Welcome to your private space
                            <i class="fa fa-asterisk" aria-hidden="true"></i>
                        </h4>

                    </center>
                </div>
                <div class="col-md-12 col-sm-12  col-lg-12">
                    <div class="profile-widget">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="chat-avatar">
                                    <a href="profile.html" class="avatar">
                                        <img src="<?= base_url() ?>/uploads/Company/<?= $Logo_company ?>" class="img-fluid rounded-circle">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <h5 style="text-align: left;margin-top: 1%;">Brain Soft</h5>

                            </div>
                        </div>
                        <div class="doctor-img">
                            <a class="avatar" href=""><img alt="" src="<?= base_url() ?>/uploads/Company/default_profile.jpg"></a>
                        </div>

                        <h4 class="doctor-name text-ellipsis"><a href="profile.html"><?php echo $Name_employee . ' ' . $Lastname_employee; ?></a></h4>
                        <div class="doc-prof" style="color:#009efb"><?php echo $Name_access_group; ?></div>
                        <div class="user-country">
                            <i class="fa fa-envelope"></i> <?php echo $Email_employee; ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="row">
                        <div class="hospital-barchart">
                            <h4 class="card-title d-inline-block">My Skills</h4>
                        </div>
                        <div class="bar-chart">
                            <div class="legend">
                                <div class="item">
                                    <h4>Level1</h4>
                                </div>

                                <div class="item">
                                    <h4>Level2</h4>
                                </div>
                                <div class="item text-right">
                                    <h4>Level3</h4>
                                </div>
                                <div class="item text-right">
                                    <h4>Level4</h4>
                                </div>
                            </div>
                            <div class="chart clearfix">
                                <?php
                                if (isset($my_skill)) {
                                    foreach ($my_skill as $row) { ?>


                                        <div class="item">
                                            <div class="bar">
                                                <span class="percent"><?php echo $row['Grade_skill_employee'] . '%' ?></span>
                                                <div class="item-progress" data-percent="<?php echo $row['Grade_skill_employee'] ?>" style="width: <?php echo $row['Grade_skill_employee'] . '%' ?>;">
                                                    <span class="title"><?php echo $row['Name_skill'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                <?php  }
                                } ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="row">

                        <div class="card member-panel" style="width: 100%;">
                            <div class="card-header bg-white">
                                <h4 class="card-title d-inline-block">Risk Reports </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 new-patient-table">
                                        <tbody>
                                            <?php if (isset($my_action)) {
                                                foreach ($my_action as $row) { ?>
                                                    <tr>
                                                        <td>
                                                            <img width="28" height="28" class="rounded-circle" src="<?php echo base_url() ?>/uploads/risk/report.jpg" alt="">
                                                            <h2><?php echo $row['Name_action'] ?></h2>
                                                        </td>


                                                        <td>
                                                            <a href="<?php echo Base_url() ?>/Employee_Account/List_action/?ID_action=<?php echo $row['ID_action'] ?>">
                                                                <button class="btn btn-primary btn-primary-one float-right">View</button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="<?php echo Base_url() ?>/Employee_Account/List_action_report" class="text-muted">View All Reports</a>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="card member-panel" style="width: 100%;">
                            <div class="card-header bg-white">
                                <h4 class="card-title mb-0">Politique Communiquée et lu par :</h4>
                            </div>
                            <div class="card-body">
                                <ul class="contact-list">
                                    <?php foreach ($list_employee as $row) {
                                    ?>


                                        <li>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <div class="contact-cont">
                                                            <div class="float-left user-img m-r-10">
                                                                <a title="John Doe"><img src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/img/user.jpg" alt="" class="w-40 rounded-circle"></a>
                                                            </div>
                                                            <div class="contact-info">
                                                                <span class="contact-name text-ellipsis"><?php echo $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></span>
                                                                <?php if ($row['status_policy'] == 1) { ?>
                                                                    <span class="contact-date" style="color:#28a745"> ✔ VU</span>

                                                                <?php   } else { ?>
                                                                    <span class="contact-date" style="color:#dc3545"> ✘ Non Vu</span>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                            </table>
                                        </li>
                                    <?php  } ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="card member-panel">
                        <div class="card-header bg-white">
                            <h4 class="card-title d-inline-block">Politique Qualité</h4>
                        </div>
                        <div class="col-md-12 col-sm-12  col-lg-12">
                            <div class="profile-widget">

                                <div class="doctor-img">
                                    <a class="avatar" href=""><img alt="" src="<?= base_url() ?>/includes/ext/assets/template/img/doc/politique.jpg"></a>
                                </div>

                                <h4 class="doctor-name text-ellipsis"><a href="profile.html">Politique</a></h4>
                                <?php if (!isset($ID_policy)) { ?>

                                    <div class="user-country">
                                        Aucun Politique définie !!
                                    </div>

                                <?php } else { ?>
                                    <br>
                                    <table style="margin-left: 30%;">
                                        <tr>
                                            <?php if ($status_policy == 0) {  ?>

                                                <td>
                                                    <p style="padding-top: 8%;">Avez-vous lu la politique ? </p>

                                                </td>
                                                <td>
                                                    <a href="<?php echo Base_url() ?>/Employee_Account/Read_policy">
                                                        <button class="btn btn-primary btn-primary-one float-right" style="border: 1px solid #55ce63;background: #55ce63; color: #fff;">OUI</button>
                                                    </a>
                                                </td>
                                            <?php } else { ?>
                                                <p style="color:#55ce63"> merci d'avoir lu la politique </p>
                                            <?php } ?>

                                        </tr>
                                    </table>
                                    <br>
                                    <embed src="<?php echo base_url() ?>/uploads/Policy/<?php echo $File_policy ?>" width="620" height="500">

                                <?php } ?>
                                <!------------------------------ pop-up ------------------------------->
                                <div class="modal fade" id="add_group" role="dialog">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="row">
                                                <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>
                                                <div class="col-md-12">
                                                    <div class="card-box">
                                                        <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Submit_add_policy" enctype="multipart/form-data" method="post">

                                                            <?php if (isset($ID_policy)) { ?>
                                                                <input type="hidden" name="ID_policy" Value="<?php echo $ID_policy ?>">

                                                            <?php } ?>

                                                            <div class="row">
                                                                <div class="col-md-12">


                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-md-3">File</label>
                                                                        <div class="col-md-9">
                                                                            <img class="form_add_photo" style="cursor:pointer;" src="<?php echo base_url() ?>/includes/ext/assets/template/img/file.png" value="" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">

                                                                            <!--?php// } else { ?-->

                                                                            <img id="target">
                                                                            <input type="file" accept="image/jpg, image/jpeg, image/png, .doc, .docx, .pdf" id="File_policy" name="File_policy" onchange="displayImage(this)" style="display:none;">



                                                                        </div>
                                                                    </div>


                                                                </div>

                                                            </div>
                                                            <div class="text-right">
                                                                <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                            </div>
                                                        </form>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!---------------------------End pop-up ------------------------------->

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>