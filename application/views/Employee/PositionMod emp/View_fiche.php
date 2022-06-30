<style>
    .detail {
        border: 1.5px solid grey;
        border-radius: 30px;
        padding: 20px;
    }
</style>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-4">
                </div>
                <div class="col-sm-7 col-8 text-right m-b-30">
                    <div class="btn-group btn-group-sm">

                        <button class="btn btn-white" onclick="printDiv('printMe')"><i class="fa fa-print fa-lg"></i> Print</button>
                    </div>
                </div>
            </div>
            <div class="row" id="printMe">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="payslip-title">Post : <?php echo $Name_post ?> </h4>


                        <div class="row">
                            <div class="col-sm-12">
                                <div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong>Supérieur Hiérarchique </strong> <span class="float-right"><?php echo $Name_parent ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Formation </strong> <span class="float-right"><?php echo $Formation_post ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Expérience </strong> <span class="float-right"><?php echo $Experience_post ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Moyens </strong> <span class="float-right"><?php echo $Moyen_post ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Contraintes</strong> <span class="float-right"><strong><?php echo $Contraint_post ?></strong></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Indicateurs</strong> <span class="float-right"><strong><?php echo $Indicateur_post ?></strong></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>

                        <div class="card-block">
                            <h5 class="text-bold card-title">Tâches :</h5>
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th style="background-color: #f8a01a;color: white;">Plan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php echo $Plan_post ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th style="background-color: #36a87d;color: white;">Do</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php echo $Do_post ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th style="background-color: #097cb9;color: white;">Check</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php echo $Check_post ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th style="background-color: #ef5153;color: white;">Act</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php echo $Act_post ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <BR>
                        <div class="card-block">
                            <h5 class="text-bold card-title"> Compétences requises </h5>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Compétence</th>
                                            <th>Niveau</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php if (($postskills) == false) { ?>
                                            <tr>
                                                <td colspan='2'>aucune compétances</td>
                                            </tr>
                                            <?php
                                        } else {
                                            foreach ($postskills as $row) { ?>
                                                <tr></tr>
                                                <td><?php echo $row['Name_skill'] ?></td>
                                                <td><?php echo $row['Weight_skill'] ?></td>
                                                </tr>
                                        <?php     }
                                        } ?>




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>







        </div>
    </div>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;

        }
    </script>