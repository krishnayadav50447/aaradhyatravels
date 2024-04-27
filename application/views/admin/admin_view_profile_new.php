<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo site_title(); ?> | Admin | Website Settings</title>
<?php echo $link_script; ?>
<style type="text/css">
.upload_logo {height: 90px; width: 100%; border: 1px solid #ddd; border-radius: 2px; position: relative;}
.upload_logo .logo_img {height: 100%; width: 100%; overflow: hidden; padding: 10px;}
.upload_logo .logo_img img {height: 100%; width: 100%; object-fit: contain;}
.file_text {position: relative; height: 40px; width: 100%; background-color: #eee; display: grid; align-content: center; justify-items: center;}
.file_text span {font-weight: 600;}
.file_text input[type='file'] {cursor: pointer; position: absolute; left: 0; top: 0; height: 40px; width: 100%; z-index: 99; opacity: 0;}
.form_inputs label {color: #555; font-weight: 500; font-size: 13px; margin-bottom: 2px;}
iframe {width: 100%; height: 350px; border: 1px solid #ddd;}
</style>
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
        			<div class="row mb-2">
        			    <div class="col-12">
        			        <h6 class="mb-1">Website Settings</h6>
                            <p class="fs_14 text-muted mb-2">Welcome to Aaradhaya Travels</p>
        			    </div>
        			</div>
                    <div class="row form_inputs mb-2">
                        <div class="col-12 mb-3">
                            <h5 class="mb-0"><b>Site Title</b></h5>
                        </div>
                        <div class="col-lg-7 col-12 mb-lg-3 mb-md-3 mb-4">
                            <div class="d-flex align-items-center">
                                <input type="text" name="site_title" value="Aaraadhya Travels">
                                <button type="button" class="_wtBtnSm bg_theme_2">Update</button>
                            </div>
                        </div>              
                    </div>

                    <div class="row form_inputs mb-2">
                        <div class="col-12 mb-3">
                            <h5 class="mb-0"><b>Site Logo</b></h5>
                        </div>
                        <div class="col-lg-5 col-md-6 mb-lg-0 mb-md-0 mb-3">
                            <div class="upload_logo">
                                <div class="logo_img">
                                    <img src="<?php echo base_url('viewer_assets/images/logo.png');?>">
                                </div>
                            </div>
                            <div class="file_text">
                                <span><i class="fas fa-camera"></i> Change Header Logo</span>
                                <input type="file" name="header_logo">
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-6">
                            <div class="upload_logo">
                                <div class="logo_img">
                                    <img src="<?php echo base_url('viewer_assets/images/logo.png');?>">
                                </div>
                            </div>
                            <div class="file_text">
                                <span><i class="fas fa-camera"></i> Change Footer Logo</span>
                                <input type="file" name="footer_logo">
                            </div>
                        </div>
                    </div>

        			<div class="row form_inputs mb-2">
                        <div class="col-12 mb-3">
                            <h5 class="mb-0"><b>Contact Numbers</b></h5>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-3 mb-md-3 mb-4">
                            <h6>Header Contact Numbers</h6>
                            <div class="mb-2">
                                <label>Contact Number 1</label>
                                <input type="text" name="hdr_contact_1" value="+91 9073721920">
                            </div>
                            <div class="mb-0">
                                <label>Contact Number 2</label>
                                <input type="text" name="hdr_contact_2" value="+91 9073721920">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-3 mb-md-3 mb-4">
                            <h6>Footer Contact Numbers</h6>
                            <div class="mb-2">
                                <label>Contact Number 1</label>
                                <input type="text" name="ftr_contact_1" value="+91 9073721920">
                            </div>
                            <div class="mb-0">
                                <label>Contact Number 2</label>
                                <input type="text" name="ftr_contact_2" value="+91 9073721920">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                            <h6>Contact Page Numbers</h6>
                            <div class="mb-2">
                                <label>Contact Number 1</label>
                                <input type="text" name="cpg_contact_1" value="+91 9073721920">
                            </div>
                            <div class="mb-0">
                                <label>Contact Number 2</label>
                                <input type="text" name="cpg_contact_2" value="+91 9073721920">
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button type="button" class="_wtBtnMd bg_theme_2">Update Information</button>
                        </div>                  
                    </div>

                    <div class="row form_inputs mb-2">
                        <div class="col-12 mb-3">
                            <h5 class="mb-0"><b>Email Address</b></h5>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-3 mb-md-3 mb-4">
                            <h6>Header Email Address</h6>
                            <div class="mb-2">
                                <label>Email Address 1</label>
                                <input type="email" name="hdr_email_1" value="rudrasif@gmail.com">
                            </div>
                            <div class="mb-0">
                                <label>Email Address 2</label>
                                <input type="email" name="hdr_email_2" value="rudrasif@gmail.com">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-3 mb-md-3 mb-4">
                            <h6>Footer Email Address</h6>
                            <div class="mb-2">
                                <label>Email Address 1</label>
                                <input type="email" name="ftr_email_1" value="rudrasif@gmail.com">
                            </div>
                            <div class="mb-0">
                                <label>Email Address 2</label>
                                <input type="email" name="ftr_email_2" value="rudrasif@gmail.com">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                            <h6>Contact Page Email Address</h6>
                            <div class="mb-2">
                                <label>Email Address 1</label>
                                <input type="email" name="cpg_email_1" value="rudrasif@gmail.com">
                            </div>
                            <div class="mb-0">
                                <label>Email Address 2</label>
                                <input type="email" name="cpg_email_2" value="rudrasif@gmail.com">
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button type="button" class="_wtBtnMd bg_theme_2">Update Information</button>
                        </div>                  
                    </div>

                    <div class="row form_inputs mb-2">
                        <div class="col-12 mb-3">
                            <h5 class="mb-0"><b>Office Address</b></h5>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-3 mb-md-3 mb-4">
                            <h6>Header Office Address</h6>
                            <div class="mb-2">
                                <label>Office Address 1</label>
                                <input type="text" name="hdr_address_1" value="Kolkata, India - Asia">
                            </div>
                            <div class="mb-0">
                                <label>Office Address 2</label>
                                <input type="text" name="hdr_address_2" value="Kolkata, India - Asia">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-3 mb-md-3 mb-4">
                            <h6>Footer Office Address</h6>
                            <div class="mb-2">
                                <label>Office Address 1</label>
                                <input type="text" name="ftr_address_1" value="Kolkata, India - Asia">
                            </div>
                            <div class="mb-0">
                                <label>Office Address 2</label>
                                <input type="text" name="ftr_address_2" value="Kolkata, India - Asia">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-3">
                            <h6>Contact Page Office Address</h6>
                            <div class="mb-2">
                                <label>Office Address 1</label>
                                <input type="text" name="cpg_address_1" value="Kolkata, India - Asia">
                            </div>
                            <div class="mb-0">
                                <label>Office Address 2</label>
                                <input type="text" name="cpg_address_2" value="Kolkata, India - Asia">
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button type="button" class="_wtBtnMd bg_theme_2">Update Information</button>
                        </div>                  
                    </div>

                    <div class="row form_inputs mb-2">
                        <div class="col-12 mb-3">
                            <h5 class="mb-0"><b>Social Media</b></h5>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label>Facebook</label>
                            <input type="text" name="facebook" value="">
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label>Instagram</label>
                            <input type="text" name="instagram" value="">
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label>Youtube</label>
                            <input type="text" name="youtube" value="">
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label>Linkedin</label>
                            <input type="text" name="linkedin" value="">
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label>Twitter</label>
                            <input type="text" name="twitter" value="">
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label>Behence</label>
                            <input type="text" name="behence" value="">
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label>Telegram</label>
                            <input type="text" name="telegram" value="">
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label>Snapchat</label>
                            <input type="text" name="snapchat" value="">
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label>Pinterest</label>
                            <input type="text" name="pinterest" value="">
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label>Whatsapp</label>
                            <input type="text" name="whatsapp" value="">
                        </div>
                        
                        <div class="col-12 text-end">
                            <button type="button" class="_wtBtnMd bg_theme_2">Update Information</button>
                        </div>                  
                    </div>

                    <div class="row form_inputs mb-2">
                        <div class="col-12 mb-3">
                            <h5 class="mb-0"><b>Google Map</b></h5>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="mb-2">
                                <label>Link</label>
                                <input type="text" name="map_link" value="https://goo.gl/maps/gL7UJbYWAhMFzznH7">
                            </div>
                            <div class="mb-0">
                                <label>Iframe</label>
                                <textarea rows="7" name="map_iframe"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3682.4156442392637!2d88.46984707497852!3d22.638286579444912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f89fc48aa01aa5%3A0xeefdc54c7a3b5969!2sAsif%20Ali%20Webina!5e0!3m2!1sen!2sin!4v1685129256097!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3682.4156442392637!2d88.46984707497852!3d22.638286579444912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f89fc48aa01aa5%3A0xeefdc54c7a3b5969!2sAsif%20Ali%20Webina!5e0!3m2!1sen!2sin!4v1685129256097!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="col-12 text-end">
                            <button type="button" class="_wtBtnMd bg_theme_2">Update Information</button>
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
        url:base_url+"/admin/admin_view_profile/update_admin_profile", 
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




