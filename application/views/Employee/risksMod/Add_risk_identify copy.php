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
                                    <form id="risks" action="<?php echo base_url(); ?>Employee_Account/Submit_add_risk_identify/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="ID_sector" value="<?php echo $ID_sector ?>">



                                                <?php if (isset($update_doc)) { ?>
                                                    <input type="hidden" name="update_doc" value="<?php echo $update_doc ?>">

                                                <?php } ?>


                                                <?php if (isset($ID_risk)) {
                                                ?>
                                                    <input type="hidden" name="ID_risk" value="<?php echo $ID_risk ?>">
                                                <?php } ?>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Responsable </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_responsable_identification" id="ID_responsable_identification">
                                                            <?php
                                                            foreach ($responsable as $row) {

                                                                if (isset($ID_responsable_identification)) {

                                                                    if ($row['ID_employee'] == $ID_responsable_identification) {

                                                            ?>

                                                                        <option value=<?= $row['ID_employee'] ?> selected><?= $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_employee'] ?>><?= $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_employee'] ?>><?= $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Description</label>
                                                    <div class="col-md-9">
                                                        <textarea cols="30" rows="6" class="form-control" name="Description_identification" value="<?php if (isset($Description_identification)) {
                                                                                                                                                        echo $Description_identification;
                                                                                                                                                    } ?>" placeholder="Description">
                                                                                                                        </textarea>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Activity </label>
                                                    <div class="col-md-9">
                                                        <textarea cols="30" rows="6" class="form-control" name="Activity_identification" value="<?php if (isset($Activity_identification)) {
                                                                                                                                                    echo $Activity_identification;
                                                                                                                                                } ?>" placeholder="Activity">
                                                                                                                        </textarea>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">File</label>
                                                    <div class="col-md-9">
                                                        <?php

                                                        if (isset($File_identification)) {
                                                        ?>
                                                            <input type="hidden" name="old_logo" value="<?php echo $File_identification ?>">
                                                        <?php } ?>
                                                        <img class="form_add_photo" style="cursor:pointer;" src="<?= base_url() ?>/includes/ext/assets/template/img/file.png" value="<?php if (isset($File_identification)) {
                                                                                                                                                                                            echo $File_identification;
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo '';
                                                                                                                                                                                        } ?>" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">
                                                        <img id="target" />
                                                        <input type="file" accept="image/jpg, image/jpeg, image/png, .doc, .docx, .pdf" id="File_identification" name="File_identification" onchange="displayImage(this)" style="display:none;"> </input>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Method </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_identification_method" id="ID_identification_method">
                                                            <?php
                                                            foreach ($method as $row) {

                                                                if (isset($ID_identification_method)) {

                                                                    if ($row['ID_identification_method'] == $ID_identification_method) {

                                                            ?>

                                                                        <option value=<?= $row['ID_identification_method'] ?> selected><?= $row['Metaphor_identification_method'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_identification_method'] ?>><?= $row['Metaphor_identification_method'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_identification_method'] ?>><?= $row['Metaphor_identification_method'] ?></option>


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