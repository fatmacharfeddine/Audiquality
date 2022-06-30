
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="blog-title"><?php echo $Title_chapter . ' : ' . $Name_chapter ?></h3>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-primary btn-rounded float-right" href="<?php echo base_url(); ?>Employee_Account/Form_add_subject?ID_chapter=<?php echo $ID_chapter ?>"><i class="fa fa-plus"></i> Add Subject</a>
                </div>
            </div>
            </br>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr role="row">
                                <th>Subject</th>
                                <th>Constat</th>
                                <th>Note</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (isset($subject)) {
                                if (isset($empty)) {
                            ?>
                                    <p>No Subjects</p>
                                    <?php  } else {
                                    foreach ($subject as $row) {
                                    ?>
                                        <tr role="row" class="odd">
                                            <td><?php echo $row['Number_subject'] . '. ' . $row['Title_subject']  ?></td>
                                            <td>
                                                <table>

                                                    <?php
                                                    foreach ($question as $row2) {
                                                        if ($row['ID_subject'] == $row2['ID_subject']) {
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $row2['Text_question'] ?></td>

                                                                <td><?php echo $row2['Metaphor_constat'] .': '.$row2['Title_constat'] ?></td>
                                                                <td><?php echo $row2['Value_response'] ?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url() ?>//Employee_Account/Delete_Ligne_processus?ID_Ligne_processus=24&amp;ID_department=103&amp;ID_audit=102&amp;ID_audit_plan=21">
                                                                        <button class="btn btn-primary btn-primary-three float-right" style="width: 38px;"><i class="fa fa-pencil m-r-5"></i></button>
                                                                    </a>
                                                                    </br></br>
                                                                    <a href="<?php echo base_url() ?>/Employee_Account/Delete_constat?ID_chapter=<?php echo $ID_chapter?>&ID_question=<?php echo $row2['ID_question']?>">
                                                                        <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                    <?php }
                                                    } ?>

                                                </table>
                                                <div class="text-center m-t-20">
                                                    <a class="btn btn-primary submit-btn" style="background-color: #55ce63;font-size: 12px;" type="button" href="<?php echo base_url(); ?>Employee_Account/Form_add_constat?ID_chapter=<?php echo $ID_chapter ?>&ID_subject=<?php echo $row['ID_subject'] ?>">
                                                        New Question</a>

                                                </div>
                                            </td>

                                            <td>
                                                <table>

                                                    <?php foreach ($note as $row2) {
                                                        if ($row['ID_subject'] == $row2['ID_subject']) {
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $row2['Text_note'] ?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url() ?>//Employee_Account/Delete_Ligne_processus?ID_Ligne_processus=24&amp;ID_department=103&amp;ID_audit=102&amp;ID_audit_plan=21">
                                                                        <button class="btn btn-primary btn-primary-three float-right" style="width: 38px;"><i class="fa fa-pencil m-r-5"></i></button>
                                                                    </a>
                                                                    </br></br>
                                                                    <a href="<?php echo base_url() ?>//Employee_Account/Delete_Ligne_processus?ID_Ligne_processus=24&amp;ID_department=103&amp;ID_audit=102&amp;ID_audit_plan=21">
                                                                        <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                    <?php }
                                                    } ?>

                                                </table>
                                                <div class="text-center m-t-20">
                                                    <button class="btn btn-primary submit-btn" style="background-color: #ffbc35;font-size: 12px;" type="button">New Note</button>
                                                </div>
                                            </td>
                                            <td><?php echo $row['Value_subject'] ?></td>

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