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
        <script type="text/javascript">
            $(document).ready(function(){
                $('.top_bar_right').load('<?php echo base_url(); ?>home/top_bar_right');
            });
        </script>
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
                                    <h4 class="heading heading-4 strong-400 mb-4 font_light"><?php echo translate('recover_your_password')?></h4>
                                </div>
                                <form class="form-default" role="form" method="post" action="<?=base_url()?>home/forget_pass/forget">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-uppercase font_light"><?php echo translate('email')?></label>
                                                <input type="email" class="form-control input-sm" name="email" placeholder="example@gmail.com" autofocus required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-styled btn-sm btn-block btn-base-1 z-depth-2-bottom mt-4"><?php echo translate('submit')?></button>
                                    <div class="row pt-3">
                                        <div class="col-12 text-center" style="font-size: 12px;">
                                            <a class="c-gray-light" href="<?=base_url()?>home/login">Log In Page</a>
                                        </div>
                                    </div>
                                </form>
                                <div class="row mt-3">
                                    <div class="col-12 text-center" style="font-size: 12px;">
                                        <span class="c-gray-light"><?php echo translate('new_here?')?></span><a class="c-gray-light" href="<?=base_url()?>home/registration"> <u><?php echo translate('create_an_account_from_here!')?></u></a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    </body>
</html>
