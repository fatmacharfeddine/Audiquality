<style>
    .form_add_photo {
        height: 50px;
    }
</style>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

    }
</script>
<script>
    function triggerClick() {
        document.querySelector('#File_engagement').click();
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
                    <h4 class="page-title">ENGAGEMENT DE LA DIRECTION</h4>
                </div>

            </div>
            <div class="row">
                <?php if (($Title_engagement) != "") { ?>

                    <div class="col-6 col-md-6 col-lg-6 col-xl-6" id="printMe">
                        <div class="card">
                            <div class="row" style="margin-left: 40%;">
                                <div class="text-center m-t-20">
                                    <a href="<?php echo base_url() ?>/Employee_Account/delete_engagement?ID_engagement=<?php echo $ID_engagement ?><?php if (($File_engagement) != '') {
                                                                                                                                                        echo "&file=1";
                                                                                                                                                    } ?>" style="width: 38px;" class="btn btn-primary btn-primary-four"><i class="fa fa-trash-o m-r-5"></i> </a>

                                </div>
                            </div>
                            <div class="content">
                                <div class="card-body" style="text-align: center;">

                                    <h3 class="blog-title" style="text-align: center;"><?php echo $Title_engagement ?></h3>
                                </div>
                                <div class="card-body">
                                    <?php echo $Content_engagement ?>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php } else { ?>

                    <div class="col-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body" style="text-align: center;">
                                <a class="btn btn-sm btn-primary" target="_blank" href="<?php echo base_url() ?>Employee_Account/Form_add_engagement<?php if (isset($ID_engagement)) {
                                                                                                                                                        echo "?ID_engagement=" . $ID_engagement;
                                                                                                                                                    } ?>">Utiliser un modèle</a>

                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (($File_engagement) != "") { ?>

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="text-center m-t-20">
                                <a href="<?php echo base_url() ?>/Employee_Account/delete_engagement?ID_engagement=<?php echo $ID_engagement ?><?php if (($Title_engagement) != '') {
                                                                                                                                                    echo "&title=1";
                                                                                                                                                } ?>" style=" width: 38px;" class="btn btn-primary btn-primary-four"><i class="fa fa-trash-o m-r-5"></i> </a>
                            </div>
                            <div class="card-body" style="text-align: center;">
                                <embed src="<?php echo base_url() ?>/uploads/Engagement/<?php echo $File_engagement ?>" width="480" height="500">
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body" style="text-align: center;">
                                <a class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#upload" style="background-color:#565656 ;border: black solid 1.8px;color: white;">Télécharger Fichier</a>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>


        </div>
    </div>
    </div>
    <!------------------------------ pop-up ------------------------------->
    <div class="modal fade" id="upload" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="row">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>
                    <div class="col-md-12">
                        <div class="card-box">
                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Submit_add_engagement_file" enctype="multipart/form-data" method="post">

                                <?php if (isset($ID_engagement)) { ?>
                                    <input type="hidden" name="ID_engagement" Value="<?php echo $ID_engagement ?>">

                                <?php } ?>

                                <div class="row">
                                    <div class="col-md-12">


                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3">File</label>
                                            <div class="col-md-9">
                                                <img class="form_add_photo" style="cursor:pointer;" src="<?php echo base_url() ?>/includes/ext/assets/template/img/file.png" value="" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="">

                                                <!--?php// } else { ?-->

                                                <img id="target">
                                                <input type="file" accept=".pdf" id="File_engagement" name="File_engagement" onchange="displayImage(this)" style="display:none;">



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

<script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;

        }
    </script>