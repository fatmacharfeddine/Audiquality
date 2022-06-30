<style>
    .form_add_photo {
        height: 50px;
    }
</style>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Risks</li>
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
                                    <form id="risks" action="<?php echo base_url(); ?>Employee_Account/Submit_add_risk_assessment/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="ID_sector" value="<?php echo $ID_sector ?>">

                                                <?php if (isset($ID_assessment)) {
                                                ?>
                                                    <input type="hidden" name="ID_assessment" value="<?php echo $ID_assessment ?>">
                                                <?php } ?>
                                                <input type="hidden" name="ID_risk" value="<?php echo $ID_risk ?>">
                                                <input type="hidden" name="ID_identification" value="<?php echo $ID_identification ?>">


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Probability </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="Probability_assessment" id="Probability_assessment">
                                                            <?php
                                                            foreach ($assessment as $row) {

                                                                if (isset($ID_probability_severity)) {

                                                                    if ($row['ID_probability_severity'] == $Probability_assessment) {

                                                            ?>

                                                                        <option value=<?= $row['ID_probability_severity'] ?> selected><?= $row['Value_probability_severity'] . ' : ' . $row['Title_probability_severity'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_probability_severity'] ?>><?= $row['Value_probability_severity'] . ' : ' . $row['Title_probability_severity'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_probability_severity'] ?>><?= $row['Value_probability_severity'] . ' : ' . $row['Title_probability_severity'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Severity </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="Severity_assessment" id="Severity_assessment">
                                                            <?php
                                                            foreach ($assessment as $row) {

                                                                if (isset($ID_probability_severity)) {

                                                                    if ($row['ID_probability_severity'] == $Severity_assessment) {

                                                            ?>

                                                                        <option value=<?= $row['ID_probability_severity'] ?> selected><?= $row['Value_probability_severity'] . ' : ' . $row['Title_probability_severity'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_probability_severity'] ?>><?= $row['Value_probability_severity'] . ' : ' . $row['Title_probability_severity'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_probability_severity'] ?>><?= $row['Value_probability_severity'] . ' : ' . $row['Title_probability_severity'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Unit </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="Unit_assessment" id="Unit_assessment">
                                                            <?php
                                                            foreach ($unit as $row) {

                                                                if (isset($ID_unit)) {

                                                                    if ($row['ID_unit'] == $Unit_assessment) {

                                                            ?>

                                                                        <option value=<?= $row['ID_unit'] ?> selected><?= $row['Title_unit'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_unit'] ?>><?= $row['Title_unit'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_unit'] ?>><?= $row['Title_unit'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Value</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Value_assessment" value="<?php if (isset($Value_assessment)) {
                                                                                                                echo $Value_assessment;
                                                                                                            } ?>" placeholder="Value" class="form-control">

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

                </section>
                <!-- //forms -->
            </div>
        </div>
    </div>



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


                        $('form#risks').submit();
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
    <script>
        function triggerClick() {
            document.querySelector('#File_identification').click();
        }

        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>