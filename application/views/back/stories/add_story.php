<div id="content-container">
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow"><?php echo translate('Add_project')?></h1>
        </div>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin"><?php echo translate('home')?></a></li>
            <li class="active"><?php echo translate('add_project')?></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-10 col-lg-offset-1">
            <div id="page-content">
                <div class="panel">
                    <form class="form-horizontal" id="story_form" method="POST"
                          action="<?=base_url()?>admin/add_story_details" enctype="multipart/form-data">
                        <div class="panel-body" style="padding: 50px 20px;">
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><b><?php echo translate('image')?></b><span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="story_photo" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"><b><?php echo translate('title')?></b><span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="story_name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"><b><?php echo translate('date')?></b><span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="dated" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"><b><?php echo translate('description')?></b><span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" rows="5" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer text-center">
                            <button class="btn btn-primary btn-sm btn-labeled fa fa-floppy-o" type="submit">
                                <?php echo translate('submit')?>
                            </button>
                            <a href="<?=base_url()?>admin/stories" class="btn btn-danger btn-sm btn-labeled fa fa-step-backward">
                                <?php echo translate('go_back')?>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
