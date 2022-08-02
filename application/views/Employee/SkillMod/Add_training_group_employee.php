<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Post & Skills</li>
                    </ol>
                </nav>
                <!-- //breadcrumbs -->
                <!-- forms -->

                <section class="forms">
                    <!-- forms 1 -->

                    <div class="content">



                        <!--div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h3 class="card-title">List of groups already in : </h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <?php if ($group_employee_exist == null) { ?>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <span class="time">None</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php } else { ?>
                                                <?php
                                                foreach ($group_employee_exist as $row) { ?>
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a class="name"><?php echo $row['Name_training_group'] ?></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                            <?php }
                                            } ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </!--div-->


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_training_group_employee" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <input type="hidden" name="ID_skill" value="<?php echo $ID_skill ?>">
                                            <input type="hidden" name="ID_skill_employee" value="<?php echo $ID_skill_employee ?>">

                                            <div class="col-md-6">

                                                <!--input type="text" value="<?php if (isset($_GET['ID_skill_employee'])) {
                                                                                    echo $_GET['ID_skill_employee'];
                                                                                }; ?>"-->
                                                <div class="form-group row">

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Groups</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_training_group" id="ID_training_group">


                                                            <?php
                                                            foreach ($group_employee as $row) {
                                                                if (isset($ID_training_group)) {
                                                                    if ($row['ID_training_group'] == $ID_training_group) {

                                                            ?>

                                                                        <option value=<?= $row['ID_training_group'] ?> selected><?= $row['Name_training_group'] ?></option>
                                                                    <?php } else {
                                                                    ?>
                                                                        <option value=<?= $row['ID_training_group'] ?>><?= $row['Name_training_group'] ?></option>
                                                                    <?php }
                                                                } else { ?>
                                                                    <option value=<?= $row['ID_training_group'] ?>><?= $row['Name_training_group'] ?></option>

                                                            <?php       }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                        <div class="text-right">
                                            <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
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