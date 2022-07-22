<style>
    .cal-icon:after {
        background: none;
    }
</style>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title"></h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo base_url() ?>/Employee_Account/Training_request_qse" class="btn btn-primary btn-rounded float-right">
                        << Back </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">

                    <form id="risks" action="<?php echo base_url(); ?>Employee_Account/Submit_add_training_group_employee_request/" enctype="multipart/form-data" method="post">
    <div class="row">
        <div class="col-md-6">



            <div class="form-group row">

            </div>


            <div class="form-group row">
                <label class="col-form-label col-md-3">risk</label>
                <div class="col-md-9">
                    <?php if (isset($ID_action_list)) {
                    ?>
                        <input type="hidden" name="ID_training_group_employee_request" value="<?php echo $ID_training_group_employee_request ?>">
                    <?php } ?>

                    <input type="hidden" name="ID_training_group_request" value="<?php echo $ID_training_group_request ?>">


                </div>
            </div>

            <div class="form-group row">
                <select class="form-control floating" name="ID_employee">
                    <?php
                    foreach ($employee_list as $row) {

                        if (isset($ID_employee)) {

                            if ($row['ID_employee'] == $ID_employee) {

                    ?>

                                <option value=<?= $row['ID_employee'] ?> selected><?= $row['Name_employee'] . ' ' . $row['Lastname_employee']  ?></option>

                            <?php } else {
                            ?>

                                <option value=<?= $row['ID_employee'] ?>><?= $row['Name_employee'] . ' ' . $row['Lastname_employee']  ?></option>

                            <?php }
                        } else {
                            ?>
                            <option value=<?= $row['ID_employee'] ?>><?= $row['Name_employee'] . ' ' . $row['Lastname_employee']  ?></option>


                    <?php }
                    }
                    ?>


                </select>
            </div>

        </div>

    </div>
    <div class="text-right">
        <button id="btn_add" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Employee to group</button>
    </div>
</form>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Employee List</h4>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                    if (isset($empty)) {
                                    ?>
                                        <p> Group is Empty !! </p>
                                    <?php } else { ?>

                                        <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Name Employee</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;"></th>



                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php
                                                if (isset($employees)) {

                                                    foreach ($employees as $row) {
                                                ?>
                                                        <tr role="row" class="odd">

                                                            <td class="sorting_1"><?php echo $row['Name_employee'] . ' ' . $row['Lastname_employee'] ?></td>
                                                            <td>
                                                                <a href="<?php echo base_url() ?>/Employee_Account/Delete_training_group_request_ID?ID_employee=<?php echo $row['ID_employee'] ?>&ID_training_group_request=<?php echo $ID_training_group_request ?>">
                                                                    <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                                </a>
                                                            </td>


                                                        </tr>
                                                    <?php
                                                    } ?>
                                            </tbody>
                                        </table>
                                <?php
                                                }
                                            } ?>
                                </div>
                            </div>
                            <div class="row" style="margin-top:2%">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite"> </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                        <!-------------------------------PAGING------------------------------------->

                                        <!----------------------------End PAGING------------------------------------>
                                        <ul class="pagination">
                                            <?php
                                            //   $nb = 0;
                                            for ($i = 1; $i < $nb + 1; $i++) {
                                                /****************** No page selected **************** */
                                                if (!isset($_GET['page'])) {
                                                    if ($i == 1) {
                                            ?>
                                                        <li class="paginate_button page-item active"><a href="?page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <li class="paginate_button page-item"><a href="?page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                                    <?php
                                                    }
                                                }
                                                /************** End No page selected **************** */
                                                /****************** Selected page **************** */
                                                if (isset($_GET['page'])) {
                                                    if ($i == $_GET['page']) {
                                                    ?>
                                                        <li class="paginate_button page-item active"><a href="?page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <li class="paginate_button page-item"><a href="?page=<?php echo $i; ?>" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                            <?php
                                                    }
                                                }
                                                /************** End Selected page **************** */
                                            }

                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  
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


                        $('form#risks').submit();
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