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
                        <li class="breadcrumb-item active" aria-current="page">documents</li>
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
                                    <form id="documents" action="<?php echo base_url(); ?>Employee_Account/Submit_add_document/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">



                                                <div class="form-group row">

                                                </div>
                                                <?php if (isset($update_doc)) { ?>
                                                    <input type="hidden" name="update_doc" value="<?php echo $update_doc ?>">
                                                    <input type="hidden" name="Type_requests" value="<?php echo $Type_requests ?>">

                                                <?php } ?>
                                                <?php
                                                if (isset($ID_document)) {
                                                ?>
                                                    <input type="hidden" name="ID_document" value="<?php echo $ID_document; ?>">
                                                <?php  }  ?>
                                                <?php
                                                if (isset($ID_version)) {
                                                ?>
                                                    <input type="hidden" name="ID_version" value="<?php echo $ID_version; ?>">

                                                <?php  }  ?>
                                                <input type="hidden" name="ID_requests" value="<?php echo $ID_requests; ?>">

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Title document</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Title_document" value="<?php if (isset($Title_document)) {
                                                                                                            echo $Title_document;
                                                                                                        } ?>" placeholder="Title" class="form-control">

                                                    </div>
                                                </div>

                                                
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">File</label>
                                                    <div class="col-md-9">
                                                        <?php
                                                        //echo $File_version;

                                                        //      if (isset($File_version)) {

                                                        if (isset($File_version)) {
                                                        ?>
                                                            <input type="hidden" name="old_logo" value="<?php echo $File_version ?>">
                                                        <?php } ?>
                                                        <img class="form_add_photo" style="cursor:pointer;" src="<?= base_url() ?>/includes/ext/assets/template/img/file.png" value="<?php if (isset($File_version)) {
                                                                                                                                                                                            echo $File_version;
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo '';
                                                                                                                                                                                        } ?>" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">

                                                        <?php// } else { ?>

                                                        <?php //} 
                                                        ?>
                                                        <img id="target" />
                                                        <input type="file" accept="image/jpg, image/jpeg, image/png, .doc, .docx, .pdf" id="File_version" name="File_version" onchange="displayImage(this)" style="display:none;"> </input>

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Type</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_doc" id="ID_doc">
                                                            <?php
                                                            foreach ($type as $row) {

                                                                if (isset($ID_doc)) {

                                                                    if ($row['ID_doc'] == $ID_doc) {

                                                            ?>

                                                                        <option value=<?= $row['ID_doc'] ?> selected><?= $row['Type_doc'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_doc'] ?>><?= $row['Type_doc'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_doc'] ?>><?= $row['Type_doc'] ?></option>


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


                        $('form#documents').submit();
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
            document.querySelector('#File_version').click();
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