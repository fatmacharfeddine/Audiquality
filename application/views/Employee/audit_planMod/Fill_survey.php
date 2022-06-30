<style>
    .cal-icon:after {
        background: none;
    }
</style>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title"></h4>
                </div>

            </div>
            <div class="row">
                <div class="card-box" style="width: 100%;">

                    <form id="audits" action="<?php echo base_url(); ?>Employee_Account/Submit_fill_survey/" enctype="multipart/form-data" method="post">



                        <input type="hidden" name="ID_audit" value="<?php echo $ID_audit ?>">
                        <input type="hidden" name="ID_survey" value="<?php echo $ID_survey ?>">


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Action Type </label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="ID_type" id="ID_type">
                                            <?php
                                            foreach ($action_type as $row) {

                                                if (isset($ID_type)) {

                                                    if ($row['ID_type'] == $ID_type) {

                                            ?>

                                                        <option value=<?= $row['ID_type'] ?> selected><?= $row['Title_type'] ?></option>

                                                    <?php } else {
                                                    ?>

                                                        <option value=<?= $row['ID_type'] ?> selected><?= $row['Title_type'] ?></option>

                                                    <?php }
                                                } else {
                                                    ?>
                                                    <option value=<?= $row['ID_type'] ?> selected><?= $row['Title_type'] ?></option>


                                            <?php }
                                            }
                                            ?>


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-focus focused">
                                    <label class="focus-label">Corrective Action </label>
                                    <textarea name="Corrective_survey" value="<?php if (isset($Corrective_survey)) {
                                                                                    echo $Corrective_survey;
                                                                                } ?>" placeholder="Corrective Action" class="form-control floating">
                                    </textarea>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>
        var update_parent = function() {
            if ($("#decline").is(":checked")) {
                $('#ID_function').prop('disabled', false);
                $('#Cause_action_list').prop('disabled', false);

            } else {
                $('#ID_function').prop('disabled', 'disabled');
                $('#Cause_action_list').prop('disabled', 'disabled');

            }
            if ($("#execute").is(":checked")) {
                $('#ID_function').prop('disabled', true);
                $('#Cause_action_list').prop('disabled', true);

            } else {
                $('#ID_function').prop('disabled', false);
                $('#Cause_action_list').prop('disabled', false);

            }
        };
        $(update_parent);
        $("#decline").change(update_parent);
        $("#execute").change(update_parent);
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