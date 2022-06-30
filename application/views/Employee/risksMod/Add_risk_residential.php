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
                                    <form id="risks" action="<?php echo base_url(); ?>Employee_Account/Submit_add_risk_residential/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!--input type="hidden" name="ID_sector" value="<?php echo $ID_sector ?>"-->

                                                <?php if (isset($ID_residential)) {
                                                ?>
                                                    <input type="hidden" name="ID_residential" value="<?php echo $ID_residential ?>">
                                                <?php } ?>

                                                <input type="hidden" name="ID_risk" value="<?php echo $ID_risk ?>">
                                                <input type="hidden" name="ID_identification" value="<?php echo $ID_identification ?>">


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Gravity </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="Gavity_residential" id="Gavity_residential">
                                                            <?php
                                                            foreach ($gravity as $row) {

                                                                if (isset($ID_gravity)) {

                                                                    if ($row['ID_gravity'] == $Gavity_residential) {

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
                                                    <label class="col-form-label col-md-3">Probability </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="Probability_residential" id="Probability_residential">
                                                            <?php
                                                            foreach ($probability as $row) {

                                                                if (isset($ID_probability)) {

                                                                    if ($row['ID_probability'] == $Probability_residential) {

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
                                                    <label class="col-form-label col-md-3"> Detectability </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="Detectability_residential" id="Detectability_residential">
                                                            <?php
                                                            foreach ($detectability as $row) {

                                                                if (isset($ID_detectability)) {

                                                                    if ($row['ID_detectability'] == $Detectability_residential) {

                                                            ?>

                                                                        <option value=<?= $row['ID_detectability'] ?> selected><?= $row['Value_detectability'] . ' : ' . $row['Title_detectability'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_detectability'] ?>><?= $row['Value_detectability'] . ' : ' . $row['Title_detectability'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_detectability'] ?>><?= $row['Value_detectability'] . ' : ' . $row['Title_detectability'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
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