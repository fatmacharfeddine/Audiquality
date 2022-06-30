
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Risk Sheets</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo base_url(); ?>Employee_Account/Form_add_risk/" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add New Sheet </a>
                </div>
            </div>
            <div class="row doctor-grid">
                <?php foreach ($eval as $row) { ?>
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="<?php echo base_url(); ?>/Employee_Account/View_risk?ID_risk=<?php echo $row['ID_risk']; ?>"><img alt="" src="<?php echo base_url() ?>/uploads/risk/<?php echo $row['Photo_processus']; ?>"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_risk?ID_risk=<?php echo $row['ID_risk'] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_risk?ID_risk=<?php echo $row['ID_risk'] ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="doctor-name text-ellipsis"><a href="<?php echo base_url(); ?>/Employee_Account/View_risk?ID_risk=<?php echo $row['ID_risk']; ?>">
                                    <?php echo $row['Title_processus']; ?>
                                </a>
                            </h4>
                            <div class="doc-prof">
                                <?php echo $row['Name_employee'] . $row['Lastname_employee']; ?>
                            </div>
                            <div class="user-country">
                                <i class="fa fa-calendar"></i>
                                <?php echo date('D  d-M-Y', strtotime($row['Date_risk'])); ?>


                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

