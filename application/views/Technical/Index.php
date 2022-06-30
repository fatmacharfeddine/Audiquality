<?php include "Header.php"; ?>

<body>

    <?php include "Menu.php"; ?>

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-12 col-12">
                    <center>

                        <h4 class="page-title"><i class="fa fa-asterisk" aria-hidden="true"></i>
                            Welcome to your private space
                            <i class="fa fa-asterisk" aria-hidden="true"></i>
                        </h4>
                    </center>
                </div>
            </div>



            <div class="col-md-12 col-sm-12  col-lg-12">
                <div class="profile-widget">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="chat-avatar">
                                <a href="profile.html" class="avatar">
                                    <img src="<?= base_url() ?>/uploads/Company/<?= $Logo_company ?>" class="img-fluid rounded-circle">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-11">
                        <h5 style="text-align: left;margin-top: 1%;">Brain Soft</h5>

                        </div>
                    </div>
                    <div class="doctor-img">
                        <a class="avatar" href=""><img alt="" src="<?= base_url() ?>/uploads/Company/default_profile.jpg"></a>
                    </div>
                  
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html"><?php echo $Name_technical ?></a></h4>
                    <div class="doc-prof" style="color:#009efb"><?php echo $Name_access_group ; ?></div>
                    <div class="user-country">
                        <i class="fa fa-envelope"></i> <?php echo $Email_technical; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "Footer.php"; ?>