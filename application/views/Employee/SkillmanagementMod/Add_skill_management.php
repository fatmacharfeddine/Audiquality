<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Post & skills management</li>
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
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_skill_management/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">



                                                <div class="form-group row">

                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Skill</label>
                                                    <div class="col-md-9">
                                                        <?php if (isset($ID_management)) {
                                                        ?>
                                                            <input type="hidden" name="ID_management" value="<?php echo $ID_management ?>">
                                                        <?php } ?>

                                                        <select class="form-control" name="ID_skill" id="ID_skill">
                                                            <?php
                                                            foreach ($skill as $row) {
                                                                if (isset($ID_skill)) {

                                                                    if ($row['ID_skill'] == $ID_skill) {

                                                            ?>

                                                                        <option value=<?= $row['ID_skill'] ?> selected><?= $row['Name_skill']; ?></option>

                                                                    <?php } else {
                                                                    ?>
                                                                        <option value=<?= $row['ID_skill'] ?>><?= $row['Name_skill'] ?></option>


                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_skill'] ?>><?= $row['Name_skill'] ?></option>
                                                            <?php }
                                                            }
                                                            ?>

                                                        </select>


                                                    </div>
                                                </div>

                                                <input type="hidden" name="ID_post" value="<?php echo $ID_post ?>">

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Weight</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Weight_skill" value="<?php if (isset($Weight_skill)) {
                                                                                                            echo $Weight_skill;
                                                                                                        } ?>" placeholder="Weight" class="form-control">

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
