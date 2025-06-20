<script type="text/javascript" src="https://affiliate.siddhrans.in/integration/general_integration"></script>
<script type="text/javascript">
 AffTracker.setWebsiteUrl( "https://www.edigamatchmaker.com/home/listing" );
 AffTracker.generalClick( "allmembers" );
</script>
<style>
    @media (max-width: 576px) {
        .listing-image {
            height: 330px !important;
        }
    }
</style>
<?php 
    $offers_data = $this->db->select('*')->from('offers')->get()->result(); 
?>

<!--<section class="page-title page-title--style-1">-->
<!--    <div class="container">-->
<!--        <div class="row align-items-center">-->
<!--            <div class="col-12 text-center">-->
<!--                <h2 class="heading heading-3 strong-400 mb-0"><?=translate($member)?> <?php echo translate('active_members')?></h2>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<section class="page-title page-title--style-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <!--<?php if (!empty($offers_data)) { ?>-->
                <!--    <?php if ($offers_data[0]->future_offer_status == 0) { ?>-->
                <!--        <marquee style="color:#f9430d" scrolldelay="200" id="marquee1">-->
                <!--            <span style="color:black; font-size: 18px;">Futured Offers: </span>-->
                <!--            <?php echo $offers_data[0]->futured_offers; ?>-->
                <!--        </marquee>-->
                <!--    <?php } ?>-->
                <!--<?php } ?>-->


                <h2 class="heading heading-3 strong-400 mb-0"><?= translate($member) ?> <?php echo translate('active_members') ?></h2>

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

<section class="slice sct-color-1">
    <div class="container">
        <div class="row">
			<?php  $advance_search_position = $this->db->get_where('frontend_settings', array('type' => 'advance_search_position'))->row()->value;

            if($advance_search_position=='left'){
                include_once'filter.php'; ?>
                <div class="col-lg-8">

                    <input type="hidden" id="member_type" value="<?php if(!empty($member_type)){echo $member_type;}?>">

                    <div class="block-wrapper" id="result">
                        <!-- Loads List Data with Ajax Pagination -->
                    </div>
                    <div id="pagination" style="float: right;">
                        <!-- Loads Ajax Pagination Links -->
                    </div>
                </div>
            <?php }else{ ?>
                 <div class="col-lg-8">

                    <input type="hidden" id="member_type" value="<?php if(!empty($member_type)){echo $member_type;}?>">

                    <div class="block-wrapper" id="result">
                        <!-- Loads List Data with Ajax Pagination -->
                    </div>
                    <div id="pagination" style="float: right;">
                        <!-- Loads Ajax Pagination Links -->
                    </div>
                </div>
            <?php include_once'filter.php'; } ?>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $("#filter_aged_from").change(function(){
            var from = parseInt($("#filter_aged_from").val());
            var to = parseInt($("#filter_aged_to").val());
            if (to < from) {
                var to = $("#filter_aged_to").val(from);
            }
        });
        $("#filter_aged_to").change(function(){
            var from = parseInt($("#filter_aged_from").val());
            var to = parseInt($("#filter_aged_to").val());
            if (to < from) {
                var to = $("#filter_aged_to").val(from);
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(".height_mask").inputmask({
            mask: "9.99",
            greedy: false,
            definitions: {
                '*': {
                    validator: "[0-9]"
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        var home_search = "<?=$home_search?>";
        var home_religion = "<?=$home_religion?>";

        var home_caste = "<?=$home_caste?>";
        var home_sub_caste = "<?=$home_sub_caste?>";
        if (home_caste != null) {
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id_caste/caste/religion_id/"+home_religion+"/"+home_caste, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {

                    $(".s_caste").html(data);
                    $("#sub_caste").css("display", "none");

                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
        if (home_sub_caste != null) {

             $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id_sub_caste/sub_caste/caste_id/"+home_caste+"/"+home_sub_caste, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,

                success: function (data) {

                    if(data == false ){

                       $("#sub_caste").css("display", "none");
                    } else {
                      $(".s_sub_caste").html(data);
                       $("#sub_caste").css("display", "block");
                    };
               },
                error: function(e) {
                    console.log(e)
                }
            });
        }
        if (home_search == "false") {
            filter_members('0');
        }
        if (home_search == "true") {
            filter_members('0', 'search');
        }

    });

    function filter_members(page, type){
        if (type == 'search')
        {
            var url = '<?php echo base_url(); ?>home/ajax_member_list/'+page+'/'+type;
        }
        else {
            var member_type = "";
            if ($("#member_type").val() != "") {
                member_type = $("#member_type").val();
            }
            // alert($("#member_type").val());
            //var url = form.attr('action')+page+'/';
            var url = '<?php echo base_url(); ?>home/ajax_member_list/'+page+'/'+member_type;
        }
        var form = $('#filter_form');
        var place = $('#result');
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }
        // $(".btn-back-to-top").click();
        $.ajax({
            url: url, // form action url
            type: 'POST', // form submit method get/post
            dataType: 'html', // request type html/json/xml
            data: formdata ? formdata : form.serialize(), // serialize form data
            cache       : false,
            contentType : false,
            processData : false,
            beforeSend: function() {
                place.html("");
                place.html("<div class='text-center pt-5 pb-5' id='payment_loader'><i class='fa fa-refresh fa-5x fa-spin'></i><p>Please Wait...</p></div>").fadeIn();
            },
            success: function(data) {
                var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
                if (width <= 768) {
                    $(".size-sm").css("display", "none");
                    $(".size-sm-btn").css("display", "block");
                }
                setTimeout(function(){
                    place.html(data);// fade in response data
                }, 20);
                setTimeout(function(){
                    place.fadeIn(); // fade in response data
                }, 30);
            },
            error: function(e) {
                console.log(e)
            }
        });
    }

    function adv_search(){
        $(".size-sm").css("display", "block");
        $(".size-sm-btn").css("display", "none");
    }

    $(".s_country").change(function(){
        var country_id = $(".s_country").val();
        if (country_id == "") {
            $(".s_state").html("<option value=''><?php echo translate('choose_a_country_first')?></option>");
            $(".s_city").html("<option value=''><?php echo translate('choose_a_state_first')?></option>");
        } else {
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id/state/country_id/"+country_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {
                    $(".s_state").html(data);
                    $(".s_city").html("<option value=''><?php echo translate('choose_a_state_first')?></option>");
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });

    $(".s_state").change(function(){
        var state_id = $(".s_state").val();
        if (state_id == "") {
            $(".s_city").html("<option value=''><?php echo translate('choose_a_state_first')?></option>");
        } else {
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id/city/state_id/"+state_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {
                    $(".s_city").html(data);
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });

    $(".s_religion").change(function(){
        var religion_id = $(".s_religion").val();
        if (religion_id == "") {
            $(".s_caste").html("<option value=''><?php echo translate('choose_a_religion_first')?></option>");
            $(".s_sub_caste").html("<option value=''><?php echo translate('choose_a_caste_first')?></option>");
        } else {
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id_caste/caste/religion_id/"+religion_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {

                    $(".s_caste").html(data);
                    $(".s_sub_caste").html("<option value=''><?php echo translate('choose_a_caste_first')?></option>");
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });

    $(".s_caste").change(function(){
        var caste_id = $(".s_caste").val();
        if (caste_id == "") {
            $(".s_sub_caste").html("<option value=''><?php echo translate('choose_a_caste_first')?></option>");
        } else {
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id_sub_caste/sub_caste/caste_id/"+caste_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function (data) {
                    if(data == false ){
                        $(".s_sub_caste").html("<option value=''><?php echo translate('none')?></option>");
                    } else {
                        $(".s_sub_caste").html(data);
                    };
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });
</script>
<style>
    /* xs */
    .size-sm {
        display: none;
    }
    .size-sm-btn {
        display: block;
    }
    /* sm */
    @media (min-width: 768px) {
        .size-sm {
            display: none;
        }
        .size-sm-btn {
            display: block;
        }
    }
    /* md */
    @media (min-width: 992px) {
        .size-sm {
            display: block;
        }
        .size-sm-btn {
            display: none;
        }
    }
    /* lg */
    @media (min-width: 1200px) {
        .size-sm {
            display: block;
        }
        .size-sm-btn {
            display: none;
        }
    }
</style>
<script>
    function validate_number(){
        //alert(1);
        var filter_aged_from = $('#filter_aged_from').val();
        var filter_aged_to   = $('#filter_aged_to').val();
        let len = filter_aged_from.length;
        let age_to_len = filter_aged_to.length;
        if(len >=3){
            $('#age_error').html('please enter valid age');
            //$('#filter_aged_from').val(' ');
            $('#no_result_found').show();
            no_result_found.style.marginLeft = "330px";
            $('#no_results').hide();
            $('#age_checker_error').html(' ');
            document.getElementsByClassName('block-wrapper').style.visibility='hidden';
            
        }
        else{
            $('#age_error').html(' ');
            $('#no_result_found').hide();
        }

        if(age_to_len>=3){
            $('#age_to_error').html('please enter valid age');
            //$('#filter_aged_to').val(' ');
            $('#no_result_found').show();
            no_result_found.style.marginLeft = "330px";
            $('#no_results').hide();
            $('#age_checker_to_error').html(' ');
            document.getElementsByClassName('block-wrapper').style.visibility='hidden';
        }
        else{
            $('#age_to_error').html(' ');
        }
        
    }// validate number function ends

    function age_checker(age){
        //alert(age);
        var age = age;
        if(age<=17){
            $('#age_checker_error').html('enter above or equal to 18');
            //$('#age_to_error').html('please enter above age 18');
            //$('#filter_aged_from').val(' ');
            $('#no_results').show();
            no_results.style.marginLeft = "330px";
            result.style.visibility     = 'hidden';  // Hide
            pagination.style.visibility = 'hidden';  // Hide
        }
        else{
            $('#age_checker_error').html(' ');
            $('#no_results').hide();
            result.style.visibility  = 'visible';      // show
            pagination.style.visible = 'visible';     // show
        }
    }// age_checker function ends

    function age_to_checker(age){
        //alert(age);
        var age = age;
        if(age<=17){
            $('#age_checker_to_error').html('enter above or equal to 18');
            $('#no_results').show();
            no_results.style.marginLeft = "330px";
            result.style.visibility     = 'hidden';  // Hide
            pagination.style.visibility = 'hidden';  // Hide
        }
        else{
            $('#age_checker_to_error').html(' ');
            $('#no_results').hide();
            result.style.visibility  = 'visible';     // show
            pagination.style.visible = 'visible';     // show
        }

    }// age_to_checker function ends
</script>
