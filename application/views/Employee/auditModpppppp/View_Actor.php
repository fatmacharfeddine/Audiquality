<!--?php include "/../Header.php"; ?-->

<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="row">
               

                <div class="col-md-12">
                    <div class="card member-panel" style="height: 89%;">
                        <div class="card-header bg-white">

                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="card-title mb-0">Actors</h4>
                                </div>
                                <div class="col-md-8">
                                    <a class="btn btn-primary btn-rounded float-right" href="<?php echo base_url(); ?>Employee_Account/Form_add_actor?ID_team=<?php echo $ID_team ?>"><i class="fa fa-plus"></i> Add Actor</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="contact-list">
                                <?php
                                if (isset($listactor)) {
                                    // if (isset($empty)) {
                                ?>
                                    <?php // } else {
                                    foreach ($listactor as $row) {
                                    ?>
                                        <li>

                                            <div class="contact-cont">
                                                <div class="row">
                                                    <div class="col-md-8">

                                                        <div class="contact-info">
                                                            <span class="contact-name text-ellipsis"><?php echo $row['Name_employee'] . " ". $row['Lastname_employee']  ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                       
                                                    </div>
                                                    <div class="col-md-2">

                                                        <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Delete_actor?ID_actor=<?php echo $row['ID_actor'] ?>&ID_team=<?php echo $row['ID_team'] ?>" enctype="multipart/form-data" method="post">
                                                            <button class="btn btn-primary btn-primary-four float-right" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                <?php //}
                                    }
                                } ?>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--?php include "/../Footer.php"; ?-->
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