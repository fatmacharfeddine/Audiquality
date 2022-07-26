<body>


    <div class="page-wrapper" style="min-height: 314px;">


        <div class="content">
            <div class="row">
                <div class="col-sm-8 col-4">
                    <h4 class="page-title">Audit Quality : ISO 9001 Chapters</h4>
                </div>
                <div class="col-sm-4 col-8 text-right m-b-30">
                    <a class="btn btn-primary btn-rounded float-right" href="<?php echo base_url(); ?>Employee_Account/Form_add_chapter"><i class="fa fa-plus"></i> Add Chapter</a>
                </div>
            </div>
            <div class="row">

                <?php
                if (isset($chapter)) {
                    if (isset($empty)) {
                ?>
                        <?php } else {
                        foreach ($chapter as $row) {
                        ?>

                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a><img class="img-fluid" src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/img/Iso_9001.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-content">
                                        <h3 class="blog-title"><a><?= $row['Title_chapter'] ?></a></h3>
                                        <p><?= $row['Name_chapter'] ?></p>
                                        <a href="<?php echo base_url(); ?>Employee_Account/view_chapter?ID_chapter=<?php echo $row['ID_chapter'] ?>" class="read-more"><i class="fa fa-long-arrow-right"></i> Details</a>
                                        <div class="dropdown profile-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(23px, 27px, 0px);">
                                                <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_chapter?ID_chapter=<?php echo $row['ID_chapter'] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_chapter?ID_chapter=<?php echo $row['ID_chapter'] ?>" onclick="return confirm('Êtes-vous sûr?');"><i class="fa fa-trash-o m-r-5"></i>  Delete </a>
                                                <!--form id="popup" action="<?php echo base_url(); ?>Employee_Account/Delete_chapter?ID_chapter=<?php echo $row['ID_chapter'] ?>" enctype="multipart/form-data" method="post">
                                                    <button class="dropdown-item" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                </form-->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php }
                    }
                } ?>

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