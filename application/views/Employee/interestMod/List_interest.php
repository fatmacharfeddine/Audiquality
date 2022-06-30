<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Parties Interessées</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo site_url('Employee_Account/Form_add_interest') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add interest</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Parties Interessées</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;"></th>

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Attentes</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Exigences</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Méthode de Suivi</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Fréquence de Suivi</th>

                                                <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            if (isset($interest)) {
                                                if (isset($empty)) {
                                            ?>
                                                    <?php } else {
                                                    foreach ($interest as $row) {
                                                    ?>
                                                        <tr role="row" class="odd">



                                                            <td class="sorting_1"><?= $row['Participant_interest'] ?></td>
                                                            <td class="sorting_1"> <img src="<?php echo base_url() ?>//includes/ext/assets/template/img/context/fleche2.png" alt="" style="width: 100%;">
                                                            </td>
                                                            <td class="sorting_1"><?php echo $row['Attente_interest'] ?></td>
                                                            <td class="sorting_1"><?php echo $row['Exigence_interest'] ?></td>

                                                            <td class="sorting_1">

                                                                <?php 
                                                                if ($row['Method_interest'] == 1) {
                                                                    echo "Formulaire";
                                                                }
                                                                if ($row['Method_interest'] == 2) {
                                                                    echo "Email";
                                                                }
                                                                if ($row['Method_interest'] == 3) {
                                                                    echo "Autre";
                                                                }
                                                                ?>

                                                            </td>
                                                            <td class="sorting_1">
                                                            <?php 
                                                                if ($row['Frequence_interest'] == 1) {
                                                                    echo "hebdomadaire";
                                                                } 
                                                                if ($row['Frequence_interest'] == 2) {
                                                                    echo "mensuel";
                                                                } 
                                                                if ($row['Frequence_interest'] == 3) {
                                                                    echo "trimestriel";
                                                                } 
                                                                if ($row['Frequence_interest'] == 4) {
                                                                    echo "semestriel";
                                                                } 
                                                                if ($row['Frequence_interest'] == 5) {
                                                                    echo "annuel";
                                                                } 
                                                                ?>
                                                                </td>

                                                            <!--
                                                            <?php if ($row['Priority_interest'] == 0) { ?>

                                                                <td>
                                                                    <h5 class="time-title p-0"><?= $row['Priority_interest'] ?></h5>
                                                                </td>
                                                            <?php } ?>

                                                            <?php if ($row['Priority_interest'] == 1) { ?>

                                                                <td class="table-danger">
                                                                    <h5 class="time-title p-0"><?= $row['Priority_interest'] ?></h5>
                                                                </td>
                                                            <?php } ?>
                                                            <?php if ($row['Priority_interest'] == 2) { ?>

                                                                <td class="table-warning">
                                                                    <h5 class="time-title p-0"><?= $row['Priority_interest'] ?></h5>
                                                                </td>
                                                            <?php } ?> <?php if ($row['Priority_interest'] == 3) { ?>

                                                                <td class="table-light">
                                                                    <h5 class="time-title p-0"><?= $row['Priority_interest'] ?></h5>
                                                                </td>
                                                            <?php } ?> <?php if ($row['Priority_interest'] == 4) { ?>

                                                                <td class="table-primary">
                                                                    <h5 class="time-title p-0"><?= $row['Priority_interest'] ?></h5>
                                                                </td>
                                                            <?php } ?> <?php if ($row['Priority_interest'] == 5) { ?>

                                                                <td class="table-success">
                                                                    <h5 class="time-title p-0"><?= $row['Priority_interest'] ?></h5>
                                                                </td>
                                                            <?php } ?>
                                                            -->

                                                            <td class="text-right">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/view_interest?ID_interest=<?php echo $row['ID_interest'] ?>"><i class="fa fa-pencil m-r-5"></i> View</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_interest?ID_interest=<?php echo $row['ID_interest'] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_interest?ID_interest=<?php echo $row['ID_interest'] ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>


                                                        </tr>
                                            <?php }
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
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
        <div class="row" style="margin-top:2%">
            <a href="<?php echo base_url() ?>/Employee_Account/Report_interest" class="btn btn-success btn-block" style="margin-left: 35%; width: 30%;background-color: #eb1c24;border: 1px solid #eb1c24;">Generate Report </a>
        </div>
    </div>

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