<style>
    .editeval {
        border-color: #009efb;
        color: #009efb;
        width: 200px;
        background-color: #fbfbfb;
    }

    .editanalys {
        border-color: #ccdc4b;
        color: #ccdc4b;
        width: 200px;
        background-color: #fbfbfb;
    }

    .editestim {
        border-color: #fcb348;
        color: #fcb348;
        width: 200px;
        background-color: #fbfbfb;
    }

    .editaction {
        border-color: #fd6694;
        color: #fd6694;
        width: 200px;
        background-color: #fbfbfb;
    }
</style>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="<?php echo base_url() ?>/uploads/risk/<?php echo $Picture_process; ?>" alt=""></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0"><?php echo $Name_process; ?></h3>
                                            <small class="text-muted"><i class="fa fa-building"></i>
                                                <?php echo $Name_department; ?>
                                            </small>
                                            <div class="staff-id">Responsable : <?php echo $Name_employee . ' ' . $Lastname_employee; ?></div>
                                            <br>
                                            <div class="activity-user">
                                                <a href="profile.html" title="" data-toggle="tooltip" class="avatar" data-original-title="Lesley Grauer">
                                                    <img alt="Lesley Grauer" src="<?php echo base_url() ?>/uploads/risk/sector.jpg" class="img-fluid rounded-circle">
                                                    <a href="profile.html" class="name"></a> Sector : <a href="#">HR</a>

                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Field :</span>
                                                <span class="text"><a href="#"><?php echo $Title_field; ?></a></span>
                                            </li>
                                            <li>
                                                <span class="title">Business Unit :</span>
                                                <span class="text"><a href="#"><?php echo $Business_unit_risk; ?></a></span>
                                            </li>
                                            <li>
                                                <span class="title">Goal :</span>
                                                <span class="text"><?php echo $Goal_risk; ?></span>
                                            </li>
                                            <li>
                                                <span class="title">Date :</span>
                                                <span class="text"><?php echo $Date_risk; ?></span>
                                            </li>
                                            <li>
                                                <span class="title">Next Evaluation:</span>
                                                <span class="text"><?php echo $Next_date_risk; ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <a href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_identify?ID_risk=<?php echo $ID_risk ?>&ID_sector=<?php echo $ID_sector ?>" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Identity new Risk </a>
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card member-panel">

                            <div class="card-body">
                                <div class="roles-menu" style="margin-top: 0px;">
                                    <ul>
                                        <?php
                                        if (isset($empty)) { ?>
                                            <p> Risk list is empty </p>
                                            <?php } else {
                                            foreach ($risk_identif as $row) {
                                                if ($row['ID_identification'] == $current_identification) { ?>
                                                    <li class="active">
                                                        <a href="javascript:void(0);"><?php echo $row['Activity_identification'] ?></a>
                                                        <span class="role-action">
                                                            <a href="<?php echo base_url(); ?>Employee_Account/View_risk_identif?ID_identification=<?php echo $row['ID_identification'] ?>">
                                                                <span class="action-circle large">
                                                                    <i class="fa fa-search" style="color:#ccc"></i>
                                                                </span>
                                                            </a>
                                                            <a href="<?php echo base_url(); ?>Employee_Account/Form_edit_risk_identify?ID_identification=<?php echo $row['ID_identification'] ?>">
                                                                <span class="action-circle large">
                                                                    <i class="material-icons">edit</i>
                                                                </span>
                                                            </a>
                                                            <a href="<?php echo base_url(); ?>Employee_Account/Delete_risk_identification?ID_identification=<?php echo $row['ID_identification'] ?>&ID_risk=<?php echo $row['ID_risk'] ?>&ID_sector=<?php echo $row['ID_sector'] ?>">
                                                                <span class="action-circle large delete-btn">
                                                                    <i class="material-icons">delete</i>
                                                                </span>
                                                            </a>
                                                        </span>
                                                    </li>
                                                <?php } else { ?>
                                                    <li>
                                                        <a href="<?php echo base_url() ?>/Employee_Account/View_sector?ID_risk=<?php echo $row['ID_risk'] ?>&ID_sector=<?php echo $row['ID_sector'] ?>&ID_identification=<?php echo $row['ID_identification'] ?>">
                                                            <?php echo $row['Activity_identification'] ?>
                                                        </a>
                                                    </li>
                                        <?php }
                                            }
                                        } ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <h6 class="card-title m-b-20">Risk Management : </h6>
                    <div class="m-b-30">
                        <div class="experience-box">
                            <ul class="experience-list">
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Step 1 : </a>
                                            <div>
                                                <?php if (isset($empty)) { ?>
                                                    <a href="" style="width: 200px; background-color: #dc301c;" class="btn btn-primary btn-rounded">Evaluation</a>
                                                <?php } else { ?>
                                                    <?php
                                                    $exist_evaluation = 0;
                                                    foreach ($evaluation as $row) {
                                                        if ($row['ID_identification'] == $current_identification) {
                                                            $exist_evaluation = 1;
                                                    ?>
                                                    <?php }
                                                    } ?>
                                                    <?php if ($exist_evaluation == 0) { ?>
                                                        <a href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_evaluation?ID_risk=<?php echo $ID_risk ?>&ID_sector=<?php echo $ID_sector ?>&ID_identification=<?php echo $current_identification ?>" style="width: 200px; background-color: #dc301c;" class="btn btn-primary btn-rounded">Evaluation</a>

                                                    <?php } else if ($exist_evaluation == 1) { ?>
                                                        <a href="<?php echo base_url() ?>/Employee_Account/Form_edit_risk_evaluation?ID_risk=<?php echo $ID_risk ?>&ID_sector=<?php echo $ID_sector ?>&ID_identification=<?php echo $current_identification ?>" class="btn btn-primary btn-rounded editeval">Evaluation
                                                            <span class="action-circle large">
                                                                <i class="material-icons">edit</i>
                                                            </span></a>
                                                        <div class="dropdown profile-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(23px, 26px, 0px);">
                                                                <a class="dropdown-item" href="<?php echo base_url() ?>/Employee_Account/Delete_risk_evaluation?ID_risk=<?php echo $ID_risk ?>&ID_sector=<?php echo $ID_sector ?>&ID_identification=<?php echo $current_identification ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>

                                                                <!--form id="popup" action="" enctype="multipart/form-data" method="post">
                                                                <button class="dropdown-item" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                            </form-->

                                                            </div>
                                                        </div>
                                                <?php }
                                                } ?>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Step 2 : </a>
                                            <div>
                                                <?php if (isset($empty)) { ?>
                                                    <a href="" style="width: 200px;background-color: #ccdc4b;" class="btn btn-primary btn-rounded">Analysis</a>
                                                <?php } else { ?>
                                                    <?php
                                                    $exist_analysis = 0;
                                                    foreach ($analysis as $row) {
                                                        if ($row['ID_identification'] == $current_identification) {
                                                            $exist_analysis = 1;
                                                    ?>
                                                    <?php }
                                                    } ?>
                                                    <?php if ($exist_analysis == 0) { ?>
                                                        <a href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_analysis?ID_risk=<?php echo $ID_risk ?>&ID_sector=<?php echo $ID_sector ?>&ID_identification=<?php echo $current_identification ?>" style="width: 200px;background-color: #ccdc4b;" class="btn btn-primary btn-rounded">Analysis</a>

                                                    <?php } else if ($exist_analysis == 1) { ?>
                                                        <a href="<?php echo base_url() ?>/Employee_Account/Form_edit_risk_analysis?ID_risk=<?php echo $ID_risk ?>&ID_sector=<?php echo $ID_sector ?>&ID_identification=<?php echo $current_identification ?>" class="btn btn-primary btn-rounded editanalys">Analysis
                                                            <span class="action-circle large">
                                                                <i class="material-icons">edit</i>
                                                            </span></a>
                                                        <div class="dropdown profile-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(23px, 26px, 0px);">
                                                                <a class="dropdown-item" href="<?php echo base_url() ?>/Employee_Account/Delete_risk_analysis?ID_risk=<?php echo $ID_risk ?>&ID_sector=<?php echo $ID_sector ?>&ID_identification=<?php echo $current_identification ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>

                                                                <!--form id="popup" action="" enctype="multipart/form-data" method="post">
                                                                <button class="dropdown-item" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                            </form-->

                                                            </div>
                                                        </div>
                                                <?php }
                                                } ?>


                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Step 3 : </a>
                                            <div>
                                                <?php if (isset($empty)) { ?>
                                                    <a href="" style="width: 200px;background-color: #fcb348;" class="btn btn-primary btn-rounded">Estimation</a>
                                                <?php } else { ?>
                                                    <?php
                                                    $exist_action = 0;
                                                    foreach ($assessment as $row) {
                                                        if ($row['ID_identification'] == $current_identification) {
                                                            $exist_action = 1;
                                                    ?>
                                                    <?php }
                                                    } ?>
                                                    <?php if ($exist_action == 0) { ?>
                                                        <a href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_assessment?ID_risk=<?php echo $ID_risk ?>&ID_sector=<?php echo $ID_sector ?>&ID_identification=<?php echo $current_identification ?>" style="width: 200px;background-color: #fcb348;" class="btn btn-primary btn-rounded">Estimation</a>

                                                    <?php } else if ($exist_action == 1) { ?>
                                                        <a href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_evaluation?ID_risk=<?php echo $ID_risk ?>&ID_sector=<?php echo $ID_sector ?>&ID_identification=<?php echo $current_identification ?>" class="btn btn-primary btn-rounded editestim">Estimation
                                                            <span class="action-circle large">
                                                                <i class="material-icons">edit</i>
                                                            </span></a>
                                                        <div class="dropdown profile-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(23px, 26px, 0px);">
                                                                <a class="dropdown-item" href="<?php echo base_url() ?>/Employee_Account/Delete_risk_assessment?ID_risk=<?php echo $ID_risk ?>&ID_sector=<?php echo $ID_sector ?>&ID_identification=<?php echo $current_identification ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>

                                                                <!--form id="popup" action="" enctype="multipart/form-data" method="post">
                                                                <button class="dropdown-item" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                            </form-->

                                                            </div>
                                                        </div>
                                                <?php }
                                                } ?>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Step 4 : </a>
                                            <div>
                                                <?php if (isset($empty)) { ?>
                                                    <a href="" style="width: 200px;background-color: #fd6694;" class="btn btn-primary btn-rounded">Action</a>
                                                
                                                    <?php } else { ?>
                                                    <?php
                                                    $exist_action = 0;
                                                    foreach ($action as $row) {
                                                        if ($row['ID_identification'] == $current_identification) {
                                                            $exist_action = 1;
                                                    ?>
                                                    <?php }
                                                    } ?>
                                                    <?php if ($exist_action == 0) { ?>
                                                        <a href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_action?ID_risk=<?php echo $ID_risk ?>&ID_sector=<?php echo $ID_sector ?>&ID_identification=<?php echo $current_identification ?>" style="width: 200px;background-color: #fd6694;" class="btn btn-primary btn-rounded">Action</a>

                                                    <?php } else if ($exist_action == 1) { ?>
                                                        <a href="<?php echo base_url() ?>/Employee_Account/Form_edit_risk_action?ID_risk=<?php echo $ID_risk ?>&ID_sector=<?php echo $ID_sector ?>&ID_identification=<?php echo $current_identification ?>" class="btn btn-primary btn-rounded editaction">Action
                                                            <span class="action-circle large">
                                                                <i class="material-icons">edit</i>
                                                            </span></a>
                                                        <div class="dropdown profile-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(23px, 26px, 0px);">
                                                                <a class="dropdown-item" href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_action_list?ID_action=<?php echo $row['ID_action'] ?>&ID_risk=<?php echo $row['ID_risk'] ?>&ID_identification=<?php echo $row['ID_identification'] ?>&ID_sector=<?php echo $row['ID_sector'] ?>"><i class="fa fa-search m-r-5"></i> Action List</a>
                                                                <a class="dropdown-item" href="<?php echo base_url() ?>/Employee_Account/Delete_risk_action?ID_risk=<?php echo $ID_risk ?>&ID_sector=<?php echo $ID_sector ?>&ID_identification=<?php echo $current_identification ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>

                                                                <!--form id="popup" action="" enctype="multipart/form-data" method="post">
                                                                <button class="dropdown-item" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                            </form-->

                                                            </div>
                                                        </div>

                                                <?php }
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>


                <!--div class="row">

                    <div class="col-sm-12">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Risk Evaluation</th>
                                    <th class="text-center">Gravity</th>
                                    <th class="text-center">Possibility</th>
                                    <th class="text-center">Detectibility</th>
                                    <th class="text-center">Priority</th>
                                    <th class="text-center">Criticality</th>
                                    <th class="text-center"></th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Not enough stock</td>
                                    <td class="text-center">
                                        1
                                    </td>
                                    <td class="text-center">
                                        2
                                    </td>
                                    <td class="text-center">
                                        1
                                    </td>
                                    <td class="text-center">
                                        4
                                    </td>
                                    <td class="text-center">
                                        5
                                    </td>
                                    <td class="text-center">
                                        <a href="">
                                            <button class="btn btn-primary btn-primary-three float-right">Update</button>
                                        </a>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div-->
            </div>

        </div>

