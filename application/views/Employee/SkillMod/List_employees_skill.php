
<style>
    .cal-icon:after {
        background: transparent no-repeat scroll 0 0;
        bottom: 0;
        content: "";
        display: block;
        height: 19px;
        margin: auto;
        position: absolute;
        right: 15px;
        top: 0;
        width: 17px;
    }
</style>

<body>



    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Skills : <?php echo $Name_skill ?></h4>
                </div>

            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">

                                <div class="col-sm-6">
                                    <form action="<?php echo base_url(); ?>Employee_Account/List_employees_skill?ID_skill=<?php echo $ID_skill ?>" enctype="multipart/form-data" method="post">

                                        <div class="row filter-row">
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <label class="focus-label">Tri</label>
                                                    <div class="cal-icon">
                                                        <?php
                                                        $n10 = "";
                                                        $n20 = "";
                                                        $n30 = "";
                                                        $n40 = "";
                                                        $n50 = "";
                                                        $n60 = "";
                                                        $n70 = "";
                                                        $n80 = "";
                                                        $n90 = "";
                                                        $n100 = "";
                                                        if (isset($Grade_tri)) {
                                                            if ($Grade_tri == 10) {
                                                                $n10 = "selected";
                                                            }
                                                            if ($Grade_tri == 20) {
                                                                $n20 = "selected";
                                                            }
                                                            if ($Grade_tri == 30) {
                                                                $n30 = "selected";
                                                            }
                                                            if ($Grade_tri == 40) {
                                                                $n40 = "selected";
                                                            }
                                                            if ($Grade_tri == 50) {
                                                                $n50 = "selected";
                                                            }
                                                            if ($Grade_tri == 60) {
                                                                $n60 = "selected";
                                                            }
                                                            if ($Grade_tri == 70) {
                                                                $n70 = "selected";
                                                            }
                                                            if ($Grade_tri == 80) {
                                                                $n80 = "selected";
                                                            }
                                                            if ($Grade_tri == 90) {
                                                                $n90 = "selected";
                                                            }
                                                            if ($Grade_tri == 100) {
                                                                $n100 = "selected";
                                                            }
                                                        }
                                                        ?>
                                                        <select class="form-control floating" name="Grade_tri" id="Grade_tri">
                                                            <option value="100" <?php echo $n100 ?>> All</option>
                                                            <option value="10" <?php echo $n10 ?>> 10% or less </option>
                                                            <option value="20" <?php echo $n20 ?>> 20% or less </option>
                                                            <option value="30" <?php echo $n30 ?>> 30% or less </option>
                                                            <option value="40" <?php echo $n40 ?>> 40% or less </option>
                                                            <option value="50" <?php echo $n50 ?>> 50% or less </option>
                                                            <option value="60" <?php echo $n60 ?>> 60% or less </option>
                                                            <option value="70" <?php echo $n70 ?>> 70% or less </option>
                                                            <option value="80" <?php echo $n80 ?>> 80% or less </option>
                                                            <option value="90" <?php echo $n90 ?>> 90% or less </option>




                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <!--a href="#" class="btn btn-success btn-block"> Search </a-->
                                                <button type="submit" class="btn btn-success btn-block">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <?php

                                        if (isset($empty)) {
                                        ?>
                                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">No Data !!</div>
                                        <?php } else if (isset($employees)) {
                                        ?>
                                            <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 95px;">Name Client</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Grade</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;"></th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach ($employees as $row) { ?>
                                                        <tr role="row" class="odd">
                                                            <td class="text-center sorting"><?= $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></td>
                                                            <td><?= $row['Grade_skill_employee'] ?></td>
                                                            <td>
                                                                <?php if ($row['ID_training_group'] == null) { ?>

                                                                    <!--a href="#?ID_skill_employee=<?php echo $ID_skill_employee ?>" class="btn btn btn-primary btn-rounded float-right" data-toggle="modal" data-target="#add_employee_to_group"><i class="fa fa-plus"></i></a-->
                                                                    <a href="<?php echo base_url(); ?>Employee_Account/Add_training_group_employee?ID_skill_employee=<?php echo  $row['ID_skill_employee'] ?>&ID_skill=<?php echo  $ID_skill ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i></a>



                                                                <?php   } else { ?>
                                                                    <p> added in group : <?php echo $row['Name_training_group'] ?></p>
                                                                <?php       }  ?>

                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card member-panel">
                                        <div class="card-header bg-white">
                                            <h4 class="card-title mb-0">Training Groups</h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="contact-list">


                                                <?php if ($group != false) {
                                                    foreach ($group as $row) {
                                                ?>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-md-6 contact-cont">
                                                                    <div class="contact-info">
                                                                        <span class="contact-name text-ellipsis"><?php echo $row['Name_training_group'] ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <a href="<?php echo base_url() ?>/Employee_Account/Delete_training_group?ID_training_group=<?php echo $row['ID_training_group'] ?>&ID_skill=<?php echo $ID_skill ?>">
                                                                        <button class="btn btn-primary btn-primary-four float-right">Delete</button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                <?php }
                                                } else {
                                                    echo " aucun group !!";
                                                } ?>
                                            </ul>
                                        </div>
                                        <div class="card-footer text-center bg-white">
                                            <a href="#" class="btn btn btn-primary btn-rounded" data-toggle="modal" data-target="#add_group"><i class="fa fa-plus"></i>Create New Group</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!------------------------------ pop-up ------------------------------->

                            <div class="modal fade" id="add_group" role="dialog">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="row">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                            <div class="col-md-12">
                                                <div class="card-box">
                                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_training_group/" enctype="multipart/form-data" method="post">
                                                        <div class="row">
                                                            <div class="col-md-6">



                                                                <div class="form-group row">

                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-md-3">Name Group</label>
                                                                    <div class="col-md-9">

                                                                        <input type="hidden" name="ID_skill" value="<?php echo $ID_skill ?>">
                                                                        <!--input type="hidden" name="ID_training_group" value="<?php echo $ID_training_group ?>">
                                                                        <input type="hidden" name="ID_skill_employee" value="<?php echo $ID_skill_employee ?>"-->

                                                                        <input type="text" name="Name_training_group" value="<?php if (isset($Name_training_group)) {
                                                                                                                                    echo $Name_training_group;
                                                                                                                                } ?>" placeholder="Group" class="form-control">

                                                                    </div>
                                                                </div>



                                                            </div>

                                                        </div>
                                                        <div class="text-right">
                                                            <button id="btn_add" type="button" class="btn btn-primary">Confirm</button>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="modal fade" id="add_employee_to_group" role="dialog">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="row">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                            <div class="col-md-12">
                                                <div class="card-box">
                                                    <form id="popup1" action="<?php echo base_url(); ?>Employee_Account/Submit_add_training_group_employee" enctype="multipart/form-data" method="post">
                                                        <div class="row">
                                                            <input type="hidden" name="ID_skill" value="<?php echo $ID_skill ?>">

                                                            <div class="col-md-6">

                                                                <!--input type="text" value="<?php if (isset($_GET['ID_skill_employee'])) {
                                                                                                    echo $_GET['ID_skill_employee'];
                                                                                                }; ?>"-->
                                                                <div class="form-group row">

                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-md-3">Groups</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control" name="ID_training_group" id="ID_training_group">


                                                                            <?php
                                                                            foreach ($group_employee as $row) {
                                                                                if (isset($ID_training_group)) {
                                                                                    if ($row['ID_training_group'] == $ID_training_group) {

                                                                            ?>

                                                                                        <option value=<?= $row['ID_training_group'] ?> selected><?= $row['Name_training_group'] ?></option>
                                                                                    <?php } else {
                                                                                    ?>
                                                                                        <option value=<?= $row['ID_training_group'] ?>><?= $row['Name_training_group'] ?></option>
                                                                                    <?php }
                                                                                } else { ?>
                                                                                    <option value=<?= $row['ID_training_group'] ?>><?= $row['Name_training_group'] ?></option>

                                                                            <?php       }
                                                                            } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>



                                                            </div>

                                                        </div>
                                                        <div class="text-right">
                                                            <button id="btn_add1" type="button" class="btn btn-primary">Confirm</button>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!---------------------------End pop-up ------------------------------->
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
    <script>
        $(document).ready(function() {




            $("#btn_add1").click(function() {
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


                        $('form#popup1').submit();
                        //	swal('its OK '+result.value);
                    } else {
                        swal("This operation is canceled");
                        return false;
                    }
                });
            });

        });
    </script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/select2.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/moment.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/app.js"></script>