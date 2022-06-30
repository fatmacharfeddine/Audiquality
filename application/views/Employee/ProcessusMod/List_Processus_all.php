<style>
    .manag {
        text-align: center;
        border: 1px solid #d8d8d8;
        padding: 2%;
        border-radius: 10px;
        background-color: #009086;
        max-width: 31%;
        margin: 1.1%;
        color: #fafafa;
    }

    .real {
        text-align: center;
        border: 1px solid #d8d8d8;
        padding: 2%;
        border-radius: 10px;
        background-color: #009086;
        max-width: 97.5%;
        margin: 1.1%;
        color: #fafafa;
    }
</style>

<div class="page-wrapper" style="min-height: 314px;">
    <div class="content">
        <div class="container-fluid content-top-gap">
            <section class="forms">
                <div class="row">
                    <div class="col-sm-6 col-md-4" style="text-align:center">
                        <a href="<?php echo base_url(); ?>Employee_Account/List_Processus_list" class="btn btn-success btn-block" style="background-color: #009efb;border: 1px solid #009efb;"> Liste des Processus </a>
                    </div>
                    <div class="col-sm-6 col-md-4" style="text-align:center">
                        <button class="btn btn-white" onclick="printDiv('printMe')"><i class="fa fa-print fa-lg"></i> Print</button>
                    </div>
                    <div class="col-sm-6 col-md-3" style="text-align:center">
                        <a href="<?php echo base_url(); ?>Employee_Account/List_Processus_matrix" class="btn btn-success btn-block" style="background-color: #009efb;border: 1px solid #009efb;"> Matrice des Processus </a>
                    </div>
                </div>
                <br>
                <br>
                <div class="content" id="printMe">
                    <h3 class="blog-title" style="text-align: center;">Cartographie des Processus</h3>
                    <div class="row" style="border: 1px solid #e7e7e7;padding: 2%;background-color: white;">

                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="blog-view">
                                        <article class="blog blog-single-post">
                                            <h5>Besoins du Client et des Parties Intéressées :</h5>
                                            <ul class="categories">

                                                <?php if (isset($interest)) {
                                                    foreach ($interest as $row) { ?>
                                                        <li><i class="fa fa-long-arrow-right"></i> <?php echo $row['Participant_interest']; ?></li>

                                                <?php   }
                                                } ?>
                                            </ul>
                                        </article>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="card-box" style="background-color:#c6c6c6">
                                <div class="card-block">
                                    <div class="blog-view" style="text-align: center">
                                        <h4>Processus Management</h4>

                                        <div class="row">

                                            <?php foreach ($management as $row1) { ?>
                                                <div class="col-sm-4 manag">
                                                    <?php echo $row1['Title_processus']; ?>
                                                </div>

                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <img class="img-fluid" style="max-height: 40px;margin-top: 40px;" src="<?php echo base_url() ?>includes/ext/assets/images/arrow/ar-right.png" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-box" style="background-color:#c6c6c6">
                                        <div class="card-block">
                                            <div class="blog-view" style="text-align: center">
                                                <h4>Processus Réalisation</h4>

                                                <div class="row">

                                                    <?php foreach ($realisation as $row1) { ?>
                                                        <div class="col-sm-12 real">
                                                            <?php echo $row1['Title_processus']; ?>
                                                        </div>

                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <img class="img-fluid" style="max-height: 40px;margin-top: 40px;" src="<?php echo base_url() ?>includes/ext/assets/images/arrow/ar-right.png" alt="">
                                </div>
                            </div>

                            <div class="card-box" style="background-color:#c6c6c6">
                                <div class="card-block">
                                    <div class="blog-view" style="text-align: center">
                                        <h4>Processus Support</h4>

                                        <div class="row">

                                            <?php foreach ($support as $row1) { ?>
                                                <div class="col-sm-4 manag">
                                                    <?php echo $row1['Title_processus']; ?>
                                                </div>

                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="blog-view">
                                        <article class="blog blog-single-post">
                                            <h5>Satisfaction du Client et des Parties Intéressées :</h5>
                                            <ul class="categories">

                                                <?php if (isset($interest)) {
                                                    foreach ($interest as $row) { ?>
                                                        <li><i class="fa fa-long-arrow-right"></i> <?php echo $row['Attente_interest']; ?></li>

                                                <?php   }
                                                } ?>
                                            </ul>
                                        </article>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

    }
</script>