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
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_risk_action/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!--input type="hidden" name="ID_sector" value="<?php echo $ID_sector ?>"-->

                                                <?php if (isset($ID_action)) {
                                                ?>
                                                    <input type="hidden" name="ID_action" value="<?php echo $ID_action ?>">
                                                <?php } ?>
                                                <input type="hidden" name="ID_risk" value="<?php echo $ID_risk ?>">
                                                <input type="hidden" name="ID_identification" value="<?php echo $ID_identification ?>">

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Name Action Plan</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Name_action" value="<?php if (isset($Name_action)) {
                                                                                                            echo $Name_action;
                                                                                                        } ?>" placeholder="Name" class="form-control">

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Response </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="Response_action" id="Response_action">
                                                            <?php
                                                            foreach ($response as $row) {

                                                                if (isset($Response_action)) {

                                                                    if ($row['ID_response'] == $Response_action) {

                                                            ?>

                                                                        <option value=<?= $row['ID_response'] ?> selected><?= $row['Title_response'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_response'] ?>><?= $row['Title_response'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_response'] ?>><?= $row['Title_response'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Description </label>
                                                    <div class="col-md-9">
                                                        <textarea cols="30" rows="6" class="form-control" name="Description_action" value="<?php if (isset($Description_action)) {
                                                                                                                                                echo $Description_action;
                                                                                                                                            } ?>" placeholder="Description">
                                                                                                                        </textarea>

                                                    </div>
                                                </div>

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