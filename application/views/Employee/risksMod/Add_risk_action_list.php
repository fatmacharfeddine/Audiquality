<style>
    .cal-icon:after {
        background: none;
    }
</style>

<body>

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title"></h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo base_url() ?>/Employee_Account/View_risk?ID_risk=<?php echo $ID_risk ?>" class="btn btn-primary btn-rounded float-right">
                        << Back </a>
                </div>
            </div>
            <div class="row">
                <div class="card-box container">

                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_risk_action_list/" enctype="multipart/form-data" method="post">


                        <?php if (isset($ID_action_list)) {
                        ?>
                            <input type="hidden" name="ID_action_list" value="<?php echo $ID_action_list ?>">
                        <?php } ?>
                        <input type="hidden" name="ID_action" value="<?php echo $ID_action ?>">
                        <input type="hidden" name="ID_identification" value="<?php echo $ID_identification ?>">
                        <!--input type="hidden" name="ID_sector" value="<?php echo $ID_sector ?>"-->
                        <input type="hidden" name="ID_risk" value="<?php echo $ID_risk ?>">


                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Critère de l'évaluation de l'efficacité</label>
                                    <input type="text" name="Efficacity_action_list" value="<?php if (isset($Efficacity_action_list)) {
                                                                                                echo $Efficacity_action_list;
                                                                                            } ?>" placeholder="Efficacité" class="form-control floating">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Date</label>
                                    <input type="date" name="Date_action_list" value="<?php if (isset($Date_action_list)) {
                                                                                            echo $Date_action_list;
                                                                                        } ?>" placeholder="Date" class="form-control floating">

                                </div>
                            </div>
                            <!--div class="col-md-4">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Resultat</label>
                                    <input type="text" name="Result_action_list" value="<?php if (isset($Result_action_list)) {
                                                                                            echo $Result_action_list;
                                                                                        } ?>" placeholder="Resut" class="form-control floating">

                                </div>
                            </!--div-->
                            <div class="col-md-4">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Actor</label>
                                    <div class="cal-icon">

                                        <select class="form-control floating" name="Actor_action_list" id="Actor_action_list">
                                            <?php
                                            foreach ($Actor as $row) {

                                                if (isset($Actor_action_list)) {

                                                    if ($row['ID_employee'] == $Actor_action_list) {

                                            ?>

                                                        <option value=<?= $row['ID_employee'] ?> selected><?= $row['Name_employee'] . ' ' . $row['Lastname_employee']  ?></option>

                                                    <?php } else {
                                                    ?>

                                                        <option value=<?= $row['ID_employee'] ?>><?= $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></option>

                                                    <?php }
                                                } else {
                                                    ?>
                                                    <option value=<?= $row['ID_employee'] ?>><?= $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></option>


                                            <?php }
                                            }
                                            ?>


                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!--div class="col-md-4">
                                            <div class="form-group form-focus focused">
                                                <label class="focus-label">Measure</label>
                                                <input type="text" name="Measure_action" value="<?php if (isset($Measure_action)) {
                                                                                                    echo $Measure_action;
                                                                                                } ?>" placeholder="Measure" class="form-control floating">

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-focus focused">
                                                <label class="focus-label">Execute duration</label>
                                                <div class="cal-icon">

                                                    <select class="form-control floating" name="ID_execute" id="ID_execute">
                                                        <?php
                                                        foreach ($execute as $row) {

                                                            if (isset($ID_execute)) {

                                                                if ($row['ID_execute'] == $ID_execute) {

                                                        ?>

                                                                    <option value=<?= $row['ID_execute'] ?> selected><?= $row['Value_execute'] . ' ' . $row['Title_execute'] ?></option>

                                                                <?php } else {
                                                                ?>

                                                                    <option value=<?= $row['ID_execute'] ?>><?= $row['Value_execute'] . ' ' . $row['Title_execute']  ?></option>

                                                                <?php }
                                                            } else {
                                                                ?>
                                                                <option value=<?= $row['ID_execute'] ?>><?= $row['Value_execute'] . ' ' . $row['Title_execute']  ?></option>


                                                        <?php }
                                                        }
                                                        ?>


                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-focus focused">
                                                <label class="focus-label">Cost duration</label>
                                                <div class="cal-icon">

                                                    <select class="form-control floating" name="ID_cost" id="ID_cost">
                                                        <?php
                                                        foreach ($cost as $row) {

                                                            if (isset($ID_cost)) {

                                                                if ($row['ID_cost'] == $ID_cost) {

                                                        ?>

                                                                    <option value=<?= $row['ID_cost'] ?> selected><?= $row['Value_cost'] . ' ' . $row['Title_cost'] ?></option>

                                                                <?php } else {
                                                                ?>

                                                                    <option value=<?= $row['ID_cost'] ?>><?= $row['Value_cost'] . ' ' . $row['Title_cost']  ?></option>

                                                                <?php }
                                                            } else {
                                                                ?>
                                                                <option value=<?= $row['ID_cost'] ?>><?= $row['Value_cost'] . ' ' . $row['Title_cost']  ?></option>


                                                        <?php }
                                                        }
                                                        ?>


                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-focus focused">
                                                <label class="focus-label">Type Action</label>
                                                <div class="cal-icon">

                                                    <select class="form-control floating" name="ID_type" id="ID_type">
                                                        <?php
                                                        foreach ($type as $row) {

                                                            if (isset($ID_type)) {

                                                                if ($row['ID_type'] == $ID_type) {

                                                        ?>

                                                                    <option value=<?= $row['ID_type'] ?> selected><?= $row['Title_type']  ?></option>

                                                                <?php } else {
                                                                ?>

                                                                    <option value=<?= $row['ID_type'] ?>><?= $row['Title_type'] ?></option>

                                                                <?php }
                                                            } else {
                                                                ?>
                                                                <option value=<?= $row['ID_type'] ?>><?= $row['Title_type'] ?></option>


                                                        <?php }
                                                        }
                                                        ?>


                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-focus focused">
                                                <label class="focus-label">Priority</label>
                                                <input type="text" name="Priority_action" value="<?php if (isset($Priority_action)) {
                                                                                                        echo $Priority_action;
                                                                                                    } ?>" placeholder="Priority" class="form-control floating">

                                            </div>
                                        </div-->
                        </div>

                        <div class="add-more">
                            <button id="btn_add" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add to action list</button>
                        </div>

                    </form>

                </div>
            </div>


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
                                                                <td class="table-warning" colspan="6">
                                                                    <center><span class="custom-badge status-grey">en attente</span></center>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


    <script>
        var update_parent = function() {
            if ($("#parent").is(":checked")) {
                $('#ID_chapter').prop('disabled', false);
                $('#Name_chapter').prop('disabled', false);

            } else {
                $('#ID_chapter').prop('disabled', 'disabled');
                $('#Name_chapter').prop('disabled', 'disabled');

            }
            if ($("#main").is(":checked")) {
                $('#ID_chapter').prop('disabled', true);
                $('#Name_chapter').prop('disabled', true);

            } else {
                $('#ID_chapter').prop('disabled', false);
                $('#Name_chapter').prop('disabled', false);

            }
        };
        $(update_parent);
        $("#parent").change(update_parent);
        $("#main").change(update_parent);
    </script>
    <script>
        $(document).ready(function() {




            $("#btn_add").click(function() {
                swal({
                    title: 'Save',
                    text: "Are you sure?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancel',

                    confirmButtonText: 'Yes'
                }).then((result) => {

                    if (result.value) {
                        //$("#action").val(1);


                        $('form#popup').submit();
                        //	swal('its OK '+result.value);
                    } else {
                        swal("This operation is canceled");
                        return false;
                    }
                });
            });

        });
    </script>