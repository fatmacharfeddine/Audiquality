
<body>


    <div class="page-wrapper" style="min-height: 314px;">


        <div class="content">
            <div class="row">
                <div class="col-sm-8 col-4">
                    <h4 class="page-title">List Evaluation Grids</h4>
                </div>
                <div class="col-sm-4 col-8 text-right m-b-30">
                    <a class="btn btn-primary btn-rounded float-right" href="<?php echo base_url(); ?>Employee_Account/Form_add_grid"><i class="fa fa-plus"></i> New Grid</a>
                </div>
            </div>
            <div class="row">

                <?php
                if (isset($grid)) {
                    if (isset($empty)) {
                ?>
                <p> grid list is empty ! </p>
                        <?php } else {
                        foreach ($grid as $row) {
                        ?>

                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a><img class="img-fluid" src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/img/grid_eval.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-content">
                                        <h3 class="blog-title"><a><?= $row['Year_grid'] ?></a></h3>
                                        <a href="<?php echo base_url(); ?>Employee_Account/List_chapter_grid?ID_grid=<?php echo $row['ID_grid'] ?>" class="read-more"><i class="fa fa-long-arrow-right"></i> Open</a>
                                        <div class="dropdown profile-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(23px, 27px, 0px);">
                                                <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_grid?ID_grid=<?php echo $row['ID_grid'] ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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