
<?php 
    if ($this->db->get_where("member",array("member_id" => $this->session->userdata('member_id')))->row()->membership == 1) 
    {
    ?>
        <div class="card-title">
            <h3 class="heading heading-6 strong-500">
                <b><?=translate('your_story')?></b>
            </h3>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <p class="text-center pt-2"><?=translate('please_upgrade_to_premium_membership_to_post_your_stories')?></p>
                <div class="text-center pt-2 pb-4">
                    <a href="<?=base_url()?>home/plans" class="btn btn-styled btn-sm btn-base-1 z-depth-2-bottom" style="width: 50%"><?=translate('get_premium_membership')?></a>
                </div>
            </div>
        </div>
    <?php        
    }
    else {
?>
     <?php
            $story_exist = $this->db->get_where("happy_story",array("posted_by" => $this->session->userdata('member_id')))->result();
        ?>
     <div class="card-head d-flex justify-content-between align-items-center">
    <h3 class="heading heading-6 strong-500 mb-0">
        <b>
            <?php 
                if ($story_exist) {
                    echo translate('your_projects');
                }
                else {
                    echo translate('upload_your_projects');      
                }
            ?>
        </b>
    </h3>

    <!-- <button type="button" class="btn btn-styled btn-base-1 btn-shadow" onclick="openModal()">
        Add Project
    </button> -->
</div>

  
        <div class="card-body">
            <?php
            $get_story = $this->db->get_where("happy_story", array("posted_by" => $this->session->userdata('member_id')))->result();
            if ($story_exist) {
                foreach ($get_story as $value) 
                {
                ?>
                <div class="mb-4">
                    <?php 
                        $is_approved = $this->db->get_where("happy_story",array("posted_by" => $this->session->userdata('member_id')))->row()->approval_status;
                    ?>
                    <a class="c-base-1" href="<?php if($is_approved == '1'){echo base_url()?>home/stories/story_detail/<?=$value->posted_by;}else{echo '#';}?>"><h3 class="heading heading-2 strong-400 text-normal">
                    <?=$value->title?>
                    </h3></a>
                    <ul class="inline-links inline-links--style-2 mt-1">
                        <li>
                            <?= date_format(date_create($value->post_time),"d, F Y")?> 
                        </li>
                    </ul>
                </div>
                <?php 
                    $images = json_decode($value->image, true);
                ?>
                <section class="swiper-js-container background-image-holder" data-holder-type="fullscreen" data-holder-offset=".navbar" style="height: 250px;">
                    <div class="swiper-container swiper-container-horizontal swiper-container-fade" data-swiper-autoplay="true" data-swiper-effect="fade" data-swiper-items="1" data-swiper-space-between="0" data-swiper-sm-items="1" data-swiper-sm-space-between="0" data-swiper-xs-items="1" data-swiper-xs-space-between="0">
                        <div class="swiper-wrapper" style="transition-duration: 0ms;">
                            <!-- Slide -->
                            <?php
                                $i = 0; 
                                foreach ($images as $image): ?>
                                    <div class="swiper-slide <?php if($i==0){echo 'swiper-slide-active';}?>" data-swiper-autoplay="5000" style="width: 100%; opacity: 1; transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                                        <div class="slice holder-item holder-item-light has-bg-cover bg-size-cover" style="background-image: url('<?=base_url()?>uploads/happy_story_image/<?=$image['img']?>'); background-position: bottom bottom;">
                                        </div>
                                    </div>
                                <?php
                                $i++; 
                                endforeach;
                            ?>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                            <?php
                                $j = 0; 
                                foreach ($images as $image): ?>
                                    <span class="swiper-pagination-bullet <?php if($j==0){echo 'swiper-pagination-bullet-active';}?>"></span>
                                <?php
                                $j++; 
                                endforeach;
                            ?> 
                            <!-- <span class="swiper-pagination-bullet"></span> -->
                        </div>

                        <!-- Add Arrows -->
                        <div class="swiper-button swiper-button-next"></div>
                        <div class="swiper-button swiper-button-prev"></div>
                    </div>
                </section>

                <!-- <div class="block-image">
                    <img src="<?=base_url()?>template/front/images/prv/blog/img-2.jpg" class="rounded">
                </div> -->
                <div class="block-body block-post-body mt-3">
                    <p>
                        <?=$value->description?>
                    </p>
                </div>
                <?php
                    $video_exist = $this->db->get_where("story_video",array("story_video_uploader_id" => $this->session->userdata('member_id')))->result();
                    if ($video_exist) {
                        $get_video = $this->db->get_where("story_video", array("story_video_uploader_id" => $this->session->userdata('member_id')))->result_array();
                        foreach ($get_video as $video) {?>
                            <div class="post-media text-center" style="padding-top: 10px">
                                <?php if($video['type'] == 'upload'){?>
                                    <video controls height="450" width="80%">
                                        <source src="<?php echo base_url();?><?php echo $video['video_src'];?>">
                                    </video>
                                <?php }else{?>
                                    <iframe controls="2" height="450" width="80%" 
                                        src="<?php echo $video['video_src'];?>" frameborder="0" >
                                    </iframe>
                                <?php }?>
                            </div>
                        <?php
                        }
                    }
                ?>
                <?php
                }
            }
            ?>
        </div>

        <!-- FIXED MODAL IMPLEMENTATION -->
        <!-- <div id="myModal" class="custom-modal">
            <div class="custom-modal-content">
                <span class="custom-close" onclick="closeModal()">&times;</span>
                <h2 style="text-align:center;margin-bottom:20px;">Add Project</h2>

                <form class="form-default" id="happy_story_form" method="post" action="<?=base_url()?>home/stories/add" role="form" enctype="multipart/form-data">
                     -->
                    <!-- Title Field -->
                    <!-- <div class="form-group">
                        <label class="control-label"><?php echo translate('story_title')?> <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" required>
                    </div> -->

                    <!-- Description Field -->
                    <!-- <div class="form-group">
                        <label class="control-label"><?php echo translate('story_details')?> <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" rows="4" required></textarea>
                    </div> -->

                    <!-- Date Field -->
                    <!-- <div class="form-group">
                        <label class="control-label"><?php echo translate('date')?> <span class="text-danger">*</span></label>
                        <input type="date" name="post_time" class="form-control" required>
                    </div> -->

                    <!-- Image Upload Section -->
                    <!-- <div class="form-group">
                        <label class="control-label"><?php echo translate('upload_image')?> <span class="text-danger">*</span></label>
                        <div class="image-upload-container">
                            <div class="image-preview-section">
                                <img class="image-preview blah" src="<?=base_url()?>uploads/happy_story_image/default_image.jpg" alt="Image Preview">
                                <div class="upload-controls">
                                    <label for="image_main" class="btn btn-styled btn-sm btn-base-2">
                                        <?php echo translate('select_a_photo')?>
                                    </label>
                                    <input type="file" id="image_main" name="image[]" class="form-control imgInp" style="display: none" required accept="image/*">
                                </div>
                            </div> -->
                            
                            <!-- Additional Image Section -->
                            <!-- <div class="additional-image-section">
                                <button type="button" id="add_image_btn" class="btn btn-styled btn-sm btn-base-2" disabled>
                                    <?php echo translate('add_another_image')?>
                                </button>
                                
                                <div id="additional_image" style="display: none;">
                                    <img class="image-preview blah2" src="<?=base_url()?>uploads/happy_story_image/default_image.jpg" alt="Additional Image Preview">
                                    <div class="upload-controls">
                                        <label for="image_extra" class="btn btn-styled btn-sm btn-base-2">
                                            <?php echo translate('select_a_photo')?>
                                        </label>
                                        <button type="button" id="cancel_additional" class="btn btn-styled btn-sm btn-danger">
                                            <?php echo translate('cancel')?>
                                        </button>
                                        <input type="file" id="image_extra" name="image[]" class="form-control imgInp2" style="display: none" disabled accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Video Upload Section -->
                    <!-- <div class="form-group">
                        <label class="control-label"><?php echo translate('upload_video')?></label>
                        <button type="button" id="add_video_btn" class="btn btn-styled btn-sm btn-base-2">
                            <?php echo translate('upload_video')?>
                        </button>
                        
                        <div id="video_section" style="display: none;">
                            <label class="control-label"><?php echo translate('upload_method')?> <span class="text-danger">*</span></label>
                            <select class="form-control" name="upload_method" onchange="video_sector(this.value)" disabled>
                                <option selected disabled><?php echo translate('choose_an_option'); ?></option>
                                <option value="upload"><?php echo translate('upload_video') ?></option>
                                <option value="share"><?php echo translate('share_link'); ?></option>
                            </select> -->
                            
                            <!-- Video Upload Option -->
                            <!-- <div id="video_upload" style="display:none; margin-top: 10px;">
                                <label class="btn btn-styled btn-sm btn-base-2" for="videoInp">
                                    <?=translate('select_a_video')?>
                                </label>
                                <span class="text-danger video_limit_msg" style="margin-left: 10px; font-size: 12px">
                                    <?php echo translate("max_limit_25_Mb"); ?>
                                </span>
                                <input class="form-control videoInp" id="videoInp" type="file" name="upload_video" style="display: none" accept="video/*"/>
                                <div id="message"></div>
                                <div style="margin-top: 10px;">
                                    <label class="control-label"><?php echo translate('video_preview')?></label>
                                    <video controls id="upload_story_video" width="100%" style="max-width: 400px;">
                                    </video>
                                </div>
                            </div> -->
                            
                            <!-- Video Share Link Option -->
                            <!-- <div id="video_share" style="display:none; margin-top: 10px;">
                                <label class="control-label"><?php echo translate('sharing_site')?></label>
                                <select class="form-control site" name="site">
                                    <option selected disabled><?php echo translate('choose_an_option'); ?></option>
                                    <option value="youtube"><?php echo translate('youtube') ?></option>
                                    <option value="dailymotion"><?php echo translate('dailymotion'); ?></option>
                                    <option value="vimeo"><?php echo translate('vimeo'); ?></option>
                                </select>
                                <label class="control-label"><?php echo translate('video_link')?></label>
                                <input type="text" id="video_link" name="video_link" class="form-control" onchange="preview(this.value)">
                                <label class="control-label"><?php echo translate('video_preview')?></label>
                                <div id="video_preview" style="margin-top: 10px;"></div>
                                <input type="hidden" value="" id="vl" name="vl" />
                            </div>
                        </div>
                    </div> -->

                    <!-- Submit Buttons -->
                    <!-- <div class="form-group text-center" style="margin-top: 30px;">
                        <button type="button" class="btn btn-sm btn-base-1 z-depth-2-bottom" onclick="confirm_post_story()" style="margin-right: 10px;">
                            <?php echo translate('apply')?>
                        </button>
                        <button type="submit" id="btn_story_upload" class="btn btn-styled btn-sm btn-base-1 z-depth-2-bottom" style="display: none">
                            <?php echo translate('apply')?>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" onclick="closeModal()">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div> -->

    <?php } ?>

<style>
/* FIXED MODAL STYLES */
.custom-modal {
    display: flex;
    justify-content: center;
    align-items: flex-start; /* top aligned */
    padding-top: 150px;
    position: fixed;
    z-index: 99999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.6);
    overflow: auto;
}

.custom-modal-content {
    background-color: #fff;
    width: 90%;
    max-width: 800px;
    max-height: 80vh;
    padding: 30px;
    border-radius: 12px;
    position: relative;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    overflow-y: auto;
    overflow-x: hidden;
}

.custom-close {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 28px;
    color: #888;
    cursor: pointer;
    font-weight: bold;
    z-index: 1;
}

.custom-close:hover {
    color: #000;
}

/* Form Styling */
.custom-modal-content .form-group {
    margin-bottom: 20px;
    width: 100%;
}

.custom-modal-content label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
}

.custom-modal-content input,
.custom-modal-content textarea,
.custom-modal-content select {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border-radius: 6px;
    border: 1px solid #ddd;
    box-sizing: border-box;
}

.custom-modal-content textarea {
    resize: vertical;
    min-height: 80px;
}

/* Image Upload Styling */
.image-upload-container {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.image-preview-section,
.additional-image-section {
    flex: 1;
    min-width: 200px;
}

.image-preview {
    width: 100%;
    max-width: 250px;
    height: 150px;
    object-fit: cover;
    border: 2px solid #e6e6e6;
    border-radius: 8px;
    margin-bottom: 10px;
}

.upload-controls {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

/* Button Styling */
.btn {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

.btn-base-1 {
    background-color: #007bff;
    color: white;
}

.btn-base-2 {
    background-color: #28a745;
    color: white;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
}

.btn:hover {
    opacity: 0.9;
}

.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

/* Video Section */
#video_section {
    margin-top: 15px;
    padding: 15px;
    background-color: #f8f9fa;
    border-radius: 6px;
}

.video_limit_msg {
    font-size: 12px;
    color: #dc3545;
}

/* Responsive Design */
@media (max-width: 768px) {
    .custom-modal-content {
        width: 95%;
        max-height: 85vh;
        padding: 20px;
    }
    
    .image-upload-container {
        flex-direction: column;
    }
    
    .upload-controls {
        justify-content: center;
    }
}

@media (max-height: 600px) {
    .custom-modal-content {
        max-height: 90vh;
        padding: 15px;
    }
}

/* Custom Scrollbar for Modal Content */
.custom-modal-content::-webkit-scrollbar {
    width: 8px;
}

.custom-modal-content::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.custom-modal-content::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 4px;
}

.custom-modal-content::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}
</style>

<script>
// FIXED MODAL FUNCTIONS
function openModal() {
    const modal = document.getElementById('myModal');
    modal.style.display = 'flex'; // Changed from 'block' to 'flex'
    document.body.style.overflow = 'hidden'; // Prevent background scrolling
}

function closeModal() {
    const modal = document.getElementById('myModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto'; // Restore background scrolling
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('myModal');
    if (event.target === modal) {
        closeModal();
    }
}

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeModal();
    }
});

$(document).ready(function(){
    // Initialize disabled inputs
    $("#video_section :input").prop("disabled", true);
    
    if (typeof load_swiper === 'function') {
        load_swiper();
    }
});

$('#happy_story_form').on('submit', function(e){
    $('#happy_story_form').hide();
    $('.custom-modal-content').append("<div class='text-center pt-5 pb-5 mt-5 mb-5' id='payment_loader'><i class='fa fa-refresh fa-5x fa-spin'></i><p class='mt-4'>Please Wait. Uploading your Video...</p></div>");
});

var isloggedin = "<?=$this->session->userdata('member_id')?>";

function confirm_post_story() {
    if (isloggedin == "") {
        $("#active_modal").modal("toggle");
        $("#modal_header").html("<?php echo translate('please_log_in');?>");
        $("#modal_body").html("<p class='text-center'><?php echo translate('please_log_in_to_upload_your_story!');?></p>");
        $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close');?></button> <a href='<?=base_url()?>home/login' class='btn btn-sm btn-base-1 btn-shadow' style='width:25%'><?php echo translate('log_in');?></a>");
    } else {
        $("#active_modal").modal("toggle");
        $("#modal_header").html("<?php echo translate('confirm_story_upload');?>");
        $("#modal_body").html("<p class='text-center' style='font-size:85%;'><?php echo translate('after_submitting_the_story,_admin_will_review_the_upload_and_varify_the_informations._then_admin_may_approve_your_post');?></p>");
        $("#modal_buttons").html("<button type='button' class='btn btn-danger btn-sm btn-shadow' data-dismiss='modal' style='width:25%'><?php echo translate('close');?></button> <a href='#' id='confirm_post_story' class='btn btn-sm btn-base-1 btn-shadow' onclick='return do_post_story()' style='width:25%'><?php echo translate('confirm');?></a>");
    }    
    return false;
}

function do_post_story() {
    if (isloggedin != ""){
        $("#confirm_post_story").removeAttr("onclick");
        $("#confirm_post_story").html("<i class='fa fa-refresh fa-spin'></i> <?php echo translate('processing');?>..");
        setTimeout(function() {
            $("#active_modal .close").click();
            if ($(".btn-back-to-top").length) {
                $(".btn-back-to-top").click();
            }
            $("#btn_story_upload").click();
        }, 500);
    }    
    return false;
}

// IMAGE UPLOAD FUNCTIONS
function readURL_all(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.blah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        $("#add_image_btn").prop('disabled', false);
    }
}

function readURL_all2(input) {
    if (input.files && input.files[0]) {
        var reader2 = new FileReader();
        reader2.onload = function (e) {
            $('.blah2').attr('src', e.target.result);
        }
        reader2.readAsDataURL(input.files[0]);
    }
}

$(document).on('change', '#image_main', function () {
    readURL_all(this);
});

$(document).on('change', '#image_extra', function () {
    readURL_all2(this);
});

// Additional image controls
$("#add_image_btn").click(function(){
    $("#additional_image").show();
    $("#image_extra").prop('disabled', false);
    $("#image_extra").prop('required', true);
    $(this).hide();
});

$("#cancel_additional").click(function(){
    $("#additional_image").hide();
    $("#add_image_btn").show();
    $("#image_extra").prop('disabled', true);
    $("#image_extra").prop('required', false);
    $("#image_extra").val('');
    $('.blah2').attr('src', '<?=base_url()?>uploads/happy_story_image/default_image.jpg');
});

// Video upload controls
$("#add_video_btn").click(function(){
    $("#video_section").show();
    $("#video_section :input").prop("disabled", false);
    $(this).hide();
});

function video_sector(upload_type) {
    if (upload_type == 'upload') {
        $('#video_share').hide();
        $('#video_upload').show();
        $('#video_link').removeAttr('required');
    } else if (upload_type == 'share') {
        $('#video_upload').hide();
        $('#video_share').show();
        $('#video_link').attr("required", true);
    }
}

function preview(v_link) {
    var site = $('.site').val();
    var video_link;
    
    if (site == 'youtube') {
        var x = v_link.split('=');
        video_link = x[1];
    } else if (site == 'dailymotion') {
        var temp = v_link.split('/');
        var x = temp[4].split('_');
        video_link = x[0];
    } else if (site == 'vimeo') {
        var x = v_link.split('/');
        video_link = x[3];
    }
    
    $('#vl').val(video_link);
    $('#video_preview').load('<?php echo base_url(); ?>index.php/home/stories/preview/'+site+'/'+video_link);
}

// Video file upload handler
(function localFileVideoPlayer() {
    'use strict'
    var URL = window.URL || window.webkitURL;
    var displayMessage = function (message, isError) {
        var element = document.querySelector('#message');
        if (element) {
            element.innerHTML = message;
            element.className = isError ? 'error' : 'info';
        }
    }
    var playSelectedFile = function (event) {
        var file = this.files[0];
        if (!file) return;
        
        var file_size = file.size;
        if (file_size <= 25000000) {
            $('.video_limit_msg').html("<?php echo translate('max_limit_25_Mb'); ?>");
            var type = file.type;
            var videoNode = document.querySelector('#upload_story_video');
            if (videoNode) {
                var canPlay = videoNode.canPlayType(type);
                if (canPlay === '') canPlay = 'no';
                var isError = canPlay === 'no';
                if (isError) {
                    displayMessage('Cannot play this video format', true);
                    return;
                }
                var fileURL = URL.createObjectURL(file);
                videoNode.src = fileURL;
            }
        } else {
            $('#videoInp').val('');
            $('.video_limit_msg').html("<?php echo translate('video_file_exceeded_25_Mb!'); ?>");
        }
    }
    
    $(document).on('change', '.videoInp', playSelectedFile);
})();
</script>
<script>
function openProjectModal() {
    document.getElementById("addProjectModal").style.display = "block";
}

function closeProjectModal() {
    document.getElementById("addProjectModal").style.display = "none";
    document.getElementById("happy_story_form").reset();
}

// Optional: close on background click
window.onclick = function(event) {
    const modal = document.getElementById("addProjectModal");
    if (event.target === modal) {
        closeProjectModal();
    }
};
</script>
