
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-8 col-4">
                    <h4 class="page-title">List of trainings</h4>
                </div>
                <div class="col-sm-4 col-8 text-right m-b-30">
                </div>
                <!--div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="<?php echo site_url('Employee_Account/Form_add_doc_request') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add doc_request</a>
                </div-->
            </div>
            <div class="row doctor-grid">
                    <div class="col-md-4 col-sm-6  col-lg-6">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="<?php echo base_url() ?>/Employee_Account/List_trainings_eval_emp?Year_training_programm=<?= $Year_training_programm ?>"><img alt="" src="<?php echo base_url() ?>/includes/ext/assets/template/img/RH/train1.jpg"></a>
                            </div>
                            
                            <h4 class="doctor-name text-ellipsis"><a href="<?php echo base_url() ?>/Employee_Account/List_trainings_eval_emp?Year_training_programm=<?= $Year_training_programm ?>">My Trainings</a></h4>
                            
                            
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6  col-lg-6">
                        <div class="profile-widget">
                            <div class="doctor-img">
                            <a class="avatar" href="<?php echo base_url() ?>/Employee_Account/List_trainings_eval_all?Year_training_programm=<?= $Year_training_programm ?>"><img alt="" src="<?php echo base_url() ?>/includes/ext/assets/template/img/RH/train2.jpg"></a>
                            </div>
                            
                            <h4 class="doctor-name text-ellipsis"><a href="<?php echo base_url() ?>/Employee_Account/List_trainings_eval_all?Year_training_programm=<?= $Year_training_programm ?>">All Trainings</a></h4>
                            
                            
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
        </div>
    </div>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/.slimscroll.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/select2.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/moment.min.js"></script>
    <script src="<?php echo base_url() . "/includes/ext/"; ?>assets/js/bootstrap-datetimepicker.min.js"></script>
