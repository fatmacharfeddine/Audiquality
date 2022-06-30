<style>
    .form_add_photo {
        height: 50px;
    }
</style>
<meta charset="utf-8">
<title>Bootstrap</title>
<link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="<?php echo base_url(); ?>/includes/summernote/summernote-bs4.css" rel="stylesheet">

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

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">audits</li>
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
                                    <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_processus" enctype="multipart/form-data" method="post">
                                        <h4 class="page-title">Informations Entête Document :</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row" style="border-bottom: 2px dashed #ccc;">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-3">Préfixe Processus</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" name="Prefix_processus">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="ID_doc" value="6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-3">Type de document </label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="ID_doc" id="ID_doc">
                                                                    <option value="6" selected disabled>PS : Fiche Processus</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-3">Numéro d'ordre du document</label>
                                                            <div class="col-md-9">
                                                                <input type="number" class="form-control" name="Order_doc_processus">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-3">Version</label>
                                                            <div class="col-md-9">
                                                                <input type="number" class="form-control" name="Version_doc_processus">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-12" style="margin-top: 20px;">
                                                <div class="row" style="border-bottom: 2px dashed #ccc;">
                                                    <div class="col-md-6">
                                                        <!----------------Photo------------------->
                                                        <div class="form-group row">

                                                            <label class="col-form-label col-md-3">Photo </label>
                                                            <div class="col-md-9">
                                                                <img src="<?= base_url() ?>/uploads/process/default.jpg" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="" style="  text-align:center;  width: 100px; height: 100px;border: 2px solid #d1cfcf;padding: 2px;">

                                                                <img id="target" />
                                                                <input type="file" accept="image/jpg, image/jpeg, image/png" id="Photo_processus" name="Photo_processus" onchange="displayImage(this)" style="display:none;  text-align:center;  width: 100px; height: 100px;border: 2px solid #d1cfcf;padding: 2px;"> </input>

                                                            </div>
                                                        </div>
                                                        <!----------------titre processus------------------->

                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-3">titre processus </label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" name="Title_processus">

                                                            </div>
                                                        </div>


                                                        <!----------------Category------------------->

                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-3">Category</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" name="processcategory">

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-3">processus </label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="processcategory" id="processcategory">

                                                                    <option value="1" <?php if (isset($processcategory)) {
                                                                                            if ($processcategory == 1) {
                                                                                                echo "selected";
                                                                                            }
                                                                                        } ?>> Management</option>
                                                                    <option value="2" <?php if (isset($processcategory)) {
                                                                                            if ($processcategory == 1) {
                                                                                                echo "selected";
                                                                                            }
                                                                                        } ?>> Réalisation</option>
                                                                    <option value="3" <?php if (isset($processcategory)) {
                                                                                            if ($processcategory == 1) {
                                                                                                echo "selected";
                                                                                            }
                                                                                        } ?>> Support</option>

                                                                </select>
                                                            </div>
                                                        </div>




                                                        <!----------------Moyens nécessaires au fonctionnement du processus------------------->

                                                        <div class="form-group">
                                                            <label class="col-form-label col-md-12">Moyens nécessaires au fonctionnement du processus </label>
                                                            <textarea cols="30" rows="4" class="form-control" name="processtools" id="summernote4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!----------------Objectifs du processus------------------->

                                                        <div class="form-group">
                                                            <label class="col-form-label col-md-12">Objectifs du processus </label>
                                                            <textarea cols="30" rows="4" class="form-control" name="processtarget" id="summernote2"></textarea>
                                                        </div>

                                                        <!----------------Domaine d’application------------------->

                                                        <div class="form-group">
                                                            <label class="col-form-label col-md-12">Domaine d’application </label>
                                                            <textarea cols="30" rows="4" class="form-control" name="processDomain" id="summernote3"></textarea>
                                                        </div>
                                                        <!----------------Pilote------------------->

                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-3">Pilote </label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="ID_employee" id="ID_employee">
                                                                    <?php
                                                                    foreach ($responsable as $row) {

                                                                        if (isset($ID_employee)) {

                                                                            if ($row['ID_employee'] == $ID_employee) {

                                                                    ?>

                                                                                <option value=<?= $row['ID_employee'] ?> selected><?php echo $row['Name_employee'] . ' ' . $row['Lastname_employee']  ?></option>

                                                                            <?php } else {
                                                                            ?>

                                                                                <option value=<?= $row['ID_employee'] ?>><?php echo $row['Name_employee'] . ' ' . $row['Lastname_employee']  ?></option>

                                                                            <?php }
                                                                        } else {
                                                                            ?>
                                                                            <option value=<?= $row['ID_employee'] ?>><?php echo $row['Name_employee'] . ' ' . $row['Lastname_employee']  ?></option>


                                                                    <?php }
                                                                    }
                                                                    ?>


                                                                </select>
                                                            </div>
                                                        </div>
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

                                                <div class="row" style="border-bottom: 2px dashed #ccc;">
                                                    <div class="col-md-6">
                                                        <!----------------Eléments d’entrée------------------->

                                                        <div class="form-group">
                                                            <label class="col-form-label col-md-12">Eléments d’entrée</label>
                                                            <textarea cols="30" rows="4" class="form-control" name="processinput" id="summernote"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!----------------Eléments de sortie------------------->

                                                        <div class="form-group">
                                                            <label class="col-form-label col-md-12">Eléments de sortie</label>
                                                            <textarea cols="30" rows="4" class="form-control" name="processoutput" id="summernote1"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!----------------Enregistrements générés par le processus------------------->

                                                        <div class="form-group">
                                                            <label class="col-form-label col-md-12">Enregistrements générés par le processus</label>
                                                            <textarea cols="30" rows="4" class="form-control" name="processgenelements" id="summernote5"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!----------------Indicateurs de mesure des performances------------------->

                                                        <div class="form-group">
                                                            <label class="col-form-label col-md-12">Indicateurs de mesure des performances </label>
                                                            <textarea cols="30" rows="4" class="form-control" name="processkpi" id="summernote6"></textarea>
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


    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/includes/summernote/summernote-bs4.js"></script>
    <script>
        $('#summernote').summernote();
        $('#summernote1').summernote();
        $('#summernote2').summernote();
        $('#summernote3').summernote();
        $('#summernote4').summernote();
        $('#summernote5').summernote();
        $('#summernote6').summernote();
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
    <!--script>
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
    </script-->