<style>
    /*********************************************************** */
    .nav-tabs.nav-tabs-solid>li>a.active0,
    .nav-tabs.nav-tabs-solid>li>a.active0:hover,
    .nav-tabs.nav-tabs-solid>li>a.active0:focus {
        background-color: #009efb;
        border-color: #009efb;
        color: #fff;
        width: 150px;
        text-align: center;
    }

    .nav-tabs.nav-tabs-solid>li>a.active1,
    .nav-tabs.nav-tabs-solid>li>a.active1:hover,
    .nav-tabs.nav-tabs-solid>li>a.active1:focus {
        background-color: #dc301c;
        border-color: #dc301c;
        color: #fff;
        width: 150px;
        text-align: center;
    }

    .nav-tabs.nav-tabs-solid>li>a.active2,
    .nav-tabs.nav-tabs-solid>li>a.active2:hover,
    .nav-tabs.nav-tabs-solid>li>a.active2:focus {
        background-color: #ccdc4b;
        border-color: #ccdc4b;
        color: #fff;
        width: 150px;
        text-align: center;
    }

    .nav-tabs.nav-tabs-solid>li>a.active3,
    .nav-tabs.nav-tabs-solid>li>a.active3:hover,
    .nav-tabs.nav-tabs-solid>li>a.active3:focus {
        background-color: #fcb348;
        border-color: #fcb348;
        color: #fff;
        width: 150px;
        text-align: center;
    }

    .nav-tabs.nav-tabs-solid>li>a.active4,
    .nav-tabs.nav-tabs-solid>li>a.active4:hover,
    .nav-tabs.nav-tabs-solid>li>a.active4:focus {
        background-color: #fd6694;
        border-color: #fd6694;
        color: #fff;
        width: 150px;
        text-align: center;
    }

    /************************************************************ */
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
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="card-title">Risk Control Tool</h4>
                        <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                            <li class="nav-item"><a class="nav-link active0" href="#solid-rounded-tab1" data-toggle="tab">Identification</a></li>
                            <li class="nav-item"><a class="nav-link active1" href="#solid-rounded-tab2" data-toggle="tab">Evaluation</a></li>
                            <li class="nav-item"><a class="nav-link active2" href="#solid-rounded-tab3" data-toggle="tab">Analysis</a></li>
                            <li class="nav-item"><a class="nav-link active3" href="#solid-rounded-tab4" data-toggle="tab">Assessment</a></li>
                            <li class="nav-item"><a class="nav-link active4" href="#solid-rounded-tab5" data-toggle="tab">Actions</a></li>

                        </ul>
                        <div class="tab-content">
                            <?php if (($identification) == null) {
                                echo "no data";
                            } else { ?>
                                <div class="tab-pane show active" id="solid-rounded-tab1">
                                    <div class="activity-user">
                                        <a href="profile.html" title="" data-toggle="tooltip" class="avatar" data-original-title="Lesley Grauer">
                                            <img alt="Lesley Grauer" src="<?php echo base_url() ?>/uploads/Company/default_profile.jpg" class="img-fluid rounded-circle">
                                        </a><a href="profile.html" class="name"></a> Responsable : <a href="#"><?php echo $Name_employee . ' ' . $Lastname_employee ?></a>


                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Details</a>
                                                            <div>Description : <?php echo $Description_identification ?></div>
                                                            <div>Activity : <?php echo $Activity_identification ?></div>

                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Method</a>
                                                            <div><?php echo $Metaphor_identification_method . ' : ' . $Title_identification_method ?></div>
                                                            <span class="time">
                                                                <a href="<?php echo base_url() ?>/uploads/file/<?php echo $File_identification ?>">Open File</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="tab-pane" id="solid-rounded-tab2">
                                <?php if (($evaluation) == null) {
                                    echo "no data";
                                } else { ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">

                                            <tbody>
                                                <tr>
                                                    <th>Gravity</th>
                                                    <td><?php echo $Value_gravity . ' : ' . $Title_gravity  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Probability</th>
                                                    <td><?php echo $Value_probability . ' : ' . $Title_probability  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Detectibility</th>
                                                    <td><?php echo $Value_detectability . ' : ' . $Title_detectability  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Priority</th>
                                                    <td><?php echo $Priority_evaluation  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Criticality</th>
                                                    <td><?php echo $Criticality_evaluation ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Next Evaluation</th>
                                                    <td><?php echo $Next_date_evaluation ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane" id="solid-rounded-tab3">
                                <?php if (($analysis) == null) {
                                    echo "no data";
                                } else { ?>
                                    <div class="row">
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Details</a>
                                                            <div>Cause : <?php echo $Cause_analysis ?></div>
                                                            <div>Consequence : <?php echo $Consequence_analysis ?></div>

                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Method</a>
                                                            <div><?php echo $Metaphor_analysis_method . ' : ' . $Title_analysis_method ?></div>
                                                            <span class="time">
                                                                <a href="<?php echo base_url() ?>/uploads/file/<?php echo $File_analysis ?>">Open File</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane" id="solid-rounded-tab4">
                                <?php if (($assessment) == null) {
                                    echo "no data";
                                } else { ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">

                                            <tbody>
                                                <tr>
                                                    <th>Probability</th>
                                                    <td><?php echo $Value_probability . ' : ' . $Title_probability  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Severity</th>
                                                    <td><?php echo $Value_severity . ' : ' . $Title_severity  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Detectibility</th>
                                                    <td><?php echo $Value_detectability . ' : ' . $Title_detectability  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Result</th>
                                                    <td><?php echo $Result_assessment  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Value</th>
                                                    <td><?php echo $Value_assessment . ' ' . $Title_unit ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane" id="solid-rounded-tab5">
                                <?php if (($action) == null) {
                                    echo "no data";
                                } else { ?>
                                    <div class="row">
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Name Action List</a>
                                                            <div><?php echo $Name_action ?></div>

                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Details</a>
                                                            <div>Response : <?php echo $Title_response ?></div>
                                                            <div>Description : <?php echo $Description_action ?></div>


                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <?php
                                                            if (isset($empty)) {
                                                            ?>
                                                                <p> Action List is Empty !! </p>
                                                            <?php } else { ?>

                                                                <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                                    <thead>
                                                                        <tr role="row">
                                                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Inticipation</th>
                                                                            <th>Critère Evaluation Efficacité</th>
                                                                            <th>Resultat </th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>


                                                                        <?php
                                                                        if (isset($actionlist)) {

                                                                            foreach ($actionlist as $row) {
                                                                        ?>
                                                                                <tr role="row" class="odd">

                                                                                    <td class="sorting_1"><?php echo $row['Real_value_action_list'] ?></td>
                                                                                    <td><?php echo $row['Efficacity_action_list'] ?></td>
                                                                                    <td class="table-success"><?php echo $row['Result_action_list'] ?></td>


                                                                                </tr>
                                                                            <?php
                                                                            } ?>
                                                                    </tbody>
                                                                </table>
                                                        <?php
                                                                        }
                                                                    } ?>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top:2%">
                                                        <div class="col-sm-12 col-md-5">
                                                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite"> </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-7">
                                                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                                <!-------------------------------PAGING------------------------------------->

                                                                <!----------------------------End PAGING------------------------------------>
                                                                <ul class="pagination">
                                                                    <?php
                                                                    //   $nb = 0;
                                                                    for ($i = 1; $i < $nb + 1; $i++) {
                                                                        /****************** No page selected **************** */
                                                                        if (!isset($_GET['page'])) {
                                                                            if ($i == 1) {
                                                                    ?>
                                                                                <li class="paginate_button page-item active"><a href="?page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <li class="paginate_button page-item"><a href="?page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                                                            <?php
                                                                            }
                                                                        }
                                                                        /************** End No page selected **************** */
                                                                        /****************** Selected page **************** */
                                                                        if (isset($_GET['page'])) {
                                                                            if ($i == $_GET['page']) {
                                                                            ?>
                                                                                <li class="paginate_button page-item active"><a href="?page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <li class="paginate_button page-item"><a href="?page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                                                    <?php
                                                                            }
                                                                        }
                                                                        /************** End Selected page **************** */
                                                                    }

                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>