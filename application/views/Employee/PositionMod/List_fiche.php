<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="row doctor-grid">

                <?php
                if (isset($posts)) {
                    if (isset($empty)) {
                ?>
                        <?php } else {
                        foreach ($posts as $row) {
                        ?>
                            <div class="col-md-4 col-sm-4  col-lg-3">
                                <div class="profile-widget">
                                    <div class="doctor-img">
                                        <a class="avatar" href="">
                                            <img alt="" src="<?php echo base_url() ?>/includes/ext/assets/template/img/RH/post.jpg"></a>
                                    </div>
                                   
                                    </a>
                                    <h4 class="doctor-name text-ellipsis">
                                    <?= $row['Name_post'] ?>
                                    </h4>


                                    <div class="doc-prof" style="color:#009efb">
                                        <a href="<?php echo base_url(); ?>Employee_Account/view_fiche?ID_post=<?php echo $row['ID_post'] ?>">Fiche Fonction</a>
                                    </div>
                                </div>

                            </div>
                <?php }
                    }
                } ?>

            </div>
        </div>

    </div>