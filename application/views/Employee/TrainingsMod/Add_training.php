<body>

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">training</li>
                    </ol>
                </nav>
                <!-- //breadcrumbs -->
                <!-- forms -->
                <section class="forms">
                    <!-- forms 1 -->

                    <div class="content">

                        <div class="row">
                            <div class="card-box">

                                <form id="test" action="<?php echo base_url(); ?>Employee_Account/Submit_add_training/" enctype="multipart/form-data" method="post">


                                    <?php if (isset($ID_training_programm)) {
                                    ?>
                                        <input type="hidden" name="ID_training_programm" value="<?php echo $ID_training_programm ?>">
                                    <?php } ?>


                                    <?php if (isset($ID_status_training)) {
                                    ?>
                                        <input type="hidden" name="ID_status_training" value="<?php echo $ID_status_training ?>">
                                    <?php } ?>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group form-focus focused">
                                                <label class="focus-label">Title Training</label>
                                                <input type="text" name="Title_training_programm" value="<?php if (isset($Title_training_programm)) {
                                                                                                                echo $Title_training_programm;
                                                                                                            } ?>" placeholder="Title Training" class="form-control floating">

                                            </div>
                                        </div>
                                        <?php if ($ID_status_training == 1) { ?>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus focused">
                                                    <label class="focus-label">Training group</label>
                                                    <div class="cal-icon">

                                                        <select class="form-control floating" name="ID_training_group" id="ID_training_group">
                                                            <?php
                                                            foreach ($training_group as $row) {

                                                                if (isset($ID_training_group)) {

                                                                    if ($row['ID_training_group'] == $ID_training_group) {

                                                            ?>

                                                                        <option value=<?= $row['ID_training_group'] ?> selected><?= $row['Name_training_group'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_training_group'] ?>><?= $row['Name_training_group'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_training_group'] ?>><?= $row['Name_training_group'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="ID_training_request" value="0">
                                            <div class="col-md-4">

                                            <?php } elseif ($ID_status_training == 0) {
                                            ?>
                                                <div class="col-md-4">
                                                    <div class="form-group form-focus focused">
                                                        <label class="focus-label">Training Request groups</label>
                                                        <div class="cal-icon">

                                                            <select class="form-control floating" name="ID_training_group_request" id="ID_training_group_request">
                                                                <?php
                                                                foreach ($request as $row) {

                                                                    if (isset($ID_training_group_request)) {

                                                                        if ($row['ID_training_group_request'] == $ID_training_group_request) {

                                                                ?>

                                                                            <option value=<?= $row['ID_training_group_request'] ?> selected><?= $row['Name_training_group_request'] ?></option>

                                                                        <?php } else {
                                                                        ?>

                                                                            <option value=<?= $row['ID_training_group_request'] ?>><?= $row['Name_training_group_request'] ?></option>

                                                                        <?php }
                                                                    } else {
                                                                        ?>
                                                                        <option value=<?= $row['ID_training_group_request'] ?>><?= $row['Name_training_group_request'] ?></option>


                                                                <?php }
                                                                }
                                                                ?>


                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="ID_training_group" value="0">

                                                <div class="col-md-4">
                                                <?php } else { ?>
                                                    <input type="hidden" name="ID_training_request" value="0">

                                                    <input type="hidden" name="ID_training_group" value="0">
                                                    <div class="col-md-8">
                                                    <?php } ?>


                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group form-focus focused">

                                                                <div class="radio" name="Frequence_risk_objectif">
                                                                    <label>
                                                                        <input type="radio" name="Frequence_risk_objectif" id="sem" value="2" checked> Interne
                                                                    </label>
                                                                </div>
                                                                <div class="radio" name="Frequence_risk_objectif">
                                                                    <label>
                                                                        <input type="radio" name="Frequence_risk_objectif" id="ann" value="3"> Externe
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>




                                                        <div class="col-md-4">
                                                            <div class="form-group form-focus focused">
                                                                <label class="focus-label">Training Organization </label>
                                                                <div class="cal-icon">

                                                                    <select class="form-control floating" name="ID_organization" id="ID_organization">
                                                                        <?php
                                                                        foreach ($organization as $row) {

                                                                            if (isset($ID_organization)) {

                                                                                if ($row['ID_organization'] == $ID_organization) {

                                                                        ?>

                                                                                    <option value=<?= $row['ID_organization'] ?> selected><?= $row['Name_organization'] ?></option>

                                                                                <?php } else {
                                                                                ?>

                                                                                    <option value=<?= $row['ID_organization'] ?>><?= $row['Name_organization'] ?></option>

                                                                                <?php }
                                                                            } else {
                                                                                ?>
                                                                                <option value=<?= $row['ID_organization'] ?>><?= $row['Name_organization'] ?></option>


                                                                        <?php }
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group form-focus focused">
                                                                <label class="focus-label">Trainer </label>
                                                                <div class="cal-icon">

                                                                    <select class="form-control floating" name="ID_employee" id="ID_employee">
                                                                        <?php
                                                                        foreach ($employee as $row) {

                                                                            if (isset($ID_employee)) {

                                                                                if ($row['ID_employee'] == $ID_employee) {

                                                                        ?>

                                                                                    <option value=<?= $row['ID_employee'] ?> selected><?= $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></option>

                                                                                <?php } else {
                                                                                ?>

                                                                                    <option value=<?= $row['ID_employee'] ?>><?= $row['Name_employee'] . ' ' . $row['Lastname_employee']  ?></option>

                                                                                <?php }
                                                                            } else {
                                                                                ?>
                                                                                <option value=<?= $row['ID_employee'] ?>><?= $row['Name_employee'] . ' ' . $row['Lastname_employee']  ?></option>


                                                                        <?php }
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>
                                                            </div>


                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group form-focus focused">
                                                                <label class="focus-label">Hours</label>
                                                                <input type="text" name="Hours_training_programm" value="<?php if (isset($Hours_training_programm)) {
                                                                                                                                echo $Hours_training_programm;
                                                                                                                            } ?>" placeholder="Hours" class="form-control floating">

                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group form-focus focused">
                                                                <label class="focus-label">Budget</label>
                                                                <input type="text" name="Budget_training_programm" value="<?php if (isset($Budget_training_programm)) {
                                                                                                                                echo $Budget_training_programm;
                                                                                                                            } ?>" placeholder="Budget" class="form-control floating">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-focus focused">
                                                                <label class="focus-label">Place</label>
                                                                <input type="text" name="Place_training_programm" value="<?php if (isset($Place_training_programm)) {
                                                                                                                                echo $Place_training_programm;
                                                                                                                            } ?>" placeholder="Place" class="form-control floating">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <label class="focus-label">Start date</label>
                                                                <input type="date" name="Startdate_training_programm" value="<?php if (isset($Startdate_training_programm)) {
                                                                                                                                    echo $Startdate_training_programm;
                                                                                                                                } ?>" placeholder="Start date" class="form-control floating">

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <label class="focus-label">End date</label>
                                                                <input type="date" name="Enddate_training_programm" value="<?php if (isset($Enddate_training_programm)) {
                                                                                                                                echo $Enddate_training_programm;
                                                                                                                            } ?>" placeholder="End date" class="form-control floating">

                                                            </div>
                                                        </div>




                                                        <div class="add-more">
                                                            <button id="btn_add" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Training</button>

                                                        </div>

                                </form>

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


                        $('form#test').submit();
                        //	swal('its OK '+result.value);
                    } else {
                        swal("This operation is canceled");
                        return false;
                    }
                });
            });

        });
    </script>

    <script>
        var update_tri = function() {






            /*  } else {
                  $('#ID_organization').prop('disabled', false);
                  $('#ID_employee').prop('disabled', false);
              }*/
            if ($("#sem").is(":checked")) {
                $('#ID_employee').prop('disabled', false);
                $('#ID_organization').prop('disabled', true);

            } else
            if ($("#ann").is(":checked")) {
                $('#ID_employee').prop('disabled', true);
                $('#ID_organization').prop('disabled', false);


            }
        };
        $(update_tri);
        $("#tri").change(update_tri);
        $("#sem").change(update_tri);
        $("#ann").change(update_tri);
    </script>