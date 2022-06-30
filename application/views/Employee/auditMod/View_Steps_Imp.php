<!--script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>
<script src="https://cdn.tiny.cloud/1/na6192bwoalnkxq15j8wmvj3h45wfq8yxguarjbgqz0mmax0/tinymce/5/tinymce.min.js"></script-->

<body>

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="col-sm-7 col-8 text-right m-b-30">
            <div class="btn-group btn-group-sm">
                <button class="btn btn-white">CSV</button>
                <button class="btn btn-white" onclick="printDiv('printMe')">PDF</button>
                <button class="btn btn-white" onclick="window.print()"><i class="fa fa-print fa-lg"></i> Print</button>
            </div>
        </div>
        <div class="row" id="printMe">
            <div class="col-md-12">
                <!--textarea id="mytextarea"></textarea-->
                <br>

                <div class="content">
                    <h4 class="payslip-title">Audit Plan</h4>
                    <div class="card-box profile-header">


                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>Date</strong> <span class="float-right"><?php echo $planned_date_audit; ?></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Donneur d’ordre </strong> <span class="float-right"><strong><?php echo $Mission_audit;  ?></strong></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Sites d’audit </strong> <span class="float-right"><strong><?php echo $Lieu_audit; ?></strong></span></td>
                                </tr>
                                <!--tr>
                                    <td><strong>Chargé d’audit </strong> <span class="float-right"><strong><?php echo $Membre_audit; ?></strong></span></td>
                                </tr-->
                                <tr>
                                    <td><strong>Référentiel </strong> <span class="float-right"><?php echo $Name_rerencial; ?></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Version</strong> <span class="float-right"><?php echo $Version_rerencial; ?></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Type d’audit </strong> <span class="float-right"><strong><?php echo $Type_audit; ?></strong></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Auditeur </strong> <span class="float-right"><strong><?php echo $Name_employee . ' ' . $Lastname_employee; ?></strong></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Processus</strong> <span class="float-right"><?php echo $Title_processus; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="profile-tabs">

                    <div class="tab-content">

                        <?php if (isset($infoaudit)) {
                        ?>
                            <!--------------Preparation------------------>
                            <div class="tab-pane show active" id="about-cont">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-box">

                                            <!------- Description audit ------>
                                            <div class="row" style="background-color: #3995ca;  padding: 5px;">

                                                <div class="col-md-9">

                                                    <h4 class="m-b-10" style="color: white;"><strong>Description audit</strong></h4>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <p><?php echo $Description_audit ?></p>
                                            </div>
                                            <!------- End Description audit ------->



                                            <!---Objectif, références et domaine d’application de l’audit--->
                                            <div class="row" style="background-color: #3995ca;  padding: 5px;">

                                                <div class="col-md-9">

                                                    <h4 class="m-b-10" style="color: white;"><strong>Objectif, références et domaine d’application de l’audit</strong></h4>
                                                </div>


                                            </div>
                                            <br>
                                            <div class="row">
                                                <p><?php echo $objectif ?></p>
                                            </div>
                                            <!---End Objectif, références et domaine d’application de l’audit--->

                                            <!----Domaine d’application---->
                                            <div class="row" style="background-color: #3995ca;  padding: 5px;">

                                                <div class="col-md-9">

                                                    <h4 class="m-b-10" style="color: white;"><strong>Domaine d’application</strong></h4>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <p><?php echo $domaine ?></p>
                                            </div>
                                            <!----End Domaine d’application---->
                                            <!----Méthodologie de l'audit------>
                                            <div class="row" style="background-color: #3995ca;  padding: 5px;">

                                                <div class="col-md-9">

                                                    <h4 class="m-b-10" style="color: white;"><strong>Méthodologie de l’audit</strong></h4>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <p><?php echo $methodologie ?></p>
                                            </div>
                                            <!----End Méthodologie de l'audit ---->
                                            <!--------------Evaluation de la conformité au référentiel et potentiel d’amélioration----------->
                                            <div class="row" style="background-color: #3995ca;  padding: 5px;">

                                                <div class="col-md-9">

                                                    <h4 class="m-b-10" style="color: white;"><strong>Evaluation de la conformité au référentiel et potentiel d’amélioration</strong></h4>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <p><?php echo $evaluation ?></p>
                                            </div>

                                            <!--------------End Evaluation de la conformité au référentiel et potentiel d’amélioration----------->
                                            <!--------------- Table Constat ------------------->

                                            <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th>Constat</th>
                                                        <th>Evaluation</th>
                                                        <th>Réf : § ISO 9001 ou SMQ</th>


                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if (isset($listeConstat)) {
                                                        foreach ($listeConstat as $row) {
                                                    ?>

                                                            <tr role="row" class="odd">
                                                                <td style="width: 500px;"><?php echo $row['Text_survey']  ?></td>


                                                                <td><?php echo $row['Metaphor_constat'] ?> </td>

                                                                <td><?php echo $row['Chaptre_Reference_survey'] ?> </td>


                                                            </tr>
                                                    <?php }
                                                    } ?>
                                                </tbody>
                                            </table>

                                            <!--------------- End Table Constat ------------------->


                                            <br>
                                            <!--------------------Result audit---------------------->
                                            <div class="row" style="background-color: #3995ca;  padding: 5px;">

                                                <div class="col-md-9">

                                                    <h4 class="m-b-10" style="color: white;"><strong>Result </strong></h4>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <p><?php echo $Result_audit ?></p>
                                            </div>
                                            <!--------------------End Result audit---------------->


                                        </div>


                                    </div>
                                </div>




                            </div>
                            <!-------------End Preparation----------------->


                    </div>



                <?php
                        }
                ?>


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
