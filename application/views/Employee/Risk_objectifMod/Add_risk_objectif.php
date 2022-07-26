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
                        <li class="breadcrumb-item active" aria-current="page">risk_objectif</li>
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
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_risk_objectif/" enctype="multipart/form-data" method="post">

                                        <input type="hidden" name="ID_processus" value="<?php echo $ID_processus ?>">
                                        <input type="hidden" name="processcategory" value="<?php echo $processcategory ?>">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Désignation de l'indicateur</label>
                                                    <div class="col-md-9">
                                                        <?php if (isset($ID_risk_objectif)) {
                                                        ?>
                                                            <input type="hidden" name="ID_risk_objectif" value="<?php echo $ID_risk_objectif ?>">
                                                        <?php } ?>
                                                        <input type="text" name="Title_risk_objectif" value="<?php if (isset($Title_risk_objectif)) {
                                                                                                                    echo $Title_risk_objectif;
                                                                                                                } ?>" placeholder="Objectif" class="form-control">

                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Date</label>
                                                    <div class="col-md-9">

                                                        <input type="date" name="Date_risk_objectif" value="<?php if (isset($Date_risk_objectif)) {
                                                                                                                echo  date('Y-m-d', strtotime($Date_risk_objectif));
                                                                                                            } ?>" placeholder="Date" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-form-label col-md-12">Indicateur</label>
                                                    <textarea cols="30" rows="4" class="form-control" name="Action_risk_objectif" id="summernote">
                                                        <?php if (isset($Action_risk_objectif)) {
                                                            echo $Action_risk_objectif;
                                                        } ?>
                                                    </textarea>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Valeur Cible (%)</label>
                                                    <div class="col-md-9">

                                                        <input type="number" name="Cible_risk_objectif" value="<?php if (isset($Cible_risk_objectif)) {
                                                                                                                    echo $Cible_risk_objectif;
                                                                                                                } ?>" placeholder="Cible" class="form-control">

                                                    </div>
                                                </div>

                                             
                                                <?php

                                                $select1 = "";
                                                $select2 = "";
                                                $select3 = "";

                                                if (isset($Frequence_risk_objectif)) {
                                                  //  echo $Frequence_risk_objectif ; 

                                                    if ($Frequence_risk_objectif == 1) {
                                                        $select1 = "checked";
                                                    }
                                                    if ($Frequence_risk_objectif == 2) {
                                                        $select2 = "checked";
                                                    }
                                                    if ($Frequence_risk_objectif == 3) {
                                                        $select3 = "checked";
                                                    }
                                                } else {
                                                    $select1 = "checked";
                                                } ?>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">Fréquence de suivi</label>
                                                    <div class="col-md-10">
                                                        <div class="radio" name="Frequence_risk_objectif">
                                                            <label>
                                                                <input type="radio" name="Frequence_risk_objectif" id="tri" value="1" <?php echo $select1 ?>> trimestriel
                                                            </label>
                                                        </div>
                                                        <div class="radio" name="Frequence_risk_objectif">
                                                            <label>
                                                                <input type="radio" name="Frequence_risk_objectif" id="sem" value="2" <?php echo $select2 ?> > semestriel
                                                            </label>
                                                        </div>
                                                        <div class="radio" name="Frequence_risk_objectif">
                                                            <label>
                                                                <input type="radio" name="Frequence_risk_objectif" id="ann" value="3" <?php echo $select3 ?>> annuel
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Valeur 1 </label>
                                                    <div class="col-md-9">


                                                        <input type="text" name="Taux_risk_objectif1" id="Taux_risk_objectif1" value="<?php if (isset($Taux_risk_objectif1)) {
                                                                                                                                            echo $Taux_risk_objectif1;
                                                                                                                                        } ?>" placeholder="Valeur 1 " class="form-control">


                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Valeur 2 </label>
                                                    <div class="col-md-9">


                                                        <input type="text" name="Taux_risk_objectif2" id="Taux_risk_objectif2" value="<?php if (isset($Taux_risk_objectif2)) {
                                                                                                                                            echo $Taux_risk_objectif2;
                                                                                                                                        } ?>" placeholder="Valeur 2 " class="form-control">


                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Valeur 3 </label>
                                                    <div class="col-md-9">


                                                        <input type="text" name="Taux_risk_objectif3" id="Taux_risk_objectif3" value="<?php if (isset($Taux_risk_objectif3)) {
                                                                                                                                            echo $Taux_risk_objectif3;
                                                                                                                                        } ?>" placeholder="Valeur 3 " class="form-control">


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/includes/summernote/summernote-bs4.js"></script>
    <script>
        $('#summernote').summernote();
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


    <script>
        var update_tri = function() {






            /*  } else {
                  $('#Taux_risk_objectif2').prop('disabled', false);
                  $('#Taux_risk_objectif3').prop('disabled', false);
              }*/
            if ($("#sem").is(":checked")) {
                $('#Taux_risk_objectif2').prop('disabled', false);
                $('#Taux_risk_objectif3').prop('disabled', true);

            } else
            if ($("#ann").is(":checked")) {
                $('#Taux_risk_objectif2').prop('disabled', true);
                $('#Taux_risk_objectif3').prop('disabled', true);

            } else {
                $('#Taux_risk_objectif2').prop('disabled', false);
                $('#Taux_risk_objectif3').prop('disabled', false);
            }
        };
        $(update_tri);
        $("#tri").change(update_tri);
        $("#sem").change(update_tri);
        $("#ann").change(update_tri);
    </script>