<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once(APPPATH."libraries/php_email/vendor/autoload.php");

class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->has_userdata('user_id')==TRUE){
            $url=base_url('dashboard');
            redirect($url);
        }
        $this->load->library('form_validation');
        $this->load->model('viewer/user_model', 'current_model');
    }
    public function send_email($data){
        /*$data=array(
            'smtp_host'=>$smtp_host,
            'smtp_user'=>$smtp_user,
            'smtp_pass'=>$smtp_pass,
            'from'=>$from,
            'from_name'=>$from_name,
            'to'=>$to,
            'to_name'=>$to_name,
            'reply_to'=>$reply_to,
            'reply_to_name'=>$reply_to_name,
            'subject'=>$subject,
            'html'=>$html,
        );*/
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = false;                               //Enable verbose debug output
            $mail->isSMTP();                                        //Send using SMTP
            $mail->Host       = $data['smtp_host'];                 //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                               //Enable SMTP authentication
            $mail->Username   = $data['smtp_user'];                 //SMTP username
            $mail->Password   = $data['smtp_pass'];                 //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        //Enable implicit TLS encryption
            $mail->Port       = 465;                                //ENCRYPTION_STARTTLS => 587 & ENCRYPTION_SMTPS => 465
            
            // $mail->SMTPOptions = array(
            //     'ssl' => array(
            //         'verify_peer' => false,
            //         'verify_peer_name' => false,
            //         'allow_self_signed' => true
            //     )
            // );
            
            //Recipients
            $mail->setFrom($data['from'], $data['from_name']);
            if(is_array($data['to'])){
                foreach($data['to'] as $email => $name){
                    if(empty($name)){
                        $mail->addAddress($email);
                    }else{
                        $mail->addAddress($email, $name);
                    }
                }
            }else{
                if(empty($data['to_name'])){
                    $mail->addAddress($data['to']);
                }else{
                    $mail->addAddress($data['to'], $data['to_name']);
                }
            }
            
            $mail->addReplyTo($data['reply_to'], $data['reply_to_name']);
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');                //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');           //Optional name
        
            //Content
            $mail->isHTML(true);                                            
            $mail->Subject = $data['subject'];
            $mail->Body    = $data['html'];
            $mail->AltBody = '';
        
            $response=$mail->send();
            $mail->clearAddresses();
            $mail->clearAttachments();
            if($response){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function send_sms($numbers_arr,$txt){
        $apiKey=urlencode('MzQ1MjczNmU2NjQ2MzQ3MzU2NGQzMTczMzU3YTc2NGE=');
        $sender=urlencode('AARTVL');
        $message=rawurlencode($txt);
        $numbers=implode(',', $numbers_arr);
        $data=array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
        $ch=curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response=curl_exec($ch);
        curl_close($ch);
        // echo $response;
        $result=json_decode($response);
        if($result->status=="success"){
            // echo "successfully sent sms";
            return true;
        }else{
            // echo "something went wrong!";
            return false;
        }
    }

    //////////////////////customer login///////////////
    public function index(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $this->load->view('viewer_includes/header');
        $this->load->view('viewer_includes/navigation', $data);
        $this->load->view('viewer/login');
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function login_data(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required'); 
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run() == FALSE){ 
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }else{ 
            $result=$this->current_model->login_data($this->input->post('username'), sha1($this->input->post('password')));
            if($result['login']=='success'){
                if($result['status']==1){
                    $this->session->set_userdata(array(
                        'user_id'=>$result['user_id'],
                        'user_name'=>$result['user_name'],
                        'user_phone'=>$result['user_phone'],
                        'user_email'=>$result['user_email'],
                        'user_profile_media'=>$result['img'],
                    ));
                    exit(json_encode(array('type'=>'success', 'text'=>'Successfully Login')));
                }else{
                    exit(json_encode(array('type'=>'warning', 'text'=>'Your account is suspended!')));
                }
            }else{
                exit(json_encode(array('type'=>'warning', 'text'=>'Wrong Username or Password')));
            }
        } 
    }
    public function send_login_otp(){
        $user_data=$this->current_model->check_user_data(trim($this->input->post('username')));
        if($user_data['type']=='success'){
            $code=mt_rand(100000, 999999);
            $this->session->set_tempdata('login_otp', $code, 600);
            if(is_numeric($this->input->post('username')) && strlen(trim($this->input->post('username')))==10){
                $user_name=$user_data['user_name'];
                $user_phone=$user_data['user_phone'];
                $user_message="We're glad to welcome you to Aaradhaya Travels! Your login OTP is ".$code.". Do not share OTP with anyone.";
                $user_send_phone=$this->send_sms(array($user_phone), $user_message);
            }else{
                $user_name=$user_data['user_name'];
                $user_email=$user_data['user_email'];
                $user_subject="Your Password Recover OTP in ".site_title();
                $user_message="<h3>Hi ".get_first_name($user_name)."! Your Login OTP in ".site_title()." is : $code</h3>
                <h4>Continue with this OTP & Login your account.</h4>
                <div>
                    <br><br><br><br>
                    <p>Thanks & Regards</p>
                    <p>".site_title()."</p>
                    <a href='".base_url()."'><img src='".base_url('viewer_assets/images/logo.png')."'></a>
                    <p><b>".site_title()."</b></p>
                    <p><b>Phone</b> ".get_phone_list(1)."</p>
                    <p><b>Email</b> ".get_email_name('info')."</p>
                </div>";
                $data=array(
                    'smtp_host'=>get_email_host(),
                    'smtp_user'=>get_email_name('service'),
                    'smtp_pass'=>get_email_pass('service'),
                    'from'=>get_email_name('service'),
                    'from_name'=>site_title(),
                    'to'=>$user_email,
                    'to_name'=>$user_name,
                    'reply_to'=>get_email_name('noreply'),
                    'reply_to_name'=>site_title(),
                    'subject'=>$user_subject,
                    'html'=>$user_message,
                );
                $user_send_email=$this->send_email($data);
            }
            if($user_send_phone || $user_send_email){
                exit(json_encode(array('type'=>'success', 'text'=>'Successfully sent OTP to your Phone/Email')));
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'Something went wrong!')));
            }
        }else{
            exit(json_encode(array('type'=>'error', 'text'=>'Account Not Found!')));
        }
    }
    public function validate_login_otp(){
        $this->form_validation->set_rules('otp', 'OTP', 'trim|required'); 
        $this->form_validation->set_rules('username', 'Phone/Email', 'trim|required'); 
        if ($this->form_validation->run() == FALSE){ 
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }else{
            if($this->session->tempdata('login_otp')==$this->input->post('otp')){
                $user_data=$this->current_model->check_user_data(trim($this->input->post('username')));
                if($user_data['type']=="success"){
                    $this->session->set_userdata(array(
                        'user_id'=>$user_data['user_id'],
                        'user_name'=>$user_data['user_name'],
                        'user_phone'=>$user_data['user_phone'],
                        'user_email'=>$user_data['user_email'],
                        'user_profile_media'=>$user_data['img'],
                    ));
                    exit(json_encode(array('type'=>'success', 'text'=>'Successfully Login')));
                }else{
                    exit(json_encode(array('type'=>'error', 'text'=>'Something went wrong!')));
                }
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'Wrong OTP entered!')));
            }
        }
    }
    ///////////register account////////////////////
    public function register(){
        if(empty($this->input->get('reffer_code'))){
            $data['reffer_code']="";
        }else{
            $data['reffer_code']=$this->input->get('reffer_code');
        }
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $this->load->view('viewer_includes/header', $data);
        $this->load->view('viewer_includes/navigation');
        $this->load->view('viewer/register');
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function validate_account(){
        $this->form_validation->set_rules('user_type', 'User Type', 'trim|required'); 
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|required|is_unique[webina_user.phone]', array('is_unique' => 'This Mobile No. is already registered')); 
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[webina_user.email]', array('is_unique' => 'This Email is already registered'));
        if($this->form_validation->run() == FALSE){ 
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }else{
            $code=mt_rand(100000, 999999);
            $this->session->set_tempdata('reg_otp', $code, 600);  
            if(empty($this->input->post('phone'))==false && is_numeric($this->input->post('phone')) && strlen(trim($this->input->post('phone')))==10){
                $user_name=$this->input->post('name');
                $user_phone=$this->input->post('phone');
                $user_message="Welcome to Aaradhaya Travels! We're glad that you have decided to join us. Your registration OTP is ".$code.". Do not share OTP with anyone.";
                $user_send_phone=$this->send_sms(array($user_phone), $user_message);
            }
            if(empty($this->input->post('email'))==false){
                $user_name=$this->input->post('name');
                $user_email=$this->input->post('email');
                $user_subject="Your registration OTP in ".site_title();
                $user_message="<h3>Hello ".get_first_name($user_name).", Your OTP for registration in ".site_title()." is : $code</h3>
                <h4>Continue with this OTP & Register Your Account.</h4>
                <div>
                    <br><br><br><br>
                    <p>Thanks & Regards</p>
                    <p>".site_title()."</p>
                    <a href='".base_url()."'><img src='".base_url('viewer_assets/images/logo.png')."'></a>
                    <p><b>".site_title()."</b></p>
                    <p><b>Phone</b> ".get_phone_list(1)."</p>
                    <p><b>Email</b> ".get_email_name('info')."</p>
                </div>";
                $data=array(
                    'smtp_host'=>get_email_host(),
                    'smtp_user'=>get_email_name('service'),
                    'smtp_pass'=>get_email_pass('service'),
                    'from'=>get_email_name('service'),
                    'from_name'=>site_title(),
                    'to'=>$user_email,
                    'to_name'=>$user_name,
                    'reply_to'=>get_email_name('noreply'),
                    'reply_to_name'=>site_title(),
                    'subject'=>$user_subject,
                    'html'=>$user_message,
                );
                $user_send_email=$this->send_email($data);
            }
            if($user_send_phone || $user_send_email){
                exit(json_encode(array('type'=>'success', 'text'=>'Successfully sent OTP to your Phone & Email')));
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'Something went wrong!')));
            }            
        }
    }
    public function register_data(){
        $this->form_validation->set_rules('user_type', 'User Type', 'trim|required'); 
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|required|is_unique[webina_user.phone]', array('is_unique' => 'This Mobile No. is already registered')); 
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[webina_user.email]', array('is_unique' => 'This Email is already registered'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('con_password', 'Confirm Password', 'trim|required|matches[password]');
        if($this->form_validation->run()== FALSE){ 
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }else{
            if($this->input->post('otp')==$this->session->tempdata('reg_otp')){
                $data=array(
                    'name'=>$this->input->post('name'),
                    'phone'=>$this->input->post('phone'),
                    'email'=>$this->input->post('email'),
                    'password'=>sha1($this->input->post('password')),
                    'create_date'=>date('Y-m-d H:i:s'),
                    'reffer_code'=>time(),
                    'status'=>1,
                );
                $result=$this->current_model->register_data($this->input->post('reffer_code'), $data);
                if($result['type']=='success'){
                    $user_name=$this->input->post('name');
                    $user_email=$this->input->post('email');
                    $user_subject="You are successfully registered in ".site_title()."";
                    $user_message="<h3>Hello ".get_first_name($user_name).", You are successfully registered in ".site_title().".</h3>
                        <h4>Thank You For Signup! Find your destination and ride!</h4>
                        <div>
                            <br><br><br><br>
                            <p>Thanks & Regards</p>
                            <p>".site_title()."</p>
                            <a href='".base_url()."'><img src='".base_url('viewer_assets/images/logo.png')."'></a>
                            <p><b>".site_title()."</b></p>
                            <p><b>Phone</b> ".get_phone_list(1)."</p>
                            <p><b>Email</b> ".get_email_name('info')."</p>
                        </div>";
                    $data=array(
                        'smtp_host'=>get_email_host(),
                        'smtp_user'=>get_email_name('service'),
                        'smtp_pass'=>get_email_pass('service'),
                        'from'=>get_email_name('service'),
                        'from_name'=>site_title(),
                        'to'=>$user_email,
                        'to_name'=>$user_name,
                        'reply_to'=>get_email_name('noreply'),
                        'reply_to_name'=>site_title(),
                        'subject'=>$user_subject,
                        'html'=>$user_message,
                    );
                    if($this->send_email($data)){
                        //do nothing!
                    }else{
                        //do nothing!
                    }
                    $this->session->set_userdata(array(
                        'user_id'=>$result['user_id'],
                        'user_name'=>$result['user_name'],
                        'user_phone'=>$result['user_phone'],
                        'user_email'=>$result['user_email'],
                        'user_profile_media'=>$result['img'],
                    ));
                    exit(json_encode(array('type'=>$result['type'], 'text'=>$result['text'])));
                }else{
                    if($result['type']=='warning'){
                        exit(json_encode(array('type'=>$result['type'], 'text'=>$result['text'])));
                    }else{
                        if($result['type']=='error'){
                            exit(json_encode(array('type'=>'error', 'text'=>$result['text'])));
                        }else{
                            exit(json_encode(array('type'=>'error', 'text'=>'something went wrong!')));
                        }
                    }
                }
            }
        } 
    }

    ////////////password recover/////////////////
    public function recover_pass_account_otp(){
        $user_data=$this->current_model->check_user_data(trim($this->input->post('username')));
        if($user_data['type']=='success'){
            $code=mt_rand(100000, 999999);
            $this->session->set_tempdata('pass_otp', $code, 600);
            if(is_numeric($this->input->post('username')) && strlen(trim($this->input->post('username')))==10){
                $user_name=$user_data['user_name'];
                $user_phone=$user_data['user_phone'];
                $user_message="Hi ".get_first_name($user_name).", Your password recover OTP in Aaradhaya Travels is ".$code.". If it's not done by you, please login your profile and change the password.";
                $user_send_phone=$this->send_sms(array($user_phone), $user_message);
            }else{
                $user_name=$user_data['user_name'];
                $user_email=$user_data['user_email'];
                $user_subject="Your Password Recover OTP in ".site_title();
                $user_message="<h3>Hi ".get_first_name($user_name)."! Your OTP for Reset Password in ".site_title()." is : $code</h3>
                <h4>Continue with this OTP & Reset your Password.</h4>
                <div>
                    <br><br><br><br>
                    <p>Thanks & Regards</p>
                    <p>".site_title()."</p>
                    <a href='".base_url()."'><img src='".base_url('viewer_assets/images/logo.png')."'></a>
                    <p><b>".site_title()."</b></p>
                    <p><b>Phone</b> ".get_phone_list(1)."</p>
                    <p><b>Email</b> ".get_email_name('info')."</p>
                </div>";
                $data=array(
                    'smtp_host'=>get_email_host(),
                    'smtp_user'=>get_email_name('service'),
                    'smtp_pass'=>get_email_pass('service'),
                    'from'=>get_email_name('service'),
                    'from_name'=>site_title(),
                    'to'=>$user_email,
                    'to_name'=>$user_name,
                    'reply_to'=>get_email_name('noreply'),
                    'reply_to_name'=>site_title(),
                    'subject'=>$user_subject,
                    'html'=>$user_message,
                );
                $user_send_email=$this->send_email($data);
            }
            if($user_send_phone || $user_send_email){
                exit(json_encode(array('type'=>'success', 'text'=>'Successfully sent OTP to your Phone/Email')));
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'Something went wrong!')));
            }
        }else{
            exit(json_encode(array('type'=>'error', 'text'=>'Account Not Found!')));
        }
    }

    public function recover_pass_account(){
        $this->form_validation->set_rules('otp', 'OTP', 'trim|required'); 
        $this->form_validation->set_rules('username', 'Phone/Email', 'trim|required'); 
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('con_password', 'Confirm Password', 'trim|required|matches[password]');
        if ($this->form_validation->run() == FALSE){ 
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }else{
            if($this->session->tempdata('pass_otp')==$this->input->post('otp')){
                if(is_numeric($this->input->post('username'))){
                    $username=$this->input->post('username');
                    $is_phone=true; $is_email=false;
                }else{
                    $username=$this->input->post('username');
                    $is_email=true; $is_phone=false;
                }
                $data=array(
                    'password'=>sha1($this->input->post('password'))
                );
                if($this->current_model->recover_pass_account($username, $data)){
                    if($is_email){
                        $user_name="Dear Customer";
                        $user_email=$username;
                        $user_subject="Your Password is Recovered in ".site_title();
                        $user_message="<h3>Dear Customer, Your password is recovered in ".site_title()."</h3>
                        <h4>If it's not done by you please contact us by replying this email.</h4>
                        <div>
                            <br><br><br><br>
                            <p>Thanks & Regards</p>
                            <p>".site_title()."</p>
                            <a href='".base_url()."'><img src='".base_url('viewer_assets/images/logo.png')."'></a>
                            <p><b>".site_title()."</b></p>
                            <p><b>Phone</b> ".get_phone_list(1)."</p>
                            <p><b>Email</b> ".get_email_name('info')."</p>
                        </div>";
                        $data=array(
                            'smtp_host'=>get_email_host(),
                            'smtp_user'=>get_email_name('service'),
                            'smtp_pass'=>get_email_pass('service'),
                            'from'=>get_email_name('service'),
                            'from_name'=>site_title(),
                            'to'=>$user_email,
                            'to_name'=>$user_name,
                            'reply_to'=>get_email_name('noreply'),
                            'reply_to_name'=>site_title(),
                            'subject'=>$user_subject,
                            'html'=>$user_message,
                        );
                        $user_send_email=$this->send_email($data);
                        exit(json_encode(array('type'=>'success', 'text'=>'Successfully Password Recovered!')));
                    }
                    if($is_phone){
                        exit(json_encode(array('type'=>'success', 'text'=>'Successfully Password Recovered!')));
                    }
                }else{
                    exit(json_encode(array('type'=>'error', 'text'=>'Server error!')));
                }
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'Wrong OTP entered!')));
            }
        }
    }
    
    
    
    
}
