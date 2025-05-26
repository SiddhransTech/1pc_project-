<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
	<div id="page-head">
		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow"><?= translate('add_member')?></h1>

		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End page title-->
		<!--Breadcrumb-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<ol class="breadcrumb">
			<li><a href="<?=base_url()?>admin"><?= translate('home')?></a></li>
			<li><a href="#"><?= translate('members')?></a></li>
			<li><a href="#"><?= translate('add_member')?></a></li>

		</ol>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End breadcrumb-->
	</div>
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content">
		<div class="panel">
			<?php if (!empty($success_alert)): ?>
				<div class="alert alert-success" id="success_alert" style="display: block">
	                <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
	                <?=$success_alert?>
	            </div>
			<?php endif ?>
			<!--<?php if (!empty($danger_alert)): ?>-->
			<!--	<div class="alert alert-danger" id="danger_alert" style="display: block">-->
	  <!--              <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>-->

	  <!--              <?=$danger_alert?>-->
	  <!--               <?=validation_errors()?>-->
	  <!--          </div>-->
			<!--<?php endif ?>-->
	    	<?php if (!empty(validation_errors())): ?>
                <div class="widget" id="profile_error">
                    <div style="border-bottom: 1px solid #e6e6e6;">
                        <!--<div class="card-title" style="padding: 0.5rem 1.5rem; color: #fcfcfc; background-color: #de1b1b; border-top-right-radius:0.25rem; border-top-left-radius:0.25rem;">You <b>Must Provide</b> the Information(s) bellow</div>-->
                        <div class="card-body" style="padding: 0.5rem 1.5rem; background: rgba(222, 27, 27, 0.10);">
                            <style>
                                #profile_error p {
                                    color: #DE1B1B !important; margin: 0px !important; font-size: 12px !important;
                                }
                            </style>
                            <!--<?= validation_errors();?>-->
                        </div>
                    </div>
                </div>
            <?php
                endif;
            ?>

		    <div class="panel-heading">
		          <a href="javascript:history.back()" style="float: right;" class="btn btn-danger btn-sm btn-labeled fa fa-step-backward" type="submit">Go Back</a>
		        <h3 class="panel-title"><?= translate('add_new_member_info')?></h3>
		      
		    </div>
		    <div class="panel-body">
	    		<form class="form-horizontal" id="manage_details_form" method="POST" action="<?=base_url()?>admin/members/add_member/do_add">
					<div class="form-group">
						<label class="col-sm-3 control-label" for="fname"><b><?= translate('first_name')?> <span class="text-danger">*</span></b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php if(!empty($form_contents)){echo $form_contents['fname'];}?>" name="fname" placeholder="<?= translate('first_name')?>" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="lname"><b><?= translate('last_name')?> <span class="text-danger">*</span></b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php if(!empty($form_contents)){echo $form_contents['lname'];}?>" name="lname" placeholder="<?= translate('last_name')?>" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="email"><b><?= translate('email')?> <span class="text-danger">*</span></b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php if(!empty($form_contents)){echo $form_contents['email'];}?>" name="email" placeholder="<?= translate('email')?>" required="">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="gender"><b><?= translate('gender')?> <span class="text-danger">*</span></b></label>
						<div class="col-sm-8">
							<?php
                                if (!empty($form_contents)) {
                                    echo $this->Crud_model->select_html('gender', 'gender', 'name', 'edit', 'form-control form-control-sm selectpicker', $form_contents['gender'], '', '', '');
                                }
                                else {
                                    echo $this->Crud_model->select_html('gender', 'gender', 'name', 'add', 'form-control form-control-sm selectpicker', '', '', '', '');
                                }
                            ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="date_of_birth"><b><?= translate('date_of_birth')?> <span class="text-danger">*</span></b></label>
						<div class="col-sm-8">
							<input type="date"  value="<?php if(!empty($form_contents)){echo $form_contents['date_of_birth'];}?>" class="form-control" name="date_of_birth" style="line-height: normal;">
						</div>
					</div>
						<div class="form-group">
						<label class="col-sm-3 control-label" for="mobile"><b><?= translate('mobile')?> <span class="text-danger">*</span></b></label>
						<div class="col-sm-8">
							<input type="number" value="<?php if(!empty($form_contents)){echo $form_contents['mobile'];}?>" class="form-control" name="mobile"  placeholder=" <?= translate('mobile_no.')?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label" for="plan"><b><?= translate('plan')?> <span class="text-danger">*</span></b></label>
						<div class="col-sm-8">
							<?php
                                if (!empty($form_contents)) {
                                    echo $this->Crud_model->select_html('plan', 'plan', 'name', 'edit', 'form-control form-control-sm selectpicker', $form_contents['plan'], '', '', '');
                                }
                                else {
                                    echo $this->Crud_model->select_html('plan', 'plan', 'name', 'add', 'form-control form-control-sm selectpicker', '', '', '', '');
                                }
                            ?>
						</div>
					</div>
				
					 
			<!-- Area -->
<div class="form-group">
	<label class="col-sm-3 control-label"><b>Area <span class="text-danger">*</span></b></label>
	<div class="col-sm-8">
		<select id="area" name="area_id" class="form-control" onchange="getLegions(this.value); setAreaName(this);">
			<option value="">Select Area</option>
			<?php foreach($areas as $area): ?>
				<option value="<?= $area['id'] ?>" <?= ($area['id'] == $selected_area) ? 'selected' : '' ?>>
					<?= $area['name'] ?>
				</option>
			<?php endforeach; ?>
		</select>
		<input type="hidden" name="area" id="area_name"> <!-- Area name -->
	</div>
</div>

<!-- Legion -->
<div class="form-group">
	<label class="col-sm-3 control-label"><b>Legion <span class="text-danger">*</span></b></label>
	<div class="col-sm-8">
		<select id="legion" name="legion_id" class="form-control" onchange="setLegionName(this);">
			<option value="">Select Legion</option>
			<!-- Populated via AJAX -->
		</select>
		<input type="hidden" name="legion" id="legion_name"> <!-- Legion name -->
	</div>
</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="password"><b><?= translate('password')?> <span class="text-danger">*</span></b></label>
						<div class="col-sm-8">
							<input type="password"  class="form-control" name="password">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="cpassword"><b><?= translate('confirm_password')?> <span class="text-danger">*</span></b></label>
						<div class="col-sm-8">
							<input type="password" class="form-control" name="cpassword">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-8 text-right">
							<button type="submit" class="btn btn-primary btn-sm btn-labeled fa fa-save"><?=translate('add_member')?></button>
						</div>
					</div>
				</form>
		    </div>
		</div>
	</div>
</div>
<script>
	setTimeout(function() {
	    $('#success_alert').fadeOut('fast');
	    $('#danger_alert').fadeOut('fast');
	}, 5000); // <-- time in milliseconds


	function getLegions(areaId) {
    if (areaId === '') {
        document.getElementById('legion').innerHTML = '<option value="">Select Legion</option>';
        return;
    }

    fetch("<?= base_url('admin/get_legions_of_area/') ?>" + areaId)
        .then(response => response.json())
        .then(data => {
            console.log("Fetched legions:", data); // ✅ Logging fetched data

            let options = '<option value="">Select Legion</option>';
            data.forEach(function (legion) {
                options += `<option value="${legion.id}">${legion.name}</option>`;
            });
            document.getElementById('legion').innerHTML = options;
        })
        .catch(error => {
            console.error('Error fetching legions:', error);
        });
}

function setAreaName(select) {
    const areaName = select.options[select.selectedIndex].text;
    document.getElementById('area_name').value = areaName;
}

function setLegionName(select) {
    const legionName = select.options[select.selectedIndex].text;
    document.getElementById('legion_name').value = legionName;
}


</script>
