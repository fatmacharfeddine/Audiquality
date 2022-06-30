
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title"></h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <!------------------------------ pop-up ------------------------------->
                    <div class="modal fade" id="add_group" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="row">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>
                                    <div class="col-md-12">
                                        <div class="card-box">
                                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Add_SWOT" enctype="multipart/form-data" method="post">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group" style="text-align: center;">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="status" id="product_active" value="Strenghts" checked="">
                                                                <label class="form-check-label" for="product_active">
                                                                    Strenghts
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="status" id="product_inactive" value="Weaknesses">
                                                                <label class="form-check-label" for="product_inactive">
                                                                    Weaknesses
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="status" id="product_inactive" value="Opportunities">
                                                                <label class="form-check-label" for="product_inactive">
                                                                    Opportunities
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="status" id="product_inactive" value="Threats">
                                                                <label class="form-check-label" for="product_inactive">
                                                                    Threats
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-3">Liste Enjeu </label>
                                                            <div class="col-md-12">
                                                                <select class="form-control" name="ID_enjeu" id="ID_enjeu">
                                                                    <?php
                                                                    foreach ($enjeu as $row) {

                                                                        if (isset($ID_enjeu)) {

                                                                            if ($row['ID_enjeu'] == $ID_enjeu) {

                                                                    ?>

                                                                                <option value=<?= $row['ID_enjeu'] ?> selected><?= $row['Text_enjeu'] ?></option>

                                                                            <?php } else {
                                                                            ?>

                                                                                <option value=<?= $row['ID_enjeu'] ?>><?= $row['Text_enjeu'] ?></option>

                                                                            <?php }
                                                                        } else {
                                                                            ?>
                                                                            <option value=<?= $row['ID_enjeu'] ?>><?= $row['Text_enjeu']  ?></option>


                                                                    <?php }
                                                                    }
                                                                    ?>


                                                                </select>
                                                            </div>
                                                        </div>




                                                    </div>

                                                </div>
                                                <div class="text-right">
                                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!---------------------------End pop-up ------------------------------->


                </div>
            </div>
            <div class="row">
                <?php if (isset($allswot)) {
                    foreach ($allswot as $row) {
                ?>

                        <div class="col-sm-3 col-3">

                            <div class="blog grid-blog">
                                <div class="blog-image">
                                <a href="#" class="btn btn-primary btn-rounded float-right" data-toggle="modal" data-target="#add_group"><i class="fa fa-plus"></i>Affecter enjeu </a>

                                    <a href="<?php echo base_url() ?>/Employee_Account/View_Detail_Swot?ID_swot=<?php echo $row['ID_swot'] ?>">
                                        <img class="img-fluid" src="<?php echo base_url() ?>/includes/ext/assets/template/img/context/<?php echo $row['photo_swot'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h3 class="blog-title"><a href="blog-details.html"></a></h3>
                                    <ul class="blog-info clearfix">

                                    </ul>
                                    <a href="<?php echo base_url() ?>/Employee_Account/View_Detail_Swot?ID_swot=<?php echo $row['ID_swot'] ?>" class="read-more"><i class="fa fa-long-arrow-right"></i> Detail</a>
                                    
                                 
                                </div>
                            </div>

                        </div>
                <?php
                    }
                } ?>


            </div>
        </div>
    </div>

