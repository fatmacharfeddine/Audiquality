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
            <div class="row">
                <div class="col-md-12">
                    <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Submit_Update_Enjeu_Externe?ID_enjeu=<?php echo $ID_enjeu ?>" enctype="multipart/form-data" method="post">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card-box">
                                    <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Add_Enjeu" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="card-title">General</h4>
                                                <div class="col-md-12">

                                                    <input type="hidden" name="status" value="0">
                                                    <input type="hidden" name="ID_swot" value="1">

                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3">Type</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="ID_swot" id="ID_swot">
                                                                <option value="1" <?php if ($ID_swot == 1) {
                                                                                        echo "selected";
                                                                                    } ?>>Force</option>
                                                                <option value="2" <?php if ($ID_swot == 2) {
                                                                                        echo "selected";
                                                                                    } ?>>Faiblesse</option>
                                                                <option value="3" <?php if ($ID_swot == 3) {
                                                                                        echo "selected";
                                                                                    } ?>>Menace</option>
                                                                <option value="4" <?php if ($ID_swot == 4) {
                                                                                        echo "selected";
                                                                                    } ?>>Opportunité</option>

                                                            </select>


                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Text Enjeu</label>
                                                        <textarea cols="30" rows="4" class="form-control" name="Text_enjeu"><?php if (isset($Text_enjeu)) {
                                                                                                                                echo $Text_enjeu;
                                                                                                                            } ?>
                        </textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea cols="30" rows="4" class="form-control" name="Description_enjeu"><?php if (isset($Description_enjeu)) {
                                                                                                                                        echo $Description_enjeu;
                                                                                                                                    } ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Recommendation</label>
                                                        <textarea cols="30" rows="4" class="form-control" name="Corrective_enjeu"><?php if (isset($Corrective_enjeu)) {
                                                                                                                                        echo $Corrective_enjeu;
                                                                                                                                    } ?></textarea>

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pertinance Enjeu</label>
                                                        <input class="form-control" type="number" min="1" max="5" name="Priority_enjeu" value="<?php if (isset($Priority_enjeu)) {
                                                                                                                                                    echo $Priority_enjeu;
                                                                                                                                                } ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="card-title">Analyse PESTEL</h4>
                                                <div class="form-group">
                                                    <label class="pestel" style="background-color: #4f6228;">Politique</label>
                                                    <textarea cols="30" rows="2" class="form-control" name="Politic_enjeu"><?php if (isset($Politic_enjeu)) {
                                                                                                                                echo $Politic_enjeu;
                                                                                                                            } ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="pestel" style="background-color: #376092;">Economique</label>
                                                    <textarea cols="30" rows="2" class="form-control" name="Economic_enjeu"><?php if (isset($Economic_enjeu)) {
                                                                                                                                echo $Economic_enjeu;
                                                                                                                            } ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="pestel" style="background-color: #e46c0a;">Social</label>
                                                    <textarea cols="30" rows="2" class="form-control" name="Social_enjeu"><?php if (isset($Social_enjeu)) {
                                                                                                                                echo $Social_enjeu;
                                                                                                                            } ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="pestel" style="background-color: #604a7b;">Technologique</label>
                                                    <textarea cols="30" rows="2" class="form-control" name="Techno_enjeu"><?php if (isset($Techno_enjeu)) {
                                                                                                                                echo $Techno_enjeu;
                                                                                                                            } ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="pestel" style="background-color: #31859c;">Envirennemental</label>
                                                    <textarea cols="30" rows="2" class="form-control" name="Env_enjeu"><?php if (isset($Env_enjeu)) {
                                                                                                                            echo $Env_enjeu;
                                                                                                                        } ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="pestel" style="background-color: #948a54;">Legal</label>
                                                    <textarea cols="30" rows="2" class="form-control" name="Legal_enjeu"> <?php if (isset($Legal_enjeu)) {
                                                                                                                                echo $Legal_enjeu;
                                                                                                                            } ?></textarea>
                                                </div>




                                            </div>
                                        </div>

                                </div>
                                <div class="text-right">
                                    <button id="btn_add" type="submit" class="btn btn-primary" style="margin: 20px;">Confirmer</button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>

