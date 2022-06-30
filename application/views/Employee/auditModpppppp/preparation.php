<!--?php include "/../Header.php"; ?-->
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

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


                                                <div class="staff-msg">
                                                    <a href="#" class="btn btn btn-primary btn-rounded" data-toggle="modal" data-target="#add_group"><i class="fa fa-plus"> Add Checklist</i></a>
                                                    <a  href="<?php echo base_url() ?>/Employee_Account/View_processus?ID_audit=<?php echo $ID_audit; ?>&ID_department=<?php echo $ID_departement; ?>" class="btn btn btn-primary btn-rounded"><i style='font-size:18px' class='fas'>&#xf100; Back</i></a>

                                                </div>


                                                <!------------------------------ pop-up ------------------------------->

                                                <div class="modal fade" id="add_group" role="dialog">
                                                    <div class="modal-dialog">

                                                        <div class="modal-content">
                                                            <div class="row">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                                                <div class="col-md-12">
                                                                    <div class="card-box">
                                                                        <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Add_checklist?ID_processus=<?php echo $_GET['ID_processus'] ?>" enctype="multipart/form-data" method="post">
                                                                            <div class="row">
                                                                                <div class="col-md-12">



                                                                                    <div class="form-group row">

                                                                                    </div>


                                                                                    <div class="form-group row">
                                                                                        <div class="col-md-12">

                                                                                            <textarea class="form-control" name="Cheklist_survey" rows="2" cols="60"></textarea>
                                                                                            <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">

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

                                                <li>
                                                    <span class="title">Process :</span>
                                                    <span class="text" style="color: #f50219;   font-size: 14px;    font-family: 'FontAwesome';"><?php if (isset($Title_processus)) {
                                                                                                                                                        foreach ($Title_processus as $row) {
                                                                                                                                                            echo $row['Title_processus'];
                                                                                                                                                        }
                                                                                                                                                    } ?></span>
                                                </li>

                                            </ul>
                                        </div>
                                    </div><?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="profile-tabs">
                <!--ul class="nav nav-tabs nav-tabs-bottom">

                    <li class="nav-item"><a class="nav-link active show" href="#about-cont" data-toggle="tab">
                            <!--?php if (isset($infoaudit)) { ?>
                                <!--?php echo $Title_processus; ?>
                            <!--?php } ?>
                        </a></li>
                </ul-->

                <div class="tab-content">
                    <div class="tab-pane show active" id="about-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="activity">
                                                <div class="activity-box">
                                                    <ul class="activity-list">
                                                        <?php if (isset($checksurvey)) {
                                                            foreach ($checksurvey as $row) {
                                                        ?>
                                                                <li>
                                                                    <div class="activity-user">
                                                                        <a href="" title="Lesley Grauer" data-toggle="tooltip" class="avatar">
                                                                            <img style="padding: 1px;    /*border: 1px solid gray;*/" alt="Lesley Grauer" src="<?php echo base_url() ?>/uploads/Step.jpg" class="img-fluid rounded-circle">
                                                                        </a>
                                                                    </div>
                                                                    <div class="activity-content" style="    margin-bottom: 5px;">
                                                                        <div class="timeline-content" style="    margin-top: 8px;">
                                                                            <a href="" class="name"><?php echo $row['Cheklist_survey']; ?></a>
                                                                            <!--span class="time">&nbsp;</span-->
                                                                        </div>
                                                                    </div>
                                                                    <a onclick="return confirm('Are you Sure?')" class="activity-delete" href="<?php echo base_url(); ?>Employee_Account/Delete_checklist?ID_survey=<?php echo $row['ID_survey'] ?>&ID_processus=<?php echo $row['ID_processus'] ?>&ID_audit=<?php echo $row['ID_audit'] ?>" title="Delete">&times;</a>
                                                                </li>
                                                        <?php }
                                                        } ?>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <!--?php include "/../Footer.php"; ?-->