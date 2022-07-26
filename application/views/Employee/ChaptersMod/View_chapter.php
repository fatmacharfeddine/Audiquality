
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="row">
                <div class="col-md-4">
                    <div class="blog-view">
                        <article class="blog blog-single-post">
                            <h3 class="blog-title"><?php echo $Title_chapter ?></h3>
                            <div class="blog-info clearfix">
                                <div class="post-left">
                                    <ul>
                                        <!--li><a href="#."><i class="fa fa-calendar"></i> <span>December 6, 2017</span></a></li-->
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-image">
                                <a href="#."><img alt="" src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/img/Iso_9001.jpg" class="img-fluid"></a>
                            </div>
                            <div class="blog-content">
                                <p><?php echo $Name_chapter ?></p>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card member-panel" style="height: 89%;">
                        <div class="card-header bg-white">

                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="card-title mb-0">Subjects</h4>
                                </div>
                                <div class="col-md-8">
                                    <a class="btn btn-primary btn-rounded float-right" href="<?php echo base_url(); ?>Employee_Account/Form_add_subject?ID_chapter=<?php echo $ID_chapter ?>"><i class="fa fa-plus"></i> Add Subject</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="contact-list">
                                <?php
                                if (isset($subject)) {
                                    // if (isset($empty)) {
                                ?>
                                    <?php // } else {
                                    foreach ($subject as $row) {
                                    ?>
                                        <li>

                                            <div class="contact-cont">
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="contact-info">
                                                            <span class="contact-name text-ellipsis"><?php echo 'Subject ' . $row['Number_subject']  ?></span>
                                                            <span class="contact-date"><?php echo $row['Title_subject']  ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="<?php echo base_url(); ?>Employee_Account/List_question?ID_subject=<?php echo $row['ID_subject'] ?>&ID_chapter=<?php echo $ID_chapter ?>" class="btn btn-primary float-right">Questions</a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="<?php echo base_url(); ?>Employee_Account/Form_edit_subject?ID_subject=<?php echo $row['ID_subject'] ?>">
                                                            <button class="btn btn-primary btn-primary-three float-right">Update</button>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                    <a href="<?php echo base_url(); ?>Employee_Account/Delete_subject?ID_subject=<?php echo $row['ID_subject'] ?>"  onclick="return confirm('Êtes-vous sûr?');">
                                                    <button class="btn btn-primary btn-primary-four float-right" id="btn_add" type="button" ><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                        </a>
                                                        <!--form id="popup" action="<?php echo base_url(); ?>Employee_Account/Delete_subject?ID_subject=<?php echo $row['ID_subject'] ?>" enctype="multipart/form-data" method="post">
                                                            <button class="btn btn-primary btn-primary-four float-right" id="btn_add" type="button"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                                                        </form-->

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