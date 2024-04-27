<section class="logreg_sec">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <div class="logregbox">
                    <div class="row gx-0">
                        <div class="col-lg-6">
                            <div class="log_reg form_inputs">
                                <form id="register_form" method="post">
                                    <input type="hidden" name="user_type" value="customer">
                                    <input type="hidden" name="reffer_code" value="<?php echo $reffer_code; ?>">
                                    <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                                    <h1 class="main_heading mb-4 fs_24">Create Account</h1>
                                    <div class="row first_step">
                                        <div class="col-12 mb-4">
                                            <div class="input_flex w-100">
                                                <span><img src="<?php echo base_url();?>/viewer_assets/images/name.svg"></span>
                                                <label>Full Name *</label>
                                                <input type="text" name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input_flex w-100">
                                                <span><img src="<?php echo base_url();?>/viewer_assets/images/phone.svg"></span>
                                                <label>Mobile Number *</label>
                                                <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;" name="phone" required>
                                            </div>
                                        </div>
            
                                        <div class="col-12 mb-4">
                                            <div class="input_flex w-100">
                                                <span><img src="<?php echo base_url();?>/viewer_assets/images/email.svg"></span>
                                                <label>Email Address *</label>
                                                <input type="email" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="button" class="button_1 w-100" onclick="validate_account()">Send Verification</button>
                                        </div>
                                    </div>
                                    <div class="row second_step d-none">
                                        <div class="col-12 mb-4">
                                            <div class="input_flex w-100">
                                                <span><img src="<?php echo base_url();?>/viewer_assets/images/otp.svg"></span>
                                                <label>OTP *</label>
                                                <input type="text" name="otp" required>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input_flex w-100">
                                                <span><img src="<?php echo base_url();?>/viewer_assets/images/password.svg"></span>
                                                <label>Create Password *</label>
                                                <div class="d-flex align-items-center">
                                                    <input type="password" name="password" required>
                                                    <i class="fas fa-eye _showPassword"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="input_flex w-100">
                                                <span><img src="<?php echo base_url();?>/viewer_assets/images/password.svg"></span>
                                                <label>Confirm Password *</label>
                                                <div class="d-flex align-items-center">
                                                    <input type="password" name="con_password" required>
                                                    <i class="fas fa-eye _showPassword"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <p class="fs_13">By continuing you will receive verification email address, please use the link to activate your account</p>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="button_1 w-100">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="helo_reg">
                                <h2 class="main_heading mb-4 text-white fs_24">Hello</h2>
                                <p class="fs_14 text-white mb-4">Already have an account? Click Bellow to Sign In.</p>
                                <a class="button_2 w-100 mb-4" href="<?php echo base_url('login'); ?>"><i class="fa-solid fa-arrow-right-to-bracket fs_14"></i> Sign In</a>
                                <a class="w-100 fs_14 para_yellow" href="<?php echo base_url(); ?>"><i class="fas fa-arrow-left fs_12"></i>&nbsp; Back to home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
function validate_account(){
    if($("#register_form").find("input[name='name']").val()==""){
        webinaToast({type:'error', message:'Enter Your Name'}); 
        $("#register_form").find("input[name='name']").focus();
        return false;
    }
    if($("#register_form").find("input[name='phone']").val()==""){
        webinaToast({type:'error', message:'Enter Phone No.'});
        $("#register_form").find("input[name='phone']").focus();
        return false;
    }
    if($("#register_form").find("input[name='email']").val()==""){
        webinaToast({type:'error', message:'Enter Email Address'});
        $("#register_form").find("input[name='email']").focus();
        return false;
    }

    $.ajax({  
        url:base_url+"/validate-account",
        method:'POST',  
        data:{[csrfName]:csrfHash, user_type:$("#register_form").find("input[name='user_type']").val(), name:$("#register_form").find("input[name='name']").val(), phone:$("#register_form").find("input[name='phone']").val(), email:$("#register_form").find("input[name='email']").val()},
        dataType: 'JSON',  
        success:function(data){
            webinaToast({type:data.type, message:data.text});
            if(data.type=='success'){
                $("#register_form").find(".first_step").addClass("d-none");
                $("#register_form").find(".second_step").removeClass("d-none");
            }
        }
    });
}
$(document).on('submit', '#register_form', function(e){
    e.preventDefault();
    if($("#register_form").find("input[name='user_type']").val()!="" && $("#register_form").find("input[name='name']").val()!="" && $("#register_form").find("input[name='phone']").val()!="" && $("#register_form").find("input[name='email']").val()!=""){
        $.ajax({  
            url:base_url+"/register-data", 
            method:'POST',  
            data:new FormData(this),
            dataType: 'JSON',
            contentType:false,  
            processData:false,  
            success:function(data){
                webinaToast({type:data.type, message:data.text});
                if(data.type=='success'){
                    location.href=base_url;
                }
            }
        });
    }else{
        webinaToast({type:'warning', message:'Enter Name, Email & Mobile No.'});
    }
});
$(document).on("click", '._showPassword', function(){
    if($(this).hasClass('_hidePassword')){
        $(this).closest("div").find("input[type='text']").attr("type", "password");
        $(this).removeClass("fa-eye-slash _hidePassword").addClass("fa-eye");
    }else{
        $(this).removeClass("fa-eye").addClass("fa-eye-slash _hidePassword");
        $(this).closest("div").find("input[type='password']").attr("type", "text");
    }
});
$(document).ready(function(){
    
});
</script>
