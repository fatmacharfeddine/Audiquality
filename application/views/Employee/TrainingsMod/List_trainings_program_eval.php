<script>
    function triggerClick() {
        document.querySelector('#File_training_evaluation_emp').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">

                <div class="col-sm-4 col-8 text-right m-b-30">
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a style="background-color: #bad100;" href="<?php echo base_url(); ?>uploads/Document_upload/<?php if (isset($File_document_upload)) {
                                                                                                                        echo $File_document_upload;
                                                                                                                    } ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-download" aria-hidden="true"></i> Download Evaluation Form</a>
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
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Number Employees</th>

                                                <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Start Date</th>
                                                <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">End Date</th>

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Hours</th>
                                                <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Budget</th>
                                                <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Organisme</th>

                                                <th colspan="4"> | Evaluation</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            if (isset($trainings)) {
                                                if (isset($empty)) {
                                            ?>
                                                    <?php } else {
                                                    foreach ($trainings as $row) {
                                                        //echo $_GET['ID_status_training'] . '///' . $row['ID_status_training'];

                                                    ?>
                                                        <tr role="row" class="odd">


                                                            <td><?= $row['Title_training_programm'] ?></td>
                                                            <td>nbr</td>
                                                            <td><?= $row['Startdate_training_programm'] ?></td>
                                                            <td><?= $row['Enddate_training_programm'] ?></td>
                                                            <td><?= $row['Hours_training_programm'] ?></td>
                                                            <td><?= $row['Budget_training_programm'] ?></td>
                                                            <td><?= $row['Name_organization'] ?></td>
                                                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Submit_add_training_evaluation_emp" enctype="multipart/form-data" method="post">

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
                                                                    <td> <input style="width: 50px;" type="number" name="Objectif_training_evaluation_emp" value="<?= $row['Objectif_training_evaluation_emp'] ?>"> %
                                                                    </td>
                                                                    <td></td>
                                                                <?php } ?>


                                                                <?php if (isset($row['File_training_evaluation_emp'])) {
                                                                ?>

                                                                    <td> <a href="<?php echo base_url(); ?>uploads/Training_eval_emp/<?php echo $row['File_training_evaluation_emp'] ?>">Open File</a></td>
                                                                    <td><a href="<?php echo base_url() ?>/Employee_Account/delete_training_evaluation_emp?ID_training_evaluation_emp=<?php echo $row['ID_training_evaluation_emp'] ?>&Year_training_programm=<?= $row['Year_training_programm'] ?>" style="width: 38px;" class="btn btn-primary btn-primary-four"><i class="fa fa-trash-o m-r-5"></i> </a></td>
                                                                <?php    } else { ?>
                                                                    <td>
                                                                        <a class="btn btn-sm btn-primary" style="background-color:#565656 ;border: black solid 1.8px;color: white;" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">Upload Evaluation</a>
                                                                        <input type="hidden" name="Year_training_programm" value="<?= $row['Year_training_programm'] ?>">

                                                                        <input type="hidden" name="ID_training_programm" value="<?= $row['ID_training_programm'] ?>">
                                                                        <img id="target" />
                                                                        <input type="file" accept="image/jpg, image/jpeg, image/png" id="File_training_evaluation_emp" name="File_training_evaluation_emp" onchange="displayImage(this)" style="display:none;  text-align:center;  width: 50px; height: 50px;border: 2px solid #d1cfcf;padding: 2px;"> </input>

                                                                    <td> <button style="border-radius: 50%;" id="btn_add" type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                                                    </td>
                                                                <?php } ?>
                                                            </form>


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
    </div>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/.slimscroll.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/select2.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/moment.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/bootstrap-datetimepicker.min.js"></script>