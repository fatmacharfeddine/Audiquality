<!--?php include "/../Header.php"; ?-->
<style>
    .form_add_photo {
        height: 50px;
    }
</style>

<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">process</li>
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
                                    <form id="audits" action="<?php echo base_url(); ?>Employee_Account/Submit_Edit_audit?ID_audit=<?php echo $ID_audit; ?>&ID_department=<?php echo $ID_department; ?>" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!--div class="form-group row">
                                                    <label class="col-form-label col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <input type="hidden" class="form-control" name="Create_date_audit" value="<?php echo date('Y/m/d') ?>">
                                                        </textarea>

                                                    </div>
                                                </div-->
                                                <input type="hidden" value="<?php echo $ID_audit; ?>" name="ID_audit">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Planned Date</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" value="<?php echo $planned_date_audit; ?>" name="planned_date_audit">


                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Audit Mission</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="Mission_audit"> <?php echo $Mission_audit; ?>
                                                        </textarea>

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">referencial </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_referencial" id="ID_referencial">
                                                            <?php
                                                            foreach ($referencial as $row) {

                                                                if (isset($ID_referencial)) {

                                                                    if ($row['ID_rerencial'] == $ID_referencial) {

                                                            ?>

                                                                        <option value=<?= $row['ID_rerencial'] ?> selected><?= $row['Name_rerencial'] . " " . $row['Version_rerencial'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_rerencial'] ?>><?= $row['Name_rerencial'] . " " . $row['Version_rerencial'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_rerencial'] ?>><?= $row['Name_rerencial'] . " " . $row['Version_rerencial'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>
                                                <!--div class="form-group row">
                                                    <label class="col-form-label col-md-3">department </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_departement" id="ID_departement">
                                                            <?php
                                                            foreach ($departement as $row) {

                                                                if (isset($ID_departement)) {

                                                                    if ($row['ID_department'] == $ID_departement) {

                                                            ?>

                                                                        <option value=<?= $row['ID_department'] ?> selected><?= $row['Name_department'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_department'] ?>><?= $row['Name_department'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_department'] ?>><?= $row['Name_department'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div-->

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Team </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_team" id="ID_team">
                                                            <?php
                                                            foreach ($team as $row) {

                                                                if (isset($ID_team)) {

                                                                    if ($row['ID_team'] == $ID_team) {

                                                            ?>

                                                                        <option value=<?= $row['ID_team'] ?> selected><?= $row['Name_team'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_team'] ?>><?= $row['Name_team'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_team'] ?>><?= $row['Name_team']  ?></option>


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


    <!--?php include "/../Footer.php"; ?-->

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


                        $('form#audits').submit();
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