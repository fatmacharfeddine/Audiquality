<style>
    .form_add_photo {
        height: 50px;
    }
</style>
<script>
    function triggerClick() {
        document.querySelector('#File_organigramme').click();
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

                        <div class="doctor-img">
                            <a class="avatar" href=""><img alt="" src="<?= base_url() ?>/includes/ext/assets/template/img/doc/org.jpg"></a>
                        </div>

                        <h4 class="doctor-name text-ellipsis"><a href="profile.html">Organigramme</a></h4>
                        <?php if (!isset($ID_organigramme)) { ?>

                            <div class="user-country">
                                Aucun Organigramme défini !!
                            </div>
                            <div class="text-center m-t-20">
                                <a href="#" class="btn btn-primary submit-btn" data-toggle="modal" data-target="#add_group">Ajouter Organigramme </a>
                            </div>
                        <?php } else { ?>

                            <div class="text-center m-t-20">

                                <!--a href="#" style="width: 38px;" class="btn btn-primary btn-primary-three" data-toggle="modal" data-target="#add_group"><i class="fa fa-pencil m-r-5"></i> </a-->
                                <a href="<?php echo base_url(); ?>Employee_Account/delete_organigramme?ID_organigramme=<?php echo $ID_organigramme ?>" style="width: 38px;" class="btn btn-primary btn-primary-four"><i class="fa fa-trash-o m-r-5"></i> </a>
                                <br><br>
                                <a class="btn btn-sm btn-primary" target="_blank" href="<?php echo base_url(); ?>Employee_Account/List_organigramme">Organigramme Dynamique</a>
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
                                                <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Submit_add_organigramme" enctype="multipart/form-data" method="post">

                                                    <?php if (isset($ID_organigramme)) { ?>
                                                        <input type="hidden" name="ID_organigramme" Value="<?php echo $ID_organigramme ?>">

                                                    <?php } ?>

                                                    <div class="row">
                                                        <div class="col-md-12">


                                                            <div class="form-group row">
                                                                <label class="col-form-label col-md-3">File</label>
                                                                <div class="col-md-9">
                                                                    <img class="form_add_photo" style="cursor:pointer;" src="<?php echo base_url() ?>/includes/ext/assets/template/img/file.png" value="" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">

                                                                    <!--?php// } else { ?-->

                                                                    <img id="target">
                                                                    <input type="file" accept="image/jpg, image/jpeg, image/png, .doc, .docx, .pdf" id="File_organigramme" name="File_organigramme" onchange="displayImage(this)" style="display:none;">



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

                    </div>
                </div>



            </div>
            <div class="row">
                <?php if (isset($ID_organigramme)) { ?>

                    <embed src="<?php echo base_url() ?>/uploads/organigramme/<?php echo $File_organigramme ?>" width="1100" height="500">

                <?php } ?>
            </div>


        </div>
    </div>