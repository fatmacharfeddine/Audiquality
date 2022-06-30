<body>

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Positions</li>
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
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_department_post/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">



                                                <div class="form-group row">

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">post</label>
                                                    <div class="col-md-9">

                                                        <input type="hidden" name="ID_department" value="<?php echo $ID_department ?>">

                                                        <?php if (isset($ID_department_post)) {
                                                        ?>
                                                            <input type="hidden" name="ID_department_post" value="<?php echo $ID_department_post ?>">
                                                        <?php } ?>

                                                        <select class="form-control" name="ID_post" id="ID_post">
                                                            <?php
                                                            foreach ($post as $row) {

                                                                if (isset($ID_post)) {

                                                                    if ($row['ID_post'] == $ID_post) {

                                                            ?>

                                                                        <option value=<?= $row['ID_post'] ?> selected><?= $row['Name_post'] ?></option>

                                                                    <?php } else {
                                                                    ?>
                                                                        <option value=<?= $row['ID_post'] ?> ><?= $row['Name_post'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_post'] ?> ><?= $row['Name_post'] ?></option>
                                                            <?php }
                                                            }
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