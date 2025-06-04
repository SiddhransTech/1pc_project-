<?php
  $image_data=json_decode($get_story['image']);


  function convertDateFormat($date){

    $date = str_replace('-"', '/', $date);  
    return $newDate = date("m/d/Y", strtotime($date));  
   }
   ?><div id="content-container">
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow"><?php echo translate('edit_project')?></h1>
        </div>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin"><?php echo translate('home')?></a></li>
            <li class="active"><a href="#"><?php echo translate('Project')?></a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-10 col-lg-offset-1">
            <div id="page-content">
                <div class="panel">
                    <form class="form-horizontal" id="package_form" method="POST"
                        action="<?=base_url()?>admin/stories/update_story/<?php echo $get_story['happy_story_id']; ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-10 col-lg-offset-1">
                                <div id="page-content">
                                <h3>Edit Project</h3>
                                    <div class="panel">
                                        <form class="form-horizontal" id="package_form" method="POST"
                                            action="<?=base_url()?>admin/stories/update_story/<?php echo $get_story['happy_story_id']; ?>"
                                            enctype="multipart/form-data">
                                            <div class="panel-body" style="padding: 50px 20px 50px;">

                                                <div class="row">
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-uppercase" for="profile_image"><b><?php echo translate('image')?> </b></label>
                    <div class="col-sm-9">
                    <img class="img-responsive img-border blah" src="http://localhost/ediga/uploads/happy_story_image/<?php echo  $image_data['0']->thumb; ?>" style="max-width: 30%; height: 150px">
                                            </div>
                    <div class="col-sm-9 col-sm-offset-2" style="margin-top: 10px">
                        <span class="pull-left btn btn-dark btn-sm btn-file" id="img_edit">
                            Select A Photo                            <input type="file" name="story_photo" id="story_photo" class="form-control imgInp"  >
                        </span>
                        <input type="hidden" id="story_photo_is_edit" name="is_edit" value="0">
                    </div>
                  </div>
                </div>

                                                <div class="row">
                                                
                                                  <!--   <div class="col-md-10 col-lg-offset-1">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label"
                                                                for="demo-hor-name"><b><?php echo translate('image')?></b><span
                                                                    class="text-danger">*</span> </label>
                                                            <div class="col-sm-8">
                                                                <input type="file" class="form-control"
                                                                    id="story_photo" name="story_photo" required>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                    <div class="col-md-10 col-lg-offset-1">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label"
                                                                for="demo-hor-name"><b><?php echo translate('title')?></b><span
                                                                    class="text-danger">*</span></label>
                                                                    <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="story_name" id="story_name" required="" value="<?php if(!empty($form_contents)){
                                                                    echo $form_contents['story_name'];
                                                                    } else{
                                                                        echo $get_story['title'];
                                                                    } ?>
                                                                ">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10 col-lg-offset-1">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label"
                                                                for="demo-hor-name"><b><?php echo translate('dated')?></b><span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-sm-8">

                                                                <input type="date" class="form-control"
                                                                    name="dated" id="dated" required="" value="<?php if(!empty($form_contents)){echo $form_contents['dated'];} else{echo convertDateFormat($get_story['date']);}?>" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 col-lg-offset-1">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label" for="description"><b><?php echo translate('description')?></b></label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control" name="description" id="description" rows="5" required><?php 
                                                                if (!empty($form_contents)) {
                                                                    echo $form_contents['description'];
                                                                } else {
                                                                    echo $get_story['description'];
                                                                }
                                                            ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                    <!-- <div class="col-md-10 col-lg-offset-1">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label"
                                                                for="demo-hor-name"><b><?php echo translate('event_name')?></b><span
                                                                    class="text-danger">*</span></label>
                                                                    <div class="col-sm-8">
                                                                         <?php
                                                    if (!empty($form_contents)) {
                                                        echo $this->Crud_model->patnername_select_html('member',1,$form_contents['partner_name']);
                                                    }
                                                    else {
                                                        echo $this->Crud_model->patnername_select_html('member',1,$get_story['partner_name']);
                                                    }
                                                ?>                             </div>
                                                            
                                                        </div>
                                                    </div> -->

                                                <!--    <div class="col-md-10 col-lg-offset-1">-->
                                                <!--        <div class="form-group">-->
                                                <!--            <label class="col-sm-2 control-label"-->
                                                <!--                for="demo-hor-name"><b><?php echo translate('brider_name')?></b><span-->
                                                <!--                    class="text-danger">*</span></label>-->
                                                <!--                    <div class="col-sm-8">-->
                                                <!--                  <?php-->
                                                <!--    if (!empty($form_contents)) {-->
                                                <!--        echo $this->Crud_model->patnername_select_html('member',2,$form_contents['member_name']);-->
                                                <!--    }-->
                                                <!--    else {-->
                                                <!--        echo $this->Crud_model->patnername_select_html('member',2,$get_story['member_name']);-->
                                                <!--    }-->
                                                <!--?>-->
                                                <!--            </div>-->
                                                            
                                                <!--        </div>-->
                                                <!--    </div>-->
                                                </div>
                                            </div>
                                            <div class="panel-footer text-center">
                                                <button class="btn btn-primary btn-sm btn-labeled fa fa-floppy-o"
                                                    type="submit"><?php echo translate('submit')?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
 

<script>
    // SCRIT FOR IMAGE UPLOAD
    function readURL_all(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var parent = $(input).closest('.form-group');
            reader.onload = function (e) {
                parent.find('.wrap').hide('fast');
                parent.find('.blah').attr('src', e.target.result);
                parent.find('.wrap').show('fast');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".panel-body").on('change', '.imgInp', function () {
        readURL_all(this);
    });

    $("#story_photo").change(function(){
        $("#story_photo_is_edit").val('1');
    });
</script>
</div>