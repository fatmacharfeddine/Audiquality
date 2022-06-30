<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card-box">
                        <h3 class="card-title">Recuitment Process</h3>
                        <div class="experience-box">
                            <ul class="experience-list">
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <div class="widget post-widget">

                                                <ul class="latest-posts">
                                                    <li>
                                                        <div class="post-thumb">
                                                            <a href="blog-details.html">
                                                                <img class="img-fluid" src="<?= base_url() ?>/includes/ext/assets/template/img/RH/rec1.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-info" style="margin-top: 2%;">
                                                            <ul class="categories">
                                                                <li><a href="<?php echo base_url() ?>/Employee_Account/List_recuitment_eval"><i class="fa fa-check-circle-o"></i> <span>Evaluation Recrutement</span></a></li>

                                                            </ul>
                                                        </div>
                                                    </li>



                                                </ul>
                                            </div>

                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <div class="widget post-widget">

                                                <ul class="latest-posts">
                                                    <li>
                                                        <div class="post-thumb">
                                                            <a href="blog-details.html">
                                                                <img class="img-fluid" src="<?= base_url() ?>/includes/ext/assets/template/img/RH/rec2.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-info" style="margin-top: 2%;">
                                                            <ul class="categories">
                                                                <li><a href="<?php echo base_url() ?>/Employee_Account/List_employee_new"><i class="fa fa-check-circle-o"></i> <span>Integration Recru</span></a></li>

                                                            </ul>
                                                        </div>
                                                    </li>



                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </li>


                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-md-4"></div>

            </div>

            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Gestion de Recrutement</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo site_url('Employee_Account/Form_add_recrutement') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Ajout recrutement</a>
                </div>
            </div>
            <div class="row doctor-grid">
                <?php if (($recrutement) == False) {
                    echo "Aucun Document !!";
                } else {
                    foreach ($recrutement as $row) { ?>
                        <div class="col-md-4 col-sm-4  col-lg-3">
                            <div class="profile-widget">
                                <div class="doctor-img">
                                    <a class="avatar" href="">
                                        <img alt="" src="<?php echo base_url() ?>//includes/ext/assets/template/img/recrutement.jpg"></a>
                                </div>
                                <div class="dropdown profile-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_recrutement?ID_recrutement=<?php echo $row['ID_recrutement']; ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_recrutement?ID_recrutement=<?php echo $row['ID_recrutement']; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>Employee_Account/View_recrutement?ID_recrutement=<?php echo $row['ID_recrutement']; ?>">
                                    <h4 class="doctor-name text-ellipsis">
                                        <?php echo $row['Title_recrutement']; ?>
                                </a>
                                </h4>

                                <div class="user-country">
                                    <i style='font-size:16px' class='far'>&#xf02e;</i>
                                    <?php echo $row['Date_recrutement']  ?>


                                </div>
                                <div class="doc-prof" style="color:#009efb">
                                    <a href="<?php echo base_url(); ?>uploads/recrutement/<?php echo $row['File_recrutement'] ?>">Open File</a>
                                </div>
                            </div>

                        </div>
                <?php }
                } ?>
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