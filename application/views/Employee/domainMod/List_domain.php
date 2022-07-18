<style>
    .form_add_photo {
        height: 50px;
    }
</style>
<script>
    function triggerClick() {
        document.querySelector('#file_domain').click();
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
                <div class="col-sm-12 col-12">
                    <center>

                        <h4 class="page-title">
                        </h4>
                    </center>
                </div>
                <div class="col-md-12 col-sm-12  col-lg-12">
                    <div class="profile-widget">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="chat-avatar">
                                    <a href="profile.html" class="avatar">
                                        <img src="<?= base_url() ?>/uploads/Company/<?php echo $Logo_company ?>" class="img-fluid rounded-circle">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <h5 style="text-align: left;margin-top: 1%;">Brain Soft</h5>

                            </div>
                        </div>
                        <div class="doctor-img">
                            <a class="avatar" href=""><img alt="" src="<?= base_url() ?>/includes/ext/assets/template/img/Domaine/domain.png"></a>
                        </div>

                        <h4 class="doctor-name text-ellipsis"><a href="profile.html">Domaine d'Application</a></h4>
                        <?php if (isset($ID_domain)) {
                        ?>

                            <!-- <div class="doc-prof" style="color:#009efb">
                                <a href="<?php echo base_url(); ?>uploads/Domain/<?php echo $file_domain ?>">Open File</a>
                            </div> -->
                            <div class="user-country">
                                <?php echo $name_domain ?>
                            </div>

                            <div class="text-center m-t-20">

                                <!-- <a href="#" style="width: 38px;" class="btn btn-primary btn-primary-three" data-toggle="modal" data-target="#add_group"><i class="fa fa-pencil m-r-5"></i> </a> -->
                                <a href="<?php echo base_url() ?>/Employee_Account/delete_domaine?ID_domain=<?php echo $ID_domain ?>" style="width: 38px;" class="btn btn-primary btn-primary-four"><i class="fa fa-trash-o m-r-5"></i> </a>

                            </div>
                        <?php    } else { ?>
                            <div class="user-country">
                                Aucun domaine défini !!
                            </div>
                            <div class="text-center m-t-20">
                                <a href="#" class="btn btn-primary submit-btn" data-toggle="modal" data-target="#add_group">Definir Domaine </a>
                            </div>
                        <?php } ?>
                        <!------------------------------ pop-up ------------------------------->
                        <div class="modal fade" id="add_group" role="dialog">
                            <div class="modal-dialog">

                                <div class="modal-content">
                                    <div class="row">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>
                                        <div class="col-md-12">
                                            <div class="card-box">
                                                <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Submit_add_domain" enctype="multipart/form-data" method="post">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <?php if (isset($ID_domain)) {
                                                            ?>
                                                                <input type="hidden" name="ID_domain" value="<?php if (isset($ID_domain)) {
                                                                                                                    echo $ID_domain;
                                                                                                                } ?>">
                                                            <?php } ?>
                                                            <div class="form-group">
                                                                <label>Nom domaine</label>
                                                                <input class="form-control" type="text" name="name_domain" value="<?php if (isset($ID_domain)) {
                                                                                                                                        echo $name_domain;
                                                                                                                                    } ?>">
                                                            </div>
                                                            <input class="form-control" type="hidden" name="ID_company" value="<?php if (isset($ID_domain)) {
                                                                                                                                    echo $ID_company;
                                                                                                                                } ?>">

                                                            <div class="form-group row">
                                                                <label class="col-form-label col-md-3">File</label>
                                                                <div class="col-md-9">
                                                                    <img src="<?= base_url() ?>/includes/ext/assets/template/img/file.png" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="" style="  text-align:center;  width: 50px; height: 50px;border: 2px solid #d1cfcf;padding: 2px;">

                                                                    <img id="target" />
                                                                    <input type="file" accept="image/jpg, image/jpeg, image/png" id="file_domain" name="file_domain" onchange="displayImage(this)" style="display:none;  text-align:center;  width: 50px; height: 50px;border: 2px solid #d1cfcf;padding: 2px;"> </input>

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
                        <!------------------------------ pop-up update------------------------------->
                        <div class="modal fade" id="add_group1" role="dialog">
                            <div class="modal-dialog">

                                <div class="modal-content">
                                    <div class="row">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>
                                        <div class="col-md-12">
                                            <div class="card-box">
                                                <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Submit_add_domain" enctype="multipart/form-data" method="post">
                                                    <div class="row">
                                                        <?php if (isset($ID_domain)) {
                                                        ?>
                                                            <input type="hidden" name="ID_domain" value="<?php echo $ID_domain ?>">

                                                            <div class="col-md-12">

                                                                <div class="form-group">
                                                                    <label>Nom domaine</label>

                                                                    <input class="form-control" type="text" name="name_domain" value="<?= $name_domain ?>">
                                                                </div>
                                                                <input class="form-control" type="hidden" name="ID_company" value="<?php echo $ID_company ?>">

                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-md-3">File</label>
                                                                    <div class="col-md-9">
                                                                        <img src="<?= base_url() ?>/uploads/Domain/<?php echo $file_domain ?>" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="" style="  text-align:center;  width: 50px; height: 50px;border: 2px solid #d1cfcf;padding: 2px;">

                                                                        <img id="target" />
                                                                        <input type="file" accept="image/jpg, image/jpeg, image/png" id="file_domain" name="file_domain" onchange="displayImage(this)" style="display:none;  text-align:center;  width: 50px; height: 50px;border: 2px solid #d1cfcf;padding: 2px;"> </input>

                                                                    </div>
                                                                </div>
                                                            </div>


                                                    </div>
                                                <?php } ?>
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
                <?php if ((isset($file_domain)) && ($file_domain != null)) {  ?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="text-align: center;">
                                <embed src="<?php echo base_url() ?>/uploads/Domain/<?php echo $file_domain ?>" width="480" height="500">
                            </div>
                        </div>
                    </div>
                <?php } ?>
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