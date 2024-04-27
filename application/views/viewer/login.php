<section class="logreg_sec">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <div class="logregbox">
                    <div class="row gx-0">
                        <div class="offset-lg-3 col-lg-6" id="registerPart">
                            <div class="log_reg">
                                <div class="choose_login">
                                    <button type="button" class="button_3 py-3 w-100 mb-3" onclick="open_form('#login_form')">Login with password</button>
                                    <button type="button" class="button_3 py-3 w-100 mb-3" onclick="open_form('#login_otp_form')">Login with OTP</button>
                                    <p class="mb-3 fs_13 text-center">Or</p>
                                    <a href="<?php echo base_url('register'); ?>" class="button_1 w-100">Create Account</a>
                                </div>
                                
                                
                                
                                <!------------LOGIN WITH PASSWORD---------------------->
                                <form id="login_form" class="step_one d-none" method="post">
                                    <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                                    <h1 class="main_heading mb-4 fs_20 text-center">Login with Password</h1>
                                    <div class="row form_input">
                                        <div class="col-12 mb-4">
                                            <div class="input_flex w-100">
                                                <span><img src="<?php echo base_url();?>/viewer_assets/images/email.svg"></span>
                                                <label>Email / Mobile *</label>
                                                <input type="text" name="username" autocomplete required>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="input_flex w-100">
                                                <span><img src="<?php echo base_url();?>/viewer_assets/images/password.svg"></span>
                                                <label>Password *</label>
                                                <input type="password" name="password" autocomplete required>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center mb-3">
                                            <a class="fs_14 text-dark" href="javascript:void(0)" onclick="forgot_pass_open_form()">Forgot Password?</a>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="button_1 w-100"><i class="fa-solid fa-arrow-right-to-bracket fs_14"></i> Sign In</button>
                                        </div>
                                    </div>
                                </form>
                                <form id="forgot_pass_form" class="step_two d-none mt-lg-n5 mt-md-n4" method="post">
                                    <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                                    <h2 class="main_heading mb-4 fs_20 text-center">Forgot Password</h2>
                                    <div class="put_user">
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <div class="input_flex w-100 mb-2">
                                                    <span><img src="<?php echo base_url();?>/viewer_assets/images/email.svg"></span>
                                                    <label>Email / Mobile *</label>
                                                    <input type="text" name="username" autocomplete="off">
                                                </div>
                                                <!--<a class="fs_12 text-dark float-end" href="javascript:void(0)">Resend OTP</a>-->
                                            </div>
                                            <div class="col-12">
                                                <button type="button" onclick="forgot_pass_send_otp()" class="button_1 w-100">Send OTP</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="put_otp d-none">
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <div class="input_flex w-100">
                                                    <span><img src="<?php echo base_url();?>/viewer_assets/images/otp.svg"></span>
                                                    <label>OTP*</label>
                                                    <input type="text" name="otp">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <div class="input_flex w-100">
                                                    <span><img src="<?php echo base_url();?>/viewer_assets/images/password.svg"></span>
                                                    <label>Password*</label>
                                                    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" name="password">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <div class="input_flex w-100">
                                                    <span><img src="<?php echo base_url();?>/viewer_assets/images/password.svg"></span>
                                                    <label>Confirm Password*</label>
                                                    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" name="con_password">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="button" onclick="submit_form(this)" class="button_1 w-100">Change Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!------------------------------------------------>
                                
                                
                                
                                
                                <!------------LOGIN WITH OTP---------------------->
                                <form id="login_otp_form" class="step_three d-none" method="post">
                                    <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                                    <h1 class="main_heading mb-4 fs_20 text-center">Login with OTP</h1>
                                    <div class="row form_input">
                                        <div class="col-12 mb-4">
                                            <div class="input_flex w-100">
                                                <span><img src="<?php echo base_url();?>/viewer_assets/images/email.svg"></span>
                                                <label>Email / Mobile *</label>
                                                <input type="text" name="username" autocomplete required>
                                                <button type="button" class="btn btn-sm btn-primary fs_10" style="width: 120px; padding: 15px 0;" onclick="send_login_otp()">Send OTP</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input_flex w-100 mb-2">
                                                <span><img src="<?php echo base_url();?>/viewer_assets/images/otp.svg"></span>
                                                <label>OTP *</label>
                                                <input type="password" name="otp" autocomplete required>
                                            </div>
                                            <a class="fs_12 text-dark float-end login_reset_otp d-none" href="javascript:void(0)" onclick="send_login_otp()">Resend OTP</a>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="button_1 w-100"><i class="fa-solid fa-arrow-right-to-bracket fs_14"></i> Login</button>
                                        </div>
                                    </div>
                                </form>
                                <!------------------------------------------------>
                                
                            </div>
                        </div>
            
                        <!--<div class="col-lg-6">-->
                        <!--    <div class="helo_reg">-->
                        <!--        <h2 class="main_heading mb-4 text-white fs_24">Hello</h2>-->
                        <!--        <p class="fs_14 text-white mb-4">Enter your personal details and start journey with us</p>-->
                        <!--        <a class="button_2 w-100 mb-4" href="<?php echo base_url('register'); ?>"><i class="fa-solid fa-arrow-right-to-bracket fs_14"></i> Sign Up</a>-->
                        <!--        <a class="w-100 fs_14 para_yellow" href="<?php echo base_url(); ?>"><i class="fas fa-arrow-left fs_12"></i>&nbsp; Back to home</a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
function submit_form(self){
    $(self).closest("form").submit();
}
$(document).on('submit', '#login_form', function(e){
    e.preventDefault();
    if($(this).find('input').val()==""){
        webinaToast({type:'error', message:'Enter Mobile & Password'});
    }else{
        $.ajax({  
            url:"<?php echo base_url('login-data'); ?>", 
            method:'POST',  
            data:new FormData(this),
            dataType: 'JSON',
            contentType:false,  
            processData:false,  
            success:function(data){
                if(data.type=='success'){
                    webinaToast({type:data.type, message:data.text});
                    location.replace("<?php echo base_url('dashboard'); ?>");
                }else{
                    webinaFire({
                        icon: data.type,
                        title: "Try Again!",
                        cancelButton: "Ok",
                        message: data.text
                    });
                }
            }
        });
    }
});
$(document).on('submit', '#forgot_pass_form', function(e){
    e.preventDefault();
    if($(this).find('input').val()==""){
        webinaToast({type:'error', message:'Enter New password confirm password!'});
    }else{
        if($(this).find('input[name="password"]').val()!=$(this).find('input[name="con_password"]').val()){
            webinaToast({type:'error', message:'Make sure your password matched!'});
        }else{
            $.ajax({  
                url:"<?php echo base_url('recover-pass-account'); ?>",
                method:'POST',  
                data:new FormData(this),
                dataType: 'JSON',
                contentType:false,  
                processData:false,  
                success:function(data){
                    webinaToast({type:data.type, message:data.text});
                    if(data.type=='success'){
                        location.reload();
                    }
                }
            });
        }
    }
});
function forgot_pass_open_form(){
    $(".step_one").addClass("d-none");
    $(".step_two").removeClass("d-none");
}

function open_form(self){
    $(".choose_login").addClass("d-none")
    $("#login_form, #login_otp_form").addClass("d-none");
    $(self).removeClass("d-none");
}



function forgot_pass_send_otp(){
    if($("#forgot_pass_form input[name='username']").val()==""){
        webinaToast({type:'error', message:'Please Enter Registerd Mobile No./Email'});
    }else{
        $.ajax({  
            url:"<?php echo base_url('recover-pass-account-otp'); ?>",
            method:'POST',  
            data:{[csrfName]:csrfHash, username:$("#forgot_pass_form").find("input[name='username']").val()},
            dataType: 'JSON',  
            success:function(data){
                webinaToast({type:data.type, message:data.text});
                if(data.type=='success'){
                    $(".put_user").addClass("d-none");
                    $(".put_otp").removeClass("d-none");
                }
            }
        });
    }
}

function send_login_otp(){
    if($("#login_otp_form").find("input[name='username']").val()==""){
        webinaToast({type:'error', message:'Please Enter Registerd Mobile No./Email'});
    }else{
        $(".login_reset_otp").addClass("d-none");
        $.ajax({  
            url:"<?php echo base_url('send-login-otp'); ?>",
            method:'POST',  
            data:{[csrfName]:csrfHash, username:$("#login_otp_form").find("input[name='username']").val()},
            dataType: 'JSON',  
            success:function(data){
                webinaToast({type:data.type, message:data.text});
                if(data.type=='success'){
                    setTimeout(function(){
                        $(".login_reset_otp").removeClass("d-none");
                    }, 60000);
                    
                }
            }
        });
    }
}
$(document).on('submit', '#login_otp_form', function(e){
    e.preventDefault();
    if($(this).find('input').val()==""){
        webinaToast({type:'error', message:'Enter Mobile & Password'});
    }else{
        $.ajax({  
            url:"<?php echo base_url('validate-login-otp'); ?>", 
            method:'POST',  
            data:new FormData(this),
            dataType: 'JSON',
            contentType:false,  
            processData:false,  
            success:function(data){
                if(data.type=='success'){
                    webinaToast({type:data.type, message:data.text});
                    location.replace("<?php echo base_url('dashboard'); ?>");
                }else{
                    webinaFire({
                        icon: data.type,
                        title: "Try Again!",
                        cancelButton: "Ok",
                        message: data.text
                    });
                }
            }
        });
    }
});
</script>