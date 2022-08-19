<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">

                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div class="blog grid-blog">
                        <div class="blog-image">
                            <a href="<?php echo base_url() ?>/Employee_Account/Form_add_organigramme">

                                <img class="img-fluid" src="<?php echo base_url() ?>/includes/ext/assets/template/img/role/organigramme.jpg" alt=""></a>
                        </div>
                        <div class="blog-content">
                            <h3 class="blog-title"><a>Organigramme</a></h3>


                        </div>
                    </div>
                </div>
                <!--div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="blog grid-blog">
                        <div class="blog-image">
                            <a href="<?php echo base_url() ?>/Employee_Account/List_posts"><img class="img-fluid" src="<?php echo base_url() ?>includes/ext/assets/template/img/role/fonction.png" alt=""></a>
                        </div>
                        <div class="blog-content">
                            <h3 class="blog-title"><a>Fonctions</a></h3>


                        </div>
                    </div>
                </div-->
                <div class="col-md-4">
                    <div class="blog grid-blog">
                        <div class="blog-image">
                            <a href="<?php echo base_url() ?>/Employee_Account/List_fiche"><img class="img-fluid" src="<?php echo base_url() ?>includes/ext/assets/template/img/role/fiche.png" alt=""></a>
                        </div>
                        <div class="blog-content">
                            <h3 class="blog-title"><a>Fiches Poste</a></h3>


                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>

            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {




            $("#btn_add").click(function() {
                swal({
                    title: 'Save',
                    text: "Are you sure?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancel',

                    confirmButtonText: 'Yes'
                }).then((result) => {

                    if (result.value) {
                        //$("#action").val(1);


                        $('form#popup').submit();
                        //	swal('its OK '+result.value);
                    } else {
                        swal("This operation is canceled");
                        return false;
                    }
                });
            });

        });
    </script>