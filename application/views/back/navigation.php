<!--MAIN NAVIGATION-->
<!--===================================================-->
<nav id="mainnav-container">
<div id="mainnav">
	<!--Menu-->
	<!--================================-->
	<div id="mainnav-menu-wrap">
		<div class="nano">
			<div class="nano-content">
				<ul id="mainnav-menu" class="list-group">
					<li <?php if($page_name=="dashboard"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin">
							<i class="fa fa-home"></i>
							<span class="menu-title"><?php echo translate('dashboard')?></span>
						</a>
					</li><?php
					if ($this->Crud_model->admin_permission('members'))
					{ ?>
						<li <?php if( $page_name=="free_members"
										||$page_name=="premium_members"
										||$page_name=="national_members"
										||$page_name=="ngb_members"
										||$page_name=="guest_members"
											|| $page_name == "deleted_member"
												|| $page_name=="add_member"
													|| $page_name=="bulk_member_add"
														|| $page_name == "member_profile_pic_approval"
									){ ?> class="active-sub active" <?php } ?>>
							<a href="#">
								<i class="fa fa-users"></i>
								<span class="menu-title"><?php echo translate('members')?></span>
								<i class="arrow"></i>
							</a>
							<!--Submenu-->
							<ul class="collapse">
								<?php if ($this->Crud_model->admin_permission('free_members')){ ?>
									<li <?php if($page_name=="free_members"){ ?> class="active-link" <?php } ?>>
										<a href="<?=base_url()?>admin/members/free_members"><i class="fa fa-user-o"></i><?php echo translate('visitors')?></a>
									</li>
								<?php } if ($this->Crud_model->admin_permission('guest_members')){ ?>
									<li <?php if($page_name=="guest_members"){ ?> class="active-link" <?php } ?>>
										<a href="<?=base_url()?>admin/members/guest_members"><i class="fa fa-user-o"></i><?php echo translate('Guests')?></a>
									</li>
								<?php } if ($this->Crud_model->admin_permission('ngb_members')){ ?>
									<li <?php if($page_name=="ngb_members"){ ?> class="active-link" <?php } ?>>
										<a href="<?=base_url()?>admin/members/ngb_members"><i class="fa fa-user-o"></i><?php echo translate('NGB Members')?></a>
									</li>
								<?php } if ($this->Crud_model->admin_permission('national_members')){ ?>
									<li <?php if($page_name=="national_members"){ ?> class="active-link" <?php } ?>>
										<a href="<?=base_url()?>admin/members/national_members"><i class="fa fa-user-o"></i><?php echo translate('National Members')?></a>
									</li>
									
								<?php } if ($this->Crud_model->admin_permission('premium_members')){?>
									<li <?php if($page_name=="mahamandali_members"){ ?> class="active-link" <?php } ?>>
										<a href="<?=base_url()?>admin/members/premium_members"><i class="fa fa-user"></i><?php echo translate('registered_members')?></a>
									</li>
								<?php } if ($this->Crud_model->admin_permission('add_members')){?>
									<li <?php if($page_name=="add_member"){ ?> class="active-link" <?php } ?>>
										<a href="<?=base_url()?>admin/members/add_member"><i class="fa fa-address-card"></i><?php echo translate('add_member')?></a>
									</li>
								<?php } if ($this->Crud_model->admin_permission('bulk_member_add')){?>
									<li <?php if($page_name=="bulk_member_add"){ ?> class="active-link" <?php } ?>>
										<a href="<?=base_url()?>admin/bulk_member_add"><i class="fa fa-address-card"></i><?php echo translate('bulk_member_add')?></a>
									</li>
								<?php } if ($this->Crud_model->admin_permission('deleted_members')){?>
									<li <?php if($page_name=="deleted_member"){ ?> class="active-link" <?php } ?>>
										<a href="<?=base_url()?>admin/deleted_members"><i class="fa fa-user-times"></i><?php echo translate('deleted_members')?></a>
									</li>
								<?php } ?>
								<?php
									$profile_pic_approval = $this->db->get_where('general_settings', array('type' => 'member_profile_pic_approval_by_admin'))->row()->value;
									if($this->Crud_model->admin_permission('member_profile_pic_approval') && $profile_pic_approval == 'on'){ ?>
										<li <?php if($page_name=="member_profile_pic_approval"){ ?> class="active-link" <?php } ?>>
											<a href="<?=base_url()?>admin/member_profile_image_approval"><i class="fa fa-image"></i><?php echo translate('profile_pic_approval')?></a>
										</li>
								<?php } ?>
							</ul>
						</li>
					<?php } ?>
					<?php
					if ($this->Crud_model->admin_permission('premium_plans')){
                            ?>
					<li <?php if($page_name=="packages"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin/packages">
							<i class="fa fa-book"></i>
							<span class="menu-title"><?php echo translate('membership_fees')?></span>
						</a>
					</li>
					<?php }
						if ($this->Crud_model->admin_permission('channel_partner')){
                            ?>
					<li <?php if($page_name=="channel_partner"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin/channel_partner">
							<i class="fa fa-toggle-right"></i>
							<span class="menu-title"><?php echo translate('committee_members')?></span>
						</a>
					</li>
							<?php }
					if ($this->Crud_model->admin_permission('blogs')){
                            ?>
					<li <?php if($page_name=="blog_page"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin/blog">
							<i class="fa fa-vcard"></i>
							<span class="menu-title"><?php echo translate('blogs')?></span>
						</a>
					</li>
					<!--<?php } if ($this->Crud_model->admin_permission('astro_tips')){?>-->
					<!--<li <?php if($page_name=="astro_tips"){ ?> class="active-link" <?php } ?>>-->
					<!--	<a href="<?=base_url()?>admin/astro_tips">-->
					<!--		<i class="fa fa-vcard"></i>-->
					<!--		<span class="menu-title"><?php echo translate('astro_tips')?></span>-->
					<!--	</a>-->
					<!--</li>-->
					
					<!--<li <?php if($page_name=="marriage_application_details"){ ?> class="active-link" <?php } ?>>-->
					<!--	<a href="<?=base_url()?>admin/marriage_application_details">-->
					<!--		<i class="fa fa-picture-o"></i>-->
					<!--		<span class="menu-title"><?php echo translate('marriage_application_details')?></span>-->
					<!--	</a>-->
					<!--</li>-->
					
					<!--<li <?php if($page_name=="offers"){ ?> class="active-link" <?php } ?>>-->
					<!--	<a href="<?=base_url()?>admin/offers">-->
					<!--		<i class="fa fa-usd"></i>-->
					<!--		<span class="menu-title"><?php echo translate('Offers')?></span>-->
					<!--	</a>-->
					<!--</li>-->
					
					<li <?php if($page_name=="guruji_photo"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin/guruji_photos">
							<i class="fa fa-picture-o"></i>
							<span class="menu-title"><?php echo translate('guruji_photos')?></span>
						</a>
					</li>
					
					
					
					<?php }
					if ($this->Crud_model->admin_permission('stories')){?>
					<li <?php if($page_name=="stories"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin/stories">
							<i class="fa fa-picture-o"></i>
							<span class="menu-title"><?php echo translate('latest_events')?></span>
						</a>
					</li>
					<?php } if ($this->Crud_model->admin_permission('earnings')){ ?>
					<li <?php if($page_name=="earnings"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin/earnings">
							<i class="fa fa-usd"></i>
							<span class="menu-title"><?php echo translate('earnings')?></span>
						</a>
					</li>
					<?php } if ($this->Crud_model->admin_permission('contact_messages')){ ?>
					<li <?php if($page_name=="contact_messages" || $page_name=="newsletter" ){ ?> class="active-sub active" <?php } ?>>
						<a href="#">
							<i class="fa fa-users"></i>
							<span class="menu-title"><?php echo translate('messaging')?></span>
							<i class="arrow"></i>
						</a>
						<!--Submenu-->
						<ul class="collapse">
							<?php if ($this->Crud_model->admin_permission('contact_messages')){ ?>
								<li <?php if($page_name=="contact_messages"){ ?> class="active-link" <?php } ?>>
									<a href="<?=base_url()?>admin/contact_messages">
										<i class="fa fa-user-o"></i>
										<?php echo translate('contact_messages')?></a>
								</li>
							<?php } ?>
							<li <?php if($page_name=="newsletter"){ ?> class="active-link" <?php } ?>>
								<a href="<?=base_url()?>admin/newsletter">
									<i class="fa fa-envelope-o"></i>
									<?php echo translate('newsletter')?></a>
							</li>
						</ul>
					</li>
					<?php } ?>

					<?php if ($this->Crud_model->admin_permission('general_settings')){ ?>
					<li <?php if($page_name=="general_settings"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin/general_settings">
							<i class="fa fa-cog"></i>
							<span class="menu-title"><?php echo translate('general_settings')?></span>
						</a>
					</li>
					<?php } if ($this->Crud_model->admin_permission('frontend_settings')){?>
					<li <?php if($page_name=="header"||$page_name=="pages"||$page_name=="footer"||$page_name=="theme_color_settings"){ ?> class="active-sub active" <?php } ?>>
						<a href="#">
							<i class="fa fa-desktop"></i>
							<span class="menu-title"><?php echo translate('frontend_settings')?></span>
							<i class="arrow"></i>
						</a>
						<!--Submenu-->
						<ul class="collapse">
							<?php if ($this->Crud_model->admin_permission('choose_theme_color')){?>
							<li <?php if($page_name=="theme_color_settings"){ ?> class="active-link" <?php } ?>>
								<a href="<?=base_url()?>admin/theme_color_settings"><i class="fa fa-paint-brush"></i><?php echo translate('choose_theme_color')?></a>
							</li>
							<?php } if ($this->Crud_model->admin_permission('frontend_appearances')){?>
							<li <?php if($page_name=="header"||$page_name=="pages"||$page_name=="footer"){ ?> class="active-sub active" <?php } ?>>
								<a href="<?=base_url()?>admin/frontend_appearances"><i class="fa fa-window-restore"></i><?php echo translate('frontend_appearances')?><i class="arrow"></i></a>
								<!--Submenu-->
								<ul class="collapse">
									<?php if ($this->Crud_model->admin_permission('header')){?>
									<li <?php if($page_name=="header"){ ?> class="active-link" <?php } ?>>
										<a href="<?=base_url()?>admin/frontend_appearances/header"><i class="fa fa-circle-o"></i><?php echo translate('header')?></a>
									</li>
									<?php } if ($this->Crud_model->admin_permission('pages')){?>
									<li  <?php if($page_name=="pages"){ ?> class="active-link" <?php } ?>>
										<a href="<?=base_url()?>admin/frontend_appearances/pages"><i class="fa fa-circle-o"></i><?php echo translate('pages')?></a>
									</li>
									<?php } if ($this->Crud_model->admin_permission('footer')){?>
									<li  <?php if($page_name=="footer"){ ?> class="active-link" <?php } ?>>
										<a href="<?=base_url()?>admin/frontend_appearances/footer"><i class="fa fa-circle-o"></i><?php echo translate('footer')?></a>
									</li>
									<?php } ?>
								</ul>
							</li>
							<?php } ?>
						</ul>
					</li>
					<?php } if ($this->Crud_model->admin_permission('configuration')){?>
					<li <?php if($page_name=="religion" ||
									$page_name=="caste" ||
										$page_name=="sub_caste" ||
											$page_name=="language" ||
												$page_name=="country" ||
													$page_name=="state" ||
														$page_name=="city" ||
															$page_name=="family_value" ||
																$page_name=="family_status" ||
																	$page_name=="payments" ||
																		$page_name=="social_media_comments" ||
																			$page_name=="faq" ||
																				$page_name=="email_setup" ||
																					$page_name=="captcha_settings" ||
																						$page_name=="social_media_login" ||
																							$page_name=="google_analytics_settings" ||
																								$page_name=="facebook_chat_settings" ||
																									$page_name=="msg91" ||
																										$page_name=="twilio" ||
																											$page_name=="on_behalf" ||
																												$page_name=="currency_configure" ||
																													$page_name=="currency_set" ||
																														$page_name=="profile_sections" ){ ?>
																														 class="active-sub active" <?php } ?>>
						<a href="#">
							<i class="fa fa-cogs"></i>
							<span class="menu-title"><?php echo translate('configurations')?></span>
							<i class="arrow"></i>
						</a>
						<!--Submenu-->
						<ul class="collapse">
							<?php if ($this->Crud_model->admin_permission('member_profile')){?>
							<li <?php if($page_name=="religion"|| $page_name=="caste"|| $page_name=="sub_caste" || $page_name=="language"||$page_name=="country"||$page_name=="state"||$page_name=="city"||$page_name=="family_value" ||$page_name=="family_status" ||$page_name=="on_behalf" ){ ?> class="active-sub active" <?php } ?>>
								<a href="#"><i class="fa fa-user-plus"></i><?php echo translate('profile_attributes')?><i class="arrow"></i></a>
								<!--Submenu-->
								<ul class="collapse">
									<?php
	                if ($this->db->get_where('frontend_settings', array('type' => 'spiritual_and_social_background'))->row()->value == "yes") {
	                ?>
										<?php if ($this->Crud_model->admin_permission('religion')){?>
										<li <?php if($page_name=="religion"){ ?> class="active-link" <?php } ?>>
											<a href="<?=base_url()?>admin/religion"><i class="fa fa-circle-o"></i><?php echo translate('religion')?></a>
										</li>
										<?php } if ($this->Crud_model->admin_permission('caste')){?>
										<li <?php if($page_name=="caste"){ ?> class="active-link" <?php } ?>>
											<a href="<?=base_url()?>admin/caste"><i class="fa fa-circle-o"></i><?php echo translate('caste')?></a>
										</li>
										<?php } if ($this->Crud_model->admin_permission('sub_caste')){?>
										<li <?php if($page_name=="sub_caste"){ ?> class="active-link" <?php } ?>>
											<a href="<?=base_url()?>admin/sub_caste"><i class="fa fa-circle-o"></i><?php echo translate('sub_-Caste')?></a>
										</li>
									<?php } ?>
									<?php
			                if ($this->db->get_where('frontend_settings', array('type' => 'language'))->row()->value == "yes") {
			                ?>
										<?php } if ($this->Crud_model->admin_permission('language')){?>
										<li  <?php if($page_name=="language"){ ?> class="active-link" <?php } ?>>
											<a href="<?=base_url()?>admin/language"><i class="fa fa-circle-o"></i><?php echo translate('language')?></a>
										</li>
									<?php } }?>
									<?php
						                if ($this->db->get_where('frontend_settings', array('type' => 'present_address'))->row()->value == "yes") {
						                ?>
										<?php if ($this->Crud_model->admin_permission('country')){?>
										<li  <?php if($page_name=="country"){ ?> class="active-link" <?php } ?>>
											<a href="<?=base_url()?>admin/country"><i class="fa fa-circle-o"></i><?php echo translate('country')?></a>
										</li>
										<?php } if ($this->Crud_model->admin_permission('state')){?>
										<li  <?php if($page_name=="state"){ ?> class="active-link" <?php } ?>>
											<a href="<?=base_url()?>admin/state"><i class="fa fa-circle-o"></i><?php echo translate('state')?></a>
										</li>

									<!-- <?php } if ($this->Crud_model->admin_permission('family_value')){?> -->

										<?php } if ($this->Crud_model->admin_permission('city')){?>
										<li  <?php if($page_name=="city"){ ?> class="active-link" <?php } ?>>
											<a href="<?=base_url()?>admin/city"><i class="fa fa-circle-o"></i><?php echo translate('city')?></a>
										</li>
										<?php } ?>
								<?php } ?>
								<?php
	                if ($this->db->get_where('frontend_settings', array('type' => 'spiritual_and_social_background'))->row()->value == "yes") {
	                ?>
									<!--<li <?php if($page_name=="family_value"){ ?> class="active-link" <?php } ?>>-->
									<!--	<a href="<?=base_url()?>admin/family_value"><i class="fa fa-circle-o"></i><?php echo translate('family_value')?></a>-->
									<!--</li>-->
									<!--<li <?php if($page_name=="family_status"){ ?> class="active-link" <?php } ?>>-->
									<!--	<a href="<?=base_url()?>admin/family_status"><i class="fa fa-circle-o"></i><?php echo translate('family_status')?></a>-->
									<!--</li>-->
									<?php } ?>
									<!--<li <?php if($page_name=="on_behalf"){ ?> class="active-link" <?php } ?>>-->
									<!--	<a href="<?=base_url()?>admin/on_behalf"><i class="fa fa-circle-o"></i><?php echo translate('on_behalf')?></a>-->
									<!--</li>-->
									<!-- <li  <?php if($page_name=="occupation"){ ?> class="active-link" <?php } ?>>
										<a href="<?=base_url()?>admin/occupation"><i class="fa fa-circle-o"></i><?php echo translate('occupation')?></a>
									</li> -->
								</ul>
							</li>
							<?php } if ($this->Crud_model->admin_permission('profile_sections')){?>
								<li <?php if($page_name=="profile_sections"){ ?> class="active-link" <?php } ?>>
									<a href="<?=base_url()?>admin/profile_sections"><i class="fa fa-address-card-o"></i><?php echo translate('profile_sections')?></a>
								</li>
							<?php } if ($this->Crud_model->admin_permission('social_media_comments')){?>
								<li <?php if($page_name=="social_media_comments"){ ?> class="active-link" <?php } ?>>
									<a href="<?=base_url()?>admin/social_media_comments"><i class="fa fa-comments-o"></i><?php echo translate('social_media_comments')?></a>
								</li>
							<?php } if ($this->Crud_model->admin_permission('payments')){?>
								<li <?php if($page_name=="payments"){ ?> class="active-link" <?php } ?>>
									<a href="<?=base_url()?>admin/payments"><i class="fa fa-credit-card-alt"></i><?php echo translate('payments')?></a>
								</li>
							<?php } if ($this->Crud_model->admin_permission('email_setup')){?>
								<li <?php if($page_name=="email_setup"){ ?> class="active-link" <?php } ?>>
									<a href="<?=base_url()?>admin/email_setup"><i class="fa fa-envelope"></i><?php echo translate('email_setup')?></a>
								</li>
							<?php } if ($this->Crud_model->admin_permission('currency_settings')){?>
								<li <?php if($page_name=="currency_configure" || $page_name=="currency_set"){ ?> class="active-sub active" <?php } ?>>
									<a href="<?=base_url()?>admin/"><i class="fa fa-money"></i><?php echo translate('currency_settings')?><i class="arrow"></i></a>
									<!--Submenu-->
									<ul class="collapse">
										<li <?php if($page_name=="currency_configure" ){ ?> class="active-link" <?php } ?>>
											<a href="<?=base_url()?>admin/currency_settings/currency_configure"><i class="fa fa-circle-o"></i><?php echo translate('configure')?></a>
										</li>
										<li <?php if($page_name=="currency_set"){ ?> class="active-link" <?php } ?>>
											<a href="<?=base_url()?>admin/currency_settings/currency_set"><i class="fa fa-circle-o"></i><?php echo translate('all_currencies')?></a>
										</li>
									</ul>
								</li>
							<?php } if ($this->Crud_model->admin_permission('captcha_settings')){?>
								<li <?php if($page_name=="captcha_settings"){ ?> class="active-link" <?php } ?>>
									<a href="<?=base_url()?>admin/captcha_settings"><i class="fa fa-retweet"></i><?php echo translate('captcha_settings')?></a>
								</li>
							<?php } if ($this->Crud_model->admin_permission('social_media_login_settings')){?>
								<li <?php if($page_name=="social_media_login"){ ?> class="active-link" <?php } ?>>
									<a href="<?=base_url()?>admin/social_media_login"><i class="fa fa-facebook-square"></i><?php echo translate('social_media_login')?></a>
								</li>
							<?php } if ($this->Crud_model->admin_permission('google_analytics_settings')){?>
								<li <?php if($page_name=="google_analytics_settings"){ ?> class="active-link" <?php } ?>>
									<a href="<?=base_url()?>admin/google_analytics_settings"><i class="fa fa-bar-chart"></i><?php echo translate('google_analytics_settings')?></a>
								</li>
							<?php } if ($this->Crud_model->admin_permission('facebook_chat_settings')){?>
								<li <?php if($page_name=="facebook_chat_settings"){ ?> class="active-link" <?php } ?>>
									<a href="<?=base_url()?>admin/facebook_chat_settings"><i class="fa fa-facebook-square"></i><?php echo translate('facebook_chat_settings')?></a>
								</li>
							<?php } if ($this->Crud_model->admin_permission('sms_settings')){?>
								<li <?php if($page_name=="twilio" || $page_name=="msg91"){ ?> class="active-sub active" <?php } ?>>
									<a href="<?=base_url()?>admin/sms_settings"><i class="fa fa-window-restore"></i><?php echo translate('sms_settings')?><i class="arrow"></i></a>
									<!--Submenu-->
									<ul class="collapse">
										<li <?php if($page_name=="twilio" ){ ?> class="active-link" <?php } ?>>
											<a href="<?=base_url()?>admin/sms_settings/twilio"><i class="fa fa-circle-o"></i><?php echo translate('twilio')?></a>
										</li>
										<li <?php if($page_name=="msg91"){ ?> class="active-link" <?php } ?>>
											<a href="<?=base_url()?>admin/sms_settings/msg91"><i class="fa fa-circle-o"></i><?php echo translate('msg91')?></a>
										</li>
									</ul>
								</li>
							<?php } if ($this->Crud_model->admin_permission('faq')){?>
								<li <?php if($page_name=="faq"){ ?> class="active-link" <?php } ?>>
									<a href="<?=base_url()?>admin/faq"><i class="fa fa-question-circle"></i><?php echo translate('FAQ')?></a>
								</li>
							<?php } ?>
						</ul>
					</li>
					<?php } if ($this->Crud_model->admin_permission('send_sms')){?>
					<li <?php if($page_name=="send_sms"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin/send_sms">
							<i class="fa fa-mobile"></i>
							<span class="menu-title"><?php echo translate('send_SMS')?></span>
						</a>
					</li>
					<?php } if ($this->Crud_model->admin_permission('language')){?>
					<li <?php if($page_name=="manage_language"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin/manage_language">
							<i class="fa fa-language"></i>
							<span class="menu-title"><?php echo translate('language')?></span>
						</a>
					</li>
					<?php } if ($this->Crud_model->admin_permission('manage_admin')){?>
					<li <?php if($page_name=="manage_admin"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin/manage_admin">
							<i class="fa fa-lock"></i>
							<span class="menu-title"><?php echo translate('manage_admin_profile')?></span>
						</a>
					</li>
					<?php } if ($this->Crud_model->admin_permission('seo_settings')){?>
					<li <?php if($page_name=="seo_settings"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin/seo_settings">
							<i class="fa fa-search"></i>
							<span class="menu-title"><?php echo translate('SEO_settings')?></span>
						</a>
					</li>
				 <?php } if ($this->Crud_model->admin_permission('staffs_panel')){?>
					<li <?php if ($page_name == "role" || $page_name == "admin") { ?> class="active-link" <?php } ?> >
                        <a href="#">
                            <i class="fa fa-user-circle"></i>
                            <span class="menu-title">
                                <?php echo translate('staffs_panel'); ?>
                            </span>
                            <i class="fa arrow"></i>
                        </a>
                        <ul class="collapse <?php if ($page_name == "admin" || $page_name == "role") { ?> in <?php } ?>" >
                            <?php if ($this->Crud_model->admin_permission('all_staffs')){?>
                            <li <?php if ($page_name == "admin") { ?> class="active-link" <?php } ?> >
                                <a href="<?php echo base_url(); ?>admin/admins/">
                                    <i class="fa fa-users"></i>
                        			<?php echo translate('all_staffs'); ?>
                                </a>
                            </li>
                            <?php } if ($this->Crud_model->admin_permission('manage_roles')){?>
                            <li <?php if ($page_name == "role") { ?> class="active-link" <?php } ?> >
                                <a href="<?php echo base_url(); ?>admin/role/">
                                    <i class="fa fa-sliders"></i>
                            <?php echo translate('manage_roles'); ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
				<?php } ?>
				<?php if($this->session->userdata('admin_id') == 1 ){ ?>
					<li <?php if($page_name=="backup"){ ?> class="active-link" <?php } ?>>
						<a href="<?php echo base_url(); ?>admin/backup/">
							<i class="fa fa-shopping-basket"></i>
							<span class="menu-title"><?php echo translate('backup')?></span>
						</a>
					</li>
					<li <?php if($page_name=="update"){ ?> class="active-link" <?php } ?>>
						<a href="<?php echo base_url(); ?>admin/update/" >
							<i class="fa fa-check-square-o"></i>
							<span class="menu-title"><?php echo translate('update')?></span>
						</a>
					</li>
					
					<?php } if ($this->Crud_model->admin_permission('staffs_panel')){?>
					<li <?php if ($page_name == "role" || $page_name == "network") { ?> class="active-link" <?php } ?> >
                        <a href="#">
                            <i class="fa fa-user-circle"></i>
                            <span class="menu-title">
                                <?php echo translate('network'); ?>
                            </span>
                            <i class="fa arrow"></i>
                        </a>
                        <ul class="collapse <?php if ($page_name == "network" ) { ?> in <?php } ?>" >
                            <?php if ($this->Crud_model->admin_permission('all_staffs')){?>
                            <li <?php if ($page_name == "network") { ?> class="active-link" <?php } ?> >
                                <a href="<?php echo base_url(); ?>admin/network">
                                    <i class="fa fa-user"></i>
                        			<?php echo translate('profile'); ?>
                                </a>
                            </li>
                            <?php } if ($this->Crud_model->admin_permission('manage_roles')){?>
                            <li <?php if ($page_name == "group") { ?> class="active-link" <?php } ?> >
                                <a href="<?php echo base_url(); ?>admin/network_group">
                                    <i class="fa fa-users"></i>
                            <?php echo translate('groups'); ?>
                                </a>
                            </li>
                            <?php } if ($this->Crud_model->admin_permission('manage_roles')){?>
                            <li <?php if ($page_name == "role") { ?> class="active-link" <?php } ?> >
                                <a href="<?php echo base_url(); ?>admin/network_connection">
                                    <i class="fa fa-sliders"></i>
                            <?php echo translate('connection'); ?>
                                </a>
                            </li>
                            <?php } if ($this->Crud_model->admin_permission('manage_roles')){?>
                            <li <?php if ($page_name == "role") { ?> class="active-link" <?php } ?> >
                                <a href="<?php echo base_url(); ?>admin/network_testimonials">
                                    <i class="fa fa-comments"></i>
                            <?php echo translate('testimonials'); ?>
                                </a>
                            </li>
                            <?php } if ($this->Crud_model->admin_permission('manage_roles')){?>
                            <li <?php if ($page_name == "role") { ?> class="active-link" <?php } ?> >
                                <a href="<?php echo base_url(); ?>admin/network_picture">
                                    <i class="fa fa-picture-o"></i>
                            <?php echo translate('picture_gallery'); ?>
                                </a>
                            </li>
                            <?php }?>
                        </ul>
                    </li>
				<?php  ?>
					<?php } if ($this->Crud_model->admin_permission('staffs_panel')){?>
					<li <?php if ($page_name == "chapter" || $page_name == "operation") { ?> class="active-link" <?php } ?> >
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span class="menu-title">
                                <?php echo translate('operation'); ?>
                            </span>
                            <i class="fa arrow"></i>
                        </a>
                        <ul class="collapse <?php if ($page_name == "operation" || $page_name == "chapter") { ?> in <?php } ?>" >
                            
                            <li <?php if ($page_name == "operation") { ?> class="active-link" <?php } ?> >
                                <a href="<?php echo base_url(); ?>admin/operations">
                                    <i class="fa fa-user"></i>
                        			<?php echo translate('chapter'); ?>
                                </a>
                            </li>
                            
                            
                            
                        </ul>
                    </li>
					<li <?php if ($page_name == "role" || $page_name == "report") { ?> class="active-link" <?php } ?> >
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span class="menu-title">
                                <?php echo translate('report'); ?>
                            </span>
                            <i class="fa arrow"></i>
                        </a>
                        <ul class="collapse <?php if ($page_name == "report" || $page_name == "chapter") { ?> in <?php } ?>" >
                           
                            <li <?php if ($page_name == "report") { ?> class="active-link" <?php } ?> >
                                <a href="<?php echo base_url(); ?>admin/report">
                                    <i class="fa fa-user"></i>
                        			<?php echo translate('chapter'); ?>
                                </a>
                            </li>
                            
                            
                            <?php ?>
                        </ul>
                    </li>
				<?php  ?>
				
				<?php } if ($this->Crud_model->admin_permission('send_sms')){?>
					<li <?php if($page_name=="my_bussiness"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin/my_business">
							<i class="fa fa-mobile"></i>
							<span class="menu-title"><?php echo translate('my_bussiness')?></span>
						</a>
					</li>
					<li <?php if($page_name=="my_network"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin/my_network">
							<i class="fa fa-mobile"></i>
							<span class="menu-title"><?php echo translate('my_network')?></span>
						</a>
					</li>
					<li <?php if($page_name=="shortcuts"){ ?> class="active-link" <?php } ?>>
						<a href="<?=base_url()?>admin/shortcuts">
							<i class="fa fa-mobile"></i>
							<span class="menu-title"><?php echo translate('shortcuts')?></span>
						</a>
					</li>
					
					<?php } if ($this->Crud_model->admin_permission('others')){ ?>
					<!--<li <?php if($page_name=="others" || $page_name=="family" ){ ?> class="active-sub active" <?php } ?>>-->
					<!--	<a href="#">-->
					<!--		<i class="fa fa-users"></i>-->
					<!--		<span class="menu-title"><?php echo translate('refer_and_earn')?></span>-->
					<!--		<i class="arrow"></i>-->
					<!--	</a>-->
						<!--Submenu-->
					<!--	<ul class="collapse">-->
					<!--		<?php if ($this->Crud_model->admin_permission('others')){ ?>-->
					<!--			<li <?php if($page_name=="others"){ ?> class="active-link" <?php } ?>>-->
					<!--				<a href="<?=base_url()?>admin/others">-->
					<!--					<i class="fa fa-user-o"></i>-->
					<!--					<?php echo translate('others')?></a>-->
					<!--			</li>-->
					<!--		<?php } ?>-->
					<!--		<li <?php if($page_name=="family"){ ?> class="active-link" <?php } ?>>-->
					<!--			<a href="<?=base_url()?>admin/family">-->
					<!--				<i class="fa fa-envelope-o"></i>-->
					<!--				<?php echo translate('family')?></a>-->
					<!--		</li>-->
					<!--		<li <?php if($page_name=="relatives"){ ?> class="active-link" <?php } ?>>-->
					<!--			<a href="<?=base_url()?>admin/relatives">-->
					<!--				<i class="fa fa-envelope-o"></i>-->
					<!--				<?php echo translate('relatives')?></a>-->
					<!--		</li>-->
					<!--		<li <?php if($page_name=="friends"){ ?> class="active-link" <?php } ?>>-->
					<!--			<a href="<?=base_url()?>admin/friends">-->
					<!--				<i class="fa fa-envelope-o"></i>-->
					<!--				<?php echo translate('friends')?></a>-->
					<!--		</li>-->
					<!--	</ul>-->
					</li>
					<?php } ?>

				<!--<?php if ($this->Crud_model->admin_permission('online_knowledge_base')){?>-->
    <!--                <li>-->
				<!--		<a href="https://activeitzone.com/index.php/product/active-matrimonial-cms/knowledge-base" target="_blank">-->
				<!--			<i class="fa fa-lightbulb-o"></i>-->
				<!--			<span class="menu-title"><?php echo translate('online_knowledge_base')?></span>-->
				<!--		</a>-->
				<!--	</li>-->
				<!--		<?php } if ($this->Crud_model->admin_permission('activasion')){?>-->
				<!--	<li>-->
				<!--		<a href="https://activeitzone.com/check/" target="_blank">-->
				<!--			<i class="fa fa-check"></i>-->
				<!--			<span class="menu-title"><?php echo translate('activation')?></span>-->
				<!--		</a>-->
				<!--	</li>-->
				<!--	<?php } ?>-->

				</ul>
			</div>
		</div>
	</div>
	<!--================================-->
	<!--End menu-->
</div>
</nav>
<!--===================================================-->
<!--END MAIN NAVIGATION-->