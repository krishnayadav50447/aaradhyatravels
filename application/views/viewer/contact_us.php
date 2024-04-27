<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $banner=get_single_banner_images('contact-us'); ?>
<section class="banner_other">
    <div class="banner">
        <div class="banner_img">
            <div class="banner_info">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <ul class="bread_cumbs">
                                <li><a href="<?php echo base_url();?>">Home</a></li>
                                <li><a href="javascript:void(0)">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content_sec bg-white mb-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-lg-0 mb-md-0 mb-4">
                <h1 class="main_heading mb-3">Leave us a message</h1>
                <div class="form_input">
                    <form id="contact_form" method="post" class="w-100">
                        <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <div class="input_flex w-100">
                                    <span><img src="<?php echo base_url();?>/viewer_assets/images/name.svg"></span>
                                    <label>Full Name</label>
                                    <input type="text" name="name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                <div class="input_flex w-100">
                                    <span><img src="<?php echo base_url();?>/viewer_assets/images/phone.svg"></span>
                                    <label>Phone Number</label>
                                    <input type="text" name="phone">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                <div class="input_flex w-100">
                                    <span><img src="<?php echo base_url();?>/viewer_assets/images/email.svg"></span>
                                    <label>Email Address</label>
                                    <input type="email" name="email">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="input_flex w-100">
                                    <span><img src="<?php echo base_url();?>/viewer_assets/images/email.svg"></span>
                                    <label>Message (Optional)</label>
                                    <textarea rows="3" name="message"></textarea>
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <div id="loadCaptcha" class="d-flex">
                                    <?php echo $captchaImg; ?>
                                </div>  
                            </div>
                            <div class="col-8 mb-3">
                                <div class="input_flex w-100">
                                    <span><img src="<?php echo base_url();?>/viewer_assets/images/captcha.svg"></span>
                                    <label>Enter Captcha</label>
                                    <input type="text" name="captcha">
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <button type="submit" class="button_1"><i class="fas fa-arrow-right fs_12"></i> Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="offset-lg-1 col-lg-5 col-md-6 ps-lg-0">
                <h3 class="main_heading mb-3">Reach us</h3>
                <div class="contact_info mb-2">
                    <div class="office_type">
                        <a class="d-block mb-3 text-muted" href="javascript:void(0)" target="_blank"><img src="<?php echo base_url();?>/viewer_assets/images/address.svg"> <?php echo get_address_list('contact'); ?></a>
                        <a class="d-block mb-3 text-muted" href="mailto:<?php echo get_email_name('info'); ?>"><img src="<?php echo base_url();?>/viewer_assets/images/email.svg"> <?php echo get_email_name('info'); ?></a>
                        <a class="d-block mb-3 text-muted" href="tel:<?php echo get_phone_list(1); ?>"><img src="<?php echo base_url();?>/viewer_assets/images/phone.svg"> <?php echo get_phone_list(1); ?></a>
                        <a class="d-block mb-0 text-muted" href="https://wa.me/<?php echo str_replace(' ', '', get_phone_list(1)); ?>" target="_blank"><img src="<?php echo base_url();?>/viewer_assets/images/whatsapp.svg" style="position: relative; top: -2px;"> <?php echo get_phone_list(1); ?></a>
                    </div>
                </div>
                <!--<br>-->
                <!--<h4 class="main_heading">Social</h4>-->
                <!--<ul class="social_ul">-->
                <!--    <li><a href="<?php echo get_social_page('facebook'); ?>"><i class="fab fa-facebook"></i></a></li>-->
                <!--    <li><a href="<?php echo get_social_page('instagram'); ?>"><i class="fab fa-instagram"></i></a></li>-->
                <!--    <li><a href="<?php echo get_social_page('linkedin'); ?>"><i class="fab fa-linkedin"></i></a></li>-->
                <!--</ul>-->
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
function reload_captcha(){
    $.ajax({  
        url:base_url+"/contact-reload-captcha", 
        method:'POST',
        data:{[csrfName]:csrfHash},
        success:function(data){
            $("#loadCaptcha").html(data);
        }
    });
}
$(document).on("submit", "#contact_form", function(e){
    e.preventDefault();
    $.ajax({  
        url:base_url+"/contact-us-data", 
        method:'POST',
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            if(data.type=="success"){
                $("#contact_form").find("input,select,textarea").val("");
                reload_captcha();
                webinaFire({
                    icon: data.type,
                    title: "Thank you for getting in touch!",
                    cancelButton: "Ok",
                    message: data.text
                });
            }else{
                webinaFire({
                    icon: "error",
                    title: data.text,
                    cancelButton: "Ok",
                    message: ""
                });
            }
        }
    });
});
</script>