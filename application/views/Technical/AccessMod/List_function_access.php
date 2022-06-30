<script src="<?php echo base_url(); ?>includes/js/sweetalert.js"></script>

<!--?php include "/../Header.php"; ?-->

<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Group Access
                        <br><br>
                        <span class="blog-author-name"> "<?php echo $Name_access_group ?>"</span>
                    </h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo site_url('Technical_Account/Form_add_functions_access?ID_access_group=' . $ID_access_group . '') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add function</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                    //if (isset($function_access)) {
                                    if (isset($empty)) {

                                    ?>
                                        <p> no function for this access Group </p>
                                        <?php
                                    } else if (isset($function_access)) { { ?>
                                            <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Function</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Access</th>
                                                        <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;"></th>
                                                        <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    foreach ($function_access as $row) {
                                                        if ($row['ismain'] == 1) {
                                                    ?>
                                                            <tr class="table-primary">



                                                                <td class="sorting_1"><?= $row['Name_function'] ?></td>
                                                                <td><?php
                                                                    if ($row['View_functions_access'] == 1) {
                                                                        echo 'View';
                                                                    } else {
                                                                        if ($row['Edit_functions_access'] == 1) {
                                                                            echo 'Edit';
                                                                        } else {
                                                                            echo 'None';
                                                                        }
                                                                    }

                                                                    ?></td>

                                                                <td>
                                                                    <a href="<?php echo base_url(); ?>Technical_Account/Form_edit_functions_access?ID_functions_access=<?php echo $row['ID_functions_access'] ?>">
                                                                        <button class="btn btn-primary btn-primary-three float-right"><i class="fa fa-pencil m-r-5"></i>Update</button>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <form id="<?php echo base_url(); ?>Technical_Account/Delete_functions_access?ID_functions_access=<?php echo $row['ID_functions_access'] ?>" enctype="multipart/form-data" method="post">
                                                                        <button class="btn btn-primary btn-primary-four float-right" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                                    </form>
                                                                </td>
                                                                <!--td class="text-right">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Technical_Account/view_functions_access?ID_functions_access=<?php echo $row['ID_functions_access'] ?>"><i class="fa fa-pencil m-r-5"></i> View</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Technical_Account/Form_edit_functions_access?ID_functions_access=<?php echo $row['ID_functions_access'] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Technical_Account/Delete_functions_access?ID_functions_access=<?php echo $row['ID_functions_access'] ?>" name="btn_delete" id="btn_delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                        <!--input type="button" name="btn_delete" id="btn_delete" value="Delete" class="form-control"/-->
                                                                <!--/div>
                                                                </div>
                                                            </td-->


                                                            </tr>
                                                            <?php foreach ($function_access as $subrow) {
                                                                if ($row['ID_function'] == $subrow['parent']) { ?>

                                                                    <tr>



                                                                        <td class="sorting_1"><?= $subrow['Name_function'] ?></td>
                                                                        <td><?php
                                                                            if ($subrow['View_functions_access'] == 1) {
                                                                                echo 'View';
                                                                            } else {
                                                                                if ($subrow['Edit_functions_access'] == 1) {
                                                                                    echo 'Edit';
                                                                                } else {
                                                                                    echo 'None';
                                                                                }
                                                                            }

                                                                            ?></td>

                                                                        <td>
                                                                            <a href="<?php echo base_url(); ?>Technical_Account/Form_edit_functions_access?ID_functions_access=<?php echo $row['ID_functions_access'] ?>">
                                                                                <button class="btn btn-primary btn-primary-three float-right"><i class="fa fa-pencil m-r-5"></i>Update</button>
                                                                            </a>
                                                                        </td>
                                                                        <td>
                                                                            <form id="<?php echo base_url(); ?>Technical_Account/Delete_functions_access?ID_functions_access=<?php echo $row['ID_functions_access'] ?>" enctype="multipart/form-data" method="post">
                                                                                <button class="btn btn-primary btn-primary-four float-right" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                                            </form>
                                                                        </td>


                                                                    </tr>

                                            <?php }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                                </tbody>
                                            </table>
                                            <?php// } ?>
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
    <script>
        $("#btn_delete").click(function() {
            swal({
                title: 'Delete',
                text: "Are you sure you want to delete?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancel',

                confirmButtonText: 'Confirm'
            }).then((result) => {

                if (result.value) {
                    $("#action").val(1);
                    $('form#form-accident').submit();
                    //	swal('its OK '+result.value);
                } else {
                    swal("Delete canceled");
                    return false;
                }
            });
        });
    </script>

    <!--?php include "/../Footer.php"; ?-->