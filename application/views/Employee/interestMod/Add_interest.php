
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Grid</li>
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
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_interest/" enctype="multipart/form-data" method="post">

                                        <!--input type="hidden" name="ID_interest_group" value="<?php echo $ID_interest_group; ?>" /-->

                                        <?php if (isset($ID_interest)) { ?>
                                            <input type="hidden" name="ID_interest" value="<?php echo $ID_interest; ?>" />
                                        <?php } ?> <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Name Interest</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="Participant_interest" value="<?php if (isset($Participant_interest)) {
                                                                                                                    echo $Participant_interest;
                                                                                                                } ?>" placeholder="Name interest" class="form-control" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Pertinance </label>
                                                    <div class="col-md-9">
                                                        <?php
                                                        
                                                        $select0 = "";
                                                        $select1 = "";
                                                        $select2 = "";
                                                        $select3 = "";
                                                        $select4 = "";
                                                        $select5 = "";
                                                        if (isset($Priority_interest)) {
                                                            //echo $Priority_interest ; 
                                                            if ($Priority_interest == 0) {
                                                                $select0 = "selected";
                                                            }
                                                            if ($Priority_interest == 1) {
                                                                $select1 = "selected";
                                                            }
                                                            if ($Priority_interest == 2) {
                                                                $select2 = "selected";
                                                            }
                                                            if ($Priority_interest == 3) {
                                                                $select3 = "selected";
                                                            }
                                                            if ($Priority_interest == 4) {
                                                                $select4 = "selected";
                                                            }
                                                            if ($Priority_interest == 5) {
                                                                $select5 = "selected";
                                                            }
                                                        } else {
                                                            $select0 = "selected";
                                                        } ?>
                                                        <select class="form-control" name="Priority_interest" id="Priority_interest">
                                                            <option value="0" <?php echo $select0 ?>>none</option>
                                                            <option value="1" <?php echo $select1 ?>>1</option>
                                                            <option value="2" <?php echo $select2 ?>>2</option>
                                                            <option value="3" <?php echo $select3 ?>>3</option>
                                                            <option value="4" <?php echo $select4 ?>>4</option>
                                                            <option value="5" <?php echo $select5 ?>>5</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Attentes </label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="Attente_interest" value="<?php if (isset($Attente_interest)) {
                                                                                                                echo $Attente_interest;
                                                                                                            } ?>" placeholder="Attente" class="form-control" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Exigences </label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="Exigence_interest" value="<?php if (isset($Exigence_interest)) {
                                                                                                                echo $Exigence_interest;
                                                                                                            } ?>" placeholder="Exigence" class="form-control" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Methode de suivi</label>
                                                    <div class="col-md-9">
                                                        <?php
                                                        
                                                     //   $select0 = "";
                                                        $select1 = "";
                                                        $select2 = "";
                                                        $select3 = "";
                                                        $select4 = "";
                                                        $select5 = "";
                                                        if (isset($Method_interest)) {
                                                            //echo $Method_interest ; 
                                                           /* if ($Method_interest == 0) {
                                                                $select0 = "selected";
                                                            }*/
                                                            if ($Method_interest == 1) {
                                                                $select1 = "selected";
                                                            }
                                                            if ($Method_interest == 2) {
                                                                $select2 = "selected";
                                                            }
                                                            if ($Method_interest == 3) {
                                                                $select3 = "selected";
                                                            }
                                                         
                                                        } else {
                                                            $select0 = "selected";
                                                        } ?>
                                                        <select class="form-control" name="Method_interest" id="Method_interest">
                                                            <!--option value="0" <?php echo $select0 ?>>none</option-->
                                                            <option value="1" <?php echo $select1 ?>>Formulaire</option>
                                                            <option value="2" <?php echo $select2 ?>>Email</option>
                                                            <option value="3" <?php echo $select3 ?>>Autre ..</option>
                                                         
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Fréquence de suivi</label>
                                                    <div class="col-md-9">
                                                        <?php
                                                        
                                                        $select1 = "";
                                                        $select2 = "";
                                                        $select3 = "";
                                                        $select4 = "";
                                                        $select5 = "";
                                                        if (isset($Frequence_interest)) {
                                                            //echo $Frequence_interest ; 
                                                           
                                                            if ($Frequence_interest == 1) {
                                                                $select1 = "selected";
                                                            }
                                                            if ($Frequence_interest == 2) {
                                                                $select2 = "selected";
                                                            }
                                                            if ($Frequence_interest == 3) {
                                                                $select3 = "selected";
                                                            }
                                                            if ($Frequence_interest == 4) {
                                                                $select4 = "selected";
                                                            }
                                                            if ($Frequence_interest == 5) {
                                                                $select5 = "selected";
                                                            }
                                                            
                                                        } else {
                                                            $select0 = "selected";
                                                        } ?>
                                                        <select class="form-control" name="Frequence_interest" id="Frequence_interest">
                                                            <option value="1" <?php echo $select1 ?>>hebdomadaire </option>
                                                            <option value="2" <?php echo $select2 ?>>mensuel </option>
                                                            <option value="3" <?php echo $select3 ?>>trimestriel </option>
                                                            <option value="4" <?php echo $select4 ?>>semestriel  </option>
                                                            <option value="5" <?php echo $select5 ?>>annuel </option>

                                                         
                                                        </select>
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


    <script>
        var update_parent = function() {
            if ($("#parent").is(":checked")) {
                $('#ID_chapter').prop('disabled', false);
                $('#Name_chapter').prop('disabled', false);
            } else {
                $('#ID_chapter').prop('disabled', 'disabled');
                $('#Name_chapter').prop('disabled', 'disabled');
            }
            if ($("#main").is(":checked")) {
                $('#ID_chapter').prop('disabled', true);
                $('#Name_chapter').prop('disabled', true);
            } else {
                $('#ID_chapter').prop('disabled', false);
                $('#Name_chapter').prop('disabled', false);
            }
        };
        $(update_parent);
        $("#parent").change(update_parent);
        $("#main").change(update_parent);
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
