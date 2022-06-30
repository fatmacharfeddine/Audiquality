
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title"></h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo base_url(); ?>Employee_Account/Form_add_interest_group/" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add New Group </a>
                </div>
            </div>
            <div class="row">
                <?php
                if (isset($interest_group)) {
                    if (isset($empty)) {
                ?>
                        <p> grid list is empty ! </p>
                        <?php } else {
                        foreach ($interest_group as $row) {
                        ?>
                            <div class="col-sm-3 col-3">

                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a href="blog-details.html">
                                            <img class="img-fluid" src="<?php echo base_url() ?>/uploads/interest_group/<?php echo $row['Photo_interest_group'] ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <h3 class="blog-title"><a href="blog-details.html"><?php echo $row['Name_interest_group'] ?></a></h3>
                                        <!--ul class="blog-info clearfix">
                                            <li style="margin-left: 15%;">
                                                Important Clients
                                                <span><i class="fa fa-level-up"></i>1</span>
                                            </li>
                                            <li style="margin-left: 15%;">
                                                Other Clients
                                                <span><i class="fa fa-level-up"></i>3</span>
                                            </li>
                                        </ul-->
                                        <a href="<?php echo base_url() ?>Employee_Account/List_interest_by_group/<?php echo $row['ID_interest_group'] ?>" class="read-more"><i class="fa fa-long-arrow-right"></i> View</a>
                                        <div class="blog-info clearfix">
                                            
                                            <div class="post-right">
                                                <a href="<?php echo base_url(); ?>Employee_Account/Delete_interest_group?ID_interest_group=<?php echo $row['ID_interest_group'] ?>">
                                                    <i class="fa fa-trash"></i>Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                <?php }
                    }
                } ?>

            </div>
        </div>
    </div>

