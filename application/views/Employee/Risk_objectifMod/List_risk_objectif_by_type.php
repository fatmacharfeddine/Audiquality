<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <h4 class="payslip-title" style="margin-left: 41%;">Liste des Objectifs </h4>

            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                    <div class="roles-menu">
                        <ul>
                            <?php
                            if(isset($exist)){
                                echo "auccun processus";
                            }else{
                            if (isset($processus)) {
                                foreach ($processus as $row) {
                                    if ($row['ID_processus'] == $current_processus) {
                            ?>

                                        <li class="active">
                                            <a href="javascript:void(0);"><?= $row['Title_processus'] ?></a>
                                            <span class="role-action">
                                                
                                               
                                            </span>
                                        </li>
                                    <?php } else { ?>
                                        <li><a href="<?php echo base_url(); ?>Employee_Account/List_risk_objectif_by_type?ID_processus=<?php echo $row['ID_processus'] ?>&processcategory=<?php echo $processcategory ?>"><?= $row['Title_processus'] ?></a></li>

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
                            <a class="btn btn-primary btn-rounded float-right" href="<?php echo base_url() ?>/Employee_Account/Form_add_risk_objectif?ID_processus=<?php echo $current_processus ?>&processcategory=<?php echo $processcategory; ?>"><i class="fa fa-plus"></i>Nouveau Objectif</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Objectifs</th>
                                    <th>Indicateur</th>
                                    <th> Date</th>
                                    <th> Méthode de Calcul</th>
                                    <th> Valeur Cible</th>
                                    <th> Fréquence de Suivi</th>
                                    <th> Valeurs atteintes</th>



                                    <th> </th>
                                    <th> </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($objectif)) {
                                    foreach ($objectif as $row) {
                                        // if ($row['ID_processus'] != $current_processus) {
                                ?>
                                        <tr>
                                            <td><?= $row['Title_risk_objectif'] ?></td>


                                            <td>
                                                <?php echo $row['Action_risk_objectif'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['Date_risk_objectif'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['Action_risk_objectif'] ?>
                                            </td>
                                            <td>
                                                <p style="background-color: red;color: white;padding: 10px;border-radius: 8px;"> <?php echo $row['Cible_risk_objectif'] . " %" ?> </p>
                                            </td>
                                            <td>
                                                <?php if ($row['Frequence_risk_objectif'] == 1) {
                                                    echo "trimestriel";
                                                }
                                                if ($row['Frequence_risk_objectif'] == 2) {
                                                    echo "semestriel";
                                                }
                                                if ($row['Frequence_risk_objectif'] == 3) {
                                                    echo "annuel";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($row['Frequence_risk_objectif'] == 1) { ?>
                                                    <table>
                                                        <tr>
                                                            <th colspan="3"> Trimestre </th>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo $row['Taux_risk_objectif1'] . " %" ?></td>
                                                            <td><?php echo $row['Taux_risk_objectif2'] . " %" ?></td>
                                                            <td><?php echo $row['Taux_risk_objectif3'] . " %" ?></td>

                                                        </tr>
                                                    </table>
                                                <?php } ?>
                                                <?php if ($row['Frequence_risk_objectif'] == 2) { ?>
                                                    <table>
                                                        <tr>
                                                            <th colspan="2"> Semestre </th>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo $row['Taux_risk_objectif1'] . " %" ?></td>
                                                            <td><?php echo $row['Taux_risk_objectif2'] . " %" ?></td>


                                                        </tr>
                                                    </table>
                                                <?php } ?>
                                                <?php if ($row['Frequence_risk_objectif'] == 3) { ?>
                                                    <table>
                                                        <tr>
                                                            <th colspan="1"> Année </th>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo $row['Taux_risk_objectif1'] . " %" ?></td>

                                                        </tr>
                                                    </table>
                                                <?php } ?>

                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() ?>/Employee_Account/Form_edit_risk_objectif?ID_risk_objectif=<?php echo $row['ID_risk_objectif'] ?>&ID_processus=<?php echo $current_processus ?>&processcategory=<?php echo $processcategory; ?>">
                                                    <button class="btn btn-primary btn-primary-three float-right" style="width: 38px;"><i class="fa fa-pencil m-r-5"></i></button>
                                                </a>

                                            </td>
                                            <td style="border-color: #b8daff;">
                                                <a href="<?php echo base_url() ?>/Employee_Account/delete_risk_objectif?ID_risk_objectif=<?php echo $row['ID_risk_objectif'] ?>&ID_processus=<?php echo $current_processus ?>&processcategory=<?php echo $processcategory; ?>" onclick="return confirm('Êtes-vous sûr?')">
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