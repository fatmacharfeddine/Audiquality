
<script>
    function triggerClick() {
        document.querySelector('#Band_image_organization').click();
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
<div class="page-wrapper">
            <div class="content">
            
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Organization</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                    <form action="<?php echo site_url('/Employee_Account/edit_audit/'.$_GET['ID_organization'] .''); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Organization Name <span class="text-danger">*</span></label>
                                        <?php echo form_input(array('class'=>'form-control','id'=>'Name_organization', 'name'=>'Name_organization', 'placeholder' => '', 'size'=>25, 'value'=> set_value('Name_organization', $Name_organization)));?></td>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Organization Contact Name</label>
                                        <?php echo form_input(array('class'=>'form-control','id'=>'Name_contact_organization', 'name'=>'Name_contact_organization', 'placeholder' => '', 'size'=>25, 'value'=> set_value('Name_contact_organization', $Name_contact_organization)));?></td>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <?php echo form_input(array('class'=>'form-control','id'=>'Email_organization','type'=>'email', 'name'=>'Email_organization', 'placeholder' => '', 'size'=>25, 'value'=> set_value('Email_organization', $Email_organization)));?></td>
                                    </div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Address</label>
												<?php echo form_input(array('class'=>'form-control','id'=>'Address_organization', 'name'=>'Address_organization', 'placeholder' => '', 'size'=>25, 'value'=> set_value('Address_organization', $Address_organization)));?></td>
											</div>
										</div>
										
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <?php echo form_input(array('class'=>'form-control','id'=>'Phone_organization', 'name'=>'Phone_organization', 'placeholder' => '', 'size'=>25, 'value'=> set_value('Phone_organization', $Phone_organization)));?></td>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
                      <label for="picture">Select image to upload:</label><br>
  <img src="<?= base_url() ?>/uploads/organization/default.jpg" name="profileDisplay" id="profileDisplay" onclick="triggerClick()" alt="" style="  text-align:center;  width: 50px; height: 50px;border: 2px solid #d1cfcf;padding: 2px;">
  
<img id="target" />
<input type="file" accept="image/jpg, image/jpeg, image/png" id="Band_image_organization" name="Band_image_organization" onchange="displayImage(this)" style="display:none;  text-align:center;  width: 50px; height: 50px;border: 2px solid #d1cfcf;padding: 2px;"> </input>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            
                </div>
            </div>
       