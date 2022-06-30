<style>
    .form_add_photo {
        height: 50px;
    }
</style>
<script>
    function triggerClick() {
        document.querySelector('#File_res_qse').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">res_qse</li>
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
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_res_qse/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Document QSE</label>
                                                    <div class="col-md-9">
                                                        <?php if (isset($ID_res_qse)) {
                                                        ?>
                                                            <input type="hidden" name="ID_res_qse" value="<?php echo $ID_res_qse ?>">
                                                        <?php } ?>
                                                        <input type="text" name="Title_res_qse" value="<?php if (isset($Title_res_qse)) {
                                                                                                            echo $Title_res_qse;
                                                                                                        } ?>" placeholder="Document QSE" class="form-control">

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Date document</label>
                                                    <div class="col-md-9">

                                                        <input type="date" name="Date_res_qse" value="<?php if (isset($Date_res_qse)) {
                                                                                                            echo $Date_res_qse;
                                                                                                        } ?>" placeholder="<?php if (isset($Date_res_qse)) {
                                                                                                                            echo $Date_res_qse;
                                                                                                                        } ?>" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">File</label>
                                                    <div class="col-md-9">
                                                        <img class="form_add_photo" style="cursor:pointer;" src="<?php echo base_url() ?>/includes/ext/assets/template/img/file.png" value="" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">

                                                        <!--?php// } else { ?-->

                                                        <img id="target">
                                                        <input type="file" accept=".pdf" id="File_res_qse" name="File_res_qse" onchange="displayImage(this)" style="display:none;">



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
                $('#ID_res_qse').prop('disabled', false);
                $('#Date_res_qse').prop('disabled', false);

            } else {
                $('#ID_res_qse').prop('disabled', 'disabled');
                $('#Date_res_qse').prop('disabled', 'disabled');

            }
            if ($("#main").is(":checked")) {
                $('#ID_res_qse').prop('disabled', true);
                $('#Date_res_qse').prop('disabled', true);

            } else {
                $('#ID_res_qse').prop('disabled', false);
                $('#Date_res_qse').prop('disabled', false);

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