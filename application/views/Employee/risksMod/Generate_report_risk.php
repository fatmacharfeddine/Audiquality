<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/octicons/4.4.0/font/octicons.css'>
<link rel="stylesheet" href="<?php echo base_url() ?>includes/ext/assets/template/css/style-step.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    div.scrollmenu {
        background-color: #333;
        overflow: auto;
        white-space: nowrap;
    }

    div.scrollmenu a {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px;
        text-decoration: none;
    }

    div.scrollmenu a:hover {
        background-color: #777;
    }
</style>

<body>



    <div class="page-wrapper" style="min-height: 314px;">
        <div class="col-sm-7 col-8 text-right m-b-30">
            <div class="btn-group btn-group-sm">
                <button class="btn btn-white" onclick="printDiv('printMe')"><i class="fa fa-print fa-lg"></i> Print</button>
            </div>
        </div>

        <div class="content" id="printMe">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><strong>Processus</strong> <span class="float-right"><?php echo $Title_processus; ?></span></td>
                    </tr>
                    <tr>
                        <td><strong>Responsable</strong> <span class="float-right"><strong><?php echo $Name_employee . ' ' . $Lastname_employee; ?></strong></span></td>
                    </tr>
                    <tr>
                        <td><strong>Date</strong> <span class="float-right"><strong><?php echo $Date_risk; ?></strong></span></td>
                    </tr>

                </tbody>
            </table>

            <div role="tabpanel" class="scrollmenu">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Identification</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Evaluation</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Plan d'action</th>


                                </tr>
                            </thead>
                            <tbody>

                                <tr role="row" class="odd">
                                    <td>
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
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Recommendation</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Description Risk</th>
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
                                                                <?php echo $row['Corrective_enjeu'] ?>
                                                            </td>
                                                            <td class="sorting_1">
                                                                <?php echo $row['Description_identification'] ?>
                                                            </td>



                                                        </tr>
                                                <?php }
                                                }
                                                ?>

                                            </tbody>
                                        </table>

                                    </td>
                                    <td>
                                        <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Risque</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Gravité</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Probabilité</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Criticité</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Priorité</th>
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



                                                            <td class="sorting_1"><?php echo $row['Code_identification'] . ' : ' . $row['Text_enjeu'] ?> </td>




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

                                                                    <?php }
                                                                    }
                                                                } else { ?>
                                                                    <td colspan="4">
                                                                        <?php if ($row['ID_swot'] == 2 || $row['ID_swot'] == 3) { ?>
                                                                            Non Définie !!

                                                                        <?php } else {
                                                                        ?>
                                                                            Non Définie !!
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
                                    </td>

                                    <td>
                                        <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Risque</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;">Action Plan</th>
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



                                                            <td class="sorting_1"><?php echo $row['Code_identification'] . ' : ' . $row['Text_enjeu'] ?> </td>




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

                                                                    <?php       }
                                                                    }
                                                                } else { ?>
                                                                    <td colspan="1">
                                                                        Non Définie !! </td>
                                                            <?php     }
                                                            } ?>





                                                        </tr>
                                                <?php }
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </td>

                                </tr>

                            </tbody>
                        </table>

                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>


        <script>
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;

            }
        </script>