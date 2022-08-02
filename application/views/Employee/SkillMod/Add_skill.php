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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_skill/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">



                                                <div class="form-group row">

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Skill</label>
                                                    <div class="col-md-9">
                                                        <?php if (isset($ID_skill)) {
                                                        ?>
                                                            <input type="hidden" name="ID_skill" value="<?php echo $ID_skill ?>">
                                                        <?php } ?>
                                                        <input type="text" name="Name_skill" value="<?php if (isset($Name_skill)) {
                                                                                                        echo $Name_skill;
                                                                                                    } ?>" placeholder="Skill" class="form-control">
                                                        <?php if (isset($exist)) { ?>
                                                            <p style="color:red">this name skill already exists</p>
                                                        <?php }  ?> </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Description</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Description_skill" value="<?php if (isset($Description_skill)) {
                                                                                                                echo $Description_skill;
                                                                                                            } ?>" placeholder="Description" class="form-control">

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