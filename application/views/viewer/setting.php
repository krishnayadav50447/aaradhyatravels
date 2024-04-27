<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="dashboard_sec">
	<div class="container-fluid ps-lg-0">
		<div class="row">
			<div class="offset-lg-2 col-lg-8 mt-lg-5">
                <div class="dashboard_center">
                    <div class="dashboard_heading">
                        <h6 class="mb-0"><b>Change Password</b></i></b></h6>
                        <a href="<?php echo base_url('dashboard');?>" class="text-dark"><i class="fas fa-long-arrow-left"></i></a>
                    </div>

                    <div class="details_box d-block">
                        <form class="row" method="post" id="passwordForm">
							<div class="col-lg-6 mt-lg-0 mt-md-0 mt-3">
								<div class="row dashboard_form">
									<input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
									<div class="col-12 mb-3">
										<label>Old Password</label>
										<input type="password" value="" name="old_password" required>
									</div>
									<div class="col-12 mb-3">
										<label>New Password</label>
										<input type="password" value="" name="password" required>
									</div>
									<div class="col-12 mb-4">
										<label>Confirm Password</label>
										<input type="password" value="" name="con_password" required>
									</div>
									
									<div class="col-12">
										<button type="submit" class="button_2">Save</button>
									</div>
								</div>
							</div>
						</form>
                    </div>
                </div>
            </div>
		</div>
	</div>
</section>

<script type="text/javascript">
$(document).on('submit', '#passwordForm', function(e){
    e.preventDefault();
    $.ajax({  
        url:"<?php echo base_url('change-password'); ?>",
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
            	location.href="<?php echo base_url('dashboard'); ?>";
            }
        }
    });
});
</script>