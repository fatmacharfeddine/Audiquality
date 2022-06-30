<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <h4 class="payslip-title" style="margin-left: 41%;">Interaction des Processus</h4>

            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                    <a href="<?php echo base_url(); ?>Employee_Account/View_matrix" class="btn btn-primary btn-block">Afficher Matrix </a>
                    <div class="roles-menu">
                        <ul>
                            <?php if (isset($processus)) {
                                foreach ($processus as $row) {
                                    if ($row['ID_processus'] == $current_processus) {
                            ?>

                                        <li class="active">
                                            <a href="javascript:void(0);"><?= $row['Title_processus'] ?></a>
                                            <span class="role-action">
                                                <a href="<?php echo base_url(); ?>Employee_Account/Form_edit_processus?ID_processus=<?php echo $row['ID_processus'] ?>">
                                                    <span class="action-circle large">
                                                        <i class="material-icons">edit</i>
                                                    </span>
                                                </a>
                                                <a href="<?php echo base_url(); ?>Employee_Account/Delete_processus?ID_processus=<?php echo $row['ID_processus'] ?>" data-toggle="modal" data-target="#delete_role">
                                                    <span class="action-circle large delete-btn">
                                                        <i class="material-icons">delete</i>
                                                    </span>
                                                </a>
                                            </span>
                                        </li>
                                    <?php } else { ?>
                                        <li><a href="<?php echo base_url(); ?>Employee_Account/List_Processus_matrix?ID_processus=<?php echo $row['ID_processus'] ?>"><?= $row['Title_processus'] ?></a></li>

                            <?php     }
                                }
                            } ?>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
                    <h6 class="card-title m-b-20">Processus : <?php echo $Title_processus ?></h6>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Prcessus</th>
                                    <th class="text-center"></th>
                                    <th></th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($processus)) {
                                    foreach ($processus as $row) {
                                        if ($row['ID_processus'] != $current_processus) {
                                ?>
                                            <tr>
                                                <td><?= $row['Title_processus'] ?></td>

                                                <?php
                                                $exist = 0;
                                                if (isset($current_processus_interaction)) {
                                                    //echo 'heeeeey';
                                                    foreach ($current_processus_interaction as $rowinteraction) {
                                                        //echo 'hi';

                                                        if ($current_processus == $rowinteraction['ID_processus']) {
                                                            $exist = 1;
                                                            if ($rowinteraction['ID_processus_interaction'] == $row['ID_processus']) {

                                                ?>
                                                                <td>
                                                                    <?php echo $rowinteraction['Text_interaction'] ?>
                                                                </td>

                                                                <td style="border-color: #b8daff;">

                                                                    <a href="<?php echo base_url() ?>/Employee_Account/Delete_interaction?ID_interaction=<?php echo $rowinteraction['ID_interaction'] ?>&ID_processus=<?php echo $current_processus ?>">
                                                                        <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                                    </a>

                                                                </td>

                                                            <?php break;
                                                            } else {
                                                                $exist = 0
                                                            ?>

                                                        <?php  //}
                                                                //        }
                                                            }
                                                        }
                                                    }
                                                    if ($exist == 0) { ?>
                                                        <td colspan="2">
                                                            <a href="<?php echo base_url() ?>/Employee_Account/Form_add_interaction?ID_processus=<?= $current_processus ?>&ID_processus_interaction=<?= $row['ID_processus'] ?>">
                                                                <button class="btn btn-primary btn-primary-two" style="width: auto;"> + Ajout Interaction </button>
                                                            </a>
                                                        </td>
                                                <?php

                                                    }
                                                } ?>


                                            </tr>
                                <?php
                                        }
                                    }
                                } ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>