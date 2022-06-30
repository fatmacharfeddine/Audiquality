<!--?php include "/../Header.php"; ?-->

<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Skills</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo site_url('Technical_Account/Form_add_skill') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Skill</a>
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
                                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">No Data !!</div>
                                    <?php } else if (isset($skills)) {
                                    ?>
                                        <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Skill</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Description</th>
                                                    <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;"></th>
                                                    <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;"></th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($skills as $row) { ?>
                                                    <tr role="row" class="odd">



                                                        <td class="sorting_1"><?= $row['Name_skill'] ?></td>
                                                        <td><?= $row['Description_skill'] ?></td>
                                                        <td class="text-right">
                                                            <a href="<?php echo base_url() ?>Auditquality/Technical_Account/List_employees_skill?ID_skill=<?php echo $row['ID_skill'] ?>" class="btn btn-outline-primary take-btn">Employees</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <a href="<?php echo base_url(); ?>Technical_Account/Form_edit_skill?ID_skill=<?php echo $row['ID_skill'] ?>">
                                                                        <button class="btn btn-primary btn-primary-three float-right"><i class="fa fa-pencil m-r-5"></i>Update</button>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form id="popup" action="<?php echo base_url(); ?>Technical_Account/Delete_skill?ID_skill=<?php echo $row['ID_skill'] ?>" enctype="multipart/form-data" method="post">
                                                                        <button class="btn btn-primary btn-primary-four float-right" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                                    </form>


                                                                </div>

                                                            </div>
                                                            <!--div class="dropdown dropdown-action">
                                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="<?php echo base_url(); ?>Technical_Account/view_skill?ID_skill=<?php echo $row['ID_skill'] ?>"><i class="fa fa-pencil m-r-5"></i> View</a>
                                                                    <a class="dropdown-item" href="<?php echo base_url(); ?>Technical_Account/Form_edit_skill?ID_skill=<?php echo $row['ID_skill'] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                    <form id="popup" action="<?php echo base_url(); ?>Technical_Account/Delete_skill?ID_skill=<?php echo $row['ID_skill'] ?>" enctype="multipart/form-data" method="post">
                                                                        <button class="dropdown-item" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div-->
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

    <!--?php include "/../Footer.php"; ?-->


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