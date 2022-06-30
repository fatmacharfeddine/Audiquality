<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="container-fluid content-top-gap">
                <section class="forms">

                    <div class="col-sm-7 col-8 text-right m-b-30">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-white" onclick="printDiv('printMe')"><i class="fa fa-print fa-lg"></i> Print</button>
                        </div>
                    </div>

            </div>
            <div class="content" id="printMe">


                <div class="row" style="background: white;margin-bottom: 1%;">

                    <table class="table table-bordered mb-0">
                        <tr>
                            <td style="width: 20%;text-align: center;">
                                <img src="<?= base_url() ?>/uploads/Company/<?= $Logo_company ?>" style="width: 100px;">
                            </td>
                            <td style="text-align: center;">
                                <h3 class="blog-title" style="text-align: center;">Processus <?php echo $Title_processus ?></h3>
                            </td>
                            <td style="width: 20%;">
                                <p>Réf : PS-<?php echo $Prefix_processus . '-' . $Order_doc_processus ?></p>
                                <p>Révision : <?php echo $Version_doc_processus ?></p>

                            </td>
                        </tr>

                    </table>
                </div>
                <div class="row">

                    <div class="col-md-3">
                        <div class="row">
                            <div class="blog-view">
                                <article class="blog blog-single-post">
                                    <h5>Moyens nécessaires au fonctionnement du processus :</h5>
                                    <?php echo $processtools ?>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">

                        <div class="blog-view">
                            <article class="blog blog-single-post">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td style="padding: 10px 10px 0px 10px;"><strong>Objectifs du processus :</strong> <span class="float-right"><?php echo $processtarget ?></span></td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 10px 0px 10px;"><strong>Domaine d’application :</strong> <span class="float-right"><?php echo $processDomain ?></span></td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 10px 10px 10px;"><strong>Pilote : </strong> <span class="float-right"><?php echo $Name_employee . ' ' . $Lastname_employee ?></span></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                <div class="row" style="margin-top: -2%; margin-bottom: 2%;">
                    <div class="col-md-3">
                        <img class="img-fluid" style="transform: rotate(-45deg);max-width: 40px;;position: absolute;right: 80px;" src="<?php echo base_url() ?>includes/ext/assets/images/arrow/ar-down.png" alt="">
                    </div>
                    <div class="col-md-7" style="text-align: center;">
                        <img class="img-fluid" style="max-width: 40px;;" src="<?php echo base_url() ?>includes/ext/assets/images/arrow/ar-down.png" alt="">
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="blog-view">
                                    <article class="blog blog-single-post">
                                        <h5>Eléments d’entrée :</h5>
                                        <?php echo $processinput ?>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img class="img-fluid" style="max-height: 40px;margin-top: 40px;" src="<?php echo base_url() ?>includes/ext/assets/images/arrow/ar-right.png" alt="">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="blog-view">
                                    <article class="blog blog-single-post">
                                        <h5>Enregistrements générés par le processus :</h5>
                                        <?php echo $processgenelements ?>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img class="img-fluid" style="max-height: 40px;margin-top: 40px;" src="<?php echo base_url() ?>includes/ext/assets/images/arrow/ar-right.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-box">
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Activités du processus</th>
                                                <th>Responsable</th>
                                                <th>Comment</th>
                                                <th>Eléments de preuves / Enregistrements</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (($activity) == false) {
                                            } else {
                                                foreach ($activity as $row) { ?>
                                                    <tr class="table-primary">
                                                        <td colspan="4" style="border-color: #b8daff;"><?php echo $row['GroupName'] ?></td>
                                                        <td style="border-color: #b8daff;">

                                                            <a href="<?php echo base_url() ?>/Employee_Account/Delete_processusgroup?GroupID=<?php echo $row['GroupID'] ?>&ID_processus=<?php echo $ID_processus ?>">
                                                                <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                            </a>
                                                            <!--a href="<?php echo base_url() ?>/Employee_Account/Form_edit_response?ID_question=1&amp;ID_response=20&amp;ID_grid=1">
                                                                <button class="btn btn-primary btn-primary-three float-right" style="width: 38px; margin-right: 5%;"><i class="fa fa-pencil m-r-5"></i></button>
                                                            </a-->
                                                        </td>
                                                    </tr>
                                                    <?php if (($item) == false) {
                                                    } else {
                                                        foreach ($item as $row2) {
                                                            if ($row['GroupID'] == $row2['GroupID']) { ?>
                                                                <tr>
                                                                    <td><?php echo $row2['ActivityItem'] ?></td>
                                                                    <td><?php echo $row2['Responsable'] ?></td>
                                                                    <td><?php echo $row2['Comment'] ?></td>
                                                                    <td><?php echo $row2['Proof'] ?></td>
                                                                    <td style="border-color: #b8daff;">

                                                                        <a href="<?php echo base_url() ?>/Employee_Account/Delete_processusgritem?ItemGrID=<?php echo $row2['ItemGrID'] ?>&ID_processus=<?php echo $ID_processus ?>">
                                                                            <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                                        </a>

                                                                    </td>
                                                                </tr>
                                                    <?php }
                                                        }
                                                    } ?>


                                            <?php    }
                                            } ?>




                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-fluid" style="max-height: 40px;margin-top: 40px;" src="<?php echo base_url() ?>includes/ext/assets/images/arrow/ar-right.png" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="blog-view">
                                    <article class="blog blog-single-post">
                                        <h5>Eléments de sortie :</h5>
                                        <?php echo $processoutput ?>
                                    </article>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-fluid" style="max-height: 40px;margin-top: 40px;" src="<?php echo base_url() ?>includes/ext/assets/images/arrow/ar-right.png" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="blog-view">
                                    <article class="blog blog-single-post">
                                        <h5>Indicateurs de mesure des performances :</h5>
                                        <?php echo $processkpi ?>
                                    </article>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
    </div>

    <!------------------------------ pop-up ------------------------------->
    <div class="modal fade" id="activity" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="row">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                    <div class="col-md-12">
                        <div class="card-box">
                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_add_processusgroup" enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <h4 class="card-title">Activité</h4>

                                                <textarea rows="10" cols="70" class="form-control" name="GroupName">   </textarea>
                                                <input type="hidden" class="form-control" name="ID_processus" value="<?php echo $ID_processus; ?>">
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
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;

        }
    </script>