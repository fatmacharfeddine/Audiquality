<style>
    .btn-primary-one {
        border: 1px solid #dee2e6;
        color: white;
    }

    .pestel {
        width: 100%;
        text-align: center;
        padding: 5px;
        color: black;
    }

    .pr {
        border: solid grey 1px;
        border-radius: 50px;
        padding: 0.4% 1% 0.4% 1%;
    }
</style>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <h4 class="payslip-title" style="margin-left: 30%;">Liste des Enjeux externes de type <?php if ($ID_swot == 1) {
                                                                                                            echo "<span style='color: #eb1c24;'> ' Force ' </span>";
                                                                                                        };
                                                                                                        if ($ID_swot == 2) {
                                                                                                            echo "<span style='color: #fbaf41;'> ' Faiblesse ' </span>";
                                                                                                        } ?> </h4>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php if (isset($externe)) {
                                    foreach ($externe as $row) {
                                ?>
                                        <tr>
                                            <td>



                                                <h6><span>Enjeu :</span> <?= $row['Text_enjeu'] ?></h6>
                                                <h6><span>Description :</span> <?= $row['Description_enjeu'] ?></h6>
                                                <h6><span>Recommendation :</span> <?= $row['Corrective_enjeu'] ?></h6>

                                                <h6>Pertinance :
                                                    <?php if ($row['Priority_enjeu'] == 1) { ?>

                                                        <span class="pr table-danger"><?= $row['Priority_enjeu'] ?></span>

                                                    <?php } ?>
                                                    <?php if ($row['Priority_enjeu'] == 2) { ?>

                                                        <span class="pr table-warning">
                                                            <?= $row['Priority_enjeu'] ?>
                                                        </span>
                                                    <?php } ?> <?php if ($row['Priority_enjeu'] == 3) { ?>

                                                        <span class="pr table-light">
                                                            <?= $row['Priority_enjeu'] ?>
                                                        </span>
                                                    <?php } ?> <?php if ($row['Priority_enjeu'] == 4) { ?>

                                                        <span class="pr table-primary">
                                                            <?= $row['Priority_enjeu'] ?>
                                                        </span>
                                                    <?php } ?> <?php if ($row['Priority_enjeu'] == 5) { ?>

                                                        <span class="pr table-success">
                                                            <?= $row['Priority_enjeu'] ?>
                                                        </span>
                                                    <?php } ?>
                                                </h6>


                                                <table class="table table-striped custom-table">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <label class="pestel" style="border : 2px solid  #4f6228;">Politique</label>
                                                            </th>
                                                            <th>
                                                                <label class="pestel" style="border : 2px solid  #376092;">Economique</label>

                                                            </th>
                                                            <th>
                                                                <label class="pestel" style="border : 2px solid  #e46c0a;">Social</label>

                                                            </th>
                                                            <th>
                                                                <label class="pestel" style="border : 2px solid  #604a7b;">Technologique</label>

                                                            </th>
                                                            <th>
                                                                <label class="pestel" style="border : 2px solid  #31859c;">Legal</label>

                                                            </th>
                                                            <th>
                                                                <label class="pestel" style="border : 2px solid  #948a54;">Envirennemental</label>

                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <?php if ($row['Politic_enjeu'] == "") {
                                                                    echo " non définie";
                                                                } else {
                                                                    echo   $row['Politic_enjeu'];
                                                                } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($row['Economic_enjeu'] == "") {
                                                                    echo " non définie";
                                                                } else {
                                                                    echo   $row['Economic_enjeu'];
                                                                } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($row['Social_enjeu'] == "") {
                                                                    echo " non définie";
                                                                } else {
                                                                    echo   $row['Social_enjeu'];
                                                                } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($row['Techno_enjeu'] == "") {
                                                                    echo " non définie";
                                                                } else {
                                                                    echo   $row['Techno_enjeu'];
                                                                } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($row['Env_enjeu'] == "") {
                                                                    echo " non définie";
                                                                } else {
                                                                    echo   $row['Env_enjeu'];
                                                                } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($row['Legal_enjeu'] == "") {
                                                                    echo " non définie";
                                                                } else {
                                                                    echo   $row['Legal_enjeu'];
                                                                } ?>
                                                            </td>


                                                        </tr>
                                                    </tbody>


                                                </table>

                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="<?php echo base_url() ?>/Employee_Account/Update_Enjeu_externe?ID_enjeu=<?php echo $row['ID_enjeu'] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="<?php echo base_url() ?>/Employee_Account/Delete_Enjeuexterne?ID_enjeu=<?php echo $row['ID_enjeu'] ?>&ID_swot=<?php echo $ID_swot ?>" onclick="return confirm('Are you Sure?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>


                                <?php }
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
                                            <li class="paginate_button page-item active"><a href="?ID_swot=<?= $ID_swot ?>&page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                        <?php
                                        } else {
                                        ?>
                                            <li class="paginate_button page-item"><a href="?ID_swot=<?= $ID_swot ?>&page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                        <?php
                                        }
                                    }
                                    /************** End No page selected **************** */
                                    /****************** Selected page **************** */
                                    if (isset($_GET['page'])) {
                                        if ($i == $_GET['page']) {
                                        ?>
                                            <li class="paginate_button page-item active"><a href="?ID_swot=<?= $ID_swot ?>&page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                        <?php
                                        } else {
                                        ?>
                                            <li class="paginate_button page-item"><a href="?ID_swot=<?= $ID_swot ?>&page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
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