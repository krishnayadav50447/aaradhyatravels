<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo site_title(); ?> | Admin | My Profile</title>
<?php echo $link_script; ?>
</head>
<body>
<?php echo $header; ?>
<?php echo $left_nav; ?>
<?php echo $right_nav; ?>
<section class="main_board">
    <div class="container-fluid">
        <form class="row" id="vendor_profile_form" method="post">
            <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
            <div class="board">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row form_inputs mb-2">
                        <div class="col-12">
                            <h6 class="mb-0">My Profile</h6>
                        </div>
                    </div>
                    
                    <div class="row form_inputs mb-2">
                        <div class="col-lg-6 d-none">
                            <div class="profile_box">
                                <div class="profile_img">
                                    <img src="<?php echo $profile_data->profile_img; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <label>Full Name</label>
                            <input type="text" name="user_name" value="<?php echo $profile_data->user_name; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <label>Contact Number</label>
                            <input type="text" name="user_phone" value="<?php echo $profile_data->user_phone; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <label>Email Address</label>
                            <input type="text" name="user_email" value="<?php echo $profile_data->user_email; ?>" readonly>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-lg-2 mb-md-2 mb-3">
                            <label>Gender</label>
                            <select class="price_inputs" name="user_gender">
                                <option <?php if($profile_data->user_gender=="Male"){echo "selected";} ?> value="Male">Male</option>
                                <option <?php if($profile_data->user_gender=="Female"){echo "selected";} ?> value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-lg-8 col-md-6 mb-2">
                            <label>Profile Url</label>
                            <input type="text" name="profile_img" value="<?php echo $profile_data->profile_img; ?>">
                        </div>
                    </div>
        
                    <div class="row form_inputs mb-2">
                        <div class="col-lg-8 col-md-6 mb-3">
                            <label>Shop / Company Name</label>
                            <input type="text" name="company_name" value="<?php echo $profile_data->company_name; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <label>Business Type</label>
                            <input type="text" name="company_type" value="<?php echo $profile_data->company_type; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <label>City</label>
                            <input type="text" name="user_city" value="<?php echo $profile_data->user_city; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <label>Land Mark</label>
                            <input type="text" name="user_land_mark" value="<?php echo $profile_data->user_land_mark; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <label>Pincode</label>
                            <input type="text" name="user_pin" value="<?php echo $profile_data->user_pin; ?>">
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label>Business Address</label>
                            <textarea name="user_address" rows="3"><?php echo $profile_data->user_address; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="row form_inputs mb-2">
                        <div class="col-lg-8 col-md-6 mb-3">
                            <label>Bank Name</label>
                            <input type="text" name="user_bank_name" value="<?php echo $profile_data->user_bank_name; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <label>Bank Branch</label>
                            <input type="text" name="user_bank_branch" value="<?php echo $profile_data->user_bank_branch; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <label>Account Holder</label>
                            <input type="text" name="user_account_name" value="<?php echo $profile_data->user_account_name; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <label>Account Number</label>
                            <input type="text" name="user_account_no" value="<?php echo $profile_data->user_account_no; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <label>IFSC</label>
                            <input type="text" name="user_ifsc_code" value="<?php echo $profile_data->user_ifsc_code; ?>">
                        </div>
                        <div class="col-lg-6 mb-lg-2 mb-3">
                            <label>Pan Number</label>
                            <input type="text" name="user_pan" value="<?php echo $profile_data->user_pan; ?>">
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label>GST Number</label>
                            <input type="text" name="user_gst" value="<?php echo $profile_data->user_gst; ?>">
                        </div>
                    </div>

                    <div class="row form_inputs">
                        <div class="col-12 text-end">
                            <button class="_wtBtnMd bg_theme_1">Save</button>
                        </div>  
                    </div>
        
                </div>
            </div>
        </form>
</section>

<script type="text/javascript">
var base_url="<?php echo base_url(); ?>";
var csrfName="<?php echo $csrfName; ?>";
var csrfHash="<?php echo $csrfHash; ?>";

$(document).on('submit', '#vendor_profile_form', function(event){ 
    event.preventDefault();
    $.ajax({  
        url:"<?php echo base_url('admin/admin_view_profile/update_admin_profile'); ?>", 
        method:'POST',  
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            webinaToast({type: data.type, message: data.text});
        }
    });   
});
</script>
</body>
</html>




