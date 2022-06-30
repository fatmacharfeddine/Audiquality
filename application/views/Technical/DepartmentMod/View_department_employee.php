<!--?php include "/../Header.php"; ?-->

<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Profile</h4>
                </div>

            </div>
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="<?= base_url() ?>/uploads/Company/default_profile.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">

                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0"><?php echo $Name_employee . ' ' . $Lastname_employee ?></h3>
                                            <small class="text-muted"><?php echo $Name_post ?></small>
                                            

                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Phone:</span>
                                                <span class="text"><a href="#"><?php echo $Phone_employee ?></a></span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"><a href="#"><?php echo $Email_employee ?></a></span>
                                            </li>
                                            <li>
                                                <span class="title">Login:</span>
                                                <span class="text"><?php echo $Login_employee ?></span>
                                            </li>
                                            <li>
                                                <span class="title">Access Group:</span>
                                                <span class="text"><?php echo $Name_access_group ?></span>
                                            </li>
                                            <li>
                                                <span class="title"></span>
                                                <span class="text"></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="profile-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Skills</a></li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane show active" id="about-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h3 class="card-title">List of Skills</h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <?php if (isset($empty)) { ?>
                                                <li>

                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="" class="name"> No skills !!</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php } else if (isset($skills_management)) {
                                                $count = 0;
                                                foreach ($skills_management as $row) {
                                                    $count = $count + 1;
                                                ?>

                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="row experience-content">

                                                            <div class="col-md-12 timeline-content">
                                                                <a href="" class="name"><?php echo 'Skill ' . $count . ' : ' . $row['Name_skill']; ?></a>
                                                                <div><?php echo 'Grade : ' . $row['Grade_skill_employee']; ?></div>
                                                            </div>
                                                           
                                                            

                                                        </div>
                                                    </li>
                                            <?php }
                                            }  ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="bottom-tab2">
                        Tab content 2
                    </div>
                    <div class="tab-pane" id="bottom-tab3">
                        Tab content 3
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--?php include "/../Footer.php"; ?-->

