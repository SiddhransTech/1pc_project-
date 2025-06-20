<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$this->db->get_where('general_settings', array('general_settings_id' => 24))->row()->value?>">
    <meta name="keywords" content="<?=$this->db->get_where('general_settings', array('general_settings_id' => 25))->row()->value?>">
    <meta name="author" content="<?=$this->db->get_where('general_settings', array('general_settings_id' => 26))->row()->value?>">
    <meta name="revisit-after" content="<?=$this->db->get_where('general_settings', array('general_settings_id' => 54))->row()->value?> day(s)">
    <title><?=$this->system_title?></title>
    <!-- Page loader -->
    <script src="<?=base_url()?>template/front/vendor/pace/js/pace.min.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>template/front/vendor/pace/css/pace-minimal.css" type="text/css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=base_url()?>template/front/vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <!-- Plugins -->
    <link rel="stylesheet" href="<?=base_url()?>template/front/vendor/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="<?=base_url()?>template/front/vendor/hamburgers/hamburgers.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>template/front/vendor/animate/animate.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>template/front/vendor/lightgallery/css/lightgallery.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/ionicons/css/ionicons.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/line-icons/line-icons.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/line-icons-pro/line-icons-pro.css" type="text/css">
    <!-- Linea Icons -->
    <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/linea/arrows/linea-icons.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/linea/basic/linea-icons.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/linea/ecommerce/linea-icons.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>template/front/fonts/linea/software/linea-icons.css" type="text/css">
    <!-- <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/> -->

    <!-- Global style (main) -->
    <?php
        $theme_color = $this->db->get_where('frontend_settings', array('type' => 'theme_color'))->row()->value;
        if ($theme_color == 'default-color') { ?>
            <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style.css" rel="stylesheet" media="screen">
        <?php
        } elseif ($theme_color == 'pink') { ?>
            <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-pink.css" rel="stylesheet" media="screen">
        <?php
        } elseif ($theme_color == 'purple') { ?>
            <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-purple.css" rel="stylesheet" media="screen">
        <?php
        } elseif ($theme_color == 'light-blue') { ?>
            <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-light-blue.css" rel="stylesheet" media="screen">
        <?php
        } elseif ($theme_color == 'green') { ?>
            <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-green.css" rel="stylesheet" media="screen">
        <?php
        } elseif ($theme_color == 'dark') { ?>
            <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-dark.css" rel="stylesheet" media="screen">
        <?php
        } elseif ($theme_color == 'super-dark') { ?>
            <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-super-dark.css" rel="stylesheet" media="screen">
        <?php
        }
        elseif ($theme_color == 'orange') { ?>
            <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-orange.css" rel="stylesheet" media="screen">
        <?php
        }
        elseif ($theme_color == 'red') { ?>
            <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-red.css" rel="stylesheet" media="screen">
        <?php
        }
        elseif ($theme_color == 'black') { ?>
            <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-black.css" rel="stylesheet" media="screen">
        <?php
        }
        elseif ($theme_color == 'blue') { ?>
            <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-blue.css" rel="stylesheet" media="screen">
        <?php
        }
        elseif ($theme_color == 'ightseagreen') { ?>
            <link id="stylesheet" type="text/css" href="<?=base_url()?>template/front/css/global-style-ightseagreen.css" rel="stylesheet" media="screen">
        <?php
        }
    ?>
    <!-- Custom style - Remove if not necessary -->
    <link type="text/css" href="<?=base_url()?>template/front/css/custom-style.css" rel="stylesheet">
    <!-- Favicon -->
    <script src="<?=base_url()?>template/front/vendor/jquery/jquery.min.js"></script>

    <?php
        $favicon = $this->db->get_where('frontend_settings', array('type' => 'favicon'))->row()->value;
        $favicon = json_decode($favicon, true);
        if (!empty($favicon) && file_exists('uploads/favicon/'.$favicon[0]['image'])) {
    ?>
            <link href="<?=base_url()?>uploads/favicon/<?=$favicon[0]['image']?>" rel="icon" type="image/png">
    <?php
        }
        else {
    ?>
            <link href="<?=base_url()?>uploads/favicon/default_image.png" rel="icon" type="image/png">
    <?php
        }
    ?>

  </head>
  <body>
    <?php include 'preloader.php';?>
    <?php include_once 'header/header.php';?>
    <?php
      $registration_image = $this->db->get_where('frontend_settings', array('type' => 'registration_image'))->row()->value;
      $registration_image_data = json_decode($registration_image, true);
    ?>
    <section class="slice-lg has-bg-cover bg-size-cover" style="background-image: url(<?=base_url()?>uploads/registration_image/<?=$registration_image_data[0]['image']?>); background-position: bottom bottom;">
      <span class="mask mask-dark--style-2"></span>
      
      <div class="container">
        <div class="row cols-xs-space align-items-center text-center text-md-left">
          <div class="col-lg-6 col-md-10 ml-auto mr-auto">
            <div class="form-card form-card--style-2 z-depth-3-top">
              <div class="form-body">

                <div class="text-center px-2">
                  <h4 class="heading heading-4 strong-400 mb-4 font_light"><?=translate('create_your_account')?></h4>
                  <?php
                    if (!empty($duplicate_email)) {
                    ?>
                      <p class="text-danger"><?=$duplicate_email?></p>
                    <?php
                    }
                  ?>
                </div>

                <form class="form-default my-4" id="register_form" method="post" action="<?=base_url()?>home/registration/add_info">
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label font_light"><?php echo translate('first_name')?></label>
                        <input type="text" class="form-control form-control-sm" name="first_name" pattern="[a-zA-Z]+" title="Enter Alphabets Only" minlength="4" maxlength="10" value="<?php if(!empty($form_contents)){echo $form_contents['first_name'];}?>" autofocus required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label font_light"><?php echo translate('last_name')?></label>
                        <input type="text" class="form-control form-control-sm" name="last_name" pattern="[a-zA-Z ]+" title="Enter Alphabets Only" minlength="1" maxlength="10" value="<?php if(!empty($form_contents)){echo $form_contents['last_name'];}?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label font_light"><?php echo translate('gender')?></label>
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
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label font_light"><?php echo translate('email')?></label>
                        <input type="email" class="form-control form-control-sm" name="email" placeholder="Ex:example@mail.com" pattern="^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$" value="<?php if(!empty($form_contents)){echo $form_contents['email'];}?>" required>
                      </div>
                    </div>
                  </div>

                  <?php $member_approval = $this->db->get_where('general_settings', array('type' => 'member_approval_by_admin'))->row()->value;
                      if($member_approval == 'yes'){ ?>
                          <input name="approval_status" value="pending" hidden="">
                      <?php } else { ?>
                          <input name="approval_status" value="approved" hidden="">
                  <?php } ?>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label font_light"><?php echo translate('date_of_birth')?></label>
                        <input type="date" id="datepicker" class="form-control form-control-sm" name="date_of_birth"  value="<?php if(!empty($form_contents)){echo $form_contents['date_of_birth'];}?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label font_light"><?php echo translate('mobile')?></label> 
                        <input type="tel" class="form-control form-control-sm" name="mobile" placeholder="Enter 10 Digit Number" pattern="[6-9]{1}[0-9]{9}" title="Please match the pattern" value="<?php if(!empty($form_contents)){echo $form_contents['mobile'];}?>">
                      </div>
                    </div>
                  </div>
                    
                  <div class="row">
<!-- Area Dropdown -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label font_light"><?php echo translate('area')?></label>
              <!-- Area Dropdown -->
       <!-- Area Dropdown -->
<select class="form-control form-control-sm" name="area" id="area" required>
    <option value="">-- Select Area --</option>
    <?php foreach($areas as $area): ?>
        <option value="<?php echo $area->name; ?>" data-id="<?php echo $area->id; ?>">
            <?php echo $area->name; ?>
        </option>
    <?php endforeach; ?>
</select>
<!-- Hidden input to store selected area_id -->
<input type="hidden" name="area_id" id="area_id">


            </div>
        </div>

<!-- Legion Dropdown -->
<div class="col-md-6">
    <div class="form-group">
        <label class="control-label font_light"><?php echo translate('legion')?></label>
      <select class="form-control form-control-sm" name="legion" id="legion" required>
    <option value="">-- Select Legion --</option>
</select>
<!-- Hidden input to store selected legion_id -->
<input type="hidden" name="legion_id" id="legion_id">

    </div>
</div>


</div>
<script>
$(document).ready(function(){
    $('#area').on('change', function() {
        const areaName = $(this).val();
        const areaId = $('#area option:selected').data('id');
        $('#area_id').val(areaId); // set hidden field

        if(areaId) {
            $.ajax({
                url: '<?php echo base_url('home/get_legions'); ?>',
                method: 'POST',
                data: { area_id: areaId },
                dataType: 'json',
                success: function(response) {
                    $('#legion').empty().append('<option value="">-- Select Legion --</option>');

                    if(response.length > 0) {
                        $.each(response, function(index, legion) {
                            $('#legion').append(
                                '<option value="'+ legion.name +'" data-id="'+ legion.id +'">'+ legion.name +'</option>'
                            );
                        });
                    } else {
                        $('#legion').append('<option value="">-- No legions available --</option>');
                    }
                }
            });
        }
    });

    // Capture legion_id when user selects a legion
    $('#legion').on('change', function() {
        const legionId = $('#legion option:selected').data('id');
        $('#legion_id').val(legionId); // set hidden field
    });
});

</script>


                  

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label font_light"><?php echo translate('password')?></label>
                        <input type="password" class="form-control form-control-sm" name="password">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label font_light"><?php echo translate('confirm_password')?>
                        </label>
                        <input type="password" class="form-control form-control-sm" name="confirm_password">
                      </div>
                    </div>
                  </div>

                  <?php
                    if($this->Crud_model->get_settings_value('third_party_settings','captcha_status','value') == 'ok') {
                  ?>
                    <div class="row">
                      <div class="col-md-12">
                        <?=$recaptcha_html?>
                      </div>
                    </div>
                  <?php } ?>

                  <div class="mt-1">
                    <small class="c-gray-light"><?=translate('by_clicking_REGISTER_you_agree_to_our')?> <a href="<?=base_url()?>home/terms_and_conditions" class="c-gray-light"><u><?=translate('terms_and_conditions')?></u></a></small>
                    <div class="mt-2" style="color: #ccc !important">
                      <?php
                        echo validation_errors();
                        if (!empty($captcha_incorrect) && $captcha_incorrect == TRUE): ?>
                            <p><?=translate('captcha_incorrect')?></p>
                        <?php endif;
                        if (!empty($disallowed_char)): ?>
                            <p><?=$disallowed_char;?></p>
                      <?php endif; ?>
                    </div>
                    <style>
                        p{
                          margin: 0px;
                          font-size: 12px;
                          color: red;
                        }
                    </style>
                  </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-styled btn-sm btn-base-1 z-depth-2-bottom mt-2" style="width: 100%">
                        <?php echo translate('register')?>
                      </button>
                    </div>
                </form>

                <!--<?php if($this->db->get_where('third_party_settings', array('type' => 'g_login_set'))->row()->value == "ok"){ ?>-->
                <!--  <a href="<?=base_url()?>home/social_login/google" class="btn btn-styled btn-google btn-sm btn-base-1 z-depth-2-bottom mt-2" style="width: 100%">-->
                <!--      <i class="fa fa-google"></i>-->
                <!--      <?php echo translate('sign_in_with_google');?>-->
                <!--  </a>-->
                <!--<?php } ?>-->

                <!--<?php if($this->db->get_where('third_party_settings', array('type' => 'fb_login_set'))->row()->value == "ok"){ ?>-->
                <!--    <a href="<?=base_url()?>home/social_login/facebook" class="btn btn-styled btn-facebook btn-sm btn-base-1 z-depth-2-bottom mt-2" style="width: 100%">-->
                <!--        <i class="fa fa-facebook"></i>-->
                <!--        <?php echo translate('sign_in_with_facebook');?>-->
                <!--    </a>-->
                <!--<?php } ?>-->

                <!-- <?php if($this->db->get_where('third_party_settings', array('type' => 'twitter_login_set'))->row()->value == "ok"){ ?>
                  <a href="<?=base_url()?>home/social_login/twitter" class="btn btn-styled btn-twitter btn-sm btn-base-1 z-depth-2-bottom mt-2"  style="width: 100%">
                      <i class="fa fa-twitter"></i>
                      <?php echo translate('sign_in_with_twitter');?>
                  </a>
                <?php } ?> -->

                <div class="row pt-3">
                  <div class="col-12 text-center" style="font-size: 12px;">
                    <a class="c-gray-light" href="<?=base_url()?>home/login" class=""><?php echo translate('log_in_page')?></a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

       

    <!-- FOOTER -->
      <?php include_once'footer/footer.php';?>



    <!-- SCRIPTS -->
    <a href="#" class="back-to-top btn-back-to-top"></a>

    <!-- Core -->
    <script src="<?=base_url()?>template/front/vendor/popper/popper.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>template/front/js/vendor/jquery.easing.js"></script>
    <script src="<?=base_url()?>template/front/js/ie10-viewport-bug-workaround.js"></script>
    <script src="<?=base_url()?>template/front/js/slidebar/slidebar.js"></script>
    <script src="<?=base_url()?>template/front/js/classie.js"></script>

    <!-- Bootstrap Extensions -->
    <script src="<?=base_url()?>template/front/vendor/bootstrap-dropdown-hover/js/bootstrap-dropdown-hover.js"></script>
    <script src="<?=base_url()?>template/front/vendor/bootstrap-notify/bootstrap-growl.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/scrollpos-styler/scrollpos-styler.js"></script>

    <!-- Plugins -->
    <script src="<?=base_url()?>template/front/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/footer-reveal/footer-reveal.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/sticky-kit/sticky-kit.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/swiper/js/swiper.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/paraxify/paraxify.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/viewport-checker/viewportchecker.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/milestone-counter/jquery.countTo.js"></script>
    <script src="<?=base_url()?>template/front/vendor/countdown/js/jquery.countdown.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/typed/typed.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/instafeed/instafeed.js"></script>
    <script src="<?=base_url()?>template/front/vendor/gradientify/jquery.gradientify.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/nouislider/js/nouislider.min.js"></script>

    <!-- Isotope -->
    <script src="<?=base_url()?>template/front/vendor/isotope/isotope.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>

    <!-- Light Gallery -->
    <script src="<?=base_url()?>template/front/vendor/lightgallery/js/lightgallery.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/lightgallery/js/lg-thumbnail.min.js"></script>
    <script src="<?=base_url()?>template/front/vendor/lightgallery/js/lg-video.js"></script>

    <!-- App JS -->
    <script src="<?=base_url()?>template/front/js/wpx.app.js"></script>
    

    <!-- Date script newly added -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> -->

    <script type="text/javascript">
      $(document).ready(function(){
        $('.top_bar_right').load('<?php echo base_url(); ?>home/top_bar_right');
      });
    </script>

    <!-- <script>
      $(function() {
        $( "#datepicker" ).datepicker({  maxDate: new Date() });
      });
    </script> -->

   
  </body>
</html>
