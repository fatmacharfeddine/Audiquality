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
                                    <form id="risks" action="<?php echo base_url(); ?>Employee_Account/Submit_add_risk_analysis/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="ID_sector" value="<?php echo $ID_sector ?>">

                                                <?php if (isset($ID_analysis)) {
                                                ?>
                                                    <input type="hidden" name="ID_analysis" value="<?php echo $ID_analysis ?>">
                                                <?php } ?>
                                                <input type="hidden" name="ID_risk" value="<?php echo $ID_risk ?>">
                                                <input type="hidden" name="ID_identification" value="<?php echo $ID_identification ?>">


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Method </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_analysis_method" id="ID_analysis_method">
                                                            <?php
                                                            foreach ($method as $row) {

                                                                if (isset($ID_analysis_method)) {

                                                                    if ($row['ID_analysis_method'] == $ID_analysis_method) {

                                                            ?>

                                                                        <option value=<?= $row['ID_analysis_method'] ?> selected><?= $row['Metaphor_analysis_method'] . ' : ' . $row['Title_analysis_method'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_analysis_method'] ?>><?= $row['Metaphor_analysis_method'] . ' : ' . $row['Title_analysis_method'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_analysis_method'] ?>><?= $row['Metaphor_analysis_method'] . ' : ' . $row['Title_analysis_method'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">File</label>
                                                    <div class="col-md-9">
                                                        <?php

                                                        if (isset($File_analysis)) {
                                                        ?>
                                                            <input type="hidden" name="old_logo" value="<?php echo $File_analysis ?>">
                                                        <?php } ?>
                                                        <img class="form_add_photo" style="cursor:pointer;" src="<?= base_url() ?>/includes/ext/assets/template/img/file.png" value="<?php if (isset($File_analysis)) {
                                                                                                                                                                                            echo $File_analysis;
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo '';
                                                                                                                                                                                        } ?>" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">
                                                        <img id="target" />
                                                        <input type="file" accept="image/jpg, image/jpeg, image/png, .doc, .docx, .pdf" id="File_analysis" name="File_analysis" onchange="displayImage(this)" style="display:none;"> </input>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Cause</label>
                                                    <div class="col-md-9">
                                                        <textarea cols="30" rows="6" class="form-control" name="Cause_analysis" value="<?php if (isset($Cause_analysis)) {
                                                                                                                                                        echo $Cause_analysis;
                                                                                                                                                    } ?>" placeholder="Cause">
                                                                                                                        </textarea>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Consequence</label>
                                                    <div class="col-md-9">
                                                        <textarea cols="30" rows="6" class="form-control" name="Consequence_analysis" value="<?php if (isset($Consequence_analysis)) {
                                                                                                                                                        echo $Consequence_analysis;
                                                                                                                                                    } ?>" placeholder="Consequence">
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
            document.querySelector('#File_analysis').click();
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