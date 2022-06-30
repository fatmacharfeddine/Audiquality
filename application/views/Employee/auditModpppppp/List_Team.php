<!--?php include "/../Header.php"; ?-->
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Team list</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo base_url(); ?>Employee_Account/Add_Team/" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add New Team </a>
                </div>
            </div>
            <div class="row doctor-grid">
                <?php foreach ($listteam as $row) { ?>
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="<?php echo base_url(); ?>/Employee_Account/Form_List_actor/?ID_team=<?php echo $row['ID_team']; ?>">
                                    <img alt="" src="<?php echo base_url() ?>/uploads/team/team.jpg"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_Team?ID_team=<?php echo $row['ID_team'] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_Team?ID_team=<?php echo $row['ID_team'] ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="doctor-name text-ellipsis">
                                <?php echo $row['Name_team']; ?>
                                </a>
                            </h4>
                           
                     
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!--?php include "/../Footer.php"; ?-->