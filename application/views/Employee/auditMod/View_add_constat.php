
    <body>


        <div class="page-wrapper" style="min-height: 314px;">
            <div class="content">

                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="payslip-title">Audit Plan</h4>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Date</strong> <span class="float-right"><?php echo $planned_date_audit; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Department</strong> <span class="float-right"><?php echo $Name_department; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Referenciel</strong> <span class="float-right"><?php echo $Name_rerencial; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Version</strong> <span class="float-right"><?php echo $Version_rerencial; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Team</strong> <span class="float-right"><strong><?php echo $Name_team; ?></strong></span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Audit Mission</strong> <span class="float-right"><strong><?php echo $Mission_audit;  ?></strong></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>




                    <div class="tab-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_libelle?ID_Steps=<?php echo $_GET['ID_Steps'] ?>&ID_survey=<?php echo $_GET['ID_survey'] ?>" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!--div class="form-group row">
                                                    <label class="col-form-label col-md-3">Reference Chapter</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="Chaptre_Reference_survey">

                                                    </div>
                                                </div-->
                                                <input type="hidden" name="ID_audit" value="<?php echo $ID_audit ?>">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Observation</label>
                                                    <div class="col-md-9">
                                                        <textarea row="4" class="form-control" cols="50" name="Text_survey"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Result</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_constat" id="ID_constat">
                                                            <?php
                                                            foreach ($listconstat as $row) {

                                                            ?>
                                                                <option value=<?= $row['ID_constat'] ?>><?= $row['Title_constat'] ?></option>

                                                            <?php      }
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