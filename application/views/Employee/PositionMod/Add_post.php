<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Positions & Skills</li>
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

                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_post/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-12">


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Position</label>
                                                    <div class="col-md-9">
                                                        <?php if (isset($ID_post)) {
                                                        ?>
                                                            <input type="hidden" name="ID_post" value="<?php echo $ID_post ?>">
                                                        <?php } ?>
                                                        <input type="text" name="Name_post" value="<?php if (isset($Name_post)) {
                                                                                                        echo $Name_post;
                                                                                                    } ?>" placeholder="Position" class="form-control">
                                                        <?php if (isset($exist)) { ?>
                                                            <p style="color:red">this name skill already exists</p>
                                                        <?php }  ?>

                                                    </div>




                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Tâche * DO * </label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Do_post" value="<?php if (isset($Do_post)) {
                                                                                                                echo $Do_post;
                                                                                                            } ?>" placeholder="Do" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Tâche * PLAN * </label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Plan_post" value="<?php if (isset($Plan_post)) {
                                                                                                                echo $Plan_post;
                                                                                                            } ?>" placeholder="Plan" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Tâche * CHECK * </label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Check_post" value="<?php if (isset($Check_post)) {
                                                                                                                echo $Check_post;
                                                                                                            } ?>" placeholder="Check" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Tâche * ACT * </label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Act_post" value="<?php if (isset($Act_post)) {
                                                                                                                echo $Act_post;
                                                                                                            } ?>" placeholder="Act" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Formation</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Formation_post" value="<?php if (isset($Formation_post)) {
                                                                                                                echo $Formation_post;
                                                                                                            } ?>" placeholder="Formation" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Experience</label>
                                                    <div class="col-md-9">

                                                        <input type="number" name="Experience_post" value="<?php if (isset($Experience_post)) {
                                                                                                                echo $Experience_post;
                                                                                                            } ?>" placeholder="Experience" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Moyens</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Moyen_post" value="<?php if (isset($Moyen_post)) {
                                                                                                                echo $Moyen_post;
                                                                                                            } ?>" placeholder="Moyens" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Contraintes</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Contraint_post" value="<?php if (isset($Contraint_post)) {
                                                                                                                echo $Contraint_post;
                                                                                                            } ?>" placeholder="Contraintes" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Indicateurs</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Indicateur_post" value="<?php if (isset($Indicateur_post)) {
                                                                                                                echo $Indicateur_post;
                                                                                                            } ?>" placeholder="Indicateurs" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Parent</label>
                                                    <div class="col-md-9">
                                                     
                                                                <select class="form-control" name="ID_parent" id="ID_parent" >
                                                                    <?php
                                                                    foreach ($position as $row) {
                                                                    ?>

                                                                        <option value=<?= $row['ID_post'] ?>><?= $row['Name_post'] ?></option>

                                                                    <?php }


                                                                    ?>


                                                                </select>

                                                       


                                                                </select>
                                                          
                                                        

                                                      

                                                     
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>

                                                </div>
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