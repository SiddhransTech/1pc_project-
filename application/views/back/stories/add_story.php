<div id="content-container">
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow"><?php echo translate('add_events')?></h1>
        </div>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin"><?php echo translate('home')?></a></li>
            <li class="active"><a href="#"><?php echo translate('latest_events')?></a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-10 col-lg-offset-1">
            <div id="page-content">
                <div class="panel">
                    <form class="form-horizontal" id="package_form" method="POST"
                        action="<?=base_url()?>admin/add_story_details" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-10 col-lg-offset-1">
                                <div id="page-content">
                                <h3>Add Story</h3>
                                    <div class="panel">
                                        <form class="form-horizontal" id="package_form" method="POST"
                                            action="<?=base_url()?>admin/add_story_details"
                                            enctype="multipart/form-data">
                                            <div class="panel-body" style="padding: 50px 20px 50px;">
                                                <div class="row">
                                                
                                                    <div class="col-md-10 col-lg-offset-1">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label"
                                                                for="demo-hor-name"><b><?php echo translate('image')?></b><span
                                                                    class="text-danger">*</span> </label>
                                                            <div class="col-sm-8">
                                                                <input type="file" class="form-control"
                                                                    id="story_photo" name="story_photo" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10 col-lg-offset-1">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label"
                                                                for="demo-hor-name"><b><?php echo translate('title')?></b><span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                    name="story_name" id="story_name" required="">
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
                                                                    name="dated" id="dated" required="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10 col-lg-offset-1">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label"
                                                                for="demo-hor-name"><b><?php echo translate('event_name')?></b><span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-sm-8">
                                                            <?php
                                                    if (!empty($form_contents)) {
                                                        echo $this->Crud_model->patnername_select_html('member',1,$form_contents['member_name']);
                                                    }
                                                    else {
                                                        echo $this->Crud_model->patnername_select_html('member',1,'');
                                                    }
                                                ?>
                                                                             
                                                            </div>


                                                        </div>
                                                    </div>



                                                <!--    <div class="col-md-10 col-lg-offset-1">-->
                                                <!--        <div class="form-group">-->
                                                <!--            <label class="col-sm-2 control-label"-->
                                                <!--                for="demo-hor-name"><b><?php echo translate('bride_name')?></b><span-->
                                                <!--                    class="text-danger">*</span></label>-->
                                                <!--            <div class="col-sm-8">-->
                                                <!--            <?php-->
                                                <!--    if (!empty($form_contents)) {-->
                                                <!--        echo $this->Crud_model->patnername_select_html('member',2,$form_contents['partner_name']);-->
                                                <!--    }-->
                                                <!--    else {-->
                                                <!--        echo $this->Crud_model->patnername_select_html('member',2,'');-->
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
                                                    <a href="<?=base_url()?>admin/stories"><button class="btn btn-danger btn-sm btn-labeled fa fa-step-backward"
                                                    type="submit"><?php echo translate('go_back')?></button></a>
                                            </div>
                                            <!-- <div class="panel-footer text-center">
                                            
                                            </div> -->
                
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


</div>