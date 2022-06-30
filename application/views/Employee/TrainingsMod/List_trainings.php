<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-8 col-4">
                    <h4 class="page-title">List of trainings</h4>
                </div>
                <div class="col-sm-4 col-8 text-right m-b-30">
                    <a class="btn btn-primary btn-rounded float-right" href="<?php echo base_url(); ?>Employee_Account/Form_add_training?ID_status_training=<?php echo $ID_status_training ?>"><i class="fa fa-plus"></i> Add training</a>
                </div>
                <!--div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo site_url('Employee_Account/Form_add_doc_request') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add doc_request</a>
                </div-->
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
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Type Training</th>

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Hours</th>
                                                <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Budget</th>
                                                <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Place</th>
                                                <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Start Date</th>
                                                <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">End Date</th>

                                                <!--th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;">Action</th-->
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            if (isset($training_request)) {
                                                if (isset($empty)) {
                                            ?>
                                                    <?php } else {
                                                    foreach ($training_request as $row) {
                                                        //echo $_GET['ID_status_training'] . '///' . $row['ID_status_training'];
                                                        if ($_GET['ID_status_training'] == $row['ID_status_training']) {

                                                    ?>
                                                            <tr role="row" class="odd">


                                                                <td><?= $row['Title_training_programm'] ?></td>

                                                                <?php if (($row['ID_organization'])!=0) { ?>
                                                                    <td style="background-color: #fbd692;"> Externe </td>
                                                                    <?php    ?>
                                                                <?php } else { ?>
                                                                    <td style="background-color: #a8e5a8;"> Interne </td>
                                                                <?php   } ?>

                                                                <td><?= $row['Hours_training_programm'] ?></td>
                                                                <td><?= $row['Budget_training_programm'] ?></td>
                                                                <td><?= $row['Place_training_programm'] ?></td>
                                                                <td><?= $row['Startdate_training_programm'] ?></td>
                                                                <td><?= $row['Enddate_training_programm'] ?></td>

                                                            </tr>
                                            <?php }
                                                    }
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
    </div>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/.slimscroll.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/select2.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/moment.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/bootstrap-datetimepicker.min.js"></script>