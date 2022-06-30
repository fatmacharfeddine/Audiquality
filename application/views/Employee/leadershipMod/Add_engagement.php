<style>
    .form_add_photo {
        height: 50px;
    }
</style>
<meta charset="utf-8">
<title>Bootstrap</title>
<link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="<?php echo base_url(); ?>/includes/summernote/summernote-bs4.css" rel="stylesheet">

<script>
    function triggerClick() {
        document.querySelector('#Photo_processus').click();
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
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">audits</li>
                    </ol>
                </nav>
                <!-- //breadcrumbs -->
                <!-- forms -->
                <section class="forms">
                    <!-- forms 1 -->

                    <div class="content">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/Submit_add_engagement" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <?php if (isset($ID_engagement)) { ?>
                                                        <input type="hidden" name="ID_engagement" value="<?php echo $ID_engagement ?>">
                                                    <?php } ?>
                                                    <!----------------titre processus------------------->

                                                    <div class="form-group">
                                                        <label class="col-form-label col-md-12">Titre Document</label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="Title_engagement">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!----------------Moyens nécessaires au fonctionnement du processus------------------->
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="col-form-label col-md-12">Contenu Document</label>
                                                        <textarea cols="30" rows="10" class="form-control" name="Content_engagement" id="summernote"></textarea>
                                                    </div>


                                                </div>



                                                <div class="text-right">
                                                    <button id="btn_add" type="button" class="btn btn-primary">Confirm</button>
                                                </div>
                                    </form>


                                </div>
                            </div>
                        </div>

                    </div>

                </section>
                <!-- //forms -->
            </div>
        </div>
    </div>


    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/includes/summernote/summernote-bs4.js"></script>
    <script>
        $('#summernote').summernote();
    </script>
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


                        $('form#audits').submit();
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
        function populate(ID_department, post) {



            var jArray = <?php echo json_encode($phpArray); ?>;
            var jArrayname = <?php echo json_encode($phpArrayname); ?>;




            var ID_department = document.getElementById(ID_department);
            var post = document.getElementById(post);
            post.innerHTML = "";
            for (var i = 0; i < jArray.length; i++) {
                if (jArray[i] == ID_department.value) {
                    var name = jArrayname[i];

                    var optionArray = ["name|".name];
                }
                alert(jArrayname[i]);
            }

            for (var option in optionArray) {
                var pair = optionArray[option].split("|");
                var newOption = document.createElement("option");
                newOption.value = pair[0];
                newOption.innerHTML = pair[1];
                post.options.add(newOption);
            }
        }
    </script>