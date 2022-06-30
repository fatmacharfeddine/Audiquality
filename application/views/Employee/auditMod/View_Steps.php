<!--script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>
<script src="https://cdn.tiny.cloud/1/na6192bwoalnkxq15j8wmvj3h45wfq8yxguarjbgqz0mmax0/tinymce/5/tinymce.min.js"></script-->

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">

            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <!--textarea id="mytextarea"></textarea-->
                        <h4 class="payslip-title">Audit Plan</h4>
                        <a href="<?php echo base_url() ?>//Employee_Account/View_Steps_Imp?ID_audit=<?php echo $ID_audit; ?>" class="btn btn-success btn-block" style="margin-left: 35%; width: 30%;background-color: #eb1c24;border: 1px solid #eb1c24;">Generate Report </a>
                        <br>
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
                                                <div class="col-md-1">
                                                    <a href="#" style="width: 38px; background-color: white;   color: #3995ca;    border: 1px solid #3995ca;" class="btn btn-primary btn-primary-three float-right" data-toggle="modal" data-target="#add_groupdesc">+</a>
                                                    <!------------------------------ pop-up ------------------------------->
                                                    <div class="modal fade" id="add_groupdesc" role="dialog">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                                                    <div class="col-md-12">
                                                                        <div class="card-box">
                                                                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_add_steps?add=1" enctype="multipart/form-data" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-md-12">
                                                                                                <textarea rows="10" cols="70" class="form-control" name="Description_audit">   </textarea>
                                                                                                <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!---------------------------End pop-up ------------------------------->

                                                </div>
                                                <div class="col-md-1">
                                                    <a href="#" style="width: 38px; background-color: white;   color: green;    border: 1px solid green;" class="btn btn-primary btn-primary-three float-right" data-toggle="modal" data-target="#add_group4"><i class="fa fa-pencil m-r-5"></i></a>
                                                    <!------------------------------ pop-up ------------------------------->
                                                    <div class="modal fade" id="add_group4" role="dialog">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                                                    <div class="col-md-12">
                                                                        <div class="card-box">
                                                                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_update_steps?update=1" enctype="multipart/form-data" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-md-12">
                                                                                                <textarea rows="10" cols="70" class="form-control" name="Description_audit"> <?php echo $Description_audit; ?>  </textarea>
                                                                                                <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!---------------------------End pop-up ------------------------------->

                                                </div>
                                                <div class="col-md-1">
                                                    <a onclick="return confirm('Are you Sure?')" href="<?php echo base_url(); ?>Employee_Account/submit_delete_steps?delete=1&ID_audit=<?php echo $ID_audit; ?>">
                                                        <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;background-color: white;  color: red;    border: 1px solid red;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                    </a>
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
                                                <div class="col-md-1">
                                                    <a href="#" style="width: 38px; background-color: white;   color: #3995ca;    border: 1px solid #3995ca;" class="btn btn-primary btn-primary-three float-right" data-toggle="modal" data-target="#add_group">+</a>
                                                    <!------------------------------ pop-up ------------------------------->
                                                    <div class="modal fade" id="add_group" role="dialog">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                                                    <div class="col-md-12">
                                                                        <div class="card-box">
                                                                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_add_steps?add=2" enctype="multipart/form-data" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-md-12">
                                                                                                <textarea rows="10" cols="70" class="form-control" name="objectif">   </textarea>
                                                                                                <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!---------------------------End pop-up ------------------------------->

                                                </div>
                                                <div class="col-md-1">
                                                    <a href="#" style="width: 38px; background-color: white;   color: green;    border: 1px solid green;" class="btn btn-primary btn-primary-three float-right" data-toggle="modal" data-target="#add_group1"><i class="fa fa-pencil m-r-5"></i></a>
                                                    <!------------------------------ pop-up ------------------------------->
                                                    <div class="modal fade" id="add_group1" role="dialog">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                                                    <div class="col-md-12">
                                                                        <div class="card-box">
                                                                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_update_steps?update=2" enctype="multipart/form-data" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-md-12">
                                                                                                <textarea rows="10" cols="70" class="form-control" name="objectif"> <?php echo $objectif; ?>   </textarea>
                                                                                                <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!---------------------------End pop-up ------------------------------->

                                                </div>
                                                <div class="col-md-1">
                                                    <a onclick="return confirm('Are you Sure?')" href="<?php echo base_url(); ?>Employee_Account/submit_delete_steps?delete=2&ID_audit=<?php echo $ID_audit; ?>">
                                                        <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;background-color: white;  color: red;    border: 1px solid red;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                    </a>
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
                                                <div class="col-md-1">
                                                    <a href="#" style="width: 38px; background-color: white;   color: #3995ca;    border: 1px solid #3995ca;" class="btn btn-primary btn-primary-three float-right" data-toggle="modal" data-target="#add_group6">+</a>
                                                    <!------------------------------ pop-up ------------------------------->
                                                    <div class="modal fade" id="add_group6" role="dialog">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                                                    <div class="col-md-12">
                                                                        <div class="card-box">
                                                                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_add_steps?add=3" enctype="multipart/form-data" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-md-12">
                                                                                                <textarea rows="10" cols="70" class="form-control" name="domaine">   </textarea>
                                                                                                <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!---------------------------End pop-up ------------------------------->

                                                </div>
                                                <div class="col-md-1">
                                                    <a href="#" style="width: 38px; background-color: white;   color: green;    border: 1px solid green;" class="btn btn-primary btn-primary-three float-right" data-toggle="modal" data-target="#add_group5"><i class="fa fa-pencil m-r-5"></i></a>
                                                    <!------------------------------ pop-up ------------------------------->
                                                    <div class="modal fade" id="add_group5" role="dialog">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                                                    <div class="col-md-12">
                                                                        <div class="card-box">
                                                                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_update_steps?update=3" enctype="multipart/form-data" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-md-12">
                                                                                                <textarea rows="10" cols="70" class="form-control" name="domaine">  <?php echo $domaine; ?>  </textarea>
                                                                                                <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!---------------------------End pop-up ------------------------------->

                                                </div>
                                                <div class="col-md-1">
                                                    <a onclick="return confirm('Are you Sure?')" href="<?php echo base_url(); ?>Employee_Account/submit_delete_steps?delete=3&ID_audit=<?php echo $ID_audit; ?>">
                                                        <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;background-color: white;  color: red;    border: 1px solid red;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                    </a>
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
                                                <div class="col-md-1">
                                                    <a href="#" style="width: 38px; background-color: white;   color: #3995ca;    border: 1px solid #3995ca;" class="btn btn-primary btn-primary-three float-right" data-toggle="modal" data-target="#add_group8">+</a>
                                                    <!------------------------------ pop-up ------------------------------->
                                                    <div class="modal fade" id="add_group8" role="dialog">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                                                    <div class="col-md-12">
                                                                        <div class="card-box">
                                                                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_add_steps?add=4" enctype="multipart/form-data" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-md-12">
                                                                                                <textarea rows="10" cols="70" class="form-control" name="methodologie">   </textarea>
                                                                                                <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!---------------------------End pop-up ------------------------------->

                                                </div>
                                                <div class="col-md-1">
                                                    <a href="#" style="width: 38px; background-color: white;   color: green;    border: 1px solid green;" class="btn btn-primary btn-primary-three float-right" data-toggle="modal" data-target="#add_group9"><i class="fa fa-pencil m-r-5"></i></a>
                                                    <!------------------------------ pop-up ------------------------------->
                                                    <div class="modal fade" id="add_group9" role="dialog">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                                                    <div class="col-md-12">
                                                                        <div class="card-box">
                                                                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_update_steps?update=4" enctype="multipart/form-data" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-md-12">
                                                                                                <textarea rows="10" cols="70" class="form-control" name="methodologie"> <?php echo $methodologie; ?>   </textarea>
                                                                                                <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!---------------------------End pop-up ------------------------------->

                                                </div>
                                                <div class="col-md-1">
                                                    <a onclick="return confirm('Are you Sure?')" href="<?php echo base_url(); ?>Employee_Account/submit_delete_steps?delete=4&ID_audit=<?php echo $ID_audit; ?>">
                                                        <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;background-color: white;  color: red;    border: 1px solid red;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                    </a>
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
                                                <div class="col-md-1">
                                                    <a href="#" style="width: 38px; background-color: white;   color: #3995ca;    border: 1px solid #3995ca;" class="btn btn-primary btn-primary-three float-right" data-toggle="modal" data-target="#add_group10">+</a>
                                                    <!------------------------------ pop-up ------------------------------->
                                                    <div class="modal fade" id="add_group10" role="dialog">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                                                    <div class="col-md-12">
                                                                        <div class="card-box">
                                                                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_add_steps?add=5" enctype="multipart/form-data" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-md-12">
                                                                                                <textarea rows="10" cols="70" class="form-control" name="evaluation">   </textarea>
                                                                                                <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!---------------------------End pop-up ------------------------------->

                                                </div>
                                                <div class="col-md-1">
                                                    <a href="#" style="width: 38px; background-color: white;   color: green;    border: 1px solid green;" class="btn btn-primary btn-primary-three float-right" data-toggle="modal" data-target="#add_group11"><i class="fa fa-pencil m-r-5"></i></a>
                                                    <!------------------------------ pop-up ------------------------------->
                                                    <div class="modal fade" id="add_group11" role="dialog">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                                                    <div class="col-md-12">
                                                                        <div class="card-box">
                                                                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_update_steps?update=5" enctype="multipart/form-data" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-md-12">
                                                                                                <textarea rows="10" cols="70" class="form-control" name="evaluation"> <?php echo $evaluation; ?>  </textarea>
                                                                                                <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!---------------------------End pop-up ------------------------------->

                                                </div>
                                                <div class="col-md-1">
                                                    <a onclick="return confirm('Are you Sure?')" href="<?php echo base_url(); ?>Employee_Account/submit_delete_steps?delete=5&ID_audit=<?php echo $ID_audit; ?>">
                                                        <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;background-color: white;  color: red;    border: 1px solid red;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                    </a>
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
                                                        <th></th>
                                                        <th><a href="#" style="width: 38px; background-color: white;   color: #3995ca;    border: 1px solid #3995ca;" class="btn btn-primary btn-primary-three float-right" data-toggle="modal" data-target="#add_groupconstat">+</a></th>
                                                        <!------------------------------ pop-up ------------------------------->
                                                        <div class="modal fade" id="add_groupconstat" role="dialog">
                                                            <div class="modal-dialog">

                                                                <div class="modal-content">
                                                                    <div class="row">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                                                        <div class="col-md-12">
                                                                            <div class="card-box">
                                                                                <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_constat?submit=1" enctype="multipart/form-data" method="post">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group row">
                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-form-label col-md-4">Text survey </label>
                                                                                                        <div class="col-md-8">
                                                                                                            <textarea rows="10" cols="70" class="form-control" name="Text_survey"></textarea>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">
                                                                                                    <br>
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-form-label col-md-4">Chaptre </label>
                                                                                                        <div class="col-md-8">
                                                                                                            <input type="text" class="form-control" name="Chaptre_Reference_survey">

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <br>
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-form-label col-md-4">Constat </label>
                                                                                                        <div class="col-md-8">
                                                                                                            <select class="form-control" name="ID_constat" id="ID_constat">
                                                                                                                <?php
                                                                                                                foreach ($constat as $row) {

                                                                                                                    if (isset($ID_constat)) {

                                                                                                                        if ($row['ID_constat'] == $ID_constat) {

                                                                                                                ?>

                                                                                                                            <option value=<?= $row['ID_constat'] ?> selected><?= $row['Title_constat'] ?></option>

                                                                                                                        <?php } else {
                                                                                                                        ?>

                                                                                                                            <option value=<?= $row['ID_constat'] ?>><?= $row['Title_constat'] ?></option>

                                                                                                                        <?php }
                                                                                                                    } else {
                                                                                                                        ?>
                                                                                                                        <option value=<?= $row['ID_constat'] ?>><?= $row['Title_constat'] ?></option>


                                                                                                                <?php }
                                                                                                                }
                                                                                                                ?>


                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="text-right">
                                                                                        <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                                                    </div>
                                                                                </form>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!---------------------------End pop-up ------------------------------->
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

                                                                <td class="text-right">

                                                                    <a href="<?php echo base_url() ?>/Employee_Account/Edit_constats?ID_survey=<?php echo  $row['ID_survey'] ?>&ID_audit=<?php echo $row['ID_audit'] ?>" style="width: 38px;border: 1px solid green; border-radius: 50%;    padding: 5px 0px 0px 0px;" class="btn btn-primary btn-primary-three float-right"><i class="material-icons" style="color:green">&#xe923;</i></a>

                                                                </td>

                                                                <td class="text-right">
                                                                    <a href="<?php echo base_url() ?>/Employee_Account/submit_delete_constat?ID_survey=<?php echo  $row['ID_survey'] ?>&ID_audit=<?php echo $row['ID_audit'] ?>" onclick="return confirm('Are you Sure?')">
                                                                        <button style="width: 38px;border: 1px solid red; border-radius: 50%;    padding: 7px 0px 7px 3px;"><i class="fa fa-trash-o m-r-5" style="color:red"></i></button>
                                                                    </a>
                                                                </td>

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
                                                <div class="col-md-1">
                                                    <a href="#" style="width: 38px; background-color: white;   color: #3995ca;    border: 1px solid #3995ca;" class="btn btn-primary btn-primary-three float-right" data-toggle="modal" data-target="#add_group13">+</a>
                                                    <!------------------------------ pop-up ------------------------------->
                                                    <div class="modal fade" id="add_group13" role="dialog">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                                                    <div class="col-md-12">
                                                                        <div class="card-box">
                                                                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_add_steps?add=6" enctype="multipart/form-data" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-md-12">
                                                                                                <textarea rows="10" cols="70" class="form-control" name="Result_audit">   </textarea>
                                                                                                <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!---------------------------End pop-up ------------------------------->

                                                </div>
                                                <div class="col-md-1">
                                                    <a href="#" style="width: 38px; background-color: white;   color: green;    border: 1px solid green;" class="btn btn-primary btn-primary-three float-right" data-toggle="modal" data-target="#add_group12"><i class="fa fa-pencil m-r-5"></i></a>
                                                    <!------------------------------ pop-up ------------------------------->
                                                    <div class="modal fade" id="add_group12" role="dialog">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:90%; border-radius: 50%;">&times;</button>

                                                                    <div class="col-md-12">
                                                                        <div class="card-box">
                                                                            <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_update_steps?update=6" enctype="multipart/form-data" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group row">
                                                                                            <div class="col-md-12">
                                                                                                <textarea rows="10" cols="70" class="form-control" name="Result_audit"> <?php echo $Result_audit; ?>  </textarea>
                                                                                                <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="text-right">
                                                                                    <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!---------------------------End pop-up ------------------------------->

                                                </div>
                                                <div class="col-md-1">
                                                    <a onclick="return confirm('Are you Sure?')" href="<?php echo base_url(); ?>Employee_Account/submit_delete_steps?delete=6&ID_audit=<?php echo $ID_audit; ?>">
                                                        <button class="btn btn-primary btn-primary-four float-right" style="width: 38px;background-color: white;  color: red;    border: 1px solid red;"><i class="fa fa-trash-o m-r-5"></i></button>
                                                    </a>
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
