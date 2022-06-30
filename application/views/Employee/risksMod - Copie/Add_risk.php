<!--?php include "/../Header.php"; ?-->

<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Risks</li>
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
                                    <form id="risks" action="<?php echo base_url(); ?>Employee_Account/Submit_add_risk/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">



                                                <div class="form-group row">

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">risk</label>
                                                    <div class="col-md-9">
                                                        <?php if (isset($ID_risk)) {
                                                        ?>
                                                            <input type="hidden" name="ID_risk" value="<?php echo $ID_risk ?>">
                                                        <?php } ?>
                                                        <input type="text" name="Title_risk" value="<?php if (isset($Title_risk)) {
                                                                                                        echo $Title_risk;
                                                                                                    } ?>" placeholder="risk" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Description</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Description_risk" value="<?php if (isset($Description_risk)) {
                                                                                                                echo $Description_risk;
                                                                                                            } ?>" placeholder="Description" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Type</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_type" id="ID_type">
                                                            <?php
                                                            foreach ($type_risk as $row) {

                                                                if (isset($ID_type)) {

                                                                    if ($row['ID_type'] == $ID_type) {

                                                            ?>

                                                                        <option value=<?= $row['ID_type'] ?> selected><?= $row['Title_type'] ?></option>

                                                                    <?php } else {
                                                                    ?>
                                                                        <option value=<?= $row['ID_type'] ?>><?= $row['Title_type'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_type'] ?>><?= $row['Title_type'] ?></option>
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


    <!--?php include "/../Footer.php"; ?-->


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


                        $('form#risks').submit();
                        //	swal('its OK '+result.value);
                    } else {
                        swal("This operation is canceled");
                        return false;
                    }
                });
            });

        });
    </script>