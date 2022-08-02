<body>


    <div class="page-wrapper" style="min-height: 314px;">


        <div class="content">
            <!-----------------------------Training Requests-------------------------->
            <div class="row">
                <div class="col-sm-8 col-4">
                    <h4 class="page-title">Trainings Requests </h4>
                </div>


            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="widget post-widget">
                        <h5>Employee / GRH</h5>
                        <ul class="latest-posts">
                            <li>

                                <div class="post-info" style="margin-left: 0px;">
                                    <ul class="categories">
                                        <li><a href="<?php echo base_url(); ?>Employee_Account/Training_request_director_qse"><i class="fa fa-check-circle-o"></i> <span>Trainings Requests</span></a></li>
                                        <li><a href="<?php echo base_url(); ?>Employee_Account/Training_request_qse"><i class="fa fa-check-circle"></i> <span>Trainings Requests by Groups</span></a></li>
                                        <li><a href="<?php echo base_url(); ?>Employee_Account/Training_request_employee"><i class="fa fa-check-circle"></i> <span>Trainings Requests by Employee</span></a></li>

                                    </ul>
                                </div>
                            </li>



                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="widget post-widget">
                        <h5>QSE</h5>
                        <ul class="latest-posts">
                            <li>

                                <div class="post-info" style="margin-left: 0px;">
                                    <ul class="categories">
                                        <li><a href="<?php echo base_url(); ?>Employee_Account/Training_request_director_qse"><i class="fa fa-check-circle-o"></i> <span>Trainings Requests</span></a></li>
                                        <li><a href="<?php echo base_url(); ?>Employee_Account/Training_request_qse"><i class="fa fa-check-circle"></i> <span>Trainings Requests by Groups</span></a></li>
                                    </ul>
                                </div>
                            </li>



                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="widget post-widget">
                        <h5>Director</h5>
                        <ul class="latest-posts">
                            <li>

                                <div class="post-info" style="margin-left: 0px;">
                                    <ul class="categories">
                                        <li><a href="<?php echo base_url(); ?>Employee_Account/Training_request_director"><i class="fa fa-check-circle-o"></i> <span>Trainings Requests</span></a></li>
                                        <li><a href="<?php echo base_url(); ?>Employee_Account/Training_request_director_qse"><i class="fa fa-check-circle-o"></i> <span>Trainings Requests by Groups</span></a></li>

                                    </ul>
                                </div>
                            </li>



                        </ul>
                    </div>

                </div>
            </div>


            <!-----------------------------Training Program---------------------------->
            <div class="row">
                <div class="col-sm-8 col-4">
                    <h4 class="page-title">Trainings Planification</h4>
                </div>


            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="widget post-widget">
                        <h5>Trainings for Groups</h5>
                        <ul class="latest-posts">
                            <li>
                                <div class="post-thumb">
                                    <a href="blog-details.html">
                                        <img class="img-fluid" src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/img/training1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <ul class="categories">
                                        <li><a href="<?php echo base_url(); ?>Employee_Account/List_trainings?ID_status_training=0"><i class="fa fa-check-circle-o"></i> <span>List Trainings</span></a></li>
                                        <li><a href="<?php echo base_url(); ?>Employee_Account/Training_request"><i class="fa fa-check-circle"></i> <span>List Requests</span></a></li>
                                    </ul>
                                </div>
                            </li>



                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="widget post-widget">
                        <h5>Training for skills</h5>
                        <ul class="latest-posts">
                            <li>
                                <div class="post-thumb">
                                    <a href="blog-details.html">
                                        <img class="img-fluid" src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/img/training2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <ul class="categories">
                                        <li><a href="<?php echo base_url(); ?>Employee_Account/List_trainings?ID_status_training=1"><i class="fa fa-check-circle-o"></i> <span>List Trainings</span></a></li>
                                        <li><a href="<?php echo base_url(); ?>Employee_Account/List_training_group?ID_status_training=1"><i class="fa fa-check-circle"></i> <span>List Training Groups</span></a></li>
                                    </ul>
                                </div>
                            </li>



                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="widget post-widget">
                        <h5>Organisations propositions</h5>
                        <ul class="latest-posts">
                            <li>
                                <div class="post-thumb">
                                    <a href="blog-details.html">
                                        <img class="img-fluid" src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/img/training3.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <ul class="categories">
                                        <li><a href="<?php echo base_url(); ?>Employee_Account/List_trainings?ID_status_training=2"><i class="fa fa-check-circle-o"></i> <span>List Trainings</span></a></li>
                                        <li> </li>

                                    </ul>
                                </div>
                            </li>



                        </ul>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h3 class="card-title">Annual Trainings Program</h3>
                        <div class="experience-box">
                            <ul class="experience-list">
                                <?php if (($trainings != null)) {
                                    foreach ($trainings as $row) {

                                ?>
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="<?php echo base_url() ?>/Employee_Account/List_trainings_program?Year_training_programm=<?= $row['Year_training_programm'] ?>" class="name"><?php echo $row['Year_training_programm'] ?></a>


                                                </div>
                                            </div>

                                        </li>
                                <?php  }
                                } ?>


                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h3 class="card-title">Trainings Evaluation</h3>
                        <div class="experience-box">
                            <ul class="experience-list">
                                <?php if (($trainings != null)) {
                                    foreach ($trainings as $row) {

                                ?>
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="<?php echo base_url() ?>/Employee_Account/List_trainings_eval_choise?Year_training_programm=<?= $row['Year_training_programm'] ?>" class="name"><?php echo $row['Year_training_programm'] ?></a>


                                                </div>
                                            </div>

                                        </li>
                                <?php  }
                                } ?>


                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>