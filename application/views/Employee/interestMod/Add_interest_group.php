<style>
    .form_add_photo {
        height: 50px;
    }
</style>
<script>
    function triggerClick() {
        document.querySelector('#Photo_interest_group').click();
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
                        <li class="breadcrumb-item active" aria-current="page">Grid</li>
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
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_interest_group/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Picture Group </label>
                                                    <div class="col-md-9">
                                                        <img src="<?= base_url() ?>/uploads/interest_group/default.jpg" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="" style="  text-align:center;  width: 300px; height: 300px;border: 2px solid #d1cfcf;padding: 2px;">

                                                        <img id="target" />
                                                        <input type="file" accept="image/jpg, image/jpeg, image/png" id="Photo_interest_group" name="Photo_interest_group" onchange="displayImage(this)" style="display:none;  text-align:center;  width: 300px; height: 300px;border: 2px solid #d1cfcf;padding: 2px;"> </input>

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Group Interest</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="Name_interest_group" value="<?php if (isset($Name_interest_group)) {
                                                                                                                    echo $Name_interest_group;
                                                                                                                } ?>" placeholder="Name Group" class="form-control" />


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
                $('#ID_chapter').prop('disabled', false);
                $('#Name_chapter').prop('disabled', false);

            } else {
                $('#ID_chapter').prop('disabled', 'disabled');
                $('#Name_chapter').prop('disabled', 'disabled');

            }
            if ($("#main").is(":checked")) {
                $('#ID_chapter').prop('disabled', true);
                $('#Name_chapter').prop('disabled', true);

            } else {
                $('#ID_chapter').prop('disabled', false);
                $('#Name_chapter').prop('disabled', false);

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
