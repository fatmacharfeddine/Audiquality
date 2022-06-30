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
            <div class="container-fluid content-top-gap">


                <section class="forms">

                    <div class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Edit Department</h4>
                            </div>
                        </div>

                        <form id="popup" action="<?php echo base_url(); ?>Technical_Account/Submit_add_department/" enctype="multipart/form-data" method="post">

                            <div class="card-box">
                                <h3 class="card-title">Basic Informations</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap">
                                            <?php if (isset($ID_department)) {
                                            ?>
                                                <input type="hidden" name="ID_department" value="<?php echo $ID_department ?>">
                                            <?php } ?>


                                            <?php
                                            //echo $Logo_department;

                                            if (isset($Logo_department)) {
                                            ?>
                                                <input type="hidden" name="old_logo" value="<?php echo $Logo_department ?>">
                                                <img class="inline-block" style="cursor:pointer;" src="<?= base_url() . '/uploads/Department/' . $Logo_department ?>" value="<?php echo $Logo_department ?>" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">

                                            <?php } else { ?>

                                                <img class="inline-block" style="cursor:pointer;" src="<?= base_url() ?>/uploads/Department/default_department.jpg" value="" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">
                                            <?php } ?>
                                            <img id="target" />

                                            <div class="fileupload btn">
                                                <span class="btn-text">edit</span>
                                                <input type="file" class="upload" accept="image/jpg, image/jpeg, image/png" id="Logo_department" name="Logo_department" onchange="displayImage(this)" style="display:none;"> </input>
                                            </div>
                                        </div>
                                        <div class="profile-basic">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <label class="focus-label">Department Name</label>
                                                        <input type="text" class="form-control floating" name="Name_department" value="<?php if (isset($Name_department)) {
                                                                                                                                            echo $Name_department;
                                                                                                                                        } ?>" placeholder="department">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <label class="focus-label">Phone</label>
                                                        <input type="text" class="form-control floating" name="Phone_department" value="<?php if (isset($Phone_department)) {
                                                                                                                                            echo $Phone_department;
                                                                                                                                        } ?>" placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <label class="focus-label">Alias</label>
                                                        <input class="form-control floating datetimepicker" type="text" name="Alias_department" value="<?php if (isset($Alias_department)) {
                                                                                                                                                            echo $Alias_department;
                                                                                                                                                        } ?>" placeholder="Alias">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <label class="focus-label">Email</label>
                                                        <input class="form-control floating datetimepicker" type="text" name="Email_department" value="<?php if (isset($Email_department)) {
                                                                                                                                                            echo $Email_department;
                                                                                                                                                        } ?>" placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-box">
                                <h3 class="card-title">Other Informations</h3>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Parent</label>
                                    <div class="col-md-9">

                                        <select class="form-control" name="Parent_department" id="Parent_department">
                                            <option value="0" hidden>No Parent</option>

                                            <?php
                                            foreach ($parent as $row1) {
                                                if (isset($Parent_department)) {

                                                    if ($row1['ID_department'] == $Parent_department) {
                                            ?>

                                                        <option value=<?= $row1['ID_department'] ?> selected><?= $row1['Name_department'] ?></option>
                                                    <?php } else {
                                                    ?>
                                                        <option value=<?= $row1['ID_department'] ?>><?= $row1['Name_department'] ?></option>

                                                    <?php }
                                                } else {
                                                    ?>
                                                    <option value=<?= $row1['ID_department'] ?>><?= $row1['Name_department'] ?></option>

                                            <?php }
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Director</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="Director_department" id="Director_department">
                                            <option value="0" hidden>No Director</option>

                                            <?php
                                            foreach ($director as $row2) {
                                                if (isset($ID_Director)) {
                                                    if ($row2['ID_employee'] == $ID_Director) {

                                            ?>

                                                        <option value=<?= $row2['ID_employee'] ?> selected><?= $row2['Name_employee'] . ' ' . $row2['Lastname_employee'] ?></option>
                                                    <?php } else {
                                                    ?>
                                                        <option value=<?= $row2['ID_employee'] ?>><?= $row2['Name_employee'] . ' ' . $row2['Lastname_employee'] ?></option>
                                                    <?php }
                                                } else { ?>
                                                    <option value=<?= $row2['ID_employee'] ?>><?= $row2['Name_employee'] . ' ' . $row2['Lastname_employee'] ?></option>

                                            <?php       }
                                            } ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Quality Director</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="Quality_Director_department" id="Quality_Director_department">
                                            <option value="0" hidden>No Quality Director</option>

                                            <?php
                                            // echo 'gggggg'.$Quality_Director_department ; 
                                            foreach ($director_qse as $row2) {
                                                if (isset($Quality_Director_department)) {
                                                    if ($row2['ID_employee'] == $Quality_Director_department) {
                                            ?>
                                                        <option value=<?= $row2['ID_employee'] ?> selected><?= $row2['Name_employee'] . ' ' . $row2['Lastname_employee'] ?></option>
                                                    <?php } else {
                                                    ?>
                                                        <option value=<?= $row2['ID_employee'] ?>><?= $row2['Name_employee'] . ' ' . $row2['Lastname_employee'] ?></option>
                                                    <?php }
                                                } else { ?>

                                                    <option value=<?= $row2['ID_employee'] ?>><?= $row2['Name_employee'] . ' ' . $row2['Lastname_employee'] ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center m-t-20">
                                <!--button type="button" class="btn btn-primary">Confirm</button-->
                                <button type="button" id="btn_add" class="btn btn-primary submit-btn">Save</button>
                            </div>

                        </form>
                    </div>

            </div>

            </section>
            <!-- //forms -->
        </div>
    </div>
    </div>



    <!--?php include "/../Footer.php"; ?-->
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
            document.querySelector('#Logo_department').click();
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