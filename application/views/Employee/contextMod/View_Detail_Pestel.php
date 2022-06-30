
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="row">
                <div class="col-md-4">
                    <div class="blog-view">
                        <article class="blog blog-single-post">
                            <div class="blog-info clearfix">
                                <div class="post-left">

                                </div>
                            </div>
                            <div class="blog-image">
                                <a href="#.">
                                    <img alt="" src="<?php echo base_url() ?>/includes/ext/assets/template/img/context/<?php if (isset($photo_pestel)) {
                                                                                                                            foreach ($photo_pestel as $row) {
                                                                                                                                echo $row['photo_pestel'];
                                                                                                                            }
                                                                                                                        }  ?>" class="img-fluid">
                                </a>
                            </div>

                        </article>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card member-panel" style="height: 89%;">
                        <div class="card-header bg-white">

                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="card-title mb-0">Enjeu</h4>
                                </div>
                                <div class="col-md-8">
                                    <!--?php echo $row['Text_enjeu'] ?-->
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="contact-list">
                                <?php
                                if (isset($pestel)) {
                                    // if (isset($empty)) {
                                ?>
                                    <?php // } else {
                                    foreach ($pestel as $row) {
                                    ?>
                                        <li>

                                            <div class="contact-cont">
                                                <div class="row">
                                                    <div class="col-md-10">

                                                        <div class="contact-info">
                                                            <span class="contact-name text-ellipsis"><?php echo $row['Text_enjeu'] ?></span>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">

                                                        <a href="<?php echo base_url(); ?>Employee_Account/delete_enjeu_pestel?ID_enjeu=<?php echo $row['ID_enjeu'] ?>&ID_pestle=<?php echo $ID_pestle ?>">
                                                            <button class="btn btn-primary btn-primary-four float-right"  type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                        </a>

                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                <?php //}
                                    }
                                } ?>

                            </ul>
                        </div>

                    </div>
                </div>

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