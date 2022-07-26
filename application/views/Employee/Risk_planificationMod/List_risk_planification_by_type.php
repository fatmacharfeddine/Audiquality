<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <h4 class="payslip-title" style="margin-left: 41%;">Liste des planifications </h4>

            </div>
            <?php
            if (isset($exist)) { ?>
                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6" style="text-align: center;text-align: center;border: 1px solid red;    border-radius: 5px;    background-color: #f1d0d0;    padding: 10px;    color: red;">
                        Aucun processus
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>
            <?php   } else { ?>
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
                                                   
                                                </span>
                                            </li>
                                        <?php } else { ?>
                                            <li><a href="<?php echo base_url(); ?>Employee_Account/List_risk_planification_by_type?ID_processus=<?php echo $row['ID_processus'] ?>&processcategory=<?php echo $processcategory ?>"><?= $row['Title_processus'] ?></a></li>

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
                                <a class="btn btn-primary btn-rounded float-right" href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_planification?ID_processus=<?php echo $current_processus ?>&processcategory=<?php echo $processcategory; ?>"><i class="fa fa-plus"></i>Nouvelle planification</a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Planification</th>
                                        <th>Argumentation</th>
                                        <th>Modification</th>
                                        <th> Date</th>
                                        <th> </th>
                                        <th> </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($planification)) {
                                        foreach ($planification as $row) {
                                            // if ($row['ID_processus'] != $current_processus) {
                                    ?>
                                            <tr>
                                                <td><?= $row['Title_risk_planification'] ?></td>


                                                <td>
                                                    <?php echo $row['Argumentation_risk_planification'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['Modification_risk_planification'] ?>
                                                </td>

                                                <td>
                                                    <?php echo $row['Date_risk_planification'] ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url() ?>/Employee_Account/Form_edit_risk_planification?ID_risk_planification=<?php echo $row['ID_risk_planification'] ?>&ID_processus=<?php echo $current_processus ?>&processcategory=<?php echo $processcategory; ?>">
                                                        <button class="btn btn-primary btn-primary-three float-right" style="width: 38px;"><i class="fa fa-pencil m-r-5"></i></button>
                                                    </a>

                                                </td>
                                                <td style="border-color: #b8daff;">
                                                    <a href="<?php echo base_url() ?>/Employee_Account/delete_risk_planification?ID_risk_planification=<?php echo $row['ID_risk_planification'] ?>&ID_processus=<?php echo $current_processus ?>&processcategory=<?php echo $processcategory; ?>" onclick="return confirm('Êtes-vous sûr?');">
                                                        <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                    </a>

                                                </td>



                                    <?php
                                        }
                                    }
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