
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Risk Reports</h4>
                </div>
                
            </div>
            <div class="row doctor-grid">
                <?php foreach ($audit_plan as $row) { ?>
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="<?php echo base_url(); ?>/Employee_Account/List_survey?ID_audit=<?php echo $row['ID_audit']; ?>"><img alt="" src="<?php echo base_url() ?>/uploads/risk/report.jpg"></a>
                            </div>
                            
                            <h4 class="doctor-name text-ellipsis"><a href="<?php echo base_url(); ?>/Employee_Account/List_survey?ID_audit=<?php echo $row['ID_audit']; ?>">
                                    <?php echo $row['Mission_audit']; ?>
                                </a>
                            </h4>

                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

