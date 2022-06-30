
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">doc_requests</li>
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
                                    <?php if (isset($no_docs) & ($Type_requests != 0)) {
                                        echo "There are No Documents !! ";
                                    } else {
                                    ?>
                                        <form id="doc_requests" action="<?php echo base_url(); ?>Employee_Account/Submit_add_doc_request/" enctype="multipart/form-data" method="post">
                                            <div class="row">
                                                <div class="col-md-6">



                                                    <div class="form-group row">

                                                    </div>

                                                    <?php
                                                    if (isset($Type_requests)) {
                                                    ?>
                                                        <input type="hidden" name="Type_requests" value="<?php echo $Type_requests; ?>">
                                                        <?php
                                                        if ($Type_requests != 0) {
                                                        ?>
                                                            <?php
                                                            //   } else if (($Type_requests = 1) || ($Type_requests = 2)) {
                                                            ?>
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-md-3">Document</label>
                                                                <div class="col-md-9">
                                                                    <select class="form-control" name="ID_document" id="ID_document">
                                                                        <?php
                                                                        foreach ($document as $row) {

                                                                            if (isset($ID_document)) {

                                                                                if ($row['ID_document'] == $ID_document) {

                                                                        ?>

                                                                                    <option value=<?= $row['ID_document'] ?> selected><?= $row['Title_document'] ?></option>

                                                                                <?php } else {
                                                                                ?>

                                                                                    <option value=<?= $row['ID_document'] ?>><?= $row['Title_document'] ?></option>

                                                                                <?php }
                                                                            } else {
                                                                                ?>
                                                                                <option value=<?= $row['ID_document'] ?>><?= $row['Title_document'] ?></option>


                                                                        <?php }
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>
                                                            </div>

                                                    <?php
                                                        }
                                                    }

                                                    ?>



                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3">Description</label>
                                                        <div class="col-md-9">

                                                            <input type="text" name="Description_requests" value="<?php if (isset($Description_requests)) {
                                                                                                                        echo $Description_requests;
                                                                                                                    } ?>" placeholder="Description" class="form-control">

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="text-right">
                                                <button id="btn_add" type="button" class="btn btn-primary">Confirm</button>
                                            </div>
                                        </form>
                                    <?php }
                                    ?>

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


                        $('form#doc_requests').submit();
                        //	swal('its OK '+result.value);
                    } else {
                        swal("This operation is canceled");
                        return false;
                    }
                });
            });

        });
    </script>