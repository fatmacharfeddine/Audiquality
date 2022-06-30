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
                        <li class="breadcrumb-item active" aria-current="page">Department</li>
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
                                    <form id="popup" action="<?php echo base_url(); ?>Technical_Account/Submit_add_department/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">



                                                <div class="form-group row">

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">department</label>
                                                    <div class="col-md-9">
                                                        <?php if (isset($ID_department)) {
                                                        ?>
                                                            <input type="hidden" name="ID_department" value="<?php echo $ID_department ?>">
                                                        <?php } ?>
                                                        <input type="text" name="Name_department" value="<?php if (isset($Name_department)) {
                                                                                                                echo $Name_department;
                                                                                                            } ?>" placeholder="department" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Phone</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Phone_department" value="<?php if (isset($Phone_department)) {
                                                                                                                echo $Phone_department;
                                                                                                            } ?>" placeholder="Phone" class="form-control">

                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Logo</label>
                                                    <div class="col-md-9">
                                                        <?php
                                                        //echo $Logo_department;

                                                        if (isset($Logo_department)) {
                                                        ?>
                                                            <input type="hidden" name="old_logo" value="<?php echo $Logo_department ?>">
                                                            <img class="form_add_photo" style="cursor:pointer;" src="<?= base_url() . '/uploads/Department/' . $Logo_department ?>" value="<?php echo $Logo_department ?>" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">

                                                        <?php } else { ?>

                                                            <img class="form_add_photo" style="cursor:pointer;" src="<?= base_url() ?>/uploads/Department/Default.jpg" value="" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">
                                                        <?php } ?>
                                                        <img id="target" />
                                                        <input type="file" accept="image/jpg, image/jpeg, image/png" id="Logo_department" name="Logo_department" onchange="displayImage(this)" style="display:none;"> </input>

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Alias</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Alias_department" value="<?php if (isset($Alias_department)) {
                                                                                                                echo $Alias_department;
                                                                                                            } ?>" placeholder="Alias" class="form-control">


                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Email</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Email_department" value="<?php if (isset($Email_department)) {
                                                                                                                echo $Email_department;
                                                                                                            } ?>" placeholder="Email" class="form-control">

                                                    </div>
                                                </div>

                                                <?php
                                                //foreach ($parent as $row1) {

                                                //echo $ID_parent;
                                                // }
                                                ?>
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



                                                <!--div class="form-group row">
                                                    <label class="col-form-label col-md-3">Company</label>
                                                    <div class="col-md-9">

                                                        <select class="form-control" name="ID_company" id="ID_company">

                                                            <?php
                                                            foreach ($company as $row3) {
                                                                if (isset($ID_company)) {
                                                                    if ($row3['ID_company'] == $ID_company) {
                                                            ?>
                                                                        <option value=<?= $row3['ID_company'] ?>selected><?= $row3['Name_company'] ?></option>
                                                                    <?php } else {
                                                                    ?>
                                                                        <option value=<?= $row3['ID_company'] ?>><?= $row3['Name_company'] ?></option>
                                                                    <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row3['ID_company'] ?>><?= $row3['Name_company'] ?></option>

                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div-->
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

            </section>
            <!-- //forms -->
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