
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Submit_Update_Enjeu?ID_enjeu=<?php echo $ID_enjeu ?>&status=<?php echo $status ?>" enctype="multipart/form-data" method="post">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <form action="#">

                                        <div class="form-group row">
                                            </br>
                                            <label class="col-form-label col-md-2">Analyse SWOT</label>
                                            <div class="col-md-2">
                                                </br>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="ID_swot" <?php if ($status == 1) {
                                                                                                echo "disabled";
                                                                                            } else {
                                                                                                echo "checked";
                                                                                            } ?> value="1"> Force
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="ID_swot" <?php if ($status == 1) {
                                                                                                echo "disabled";
                                                                                            } ?> value="2"> Faiblesse
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="ID_swot" <?php if ($status == 0) {
                                                                                                echo "disabled";
                                                                                            } else {
                                                                                                echo "checked";
                                                                                            } ?> value="3"> Menace
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="ID_swot" <?php if ($status == 0) {
                                                                                                echo "disabled";
                                                                                            } ?> value="4"> Opportunité
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <img src="<?php echo base_url() ?>/includes/ext/assets/template/img/context/swot.jpg" alt="" style="width: 50%;border-radius: 00%;border: solid #c9cac9 1px;">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            </br>
                                            <label class="col-form-label col-md-2">Analyse PESTLE</label>
                                            <div class="col-md-2">
                                                </br>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="ID_pestle" value="0" checked> Aucun
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="ID_pestle" value="1"> Politique
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="ID_pestle" value="2"> Economiques
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="ID_pestle" value="3"> Social
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="ID_pestle" value="4"> Technologiques
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="ID_pestle" value="5"> Legal
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="ID_pestle" value="6"> Environnemental
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                </br></br>
                                                <img src="<?php echo base_url() ?>/includes/ext/assets/template/img/context/pestel.jpg" alt="" style="width: 50%;border-radius: 00%;border: solid #c9cac9 1px;">

                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>

