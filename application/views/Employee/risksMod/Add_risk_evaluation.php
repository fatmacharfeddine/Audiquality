<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Evaluation du risque</li>
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
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_risk_evaluation/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <!--input type="hidden" name="ID_sector" value="<?php echo $ID_sector ?>"-->

                                                <?php if (isset($ID_evaluation)) {
                                                ?>
                                                    <input type="hidden" name="ID_evaluation" value="<?php echo $ID_evaluation ?>">
                                                <?php } ?>

                                                <input type="hidden" name="ID_risk" value="<?php echo $ID_risk ?>">
                                                <input type="hidden" name="ID_identification" value="<?php echo $ID_identification ?>">


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Gravité </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="Gavity_evaluation" id="Gavity_evaluation" value="<?= $row["Value_gravity"]; ?>" onkeyup="criticity()">
                                                            <?php
                                                            foreach ($gravity as $row) {

                                                                if (isset($ID_gravity)) {

                                                                    if ($row['ID_gravity'] == $Gavity_evaluation) {

                                                            ?>

                                                                        <option value=<?= $row['ID_gravity'] ?> selected><?= $row['Value_gravity'] . ' : ' . $row['Title_gravity'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_gravity'] ?>><?= $row['Value_gravity'] . ' : ' . $row['Title_gravity'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_gravity'] ?>><?= $row['Value_gravity'] . ' : ' . $row['Title_gravity'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Probabilité </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="Probability_evaluation" id="Probability_evaluation" value="<?= $row["Value_probability"]; ?>" onkeyup="criticity()">
                                                            <?php
                                                            foreach ($probability as $row) {

                                                                if (isset($ID_probability)) {

                                                                    if ($row['ID_probability'] == $Probability_evaluation) {

                                                            ?>

                                                                        <option value=<?= $row['ID_probability'] ?> selected><?= $row['Value_probability'] . ' : ' . $row['Title_probability'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_probability'] ?>><?= $row['Value_probability'] . ' : ' . $row['Title_probability'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_probability'] ?>><?= $row['Value_probability'] . ' : ' . $row['Title_probability'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Criticité </label>
                                                    <div class="col-md-9">
                                                        <h3 style="background-color:green;color: black;padding: 5px;border: 1px solid black;border-radius: 50px;width: 50px;text-align: center;" id="result">1</h3>
                                                    </div>
                                                </div>




                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Priorité</label>
                                                    <div class="col-md-9">
                                                        <h3 style="background-color:green;color: black;padding: 5px;border:solid 1px black;width: 150px;text-align: center;" id="result2">1</h3>
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
                                                <img style="width:500px" src="<?= base_url() ?>includes/ext/assets/template/img/risk/matrix_risk.png">
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
        var Gavity_evaluation = document.getElementById('Gavity_evaluation');
        var Probability_evaluation = document.getElementById('Probability_evaluation');
        var result = document.getElementById('result');

        Gavity_evaluation.addEventListener("input", sum);
        Probability_evaluation.addEventListener("input", sum);

        function sum() {

            var one = parseFloat(Gavity_evaluation.value) || 0;
            var two = parseFloat(Probability_evaluation.value) || 0;

            var add = one * two;

            if ((add == 1) || (add == 2) || (add == 3)) {
                result.style.backgroundColor = "green";
                result2.style.backgroundColor = "green";

                pr = 3;
            }
            if ((add == 4) || (add == 6)) {
                result.style.backgroundColor = "yellow";
                result2.style.backgroundColor = "yellow";

                pr = 2;

            }
            if ((add == 8) || (add == 9) || (add == 12) || (add == 16)) {
                result.style.backgroundColor = "red";
                result2.style.backgroundColor = "red";

                pr = 1;

            }
            result.innerHTML = add;
            result2.innerHTML = pr;
        }
    </script>