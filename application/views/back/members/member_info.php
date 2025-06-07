<div class="fluid">
	<div class="fixed-fluid">
		<div class="fluid">
			<div class="panel">
				<div class="panel-body">

					<div class="pull-right">
						<button data-target='#delete_modal' data-toggle='modal' class='btn btn-danger btn-sm btn-labeled fa fa-trash' data-toggle='tooltip' data-placement='top' title='".translate('delete_member')."' onclick='delete_member("<?=$value->member_id?>")'><?php echo translate('delete')?></i></button>
						<a href="<?=base_url()?>admin/members/<?=$parameter?>/edit_member/<?=$value->member_id?>" class="btn btn-primary btn-sm btn-labeled fa fa-edit" type="button"><?php echo translate('edit')?></a>
						<a href="<?=base_url()?>admin/members/<?=$parameter?>/print_member/<?=$value->member_id?>" class="btn btn-primary btn-sm btn-labeled fa fa-print" type="button" target="_blank"><?php echo translate('generate_pdf')?></a>
					</div>

	        <div class="text-left">
	        	<h4>Member ID - <?=$value->member_profile_id?></h4>
	        	<h4>Enquiry time - 
	        	<?php $enquiry_time = $value->enquiry_time; 
		        	if($enquiry_time == 'morning'):
		        	    echo "9AM to 12PM"; 
		        	elseif($enquiry_time == 'afternoon'):
		        	    echo "12PM to 4PM";
		        	elseif($enquiry_time == 'evening'):
		        	    echo "4PM to 7PM";
		        	elseif($enquiry_time == 'anytime'):
		        	    echo "9AM to 7PM";
		          endif;?>
	          </h4>
	        </div>

	        <div class="panel panel-dark">
	            <div class="panel-heading">
	                <h3 class="panel-title"><?php echo translate('introduction')?> / <?=$this->lang->line('introduction'); ?></h3>
	            </div>
	            <div class="panel-body">
	                <p><?=$value->introduction?></p>
	            </div>
	        </div>

	        <div class="panel panel-dark">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo translate('basic_information')?> / <?=$this->lang->line('basic_information'); ?></h3>
            </div>
            <div class="panel-body">
              <table class="table table-condenced">
								
								<tr>
									<td>
										<b><?php echo translate('first_name')?></b><span> / <?=$this->lang->line('first_name'); ?></span>
									</td>
									<td>
										<?=$value->first_name?>
									</td>
									<td>
										<b><?php echo translate('last_name')?> / <?=$this->lang->line('last_name'); ?></b>
									</td>
									<td>
										<?=$value->last_name?>
									</td>
								</tr>

								<tr>
									<td>
										<b><?php echo translate('gender')?> / <?=$this->lang->line('gender'); ?></b>
									</td>
									<td>
	                  <?=$this->Crud_model->get_type_name_by_id('gender', $value->gender)?>
									</td>
									<td>
										<b><?php echo translate('email')?> / <?=$this->lang->line('email'); ?></b>
									</td>
									<td>
										<?=$value->email?>
										<?php if($member_email_verification = $this->db->get_where('general_settings', array('type' => 'member_email_verification'))->row()->value == "on"){ ?>
											<br>
											<?php if ($value->email_verification_status == 1)
												{
													echo "<span class='badge badge-success' >".translate('email_verified')."</span>";
												}
												elseif ($value->is_closed == "no") {
													echo "<span class='badge badge-danger' >".translate('email_not_verified')."</span>";
												}
											?>
										<?php } ?>
									</td>
								</tr>

								<tr>
									<td>
										<b><?php echo translate('age')?> / <?=$this->lang->line('age'); ?></b>
									</td>
									<td>
										<?php
											$bday = new DateTime(date('d.m.Y', $value->date_of_birth));
											$today = new Datetime(date('d.m.Y'));
											$diff = $today->diff($bday);
											printf($diff->y);
										?>
										<!-- <?=$calculated_age = (date('Y') - date('Y', $value->date_of_birth));?> -->
									</td>
									<td>
										<b><?php echo translate('marital_status')?> / <?=$this->lang->line('marital_status'); ?></b>
									</td>
									<td>
										<?=$this->Crud_model->get_type_name_by_id('marital_status', $basic_info[0]['marital_status'])?>
									</td>
								</tr>

								<tr>
									<td>
										<b><?php echo translate('number_of_children')?> / <?=$this->lang->line('number_of_children'); ?></b>
									</td>
									<td>
										<?=$basic_info[0]['number_of_children']?>
									</td>
									<td>
										<b><?php echo translate('area')?> / <?=$this->lang->line('area'); ?></b>
									</td>
									<td>
										<?=$basic_info[0]['area']?>
									</td>
								</tr>

								<tr>
									<td>
										<b><?php echo translate('mobile')?></b><span> / <?=$this->lang->line('mobile'); ?></span>
									</td>
									<td>
										<?=$value->mobile?>
									</td>
									<td>
										<b><?php echo translate('onbehalf')?> / <?=$this->lang->line('onbehalf'); ?></b>
									</td>
									<td>
										 <?=$this->Crud_model->get_type_name_by_id('on_behalf', $basic_info[0]['on_behalf']);?>
									</td>
								</tr>

								<tr>
									<td>
										<b><?php echo translate('date_of_birth')?> / <?=$this->lang->line('dob'); ?></b>
									</td>
									<td>
										<?=date('d/m/Y', $value->date_of_birth)?>
									</td>
									<td>
										<b></b>
									</td>
									<td></td>
								</tr>
							</table>
			      </div>
			    </div>

	        <?php
	        	if ($this->db->get_where('frontend_settings', array('type' => 'present_address'))->row()->value == "yes") {
          ?>

          <div class="panel panel-dark">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo translate('present_address')?> / <?=$this->lang->line('present_address'); ?></h3>
            </div>
            <div class="panel-body">
              <table class="table">
							
								<tr>
									<td>
										<b><?php echo translate('country')?> / <?=$this->lang->line('country'); ?></b>
									</td>
									<td>
	                  <?=$this->Crud_model->get_type_name_by_id('country', $present_address[0]['country']);?>
									</td>
									<td>
										<b><?php echo translate('state')?> / <?=$this->lang->line('state'); ?></b>
									</td>
									<td>
										<?=$this->Crud_model->get_type_name_by_id('state', $present_address[0]['state']);?>
									</td>
								</tr>
								<tr>
									<td>
										<b><?php echo translate('city')?> / <?=$this->lang->line('city'); ?></b>
									</td>
									<td>
										<?=$this->Crud_model->get_type_name_by_id('city', $present_address[0]['city']);?>
									</td>
									<td>
										<b><?php echo translate('postal-Code')?> / <?=$this->lang->line('postal_code'); ?></b>
									</td>
									<td>
										<?=$present_address[0]['postal_code']?>
									</td>
								</tr>
							</table>
				    </div>
				  </div>
					<?php } ?>

					<?php
						if ($this->db->get_where('frontend_settings', array('type' => 'education_and_career'))->row()->value == "yes") {
					?>

					<div class="panel panel-dark">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo translate('education_&_career')?> / <?=$this->lang->line('education_career'); ?></h3>
            </div>
            <div class="panel-body">
              <table class="table">
								<tr>
									<td>
										<b><?php echo translate('higher_education')?> / <?=$this->lang->line('higher_education'); ?></b>
									</td>
									<td>
										<?=$education_and_career[0]['highest_education']?>
									</td>
									<td>
										<b><?php echo translate('occupation')?> / <?=$this->lang->line('occupation'); ?></b>
									</td>
									<td>
										<?=$education_and_career[0]['occupation']?>
									</td>
								</tr>
								
							</table>
			      </div>
			    </div>
			  	<?php } ?>

			  	<?php
            if ($this->db->get_where('frontend_settings', array('type' => 'physical_attributes'))->row()->value == "yes") {
          ?>
	        <div class="panel panel-dark">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo translate('physical_attributes')?> / <?=$this->lang->line('physical_attributes'); ?></h3>
            </div>
            <div class="panel-body">
	            <table class="table">
								<tr>
									<td>
										<b><?php echo translate('height')?> / <?=$this->lang->line('height'); ?></b>
									</td>
									<td>
										<?=$value->height.' '.translate('feet')?>
									</td>
									<td>
										<b><?php echo translate('weight')?> / <?=$this->lang->line('weight'); ?></b>
									</td>
									<td>
										<?=$physical_attributes[0]['weight']?>
									</td>
								</tr>
								<tr>
									<td>
										<b><?php echo translate('eye_color')?> / <?=$this->lang->line('eye_color'); ?></b>
									</td>
									<td>
										<?=$physical_attributes[0]['eye_color']?>
									</td>
									<td>
										<b><?php echo translate('hair_color')?> / <?=$this->lang->line('hair_color'); ?></b>
									</td>
									<td>
										<?=$physical_attributes[0]['hair_color']?>
									</td>
								</tr>
								<tr>
									<td>
										<b><?php echo translate('complexion')?> / <?=$this->lang->line('complexion'); ?></b>
									</td>
									<td>
										<?=$physical_attributes[0]['complexion']?>
									</td>
									<td>
										<b><?php echo translate('blood_group')?> / <?=$this->lang->line('blood_group'); ?></b>
									</td>
									<td>
										<?=$physical_attributes[0]['blood_group']?>
									</td>
								</tr>
								<tr>
									<td>
										<b><?php echo translate('body_type')?> / <?=$this->lang->line('body_type'); ?></b>
									</td>
									<td>
										<?=$physical_attributes[0]['body_type']?>
									</td>
									<td>
										<b><?php echo translate('body_art')?> / <?=$this->lang->line('body_art'); ?></b>
									</td>
									<td>
										<?=$physical_attributes[0]['body_art']?>
									</td>
								</tr>
								<tr>
									<td>
										<b><?php echo translate('any_disability')?> / <?=$this->lang->line('any_disability'); ?></b>
									</td>
									<td>
										<?=$physical_attributes[0]['any_disability']?>
									</td>
									<td>
										<b></b>
									</td>
									<td>

									</td>
								</tr>
							</table>
						</div>
					</div>
					<?php } ?>

          <?php
            if ($this->db->get_where('frontend_settings', array('type' => 'language'))->row()->value == "yes") {
          ?>
	        <div class="panel panel-dark">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo translate('language')?> / <?=$this->lang->line('language'); ?></h3>
            </div>
            <div class="panel-body">
              <table class="table">
								<tr>
									<td>
										<b><?php echo translate('mother_tongue')?> / <?=$this->lang->line('mother_tongue'); ?></b>
									</td>
									<td>
										<?=$this->Crud_model->get_type_name_by_id('language', $language[0]['mother_tongue']);?>
									</td>
									<td>
										<b><?php echo translate('language')?> / <?=$this->lang->line('language'); ?></b>
									</td>
									<td>
										<?=$this->Crud_model->get_type_name_by_id('language', $language[0]['language']);?>
									</td>
								</tr>
								<tr>
									<td>
										<b><?php echo translate('speak')?> / <?=$this->lang->line('speak'); ?></b>
									</td>
									<td>
										<?=$this->Crud_model->get_type_name_by_id('language', $language[0]['speak']);?>
									</td>
									<td>
										<b><?php echo translate('read')?> / <?=$this->lang->line('read'); ?></b>
									</td>
									<td>
										<?=$this->Crud_model->get_type_name_by_id('language', $language[0]['read']);?>
									</td>
								</tr>
							</table>
			      </div>
			    </div>
			  	<?php } ?>

          <?php
            if ($this->db->get_where('frontend_settings', array('type' => 'hobbies_and_interests'))->row()->value == "yes") {
          ?>
	        <div class="panel panel-dark">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo translate('hobbies_&_interest')?> / <?=$this->lang->line('hobbies_interest'); ?></h3>
            </div>
            <div class="panel-body">
              <table class="table">
								<tr>
									<td>
										<b><?php echo translate('hobby')?> / <?=$this->lang->line('hobby'); ?></b>
									</td>
									<td>
										<?=$hobbies_and_interest[0]['hobby']?>
									</td>
									<td>
										<b><?php echo translate('interest')?> / <?=$this->lang->line('interest'); ?></b>
									</td>
									<td>
										<?=$hobbies_and_interest[0]['interest']?>
									</td>
								</tr>
								<tr>
									<td>
										<b><?php echo translate('music')?> / <?=$this->lang->line('music'); ?></b>
									</td>
									<td>
										<?=$hobbies_and_interest[0]['music']?>
									</td>
									<td>
										<b><?php echo translate('books')?> / <?=$this->lang->line('books'); ?></b>
									</td>
									<td>
										<?=$hobbies_and_interest[0]['books']?>
									</td>
								</tr>
								<tr>
									<td>
										<b><?php echo translate('movie')?> / <?=$this->lang->line('movie'); ?></b>
									</td>
									<td>
										<?=$hobbies_and_interest[0]['movie']?>
									</td>
									<td>
										<b><?php echo translate('TV_show')?> / <?=$this->lang->line('tv_show'); ?></b>
									</td>
									<td>
										<?=$hobbies_and_interest[0]['tv_show']?>
									</td>
								</tr>
								<tr>
									<td>
										<b><?php echo translate('sports_show')?> / <?=$this->lang->line('sports_show'); ?></b>
									</td>
									<td>
										<?=$hobbies_and_interest[0]['sports_show']?>
									</td>
									<td>
										<b><?php echo translate('fitness_activity')?> / <?=$this->lang->line('fitness_activity'); ?></b>
									</td>
									<td>
										<?=$hobbies_and_interest[0]['fitness_activity']?>
									</td>
								</tr>
								<tr>
									<td>
										<b><?php echo translate('Food')?> / <?=$this->lang->line('food'); ?></b>
									</td>
									<td>
										<?=$hobbies_and_interest[0]['cuisine']?>
									</td>
									<td>
										<b><?php echo translate('dress_style')?> / <?=$this->lang->line('dress_style'); ?></b>
									</td>
									<td>
										<?=$hobbies_and_interest[0]['dress_style']?>
									</td>
								</tr>
							</table>
			      </div>
			    </div>
			    <?php } ?>

			    <?php
            if ($this->db->get_where('frontend_settings', array('type' => 'personal_attitude_and_behavior'))->row()->value == "yes") {
        	?>
	        <div class="panel panel-dark">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo translate('personal_attitude_&_behavior')?> / <?=$this->lang->line('personal_attitude_behavior'); ?></h3>
            </div>
            <div class="panel-body">
              <table class="table">
								<tr>
									<td>
										<b><?php echo translate('affection')?> / <?=$this->lang->line('affection'); ?></b>
									</td>
									<td>
										<?=$personal_attitude_and_behavior[0]['affection']?>
									</td>
									<td>
										<b><?php echo translate('humor')?> / <?=$this->lang->line('humor'); ?></b>
									</td>
									<td>
										<?=$personal_attitude_and_behavior[0]['humor']?>
									</td>
								</tr>
								<tr>
									<td>
										<b><?php echo translate('political_view')?> / <?=$this->lang->line('political_view'); ?></b>
									</td>
									<td>
										<?=$personal_attitude_and_behavior[0]['political_view']?>
									</td>
									<td>
										<b><?php echo translate('religious_service')?> / <?=$this->lang->line('religious_service'); ?></b>
									</td>
									<td>
										<?=$personal_attitude_and_behavior[0]['religious_service']?>
									</td>
								</tr>
							</table>
			      </div>
			    </div>
			  <?php } ?>

        <?php
          if ($this->db->get_where('frontend_settings', array('type' => 'residency_information'))->row()->value == "yes") {
        ?>

        <div class="panel panel-dark">
	        <div class="panel-heading">
	          <h3 class="panel-title"><?php echo translate('residency_information')?> / <?=$this->lang->line('residency_information'); ?></h3>
	        </div>
	        <div class="panel-body">
	          <table class="table">
							<tr>
								<td>
									<b><?php echo translate('birth_country')?> / <?=$this->lang->line('birth_country'); ?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $residency_information[0]['birth_country']);?>
								</td>
								<td>
									<b><?php echo translate('residency_country')?> / <?=$this->lang->line('residency_country'); ?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $residency_information[0]['residency_country']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('citizenship_country')?> / <?=$this->lang->line('citizenship_country'); ?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $residency_information[0]['citizenship_country']);?>
								</td>
								<td>
									<b><?php echo translate('grown_up_country')?> / <?=$this->lang->line('grown_up_country'); ?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $residency_information[0]['grow_up_country']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('immigration_status')?> / <?=$this->lang->line('immigration_status'); ?></b>
								</td>
								<td>
									<?=$residency_information[0]['immigration_status']?>
								</td>
								<td>
									<b></b>
								</td>
								<td>

								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php } ?>

              <?php
                if ($this->db->get_where('frontend_settings', array('type' => 'spiritual_and_social_background'))->row()->value == "yes") {
              ?>
			        <div class="panel panel-dark">
		            <div class="panel-heading">
		                <h3 class="panel-title"><?php echo translate('spiritual_&_social_background')?> / <?=$this->lang->line('spiritual_social_background'); ?></h3>
		            </div>
		            <div class="panel-body">
		              <table class="table">
										<tr>
											<td>
												<b><?php echo translate('religion')?> / <?=$this->lang->line('religion'); ?></b>
											</td>
											<td>
												<?=$this->Crud_model->get_type_name_by_id('religion', $spiritual_and_social_background[0]['religion']);?>
											</td>
											
										</tr>
										<tr>
											
											
											<td>
												<b><?php echo translate('Kula')?> / <?=$this->lang->line('kula'); ?></b>
											</td>
											<td>
												<?=$spiritual_and_social_background[0]['ethnicity']?>
											</td>
										</tr>
										<tr>
											<td>
												<b><?php echo translate('personal_value')?> / <?=$this->lang->line('personal_value'); ?></b>
											</td>
											<td>
												<?=$spiritual_and_social_background[0]['personal_value']?>
											</td>
											<td>
												<b><?php echo translate('family_value')?> / <?=$this->lang->line('family_value'); ?></b>
											</td>
											<td>
												<?=$this->Crud_model->get_type_name_by_id('family_value', $spiritual_and_social_background[0]['family_value']);?>
											</td>
										</tr>
										<tr>
											<td>
												<b><?php echo translate('community_value')?> / <?=$this->lang->line('community_value'); ?></b>
											</td>
											<td>
												<?=$spiritual_and_social_background[0]['community_value']?>
											</td>
											<td>
												<b><?php echo translate('family_status')?> / <?=$this->lang->line('family_status'); ?></b>
											</td>
											<td>
												<?=$this->Crud_model->get_type_name_by_id('family_status', $spiritual_and_social_background[0]['family_status']);?>
											</td>
										</tr>
										<tr>
											<td>
												<b><?php echo translate('Dosha')?> / <?=$this->lang->line('dosha'); ?></b>
											</td>
											<td>
												<?php $u_manglik=$spiritual_and_social_background[0]['u_manglik'];
                          if($u_manglik == 1){
                              echo "Yes";
                          }elseif($u_manglik == 2){
                              echo "No";
                          }
                          elseif($u_manglik == 3){
                              echo "I don't know";
                          }else{
                              echo " ";
                          }
                      	?>
											</td>
											<td>
												<b></b>
											</td>
											<td>

											</td>
										</tr>
									</table>
			          </div>
			        </div>
			        <?php  } ?>

			        <?php
                if ($this->db->get_where('frontend_settings', array('type' => 'life_style'))->row()->value == "yes") {
              ?>
			        <div class="panel panel-dark">
		            <div class="panel-heading">
		                <h3 class="panel-title"><?php echo translate('life_style')?> / <?=$this->lang->line('life_style'); ?></h3>
		            </div>
		            <div class="panel-body">
		              <table class="table">
										<tr>
											<td>
												<b><?php echo translate('diet')?> / <?=$this->lang->line('diet'); ?></b>
											</td>
											<td>
												<?=$life_style[0]['diet']?>
											</td>
											<td>
												<b><?php echo translate('drink')?> / <?=$this->lang->line('drink'); ?></b>
											</td>
											<td>
												<?=$this->Crud_model->get_type_name_by_id('decision', $life_style[0]['drink'])?>
											</td>
										</tr>
										<tr>
											<td>
												<b><?php echo translate('smoke')?> / <?=$this->lang->line('smoke'); ?></b>
											</td>
											<td>
												<?=$this->Crud_model->get_type_name_by_id('decision', $life_style[0]['smoke'])?>
											</td>
											
										</tr>
									</table>
			          </div>
			        </div>
			        <?php } ?>

              <?php
                if ($this->db->get_where('frontend_settings', array('type' => 'astronomic_information'))->row()->value == "yes") {
              ?>
			        <div class="panel panel-dark">
		            <div class="panel-heading">
		                <h3 class="panel-title"><?php echo translate('astronomic_information')?> / <?=$this->lang->line('astronomic_information'); ?></h3>
		            </div>
		            <div class="panel-body">
		              <table class="table">
										<tr>
											<td>
												<b><?php echo translate('raashi')?> / <?=$this->lang->line('raashi'); ?></b>
											</td>
											<td>
												<?=$astronomic_information[0]['sun_sign']?>
											</td>
											<td>
												<b><?php echo translate('nakshathra')?> / <?=$this->lang->line('nakshathra'); ?></b>
											</td>
											<td>
												<?=$astronomic_information[0]['moon_sign']?>
											</td>
										</tr>
										<tr>
											<td>
												<b><?php echo translate('time_of_birth')?> / <?=$this->lang->line('time_of_birth'); ?></b>
											</td>
											<td>
												<?=$astronomic_information[0]['time_of_birth']?>
											</td>
											<td>
												<b><?php echo translate('city_of_birth')?> / <?=$this->lang->line('city_of_birth'); ?></b>
											</td>
											<td>
												<?=$astronomic_information[0]['city_of_birth']?>
											</td>
										</tr>
									</table>
			         	</div>
			        </div>
			        <?php } ?>

              <?php
                if ($this->db->get_where('frontend_settings', array('type' => 'permanent_address'))->row()->value == "yes") {
              ?>
			        <div class="panel panel-dark">
		            <div class="panel-heading">
		              <h3 class="panel-title"><?php echo translate('permanent_address')?> / <?=$this->lang->line('permanent_address'); ?></h3>
		            </div>
		            <div class="panel-body">
		              <table class="table">
										<tr>
											<td>
												<b><?php echo translate('country')?> / <?=$this->lang->line('permanent_country'); ?></b>
											</td>
											<td>
												<?=$this->Crud_model->get_type_name_by_id('country', $permanent_address[0]['permanent_country']);?>
											</td>
											<td>
												<b><?php echo translate('state')?> / <?=$this->lang->line('permanent_state'); ?></b>
											</td>
											<td>
												<?=$this->Crud_model->get_type_name_by_id('state', $permanent_address[0]['permanent_state']);?>
											</td>
										</tr>
										<tr>
											<td>
												<b><?php echo translate('city')?> / <?=$this->lang->line('permanent_city'); ?></b>
											</td>
											<td>
												<?=$this->Crud_model->get_type_name_by_id('city', $permanent_address[0]['permanent_city']);?>
											</td>
											<td>
												<b><?php echo translate('postal-Code')?> / <?=$this->lang->line('postal_code'); ?></b>
											</td>
											<td>
												<?=$permanent_address[0]['permanent_postal_code']?>
											</td>
										</tr>
									</table>
			          </div>
			        </div>
			        <?php } ?>

              <?php
                if ($this->db->get_where('frontend_settings', array('type' => 'family_information'))->row()->value == "yes") {
              ?>
			        <div class="panel panel-dark">
		            <div class="panel-heading">
		                <h3 class="panel-title"><?php echo translate('family_information')?> / <?=$this->lang->line('family_information'); ?></h3>
		            </div>
		            <div class="panel-body">
		              <table class="table">
										<tr>
											<td>
												<b><?php echo translate('father')?> / <?=$this->lang->line('father'); ?></b>
											</td>
											<td>
												<?=$family_info[0]['father']?>
											</td>
											<td>
												<b><?php echo translate('mother')?> / <?=$this->lang->line('mother'); ?></b>
											</td>
											<td>
												<?=$family_info[0]['mother']?>
											</td>
										</tr>
										<tr>
											<td>
												<b><?php echo translate('brother_/_sister')?> / <?=$this->lang->line('brother_sister'); ?></b>
											</td>
											<td>
												<?=$family_info[0]['brother_sister']?>
											</td>
											<td>
												<b></b>
											</td>
											<td>

											</td>
										</tr>
										<tr>
										<td>
											<b><?php echo translate('wife') ?> / <?= $this->lang->line('wife'); ?></b>
										</td>
										<td>
											<?= $family_info[0]['wife'] ?>
										</td>
									</tr>
									<tr>
										<td>
											<b><?php echo translate('children') ?> / <?= $this->lang->line('children'); ?></b>
										</td>
										<td>
											<?= $family_info[0]['children'] ?>
										</td>
									</tr>

									</table>
			          </div>
			        </div>
			        <?php } ?>

              <?php
                if ($this->db->get_where('frontend_settings', array('type' => 'additional_personal_details'))->row()->value == "yes") {
              ?>
			        <div class="panel panel-dark">
		            <div class="panel-heading">
		              <h3 class="panel-title"><?php echo translate('additional_personal_details')?> / <?=$this->lang->line('additional_personal_details'); ?></h3>
		            </div>
		            <div class="panel-body">
		              <table class="table">
										<!-- <tr>
											<td>
												<b><?php echo translate('home_district')?> / <?=$this->lang->line('home_district'); ?></b>
											</td>
											<td>
												<?=$additional_personal_details[0]['home_district']?>
											</td>
											<td>
												<b><?php echo translate('family_residence')?> / <?=$this->lang->line('family_residence'); ?></b>
											</td>
											<td>
												<?=$additional_personal_details[0]['family_residence']?>
											</td>
										</tr>
										<tr>
											<td>
												<b><?php echo translate("father's_occupation")?> / <?=$this->lang->line('father_occupation'); ?></b>
											</td>
											<td>
												<?=$additional_personal_details[0]['fathers_occupation']?>
											</td>
											<td>
												<b><?php echo translate('special_circumstances')?> / <?=$this->lang->line('special_circumstances'); ?></b>
											</td>
											<td>
												<?=$additional_personal_details[0]['special_circumstances']?>
											</td>
										</tr> -->
										<tr>
									<td>
										<b><?php echo translate('anniversary')?> / <?=$this->lang->line('anniversary'); ?></b>
									</td>
									<td>
										<?=$additional_personal_details[0]['anniversary']?>
									</td>
								</tr>

									</table>
			          </div>
			        </div>
			        <?php } ?>


              <?php
                  if ($this->db->get_where('frontend_settings', array('type' => 'partner_expectation'))->row()->value == "yes") {
              ?>
			        <div class="panel panel-dark">
		            <div class="panel-heading">
		                <h3 class="panel-title"><?php echo translate('partner_expectation')?> / <?=$this->lang->line('partner_expectation'); ?></h3>
		            </div>
		            <div class="panel-body">
		              <table class="table">
									<tr>
										<td>
											<b><?php echo translate('general_requirement')?> / <?=$this->lang->line('general_requirement'); ?></b>
										</td>
										<td>
											<?=$partner_expectation[0]['general_requirement']?>
										</td>
										<td>
											<b><?php echo translate('age')?> / <?=$this->lang->line('age'); ?></b>
										</td>
										<td>
											<?=$partner_expectation[0]['partner_age']?>
										</td>
									</tr>
									<tr>
										<td>
											<b><?php echo translate('height')?> / <?=$this->lang->line('height'); ?></b>
										</td>
										<td>
											<?=$partner_expectation[0]['partner_height']?>
										</td>
										<td>
											<b><?php echo translate('weight')?> / <?=$this->lang->line('weight'); ?></b>
										</td>
										<td>
											<?=$partner_expectation[0]['partner_weight']?>
										</td>
									</tr>
									<tr>
										<td>
											<b><?php echo translate('marital_status')?> / <?=$this->lang->line('marital_status'); ?></b>
										</td>
										<td>
											<?=$this->Crud_model->get_type_name_by_id('marital_status', $partner_expectation[0]['partner_marital_status'])?>
										</td>
										<td>
											<b><?php echo translate('with_children_acceptables')?> / <?=$this->lang->line('with_children_acceptables'); ?></b>
										</td>
										<td>
											<?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation[0]['with_children_acceptables'])?>
										</td>
									</tr>
									<tr>
										<td>
											<b><?php echo translate('country_of_residence')?> / <?=$this->lang->line('country_of_residence'); ?></b>
										</td>
										<td>
											<?=$this->Crud_model->get_type_name_by_id('country', $partner_expectation[0]['partner_country_of_residence'])?>
										</td>
										<td>
											<b><?php echo translate('religion')?> / <?=$this->lang->line('religion'); ?></b>
										</td>
										<td>
											<?=$this->Crud_model->get_type_name_by_id('religion', $partner_expectation[0]['partner_religion'])?>
										</td>
									</tr>
									<tr>
										<td>
											<b><?php echo translate('sub_caste')?> / <?=$this->lang->line('sub_caste'); ?></b>
										</td>
										<td>
											<?=$this->Crud_model->get_type_name_by_id('sub_caste', $partner_expectation[0]['partner_sub_caste'], 'sub_caste_name');?>
										</td>
										<td>
											<b><?php echo translate('caste_/_sect')?> / <?=$this->lang->line('caste_sect'); ?></b>
										</td>
										<td>
											<?=$this->Crud_model->get_type_name_by_id('caste', $partner_expectation[0]['partner_caste'], 'caste_name');?>
										</td>
									</tr>
									<tr>
										<td>
											<b><?php echo translate('education')?> / <?=$this->lang->line('education'); ?></b>
										</td>
										<td>
											<?=$partner_expectation[0]['partner_education']?>
										</td>
										<td>
											<b><?php echo translate('profession')?> / <?=$this->lang->line('profession'); ?></b>
										</td>
										<td>
											<?=$partner_expectation[0]['partner_profession']?>
										</td>
									</tr>
									<tr>
										<td>
											<b><?php echo translate('drinking_habits')?> / <?=$this->lang->line('drinking_habits'); ?></b>
										</td>
										<td>
											<?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation[0]['partner_drinking_habits'])?>
										</td>
										<td>
											<b><?php echo translate('smoking_habits')?> / <?=$this->lang->line('smoking_habits'); ?></b>
										</td>
										<td>
											<?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation[0]['partner_smoking_habits'])?>
										</td>
									</tr>
									<tr>
										<td>
											<b><?php echo translate('diet')?> / <?=$this->lang->line('diet'); ?></b>
										</td>
										<td>
											<?=$partner_expectation[0]['partner_diet']?>
										</td>
										<td>
											<b><?php echo translate('body_type')?> / <?=$this->lang->line('body_type'); ?></b>
										</td>
										<td>
											<?=$partner_expectation[0]['partner_body_type']?>
										</td>
									</tr>
									<tr>
										<td>
											<b><?php echo translate('personal_value')?> / <?=$this->lang->line('personal_value'); ?></b>
										</td>
										<td>
											<?=$partner_expectation[0]['partner_personal_value']?>
										</td>
										<td>
											<b><?php echo translate('Dosha')?> / <?=$this->lang->line('dosha'); ?></b>
										</td>
										<td>
											<?php $manglik=$partner_expectation[0]['manglik'];
			                                    if($manglik == 1){
			                                        echo "Yes";
			                                    }elseif($manglik == 2){
			                                        echo "No";
			                                    }
			                                    elseif($manglik == 3){
			                                        echo "I don't know";
			                                    }else{
			                                        echo " ";
			                                    }
			                                ?>
										</td>
									</tr>
									<tr>
										<td>
											<b><?php echo translate('any_disability')?> / <?=$this->lang->line('any_disability'); ?></b>
										</td>
										<td>
											<?=$partner_expectation[0]['partner_any_disability']?>
										</td>
										<td>
											<b><?php echo translate('mother_tongue')?> / <?=$this->lang->line('mother_tongue'); ?></b>
										</td>
										<td>
											<?=$this->Crud_model->get_type_name_by_id('language', $partner_expectation[0]['partner_mother_tongue'])?>
										</td>
									</tr>
									<tr>
										<td>
											<b><?php echo translate('family_value')?> / <?=$this->lang->line('family_value'); ?></b>
										</td>
										<td>
											<?=$partner_expectation[0]['partner_family_value']?>
										</td>
										<td>
											<b><?php echo translate('preferred_country')?> / <?=$this->lang->line('preferred_country'); ?></b>
										</td>
										<td>
											<?=$this->Crud_model->get_type_name_by_id('country', $partner_expectation[0]['prefered_country'])?>
										</td>
									</tr>
									<tr>
										<td>
											<b><?php echo translate('preferred_state')?> / <?=$this->lang->line('preferred_state'); ?></b>
										</td>
										<td>
											<?=$this->Crud_model->get_type_name_by_id('state', $partner_expectation[0]['prefered_state']);?>
										</td>
										<td>
											<b><?php echo translate('preferred_status')?> / <?=$this->lang->line('preferred_status'); ?></b>
										</td>
										<td>
											<?=$partner_expectation[0]['prefered_status']?>
										</td>
									</tr>
									<tr>
										<td>
											<b><?php echo translate('complexion')?> / <?=$this->lang->line('complexion'); ?></b>
										</td>
										<td>
											<?=$partner_expectation[0]['partner_complexion']?>
										</td>
										<td>
											<b></b>
										</td>
										<td>

										</td>
									</tr>
								</table>
			          </div>
			        </div>
			        <?php
                        }
                    ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    function delete_member(id){
	    $("#delete_member").val(id);
	}

	function deleteAMember() {
		$.ajax({
		    url: "<?=base_url()?>admin/member_delete/"+$("#delete_member").val(),
		    success: function(response) {
				window.location.href = "<?=base_url()?>admin/members/<?=$parameter?>";
		    },
			fail: function (error) {
			    alert(error);
			}
		});
	}
</script>

<div class="modal fade" id="delete_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title"><?php echo translate('confirm_delete')?></h4>
            </div>
           	<!--Modal body-->
            <div class="modal-body">
            	<p><?php echo translate('are_you_sure_you_want_to_delete_this_data?')?></p>
            	<div class="text-right">
            		<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close"><?php echo translate('close')?></button>
                	<button class="btn btn-danger btn-sm" id="delete_member" onclick="deleteAMember()"value=""><?php echo translate('delete')?></button>
            	</div>
            </div>

        </div>
    </div>
</div>
