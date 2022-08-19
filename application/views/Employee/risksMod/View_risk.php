<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/octicons/4.4.0/font/octicons.css'>
<link rel="stylesheet" href="<?php echo base_url() ?>includes/ext/assets/template/css/style-step.css">


<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap" style="height: 100px;width: 100px;">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="<?php echo base_url() ?>/uploads/processus/<?php echo $Photo_processus; ?>" alt="" style="height: 100px;width: 100px;"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0"><?php echo $Title_processus; ?></h3>

                                            <div class="staff-id">Responsable : <?php echo $Name_employee . ' ' . $Lastname_employee; ?></div>
                                            <div class="staff-msg"><a href="<?php echo base_url() ?>/Employee_Account/Generate_report_risk?ID_risk=<?php echo $ID_risk ?>" class="btn btn-primary" style="background-color: #eb1c24">Generate Report</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">



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
            <ul class="cd-breadcrumb triangle nav nav-tabs" role="tablist">
                <li role="presentation" class="active" style="margin: 0 1px 0 0;">
                    <a style="width: 240px;" href="#Ideate" aria-controls="ideate" role="tab" data-toggle="tab" aria-expanded="true">
                        <span class="octicon octicon-diff-added"></span>Identification du risque
                    </a>
                </li>
                <li role="presentation" class="" style="margin: 0 1px 0 0;">
                    <a style="width: 230px;" href="#Submit" aria-controls="submit" role="tab" data-toggle="tab" aria-expanded="false">
                        <span class="octicon octicon-tools"></span>Evaluation

                    </a>
                </li>
                <li role="presentation" class="" style="margin: 0 1px 0 0;">
                    <a style="width: 230px;" href="#Discuss" aria-controls="discuss" role="tab" data-toggle="tab" aria-expanded="false">
                        <span class="octicon octicon-comment-discussion"></span>Plan d'action
                    </a>
                </li>
                <!--li role="presentation" class="" style="margin: 0 1px 0 0;">
                    <a href="#GetValidated" aria-controls="get-validated" role="tab" data-toggle="tab" aria-expanded="false">
                        <span class="octicon octicon-light-bulb"></span>Risque résidentiel
                    </a>
                </li-->
                <!--li role="presentation" class="" style="margin: 0 1px 0 0;">
                    <a style="width: 230px;" href="#Work" aria-controls="work" role="tab" data-toggle="tab" aria-expanded="false">
                        <span class="octicon octicon-verified"></span>Processus
                    </a>
                </li-->
            </ul>
            <div class="tab-content">
                <!-------------------------------------------------------------->
                <!-------------------------------------------------------------->
                <!----------------------Identification-------------------------->
                <!-------------------------------------------------------------->
                <!-------------------------------------------------------------->

                <div role="tabpanel" class="tab-pane active" id="Ideate">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Enjeu</th>
                                        <!--th-- class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Responsable</!--th-->
                                        <th colspan="5" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Risque</th>
                                    </tr>
                                    <tr role="row">
                                        <th colspan="1" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;"></th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Description Enjeu</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Type Enjeu</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Description Risk</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (isset($risk_identif)) {

                                        foreach ($risk_identif as $row) {
                                    ?>
                                            <tr role="row" class="odd">



                                                <td class="sorting_1"><?php echo $row['Code_identification'] . ' : ' . $row['Text_enjeu'] ?> </td>
                                                <!--td class="sorting_1">
                                                    <?php echo $row['Name_employee'] . ' ' . $row['Lastname_employee'] . ' (Processus:' . $row['Title_processus'] . ')' ?>
                                                </!--td-->
                                                <td class="sorting_1">
                                                    <?php echo $row['Description_enjeu'] ?>
                                                </td>
                                                <td class="sorting_1">
                                                    <?php
                                                    if ($row['ID_swot'] == 1) {
                                                    ?>
                                                        <p style="color:green"> Force </p>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($row['ID_swot'] == 2) {
                                                    ?>
                                                        <p style="color:red"> Faiblesse </p>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($row['ID_swot'] == 3) {
                                                    ?>
                                                        <p style="color:red"> Menace </p>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($row['ID_swot'] == 4) {
                                                    ?>
                                                        <p style="color:green"> Opportunité </p>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td class="sorting_1">
                                                    <?php echo $row['Description_identification'] ?>
                                                </td>
                                                <td class=" text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_risk_identify?ID_identification=<?php echo $row['ID_identification'] ?>&ID_risk=<?php echo $ID_risk ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_risk_identification?ID_identification=<?php echo $row['ID_identification'] ?>&ID_risk=<?php echo $ID_risk ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>


                                            </tr>
                                    <?php }
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="5">
                                            <a href="<?php echo base_url() ?>Employee_Account/Form_add_risk_identify?ID_risk=<?php echo $ID_risk ?>">
                                                <button class="btn btn-primary btn-primary-two float-right"> + Nouveau Risque</button>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-------------------------------------------------------------->
                <!-------------------------------------------------------------->
                <!----------------------Evaluation------------------------------>
                <!-------------------------------------------------------------->
                <!-------------------------------------------------------------->
                <div role="tabpanel" class="tab-pane" id="Submit">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Risque</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Gravité</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Probabilité</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Criticité</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Priorité</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($risk_identif)) {
                                        if ($evaluation_row != null) {
                                            $exist_eval = array();
                                            foreach ($evaluation_row as $row) {

                                                foreach ($evaluation_row as $row2) {

                                                    if ($row['ID_identification'] == $row2['ID_identification']) {
                                                        array_push($exist_eval, $row['ID_identification']);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    //  foreach ($exist_eval as $row) {
                                    //    echo 'gggg' . $row . 'fff';
                                    //   }

                                    ?>
                                    <?php
                                    if (isset($risk_identif)) {

                                        foreach ($risk_identif as $row) {
                                    ?>
                                            <tr role="row" class="odd">


                                                <?php
                                                if ($row['ID_swot'] == 1) {
                                                ?>
                                                    <td class="sorting_1" style="color:green"><?php echo $row['Code_identification'] . ' : ' . $row['Text_enjeu'] ?> </td>

                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($row['ID_swot'] == 2) {
                                                ?>
                                                    <td class="sorting_1" style="color:red"><?php echo $row['Code_identification'] . ' : ' . $row['Text_enjeu'] ?> </td>

                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($row['ID_swot'] == 3) {
                                                ?>
                                                    <td class="sorting_1" style="color:red"><?php echo $row['Code_identification'] . ' : ' . $row['Text_enjeu'] ?> </td>

                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($row['ID_swot'] == 4) {
                                                ?>
                                                    <td class="sorting_1" style="color:green"><?php echo $row['Code_identification'] . ' : ' . $row['Text_enjeu'] ?> </td>

                                                <?php
                                                }
                                                ?>



                                                <?php if ($evaluation_row == null) { ?>
                                                    <td colspan="4">

                                                        <?php if ($row['ID_swot'] == 2 || $row['ID_swot'] == 3) { ?>
                                                            <a href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_evaluation?ID_risk=<?php echo $ID_risk ?>&ID_identification=<?php echo $row['ID_identification'] ?>" style="width: 200px; background-color: #dc301c;" class="btn btn-primary btn-rounded">Evaluation</a>

                                                        <?php } else {
                                                        ?>
                                                            <a href="<?php echo base_url() ?>/Employee_Account/Form_add_opportunity_evaluation?ID_risk=<?php echo $ID_risk ?>&ID_identification=<?php echo $row['ID_identification'] ?>" style="width: 200px; background-color: #dc301c;" class="btn btn-primary btn-rounded">Evaluation</a>

                                                        <?php } ?>
                                                    </td>
                                                    <?php } else {
                                                    if (in_array($row['ID_identification'], $exist_eval)) {
                                                        foreach ($evaluation_row as $row2) {

                                                            if ($row['ID_identification'] == $row2['ID_identification']) { ?>
                                                                <?php
                                                                $style = "";
                                                                if (($row2['Criticality_evaluation'] == 1) || ($row2['Criticality_evaluation'] == 2) || ($row2['Criticality_evaluation'] == 3)) {
                                                                    $style = "background-color:green";
                                                                }
                                                                if (($row2['Criticality_evaluation'] == 4) || ($row2['Criticality_evaluation'] == 6)) {
                                                                    $style = "background-color:yellow";
                                                                }
                                                                if (($row2['Criticality_evaluation'] == 8) || ($row2['Criticality_evaluation'] == 9) || ($row2['Criticality_evaluation'] == 12) || ($row2['Criticality_evaluation'] == 16)) {
                                                                    $style = "background-color:red";
                                                                }
                                                                ?>
                                                                <td>
                                                                    <?php echo $row2['Gavity_evaluation'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row2['Probability_evaluation'] ?>
                                                                </td>
                                                                <td>
                                                                    <h3 style="background-color:green;color: black;padding: 5px;border: 1px solid black;border-radius: 50px;width: 50px;text-align: center;<?php echo $style ?>">

                                                                        <?php echo $row2['Criticality_evaluation'] ?>
                                                                    </h3>
                                                                </td>
                                                                <td>

                                                                    <h3 style="background-color:green;color: black;padding: 5px;border:solid 1px black;width: 150px;text-align: center;<?php echo $style ?>">

                                                                        <?php echo $row2['Priority_evaluation'] ?>
                                                                    </h3>
                                                                </td>
                                                                <td class=" text-right">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <?php if ($row['ID_swot'] == 2 || $row['ID_swot'] == 3) { ?>

                                                                                <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_risk_evaluation?ID_identification=<?php echo $row['ID_identification'] ?>&ID_risk=<?php echo $ID_risk ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                            <?php } else if ($row['ID_swot'] == 1 || $row['ID_swot'] == 4) {

                                                                          
                                                                            ?>
                                                                                <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_opportunity_evaluation?ID_identification=<?php echo $row['ID_identification'] ?>&ID_risk=<?php echo $ID_risk ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>


                                                                            <?php
                                                                            } ?> <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_risk_evaluation?ID_identification=<?php echo $row['ID_identification'] ?>&ID_risk=<?php echo $ID_risk ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                        <?php }
                                                        }
                                                    } else { ?>
                                                        <td colspan="5">
                                                            <?php if ($row['ID_swot'] == 2 || $row['ID_swot'] == 3) { ?>
                                                                <a href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_evaluation?ID_risk=<?php echo $ID_risk ?>&ID_identification=<?php echo $row['ID_identification'] ?>" style="width: 200px; background-color: #dc301c;" class="btn btn-primary btn-rounded">Evaluation</a>

                                                            <?php } else {
                                                            ?>
                                                                <a href="<?php echo base_url() ?>/Employee_Account/Form_add_opportunity_evaluation?ID_risk=<?php echo $ID_risk ?>&ID_identification=<?php echo $row['ID_identification'] ?>" style="width: 200px; background-color: #dc301c;" class="btn btn-primary btn-rounded">Evaluation</a>

                                                            <?php } ?>
                                                        </td>
                                                <?php     }
                                                } ?>





                                            </tr>
                                    <?php }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-------------------------------------------------------------->
                <!-------------------------------------------------------------->
                <!----------------------Action Plan----------------------------->
                <!-------------------------------------------------------------->
                <!-------------------------------------------------------------->
                <div role="tabpanel" class="tab-pane" id="Discuss">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Risque</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Action Plan</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($risk_identif)) {
                                        if ($action_row != null) {
                                            $axist_action = array();
                                            foreach ($action_row as $row) {

                                                foreach ($action_row as $row2) {

                                                    if ($row['ID_identification'] == $row2['ID_identification']) {
                                                        array_push($axist_action, $row['ID_identification']);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    //  foreach ($axist_action as $row) {
                                    //    echo 'gggg' . $row . 'fff';
                                    //   }

                                    ?>
                                    <?php
                                    if (isset($risk_identif)) {

                                        foreach ($risk_identif as $row) {
                                    ?>
                                            <tr role="row" class="odd">


                                                <?php
                                                if ($row['ID_swot'] == 1) {
                                                ?>
                                                    <td class="sorting_1" style="color:green"><?php echo $row['Code_identification'] . ' : ' . $row['Text_enjeu'] ?> </td>

                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($row['ID_swot'] == 2) {
                                                ?>
                                                    <td class="sorting_1" style="color:red"><?php echo $row['Code_identification'] . ' : ' . $row['Text_enjeu'] ?> </td>

                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($row['ID_swot'] == 3) {
                                                ?>
                                                    <td class="sorting_1" style="color:red"><?php echo $row['Code_identification'] . ' : ' . $row['Text_enjeu'] ?> </td>

                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($row['ID_swot'] == 4) {
                                                ?>
                                                    <td class="sorting_1" style="color:green"><?php echo $row['Code_identification'] . ' : ' . $row['Text_enjeu'] ?> </td>

                                                <?php
                                                }
                                                ?>




                                                <?php if ($action_row == null) { ?>
                                                    <td>
                                                        <a href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_action?ID_risk=<?php echo $ID_risk ?>&ID_identification=<?php echo $row['ID_identification'] ?>" style="width: 200px;background-color: #fd6694;" class="btn btn-primary btn-rounded">Action</a>
                                                    </td>
                                                    <?php } else {
                                                    if (in_array($row['ID_identification'], $axist_action)) {
                                                        foreach ($action_row as $row2) {

                                                            if ($row['ID_identification'] == $row2['ID_identification']) { ?>
                                                                <?php if (isset($actionlist_row)) { ?>
                                                                    <td>
                                                                        <table>
                                                                            <thead>
                                                                                <tr role="row">
                                                                                    <th>Critère Evaluation de l'Efficacité</th>
                                                                                    <th>Date</th>
                                                                                    <th>Resultat</th>
                                                                                    <th>Valeur Réelle</th>
                                                                                    <th>Valeur Cible</th>

                                                                                </tr>
                                                                            </thead>
                                                                            <?php foreach ($actionlist_row as $row3) {
                                                                                if ($row3['ID_action'] == $row2['ID_action']) { ?>

                                                                                    <tbody>
                                                                                        <tr>

                                                                                            <td>
                                                                                                <?php echo $row3['Efficacity_action_list'] ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?php echo $row3['Date_action_list'] ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?php echo $row3['Result_action_list'] ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?php echo $row3['Real_value_action_list'] ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?php echo $row3['Cible_value_action_list'] ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                            <?php     }
                                                                            } ?>
                                                                        </table>
                                                                    </td>

                                                                <?php  } else { ?>
                                                                    <td> aucune action
                                                                    </td>

                                                                <?php } ?>
                                                                <td class=" text-right">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_add_risk_action_list?ID_identification=<?php echo $row['ID_identification'] ?>&ID_risk=<?php echo $ID_risk ?>&ID_action=<?php echo $row2['ID_action'] ?>"><i class="fa fa-pencil m-r-5"></i> Add Action</a>
                                                                            <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_risk_action?ID_identification=<?php echo $row['ID_identification'] ?>&ID_risk=<?php echo $ID_risk ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                            <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_risk_action?ID_identification=<?php echo $row['ID_identification'] ?>&ID_risk=<?php echo $ID_risk ?>&ID_action=<?php echo $row2['ID_action'] ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                        <?php       }
                                                        }
                                                    } else { ?>
                                                        <td colspan="2">
                                                            <a href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_action?ID_risk=<?php echo $ID_risk ?>&ID_identification=<?php echo $row['ID_identification'] ?>" style="width: 200px;background-color: #fd6694;" class="btn btn-primary btn-rounded">Action</a>
                                                        </td>
                                                <?php     }
                                                } ?>





                                            </tr>
                                    <?php }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-------------------------------------------------------------->
                <!-------------------------------------------------------------->
                <!----------------------Risk Residentiel------------------------>
                <!-------------------------------------------------------------->
                <!-------------------------------------------------------------->
                <!--div role="tabpanel" class="tab-pane" id="GetValidated">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Risque</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">G'</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">P'</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">D'</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">RR</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($risk_identif)) {
                                        if ($residential_row != null) {
                                            $exist_residential = array();
                                            foreach ($residential_row as $row) {

                                                foreach ($residential_row as $row2) {

                                                    if ($row['ID_identification'] == $row2['ID_identification']) {
                                                        array_push($exist_residential, $row['ID_identification']);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    //  foreach ($exist_residential as $row) {
                                    //    echo 'gggg' . $row . 'fff';
                                    //   }

                                    ?>
                                    <?php
                                    if (isset($risk_identif)) {

                                        foreach ($risk_identif as $row) {
                                    ?>
                                            <tr role="row" class="odd">



                                                <td class="sorting_1"><?php echo $row['Code_identification'] . ' : ' . $row['Text_enjeu'] ?> </td>




                                                <?php if ($residential_row == null) { ?>
                                                    <td colspan="4">
                                                        <a href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_residential?ID_risk=<?php echo $ID_risk ?>&ID_identification=<?php echo $row['ID_identification'] ?>" style="width: 200px;background-color: #ccdc4b;" class="btn btn-primary btn-rounded">residential</a>
                                                    </td>
                                                    <?php } else {
                                                    if (in_array($row['ID_identification'], $exist_residential)) {
                                                        foreach ($residential_row as $row2) {

                                                            if ($row['ID_identification'] == $row2['ID_identification']) { ?>
                                                                <td>
                                                                    <?php echo $row2['Gavity_residential'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row2['Probability_residential'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row2['Detectability_residential'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row2['RR_residential'] ?>
                                                                </td>

                                                        <?php }
                                                        }
                                                    } else { ?>
                                                        <td colspan="4">
                                                            <a href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_residential?ID_risk=<?php echo $ID_risk ?>&ID_identification=<?php echo $row['ID_identification'] ?>" style="width: 200px;background-color: #ccdc4b;" class="btn btn-primary btn-rounded">residential</a>
                                                        </td>
                                                <?php     }
                                                } ?>


                                                <td class=" text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_risk"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_risk"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>


                                            </tr>
                                    <?php }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div-->
                <!-------------------------------------------------------------->
                <!-------------------------------------------------------------->
                <!----------------------Survey---------------------------------->
                <!-------------------------------------------------------------->
                <!-------------------------------------------------------------->
                <!--div role="tabpanel" class="tab-pane" id="Work">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Risque</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Date Cible</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Date Réelle</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Processus</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($risk_identif)) {
                                        if ($risk_processus_row != null) {
                                            $exist_risk_processus = array();
                                            foreach ($risk_processus_row as $row) {

                                                foreach ($risk_processus_row as $row2) {

                                                    if ($row['ID_identification'] == $row2['ID_identification']) {
                                                        array_push($exist_risk_processus, $row['ID_identification']);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    //  foreach ($exist_risk_processus as $row) {
                                    //    echo 'gggg' . $row . 'fff';
                                    //   }

                                    ?>
                                    <?php
                                    if (isset($risk_identif)) {

                                        foreach ($risk_identif as $row) {
                                    ?>
                                            <tr role="row" class="odd">



                                                <td class="sorting_1"><?php echo $row['Code_identification'] . ' : ' . $row['Text_enjeu'] ?> </td>




                                                <?php if ($risk_processus_row == null) { ?>
                                                    <td colspan="3">
                                                        <a href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_processus?ID_risk=<?php echo $ID_risk ?>&ID_identification=<?php echo $row['ID_identification'] ?>" style="width: 200px;background-color: #fcb348;" class="btn btn-primary btn-rounded">risk_processus</a>
                                                    </td>
                                                    <?php } else {
                                                    if (in_array($row['ID_identification'], $exist_risk_processus)) {
                                                        foreach ($risk_processus_row as $row2) {

                                                            if ($row['ID_identification'] == $row2['ID_identification']) { ?>
                                                                <td>
                                                                    <?php echo $row2['Date_cible_risk_processus'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row2['Date_reel_risk_processus'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row2['Title_processus'] ?>
                                                                </td>

                                                        <?php }
                                                        }
                                                    } else { ?>
                                                        <td colspan="3">
                                                            <a href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_processus?ID_risk=<?php echo $ID_risk ?>&ID_identification=<?php echo $row['ID_identification'] ?>" style="width: 200px;background-color: #fcb348;" class="btn btn-primary btn-rounded">risk_processus</a>
                                                        </td>
                                                <?php     }
                                                } ?>


                                                <td class=" text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_risk"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_risk"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>


                                            </tr>
                                    <?php }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div-->
            </div>
        </div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>