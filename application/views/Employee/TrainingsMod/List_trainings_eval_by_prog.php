<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-8 col-4">
                    <h4 class="page-title">List of trainings</h4>
                </div>
                <div class="col-sm-4 col-8 text-right m-b-30">
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
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Employee</th>

                                                <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Start Date</th>
                                                <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">End Date</th>

                                                <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">File Evaliation</th>
                                                <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Objectif Atteint</th>
                                                <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;"></th>

                                                <!--th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;">Action</th-->
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $total_eval = 0;
                                            $q = 0;
                                            if (isset($trainings1)) {
                                                if (isset($empty)) {
                                            ?>
                                                    <?php } else {
                                                    foreach ($trainings1 as $row) {

                                                        //echo $_GET['ID_status_training'] . '///' . $row['ID_status_training'];
                                                        $total_eval = $total_eval + $row['Objectif_training_evaluation_emp'];
                                                        $q = $q + 1;
                                                    ?>
                                                        <tr role="row" class="odd">


                                                            <td><?= $row['Title_training_programm'] ?></td>
                                                            <td><?= $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></td>
                                                            <td><?= $row['Startdate_training_programm'] ?></td>
                                                            <td><?= $row['Enddate_training_programm'] ?></td>
                                                            <td>
                                                            <td> <a href="<?php echo base_url(); ?>uploads/Training_eval_emp/<?php echo $row['File_training_evaluation_emp'] ?>">Open File</a></td>
                                                            </td>
                                                            <?php if (isset($row['Objectif_training_evaluation_emp'])) { ?>

                                                                <?php if ($row['Objectif_training_evaluation_emp'] < 50) {

                                                                ?>
                                                                    <td>
                                                                        <p style="border-radius: 50%;background-color: #eb1c24;height: 50px;width: 50px;padding: 14px 0px 0px 10px;color: white;"> <?= $row['Objectif_training_evaluation_emp'] ?> % </p>
                                                                    </td>
                                                                    <td style="color:#eb1c24;">Non Efficace <i class="fa fa-times" aria-hidden="true"></i></td>
                                                                <?php  } else { ?>
                                                                    <td>
                                                                        <p style="border-radius: 50%;background-color: #8bc43f;height: 50px;width: 50px;padding: 14px 0px 0px 10px;color: white;"> <?= $row['Objectif_training_evaluation_emp'] ?> % </p>
                                                                    </td>
                                                                    <td style="color:#74a92f;">Efficace <i class="fa fa-check" aria-hidden="true"></i></td>
                                                                <?php  } ?>

                                                            <?php    } else { ?>
                                                                <td> not evaluated yet
                                                                </td>
                                                                <td></td>
                                                            <?php } ?>

                                                        </tr>
                                            <?php }
                                                }
                                            } ?>

                                            <!-----------------------training 2-------------------------->
                                            <?php
                                            if (($trainings2) == false) {
                                                //   if (isset($empty)) {

                                            ?>
                                                <?php } else {
                                                foreach ($trainings2 as $row) {
                                                    //echo $_GET['ID_status_training'] . '///' . $row['ID_status_training'];
                                                    $total_eval = $total_eval + $row['Objectif_training_evaluation_emp'];
                                                    $q = $q + 1;
                                                ?>
                                                    <tr role="row" class="odd">


                                                        <td><?= $row['Title_training_programm'] ?></td>
                                                        <td><?= $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></td>
                                                        <td><?= $row['Startdate_training_programm'] ?></td>
                                                        <td><?= $row['Enddate_training_programm'] ?></td>
                                                        <td> <a href="<?php echo base_url(); ?>uploads/Training_eval_emp/<?php echo $row['File_training_evaluation_emp'] ?>">Open File</a></td>
                                                        </td>
                                                        <?php if (isset($row['Objectif_training_evaluation_emp'])) { ?>

                                                            <?php if ($row['Objectif_training_evaluation_emp'] < 50) {

                                                            ?>
                                                                <td>
                                                                    <p style="border-radius: 50%;background-color: #eb1c24;height: 50px;width: 50px;padding: 14px 0px 0px 10px;color: white;"> <?= $row['Objectif_training_evaluation_emp'] ?> % </p>
                                                                </td>
                                                                <td style="color:#eb1c24;">Non Efficace <i class="fa fa-times" aria-hidden="true"></i></td>
                                                            <?php  } else { ?>
                                                                <td>
                                                                    <p style="border-radius: 50%;background-color: #8bc43f;height: 50px;width: 50px;padding: 14px 0px 0px 10px;color: white;"> <?= $row['Objectif_training_evaluation_emp'] ?> % </p>
                                                                </td>
                                                                <td style="color:#74a92f;">Efficace <i class="fa fa-check" aria-hidden="true"></i></td>
                                                            <?php  } ?>

                                                        <?php    } else { ?>
                                                            <td> not evaluated yet
                                                            </td>
                                                            <td></td>
                                                        <?php } ?>


                                                    </tr>
                                            <?php }
                                                //   }
                                            } ?>

                                            <tr>
                                                <td colspan="5" style="background-color: #d0edff;">Moyenne Evaluation</td>
                                                <? if ($q == 0) {
                                                    $t = 0;
                                                } else {
                                                    $t = $total_eval / $q;
                                                } ?>

                                                <?php if (isset($total_eval)) { ?>

                                                    <?php if ($total_eval < 50) {

                                                    ?>
                                                        <td style="background-color: #ffd3d3;">
                                                            <p style="border-radius: 50%;background-color: #eb1c24;height: 50px;width: 50px;padding: 14px 0px 0px 10px;color: white;"> <?= $total_eval ?> % </p>
                                                        </td>
                                                        <td style="color:#eb1c24;background-color: #ffd3d3;">Non Efficace <i class="fa fa-times" aria-hidden="true"></i></td>
                                                    <?php  } else { ?>
                                                        <td style="background-color: #ffd3d3;">
                                                            <p style="border-radius: 50%;background-color: #8bc43f;height: 50px;width: 50px;padding: 14px 0px 0px 10px;color: white;"> <?= $total_eval ?> % </p>
                                                        </td>
                                                        <td style="color:#74a92f;background-color: #ffd3d3;">Efficace <i class="fa fa-check" aria-hidden="true"></i></td>
                                                    <?php  } ?>

                                                <?php    } else { ?>
                                                    <td> not evaluated yet
                                                    </td>
                                                    <td></td>
                                                <?php } ?>



                                            </tr>
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