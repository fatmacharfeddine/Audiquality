<div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Organizations</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>planned_date_audit_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['planned_date_audit_extern'] ?> </span></td>       
                                                </tr>
                                                <tr>
                                                <td><strong>Membre_audit_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['Membre_audit_extern'] ?> </span></td>
                                                </tr>
                                                <tr>
                                                <td><strong>Mission_audit_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['Mission_audit_extern'] ?> </span></td>
                                                </tr>
                                                <tr>
                                                <td><strong>Result_audit_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['Result_audit_extern'] ?> </span></td>
                                                </tr>
                                                <tr>
                                                <td><strong>Synthesis_audit_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['Synthesis_audit_extern'] ?> </span></td>
                                                </tr>
                                                <tr>
                                                <td><strong>Description_audit_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['Description_audit_extern'] ?> </span></td>
                                                </tr>
                                                <tr>
                                                <td><strong>Create_date_audit_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['Create_date_audit_extern'] ?> </span></td>
                                                </tr>
                                                <tr>
                                                <td><strong>real_date_audit_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['real_date_audit_extern'] ?> </span></td>
                                                </tr>
                                                <tr>
                                                <td><strong>objectif_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['objectif_extern'] ?> </span></td>
                                                </tr>
                                                <tr>
                                                <td><strong>domaine_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['domaine_extern'] ?> </span></td>
                                                </tr>
                                                <tr>
                                                <td><strong>methodologie_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['methodologie_extern'] ?> </span></td>
                                                </tr>
                                                <tr>
                                                <td><strong>evaluation_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['evaluation_extern'] ?> </span></td>
                                                </tr>
                                                <tr>
                                                <td><strong>Lieu_audit_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['Lieu_audit_extern'] ?> </span></td>
                                                </tr>
                                                <tr>
                                                <td><strong>Type_audit_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['Type_audit_extern'] ?> </span></td>
                                                </tr>
                                                <tr>
                                                <td><strong>Auditeur_extern</strong> <span class="float-right"><?php foreach($this->Maudit_extern as $row) echo $row['Auditeur_extern'] ?> </span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
            
<form action="<?php echo base_url() ?>Employee_Account/add_survey" method="post" >
   <h1 class="title"> list des Survey : </h1>
   <!--input type="hidden" name="ID_audit_plan_extern" value="<?php //echo $this->ID_audit_plan_extern ;?>"-->
   <input type="hidden" name="ID_audit_extern" value="<?php echo $this->ID_audit_extern ;?>">
   <button type="submit" class="btn btn btn-primary btn-rounded float-right" name="submit">ADD </button><br>
   <h4> search for processus </h4>
   <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for processus.." >

<table id="myTable" style="width: 50%;" class="table table-striped custom-table">
    <tr>
   
      <!--th scope="col">ID_survey</th-->
      <th scope="col">Cheklist_survey_extern</th>
      <!--th scope="col">ID_constat_extern</th-->
      <th scope="col">Chaptre_Reference_survey_extern </th>
      <th scope="col">Text_survey_extern</th>
      <th scope="col">Corrective_survey_extern</th>
      <th scope="col">list des constats</th>
      <th scope="col">list des processus</th>
      <th scope="col">responsable</th>
      <th scope="col">Action</th>
      
      <!--th scope="col">ID_audit_extern</th-->
    </tr>
    <?php
   // echo print_r($this->auditquality);
    foreach($this->survey as $row){

?>  
<tr>
<!--td scope="col"><?php echo $row['ID_survey'] ?></td-->
<td scope="col"><?php echo $row['Cheklist_survey_extern'] ?></td>
<!--td scope="col"><?php echo $row['ID_constat_extern'] ?></td-->
<td scope="col"><?php  echo $row['Chaptre_Reference_survey_extern'] ?></td>
<td scope="col"><?php echo $row['Text_survey_extern'] ?></td>
<td scope="col"><?php echo $row['Corrective_survey_extern'] ?></td>
<td scope="col"><?php echo $row['Title_constat'] ?></td>
<td scope="col"><?php echo $row['Title_processus'] ?></td>
<td scope="col"><?php echo $row['Name_employee'] ?></td>
<!--td scope="col"><?php echo $row['ID_audit_extern'] ?></td-->
<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="<?php echo base_url()?>Employee_Account/form_edit_survey?ID_audit_extern=<?php echo $this->ID_audit_extern ;?>&ID_survey=<?php echo $row['ID_survey'] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="<?php echo base_url()?>Employee_Account/delete_Survey?ID_audit_extern=<?php echo $this->ID_audit_extern ;?>&ID_survey=<?php echo $row['ID_survey'] ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
</tr> 


   <?php } ?>
</table>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</div>
</div>
</div>
</html>
