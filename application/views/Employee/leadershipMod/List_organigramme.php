<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>includes/org/style.css">

<body>


    <!-- partial:index.partial.html -->
    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content" style="background-color: #e9e9e9;">

            <div class="row">
                <div class="pg-orgchart">
                    <div class="org-chart">
                        <ul>
                            <li>
                                <div class="user">
                                    <img src="<?php echo base_url() ?>/uploads/Company/default_profile.jpg" class="img-responsive" />
                                    <div class="name"><?php echo $Name_post ?></div>
                                    <p>*** Employees ***</p>

                                    <?php foreach ($employees as $rowemp) {
                                                        if ($ID_post == $rowemp['ID_post']) {
                                                    ?>
                                                            <p>- <?php echo $rowemp['Name_employee'] ?></p>
                                                    <?php }
                                                    } ?>

                                </div>

                                <ul>
                                    <?php foreach ($posts as $row) {
                                        if ($row['ID_parent'] == $ID_post) { ?>
                                            <li>
                                                <div class="user">
                                                    <img src="<?php echo base_url() ?>/uploads/Company/default_profile.jpg" class="img-responsive" />
                                                    <div class="name"><?php echo $row['Name_post'] ?></div>
                                                    <p>*** Employees ***</p>

                                                    <?php foreach ($employees as $rowemp) {
                                                        if ($row['ID_post'] == $rowemp['ID_post']) {
                                                    ?>
                                                        <p>- <?php echo $rowemp['Name_employee'] ?></p>
                                                    <?php }
                                                    } ?>
                                                </div>
                                                <ul>
                                                    <?php foreach ($posts as $row2) {
                                                        if ($row2['ID_parent'] == $row['ID_post']) { ?>
                                                            <li>
                                                                <div class="user">
                                                                    <img src="<?php echo base_url() ?>/uploads/Company/default_profile.jpg" class="img-responsive" />
                                                                    <div class="name"><?php echo $row2['Name_post'] ?></div>
                                                                    <p>*** Employees ***</p>

                                                                    <?php foreach ($employees as $rowemp) {
                                                                         if ($row2['ID_post'] == $rowemp['ID_post']) {
                                                                    ?>
                                                                        <p>- <?php echo $rowemp['Name_employee'] ?></p>
                                                                    <?php }
                                                                    } ?>
                                                                </div>
                                                            </li>
                                                    <?php }
                                                    } ?>
                                                </ul>
                                            </li>
                                    <?php      }
                                    } ?>


                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- partial -->
        <script src="includes/org/script.js"></script>