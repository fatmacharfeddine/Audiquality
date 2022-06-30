
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">training</li>
                    </ol>
                </nav>
                <!-- //breadcrumbs -->
                <!-- forms -->
                <section class="forms">
                    <!-- forms 1 -->

                    <div class="content">

                        <div class="row">
                            <div class="card-box">

                                <form id="test" action="<?php echo base_url(); ?>Employee_Account/Submit_add_training_request/" enctype="multipart/form-data" method="post">


                                    <?php if (isset($ID_training_programm)) {
                                    ?>
                                        <input type="hidden" name="ID_training_programm" value="<?php echo $ID_training_programm ?>">
                                    <?php } ?>
                                    <input type="hidden" name="Createdby_training_request" value="<?php echo $ID_current_employee ?>">
                                    <input type="hidden" name="ID_training_group_request" value="0">


                                    <?php if (isset($ID_status_training)) {
                                    ?>
                                        <input type="hidden" name="ID_status_training" value="<?php echo $ID_status_training ?>">
                                    <?php } ?>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group form-focus focused">
                                                <label class="focus-label">Title Request</label>
                                                <input type="text" name="Title_training_request" value="<?php if (isset($Title_training_request)) {
                                                                                                            echo $Title_training_request;
                                                                                                        } ?>" placeholder="Title Request" class="form-control floating">

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group form-focus focused">
                                                <label class="focus-label">Description</label>
                                                <textarea cols="30" rows="6" name="Description_training_request" value="<?php if (isset($Description_training_request)) {
                                                                                                                            echo $Description_training_request;
                                                                                                                        } ?>" placeholder="Description Request" class="form-control floating">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="add-more">
                                        <button id="btn_add" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Request</button>

                                    </div>

                                </form>

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
                $('#ID_training').prop('disabled', false);
                $('#Name_training').prop('disabled', false);

            } else {
                $('#ID_training').prop('disabled', 'disabled');
                $('#Name_training').prop('disabled', 'disabled');

            }
            if ($("#main").is(":checked")) {
                $('#ID_training').prop('disabled', true);
                $('#Name_training').prop('disabled', true);

            } else {
                $('#ID_training').prop('disabled', false);
                $('#Name_training').prop('disabled', false);

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


                        $('form#test').submit();
                        //	swal('its OK '+result.value);
                    } else {
                        swal("This operation is canceled");
                        return false;
                    }
                });
            });

        });
    </script>
