<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo site_title(); ?> | Welcome Admin</title>
    <?php echo $link_script; ?>
    <style type="text/css">
        .setting_bg {z-index: 1; height: calc(100% - 48px);}
        .setting_bg:after {content: ""; position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: -1; opacity: 0.4; background-image: url('<?php echo base_url('viewer_assets/images/setting_bg.jpg'); ?>'); background-size: cover;}
        }
    </style>
</head>
<body>
<?php echo $header; ?>
<?php echo $left_nav; ?>
<?php echo $right_nav; ?>
<section class="main_board setting_bg p-0">
    <div class="container-fluid">
        <div class="row align-items-center" style="height: calc(100vh - 48px); overflow-y: auto;">
            <div class="offset-lg-3 col-lg-6">
                <div class="bg-white p-3">
                    <form id="pass_form">
                        <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                        <h5 class="text-info text-center">Change Your Password</h5>
                        <div class="w-100 mb-3">
                            <label>Old Password *</label>
                            <input class="form-control" type="password" placeholder="Old Password" name="old_password" required>
                        </div>
                        <div class="w-100 mb-3">
                            <label>New Password *</label>
                            <input class="form-control" type="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="w-100 mb-3">
                            <label>Confirm Password *</label>
                            <input class="form-control" type="password" placeholder="Confirm Password" name="cpassword" required>
                        </div>
                        <div class="w-100 mb-3">
                            <button type="submit" class="w-100 btn btn-success">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>

<script type="text/javascript">
var base_url="<?php echo base_url(); ?>";
var csrfName="<?php echo $csrfName; ?>";
var csrfHash="<?php echo $csrfHash; ?>";

$(document).on('submit', '#pass_form', function(event){ 
    event.preventDefault();  
    $.ajax({  
        url:"<?php echo base_url('admin/admin_view_profile/admin_pass_change_data'); ?>", 
        method:'POST',  
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type=='success'){
                location.assign("<?php echo base_url('admin/admin-logout'); ?>");
            }
        }
    });   
});
</script>
</body>
</html>



