<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">



            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card-box">
                        <!-- <h3 class="card-title">Post & Skills </h3> -->
                        <div class="experience-box">
                            <ul class="experience-list">
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <div class="widget post-widget">

                                                <ul class="latest-posts">
                                                    <li>
                                                        <div class="post-thumb">
                                                            <a href="blog-details.html">
                                                                <img class="img-fluid" src="<?= base_url() ?>/includes/ext/assets/template/img/RH/skill.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-info" style="margin-top: 2%;">
                                                            <ul class="categories">
                                                                <li><a href="<?php echo base_url() ?>/Employee_Account/List_skills"><i class="fa fa-check-circle-o"></i> <span>Skills</span></a></li>

                                                            </ul>
                                                        </div>
                                                    </li>



                                                </ul>
                                            </div>

                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <div class="widget post-widget">

                                                <ul class="latest-posts">
                                                    <li>
                                                        <div class="post-thumb">
                                                            <a href="blog-details.html">
                                                                <img class="img-fluid" src="<?= base_url() ?>/includes/ext/assets/template/img/RH/post.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-info" style="margin-top: 2%;">
                                                            <ul class="categories">
                                                                <li><a href="<?php echo base_url() ?>/Employee_Account/List_posts"><i class="fa fa-check-circle-o"></i> <span>posts</span></a></li>

                                                            </ul>
                                                        </div>
                                                    </li>



                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </li>

                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <div class="widget post-widget">

                                                <ul class="latest-posts">
                                                    <li>
                                                        <div class="post-thumb">
                                                            <a href="blog-details.html">
                                                                <img class="img-fluid" src="<?= base_url() ?>/includes/ext/assets/template/img/RH/skillemp.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-info" style="margin-top: 2%;">
                                                            <ul class="categories">
                                                                <li><a href="<?php echo base_url() ?>/Employee_Account/List_Employee"><i class="fa fa-check-circle-o"></i> <span>Employees Skills </span></a></li>

                                                            </ul>
                                                        </div>
                                                    </li>



                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </li>


                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-md-4"></div>

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