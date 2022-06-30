<!--?php include "/../Header.php"; ?-->
<style>
    .form_add_photo {
        height: 50px;
    }
</style>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<body>

    <!--?php include "/../Menu.php"; ?-->

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

                                    <!--div class="row">
                                        <div class="col-md-12">
                                            <div class="m-b-30">
                                                <div class="experience-box">
                                                    <ul class="experience-list">
                                                        <?php if (isset($empty)) {
                                                        ?>
                                                            <p style="text-align: center;   padding: 5%;    font-size: 30px;">No information save </p>
                                                        <?php } ?>
                                                        <?php if (isset($checksurvey)) {
                                                            foreach ($checksurvey as $row) {
                                                        ?>
                                                                <li>
                                                                    <div class="experience-user">
                                                                        <div class="before-circle"></div>
                                                                    </div>
                                                                    <div class="experience-content">
                                                                        <div class="timeline-content">

                                                                            <input type="hidden" value="<?php echo $row['ID_survey']; ?>">
                                                                            <a href="#/" class="name"><?php echo $row['Cheklist_survey']; ?> </a>
                                                                            <div style="padding-top: 1%; padding-left: 2%;">
                                                                                <a href="<?php echo base_url(); ?>Employee_Account/Add_Libelle?ID_survey=<?php echo $row['ID_survey'] ?>&ID_audit=<?php echo $row['ID_audit'] ?>">
                                                                                    <i style='font-size:28px' class='fas'>&#xf144;</i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                        <?php       }
                                                        }  ?>
                                                    </ul>

                                                </div>
                                            </div>

                                        </div>
                                    </div-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <?php
                                                            if (isset($empty)) {
                                                            ?>
                                                                <p> Action List is Empty !! </p>
                                                            <?php } else { ?>

                                                                <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                                    <thead>
                                                                        <tr role="row">
                                                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Process</th>
                                                                            <th>Checklist</th>

                                                                            <th colspan="2">Synthesis</th>
                                                                            <th></th>


                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>


                                                                        <?php
                                                                        if (isset($checksurvey)) {

                                                                            foreach ($checksurvey as $row) {
                                                                        ?>
                                                                                <tr role="row" class="odd">
                                                                                    <input type="hidden" value="<?php echo $row['ID_survey']; ?>">

                                                                                    <td class="sorting_1"><?php echo $row['Title_processus'] ?></td>
                                                                                    <td><?php echo $row['Cheklist_survey'] ?></td>
                                                                                    <?php if ($row['ID_constat'] == 0) { ?>
                                                                                        <td colspan="2" >
                                                                                            <center><span class="custom-badge status-grey">Waiting</span></center>
                                                                                        </td>
                                                                                    <?php     } else { ?>

                                                                                        <td><?php echo $row['Text_survey'] ?> </td>
                                                                                        <?php if ($row['ID_constat'] == 1) { ?>
                                                                                            <td colspan ="2" class="table-danger"><?php echo $row['Title_constat'] ?> </td>
                                                                                        <?php } ?>
                                                                                        <?php if ($row['ID_constat'] == 2) { ?>
                                                                                            <td  colspan ="2" class="table-warning"><?php echo $row['Title_constat'] ?> </td>
                                                                                        <?php } ?>
                                                                                        <?php if ($row['ID_constat'] == 3) { ?>
                                                                                            <td colspan ="2" class="table-success"><?php echo $row['Title_constat'] ?> </td>
                                                                                        <?php } ?>
                                                                                    <?php } ?>
                                                                                    <?php if ($row['ID_constat'] == 0) { ?>
                                                                                        <td>
                                                                                            <a href="<?php echo base_url(); ?>Employee_Account/Add_Libelle?ID_survey=<?php echo $row['ID_survey'] ?>&ID_audit=<?php echo $row['ID_audit'] ?>" class="btn btn btn-primary btn-rounded float-right">
                                                                                                <i class="fa fa-window-restore"></i>
                                                                                            </a>
                                                                                        </td>
                                                                                    <?php } else {
                                                                                    ?>
                                                                                        
                                                                                    <?php     }
                                                                                    ?>

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


    <!--?php include "/../Footer.php"; ?-->

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