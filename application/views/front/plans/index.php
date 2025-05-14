<?php 
    $offers_data = $this->db->select('*')->from('offers')->get()->result(); 
?>
<?php error_reporting(E_ALL); ini_set('display_errors',1);?>
<section class="page-title page-title--style-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <h2 class="heading heading-3 strong-400 mb-0"><?php echo translate('membership_fees')?></h2>
            </div>
            
            <div class="col-12 text-center">
                <!--<?php if (!empty($offers_data)) { ?>-->
                <!--    <?php if ($offers_data[0]->future_offer_status == 0) { ?>-->
                <!--        <marquee style="color:#f9430d" scrolldelay="200" id="marquee1">-->
                <!--            <span style="color:black; font-size: 18px;">Futured Offers: </span>-->
                <!--            <?php echo $offers_data[0]->futured_offers; ?>-->
                <!--        </marquee>-->
                <!--    <?php } ?>-->
                <!--<?php } ?>-->

                <!--<h2 class="heading heading-3 strong-400 mb-0">-->
                    <?php //echo translate($member); ?> 
                <!--    <?php echo translate('premium_plans') ?>-->
                <!--</h2>-->

                <!--<?php if (!empty($offers_data)) { ?>-->
                <!--    <?php if ($offers_data[0]->current_offer_status == 0) { ?>-->
                <!--        <marquee style="color:#f9430d" scrolldelay="200" id="marquee1">-->
                <!--            <span style="color:black; font-size: 18px;">Current Offers: </span><?php echo $offers_data[0]->current_offers; ?>-->

                <!--        </marquee>-->
                <!--    <?php } ?>-->
                <!--<?php } ?>-->
            </div>
            
        </div>
    </div>
</section>
<?php
    $background_image = $this->db->get_where('frontend_settings', array('type' => 'premium_plans_image'))->row()->value;
    $background_image_data = json_decode($background_image, true);

?>
<section class="slice sct-color-1 pricing-plans pricing-plans--style-1 has-bg-cover bg-size-cover" style="background-image: url(<?=base_url()?>uploads/premium_plans_image/<?=$background_image_data[0]['image']?>); background-position: bottom bottom;">
    <!-- <section class="slice-lg has-bg-cover bg-size-cover" > -->
    <div class="container">
        <span class="clearfix"></span>
        <div class="row">
            <?php if (!empty($danger_alert)): ?>
                <div class="col-12" id="danger_alert">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <?=$danger_alert?>
                    </div>
                </div>
            <?php endif ?>
            <?php foreach ($all_plans as $value): ?>
                <?php if($value->status == 0) { ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <?php if ($value->plan_id == 1) { $package_class = "text-line-through"; } else { $package_class = "active"; } ?>
                    <div class="feature feature--boxed-border feature--bg-2 active package_bg mt-4">
                        <div class="icon-block--style-1-v5 text-center">
                            <div class="block-icon c-gray-dark">
                                <li style="list-style-type: none;">
                                <?php
                                    $image = $value->image;
                                    $images = json_decode($image, true);
                                    if (isset($images) && file_exists('uploads/plan_image/'.$images[0]['image'])) {
                                    ?>
                                        <img src="<?=base_url()?>uploads/plan_image/<?=$images[0]['image']?>" alt="plan" class="img-sm" height="100">
                                    <?php
                                    }
                                    else {
                                    ?>
                                        <img src="<?=base_url()?>uploads/plan_image/default_image.png" class="img-sm" height="100">
                                    <?php
                                    }
                                ?>
                                </li>
                            </div>
                            <div class="block-content">
                                <h3 class="heading heading-5 strong-500"><?=$value->name?></h3>
                                <h3 class="price-tag" style="font-size: 26px;"><?=currency($value->amount)?></h3>
                                <!--<ul class="pl-0 pr-0 mt-0">-->
                                <!--    <?php if($value->exp_int_status == 0) { ?>-->
                                <!--    <li class="<?=$package_class?> package_items"><?=translate('president:')?> <?=$value->president?> <?=translate('times')?></li>-->
                                <!--    <?php } ?>-->

                                <!--    <?php if($value->dir_msg_status == 0) { ?>-->
                                <!--    <li class="<?=$package_class?> package_items"><?=translate('vice_president:')?> <?=$value->vice_president?> <?=translate('times')?></li>-->
                                <!--    <?php } ?>-->
                                <!--    <li class="<?=$package_class?> package_items"><?=translate('secretary:')?> <?=$value->secretary?> <?=translate('images')?></li>-->
                                <!--    <li class="<?=$package_class?> package_items"><?=translate('treasurer:')?> <?=$value->treasurer?> <?=translate('videos')?></li> -->
                                <!--</ul>-->
                                <div class="py-2 text-center mb-2">
                                    <?php
                                    if ($value->plan_id != 1) {
                                        $purchase_link = base_url()."home/plans/subscribe/".$value->plan_id;
                                    }
                                    else {
                                        $purchase_link = "#";
                                    }
                                    ?>
                                    <a href="<?=$purchase_link?>" class="btn btn-styled btn-sm btn-base-1 btn-outline btn-circle">
                                        <span class="<?=$package_class?>"><?php echo translate('pay_now')?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            <?php endforeach ?>
        </div>
    </div>
</section>
<script>
    setTimeout(function() {
        $('#danger_alert').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
</script>
