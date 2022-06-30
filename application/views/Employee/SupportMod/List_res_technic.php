<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Gestion des Document Technique</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo site_url('Employee_Account/Form_add_res_technic') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Document Technique</a>
                </div>
            </div>
            <div class="row doctor-grid">
                <?php if (($res_technic) == False) {
                    echo "Aucun Document !!";
                } else {
                    foreach ($res_technic as $row) { ?>
                        <div class="col-md-4 col-sm-4  col-lg-3">
                            <div class="profile-widget">
                                <div class="doctor-img">
                                    <a class="avatar" href="">
                                        <img alt="" src="<?php echo base_url() ?>//includes/ext/assets/template/img/res_technic.jpg"></a>
                                </div>
                                <div class="dropdown profile-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Form_edit_res_technic?ID_res_technic=<?php echo $row['ID_res_technic']; ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Employee_Account/Delete_res_technic?ID_res_technic=<?php echo $row['ID_res_technic']; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>Employee_Account/View_res_technic?ID_res_technic=<?php echo $row['ID_res_technic']; ?>">
                                    <h4 class="doctor-name text-ellipsis">
                                        <?php echo $row['Title_res_technic']; ?>
                                </a>
                                </h4>

                                <div class="user-country">
                                    <i style='font-size:16px' class='far'>&#xf02e;</i>
                                    <?php echo $row['Date_res_technic']  ?>


                                </div>
                                <div class="doc-prof" style="color:#009efb">
                                    <a href="<?php echo base_url(); ?>uploads/res_technic/<?php echo $row['File_res_technic'] ?>">Open File</a>
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