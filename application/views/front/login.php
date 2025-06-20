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
            $login_image = $this->db->get_where('frontend_settings', array('type' => 'login_image'))->row()->value;
            $login_image_data = json_decode($login_image, true);

        ?>

        <section class="slice-lg has-bg-cover bg-size-cover" style="background-image: url(<?=base_url()?>uploads/login_image/<?=$login_image_data[0]['image']?>); background-position: bottom bottom;">
            <span class="mask mask-dark--style-2"></span>
            <div class="container">
                <div class="row cols-xs-space align-items-center text-center text-md-left">
                    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                        <div class="form-card form-card--style-2 z-depth-3-top">
                            <div class="form-body">
                                <div class="text-center px-2">
                                    <h4 class="heading heading-4 strong-400 mb-4 font_light"><?php echo translate('log_in_to_your_account')?></h4>
                                    <?php
                                        if (!empty($register_success)) {
                                        ?>
                                            <p class="text-success"><?=$register_success?></p>
                                        <?php
                                        }
                                    ?>
                                </div>
                                <form class="form-default" role="form" method="post" action="<?=base_url()?>home/check_login">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-uppercase font_light"><?php echo translate('email')?></label>
                                                <input type="email" class="form-control input-sm" name="email" id="inp_usr_nm" autofocus required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group has-feedback">
                                                <label class="text-uppercase font_light"><?php echo translate('password')?></label>
                                                <input type="password" class="form-control input-sm" name="password" id="inp_pass" required>
                                            </div>
                                            <p style="color: red">
                                                <?php
                                                    if (!empty($login_error)){
                                                        echo $login_error;
                                                    }
                                                ?>
                                            </p>
                                            <p style="color: green">
                                                <?php
                                                    if (!empty($sent_email)){
                                                        echo $sent_email;
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-styled btn-sm btn-block btn-base-1 z-depth-2-bottom mt-4"><?php echo translate('log_in')?></button>
                                    <div class="row pt-3">
                                        <div class="col-6" style="font-size: 12px;">
                                            <div class="checkbox">
                                                <input type="checkbox" name="remember_me" id="remember_me" value="checked">
                                                <label for="remember_me"><span class="c-gray-light"><?php echo translate('remember_me')?></span></label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-right" style="font-size: 12px;">
                                            <a href="<?=base_url()?>home/forget_pass" class="c-gray-light"><?php echo translate('recover_password')?></a>
                                        </div>
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
                                <div class="row">
                                    <div class="col-12 text-center" style="font-size: 12px;">
                                        <span class="c-gray-light"><?php echo translate('new_here?')?></span><a class="c-gray-light" href="<?=base_url()?>home/registration"> <u><?php echo translate('create_an_account_from_here!')?></u></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(demo()){ ?>
                            <div class="form-card form-card--style-2 z-depth-3-top mt-5">
                            <div class="form-body">
                                <div class="text-center px-2">
                                    <h4 class="heading heading-4 strong-400 mb-4 font_light"><?php echo translate('sign_in_details')?></h4>
                                    <?php
                                        if (!empty($register_success)) {
                                        ?>
                                            <p class="text-success"><?=$register_success?></p>
                                        <?php
                                        }
                                    ?>
                                </div>
                                <div class="text-center">
                                    <p style="color:#ccc;"><b>Username:</b> <span id="usr_nm">user@gmail.com</span></p>
                                    <p style="color:#ccc;"><b>Password:</b> <span id="pass">1234</span></p>
                                    <button type="button" class="btn btn-styled btn-sm btn-block btn-base-1 z-depth-2-bottom mt-4 cpy_btn"><?=translate('copy')?></button>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- FOOTER -->
		<?php include_once 'footer/footer.php';?>
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

        <script type="text/javascript">
            $(document).ready(function(){
                $('.top_bar_right').load('<?php echo base_url(); ?>home/top_bar_right');
            });
        </script>
        <script>
            $(document).ready(function(){
                $('.cpy_btn').click(function(){
                    $('#inp_usr_nm').val($('#usr_nm').html());
                    $('#inp_pass').val($('#pass').html());
                })
            })
        </script>
    </body>
</html>
