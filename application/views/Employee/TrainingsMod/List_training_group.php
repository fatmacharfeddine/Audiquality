
<body>


    <div class="page-wrapper" style="min-height: 314px;">


        <div class="content">


            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">Training Groups</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="d-none">
                                        <tr>
                                            <th>Training Group</th>
                                            <th class="text-right">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($group)) {
                                            if (isset($empty)) {
                                        ?>
                                                <?php } else {
                                                foreach ($group as $row) {
                                                ?>



                                                    <tr>
                                                        <td>
                                                            <h2><?php echo $row['Name_training_group'] ?></h2>
                                                        </td>

                                                        <td class="text-right">
                                                            <a href="<?php echo base_url() ?>Employee_Account/List_training_group?ID_training_group=<?php echo $row['ID_training_group'] ?> " class="btn btn-outline-primary take-btn">List Employees</a>
                                                        </td>
                                                    </tr>
                                        <?php }
                                            }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="card member-panel">
                        <div class="card-header bg-white">
                            <h4 class="card-title mb-0">List Employees</h4>
                        </div>
                        <div class="card-body">
                            <ul class="contact-list">
                                <?php if (!isset($employees)) { ?>
                                    <p> Please select group </p>

                                    <?php } else {
                                    if ($employees == Null) { ?>
                                        <p> No Employees in this group</p>

                                        <?php  } else {
                                        foreach ($employees as $row) { ?>
                                            <li>
                                                <div class="contact-cont">

                                                    <div class="contact-info">
                                                        <span class="contact-name text-ellipsis"><?php echo $row['Name_employee']  . ' ' . $row['Lastname_employee'] ?></span>
                                                        <span class="contact-date">MBBS, MD</span>
                                                    </div>
                                                </div>
                                            </li>
                                <?php }
                                    }
                                } ?>
                            </ul>
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