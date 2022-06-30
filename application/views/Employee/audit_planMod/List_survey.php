<style>
    .form_add_photo {
        height: 50px;
    }
</style>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mission</li>
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

                                    <div class="text-center m-t-20">

                                        <!--------------Table etape---------------->
                                        <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <!--th>Date</th-->
                                                    <th>Title</th>
                                                    <th></th>
                                                    <th>Constat</th>
                                                    <th>Corrective Action</th>
                                                    <th></th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($mission)) {
                                                    if ($mission1 != null) {
                                                        $existstep = array();
                                                        foreach ($mission as $row) {

                                                            foreach ($mission1 as $row2) {

                                                                if ($row['ID_survey'] == $row2['ID_survey']) {
                                                                    array_push($existstep, $row['ID_survey']);
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                //  foreach ($existstep as $row) {
                                                //    echo 'gggg' . $row . 'fff';
                                                //   }

                                                ?>


                                                <?php if (isset($mission)) {
                                                    foreach ($mission as $row) {


                                                ?>

                                                        <tr role="row" class="odd">


                                                            <?php if ($mission1 == null) {
                                                            ?>

                                                            <?php  } else { ?>

                                                                <?php

                                                                if (in_array($row['ID_survey'], $existstep)) {
                                                                    foreach ($mission1 as $row2) {

                                                                        if ($row['ID_survey'] == $row2['ID_survey']) {


                                                                            // foreach($existstep as $row3){
                                                                            //      if (!in_array($row2['ID_survey'], $existstep)) {
                                                                            //   echo $row2['ID_survey'];

                                                                            //break;
                                                                            // if ($row['ID_survey'] != $row2['ID_survey']) {


                                                                            // if (in_array($row2['ID_survey'], $existstep)) {
                                                                            //   echo 'innn';
                                                                            //break; 
                                                                ?>
                                                                            <?php if ($row2['ID_constat'] != 4) { ?>

                                                                                <!--td><?php echo $row['dateSteps']  ?></td-->


                                                                                <td><?php echo $row['Text_survey'] ?> (<?php echo $row['Title_processus'] ?>)
                                                                                    <pre><?php echo $row['ID_Responsable'] ?></pre>
                                                                                </td>
                                                                                <td><?php echo $row2['Text_survey'] ?> </td>
                                                                                <?php if ($row2['ID_constat'] == 1) { ?>
                                                                                    <td colspan="2" class="table-danger"><?php echo $row2['Title_constat'] ?> </td>
                                                                                <?php } ?>
                                                                                <?php if ($row2['ID_constat'] == 2) { ?>
                                                                                    <td colspan="2" class="table-warning"><?php echo $row2['Title_constat'] ?> </td>
                                                                                <?php } ?>
                                                                                <?php if ($row2['ID_constat'] == 3) { ?>
                                                                                    <td colspan="2" class="table-info"><?php echo $row2['Title_constat'] ?> </td>
                                                                                <?php } ?>


                                                                                <?php if ($row2['Corrective_survey'] == "") { ?>
                                                                                    <td>
                                                                                        <center><span class="custom-badge status-grey">Waiting</span></center>
                                                                                    </td>
                                                                                <?php     } else { ?>

                                                                                    <td class="table-success"><?php echo $row2['Corrective_survey'] ?> </td>

                                                                                <?php } ?>
                                                                                <?php if ($row2['Corrective_survey'] == "") { ?>
                                                                                    <td>
                                                                                        <a href="<?php echo base_url(); ?>Employee_Account/Form_fill_survey?ID_survey=<?php echo $row2['ID_survey'] ?>&ID_audit=<?php echo $ID_audit ?>" class="btn btn btn-primary btn-rounded float-right">
                                                                                            <i class="fa fa-window-restore"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                <?php } else {
                                                                                ?>
                                                                                    <td class="table-success"> </td>
                                                                                <?php     }
                                                                                ?>
                                                                            <?php   // }
                                                                            } ?>
                                                                    <?php     }
                                                                    }
                                                                    //       } else {
                                                                    // echo 'ffff';
                                                                    ?>

                                                            <?php
                                                                }
                                                            } ?>



                                                            <!---------->


                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>

                                        <!--------------End Table etape ----------->
                                    </div>

                                </div>


                            </div>
                        </div>


                    </div>

            </div>




        </div>
    </div>
    </div>

    </div>

    </section>
    <!-- //forms -->
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