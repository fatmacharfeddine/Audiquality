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
                                    <form id="audits" action="<?php echo base_url(); ?>Employee_Account/Edit_processus?ID_processus=<?php echo $ID_processus ?>" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <input type="hidden" name="ID_processus" value="<?php echo $ID_processus ?>">

                                                <?php if (isset($ID_processus)) { ?>

                                                <?php } ?>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Picture process </label>
                                                    <div class="col-md-9">


                                                        <?php if ($Photo_processus == NULL) {
                                                        ?>
                                                            <img src="<?= base_url() ?>/uploads/process/default.jpg" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="" style="    width: 235px;  height: 235px;    border: 1px solid #c3c5c8;    padding: 2px;">

                                                        <?php
                                                        } else { ?>
                                                            <img src="<?= base_url() ?>/uploads/process/<?php echo $Photo_processus ?>" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="" style="    width: 235px;  height: 235px;    border: 1px solid #c3c5c8;    padding: 2px;">
                                                        <?php } ?>
                                                        <img id="target" />
                                                        <input type="file" accept="image/jpg, image/jpeg, image/png" id="Photo_processus" name="Photo_processus" onchange="displayImage(this)"> </input>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">title processus </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="Title_processus" value="<?php if (isset($Title_processus)) {
                                                                                                                                    echo $Title_processus;
                                                                                                                                } ?>">

                                                    </div>
                                                </div>
                                                <input type="hidden" name="ID_audit" value="<?php echo $ID_audit ?>">
                                                <input type="hidden" name="ID_department" value="<?php echo $ID_department ?>">


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
            document.querySelector('#Photo_processus').click();
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