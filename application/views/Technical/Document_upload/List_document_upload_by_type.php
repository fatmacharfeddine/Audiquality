<!--?php include "/../Header.php"; ?-->

<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <h4 class="payslip-title" style="margin-left: 41%;">Liste des document_uploads </h4>

            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                    <div class="roles-menu">
                        <ul>
                            <?php if (isset($processus)) {
                                foreach ($processus as $row) {
                                    if ($row['ID_processus'] == $current_processus) {
                            ?>

                                        <li class="active">
                                            <a href="javascript:void(0);"><?= $row['Title_processus'] ?></a>
                                            <span class="role-action">
                                                <a href="<?php echo base_url(); ?>Technical_Account/Form_edit_processus?ID_processus=<?php echo $row['ID_processus'] ?>">
                                                    <span class="action-circle large">
                                                        <i class="material-icons">edit</i>
                                                    </span>
                                                </a>
                                                <a href="<?php echo base_url(); ?>Technical_Account/Delete_processus?ID_processus=<?php echo $row['ID_processus'] ?>" data-toggle="modal" data-target="#delete_role">
                                                    <span class="action-circle large delete-btn">
                                                        <i class="material-icons">delete</i>
                                                    </span>
                                                </a>
                                            </span>
                                        </li>
                                    <?php } else { ?>
                                        <li><a href="<?php echo base_url(); ?>Technical_Account/List_document_by_type?ID_processus=<?php echo $row['ID_processus'] ?>&processcategory=<?php echo $processcategory ?>"><?= $row['Title_processus'] ?></a></li>

                            <?php     }
                                }
                            } ?>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
                    <div class="row">
                        <div class="col-sm-8 col-4">
                            <h6 class="card-title m-b-20">Processus : <?php echo $Title_processus ?></h6>
                        </div>
                        <div class="col-sm-4 col-8 text-right m-b-30">
                            <a class="btn btn-primary btn-rounded float-right" href="<?php echo base_url() ?>/Technical_Account/Form_add_document_upload?ID_processus=<?php echo $current_processus ?>&processcategory=<?php echo $processcategory; ?>"><i class="fa fa-plus"></i>Nouveau document_upload</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">Uploaded Documents</h4>
                            <!--a href="appointments.html" class="btn btn-primary float-right">View all</!--a-->
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Name Document</th>

                                        <th>Type</th>
                                        <th>Code</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (($document_upload) != false) {
                                        foreach ($document_upload as $row) {
                                            // if ($row['ID_processus'] != $current_processus) {
                                    ?>
                                            <tr>
                                                <td><?= $row['Name_document_upload'] ?></td>


                                                <td><?= $row['ID_doc'] ?></td>
                                                <td><?= $row['ID_link_document_upload'] ?></td>
                                                <td style="border-color: #b8daff;">
                                                 

                                                    <a href="<?php echo base_url() ?>/Technical_Account/Form_edit_document_upload?ID_document_upload=<?php echo $row['ID_document_upload'] ?>&ID_processus=<?php echo $current_processus ?>&processcategory=<?php echo $processcategory; ?>">
                                                        <button class="btn btn-primary btn-primary-three float-right" style="width: 38px;"><i class="fa fa-pencil m-r-5"></i></button>
                                                    </a>
                                                    <a href="<?php echo base_url() ?>/Technical_Account/delete_document_upload?ID_document_upload=<?php echo $row['ID_document_upload'] ?>&ID_processus=<?php echo $current_processus ?>&processcategory=<?php echo $processcategory; ?>">
                                                        <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                    </a>
                                                    <a href="<?php echo base_url() ?>/Technical_Account/view_document_upload?ID_document_upload=<?php echo $row['ID_document_upload'] ?>&ID_processus=<?php echo $current_processus ?>&processcategory=<?php echo $processcategory; ?>">
                                                        <button class="btn btn-primary btn-primary-four float-right" style="width: 38px; border: 1px solid #008cff;"><i class="fa fa-eye m-r-5"></i></button>
                                                    </a>
                                                </td>



                                        <?php
                                        }
                                    } else {
                                        echo "there are no documents for this processus !! ";
                                    }



                                        ?>


                                            </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">Generated Documents</h4>
                            <!--a href="appointments.html" class="btn btn-primary float-right">View all</!--a-->
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Name Document</th>

                                        <th>Type</th>
                                        <th>Code</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (($document_entete) != false) {
                                        foreach ($document_entete as $row) {
                                            // if ($row['ID_processus'] != $current_processus) {
                                    ?>
                                            <tr>
                                                <td><?= $row['Title_entete'] ?></td>


                                                <td><?= $row['ID_doc'] ?></td>
                                                <td></td>
                                                <td style="border-color: #b8daff;">

                                                    <a href="<?php echo base_url() ?>/Technical_Account/view_document_entete?ID_entete=<?php echo $row['ID_entete'] ?>&ID_processus=<?php echo $current_processus ?>&processcategory=<?php echo $processcategory; ?>">
                                                        <button class="btn btn-primary btn-primary-four float-right" style="width: 38px; border: 1px solid #008cff;"><i class="fa fa-eye m-r-5"></i></button>
                                                    </a>

                                                </td>



                                        <?php
                                        }
                                    } else {
                                        echo "there are no documents for this processus !! ";
                                    }



                                        ?>


                                            </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>

    <!--?php include "/../Footer.php"; ?-->


    <script>
        function triggerClick() {
            document.querySelector('#File_training_evaluation_emp').click();
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