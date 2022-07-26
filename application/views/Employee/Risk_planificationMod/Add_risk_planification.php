<style>
    .form_add_photo {
        height: 50px;
    }
</style>
<link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="<?php echo base_url(); ?>/includes/summernote/summernote-bs4.css" rel="stylesheet">

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">risk_planification</li>
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
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_risk_planification/" enctype="multipart/form-data" method="post">
                                        <input type="hidden" name="ID_processus" value="<?php echo $ID_processus ?>">
                                        <input type="hidden" name="processcategory" value="<?php echo $processcategory ?>">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Titre</label>
                                                    <div class="col-md-9">
                                                        <?php if (isset($ID_risk_planification)) {
                                                        ?>
                                                            <input type="hidden" name="ID_risk_planification" value="<?php echo $ID_risk_planification ?>">
                                                        <?php } ?>
                                                        <input type="text" name="Title_risk_planification" value="<?php if (isset($Title_risk_planification)) {
                                                                                                                        echo $Title_risk_planification;
                                                                                                                    } ?>" placeholder="planification" class="form-control">

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Date</label>
                                                    <div class="col-md-9">

                                                        <input type="date" name="Date_risk_planification" value="<?php if (isset($Date_risk_planification)) {
                                                                                                                   echo    date('Y-m-d',strtotime($Date_risk_planification));
                                                                                                                    } ?>" placeholder="<?php if (isset($Date_risk_planification)) {
                                                                                                                                            echo $Date_risk_planification;
                                                                                                                                        } ?>" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-form-label col-md-12">Argumentation</label>
                                                    <textarea cols="30" rows="4" class="form-control" name="Argumentation_risk_planification" id="summernote"><?php if (isset($Argumentation_risk_planification)) {
                                                                                                                        echo $Argumentation_risk_planification;
                                                                                                                    } ?></textarea>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-form-label col-md-12">Risque de modification</label>
                                                    <textarea cols="30" rows="4" class="form-control" name="Modification_risk_planification" id="summernote2"><?php if (isset($Modification_risk_planification)) {
                                                                                                                        echo $Modification_risk_planification;
                                                                                                                    } ?></textarea>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <!--input type="hidden" name="ID_sector" value="<?php echo $ID_sector ?>"-->

                                            <?php if (isset($ID_risk_processus)) {
                                            ?>
                                                <input type="hidden" name="ID_risk_processus" value="<?php echo $ID_risk_processus ?>">
                                            <?php } ?>



                                            <!--div class="form-group row">
                                                <label class="col-form-label col-md-3">Date Cible</label>
                                                <div class="col-md-9">

                                                    <input type="date" name="Date_cible_risk_processus" value="<?php if (isset($Date_cible_risk_processus)) {
                                                                                                                    echo $Date_cible_risk_processus;
                                                                                                                } ?>" placeholder="Date Cible" class="form-control">

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3">Date Réelle</label>
                                                <div class="col-md-9">

                                                    <input type="date" name="Date_reel_risk_processus" value="<?php if (isset($Date_reel_risk_processus)) {
                                                                                                                    echo $Date_reel_risk_processus;
                                                                                                                } ?>" placeholder="Date Réelle" class="form-control">

                                                </div>
                                            </div-->

                                            <!--div class="form-group row">
                                                    <label class="col-form-label col-md-4">processus </label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="ID_processus" id="ID_processus">
                                                            <?php
                                                            foreach ($processus as $row) {

                                                                if (isset($ID_processus)) {

                                                                    if ($row['ID_processus'] == $ID_processus) {

                                                            ?>

                                                                        <option value=<?= $row['ID_processus'] ?> selected><?= $row['Title_processus'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_processus'] ?>><?= $row['Title_processus'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_processus'] ?>><?= $row['Title_processus'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div-->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/includes/summernote/summernote-bs4.js"></script>
    <script>
        $('#summernote').summernote();
        $('#summernote1').summernote();
        $('#summernote2').summernote();
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