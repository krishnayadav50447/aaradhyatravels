<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="dashboard_sec">
	<div class="container-fluid ps-lg-0">
		<div class="row">
            <div class="offset-lg-2 col-lg-8 mt-lg-5">
                <div class="dashboard_center">
                    <div class="dashboard_heading">
                        <h6 class="mb-0"><b>Profile</b></i></b></h6>
                        <a href="<?php echo base_url('dashboard');?>" class="text-dark"><i class="fas fa-long-arrow-left"></i></a>
                    </div>

                    <div class="details_box">
                        <div class="upload_img mt-lg-0 mt-md-0 mt-3">
                            <div class="user_img"><img src="<?php echo base_url('uploads/profile_media/'.(empty($user_data->img)?'profile_media.png':$user_data->img)); ?>"></div>
                            <small onclick="open_profile_modal()"><i class="fas fa-edit fs_15"></i></small>
                        </div>
                        <div class="user_info">
                            <div>
                                <h6>Name</h6>
                                <p><?php echo $user_data->name; ?></p>
                            </div>
                            <div>
                                <h6>Phone Number</h6>
                                <p><?php echo $user_data->phone; ?> <i class="fa-solid fa-circle-check fs_13 text-success"></i></p>
                            </div>
                            <div>
                                <h6>Email</h6>
                                <p><?php echo $user_data->email; ?> <i class="fa-solid fa-circle-check fs_13 text-success"></i></p>
                            </div>
                            <div class="py-3 border-bottom-0">
                                <button type="button" class="button_4" onclick="$('.dashboard_form, .dashboard_center').toggleClass('d-none');">Edit Profile</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dashboard_form d-none">
                    <div class="dashboard_heading">
                        <h6 class="mb-0"><b>Edit Profile</b></i></b></h6>
                        <a href="javascript:void(0)" onclick="$('.dashboard_form, .dashboard_center').toggleClass('d-none');" class="text-dark"><i class="fas fa-long-arrow-left"></i></a>
                    </div>
                    <form method="post" class="row" id="personal_form">
                        <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                        <div class="col-lg-6 mt-lg-0 mt-md-0 mt-3">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label>Name</label>
                                    <input type="text" value="<?php echo $user_data->name; ?>" name="name">
                                </div>
                                <div class="col-12 mb-3">
                                    <label>Mobile Number</label>
                                    <input type="number" value="<?php echo $user_data->phone; ?>" name="phone">
                                </div>
                                <div class="col-12 mb-4">
                                    <label>Email Address</label>
                                    <input type="email" value="<?php echo $user_data->email; ?>" name="email" readonly>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="button_2">Update Profile</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</section>

<div class="new_modal" id="full_view_profile_pic">
    <form class="modal_content mw_400 mobile_fix" id="profile_img_form">
		<input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
        <div class="modal_head">
            <h6 class="mb-0">Upload Profile Pic</h6>
            <i class="fas fa-times" onclick="close_profile_modal(this)"></i>
        </div>
        <div class="modal_body">
            <div class="form_input">
				<input type="file" name="profile_image" style="display: none;">
				<div class="user_img m-auto"><img src="<?php echo base_url('uploads/profile_media/'.(empty($user_data->img)?'profile_media.png':$user_data->img)); ?>" id="full_view_profile_img"></div>
			</div>
        </div>
        <div class="modal_footer">
            <a class="btn btn-sm btn-danger me-auto" href="javascript:void(0)" onclick="remove_profile_image()"><i class="fas fa-trash"></i></a>
			<div class="d-flex align-items-center">
				<a class="btn btn-sm btn-info" href="javascript:void(0)" onclick="upload_profile_modal(this)"><i class="fas fa-camera text-white"></i></a>
				&nbsp;&nbsp;
				<a href="javascript:void(0)" onclick="chnage_profile_pic()" class="btn btn-sm btn-success"><i class="fas fa-upload fs_12"></i> Upload</a>
			</div>
        </div>
    </form>
</div>

<script type="text/javascript">
$(document).on('submit', '#personal_form', function(e){
    e.preventDefault();
    $.ajax({  
        url:"<?php echo base_url('personal-form'); ?>",
        method:'POST',  
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            webinaFire({
                icon: data.type,
                title: data.text,
                cancelButton: "Ok",
                message: ""
            });
            if(data.type=="success"){
            	location.reload();
            }
        }
    });
});

function close_profile_modal(self){
    $("body").removeClass("no_scroll");
    $(self).closest(".modal_open").removeClass("modal_open");
}
function open_profile_modal(){
	$("body").addClass("no_scroll");
	$("#full_view_profile_pic").addClass("modal_open");
	$("#full_view_profile_img").attr("src", $("#self_img_tag").attr("src"));
}
function upload_profile_modal(self) {
	$("#profile_img_form input[name='profile_image']").trigger("click");
}
function chnage_profile_pic(){
	$("#profile_img_form").submit();
}
$(document).on("change", "#profile_img_form input[name='profile_image']", function(e){
	var preview = document.getElementById('full_view_profile_img');
	preview.src = URL.createObjectURL(e.target.files[0]);
	preview.onload = () => URL.revokeObjectURL(preview.src);
});
function remove_profile_image(){
	if(window.confirm("Are you sure remove?")){
		$.ajax({  
	        url:base_url+"/remove-profile-img", 
	        method:'POST',
	        data:{[csrfName]:csrfHash},
	        dataType: 'JSON',
	        success:function(data){
	            webinaToast({type:data.type, message:data.message});
	            if(data.type=="success"){
	                location.reload();
	            }
	        }
	    });
	}
}
$(document).on('submit', '#profile_img_form', function(e){
    e.preventDefault();
    $.ajax({  
        url:base_url+"/upload-profile-img", 
        method:'POST',
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            webinaToast({type:data.type, message:data.message});
            if(data.type=="success"){
                location.reload();
            }
        }
    });
});

</script>