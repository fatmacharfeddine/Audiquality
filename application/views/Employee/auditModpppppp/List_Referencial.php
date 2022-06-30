<!--?php include "/../Header.php"; ?-->
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Referencial list</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo base_url(); ?>Employee_Account/Add_referencial/" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add New Audit </a>
                </div>
            </div>
            <div class="row doctor-grid">
                <?php foreach ($referencial as $row) { ?>
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="<?php echo base_url(); ?>/Employee_Account/Form_edit_Referencial/?ID_rerencial=<?php echo $row['ID_rerencial']; ?>">
                                    <img alt="" src="<?php echo base_url() ?>/uploads/referential/iso.png"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_Referencial?ID_rerencial=<?php echo $row['ID_rerencial'] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_referencial?ID_rerencial=<?php echo $row['ID_rerencial'] ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="doctor-name text-ellipsis">
                                <?php echo $row['Name_rerencial']; ?>
                                </a>
                            </h4>
                           
                            <div class="user-country">
                            <i style='font-size:16px' class='far'>&#xf02e;</i>
                                <?php echo $row['Version_rerencial']  ?>


                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!--?php include "/../Footer.php"; ?-->