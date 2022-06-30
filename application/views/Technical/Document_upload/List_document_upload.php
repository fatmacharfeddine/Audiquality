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
<!--?php include "/../Header.php"; ?-->

<body>

    <!--?php include "/../Menu.php"; ?-->

<div class="page-wrapper" style="min-height: 314px;">
    <div class="content">
        <div class="container-fluid content-top-gap">
            <section class="forms">

                <div class="row">


                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a><img class="img-fluid" src="<?php echo base_url() ?>/includes/ext/assets/template/img/risk/management.jpg" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a>Processus Management</a></h3>
                                <a href="<?php echo base_url() ?>/Employee_Account/List_risk_objectif_by_type?processcategory=1" class="read-more"><i class="fa fa-long-arrow-right"></i> Open</a>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a><img class="img-fluid" src="<?php echo base_url() ?>/includes/ext/assets/template/img/risk/realisation.png" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a>Processus Réalisation</a></h3>
                                <a href="<?php echo base_url() ?>/Employee_Account/List_risk_objectif_by_type?processcategory=2" class="read-more"><i class="fa fa-long-arrow-right"></i> Open</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a><img class="img-fluid" src="<?php echo base_url() ?>/includes/ext/assets/template/img/risk/support.jpg" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a>Processus Supports</a></h3>
                                <a href="<?php echo base_url() ?>/Employee_Account/List_risk_objectif_by_type?processcategory=3" class="read-more"><i class="fa fa-long-arrow-right"></i> Open</a>

                            </div>
                        </div>
                    </div>


                </div>
            </section>
        </div>
    </div>
</div>

<!--?php include "/../Footer.php"; ?-->

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

    }
</script>