<!--?php include "/../Header.php"; ?-->


<body>

    <!--?php include "/../Menu.php"; ?-->





    <style>
        .float-right pestle {
            background-color: red;
            padding: 1%;
            border-radius: 10px;
            color: white;
        }
    </style>

    <body>


        <div class="page-wrapper" style="min-height: 314px;">
            <div class="content">
                <div class="row">

                    <div class="col-sm-7 col-8 text-right m-b-30">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-white">CSV</button>
                            <button class="btn btn-white" onclick="printDiv('printMe')">PDF</button>
                            <button class="btn btn-white" onclick="window.print()"><i class="fa fa-print fa-lg"></i> Print</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12" style="text-align: center;margin-bottom: 2%;">
                        <?php if (($entete) != false) {
                        ?>

                            <table class="table table-bordered mb-0">
                                <tr>
                                    <td style="width: 20%;text-align: center;">
                                        <img src="<?= base_url() ?>/uploads/Company/<?= $Logo_company ?>" style="width: 100px;">
                                    </td>
                                    <td style="text-align: center;">
                                        <h3 class="blog-title" style="text-align: center;"> <?php echo $Title_entete ?></h3>
                                    </td>
                                    <td style="width: 20%;">
                                        <p>Réf : LI-<?php echo $Prefix_processus . '-' . $Order_doc_entete ?></p>
                                        <p>Révision : <?php echo $Version_doc_entete ?></p>

                                    </td>
                                </tr>

                            </table>
                        <?php  } else {
                        ?>
                            Aucune entête définie !!
                        <?php
                        } ?>
                    </div>
                </div>
                <div class="row" id="printMe">

                    <div class="col-sm-12">
                        <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Parties Interessées</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5px;"></th>

                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Attentes</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Exigences</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Méthode de Suivi</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Fréquence de Suivi</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (isset($interest)) {
                                    if (isset($empty)) {
                                ?>
                                        <?php } else {
                                        foreach ($interest as $row) {
                                        ?>
                                            <tr role="row" class="odd">



                                                <td class="sorting_1"><?= $row['Participant_interest'] ?></td>
                                                <td class="sorting_1"> <img src="<?php echo base_url() ?>Auditquality//includes/ext/assets/template/img/context/fleche2.png" alt="" style="width: 100%;">
                                                </td>
                                                <td class="sorting_1"><?php echo $row['Attente_interest'] ?></td>
                                                <td class="sorting_1"><?php echo $row['Exigence_interest'] ?></td>

                                                <td class="sorting_1">

                                                    <?php
                                                    if ($row['Method_interest'] == 1) {
                                                        echo "Formulaire";
                                                    }
                                                    if ($row['Method_interest'] == 2) {
                                                        echo "Email";
                                                    }
                                                    if ($row['Method_interest'] == 3) {
                                                        echo "Autre";
                                                    }
                                                    ?>

                                                </td>
                                                <td class="sorting_1">
                                                    <?php
                                                    if ($row['Frequence_interest'] == 1) {
                                                        echo "hebdomadaire";
                                                    }
                                                    if ($row['Frequence_interest'] == 2) {
                                                        echo "mensuel";
                                                    }
                                                    if ($row['Frequence_interest'] == 3) {
                                                        echo "trimestriel";
                                                    }
                                                    if ($row['Frequence_interest'] == 4) {
                                                        echo "semestriel";
                                                    }
                                                    if ($row['Frequence_interest'] == 5) {
                                                        echo "annuel";
                                                    }
                                                    ?>
                                                </td>

                                                <!--
                                                            <?php if ($row['Priority_interest'] == 0) { ?>

                                                                <td>
                                                                    <h5 class="time-title p-0"><?= $row['Priority_interest'] ?></h5>
                                                                </td>
                                                            <?php } ?>

                                                            <?php if ($row['Priority_interest'] == 1) { ?>

                                                                <td class="table-danger">
                                                                    <h5 class="time-title p-0"><?= $row['Priority_interest'] ?></h5>
                                                                </td>
                                                            <?php } ?>
                                                            <?php if ($row['Priority_interest'] == 2) { ?>

                                                                <td class="table-warning">
                                                                    <h5 class="time-title p-0"><?= $row['Priority_interest'] ?></h5>
                                                                </td>
                                                            <?php } ?> <?php if ($row['Priority_interest'] == 3) { ?>

                                                                <td class="table-light">
                                                                    <h5 class="time-title p-0"><?= $row['Priority_interest'] ?></h5>
                                                                </td>
                                                            <?php } ?> <?php if ($row['Priority_interest'] == 4) { ?>

                                                                <td class="table-primary">
                                                                    <h5 class="time-title p-0"><?= $row['Priority_interest'] ?></h5>
                                                                </td>
                                                            <?php } ?> <?php if ($row['Priority_interest'] == 5) { ?>

                                                                <td class="table-success">
                                                                    <h5 class="time-title p-0"><?= $row['Priority_interest'] ?></h5>
                                                                </td>
                                                            <?php } ?>
                                                            -->




                                            </tr>
                                <?php }
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
        <!------------------------------ pop-up ------------------------------->
        <div class="modal fade" id="entete" role="dialog">
            <div class="modal-dialog" style="max-width: 900px;">

                <div class="modal-content">
                    <div class="row">

                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>
                        <div class="col-md-12">
                            <div class="card-box">
                                <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_add_Entete" enctype="multipart/form-data" method="post">
                                    <h4 class="page-title">Informations Entête Document :</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row" style="border-bottom: 2px dashed #ccc;">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3">Titre du document</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="Title_entete">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3">processus </label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="ID_processus" id="ID_processus">
                                                                <?php
                                                                foreach ($processus as $row) {

                                                                    if (isset($ID_processus)) {

                                                                        if ($row['ID_processus'] == $ID_processus) {

                                                                ?>

                                                                            <option value=<?= $row['ID_processus'] ?> selected><?= $row['Title_processus'] ?> || Responsable : <?= $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></option>

                                                                        <?php } else {
                                                                        ?>

                                                                            <option value=<?= $row['ID_processus'] ?> selected><?= $row['Title_processus'] ?> || Responsable : <?= $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></option>

                                                                        <?php }
                                                                    } else {
                                                                        ?>
                                                                        <option value=<?= $row['ID_processus'] ?> selected><?= $row['Title_processus'] ?> || Responsable : <?= $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></option>


                                                                <?php }
                                                                }
                                                                ?>


                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="hidden" name="ID_doc" value="6">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3">Type de document </label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="ID_doc" id="ID_doc">
                                                                <option value="11" selected disabled>LI : Liste</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3">Numéro d'ordre du document</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="Order_doc_entete">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3">Version</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="Version_doc_entete">

                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="Type_entete" value="1">
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="text-right">
                                <button id="btn_add" type="submit" class="btn btn-primary" style="margin: 20px;">Confirmer</button>
                            </div>
                            </form>


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


        <!--?php include "/../Footer.php"; ?-->