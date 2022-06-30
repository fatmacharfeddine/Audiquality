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
                        <li class="breadcrumb-item active" aria-current="page">Post & process</li>
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
                                    <form id="process" action="<?php echo base_url(); ?>Employee_Account/Submit_add_process/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">



                                                <div class="form-group row">

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">process</label>
                                                    <div class="col-md-9">
                                                        <?php if (isset($ID_process)) {
                                                        ?>
                                                            <input type="hidden" name="ID_process" value="<?php echo $ID_process ?>">
                                                        <?php } ?>
                                                        <input type="text" name="Name_process" value="<?php if (isset($Name_process)) {
                                                                                                            echo $Name_process;
                                                                                                        } ?>" placeholder="process" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">File</label>
                                                    <div class="col-md-9">
                                                        <?php if (isset($update_doc)) { ?>
                                                            <input type="hidden" name="update_doc" value="<?php echo $update_doc ?>">

                                                        <?php } ?>
                                                        <?php

                                                        if (isset($Picture_process)) {
                                                        ?>
                                                            <input type="hidden" name="old_logo" value="<?php echo $Picture_process ?>">
                                                        <?php } ?>
                                                        <img class="form_add_photo" style="cursor:pointer;" src="<?= base_url() ?>/includes/ext/assets/template/img/file.png" value="<?php if (isset($Picture_process)) {
                                                                                                                                                                                            echo $Picture_process;
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo '';
                                                                                                                                                                                        } ?>" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">
                                                        <img id="target" />
                                                        <input type="file" accept="image/jpg, image/jpeg, image/png, .doc, .docx, .pdf" id="Picture_process" name="Picture_process" onchange="displayImage(this)" style="display:none;"> </input>

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
        function triggerClick() {
            document.querySelector('#Picture_process').click();
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


                        $('form#process').submit();
                        //	swal('its OK '+result.value);
                    } else {
                        swal("This operation is canceled");
                        return false;
                    }
                });
            });

        });
    </script>