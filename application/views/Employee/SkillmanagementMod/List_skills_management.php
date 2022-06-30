<script src="<?php echo base_url(); ?>includes/js/sweetalert.js"></script>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">


                <div class="col-md-12">
                    <div class="card member-panel" style="height: 89%;">
                        <div class="card-header bg-white">

                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="page-title">List of Skills for position 
                                     <br>   
                                     <br>   
                                    <span class="blog-author-name"> "<?php echo $Name_post ?>"</span></h4>

                                </div>
                                <?php if (isset($noadd)){ ?>
                                <div class="col-md-8">
                                    <a style="opacity: 0.7;color: white;" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Skill</a>
                                </div>
                                <?php }else { ?>
                                <div class="col-md-8">
                                    <a class="btn btn-primary btn-rounded float-right" href="<?php echo base_url(); ?>Employee_Account/Form_add_skill_management?ID_post=<?php echo $ID_post ?>" ><i class="fa fa-plus"></i> Add Skill</a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php  if (isset($empty)) { ?>
<p style="text-align:center">no data !!</p>
                        <?php } else if (isset($skills_management)) { ?>
                        <div class="card-body">
                            <ul class="contact-list">
                               
                                    <?php // } else {
                                    $count = 0;
                                    foreach ($skills_management as $row) {
                                        $count = $count + 1;
                                    ?>
                                        <li>

                                            <div class="contact-cont">
                                                <div class="row">
                                                    <div class="col-md-8">

                                                        <div class="contact-info">
                                                            <span class="contact-name text-ellipsis"><?php echo 'Skill ' . $count  ?></span>
                                                            <span class="contact-date"><?php echo $row['Name_skill']  ?> || Weight : <?php echo $row['Weight_skill'] ?> </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="<?php echo base_url(); ?>Employee_Account/Form_edit_skill_management?ID_management=<?php echo $row['ID_management'] ?>">
                                                            <button class="btn btn-primary btn-primary-three float-right">Update</button>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <form id="popup" action="Employee_Account/Delete_skill_management?ID_management=<?php echo $row['ID_management'] ?>" enctype="multipart/form-data" method="get">
                                                            <button class="btn btn-primary btn-primary-four float-right" id="btn_add" type="button">Delete</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                <?php //}
                                    }
                                 ?>

                            </ul>
                        </div>
                            <?php } ?>

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


