
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
                                    <a href="<?php echo base_url() ?>/Technical_Account/List_document_by_type?processcategory=1" class="read-more"><i class="fa fa-long-arrow-right"></i> Open</a>

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
                                    <a href="<?php echo base_url() ?>/Technical_Account/List_document_by_type?processcategory=2" class="read-more"><i class="fa fa-long-arrow-right"></i> Open</a>

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
                                    <a href="<?php echo base_url() ?>/Technical_Account/List_document_by_type?processcategory=3" class="read-more"><i class="fa fa-long-arrow-right"></i> Open</a>

                                </div>
                            </div>
                        </div>


                    </div>
                </section>
            </div>
        </div>
    </div>



    <script>
        function triggerClick() {
            document.querySelector('#File_training_evaluation_emp').click();
        }

        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>