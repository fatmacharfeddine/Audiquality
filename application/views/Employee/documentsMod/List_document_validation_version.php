
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Versions of document :</h4>
                    <h4 class="card-title"> <?php echo $Code_document . ' -- ' . $Title_document ?></h4>

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
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Version</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Date</th>

                                                <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;"></th>
                                                <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;"></th>
                                                <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;"></th>
                                                <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 0;
                                            if (isset($doc)) {
                                                if (isset($empty)) {
                                            ?>
                                                    <?php } else {
                                                    foreach ($doc as $row) {
                                                        $i = $i + 1;
                                                        if ($i == 1) { ?>
                                                            <tr role="row" class="table-warning">



                                                                <td class="sorting_1"><?= $row['Number_version'] ?></td>
                                                                <td><?= $row['Date_version'] ?></td>

                                                                <td>
                                                                    <span class="custom-badge status-blue">Latest Version</span>
                                                                </td>
                                                                <td>
                                                                    <!----------------------------->
                                                                    <?php if (isset($validation_form)) {
                                                                        if ($row['Revisedby_version'] == 0) {
                                                                    ?>
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <a href="<?php echo base_url(); ?>Employee_Account/Detail_document_validation?ID_version=<?php echo $row['ID_version'] ?>&action=accept" class="btn btn-outline-primary take-btn">Accept</a>
                                                                            <a href="<?php echo base_url(); ?>Employee_Account/Detail_document_validation?ID_version=<?php echo $row['ID_version'] ?>&action=refuse" class="btn btn-outline-primary take-btn">Refuse</a>
                                                                            <?php } else if ($row['Revisedby_version'] != 0) {
                                                                            if ($row['Refusedstatus_version'] == 1) { ?>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <span class="custom-badge status-red">Refused</span>
                                                                            <?php    } else { ?>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                                                                <span class="custom-badge status-green">Accepted</span>
                                                                    <?php }
                                                                        }
                                                                    } ?>
                                                                    <!----------------------------->
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if ($row['Revisedby_version'] == 0) { ?>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <a href="<?php echo base_url(); ?>Employee_Account/Detail_document_validation?ID_version=<?php echo $row['ID_version'] ?>&action=accept" class="btn btn-outline-primary take-btn">Accept</a>
                                                                        <a href="<?php echo base_url(); ?>Employee_Account/Detail_document_validation?ID_version=<?php echo $row['ID_version'] ?>&action=refuse" class="btn btn-outline-primary take-btn">Refuse</a> <?php } else if ($row['Revisedby_version'] != 0) {
                                                                                                                                                                                                                                                                        if ($row['Refusedstatus_version'] == 1) { ?>

                                                                        <?php   } else if ($row['Refusedstatus_version'] == 2) { ?>
                                                                            <span class="custom-badge status-red">Refused</span>

                                                                            <?php } else if ($row['Refusedstatus_version'] == 0) {
                                                                                                                                                                                                                                                                            if ($row['Validatedby_version'] == 0) { ?>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <a href="<?php echo base_url(); ?>Employee_Account/Detail_document_validation?ID_version=<?php echo $row['ID_version'] ?>&action=accept" class="btn btn-outline-primary take-btn">Accept</a>
                                                                                <a href="<?php echo base_url(); ?>Employee_Account/Detail_document_validation?ID_version=<?php echo $row['ID_version'] ?>&action=refuse" class="btn btn-outline-primary take-btn">Refuse</a>
                                                                                <?php    } else if ($row['Validatedby_version'] != 0) {
                                                                                                                                                                                                                                                                                if ($row['Refusedstatus_version'] == 2) { ?>
                                                                                    <span class="custom-badge status-red">Refused</span>
                                                                                <?php    } else if ($row['Refusedstatus_version'] == 0) { ?>
                                                                                    <span class="custom-badge status-green">Accepted</span>

                                                                        <?php }
                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                        }

                                                                        ?>

                                                                    <?php }
                                                                    ?>
                                                                </td>
                                                                <td>



                                                                    <a href="<?php echo base_url(); ?>Employee_Account/view_version?ID_version=<?php echo $row['ID_version']; ?>">
                                                                        <button class="btn btn-primary btn-primary-two float-right">View</button>
                                                                    </a>
                                                                </td>


                                                            </tr>

                                                        <?php      } else {
                                                        ?>
                                                            <tr role="row" class="odd">



                                                                <td class="sorting_1"><?= $row['Number_version'] ?></td>
                                                                <td><?= $row['Date_version'] ?></td>
                                                                <td>

                                                                </td>
                                                                <td>

                                                                </td>
                                                                <td>

                                                                </td>
                                                                <td>
                                                                    <a href="<?php echo base_url(); ?>Employee_Account/Detail_document_validation?ID_document=<?php echo $row['ID_document']; ?>">
                                                                        <button class="btn btn-primary btn-primary-two float-right">View</button>
                                                                    </a>
                                                                </td>


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

