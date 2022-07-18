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

    .float-right pestle {
        background-color: red;
        padding: 1%;
        border-radius: 10px;
        color: white;
    }
</style>

<body>


    <div class="page-wrapper" style="min-height: 314px;">

        <div class="row">

        </div> <br>
        <div class="col-sm-7 col-8 text-right m-b-30">
            <div class="btn-group btn-group-sm">
                <button class="btn btn-white" onclick="printDiv('printMe')"><i class="fa fa-print fa-lg"></i> Print</button>
            </div>
        </div>

        <div class="content" id="printMe">


            <div class="row">
                <div class="col-sm-12" style="text-align: center;margin-bottom: 2%;">
                    <?php if (($entete) != false) {
                    ?>
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>Employee_Account/delete_Entete?Type_entete=<?= $Type_entete ?>&ID_entete=<?= $ID_entete ?>" style="background-color:#eb1c24;margin-bottom: 10px;">Supprimer Entête</a>

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
                        <a class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#entete">Ajouter Entête</a>
                    <?php
                    } ?>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-12">



                    <!-------------------------------------------------------------------------------------->
                    <!-------------------------------------------------------------------------------------->
                    <!-------------------------------------------------------------------------------------->

                    <table class="table table-striped custom-table">



                        <?php if (isset($interest)) {
                            foreach ($interest as $row) {
                        ?>

                                <thead>
                                    <tr>
                                        <th>
                                            <?= $row['Participant_interest'] ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php  ?>


                                    <tr>
                                        <td>


                                            <table class="table table-striped custom-table">
                                                <thead>
                                                    <tr>
                                                        <th style="width:50%"> Attente </th>
                                                        <th style="width:50%"> Exigence </th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width:50%"><?php echo $row['Attente_interest'] ?></td>
                                                        <td style="width:50%"><?php echo $row['Exigence_interest'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>



                                            <h6><span>Méthode de suivi :</span>

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

                                            </h6>
                                            <h6><span>Fréquence de suivi :</span>

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

                                            </h6>



                                            <h6>Pertinance :
                                                <?php if ($row['Priority_interest'] == 1) { ?>

                                                    <span class="pr table-danger" style="background-color:#e41a23;color:white;text-align:center;border: solid white 3px;"><?= $row['Priority_interest'] ?></span>

                                                <?php } ?>
                                                <?php if ($row['Priority_interest'] == 2) { ?>

                                                    <span class="pr table-warning" style="background-color:#e85628;color:white;text-align:center;border: solid white 3px;">
                                                        <?= $row['Priority_interest'] ?>
                                                    </span>
                                                <?php } ?> <?php if ($row['Priority_interest'] == 3) { ?>

                                                    <span class="pr table-light" style="background-color:#ece52f;color:white;text-align:center;border: solid white 3px;">
                                                        <?= $row['Priority_interest'] ?>
                                                    </span>
                                                <?php } ?> <?php if ($row['Priority_interest'] == 4) { ?>

                                                    <span class="pr table-primary" style="background-color:#0b8e41;color:white;text-align:center;border: solid white 3px;">
                                                        <?= $row['Priority_interest'] ?>
                                                    </span>
                                                <?php } ?> <?php if ($row['Priority_interest'] == 5) { ?>

                                                    <span class="pr table-success" style="background-color:#0d71b6;color:white;text-align:center;border: solid white 3px;">
                                                        <?= $row['Priority_interest'] ?>
                                                    </span>
                                                <?php } ?>
                                            </h6>




                                        </td>

                                    </tr>

                                </tbody>

                        <?php }
                        } ?>
                    </table>

                    <!-------------------------------------------------------------------------------------->
                    <!-------------------------------------------------------------------------------------->
                    <!-------------------------------------------------------------------------------------->







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