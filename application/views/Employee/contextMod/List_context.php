<style>
    .pestel {
        width: 30%;
        text-align: center;
        color: white;
        border-radius: 20px;
        padding: 5px;
    }

    .btn-default {
        margin-left: 94%;
        border-radius: 50%;
        border: solid 1px #eaeaea;
        margin-top: 10px;
    }
</style>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">





            <div class="widget new-comment clearfix" style="width: 100%;">
                <div class="row">
                    <h4 class="payslip-title" style="margin-left: 41%;">Enjeux Internes</h4>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="blog-details.html"><img class="img-fluid" src="assets/img/blog/blog-01.jpg" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a style="color:#eb1c24;">Force</a></h3>
                                <a href="<?php echo base_url(); ?>Employee_Account/View_Enjeu_interne?ID_swot=1" class="read-more"><i class="fa fa-long-arrow-right"></i> Liste Enjeux</a>
                                <div class="blog-info clearfix">
                                    <a href="#" class="btn btn-success btn-block" style="margin-left: 35%; width: 30%;color: white;" data-toggle="modal" data-target="#force">Ajout Enjeu </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="blog-details.html"><img class="img-fluid" src="assets/img/blog/blog-01.jpg" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a style="color:#fbaf41;">Faiblesse</a></h3>
                                <a href="<?php echo base_url(); ?>Employee_Account/View_Enjeu_interne?ID_swot=2" class="read-more"><i class="fa fa-long-arrow-right"></i> Liste Enjeux</a>
                                <div class="blog-info clearfix">
                                    <a href="#" class="btn btn-success btn-block" style="margin-left: 35%; width: 30%;color: white;" data-toggle="modal" data-target="#faiblesse">Ajout Enjeu </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget new-comment clearfix" style="width: 100%;">
                <div class="row">
                    <h4 class="payslip-title" style="margin-left: 41%;">Enjeux Externes</h4>

                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="blog-details.html"><img class="img-fluid" src="assets/img/blog/blog-01.jpg" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a style="color:#8bc43f;">Menace</a></h3>
                                <a href="<?php echo base_url(); ?>Employee_Account/View_Enjeu_externe?ID_swot=3" class="read-more"><i class="fa fa-long-arrow-right"></i> Liste Enjeux</a>
                                <div class="blog-info clearfix">
                                    <a href="#" class="btn btn-success btn-block" style="margin-left: 35%; width: 30%;color: white;" data-toggle="modal" data-target="#menace">Ajout Enjeu </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="blog-details.html"><img class="img-fluid" src="assets/img/blog/blog-01.jpg" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a style="color:#00a69c;">Opportunité</a></h3>
                                <a href="<?php echo base_url(); ?>Employee_Account/View_Enjeu_externe?ID_swot=4" class="read-more"><i class="fa fa-long-arrow-right"></i> Liste Enjeux</a>
                                <div class="blog-info clearfix">
                                    <a href="#" class="btn btn-success btn-block" style="margin-left: 35%; width: 30%;color: white;" data-toggle="modal" data-target="#opportunite">Ajout Enjeu </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <a href="<?php echo base_url() ?>/Employee_Account/Report_enjeu" class="btn btn-success btn-block" style="margin-left: 35%; width: 30%;background-color: #eb1c24;border: 1px solid #eb1c24;">Generate Report </a>
        </div>
        <!------------------------------ pop-up ------------------------------->
        <div class="modal fade" id="force" role="dialog">
            <div class="modal-dialog" style="max-width: 900px;">

                <div class="modal-content">
                    <div class="row">

                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>
                        <div class="col-md-12">
                            <div class="card-box">
                                <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Add_Enjeu" enctype="multipart/form-data" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title">General</h4>
                                            <div class="col-md-12">

                                                <input type="hidden" name="status" value="0">
                                                <input type="hidden" name="ID_swot" value="1">
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
                                                    <label>Pertinance Enjeu</label>
                                                    <input class="form-control" type="number" min="1" max="5" name="Priority_enjeu">
                                                </div>
                                                <!--div class="form-group row">
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
                                                </!--div-->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="card-title">Analyse PESTEL</h4>
                                            <div class="form-group">
                                                <label class="pestel" style="background-color: #4f6228;">Politique</label>
                                                <textarea cols="30" rows="2" class="form-control" name="Politic_enjeu"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="pestel" style="background-color: #376092;">Economique</label>
                                                <textarea cols="30" rows="2" class="form-control" name="Economic_enjeu"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="pestel" style="background-color: #e46c0a;">Social</label>
                                                <textarea cols="30" rows="2" class="form-control" name="Social_enjeu"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="pestel" style="background-color: #604a7b;">Technologique</label>
                                                <textarea cols="30" rows="2" class="form-control" name="Techno_enjeu"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="pestel" style="background-color: #31859c;">Legal</label>
                                                <textarea cols="30" rows="2" class="form-control" name="Env_enjeu"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="pestel" style="background-color: #948a54;">Envirennemental</label>
                                                <textarea cols="30" rows="2" class="form-control" name="Legal_enjeu"></textarea>
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
    </div>
    <!---------------------------End pop-up ------------------------------->
    <!------------------------------ pop-up ------------------------------->
    <div class="modal fade" id="faiblesse" role="dialog">
        <div class="modal-dialog" style="max-width: 900px;">

            <div class="modal-content">
                <div class="row">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>
                    <div class="col-md-12">
                        <div class="card-box">
                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Add_Enjeu" enctype="multipart/form-data" method="post">
                                <div class="row">

                                    <div class="col-md-6">
                                        <h4 class="card-title">General</h4>
                                        <div class="col-md-12">

                                            <input type="hidden" name="status" value="0">
                                            <input type="hidden" name="ID_swot" value="2">
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
                                                <label>Pertinance Enjeu</label>
                                                <input class="form-control" type="number" min="1" max="5" name="Priority_enjeu">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="card-title">Analyse PESTEL</h4>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #4f6228;">Politique</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Politic_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #376092;">Economique</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Economic_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #e46c0a;">Social</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Social_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #604a7b;">Technologique</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Techno_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #31859c;">Legal</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Env_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #948a54;">Envirennemental</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Legal_enjeu"></textarea>
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
    </div>
    <!---------------------------End pop-up ------------------------------->
    <!------------------------------ pop-up ------------------------------->
    <div class="modal fade" id="menace" role="dialog">
        <div class="modal-dialog" style="max-width: 900px;">

            <div class="modal-content">
                <div class="row">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>
                    <div class="col-md-12">
                        <div class="card-box">
                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Add_Enjeu" enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title">General</h4>
                                        <div class="col-md-12">

                                            <input type="hidden" name="status" value="1">
                                            <input type="hidden" name="ID_swot" value="3">
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
                                                <label>Pertinance Enjeu</label>
                                                <input class="form-control" type="number" min="1" max="5" name="Priority_enjeu">
                                            </div>



                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="card-title">Analyse PESTEL</h4>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #4f6228;">Politique</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Politic_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #376092;">Economique</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Economic_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #e46c0a;">Social</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Social_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #604a7b;">Technologique</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Techno_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #31859c;">Legal</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Env_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #948a54;">Envirennemental</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Legal_enjeu"></textarea>
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
    </div>
    <!---------------------------End pop-up ------------------------------->
    <!------------------------------ pop-up ------------------------------->
    <div class="modal fade" id="opportunite" role="dialog">
        <div class="modal-dialog" style="max-width: 900px;">

            <div class="modal-content">
                <div class="row">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>
                    <div class="col-md-12">
                        <div class="card-box">
                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Add_Enjeu" enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title">General</h4>
                                        <div class="col-md-12">

                                            <input type="hidden" name="status" value="1">
                                            <input type="hidden" name="ID_swot" value="4">
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
                                                <label>Pertinance Enjeu</label>
                                                <input class="form-control" type="number" min="1" max="5" name="Priority_enjeu">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="card-title">Analyse PESTEL</h4>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #4f6228;">Politique</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Politic_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #376092;">Economique</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Economic_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #e46c0a;">Social</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Social_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #604a7b;">Technologique</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Techno_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #31859c;">Legal</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Env_enjeu"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pestel" style="background-color: #948a54;">Envirennemental</label>
                                            <textarea cols="30" rows="2" class="form-control" name="Legal_enjeu"></textarea>
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
    </div>
    <!---------------------------End pop-up ------------------------------->




    </div>
    </div>

