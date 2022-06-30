
<link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="<?php echo base_url(); ?>/includes/summernote/summernote-bs4.css" rel="stylesheet">
<style>
    .form_add_photo {
        height: 50px;
    }
</style>
<script>
    function triggerClick() {
        document.querySelector('#File_document_upload').click();
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
<!--?php include "/../Header.php"; ?-->

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
                        <li class="breadcrumb-item active" aria-current="page">document_upload</li>
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
                                    <form id="popup" action="<?php echo base_url(); ?>Technical_Account/Submit_add_document_upload/" enctype="multipart/form-data" method="post">

                                        <input type="hidden" name="ID_processus" value="<?php echo $ID_processus ?>">
                                        <input type="hidden" name="processcategory" value="<?php echo $processcategory ?>">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Titre Document</label>
                                                    <div class="col-md-9">
                                                        <?php if (isset($ID_document_upload)) {
                                                        ?>
                                                            <input type="hidden" name="ID_document_upload" value="<?php echo $ID_document_upload ?>">
                                                        <?php } ?>
                                                        <input type="text" name="Name_document_upload" value="<?php if (isset($Name_document_upload)) {
                                                                                                                    echo $Name_document_upload;
                                                                                                                } ?>" placeholder="document_upload" class="form-control">

                                                    </div>
                                                </div>



                                       
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Number Pages</label>
                                                    <div class="col-md-9">

                                                        <input type="number" name="nbrpage_document_upload" value="<?php if (isset($nbrpage_document_upload)) {
                                                                                                                    echo $nbrpage_document_upload;
                                                                                                                } ?>" placeholder="number pages" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Code</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="code_document_upload" value="<?php if (isset($code_document_upload)) {
                                                                                                                    echo $code_document_upload;
                                                                                                                } ?>" placeholder="Code" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Type Document</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_doc" id="ID_doc">
                                                            <?php
                                                            foreach ($type as $row) {
                                                                if ($row['ID_doc'] == $ID_doc) {
                                                            ?>
                                                                    <option value=<?= $row['ID_doc'] ?>><?= $row['Type_doc'] ?></option selected>

                                                                <?php } else { ?>

                                                                    <option value=<?= $row['ID_doc'] ?>><?= $row['Type_doc'] ?></option>

                                                            <?php }
                                                            }

                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Chapter</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_function" id="ID_function">
                                                            <?php
                                                            foreach ($chapter as $row) {
                                                                if ($row['ID_function'] == $ID_function) {
                                                            ?>
                                                                    <option value=<?= $row['ID_function'] ?>><?= $row['Name_function'] ?></option selected>

                                                                <?php } else { ?>

                                                                    <option value=<?= $row['ID_function'] ?>><?= $row['Name_function'] ?></option>

                                                            <?php }
                                                            }

                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Link</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_link_document_upload" id="ID_link_document_upload">
                                                            <?php
                                                            foreach ($link as $row) {
                                                                if ($row['ID_link_document_upload'] == $ID_link_document_upload) {
                                                            ?>
                                                                    <option value=<?= $row['ID_link_document_upload'] ?>><?= $row['Title_link_document_upload'] ?></option selected>

                                                                <?php } else { ?>

                                                                    <option value=<?= $row['ID_link_document_upload'] ?>><?= $row['Title_link_document_upload'] ?></option>

                                                            <?php }
                                                            }

                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>
                                            

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">File</label>
                                                    <div class="col-md-9">
                                                        <img class="form_add_photo" style="cursor:pointer;" src="<?php echo base_url() ?>Auditquality//includes/ext/assets/template/img/file.png" value="" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">

                                                        <!--?php// } else { ?-->

                                                        <img id="target">
                                                        <input type="file" accept="image/jpg, image/jpeg, image/png, .doc, .docx, .pdf" id="File_document_upload" name="File_document_upload" onchange="displayImage(this)" style="display:none;">



                                                    </div>
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

    <!--?php include "/../Footer.php"; ?-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>



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


