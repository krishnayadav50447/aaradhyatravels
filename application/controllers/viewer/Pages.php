<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once(APPPATH."libraries/php_email/vendor/autoload.php");

class Pages extends CI_Controller {
    public function __construct(){
        parent::__construct(); 
        $this->load->library('form_validation');
        $this->load->model('viewer/pages_model', 'current_model');
    }
    public function visitor_count(){
        $ref_id=$this->input->post('ref_id');
        $ip_address=$_SERVER['REMOTE_ADDR'];
        $view_date=date('Y-m-d');
        exit(json_encode($this->current_model->visitor_count($ref_id, $ip_address, $view_date)));
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
            $mail->SMTPDebug = false;                                   //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $data['smtp_host'];                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $data['smtp_user'];                     //SMTP username
            $mail->Password   = $data['smtp_pass'];                     //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom($data['from'], $data['from_name']);
            $mail->addAddress($data['to'], $data['to_name']);           //Add a recipient
            // $mail->addAddress('ellen@example.com');                  //Name is optional
            $mail->addReplyTo($data['reply_to'], $data['reply_to_name']);
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');            //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');       //Optional name
        
            //Content
            $mail->isHTML(true);                                        //Set email format to HTML
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
    /***********************CAPCHA GENERATE DATA********************/
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function contact_reload_captcha(){
        $captcha['word']=$this->generateRandomString(6);
        $captcha['image']='<input type="text" readonly value="'.$captcha['word'].'">';
        $this->session->set_tempdata('contact_captcha', $captcha['word'], 600);
        echo $captcha['image']."<span onclick='reload_captcha()' class='reload_icn'>&#8635;</span>";
    }
    /***********************CAPCHA GENERATE DATA********************/
    public function index(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $page_data=$this->current_model->get_page_data('home');
        $header_data['title']=$page_data['name'];
        $header_data['meta_des']=$page_data['meta_des'];
        $header_data['meta_key']=$page_data['meta_key'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $this->load->view('viewer_includes/header', $header_data);
        $this->load->view('viewer_includes/navigation', $data);
        $this->load->view('viewer/home');
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function about_us(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $page_data=$this->current_model->get_page_data('about-us');
        $header_data['title']=$page_data['name'];
        $header_data['meta_des']=$page_data['meta_des'];
        $header_data['meta_key']=$page_data['meta_key'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $this->load->view('viewer_includes/header', $header_data);
        $this->load->view('viewer_includes/navigation', $data);
        $this->load->view('viewer/about_us');
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function contact_us(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $captcha['word']=$this->generateRandomString(6);
        $captcha['image']='<input type="text" readonly value="'.$captcha['word'].'">';
        $this->session->set_tempdata('contact_captcha', $captcha['word'], 600);
        $data['captchaImg'] = $captcha['image']."<span onclick='reload_captcha()' class='reload_icn'>&#8635;<span>";
        $page_data=$this->current_model->get_page_data('contact-us');
        $header_data['title']=$page_data['name'];
        $header_data['meta_des']=$page_data['meta_des'];
        $header_data['meta_key']=$page_data['meta_key'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $this->load->view('viewer_includes/header', $header_data);
        $this->load->view('viewer_includes/navigation', $data);
        $this->load->view('viewer/contact_us', $data);
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function contact_form_data(){
        $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email',  'trim|required|valid_email');
        $this->form_validation->set_rules('message', 'Message',  'trim|required');
        if ($this->form_validation->run() == FALSE) { 
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }else{
            if($this->session->tempdata('contact_captcha')==$this->input->post('captcha')){
                $contact_data=array(
                    'name'=>$this->input->post('name'),
                    'email'=>$this->input->post('email'),
                    'phone'=>$this->input->post('phone'),
                    'message'=>$this->input->post('message'),
                    'ip_address'=>$_SERVER["REMOTE_ADDR"],
                );
                if($this->current_model->contact_form_data($contact_data)){
                    $user_name=$contact_data['name'];
                    $user_email=$contact_data['email'];
                    $user_subject="Thank you for contact in ".site_title();
                    $user_message="
                        <h4>Hello ".$contact_data['name'].",</h4>
                        <p>Thank you for your contact. We will contact you soon.</p>
                        <div>
                            <p>Kind Regards</p>
                            <p><b>Email: </b>".get_email_name('info')."</p>
                            <p><b>Website: </b><a href='".base_url()."'>".base_url()."</a></p>
                            <p><img src='".base_url('viewer_assets/images/logo.png')."' style='max-width:100px;'></p>
                            <p>".site_title()."</p>
                        </div>
                    ";
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
                        // to admin
                        $user_name="Admin";
                        $user_email=get_email_name('info');
                        $user_subject=$contact_data['name']." has contacted you in ".site_title();
                        $user_message="
                            <div><p><b>Details: </b></p>
                                <p><b>Name: </b>".$contact_data['name']."</p>
                                <p><b>Email: </b>".$contact_data['email']."</p>
                                <p><b>Phone: </b>".$contact_data['phone']."</p>
                                <p><b>Message: </b>".$contact_data['message']."</p>
                            </div>
                            <div>
                                <p>Kind Regards</p>
                                <p><b>Email: </b>".get_email_name('info')."</p>
                                <p><b>Website: </b><a href='".base_url()."'>".base_url()."</a></p>
                                <p><img src='".base_url('viewer_assets/images/logo.png')."' style='max-width:100px;'></p>
                                <p>".site_title()."</p>
                            </div>
                            ";
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
                            exit(json_encode(array('type'=>'success', 'text'=>'Successfully sent your message')));
                        }else{
                            exit(json_encode(array('type'=>'error', 'text'=>'Something went wrong!')));
                        }
                    }else{
                        exit(json_encode(array('type'=>'error', 'text'=>'Something went wrong!')));
                    }

                }else{
                    exit(json_encode(array('type'=>'error', 'text'=>'something went wrong!')));
                }
            }else{
                exit(json_encode(array('type'=>'warning','text'=>'Captcha not matched!')));
            }
        }
    }
    
    
    
    public function tarrif(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $page_data=$this->current_model->get_page_data('tarrif');
        $header_data['title']=$page_data['name'];
        $header_data['meta_des']=$page_data['meta_des'];
        $header_data['meta_key']=$page_data['meta_key'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $this->load->view('viewer_includes/header', $header_data);
        $this->load->view('viewer_includes/navigation', $data);
        $this->load->view('viewer/tarrif');
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function why_us(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $page_data=$this->current_model->get_page_data('why-us');
        $header_data['title']=$page_data['name'];
        $header_data['meta_des']=$page_data['meta_des'];
        $header_data['meta_key']=$page_data['meta_key'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $this->load->view('viewer_includes/header', $header_data);
        $this->load->view('viewer_includes/navigation', $data);
        $this->load->view('viewer/why_us');
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function terms_condition(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $page_data=$this->current_model->get_page_data('terms-condition');
        $header_data['title']=$page_data['name'];
        $header_data['meta_des']=$page_data['meta_des'];
        $header_data['meta_key']=$page_data['meta_key'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $this->load->view('viewer_includes/header', $header_data);
        $this->load->view('viewer_includes/navigation', $data);
        $this->load->view('viewer/terms_condition');
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function privacy_policy(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $page_data=$this->current_model->get_page_data('privacy-policy');
        $header_data['title']=$page_data['name'];
        $header_data['meta_des']=$page_data['meta_des'];
        $header_data['meta_key']=$page_data['meta_key'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $this->load->view('viewer_includes/header', $header_data);
        $this->load->view('viewer_includes/navigation', $data);
        $this->load->view('viewer/privacy_policy');
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function return_and_refund(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $page_data=$this->current_model->get_page_data('return-and-refund');
        $header_data['title']=$page_data['name'];
        $header_data['meta_des']=$page_data['meta_des'];
        $header_data['meta_key']=$page_data['meta_key'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $this->load->view('viewer_includes/header', $header_data);
        $this->load->view('viewer_includes/navigation', $data);
        $this->load->view('viewer/return_and_refund');
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function help(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $page_data=$this->current_model->get_page_data('help');
        $header_data['title']=$page_data['name'];
        $header_data['meta_des']=$page_data['meta_des'];
        $header_data['meta_key']=$page_data['meta_key'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $this->load->view('viewer_includes/header', $header_data);
        $this->load->view('viewer_includes/navigation', $data);
        $this->load->view('viewer/help');
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    
    









}