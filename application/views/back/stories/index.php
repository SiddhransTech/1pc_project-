<?php
	$story_data=$this->db->select('*')->from('happy_story')->where('approval_status','1')->get()->result();
?>

<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
	<div id="page-head">
		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow"><?php echo translate('Projects')?></h1>

		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End page title-->
		<!--Breadcrumb-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<ol class="breadcrumb">
			<li><a href="<?=base_url()?>admin"><?php echo translate('home')?></a></li>
			<li class="active"><a href="#"><?php echo translate('Projects')?></a></li>
		</ol>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End breadcrumb-->
	</div>
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content">
		<!-- Basic Data Tables -->
		<!--===================================================-->
		<div class="panel">
			<?php if (!empty($success_alert)): ?>
				<div class="alert alert-success" id="success_alert" style="display: block">
	                <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
	                <?=$success_alert?>
	            </div>
			<?php endif ?>
			<?php if (!empty($danger_alert)): ?>
				<div class="alert alert-danger" id="danger_alert" style="display: block">
	                <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
	                <?=$danger_alert?>
	            </div>
			<?php endif ?>
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo translate('Projects_list')?></h3>
			</div>
			<?php
				$allowed_roles = [2,7,8,9,1]; // role IDs allowed to see this content
				$current_user_role_id = $this->session->userdata('role_id'); // adjust this if your session key is different
			?>

			<?php if (in_array($current_user_role_id, $allowed_roles)): ?>
				<div class="text-right" style="margin-right: 30px">
					<a href="<?=base_url()?>admin/stories/add_story" id="demo-dt-view-btn" class="btn btn-primary add-tooltip">
						<i class="fa fa-plus"></i> <?php echo translate('add_new_project')?>
					</a>
				</div>
			<?php endif; ?>

			<div class="panel-body">
    <!-- Form to submit date range -->
    <!-- <form method="post" action="<?= base_url('your_controller/get_projects_by_date') ?>"> -->
		<form method="post" action="<?= base_url('admin/generate') ?>">
        <div class="row mb-2" style="margin-bottom: 50px;">
            <div class="col-md-2">
                <label for="date_range"><?= translate('select_date_range') ?></label>
                <select id="date_range" name="date_range" class="form-control" required>
                    <option value=""><?= translate('choose_range') ?></option>
                    <?php
                    $year = date('Y');
                    $next_year = $year + 1;
                    $ranges = [
                        ['start' => "$year-04-01", 'end' => "$year-05-31"],
                        ['start' => "$year-06-01", 'end' => "$year-07-30"],
                        ['start' => "$year-08-01", 'end' => "$year-09-30"],
                        ['start' => "$year-10-01", 'end' => "$year-11-30"],
                        ['start' => "$year-12-01", 'end' => "$next_year-02-20"],
                    ];
                    foreach ($ranges as $range) {
                        $label = date('j M', strtotime($range['start'])) . ' - ' . date('j M', strtotime($range['end']));
                        $value = $range['start'] . '|' . $range['end'];
                        echo '<option value="' . $value . '">' . $label . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-success" id="generate_pdf" style="display: none;">
                    <i class="fa fa-file-pdf-o"></i> <?= translate('generate_pdf') ?>
                </button>
            </div>
        </div>
    </form>
</div>



				<table id="stories_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th width="25%" data-sortable="false">
							<?php echo translate('image')?>
						</th>
						<th>
							<?php echo translate('title')?>
						</th>
						<th>
							<?php echo translate('date')?>
						</th>
						<th>
							<?php echo translate('description')?>
						</th>
						<!--<th>-->
						<!--	<?php echo translate('member_name')?>-->
						<!--</th>-->
						
						<th width="13%" data-sortable="false">
							<?php echo translate('options')?>
						</th>
					</tr>
					</thead>

					<!-- <tbody>
                         <?php
                		          $i =1;
                		            if(!empty($story_data)){
                                    foreach($story_data as $row){
                                        
                                      ?>
                                        <tr>
                                            <td><?=$i;?></td>
											<td><img src="<?php echo base_url();?>uploads/happy_story_image/<?php echo $row->guruji_image;?>" height="30" width="30" alt="image"></td>
                                            <td><?php echo $row->guruji_name;?></td>
                                        
		                                    

		                                    <td>
		                                        <span><a  href="<?php echo base_url();?>admin/stories/edit_story/<?php echo $row->guruji_photo_id;?>" title="EDIT" class="btn btn-info btn-xs add-tooltip"><i class="fa fa-edit"></i> </a></span>

		                                        <span><a href="<?php echo base_url();?>admin/stories/delete_guruji_data/<?php echo $row->guruji_photo_id;?>" onclick=" return confirm('Are you sure you want to delete the image?');"  title="DELETE" class="btn btn-danger btn-xs add-tooltip" ><i class="fa fa-trash"></i> </a></span>

		                                    </td>   
                                        </tr>
                                      <?php
                                      $i++;
									}
									            		        
		            		    }
		            		    
		            		    ?>
                        </tbody>  -->

				</table>
			</div>
		</div>
		<!--===================================================-->
		<!-- End Striped Table -->
	</div>
	<!--===================================================-->
	<!--End page content-->
</div>
<!--Default Bootstrap Modal-->
<!--===================================================-->
<div class="modal fade" id="approval_modal" role="dialog" tabindex="-1" aria-labelledby="approval_modal" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title"><?php echo translate('confirm_your_action')?></h4>
            </div>
           	<!--Modal body-->
            <div class="modal-body">
            	<p><?php echo translate('are_you_sure_you_want_to')?> "<b id="type_name"></b>" <?php echo translate('this_project')?>?</p>
            	<div class="text-right">
            		<input type="hidden" id="story_id" name="story_id" value="">
            		<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close"><?php echo translate('close')?></button>
                	<button class="btn btn-primary btn-sm" id="approval_status" value=""><?php echo translate('confirm')?></button>
					 
            	</div>
            </div>
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Bootstrap Modal-->
<!--Default Bootstrap Modal For DELETE-->
<!--===================================================-->
<div class="modal fade" id="delete_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title"><?php echo translate('confirm_delete')?></h4>
            </div>
           	<!--Modal body-->
            <div class="modal-body">
            	<p><?php echo translate('are_you_sure_you_want_to_delete_this_data?')?></p>
            	<div class="text-right">
            		<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close"><?php echo translate('close')?></button>
                	<button class="btn btn-danger btn-sm" id="delete_story" value=""><?php echo translate('delete')?></button>
            	</div>
            </div>
           
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Bootstrap Modal For DELETE-->
<script>
	setTimeout(function() {
	    $('#success_alert').fadeOut('fast');
	    $('#danger_alert').fadeOut('fast');
	}, 5000); // <-- time in milliseconds
</script>
<script>
    $(document).ready(function () {
        $('#stories_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
				"url": "<?php echo base_url('admin/stories/list_data') ?>",
				"dataType": "json",
				"type": "POST",
				"data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
			},
	    	"columns": [
				{ "data": "image" },
				{ "data": "title" },
				{ "data": "date" },
				// { "data": "partner_name" },
				// { "data": "member_name" },
				{ "data": "description" },
				{ "data": "options" },
			],
			"drawCallback": function( settings ) {
		        $('.add-tooltip').tooltip();
		    }
	    });
    }); 
</script>
<script>
	function approval(status,story_id){
	    $("#approval_status").val(status);
	    if (status == 1) {
	    	$("#type_name").html("<?php echo translate('unpublish')?>");
	    }
	    if (status == 0) {
			$("#type_name").html("<?php echo translate('approve')?>");
	    }
	    $("#story_id").val(story_id);
	}

	$("#approval_status").click(function(){
    	$.ajax({
		    url: "<?=base_url()?>admin/stories/approval/"+$("#approval_status").val()+"/"+$("#story_id").val(),
		    success: function(response) {
		    	// alert(response);
				window.location.href = "<?=base_url()?>admin/stories";
		    },
			fail: function (error) {
			    alert(error);
			}
		});
    })

    function delete_story(id){
	    $("#delete_story").val(id);
	}

	$("#delete_story").click(function(){
    	$.ajax({
		    url: "<?=base_url()?>admin/stories/delete/"+$("#delete_story").val(),
		    success: function(response) {
				window.location.href = "<?=base_url()?>admin/stories";
		    },
			fail: function (error) {
			    alert(error);
			}
		});
    })
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const dropdown = document.getElementById("date_range");
    const button = document.getElementById("generate_pdf");

    dropdown.addEventListener("change", function () {
        button.style.display = this.value !== "" ? "inline-block" : "none";
    });

      button.addEventListener("click", function (e) {
        e.preventDefault(); // Prevent form default behavior

        const selectedRange = dropdown.value;
        if (selectedRange !== "") {
            fetch("<?= base_url('admin/generate') ?>?range=" + selectedRange)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Failed to generate PDF");
                    }
                    return response.blob();
                })
                .then(blob => {
                    // Create a download link for the blob
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement("a");
                    a.href = url;
                    a.download = "Report_<?= date('Ymd_His') ?>.pdf";
                    document.body.appendChild(a);
                    a.click();
                    a.remove();
                })
                .catch(error => {
                    console.error("PDF generation error:", error);
                    alert("Failed to generate PDF.");
                });
        }
    });
});
</script>
