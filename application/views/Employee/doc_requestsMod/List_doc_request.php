
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">My Requests : </h4>
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
                                    <?php
                                    if (isset($empty)) {
                                    ?>
                                        <p> no requests !! </p>
                                        <?php } else {
                                        if (isset($doc_requests)) {
                                        ?>
                                            <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                    <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Document</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Description Request</th>
                                                        <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">QSE Manager</th>
                                                        <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Director</th>
                                                        <th class="text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;"></th>

                                                        <!--th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;">Action</th-->
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php
                                                    foreach ($doc_requests as $row) {
                                                    ?>
                                                        <tr role="row" class="odd">


                                                        <td><?= $row['Title_document'] ?></td>

                                                            <td><?= $row['Description_requests'] ?></td>
                                                            <td class="text-center">
                                                                <?php
                                                                if ($row['Revisedby_requests'] == 0) {
                                                                ?>
                                                                    <span class="custom-badge status-grey">Waiting</span>

                                                                    <?php
                                                                } else if ($row['Revisedby_requests'] != 0) {
                                                                    if (($row['Refusedstatus_requests'] == 0)) {
                                                                    ?>

                                                                        <span class="custom-badge status-green">Accepted</span>
                                                                    <?php } else if ($row['Refusedstatus_requests'] == 1) { ?>
                                                                        <span class="custom-badge status-red">Refused</span>
                                                                    <?php } else if ($row['Refusedstatus_requests'] == 2) { ?>
                                                                        <span class="custom-badge status-green">Accepted</span>
                                                                <?php }
                                                                }
                                                                ?>

                                                            </td>
                                                            <td class="text-center">
                                                                <?php
                                                                if ($row['Validatedby_requests'] == 0) {
                                                                    if ($row['Refusedstatus_requests'] == 1) { ?>

                                                                    <?php } else if ($row['Refusedstatus_requests'] == 0) {
                                                                    ?>
                                                                        <span class="custom-badge status-grey">Waiting</span>

                                                                    <?php }
                                                                } else if ($row['Validatedby_requests'] != 0) {
                                                                    if (($row['Refusedstatus_requests'] == 0)) {
                                                                    ?>

                                                                        <span class="custom-badge status-green">Accepted</span>
                                                                    <?php } else if ($row['Refusedstatus_requests'] == 1) { ?>
                                                                    <?php } else if ($row['Refusedstatus_requests'] == 2) { ?>
                                                                        <span class="custom-badge status-red">Refused</span>
                                                                <?php }
                                                                }
                                                                ?>

                                                            </td>
                                                            <td>
                                                                <?php if (($row['Validatedby_requests'] != 0) & ($row['Refusedstatus_requests'] == 0)) {
                                                                    if ($row['ID_new_version'] == 0) {
                                                                        if ($row['Type_requests'] == 0) { ?>
                                                                            <a href="<?php echo base_url(); ?>Employee_Account/Form_add_document?ID_requests=<?php echo $row['ID_requests'] ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i></a>

                                                                        <?php } else if ($row['Type_requests'] == 1) {
                                                                        ?>
                                                                            <a href="<?php echo base_url(); ?>Employee_Account/Form_edit_document?ID_requests=<?php echo $row['ID_requests'] ?>&Type_requests=<?php echo $row['Type_requests'] ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-pencil"></i></a>
                                                                        <?php }
                                                                    } else if ($row['ID_new_version'] != 0) {

                                                                        ?>
                                                                        <a href="<?php echo base_url(); ?>Employee_Account/view_version?ID_version=<?php echo $row['ID_new_version'] ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-search"></i></a>
                                                                <?php }
                                                                }
                                                                ?>
                                                            </td>
                                                            <!--td>
                                                                <?php
                                                                if (($row['Date_creation_version'] < $row['Date_creation_requests']) & ($row['Validatedby_requests'] != 0) & ($row['Refusedstatus_requests'] == 0)) { ?>

                                                                    <?php if ($row['Type_requests'] == 0) {
                                                                        if ($row['ID_document'] != 0) { ?>
                                                                            <a style="color:grey" class="dropdown-item" href="">Document Created !! </a>

                                                                        <?php        } else { ?>
                                                                            <a href="<?php echo base_url(); ?>Employee_Account/Form_add_document?ID_requests=<?php echo $row['ID_requests'] ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i></a>

                                                                        <?php }
                                                                    } else if ($row['Type_requests'] == 1) { ?>

                                                                        <a href="<?php echo base_url(); ?>Employee_Account/Form_edit_document?ID_requests=<?php echo $row['ID_requests'] ?>&Type_requests=<?php echo $row['Type_requests'] ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-pencil"></i></a>

                                                                    <?php
                                                                    } ?>

                                                                    <?php  } else if (($row['Date_creation_version'] > $row['Date_creation_requests']) & ($row['Createdby_version'] != 0)) {
                                                                    foreach ($doc_requests_sent as $row2) {
                                                                        if ($row['ID_document'] == $row2['ID_document']) {
                                                                    ?>
                                                                            <a href="add-schedule.html" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-search"></i></a>
                                                                <?php  }
                                                                    }
                                                                }

                                                                ?>
                                                            </td-->
                                                            <!--td class="text-right">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/view_doc_request?ID_requests=<?php echo $row['ID_requests'] ?>"><i class="fa fa-pencil m-r-5"></i> View</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_doc_request?ID_requests=<?php echo $row['ID_requests'] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_doc_request?ID_requests=<?php echo $row['ID_requests'] ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td-->


                                                        </tr>
                                                    <?php

                                                    } ?>
                                                </tbody>
                                            </table>
                                    <?php
                                        }
                                    } ?>
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
                                                        <li class="paginate_button page-item active"><a href="?page=<?php echo $i; ?>&Type_requests=<?php echo $Type_requests; ?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <li class="paginate_button page-item"><a href="?page=<?php echo $i; ?>&Type_requests=<?php echo $Type_requests; ?>" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                                    <?php
                                                    }
                                                }
                                                /************** End No page selected **************** */
                                                /****************** Selected page **************** */
                                                if (isset($_GET['page'])) {
                                                    if ($i == $_GET['page']) {
                                                    ?>
                                                        <li class="paginate_button page-item active"><a href="?page=<?php echo $i; ?>&Type_requests=<?php echo $Type_requests; ?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <li class="paginate_button page-item"><a href="?page=<?php echo $i; ?>&Type_requests=<?php echo $Type_requests; ?>" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
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
