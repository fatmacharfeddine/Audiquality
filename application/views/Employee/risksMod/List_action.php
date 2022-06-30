<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Action List</h4>
                </div>

            </div>
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
                                                    <th>Critère de l'évaluation de l'efficacité</th>
                                                    <th>Date </th>

                                                    <th colspan="4">Action Corrective</th>

                                                </tr>
                                                <tr role="row">
                                                    <th colspan="2"></th>
                                                    <th>Resultat</th>

                                                    <th>Type Action</th>
                                                    <th>Valeur Réelle</th>
                                                    <th>Valeur Cible</th>

                                                    <th>Périodicité</th>
                                                    <th>Durée Exécution</th>

                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php
                                                if (isset($actionlist)) {

                                                    foreach ($actionlist as $row) {
                                                ?>
                                                        <tr role="row" class="odd">

                                                            <td class="sorting_1"><?php echo $row['Efficacity_action_list'] ?></td>
                                                            <td><?php echo date("d-m-Y", strtotime($row['Date_action_list'])) ?></td>
                                                            <?php if (($row['Result_action_list']) == "") { ?>
                                                                <td class="table-warning" colspan="5">
                                                                    <center><span class="custom-badge status-grey">en attente</span></center>
                                                                </td>
                                                                <td>
                                                                <a href="<?php echo base_url() ?>/Employee_Account/Form_fill_risk_action_list?ID_action_list=<?php echo $row['ID_action_list'] ?>&ID_action=<?php echo $row['ID_action'] ?>" class="btn btn btn-primary btn-rounded float-right">
                                                                    <i class="fa fa-window-restore"></i>
                                                                </a>
                                                            </td>
                                                            <?php     } else { ?>

                                                                <td class="table-success"><?php echo $row['Result_action_list'] ?></td>
                                                                <td class="table-success"><?php echo $row['Title_type'] ?></td>
                                                                <td class="table-success"><?php echo $row['Real_value_action_list'] ?></td>
                                                                <td class="table-success"><?php echo $row['Cible_value_action_list'] ?></td>
                                                                <td class="table-success"><?php echo $row['Title_execute'] ?></td>

                                                                <td class="table-success"><?php echo $row['execute_action_list'] ?></td>

                                                            <?php } ?>
                                                           

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
        </div>
    </div>