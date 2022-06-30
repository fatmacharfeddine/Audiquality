<body>

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
                        <div class="table-responsive" style="margin-top : 3%">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Formation Requise</th>
                                        <th>Formation Acquise</th>
                                        <th>Conformité</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td><?php echo $Formation_post ?></td>
                                        <td><?php echo $Formation_employee ?></td>
                                        <td><?php echo 'test'; ?></td>
                                        <td><?php echo 'test'; ?></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive" style="margin-top : 3%">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Expérience Requise</th>
                                        <th>Expérience' Acquise</th>
                                        <th>Conformité</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                    <td><?php echo $Experience_post ?></td>
                                        <td><?php echo $Experience_employee ?></td>
                                        <td><?php echo 'test'; ?></td>
                                        <td><?php echo 'test'; ?></td>

                                    </tr>
                                </tbody>
                            </table>
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

                                                            <div class="col-md-8 timeline-content">
                                                                <a href="" class="name"><?php echo 'Skill ' . $count . ' : ' . $row['Name_skill']; ?></a>
                                                                <div><?php echo 'Grade : ' . $row['Grade_skill_employee']; ?></div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <a href="<?php echo base_url(); ?>Employee_Account/Form_edit_skill_employee?ID_skill_employee=<?php echo $row['ID_skill_employee'] ?>">
                                                                    <button class="btn btn-primary btn-primary-three float-right"><i class="fa fa-pencil m-r-5"></i>Update</button>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Delete_skill_employee?ID_skill_employee=<?php echo $row['ID_skill_employee'] ?>" enctype="multipart/form-data" method="post">
                                                                    <button class="btn btn-primary btn-primary-four float-right" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                                </form>


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