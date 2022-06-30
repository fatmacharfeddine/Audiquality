
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">List of training_requests</h4>
                </div>

                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo site_url('Employee_Account/Form_add_training_employee_request') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Request</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                    if (isset($empty)) {
                                    ?>
                                        <p> No Requests !! </p>
                                    <?php } else { ?>
                                        <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Title</th>

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Description</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Requested by</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Status</th>


                                                    <!--th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;">Action</th-->
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                //echo print_r($training_request);
                                                if (isset($training_request)) {

                                                ?>
                                                    <?php
                                                    foreach ($training_request as $row) {

                                                    ?>
                                                        <tr role="row" class="odd">

                                                            <td><?php echo  $row['Title_training_request'] ?></td>
                                                            <td><?php echo  $row['Description_training_request'] ?></td>
                                                            <td><?php echo  $row['Name_employee'].' '.$row['Lastname_employee'] ?></td>
                                                            <td><?php echo  $row['Date_creation_training_request'] ?></td>
                                                            <td>
                                                                <!----------------------------->
                                                                <?php //if (isset($validation_form)) {
                                                                if ($row['Validatedby_training_request'] == 0) {
                                                                ?>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <span class="custom-badge status-grey">Waiting</span>
                                                                    <?php } else if ($row['Validatedby_training_request'] != 0) {
                                                                    if ($row['Refusedstatus_training_request'] == 1) { ?>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <span class="custom-badge status-red">Refused</span>
                                                                    <?php    } else { ?>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;

                                                                        <span class="custom-badge status-green">Accepted</span>
                                                                <?php //}
                                                                    }
                                                                } ?>
                                                                <!----------------------------->
                                                            </td>


                                                        </tr>
                                                <?php }
                                                    // }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
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
                <div class="col-sm-4">
                    <div class="card member-panel">
                        <div class="card-header bg-white">
                            <h4 class="card-title mb-0">Employee Groups</h4>
                        </div>
                        <div class="card-body">
                            <ul class="contact-list">

                                <?php foreach ($group as $row) {
                                ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-8 contact-cont">
                                                <div class="contact-info">
                                                    <span class="contact-name text-ellipsis"><?php echo $row['Name_training_group_request'] ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="<?php echo base_url() ?>/Employee_Account/Delete_training_group_request?ID_training_group_request=<?php echo $row['ID_training_group_request']  ?>">
                                                    <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                </a>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="<?php echo base_url() ?>/Employee_Account/Form_add_training_group_employee_request?ID_training_group_request=<?php echo $row['ID_training_group_request'] ?> " class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                <?php  } ?>
                            </ul>
                        </div>
                        <div class="card-footer text-center bg-white">
                            <a href="#" class="btn btn btn-primary btn-rounded" data-toggle="modal" data-target="#add_group"><i class="fa fa-plus"></i>Create New Group</a>
                        </div>
                    </div>
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
                            <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_training_group_request/" enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col-md-6">



                                        <div class="form-group row">

                                        </div>


                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3">Name Group</label>
                                            <div class="col-md-9">


                                                <input type="text" name="Name_training_group_request" value="<?php if (isset($Name_training_group_request)) {
                                                                                                                    echo $Name_training_group_request;
                                                                                                                } ?>" placeholder="Group" class="form-control">

                                            </div>
                                        </div>



                                    </div>

                                </div>
                                <div class="text-right">
                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!---------------------------End pop-up ------------------------------->
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