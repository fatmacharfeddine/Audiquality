<!--?php include "/../Header.php"; ?-->
<style>
    .List_Picture {
        height: 50px;
    }
</style>

<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Department</h4>
                </div>

                <div class="col-sm-5 col-6 text-right m-b-30">
                    <a href="<?php echo base_url(); ?>Technical_Account/Form_edit_department?ID_department=<?php echo $ID_department ?>" class="btn btn-primary btn-rounded"><i class="fa fa-pencil m-r-5"></i> Edit Department</a>
                </div>
            </div>

            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img style="border-radius:10%" class="avatar" src="<?= base_url() ?>/uploads/Department/default_department.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">

                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0"><?php echo $Name_department ?></h3>
                                            <small class="text-muted"><?php echo $Alias_department ?></small>
                                            <?php if (isset($noadd)) { ?>

                                                <div class="staff-msg"><a style="opacity: 0.7;color: white;" href="" class="btn btn-primary">+ Add Position</a></div>
                                            <?php         } else { ?>

                                                <div class="staff-msg"><a href="<?php echo site_url('Technical_Account/Form_add_department_post?ID_department=' . $ID_department . '') ?>" class="btn btn-primary">+ Add Position</a></div>
                                            <?php } ?>

                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Phone:</span>
                                                <span class="text"><a href="#"><?php echo $Phone_department ?></a></span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"><a href="#"><?php echo $Email_department ?></a></span>
                                            </li>
                                            <li>
                                                <span class="title">Parent Department:</span>
                                                <span class="text"><?php echo $Parent_department ?></span>
                                            </li>
                                            <li>
                                                <span class="title">Director:</span>
                                                <span class="text"><?php echo $Director_department ?></span>
                                            </li>
                                            <li>
                                                <span class="title">Quality Manager:</span>
                                                <span class="text"><?php echo $Quality_Director_department ?></span>
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
                    <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Positions</a></li>
                    <li class="nav-item"><a class="nav-link show" href="#bottom-tab2" data-toggle="tab">List Employees</a></li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane show active" id="about-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h3 class="card-title">List of Positions</h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <?php if (isset($empty)) { ?>
                                                <li>

                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="" class="name"> No positions !!</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php } else if (isset($posts_management)) {
                                                $count = 0;
                                                foreach ($posts_management as $row) {
                                                    $count = $count + 1;
                                                ?>

                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="row experience-content">

                                                            <div class="col-md-6 timeline-content">
                                                                <a href="" class="name"><?php echo 'Position ' . $count . ' : ' . $row['Name_post']; ?></a>
                                                                <div><?php echo $row['Description_post']; ?></div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <a href="<?php echo base_url(); ?>Technical_Account/List_departments_employee?ID_department_post=<?php echo $row['ID_department_post'] ?>" class="btn btn-outline-primary take-btn">Employees</a>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <a href="<?php echo base_url(); ?>Technical_Account/Form_edit_department_post?ID_department_post=<?php echo $row['ID_department_post'] ?>">
                                                                    <button class="btn btn-primary btn-primary-three float-right"><i class="fa fa-pencil m-r-5"></i>Update</button>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <?php if (($row['ID_post'] != 1) && ($row['ID_post'] != 2)) {
                                                                ?>

                                                                    <form id="popup" action="<?php echo base_url(); ?>Technical_Account/Delete_department_post?ID_department_post=<?php echo $row['ID_department_post'] ?>" enctype="multipart/form-data" method="post">
                                                                        <button class="btn btn-primary btn-primary-four float-right" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                                    </form>

                                                                <?php     } ?>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php if (isset($empty_emp)) { ?>
                                                    <p> No employees for this department </p>
                                                <?php } else { ?>
                                                    <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Employee</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Department</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Position</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Access Group</th>

                                                                <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51px;"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            if (isset($employees_department)) {

                                                                foreach ($employees_department as $row) {
                                                            ?>
                                                                    <tr role="row" class="odd">

                                                                        <td style="min-width: 200px;">
                                                                            <img width="28" height="28" class="rounded-circle" src="<?= base_url() ?>/uploads/Company/default_profile.jpg" alt="">
                                                                            <h2><a><?= $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?><span><?= $row['Email_employee'] ?></span></a></h2>
                                                                        </td>



                                                                        <td><?= $row['Name_department'] ?></td>


                                                                        <!--td><?= $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></td-->

                                                                        <td><?= $row['Name_post'] ?></td>

                                                                        <td><?= $row['Name_access_group'] ?></td>

                                                                        <td class="text-right">
                                                                            <a href="<?php echo base_url(); ?>Technical_Account/List_skills_employee?ID_employee=<?php echo $row['ID_employee'] ?>" class="btn btn-outline-primary take-btn">View Profile</a>
                                                                        </td>
                                                                        <!--td class="text-right">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Technical_Account/view_employee?ID_employee=<?php echo $row['ID_employee'] ?>"><i class="fa fa-pencil m-r-5"></i> View</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Technical_Account/List_skills_employee?ID_employee=<?php echo $row['ID_employee'] ?>"><i class="fa fa-pencil m-r-5"></i> Skills</a>

                                                                    </div>
                                                                </div>
                                                            </td-->


                                                                    </tr>
                                                            <?php }
                                                            }

                                                            ?>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:2%">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite"> </div>
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <!-------------------------------PAGING------------------------------------->

                                                    <!----------------------------End PAGING------------------------------------>
                                                    <ul class="pagination">
                                                        <?php
                                                        //   $nb = 0;
                                                        for ($i = 1; $i < $nb + 1; $i++) {
                                                            /****************** No page selected **************** */
                                                            if (!isset($_GET['page'])) {
                                                                if ($i == 1) {
                                                        ?>
                                                                    <li class="paginate_button page-item active"><a href="?page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <li class="paginate_button page-item"><a href="?page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                                                <?php
                                                                }
                                                            }
                                                            /************** End No page selected **************** */
                                                            /****************** Selected page **************** */
                                                            if (isset($_GET['page'])) {
                                                                if ($i == $_GET['page']) {
                                                                ?>
                                                                    <li class="paginate_button page-item active"><a href="?page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <li class="paginate_button page-item"><a href="?page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                                        <?php
                                                                }
                                                            }
                                                            /************** End Selected page **************** */
                                                        }

                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="bottom-tab3">
                        Tab content 3
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--?php include "/../Footer.php"; ?-->

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