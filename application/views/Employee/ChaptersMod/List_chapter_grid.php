
<body>


    <div class="page-wrapper" style="min-height: 314px;">


        <div class="content">
            <div class="row">
                <div class="col-sm-8 col-4">
                    <h4 class="page-title">Evaluation For year : <?php echo $Year_grid ?></h4>
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
                                        <a href="<?php echo base_url(); ?>Employee_Account/view_chapter_grid?ID_chapter=<?php echo $row['ID_chapter'] ?>&ID_grid=<?php echo $ID_grid ?>" class="read-more"><i class="fa fa-long-arrow-right"></i>Evaluation</a>

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