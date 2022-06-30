<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Grid</li>
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
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_risk_identify" enctype="multipart/form-data" method="post">

                                        <!--input type="hidden" name="ID_interest_group" value="<?php echo $ID_interest_group; ?>" /-->


                                        <div class="col-md-6">



                                            <?php if (isset($update_doc)) { ?>
                                                <input type="hidden" name="update_doc" value="<?php echo $update_doc ?>">

                                            <?php } ?>


                                            <?php if (isset($ID_risk)) {
                                            ?>
                                                <input type="hidden" name="ID_risk" value="<?php echo $ID_risk ?>">
                                            <?php } ?>
                                            <?php if (isset($ID_identification)) {
                                            ?>
                                                <input type="hidden" name="ID_identification" value="<?php echo $ID_identification ?>">
                                            <?php } ?>


                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3">Code</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="Code_identification" value="<?php if (isset($Code_identification)) {
                                                                                                                                    echo $Code_identification;
                                                                                                                                } ?>" placeholder="Code">


                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3">Enjeu </label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="ID_enjeu" id="ID_enjeu">
                                                        <?php
                                                        foreach ($enjeu as $row) {

                                                            if (isset($ID_enjeu)) {

                                                                if ($row['ID_enjeu'] == $ID_enjeu) {

                                                        ?>

                                                                    <option value=<?= $row['ID_enjeu'] ?> selected><?= $row['Text_enjeu'] ?></option>

                                                                <?php } else {
                                                                ?>

                                                                    <option value=<?= $row['ID_enjeu'] ?>><?= $row['Text_enjeu'] ?></option>

                                                                <?php }
                                                            } else {
                                                                ?>
                                                                <option value=<?= $row['ID_enjeu'] ?>><?= $row['Text_enjeu'] ?></option>


                                                        <?php }
                                                        }
                                                        ?>


                                                    </select>
                                                </div>
                                            </div>


                                            <!--div class="form-group row">
                                                <label class="col-form-label col-md-3">Responsable </label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="ID_processus" id="ID_processus">
                                                        <?php
                                                        foreach ($processus as $row) {

                                                            if (isset($ID_processus)) {

                                                                if ($row['ID_processus'] == $ID_processus) {

                                                        ?>

                                                                    <option value=<?= $row['ID_processus'] ?> selected><?= $row['Name_employee'] . ' ' . $row['Name_employee'] ?></option>

                                                                <?php } else {
                                                                ?>

                                                                    <option value=<?= $row['ID_processus'] ?>><?= $row['Name_employee'] . ' ' . $row['Name_employee'] ?></option>

                                                                <?php }
                                                            } else {
                                                                ?>
                                                                <option value=<?= $row['ID_processus'] ?>><?= $row['Name_employee'] . ' ' . $row['Name_employee'] ?></option>


                                                        <?php }
                                                        }
                                                        ?>


                                                    </select>
                                                </div>
                                            </!--div-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3">Method </label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="ID_identification_method" id="ID_identification_method">
                                                        <?php
                                                        foreach ($method as $row) {

                                                            if (isset($ID_identification_method)) {

                                                                if ($row['ID_identification_method'] == $ID_identification_method) {

                                                        ?>

                                                                    <option value=<?= $row['ID_identification_method'] ?> selected><?= $row['Metaphor_identification_method'] . ' : ' . $row['Title_identification_method'] ?></option>

                                                                <?php } else {
                                                                ?>

                                                                    <option value=<?= $row['ID_identification_method'] ?>><?= $row['Metaphor_identification_method'] . ' : ' . $row['Title_identification_method']  ?></option>

                                                                <?php }
                                                            } else {
                                                                ?>
                                                                <option value=<?= $row['ID_identification_method'] ?>><?= $row['Metaphor_identification_method'] . ' : ' . $row['Title_identification_method']  ?></option>


                                                        <?php }
                                                        }
                                                        ?>


                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3">Description Risk</label>
                                                <div class="col-md-9">

                                                    <textarea name="Description_identification" placeholder="Next Evaluation" class="form-control">
                                                    <?php if (isset($Description_identification)) {
                                                        echo $Description_identification;
                                                    } ?>
                                          
                                                        </textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="text-right">
                                            <button type="button" id="btn_add" class="btn btn-primary">Confirm</button>
                                        </div>


                                    </form>
                                </div>

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