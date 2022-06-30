<!--?php include "/../Header.php"; ?-->

<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">function</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo site_url('Technical_Account/Form_add_function') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add function</a>
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
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">function</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">URL</th>
                                                <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;"></th>
                                                <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;"></th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            if (isset($function)) {
                                                if (isset($empty)) {
                                            ?>
                                                    <?php } else {
                                                    foreach ($function as $row) {
                                                        if ($row['ismain'] == 1) { ?>

                                                            <tr class="table-primary">
                                                                <td class="sorting_1"><?= $row['Name_function'] ?></td>
                                                                <td><?= $row['URL_function'] ?></td>

                                                                <td>
                                                                            <a href="<?php echo base_url(); ?>Technical_Account/Form_edit_function?ID_function=<?php echo $row['ID_function'] ?>">
                                                                                <button class="btn btn-primary btn-primary-three float-right"><i class="fa fa-pencil m-r-5"></i>Update</button>
                                                                            </a>
                                                                        </td>
                                                                        <td>
                                                                            <form id="<?php echo base_url(); ?>Technical_Account/Delete_function?ID_function=<?php echo $row['ID_function'] ?>" enctype="multipart/form-data" method="post">
                                                                                <button class="btn btn-primary btn-primary-four float-right" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                                            </form>
                                                                        </td>


                                                            </tr>
                                                            <?php foreach ($function as $subrow) {
                                                                if ($row['ID_function'] == $subrow['parent']) { ?>
                                                                    <tr role="row" class="odd">
                                                                        <td class="sorting_1"><?= $subrow['Name_function'] ?></td>
                                                                        <td><?= $subrow['URL_function'] ?></td>
                                                                        <td>
                                                                            <a href="<?php echo base_url(); ?>Technical_Account/Form_edit_function?ID_function=<?php echo $subrow['ID_function'] ?>">
                                                                                <button class="btn btn-primary btn-primary-three float-right"><i class="fa fa-pencil m-r-5"></i>Update</button>
                                                                            </a>
                                                                        </td>
                                                                        <td>
                                                                            <form id="<?php echo base_url(); ?>Technical_Account/Delete_function?ID_function=<?php echo $subrow['ID_function'] ?>" enctype="multipart/form-data" method="post">
                                                                                <button class="btn btn-primary btn-primary-four float-right" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                                            </form>
                                                                        </td>
                                                                        <!--td class="text-right">
                                                                            <div class="dropdown dropdown-action">
                                                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                                <div class="dropdown-menu dropdown-menu-right">

                                                                                    <a class="dropdown-item" href="<?php echo base_url(); ?>Technical_Account/Form_edit_function?ID_function=<?php echo $subrow['ID_function'] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                                    <a class="dropdown-item" href="<?php echo base_url(); ?>Technical_Account/Delete_function?ID_function=<?php echo $subrow['ID_function'] ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td-->


                                                                    </tr>
                                                        <?php    }
                                                            }
                                                        }
                                                        ?>

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