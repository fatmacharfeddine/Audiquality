
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">


            <div class="row">
                <a href="#" class="btn btn-success btn-block" style="margin-left: 35%; width: 30%;" data-toggle="modal" data-target="#add_group">Ajout Enjeu </a>
            </div>
            <div class="row" style="margin-top : 2% ">
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card member-panel">


                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block">Enjeux Interne</h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="d-none">
                                            <tr>
                                                <th>Text Enjeu</th>
                                                <th>Priorité Enjeu</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($interne)) {
                                                foreach ($interne as $row) {
                                            ?>

                                                    <tr>
                                                        <td style="min-width: 200px;">
                                                            <?= $row['Text_enjeu'] ?>
                                                        </td>
                                                        <?php if ($row['Priority_enjeu'] == 1) { ?>

                                                            <td class="table-danger">
                                                                <h5 class="time-title p-0"><?= $row['Priority_enjeu'] ?></h5>
                                                            </td>
                                                        <?php } ?>
                                                        <?php if ($row['Priority_enjeu'] == 2) { ?>

                                                            <td class="table-warning">
                                                                <h5 class="time-title p-0"><?= $row['Priority_enjeu'] ?></h5>
                                                            </td>
                                                        <?php } ?> <?php if ($row['Priority_enjeu'] == 3) { ?>

                                                            <td class="table-light">
                                                                <h5 class="time-title p-0"><?= $row['Priority_enjeu'] ?></h5>
                                                            </td>
                                                        <?php } ?> <?php if ($row['Priority_enjeu'] == 4) { ?>

                                                            <td class="table-primary">
                                                                <h5 class="time-title p-0"><?= $row['Priority_enjeu'] ?></h5>
                                                            </td>
                                                        <?php } ?> <?php if ($row['Priority_enjeu'] == 5) { ?>

                                                            <td class="table-success">
                                                                <h5 class="time-title p-0"><?= $row['Priority_enjeu'] ?></h5>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                            <?php           }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center bg-white">
                            <a href="<?php echo base_url(); ?>Employee_Account/View_Enjeu_interne" class="text-muted">View all</a>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card member-panel">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block">Enjeux Externe</h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="d-none">
                                            <tr>
                                                <th>Text Enjeu</th>
                                                <th>Priorité Enjeu</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($externe)) {
                                                foreach ($externe as $row) {
                                            ?>

                                                    <tr>
                                                        <td style="min-width: 200px;">
                                                            <?= $row['Text_enjeu'] ?>
                                                        </td>
                                                        <?php if ($row['Priority_enjeu'] == 1) { ?>

                                                            <td class="table-danger">
                                                                <h5 class="time-title p-0"><?= $row['Priority_enjeu'] ?></h5>
                                                            </td>
                                                        <?php } ?>
                                                        <?php if ($row['Priority_enjeu'] == 2) { ?>

                                                            <td class="table-warning">
                                                                <h5 class="time-title p-0"><?= $row['Priority_enjeu'] ?></h5>
                                                            </td>
                                                        <?php } ?> <?php if ($row['Priority_enjeu'] == 3) { ?>

                                                            <td class="table-light">
                                                                <h5 class="time-title p-0"><?= $row['Priority_enjeu'] ?></h5>
                                                            </td>
                                                        <?php } ?> <?php if ($row['Priority_enjeu'] == 4) { ?>

                                                            <td class="table-primary">
                                                                <h5 class="time-title p-0"><?= $row['Priority_enjeu'] ?></h5>
                                                            </td>
                                                        <?php } ?> <?php if ($row['Priority_enjeu'] == 5) { ?>

                                                            <td class="table-success">
                                                                <h5 class="time-title p-0"><?= $row['Priority_enjeu'] ?></h5>
                                                            </td>
                                                        <?php } ?>


                                                    </tr>
                                            <?php           }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center bg-white">
                            <a href="<?php echo base_url(); ?>Employee_Account/View_Enjeu_externe" class="text-muted">View all</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <a href="<?php echo base_url() ?>/Employee_Account/Report_enjeu" class="btn btn-success btn-block" style="margin-left: 35%; width: 30%;background-color: #eb1c24;border: 1px solid #eb1c24;">Generate Report </a>
            </div>
            <!------------------------------ pop-up ------------------------------->
            <div class="modal fade" id="add_group" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="row">
                            <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>
                            <div class="col-md-12">
                                <div class="card-box">
                                    <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Add_Enjeu" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group" style="text-align: center;">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="product_active" value="Interne" checked="">
                                                        <label class="form-check-label" for="product_active">
                                                            Enjeu Interne
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="product_inactive" value="Externe">
                                                        <label class="form-check-label" for="product_inactive">
                                                            Enjeu Externe
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Text Enjeu</label>
                                                    <textarea cols="30" rows="4" class="form-control" name="Text_enjeu"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea cols="30" rows="4" class="form-control" name="Description_enjeu"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Recommendation</label>
                                                    <textarea cols="30" rows="4" class="form-control" name="Corrective_enjeu"></textarea>

                                                </div>
                                                <div class="form-group">
                                                    <label>priorité Enjeu</label>
                                                    <input class="form-control" type="number" min="1" max="5" name="Priority_enjeu">
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




        </div>
    </div>

