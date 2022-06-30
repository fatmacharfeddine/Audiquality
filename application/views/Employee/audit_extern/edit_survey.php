<div class="page-wrapper">
            <div class="content">
         <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Survey</h4>
                    </div>
                </div>
       <form action="<?php echo site_url('/Employee_Account/edit_survey/'.$_GET['ID_survey'] .''); ?>" method="post">
           <table align="center">
        <input type="hidden" name="ID_survey" value="<?php echo $_GET['ID_survey']; ?>">
        <input type="hidden" name="ID_audit_extern" value="<?php echo $_GET['ID_audit_extern']; ?>">
        <!--input type="hidden" name="ID_audit_plan_extern" value="<?php //echo $_GET['ID_audit_plan_extern']; ?>"-->
        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>edit Title_constat <span class="text-danger">*</span></label>
                                        <select class="form-control" id="ID_constat" name="ID_constat"value="<?php if (isset($Title_constat)){ echo $Title_constat; } ?>"><br><br>>
          <?php foreach($this->constat as $row){ ?>
          <option value="<?php echo $row['ID_constat']?>" > <?php echo $row['Title_constat'] ?> </option>
          <?php } ?><br><br></select></td>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>edit Cheklist_survey_extern </label>
                                        <?php echo form_input(array('class'=>'form-control','id'=>'Cheklist_survey_extern', 'name'=>'Cheklist_survey_extern', 'placeholder' => '', 'size'=>25, 'value'=> set_value('Cheklist_survey_extern', $Cheklist_survey_extern)));?></td>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <?php echo form_input(array('class'=>'form-control','type'=> 'hidden', 'id'=>'ID_constat_extern', 'name'=>'ID_constat_extern', 'placeholder' => '', 'size'=>25, 'value'=> set_value('ID_constat_extern', $ID_constat_extern)));?></td>
                                    </div>
                                </div>
                                <div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>edit Title_processus</label>
                        <select class="form-control" id="ID_processus" name="ID_processus"value="<?php if (isset($Title_processus)){ echo $Title_processus; } ?>"><br><br>>
          <?php foreach($this->processus as $row){ ?>
          <option value="<?php echo $row['ID_processus']?>" > <?php echo $row['Title_processus'] ?> </option>
          <?php } ?><br><br></select></td>
											</div>
										</div>
										
									</div>
								</div>
                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>edit Chaptre_Reference_survey_extern <span class="text-danger">*</span></label>
                                        <?php echo form_input(array('class'=>'form-control','id'=>'Chaptre_Reference_survey_extern', 'name'=>'Chaptre_Reference_survey_extern', 'placeholder' => '', 'size'=>25, 'value'=> set_value('Chaptre_Reference_survey_extern', $Chaptre_Reference_survey_extern)));?></td>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Text_survey_extern </label>
                                        <?php  echo form_input(array('class'=>'form-control','id'=>'Text_survey_extern', 'name'=>'Text_survey_extern', 'placeholder' => '', 'size'=>25, 'value'=> set_value('Text_survey_extern', $Text_survey_extern)));?></td>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Corrective_survey_extern </label>
                                        <?php echo form_input(array('class'=>'form-control','id'=>'Corrective_survey_extern', 'name'=>'Corrective_survey_extern', 'placeholder' => '', 'size'=>25, 'value'=> set_value('Corrective_survey_extern', $Corrective_survey_extern)));?></td>
                                    </div>
                                </div>
                            </div>
        <td><?php echo form_input(array('class'=>'form-control','type'=> 'hidden', 'id'=>'ID_constat_extern', 'name'=>'ID_constat_extern', 'placeholder' => '', 'size'=>25, 'value'=> set_value('ID_constat_extern', $ID_constat_extern)));?></td>
        
        <tr>
          <td></td>
          <td><input class="btn btn-primary submit-btn" type="submit" value="Save" name="submit"></td>
        </tr>      
      </table>
    </form>