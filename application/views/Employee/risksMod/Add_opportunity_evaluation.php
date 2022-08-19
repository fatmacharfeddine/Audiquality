<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Evaluation de l'opportunité</li>
                    </ol>
                </nav>
                <!-- //breadcrumbs -->
                <!-- forms -->
                <section class="forms">
                    <!-- forms 1 -->

                    <div class="content">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_opportunity_evaluation" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <!--input type="hidden" name="ID_sector" value="<?php echo $ID_sector ?>"-->

                                                <?php if (isset($ID_evaluation)) {
                                                ?>
                                                    <input type="text" name="ID_evaluation" value="<?php echo $ID_evaluation ?>">
                                                <?php } ?>

                                                <input type="hidden" name="ID_risk" value="<?php echo $ID_risk ?>">
                                                <input type="hidden" name="ID_identification" value="<?php echo $ID_identification ?>">


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Avantage </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="avantage_evaluation" id="avantage_evaluation" value="<?= $row["Value_avantage"]; ?>" onkeyup="criticity()">
                                                            <?php
                                                            foreach ($avantage as $row) {

                                                                if (isset($ID_avantage)) {

                                                                    if ($row['ID_avantage'] == $avantage_evaluation) {

                                                            ?>

                                                                        <option value=<?= $row['ID_avantage'] ?> selected><?= $row['Value_avantage'] . ' : ' . $row['Title_avantage'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_avantage'] ?>><?= $row['Value_avantage'] . ' : ' . $row['Title_avantage'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_avantage'] ?>><?= $row['Value_avantage'] . ' : ' . $row['Title_avantage'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Effort </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="effort_evaluation" id="effort_evaluation" value="<?= $row["Value_effort"]; ?>" onkeyup="criticity()">
                                                            <?php
                                                            foreach ($effort as $row) {

                                                                if (isset($ID_effort)) {

                                                                    if ($row['ID_effort'] == $effort_evaluation) {

                                                            ?>

                                                                        <option value=<?= $row['ID_effort'] ?> selected><?= $row['Value_effort'] . ' : ' . $row['Title_effort'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_effort'] ?>><?= $row['Value_effort'] . ' : ' . $row['Title_effort'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_effort'] ?>><?= $row['Value_effort'] . ' : ' . $row['Title_effort'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Criticité </label>
                                                    <div class="col-md-9">
                                                        <h3 style="background-color:#ffff66;color: black;padding: 5px;border: 1px solid black;border-radius: 50px;width: 50px;text-align: center;" id="result">1</h3>
                                                    </div>
                                                </div>




                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Priorité</label>
                                                    <div class="col-md-9">
                                                        <h3 style="background-color:#ffff66;color: black;padding: 5px;border:solid 1px black;width: 150px;text-align: center;" id="result2">1</h3>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Conséquence</label>
                                                    <div class="col-md-9">

                                                        <textarea name="consequence_evaluation" value="<?php if (isset($consequence_evaluation)) {
                                                                                                            echo $consequence_evaluation;
                                                                                                        } ?>" placeholder="Next Evaluation" class="form-control">
                                                        </textarea>
                                                    </div>
                                                </div>



                                            </div>

                                            <div class="col-md-7">
                                                <img style="width:500px" src="<?= base_url() ?>includes/ext/assets/template/img/risk/matrix_opp.png">
                                            </div>
                                        </div>



                                        <div class="text-right">
                                            <button id="btn_add" type="button" class="btn btn-primary">Confirm</button>
                                        </div>
                                    </form>


                                </div>

                            </div>
                        </div>
                    </div>



                </section>
                <!-- //forms -->
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


    <script>
        var update_parent = function() {
            if ($("#parent").is(":checked")) {
                $('#ID_chapter').prop('disabled', false);
                $('#Name_chapter').prop('disabled', false);

            } else {
                $('#ID_chapter').prop('disabled', 'disabled');
                $('#Name_chapter').prop('disabled', 'disabled');

            }
            if ($("#main").is(":checked")) {
                $('#ID_chapter').prop('disabled', true);
                $('#Name_chapter').prop('disabled', true);

            } else {
                $('#ID_chapter').prop('disabled', false);
                $('#Name_chapter').prop('disabled', false);

            }
        };
        $(update_parent);
        $("#parent").change(update_parent);
        $("#main").change(update_parent);
    </script>
    <script>
        $(document).ready(function() {




            $("#btn_add").click(function() {
                swal({
                    title: 'Save',
                    text: "Are you sure?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancel',

                    confirmButtonText: 'Yes'
                }).then((result) => {

                    if (result.value) {
                        //$("#action").val(1);


                        $('form#popup').submit();
                        //	swal('its OK '+result.value);
                    } else {
                        swal("This operation is canceled");
                        return false;
                    }
                });
            });

        });
    </script>
    <script type="text/javascript">
        var avantage_evaluation = document.getElementById('avantage_evaluation');
        var effort_evaluation = document.getElementById('effort_evaluation');
        var result = document.getElementById('result');

        avantage_evaluation.addEventListener("input", sum);
        effort_evaluation.addEventListener("input", sum);

        function sum() {

            var one = parseFloat(avantage_evaluation.value) || 0;
            var two = parseFloat(effort_evaluation.value) || 0;

            var add = one * two;

            if ((add == 1) || (add == 4) || (add == 9) || (add == 16)) {
                result.style.backgroundColor = "#ffff66";
                result2.style.backgroundColor = "#ffff66";

                pr = 2;
            }
            if (two < one) {


                if ((add == 2) || (add == 6) || (add == 12)) {
                    result.style.backgroundColor = "#ffff99";
                    result2.style.backgroundColor = "#ffff99";

                    pr = 2;
                }
                if ((add == 3) || (add == 8)) {
                    result.style.backgroundColor = "#92d050";
                    result2.style.backgroundColor = "#92d050";

                    pr = 1;

                }
                if ((add == 4)) {
                    result.style.backgroundColor = "#00b050";
                    result2.style.backgroundColor = "#00b050";

                    pr = 1;

                }
            }

            if (one < two) {


                if ((add == 2) || (add == 6) || (add == 12)) {
                    result.style.backgroundColor = "#ffc000";
                    result2.style.backgroundColor = "#ffc000";

                    pr = 2;
                }
                if ((add == 3) || (add == 8)) {
                    result.style.backgroundColor = "#ff99cc";
                    result2.style.backgroundColor = "#ff99cc";

                    pr = 3;

                }
                if ((add == 4)) {
                    result.style.backgroundColor = "#f00";
                    result2.style.backgroundColor = "#f00";

                    pr = 3;

                }
            }

            result.innerHTML = add;
            result2.innerHTML = pr;
        }
    </script>