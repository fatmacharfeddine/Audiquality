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

                                                <h3 class="user-name m-t-0 mb-0" style="padding-top:5px;    color: gray;   font-size: 15px;"><?php echo $Name_rerencial; ?></h3>
                                                <small class="text-muted" style="padding-left: 10px;"><i class="fa fa-building"></i>Version:
                                                    <?php echo $Version_rerencial; ?>
                                                </small>
                                                <div class="staff-msg" style="margin-top: 10px;padding-left: 25%;  color: #36449b;    font-size: 15px;">Synthesis Audit</div>

                                                <div class="staff-msg" style="margin-top: 0px;"><?php echo $Synthesis_audit; ?></div>
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
                                                    <span class="title">Description :</span>
                                                    <span class="text"><?php echo $Description_audit; ?></span>
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
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a class="nav-link active show" href="#about-cont" data-toggle="tab">preparation</a></li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane show active" id="about-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <!------Table Report------->
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped custom-table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Process</th>
                                                        <th>Checklist</th>
                                                        <th>wording</th>
                                                        <th>Status</th>
                                                        <th>corrective action</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (isset($report)) {
                                                        foreach ($report as $row) {
                                                    ?>

                                                            <tr>
                                                                <td><?php echo $row['Title_processus']; ?></td>
                                                                <td><?php echo $row['Cheklist_survey']; ?> </td>
                                                                <td><?php echo $row['Text_survey']; ?> </td>
                                                                <td><?php echo $row['Title_constat']; ?> </td>
                                                                
                                                            </tr>
                                                    <?php
                                                        }
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>



                                    <!------End Table Report------->

                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!--?php include "/../Footer.php"; ?-->