<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h3 class="card-title">Gestion des Documents</h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="<?php echo base_url() ?>/Employee_Account/List_request" class="name">List Requests (employee)</a>


                                                    </div>
                                                </div>

                                            </li>

                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="<?php echo base_url() ?>/Employee_Account/Validation_requests" class="name">Validation Requests (qse / Director)</a>


                                                    </div>
                                                </div>

                                            </li>

                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="<?php echo base_url() ?>/Employee_Account/List_document" class="name">List Documents</a>


                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="<?php echo base_url() ?>/Employee_Account/Validation_requests" class="name">List Documents Validation (Qse / Director)</a>


                                                    </div>
                                                </div>

                                            </li>


                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Gestion des documents QSE</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo site_url('Employee_Account/Form_add_res_qse') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Document QSE</a>
                </div>
            </div>
            <div class="row doctor-grid">
                <?php if (($res_qse) == False) {
                    echo "Aucun Document !!";
                } else {
                    foreach ($res_qse as $row) { ?>
                        <div class="col-md-4 col-sm-4  col-lg-3">
                            <div class="profile-widget">
                                <div class="doctor-img">
                                    <a class="avatar" href="">
                                        <img alt="" src="<?php echo base_url() ?>//includes/ext/assets/template/img/res_qse.jpg"></a>
                                </div>
                                <div class="dropdown profile-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_res_qse?ID_res_qse=<?php echo $row['ID_res_qse']; ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_res_qse?ID_res_qse=<?php echo $row['ID_res_qse']; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>Employee_Account/View_res_qse?ID_res_qse=<?php echo $row['ID_res_qse']; ?>">
                                    <h4 class="doctor-name text-ellipsis">
                                        <?php echo $row['Title_res_qse']; ?>
                                </a>
                                </h4>

                                <div class="user-country">
                                    <i style='font-size:16px' class='far'>&#xf02e;</i>
                                    <?php echo $row['Date_res_qse']  ?>


                                </div>
                                <div class="doc-prof" style="color:#009efb">
                                    <a href="<?php echo base_url(); ?>uploads/res_qse/<?php echo $row['File_res_qse'] ?>">Open File</a>
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