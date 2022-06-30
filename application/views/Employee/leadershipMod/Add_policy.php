<style>
    .form_add_photo {
        height: 50px;
    }
</style>
<script>
    function triggerClick() {
        document.querySelector('#File_policy').click();
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

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-white" onclick="printDiv('printMe')"><i class="fa fa-print fa-lg"></i> Print</button>
                </div>
                <div class="col-sm-12 col-12" style="text-align: center;">
                    <h4 class="page-title">Politique</h4>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12 col-12">
                    <center>

                        <h4 class="page-title">
                        </h4>
                    </center>
                </div>
                <div class="col-6 col-md-6 col-lg-6 col-xl-6" id="printMe">
                    <div class="card">
                        <div class="row" style="margin-left: 40%;">
                            
                        </div>
                        <div class="content">
                            <div class="card-body" style="text-align: center;">

                                <h3 class="blog-title" style="text-align: center;">Axes de la politique</h3>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="#" data-toggle="modal" data-target="#axe" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i>Ajouter Axe </a>
                                    </div>

                                    <div class="col-sm-12" style="margin-top:2%">
                                        <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">

                                            <tbody>
                                                <?php if (($axe) != null) {
                                                    foreach ($axe as $row) {
                                                ?>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"><?= $row['Name_policy_axe']; ?></td>

                                                            <td class="text-right">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="<?= base_url() ?>/Employee_Account/Delete_policy_axe?ID_policy_axe=<?= $row['ID_policy_axe'] ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>


                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="profile-widget">

                        <div class="doctor-img">
                            <a class="avatar" href=""><img alt="" src="<?= base_url() ?>/includes/ext/assets/template/img/doc/politique.jpg"></a>
                        </div>

                        <h4 class="doctor-name text-ellipsis"><a href="profile.html">Politique</a></h4>
                        <?php if (!isset($ID_policy)) { ?>

                            <div class="user-country">
                                Aucun Politique définie !!
                            </div>
                            <div class="text-center m-t-20">
                                <a href="#" class="btn btn-primary submit-btn" data-toggle="modal" data-target="#add_group">Ajouter Politique </a>
                            </div>
                        <?php } else { ?>

                            <div class="text-center m-t-20">

                                <!--a href="#" style="width: 38px;" class="btn btn-primary btn-primary-three" data-toggle="modal" data-target="#add_group"><i class="fa fa-pencil m-r-5"></i> </a-->
                                <a href="<?php echo base_url(); ?>Employee_Account/delete_policy?ID_policy=<?php echo $ID_policy ?>" style="width: 38px;" class="btn btn-primary btn-primary-four"><i class="fa fa-trash-o m-r-5"></i> </a>

                            </div>
                        <?php } ?>
                        <br>
                        <div class="row">

                            <?php if (isset($ID_policy)) { ?>

                                <embed src="<?php echo base_url() ?>/uploads/Policy/<?php echo $File_policy ?>" width="1100" height="500">

                            <?php } ?>
                        </div>
                        <!------------------------------ pop-up ------------------------------->
                        <div class="modal fade" id="add_group" role="dialog">
                            <div class="modal-dialog">

                                <div class="modal-content">
                                    <div class="row">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>
                                        <div class="col-md-12">
                                            <div class="card-box">
                                                <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Submit_add_policy" enctype="multipart/form-data" method="post">

                                                    <?php if (isset($ID_policy)) { ?>
                                                        <input type="hidden" name="ID_policy" Value="<?php echo $ID_policy ?>">

                                                    <?php } ?>

                                                    <div class="row">
                                                        <div class="col-md-12">


                                                            <div class="form-group row">
                                                                <label class="col-form-label col-md-3">File</label>
                                                                <div class="col-md-9">
                                                                    <img class="form_add_photo" style="cursor:pointer;" src="<?php echo base_url() ?>/includes/ext/assets/template/img/file.png" value="" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">

                                                                    <!--?php// } else { ?-->

                                                                    <img id="target">
                                                                    <input type="file" accept="image/jpg, image/jpeg, image/png, .doc, .docx, .pdf" id="File_policy" name="File_policy" onchange="displayImage(this)" style="display:none;">



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

                        <!------------------------------ pop-up ------------------------------->
                        <div class="modal fade" id="axe" role="dialog">
                            <div class="modal-dialog">

                                <div class="modal-content">
                                    <div class="row">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>
                                        <div class="col-md-12">
                                            <div class="card-box">
                                                <form enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Submit_add_policy_axe" enctype="multipart/form-data" method="post">

                                                    <?php if (isset($ID_policy)) { ?>
                                                        <!--input type="hidden" name="ID_policy" Value="<?php echo $ID_policy ?>"-->

                                                    <?php } ?>

                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <div class="form-group row">
                                                                <label class="col-form-label col-md-3">Axe Politique</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" name="Name_policy_axe" value="<?php if (isset($Name_policy_axe)) {
                                                                                                                            echo $Name_policy_axe;
                                                                                                                        } ?>" placeholder="Axe" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary">Confirm</button>
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