<style>
    .List_Picture {
        height: 50px;
    }
</style>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">departments</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo site_url('Employee_Account/Form_add_department') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add department</a>
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
                                    <?php } else if (isset($departments)) {
                                    ?>
                                        <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Logo</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">department</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Phone</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Email</th>
                                                    <!--th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Director</th-->

                                                    <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($departments as $row) {
                                                ?>
                                                    <tr role="row" class="odd">


                                                        <td>
                                                            <img src="<?= base_url() ?>/uploads/Department/<?= $row['Logo_department'] ?>" name="profileDisplay" class="List_Picture">
                                                        </td>
                                                        <td class="sorting_1"><?= $row['Name_department'] ?></td>
                                                        <td><?= $row['Phone_department'] ?></td>
                                                        <td><?= $row['Email_department'] ?></td>
                                                        <!--td><?= $row['Name_employee'] ?></td-->

                                                        <td class="text-right">
                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <a href="<?php echo base_url(); ?>Employee_Account/view_department?ID_department=<?php echo $row['ID_department'] ?>">
                                                                        <button class="btn btn-primary btn-primary-three float-right"><i class="fa fa-search m-r-5"></i>View</button>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form action="<?php echo base_url(); ?>Employee_Account/View_Delete_department?ID_department=<?php echo $row['ID_department'] ?>" enctype="multipart/form-data" method="post">
                                                                        <button class="btn btn-primary btn-primary-four float-right" type="submit"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                                    </form>


                                                                </div>

                                                            </div>

                                                        </td>

                                                        <!--td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/List_departments_post?ID_department=<?php echo $row['ID_department'] ?>"><i class="fa fa-map-o m-r-5"></i> Positions</a>
                                                                    <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/List_departments_employee?ID_department=<?php echo $row['ID_department'] ?>"><i class="fa fa-user-o m-r-5"></i> Employees</a>
                                                                    <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/view_department?ID_department=<?php echo $row['ID_department'] ?>"><i class="fa fa-search m-r-5"></i> View</a>
                                                                    <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_department?ID_department=<?php echo $row['ID_department'] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Delete_department?ID_department=<?php echo $row['ID_department'] ?>" enctype="multipart/form-data" method="post">
                                                                        <button class="dropdown-item" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </td-->


                                                    </tr>
                                                <?php } ?>
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
            </div>
        </div>
    </div>

