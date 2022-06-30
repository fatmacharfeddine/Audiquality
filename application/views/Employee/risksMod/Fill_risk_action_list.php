<style>
    .cal-icon:after {
        background: none;
    }
</style>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title"></h4>
                </div>

            </div>
            <div class="row">
                <div class="card-box">

                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_fill_risk_action_list/" enctype="multipart/form-data" method="post">


                        <?php if (isset($ID_action_list)) {
                        ?>
                            <input type="hidden" name="ID_action_list" value="<?php echo $ID_action_list ?>">
                        <?php } ?>
                        <input type="hidden" name="ID_action" value="<?php echo $ID_action ?>">


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Resultat</label>
                                    <input type="text" name="Result_action_list" value="<?php if (isset($Result_action_list)) {
                                                                                            echo $Result_action_list;
                                                                                        } ?>" placeholder="Resultat" class="form-control floating">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Type Action</label>
                                    <div class="cal-icon">

                                        <select class="form-control floating" name="ID_type" id="ID_type">
                                            <?php
                                            foreach ($type as $row) {

                                                if (isset($ID_type)) {

                                                    if ($row['ID_type'] == $ID_type) {

                                            ?>

                                                        <option value=<?= $row['ID_type'] ?> selected><?= $row['Title_type']  ?></option>

                                                    <?php } else {
                                                    ?>

                                                        <option value=<?= $row['ID_type'] ?>><?= $row['Title_type'] ?></option>

                                                    <?php }
                                                } else {
                                                    ?>
                                                    <option value=<?= $row['ID_type'] ?>><?= $row['Title_type'] ?></option>


                                            <?php }
                                            }
                                            ?>


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Valeur Réelle</label>
                                    <input type="text" name="Real_value_action_list" value="<?php if (isset($Real_value_action_list)) {
                                                                                                echo $Real_value_action_list;
                                                                                            } ?>" placeholder="Valeur Réelle" class="form-control floating">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Valeur Cible</label>
                                    <input type="text" name="Cible_value_action_list" value="<?php if (isset($Cible_value_action_list)) {
                                                                                                    echo $Cible_value_action_list;
                                                                                                } ?>" placeholder="Valeur Cible" class="form-control floating">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Périodicité</label>
                                    <div class="cal-icon">

                                        <select class="form-control floating" name="ID_execute" id="ID_execute">
                                            <?php
                                            foreach ($execute as $row) {

                                                if (isset($ID_execute)) {

                                                    if ($row['ID_execute'] == $ID_execute) {

                                            ?>

                                                        <option value=<?= $row['ID_execute'] ?> selected><?= $row['Value_execute'] . ' ' . $row['Title_execute'] ?></option>

                                                    <?php } else {
                                                    ?>

                                                        <option value=<?= $row['ID_execute'] ?>><?= $row['Value_execute'] . ' ' . $row['Title_execute']  ?></option>

                                                    <?php }
                                                } else {
                                                    ?>
                                                    <option value=<?= $row['ID_execute'] ?>><?= $row['Value_execute'] . ' ' . $row['Title_execute']  ?></option>


                                            <?php }
                                            }
                                            ?>


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Date</label>
                                    <input type="date" name="Date_action_list" value="<?php if (isset($Date_action_list)) {
                                                                                            echo $Date_action_list;
                                                                                        } ?>" placeholder="Date" class="form-control floating">

                                </div>
                            </!--div-->
                            <!--div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Cost duration</label>
                                    <div class="cal-icon">

                                        <select class="form-control floating" name="ID_cost" id="ID_cost">
                                            <?php
                                            foreach ($cost as $row) {

                                                if (isset($ID_cost)) {

                                                    if ($row['ID_cost'] == $ID_cost) {

                                            ?>

                                                        <option value=<?= $row['ID_cost'] ?> selected><?= $row['Value_cost'] . ' ' . $row['Title_cost'] ?></option>

                                                    <?php } else {
                                                    ?>

                                                        <option value=<?= $row['ID_cost'] ?>><?= $row['Value_cost'] . ' ' . $row['Title_cost']  ?></option>

                                                    <?php }
                                                } else {
                                                    ?>
                                                    <option value=<?= $row['ID_cost'] ?>><?= $row['Value_cost'] . ' ' . $row['Title_cost']  ?></option>


                                            <?php }
                                            }
                                            ?>


                                        </select>
                                    </div>
                                </div>
                            </!--div-->
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Durée d'exécution</label>
                                    <input type="number" name="execute_action_list" value="<?php if (isset($execute_action_list)) {
                                                                                                echo $execute_action_list;
                                                                                            } ?>" placeholder="Durée D'exécution" class="form-control floating">

                                </div>
                            </div>




                            <div class="col-md-12">
                                <div class="form-group form-focus focused">
                                    <label class="col-form-label col-md-2">Etat</label>
                                    <div class="col-md-10">
                                        <div class="radio" name="status_execute">
                                            <label>
                                                <input type="radio" name="radio" id="execute" value="execute" checked> exécutée
                                            </label>
                                        </div>
                                        <div class="radio" name="status_decline">
                                            <label>
                                                <input type="radio" name="radio" id="decline" value="decline"> non exécutée
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Cause</label>


                                    <input type="text" name="Cause_action_list" id="Cause_action_list" value="<?php if (isset($Cause_action_list)) {
                                                                                                                    echo $Cause_action_list;
                                                                                                                } ?>" placeholder="Cause" class="form-control">



                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Description</label>
                                    <textarea name="Description_action_list" value="<?php if (isset($Description_action_list)) {
                                                                                        echo $Description_action_list;
                                                                                    } ?>" placeholder="Description" class="form-control floating">
                                    </textarea>
                                </div>
                            </div>
                        </div>



                        <div class="add-more">
                            <button id="btn_add" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Enregistrer </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <script>
        function populate(ID_department, post) {



            var jArray = <?php echo json_encode($phpArray); ?>;
            var jArrayname = <?php echo json_encode($phpArrayname); ?>;




            var ID_department = document.getElementById(ID_department);
            var post = document.getElementById(post);
            post.innerHTML = "";
            for (var i = 0; i < jArray.length; i++) {
                if (jArray[i] == ID_department.value) {
                    var name = jArrayname[i];

                    var optionArray = ["name|".name];
                }
                alert(jArrayname[i]);
            }

            for (var option in optionArray) {
                var pair = optionArray[option].split("|");
                var newOption = document.createElement("option");
                newOption.value = pair[0];
                newOption.innerHTML = pair[1];
                post.options.add(newOption);
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>
        var update_parent = function() {
            if ($("#decline").is(":checked")) {
                $('#ID_function').prop('disabled', false);
                $('#Cause_action_list').prop('disabled', false);

            } else {
                $('#ID_function').prop('disabled', 'disabled');
                $('#Cause_action_list').prop('disabled', 'disabled');

            }
            if ($("#execute").is(":checked")) {
                $('#ID_function').prop('disabled', true);
                $('#Cause_action_list').prop('disabled', true);

            } else {
                $('#ID_function').prop('disabled', false);
                $('#Cause_action_list').prop('disabled', false);

            }
        };
        $(update_parent);
        $("#decline").change(update_parent);
        $("#execute").change(update_parent);
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