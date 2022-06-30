<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Process list</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo base_url(); ?>Employee_Account/Form_add_processus/" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add New Process </a>
                </div>
            </div>
            <div class="row doctor-grid">
                <?php if (isset($process)) {
                    foreach ($process as $row) { ?>
                        <div class="col-md-4 col-sm-4  col-lg-3">
                            <div class="profile-widget">
                                <div class="doctor-img">
                                    <a class="avatar" href="<?php echo base_url(); ?>/Employee_Account/Form_edit_processus/?ID_processus=<?php echo $row['ID_processus']; ?>">
                                        <img alt="" src="<?php echo base_url() ?>/uploads/process/<?php echo $row['Photo_processus'] ?>"></a>
                                </div>
                                <div class="dropdown profile-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_Add_processusgroup?ID_processus=<?php echo $row['ID_processus']; ?>"><i class="fa fa-pencil m-r-5"></i> Ajout Group Activité</a>

                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_processus?ID_processus=<?php echo $row['ID_processus']; ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_processus?ID_processus=<?php echo $row['ID_processus']; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>Employee_Account/View_Processus?ID_processus=<?php echo $row['ID_processus']; ?>">
                                    <h4 class="doctor-name text-ellipsis">
                                        <?php echo $row['Title_processus']; ?>
                                </a>
                                </h4>

                                <div class="user-country">
                                    <i style='font-size:16px' class='far'>&#xf02e;</i>
                                    <?php echo $row['Name_employee'] . ' ' .  $row['Lastname_employee'] ?>


                                </div>
                            </div>

                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>