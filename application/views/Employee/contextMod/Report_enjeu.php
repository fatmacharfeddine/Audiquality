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
        <div class="row">

        </div> <br>
        <div class="col-sm-7 col-8 text-right m-b-30">
            <div class="btn-group btn-group-sm">
                <button class="btn btn-white" onclick="printDiv('printMe')"><i class="fa fa-print fa-lg"></i> Print</button>
            </div>
        </div>
        <div class="content" id="printMe">
            <div class="row">
                <h4 class="payslip-title" style="margin-left: 30%;">Liste des Enjeux </h4>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">



                            <?php if (isset($enjeux)) {
                                foreach ($enjeux as $row) {
                            ?>
                                    <?php if ($row['ID_swot'] == 1) {
                                        $swot = "Force";
                                    } ?>
                                    <?php if ($row['ID_swot'] == 2) {
                                        $swot = "Faiblesse";
                                    } ?>
                                    <?php if ($row['ID_swot'] == 3) {
                                        $swot = "Menace";
                                    } ?>
                                    <?php if ($row['ID_swot'] == 4) {
                                        $swot = "Opportunité";
                                    } ?>

                                    <thead>
                                        <tr>
                                            <th>
                                                Type Enjeu : <?php echo $swot ?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php  ?>


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

                                        </tr>

                                    </tbody>

                            <?php }
                            } ?>
                        </table>


                    </div>
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
                                            <input type="hidden" name="Type_entete" value="2">
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